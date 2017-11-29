<?php
/**
 * Class Index
 *
 * {ControllerResponsability}
 *
 * @package controllers\examples
 * @category Application Controller
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace controllers\dbp;

// Basic Framework classes usage
use framework\Controller;
use framework\Model;
use framework\View;

// Use related applications View and Model
use models\dbp\RouteSheet as RouteSheetModel;
use views\dbp\RouteSheet as RouteSheetView;

// Using some common and shared application controllers
//use controllers\examples\cms\NavigationBar;

// Using some framework components
use framework\components\bootstrap\PaginatorBootstrap;
use framework\components\Searcher;
use framework\components\DataRepeater;
use framework\components\bootstrap\SorterBootstrap;

class RouteSheet extends Controller
{

    /**
    * Object constructor.
    *
    * @param View $view
    * @param Model $mode
    */
    public function __construct(View $view=null, Model $model=null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view,$this->model);
    }

    public function getView()
    {
        $view = new RouteSheetView();
        return $view;
    }

    /**
     * Inizialize the Model by loading models\examples\Index class
     *
     */
    public function getModel()
    {
        $model = new RouteSheetModel();
        return $model;
    }



    /**
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {
        parent::autorun($parameters);

        $navigation = $this->makeNavigation();
        $navigation->view->loadCustomTemplate("templates/dbp/navigation_bar_record");

        $searcher = $this->makeSearcher();

        $sorterTaskCode = $this->view->makeSorterTaskCode($this->model);
        $sorterName = $this->view->makeSorterName($this->model);
        $sorterStartDate = $this->view->makeSorterStartDate($this->model);
        $sorterEndDate = $this->view->makeSorterEndDate($this->model);
        $sorterSetup = $this->view->makeSorterSetup($this->model);
        $sorterCycle = $this->view->makeSorterCycle($this->model);

        $pagination = $this->makePagination();
        $tasks = $this->makePartsWithDataRepeater();

        // Binding child controller and components instances to the main View
        $this->bindController($navigation);

        // Binding components instances to the main View (by
        // using the same creation order)
        $this->bindComponent($searcher,false);

        $this->bindComponent($sorterTaskCode);
        $this->bindComponent($sorterName);
        $this->bindComponent($sorterStartDate);
        $this->bindComponent($sorterEndDate);
        $this->bindComponent($sorterSetup);
        $this->bindComponent($sorterCycle);

        $this->bindComponent($pagination);
        $this->bindComponent($tasks);
    }

    /**
    * Inizialize the View by loading static design of /examples/index.html.tpl
    * managed by views\examples\Index class
    *
    */


    protected function makeSearcher()
    {
        // Creates a searcher by using a new View and an external template
        // for its search form HTML design.
        $view = new View("dbp/task_search_form");
        $searcher = new Searcher($view, $this->model);

        // Set component name
        $searcher->setName("ricerca_task");

        // Creates filters:
        // parameters: table field, form input, operators into query, data type
        $searcher->addFilter("task_id","task_id","=","string");
        $searcher->addFilter("name","name","=","string");
        //$searcher->addFilter("source","s_source","=","string");

        // Sets form name (tpl variable)
        $searcher->setFormName("search_form", $searcher->getName());

        // Sets component submit and reset inputs name (tpl variables)
        $searcher->setResetButton("search_reset", "Reset");
        $searcher->setSubmitButton("search_submit","Cerca");

        // Init component ( do the search job for you if :) )
        $searcher->init($this->model,$view);
        return $searcher;
    }

    public function open($pk)
    {
        $_GET["process_id"] = $pk;
        $this->model->setVariable($pk);
        $this->view->setVariable($pk);
        $this->model->callQuery();
        $this->autorun();
        $this->render();
    }

    public function add($dummy)
    {
        $this->autorun();
        $this->render();
    }

    public function importCsv($str)
    {
        $arr = explode(',',$str);
        $filename = $arr[0];
        $task_id = $arr[1];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbp";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $row = 1;
        $prev = [];

        if (($handle = fopen("http://localhost/corsomvc/csv/".$filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                $rec = [];

                if($row > 7) {
                    for ($i=0; $i < $num; $i++) {
                        if ($data[$i] == '' and $i < 2) {
                            $rec[$i] = $prev[$i];
                        } else if($data[$i] != '' and $i < 2) {
                            $prev[$i] = $data[$i];
                            $rec[$i] = $data[$i];
                        }else{
                            $rec[$i] = $data[$i] != '' ? $data[$i] : NULL;
                        }
                    }

                    $sql = "INSERT INTO operations (
                    work_id, 
                    program_name, 
                    mu, 
                    cutter_description, 
                    pos_mag, 
                    z_min,
                    work_type,
                    pos_table,
                    step_xy,
                    step_z,
                    profile_offset,
                    sgross_offset,
                    plane_offset,
                    rpm,
                    ava,
                    task_id
                    ) VALUES (
                    NULL,
                    '$rec[0]', 
                    '$rec[1]',
                    '$rec[2]',
                    '$rec[3]',
                    '$rec[4]',
                    '$rec[5]',
                    '$rec[6]',
                    '$rec[7]',
                    '$rec[8]',
                    '$rec[9]',
                    '$rec[10]',
                    '$rec[11]',
                    '$rec[12]',
                    '$rec[13]',
                    '$task_id'
                    )";

                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                for ($c=0; $c < $num; $c++) {
                echo $c. '='.$data[$c] ."<br />\n";
                }
            }
            mysqli_close($conn);
        fclose($handle);
        }

        $message = "Import del file CSV completato. Premere OK per ritornare alla pagina precedente";
        echo "<script>
            alert('$message');
            window.location.href='../../operations/open/$task_id';
        </script>";
    }

    /**
     * Makes pagination by using PaginatorBootstrap component
     * @return PaginatorBootstrap
     */
    protected function makePagination(){
        $paginator = new PaginatorBootstrap();
        $paginator->setName("Bottom");
        $paginator->resultPerPage = 4;
        $paginator->setModel($this->model);
        $paginator->buildPagination();
        $this->model->sql = $paginator->query;
        return $paginator;
    }

    /**
     * Makes part list by using a DataRepeater
     * @return DataRepeater The DataRepeater to use form binging it
     *                      to Tasks Block of the main View
     */
    protected function makePartsWithDataRepeater()
    {
        $parts = new  DataRepeater($this->view,$this->model,"Tasks",null);
        return $parts;
    }

    /**
     * Makes the navigation bars by using a shared application controller
     * @return NavigationBar The navigation bar
     */
    protected function makeNavigation(){
        $navigation = new NavigationBar();
        return $navigation;
    }

}

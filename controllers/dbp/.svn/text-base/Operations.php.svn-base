<?php
/**
 * Class Operations
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
use models\dbp\Operations as OperationsModel;
use views\dbp\Operations as OperationsView;

// Using some common and shared application controllers
//use controllers\examples\cms\NavigationBar;

// Using some framework components
use framework\components\bootstrap\PaginatorBootstrap;
use framework\components\Searcher;
use framework\components\DataRepeater;
use framework\components\Record;
use framework\components\bootstrap\SorterBootstrap;

class Operations extends Controller
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

    /**
     * Helper method to associate View
     * @return OperationsView
     */
    public function getView()
    {
        $view = new OperationsView();
        return $view;
    }

    /**
     * Helper Method to associate Model
     * @return OperationsModel
     */
    public function getModel()
    {
        $model = new OperationsModel();
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

        $sorterInputCode = $this->view->makeSorterInputCode($this->model);

        $pagination = $this->makePagination();
        $input = $this->makePartsWithDataRepeater();

        // Binding child controller and components instances to the main View
        $this->bindController($navigation);

        // Binding components instances to the main View (by
        // using the same creation order)
        $this->bindComponent($searcher,false);

        $this->bindComponent($sorterInputCode);

        $this->bindComponent($pagination);

        $this->bindComponent($input);




        // Creates a record component instance
        $record = new Record();

        // Customizes the record components
        $record->setName("Operations");
        $record->registerPkUrlParameter("work_id");

        // Sets history back for button close and delete
        $historyBack = $record->getControllerHistoryBack("index");
        $record->redirectAfterClose = $historyBack;
        $record->redirectAfterDelete = $historyBack;
    }

    protected function makeSearcher()
    {
        // Creates a searcher by using a new View and an external template
        // for its search form HTML design.
        $view = new View("dbp/operations_search_form");
        $searcher = new Searcher($view, $this->model);

        // Set component name
        $searcher->setName("ricerca_operations");

        // Creates filters:
        // parameters: table field, form input, operators into query, data type
        $searcher->addFilter("work_id","work_id","=","string");
        $searcher->addFilter("program_name","program_name","=","string");
        $searcher->addFilter("mu","mu","=","string");
        $searcher->addFilter("cutter_descr","cutter_descr","=","string");

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
        $_GET["task_id"] = $pk;
        $this->model->setVariable($pk);
        $this->view->setVariable($pk);
        $this->model->callQuery();
        $this->autorun();
        $this->render();
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
     *                      to Processes Block of the main View
     */
    protected function makePartsWithDataRepeater()
    {
        $parts = new  DataRepeater($this->view,$this->model,"Operations",null);
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

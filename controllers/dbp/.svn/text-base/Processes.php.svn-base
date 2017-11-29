<?php
/**
 * Class Processes
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
use models\dbp\Processes as ProcessesModel;
use views\dbp\Processes as ProcessesView;

// Using some framework components
use framework\components\bootstrap\PaginatorBootstrap;
use framework\components\Searcher;
use framework\components\DataRepeater;
use framework\components\bootstrap\SorterBootstrap;

class Processes extends Controller
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
     * @return ProcessesView
     */
    public function getView()
    {
        $view = new ProcessesView();
        return $view;
    }

    /**
     * Helper Method to associate Model
     * @return ProcessesModel
     */
    public function getModel()
    {
        $model = new ProcessesModel();
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
        $navigation->view->loadCustomTemplate("templates/dbp/navigation_bar");

        $searcher = $this->makeSearcher();

        $sorterProcessCode = $this->view->makeSorterProcessCode($this->model);
        $sorterDescription = $this->view->makeSoterDescription($this->model);
        $sorterStartDate = $this->view->makeSorterStartDate($this->model);
        $sorterEndDate = $this->view->makeSorterEndDate($this->model);

        $pagination = $this->makePagination();
        $processes = $this->makePartsWithDataRepeater();

        // Binding child controller and components instances to the main View
        $this->bindController($navigation);

        // Binding components instances to the main View (by
        // using the same creation order)
        $this->bindComponent($searcher,false);

        $this->bindComponent($sorterProcessCode);
        $this->bindComponent($sorterDescription);
        $this->bindComponent($sorterStartDate);
        $this->bindComponent($sorterEndDate);

        $this->bindComponent($pagination);

        $this->bindComponent($processes);
    }

    protected function makeSearcher()
    {
        // Creates a searcher by using a new View and an external template
        // for its search form HTML design.
        $view = new View("dbp/process_search_form");
        $searcher = new Searcher($view, $this->model);

        // Set component name
        $searcher->setName("ricerca_process");

        // Creates filters:
        // parameters: table field, form input, operators into query, data type
        $searcher->addFilter("process_id","process_id","=","string");
        $searcher->addFilter("name","name","=","string");
        //$searcher->addFilter("start_time","start_time","=","string");

        // Sets form name (tpl variable)
        $searcher->setFormName("search_form", $searcher->getName());

        // Sets component submit and reset inputs name (tpl variables)
        $searcher->setResetButton("search_reset", "Reset");
        $searcher->setSubmitButton("search_submit","Cerca");

        // Init component ( do the search job for you if :) )
        $searcher->init($this->model,$view);
        return $searcher;
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
        $parts = new  DataRepeater($this->view,$this->model,"Processes",null);
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

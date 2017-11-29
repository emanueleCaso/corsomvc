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

use framework\Controller;
use framework\Model;
use framework\View;
//use models\dbp\Contacts as ContactsModel;
use views\dbp\Contacts as ContactsView;

// Using some framework components
use framework\components\bootstrap\PaginatorBootstrap;

class Contacts extends Controller
{
    protected $view;
    protected $model;

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
    * Autorun method. Put your code here for running it after object creation.
    * @param mixed|null $parameters Parameters to manage
    *
    */
    protected function autorun($parameters = null)
    {
        $navigation = $this->makeNavigation();
        $navigation->view->loadCustomTemplate("templates/dbp/navigation_bar");

        //$pagination = $this->makePagination();

        $this->bindController($navigation);

        //$this->bindComponent($pagination);
    }

    /**
    * Inizialize the View by loading static design of /examples/index.html.tpl
    * managed by views\examples\Index class
    *
    */
    public function getView()
    {
        $view = new ContactsView("/dbp/contacts");
        return $view;
    }

    protected function makeNavigation(){
        $navigation = new NavigationBar();
        return $navigation;
    }

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
    * Inizialize the Model by loading models\examples\Index class
    *
    */
    /*public function getModel()
    {
        $model = new ContactsModel();
        return $model;
    }*/
}

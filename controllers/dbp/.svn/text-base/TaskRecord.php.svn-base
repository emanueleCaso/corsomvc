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

use models\dbp\TaskRecord as TaskRecordModel;
use views\dbp\TaskRecord as TaskRecordView;

//use controllers\examples\cms\NavigationBar;

use framework\components\Record;
use models\beans\BeanTask;
use framework\BeanAdapter;

class TaskRecord extends Controller
{
    protected $view;
    protected $model;

    /**
     * Object constructor.
     *
     * @param View $view
     * @param Model $mode
     */
    public function __construct(View $view = null, Model $model = null)
    {
        $this->view = empty($view) ? $this->getView() : $view;
        $this->model = empty($model) ? $this->getModel() : $model;
        parent::__construct($this->view, $this->model);
    }

    /**
     * Autorun method. Put your code here for running it after object creation.
     * @param mixed|null $parameters Parameters to manage
     *
     */
    protected function autorun($parameters = null)
    {
        // Use application NavigationBar Controller
        $navigation = new NavigationBar();
        $navigation->view->loadCustomTemplate("templates/dbp/navigation_bar_record");

        // Binding child controller NavigationBar
        $this->bindController($navigation);

        // Builds select options values
        $this->model->makeProcessList($this->view);
        $this->model->makeDepartmentList($this->view);
        $this->model->makeMachineList($this->view);
        $this->model->makeToolList($this->view);

        // Creates a record component instance
        $record = new Record();

        // Customizes the record components
        $record->setName("TaskRecord");
        $record->registerPkUrlParameter("task_id");

        // Optionals setting
        $record->registerActionName($record::ADD, "aggiungi");
        $record->registerActionName($record::UPDATE, "modifica");
        $record->registerActionName($record::DELETE, "elimina");
        $record->registerActionName($record::CLOSE, "chiudi");

        // Gets curren record
        $currentRecord = $record->getCurrentRecord();

        // Sets history back for button close and delete
        $historyBack = $record->getControllerHistoryBack("route_sheet");
        $record->redirectAfterClose = $historyBack;
        $record->redirectAfterDelete = $historyBack;

        // Sets disallow mode
        $record->disallowMode = $record::DISALLOW_MODE_WITH_HIDE;
        // $record->disallowAction(record::UPDATE);
        // $record->disallowAction($record::DELETE);

        // Creates BeanAclActions, its BeanAdapter and select the
        // current record
        $bean = new BeanTask();
        $beanAdapter = new BeanAdapter($bean);
        $beanAdapter->select($currentRecord);

        // Handles form submission and updates the bean attributes
        // with posted data
        if ($record->isSubmitted()) {
            $this->model->setBeanWithPostedData($bean);
        }

        // Initializes record component with BeanAdapter
        // (and automatically with its managed Bean BeanPart)
        try {
            $record->init($beanAdapter);
        } catch (\Exception $e) {

            if ($record->editMode == false) {
                $bean->setTaskCode(null);
                $record->disallowAction(Record::UPDATE);
                $record->disallowAction(Record::DELETE);
            } else {
                $record->disallowAction(Record::ADD);
            }

        };

        // Binding Record Component to the view (without rendering)
        $this->bindComponent($record, false);

        // Set others view fields values with bean data
        $this->view->setFieldsWithBeanData($bean);

        // Pocesses record errors
        $this->view->parseErrors($record->getErrors());

    }


    public function open($pk)
    {
        $_GET["task_id"] = $pk;
        $this->autorun();
        $this->render();
    }

    public function add($dummy)
    {
        $this->autorun();
        $this->render();
    }

    /**
     * Inizialize the View by loading static design of /examples/db/part_record.html.tpl
     * managed by views\examples\db\PartRecord class
     *
     */
    public function getView()
    {
        $view = new TaskRecordView("/dbp/task_record");
        return $view;
    }

    /**
     * Inizialize the Model by loading models\examples\db\PartRecord class
     *
     */
    public function getModel()
    {
        $model = new TaskRecordModel();
        return $model;
    }
}

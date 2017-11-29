<?php
/**
 * Class Index
 *
 * {ModelResponsability}
 *
 * @package models\examples
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace models\dbp;

use framework\Model;
use views\dbp\TaskRecord as TaskRecordView;
use framework\components\DataRepeater;
use models\beans\BeanTask;

class TaskRecord extends Model
{

    /**
     * Object constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Autorun method. Put your code here for running it after object creation.
     * @param mixed|array|null $parameters Additional parameters to manage
     *
     */
    protected function autorun($parameters = null)
    {

    }


    public function makeProcessList(TaskRecordView $view)
    {
        $processList = new Model();
        $processList->sql= "SELECT process_id, name FROM process";
        $processList->updateResultSet();
        $list = new DataRepeater($view,$processList,"process_id_list",null);
        $list->render();
    }

    public function makeDepartmentList(TaskRecordView $view)
    {
        $departmentList = new Model();
        $departmentList->sql= "SELECT department_id, name FROM department";
        $departmentList->updateResultSet();
        $list = new DataRepeater($view,$departmentList,"department_id_list",null);
        $list->render();
    }

    public function makeMachineList(TaskRecordView $view)
    {
        $machineList = new Model();
        $machineList->sql= "SELECT machine_id, name FROM machine";
        $machineList->updateResultSet();
        $list = new DataRepeater($view,$machineList,"machine_id_list",null);
        $list->render();
    }

    public function makeToolList(TaskRecordView $view)
    {
        $toolList = new Model();
        $toolList->sql= "SELECT tooling_id, name FROM tooling";
        $toolList->updateResultSet();
        $list = new DataRepeater($view,$toolList,"tooling_id_list",null);
        $list->render();
    }

    public function setBeanWithPostedData(BeanTask $bean)
    {
        $bean->setTaskCode($_POST["task_id"]);
        $bean->setName($_POST["name"]);
        $bean->setDescription($_POST["description"]);
        $bean->setStartDate($_POST["start_time"]);
        $bean->setEndDate($_POST["end_time"]);
        $bean->setSetupTime($_POST["setup"]);
        $bean->setCycleTime($_POST["cycletime"]);
        $bean->setProcessCode($_POST["process_id"]);
        $bean->setDepartmentCode($_POST["department_id"]);
        $bean->setMachineCode($_POST["machine_id"]);
        $bean->setToolingCode($_POST["tooling_id"]);
    }
}

<?php
/**
 * Class Index
 *
 * {ViewResponsability}
 *
 * @package controllers\examples
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\dbp;

use framework\View;
use models\beans\BeanTask;

class TaskRecord extends View
{

    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/task_record";
        parent::__construct($tplName);
    }

    public function setFieldsWithBeanData(BeanTask $bean)
    {
        // Switch form mode
        if ($bean->getTaskCode() == null) {
            $this->setVar("FormTitle", "{RES:New_Record}");
            $this->setVar("readonly","");
        }else  {
            $this->setVar("FormTitle", "{RES:Edit_Record}: ". $bean->getTaskCode());
            $this->setVar("readonly","readonly");
        }

        $this->setVar("task_id",$bean->getTaskCode());
        $this->setVar("name",$bean->getName());
        $this->setVar("description",$bean->getDescription());
        $this->setVar("start_time",$bean->getStartDate());
        $this->setVar("end_time",$bean->getEndDate());
        $this->setVar("setup",$bean->getSetupTime());
        $this->setVar("cycletime",$bean->getCycleTime());
        $this->setVar("process_id",$bean->getProcessCode());
        $this->setVar("department_id",$bean->getDepartmentCode());
        $this->setVar("machine_id",$bean->getMachineCode());
        $this->setVar("tooling_id",$bean->getToolingCode());
    }
}

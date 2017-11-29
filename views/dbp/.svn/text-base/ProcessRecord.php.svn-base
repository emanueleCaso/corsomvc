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
use models\beans\BeanProcess;

class ProcessRecord extends View
{

    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/process_record";
        parent::__construct($tplName);
    }

    public function setFieldsWithBeanData(BeanProcess $bean)
    {
        // Switch form mode
        if ($bean->getProcessCode() == null) {
            $this->setVar("FormTitle", "{RES:New_Record}");
            $this->setVar("readonly","");
        }else  {
            $this->setVar("FormTitle", "{RES:Edit_Record}: ". $bean->getProcessCode());
            $this->setVar("readonly","readonly");
        }

        $this->setVar("process_id",$bean->getProcessCode());
        $this->setVar("name",$bean->getName());
        $this->setVar("start_time",$bean->getStartDate());
        $this->setVar("end_time",$bean->getEndDate());
    }
}

<?php
/**
 * Class Operations
 *
 * {ViewResponsability}
 *
 * @package controllers\examples
 * @category Application View
 * @author  {AuthorName} - {AuthorEmail}
*/
namespace views\dbp;

use framework\View;
use framework\components\bootstrap\SorterBootstrap;
use models\dbp\Operations as OperationsModel;

class Operations extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/operations";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Operations");
        while ($process = $resultset->fetch_object()) {
            $this->setVar("work_id",$process->work_id);
            $this->setVar("program_name",$process->program_name);
            $this->setVar("mu",$process->mu);
            $this->setVar("cutter_description",$process->cutter_description);
            $this->setVar("pos_mag",$process->pos_mag);
            $this->setVar("z_min",$process->z_min);
            $this->setVar("work_type",$process->work_type);
            $this->setVar("pos_table",$process->pos_table);
            $this->setVar("step_xy",$process->step_xy);
            $this->setVar("step_z",$process->step_z);
            $this->setVar("profile_offset",$process->profile_offset);
            $this->setVar("sgross_offset",$process->sgross_offset);
            $this->setVar("plane_offset",$process->plane_offset);
            $this->setVar("rpm",$process->rpm);
            $this->setVar("ava",$process->ava);
            $this->setVar("task_id",$process->task_id);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    public function setVariable($variable)
    {
        $this->pk = $variable;
        $this->openBlock("TaskInfo");
        $this->setVar("task_id",$this->pk);
        $this->parseCurrentBlock();
        $this->setBlock();
    }

    /**
     * Makes sorter for part_code field
     * @return SorterBootstrap
     */
    public function makeSorterInputCode(OperationsModel $model)
    {

        $sorterProcessCode = new SorterBootstrap();
        $sorterProcessCode->setName("WorkID");
        $sorterProcessCode->field = "work_id";
        $sorterProcessCode->caption = "{RES:WorkID}";
        $sorterProcessCode->init($model);
        return $sorterProcessCode;
    }

}


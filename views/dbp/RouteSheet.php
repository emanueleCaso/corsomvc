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
use framework\components\bootstrap\SorterBootstrap;
use models\dbp\RouteSheet as RouteSheetModel;

class RouteSheet extends View
{
    private $pk;

    /**
     * Object constructor.
     *
     * @param string|null $tplName The html template containing the static design.
     */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/route_sheet";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Tasks");
        while ($process = $resultset->fetch_object()) {
            $this->setVar("task_id",$process->task_id);
            $this->setVar("name",$process->name);
            $this->setVar("description",$process->description);
            $this->setVar("start_time",$process->start_time);
            $this->setVar("end_time",$process->end_time);
            $this->setVar("setup",$process->setup);
            $this->setVar("cycletime",$process->cycletime);
            $this->setVar("department_id",$process->department_id);
            $this->setVar("machine_id",$process->machine_id);
            $this->setVar("tooling_id",$process->tooling_id);
            $this->setVar("process_id",$process->process_id);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    public function setVariable($variable)
    {
        $this->pk = $variable;
        $this->openBlock("ProcessInfo");
        $this->setVar("process_id",$this->pk);
        $this->parseCurrentBlock();
        $this->setBlock();
    }

    /**
     * Makes sorter for part_code field
     * @return SorterBootstrap
     */
    public function makeSorterTaskCode(RouteSheetModel $model)
    {

        $sorterTaskCode = new SorterBootstrap();
        $sorterTaskCode->setName("TaskID");
        $sorterTaskCode->field = "task_id";
        $sorterTaskCode->caption = "{RES:TaskID}";
        $sorterTaskCode->init($model);
        return $sorterTaskCode;
    }

    /**
     * Make sorter for description field
     * @return SorterBootstrap
     */
    public function makeSorterName(RouteSheetModel $model)
    {
        $sorterDescription = new SorterBootstrap();
        $sorterDescription->setName("TaskName");
        $sorterDescription->field = "name";
        $sorterDescription->caption = "{RES:TaskName}";
        $sorterDescription->init($model);
        return $sorterDescription;
    }

    /**
     * Make sorter for source field
     * @return SorterBootstrap
     */
    public function makeSorterStartDate(RouteSheetModel $model)
    {
        $sorterStart = new SorterBootstrap();
        $sorterStart->setName("StartTime");
        $sorterStart->field = "start_time";
        $sorterStart->caption = "{RES:StartTime}";
        $sorterStart->init($model);
        return $sorterStart;
    }

    /**
     * Make sorte for source_lead_time field
     * @return SorterBootstrap
     */
    public function makeSorterEndDate(RouteSheetModel $model)
    {
        $sorterEnd = new SorterBootstrap();
        $sorterEnd->setName("EndTime");
        $sorterEnd->field = "end_time";
        $sorterEnd->caption = "{RES:EndTime}";
        $sorterEnd->init($model);
        return $sorterEnd;
    }

    public function makeSorterSetup(RouteSheetModel $model)
    {
        $sorterDescription = new SorterBootstrap();
        $sorterDescription->setName("Setup");
        $sorterDescription->field = "setup";
        $sorterDescription->caption = "{RES:Setup}";
        $sorterDescription->init($model);
        return $sorterDescription;
    }

    public function makeSorterCycle(RouteSheetModel $model)
    {
        $sorterDescription = new SorterBootstrap();
        $sorterDescription->setName("Cycle");
        $sorterDescription->field = "cycletime";
        $sorterDescription->caption = "{RES:Cycle}";
        $sorterDescription->init($model);
        return $sorterDescription;
    }
}



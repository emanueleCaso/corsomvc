<?php
/**
 * Class Processes
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
use models\dbp\Processes as ProcessesModel;

class Processes extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/processes";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Processes");
        while ($process = $resultset->fetch_object()) {
            $this->setVar("process_id",$process->process_id);
            $this->setVar("description",$process->description);
            $this->setVar("start_time",$process->start_time);
            $this->setVar("end_time",$process->end_time);
            $this->parseCurrentBlock();
        }
        $this->setBlock();
    }

    /**
     * Makes sorter for part_code field
     * @return SorterBootstrap
     */
    public function makeSorterProcessCode(ProcessesModel $model)
    {

        $sorterProcessCode = new SorterBootstrap();
        $sorterProcessCode->setName("process_id");
        $sorterProcessCode->field = "process_id";
        $sorterProcessCode->caption = "{RES:ProcessID}";
        $sorterProcessCode->init($model);
        return $sorterProcessCode;
    }

    /**
     * Make sorter for description field
     * @return SorterBootstrap
     */
    public function makeSoterDescription(ProcessesModel $model)
    {
        $sorterDescription = new SorterBootstrap();
        $sorterDescription->setName("description");
        $sorterDescription->field = "name";
        $sorterDescription->caption = "{RES:ProcessName}";
        $sorterDescription->init($model);
        return $sorterDescription;
    }

    /**
     * Make sorter for source field
     * @return SorterBootstrap
     */
    public function makeSorterStartDate(ProcessesModel $model)
    {
        $sorterStart = new SorterBootstrap();
        $sorterStart->setName("start_time");
        $sorterStart->field = "start_time";
        $sorterStart->caption = "{RES:StartTime}";
        $sorterStart->init($model);
        return $sorterStart;
    }

    /**
     * Make sorte for source_lead_time field
     * @return SorterBootstrap
     */
    public function makeSorterEndDate(ProcessesModel $model)
    {
        $sorterEnd = new SorterBootstrap();
        $sorterEnd->setName("end_time");
        $sorterEnd->field = "end_time";
        $sorterEnd->caption = "{RES:EndTime}";
        $sorterEnd->init($model);
        return $sorterEnd;
    }

}


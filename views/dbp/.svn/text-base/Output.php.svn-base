<?php
/**
 * Class Output
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
use models\dbp\Output as OutputModel;

class Output extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/output";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Output");
        while ($process = $resultset->fetch_object()) {
            $this->setVar("output_id",$process->output_id);
            $this->setVar("type",$process->type);
            $this->setVar("description",$process->description);
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
    public function makeSorterOutputCode(OutputModel $model)
    {

        $sorterProcessCode = new SorterBootstrap();
        $sorterProcessCode->setName("OutputID");
        $sorterProcessCode->field = "output_id";
        $sorterProcessCode->caption = "{RES:OutputID}";
        $sorterProcessCode->init($model);
        return $sorterProcessCode;
    }

}


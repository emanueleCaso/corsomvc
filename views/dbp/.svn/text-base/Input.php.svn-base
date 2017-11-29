<?php
/**
 * Class Input
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
use models\dbp\Input as InputModel;

class Input extends View
{

    /**
    * Object constructor.
    *
    * @param string|null $tplName The html template containing the static design.
    */
    public function __construct($tplName = null)
    {
        if (empty($tplName))
            $tplName = "/dbp/input";
        parent::__construct($tplName);
    }

    public function setBlockParts(\mysqli_result $resultset){
        $this->openBlock("Input");
        while ($process = $resultset->fetch_object()) {
            $this->setVar("input_id",$process->input_id);
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
    public function makeSorterInputCode(InputModel $model)
    {

        $sorterProcessCode = new SorterBootstrap();
        $sorterProcessCode->setName("InputID");
        $sorterProcessCode->field = "input_id";
        $sorterProcessCode->caption = "{RES:InputID}";
        $sorterProcessCode->init($model);
        return $sorterProcessCode;
    }

}


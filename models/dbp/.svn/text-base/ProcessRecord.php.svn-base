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
use views\dbp\ProcessRecord as ProcessRecordView;
use framework\components\DataRepeater;
use models\beans\BeanProcess;

class ProcessRecord extends Model
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


    public function setBeanWithPostedData(BeanProcess $bean)
    {
        $bean->setProcessCode($_POST["process_id"]);
        $bean->setName($_POST["name"]);
        $bean->setStartDate($_POST["start_time"]);
        $bean->setEndDate($_POST["end_time"]);
    }
}

<?php
/**
 * Class Input
 *
 * {ModelResponsability}
 *
 * @package models\examples
 * @category Application Model
 * @author  {AuthorName} - {AuthorEmail}
 */

namespace models\dbp;

use framework\Model;

/**
 * Class PartListManager
 * Part List Manager Model
 *
 */
class Input extends Model
{
    private $pk;

    public function __construct()
    {
        parent::__construct();
        $this->sql = <<<SQL
              SELECT  
              input_id, 
              type, 
              description
            FROM 
              input
SQL;
        // Also you can use a statement like this:
        // $this->sql = "SELECT t.* FROM part t";
        //
        // Warning:
        // Do not use "SELECT * FROM part" because frameworks components
        // and SQL itself cannot build SQL subquery that use the same table
        $this->updateResultSet();
    }

    public function setVariable($variable)
    {
        $this->pk = $variable;
    }

    public function callQuery()
    {
        $this->sql = <<<SQL
              SELECT  
              input_id, 
              type, 
              description
            FROM 
              input 
            WHERE
              task_id={$this->parseValue($this->pk, 'string')}
SQL;
        $this->updateResultSet();
        $this->envelopeSql();
    }

    protected function parseValue($value = null, $type = "number")
    {
        $constants = get_defined_constants();

        if ($type == "int" || $type == "float" || $type == "real" || $type == "double") {
            $type = "number";
        }
        if ($value == null) {
            return "NULL";
        } else if ($value != null && $type != "number" && $type != "date" && $type != "datetime") {
            return "'" . $this->real_escape_string($value) . "'";
        } else if ($value != null && $type != "number" && $type == "date") {
            return "STR_TO_DATE('" . $this->real_escape_string($value) . "','" . $constants['STORED_DATE_FORMAT'] . "')";
        } else if ($value != null && $type != "number" && $type == "datetime") {
            return "STR_TO_DATE('" . $this->real_escape_string($value) . "','" . $constants['STORED_DATETIME_FORMAT'] . "')";
        } else if ($value != null && $type == "number" && is_numeric($value)) {
            return $value;
        } else {
            return "NULL";
        }
    }
}

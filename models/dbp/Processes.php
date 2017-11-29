<?php
/**
 * Class Processes
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
class Processes extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sql = <<<SQL
              SELECT  
              process_id, 
              name, 
              start_time, 
              end_time 
            FROM 
              process
SQL;
        // Also you can use a statement like this:
        // $this->sql = "SELECT t.* FROM part t";
        //
        // Warning:
        // Do not use "SELECT * FROM part" because frameworks components
        // and SQL itself cannot build SQL subquery that use the same table
        $this->updateResultSet();
    }
}

<?php
/**
 * Class BeanProcess
 * Bean class for object oriented management of the MySQL table process
 *
 */
namespace models\beans;
use framework\MySqlRecord;
use framework\Bean;

class BeanProcess extends MySqlRecord implements Bean
{
    private $allowUpdate = false;
    private $processCode;
    private $isPkAutoIncrement = false;
    private $name;
    private $startDate;
    private $endDate;
    private $ddl = "Q1JFQVRFIFRBQkxFIGBwYXJ0YCAoCiAgYHBhcnRfY29kZWAgdmFyY2hhcig0MCkgTk9UIE5VTEwsCiAgYGRlc2NyaXB0aW9uYCB2YXJjaGFyKDQ1KSBERUZBVUxUIE5VTEwsCiAgYHNvdXJjZWAgZW51bSgnTUFLRScsJ0JVWScpIERFRkFVTFQgTlVMTCBDT01NRU5UICdNYWtlIG9yIEJ1eScsCiAgYHNvdXJjZV9sZWFkX3RpbWVgIGludCgxMSkgREVGQVVMVCBOVUxMLAogIGBtZWFzdXJlbWVudF91bml0X2NvZGVgIHZhcmNoYXIoMTApIE5PVCBOVUxMLAogIGBwYXJ0X3R5cGVfY29kZWAgdmFyY2hhcigyMCkgTk9UIE5VTEwgQ09NTUVOVCAnUHJvZHVjdCwgQXNzZW1ibHksIENvbXBvbmVudCxSYXcnLAogIGBwYXJ0X2NhdGVnb3J5X2NvZGVgIHZhcmNoYXIoMjApIE5PVCBOVUxMIENPTU1FTlQgJ01hcmtldCBjbGFzcycsCiAgYHdhc3RhZ2VgIGZsb2F0IERFRkFVTFQgTlVMTCBDT01NRU5UICdXYXN0ZSByYXRpbycsCiAgYGJvbV9sZXZlbHNgIGludCgxMSkgREVGQVVMVCBOVUxMIENPTU1FTlQgJ0hpZXJhcmNoeSBkZXB0aCBvZiBpdHMgQk9NJywKICBQUklNQVJZIEtFWSAoYHBhcnRfY29kZWApLAogIEtFWSBgZmtfcGFydF9wYXJ0X3R5cGUxX2lkeGAgKGBwYXJ0X3R5cGVfY29kZWApLAogIEtFWSBgZmtfcGFydF9wYXJ0X2NhdGVnb3J5MV9pZHhgIChgcGFydF9jYXRlZ29yeV9jb2RlYCksCiAgS0VZIGBma19wYXJ0X3BhcnRfdW5pdF90eXBlMV9pZHhgIChgbWVhc3VyZW1lbnRfdW5pdF9jb2RlYCksCiAgQ09OU1RSQUlOVCBgZmtfcGFydF9wYXJ0X2NhdGVnb3J5MWAgRk9SRUlHTiBLRVkgKGBwYXJ0X2NhdGVnb3J5X2NvZGVgKSBSRUZFUkVOQ0VTIGBwYXJ0X2NhdGVnb3J5YCAoYHBhcnRfY2F0ZWdvcnlfY29kZWApIE9OIERFTEVURSBOTyBBQ1RJT04gT04gVVBEQVRFIE5PIEFDVElPTiwKICBDT05TVFJBSU5UIGBma19wYXJ0X3BhcnRfdHlwZTFgIEZPUkVJR04gS0VZIChgcGFydF90eXBlX2NvZGVgKSBSRUZFUkVOQ0VTIGBwYXJ0X3R5cGVgIChgcGFydF90eXBlX2NvZGVgKSBPTiBERUxFVEUgTk8gQUNUSU9OIE9OIFVQREFURSBOTyBBQ1RJT04sCiAgQ09OU1RSQUlOVCBgZmtfcGFydF9wYXJ0X3VuaXRfdHlwZTFgIEZPUkVJR04gS0VZIChgbWVhc3VyZW1lbnRfdW5pdF9jb2RlYCkgUkVGRVJFTkNFUyBgbWVhc3VyZW1lbnRfdW5pdGAgKGBtZWFzdXJlbWVudF91bml0X2NvZGVgKSBPTiBERUxFVEUgTk8gQUNUSU9OIE9OIFVQREFURSBOTyBBQ1RJT04KKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J0ludmVudG9yeSBwYXJ0cyc=";

    public function setProcessCode($taskCode)
    {
        $this->processCode = (string)$taskCode;
    }

    public function setName($name)
    {
        $this->name = (string)$name;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = (string)$startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = (string)$endDate;
    }

    public function getProcessCode()
    {
        return $this->processCode;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getDdl()
    {
        return base64_decode($this->ddl);
    }

    public function getTableName()
    {
        return "process";
    }

    public function __construct($processCode = null)
    {
        //$this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($processCode)) {
            $this->select($processCode);
        }
    }

    public function __destruct()
    {
        $this->close();
    }


    public function close()
    {
        //unset($this);
    }

    public function select($processCode)
    {
        $sql = "SELECT * FROM process WHERE process_id={$this->parseValue($processCode,'string')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->processCode = $this->replaceAposBackSlash($rowObject->process_id);
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            @$this->startDate = empty($rowObject->start_time) ? null : date(FETCHED_DATE_FORMAT,strtotime($rowObject->start_time));
            @$this->endDate = empty($rowObject->end_time) ? null : date(FETCHED_DATE_FORMAT,strtotime($rowObject->end_time));

            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    public function delete($processCode)
    {
        $sql = "DELETE FROM process WHERE process_id={$this->parseValue($processCode,'string')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->processCode = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO process
            (process_id,name,start_time,end_time)
            VALUES({$this->parseValue($this->processCode, 'string')},
            {$this->parseValue($this->name, 'string')},
            {$this->parseValue($this->startDate,'date')},
			{$this->parseValue($this->endDate,'date')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->processCode = $this->insert_id;
            }
        }
        return $result;
    }

    public function update($processCode)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                process
            SET 
                name={$this->parseValue($this->name, 'string')},
                start_time={$this->parseValue($this->startDate, 'date')},
                end_time={$this->parseValue($this->endDate,'date')} 
            WHERE
                process_id={$this->parseValue($processCode, 'string')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($processCode);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    public function updateCurrent()
    {
        if ($this->processCode != "") {
            return $this->update($this->processCode);
        } else {
            return false;
        }
    }
}
?>

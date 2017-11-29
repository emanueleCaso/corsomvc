<?php
/**
 * Class BeanProcess
 * Bean class for object oriented management of the MySQL table process
 *
 */
namespace models\beans;
use framework\MySqlRecord;
use framework\Bean;

class BeanTask extends MySqlRecord implements Bean
{
    private $allowUpdate = false;
    private $taskCode;
    private $isPkAutoIncrement = false;
    private $name;
    private $description;
    private $startDate;
    private $endDate;
    private $setupTime;
    private $cycleTime;
    private $departmentCode;
    private $machineCode;
    private $toolingCode;
    private $processCode;
    private $ddl = "Q1JFQVRFIFRBQkxFIGBwYXJ0YCAoCiAgYHBhcnRfY29kZWAgdmFyY2hhcig0MCkgTk9UIE5VTEwsCiAgYGRlc2NyaXB0aW9uYCB2YXJjaGFyKDQ1KSBERUZBVUxUIE5VTEwsCiAgYHNvdXJjZWAgZW51bSgnTUFLRScsJ0JVWScpIERFRkFVTFQgTlVMTCBDT01NRU5UICdNYWtlIG9yIEJ1eScsCiAgYHNvdXJjZV9sZWFkX3RpbWVgIGludCgxMSkgREVGQVVMVCBOVUxMLAogIGBtZWFzdXJlbWVudF91bml0X2NvZGVgIHZhcmNoYXIoMTApIE5PVCBOVUxMLAogIGBwYXJ0X3R5cGVfY29kZWAgdmFyY2hhcigyMCkgTk9UIE5VTEwgQ09NTUVOVCAnUHJvZHVjdCwgQXNzZW1ibHksIENvbXBvbmVudCxSYXcnLAogIGBwYXJ0X2NhdGVnb3J5X2NvZGVgIHZhcmNoYXIoMjApIE5PVCBOVUxMIENPTU1FTlQgJ01hcmtldCBjbGFzcycsCiAgYHdhc3RhZ2VgIGZsb2F0IERFRkFVTFQgTlVMTCBDT01NRU5UICdXYXN0ZSByYXRpbycsCiAgYGJvbV9sZXZlbHNgIGludCgxMSkgREVGQVVMVCBOVUxMIENPTU1FTlQgJ0hpZXJhcmNoeSBkZXB0aCBvZiBpdHMgQk9NJywKICBQUklNQVJZIEtFWSAoYHBhcnRfY29kZWApLAogIEtFWSBgZmtfcGFydF9wYXJ0X3R5cGUxX2lkeGAgKGBwYXJ0X3R5cGVfY29kZWApLAogIEtFWSBgZmtfcGFydF9wYXJ0X2NhdGVnb3J5MV9pZHhgIChgcGFydF9jYXRlZ29yeV9jb2RlYCksCiAgS0VZIGBma19wYXJ0X3BhcnRfdW5pdF90eXBlMV9pZHhgIChgbWVhc3VyZW1lbnRfdW5pdF9jb2RlYCksCiAgQ09OU1RSQUlOVCBgZmtfcGFydF9wYXJ0X2NhdGVnb3J5MWAgRk9SRUlHTiBLRVkgKGBwYXJ0X2NhdGVnb3J5X2NvZGVgKSBSRUZFUkVOQ0VTIGBwYXJ0X2NhdGVnb3J5YCAoYHBhcnRfY2F0ZWdvcnlfY29kZWApIE9OIERFTEVURSBOTyBBQ1RJT04gT04gVVBEQVRFIE5PIEFDVElPTiwKICBDT05TVFJBSU5UIGBma19wYXJ0X3BhcnRfdHlwZTFgIEZPUkVJR04gS0VZIChgcGFydF90eXBlX2NvZGVgKSBSRUZFUkVOQ0VTIGBwYXJ0X3R5cGVgIChgcGFydF90eXBlX2NvZGVgKSBPTiBERUxFVEUgTk8gQUNUSU9OIE9OIFVQREFURSBOTyBBQ1RJT04sCiAgQ09OU1RSQUlOVCBgZmtfcGFydF9wYXJ0X3VuaXRfdHlwZTFgIEZPUkVJR04gS0VZIChgbWVhc3VyZW1lbnRfdW5pdF9jb2RlYCkgUkVGRVJFTkNFUyBgbWVhc3VyZW1lbnRfdW5pdGAgKGBtZWFzdXJlbWVudF91bml0X2NvZGVgKSBPTiBERUxFVEUgTk8gQUNUSU9OIE9OIFVQREFURSBOTyBBQ1RJT04KKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTU1FTlQ9J0ludmVudG9yeSBwYXJ0cyc=";

    public function setTaskCode($taskCode)
    {
        $this->taskCode = (string)$taskCode;
    }

    public function setName($name)
    {
        $this->name = (string)$name;
    }

    public function setDescription($description)
    {
        $this->description = (string)$description;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = (string)$startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = (string)$endDate;
    }

    public function setDepartmentCode($departmentCode)
    {
        $this->departmentCode = (int)$departmentCode;
    }

    public function setSetupTime($setupTime)
    {
        $this->setupTime = (float)$setupTime;
    }

    public function setMachineCode($machineCode)
    {
        $this->machineCode = (int)$machineCode;
    }

    public function setToolingCode($toolingCode)
    {
        $this->toolingCode = (int)$toolingCode;
    }

    public function setProcessCode($processCode)
    {
        $this->processCode = (int)$processCode;
    }

    public function setCycleTime($cycleTime)
    {
        $this->cycleTime = (float)$cycleTime;
    }

    public function getCycleTime()
    {
        return $this->cycleTime;
    }

    public function getTaskCode()
    {
        return $this->taskCode;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function getSetupTime()
    {
        return $this->setupTime;
    }

    public function getMachineCode()
    {
        return $this->machineCode;
    }

    public function getToolingCode()
    {
        return $this->toolingCode;
    }

    public function getProcessCode()
    {
        return $this->processCode;
    }

    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    public function getDdl()
    {
        return base64_decode($this->ddl);
    }

    public function getTableName()
    {
        return "task";
    }

    public function __construct($taskCode = null)
    {
        // $this->connect(DBHOST,DBUSER,DBPASSWORD,DBNAME,DBPORT);
        parent::__construct();
        if (!empty($taskCode)) {
            $this->select($taskCode);
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

    public function select($taskCode)
    {
        $sql = "SELECT * FROM task WHERE task_id={$this->parseValue($taskCode,'string')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->taskCode = $this->replaceAposBackSlash($rowObject->task_id);
            @$this->name = $this->replaceAposBackSlash($rowObject->name);
            @$this->description = $this->replaceAposBackSlash($rowObject->description);
            @$this->startDate = empty($rowObject->start_time) ? null : date(FETCHED_DATE_FORMAT, strtotime($rowObject->start_time));
            @$this->endDate = empty($rowObject->end_time) ? null : date(FETCHED_DATE_FORMAT, strtotime($rowObject->end_time));
            @$this->setupTime = (float)$rowObject->setup;
            @$this->cycleTime = (float)$rowObject->cycletime;
            @$this->processCode = $this->replaceAposBackSlash($rowObject->process_id);
            @$this->departmentCode = $this->replaceAposBackSlash($rowObject->department_id);
            @$this->machineCode = $this->replaceAposBackSlash($rowObject->machine_id);
            @$this->toolingCode = $this->replaceAposBackSlash($rowObject->tooling_id);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    public function delete($taskCode)
    {
        $sql = "DELETE FROM task WHERE task_id={$this->parseValue($taskCode,'string')}";
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
            $this->taskCode = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO task
            (task_id,name,description,start_time,end_time,setup,cycletime,process_id,department_id,machine_id,tooling_id)
            VALUES({$this->parseValue($this->taskCode, 'string')},
            {$this->parseValue($this->name, 'string')},
			{$this->parseValue($this->description, 'string')},
			{$this->parseValue($this->startDate, 'date')},
			{$this->parseValue($this->endDate, 'date')},
			{$this->parseValue($this->setupTime, 'string')},
			{$this->parseValue($this->cycleTime, 'string')},
			{$this->parseValue($this->processCode, 'string')},
            {$this->parseValue($this->departmentCode, 'string')},
            {$this->parseValue($this->machineCode, 'string')},
            {$this->parseValue($this->toolingCode, 'string')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->taskCode = $this->insert_id;
            }
        }
        return $result;
    }

    public function update($taskCode)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                task
            SET 
                name={$this->parseValue($this->name, 'string')},
                description={$this->parseValue($this->description, 'string')},
                start_time={$this->parseValue($this->startDate, 'date')},
                end_time={$this->parseValue($this->endDate, 'date')},
                setup={$this->parseValue($this->setupTime, 'string')},
                cycletime={$this->parseValue($this->cycleTime, 'string')},
                department_id={$this->parseValue($this->departmentCode, 'string')},
                machine_id={$this->parseValue($this->machineCode, 'string')},
                tooling_id={$this->parseValue($this->toolingCode, 'string')}
            WHERE
                task_id={$this->parseValue($taskCode, 'string')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($taskCode);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    public function updateCurrent()
    {
        if ($this->taskCode != "") {
            return $this->update($this->taskCode);
        } else {
            return false;
        }
    }

}

?>

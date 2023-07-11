<?php
// In this file we will have all Business Logic

require 'Modules/UserModule.php';

class Controller
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new model();
    }

    // When the localhost triggered,this function to show the UI,
    public function index()
    {
        require 'Views/IndexHome.php';
    }

    // This function creates DB Dynamically, by getting the value from input field
    public function createDatabase($dbName)
    {
        if ($dbName)
        {
            $this->userModel->createDB($dbName['dbname']);
            $_SESSION['dbname'] = $dbName['dbname'];
            header('location:/');
        }
        else
        {
            require "Views/createDB.view.php";
        }
    }

    // This fun is use to show the table form
    public function showTableForm()
    {
        $allDatabases =  $this->userModel->getDatabase();
        require "Views/table.view.php";
    }

    // This func is used to Create table in DB
    public function createTable($table)
    {
        if ($table) {

            $dbname = $table['database'];
            $tableName = $table['table-name'];

            $this->userModel->create_table($dbname, $tableName);

            $tableColumn = $table['column-name'];
            $tableDatatype = $table['data-type'];

            $count = count($tableColumn);

            for ($i = 0; $i<$count; $i++)
            {
                $this->userModel->addColumn($dbname, $tableName, $tableColumn[$i], $tableDatatype[$i]);
            }
            header('location:/');
        } else {
            $allDatabases =  $this->userModel->getDatabase();
            require "Views/table.view.php";
        }
    }

    public function getTableColumns($database, $table)
    {
        $this->createTable();
        $query = "SHOW COLUMNS FROM `$database`.`$table`";
        $result = $this->userModel->executeQuery($query);
        return $result->fetchAll(PDO::FETCH_COLUMN);
    }

    // This func is used to show a particular Row
    public function showRecordForm()
    {
        $allDBs = $this->userModel->getDatabase();
        require "Views/record.view.php";
    }
}

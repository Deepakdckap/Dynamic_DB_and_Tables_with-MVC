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

    public function getTable($dbname){
        $tableName= $this->userModel->gettableondb($dbname);
        echo json_encode($tableName);
    }

    public function getColumn($tablename){

        $column = $this->userModel->gettingcolumndb($tablename['table'],$tablename['dbname']);

        echo json_encode($column);

    }
    /**creating data dynamically by getting values in db**/
    public  function  create_data($data){
        if ($data){
            $this->userModel->insertIntoTable($data);
            header('location:/');
        }
        else{
            $databaseList = $this->userModel->getDatabase();

            require 'Views/columnData.view.php';
        }
    }
}

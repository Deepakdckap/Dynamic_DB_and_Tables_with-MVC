<?php
// In this file we will have all Database Logic
require 'connection.php';
class model extends Connection
{
    // creating DB via UI
    public function createDB($db)
    {
        $this->db->query("CREATE DATABASE $db");
    }

    public function getDatabase()
    {
        return $this->db->query("SHOW DATABASES")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_table($dbName,$tableName)
    {
        $this->db->query("
        USE $dbName;
        CREATE TABLE $tableName (
        id int NOT null AUTO_INCREMENT,
        PRIMARY KEY(id)
        )
        ");
    }

    public function addColumn($dbname,$table_name,$table_column,$table_datatype)
    {
        $this->db->query("
            USE $dbname;
            ALTER TABLE $table_name ADD COLUMN $table_column $table_datatype;
        ");
    }

    public function gettableondb($dbname){
        $tablename=$this->db->query("SELECT TABLE_NAME AS tableNames,TABLE_SCHEMA 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$dbname';")->fetchAll(PDO::FETCH_OBJ);
        return $tablename;
    }

    public function gettingcolumndb($tablename,$dbname){
        $column = $this->db->query("SELECT `COLUMN_NAME` 
        FROM `INFORMATION_SCHEMA`.`COLUMNS` 
        WHERE `TABLE_SCHEMA`='$tablename' 
        AND `TABLE_NAME`='$dbname'")->fetchAll(PDO::FETCH_OBJ);

        return $column;
    }

    public function insertIntoTable($data)
    {
        var_dump($data);
        $dbName = $data['dbname'];

//        $this->db->query("INSERT INTO ");

    }
}
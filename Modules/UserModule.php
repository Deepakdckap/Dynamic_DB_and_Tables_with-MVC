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

    public function getDatabase(){
        return $this->db->query("SHOW DATABASES")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_table($dbName,$tableName){
        $this->db->query("
        USE $dbName;
        CREATE TABLE $tableName (
        id int NOT null AUTO_INCREMENT,
        PRIMARY KEY(id)
        )
        ");
    }


    public function addColumn($dbname,$table_name,$table_column,$table_datatype){
        $this->db->query("
        USE $dbname;
        ALTER TABLE $table_name ADD COLUMN $table_column $table_datatype;
        ");
    }
}
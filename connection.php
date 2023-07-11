<?php

class Connection
{
    public $db;

    public function __construct()
    {
        try{
            $this->db = new PDO(
                'mysql:host=localhost',
                'admin',
                'welcome');
        }
        catch (Exception $e){;
            die($e->getMessage());
        }
    }
}
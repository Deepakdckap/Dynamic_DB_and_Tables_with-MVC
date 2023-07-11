<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'Router.php';


$router = new Router();

$router->get('/', 'default');
$router->post('/createDB', 'createDB');
$router->post("/addTable","addTable");
$router->post("/createTable","createTable");
$router->get('/addRow','addRow');




$router->handleRequest();
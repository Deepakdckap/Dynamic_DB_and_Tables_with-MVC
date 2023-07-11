<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'Router.php';

//unset($_SESSION['dbname']);
$router = new Router();

$router->get('/','default');
$router->post('/createDB','createDB');
$router->post('/addTable','addTable');
$router->post('/createTable','createTable');

$router->post('/create_data', 'create_data');


$controllers = new Controller();

if(isset($_POST['aid'])){
    $controllers->getTable($_POST['aid']);

}
if(isset($_POST['table']) ){
    $controllers->getColumn($_POST);
}

$router->handleRequest();
<?php

require 'Controllers/UserController.php';
//$controllers = new controller();

class Router
{
    public $router = array();
    public $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function get($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
            'middleware' => null
        ];
        return $this;
    }

    public function post($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST',
            'middleware' => null
        ];
        return $this;
    }

    public function delete($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'DELETE',
            'middleware' => null
        ];
        return $this;
    }

    public function patch($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'PATCH',
            'middleware' => null
        ];
        return $this;
    }

    public function handleRequest()
    {
        foreach ($this->router as $route)
        {
            if($route['uri'] === $_SERVER['REQUEST_URI'])
            {
                $action = $route['action'];
                 switch ($action)
                {
                    case 'createDB':
                        $this->controller->createDatabase($_POST);
                        break;
                     case 'addTable':
                         $this->controller->showTableForm();
                         break;
                     case 'createTable':
                         $this->controller->createTable($_POST);
                         break;
                     case 'create_data':
                         $this->controller->create_data($_POST);
                         break;
                    default :
                        $this->controller->index();
                }
            }
        }
        die();
    }
}
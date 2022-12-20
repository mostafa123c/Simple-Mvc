<?php 

namespace MVC\core;
class app 
{
    private $controller;
    private $method;
    private $params =[];
    public function __construct()
    {
        $this->url();
        $this->render();
    }

    //get url

    private function url()
    { 
        if (!empty($_SERVER["QUERY_STRING"])) {
        $url = explode("/", $_SERVER["QUERY_STRING"]);
        // class(controller)
        $this->controller = isset($url[0]) ? $url[0] : "home";
        // method
        $this->method = isset($url[1]) ? $url[1] : "index";
        //parameters
        unset($url[0], $url[1]);
        $this->params = array_values($url);
    } 
    else {
        $this->controller = "home";
        $this->method = "index";
    }
   } 


    //render methods

    private function render()
    {
        $controller = "MVC\controllers\\" . $this->controller . "Controller";

        if (class_exists($controller)) {

            $controller = new $controller;

            if (method_exists($controller, $this->method)) {

                call_user_func_array([$controller, $this->method],$this->params);
            } else {
                echo "method doesn't extist ";
            }
        } else {
            echo "controller doesn't extist ";
        }

    
        
    }

}
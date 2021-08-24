<?php

namespace itrax\core;

class app
{
    private $controller;
    private $method;
    private $param = [];

    function __construct()
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
            $this->param = array_values($url);
        } else {
            $this->controller = "home";
            $this->method = "index";
        }
    }

    //render methods
    private function render()
    {
        $controller = "itrax\\controllers\\" . $this->controller . "Controller";

        if (class_exists($controller)) {

            $controller = new $controller;

            if (method_exists($controller, $this->method)) {

                call_user_func_array(array($controller, $this->method), $this->param);
            } else {
                echo "method doesn't extist ";
            }
        } else {
            echo "controller doesn't extist ";
        }
    }
}

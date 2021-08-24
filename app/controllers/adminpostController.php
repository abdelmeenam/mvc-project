<?php

namespace itrax\controllers;

use itrax\core\basecontroller;
use itrax\core\session;

class adminpostController extends basecontroller
{
    public function __construct()
    {
        session::start();
        $userdata = session::get('user');
        if (empty($userdata)) {
            echo "class not access";
            die;
        }
    }
    public  function index()
    {
        $this->view('back/article', ['title' => "home"]);
    }
}

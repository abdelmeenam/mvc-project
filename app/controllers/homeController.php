<?php

namespace itrax\controllers;

use itrax\core\basecontroller;
use itrax\models\category;

class homeController extends basecontroller
{
    public function index()
    {
        $cat = new category;
        $data = $cat->GetAllCats();
        $this->view('front/index', ['title' => "home", 'data' =>  $data]);
    }


    public function details()
    {
        $this->view('front/details', ['title' => "home"]);
    }
}

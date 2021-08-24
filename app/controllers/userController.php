<?php

namespace itrax\controllers;

use itrax\core\basecontroller;
use itrax\models\user;
use GUMP;
use itrax\core\session;
use itrax\core\helper;

class userController extends basecontroller
{
    public function __construct()
    {
        session::start();
    }

    public function index()
    {
        echo "INDEX";
    }

    //-------------------------------------------------------------------login
    public function login()
    {
        return $this->view("front/login", ['title' => "Log in"]);
    }
    public function postlogin()
    {
        $gump = GUMP::is_valid($_POST, [
            'email' => 'required'
        ]);
        if ($gump == true) {
            $user = new user();
            $userdata = $user->GetUserData($_POST['email'], $_POST['password']);
            session::set('user', $userdata);
            helper::redirect('adminpost/index');
        }
    }

    public function Logout()
    {
        session::end();
    }
}

<?php

namespace itrax\models;

use PDO;

use itrax\core\basemodel;


class user extends basemodel
{
    public function GetAllUsers()
    {
        // $data = basemodel::db()->run("SELECT * FROM product2")->fetchall(PDO::FETCH_ASSOC);
        $data = $this->db()->run("SELECT * FROM users")->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetUserData($email, $password)
    {
        $data = $this->db()->row("SELECT * FROM `users` WHERE `email`=? && `password` = ?", [$email, $password]);
        return $data;
    }

    public  function InsertUser($name, $email, $password)
    {
        $id = $this->db()->insert('users', ['name' => $name, 'email' => $email, 'password' => $password]);
        return $id;
    }
}

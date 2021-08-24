<?php

namespace itrax\models;

use PDO;

use itrax\core\basemodel;


class category extends basemodel
{

    //Select-------------------------------------------------------------------
    public function GetAllCats()
    {
        // $data = basemodel::db()->run("SELECT * FROM product2")->fetchall(PDO::FETCH_ASSOC);
        $data = $this->db()->run("SELECT * FROM category")->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    //delete-------------------------------------------------------------------
    public function delete($id)
    {
        $data = $this->db()->deleteById('category', $id);
        return $data;
    }

    //Insert-------------------------------------------------------------------
    public function insert($name, $img, $icon, $user_id)
    {
        $id = $this->db()->insert('category', ['name' => $name, 'img' =>  $img, 'icon' => $icon, 'user_id' => $user_id]);
    }

    //Update-------------------------------------------------------------------
    public function getcat($id)
    {
        $data = $this->db()->row("SELECT * FROM category where `id`=$id");
        return $data;
    }

    public function update($table, $data, $id)
    {
        $data = $this->db()->update($table, $data, $id);
        return $data;
    }
}

<?php

namespace itrax\controllers;

use itrax\core\basecontroller;
use itrax\core\helper;
use itrax\core\session;
use itrax\models\category;
use stdObject;

class admincategoryController extends basecontroller
{
    public $userdata;
    public $category;

    public function __construct()
    {
        session::start();
        $this->userdata = session::get('user');
        if (empty($this->userdata)) {
            echo "class not access";
            die;
        }
        $this->category = new category();
    }

    //Select-------------------------------------------------------------------
    public  function index()
    {
        $Categorydata = $this->category->GetAllCats();
        $this->view('back/category', ['title' => "home", 'data' => $Categorydata]);
    }

    //delete-------------------------------------------------------------------
    public  function delete($id)
    {
        $Categorydata = $this->category->delete($id);
        if ($Categorydata) {
            helper::redirect('admincategory/index');
        }
    }

    //Add-------------------------------------------------------------------
    public function add()
    {

        $this->view('back/addcategory', ['title' => "Add Category"]);
    }

    public function postadd()
    {
        $name = $_POST['name'];
        $icon = $_POST['icon'];

        //upload image
        $old_Location = $_FILES['image']['tmp_name'];
        $photo_type = $_FILES['image']['type'];
        $photo_arr = explode('/', $photo_type);
        $photo_exploded_type = $photo_arr[1];
        $img = $name . "." . $photo_exploded_type;

        //id of signed in user
        $user_id = $this->userdata->id;

        //DB
        $Categorydata = $this->category->insert($name, $img, $icon, $user_id);
        move_uploaded_file($old_Location,  'img/' . $img);
        helper::redirect('admincategory/index');
    }
    //Update-------------------------------------------------------------------
    public function update($id)
    {
        $Categorydata = $this->category->getcat($id);                //collect data of specific roe first
        $this->view('back/updatecategory', ['title' => "Add Category", 'data' => $Categorydata]);
    }

    public function postupdate()
    {
        //photo
        $tmp = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];    //photo.ext (full name of photo)
        $error = $_FILES['image']['error'];
        $photo_type = $_FILES['image']['type'];
        //variables
        $catname = $_POST['name'];

        if ($error) {
            $data = ['name' => $_POST['name'], 'icon' => $_POST['icon']];
            helper::redirect('admincategory/index');
        } else {
            //no error => photo is uploaded // so you insert all new data
            //handling photo name

            $photo_arr = explode('/', $photo_type);
            $photo_exploded_type = $photo_arr[1];
            $img = $catname . "." . $photo_exploded_type;
            move_uploaded_file($tmp,  'img/' . $img);
            $data = ['name' => $_POST['name'], 'icon' => $_POST['icon'], 'img' => $img];
        }

        $Categorydata = $this->category->update('category', $data, ['id' => $_POST['id']]);
        if ($Categorydata) {
            helper::redirect('admincategory/index');
        }
    }
}

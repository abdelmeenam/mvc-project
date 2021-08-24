<?php

namespace itrax\core;

use Dcblogdev\PdoWrapper\Database;

class basemodel
{
    public function db()
    {

        $options = [
            //required
            'username' => USERNAME,
            'database' => DATABASE,
            //optional
            'password' => PASSWORD,
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => SERVER,
            'port' => '3306'
        ];
        return $db = new Database($options);
    }
}

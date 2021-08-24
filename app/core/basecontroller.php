<?php

namespace itrax\core;

use Dcblogdev\PdoWrapper\Database;

class basecontroller
{
    public function view($path, $t)
    {
        // $title = $t;
        extract($t);
        require VIEWS . $path . ".php";
    }
}

<?php

namespace itrax;

require_once "../vendor/autoload.php";

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR);
define('controllers', dirname(__DIR__) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR);


//config
define('SERVER', "localhost");
define('USERNAME', "root");
define('PASSWORD', "");
define('DATABASE', "news");
define('DOMAIN_NAME', "http://news.com/");
define('CSSPATH', DOMAIN_NAME . '/');
// echo DOMAIN_NAME;


use itrax\controllers\userController;
use itrax\controllers\homeController;
use itrax\core\app;
use itrax\core\session;

$c = new app();

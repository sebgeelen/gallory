<?php
ini_set('display_errors', E_ALL^E_NOTICE);
$rootPath =  dirname(__FILE__);
set_include_path(get_include_path() . PATH_SEPARATOR . $rootPath);
require_once 'mvc/controller/gaMainController.php';

// do the routing
$controller = new mainController();
$query = isset($_GET['q']) ? $_GET['q'] : null;
$controller->route($query);

?>

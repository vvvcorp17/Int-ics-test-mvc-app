<?php

require_once "../vendor/autoload.php";
set_error_handler(array(new \App\Handlers\Error(), "errorHandler"));

session_start();

$home = new \App\Router();
$home->run();
<?php
$config = include_once "./routes.php";
include_once "./Router.php";
include_once "./Request.php";
include_once "./sercurity/AdminFilter.php";
session_start();
if(Request::uri() !== Environment_Config::$rootFolder."/login" && Request::method() == "POST")
    AdminFilter::handle();
$router = new Router(RoutesConfig::getRoutesConfig());
try {
    $router->direct(Request::method(),Request::uri());
} catch (Exception $e) {
    die($e);
}

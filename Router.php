<?php

use controller\StaffController;

require_once "./controller/StaffController.php";

class Router extends StaffController
{
    protected array $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }
    public function direct(string $method, string $uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            if(array_key_exists($method, $this->routes[$uri])){
                return call_user_func($this->routes[$uri][$method]);
            }
            else {
                throw new Exception('No method defined for this URI.');
            }
        } else {
            throw new Exception('No route defined for this URI.');
        }
    }
}

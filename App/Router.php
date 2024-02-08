<?php

declare(strict_types=1);

namespace App;

class Router
{
    private $routes = [];

    public function register(string $requestMethod, string $route, callable|array $action)
    {
        $this->routes[$requestMethod][$route] = $action;
    }

    public function get(string $route, callable|array $action)
    {
        $this->register("get", $route, $action);
    }
    public function post(string $route, callable|array $action)
    {
        $this->register("post", $route, $action);
    }

    public function reslove(string $requestUri, string $requestMethod)
    {
        $uri = explode("?", $requestUri)[0];
        $action = $this->routes[$requestMethod][$uri] ?? null;

        // if ($action === null) {
        //     View::make("Exceptions/notfound");
        // }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $obj = new $class;
                if (method_exists($obj, $method)) {
                    return call_user_func([$obj, $method]);
                }
            }
        }
        View::make("Exceptions/notfound");
        // throw Exceptions\NotFound();
        
    }
}

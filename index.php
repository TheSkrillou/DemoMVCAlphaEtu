<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'autoload.php';

class Router
{
    private $routes = [];
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = trim($prefix, '/');
    }

    public function addRoute($uri, $controllerMethod)
    {
        $this->routes[trim($uri, '/')] = $controllerMethod;
    }

    public function route($url)
    {

        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix) + 1);
        }

        $url = trim($url, '/');

        $urlParts = explode('/', $url);

        if (count($urlParts) === 2 && $urlParts[0] === 'tasks') {
            $id = $urlParts[1];

            if (filter_var($id, FILTER_VALIDATE_INT) && $id > 0) {
                $controller = new TaskController();
                $controller->show($id); 
                return; 
            } else {
                // ID invalide -> 404
                http_response_code(404);
                require_once 'views/404.php';
                return;
            }
        }

        if (array_key_exists($url, $this->routes)) {
            list($controllerName, $methodName) = explode('@', $this->routes[$url]);
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            http_response_code(404);
            require_once 'views/404.php';
        }
    }
}

// Instanciation du routeur
$router = new Router('DemoMVCAlpha');

// Ajout des routes
$router->addRoute('', 'HomeController@index'); // Pour la racine
$router->addRoute('tasks', 'TaskController@index'); // Pour la racine
$router->addRoute('about', 'AboutController@index'); // Pour la page "À propos"

// Appel de la méthode route
$router->route(trim($_SERVER['REQUEST_URI'], '/'));

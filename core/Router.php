<?php

/**
 * class Router
 * 
 * create routes and find controllers
 */
class Router {

    private $request;

    private static $rout = [];
    private $routes = [];

    public function routes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    public static function route($route) {
        return self::$routes[$route];
    }

    public static function setRoute($url, $controller, $method, $vars = "") {
        // $vars correspond aux noms des variables présent dans l'url
        if(!is_string($url) || empty($url) || !is_string($controller) || empty($controller) || !is_string($method) || empty($method)) {
            // ce controllers ne doit pas concerner $vars
            throw new InvalidArgumentException("Les arguments doivent tous êtres des chaînes de caractères non vides !", 1);
        }
        self::$rout[$url] = [
            "controller" => $controller,
            "method" => $method,
            "vars" => $vars
        ];
    }

    public function __construct($request) {
        $this->request = $request;
        $this->routes = self::$rout;
    }

    public function getRoute() {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams() {

        $params = null;

        // extract GET params
        $elements = explode('/', $this->request);
        unset($elements[0]);
        
        for($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = htmlspecialchars($elements[$i+1]);
            $i++;
        }

        // extract POST params
        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $val;
            }
        }

        
        $matches = preg_match('`^'.$this->request.'$`', $this->request, $matches);

        echo '<pre>'; print_r($elements);
        echo '<pre>'; print_r($matches); exit;
        return $params;
    }

    public function renderController() {

        $route = '/'.$this->getRoute();
        $params = $this->getParams();

        if(key_exists($route, $this->routes)) {
            
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);
        }
        else {
            // echo "404";
            // print_r($this->routes);
            $error404 = new Error404();
            $error404->render();
        }
    }

    public function redirect($redirect, $request) {
        if(key_exists($request, $this->routes)) { 
            header("Location: ".HOST.$redirect);
            exit;
        }
    }
}
<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
        }

        // Menghapus dua elemen pertama dari array $url
        array_shift($url);
        array_shift($url);

        $this->params = $url;

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }


    // public function parseURL() {
    //     $request = $_SERVER['REQUEST_URI'];
    //     $script = $_SERVER['SCRIPT_NAME'];
    
    //     // Remove script path from request URI
    //     if (strpos($request, $script) === 0) {
    //         $request = substr($request, strlen($script));
    //     }
    
    //     // Remove leading and trailing slashes
    //     $request = trim($request, '/');
    
    //     // Split the request into parts
    //     $url = explode('/', $request);
    
    //     // Filter out empty parts
    //     $url = array_filter($url);
    
    //     return $url;
    // }
}

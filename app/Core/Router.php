<?php 

class Router {

    private $routes = [] ;

    public static function make($routes) {
        $router = new self ;
        $router->routes = $routes ;
        return $router ;
    }

    public function resolve($uri){
        if (array_key_exists($uri , $this->routes)) {
            require $this->routes[$uri] ;
        } else {
            throw new ErrorException('Not Valid page !');
        }
        
    }
}
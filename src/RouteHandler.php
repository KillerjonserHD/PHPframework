<?php


namespace SITE;


class RouteHandler
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function set_route(string $route, string $file, array $data=[]) : void
    {
        $this->routes[$route] = new Route($file, $data);
    }

    public function get_file_and_data_by_url(string $url) : array
    {
        foreach($this->routes as $r_url=>$route)
        {
            $regex = "~^$url/?$~i";

            if(!preg_match($regex, $r_url))
            {
                continue;
            }
            return [
                'file'=>$route->get_file(),
                'data'=>$route->get_data()
            ];
        }
        return [
            'file'=>__DIR__.'/view/error.html',
            'data'=> [
                'error'=>'404',
                'error_message'=>'Not Found'
            ]
        ];
    }
}
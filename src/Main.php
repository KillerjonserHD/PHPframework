<?php


namespace SITE;



use PDO;


class Main
{
    public function __construct()
    {
        $route_handler = new RouteHandler();
        $render_handler = new RenderHandler();
        $route_handler->set_route('/', __DIR__.'/view/example.html');

        $request_url = $_SERVER['REQUEST_URI'];
        $site = $route_handler->get_file_and_data_by_url($request_url);

        echo $render_handler->render($site['file'], $site['data']);
    }
}
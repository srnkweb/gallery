<?php
namespace gallery\core;
use gallery\classes;

class Route
{
    public static function start()

    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);


        $ctrl = (empty($_GET['ctrl'])) ?  'Image' : $_GET['ctrl'];
        $act = (empty($_GET['act'])) ?   'one' : $_GET['act'];

        $params = array();
        if ($_SERVER['REQUEST_URI'] != '/') {


            $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_parts = explode('/', trim($url_path, ' /'));

            $ctrl = array_shift($uri_parts);
            $act = array_shift($uri_parts);
            $_GET['img'] = array_shift($uri_parts);

        }

        $controllerClassName = 'gallery\controllers\\' . $ctrl . 'Controller';
        $controller = new $controllerClassName;
        $method = 'action' . $act;
        $data = $controller->$method();


        $view = new view();
        $view->generate('gallery.php', 'template.php', $data);

    }
}



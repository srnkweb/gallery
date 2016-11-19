<?php
namespace gallery\classes;

class Parseurl
{
    public static function routing()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $ctrl = 'Image';
        $act = 'one';

        $params = array();

        if ($_SERVER['REQUEST_URI'] != '/') {
            try {
                $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri_parts = explode('/', trim($url_path, ' /'));

                if (count($uri_parts) % 2) {
                    throw new \Exception();
                }
                $module = array_shift($uri_parts);
                $action = array_shift($uri_parts);

                for ($i = 0; $i < count($uri_parts); $i++) {
                    $params[$uri_parts[$i]] = $uri_parts[++$i];
                }
            } catch (\Exception $e) {
                $ctrl = '404';
                $act = 'main';
            }
        }
        echo "\$module: $ctrl\n";
        echo "\$action: $act\n";
        echo "\$params:\n";
        print_r($params);
    }
}
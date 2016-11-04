<?php
namespace gallery\core;

class Route
{
	public static function start()

	{
		$ctrl = 'Image';
		$act = "Default";
//		$url = $_SERVER['REQUEST_URI'];
//		$urlValue = explode('?', $url);
//		$urlValue = explode('&', $urlValue[1]);
//		var_dump($urlValue);
//		var_dump($_REQUEST['ctrl']);

		$controllerClassName = 'gallery\controllers\\' . $ctrl .'Controller';
		$controller = new $controllerClassName;
		$method = 'action' . $act;
		$data = $controller->$method();

		$view = new view();
		$view->generate('gallery.php', 'template.php', $data);
	}
}



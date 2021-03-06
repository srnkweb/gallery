<?php
//namespace gallery\core;
//namespace gallery\controllers;
require_once __DIR__ . "/../controllers/UserController.php";
require_once __DIR__ . "/../controllers/ImageController.php";

class Route
{
	public static function start()
	{
		$ctrl[] = isset($_GET['headctrl']) ? $_GET['headctrl'] : 'User';
		$act[] = isset($_GET['headact']) ? $_GET['headact'] : 'auth';

		$ctrl[]= isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Image';
		$act[] = isset($_GET['act']) ? $_GET['act'] : 'Default';

		$res = array_combine($ctrl, $act );
		$data = self::getKey($res);
		var_dump($data);

		$view = new view();
		$view->generate('gallery.php', 'template.php', $data);


//		$controllerClassName = $ctrl . '_controller';
//		require_once __DIR__ . '/../controllers/' . $controllerClassName . '.php';
//		$controller = new $controllerClassName;
//		$method = 'action' . $act;
//		$controller->$method();
	}

	public static function getKey($res)
	{
		foreach($res as $ctrl => $act){
			$controllerClassName = $ctrl . 'Controller';
			require_once __DIR__ . '/../controllers/' . $controllerClassName . '.php';
			$controller = new $controllerClassName;
			$method = 'action' . $act;
			$data[] = $controller->$method();
		}
		return $data;
	}

}


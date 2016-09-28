<?php
namespace gallery\controllers;
use gallery\models\Images;
//require_once __DIR__ . "/../models/Images.php";
//require_once __DIR__ . "/../core/view.php";
//require_once __DIR__ . "/../core/route.php";

class ImageController
{

	public function actionPrev()
	{
		if ($_GET['img'] <= 1 ){
			$_GET['img'] = 1;
		}
		return self::takeImages();
	}

	public function actionNext()
	{

		if ($_GET['img'] >= 2){
			$_GET['img'] = 2;
		}
		return self::takeImages();
	}

	public function actionDefault()
	{
		if ($_GET['img'] <= 0){
			++$_GET['img'];
		}
		return self::takeImages();
	}

	private static function takeImages()
	{
		return  Images::getImagesById();
//		$view = new view();
//		$view->generate('gallery.php', 'template.php', $data);

	}
}

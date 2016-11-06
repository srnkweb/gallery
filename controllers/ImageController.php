<?php
namespace gallery\controllers;
use gallery\models\Images;
use gallery\classes;


class ImageController
{

	public function actionOne()
	{
		//$act = 'deflt';
		classes\paginator::pagination();
		$obg = new classes\paginator();
		$data[] = $obg ->requirePointer($obg);
		return $data = self::takeImages($data);
	}

	private static function takeImages($data)
	{

		$data[1] =  Images::getImagesById();
		return $data;
	}
}

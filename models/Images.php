<?php
//namespace gallery\models;
//require_once __DIR__ . "/../core/DB.php";
require_once __DIR__ . "/AbstractModel.php";

class Images extends AbstractModel
{
	public static function getImagesById()
	{
		$sql = "SELECT id, url, alt  FROM images WHERE id=:img";
		$binParam = [[':img' => $_GET['img']]];
		$class = 'Images';

		parent::connectDB();
		return parent::query($sql, $class, $binParam);
	}
}


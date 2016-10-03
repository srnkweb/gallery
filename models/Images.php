<?php
namespace gallery\models;
use gallery\core;
//require_once __DIR__ . "/../core/DB.php";
//require_once __DIR__ . "/AbstractModel.php";

class Images
{
	public static function getImagesById()
	{
		$sql = "SELECT id, url, alt  FROM images WHERE id=:img";
		$binParam = [[':img' => $_GET['img']]];
		$class = __CLASS__;
		$dbh = new core\DB();
		$dbh->connectDB();
		return $dbh->query($sql, $class, $binParam);
	}
}


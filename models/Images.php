<?php
namespace gallery\models;
use gallery\core;


class Images
{
	public static function getImagesById()
	{
		$sql = "SELECT id, url, alt  FROM images WHERE id=:img";
		$binParam = [':img' => $_GET['img']];
		$class = __CLASS__;
		$dbh = core\DB::instance();
		return $dbh->query($sql, $class, $binParam);
	}
}


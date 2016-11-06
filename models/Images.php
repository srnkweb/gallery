<?php
namespace gallery\models;

use gallery\core;
use gallery\classes;


class Images
{
    public static function getImagesById()
    {
        $sql = "SELECT id, url, alt  FROM images WHERE id=:img";
        $binParam = [':img' => $_GET['img']];
        $class = __CLASS__;
        $dbh = core\DB::instance();
        $data = $dbh->query($sql, $class, $binParam);
        return $data;
    }
}


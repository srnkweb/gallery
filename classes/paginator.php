<?php

namespace gallery\classes;
use gallery\core;


class paginator
{
    public $left;
    public $right;
    
    public static function pagination()
    {
        $minLimit = 1;
        $maxLimit = self::maxLimit();
        self::scrolling($minLimit, $maxLimit);
    }

    public static function maxLimit()
    {
        $sql = "SELECT COUNT(*) FROM images";
        $class = __CLASS__;
        $dbh = core\DB::instance();
        $data = $dbh->query($sql, $class);
        return TransformObj::objectToArrayValue($data);
    }

    public static function scrolling($minLimit, $maxLimit)
    {
        self::scrollLimit($minLimit, $maxLimit);
    }

    public static function scrollLimit($minLimit, $maxLimit)
    {
        if ($_GET['img'] <= $minLimit) {
            $_GET['img'] = $minLimit;
            return;
        }else{
            if ($_GET['img'] >= $maxLimit){
                $_GET['img'] = $maxLimit;
            }
        }
    }

    public static function leftPointer()
    {
        $minLimit = 1;
        if ($_GET['img'] <= $minLimit){
            return false;
        }else{
            return true;
        }

    }

    public static function rightPointer()
    {
        $maxLimit = self::maxLimit();
        if ($_GET['img'] >= $maxLimit){
            return false;
        }else{
            return true;
        }
    }

    public function requirePointer($obj)
    {   $left = self::leftPointer();
        $right = self::rightPointer();
        if (true === $left){
            $this->left = '/../template/scrlleft.php';
        }else{
            $this->left = '/../template/scrlcapleft.php';
        }
        if (true === $right){
            $this -> right = '/../template/scrlright.php';
        }else{
            $this -> right = '/../template/scrlcapright.php';
        }
        return $obj;
    }
}
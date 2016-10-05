<?php
namespace gallery\traits;
trait Singleton
{
    protected static $instance;

    protected function __construct()
    {
    }

    public static function instance()
    {
      if (null === static::$instance){
          return static::$instance = new static;
      }
        return static::$instance;
    }
}
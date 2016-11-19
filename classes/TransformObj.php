<?php

namespace gallery\classes;

class TransformObj
{
    public static function objectToArrayKeyValue($data)
    {
        if (is_array($data) || is_object($data)){
            foreach ($data as $key => $value){
                $result[$key] = $value;
            }
            return $result;
        }
    }
    
    public static function objectToArrayValue($data)
    {
        foreach ($data as $value)
        {
          $result = $value;   
        }
        return $result;
    }
}
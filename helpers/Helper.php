<?php


namespace app\helpers;


class Helper
{
    public function array_get(array $array, string $key, $default = null){
        return isset($array[$key]) ? $array[$key] : $default;
    }
}
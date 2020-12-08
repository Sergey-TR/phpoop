<?php

namespace app\interfaces;

interface IModel
{
    public static function getAll();
    public static function getOne ($id);
    public function insert();
    public function delete();

}
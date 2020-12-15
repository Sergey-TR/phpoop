<?php

namespace app\interfaces;

interface IModel
{
    public static function getAll();
    public static function getOne ($id);
}
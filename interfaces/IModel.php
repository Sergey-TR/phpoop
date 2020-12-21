<?php

namespace app\interfaces;

interface IModel
{
    public function getAll();
    public function getOne ($id);
}
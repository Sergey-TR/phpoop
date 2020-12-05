<?php

namespace app\interfaces;

interface IModel
{
    public function getAll();
    public function getOne ($id);
    //public function reviewText ($id);
    public function insert();
    public function delete();

}
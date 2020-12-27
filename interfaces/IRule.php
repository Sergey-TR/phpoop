<?php


namespace app\interfaces;


interface IRule
{
    function check($value): bool;
}
<?php


namespace app\engine\validator;


use app\interfaces\IRule;

class NotBlank implements IRule
{
    public function check($value): bool
    {
        return mb_strlen(trim($value)) > 0;
    }


    public function getVars()
    {
        return [];
    }

    public function __toString()
    {
        return 'notblank';
    }
}
<?php


namespace app\engine\validator;


use app\interfaces\IRule;

class Eqal implements IRule
{
    public $password;
    public $pass_repeat;

    public function __construct($password, $pass_repeat)
    {
        $this->password = $password;
        $this->pass_repeat = $pass_repeat;
    }


    public function check($value): bool
    {
        $len = mb_strlen(trim($value)) > 0;
        if($len && $this->password === $this->pass_repeat) {
            return true;
        } else {
            return false;
        }
    }

    public function getVars()
    {
        return [];
    }

    public function __toString()
    {
        return 'eqal';
    }
}
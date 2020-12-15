<?php


namespace app\engine\validator;
use app\engine\validator\NotBlank;
use app\engine\validator\Eqal;

class Validator
{
    protected $errors = [];
    protected $data;

    public function __construct(array $data) {
        $this->data = $data;
//        echo "<pre>";
//        var_dump($this->data);
    }

    public function rules(): array {
        return [
            'csrf_token' => [new NotBlank()],
            'login' => [new NotBlank],
            'email' => [new NotBlank],
            'password' => [new NotBlank],
            'pass_repeat' => [new Eqal ($this->data['password'], $this->data['pass_repeat'])]
        ];
    }

    protected function addError($field, $fieldName, $message, $vars)
    {
        $replace = [];
        $replace[':field'] = $fieldName;
        $replace = array_merge($replace, $vars);

        $this->errors[$field] = strtr($message, $replace);
    }

    public function validate(): array
    {
        $rules = $this->rules();

        $data  = $this->data;

        $messages = [
            'rule' => [
                'notblank'  => 'Поле \':field\' не может быть пустым!',
                'eqal' => 'Пароли должны совпадать!'
            ],
            'field' => [
                'login' => 'LOGIN',
                'email' => 'email',
                'password' => 'PASSWORD',
                'pass_repeat' => ''
            ]
        ];

        foreach( $data as $field => $value )
        {
            $rulesForParam = $rules[$field];

            foreach ($rulesForParam as $rule ) {

                if( !$rule->check($value) ) {
                    $this->addError(
                        $field,
                        $messages['field'][$field],
                        $messages['rule'][(string) $rule],
                        $rule->getVars()
                    );
                }
            }
        }

        return $this->errors;
    }
}

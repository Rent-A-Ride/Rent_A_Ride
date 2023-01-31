<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $phoneno;
    public string $gender;
    public string $password;
    public string $passwordConfirm;

    public function register()
    {
        echo 'Creating a new user';
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
        ];
    }
}
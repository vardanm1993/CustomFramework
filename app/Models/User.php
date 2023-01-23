<?php

namespace App\Models;

use Core\Model;
use Core\Validator;

class User extends Model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirmPassword;


    public function register()
    {

        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => [Validator::RULE_REQUIRED,[Validator::RULE_MIN, 'min' => 8]],
            'lastname' => [Validator::RULE_REQUIRED],
            'email' => [Validator::RULE_REQUIRED, Validator::RULE_EMAIL],
            'password' => [Validator::RULE_REQUIRED, [Validator::RULE_MIN, 'min' => 8],[Validator::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [Validator::RULE_REQUIRED, [Validator::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
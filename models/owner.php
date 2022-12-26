<?php

namespace app\models;

use app\core\Request;
use app\core\Response;
use app\core\Database;



class owner
{
    private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
        $this->pdo = Database::getInstance()->pdo;
        $this->body= $registerBody;


    }

    public function login():array|object
    {
        $errors = [];
        $owner = null;

        if (!filter_var($this->body['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Email must be a valid email address';
        }
        else {
            $sql = "SELECT * FROM users WHERE email=:email";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(':email',$this->body["email"]);

            $statement->execute();
            $owner= $statement->fetchObject();
            if(!$owner){
                $errors['email'] = 'Email does not exsits, please create an account';
            }
            elseif (!password_verify($this->body['password'],$owner->password))
            {
                $errors['password']='Password is incorrect';
            }



        }
        if (empty($errors)){
            return $owner;
        }
        return $errors;
    }



}
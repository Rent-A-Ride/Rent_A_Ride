<?php

namespace app\models;

use app\core\Request;
use app\core\Response;
use app\core\Database;



class vehicle_Owner
{
    private \PDO $pdo;
    private array $body;

    public function __construct(array $registerBody=[])
    {
        $this->pdo = Database::getInstance()->pdo;
        $this->body= $registerBody;


    }

    // public function login():array|object
    // {
    //     $errors = [];
    //     $owner = null;

    //     if (!filter_var($this->body['email'],FILTER_VALIDATE_EMAIL))
    //     {
    //         $errors['email'] = 'Email must be a valid email address';
    //     }
    //     else {
    //         $sql = "SELECT * FROM users WHERE email=:email";
    //         $statement = $this->pdo->prepare($sql);
    //         $statement->bindValue(':email',$this->body["email"]);

    //         $statement->execute();
    //         $owner= $statement->fetchObject();
    //         if(!$owner){
    //             $errors['email'] = 'Email does not exsits, please create an account';
    //         }
    //         elseif (!password_verify($this->body['password'],$owner->password))
    //         {
    //             $errors['password']='Password is incorrect';
    //         }



    //     }
    //     if (empty($errors)){
    //         return $owner;
    //     }
    //     return $errors;
        
    // }

    public function vehicle_Owner_login($user_id)
    {
        $sql = "SELECT * FROM vehicleowner WHERE user_ID=:user_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':user_id',$user_id);
        $statement->execute();
        $vehicleowner= $statement->fetchObject();
        if(!$vehicleowner){
            $errors['vehicleowner'] = 'Email does not have vehicle owner account';
        }

        if (empty($errors)){
            return $vehicleowner;
        }
        else {
            return $errors;
        }
                

    }

    public function getVehicleowner(){
        return $this->pdo->query("SELECT * FROM vehicleowner INNER JOIN users WHERE vehicleowner.user_ID=users.user_ID ")->fetchAll(\PDO::FETCH_ASSOC);

    }
    



}
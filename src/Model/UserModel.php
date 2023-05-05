<?php

namespace App\Model;
use PDO;
class UserModel extends AbstractModel
{
    protected string $table = "user";



    public function fakerUserDB($firstName, $lastName, $email, $password):void
    {

        $req = $this->getConn()->prepare("INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)");
        $req->execute([
            ":email" => $email,
            ":first_name" => $firstName,
            ":last_name" => $lastName,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }


    public function rowCountUser($email):int | bool {
        $req = $this->getConn()->prepare("SELECT * FROM user WHERE email = :email ");
        $req->execute([
            ":email" => $email
        ]);

        return $req->rowCount();
    }
}
<?php

namespace App\Model;
use PDO;
class UserModel extends Model
{
    private ?PDO $conn;

    public function getConn():PDO {
        try {
            return $conn = new PDO('mysql:host=localhost;dbname=super_week', 'root', '');
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getAllFromTable($table):array | bool
    {
        $req = $this->getConn()->prepare("SELECT * FROM $table");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public function getOneFieldWhere(?string $table, ?array $array):array | bool {


        $queryString = "SELECT * FROM $table WHERE ";
        foreach ($array as $key => $values)
        {
            $queryString.= "$key=:$key AND ";
        }


        $queryString = substr_replace($queryString, "", -5);


        $req = $this->getConn()->prepare($queryString);
        $req->execute(
            $array
        );

        return $req->fetch(PDO::FETCH_ASSOC);
    }

}
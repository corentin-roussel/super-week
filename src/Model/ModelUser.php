<?php

namespace App\Model;
use PDO;
class ModelUser
{
    private ?PDO $conn;

    public function getConn() {
        try {
            return $conn = new PDO('mysql:host=localhost;dbname=super_week', 'root', '');
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insertDB(?string $table,?array $values)
    {
        $req = $this->getConn()->prepare("INSERT INTO $table () VALUES () ");


    }

    public function fakerUserDB($firstName, $lastName, $email, $password)
    {

        $req = $this->getConn()->prepare("INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)");
        $req->execute([
            ":email" => $email,
            ":first_name" => $firstName,
            ":last_name" => $lastName,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function getUserDB() {
        $req = $this->getConn()->prepare("SELECT * FROM user");
        $req->execute([]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneUser($last_name) {
        $req = $this->getConn()->prepare("SELECT * FROM user WHERE last_name = :last_name ");
        $req->execute([
            ":last_name" => $last_name
        ]);

        return $req->rowCount();
    }

}
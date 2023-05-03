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

    public function rowCountUser($email) {
        $req = $this->getConn()->prepare("SELECT * FROM user WHERE email = :email ");
        $req->execute([
            ":email" => $email
        ]);

        return $req->rowCount();
    }

    public function getUser($email) {
        $req = $this->getConn()->prepare("SELECT * FROM user WHERE email = :email ");
        $req->execute([
            ":email" => $email
        ]);

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $req = $this->getConn()->prepare("SELECT * FROM user WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);

        return $req->fetch(PDO::FETCH_ASSOC);
    }

}
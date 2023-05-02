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

    public function fakerUserDB($firstName, $lastName, $email)
    {
        $req = $this->getConn()->prepare("INSERT INTO user (email, first_name, last_name) VALUES (:email, :first_name, :last_name)");
        $req->execute([
            ":email" => $email,
            ":first_name" => $firstName,
            ":last_name" => $lastName
        ]);
    }

}
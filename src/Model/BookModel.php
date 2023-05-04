<?php

namespace App\Model;
use PDO;
class BookModel extends Model
{

    public function getConn():PDO {
        try {
            return $conn = new PDO('mysql:host=localhost;dbname=super_week', 'root', '');
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function addBookDb(?string $table, ?array $array):void {

        var_dump($array);
        $queryString = "INSERT INTO $table (";
        foreach ($array as $key => $value)
        {
            $queryString.= "$key ,";
        }
        $queryString = substr_replace($queryString, "", -1, strlen($queryString));

        $queryString.= ")VALUES (";
        foreach ($array as$key =>$value)
        {
            $queryString.= ":$key ,";
        }

        $queryString = substr_replace($queryString, "", -2, strlen($queryString));


        $queryString.= ")";
        var_dump($queryString);

        $req = $this->getConn()->prepare($queryString);
        $req->execute($array);
    }

    public function getAllFromTable($table):array | bool
    {
        $req = $this->getConn()->prepare("SELECT * FROM $table");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOneFieldWhere(?string $table ,?array $array):array | bool {


        $queryString = "SELECT * FROM $table WHERE ";

        foreach ($array as $key => $values) {

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
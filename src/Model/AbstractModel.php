<?php

namespace App\Model;

abstract class AbstractModel Implements InterfaceModel
{

    protected string $table = "";

    public function getConn():\PDO
    {
        try {
            return new \PDO('mysql:host=localhost;dbname=super_week', 'root', '');
        } catch (\PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insertInto(string $table, array $array):void {


        $queryString1 = "INSERT INTO $this->table (";
        $queryString2 = ") VALUES (";
        foreach ($array as $key => $value)
        {
            $queryString1.= "$key ,";
            $queryString2.=":$key ,";
        }
        $queryString1 = substr_replace($queryString1, "", -2, strlen($queryString1));
        $queryString2 = substr_replace($queryString2, "", -2, strlen($queryString2));

        $queryString = $queryString1.$queryString2;
        $queryString.= ")";


        $req = $this->getConn()->prepare($queryString);
        $req->execute($array);
    }

    public function getAll(?string $table):array | false
    {
        $req = $this->getConn()->prepare("SELECT * FROM $table");
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getOne(?string $table, ?array $array):array | false
    {
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
<?php


namespace App\Controller;



use  Faker;
use App\Model\UserModel;
use JetBrains\PhpStorm\NoReturn;

class ControllerUser
{


    public function fakerUserDB() {
        $faker = Faker\Factory::create('fr_FR');
        $ModelUser = new UserModel();
        for($i = 0; $i < 30; $i++)
        {

             $fname = $faker->firstName();
             $lname = $faker->lastName();
             $email = strtolower("$fname.$lname@"). $faker->freeEmailDomain();
             $password = "azerty";

             $ModelUser->fakerUserDB($fname, $lname, $email, $password);
        }
    }

    public function getAllUser($table) {
        $ModelUser = new UserModel();
        echo json_encode($ModelUser->getAll($table),JSON_PRETTY_PRINT);
        die();
    }

    public function getOneUser(?string $table, ?array $array):object  {
        $ModelUser = new UserModel();
        echo json_encode($ModelUser->getOne($table ,$array),JSON_PRETTY_PRINT);
        die();
    }

    public function getOneUserById(?string $table, ?array $array):array {
        $ModelUser = new UserModel();
        return $ModelUser->getOne($table,$array);
    }
}
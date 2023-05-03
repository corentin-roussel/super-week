<?php


namespace App\Controller;

session_start();

use  Faker;
use App\Model\ModelUser;

class ControllerUser
{


    public function fakerUserDB() {
        $faker = Faker\Factory::create('fr_FR');
        $ModelUser = new ModelUser();
        for($i = 0; $i < 30; $i++)
        {

             $fname = $faker->firstName();
             $lname = $faker->lastName();
             $email = strtolower("$fname.$lname@"). $faker->freeEmailDomain();
             $password = "azerty";

             $ModelUser->fakerUserDB($fname, $lname, $email, $password);
        }
    }

    public function getAllUser() {
        $ModelUser = new ModelUser();
        echo json_encode($ModelUser->getUserDB(),JSON_PRETTY_PRINT);
        die();
    }

    public function getOneUser($id) {
        $ModelUser = new ModelUser();
        echo json_encode($ModelUser->getUserById($id),JSON_PRETTY_PRINT);
        die();
    }
}
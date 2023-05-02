<?php


namespace App\Controller;

use  Faker;
use App\Model\ModelUser;

class ControllerUser
{


    public function fakerUserDB() {
        $faker = Faker\Factory::create('fr_FR');
        $ModelUser = new ModelUser();
        for($i = 0; $i < 10; $i++)
        {

             $fname = $faker->firstName() . "\n";
             $lname = $faker->lastName() . "\n";
             $email = strtolower($fname).".".strtolower($lname) . $faker->safeEmailDomain() . "\n";

             $ModelUser->fakerUserDB($fname, $lname, $email);
        }
    }

    public function getAllUser() {
        $ModelUser = new ModelUser();
        echo json_encode($ModelUser->getUserDB(),JSON_PRETTY_PRINT);
        die();
    }
}
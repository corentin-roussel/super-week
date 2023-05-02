<?php

namespace App\Controller;
use App\Model\ModelUser;

class AuthController
{

    public function authController($firstname, $lastname, $email, $password) {

        $UserModel = new ModelUser();

        $check_user = $UserModel->getOneUser($lastname);
        if($check_user !== 1)
        {
            $UserModel->fakerUserDB($firstname, $lastname,$email,$password);
        }

    }

}
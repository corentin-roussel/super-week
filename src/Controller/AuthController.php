<?php

namespace App\Controller;

session_start();

use App\Model\ModelUser;

class AuthController
{

    public function authController($firstname, $lastname, $email, $password, $conf_pass) {

        $UserModel = new ModelUser();

        $check_user = $UserModel->rowCountUser($email);
        if($check_user !== 1 && $password === $conf_pass)
        {
            $UserModel->fakerUserDB($firstname, $lastname,$email,$password);
        }

    }

    public function connController($email, $password)
    {
        $UserModel = new ModelUser();

        $check_conn = $UserModel->rowCountUser($email);
        if($check_conn === 1)
        {

            $user = $UserModel->getUser($email);

            if(password_verify($password, $user['password']))

            if (session_status() == PHP_SESSION_NONE) {session_start();}
            $_SESSION['user'] = ['id' => $user['id'], 'first_name' => $user['first_name'], 'last_name' => $user['last_name']];
        }
    }

}
<?php

namespace App\Controller;



use App\Model\UserModel;

class AuthController
{

    public function authController($firstname, $lastname, $email, $password, $conf_pass):void {

        $UserModel = new UserModel();

        $check_user = $UserModel->rowCountUser($email);
        if($check_user !== 1 && $password === $conf_pass)
        {
            $UserModel->fakerUserDB($firstname, $lastname,$email,$password);
        }

    }

    public function connController(?array $array):void
    {
        $UserModel = new UserModel();
        var_dump($array);

        $check_conn = $UserModel->rowCountUser($array['email']);

        var_dump($check_conn);
        if($check_conn === 1)
        {

            $user = $UserModel->getOne("user", ["email" => $array['email']]);
            var_dump($user);

            if(password_verify($array['password'], $user['password']))
            {
                $_SESSION['user'] = ['id' => $user['id'], 'first_name' => $user['first_name'], 'last_name' => $user['last_name']];
                var_dump($_SESSION);
            }

        }
    }

}
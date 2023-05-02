<?php

    require_once "vendor/autoload.php";

    use App\Controller\ControllerUser;

    $ControllerUser = new ControllerUser();

    $ControllerUser->fakerUserDB();
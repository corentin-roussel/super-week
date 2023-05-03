<?php
    require_once ("vendor/autoload.php");
    use App\Controller\ControllerUser;
    use App\Controller\AuthController;

//*                    // Match all request URIs
//[i]                  // Match an integer
//[i:id]               // Match an integer as 'id'
//[a:action]           // Match alphanumeric characters as 'action'
//[h:key]              // Match hexadecimal characters as 'key'
//[:action]            // Match anything up to the next / or end of the URI as 'action'
//[create|edit:action] // Match either 'create' or 'edit' as 'action'
//[*]                  // Catch all (lazy, stops at the next trailing slash)
//[*:trailing]         // Catch all as 'trailing' (lazy)
//[**:trailing]        // Catch all (possessive - will match the rest of the URI)
//.[:format]?          // Match an optional parameter 'format' - a / or . before the block is also optional

    $router = new AltoRouter();

    $router->setBasePath('/super-week');


    $router->map( 'GET', '/', function(){
        echo "<h1>Bienvenue sur l'accueil</h1>";
    } , 'home');

    $router->map( 'GET', '/users', function(){
        $ControllerUser = new ControllerUser();
        $ControllerUser->getAllUser();
    } , 'users');

    $router->map( 'GET', '/users[i:id]', function($id){
        echo "<h1>Bienvenue sur la page de l'utilisateur $id</h1>";
    } , 'usersid');

    $router->map( 'GET', '/createUser', function(){
        require_once ( __DIR__ . "/createUser.php");
    } , 'createUser');

    $router->map('GET', '/register', function(){
        require_once (__DIR__ . "/src/View/register.php");
    }, 'registerForm');

    $router->map('POST', '/register', function(){
        require_once (__DIR__ . "/src/View/register.php");
        $AuthController = new AuthController();
        $AuthController->authController($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['conf_pass']);
    }, 'registerInsert');

    $router->map( 'GET', '/login', function() {
        require_once (__DIR__ . "/src/View/login.php");
    }, 'loginForm');

    $router->map('POST', '/login', function(){
        require_once (__DIR__ . "/src/View/login.php");
        $AuthController = new AuthController();
        $AuthController->connController($_POST['email'], $_POST['password']);
    }, 'loginInsert');


$match = $router->match();

    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] );
    } else {
        // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
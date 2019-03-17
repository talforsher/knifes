<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
    // Home page
    case '/':
        session_start();
        if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
            $pass = strtolower($_SESSION["pass"]);
            $user = strtolower($_SESSION["user"]);
            if((include 'knifes/users/'. $user . '.php') && $player["pass"] == $pass)
                header('Location: game.php');
        }
        require 'home.php';
        break;
    // About page
    case '/game':
        require 'game.php';
        break;
         case '/admin':
        require 'ad.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require '../views/404.php';
        break;
}
<?php
session_start();
require_once 'Controllers/HomeController.php';
require_once 'Controllers/UserController.php';
require_once 'Controllers/RecetteController.php';
// recuperer l'url
$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
// if(isset($_GET['url'])){
//     $url = $_GET['url'];
// }else{
//     $url = 'home';
// }

switch($url){
    case 'home':
        $controller = new HomeController();
        $controller->afficherPageAccueil();
        break;
    case "inscription": // affiche le formulaire d'inscription
        $controller = new UserController();
        $controller->registerForm();
        break;
    case "register": // valide l'inscription
        $controller = new UserController();
        $controller->register();
        break;
    case "connexion": // affiche le fomulaire de connexion
        $controller = new UserController();
        $controller->loginForm();
        break;
    case "login": // valide le formulaire de connexion
        $controller = new UserController();
        $controller->login();
        break;
    case 'logout': // permet de deconnecter le user
        $controller = new UserController();
        $controller->logout();
        break;
    case 'ajout_recette': // permet d'afficher le formulaire d'ajour de recette
        $controller = new RecetteController();
        $controller->ajoutForm();
        break;
    case 'add':
        $controller = new RecetteController();
        $controller->add();
        break;
    default:
        echo "404 not found!";
}
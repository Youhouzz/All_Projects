<?php
require_once "Models/CategorieModel.php";
require_once "Controllers/NavController.php";
require_once "Controllers/RecetteController.php";
class HomeController extends NavController{
    public function afficherPageAccueil(){
        $this->afficherNav();
        $controller = new RecetteController();
        $recettes = $controller->listRecette();
        include 'Views/home.php';
    }
}
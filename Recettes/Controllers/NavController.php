<?php
require_once "Models/CategorieModel.php";
abstract class NavController{
    public function afficherNav(){
        $categories = CategorieModel::getCategories();
        include "Views/header.php";
    }
}
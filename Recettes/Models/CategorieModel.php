<?php
require_once "core/Connect.php";
class CategorieModel{
    public static function getCategories(){
        $bd = Connect ::dbConnect();
        $request = $bd->prepare("SELECT id_categorie,nom FROM categories");
        $request->execute();
        $categories = $request->fetchAll();
        return $categories;
    }
}
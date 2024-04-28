<?php
require_once "core/Connect.php";
class RecetteModel{
    public static function addRecette($titre, $description,$image,$categorie,$listeIngredient,$auteur){
        $db = Connect::dbConnect();
        $request = $db->prepare("INSERT INTO recettes (titre, description, image, categorie, liste_ingredients, auteur) VALUES (?, ?, ?, ?, ?, ?)");
        try{
            $request->execute(array($titre, $description,$image,$categorie,$listeIngredient,$auteur));
            return true;
        }catch(PDOException $e){
            // echo $e->getMessage();
            return false;
        }
    }

    // pour recuperer les recettes
    public static function listRecette(){
        $db = Connect::dbConnect();
        $request = $db->prepare("SELECT * FROM recettes");
        $request->execute();
        $recettes = $request->fetchAll();
        return $recettes;
    }
    
}
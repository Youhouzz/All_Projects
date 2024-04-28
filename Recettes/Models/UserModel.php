<?php
require_once "core/Connect.php";
class UserModel{
    public static function register(){
        $db = Connect ::dbConnect();
        $cryptedPassword = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        $request = $db->prepare("INSERT INTO users (nom,prenom,email,mdp) VALUES (?,?,?,?)");
        $request->execute(array($_POST['nom'],$_POST['prenom'],$_POST['email'],$cryptedPassword));
    }

    public static function login(){
        $db = Connect ::dbConnect();
        $request = $db->prepare("SELECT * FROM users WHERE email = ?");
        $request->execute(array($_POST['email']));
        $user = $request->fetch();
        return $user;
    }
}
<?php
require_once "Models/UserModel.php";
require_once "Controllers/NavController.php";
class UserController extends NavController
{
    public function registerForm()
    {
        include "Views/inscription.php";
    }

    public function register()
    {
        if (isset($_POST['inscription'])) {
            UserModel::register();
        }
    }

    public function loginForm()
    {
        include "Views/login.php";
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $user = UserModel::login();
            if (empty($user)) {
                echo "Cet email n'existe pas !";
            } else {
                if (password_verify($_POST['mdp'], $user['mdp'])) {
                    $_SESSION['user'] = $user;
                }
            }
        }
    }
    public function logout(){
        session_destroy();
        header('Location: index.php');
    }

}

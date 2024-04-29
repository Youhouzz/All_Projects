<?php

# Démarrage de la session PHP
session_start();

# Importation des constantes
require_once 'config/config.php';

# Importation de la connexion à la BDD
require_once 'config/database.php';

# Importation des Helpers
require_once './helpers/global.helper.php';
require_once './helpers/security.helper.php';
require_once './helpers/forum.helper.php';
require_once './helpers/post.helper.php';
require_once './helpers/user.helper.php';

# Récupération des catégories
$forums = getForums();
# var_dump($categories);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum News</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.22.0/full/ckeditor.js"></script>
</head>
<body>

<!-- En-Tête de page -->
<header>
    <?php require_once 'nav.php' ?>
</header>
<!-- Fin -- En-Tête de page -->
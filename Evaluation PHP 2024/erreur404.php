<?php
# Inclusion du header
require_once './partials/header.php';
?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Titre de la page -->
    <div class="p-3 mx-auto text-center">
        <h1 class="display-4">Erreur 404</h1>
    </div>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col" style="text-align: right">
                    <img height="150" src="./assets/images/40Oj.gif" alt="404">
                </div>
                <div class="col">
                    <h3>Page Introuvable</h3>
                    <!-- Affichage des messages flash -->
                    <?php include 'partials/flash/_flash.message.php' ?>
                    <p>Souhaitez-vous revenir <a href="accueil.html">vers l'accueil</a></p>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>

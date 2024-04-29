<?php
# Inclusion du header
require_once './partials/header.php';

#1. Récupération des informations
# Initialisation des variables à null
$email = $password = null;

# $_POST ne peut pas être vide quand l'utilisateur a soumis les données de son formulaire.
if (!empty($_POST)) {

    #2. Je peux commencer ma validation
    foreach ($_POST as $key => $value) {
        /*
         * Déclaration dynamique. Permet de déclarer
         * des variables en se basant sur la valeur de la $key.
         * cf. https://www.php.net/manual/fr/language.variables.variable.php
         */
        $$key = $value;
    }

    # dump($_POST);
    # dd($email);

    #3. Vérification des informations saisies
    # Déclarer un tableau d'erreurs
    $errors = [];

    if (empty($email)) {
        $errors['email'] = "N'oubliez pas votre email.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Vérifier le format de votre e-mail.";
    }

    if (empty($password)) {
        $errors['password'] = "N'oubliez pas votre mot de passe.";
    }

    #4. S'il n'y a aucune erreur dans mon tableau, alors je peux procéder à l'insertion dans la BDD
    if (empty($errors)) {
        # Lancement de la connexion
        if (login($email, $password)) {
            redirect('index.php?success=Bienvenue, vous êtes maintenant connecté.');
        }
    }

} // endif(empty($POST))

?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Titre de la page -->
    <div class="p-3 mx-auto text-center">
        <h1 class="display-4">Connexion</h1>
    </div>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form id="login" method="post">

                        <!-- Affichage d'une notification d'erreur -->
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger mt-4">
                                <u>Une erreur est survenue dans la validation de vos données :</u> <br>
                                <?php foreach ($errors as $error) : ?>
                                    <?= $error ?> <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Affichage des messages flash -->
                        <?php include 'partials/flash/_flash.message.php' ?>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                   id="email" name="email"
                                   value="<?= $email ?>"
                                   placeholder="Saisissez votre email">
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password"
                                   class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                   id="password" name="password"
                                   value="<?= $password ?>"
                                   placeholder="Saisissez votre mot de passe">
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?? '' ?>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-dark">Connexion</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Fin -- Contenu de notre page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $.getJSON('http://ip-api.com/json/', function (data) {
           $('#login').append(`
                <p class="mt-4 text-center text-muted">
                    <small>
                        Votre adresse IP : ${data.query} - ${data.isp} en ${data.regionName}
                    </small>
                </p>
           `);
        });
    });
</script>
<?php
# Inclusion du header
require_once './partials/footer.php';
?>

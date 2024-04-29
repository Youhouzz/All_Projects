<?php
# Inclusion du header
require_once './partials/header.php';

# Récupération du paramètre slug depuis l'URL
$id = $_GET['id'];
# En cas d'absence du id
if(!isset($_GET['id'])) {
    redirect('index.php');
}

# Récupération de l'article
$post = getPostById($id);
$messages = getMessagesByPostId($post['ID_POST']);

if (!$post) {
    redirect('erreur404.php');
}

# Initialisation des variables
$message = null;

# 2. Vérification des données $_POST
if (!empty($_POST)) {

    # TEST Récupération des informations $_POST
    $content = $_POST['content'];

    # Insertion dans la BDD
    try {
        # DONE Insertion du Post dans la BDD
        $id_message = insertMessage($_SESSION['user']['ID_USER'], $post['ID_POST'],$content);

        if ($id_message) {
            addFlash('success', 'Félicitation votre message est en ligne !');
            redirect("post.php?id=". $post['ID_POST']);
        }
    } catch (Exception $exception) {
        dd($exception->getMessage());
    }
}


?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col">

                    <!-- Titre de l'article -->
                    <h1 class="display-4"><?= $post['TITLE'] ?></h1>
                    <p><?= $post['DESCRIPTION'] ?></p>
                    <hr class="border border-dark" >

                    <!-- Information de l'article -->
                    <h4 class="text-muted d-flex justify-content-between align-items-center">
                        <p class="m-0"><small style="font-size: 1rem; margin-right: 1rem;">Publié le</small> <?= $post['CREATEDAT'] ?></p>
                        <p class="m-0"><small style="font-size: 1rem; margin-right: 1rem;">Rédigé par </small> <?= getUserById($post['ID_USER'])['FIRSTNAME'] . " " . getUserById($post['ID_USER'])['LASTNAME'] ?></p>
                    </h4>

                    <hr class="border border-dark mb-5" >

                    <?php foreach ($messages as $message): ?>
                        <div class="alert alert-info">
                            <p class="fst-italic fw-light">
                                "<?= $message['CONTENT'] ?>"
                            </p>
                            <hr>
                            <div class="text-end">
                                <?= $message['CREATEDAT'] ?>
                                par
                                <?php $user = getUserById($message['ID_USER']);
                            echo $user['FIRSTNAME'] . " " . $user['LASTNAME']?>
                            </div>
                            <?php //$user[$message['USER_ID']]['name']; ?>
                        </div>
                    <?php endforeach ?>
                    <form action="#" method="POST">
                        <label for="content">Participez à la discussion!</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        <button class="btn btn-info text-white p-3">Envoyer un message en tant
                            que <?= $_SESSION['user']['FIRSTNAME'] . " " .  $_SESSION['user']['LASTNAME'] ?>!
                        </button>
                    </form>
                </div> <!-- ./col -->
            </div> <!-- ./row -->
        </div> <!-- ./container -->
    </div> <!-- ./bg-light -->

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>
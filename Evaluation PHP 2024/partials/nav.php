<?php
    # Récupération de l'utilisateur connecté
    $user = isAuthenticated();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="accueil.html">Forum News - Vivez l'info !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="accueil.html">Accueil</a>
                </li>
                <?php foreach ($forums as $forum) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="forum.php?id=<?= $forum['ID_FORUM'] ?>">
                            <?= $forum['NAME'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <div class="text-right">
                <?php if ($user) : ?>

                    <span class="navbar-text mx-2">
                        Bonjour <strong><?= $user['FIRSTNAME'] ?></strong>
                         <em>(<?= $user['ROLE'] ?>)</em>
                    </span>

                    <?php if (isGranted('ROLE_ADMIN')) : ?>
                        <a class="nav-item btn btn-outline-warning" href="creer-un-post.php">
                            Créer un Post
                        </a>
                    <?php endif; ?>
                    <a class="nav-item btn btn-danger" href="deconnexion.php">Deconnexion</a>

                <?php else: ?>
                    <a class="nav-item btn btn-outline-info" href="connexion.php">Connexion</a>
                    <a class="nav-item btn btn-outline-warning mx-2" href="inscription.php">Inscription</a>
                <?php endif; ?>
            </div> <!-- ./text-right -->

        </div> <!-- ./collapse -->
    </div> <!-- ./container-fluid -->
</nav> <!-- /nav -->

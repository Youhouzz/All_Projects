<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/recettes">Marmitard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if(isset($_SESSION['user'])){ ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?url=ajout_recette">Creer Recette</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><?= $_SESSION['user']['prenom']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?url=logout">Deconnexion</a>
          </li>
        <?php } else{?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?url=inscription">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?url=connexion">Connexion</a>
        </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
           <?php foreach ($categories as $categorie){ ?>
                <li>
                    <a class="dropdown-item" href="http://localhost/recettes/?url=categorie&id=<?= $categorie['id_categorie'] ?>">
                    <?= $categorie['nom'] ?>
                    </a>
                </li>
           <?php } ?> 
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
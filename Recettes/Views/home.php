<div class="container">
    <?php foreach ($recettes as $recette) { ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= $recette['image'] ?>" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title"><?= $recette['titre'] ?></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
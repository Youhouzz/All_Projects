<div class="col-md-4 mt-4">
    <div class="card shadow-sm h-100">
        <div class="card-body">
            <h5 class="card-title"><?= $post['TITLE'] ?></h5>
            <p><?= $post['DESCRIPTION'] ?></p>
            <a href="post.php?id=<?= $post['ID_POST'] ?>" class="btn btn-primary">
                Consulter les discussions
            </a>
        </div>
    </div>
</div>
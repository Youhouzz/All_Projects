<?php

$flashMessages = $_SESSION['flashMessages'] ?? [];
foreach ($flashMessages as $message) : ?>

    <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
        <?= $message['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endforeach; unset($_SESSION['flashMessages']); ?>

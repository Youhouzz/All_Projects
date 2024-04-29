<?php

/**
 * Permet de faciliter le
 * debuggage de notre app.
 * @param $debug
 * @return void
 */
function dump($debug) {
    echo '<pre>';
    print_r($debug);
    echo '</pre>';
}

/**
 * Debug et Coupe l'exécution
 * de l'application.
 * dd signifie : dump and die
 * @param $debug
 * @return void
 */
function dd($debug) {
    dump($debug);
    die();
}

/**
 * Permet la redirection vers une autre page.
 * @param string $url
 * @return void
 */
function redirect(string $url): void {
    header("Location: $url");
    exit();
}


function addFlash(string $type, string $message): void {
    $_SESSION['flashMessages'][] = [
      'type' => $type,
      'message' => $message
    ];
}
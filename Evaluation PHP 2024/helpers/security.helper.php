<?php


/**
 * Permet de vérifier le "role" d'un utilisateur
 * @param string $role
 * @return bool
 */
function isGranted(string $role): bool {
    return isset($_SESSION['user']) && ($role === $_SESSION['user']['ROLE']);
}

/**
 * Permet de vérifier si un utilisateur
 * est connecté en session PHP.
 * @return array|false
 */
function isAuthenticated(): array|false
{
    return $_SESSION['user'] ?? false;
}

/**
 * Permet la connexion d'un utilisateur
 * @param string $email
 * @param string $password
 * @return bool
 */
function login(string $email, string $password): bool
{
    global $dbh;
    $sql = "SELECT * FROM user WHERE EMAIL = :email";
    $query = $dbh->prepare($sql);
    $query->bindValue('email', $email);
    $query->execute();

    # Récupération de l'user dans la BDD
    $user = $query->fetch();
    if ( $user &&  password_verify($password, $user['PASSWORD'])) {
        /*
         * Ici, l'utilisateur a bien été trouvé et son mot de passe
         * correspond à celui dans la BDD... Je vais pouvoir stocker
         * ses informations en session PHP.
         */
        $_SESSION['user'] = $user;
        return true;
    }

    return false;
}

/**
 * Supprime l'utilisateur en session PHP.
 * @return bool
 */
function logout(): bool {
    unset($_SESSION['user']);
    return true;
}
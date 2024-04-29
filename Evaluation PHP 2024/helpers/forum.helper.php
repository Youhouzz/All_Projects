<?php

/**
 * Retourne les catégories
 * de notre site depuis la BDD
 * @return string[]
 */
function getForums(): array
{
    # Récupération de ma variable $dbh depuis l'espace global PHP
    global $dbh;

    # J'effectue ma requête de récupération des catégories
    $query = $dbh->query('SELECT * FROM forum');

    # Je retourne le résultat
    return $query->fetchAll();
}

/**
 * Permet de récupérer les articles
 * de la BDD via le slug de la catégorie.
 */
function getForumById(int $id) {

    global $dbh;

    # Création de ma requête SQL
    $sql = 'SELECT *
                FROM forum f
                    WHERE f.ID_FORUM = :id';

    # Préparation de ma requête
    # ⚠️⚠️ Paramètre externe = requête préparée ⚠️⚠️
    $query = $dbh->prepare($sql);

    # J'associe à ma requête le paramètre categorySlug.
    # NOTA BENE : Cette préparation me protège contre les injections SQL.
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    # Execution de ma requête
    $query->execute();

    # Retour du résultat
    return $query->fetch();
}

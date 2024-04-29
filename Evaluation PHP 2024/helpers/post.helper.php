<?php


function getPostsByForumId(int $id) {

    global $dbh;

    # Création de ma requête SQL
    $sql = 'SELECT *
                FROM post p
                    WHERE p.ID_FORUM = :id';

    # Préparation de ma requête
    # ⚠️⚠️ Paramètre externe = requête préparée ⚠️⚠️
    $query = $dbh->prepare($sql);

    # J'associe à ma requête le paramètre categorySlug.
    # NOTA BENE : Cette préparation me protège contre les injections SQL.
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    # Execution de ma requête
    $query->execute();

    # Retour du résultat
    return $query->fetchAll();
}

 function getPostById(int $id) {

 global $dbh;

  $sql = 'SELECT *
             FROM post p
                     WHERE p.ID_POST = :id';

              # Préparation de ma requête
              # ⚠️⚠️ Paramètre externe = requête préparée ⚠️⚠️
              $query = $dbh->prepare($sql);

              # J'associe à ma requête le paramètre categorySlug.
              # NOTA BENE : Cette préparation me protège contre les injections SQL.
              $query->bindValue(':id', $id, PDO::PARAM_STR);

              # Execution de ma requête
              $query->execute();

              # Retour du résultat
              return $query->fetch();

 }

function getMessagesByPostId(int $id) {

    global $dbh;

    $sql = 'SELECT *
             FROM message m
                     WHERE m.ID_POST = :id';

    # Préparation de ma requête
    # ⚠️⚠️ Paramètre externe = requête préparée ⚠️⚠️
    $query = $dbh->prepare($sql);

    # J'associe à ma requête le paramètre categorySlug.
    # NOTA BENE : Cette préparation me protège contre les injections SQL.
    $query->bindValue(':id', $id, PDO::PARAM_STR);

    # Execution de ma requête
    $query->execute();

    # Retour du résultat
    return $query->fetchAll();

}

function insertPost(string $title,
                    string $description,
                    string $id_forum,
                    string $id_user): false|string
{
    global $dbh;
    $sql = 'INSERT INTO post (TITLE, DESCRIPTION, ID_FORUM, ID_USER, CREATEDAT, UPDATEDAT) 
                VALUES (:title, :description, :id_forum, :id_user, :created_at, :updated_at)';

    $query = $dbh->prepare($sql);
    $query->bindValue('title', $title);
    $query->bindValue('description', $description);
    $query->bindValue('id_forum', $id_forum);
    $query->bindValue('id_user', $id_user);
    $query->bindValue('created_at', (new DateTime())->format('Y-m-d H:i:s') );
    $query->bindValue('updated_at', (new DateTime())->format('Y-m-d H:i:s') );

    return $query->execute() ? $dbh->lastInsertId() : false;
}


function insertMessage($id_user, $id_post, $content): false|string
{
    global $dbh;

    # TEST Ecrire la requete SQL
    $sql = 'INSERT INTO message (id_user, id_post, content, createdat, updatedat) VALUES (:id_user, :id_post, :content, :created_at, :updated_at)';

    # TEST Complétez la requete
    $query = $dbh->prepare($sql);
    $query->bindValue('id_user', $id_user, PDO::PARAM_STR);
    $query->bindValue('id_post', $id_post, PDO::PARAM_INT);
    $query->bindValue('content', $content, PDO::PARAM_STR);
    $query->bindValue('created_at', (new DateTime())->format('Y-m-d H:i:s'));
    $query->bindValue('updated_at', (new DateTime())->format('Y-m-d H:i:s'));

    return $query->execute() ? $dbh->lastInsertId() : false;
}
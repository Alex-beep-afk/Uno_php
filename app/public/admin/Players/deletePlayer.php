<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';
session_start();
checkAdmin();

if (isset($_POST['token_csrf']) && isset($_POST['id'])) {
    $_POST['id'] = strip_tags($_POST['id']);

    

    if (findOneById((int) $_POST['id']) === false) {
        $_SESSION['messages']['error'] = "Le joueur n'existe pas !";
        header('Location: /admin/Players/PlayersList.php');
        exit;
    }
    $user = findOneById((int) $_POST['id']);
    if ($user['isAdmin'] == 1) {
        $_SESSION['messages']['error'] = "Vous ne pouvez pas supprimer un administrateur !";
        header('Location: /admin/Players/PlayersList.php');
        exit;
    }

//Normalement, quand tu compares deux chaînes en PHP avec == ou ===, PHP s'arrête dès qu'il trouve une différence.
// Problème : si un pirate mesure le temps que met ton serveur à répondre, 
// il peut deviner caractère par caractère le bon mot de passe ou token... (attaque par timing)
// hash_equals() règle ce problème :
// Elle compare les deux chaînes entièrement, même si elles sont différentes dès le début.
// Elle prend exactement le même temps quel que soit le contenu.
//  Pas de fuite d'information.

    if (hash_equals($_SESSION['token_csrf'], $_POST['token_csrf'])) {
        if (deleteUser($_POST['id'])){
            $_SESSION['messages']['success'] = "Le joueur a bien été supprimé !";
            header('Location: /admin/Players/PlayersList.php');
            exit;
        } else {
            $_SESSION['messages']['error'] = "Erreur lors de la suppression du joueur !";
            header('Location: /admin/Players/PlayersList.php');
            exit;
        }
    }
    else {
        $_SESSION['messages']['error'] = "Token CSRF invalide !";
        header('Location: /admin/Players/PlayersList.php');
        exit;
    }
}else {
    $_SESSION['messages']['error'] = "Paramètres manquants !";
    header('Location: /admin/Players/PlayersList.php');
    exit;
}



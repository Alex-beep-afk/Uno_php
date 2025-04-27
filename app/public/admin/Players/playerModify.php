<?php

require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$id = (int) strip_tags($_GET['id']);

$user = findOneById($id);


// Si je ne trouve pas le joueur en bas de données via son id , je redirige
if (empty($user)) {
    $_SESSION['messages']['danger'] = 'Le joueur n\'existe pas';
    header('Location: /admin/Players/index.php');
    exit(302);
}

// Si la super globale POST n'est pas vide je nettoie les données grace à une foreach
if (!empty($_POST)) {
    foreach($_POST as $key => $value){
        $_POST[$key] = strip_tags(trim($value));
    }
    // Si il y a un nouveau password je le hash avant de faire l'update en base de données
        if($_POST['password'] !== ''){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_ARGON2I);
        }
        if($_POST['scoreTotal'] === '' || $_POST['scoreTotal'] < 0){
            $_POST['scoreTotal'] = 0;
        }
    // Si le nouveau pseudo est differrent de l'ancien mais que je le trouve en BDD je redirige
    if($_POST['pseudo'] !== $user['pseudo'] && findOneByPseudo($_POST['pseudo'])){
        $_SESSION['message']['danger'] = 'ce pseudo est déja pris';
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit(302);
    }else{
        $updateUser = [
            'id' => $user['id'],
            'pseudo'=>$_POST['pseudo'],
            'password' => $_POST['password'],
            'scoreTotal' => $_POST['scoreTotal'],
            'imgProfil' => $_POST['imgProfil'],
            'nom' => $_POST['nom'],
            'prenom'=> $_POST['prenom']
        ];
        

        if(updateUser($updateUser)){
            
            $_SESSION['messages']['success'] = 'Le joueur à bien été modifié';
            header('Location: /admin/Players/playersList.php');
            exit(302);
        }
        else{
            
            $_SESSION['messages']['danger'] = 'Une erreur est survenue';
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit(302);
        }
        
    }
}

    

// 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Admin - Update Player</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>

    <main class="h-full">
        <form class="flex flex-col items-center justify-center gap-2 p-2" action="" method="post">
            <label for="pseudo">Pseudo</label>
            <input class="border-2 rounded-md" type="text" name="pseudo" id="pseudo" value="<?= $user['pseudo'] ?>">

            <label for="password">Password</label>
            <input class="border-2 rounded-md" type="password" name="password" id="password" value="">

            <label for="scoreTotal">Score total</label>
            <input class="border-2 rounded-md" type="number" name="scoreTotal" id="scoreTotal"
                value="<?= $user['scoreTotal'] ?>">

            <label for="imgProfil">Image de profil</label>
            <input class="border-2 rounded-md" type="text" name="imgProfil" id="imgProfil"
                value="<?= $user['imgProfil'] ?>">

            <label for="nom">Nom</label>
            <input class="border-2 rounded-md" type="text" name="nom" id="nom" value="<?= $user['nom'] ?>">

            <label for="prenom">Prenom</label>
            <input class="border-2 rounded-md" type="text" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">

            <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Submit</button>
            <a class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600 text-center" href="/admin/Players/playersList.php">Retour</a>
        </form>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

</body>

</html>
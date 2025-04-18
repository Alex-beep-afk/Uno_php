<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';

session_start();

if (!empty($_POST)) {
    if (!empty($_POST['pseudo']) || !empty($_POST['password'])) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = trim($value);
            $_POST[$key] = strip_tags($value);
        }
        if (findOneByPseudo($_POST['pseudo'])) {
            $_SESSION['messages']['danger'] = 'Le joueur existe deja';
            header('Location: /admin/Players/createPlayer.php');
            exit(302);
        }
        $user = [
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'scoreTotal' => !$_POST['scoreTotal'] ? (int) $_POST['scoreTotal'] : 0,
            'imgProfil' => $_POST['imgProfil']
        ];
        if (createUser($user)) {
            $_SESSION['messages']['success'] = 'Le joueur a bien ete créé';

        } else {
            $_SESSION['messages']['danger'] = 'Le joueur n\'a pas pu etre créé';
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Admin - Create Player</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php if ($_SESSION['messages']['success']): ?>
        <div class="bg-green-500 text-center p-5">
            <?= $_SESSION['messages']['success'] ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['messages']['danger'])): ?>
        <div class="bg-red-500 text-center p-5">
            <?= $_SESSION['messages']['danger'] ?>
        </div>
    <?php endif; ?>

    <main class="h-full">
        <form class="flex flex-col items-center justify-center gap-2 p-2" action="" method="post">
            <label for="pseudo">Pseudo</label>
            <input class="border-2 rounded-md" type="text" name="pseudo" id="pseudo" required>

            <label for="password">Password</label>
            <input class="border-2 rounded-md" type="password" name="password" id="password" required>

            <label for="scoreTotal">Score total</label>
            <input class="border-2 rounded-md" type="number" name="scoreTotal" id="scoreTotal">

            <label for="imgProfil">Image de profil</label>
            <input class="border-2 rounded-md" type="text" name="imgProfil" id="imgProfil">

            <label for="nom">Nom</label>
            <input class="border-2 rounded-md" type="text" name="nom" id="nom">

            <label for="prenom">Prenom</label>
            <input class="border-2 rounded-md" type="text" name="prenom" id="prenom">

            <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Submit</button>
        </form>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

</body>

</html>
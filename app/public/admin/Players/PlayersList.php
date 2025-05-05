<?php
// creer un tableau avec score + id ou pseudo {id : score} en javascript
// nettoyer et verifier les données (int)
// les envoyer à l'API
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$users = findAllUsersByScore();

$_SESSION['token_csrf'] = bin2hex(random_bytes(32));



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste des joueurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="/assets/scripts/scoresModify.js" defer></script>
</head>

<body class="min-h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>
    <main class="h-full my-auto">
        <ul class="mt-2 flex flex-col items-center">
            <?php foreach ($users as $user): ?>
                <li class="w-5/6 border-1 flex justify-between p-2 mb-2 rounded-lg 
                bg-slate-200/50 border-slate-400 backdrop-blur-sm drop-shadow-md"><?= $user['pseudo'] ?>

                    (<?= $user['prenom'] . ' ' . $user['nom'] ?>)



                    <div class="flex items-center gap-2">
                        <span>
                            Score :
                        </span>
                        <span contenteditable="true" data-user="<?= $user['id'] ?>" id="score-<?= $user['id'] ?>"
                            class=" flex flex-col items-center gap-2 text-green-500 "><?= $user['scoreTotal'] ?>
                        </span>
                    </div>

                    <span class="flex gap-2">

                        <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                            href="/admin/Players/scoreModify.php?id=<?= $user['id'] ?>">Modifier score</a>

                        <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                            href="/admin/Players/playerModify.php?id=<?= $user['id'] ?>">Modifier joueur</a>

                        <form action="/admin/Players/deletePlayer.php" method="post"
                            onsubmit="return confirm('Etes-vous sûr de vouloir supprimer ce joueur ?')">
                            <input type="text" name="token_csrf" value="<?= $_SESSION['token_csrf'] ?>" hidden>
                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                            <button class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                                type="submit">Supprimer</button>
                        </form>
                    </span>



                </li>
            <?php endforeach; ?>
            <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                href="/admin/index.php">Retour</a>
        </ul>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

</body>

</html>
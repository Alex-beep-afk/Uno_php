<?php
require_once '/app/config/utils.php';

session_start();
checkAdmin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uno Game - Admin</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>

    <main
        class="flex flex-col items-center justify-center h-full bg-[url(/assets/images/animatedBG.gif)] bg-cover bg-no-repeat ">

        <div class="flex gap-5 w-2/3 p-2">
            <div
                class="flex flex-col items-center text-center rounded-lg p-3 border-2 border-slate-600 bg-slate-100/30 backdrop-blur w-1/2">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Players/createPlayer.php">Créer un joueur</a>
                <img class="my-auto" src="/assets/images/new_dresseur.webp" alt="">
            </div>

            <div
                class="flex flex-col items-center text-center rounded-lg p-3 border-2 border-slate-600 bg-slate-100/30 backdrop-blur w-1/2">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Players/PlayersList.php">Liste des joueurs</a>
                <img class="my-auto" src="/assets/images/Liste_bg.webp" alt="">
            </div>
            <div
                class="flex flex-col items-center text-center rounded-lg p-3 border-2 border-slate-600 bg-slate-100/30 backdrop-blur w-1/2">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Galerie/index.php">Galerie</a>
                <img class="my-auto" src="/assets/images/pokedex.png" alt="">
            </div>

        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
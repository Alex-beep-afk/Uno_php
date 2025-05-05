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

    <main class="flex flex-col items-center justify-center h-full">

        <div class="flex gap-5 h-2/3 w-1/2">
            <div class="bg-[url('/assets/images/New_dresseur.webp')] bg-center bg-contain bg-no-repeat 
            text-center rounded-lg p-3 border-2 border-slate-400 w-1/2">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Players/createPlayer.php">Créer un joueur</a>
            </div>

            <div class="bg-[url('/assets/images/Liste_bg.webp')] bg-center bg-contain bg-no-repeat text-center
            border-2 border-slate-400 rounded-lg p-3 w-1/2">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Players/PlayersList.php">Liste des joueurs</a>
            </div>
            <div>
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Galerie/index.php">Galerie</a>
            </div>

        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
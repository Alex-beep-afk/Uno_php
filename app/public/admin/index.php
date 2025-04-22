<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uno Game - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php';?>

    <main class="flex flex-col items-center justify-center h-full">

        <div class="flex gap-5 h-2/3 w-1/2">
            <div class="bg-[url('/assets/images/New_dresseur.webp')] bg-center bg-contain bg-no-repeat 
            text-center rounded-lg p-3 border-2 border-slate-400 w-1/2">
                <a class="bg-green-500/70 backdrop-blur-sm rounded-lg p-2" href="/admin/Players/createPlayer.php">Créer un joueur</a>
            </div>

            <div class="bg-[url('/assets/images/Liste_bg.webp')] bg-center bg-contain bg-no-repeat text-center
            border-2 border-slate-400 rounded-lg p-3 w-1/2">
                <a class="bg-yellow-500/70 backdrop-blur-sm rounded-lg p-2" href="/admin/Players/PlayersList.php">Liste des joueurs</a>
            </div>

        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
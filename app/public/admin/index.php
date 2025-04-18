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
    <?php if ($_SESSION['messages']['success']): ?>
        <div class="bg-green-500 text-center p-5">
            <?= $_SESSION['messages']['success'] ?>
        </div>
    <?php endif; ?>

    <main class="flex flex-col items-center justify-center h-full">

        <div class="flex gap-5">
            <div class="text-center bg-green-500 rounded-lg p-2">
                <p>Créer un joueur</p>
                <a class="text-center" href="/admin/Players/createPlayer.php">Créer</a>
            </div>
            <div class="text-center bg-yellow-500 rounded-lg p-2">
                <p>Modifier un joueur</p>
                <a class="text-center" href="/modifyPlayer.php">Modifier</a>
            </div>
            <div class="text-center bg-red-500 rounded-lg p-2">
                <p>Supprimer un joueur</p>
                <a class="text-center" href="">Supprimer</a>
            </div>
        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
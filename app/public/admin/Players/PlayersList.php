<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$users = findAllUsers();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste des joueurs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main class="h-full">
        <ul class="mt-2 ">
            <?php foreach ($users as $user) : ?>
                <li class="w-5/6 border-1 mx-auto flex justify-between p-2 mb-2 rounded-lg 
                bg-slate-200/50 border-slate-400 backdrop-blur-sm drop-shadow-md"><?= $user['pseudo'] ?> (<?= $user['prenom'].' '.$user['nom'] ?>)
                  <span>Score : <span class="text-green-500"><?= $user['scoreTotal'] ?></span></span>
                    <span>
                       <a class ="bg-green-500 p-2 rounded-lg" href="/admin/Players/scoreModify.php?id=<?=$user['id']?>">Modifier score</a>
                        <a class ="bg-yellow-500 p-2 rounded-lg" href="/admin/Players/playerModify.php?id=<?=$user['id']?>">Modifier joueur</a> 
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
    
</body>
</html>
<?php

require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';
session_start();
$users = findAllUsersByScore();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/scripts/showMoreIndex.js" defer></script>
    
    <title>Uno Games</title>
</head>

<body class="min-h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>

    <main
        class="flex flex-col items-center justify-center flex-grow bg-yellow-100 bg-[url(/assets/images/animatedBG.gif)] bg-cover bg-center py-5">
        <div class="flex flex-wrap gap-5 items-center justify-center w-full flex-grow">
            <?php foreach ($users as $index => $user): ?>
                <?php if ($user['isAdmin'] == 0): ?>
                    <?php if ($index == 0): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-yellow-200/50 backdrop-blur-lg border-2 border-yellow-300/50 rounded-lg p-5 shadow-lg scale-110 z-0 hover:z-10 hover:scale-150  order-2 transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-yellow-300/50 hover:scale-110" src="admin/Players/avatars/<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-yellow-400"><?= $user['pseudo'] ?>👑</h2>
                            <h3 class="text-white text-xl text-shadow-lg western"><?= $user['prenom'] ?></h3>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php elseif ($index == 1): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-gray-200/50 backdrop-blur-lg border-2 border-gray-300/50 backdrop-brightness-60 rounded-lg p-5 shadow-lg order-1 z-0 hover:scale-150 hover:z-10 transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-gray-300/50 hover:scale-110 " src="admin/Players/avatars/<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-gray-300"><?= $user['pseudo'] ?>🥈</h2>
                            <h3><?= $user['prenom'] ?></h3>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php elseif ($index == 2): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-amber-600/50 backdrop-blur-lg border-2 border-amber-600/50 rounded-lg p-5 shadow-lg order-3 hover:z-10 hover:scale-150  transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-amber-600/50 hover:scale-110 " src="admin/Players/avatars/<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-amber-600"><?= $user['pseudo'] ?>🥉</h2>
                            <h3><?= $user['prenom'] ?></h3>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="grid grid-cols-3 gap-5 items-center justify-center hidden mt-10 hidden-container">
            <?php foreach ($users as $index => $user): ?>
                <?php if ($user['isAdmin'] == 0 && $index > 2): ?>
                    <div class="flex flex-col items-center gap-2 bg-blue-200/50 backdrop-blur-lg border-2 border-blue-300/50 rounded-lg p-5 shadow-lg hover:scale-150 hover:z-10  transition-all duration-300">
                        <img class="w-32 h-32 rounded-full border-4 border-blue-300/50 hover:scale-110" src="admin/Players/avatars/<?= $user['imgProfil'] ?>"
                            alt="Avatar de <?= $user['pseudo'] ?>">
                        <h2 class="text-2xl font-bold text-blue-400"><?= $user['pseudo'] ?></h2>
                        <h3><?= $user['prenom'] ?></h3>
                        <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div>
           <button id="showMoreBtn" class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western">Voir plus</button>
            <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western" href="/galery.php">Voir la galerie</a> 
        </div>
        


    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>

<!-- creer les div avec la classe display none -->
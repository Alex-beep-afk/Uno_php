<?php

require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';
session_start();
$users = findAllUsersByScoreLimit(3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Uno Games</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>

    <main
        class="flex items-center justify-center h-full bg-[url('/assets/images/Uno_bg.webp')] bg-contain bg-center bg-no-repeat">
        <div class="flex flex-wrap gap-5 items-center justify-center">
            <?php foreach ($users as $index => $user): ?>
                <?php if ($user['isAdmin'] == 0): ?>
                    <?php if ($index == 0): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-yellow-200/50 backdrop-blur-lg border-2 border-yellow-300/50 rounded-lg p-5 shadow-lg scale-110 hover:scale-150 hover:z-2 order-2 transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-yellow-300/50" src="<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-yellow-400"><?= $user['pseudo'] ?>👑</h2>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php elseif ($index == 1): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-gray-200/50 backdrop-blur-lg border-2 border-gray-300/50 backdrop-brightness-60 rounded-lg p-5 shadow-lg order-1 hover:scale-120 hover:z-2 transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-gray-300/50" src="<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-gray-300"><?= $user['pseudo'] ?>🥈</h2>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php elseif ($index == 2): ?>
                        <div
                            class="flex flex-col items-center gap-2 bg-amber-600/50 backdrop-blur-lg border-2 border-amber-600/50 rounded-lg p-5 shadow-lg order-3 hover:scale-120 hover:z-2 transition-all duration-300">
                            <img class="w-32 h-32 rounded-full border-4 border-amber-600/50" src="<?= $user['imgProfil'] ?>"
                                alt="Avatar de <?= $user['pseudo'] ?>">
                            <h2 class="text-2xl font-bold text-amber-600"><?= $user['pseudo'] ?>🥉</h2>
                            <p class="text-lg font-semibold text-white">Score : <?= $user['scoreTotal'] ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>


    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
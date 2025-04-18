<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';
$users = findAllUsers();
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
        class="flex items-center justify-center h-full bg-[url('/assets/images/Uno_bg.jpg')] bg-contain bg-center bg-no-repeat">
        <div class="flex flex-wrap gap-5 items-center justify-center">
            <?php foreach ($users as $user): ?>
                <div
                    class="flex flex-col justify-center items-center bg-slate-200/50 border-2 border-slate-400 w-50 backdrop-blur-sm">
                    <h3><?= $user['nom'] ?></h3>
                    <h3><?= $user['pseudo'] ?></h3>
                    <h3><?= $user['scoreTotal'] ?></h3>
                </div>
            <?php endforeach; ?>
        </div>


    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
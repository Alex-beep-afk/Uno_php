<?php
require_once '/app/config/database.php';
require_once '/app/Requests/score.php';

session_start();

$user = $_SESSION['user'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Hello buddy</title>
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main class="h-full">
        <h1>Hello <?= $user['nom'] ?></h1>
        <p>Your score is : <?= $score['score'] ?></p>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
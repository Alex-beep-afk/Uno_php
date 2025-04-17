<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
var_dump(findAllUsers());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>

    <main class="h-full">
        <div class="flex justify-center items-center h-full">
            <img src="assets/images/Uno_bg.jpg" alt="aieaieaie">
        </div>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
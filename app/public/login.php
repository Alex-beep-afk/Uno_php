<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';

session_start();



if (!empty($_POST)) {
    $pseudo = strip_tags($_POST['pseudo']) ?? '';
    $password = strip_tags($_POST['password']) ?? '';

    $user = findOneByPseudo($pseudo);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        $_SESSION['messages']['success'] = 'Vous etes bien connecté';
        header('Location: admin/index.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <title>Uno Games-Login</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>
    <main class="h-full">
        <div class="flex justify-center items-center h-full">
            <form class="flex flex-col gap-2" action="" method="post">
                <label class="text-center" for="pseudo">Username</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="pseudo" type="text" placeholder="Pseudo">
                <label for="password">Password</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="password" type="password" placeholder="Password">
                <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Se connecter</button>
            </form>
        </div>
    </main>
    
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
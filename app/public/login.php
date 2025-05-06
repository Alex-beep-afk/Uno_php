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
    <main class="h-full western bg-[url(/assets/images/bg-login.webp)] bg-cover bg-center bg-no-repeat">
        <div class="flex justify-center items-center h-full bg-slate-200/50 backdrop-blur-sm">
            <form class="flex flex-col gap-2 items-center" action="" method="post">
                <label class="text-center" for="pseudo">Username</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="pseudo" type="text" placeholder="Pseudo">
                <label for="password">Password</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="password" type="password" placeholder="Password">
                <button class=" flex my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    type="submit"><img class="w-7 h-7 mr-2" src="/assets/images/icons/icon-login.png" alt="">Se
                    connecter</button>
            </form>
        </div>
    </main>

    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
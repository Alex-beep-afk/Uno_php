<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
if (!empty($_POST)) {
    $pseudo = $_POST['pseudo'];
    $user = findOneByPseudo($pseudo);
    if ($user && password_verify($_POST['password'], $user['password'])) {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['messages']['success'] = 'Vous etes bien connecté';
        header('Location: admin/index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Uno Games-Login</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <div class="flex justify-center items-center h-full">
        <form class="flex flex-col gap-2" action="" method="post">
            <label class="text-center" for="pseudo">Username</label>
            <input class="p-2 bg-slate-200 rounded-lg" name="pseudo" type="text" placeholder="Pseudo">
            <label for="password">Password</label>
            <input class="p-2 bg-slate-200 rounded-lg" name="password" type="password" placeholder="Password">
            <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Se connecter</button>
        </form>
    </div>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
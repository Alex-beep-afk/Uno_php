<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$id = (int) strip_tags($_GET['id']);

$user = findOneById($id) ?? '';





if (!empty($user) && (!empty($_POST))) {
    $score = (int) strip_tags($_POST['score']);


    if ($score === "e" || $score < 0) {
        $_SESSION['messages']['danger'] = "Le score entré doit etre numérique et positif";
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit(302);
    }

    if (updateScoreById($id, $score)) {
        $_SESSION['messages']['success'] = "Le score a bien ete modifie";
        header('Location: /admin/Players/PlayersList.php');
        exit(302);
    } else {
        $_SESSION['messages']['danger'] = "Le score n'a pas pu etre modifie";
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit(302);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Modifier le score</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>
    <main class="h-full">
        <div class="flex justify-center items-center h-full">
            <form class="flex flex-col gap-2" action="" method="post">
                <label class="text-center" for="score">Score</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="score" type="number" placeholder="score"
                    value="<?= $user['scoreTotal'] ?>">

                <button class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    type="submit">Modifier le score</button>
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="/admin/Players/playersList.php">Retour</a>
            </form>
        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>


</body>

</html>
<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$id = strip_tags($_GET['id']);

$user = findOneById($id) ?? '';



var_dump(updateScoreById('x',56));

if (!empty($user) && (!empty($_POST))){
    $score = (int)strip_tags($_POST['score']);
    
    if ($score === "e" || $score < 0){
        $_SESSION['messages']['danger']= "Le score entré doit etre numérique et positif";
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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php';?>
    <main class="h-full">
    <div class="flex justify-center items-center h-full">
            <form class="flex flex-col gap-2" action="" method="post">
                <label class="text-center" for="score">Score</label>
                <input class="p-2 bg-slate-200 rounded-lg" name="score" type="number" placeholder="score" value="<?=$user['scoreTotal']?>">
                
                <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Modifier le score</button>
            </form>
        </div>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

    
</body>
</html>
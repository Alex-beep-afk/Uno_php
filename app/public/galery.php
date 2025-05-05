<?php
require_once '/app/config/database.php';
require_once '/app/Requests/galerie.php';

session_start();

$images = allImages();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Uno Games | Galerie </title>
</head>

<body class="min-h-screen flex flex-col bg-yellow-100 ">
    <?php require_once './Layout/_header.php'; ?>
    <main
        class=" bg-[url(/assets/images/animatedBG.gif)] bg-cover bg-center p-5 my-auto min-h-full flex flex-col items-center justify-center">
        <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western" href="/">Retour</a>
        <section class="grid grid-cols-3 gap-5 items-center justify-center h-full">

            <?php foreach ($images as $image): ?>
                <div
                    class=" flex flex-col items-center gap-2 bg-yellow-200/50 backdrop-blur-lg border-2 border-yellow-300/50 rounded-lg p-5 shadow-lg  hover:z-10 hover:scale-105 transition-all duration-300">
                    <img class="w-32 h-32 border-4 border-yellow-300/50" src="admin/Galerie/uploads/<?= $image['name'] ?>"
                        alt="<?= $image['name'] ?>">
                    <h2 class="text-2xl font-bold text-yellow-400">Crée le : <?= $image['createdAt'] ?></h2>
                </div>
            <?php endforeach; ?>
        </section>


    </main>
    <?php require_once './Layout/_footer.php'; ?>



</body>

</html>
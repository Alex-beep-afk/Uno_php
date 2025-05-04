<?php
require_once '/app/config/utils.php';
require_once '/app/Requests/galerie.php';


session_start();
checkAdmin();

$images = allImages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Index de la galerie</title>
</head>
<body class="min-h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>

    <main class="min-h-full my-auto western">
        

        <ul class="flex flex-col gap-5 items-center justify-center my-5">
            <div class="flex gap-5 ">
              <a class="p-5 bg-blue-400 rounded-lg hover:bg-blue-600 " href="/admin/Galerie/addElementsGalerie.php">Ajouter des images</a>
              <a class="p-5 bg-blue-400 rounded-lg hover:bg-blue-600 " href="../index.php">Retour</a> 
            </div>
            
            <?php if (empty($images)) : ?>
                <li class="western text-center text-2xl font-bold border-2 border-red-600 rounded-lg bg-white p-2">Aucune image trouvée</li>
            <?php endif; ?>
            <?php foreach ($images as $image) : ?>
                <li class="flex space-between w-5/6 justify-between items-center bg-white border-2 border-slate-400 rounded-lg p-5 shadow-lg">
                    <img class="w-20 h-20" src="/admin/Galerie/uploads/<?= $image['name'] ?>" alt="image">
                    <p class="font-bold">Crée le : <?= $image['createdAt'] ?></p>
                    <a class="p-5 bg-red-400 rounded-lg hover:bg-red-600 " href="/admin/Galerie/deleteElementsGalerie.php?id=<?= $image['id'] ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>
</html>
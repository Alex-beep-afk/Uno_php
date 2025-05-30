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

    <main
        class="min-h-full my-auto western bg-[url(/assets/images/bg-computer.gif)] bg-cover bg-fixed bg-center bg-no-repeat">


        <ul class="flex flex-col gap-5 items-center justify-center my-5">
            <div class="flex gap-5 ">
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-green-200 western"
                    href="/admin/Galerie/addElementsGalerie.php"><img class="w-10 h-10"
                        src="/assets/images/icons/icon-add.png" alt=""></a>
                <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                    href="../index.php"><img class="w-10 h-10" src="/assets/images/icons/icon-return.png" alt=""></a>
            </div>

            <?php if (empty($images)): ?>
                <li
                    class="western text-center text-2xl font-bold border-2 border-red-600 rounded-lg bg-slate-600/30 backdrop-blur p-2">
                    Aucune
                    image trouvée</li>
            <?php endif; ?>
            <?php foreach ($images as $image): ?>
                <li
                    class="flex space-between w-5/6 justify-between items-center bg-white border-2 border-slate-400 rounded-lg p-5 shadow-lg">
                    <img class="w-20 h-20" src="/admin/Galerie/uploads/<?= $image['name'] ?>" alt="image">
                    <p class="font-bold">Crée le : <?= $image['createdAt'] ?></p>
                    <a class="p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-red-200 western"
                        href="/admin/Galerie/deleteElementsGalerie.php?id=<?= $image['id'] ?>"><img class="w-8 h-8"
                            src="/assets/images/icons/icon-delete.png" alt=""></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
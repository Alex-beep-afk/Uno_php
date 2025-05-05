<?php
require_once '/app/config/utils.php';
require_once '/app/Requests/galerie.php';


session_start();
checkAdmin();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/scripts/uploadGalerie.js" defer></script>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <title>Admin - Téleversement Galerie</title>
</head>

<body class="min-h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>
    <main class="h-full my-auto flex flex-col items-center">
        <form id="uploadForm" class="flex flex-col items-center justify-center gap-2 p-2">
            <label for="image">Choisissez une ou plusieurs images :</label>
            <input class="border-2 rounded-md" type="file" id="image" multiple accept="image/*" hidden required>
            <label for="image" class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600 cursor-pointer">Sélectionner des
                images</label>
            <div class="flex flex-wrap" id="previewContainer"></div>
            <button type="submit" class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600">Téléverser</button>
        </form>
        <a class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" href="/admin/Galerie/index.php">Retour</a>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

</body>

</html>

<!-- Formulaire pour téléverser plusieurs images (commenté pour l'instant) 
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="images">Choisissez plusieurs images :</label>
    <input type="file" name="images[]" id="images" multiple accept="image/*" required>
    <input type="submit" value="Téléverser">
</form> -->
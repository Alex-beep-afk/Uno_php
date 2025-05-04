<?php

require_once '/app/config/database.php';
require_once '/app/Requests/galerie.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$id = strip_tags(trim($_GET['id']));
$image = oneImage($id) ?? null;
if (!$image) {
    $_SESSION['messages']['danger'] = "L'image n'existe pas.";
    header('Location: /admin/Galerie/index.php');
    exit;
}

if (isset($_POST['delete'])) {
    if (deleteImage($id)){
        if (deleteImageFile($image['name'])) {
            $_SESSION['messages']['success'] = "L'image a bien ete supprimée.";
            header('Location: /admin/Galerie/index.php');
            exit;
        }else {
            $_SESSION['messages']['danger'] = "Une erreur systeme est survenu dans la suppression de l'image.";
            header('Location: /admin/Galerie/index.php');
            exit;
        }
        $_SESSION['messages']['danger'] = "L'image n'a pas pu être supprimée.";
        header('Location: /admin/Galerie/index.php');
        exit;
    }
    
   $_SESSION['messages']['danger'] = "L'image n'a pas pu être supprimée.";
    header('Location: /admin/Galerie/index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uno Game | Admin | Galerie - Suppression</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>

    <main class="min-h-full my-auto western">
        <div class="flex flex-col items-center justify-center gap-5 h-full">
            <h1 class="text-2xl font-bold">Suppression d'une image</h1>
            <p class="text-lg">Êtes-vous sûr de vouloir supprimer cette image ?</p>
            <img class="w-60 h-60" src="/admin/Galerie/uploads/<?= $image['name'] ?>" alt="image">
            <p class="font-bold">Crée le : <?= $image['createdAt'] ?></p>
            <form action="" method="POST" class="flex flex-col items-center gap-5 mt-5">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <button type="submit" name="delete" class="p-5 bg-red-400 rounded-lg hover:bg-red-600" onclick="return confirm('Cette action est irreversible. Voulez-vous vraiment supprimer cette image ?')">Supprimer</button>
                <a href="/admin/Galerie/index.php" class="p-5 bg-blue-400 rounded-lg hover:bg-blue-600">Annuler</a>
            </form>
        </div>
    </main>

    <?php require_once '/app/public/Layout/_footer.php'; ?>
    
</body>
</html>
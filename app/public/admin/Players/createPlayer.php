<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

if (!empty($_POST)) {
    if (!empty($_POST['pseudo']) || !empty($_POST['password'])) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = trim(strip_tags($value));
        }

        if (findOneByPseudo($_POST['pseudo'])) {
            $_SESSION['messages']['danger'] = 'Le joueur existe déjà';
            header('Location: /admin/Players/createPlayer.php');
            exit(302);
        }

        // GESTION DE L'UPLOAD
        $imgPath = 'missingno.webp'; // Valeur par défaut
        if (!empty($_FILES['imgProfil']['tmp_name'])) {
            $file = $_FILES['imgProfil'];
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
            $maxSize = 2 * 1024 * 1024; // 2 Mo
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedTypes)) {
                $_SESSION['messages']['danger'] = 'Format d’image non autorisé.';
                header('Location: /admin/Players/createPlayer.php');
                exit;
            }

            if ($file['size'] > $maxSize) {
                $_SESSION['messages']['danger'] = 'L’image est trop lourde (max 2Mo).';
                header('Location: /admin/Players/createPlayer.php');
                exit;
            }

            $uploadDir = '/app/public/admin/Players/avatars/';
            $newFileName = uniqid('avatar_', true) . '.' . $ext;
            $fullPath = $uploadDir . $newFileName;

            if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                $imgPath = $newFileName;
            } else {
                $_SESSION['messages']['danger'] = 'Échec du téléversement de l’image.';
                header('Location: /admin/Players/createPlayer.php');
                exit;
            }
        }

        $user = [
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'scoreTotal' => (int)($_POST['scoreTotal'] ?? 0),
            'imgProfil' => $imgPath
        ];

        if (createUser($user)) {
            $_SESSION['messages']['success'] = 'Le joueur a bien été créé';
        } else {
            $_SESSION['messages']['danger'] = 'Le joueur n\'a pas pu être créé';
        }

    } else {
        $_SESSION['messages']['warning'] = 'Veuillez remplir les champs obligatoires';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin - Create Player</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php';?>

    <main class="h-full">
        <form class="flex flex-col items-center justify-center gap-2 p-2" action="" method="post" enctype="multipart/form-data">
            <label for="pseudo">Pseudo</label>
            <input class="border-2 rounded-md" type="text" name="pseudo" id="pseudo" required>

            <label for="password">Password</label>
            <input class="border-2 rounded-md" type="password" name="password" id="password" required>

            <label for="scoreTotal">Score total</label>
            <input class="border-2 rounded-md" type="number" name="scoreTotal" id="scoreTotal">

            <label for="imgProfil">Image de profil</label>
            <input class="border-2 rounded-md" type="file" name="imgProfil" id="imgProfil">

            <label for="nom">Nom</label>
            <input class="border-2 rounded-md" type="text" name="nom" id="nom">

            <label for="prenom">Prenom</label>
            <input class="border-2 rounded-md" type="text" name="prenom" id="prenom">

            <button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" type="submit">Créer un joueur</button>
            <a class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" href="/admin/index.php">Retour</a>
        </form>

    </main>
    <?php require_once '/app/public/Layout/_footer.php'; ?>

</body>

</html>
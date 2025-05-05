<?php

require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

$id = (int) strip_tags($_GET['id']);
$user = findOneById($id);

if (empty($user)) {
    $_SESSION['messages']['danger'] = 'Le joueur n\'existe pas';
    header('Location: /admin/Players/index.php');
    exit(302);
}

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = strip_tags(trim($value));
    }

    if ($_POST['password'] !== '') {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_ARGON2I);
    } else {
        $_POST['password'] = $user['password'];
    }

    if ($_POST['scoreTotal'] === '' || $_POST['scoreTotal'] < 0) {
        $_POST['scoreTotal'] = 0;
    }

    if ($_POST['pseudo'] !== $user['pseudo'] && findOneByPseudo($_POST['pseudo'])) {
        $_SESSION['messages']['danger'] = 'Ce pseudo est déjà pris';
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit(302);
    }

    // Upload avatar
    $imgProfil = $user['imgProfil'];
    if (!empty($_FILES['imgProfil']['name'])) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
        $uploadDir = '/app/public/admin/Players/avatars/';
        $extension = strtolower(pathinfo($_FILES['imgProfil']['name'], PATHINFO_EXTENSION));

        if (in_array($extension, $allowedTypes)) {
            $newFileName = uniqid('avatar_', true) . '.' . $extension;
            $targetPath = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['imgProfil']['tmp_name'], $targetPath)) {
                $imgProfil = $newFileName;
                if ($user['imgProfil'] && file_exists($uploadDir . $user['imgProfil'])) {
                    unlink($uploadDir . $user['imgProfil']); // Supprimer l'ancien avatar
                }
            }
        }
    }

    $updateUser = [
        'id' => $user['id'],
        'pseudo' => $_POST['pseudo'],
        'password' => $_POST['password'],
        'scoreTotal' => $_POST['scoreTotal'],
        'imgProfil' => $imgProfil,
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom']
    ];

    if (updateUser($updateUser)) {
        $_SESSION['messages']['success'] = 'Le joueur a bien été modifié';
        header('Location: /admin/Players/playersList.php');
        exit(302);
    } else {
        $_SESSION['messages']['danger'] = 'Une erreur est survenue';
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit(302);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <title>Admin - Modifier Joueur</title>
</head>

<body class="h-screen flex flex-col">
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <?php require_once '/app/public/Layout/_messages.php'; ?>

    <main class="h-full">
        <form class="flex flex-col items-center justify-center gap-2 p-2" action="" method="post"
            enctype="multipart/form-data">

            <label for="pseudo">Pseudo</label>
            <input class="border-2 rounded-md" type="text" name="pseudo" id="pseudo"
                value="<?= htmlspecialchars($user['pseudo']) ?>" required>

            <label for="password">Password (laisser vide pour ne pas changer)</label>
            <input class="border-2 rounded-md" type="password" name="password" id="password">

            <label for="scoreTotal">Score total</label>
            <input class="border-2 rounded-md" type="number" name="scoreTotal" id="scoreTotal"
                value="<?= htmlspecialchars($user['scoreTotal']) ?>">

            <label for="imgProfil">Nouvel avatar (optionnel)</label>
            <input class="border-2 rounded-md" type="file" name="imgProfil" id="imgProfil" accept="image/*">

            <?php if ($user['imgProfil']): ?>
                <p>Avatar actuel :</p>
                <img src="/admin/Players/avatars/<?= htmlspecialchars($user['imgProfil']) ?>" alt="Avatar"
                    class="w-24 h-24 object-cover rounded-full">
            <?php endif; ?>

            <label for="nom">Nom</label>
            <input class="border-2 rounded-md" type="text" name="nom" id="nom"
                value="<?= htmlspecialchars($user['nom']) ?>">

            <label for="prenom">Prénom</label>
            <input class="border-2 rounded-md" type="text" name="prenom" id="prenom"
                value="<?= htmlspecialchars($user['prenom']) ?>">

            <button class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                type="submit">Enregistrer</button>
            <a class="my-5 p-5 border-4 border-red-600 bg-white rounded-lg hover:bg-yellow-200 western"
                href="/admin/Players/playersList.php">Retour</a>
        </form>
    </main>

    <?php require_once '/app/public/Layout/_footer.php'; ?>
</body>

</html>
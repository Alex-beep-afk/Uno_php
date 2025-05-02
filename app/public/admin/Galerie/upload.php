<?php

require_once '/app/config/database.php';
require_once '/app/Requests/galerie.php';

$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));



// Vérifier si c'est bien une image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check === false) {
    die("Le fichier n'est pas une image.");
}

// Renommer le fichier avec un identifiant unique
$newFileName = uniqid("img_", true) . "." . $imageFileType;
$targetFile = $targetDir . $newFileName;

// Vérifier si le fichier existe déjà
if (file_exists($targetFile)) {
    die("Désolé, ce fichier existe déjà.");
}

// Limiter la taille du fichier (ex. 2MB max)
if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
    die("Le fichier est trop volumineux.");
}

// Limiter les extensions autorisées
$allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
if (!in_array($imageFileType, $allowedTypes)) {
    die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
}

// Déplacer le fichier téléversé
if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    uploadFile($newFileName); // Enregistrer le nom du fichier dans la base de données
    echo "L'image " . htmlspecialchars(basename($_FILES["image"]["name"])) . " a été téléversée avec succès.";
} else {
    echo "Une erreur est survenue lors du téléversement.";
}
?>
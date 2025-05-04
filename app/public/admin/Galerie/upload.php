<?php

require_once '/app/config/database.php';
require_once '/app/Requests/galerie.php';
require_once '/app/config/utils.php';

session_start();
checkAdmin();

// Réponse JSON uniquement
header('Content-Type: application/json');

// Vérification basique
if (!isset($_FILES["images"])) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Aucun fichier reçu."]);
    exit;
}

$files = $_FILES["images"];
$targetDir = "uploads/";
$allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
$newFilesNames = [];

// Préparation de chaque fichier
foreach ($files["name"] as $key => $originalName) {
    $tmpName = $files["tmp_name"][$key];
    $size = $files["size"][$key];
    $type = $files["type"][$key];
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    // Vérif type réel (sécurité)
    $check = getimagesize($tmpName);
    if ($check === false) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "$originalName n'est pas une image valide."]);
        exit;
    }

    // Vérif taille
    if ($size > 2 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "$originalName dépasse 2Mo."]);
        exit;
    }

    // Vérif extension
    if (!in_array($extension, $allowedTypes)) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "$originalName a une extension non autorisée."]);
        exit;
    }

    // Création nom unique
    $newFileName = uniqid("img_", true) . "." . $extension;
    $targetFile = $targetDir . $newFileName;

    // Déplacement + DB
    if (move_uploaded_file($tmpName, $targetFile)) {
        uploadFile($newFileName);
        $newFilesNames[] = $newFileName;
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Erreur lors de l'envoi de $originalName."]);
        exit;
    }
}

// Tout s’est bien passé
echo json_encode([
    "success" => true,
    "message" => "Images téléversées avec succès.",
    "files" => $newFilesNames
]);
exit;

?>
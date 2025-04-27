<?php
require_once '/app/config/database.php';
require_once '/app/Requests/users.php';
require_once '/app/Requests/score.php';


$data = json_decode(file_get_contents('php://input'), true);

$id = strip_tags((int)$data['id']) ?? null;
$score = strip_tags((int)$data['score']) ?? null;

if ($score === null || !findOneById((int) $id)) {
    $content = [
        'status' => 'error',
        'message' => 'le score n\'est pas un nombre ou l\'id n\'existe pas',
        'data' => null
    ];
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode($content);
    exit;
}

if (updateScoreById($id, $score)){
    $content = [
        'status' => 'success',
        'message' => 'le score a bien été modifié',
        'data' => [
            'score' => findScoreByid($id),
            'id' => $id,
        ]
        
    ];
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($content);
} else {
    $content = [
        'status' => 'error',
        'message' => 'une erreur est survenue lors de la modification du score',
        'data' => null
    ];
}


// En approche procedurale apres les verifications d'usage



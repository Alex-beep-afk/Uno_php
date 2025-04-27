<?php
require_once '/app/config/database.php';
function findAllUsers(): array
{
    global $db;

    //  $query = "SELECT * FROM users";

    //  $sql = $db->query($query);

    //  return $sql->fetchAll();
    return $db
        ->query('SELECT * FROM joueurs')
        ->fetchAll();
}

function findOneByPseudo(string $pseudo): array|bool
{
    global $db;
    try {
        $query = "SELECT * FROM joueurs WHERE pseudo = :pseudo";
        $sql = $db->prepare($query);
        $sql->execute(['pseudo' => $pseudo]);
        $user = $sql->fetch();
        return $user;
    } catch (Exception $e) {
        return false;
    }
    // TODO Creer une gestion d'erreur si on n'arrive pas à trouver l'utilisateur

}
function findOneById(int $id): array|bool{
    global $db;
    try {
        $query = "SELECT * FROM joueurs WHERE id = :id";
        $sql = $db -> prepare($query);
        $sql -> execute(['id'=> $id]);
        $user = $sql ->fetch();
        return $user;
    }catch(Exception $e) {
        return false;
    }
}
function createUser(array $user): bool
{

    global $db;
    try {
        $query = "INSERT INTO joueurs (pseudo, password, nom, prenom, scoreTotal, imgProfil, isAdmin) VALUES (:pseudo, :password, :nom, :prenom, :scoreTotal, :imgProfil, 0)";
        $sql = $db->prepare($query);
        $sql->execute([
            'pseudo' => $user['pseudo'],
            'password' => password_hash($user['password'], PASSWORD_ARGON2I),
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'scoreTotal' => $user['scoreTotal'],
            'imgProfil' => $user['imgProfil']
        ]);
        return true;
    } catch (Exception $e) {
        return false;

    }


}
function updateUser(array $user): bool{
    global $db;

    $query = "UPDATE joueurs SET pseudo = :pseudo, scoreTotal = :scoreTotal , imgProfil = :imgProfil , nom = :nom , prenom = :prenom ";
    $params = [
        'pseudo'=>$user['pseudo'],
        'scoreTotal' => $user['scoreTotal'],
        'imgProfil' => $user['imgProfil'],
        'nom' => $user['nom'],
        'prenom'=> $user['prenom'],
        'id' => $user['id']
    ];

    if($user['password'] !== ''){
        $query = $query . " , password = :password ";
        $params['password'] = $user['password'];
    }

    $query = $query . "WHERE id = :id";

    try{
        $sql = $db->prepare($query);
        $sql->execute($params);
        return true;
    }catch(Exception $e){
        var_dump($query);
        return false;

    }
    
}
function deleteUser(int $id): bool{
    global $db;
    try{
        $query = "DELETE FROM joueurs WHERE id = :id";
        $sql = $db->prepare($query);
        $sql->execute(['id'=>$id]);
        return true;
    }catch(Exception $e){
        return false;
    }
}
function findAllUsersByScore(): array
{
    global $db;
    return $db->query('SELECT * FROM joueurs ORDER BY scoreTotal DESC')->fetchAll();
}
function findAllUsersByScoreLimit(int $limit): array
{
    global $db;
    return $db->query('SELECT * FROM joueurs ORDER BY scoreTotal DESC LIMIT ' . $limit)->fetchAll();
}


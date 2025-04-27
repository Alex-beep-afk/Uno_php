<?php

require_once '/app/config/database.php';

function updateScoreById(int $id , int $scoreTotal) :bool {
    global $db;
    try{
        $query = "UPDATE joueurs SET scoreTotal = :scoreTotal WHERE id = :id";
        $sql = $db -> prepare($query);
        $sql -> execute([
        'scoreTotal'=>$scoreTotal,
        'id'=>$id
        ]);
        return true;
    }catch(Exception $e){
        $_SESSION['messages']['danger'] = "la requete n'a pas pu aboutir";
        header('Location: ' . $_SERVER['REQUEST_URI']);
        return false;
    }
    
}
function findScoreByid(int $id) :int|bool{
    global $db;
    try{
        $query = "SELECT scoreTotal FROM joueurs WHERE id = :id";
        $sql = $db -> prepare($query);
        $sql -> execute([
            'id'=>$id
        ]);
        return $sql->fetchColumn();
    }catch(Exception $e){
        return false;
    }
}

?>
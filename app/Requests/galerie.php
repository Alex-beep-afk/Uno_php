<?php

require_once '/app/config/database.php';

function uploadFile(string $file): bool{
    global $db;
    try{
        $query = "INSERT INTO galerie (name) VALUES (:name)";
        $sql = $db -> prepare($query);
        $sql -> execute([
            'name'=>$file
        ]);
        return true;
    }catch(Exception $e){
        $_SESSION['messages']['danger'] = "la requete n'a pas pu aboutir";
        header('Location: ' . $_SERVER['REQUEST_URI']);
        return false;
    }
}
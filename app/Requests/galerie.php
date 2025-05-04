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

function allImages(): array{
    global $db;
    try{
        $query = "SELECT * FROM galerie";
        $sql = $db -> prepare($query);
        $sql -> execute();
        return $sql -> fetchAll();
    }catch(Exception $e){
        return [];
    }
}
function oneImage(int $id): array|bool{
    global $db;
    try{
        $query = "SELECT * FROM galerie WHERE id = :id";
        $sql = $db -> prepare($query);
        $sql -> execute([
            'id'=>$id
        ]);
        return $sql -> fetch();

    }catch(Exception $e){   
        return false;
    }
}
function deleteImage(int $id): bool{
    global $db;
    try{
        $query = "DELETE FROM galerie WHERE id = :id";
        $sql = $db -> prepare($query);
        $sql -> execute([
            'id'=>$id
        ]);
        return true;
    }catch(Exception $e){
        return false;
    }
}
function deleteImageFile(string $file): bool{
    $filePath = '/app/public/admin/Galerie/uploads/' . $file;
    if (file_exists($filePath)) {
        unlink($filePath);
        return true;
    }
    return false;
}
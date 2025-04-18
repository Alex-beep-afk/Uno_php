<?php
try {
    $dsn = "mysql:host=dataBase;dbname=Uno_game;charset=utf8mb4";

    $db = new PDO(
        $dsn,
        'root',
        null,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : $error->getMessage()");
}


?>
<?php
require_once '/app/config/database.php';
function findAllUsers(): array
{
    global $db;

    //  $query = "SELECT * FROM users";

    //  $sql = $db->query($query);

    //  return $sql->fetchAll();
    return $db
        ->query('SELECT * FROM joueur')
        ->fetchAll();
}
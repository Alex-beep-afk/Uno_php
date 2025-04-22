<?php

 function checkAdmin() : void {
    if(empty($_SESSION['user'])||$_SESSION['user']['isAdmin'] === 0){
        $_SESSION['messages']['danger'] = "Vous n'avez pas le droit d'acceder à cette page";

        header("Location: /login.php");
        exit(302);
}
 } 
?>
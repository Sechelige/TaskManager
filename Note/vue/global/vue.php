<?php
$utilisateurid = $_GET['id'];
require_once("../../model/note.php");
require_once("../../model/utilisateur.php");
require_once("../../config/connexion.php");
Connexion::connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../../css/style.css' />
    <title>vue</title>
</head>
<body>
    <?php
        include("../../vue/navbar/navbar.html");
        Utilisateur::afficherUtilisateur($utilisateurid);
        include ("../../vue/note/newNote.html");
        
        Note::afficherNoteBulle($utilisateurid);
    ?>
</body>
</html>
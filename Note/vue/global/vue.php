<?php
session_start();
$utilisateurid = 1201;
$_SESSION['utilisateurid'] = $utilisateurid;

require_once("../../model/note.php");
require_once("../../model/utilisateur.php");
require_once("../../config/connexion.php");
Connexion::connect();
include ("../../vue/debut.html");
include("../../vue/navbar/navbar.php");
Utilisateur::afficherUtilisateur($utilisateurid);
include ("../../vue/note/newNote.html");
Note::afficherNoteBulle($utilisateurid);
include ("../../vue/fin.html");
?>

<?php
session_start();
$utilisateurid = $_SESSION['utilisateurid'];

$idNote = $_GET['idNote'];

require_once("../../model/note.php");
require_once("../../model/utilisateur.php");
require_once("../../config/connexion.php");
include ("../../vue/debut.html");
include("../../vue/navbar/navbar.php");
Connexion::connect();
Note::afficherNote($utilisateurid, $idNote);
?>
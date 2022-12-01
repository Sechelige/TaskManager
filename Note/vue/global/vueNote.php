<?php
$idNote = $_GET['idNote'];
require_once("../../model/note.php");
require_once("../../model/utilisateur.php");
require_once("../../config/connexion.php");
Connexion::connect();
Note::afficherNote($idNote);
?>
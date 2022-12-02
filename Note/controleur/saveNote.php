<?php
session_start();
$numUtilisateur = $_SESSION['id'];
$numNote = $_POST['idNote'];
$titreNote = $_POST['titreNote'];
$contenueNote = $_POST['contenueNote'];
$dateModifNote = date("Y-m-d");
require_once("../model/note.php");
require_once("../config/connexion.php");
Connexion::connect();
Note::sauvegarderNote($numUtilisateur,$numNote, $titreNote, $contenueNote, $dateModifNote);
?>
<?php
    session_start();
    $utilisateurid = $_SESSION['utilisateurid'];
    $numNote = $_GET['idNote'];
    require_once("../model/note.php");
    require_once("../config/connexion.php");
    Connexion::connect();
    Note::deleteNote($utilisateurid, $numNote);
?>
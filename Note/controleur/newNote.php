<?php 
session_start();
$utilisateurid = $_SESSION['utilisateurid'];
require_once("../model/note.php");
require_once("../config/connexion.php");
Connexion::connect();
Note::createNote($utilisateurid);
?>
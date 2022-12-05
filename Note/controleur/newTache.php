<?php
session_start();
$utilisateurid = $_SESSION['utilisateurid'];
require_once("../model/tache.php");
require_once("../config/connexion.php");
Connexion::connect();
Tache::newTache($utilisateurid);
header("Location: ../vue/global/vue.php");
?>
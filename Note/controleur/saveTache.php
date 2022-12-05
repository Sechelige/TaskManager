<?php
$intituléTache = $_POST['intituléTache'];
$couleurTache = $_POST['couleurTache'];
$etatTache = $_POST['etatTache'];
$dateModifTache = date("Y-m-d");
require_once("../model/tache.php");
require_once("../config/connexion.php");
Connexion::connect();
Tache::editTache($_GET['numTache'], $intituléTache, $couleurTache, $dateModifTache, $etatTache);
header("Location: ../vue/global/vue.php");
?>
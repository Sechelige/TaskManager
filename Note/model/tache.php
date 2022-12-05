<?php
class Tache {
    private $numTache;
    private $intituléTache;
    private $couleurTache;
    private $dateModifTache;
    private $etatTache;

    //constructeur
    public function __construct($numTache = NULL, $intituléTache = NULL, $couleurTache = NULL, $dateRappel = NULL, $dateModifTache = NULL, $etatTache = NULL) {
        if (!is_null($numTache) && !is_null($intituléTache) && !is_null($couleurTache) && !is_null($dateRappel) && !is_null($dateModifTache) && !is_null($etatTache)) {
            $this->numTache = $numTache;
            $this->intituléTache = $intituléTache;
            $this->couleurTache = $couleurTache;
            $this->dateModifTache = $dateModifTache;
            $this->etatTache = $etatTache;
        }
    }

    //methodes

    public static function getTacheByUser($id) {
        $rep = connexion::pdo()->query("SELECT * FROM tache WHERE numUtilisateur = $id");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Tache');
        $tab_tache = $rep->fetchAll();
        return $tab_tache;
    }

    public static function afficher ($userId) {
        $tab_tache = Tache::getTacheByUser($userId);
        foreach ($tab_tache as $u) {
            include ("../../vue/tache/affTache.html");
        }
    }

    public static function newTache($userId) {
        $intituléTache = "";
        $couleurTache = "";
        $dateModifTache = date("Y-m-d");
        $etatTache = 0;
        $sql = "INSERT INTO tache (intituléTache, couleurTache, dateModifTache, etatTache, numUtilisateur) VALUES ('$intituléTache', '$couleurTache', '$dateModifTache', '$etatTache','$userId');";
        connexion::pdo()->exec($sql);
        $rep = connexion::pdo()->lastInsertId();
        return $rep;
    }

    public static function editTache($numTache, $intituléTache, $couleurTache, $dateModifTache, $etatTache) {
        $sql = "UPDATE tache SET intituléTache = '$intituléTache', couleurTache = '$couleurTache', dateModifTache = '$dateModifTache', etatTache = '$etatTache' WHERE numTache = '$numTache';";
        connexion::pdo()->exec($sql);
    }
}
?>
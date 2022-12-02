<?php
class Tache {
    private $numTache;
    private $intituléTache;
    private $couleurTache;
    private $dateRappel;
    private $dateModifTache;
    private $etatTache;

    //constructeur
    public function __construct($numTache = NULL, $intituléTache = NULL, $couleurTache = NULL, $dateRappel = NULL, $dateModifTache = NULL, $etatTache = NULL) {
        if (!is_null($numTache) && !is_null($intituléTache) && !is_null($couleurTache) && !is_null($dateRappel) && !is_null($dateModifTache) && !is_null($etatTache)) {
            $this->numTache = $numTache;
            $this->intituléTache = $intituléTache;
            $this->couleurTache = $couleurTache;
            $this->dateRappel = $dateRappel;
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
        foreach ($tab_tache as $tache) {

        }
    }
}
?>
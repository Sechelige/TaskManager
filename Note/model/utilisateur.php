<?php 
class Utilisateur {
    private $numUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $login;
    private $mailUtilisateur;
    private $motDePasse;

    //getters
    public function getIdUtilisateur() {return $this->idUtilisateur;}
    public function getNom() {return $this->nom;}
    public function getPrenom() {return $this->prenom;}
    public function getLogin() {return $this->login;}
    public function getMail() {return $this->mail;}
    public function getMotDePasse() {return $this->motDePasse;}

    //setters
    public function setIdUtilisateur($idUtilisateur) {$this->idUtilisateur = $idUtilisateur;}
    public function setNom($nom) {$this->nom = $nom;}
    public function setPrenom($prenom) {$this->prenom = $prenom;}
    public function setLogin($login) {$this->login = $login;}
    public function setMail($mail) {$this->mail = $mail;}
    public function setMotDePasse($motDePasse) {$this->motDePasse = $motDePasse;}

    //constructeur
    public function __construct($idUtilisateur = NULL, $nom = NULL, $prenom = NULL, $login = NULL, $mail = NULL, $motDePasse = NULL) {
        if (!is_null($idUtilisateur) && !is_null($nom) && !is_null($prenom) && !is_null($login) && !is_null($mail) && !is_null($motDePasse)) {
            $this->idUtilisateur = $idUtilisateur;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->login = $login;
            $this->mail = $mail;
            $this->motDePasse = $motDePasse;
        }
    }

    //méthodes
    public static function getAllUsers() {
        $rep = connexion::pdo()->query("SELECT * FROM utilisateur");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_utilisateur = $rep->fetchAll();
        return $tab_utilisateur;
    }

    public static function getUserByLogin($login) {
        $rep = connexion::pdo()->query("SELECT * FROM utilisateur WHERE login = '$login'");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_utilisateur = $rep->fetchAll();
        return $tab_utilisateur;
    }

    public static function getUserById($id) {
        $rep = connexion::pdo()->query("SELECT * FROM utilisateur WHERE numUtilisateur = '$id'");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_utilisateur = $rep->fetchAll();
        return $tab_utilisateur;
    }

    public function afficher() {
        echo "<p>Utilisateur : ".$this->numUtilisateur." ".$this->nomUtilisateur." ".$this->prenomUtilisateur." ".$this->login." ".$this->mailUtilisateur." ".$this->motDePasse."</p>";
    }

    public static function afficherUtilisateur($id) {
        $tab_u = Utilisateur::getUserById($id);
        foreach ($tab_u as $u) {
            include ("../../vue/utilisateur/affUtilisateurBvn.html");
        }
    }
}
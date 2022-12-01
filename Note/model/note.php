<?php 
class Note {
    private $numNote;
    private $titreNote;
    private $themeNote;
    private $prioNote;
    private $contenueNote;
    private $dateCreaNote;
    private $dateModifNote;

    //getters
    public function getIdNote() {return $this->idNote;}
    public function getTitle() {return $this->title;}
    public function getTheme() {return $this->theme;}
    public function getPrio() {return $this->prio;}
    public function getContent() {return $this->content;}
    public function getDateCrea() {return $this->dateCrea;}
    public function getDateModif() {return $this->dateModif;}
    
    //setters
    public function setIdNote($idNote) {$this->idNote = $idNote;}
    public function setTitle($title) {$this->title = $title;}
    public function setTheme($theme) {$this->theme = $theme;}
    public function setPrio($prio) {$this->prio = $prio;}
    public function setContent($content) {$this->content = $content;}
    public function setDateCrea($dateCrea) {$this->dateCrea = $dateCrea;}
    public function setDateModif($dateModif) {$this->dateModif = $dateModif;}

    //constructeur
    public function __construct($idNote = NULL, $title = NULL, $theme = NULL, $prio = NULL, $content = NULL, $dateCrea = NULL, $dateModif = NULL) {
        if (!is_null($idNote) && !is_null($title) && !is_null($theme) && !is_null($prio) && !is_null($content) && !is_null($dateCrea) && !is_null($dateModif)) {
            $this->idNote = $idNote;
            $this->title = $title;
            $this->theme = $theme;
            $this->prio = $prio;
            $this->content = $content;
            $this->dateCrea = $dateCrea;
            $this->dateModif = $dateModif;
        }
    }

    //méthodes
    public static function getAllNotes() {
        $rep = connexion::pdo()->query("SELECT * FROM note");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Note');
        $tab_note = $rep->fetchAll();
        return $tab_note;
    }

    public static function getNotesByUser($id) {
        $rep = connexion::pdo()->query("SELECT * FROM note WHERE numUtilisateur = $id");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Note');
        $tab_note = $rep->fetchAll();
        return $tab_note;
    }

    public static function getNoteById($id) {
        $rep = connexion::pdo()->query("SELECT * FROM note WHERE numNote = $id");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Note');
        $tab_note = $rep->fetchAll();
        return $tab_note;
    }

    public static function afficherNoteBulle($id) {
        $tab = Note::getNotesByUser($id);
        foreach ($tab as $u) {
            include ("../../vue/note/affNoteBulle.html");
        }
    }

    public static function afficherNote($idNote){
        $tab_note = Note::getNoteById($idNote);
        foreach ($tab_note as $u) {
            include ("../../vue/note/affNoteGrand.html");
        }
    }
}
?>
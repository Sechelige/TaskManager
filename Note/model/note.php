<?php 
class Note {
    private $numNote;
    private $titreNote;
    private $contenueNote;
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
            $this->content = $content;
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

    public static function getNoteByUserAndId($id, $idNote) {
        $rep = connexion::pdo()->query("SELECT * FROM note WHERE numUtilisateur = $id AND numNote = $idNote");
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

    public static function afficherNote($idNote, $id) {
        $tab_note = Note::getNoteByUserAndId($idNote, $id);
        foreach ($tab_note as $u) {
            include ("../../vue/note/affNoteGrand.html");
        }
    }

    public static function createNote ($idUtilisateur){
        $titreNote = "";
        $contenueNote = "";
        $dateModifNote = date("Y-m-d");
        $sql = "INSERT INTO note ( titreNote, contenueNote, dateModifNote, numUtilisateur) VALUES ('$titreNote', '$contenueNote', '$dateModifNote', '$idUtilisateur');";
        connexion::pdo()->exec($sql);
        $rep = connexion::pdo()->lastInsertId();
        header("Location: ../vue/global/vueNote.php?idNote=$rep");
    }

    public static function sauvegarderNote ($numUtilisateur,$numNote, $titreNote, $contenueNote, $dateModifNote){
        $sql = "INSERT INTO note (titreNote, contenueNote, dateModifNote) VALUES ('$titreNote', '$contenueNote', '$dateModifNote');";
        $sql2 = "UPDATE note SET titreNote = '$titreNote', contenueNote = '$contenueNote', dateModifNote = '$dateModifNote' WHERE numNote = '$numNote';";
        if ($numNote == 0) {
             connexion::pdo()->exec($sql);
        } else {
        connexion::pdo()->exec($sql2);
        }
        header("Location: ../vue/global/vue.php");
    }

    public static function deleteNote($numUtilisateur, $numNote){
        $sql = "DELETE FROM note WHERE numNote = '$numNote' and numUtilisateur = '$numUtilisateur';";
        connexion::pdo()->exec($sql);
        header("Location: ../vue/global/vue.php");
    }
}
?>
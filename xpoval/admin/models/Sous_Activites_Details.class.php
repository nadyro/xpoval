<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sous_Activites
 *
 * @author Nadir
 */
class Sous_Activites_Details extends Base_SQL {

    public $id;
    public $id_sous_activite_mere;
    public $id_type_sous_activite;
    public $id_rubrique_concernee;
    public $titre;
    public $description;
    public $contenu;
    public $date_ajout;
    public $date_modification;
    public $url;
    public $image;

    function getId() {
        return $this->id;
    }

    function getId_sous_activite_mere() {
        return $this->id_sous_activite_mere;
    }

    function getId_type_sous_activite() {
        return $this->id_type_sous_activite;
    }

    function getTitre() {
        return $this->titre;
    }

    function getDescription() {
        return $this->description;
    }
    
    function getContenu() {
        return $this->contenu;
    }

    function getDate_ajout() {
        return $this->date_ajout;
    }

    function getDate_modification() {
        return $this->date_modification;
    }

    function getUrl() {
        return $this->url;
    }

    function getImage() {
        return $this->image;
    }

    function getId_rubrique_concernee() {
        return $this->id_rubrique_concernee;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_sous_activite_mere($id_sous_activite_mere) {
        $this->id_sous_activite_mere = $id_sous_activite_mere;
    }

    function setId_type_sous_activite($id_type_sous_activite) {
        $this->id_type_sous_activite = $id_type_sous_activite;
    }

    function setId_rubrique_concernee($id_rubrique_concernee) {
        $this->id_rubrique_concernee = $id_rubrique_concernee;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setDescription($description) {
        $this->description = $description;
    }
    
    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setDate_ajout($date_ajout) {
        $this->date_ajout = $date_ajout;
    }

    function setDate_modification($date_modification) {
        $this->date_modification = $date_modification;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setImage($image) {
        $this->image = $image;
    }

}

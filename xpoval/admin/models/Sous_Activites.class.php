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
class Sous_Activites extends Base_SQL {
    public $id;
    public $id_activite_mere;
    public $libelle;
    public $image;
    
    function getId() {
        return $this->id;
    }

    function getId_activite_mere() {
        return $this->id_activite_mere;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_activite_mere($id_activite_mere) {
        $this->id_activite_mere = $id_activite_mere;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setImage($image) {
        $this->image = $image;
    }


}

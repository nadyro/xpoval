<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author Nadir
 */
class Event extends Base_SQL {

    public $id;
    public $type;
    public $id_activite_mere;
    public $id_sous_activite_mere;
    public $id_sujet;
    public $id_user;
    public $id_user_notifie;
    public $date_event;

    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function getId_activite_mere() {
        return $this->id_activite_mere;
    }

    function getId_sous_activite_mere() {
        return $this->id_sous_activite_mere;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getId_sujet() {
        return $this->id_sujet;
    }

    function getId_user_notifie() {
        return $this->id_user_notifie;
    }

    function getDate_event() {
        return $this->date_event;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setId_activite_mere($id_activite_mere) {
        $this->id_activite_mere = $id_activite_mere;
    }

    function setId_sous_activite_mere($id_sous_activite_mere) {
        $this->id_sous_activite_mere = $id_sous_activite_mere;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setId_sujet($id_sujet) {
        $this->id_sujet = $id_sujet;
    }

    function setId_user_notifie($id_user_notifie) {
        $this->id_user_notifie = $id_user_notifie;
    }

    function setDate_event($date_event) {
        $this->date_event = $date_event;
    }

}

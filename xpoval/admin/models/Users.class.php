<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author Nadir
 */
class Users extends Base_SQL {

    public $id;
    public $pseudo;
    public $nom;
    public $prenom;
    public $date_de_naissance;
    public $email;
    public $password;
    public $date_inscription;
    public $profil_pic;
    public $is_streamer;
    public $is_admin;

    function getId() {
        return $this->id;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getDate_de_naissance() {
        return $this->date_de_naissance;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getDate_inscription() {
        return $this->date_inscription;
    }

    function getProfil_pic() {
        return $this->profil_pic;
    }

    function getIs_streamer() {
        return $this->is_streamer;
    }
    
    function getIs_admin() {
        return $this->is_admin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setDate_de_naissance($date_de_naissance) {
        $this->date_de_naissance = $date_de_naissance;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDate_inscription($date_inscription) {
        $this->date_inscription = $date_inscription;
    }

    function setProfil_pic($profil_pic) {
        $this->profil_pic = $profil_pic;
    }

    function setIs_streamer($is_streamer) {
        $this->is_streamer = $is_streamer;
    }

    function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
    }

}

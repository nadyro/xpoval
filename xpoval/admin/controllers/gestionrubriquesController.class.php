<?php

class gestionrubriquesController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("gestionrubriques");
        $rubriques = get_rubrique();
        $v->assign("rubriques", $rubriques);
    }

    public function addrubriquesAction($args) {
        if (!empty($_POST)) {

            $message_erreur = [];
            $nom_img_md5 = '';

            if (strlen($_POST['libelle_rubrique']) < 1 || strlen($_POST['libelle_rubrique'] > 25)) {
                $message_erreur[0] = "La longueur du libelle de la rubrique doit compter entre 1 et 25 caracteres";
            } elseif (strlen($_POST['id_rubrique']) < 1 || strlen($_POST['id_rubrique'] > 5)) {
                $message_erreur[1] = "La longueur du diminutif de la rubrique doit compter entre 1 et 5 caracteres";
            }
            $encoded_libelle_rubrique = htmlspecialchars($_POST['libelle_rubrique']);
            $encoded_diminutif_rubrique = htmlspecialchars($_POST['id_rubrique']);

            if (!empty($_FILES['image_rubrique']['name'])) {
                $nom_img_md5 = md5($_FILES['image_rubrique']['name']);
                $img_md5 = "../images/rubriques/" . $_POST['id_rubrique'] . "/" . $nom_img_md5 . ".jpg";
                if (!file_exists("../images/rubriques/" . $_POST['id_rubrique'] . "/")) {
                    mkdir("../images/rubriques/" . $_POST['id_rubrique'] . "/", 0777, true);
                    move_uploaded_file($_FILES['image_rubrique']['tmp_name'], DIRECTORY_URL . $img_md5);
                } elseif (move_uploaded_file($_FILES['image_rubrique']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                    
                } else {
                    
                }
            } else {
                if ($_FILES['image_rubrique']['error'] != 0) {
                    $message_erreur[2] = "Il y a une erreur sur l image.";
                }
                if ($_FILES['image_rubrique']['size'] > 5120000 || $_FILES['image_rubrique']['size'] == 0) {
                    $message_erreur[3] = "La taille de l image doit etre inferieure a 3 mega octets.";
                }
                if ($_FILES['image_rubrique']['type'] != "image/jpeg") {
                    $message_erreur[4] = "Le type de l image doit etre au format JPG";
                }
                if (strlen($_FILES['image_rubrique']['name']) < 1) {
                    $message_erreur[5] = "L image n a pas de nom.";
                }
            }
            if (empty($message_erreur)) {
                add_or_update_rubrique("", $encoded_libelle_rubrique, $encoded_diminutif_rubrique, $nom_img_md5);
            }else{
                var_dump($message_erreur);
            }
        }
        header("Location:http://127.0.0.1/xpoval/admin/gestionrubriques");
    }

    public function updaterubriquesAction($args) {
//        var_dump($_POST);
//        var_dump($_FILES);
//        die();
        if (!empty($_FILES['image_rubrique']['name'])) {
            if ($_FILES['image_rubrique']['error'] != 0) {
                $message_erreur[0] = "Il y a une erreur sur l'image.";
            }
            if ($_FILES['image_rubrique']['size'] > 5120000) {
                $message_erreur[1] = "La taille de l'image doit être inférieure à 3 méga octets.";
            }
            if ($_FILES['image_rubrique']['type'] != "image/jpeg") {
                $message_erreur[2] = "Le type de l'image doit être au format JPG";
            }
            $nom_img_md5 = md5($_FILES['image_rubrique']['name']);
            $img_md5 = "../images/rubriques/" . $_POST['id_rubrique'] . "/" . $nom_img_md5 . ".jpg";
            if (!file_exists("../images/rubriques/" . $_POST['id_rubrique'] . "/")) {
                mkdir("../images/rubriques/" . $_POST['id_rubrique'] . "/", 0777, true);
                move_uploaded_file($_FILES['image_rubrique']['tmp_name'], DIRECTORY_URL . $img_md5);
            } elseif (move_uploaded_file($_FILES['image_rubrique']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                
            } else {
                
            }
        }elseif(!empty($_POST['image_rubrique_alias']) && empty($_FILES['image_rubrique']['name'])){
            $nom_img_md5 = $_POST['image_rubrique_alias'];
        }
        if (!empty($_POST)) {
            add_or_update_rubrique($_POST['liste_libelle_rubrique'], $_POST['libelle_rubrique'], $_POST['id_rubrique'], $nom_img_md5);
        }
        header("Location:http://127.0.0.1/xpoval/admin/gestionrubriques");
    }

    public function changeupdaterubriqueAction($args) {
        $rubrique_updated = $_GET['id_rubrique'];
        $la_rubrique = get_rubrique($rubrique_updated);
        $encoded_rubrique = json_encode($la_rubrique);
        echo $encoded_rubrique;
    }

    public function deleterubriquesAction($args) {
        if (!empty($_POST)) {
            delete_rubrique($_POST['liste_libelle_rubrique']);
            header("Location:http://127.0.0.1/xpoval/admin/gestionrubriques");
        }
    }

}

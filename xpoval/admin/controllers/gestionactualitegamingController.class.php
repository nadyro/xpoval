<?php

class gestionactualitegamingController {

    public function indexAction() {
        $v = new view();
        $v->setView("gestionactualitegaming/gestionactualitegaming");
    }

    public function gestiondivAction() {
        $v = new view();
        $v->setView("gestionactualitegaming/gestiondiv");
        $clickable = htmlspecialchars($_GET['id_clickable']);
        $id_rubrique = htmlspecialchars($_GET['id_rubrique']);
        $v->assign("clickable", $clickable);
        $v->assign("id_rubrique", $id_rubrique);
        $message_erreur = [];
        if (!empty($_POST) && !empty($clickable)) {
            $id_sous_activite_mere = $clickable;
            $id_rubrique = $id_rubrique;
            $titre = htmlspecialchars($_POST['actualite_titre']);
            $description = htmlspecialchars($_POST['actualite_description']);
            $id_type_sous_activite = htmlspecialchars($_POST['id_type_sous_activite']);
            $contenu = htmlspecialchars($_POST['contenu_actualite']);
            $name = $_POST['activite_mere'] . "-" . $clickable . "-" . $id_rubrique . "-" . $_POST['id_type_sous_activite']
                    . "-" . $titre . "-" . date("Y-m-d:G:m:s", strtotime("now"));
            $url_setted = md5($name);

            if (!empty($_FILES['actualite_bg']['name'])) {
                if ($_FILES['actualite_bg']['error'] != 0) {
                    $message_erreur[1] = "Il y a une erreur sur l'image.";
                }
                if ($_FILES['actualite_bg']['size'] > 5120000) {
                    $message_erreur[2] = "La taille de l'image doit être inférieure à 3 méga octets.";
                }
                if ($_FILES['actualite_bg']['type'] != "image/jpeg") {
                    $message_erreur[3] = "Le type de l'image doit être au format JPG";
                }
                $nom_img_md5 = md5($_FILES['actualite_bg']['name']);
                $img_md5 = "/images/actualitegaming/".$clickable."/" . $nom_img_md5 . ".jpg";
                if (move_uploaded_file($_FILES['actualite_bg']['tmp_name'], dirname(DIRECTORY_URL) . $img_md5)) {
                    
                } else {
                    
                }
            }
//            var_dump($name);
//            var_dump($url_setted);
//            var_dump($_POST);
//            var_dump($_FILES);
//            
//            var_dump($img_md5);
//            var_dump($id_sous_activite_mere);
//            var_dump($id_rubrique);
//            die();
            $sous_activite = new Sous_Activites_Details();
            $sous_activite->setId_sous_activite_mere($id_sous_activite_mere);
            $sous_activite->setId_rubrique_concernee($id_rubrique);
            $sous_activite->setId_type_sous_activite($id_type_sous_activite);
            $sous_activite->setTitre($titre);
            $sous_activite->setDescription($description);
            $sous_activite->setContenu($contenu);
            $sous_activite->setImage($nom_img_md5);
            $sous_activite->setDate_ajout(date("Y-m-d:G:m:s", strtotime("now")));
            $sous_activite->setDate_modification(date("Y-m-d:G:m:s", strtotime("now")));
            $sous_activite->setUrl($url_setted);
            $sous_activite->save();
            
            header("/index");
        }
    }

}

<?php

class actualitegamingController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("actualitegaming/actualitegaming");
        $sous_activites = getAll_Actualite_Gaming_Activite_By_Id_Rubrique();
        $v->assign("sous_activites", $sous_activites);
    }

    public function actualitegamingdisplayAction() {
        $v = new view();
        $v->setView("actualitegaming/actualitegamingdisplay");
//        $id_rubrique = $_GET['id_rubrique'];
        $id = htmlspecialchars($_GET['id']);
        $actualite = getActualiteGaming_activite($id);
        $v->assign("actualite", $actualite);
    }

    public function retourjsonAction() {
        $big_array = [];
        if (!empty($_GET)) {
            $id_rubrique = $_GET['id_rubrique'];
            $actualite = getActualiteGaming($id_rubrique, $_GET['array_id_sous_activites']);
            $encoded_actualite = json_encode($actualite);
            echo $encoded_actualite;
        }
    }

}

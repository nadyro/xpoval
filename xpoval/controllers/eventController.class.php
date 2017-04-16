<?php
class eventController {
    public function indexAction(){
        var_dump($_SESSION);
        var_dump($_GET);
        $type = htmlspecialchars($_GET['type']);
        $id_activite_mere = $_GET['id_activite_mere'];
        $id_sous_activite_mere = $_GET['id_sous_activite_mere'];
        $id_sujet = htmlspecialchars($_GET['id_sujet']);
        $event = new Event();
        $event->setType($type);
        $event->setId_activite_mere($id_activite_mere);
        $event->setId_sous_activite_mere($id_sous_activite_mere);
        $event->setId_sujet($id_sujet);
        $event->setId_user($_SESSION['user'][0]['id']);
        $event->setId_user_notifie(0);
        $event->setDate_event(date("y-m-d G:i:s",  strtotime("now")));
        $event->save();
    }
}

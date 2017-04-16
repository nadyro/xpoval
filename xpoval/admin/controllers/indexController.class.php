<?php

class indexController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("index");
        if (!empty($_SESSION)) {
            
        } else {
            header("Location:http://127.0.0.1/xpoval/admin/enregistrement");
        }
    }

}

<?php

class indexController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("index");
    }

    public function sliderAction($args) {
        $grandes_actualites = getGrande_Actualite();
        $encoded_grandes_actualites = json_encode($grandes_actualites);
//        $path = "../xpoval/images/rubriques";
//        $filess = [];
//        $array = [];
//        $array_json = [];
//        $path_custom = "";
//        $files = array_diff(scandir($path), array('.', '..'));
//        foreach ($files as $kk => $vv) {
//            $path_custom = $path . "/" . $vv . "/" . $vv . "_bg";
//            $array[$vv] = scandir($path_custom);
//            $filess[$vv . "/" . $vv . "_bg"] = array_diff($array[$vv], array('.', '..'));
//        }
//        foreach ($filess as $ll => $pp) {
//            foreach ($pp as $key => $value) {
//                array_push($array_json, $ll . "/" . $value);
//            }
//        }
//        echo "<pre>";
//        print_r($array_json);
//        die();
        echo $encoded_grandes_actualites;
    }

    public function sliderphotographyAction($args) {
        $grandes_actualites = getBg_Slider_Photography(4);
        $encoded_grandes_actualites = json_encode($grandes_actualites['first_row']);
        echo $encoded_grandes_actualites;
//        echo "<pre>";
//        echo $encoded_grandes_actualites;
//        echo "</pre>";
//        die();
        
//        $path = "../xpoval/images/rubriques";
//        $filess = [];
//        $array = [];
//        $array_json = [];
//        $path_custom = "";
//        $files = array_diff(scandir($path), array('.', '..'));
//        foreach ($files as $kk => $vv) {
//            $path_custom = $path . "/" . $vv . "/" . $vv . "_bg";
//            $array[$vv] = scandir($path_custom);
//            $filess[$vv . "/" . $vv . "_bg"] = array_diff($array[$vv], array('.', '..'));
//        }
//        foreach ($filess as $ll => $pp) {
//            foreach ($pp as $key => $value) {
//                array_push($array_json, $ll . "/" . $value);
//            }
//        }
//        $array_send = json_encode($array_json);
//        echo $array_send;
    }

}

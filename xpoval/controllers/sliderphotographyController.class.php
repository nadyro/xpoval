<?php

class sliderphotographyController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("sliderphotography");

        $array_images = getBg_Slider_Photography(4);
        $v->assign("value", $array_images);
        
    }
    
    public function hoverthemeAction(){
        $get_bloc = htmlspecialchars($_GET['get_bloc']);
        $images_called_after_hover = getBg_Slider_Photography_after_hover($get_bloc);
        $encoded_json = json_encode($images_called_after_hover);
        echo $encoded_json;
        
    }

}

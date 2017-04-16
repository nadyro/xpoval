<?php

class gestionsliderphotographyController {

    public function indexAction() {
        $v = new view();
        $v->setView("gestionsliderphotography");
//        var_dump($_FILES);
//        var_dump($_POST);
//        die();
        if (!empty($_FILES)) {
            $num_files = count($_FILES['media']['name']);
            $inserted = false;
            $array_images = [];
            for ($i = 0; $i < $num_files; $i++) {
                if (!empty($_FILES['media']['name'][$i])) {
                    $nom_img_md5 = md5($_FILES['media']['name'][$i]);
                    $array_images[$i] = $nom_img_md5.".jpg";
                    $img_md5 = "../images/photography/" . $nom_img_md5 . ".jpg";
                    if (move_uploaded_file($_FILES['media']['tmp_name'][$i], DIRECTORY_URL . $img_md5)) {
                        $inserted = true;
                    } else {
                        $inserted = false;
                    }
                }
            }
            $insert_bg = insertBg_Slider_Photography($array_images);
        }
    }

}

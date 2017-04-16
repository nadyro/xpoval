<?php

class enregistrementController {

    public function indexAction($args) {

        $v = new view();
        $v->setView("inscription");
    }

    public function connexionAction($args) {
        $retour_json = 0;
        $pseudo_email_user = htmlspecialchars($_GET['pseudo_email_user']);
        $password_user = htmlspecialchars($_GET['password_user']);
        $is_email = 0;
        if (preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $pseudo_email_user)) {
            $is_email = 1;
        } else {
            $is_email = 0;
        }

        $user_connexion = getUsers($pseudo_email_user, $is_email);
        foreach ($user_connexion as $kk => $vv) {
            if ($vv['password'] == $password_user && $vv['is_admin'] == 1) {
                $retour_json = 1;
                $_SESSION['user'] = $user_connexion;
            } elseif($vv['is_admin'] == 1 && $vv['password'] != $password_user) {
                $retour_json = 0;
            }else{
                $retour_json = -1;
            }
        }
        echo json_encode($retour_json);
    }

    public function inscriptionAction($args) {

        $message_erreur = [];
        if (!empty($_GET)) {
            $pseudo_user = $_GET['pseudo_user'];
            $nom_user = $_GET['nom_user'];
            $prenom_user = $_GET['prenom_user'];
            $password_user = $_GET['password_user'];
            $email_user = $_GET['email_user'];
            $date_naissance_user = $_GET['date_naissance_user'];
            if (strlen($pseudo_user) < 1 || strlen($pseudo_user) > 25) {
                $message_erreur[0] = "Votre pseudo doit compter entre 1 et 25 caractères.";
            }
            if (strlen($nom_user) < 1 || strlen($nom_user) > 25) {
                $message_erreur[1] = "Votre nom de famille doit compter entre 1 et 25 caractères.";
            }
            if (strlen($prenom_user) < 1 || strlen($prenom_user) > 25) {
                $message_erreur[2] = "Votre prénom doit compter entre 1 et 25 caractères.";
            }
            if (strlen($password_user) < 1 || strlen($password_user) > 25) {
                $message_erreur[3] = "Votre mot de passe doit compter entre 1 et 25 caractères.";
            }
            if (!filter_var($email_user, FILTER_VALIDATE_EMAIL) === false) {
                $verifying_email = getEmail($email_user);
                if ($verifying_email) {
                    $message_erreur[4] = "L'email existe déjà !";
                }
            } else {
                $message_erreur[5] = "Votre email est incorrect.";
            }
            $exploded_date = explode("-", $date_naissance_user);
            if (!empty($date_naissance_user)) {
                if (checkdate($exploded_date[1], $exploded_date[2], $exploded_date[0])) {
                    $date_naissance_user = implode("-", $exploded_date);
                } else {
                    $message_erreur[6] = "Mauvaise date de naissance";
                }
            } else {
                $message_erreur[7] = "Veuillez renseigner une date de naissance.";
            }
            if (!empty($message_erreur)) {
                $encoded_errors = json_encode($message_erreur);
                echo $encoded_errors;
            }
        }

        if (!empty($_POST)) {
            $verified_email_user = "";
            $pseudo_user = htmlspecialchars($_POST['pseudo_user']);
            $nom_user = htmlspecialchars($_POST['nom_user']);
            $prenom_user = htmlspecialchars($_POST['prenom_user']);
            $password_user = htmlspecialchars($_POST['password_user']);
            $email_user = $_POST['email_user'];
            $date_naissance_user = $_POST['date_naissance_user'];

            if (strlen($pseudo_user) < 1 || strlen($pseudo_user) > 25) {
                $message_erreur[0] = json_encode("Votre pseudo doit compter entre 1 et 25 caractères.");
            }
            if (strlen($nom_user) < 1 || strlen($nom_user) > 25) {
                $message_erreur[1] = json_encode("Votre nom de famille doit compter entre 1 et 25 caractères.");
            }
            if (strlen($prenom_user) < 1 || strlen($prenom_user) > 25) {
                $message_erreur[2] = json_encode("Votre prénom doit compter entre 1 et 25 caractères.");
            }
            if (strlen($password_user) < 1 || strlen($password_user) > 25) {
                $message_erreur[3] = json_encode("Votre pseudo doit compter entre 1 et 25 caractères.");
            }
            if (!filter_var($email_user, FILTER_VALIDATE_EMAIL) === false) {
                $verified_email_user = $email_user;
            } else {
                $message_erreur[4] = json_encode("Votre email est incorrect.");
            }
            $exploded_date = explode("-", $date_naissance_user);
            if (checkdate($exploded_date[1], $exploded_date[2], $exploded_date[0])) {
                $date_naissance_user = implode("-", $exploded_date);
            } else {
                $message_erreur[8] = "Mauvaise date de naissance";
            }
            if (!empty($_FILES['pp_user']['name'])) {
                if ($_FILES['pp_user']['error'] != 0) {
                    $message_erreur[5] = "Il y a une erreur sur l'image.";
                }
                if ($_FILES['pp_user']['size'] > 5120000) {
                    $message_erreur[6] = "La taille de l'image doit être inférieure à 3 méga octets.";
                }
                if ($_FILES['pp_user']['type'] != "image/jpeg") {
                    $message_erreur[7] = "Le type de l'image doit être au format JPG";
                }
                $nom_img_md5 = md5($_FILES['pp_user']['name']);
                $img_md5 = "/images/users/profile_pictures/" . $nom_img_md5 . ".jpg";

                if (move_uploaded_file($_FILES['pp_user']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                    
                } else {
                    
                }
            }
            $checking_email = getEmail($verified_email_user);
            if (!empty($message_erreur)) {
                die("Espèce de pirate !");
            } elseif ($checking_email) {
                echo "Email existant";
            } else {

                $user = new Users();
                $user->setPseudo($pseudo_user);
                $user->setNom($nom_user);
                $user->setPrenom($prenom_user);
                $user->setDate_de_naissance($date_naissance_user);
                $user->setEmail($verified_email_user);
                $user->setPassword($password_user);
                $user->setDate_inscription(date("Y-m-d:G:m:s", strtotime("now")));
                $user->setProfil_pic($nom_img_md5);
                $user->setIs_streamer(0);
                $user->setIs_admin(0);
                $user->save();
                header("Location:http://127.0.0.1/xpoval/");
            }
        }
    }
    
    public function deconnexionAction($args){
        session_destroy();
        header("Refresh:0; url:http://127.0.0.1/xpoval/");
        }

}

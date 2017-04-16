<?php

set_data();

function set_data() {
    global $pdo;
    $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST . "";
    $dbuser = DBUSER;
    $dbpwd = DBPWD;
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpwd);
    } catch (PDOException $e) {
        echo "connexion échouée : " . $e->getMessage();
    }
    global $home_url;
    $home_url = "http://" . $_SERVER["HTTP_HOST"];
}

function save_page_count($url, $name, $type) {
    global $pdo;
    $name = utf8_decode($name);
    $sql = "SELECT id FROM page WHERE url='$url';";
    $query = $pdo->query($sql);
    $send = false;
    if ($query) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $id = $row["id"];
            $sql = "UPDATE page SET count=count+1, nom='$name', type='$type' WHERE id=$id;";
            $query = $pdo->prepare($sql);
            $query->execute();
            $send = true;
        } else {
            $sql = "INSERT INTO page (url, count, nom, type) VALUES ('$url', 1, '$name', '$type')";
            $query = $pdo->prepare($sql);
            $query->execute();
            $send = true;
        }
    }
    return $send;
}

function print_date($date_deb, $date_fin) {
    if (strtotime($date_fin) <= strtotime($date_deb)) {
        return "Le " . date("d/m/Y", strtotime($date_deb));
    }
    return "Du " . date("d/m/Y", strtotime($date_deb)) . " au " . date("d/m/Y", strtotime($date_fin));
}

function check($dt) {
    $date = date("Y-m-d H:i:s");
    $start = new DateTime($date);
    $end = new DateTime($dt);
    $diff = $start->diff($end);
    $heure = 0;
    if ($diff->format('%d') > 0) {
        return $diff->format('%dj %hh');
    }
    if ($diff->format('%m') > 0) {
        return $diff->format('%mm, %dj, %hh');
    }
    if ($diff->format('%y') > 0) {
        return $diff->format('%yy');
    }
    if ($diff->format('%i') < 60 && $diff->format('%h') == 0) {
        return 'Moins d\'une heure';
    }
    if ($diff->format('%h') > 0) {
        $heure = $diff->format('%h') + 1;
        return $heure . "h";
    }
}

function is_logged_in() {
    return !empty($_SESSION['user']);
}

function NbPages() {
    global $pdo;
    $query = $pdo->prepare("SELECT COUNT(DISTINCT(id)) as total FROM article WHERE archive = 0");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getEmail($email) {
    global $pdo;
    $query = $pdo->prepare("SELECT id FROM users WHERE email = '" . $email . "'");
    $query->execute();

    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

//Xpoval

function get_rubrique() {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM rubriques WHERE image != ""');
    $query->execute();

    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getUsers($pseudo_email, $is_email) {
    global $pdo;
    if ($is_email == 0) {
        $query = $pdo->prepare('SELECT * FROM users WHERE pseudo = "' . $pseudo_email . '"');
    } else {
        $query = $pdo->prepare('SELECT * FROM users WHERE email = "' . $pseudo_email . '"');
    }
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getActualiteGaming($id_rubrique, $array) {
    global $pdo;
    $tableau = [];
    foreach ($array as $kk => $vv) {
        if (!empty($vv)) {
            $query = $pdo->prepare("SELECT *, date_format(date_ajout, '%d/%m/%y') AS date_ajout_day, date_format(date_ajout, '%H:%i') AS date_ajout_recent, date_format(now(), '%d/%m/%y') AS date_ajout_now FROM sous_activites_details WHERE id_rubrique_concernee = " . $id_rubrique . " AND id_sous_activite_mere"
                    . " = " . $kk);
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($row)) {
                $tableau[$vv] = $row;
            }
        }
    }
    return $tableau;
}

function getAll_Actualite_Gaming_Activite_By_Id_Rubrique() {
    global $pdo;
    $array_sous_activites_details = [];
    $query_0 = $pdo->prepare("SELECT * FROM sous_activites");
    $query_0->execute();
    $row_0 = $query_0->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row_0 as $kk => $vv) {
        if ($vv['id'] == 3 || $vv['id'] == 5) {
            $query = $pdo->prepare("SELECT * FROM sous_activites_details WHERE id_sous_activite_mere = " . $vv['id'] . " ORDER BY date_ajout DESC LIMIT 6");
        } else {
            $query = $pdo->prepare("SELECT * FROM sous_activites_details WHERE id_sous_activite_mere = " . $vv['id'] . " ORDER BY date_ajout DESC LIMIT 6");
        }
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($vv['id'] == 3 || $vv['id'] == 5) {
            $array_sous_activites_details[$vv['libelle'] . "_" . $vv['id']] = $row;
        } else {
            $array_sous_activites_details[$vv['libelle']] = $row;
        }
    }
    return $array_sous_activites_details;
}

function getActualiteGaming_activite($id) {
    global $pdo;

    $query = $pdo->prepare("SELECT a.id AS activite_mere_id ,sad.* FROM activites a, sous_activites sa, sous_activites_details sad WHERE sad.id = " . $id . ""
            . " AND sad.id_sous_activite_mere = sa.id AND sa.id_activite_mere = a.id");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

function getBg_Slider_Photography($id_type_media) {
    global $pdo;
    $array_rows = [];
    $query_1 = $pdo->prepare("SELECT * FROM media WHERE id_type_media = " . $id_type_media . " ORDER BY date_ajout DESC LIMIT 16");
    $query_1->execute();
    $row_1 = $query_1->fetchAll(PDO::FETCH_ASSOC);

//    $query_2 = $pdo->prepare("SELECT * FROM media WHERE id_type_media = " . $id_type_media);
//    $query_2->execute();
//    $row_2 = $query_2->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 1; $i < 5; $i++) {
        $query = $pdo->prepare("SELECT * FROM media WHERE id_type_media = " . $id_type_media . " AND bloc = " . $i . " ORDER BY date_ajout DESC LIMIT 4");
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        $array_rows["bloc_" . $i] = $row;
        $query_2 = $pdo->prepare("SELECT a.id AS activite_mere_id, m.* FROM media m, activites a, sous_activites sa WHERE m.id_type_media = " . $id_type_media . " AND m.bloc = ".$i.""
                . " AND m.id_sous_activite_mere = sa.id AND sa.id_activite_mere = a.id");
        $query_2->execute();
        $row_2 = $query_2->fetchAll(PDO::FETCH_ASSOC);
        $array_rows["all_each_bloc_".$i] = $row_2;
    }

    $array_rows["first_row"] = $row_1;
//    $array_rows["second_row"] = $row_2;

    return $array_rows;
}

function getBg_Slider_Photography_after_hover($bloc) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM media WHERE bloc = " . $bloc . " LIMIT 16");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

function getGrande_Actualite() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM sous_activites_details WHERE id_sous_activite_mere = 1");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

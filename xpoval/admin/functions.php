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

function getConnexion() {
    global $pdo;
    $query = $pdo->prepare("SELECT id FROM media_type");
    $query->execute();

    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function add_or_update_rubrique($id, $libelle, $diminutif, $image) {
    global $pdo;
    if (empty($id)) {
        $query0 = $pdo->prepare('SELECT libelle FROM rubriques');
        $query0->execute();
        $row = $query0->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $kk => $vv) {
            if ($libelle == $vv['libelle']) {
                $query1 = $pdo->prepare('DELETE FROM rubriques WHERE libelle = "' . $libelle . '";');
                $query1->execute();
            }
        }
        $query = $pdo->prepare('INSERT INTO rubriques(libelle,diminutif,image) VALUES ("' . $libelle . '", "' . $diminutif . '", "' . $image . '");');
        $query->execute();
    } else {
        $query = $pdo->prepare("UPDATE rubriques SET libelle = '" . $libelle . "', diminutif = '" . $diminutif . "', image = '" . $image . "' WHERE id = '" . $id . "'");
        $query->execute();
    }
}

function get_rubrique($id = "") {
    global $pdo;
    if (empty($id))
        $query = $pdo->prepare('SELECT * FROM rubriques WHERE image != ""');
    else
        $query = $pdo->prepare('SELECT * FROM rubriques WHERE id=' . $id . ' AND image != ""');
    $query->execute();

    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function delete_rubrique($id) {
    global $pdo;
    $query = $pdo->prepare("DELETE FROM rubriques WHERE id = " . $id);
    $query->execute();
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

function insertBg_Slider_Photography($array) {
    global $pdo;
    $i = 1;
    foreach ($array as $kk => $vv) {
        $query = $pdo->prepare("INSERT INTO media (id_type_media, media, date_ajout, bloc) VALUES (4,'" . $vv . "', now(), " . $i . ")");
        $query->execute();
        $i++;
        if ($i == 5) {
            $i = 1;
        }
    }
}

//Euphème

function getUser($email, $id = 0) {
    global $pdo;
    if (!empty($email)) {
        $query = $pdo->prepare("SELECT * FROM user where email_user = :email_user");
        $query->execute(array("email_user" => $email));

        $row = $query->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($id != 0) {
        $query = $pdo->prepare("SELECT * FROM user where id = :id");
        $query->execute(array("id" => $id));

        $row = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $row;
}

function getHeaderSentence() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM headersentence WHERE archivage = 0 ORDER BY date_ajout DESC");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getAllLivres($id_genre = 0, $id_livre = 0, $id_user = 0) {
    global $pdo;
    if ($id_genre == 0 && $id_livre == 0 && $id_user == 0) {
        $query = $pdo->prepare("SELECT l.*, u.id AS id_user, u.nom_user, u.prenom_user, u.image_profile FROM livres l, user u WHERE l.id_user = u.id ORDER BY l.id DESC");
        $query->execute();
    } elseif ($id_genre != 0 && $id_livre == 0) {
        $query = $pdo->prepare("SELECT * FROM livres WHERE genre = :genre ORDER BY date_parution DESC");
        $query->execute(array("genre" => $id_genre));
    } elseif ($id_livre != 0 && $id_genre == 0) {
        $query = $pdo->prepare("SELECT l.*,u.nom_user, u.prenom_user FROM livres l, user u WHERE l.id = :id AND l.id_user = u.id ORDER BY date_parution DESC");
        $query->execute(array("id" => $id_livre));
    } else {
        $query = $pdo->prepare("SELECT * FROM livres WHERE id_user = :id_user ORDER BY date_parution DESC");
        $query->execute(array("id_user" => $id_user));
    }
//    var_dump($query);
//    die();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getLivres_Likes($id_livre = 0, $id_user = 0, $id_type = 0) {
    global $pdo;
    if ($id_user != "null") {
        $query = $pdo->prepare("SELECT ll.id_user, count(l.id) AS nb_livre_like, sum(ll.nb_likes) AS sum_livre_like FROM livres l JOIN livres_likes ll ON(ll.id_livre = l.id) WHERE l.id = :id AND ll.id_user = :id_user AND ll.id_type = :id_type ORDER BY date_parution DESC");
        $query->execute(array("id" => $id_livre, "id_user" => $id_user, "id_type" => $id_type));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}

function getLivres_Favorite($id_livre = 0, $id_user = 0) {
    global $pdo;
    if ($id_user != "null") {
        $query = $pdo->prepare("SELECT lf.id_user, sum(lf.favorite) AS sum_livre_favorite FROM livres l JOIN livres_favorite lf ON(lf.id_livre = l.id) WHERE l.id = :id AND lf.id_user = :id_user ORDER BY date_parution DESC");
        $query->execute(array("id" => $id_livre, "id_user" => $id_user));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}

function getCommentaires_Likes($id_commentaire = 0, $id_user = 0, $id_type = 0) {
    global $pdo;
    if ($id_user != "null") {
        $query = $pdo->prepare("SELECT id FROM commentaires WHERE id_type_element = :id_type_element");
        $query->execute(array("id_type_element" => $id_commentaire));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        $big_row = array();
        foreach ($row as $kk => $vv) {
            $queryy = $pdo->prepare("SELECT c.id, cl.id_user, sum(cl.nb_likes) AS sum_commentaires_like FROM livres l JOIN commentaires c ON(c.id_type_element = l.id) JOIN commentaires_likes cl ON(cl.id_commentaire = c.id) WHERE l.id = :id AND cl.id_user = :id_user AND cl.id_type = :id_type AND c.id = :id_com ");
            $queryy->execute(array("id" => $id_commentaire, "id_user" => $id_user, "id_type" => $id_type, "id_com" => $vv['id']));
            $roww = $queryy->fetchAll(PDO::FETCH_ASSOC);
            $big_row[$vv['id']] = $roww;
        }
        return $big_row;
    }
}

function getInfos_User_Courant($id_user) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $query->execute(array("id" => $id_user));
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function test_commentaires_likes($id_commentaire = 0, $id_user = 0, $id_type = 0) {
    global $pdo;
    $query = $pdo->prepare("SELECT id FROM commentaires WHERE id_type_element = 23");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $kk => $vv) {
        $queryy = $pdo->prepare("SELECT c.id, cl.id_user, cl.nb_likes AS sum_commentaires_like FROM livres l JOIN commentaires c ON(c.id_type_element = l.id) JOIN commentaires_likes cl ON(cl.id_commentaire = c.id) WHERE l.id = :id AND cl.id_user = :id_user AND c.id = :id_com AND cl.id_type = :id_type");
        var_dump($queryy);
        die();
        $queryy->execute(array("id" => $id_commentaire, "id_user" => $id_user, "id_type" => $id_type, "id_com" => $vv['id']));
        $roww = $queryy->fetchAll(PDO::FETCH_ASSOC);
    }
}

//SELECT * FROM livres l JOIN livres_likes ll ON(ll.id_livre = l.id) WHERE l.id = :id ORDER BY date_parution DESC
function setLivres_Likes($id_livre, $user_profile, $date = "", $nb_likes, $id_type) {
    global $pdo;
    if ($user_profile != "null") {
        $sql = "INSERT INTO livres_likes (id_livre, id_user, date_like, nb_likes, id_type) VALUES ('$id_livre', '$user_profile', '$date', '$nb_likes', '$id_type')";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}

function setLivres_Favorite($id_livre, $user_profile, $date = "", $favorite) {
    global $pdo;
    if ($user_profile != "null") {
        $sql = "INSERT INTO livres_favorite (id_livre, id_user, date_favorite, favorite) VALUES ('$id_livre', '$user_profile', '$date', '$favorite')";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}

function setCommentaires_Likes($id_commentaire, $user_profile, $date = "", $nb_likes, $id_type) {
    global $pdo;
    if ($user_profile != "null") {
        $sql = "INSERT INTO commentaires_likes (id_commentaire, id_user, date_like, nb_likes, id_type) VALUES ('$id_commentaire', '$user_profile', '$date', '$nb_likes', '$id_type')";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}

function setNotification($id_element, $id_notifiant, $table, $valeur = "", $livre_user = 0) {
    global $pdo;
    $table_likes = rtrim($table, 's');
    $ecrit = 0;
    if (!empty($id_element)) {
        $sql = "SELECT distinct table_t.*, u.nom_user, u.prenom_user ";
        if (!empty($valeur)) {
            $sql.= ", l.titre ";
        }
        $sql .= "FROM " . $table . " table_t JOIN user u ON(u.id = table_t.id_user)";
        if (empty($valeur)) {
            $sql .= " JOIN " . $table . "_likes table_likes ON(table_likes.id_" . $table_likes . " = table_t.id)"
                    . " WHERE table_likes.id_user = :id_notifiant AND table_t.id = :id_element";
        } else {
            $ecrit = 1;
            $sql .= " JOIN livres l ON (l.id = table_t.id_type_element)";
            $sql .= " WHERE table_t.id_user = :id_notifiant AND table_t.id_type_element = :id_element AND l.id_user = " . $livre_user;
        }
        $query = $pdo->prepare($sql);
        $query->execute(array("id_notifiant" => $id_notifiant, "id_element" => $id_element));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $kk => $vv) {
            if ($table == "commentaires") {
                if ($ecrit == 0) {
                    $sql_insert = 'INSERT INTO notification (id_element, id_user, id_user_notifiant, id_type, titre, value, date_notification, id_type_element, nom_user, prenom_user, archivage, seen, ecrit) '
                            . 'VALUES(' . $vv['id'] . ', ' . $vv['id_user'] . ', ' . $id_notifiant . ', ' . $vv['id_type'] . ', "", "' . $vv['valeur'] . '", NOW(), ' . $vv['id_type_element'] . ', '
                            . '"' . $vv['nom_user'] . '", "' . $vv['prenom_user'] . '", 0, 0,' . $ecrit . ')';
                } else {
                    $sql_insert = 'INSERT INTO notification (id_element, id_user, id_user_notifiant, id_type, titre, value, date_notification, id_type_element, nom_user, prenom_user, archivage, seen, ecrit) '
                            . 'VALUES(' . $vv['id'] . ', ' . $livre_user . ', ' . $id_notifiant . ', ' . $vv['id_type'] . ', "' . $vv['titre'] . '","' . $vv['valeur'] . '", NOW(), ' . $vv['id_type_element'] . ', '
                            . '"' . $vv['nom_user'] . '", "' . $vv['prenom_user'] . '", 0, 0,' . $ecrit . ')';
                }
            } elseif ($table == "livres") {
                $sql_insert = 'INSERT INTO notification (id_element, id_user, id_user_notifiant, id_type, titre, value, date_notification, id_type_element,nom_user, prenom_user, archivage, seen, ecrit) '
                        . 'VALUES(' . $vv['id'] . ', ' . $vv['id_user'] . ', ' . $id_notifiant . ', 1, "","' . $vv['titre'] . '", NOW(), ' . $vv['id'] . ', '
                        . '"' . $vv['nom_user'] . '", "' . $vv['prenom_user'] . '", 0, 0, 0)';
            }
            $query_insert = $pdo->prepare($sql_insert);
            $query_insert->execute();
        }
    }
}

function getActus() {
    global $pdo;
    $sql = "SELECT n.*, u.id AS id_user, u.nom_user, u.prenom_user, u.email_user, u.image_profile, l.* FROM notification n JOIN user u ON (u.id = n.id_user_notifiant) "
            . "JOIN livres l ON(l.id = n.id_type_element) ORDER BY n.date_notification DESC LIMIT 4";
    $query = $pdo->prepare($sql);
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getNotification($id_user, $source = "") {
    global $pdo;
    if (!empty($id_user)) {
        if (empty($source))
            $sql = "SELECT n.*, u.nom_user, u.prenom_user FROM notification n JOIN user u ON(u.id = n.id_user_notifiant) WHERE id_user = :id_user AND n.archivage = 0 AND n.seen = 0";
        else
            $sql = "SELECT n.*, u.nom_user as notifiant_nom, u.prenom_user as notifiant_prenom FROM notification n JOIN user u ON(u.id = n.id_user_notifiant) WHERE id_user_notifiant = :id_user AND n.archivage = 0 ORDER BY n.date_notification DESC LIMIT 5";
        $query = $pdo->prepare($sql);
        $query->execute(array("id_user" => $id_user));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}

function setNotification_seen($id_user, $notification_seen) {
    global $pdo;

    if (!empty($id_user)) {
        $sql = "UPDATE notification SET seen = " . $notification_seen . " WHERE id_user = :id_user";
        $query = $pdo->prepare($sql);
        $query->execute(array("id_user" => $id_user));
    }
}

function getCommentaires($id_element) {
    global $pdo;
    $sql = "SELECT c.*, u.nom_user, u.prenom_user FROM commentaires c"
            . " JOIN user u ON(u.id = c.id_user)"
            . " WHERE c.id_type_element = :id_element ORDER BY c.date_ajout DESC";
    $query = $pdo->prepare($sql);
    $query->execute(array("id_element" => $id_element));
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function insertUser_Commentaire($id_user, $id_element, $id_type) {
    global $pdo;
    $sql = "INSERT INTO user_commentaire(id_user, id_element, id_type, date_ajout) VALUES ('$id_user', '$id_element', $id_type, NOW())";
    $query = $pdo->prepare($sql);
    $query->execute();
}

function getLibelleGenre_By_IdLivre($id_livre, $id_genre) {
    global $pdo;
    $query = $pdo->prepare("SELECT g.libelle, g.id FROM genres g, livres l WHERE l.id = :id AND g.id = :id_genre ORDER BY g.date_ajout DESC");
    $query->execute(array("id" => $id_livre, "id_genre" => $id_genre));
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function getGenresLivre() {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM genres ORDER BY date_ajout DESC");
    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function updateUserBackground($id_user, $bg_image) {
    global $pdo;
    $sql = "UPDATE user SET image_background_profile = '" . $bg_image . "' WHERE id = :id_user";
//        var_dump($sql);
//        die();
    $query = $pdo->prepare($sql);
    $query->execute(array("id_user" => $id_user));
}

function changebackground($id_user, $bg_pos_y) {
    global $pdo;
    $sql0 = "SELECT id_user FROM changebackground WHERE id_user = " . $id_user;
    $query0 = $pdo->prepare($sql0);
    $query0->execute();
    $row = $query0->fetch(PDO::FETCH_ASSOC);
    if (!empty($row)) {
        $sql = "UPDATE changebackground set bg_pos_y = '$bg_pos_y' WHERE id_user = " . $id_user;
    } else {
        $sql = "INSERT INTO changebackground(id_user, bg_pos_y) VALUES ('$id_user', '$bg_pos_y')";
    }
    $query = $pdo->prepare($sql);
    $query->execute();
}

function getchangebackground($id_user) {
    global $pdo;
    $query = $pdo->prepare("SELECT bg_pos_y FROM changebackground WHERE id_user = " . $id_user);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function get_pays() {
    $countryCode = array(
        array('4', 'AFG', 'AF', 'Afghanistan'),
        array('710', 'ZAF', 'ZA', 'Afrique du Sud'),
        array('248', 'ALA', 'AX', 'Aland'),
        array('8', 'ALB', 'AL', 'Albanie'),
        array('12', 'DZA', 'DZ', 'Algérie'),
        array('276', 'DEU', 'DE', 'Allemagne'),
        array('20', 'AND', 'AD', 'Andorre'),
        array('24', 'AGO', 'AO', 'Angola'),
        array('660', 'AIA', 'AI', 'Anguilla'),
        array('10', 'ATA', 'AQ', 'Antarctique'),
        array('28', 'ATG', 'AG', 'Antigua-et-Barbuda'),
        array('682', 'SAU', 'SA', 'Arabie saoudite'),
        array('32', 'ARG', 'AR', 'Argentine'),
        array('51', 'ARM', 'AM', 'Arménie'),
        array('533', 'ABW', 'AW', 'Aruba'),
        array('36', 'AUS', 'AU', 'Australie'),
        array('40', 'AUT', 'AT', 'Autriche'),
        array('31', 'AZE', 'AZ', 'Azerbaïdjan'),
        array('44', 'BHS', 'BS', 'Bahamas'),
        array('48', 'BHR', 'BH', 'Bahreïn'),
        array('50', 'BGD', 'BD', 'Bangladesh'),
        array('52', 'BRB', 'BB', 'Barbade'),
        array('112', 'BLR', 'BY', 'Biélorussie'),
        array('56', 'BEL', 'BE', 'Belgique'),
        array('84', 'BLZ', 'BZ', 'Belize'),
        array('204', 'BEN', 'BJ', 'Bénin'),
        array('60', 'BMU', 'BM', 'Bermudes'),
        array('64', 'BTN', 'BT', 'Bhoutan'),
        array('68', 'BOL', 'BO', 'Bolivie'),
        array('535', 'BES', 'BQ', 'Bonaire', ' Saint-Eustache et Saba'),
        array('70', 'BIH', 'BA', 'Bosnie-Herzégovine'),
        array('72', 'BWA', 'BW', 'Botswana'),
        array('74', 'BVT', 'BV', 'Île Bouvet'),
        array('76', 'BRA', 'BR', 'Brésil'),
        array('96', 'BRN', 'BN', 'Brunei'),
        array('100', 'BGR', 'BG', 'Bulgarie'),
        array('854', 'BFA', 'BF', 'Burkina Faso'),
        array('108', 'BDI', 'BI', 'Burundi'),
        array('136', 'CYM', 'KY', 'Îles Caïmans'),
        array('116', 'KHM', 'KH', 'Cambodge'),
        array('120', 'CMR', 'CM', 'Cameroun'),
        array('124', 'CAN', 'CA', 'Canada'),
        array('132', 'CPV', 'CV', 'Cap-Vert'),
        array('140', 'CAF', 'CF', 'République centrafricaine'),
        array('152', 'CHL', 'CL', 'Chili'),
        array('156', 'CHN', 'CN', 'Chine'),
        array('162', 'CXR', 'CX', 'Île Christmas'),
        array('196', 'CYP', 'CY', 'Chypre'),
        array('166', 'CCK', 'CC', 'Îles Cocos'),
        array('170', 'COL', 'CO', 'Colombie'),
        array('174', 'COM', 'KM', 'Comores'),
        array('178', 'COG', 'CG', 'République du Congo'),
        array('180', 'COD', 'CD', 'République démocratique du Congo'),
        array('184', 'COK', 'CK', 'Îles Cook'),
        array('410', 'KOR', 'KR', 'Corée du Sud'),
        array('408', 'PRK', 'KP', 'Corée du Nord'),
        array('188', 'CRI', 'CR', 'Costa Rica'),
        array('384', 'CIV', 'CI', 'Côte d\'Ivoire'),
        array('191', 'HRV', 'HR', 'Croatie'),
        array('192', 'CUB', 'CU', 'Cuba'),
        array('531', 'CUW', 'CW', 'Curaçao'),
        array('208', 'DNK', 'DK', 'Danemark'),
        array('262', 'DJI', 'DJ', 'Djibouti'),
        array('214', 'DOM', 'DO', 'République dominicaine'),
        array('212', 'DMA', 'DM', 'Dominique'),
        array('818', 'EGY', 'EG', 'Égypte'),
        array('222', 'SLV', 'SV', 'Salvador'),
        array('784', 'ARE', 'AE', 'Émirats arabes unis'),
        array('218', 'ECU', 'EC', 'Équateur'),
        array('232', 'ERI', 'ER', 'Érythrée'),
        array('724', 'ESP', 'ES', 'Espagne'),
        array('233', 'EST', 'EE', 'Estonie'),
        array('840', 'USA', 'US', 'États-Unis'),
        array('231', 'ETH', 'ET', 'Éthiopie'),
        array('238', 'FLK', 'FK', 'Îles Malouines'),
        array('234', 'FRO', 'FO', 'Îles Féroé'),
        array('242', 'FJI', 'FJ', 'Fidji'),
        array('246', 'FIN', 'FI', 'Finlande'),
        array('250', 'FRA', 'FR', 'France'),
        array('266', 'GAB', 'GA', 'Gabon'),
        array('270', 'GMB', 'GM', 'Gambie'),
        array('268', 'GEO', 'GE', 'Géorgie'),
        array('239', 'SGS', 'GS', 'Géorgie du Sud-et-les Îles Sandwich du Sud'),
        array('288', 'GHA', 'GH', 'Ghana'),
        array('292', 'GIB', 'GI', 'Gibraltar'),
        array('300', 'GRC', 'GR', 'Grèce'),
        array('308', 'GRD', 'GD', 'Grenade'),
        array('304', 'GRL', 'GL', 'Groenland'),
        array('312', 'GLP', 'GP', 'Guadeloupe'),
        array('316', 'GUM', 'GU', 'Guam'),
        array('320', 'GTM', 'GT', 'Guatemala'),
        array('831', 'GGY', 'GG', 'Guernesey'),
        array('324', 'GIN', 'GN', 'Guinée'),
        array('624', 'GNB', 'GW', 'Guinée-Bissau'),
        array('226', 'GNQ', 'GQ', 'Guinée équatoriale'),
        array('328', 'GUY', 'GY', 'Guyana'),
        array('254', 'GUF', 'GF', 'Guyane'),
        array('332', 'HTI', 'HT', 'Haïti'),
        array('334', 'HMD', 'HM', 'Îles Heard-et-MacDonald'),
        array('340', 'HND', 'HN', 'Honduras'),
        array('344', 'HKG', 'HK', 'Hong Kong'),
        array('348', 'HUN', 'HU', 'Hongrie'),
        array('833', 'IMN', 'IM', 'Île de Man'),
        array('581', 'UMI', 'UM', 'Îles mineures éloignées des États-Unis'),
        array('92', 'VGB', 'VG', 'Îles Vierges britanniques'),
        array('850', 'VIR', 'VI', 'Îles Vierges des États-Unis'),
        array('356', 'IND', 'IN', 'Inde'),
        array('360', 'IDN', 'ID', 'Indonésie'),
        array('364', 'IRN', 'IR', 'Iran'),
        array('368', 'IRQ', 'IQ', 'Irak'),
        array('372', 'IRL', 'IE', 'Irlande'),
        array('352', 'ISL', 'IS', 'Islande'),
        array('376', 'ISR', 'IL', 'Israël'),
        array('380', 'ITA', 'IT', 'Italie'),
        array('388', 'JAM', 'JM', 'Jamaïque'),
        array('392', 'JPN', 'JP', 'Japon'),
        array('832', 'JEY', 'JE', 'Jersey'),
        array('400', 'JOR', 'JO', 'Jordanie'),
        array('398', 'KAZ', 'KZ', 'Kazakhstan'),
        array('404', 'KEN', 'KE', 'Kenya'),
        array('417', 'KGZ', 'KG', 'Kirghizistan'),
        array('296', 'KIR', 'KI', 'Kiribati'),
        array('414', 'KWT', 'KW', 'Koweït'),
        array('418', 'LAO', 'LA', 'Laos'),
        array('426', 'LSO', 'LS', 'Lesotho'),
        array('428', 'LVA', 'LV', 'Lettonie'),
        array('422', 'LBN', 'LB', 'Liban'),
        array('430', 'LBR', 'LR', 'Liberia'),
        array('434', 'LBY', 'LY', 'Libye'),
        array('438', 'LIE', 'LI', 'Liechtenstein'),
        array('440', 'LTU', 'LT', 'Lituanie'),
        array('442', 'LUX', 'LU', 'Luxembourg'),
        array('446', 'MAC', 'MO', 'Macao'),
        array('807', 'MKD', 'MK', 'Macédoine'),
        array('450', 'MDG', 'MG', 'Madagascar'),
        array('458', 'MYS', 'MY', 'Malaisie'),
        array('454', 'MWI', 'MW', 'Malawi'),
        array('462', 'MDV', 'MV', 'Maldives'),
        array('466', 'MLI', 'ML', 'Mali'),
        array('470', 'MLT', 'MT', 'Malte'),
        array('580', 'MNP', 'MP', 'Îles Mariannes du Nord'),
        array('504', 'MAR', 'MA', 'Maroc'),
        array('584', 'MHL', 'MH', 'Marshall'),
        array('474', 'MTQ', 'MQ', 'Martinique'),
        array('480', 'MUS', 'MU', 'Maurice'),
        array('478', 'MRT', 'MR', 'Mauritanie'),
        array('175', 'MYT', 'YT', 'Mayotte'),
        array('484', 'MEX', 'MX', 'Mexique'),
        array('583', 'FSM', 'FM', 'Micronésie'),
        array('498', 'MDA', 'MD', 'Moldavie'),
        array('492', 'MCO', 'MC', 'Monaco'),
        array('496', 'MNG', 'MN', 'Mongolie'),
        array('499', 'MNE', 'ME', 'Monténégro'),
        array('500', 'MSR', 'MS', 'Montserrat'),
        array('508', 'MOZ', 'MZ', 'Mozambique'),
        array('104', 'MMR', 'MM', 'Birmanie'),
        array('516', 'NAM', 'NA', 'Namibie'),
        array('520', 'NRU', 'NR', 'Nauru'),
        array('524', 'NPL', 'NP', 'Népal'),
        array('558', 'NIC', 'NI', 'Nicaragua'),
        array('562', 'NER', 'NE', 'Niger'),
        array('566', 'NGA', 'NG', 'Nigeria'),
        array('570', 'NIU', 'NU', 'Niue'),
        array('574', 'NFK', 'NF', 'Île Norfolk'),
        array('578', 'NOR', 'NO', 'Norvège'),
        array('540', 'NCL', 'NC', 'Nouvelle-Calédonie'),
        array('554', 'NZL', 'NZ', 'Nouvelle-Zélande'),
        array('86', 'IOT', 'IO', 'Territoire britannique de l\'océan Indien'),
        array('512', 'OMN', 'OM', 'Oman'),
        array('800', 'UGA', 'UG', 'Ouganda'),
        array('860', 'UZB', 'UZ', 'Ouzbékistan'),
        array('586', 'PAK', 'PK', 'Pakistan'),
        array('585', 'PLW', 'PW', 'Palaos'),
        array('275', 'PSE', 'PS', 'Autorité Palestinienne'),
        array('591', 'PAN', 'PA', 'Panama'),
        array('598', 'PNG', 'PG', 'Papouasie-Nouvelle-Guinée'),
        array('600', 'PRY', 'PY', 'Paraguay'),
        array('528', 'NLD', 'NL', 'Pays-Bas'),
        array('604', 'PER', 'PE', 'Pérou'),
        array('608', 'PHL', 'PH', 'Philippines'),
        array('612', 'PCN', 'PN', 'Îles Pitcairn'),
        array('616', 'POL', 'PL', 'Pologne'),
        array('258', 'PYF', 'PF', 'Polynésie française'),
        array('630', 'PRI', 'PR', 'Porto Rico'),
        array('620', 'PRT', 'PT', 'Portugal'),
        array('634', 'QAT', 'QA', 'Qatar'),
        array('638', 'REU', 'RE', 'La Réunion'),
        array('642', 'ROU', 'RO', 'Roumanie'),
        array('826', 'GBR', 'GB', 'Royaume-Uni'),
        array('643', 'RUS', 'RU', 'Russie'),
        array('646', 'RWA', 'RW', 'Rwanda'),
        array('732', 'ESH', 'EH', 'Sahara occidental'),
        array('652', 'BLM', 'BL', 'Saint-Barthélemy'),
        array('659', 'KNA', 'KN', 'Saint-Christophe-et-Niévès'),
        array('674', 'SMR', 'SM', 'Saint-Marin'),
        array('663', 'MAF', 'MF', 'Saint-Martin (Antilles françaises)'),
        array('534', 'SXM', 'SX', 'Saint-Martin'),
        array('666', 'SPM', 'PM', 'Saint-Pierre-et-Miquelon'),
        array('336', 'VAT', 'VA', 'Saint-Siège (État de la Cité du Vatican)'),
        array('670', 'VCT', 'VC', 'Saint-Vincent-et-les-Grenadines'),
        array('654', 'SHN', 'SH', 'Sainte-Hélène', ' Ascension et Tristan da Cunha'),
        array('662', 'LCA', 'LC', 'Sainte-Lucie'),
        array('90', 'SLB', 'SB', 'Salomon'),
        array('882', 'WSM', 'WS', 'Samoa'),
        array('16', 'ASM', 'AS', 'Samoa américaines'),
        array('678', 'STP', 'ST', 'Sao Tomé-et-Principe'),
        array('686', 'SEN', 'SN', 'Sénégal'),
        array('688', 'SRB', 'RS', 'Serbie'),
        array('690', 'SYC', 'SC', 'Seychelles'),
        array('694', 'SLE', 'SL', 'Sierra Leone'),
        array('702', 'SGP', 'SG', 'Singapour'),
        array('703', 'SVK', 'SK', 'Slovaquie'),
        array('705', 'SVN', 'SI', 'Slovénie'),
        array('706', 'SOM', 'SO', 'Somalie'),
        array('729', 'SDN', 'SD', 'Soudan'),
        array('728', 'SSD', 'SS', 'Soudan du Sud'),
        array('144', 'LKA', 'LK', 'Sri Lanka'),
        array('752', 'SWE', 'SE', 'Suède'),
        array('756', 'CHE', 'CH', 'Suisse'),
        array('740', 'SUR', 'SR', 'Suriname'),
        array('744', 'SJM', 'SJ', 'Svalbard et Île Jan Mayen'),
        array('748', 'SWZ', 'SZ', 'Swaziland'),
        array('760', 'SYR', 'SY', 'Syrie'),
        array('762', 'TJK', 'TJ', 'Tadjikistan'),
        array('158', 'TWN', 'TW', 'Taïwan / (République de Chine (Taïwan))'),
        array('834', 'TZA', 'TZ', 'Tanzanie'),
        array('148', 'TCD', 'TD', 'Tchad'),
        array('203', 'CZE', 'CZ', 'République tchèque'),
        array('260', 'ATF', 'TF', 'Terres australes et antarctiques françaises'),
        array('764', 'THA', 'TH', 'Thaïlande'),
        array('626', 'TLS', 'TL', 'Timor oriental'),
        array('768', 'TGO', 'TG', 'Togo'),
        array('772', 'TKL', 'TK', 'Tokelau'),
        array('776', 'TON', 'TO', 'Tonga'),
        array('780', 'TTO', 'TT', 'Trinité-et-Tobago'),
        array('788', 'TUN', 'TN', 'Tunisie'),
        array('795', 'TKM', 'TM', 'Turkménistan'),
        array('796', 'TCA', 'TC', 'Îles Turques-et-Caïques'),
        array('792', 'TUR', 'TR', 'Turquie'),
        array('798', 'TUV', 'TV', 'Tuvalu'),
        array('804', 'UKR', 'UA', 'Ukraine'),
        array('858', 'URY', 'UY', 'Uruguay'),
        array('548', 'VUT', 'VU', 'Vanuatu'),
        array('862', 'VEN', 'VE', 'Venezuela'),
        array('704', 'VNM', 'VN', 'Viêt Nam'),
        array('876', 'WLF', 'WF', 'Wallis-et-Futuna'),
        array('887', 'YEM', 'YE', 'Yémen'),
        array('894', 'ZMB', 'ZM', 'Zambie'),
        array('716', 'ZWE', 'ZW', 'Zimbabwe')
    );
    return $countryCode;
}

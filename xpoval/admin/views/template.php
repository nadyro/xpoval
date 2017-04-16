<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" href=""/>
        <meta charset="UTF-8">
        <title>Xpoval</title>
        <meta name="description" content="Et l'enchanteur, maître des mots et des fleurs, naquit. Enfant sage au milieu des tumultes.">
        <script type="text/javascript" src="/xpoval/admin/scripts/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/xpoval/admin/scripts/scripts.js"></script>
        <script type="text/javascript" src="/xpoval/admin/scripts/add_rubriques.js"></script>
        <script type="text/javascript" src="/xpoval/admin/scripts/enregistrement.js"></script>
        <script type="text/javascript" src="/xpoval/admin/scripts/gestionactualitegaming.js"></script>
        <script type="text/javascript" src="/xpoval/admin/scripts/gestionsliderphotography.js"></script>
        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="/xpoval/admin/styles/styles_template.css" />
        <link rel="stylesheet" href="/xpoval/admin/styles/styles.css" />
        <link rel="stylesheet" href="/xpoval/admin/styles/enregistrement.css" />
        <link rel="stylesheet" href="/xpoval/admin/styles/actualitegaming.css" />
        <link rel="stylesheet" href="/xpoval/admin/styles/gestionactualitegaming.css" />
        <link href="/xpoval/fonts/Noto/NotoSerif-Regular.ttf" rel="stylesheet">

    </head>
    <body>
        <header class="header_principal">
            <div class="container_header_panel">
                <div class="container_divs_header_panel">
                    <div class="div_home_logo">
                        <a href="/xpoval/admin">
                            <div class="div_img_home_logo">
                                <img src="/xpoval/images/pdp.jpg" class="header_principal_home_logo">
                            </div>
                        </a>
                    </div>
                    <div class="div_sponsors">
                        <div class="mother_list_administration">
                            <ul class="list_administration">
                                <li><a href="gestionactualitegaming">Gestion de l'actualité gaming</a></li>
                                <li><a href="gestionsliderphotography">Gestion photographie</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="div_user" <?php if (!empty($_SESSION)) { ?> style="background: url('/xpoval/images/users/profile_pictures/<?php echo $_SESSION['user'][0]['profil_pic'] ?>.jpg') no-repeat center; background-size: cover;"<?php } ?>>
                        <div class="container_user_block">
<?php if (!empty($_SESSION)) { ?>
                                <div class="user_infos">
                                    <div class="user_details">
                                        <div class="div_user_name">
                                            <p><?php echo $_SESSION['user'][0]['prenom'] ?></p>
                                        </div>
                                        <div class="div_user_surname">
                                            <p><?php echo $_SESSION['user'][0]['nom'] ?></p>
                                        </div>
                                    </div>
                                    <div class="deconnexion_user">
                                        <p>Déconnexion</p>
                                    </div>
                                </div>
<?php } else { ?>
                                <div class="inscription_connexion inscription">
                                    <a href="enregistrement">
                                        <p>Inscription</p>
                                    </a>
                                </div>
                                <div class="inscription_connexion connexion">
                                    <a href="enregistrement">
                                        <p>Connexion</p>
                                    </a>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_left">
                <div class="container_header_left_panel">
                    <div class="container_divs_header_left_panel">
                        <div class="text_streamers">
                            <p>Streamers</p>
                        </div>
                        <div class="div_streamers">
                            <div class="streamer_1">
                                <img src="/xpoval/images/streamers/streamer_1.jpg" class="header_left_streamers">
                            </div>
                            <div class="streamer_2">
                                <img src="/xpoval/images/streamers/streamer_2.jpg" class="header_left_streamers">
                            </div>
                        </div>
                        <a href="gestionrubriques">
                            <div class="text_rubriques">
                                <p>Rubriques</p>
                            </div>
                        </a>

                        <div class="rubriques">
                            <?php
                            $les_rubriques = get_rubrique();
                            foreach ($les_rubriques as $kk => $vv) {
                                ?>
                                <div class="rubrique_<?php echo $vv['diminutif'] ?> header_left_rubriques" id="<?php echo $vv['id']; ?>">
                                    <img src="/xpoval/images/rubriques/<?php echo $vv['diminutif'] ?>/<?php echo $vv['image'] . ".jpg" ?>">
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <div class="first_big_class">
<?php include $this->view; ?>
        </div>
    </body>
</html>
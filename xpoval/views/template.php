<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" href=""/>
        <meta charset="UTF-8">
        <title>Xpoval - Game different</title>
        <meta name="description" content="Et l'enchanteur, maître des mots et des fleurs, naquit. Enfant sage au milieu des tumultes.">
        <link href="/xpoval/styles/styles_template.css" rel="stylesheet"  />
        <link href="/xpoval/styles/actualitegaming.css" rel="stylesheet" />
        <link href="/xpoval/styles/enregistrement.css" rel="stylesheet" />
        <link href="/xpoval/styles/sliderphotography.css" rel="stylesheet" />
        <link href="/xpoval/styles/actualitegamingdisplay.css" rel="stylesheet"  />
        <link href="/xpoval/styles/secondcontainerindexpage.css" rel="stylesheet"  />
        <link href="/xpoval/styles/gestionevent.css" rel="stylesheet"  />
        <script type="text/javascript" src="/xpoval/scripts/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/xpoval/scripts/scripts.js"></script>
        <script type="text/javascript" src="/xpoval/scripts/enregistrement.js"></script>
        <script type="text/javascript" src="/xpoval/scripts/actualitegaming.js"></script>
        <script type="text/javascript" src="/xpoval/scripts/slider_photography.js"></script>
        <script type="text/javascript" src="/xpoval/scripts/gestionevent.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">

    </head>
    <body>
        <header class="header_principal">
            <div class="container_header_panel">
                <div class="container_divs_header_panel">
                    <div class="div_home_logo">
                        <a href="/xpoval">
                            <div class="div_img_home_logo">
                                <h1>Xpoval</h1>
                            </div>
                        </a>
                    </div>
                    <div class="div_sponsors">
<!--                        <img src="images/sponsors/corsair_xpo.png" class="header_principal_sponsors_logo sponsors_logo">
                        <img src="images/sponsors/razer_xpo.png" class="header_principal_sponsors_logo sponsors_logo">
                        <img src="images/sponsors/logitech_xpo.png" class="header_principal_sponsors_logo sponsors_logo">
                        <img src="images/sponsors/asus_xpo.jpg" class="header_principal_sponsors_logo sponsors_logo">-->
                    </div>
                    <div class="div_user" <?php if (!empty($_SESSION)) { ?> style="height:50px;transform: none; top: 0; width:100px; background: url('/xpoval/images/users/profile_pictures/<?php echo $_SESSION['user'][0]['profil_pic'] ?>.jpg') no-repeat center; background-size: cover;"<?php } ?>>
                        <div class="container_user_block">
                            <?php if (!empty($_SESSION)) { ?>
                                <div class="user_infos">
                                    <div class="user_details">
                                        <div class="div_user_name">
                                            <p><?php echo $_SESSION['user'][0]['prenom'] ?></p>
                                        </div>
                                    </div>
                                    <a href="admin">
                                        <div class="acces_admin">
                                            <p>Admin</p>
                                        </div>
                                    </a>
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
                            <div class="streamer_1" style="background: url('/xpoval/images/streamers/streamer_1.jpg')">
                                <div class="overlay_streamers">
                                    <div class="details_streamers">
                                        <div class="is_live">
                                            <div class="logo_live"></div>
                                            <p>Live</p>
                                        </div>
                                        <div class="pseudo_streamer">
                                            <p>Hnadyro</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="streamer_2" style="background: url('/xpoval/images/streamers/streamer_2.jpg')">
                                <div class="overlay_streamers">
                                    <div class="details_streamers">
                                        <div class="is_live">
                                            <div class="logo_live"></div>
                                            <p>Live</p>
                                        </div>
                                        <div class="pseudo_streamer">
                                            <p>Hnadyro</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text_rubriques">
                            <p>Rubriques</p>
                        </div>
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
                        <div class="div_user" <?php if (!empty($_SESSION)) { ?> style="height:50px;transform: none; top: 0; width:100px; background: url('/xpoval/images/users/profile_pictures/<?php echo $_SESSION['user'][0]['profil_pic'] ?>.jpg') no-repeat center; background-size: cover;"<?php } ?>>
                            <div class="container_user_block">
                                <?php if (!empty($_SESSION)) { ?>
                                    <div class="user_infos">
                                        <div class="user_details">
                                            <div class="div_user_name">
                                                <p><?php echo $_SESSION['user'][0]['prenom'] ?></p>
                                            </div>
                                        </div>
                                        <a href="admin">
                                            <div class="acces_admin">
                                                <p>Admin</p>
                                            </div>
                                        </a>
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

            </div>
        </header>
        <div class="first_big_class">
            <?php include $this->view; ?>
        </div>
    </body>
</html>
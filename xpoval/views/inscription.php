<div class="inscription_page">
    <div class="container_enregistrement">
        <div class="container_form_inscription">


            <div class="form_inscription_page">
                <h2>Inscription</h2>
                <form id="inscription_form" method="POST" enctype="multipart/form-data" action="enregistrement/inscription">
                    <!--Pseudo user-->
                    <div class="container_erreurs container_erreur_pseudo_user">
                        <img src="images/error.png" class="erreur_png erreur_pseudo_user">
                        <div class="text_erreur_pseudo_user text_erreurs"><p></p></div>
                    </div>
                    <label for="" class="label_pseudo_user">Pseudo</label>
                    <input type="text" name="pseudo_user" id="pseudo_user" class="pseudo_user" placeholder="Ex: Le renard noir">

                    <!--Nom user-->
                    <div class="container_erreurs container_erreur_nom_user">
                        <img src="images/error.png" class="erreur_png erreur_nom_user">
                        <div class="text_erreur_nom_user text_erreurs"><p></p></div>
                    </div>
                    <label for="nom_user" class="label_nom_user">Nom</label>
                    <input type="text" name="nom_user" id="nom_user" class="nom_user" placeholder="Ex: Le Gris">

                    <!--Prenom user-->
                    <div class="container_erreurs container_erreur_prenom_user">
                        <img src="images/error.png" class="erreur_png erreur_prenom_user">
                        <div class="text_erreur_prenom_user text_erreurs"><p></p></div>
                    </div>
                    <label for="prenom_user" class="label_prenom_user">Prénom</label>
                    <input type="text" name="prenom_user" id="prenom_user" class="prenom_user" placeholder="Ex: Gandalf">

                    <!--Date de naissance user-->
                    <div class="container_erreurs container_erreur_date_naissance_user">
                        <img src="images/error.png" class="erreur_png erreur_date_naissance_user">
                        <div class="text_erreur_date_naissance_user text_erreurs"><p></p></div>
                    </div>
                    <label for="date_naissance_user" class="label_date_naissance_user">Date de naissance</label>
                    <input type="date" id="date_naissance_user" name="date_naissance_user" class="date_naissance_user">

                    <!--Email user-->
                    <div class="container_erreurs container_erreur_email_user">
                        <img src="images/error.png" class="erreur_png erreur_email_user">
                        <div class="text_erreur_email_user text_erreurs"><p></p></div>
                    </div>
                    <label for="email_user" class="label_email_user">Email</label>
                    <input type="text" name="email_user" id="email_user" class="email_user" placeholder="Ex: g.legris@valar.ent">

                    <!--Password user-->
                    <div class="container_erreurs  container_erreur_password_user">
                        <img src="images/error.png" class="erreur_png erreur_password_user">
                        <div class="text_erreur_password_user text_erreurs"><p></p></div>
                    </div>
                    <label for="password_user" class="label_email_user">Mot de passe</label>
                    <input type="password" name="password_user" id="password_user" class="password_user" placeholder="********">

                    <!--Pp_user-->
                    <div class="container_erreurs container_erreur_pp_user">
                        <img src="images/error.png" class="erreur_png erreur_pp_user">
                        <div class="text_erreur_pp_user text_erreurs"><p></p></div>
                    </div>
                    <label for="pp_user" class="label_pp_user">Choisissez une photo de profil</label>
                    <input type="file" name="pp_user" id="pp_user" class="pp_user" style="display: none;">


                    <input type="button" class="submit_verification submit_form_inscription" value="Je m'inscris !">
                </form>
            </div>


        </div>
        <div class="separator"></div>
        <div class="container_form_connexion">


            <div class="form_connexion_page">
                <h2>Connexion</h2>
                <form id="connexion_form" method="POST" enctype="multipart/form-data" action="enregistrement/inscription">
                    <input type="text" name="pseudo_email_connexion" class="pseudo_email_connexion" placeholder="Pseudo ou Email">
                    <input type="password" name="password_connexion_user" class="password_connexion_user" placeholder="Mot de passe">
                    <div class="erreur_connexion">
                        <p>Connexion échouée. Le mot de passe est incorrect.</p>
                    </div>
                    <input type="button" class="submit_verification submit_form_connexion" value="Je me connecte !">
                </form>
            </div>


        </div>
    </div>

</div>

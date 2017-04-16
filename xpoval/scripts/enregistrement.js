$(document).ready(function () {

    $(".submit_form_connexion").click(function () {
        var pseudo_email_user = $(".pseudo_email_connexion").val();
        var password_user = $(".password_connexion_user").val();

        $.ajax({
            url: 'enregistrement/connexion',
            type: 'GET',
            dataType: 'json',
            data: {
                pseudo_email_user: pseudo_email_user,
                password_user: password_user
            },
            complete: function (result) {
                console.log(result);
                if(result.responseText == 1){
                    location.href = "/xpoval";
                }else{
                    $(".erreur_connexion").show();
                    console.log("Connexion échouée, vérifier votre mot de passe ou votre nom d'utilisateur.");
                }
            }
        });
    });

    $(".submit_form_inscription").click(function () {
        var message_erreurs = "";
        var pseudo_user = $(".pseudo_user").val();
        var nom_user = $(".nom_user").val();
        var prenom_user = $(".prenom_user").val();
        var date_naissance_user = $(".date_naissance_user").val();
        var email_user = $(".email_user").val();
        var password_user = $(".password_user").val();
        var pp_user = $(".pp_user").val();
        $.ajax({
            url: 'enregistrement/inscription',
            type: 'GET',
            dataType: 'json',
            data: {
                pseudo_user: pseudo_user,
                nom_user: nom_user,
                prenom_user: prenom_user,
                date_naissance_user: date_naissance_user,
                email_user: email_user,
                password_user: password_user,
                pp_user: pp_user
            },
            complete: function (result) {
                if (result.responseText.length > 0) {
                    alert("ERRORS");
                    console.log(result.responseText);
                    message_erreurs = jQuery.parseJSON(result.responseText);
                    console.log(message_erreurs);
                    if (message_erreurs[0]) {

                        $(".pseudo_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_pseudo_user").show();

                        $(".erreur_pseudo_user").hover(function () {
                            $(".container_erreur_pseudo_user p").text(message_erreurs[0]);
                        }, function () {
                            $(".container_erreur_pseudo_user p").text("");
                        });
                    }
                    if (message_erreurs[1]) {

                        $(".nom_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_nom_user").show();

                        $(".erreur_nom_user").hover(function () {
                            $(".container_erreur_nom_user p").text(message_erreurs[1]);
                        }, function () {
                            $(".container_erreur_nom_user p").text("");
                        });
                    }
                    if (message_erreurs[2]) {

                        $(".prenom_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_prenom_user").show();

                        $(".erreur_prenom_user").hover(function () {
                            $(".container_erreur_prenom_user p").text(message_erreurs[2]);
                        }, function () {
                            $(".container_erreur_prenom_user p").text("");
                        });
                    }
                    if (message_erreurs[3]) {

                        $(".password_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_password_user").show();

                        $(".erreur_password_user").hover(function () {
                            $(".container_erreur_password_user p").text(message_erreurs[3]);
                        }, function () {
                            $(".container_erreur_password_user p").text("");
                        });
                    }
                    if (message_erreurs[4]) {

                        $(".email_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_email_user").show();

                        $(".erreur_email_user").hover(function () {
                            $(".container_erreur_email_user p").text(message_erreurs[4]);
                        }, function () {
                            $(".container_erreur_email_user p").text("");
                        });
                    }
                    if (message_erreurs[5]) {

                        $(".email_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_email_user").show();

                        $(".erreur_email_user").hover(function () {
                            $(".container_erreur_email_user p").text(message_erreurs[5]);
                        }, function () {
                            $(".container_erreur_email_user p").text("");
                        });

                    }
                    if (message_erreurs[6]) {

                        $(".date_naissance_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_date_naissance_user").show();

                        $(".erreur_date_naissance_user").hover(function () {
                            $(".container_erreur_date_naissance_user p").text(message_erreurs[6]);
                        }, function () {
                            $(".container_erreur_date_naissance_user p").text("");
                        });
                    }
                    if (message_erreurs[7]) {

                        $(".date_naissance_user").css({
                            border: "solid",
                            "border-color": "rgba(255,0,0,0.7)",
                            "border-width": "2px"
                        });

                        $(".container_erreur_date_naissance_user").show();

                        $(".erreur_date_naissance_user").hover(function () {
                            $(".container_erreur_date_naissance_user p").text(message_erreurs[7]);
                        }, function () {
                            $(".container_erreur_date_naissance_user p").text("");
                        });
                    }
                } else {
                    $("#inscription_form").submit();
                }
            }
        });
    });
    $(".deconnexion_user").click(function(){
       $.ajax({
           url:"enregistrement/deconnexion",
           type: "GET",
           data:{
               
           },
           complete:function(){
               location.href = "/xpoval";
           }
       }) ;
    });
});





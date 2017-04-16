$(document).ready(function () {

//    $(".submit_add_rubrique").click(function () {
//        var messages_erreurs;
//        $(".submit_add_rubrique").click(function () {
//            alert("tamere");
//            $.ajax({
//                url: 'gestionrubriques/addrubriques',
//                type: 'GET',
//                contentType: 'application/json',
//                dataType: 'json',
//                data: {
//                    infos: "info"
//                },
//                complete: function (result) {
//                    console.log(result);
//                    messages_erreurs = jQuery.parseJSON(result.responseText);
//                    console.log(messages_erreurs);
//                    window.open(this.url);
//                },
//                error: function (xhr, status, err) {
//                    console.error(this.url, status, err.toString());
//                    console.warn(xhr.responseText);
//                }
//            });
//        });
//    });

    $(".submit_rubrique").click(function () {
        var parent_form = $(this).attr('post-id');
        console.log(parent_form);
        var messages_erreurs = new Array();
        var i = 0;
        if ($("#"+parent_form+" .libelle_rubrique").val() < 1 || $("#"+parent_form+" .libelle_rubrique").val() > 25) {
            messages_erreurs[0] = "La longueur du libelle de la rubrique doit compter entre 1 et 25 caracteres";
            alert(messages_erreurs[0]);
        }
        if ($("#"+parent_form+" .id_rubrique").val() < 1 || $("#"+parent_form+"form_rubrique .id_rubrique").val() > 5) {
            messages_erreurs[1] = "La longueur du diminutif de la rubrique doit compter entre 1 et 5 caracteres";
            alert(messages_erreurs[1]);
        }

        if (messages_erreurs.length === 0) {
            $("#"+parent_form).submit();
        }
    });

    $(".image_rubrique").hover(function () {
        $(".hover_image").show();
    }, function () {
        $(".hover_image").hide();
    });

    $("#form_rubrique_edit .liste_libelle_rubrique").change(function () {
//        $("#form_rubrique_edit input").css("display","inline-block");
//        $("#form_rubrique_edit label").css("display", "block");
        var text_retourne;
        $.ajax({
            url: 'gestionrubriques/changeupdaterubrique',
            type: 'GET',
            dataType: 'json',
            data: {
                id_rubrique: $(this).val()
            },
            complete: function (result) {
                console.log("Success !");
                text_retourne = jQuery.parseJSON(result.responseText);
                console.log(text_retourne);
                console.log(text_retourne[0].id);
                $("#form_rubrique_edit .libelle_rubrique").val(text_retourne[0].libelle);
                $("#form_rubrique_edit .id_rubrique").val(text_retourne[0].diminutif);
                $("#form_rubrique_edit .image_rubrique_alias").val(text_retourne[0].image);
                $("#form_rubrique_edit .label_file_type img").attr("src", "/xpoval/images/rubriques/" + text_retourne[0].diminutif + "/" + text_retourne[0].image + ".jpg");
            }
        });
    });
    $(".submit_delete_rubrique").click(function () {
        $(".overlay_validation").show();
        $(".overlay_validation .oui_delete_rubrique").click(function () {
            $("#form_rubrique_delete").submit();
        });
        $(".overlay_validation .non_delete_rubrique").click(function () {
            $(".overlay_validation").hide();
        });
    });

});



$(document).ready(function () {
var id_rubrique;
    $(".header_left_rubriques").click(function () {
        if ($(this).hasClass("rubrique_hots")) {
            id_rubrique = $(this).attr("id");
            $(".first_big_class").css({
                background: "url('/xpoval/images/hots_bg_1.jpg')",
                "background-size": "cover",
                "background-position-x": "50%",
                "background-position-y": "50%"
            });
        }
        if ($(this).hasClass("rubrique_cs")) {
            id_rubrique = $(this).attr("id");
            $(".first_big_class").css({
                background: "url('/xpoval/images/cs_bg_1.jpg')",
                "background-size": "cover",
                "background-position-x": "50%",
                "background-position-y": "50%"
            });
        }
        if ($(this).hasClass("rubrique_ow")) {
            id_rubrique = $(this).attr("id");
            $(".first_big_class").css({
                background: "url('/xpoval/images/ow_bg_1.jpg')",
                "background-size": "cover",
                "background-position-x": "50%",
                "background-position-y": "50%"
            });
        }
        if ($(this).hasClass("rubrique_lol")) {
            id_rubrique = $(this).attr("id");
            $(".first_big_class").css({
                background: "url('/xpoval/images/lol_bg_1.jpg')",
                "background-size": "cover",
                "background-position-x": "50%",
                "background-position-y": "50%"
            });
        }
        if ($(this).hasClass("rubrique_wow")) {
            id_rubrique = $(this).attr("id");
            $(".first_big_class").css({
                background: "url('/xpoval/images/wow_bg_1.jpg')",
                "background-size": "cover",
                "background-position-x": "50%",
                "background-position-y": "50%"
            });
        }
    });

    $(".clickable").click(function () {
        if(id_rubrique){
        $.ajax({
            url: "/xpoval/admin/gestionactualitegaming/gestiondiv",
            type: "GET",
            data: {
                id_clickable: $(this).attr("id"),
                id_rubrique: id_rubrique
            },
            complete: function () {
                console.log("Success !");
                location.href = this.url;
//              location.href = this.url
            }
        });
    }else{
        alert("Veuillez sélectionner une rubrique.");
    }
//       $(this).each(function(){
//          if($(this).attr("id") == 0){
//              window.open()
//          } 
//       });
    });

});
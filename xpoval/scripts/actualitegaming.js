$(document).ready(function () {
    var id_rubrique;
    var array_id_sous_activites = new Array();
    var array_activites;
    var ul_1 = "";
    var ul_2 = "";
    var ul_3 = "";
    var ul_4 = "";
    var ul_5 = "";
    var ul_6 = "";
    var ul_7 = "";
    var i = 1;
    var x = 1;
    $(".overlay_sous_actualite").hover(function () {
        $(this).css({
            background: "transparent",
            transition: "1s"
        });
    }, function () {
        $(this).css({
            background: "rgba(0,0,0,0.5)",
            transition: "1s"
        });
    });

    $(".header_left_rubriques").click(function () {
        id_rubrique = $(this).attr("id");
        $(".clickable").each(function () {
            $(this).attr("id", id_rubrique);
            array_id_sous_activites[i] = ($(this).attr("post-id"), $(this).attr("post-name"));
            i++;
            //            $(this).html("<ul></ul>");

        });
        $.ajax({
            url: "/xpoval/actualitegaming/retourjson",
            type: "GET",
            dataType: 'json',
            data: {
                id_rubrique: id_rubrique,
                array_id_sous_activites: array_id_sous_activites
            },
            complete: function (result) {
                array_activites = result.responseJSON;
                for (var obj_key in array_activites) {
                    for (x = 0; x < array_activites[obj_key].length; x++) {
                        $(".clickable[post-name='" + obj_key + "']").each(function () {
                            if ($(this).attr("post-name") == obj_key) {
                                if (array_activites[obj_key][x].id_sous_activite_mere == 1) {
                                    $(this).attr("post-id-actualite", array_activites[obj_key][x].id)
                                    $(".grande_actualite_details h2").text(array_activites[obj_key][x].titre);
                                    $(".grande_actualite_details p").text(array_activites[obj_key][x].description);
                                    $(".grande_actualite").css({
                                        background: "url('/xpoval/images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "/" + array_activites[obj_key][x].image + ".jpg",
                                        "background-size": "cover",
                                        "background-position-x": "50%",
                                        "background-position-y": "50%"
                                    });
                                    //                                    var date;
//                                    if (array_activites[obj_key][x].date_ajout_day < array_activites[obj_key][x].date_ajout_now) {
//                                        date = array_activites[obj_key][x].date_ajout_day;
//                                    } else {
//                                        date = array_activites[obj_key][x].date_ajout_recent;
//                                    }
//                                    ul_2 += "<li><div class='temporis'><img class='img_temporis' src='images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "/" + array_activites[obj_key][x].image + ".jpg'>  <p>" + date + "</p> <p>" + array_activites[obj_key][x].titre + " </p></div></li>";
//                                    $(this).children("ul").html(ul_2);
                                } else {
                                    $(this).children("ul").html("");
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 2) {
                                        var date;
                                        if (array_activites[obj_key][x].date_ajout_day < array_activites[obj_key][x].date_ajout_now) {
                                            date = array_activites[obj_key][x].date_ajout_day;
                                        } else {
                                            date = array_activites[obj_key][x].date_ajout_recent;
                                        }
                                        ul_2 += "<a href='actualitegaming/actualitegamingdisplay?id=" + array_activites[obj_key][x].id + "'>\n\
<li><div class='temporis'>\n\
<img class='img_temporis' src='images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "\
/" + array_activites[obj_key][x].image + ".jpg'>  <p>" + date + "</p> <p>" + array_activites[obj_key][x].titre + " \n\
</p></div></li></a>";
                                        $(this).children("ul").html(ul_2);
                                    }
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 3) {
                                        var date;
                                        if (array_activites[obj_key][x].date_ajout_day < array_activites[obj_key][x].date_ajout_now) {
                                            date = array_activites[obj_key][x].date_ajout_day;
                                        } else {
                                            date = array_activites[obj_key][x].date_ajout_recent;
                                        }
                                        ul_3 += "<a href='actualitegaming/actualitegamingdisplay?id=" + array_activites[obj_key][x].id + "'>\n\
                                                <li><div class='temporis'>\n\
<img class='img_temporis' src='images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "\
/" + array_activites[obj_key][x].image + ".jpg'>  <p>" + date + "</p> <p>" + array_activites[obj_key][x].titre + "\
 </p></div></li></a>";
                                        $(this).children("ul").html(ul_3);
                                    }
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 4) {
                                        var date;
                                        if (array_activites[obj_key][x].date_ajout_day < array_activites[obj_key][x].date_ajout_now) {
                                            date = array_activites[obj_key][x].date_ajout_day;
                                        } else {
                                            date = array_activites[obj_key][x].date_ajout_recent;
                                        }
                                        ul_4 += "<a href='actualitegaming/actualitegamingdisplay?id=" + array_activites[obj_key][x].id + "'>\n\
                                                <li><div class='temporis'>\n\
<img class='img_temporis' src='images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "\
/" + array_activites[obj_key][x].image + ".jpg'>  <p>" + date + "</p> <p>" + array_activites[obj_key][x].titre + " \n\
</p></div></li></a>";
                                        $(this).children("ul").html(ul_4);
                                    }
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 5) {
                                        var date;
                                        if (array_activites[obj_key][x].date_ajout_day < array_activites[obj_key][x].date_ajout_now) {
                                            date = array_activites[obj_key][x].date_ajout_day;
                                        } else {
                                            date = array_activites[obj_key][x].date_ajout_recent;
                                        }
                                        ul_5 += "<a href='actualitegaming/actualitegamingdisplay?id=" + array_activites[obj_key][x].id + "'>\n\
                                                <li><div class='temporis'>\n\
<img class='img_temporis' src='images/actualitegaming/" + array_activites[obj_key][x].id_sous_activite_mere + "\
/" + array_activites[obj_key][x].image + ".jpg'>  <p>" + date + "</p> <p>" + array_activites[obj_key][x].titre + " \n\
</p></div></li></a>";
                                        $(this).children("ul").html(ul_5);
                                    }
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 6) {
                                    }
                                    if (array_activites[obj_key][x].id_sous_activite_mere == 7) {
                                    }
                                }
                            }
                        });
                    }
                }
                ul_1 = "";
                ul_2 = "";
                ul_3 = "";
                ul_4 = "";
                ul_5 = "";
                ul_6 = "";
                ul_7 = "";
            }
        });
    });

    $(".grande_actualite").click(function () {
        $.ajax({
            url: "/xpoval/actualitegaming/actualitegamingdisplay",
            type: "GET",
            data: {
                id: $(this).attr("post-id-actualite")
            },
            complete: function () {
                location.href = this.url;
            }
        });
    });

});



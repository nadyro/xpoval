/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
//    $(window).scrollTop(function(){
//        $(".header_left").hide();
//    });

    $(document).scroll(function () {
        if ($(document).scrollTop() > 0) {
            $(".header_left").show();
            $(".first_big_class").css("width","100%");
            $(".header_left").css("transition","0.5s");
            $(".first_big_class").css("transition","0.5s");
            $(".header_left").addClass("header_left_scrolled");
            $(".container_header_left_panel").addClass("container_header_left_panel_scrolled");
            $(".header_left div").addClass("scrolled");
            $(".container_divs_header_left_panel").addClass("container_divs_header_left_panel_scrolled");
            $(".container_divs_header_left_panel .text_streamers").addClass("text_streamers_scrolled");
            $(".container_divs_header_left_panel .text_rubriques").addClass("text_rubriques_scrolled");
            $(".container_divs_header_left_panel .div_streamers").addClass("div_streamers_scrolled");
            $(".container_divs_header_left_panel .div_streamers .header_left_streamers").addClass("header_left_streamers_scrolled");
            $(".container_divs_header_left_panel .rubriques").addClass("rubriques_scrolled");
            $(".container_divs_header_left_panel .header_left_rubriques").addClass("header_left_rubriques_scrolled");
            $(".container_divs_header_left_panel .header_left_rubriques img").addClass("img_scrolled");
            $(".container_divs_header_left_panel .div_streamers").hide();
        }else{
            $(".first_big_class").css("width","91%");
            $(".header_left").css("transition","0s");
            $(".header_left").removeClass("header_left_scrolled");
            $(".container_header_left_panel").removeClass("container_header_left_panel_scrolled");
            $(".header_left div").removeClass("scrolled");
            $(".container_divs_header_left_panel").removeClass("container_divs_header_left_panel_scrolled");
            $(".container_divs_header_left_panel .text_streamers").removeClass("text_streamers_scrolled");
            $(".container_divs_header_left_panel .text_rubriques").removeClass("text_rubriques_scrolled");
            $(".container_divs_header_left_panel .div_streamers").removeClass("div_streamers_scrolled");
            $(".container_divs_header_left_panel .div_streamers .header_left_streamers").removeClass("header_left_streamers_scrolled");
            $(".container_divs_header_left_panel .rubriques").removeClass("rubriques_scrolled");
            $(".container_divs_header_left_panel .header_left_rubriques").removeClass("header_left_rubriques_scrolled");
            $(".container_divs_header_left_panel .header_left_rubriques img").removeClass("img_scrolled");
            $(".container_divs_header_left_panel .div_streamers").show();
        }
    });

    var slider_images = new Array();
    var interval;
    var i = 0;
    var list_html = "";
    var y = 0;
    $.ajax({
        url: "/xpoval/index/slider",
        type: "GET",
        dataType: "json",
        data: {
        },
        complete: function (result) {
            slider_images = result.responseJSON;
            for (y = 0; y < slider_images.length; y++) {
                list_html += '<li class="element_' + y + '" post-id-actualite="' + slider_images[y].id + '" post-desc="' + slider_images[y].description + '"' + ' post-element="' + y + '" post-id="' + slider_images[y].id_sous_activite_mere + '" post-name="' + slider_images[y].image + '.jpg"' + '></li>';
            }
            $(".slider .overlay_slider .list_slider ul").html(list_html);

            $(".slider .overlay_slider .list_slider ul li").click(function () {
                var post_name;
                var post_id;
                var post_desc;
                var post_element;
                var post_id_actualite;
                post_name = $(this).attr("post-name");
                post_id = $(this).attr("post-id");
                post_desc = $(this).attr("post-desc");
                post_element = $(this).attr("post-element");
                post_id_actualite = $(this).attr("post-id-actualite");
                i = post_element;
                $(".click_slider").attr("post-id-actualite", post_id_actualite);
                $(".slider").css({
                    background: "url(images/actualitegaming/" + post_id + "/" + post_name + ")",
                    "background-position-x": "100%",
                    "background-size": "cover",
                    "background-position-y": "50%"
                });
                $(".slider .overlay_slider .management_overlay_slider .text_overlay_slider p").text(post_desc);
            });

            interval = setInterval(function () {
                var width_slider = -($(".slider").width()) + "px";
                $(".click_slider").attr("post-id-actualite", slider_images[i].id);
                $(".slider").css({
                    background: "url(images/actualitegaming/" + slider_images[i].id_sous_activite_mere + "/" + slider_images[i].image + ".jpg" + ")",
                    "background-size": "cover",
                    "background-position-y": "50%",
                    "background-position-x": "50%",
                    transition: "1s"
                }).animate({
                }, 1000);
                $(".slider .overlay_slider .list_slider ul li").css({
                    background: "transparent",
                    zoom: "1"
                });
                $(".slider .overlay_slider .list_slider ul .element_" + i + "").css({
                    background: "black",
                    zoom: "1.2"
                });
                $(".slider .overlay_slider .management_overlay_slider .text_overlay_slider p").text(slider_images[i].description);
                i++;
                if (i < slider_images.length) {

                } else {
                    i = 0;
                }
            }, 5000);
        }
    });
    $(".click_slider").click(function () {
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
    $(".div_user").hover(function () {
        $(".user_infos").show();
    }, function () {
        $(".user_infos").hide();
    });
    $(".header_left_rubriques").click(function () {
        $(".header_left_rubriques").css({
            background: "initial"
        });
        $(this).css({
            background: "rgba(255,255,255,0.7)"
        });
    });

    $(".rubrique_lol").click(function () {
        $(".gaming_news").css({
            background: "url(images/rubriques/lol/lol_bg/lol_bg_2.jpg)",
            "background-position-x": "785px",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(images/rubriques/lol/lol_bg/lol_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(images/rubriques/lol/lol_bg/lol_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(images/rubriques/lol/lol_bg/lol_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_cs").click(function () {
        $(".gaming_news").css({
            background: "url(images/rubriques/cs/cs_bg/cs_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(images/rubriques/cs/cs_bg/cs_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(images/rubriques/cs/cs_bg/cs_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(images/rubriques/cs/cs_bg/cs_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_ow").click(function () {
        $(".gaming_news").css({
            background: "url(images/rubriques/ow/ow_bg/ow_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(images/rubriques/ow/ow_bg/ow_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(images/rubriques/ow/ow_bg/ow_bg_3.png)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(images/rubriques/ow/ow_bg/ow_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_wow").click(function () {
        $(".gaming_news").css({
            background: "url(images/rubriques/wow/wow_bg/wow_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(images/rubriques/wow/wow_bg/wow_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(images/rubriques/wow/wow_bg/wow_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(images/rubriques/wow/wow_bg/wow_bg_4.jpg)",
            "background-size": "cover",
            "background-position-x": "50%"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });

});
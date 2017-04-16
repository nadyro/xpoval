/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var slider_images = new Array();
    slider_images[1] = "lol_bg_1";
    slider_images[2] = "cs_bg_1";
    slider_images[3] = "ow_bg_1";
    slider_images[4] = "wow_bg_1";
    var interval;
    var i = 1;
    interval = setInterval(function () {
//        if (i <= 4) {
        $(".slider").css({
            background: "url(images/" + slider_images[i] + ".jpg)",
            "background-position-x": "50%",
            "background-size": "cover",
            "background-position-y": "50%"
        });
        i++;
        if (i <= 4) {

        } else {
            i = 1;
        }
//        } else {
//            i = 1;
//        }
    }, 5000);

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

    $(".overlay_slider_next").click(function () {
        clearInterval(interval);
    });
    $(".overlay_slider_back").click(function () {
        interval = setInterval(interval, 3000);
    });

    $(".rubrique_lol").click(function () {
        $(".gaming_news").css({
            background: "url(/xpoval/images/rubriques/lol/lol_bg/lol_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(/xpoval/images/rubriques/lol/lol_bg/lol_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(/xpoval/images/rubriques/lol/lol_bg/lol_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(/xpoval/images/rubriques/lol/lol_bg/lol_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_cs").click(function () {
        $(".gaming_news").css({
            background: "url(/xpoval/images/rubriques/cs/cs_bg/cs_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(/xpoval/images/rubriques/cs/cs_bg/cs_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(/xpoval/images/rubriques/cs/cs_bg/cs_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(/xpoval/images/rubriques/cs/cs_bg/cs_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_ow").click(function () {
        $(".gaming_news").css({
            background: "url(/xpoval/images/rubriques/ow/ow_bg/ow_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(/xpoval/images/rubriques/ow/ow_bg/ow_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(/xpoval/images/rubriques/ow/ow_bg/ow_bg_3.png)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(/xpoval/images/rubriques/ow/ow_bg/ow_bg_4.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });
    $(".rubrique_wow").click(function () {
        $(".gaming_news").css({
            background: "url(/xpoval/images/rubriques/wow/wow_bg/wow_bg_2.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1000);
        $(".slider_photography").css({
            background: "url(/xpoval/images/rubriques/wow/wow_bg/wow_bg_1.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1250);
        $(".proteam").css({
            background: "url(/xpoval/images/rubriques/wow/wow_bg/wow_bg_3.jpg)",
            "background-position-x": "50%",
            "background-size": "cover"
        }).animate({
            "background-position-y": "50%"
        }, 1500);
        $(".music").css({
            background: "url(/xpoval/images/rubriques/wow/wow_bg/wow_bg_4.jpg)",
            "background-size": "cover",
            "background-position-x": "50%"
        }).animate({
            "background-position-y": "50%"
        }, 1750);
    });

});
function interval_loop() {

}

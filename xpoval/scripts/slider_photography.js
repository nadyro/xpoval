/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(".container_overlay_slider_photography").width(screen.width);
    $(".container_overlay_slider_photography").height(($(".all_index_page").height() + 50));
    $(".overlay_slider_photography").height(($(".all_index_page").height() + 50));
    var slider_images_photography = new Array();
    var interval_photography;
    var i = 0;
    var list_html = "";
    var y = 0;
    $.ajax({
        url: "/xpoval/index/sliderphotography",
        type: "GET",
        dataType: "json",
        data: {
        },
        complete: function (result) {
            slider_images_photography = result.responseJSON;
            for (y = 0; y < slider_images_photography.length; y++) {
                list_html += "<li class='element_" + y + "' post-id='" + y + "' post-name='" + slider_images_photography[y].media + "'></li>";
            }
            $(".slider_photography .overlay_banners .list_slider_photography ul").html(list_html);

            $(".slider_photography .overlay_banners .list_slider_photography ul li").click(function () {
                var post_name;
                var post_id;
                post_name = $(this).attr("post-name");
                post_id = $(this).attr("post-id");
                i = post_id;
                $(".slider_photography").css({
                    background: "url(images/photography/" + post_name + ")",
                    "background-position-x": "50%",
                    "background-size": "cover",
                    "background-position-y": "50%"
                });
            });

            interval_photography = setInterval(function () {
                var width_slider = -($(".slider_photography").width()) + "px";
                $(".slider_photography").css({
                    background: "url(images/photography/" + slider_images_photography[i].media + ")",
                    "background-size": "cover",
                    "background-position-y": "50%"
                }).animate({
                    "background-position-x": width_slider
                }, 1000);
                $(".slider_photography .overlay_banners .list_slider_photography ul li").css({
                    background: "transparent",
                    zoom: "1"
                });
                $(".slider_photography .overlay_banners .list_slider_photography ul .element_" + i + "").css({
                    background: "black",
                    zoom: "1.2"
                });
                i++;
                if (i < slider_images_photography.length) {

                } else {
                    i = 0;
                }
            }, 3000);
        }
    });
//<div class="container_hovered_theme">
//<div class="hovered_theme" style="background:url('images/photography/<?php echo $mm['media'] ?>');
// background-size: 100% 100%; background-repeat: no-repeat; ">
//                                            </div>
//                                        </div>
    $(".sous_themes").hover(function () {
        var array_result = new Array();
        var i = 0;
        var array_result_length;
        $.ajax({
            url: "sliderphotography/hovertheme",
            type: "GET",
            dataType: 'json',
            data: {
                get_bloc: $(this).attr("post-bloc")
            },
            complete: function (result) {
                array_result = result.responseJSON;
                array_result_length = array_result.length;
                for (i = 0; i < array_result_length; i++) {
                    $(".sous_themes .hover_sous_themes .container_hovered_theme .hovered_theme[post-bg='" + array_result[i].media + "']").css({
                        background: "url('images/photography/" + array_result[i].media + "')",
                        "background-size": "100% 100%",
                        "background-repeat": "no-repeat"
                    });
                }
            }

        });
        $(this).children(".hover_sous_themes").show();
    }, function () {
        $(this).children(".hover_sous_themes").hide();
    });

    $(".first_block_themes .container_hovered_theme").hover(function () {
        $(this).children(".hovered_theme").css({
            width: "450px",
            height: "450px",
            "z-index": "10000",
            top: "50px",
            "border-radius": "225px"
        });
        $(this).children(".hovered_theme").children(".g_e").show();
    }, function () {
        $(this).children(".hovered_theme").css({
            width: "50px",
            height: "50px",
            "z-index": "0",
            top: "initial",
            "border-radius": "35px"
        });
        $(this).children(".hovered_theme").children(".g_e").hide();
    });

    $(".second_block_themes .container_hovered_theme").hover(function () {
        $(this).children(".hovered_theme").css({
            width: "450px",
            height: "450px",
            "z-index": "10000",
            bottom: "15px",
            "border-radius": "225px"
        });
        $(this).children(".hovered_theme").children(".g_e").show();
    }, function () {
        $(this).children(".hovered_theme").css({
            width: "50px",
            height: "50px",
            "z-index": "10001",
            bottom: "initial",
            "border-radius": "35px"
        });
        $(this).children(".hovered_theme").children(".g_e").hide();
    });

    $(".hovered_theme").click(function () {
        var bg_click_this = $(this).attr("post-bg");
        $(".type_range").show();
        $(".container_overlay_slider_photography").show();
        $(".overlay_slider_photography").show();
        $(".overlay_slider_photography").css({
            background: "url('images/photography/" + bg_click_this + "')",
            "background-size": "cover"
        });
    });
    $(".container_overlay_slider_photography").click(function () {
        $(this).hide();
        $(".overlay_slider_photography").hide();
        $(".type_range").hide();
        $(".range_bg").val(50);
    });

    $(".range_bg").change(function () {
        $(".overlay_slider_photography").animate({
            'background-position-y': $(".range_bg").val() + '%'
        });
    });

});


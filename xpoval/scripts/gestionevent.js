$(document).ready(function () {
    var post_id_sam;
    var post_id;
    var className;
    var post_id_am;
    var classNametoId;
    $(".g_e").children("div").click(function () {
        //type
        className = $(this).attr("class");
        if(className == "e_a"){
            classNametoId = 1;
        }
        if(className == "e_c"){
            classNametoId = 2;
        }
        if(className == "e_p"){
            classNametoId = 3;
        }
        //id_sous_activite_mere
        post_id_sam = $(this).parents().attr("post-id-sam");
        //id_sujet
        post_id = $(this).parents().attr("post-id");
        //id_activite_mere
        post_id_am = $(this).parents().attr("post-id-am");

        $.ajax({
            url: "event/",
            type: "GET",
            dataType: "json",
            data: {
                type: classNametoId,
                id_activite_mere: post_id_am,
                id_sous_activite_mere: post_id_sam,
                id_sujet: post_id
            },
            complete: function () {
            }
        });
        console.log(post_id_sam);
        console.log(post_id);
        console.log(className);
    });
});
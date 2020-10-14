$(function () {


    $(".myImg").on("click", function () {
        var img = $(this);
        var src = img.attr('src');
        $(".forma").append("<div class='popup'>"+
            "<div class='popup_bg'></div>"+
            "<img src='"+src+"' class='popup_img' />"+
            "</div>");
        $(".popup").fadeIn(200);
        $(".site-navbar-top").slideUp(200);
        $(".popup_bg").click(function(){
            $(".popup").fadeOut(200);
            $(".site-navbar-top").slideDown(200);
            setTimeout(function() {
                $(".popup").remove();
            }, 200);
        });
    });

    $(document.getElementById("login").style.display="none");
    $("#click").on("click", function () {
        $("#login").toggle(5000);
    });



});


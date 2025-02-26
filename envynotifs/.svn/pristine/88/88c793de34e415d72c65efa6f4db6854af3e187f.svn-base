(function ($) {
    "use strict";

$(document).ready(function(){
    $('#envynotifs-close-btn1').click(function(){
        $('body').css('transition', '1s').css('margin-top', '0px');
        $('.notifino-top-panel').slideUp('slow');
        $('#notifino-open-close1').css('display', 'block');
    });

    $('#notifino-open-close1').click(function(){
        $('.notifino-top-panel').slideDown('slow');
        $('.notifino-top-panel').css('display', 'block');
        $('#notifino-open-close1').css('display', 'none');
    });

    $("#envynotifs-close-btn2").click(function(){
        $(".notifino-bottom-panel").animate({
            height: 'toggle'
        });
        $("#notifino-open-close2").css('display', 'block');
    });

    $("#notifino-open-close2").click(function(){
        $(".notifino-bottom-panel").animate({
            height: 'toggle'
        });
        $("#notifino-open-close2").css('display', 'none');
    });

    $("#envynotifs-close-btn3").click(function(){
        $(".envynotifs-popup").fadeOut(1000);
    });

    $("#envynotifs-close-btn4").click(function(){
        $(".notifino-inside-left-panel").fadeOut(1000);
        $("#notifino-open-close4").css('display', 'block');
        $("#notifino-open-close4").click(function(){
            $(".notifino-inside-left-panel").fadeIn(1000);
            $("#notifino-open-close4").css('display', 'none'); 
        });
    });

    $("#envynotifs-close-btn5").click(function(){
        $(".notifino-inside-right-panel").fadeOut(1000);
        $("#notifino-open-close5").css('display', 'block');
        $("#notifino-open-close5").click(function(){
            $(".notifino-inside-right-panel").fadeIn(1000);
            $("#notifino-open-close5").css('display', 'none'); 
        });
    });

    $("#envynotifs-close-btn6").click(function(){
        $(".notifino-outside-left-panel").fadeOut(1000);
        $("body").css('transition', '1s').css('margin', '0');
        $("#notifino-open-close6").css('display', 'block');
        $("#notifino-open-close6").click(function(){
            $(".notifino-outside-left-panel").fadeIn(1000);
            $("body").css('transition', '1s').css('margin-left', '72px');
            $("#notifino-open-close6").css('display', 'none'); 
        });
    });

    $("#envynotifs-close-btn7").click(function(){
        $(".notifino-outside-right-panel").fadeOut(1000);
        $("body").css('transition', '1s').css('margin', '0');
        $("#notifino-open-close7").css('display', 'block');
        $("#notifino-open-close7").click(function(){
            $(".notifino-outside-right-panel").fadeIn(1000);
            $("body").css('transition', '1s').css('margin-right', '72px');
            $("#notifino-open-close7").css('display', 'none'); 
        });
    });

    $(".mc4wp-form-fields p label input[type='email']").addClass('envynotifs-email form-control');
    $(".mc4wp-form-fields p input[type='submit']").addClass('envynotifs-sign-up-btn');
});

})(jQuery);

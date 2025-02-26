/***********************************************************
 * Author: Shahaji Deshmukh
***********************************************************/
jQuery.noConflict();

jQuery(function ($) {
    //Get Plugin Directory URL @since 1.2
    var pluginURL = sdrfvars.pluginUrl;
    
    // rocket firework animation starts after window load
    $(window).load(function () {
        
        //First time function call
        animate();

        var startTime = new Date().getTime();

        var interval = setInterval(function () {
            if (new Date().getTime() - startTime > 20000) {
                clearInterval(interval);
                $('body .RocketFireworksAnimation').remove();
                return;
            }

            $('.RocketFireworksAnimation').css('bottom', '-100px').attr('src', pluginURL + '/rocket-fireworks/Rocket.gif');
            animate();
        }, 7000);
    });

    function animate() {
        $('.RocketFireworksAnimation').each(function (i, e) {
            $(e).attr('src', pluginURL + '/rocket-fireworks/Rocket.gif').css('left', Math.floor((Math.random() * 80) + 10) + '%');

            window.setTimeout(function () {
                $(e).animate({
                    bottom: Math.floor((Math.random() * 40) + 50) + '%'
                }, {
                    duration: 1500,
                    easing: 'linear',
                    complete: function () {
                        $(e).attr('src', pluginURL + '/rocket-fireworks/rockets/Rocket_0' + Math.floor((Math.random() * 4) + 1) + '.gif');
                    }
                });
            }, Math.random() * 5000);
        });
    }
});

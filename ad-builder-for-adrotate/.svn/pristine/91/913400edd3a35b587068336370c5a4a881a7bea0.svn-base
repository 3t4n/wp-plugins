// this file inserts the ParkAve tool into AdRotate's new advertisement page
jQuery.getScript('https://cdn.getparkave.com/' + 'integration.js');

jQuery(function($) {

    // this ads parkave to the widgets - we need an interval because we
    // need to handle the case of new widgets
    setTimeout(function () {

        // insert the parkave button
        $('#adrotate_bannercode').after('<div><div style="text-align: center; font-weight:bold;">Create an attractive banner ad with</div><div style="text-align: center;" id="parkave-launch-button"></div>')

        // look for parkave buttons on the page and hook it up
        $('[id="parkave-launch-button"]').each(function (i, o) {

            var el = o;
            var txt = document.querySelector('#adrotate_bannercode');

            ParkAve.button(el, {
                callback: (code) => {
                    setTimeout(function() {
                        $(txt).val('<div class="adrotate-parkave">' + $(txt).val() + '<a href="javascript:void(0);" style="display:none;"></a></div>');
                        jQuery(o).parents('form').first().trigger('change');
                    }, 100);
                },
                codeElement: txt,
                partner: 'adrotate'
            });
        });

    }, 1000);

});
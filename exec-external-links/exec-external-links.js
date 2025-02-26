if (typeof jQuery === 'undefined') {
    throw new Error('PVP External Links Plugin\'s JavaScript requires jQuery')
}

+

function($) {
    'use strict';

    // Ext Links Script
    function initLinks() {
        $.each($('body > div:not(#wpadminbar) a'), function() {
            if ($(this).attr('href') != '#' && $(this).attr('href') != '') {
                if (link_is_external(this)) {
                    $(this).attr('target', '_blank');
                }
            }
        });
    };

    function link_is_external(link_element) {
        return (link_element.host !== window.location.host);
    }

    $(document).ready(function() {
        initLinks();
    });
    // End Ext Links Script

}(jQuery);
jQuery( document ).ready(function() {
    function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = escape(name) + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
        }
        return null;
    }

    if(mind_disclaimer_settings['showOnlyOnce'] == 'yes' && readCookie('mind_disclaimer_accept') == 1) {
        return;
    }

    var wrapper = jQuery('#mindloop_disclaimer');
    wrapper.addClass('activated');

    var contentDiv  = jQuery('<div id="mindloop_disclaimer_content">');

    //add title if is present in the settings
    if( mind_disclaimer_settings['title'].length ) {
        var titleElement = jQuery('<h2>');
        titleElement.html( mind_disclaimer_settings['title'] );
        contentDiv.append( titleElement );
    }

    //add the text in a separate div
    var textDiv = jQuery('<div id="mind_disclaimer_text">');
    textDiv.html(mind_disclaimer_settings['text']);
    contentDiv.append(textDiv);

    //add the accept link
    var acceptLink = jQuery('<a>');
    acceptLink.html(mind_disclaimer_settings['accept']);
    acceptLink.attr('href','#acceptLicense');
    acceptLink.attr('id'  ,'mind_disclaimer_accept'  );

    //clicking the accept link will hide the overlayer and write a cookie
    acceptLink.click(
            function(event){
                jQuery('#mindloop_disclaimer').removeClass('activated');
                jQuery('#mindloop_disclaimer').hide();
                createCookie('mind_disclaimer_accept', 1, 365 * 100);
            }
            );

    contentDiv.append(acceptLink);
    wrapper.append(contentDiv);
});

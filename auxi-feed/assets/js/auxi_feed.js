/*
 Tags: twitter, masonry,feed
 Donate link: http://auxillerate.com/index.php/donate/
 Requires at least:  WordPress 4.3.1, WordPress 4.3, WordPress 4.2, WordPress 4.1, WordPress 4.0, WordPress 3.9, WordPress 3.8, WordPress 3.7, WordPress 3.6, WordPress 3.5, WordPress 3.4
 Tested up to:  WordPress 4.3.1
 Stable tag: trunk
 License: GPLv2 or later
 License URI: http://auxillerate.com/index.php/auxi-feed-licensing-terms/
 */




jQuery( document ).ready(function() {
    jQuery('.popup_img').magnificPopup({
        delegate: 'a',
        type: 'image'
    });

    jQuery(window).scroll(function () {
        if (jQuery(document).height() <= jQuery(window).scrollTop() + jQuery(window).height()) {
        }
    });
});
/**
 * Created by slsdeveloper on 11/17/15.
 */




jQuery( document ).ready(function() {
    // Handler for .ready() called.
      jQuery('.popup_img').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
        // other options
    });

    jQuery(window).scroll(function () {
        if (jQuery(document).height() <= jQuery(window).scrollTop() + jQuery(window).height()) {
           // alert("End Of The Page");
        }
    });

    //jQuery("#twitter_masonry").css("-moz-column-count","2");
    //jQuery("#twitter_masonry").css("-webkit-column-count","2");
    //jQuery("#twitter_masonry").css("column-count","2");




});
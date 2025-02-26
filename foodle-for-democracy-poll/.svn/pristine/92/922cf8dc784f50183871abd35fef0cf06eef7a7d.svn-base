/*
 * Author: Elmastudio, integrated and adapted by Michael Finkenberger
 * @since V2.4.2.0
 * Last change in plugin version: ---
 * Date: 07.01.2024
 * Tested with the latest plugin version
*/

var $ = jQuery;

$(function( ){
  var $ = jQuery;
  var foodle_smooth_scroll_duration = 1500; // set default value - in a link: mf_smooth_scroll_duration="x" as value in ms
  var foodle_smooth_scroll_effect = 'swing'; // set default effect - in a link: mf_smooth_scroll_effect="x" as effect name
  var foodle_smooth_scroll_offset = 0; // set default value - in a link: mf_smooth_scroll_offset="x" as value in px
  
  $(".foodle-smooth-scroll").on('click', function() {
    if ( $(this).attr('foodle_smooth_scroll_duration') ) foodle_smooth_scroll_duration = parseInt($(this).attr('foodle_smooth_scroll_duration')); // Set duration, if provided through the link
    if ( $(this).attr('foodle_smooth_scroll_effect') ) foodle_smooth_scroll_effect = $(this).attr('foodle_smooth_scroll_effect'); // Set scroll effect, if provided through the link
    if ( $(this).attr('foodle_smooth_scroll_offset') ) foodle_smooth_scroll_offset = parseInt($(this).attr('foodle_smooth_scroll_offset')); // Set offset, if provided through the link
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $("[name=" + this.hash.slice(1) + "]");
      if ($target.length) {
        targetOffsetTop = $target.offset().top + foodle_smooth_scroll_offset;
        targetOffsetBottom = $( document ).height() - targetOffsetTop;
        windowHeight = $(window).height();
        if ( targetOffsetBottom < windowHeight )
          var targetOffset = targetOffsetTop - (windowHeight - targetOffsetBottom);
        else
          var targetOffset = targetOffsetTop;
        $("html,body").animate({scrollTop: targetOffset}, foodle_smooth_scroll_duration, foodle_smooth_scroll_effect);
        return false;
      }
    }
  });
});


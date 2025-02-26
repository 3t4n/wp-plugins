jQuery( document ).ready( function( jQuery ) {
  jQuery('body.banner_topFixed').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_topScroll').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_bottomFixed').css('padding-bottom', jQuery('#coronaBanner').outerHeight()+'px');
} );
jQuery( document ).load( function( jQuery ) {
  jQuery('body.banner_topFixed').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_topScroll').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_bottomFixed').css('padding-bottom', jQuery('#coronaBanner').outerHeight()+'px');
} );
jQuery(window).resize(function(){
  jQuery('body.banner_topFixed').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_topScroll').css('padding-top', jQuery('#coronaBanner').outerHeight()+'px');
  jQuery('body.banner_bottomFixed').css('padding-bottom', jQuery('#coronaBanner').outerHeight()+'px');
} );

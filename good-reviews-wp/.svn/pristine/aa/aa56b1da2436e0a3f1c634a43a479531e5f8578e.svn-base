jQuery( document ).ready( function( $ ) {

  jQuery(document).on( 'click', '.grfwp-helper-install-notice .notice-dismiss', function( event ) {
    var data = jQuery.param({
      action: 'grfwp_hide_helper_notice',
      nonce: grfwp_helper_notice.nonce
    });

    jQuery.post( ajaxurl, data, function() {} );
  });
});
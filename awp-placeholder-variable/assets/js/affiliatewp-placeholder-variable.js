jQuery(document).ready( function($) {
    'use strict';

    var ref_cookie = $.cookie( 'affwp_ref' );

    $('body').find('a[href*="{aff_id}"]').each(function() {
        let href = $(this).attr('href');
        let replacedHref = href.replace('{aff_id}', ref_cookie);

        $(this).attr('href', replacedHref);
    });
});
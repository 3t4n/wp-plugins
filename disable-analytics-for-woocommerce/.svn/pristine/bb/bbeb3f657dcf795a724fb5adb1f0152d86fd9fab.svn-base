
jQuery( function($) {

    if ( $( "#kgm_analytics_wc") .is( ':checked' ) ) {
        $( ".features" ).hide();
        $( ".features input" ).removeAttr( 'checked' );
    }

    $( "#kgm_analytics_wc" ).change(function() {
        if ( $( "#kgm_analytics_wc" ).is( ':checked' ) ) {
            $( ".features" ).hide();
            $( ".features input" ).removeAttr( 'checked' );
        } else {
            $( ".features" ).show();
        }
    });

    $( ".feature" ).change(function() {
        if ( $( ".feature" ).is( ':checked' ) ) {
            $( "#kgm_analytics_wc" ).removeAttr( 'checked' );
        }
    });

    $( ".homescreen .feature" ).change(function() {
        if ( $( ".homescreen .feature" ).is( ':checked' ) ) {
            alert('Marketing checked automatically because need homescreen');
            $( ".marketing .feature" ).prop('checked', true);
        }
    });

});

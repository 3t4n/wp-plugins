jQuery(function($) {

        vpSelected = "";
        vpPriceBox = "";
        $(".select-variation").change(function(){

            vpSelected = $(this).find(':selected').data();
            vPSelectedVal = $(this).find(':selected').val();

            if ( vpSelected.price ) {
                if ( $( '#price-'+vpSelected.upsellid ).length ) {
                    $( '#price-'+vpSelected.upsellid ).html( vpSelected.price  );
                    $( '#upsellV_'+vpSelected.upsellid ).val( vPSelectedVal );
                }
            } else {
                vpPriceBox = $( '#price-'+vpSelected.upsellid ).data( );
                $( '#price-'+vpSelected.upsellid ).html( vpPriceBox.oprice  );
            }

        });
        

});
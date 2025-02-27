jQuery(function($) {

    $('.add_to_cart_button').click(function(e) {

        if($(this).hasClass('add_to_cart-disabled')){
                    e.preventDefault();
            return false;
            } else {
            return true;
        }
    });

    $(".select-variation").change(function(){

        vpSelected = "";
        vpPriceBox = "";
        vpSelectedVal = "";

        vpSelected = $(this).find(':selected').data();
        vpSelectedVal = $(this).find(':selected').val();

        if ( vpSelected.price ) {
            if ( $( '#price-'+vpSelected.upsellid ).length ) {
                $( '#price-'+vpSelected.upsellid ).html( vpSelected.price  );

                parent = $('#add_to_cart-'+vpSelected.upsellid).parent();
                orgId = $('#add_to_cart-'+vpSelected.upsellid).data().org_id;
                buttonText = $('#add_to_cart-'+vpSelected.upsellid).text();
                $('#add_to_cart-'+vpSelected.upsellid).remove();
                parent.html( '<button id="add_to_cart-'+orgId+'" type="submit" data-quantity="1" data-org_id="'+orgId+'" data-product_id="'+vpSelected.upsellid+'" class="button alt product_type_simple ajax_add_to_cart add_to_cart_button product_type_simple add_to_cart-active">'+buttonText+'</button>' );



                $('#add_to_cart-'+vpSelected.upsellid).attr('data-product_id', vpSelectedVal );

                $('#add_to_cart-'+vpSelected.upsellid).removeClass( 'add_to_cart-disabled' ).addClass( 'add_to_cart-active' );
            }
        } else {
             vpPriceBox = $( '#price-'+vpSelected.upsellid ).data( );
            $( '#price-'+vpSelected.upsellid ).html( vpPriceBox.oprice  );

            $('#add_to_cart-'+vpSelected.upsellid).removeClass( 'add_to_cart-active' ).addClass( 'add_to_cart-disabled' );
        }

    });

});
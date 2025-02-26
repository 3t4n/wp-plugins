<?php

// Footer component for tarots
function tarot_footer($type, $email, $token, $product_id, $free, $reading_id, $dateDescription_active, $zodiac_active, $day_active) {

    ob_start();


    ?>
    <script>

    jQuery(document).ready(function() {

        var token = '<?php echo esc_js(esc_html($token)); ?>';
        var product_id = '<?php echo esc_js(esc_html($product_id)); ?>';
        var type = '<?php echo esc_js(esc_html($type)); ?>';
    });

    function startpayment_reading() {
        jQuery('#resultbutton_<?php echo $type; ?>').hide();
        jQuery('#spinnerbutton_<?php echo $type; ?>').show();

        var token = '<?php echo esc_js(esc_html($token)); ?>';
        var email = '<?php echo esc_js(esc_html($email)); ?>';
        var free_or_not = '<?php echo esc_js(esc_html($free)); ?>';

        var date_active = '<?php echo $dateDescription_active; ?>';
        var zodiac_active = '<?php echo $zodiac_active; ?>';
        var day_active = '<?php echo $day_active; ?>';

        var date_total = '';
        if (date_active == 1) {
            var month = jQuery('#month').val();
            var year = jQuery('#year').val();

            if (day_active == 1) {
                var day = jQuery('#day').val();
                date_total = day + '-' + month + '-' + year;
            } else {
                date_total = month + '-' + year;
            }
        }

        var zodiac = '';
        if (zodiac_active == 1) {
            zodiac = jQuery('#zodiacsigns').val();
        }

        // Always include two elements for the attribute
        var attribute = jQuery('#useridentifier').val() + ',' + jQuery('#reading_id').val();
        if (date_active == 1 || zodiac_active == 1) {
            attribute += ',' + date_total + ',' + zodiac;
        } else {
            attribute += ',,';
        }

        // Trim unnecessary trailing commas (not needed in this case since it always has 2 elements)
        attribute = attribute.replace(/,+$/, '');

        console.log(attribute);
        // return false; // Remove this line to allow the function to proceed

        if (free_or_not == 0) {
            var host = window.location.href;
            var returnurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + encodeURIComponent(attribute) + '&host=' + encodeURIComponent(host) + '&pid=' + <?php echo $product_id; ?>;

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    email: email,
                    token: token,
                    host: host,
                    attribute: attribute,
                    returnurl: returnurl,
                    id: <?php echo $product_id; ?>
                },
                url: 'https://astromedia-business.nl/startpayment',
                success: function(response) {
                    var paymentWindow = window.open('', '_blank');

                    // Set the URL of the popup window after the response is received
                    paymentWindow.location.href = response;

                    jQuery('#spinnerbutton_<?php echo $type; ?>').hide();
                    jQuery('#<?php echo $type; ?>_primescreen').hide();
                    jQuery('#resultbutton_<?php echo $type; ?>').show();
                }
            });
        } else if (free_or_not == 1) {
            retreive_results();
        }
    }


    function retreive_results(transaction_id = null){

        var token = '<?php echo esc_js(esc_html($token)); ?>';
        var email = '<?php echo esc_js(esc_html($email)); ?>';
        var reading_id = '<?php echo esc_js(esc_html($reading_id)); ?>';
        var date_active = '<?php echo $dateDescription_active; ?>';
        var zodiac_active = '<?php echo $zodiac_active; ?>';
        var day_active = '<?php echo $day_active; ?>';

        if(date_active == 1){

            var month = jQuery('#month').val();
            var year = jQuery('#year').val();

            if(day_active == 1){
                    
                var day = jQuery('#day').val();
            }

            var date_total = day + '-' + month + '-' + year;
        }else{
                
            var date_total = '';
        }

        if(zodiac_active == 1){

            var zodiac = jQuery('#zodiacsigns').val();
        }else{

            var zodiac = '';
        }

        var attribute = jQuery('#useridentifier').val() + ',' + jQuery('#reading_id').val();

        attribute = attribute + ',' + date_total + ',' + zodiac;

        jQuery.ajax({
            type: "post",
            crossDomain: true,
            data: {
                email: email,
                token: token,
                attribute: attribute,
                domain: window.location.hostname,
                transaction_id: transaction_id,
                reading_id: reading_id,
                id: <?php echo $product_id; ?>,
            }, 
            url: "https://astromedia-business.nl/retreive_results_free",
            success: function(response){

                jQuery('#spinnerbutton_<?php echo $type; ?>').hide();
                jQuery('#<?php echo $type; ?>_primescreen').hide();
                jQuery('#resultbutton_<?php echo $type; ?>').show();

                var resultWindow = window.open('', '_blank');
                resultWindow.document.open();
                resultWindow.document.write(response);
            }
        });
    }

    </script>

    <?php

    return ob_get_clean();
}

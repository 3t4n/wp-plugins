<?php
// components/horoscope-footer.php

// Footer component for horoscopes
function tarot_footer_free($type, $free, $email, $token, $product_id) {

    ob_start();
    ?>
    <script>

        jQuery(document).ready(function() {

            var token = '<?php echo esc_js(esc_html($token)); ?>';
            var product_id = '<?php echo esc_js(esc_html($product_id)); ?>';
            var type = '<?php echo esc_js(esc_html($type)); ?>';

            getsettings(
                jQuery, 
                token,
                product_id, 
                type, 
                type+'container', 
                'font_'+type, 
            );
        });

        function reset_horoscope(){

            jQuery('#<?php echo $type; ?>_primescreen').show();
            jQuery('#<?php echo $type; ?>_box').hide();
        }

        function startpayment_reading(attribute){

            var token = '<?php echo esc_js(esc_html($token)); ?>';
            var email = '<?php echo esc_js(esc_html($email)); ?>';
            var product_id = '<?php echo esc_js(esc_html($product_id)); ?>';
            var version = '<?php echo esc_js(esc_html($version)); ?>';
            var type = '<?php echo esc_js(esc_html($type)); ?>';

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    email: email,
                    token: token,
                    attribute: attribute,
                    id: product_id,
                    domain: window.location.hostname,
                }, 
                url: "https://astromedia-business.nl/retreive_results_"+type,
                success: function(response) {
                    
                    jQuery('#<?php echo $type; ?>_primescreen').hide();
                    jQuery('#<?php echo $type; ?>_box').show();
                    jQuery('#<?php echo $type; ?>_box').html(response);
                }
            });
        }
    </script>
    <?php
    return ob_get_clean();
}

<?php
// components/horoscope-footer.php

// Footer component for horoscopes
function horoscope_footer_free($type, $free, $email, $token, $product_id, $version) {

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

        // Click event handler for the button
        jQuery("#resultbutton_<?php echo $type; ?>").on('click', function() {
            var newWindow = window.open();
            if (newWindow && responseContent) {
                // Write the stored response HTML to the new window
                newWindow.document.write(responseContent);
            } else {
                // Handle the case where the new window couldn't be opened or responseContent is empty
                alert("Unable to open a new window or no content available.");
            }
        });

        function retreive_results(attribute){

            var resultWindow = window.open('', '_blank');

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

                    resultWindow.document.open();
                    resultWindow.document.write(response);
                }
            });
        }
    </script>
    <?php
    return ob_get_clean();
}

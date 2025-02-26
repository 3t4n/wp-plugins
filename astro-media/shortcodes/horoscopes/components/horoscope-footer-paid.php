<?php
// components/horoscope-footer.php

// Footer component for horoscopes
function horoscope_footer_paid($type, $free, $email, $token, $product_id, $version) {

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

    function retreive_results(attribute){

        var token = '<?php echo esc_js(esc_html($token)); ?>';
        var email = '<?php echo esc_js(esc_html($email)); ?>';
        var product_id = '<?php echo esc_js(esc_html($product_id)); ?>';

        // Call the server to get the payment URL
        myService().getUrl().then(function(url) {
            // Open the payment gateway in a new window
            ////var popupWindow = window.open('', '_blank', 'width=800,height=600');
            var paymentWindow = window.open('', '_blank');

            var host = window.location.href;
            var returnurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + attribute + '&host=' + host + '&pid=' + product_id;

            jQuery.ajax({
                type: "post",
                crossDomain: true,
                data: {
                    email: email,
                    token: token,
                    host: host,
                    attribute: attribute,
                    returnurl: returnurl,
                    id: product_id,
                    domain: window.location.hostname,
                },
                url: 'https://astromedia-business.nl/startpayment',
                success: function(response){

                    paymentWindow.location.href = response;
                }
            });
        });
    }

    function isValidReturnUrl(url) {
        // Define the regular expression for the URL pattern
        const urlPattern = /^https:\/\/www\.mollie\.com\/checkout\/select-issuer\/ideal\/[A-Za-z0-9]+$/;

        // Test the URL against the pattern
        return urlPattern.test(url);
    }

    function reset_horoscope(){

        jQuery('#<?php echo $type; ?>_primescreen').show();
        jQuery('#<?php echo $type; ?>_box').hide();
    }

    var responseContent; // Global variable to store the response

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

    function retreive_results_api(transaction_id){

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
                transaction_id: transaction_id,
                id: product_id,
                domain: window.location.hostname,
            }, 
            url: "https://astromedia-business.nl/retreive_results",
            success: function(response){

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

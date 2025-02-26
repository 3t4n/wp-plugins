<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    /**
     * Template for the variables for the user to type in to a textarea
     * 
     * @since   1.1.0
     * @author  Dennis Weijer
     */
?>
<span class="description">
    <?php esc_html_e( "Type the following in your message:", "e-customer-emails" ); ?>
    <ul>
        <li>&emsp;&emsp;<strong>[first_name]</strong> - <?php esc_html_e( "To insert the first name of the client.", "e-customer-emails" ); ?></li>
        <li>&emsp;&emsp;<strong>[last_name]</strong> - <?php esc_html_e( "To insert the last name of the client.", "e-customer-emails" ); ?></li>
        <li>&emsp;&emsp;<strong>[full_name]</strong> - <?php esc_html_e( "To insert the full name of the client.", "e-customer-emails" ); ?></li>
    </ul>
</span>
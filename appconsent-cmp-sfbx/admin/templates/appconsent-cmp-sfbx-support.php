<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to show the Support tab content.
 *
 * @link       https://sfbx.io/
 * @since      1.0.0
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/admin/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="sfbx-content">
	<p><?php printf( '%s <a href="mailto:support-cmp@sfbx.io">%s</a>. %s', esc_html__( "If you encounter any problem while setting up the plugin or if you have any questions, please feel free to send an email to our support team","appconsent-cmp-sfbx" ), esc_html__( "support-cmp@sfbx.io","appconsent-cmp-sfbx" ), esc_html__( "This will automatically open a ticket.  We usually reply the same day.","appconsent-cmp-sfbx" )  ); ?>
	</p>
</div>
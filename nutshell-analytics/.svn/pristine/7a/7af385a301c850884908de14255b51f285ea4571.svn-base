<?php
// IMPORTANT: This plugin is dynamically updated - MODIFICATIONS WILL BE OVERWRITTEN

/**************************************************
 * Name: Gravity Forms
 * Description: Automatically track submissions from Gravity Forms
 *************************************************/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!-- Nutshell Integration: Gravity Forms -->
<script type="text/javascript" data-registered="nutshell-plugin" >
	if (
		/* global mcfx */
		'undefined' !== typeof mcfx
	) {
		document.addEventListener( 'submit.gravityforms', function( e ) {
			if ( 'function' === typeof mcfx ) {
				mcfx( 'capture', e.target );
			}
		} );
	}
</script>


<?php
/**
 * Gravity Forms changed how AJAX submissions worked in >= 2.9.
 * 
 * This is a fallback in case the above capture doesn't work.
 * 
 * @todo Clean up this script to match other scripts
 */
if( class_exists( 'GFForms' ) && version_compare( GFForms::$version, '2.9', '>=' ) ) {
	?>
		<script nowprocket>
			( () => {
				document.addEventListener( 'gform/post_init', () => {
					gform.utils.addAsyncFilter( 'gform/submission/pre_submission', async data => {
						if( 'function' === typeof mcfx && data?.form instanceof HTMLFormElement ) {
							mcfx( 'capture', data.form )
						}

						return data
					})
				})
			}) ()
		</script>
	<?php
}
?>


<?php // IMPORTANT: This plugin is dynamically updated - MODIFICATIONS WILL BE OVERWRITTEN ?>

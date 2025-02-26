<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if ( ! function_exists ( 'oxsn_breadcrumbs_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_breadcrumbs_quicktags' );
	function oxsn_breadcrumbs_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">
				QTags.addButton( 'oxsn_breadcrumbs_quicktag', '[oxsn_breadcrumbs]', '[oxsn_breadcrumbs]', '', 'oxsn_breadcrumbs', 'Breadcrumbs', 201 );
			</script>

		<?php

		}

	}

}


?>
<?php
/**
 * Selected filters and tags.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="acb-tags acb-tags-none">

	<a href="#" class="acb-tag acb-tag-tpl">
		<span class="acb-tag-name">[name]</span>
		<span class="acb-tag-remove"><?php echo acb_svg( 'x' ); ?></span>
	</a>

	<a href="#" class="acb-tag acb-tag-clear"><?php esc_html_e( 'Clear all', 'acb' ); ?></a>

</div>
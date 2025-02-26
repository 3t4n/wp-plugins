<?php
/**
 * Admin View: Shortcode generator
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap about-wrap full-width-layout">

	<?php include_once( 'html-admin-header.php' ); ?>

	<div class="headline-feature">
		<h2><?php esc_html_e( 'Shortcode Generator', 'acb' ); ?></h2>
		<p class="about-description aligncenter">
			<?php echo sprintf( wp_kses_post( __( 'Use this page to generate the shortcode or alternatively see the <a href="%s">docs</a>.', 'acb' ) ), esc_url( admin_url( 'admin.php?page=acb-docs' ) ) ); ?>
		</p>
		<p class="description aligncenter"><?php echo sprintf( wp_kses_post( __( 'This may not be the complete configuration options. For a complete list of shortcode options, please see the <a href="%s">docs</a>.', 'acb' ) ), esc_url( admin_url( 'admin.php?page=acb-docs' ) ) ); ?></p>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4><?php esc_html_e( 'Configuration', 'acb' ); ?></h4>
			<div class="shortcode_opts" style="font-size:0.9em">
				<label for="posts_per_page">
					<input type="number" min="1" value="" placeholder="10" id="posts_per_page" class="small-text" data-text='posts_per_page="{val}"'> <?php esc_html_e( 'Posts per page', 'acb' ); ?>
				</label>
				<label for="paged">
					<input type="number" min="1" value="" placeholder="1" id="paged" class="small-text" data-text='paged="{val}"'> <?php esc_html_e( 'Start at page number', 'acb' ); ?>
				</label>
				<label for="show_filters">
					<input type="checkbox" id="show_filters" checked data-unchecked='show_filters="no"'> <?php esc_html_e( 'Show ajax filters', 'acb' ); ?>
				</label>
				<label for="show_author">
					<input type="checkbox" id="show_author" checked data-unchecked='show_author="no"'> <?php esc_html_e( 'Show author name', 'acb' ); ?>
				</label>
				<label for="show_time">
					<input type="checkbox" id="show_time" checked data-unchecked='show_time="no"'> <?php esc_html_e( 'Show post time', 'acb' ); ?>
				</label>
				<label for="show_search">
					<input type="checkbox" id="show_search" checked data-unchecked='show_search="no"'> <?php esc_html_e( 'Show search form', 'acb' ); ?>
				</label>
				<label for="show_sortby">
					<input type="checkbox" id="show_sortby" checked data-unchecked='show_sortby="no"'> <?php esc_html_e( 'Show sort options', 'acb' ); ?>
				</label>
				<label for="show_counts">
					<input type="checkbox" id="show_counts" checked data-unchecked='show_counts="no"'> <?php esc_html_e( 'Show post counts', 'acb' ); ?>
				</label>
				<label for="show_thumbnail">
					<input type="checkbox" id="show_thumbnail" checked data-unchecked='show_thumbnail="no"'> <?php esc_html_e( 'Show featured images', 'acb' ); ?>
				</label>
				<label for="show_item_tags">
					<input type="checkbox" id="show_item_tags" data-checked='show_item_tags="yes"'> <?php esc_html_e( 'Show item tags and terms', 'acb' ); ?>
				</label>
				<label for="toggle_all">
					<input type="checkbox" id="toggle_all" data-checked='toggle_all="yes"'> <?php esc_html_e( 'Toggle all filters by default', 'acb' ); ?>
				</label>
			</div>
		</div>
		<div class="column">
			<h4><?php esc_html_e( 'Your Shortcode:', 'acb' ); ?></h4>
			<p><textarea readonly style="width:100%;height:90px;background:#fff;" id="acb_shortcode">[acb]</textarea></p>
			<p><a href="javascript:void(0);" class="button acb_copy"><?php esc_html_e( 'Copy', 'acb' ); ?></a></p>
		</div>
	</div>

	<hr>

	<div class="return-to-dashboard">
		<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Embed your first AJAX grid &rarr;', 'acb' ); ?></a>
	</div>

</div>

<style type="text/css">
	.shortcode_opts label {
		display: block;
		margin: 10px 0;
	}
	.shortcode_opts input[type=checkbox] {
		margin-top: -2px !important;
	}
</style>
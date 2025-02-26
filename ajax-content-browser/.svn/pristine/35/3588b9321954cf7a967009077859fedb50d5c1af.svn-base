<?php
/**
 * Admin View: Docs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap about-wrap full-width-layout">

	<?php include_once( 'html-admin-header.php' ); ?>

	<div class="headline-feature">
		<h2 class="aligncenter"><?php esc_html_e( 'Shortcode options', 'acb' ); ?></h2>
		<p class="about-description aligncenter"><?php esc_html_e( 'Explore the various shortcode options and parameters.', 'acb' ); ?></p>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>id</h4>
			<p><?php esc_html_e( 'Add a unique ID to the displayed grid. By default the plugin will automatically generate a custom ID. Use this If you intend to have multiple grids per page.', 'acb' ); ?></p>
			<p><code>[acb id="my-awesome-grid"]</code></p>
		</div>
		<div class="column">
			<h4>date_filter</h4>
			<p><?php esc_html_e( 'Show or hide an ajax date filter to allow users to browse items released over a specific period of time. By default the date filter is enabled. To turn it off please use:', 'acb' ); ?></p>
			<p><code>[acb date_filter="no"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>post_type</h4>
			<p><?php esc_html_e( 'A comma separated list of post types to show in the grid. You can combine multiple post types. e.g. show posts and products', 'acb' ); ?></p>
			<p><code>[acb post_type="post,product"]</code></p>
		</div>
		<div class="column">
			<h4>posts_per_page</h4>
			<p><?php esc_html_e( 'The number of posts to get on each load. By default this is 10 posts per page.', 'acb' ); ?></p>
			<p><code>[acb posts_per_page="20"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>taxonomies</h4>
			<p><?php esc_html_e( 'A comma separated list of custom taxonomies you want to allow the user to filter from. By default this shows categories and post tags but you can explicitly set which custom taxonomies you want to add as filter.', 'acb' ); ?></p>
			<p><code>[acb taxonomies="product_cat,product_tag"]</code></p>
		</div>
		<div class="column">
			<h4>show_filters</h4>
			<p><?php esc_html_e( 'Show or hide the ajax filters menu. For example you can use the following to hide the filters.', 'acb' ); ?></p>
			<p><code>[acb show_filters="no"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>show_search</h4>
			<p><?php esc_html_e( 'Show or hide the ajax search form. The ajax search form is enabled by default. You can use the following to hide the search box.', 'acb' ); ?></p>
			<p><code>[acb show_search="no"]</code></p>
		</div>
		<div class="column">
			<h4>search_position</h4>
			<p><?php esc_html_e( 'When search is enabled, you can define where the search form should appear. By default it appears on the top of ajax filters, you can use this to display the search below filters.', 'acb' ); ?></p>
			<p><code>[acb search_position="bottom"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>show_author</h4>
			<p><?php esc_html_e( 'Show or hide the author name who created the post. The author is displayed by default. To hide the author you can use:', 'acb' ); ?></p>
			<p><code>[acb show_author="no"]</code></p>
		</div>
		<div class="column">
			<h4>show_time</h4>
			<p><?php esc_html_e( 'Show or hide the post time e.g. 1 hr ago. By default the time is displayed on every item. To hide the time, use the following:', 'acb' ); ?></p>
			<p><code>[acb show_time="no"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>show_counts</h4>
			<p><?php esc_html_e( 'Show or hide the posts count displayed beside ajax filter. e.g. category posts count. By default this is enabled, to disable the counts, you can use:', 'acb' ); ?></p>
			<p><code>[acb show_counts="no"]</code></p>
		</div>
		<div class="column">
			<h4>show_sortby</h4>
			<p><?php esc_html_e( 'Show or hide the ajax sorting dropdown which appears before the grid and enables you to sort items. By default this is enabled, to hide the sort feature please use:', 'acb' ); ?></p>
			<p><code>[acb show_sortby="no"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>toggle_all</h4>
			<p><?php esc_html_e( 'If you set toggle_all to "yes" in the shortcode, the filters will be collapsed on load. By default, filters are expanded.', 'acb' ); ?></p>
			<p><code>[acb toggle_all="yes"]</code></p>
		</div>
		<div class="column">
			<h4>toggle_{filter}</h4>
			<p><?php esc_html_e( 'You can toggle specific filters by passing the filter as an option and set its value to "yes". For example to toggle the categories filter by default, you would have to add the following to your shortcode:', 'acb' ); ?></p>
			<p><code>[acb toggle_category="yes"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>show_item_tags</h4>
			<p><?php esc_html_e( 'This is off by default. If you enable this option, item tags and terms will be displayed below the title. To enable this feature, please use the following in your shortcode:', 'acb' ); ?></p>
			<p><code>[acb show_item_tags="yes"]</code></p>
		</div>
		<div class="column">
			<h4>paged</h4>
			<p><?php esc_html_e( 'If this is set, the grid will automatically start from a specific page instead of starting from the first page by default. Example: to make the grid start results from page 2 you would add this:', 'acb' ); ?></p>
			<p><code>[acb paged="2"]</code></p>
		</div>
	</div>

	<div class="has-2-columns is-fullwidth">
		<div class="column">
			<h4>show_thumbnail</h4>
			<p><?php esc_html_e( 'Show or hide the item featured image. This is enabled by default and shows the item featured image If it exists. To disable featured images, please use:', 'acb' ); ?></p>
			<p><code>[acb show_thumbnail="no"]</code></p>
		</div>
		<div class="column">
			<h4>buy_now_text</h4>
			<p><?php esc_html_e( 'Helps you customize the default Buy Now button text. By default, this will use WooCommerce or Easy Digital Downloads default button text.', 'acb' ); ?></p>
			<p><code>[acb buy_now_text="Purchase"]</code></p>
		</div>
	</div>

	<h3 class="aligncenter"><?php esc_html_e( 'Need more options or got suggestions?', 'acb' ); ?></h3>

	<div class="has-1-columns">
		<div class="column aligncenter">
			<p><?php echo sprintf( wp_kses_post( __( 'No problem! <a href="%s">Write a request</a> in the plugin forums.', 'acb' ) ), esc_url( 'https://wordpress.org/plugins/ajax-content-browser' ) ); ?></p>
		</div>
	</div>

	<hr>

	<div class="return-to-dashboard">
		<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Embed your first AJAX grid &rarr;', 'acb' ); ?></a>
	</div>

</div>
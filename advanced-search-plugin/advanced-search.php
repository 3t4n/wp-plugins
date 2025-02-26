<?php
/*
Plugin Name: Advanced Search
Plugin URI: http://searchpluginwp.blogspot.com/
Description: <strong>This plugin has been removed from your site. WordPress.org has identified this plugin to be <strong>malware</strong>. For more, see <a href="http://wordpress.org/support/topic/the-advanced-search-plugin-is-malware">this post</a>.
Version: 3.0
*/

function wporg_advanced_search_plugin_empty() {
	?>
	<div class="error">
		<h3><?php printf( 'Warning: The &#8220;%s&#8221; plugin has been removed from your site.', 'Advanced Search' ); ?></h3>
		<p><?php echo 'WordPress.org has identified this plugin to be <strong>malware</strong>.';
			printf( 'You can see our post on this <a href="%s">here</a>.', 'http://wordpress.org/support/topic/the-advanced-search-plugin-is-malware' ); ?></p>
                <p><?php printf( 'If you need any assistance, please visit the <a href="%s">Support Forums</a>.', 'http://wordpress.org/tags/advanced-search-plugin' ); ?></p>
	</div>
	<?php
        unset( $_GET['activate'] );
        deactivate_plugins( __FILE__ ); 
}
add_action( 'admin_notices', 'wporg_advanced_search_plugin_empty' );


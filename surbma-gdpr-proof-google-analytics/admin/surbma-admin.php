<?php

// Custom styles and scripts for admin pages
function surbma_gpga_admin_scripts( $hook ) {
	global $surbma_gpga_settings_page;
	global $surbma_gpga_social_page;
	global $surbma_gpga_cookies_page;
	global $surbma_gpga_documentation_page;
    if ( $hook == $surbma_gpga_settings_page || $hook == $surbma_gpga_social_page || $hook == $surbma_gpga_cookies_page || $hook == $surbma_gpga_documentation_page ) {
		$admin_url = plugins_url( '', __FILE__ );
		wp_enqueue_script( 'uikit-js', $admin_url . '/uikit/js/uikit.min.js', array( 'jquery' ), '3.0.0-rc.2' );
		wp_enqueue_script( 'uikit-icons', $admin_url . '/uikit/js/uikit-icons.min.js', array( 'jquery' ), '3.0.0-rc.2' );
		wp_enqueue_style( 'uikit-css', $admin_url . '/uikit/css/uikit.min.css', false, '3.0.0-rc.2' );
    	wp_enqueue_style( 'surbma-admin', $admin_url . '/surbma-admin.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'surbma_gpga_admin_scripts', 9999 );

function surbma_gpga_admin_header( $pageTitle ) {
	$plugin_data = get_plugin_data( SURBMA_GPGA_PLUGIN_FILE );
	$plugin_name = $plugin_data['Name'];
	?><nav class="uk-navbar-container uk-margin" id="surbma-header" uk-navbar>
		<div class="uk-navbar-left">
			<div class="uk-navbar-item uk-logo">
	        	<div><span uk-icon="icon: settings; ratio: 2"></span> <?php echo $plugin_name ?> | <?php echo $pageTitle ?></div>
	    	</div>
	    </div>
	</nav>
	<div id="surbma-admin-notification-placeholder" class="wrap"><h1></h1></div><?php
}

function surbma_gpga_admin_footer() {
	$plugin_data = get_plugin_data( SURBMA_GPGA_PLUGIN_FILE );
	$plugin_version = $plugin_data['Version'];
	$plugin_name = $plugin_data['Name'];
	$plugin_authorURI = $plugin_data['AuthorURI'];
	$plugin_pluginURI = $plugin_data['PluginURI'];
	?><div class="uk-section uk-section-small">
    	<div class="uk-text-center">
        	<p>
				<strong><a class="uk-link-reset" href="<?php echo $plugin_pluginURI; ?>" target="_blank"><?php echo $plugin_name; ?></a></strong><br>
				<a href="<?php echo $plugin_authorURI; ?>" target="_blank">Made with &hearts; by Surbma</a><br>
				v.<?php echo $plugin_version; ?>
			</p>
		</div>
	</div><?php
}

function surbma_gpga_admin_sidebar() {
	$options = get_option( 'surbma_gpga_fields' );
	$limitedliabilityValue = isset( $options['limitedliability'] ) ? $options['limitedliability'] : '';
	$license = 'all';
	if ( surbma_gpga_fs()->is_not_paying() && !surbma_gpga_fs()->is_trial() ) {
		$license = 'free';
	}
	?><div uk-sticky="offset: 42; bottom: #bottom">
	<div class="uk-card uk-card-small uk-card-default uk-card-hover">
		<div class="uk-card-header uk-background-muted">
			<h3 class="uk-card-title"><?php _e( 'Informations', 'surbma-gdpr-proof-google-analytics' ); ?> <a class="uk-float-right uk-margin-small-top" uk-icon="icon: more-vertical" uk-toggle="target: #informations"></a></h3>
		</div>
		<div id="informations" class="uk-card-body">
			<?php if ( $limitedliabilityValue == '' ) { ?>
			<div class="uk-alert-danger" uk-alert>
				<h4><?php _e( 'Missing settings', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
				<p><?php _e( 'The <strong>Limited Liability</strong> setting is required for the plugin to work. Please accept the Limited Liability setting to start using this plugin!', 'surbma-gdpr-proof-google-analytics' ); ?></p>
			</div>
			<?php } ?>
			<h4 class="uk-heading-divider"><?php _e( 'Google links', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
			<ul class="uk-list">
				<li><a href="https://privacy.google.com/businesses/compliance/" target="_blank"><?php _e( 'How Google complies with data protection laws', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
				<li><a href="https://www.google.com/about/company/consentstaging.html" target="_blank"><?php _e( 'EU user consent policy', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
				<li><a href="https://www.google.com/about/company/consenthelpstaging.html" target="_blank"><?php _e( 'Help with the EU user consent policy', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
			</ul>
			<h4 class="uk-heading-divider"><?php _e( 'Facebook links', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
			<ul class="uk-list">
				<li><a href="https://www.facebook.com/legal/terms/businesstools" target="_blank"><?php _e( 'Facebook Business Tools Terms', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
			</ul>
			<h4 class="uk-heading-divider"><?php _e( 'Plugin links', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
			<ul class="uk-list">
				<li><a href="https://wordpress.org/support/plugin/surbma-gdpr-proof-google-analytics" target="_blank"><?php _e( 'Official Support Forum', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
				<li><a href="https://wordpress.org/support/plugin/surbma-gdpr-proof-google-analytics/reviews/" target="_blank"><?php _e( 'Read the Reviews (5 out of 5 stars)', 'surbma-gdpr-proof-google-analytics' ); ?></a></li>
			</ul>
			<h4 class="uk-heading-divider"><?php _e( 'Upcoming features', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
			<ul class="uk-list">
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Snackbar style configurations: text color, background color, width.</li>
				<li><span uk-icon="icon: check; ratio: 0.8"></span> More tracking services: AdWords Remarketing, HotJar, Clicky and more.</li>
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Cookie categories: necessary, performance, marketing, statistics</li>
				<li><span uk-icon="icon: check; ratio: 0.8"></span> Individual opt-in & opt-out by Cookie categories.</li>
			</ul>
			<hr>
			<p>
				<strong><?php _e( 'Do you like the plugin? Please give it a five star review!', 'surbma-gdpr-proof-google-analytics' ); ?></strong>
				<br><a href="https://wordpress.org/support/plugin/surbma-gdpr-proof-google-analytics/reviews/#new-post" target="_blank"><?php _e( 'Create Your New Review', 'surbma-gdpr-proof-google-analytics' ); ?></a>
			</p>
			<?php if ( $license == 'free' ) { ?>
			<h4 class="uk-heading-divider"><?php _e( 'Get the Pro Version', 'surbma-gdpr-proof-google-analytics' ); ?></h4>
			<p><?php _e( 'Unlock all options and features of GDPR Proof Cookies plugin! Buy the Pro version and get the most out of all display options and get more control over the tracking code! All disabled options are available in the PRO version.', 'surbma-gdpr-proof-google-analytics' ); ?></p>
			<div class="uk-alert-success" style="display: none;" uk-alert>
				<?php _e( '<p>Use this special <strong>BEFOREGDPR</strong> coupon to get 50% OFF your first purchase, which is available till <strong>May 26, 2018</strong>. Hurry, GDPR is coming!</p>', 'surbma-gdpr-proof-google-analytics' ); ?>
			</div>
			<p><a class="uk-button uk-button-default uk-width-1-1" href="<?php echo esc_url( get_admin_url() ); ?>admin.php?page=surbma-gpga-menu-pricing"><?php _e( 'BUY Pro Version!', 'surbma-gdpr-proof-google-analytics' ); ?></a></p>
			<?php } ?>
			<div class="uk-alert-primary" style="display: none;" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<h3><?php _e( 'Affiliate Program', 'surbma-gdpr-proof-google-analytics' ); ?></h3>
				<p><?php _e( 'Do you like this plugin? Let\'s make some money by referring new customers and get 20% commission, for the lifetime of the new customers! Good deal, hah?', 'surbma-gdpr-proof-google-analytics' ); ?></p>
				<p><a class="uk-button uk-button-primary uk-width-1-1" href="<?php echo esc_url( get_admin_url() ); ?>admin.php?page=surbma-gpga-menu-affiliation"><?php _e( 'Be an Affiliate!', 'surbma-gdpr-proof-google-analytics' ); ?></a></p>
			</div>
		</div>
		<div class="uk-card-footer uk-background-muted">
			<p class="uk-text-right"><?php _e( 'License: GPLv2', 'surbma-gdpr-proof-cookies' ); ?></p>
		</div>
	</div>
</div>
<?php
}

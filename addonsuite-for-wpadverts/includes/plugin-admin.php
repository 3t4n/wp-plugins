<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Admin Menu
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	
	// Create Menu Page
	function adosui_admin_page() { 
		add_menu_page( 
			'AddonSuite',
			'AddonSuite',
			'manage_options',
			'addon-suite',
			'adosui_options_page',
			'dashicons-editor-expand'
		);
		add_submenu_page(
			'addon-suite',
			__('Informations', 'addonsuite-for-wpadverts'),
			__('Informations', 'addonsuite-for-wpadverts'),
			'manage_options',	
			'addon-suite',
			'adosui_options_page'
		);
	}
	add_action( 'admin_menu', 'adosui_admin_page', 10 );
		
		
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Admin Menu Page
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	function adosui_options_page(){ ?>
		<div class="wrap">
		
			<div class="as-page-header">
				<?php echo '<img class="as-dashboard-icon-header" src="' . plugins_url( 'assets/img/icon-96x96.png', dirname(__FILE__) ) . '" > '; ?>
				AddonSuite Framework 
                <?php echo '<a href="https://wpextend.net" target="_blank"><img style="float:right; min-width:100px; margin-left:10px;" class="as-dashboard-icon" src="' . plugins_url( 'assets/img/logo.png', dirname(__FILE__) ) . '" > </a>'; ?>
			</div>
			<h2></h2>
			<div class="as-box">
				<?php _e('We are pleased that you have installed the AddonSuite Framework for WPAdverts. WPAdverts is a lite weight classifieds plugin for WordPress which allows you to build a classifieds page in minutes. With the AddonSuite you can extend this classifieds page with additional options and addons.', 'addonsuite-for-wpadverts'); ?>
				<br><br>
				<a href="https://wpextend.net" target="_blank"><?php _e('Get more informations', 'addonsuite-for-wpadverts'); ?></a> <?php _e('about the AddonSuite Framework and our additional addons for WPAdverts.', 'addonsuite-for-wpadverts'); ?>
				<br><br>
				<span class="dashicons dashicons-star-filled" style="color: gold"></span><span class="dashicons dashicons-star-filled" style="color: gold"></span><span class="dashicons dashicons-star-filled" style="color: gold"></span><span class="dashicons dashicons-star-filled" style="color: gold"></span><span class="dashicons dashicons-star-filled" style="color: gold"></span>
				<br>
				<?php _e('If you like the AddonSuite for WPAdverts, we would appreciate a positive review. ', 'addonsuite-for-wpadverts');?>&nbsp;<a href="https://wordpress.org/plugins/addonsuite-for-wpadverts/#reviews" target="_blank">REVIEW</a>
			</div>			
			<div class="as-box">				
				<?php echo '<img class="as-dashboard-icon" src="' . plugins_url( 'assets/img/icon-128x128.png', dirname(__FILE__) ) . '" > '; ?>
				<h3><?php _e('Extended Options', 'addonsuite-for-wpadverts'); ?></h3>
				<?php _e('The extended options are free inbuild options, which you can use to modify your WPAdverts classifieds page a bit more. The most of the options are requested by users within the WPAdverts support forum and released as codesnippets by Greg Winiarsky on GitHub. We have build this addon to manege the options of these codesnippets directly from the WordPress admin dashboard without any coding knowledge. ', 'addonsuite-for-wpadverts'); ?>
				<br><br>
				<a href="admin.php?page=extended-options" class="button"><?php _e('Extended Options', 'addonsuite-for-wpadverts'); ?></a>
			</div>
		
			<hr>
			<?php // AddonSuite Hook Addons
			function adosui_admin_hook() {
				do_action('adosui_admin_hook');
			} ?>
			<h3>Addons</h3> 
			
			<?php if(has_action('adosui_admin_hook')) {
				adosui_admin_hook(); 
			} else { ?>
				<div class="as-info-box">
					<?php _e('You have not installed or activated any additional AddonSuite extension at the moment.', 'addonsuite-for-wpadverts'); ?>
					<a href="https://wpextend.net/" target="_blank" title="<?php _e('Get additional extensions', 'addonsuite-for-wpadverts'); ?>" style="text-decoration: none; float: right;"> <span style="color: #a73c5a" class="dashicons dashicons-plus-alt"></span></a>
				</div>
			<?php } ?>
			
		</div>
	<?php }
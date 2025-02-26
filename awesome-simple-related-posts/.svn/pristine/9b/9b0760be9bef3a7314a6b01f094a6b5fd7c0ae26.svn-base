<?php

add_action('admin_menu','awsrp_plugin_settings');

function awsrp_plugin_settings(){
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	
	add_menu_page(
	
	'Awesome Simple Related Post Settings',   //$page_title
	
	'Awsrp Settings', //$menu_title
	
	'administrator',  //$capability
	
	'awsrp_plugin_settings', //$menu_slug
	
	'awsrp_plugin_page_content', //$function
	
	'dashicons-hammer', //$icon_url
	
	'92' //$position
	
	);
	
}


add_action('admin_init','awsrp_plugin_options');

function awsrp_plugin_options(){
	
	register_setting('meta-data-group','awsrp_number_of_related_posts');
	
}


function awsrp_plugin_page_content(){
	echo "<h1>Insert Number of related posts that you want to show</h1>"; ?>
	
	<div class="wrap">
		<form action="options.php" method="post">
		
		<?php settings_fields('meta-data-group');  //my_plugin_settings-group ?>
		<?php do_settings_sections('meta-data-group'); //my_plugin_settings-group?>
		
		<label>Enter the Number</label>
		<input type="text" name="awsrp_number_of_related_posts" value="<?php echo esc_attr(get_option('awsrp_number_of_related_posts')); ?>" />
		<?php submit_button();?>
		
		</form>
	
	</div>
	
	
<?php }
	
	
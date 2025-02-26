<?php
add_action( 'admin_menu', 'toast_als_add_admin_menu' );
add_action( 'admin_init', 'toast_als_settings_init' );
function toast_als_add_admin_menu(  ) { 
add_submenu_page( 'options-general.php', 'Ajax Live Search', 'Ajax Live Search', 'manage_options', 'ajax_live_search', 'toast_als_options_page' );

}
function toast_als_settings_init(  ) { 

	register_setting( 'toast_als_page', 'toast_als_settings' );

	add_settings_section(
		'toast_als_page_section', 
		__( '', 'wordpress' ), 
		'toast_als_settings_section_callback', 
		'toast_als_page'
	);
	
	add_settings_field( 
		'toast_als_post_types', 
		__( 'Post types within search?', 'wordpress' ), 
		'toast_als_post_types_render', 
		'toast_als_page', 
		'toast_als_page_section' 
	);


}
function toast_als_settings_section_callback(){}
function toast_als_post_types_render(  ) { 

	$options = get_option( 'toast_als_settings' );
	?>
	
	<?php $post_types = get_post_types(array('public' => true)); ?>
	
	<div class="multiple-choice-checkbox">
	<?php foreach($post_types as $post_type){ ?>
	<div class="checkbox-area">
<input type='checkbox' name='toast_als_settings[toast_als_post_types][]' value="<?php echo $post_type; ?>" <?php if(! empty($options['toast_als_post_types']) && in_array($post_type, $options['toast_als_post_types'])): ?>checked<?php endif; ?>><?php echo $post_type; ?></input>
	</div>
	<?php } ?>
	</div>

<?php }
function toast_als_options_page(  ) { 

	?>
	<div class="wrap">
	<h2>AJAX Live Search<span class="toast-version-number"> Version 1.1.0</span></h2>
	
	
	<div class="toast-wrap">
	<form action='options.php' method='post'>
		
		<div class="toast-main-content">
		<div class="toast-metabox">
		<h2>Settings</h2>
		
		<?php settings_fields( 'toast_als_page' );
		do_settings_sections( 'toast_als_page' );
		submit_button();
		?>
        </div>
        </div>
        
        <div class="toast-sidebar">
        
        <div class="toast-metabox">
		<h3>Ajax Live Search Shortcode</h3>
		<p>Simply insert this shortcode anywhere in your site and bring your search to life</p>
		<code>[als_search]</code>
        </div>
        
        
		<div class="toast-metabox">
		<h3>Ratings & Reviews</h3>
		<p>If you like this plugin please consider leaving a ★★★★★ rating.
        A huge thanks in advance!</p>
        <a href="#" target="_blank" class="button button-primary">Leave us a rating</a>
        </div>
        
        <div class="toast-metabox">
		<h3>About the plugin</h3>
	    <div class="meta-info"><strong>Developed by:</strong> <a href="https://www.toastwebsites.co.uk/">Toast Websites</a></div>
		<div class="meta-info"><strong>Need some support?</strong> 
		<br><a href="#" target="_blank" >Contact the developers via the Support Forum</a></div>
        <a href="" class="button button-primary">Contact us</a>
        </div>
        
        
        </div>

	</form>
	</div>
	
	</div>
	<?php } ?>
<?php 

add_action('admin_menu', 'w404_item_menu');

function w404_item_menu() {
	add_options_page(  __('404 Page Editor', '404-page-editor'), __('404 Page Editor', '404-page-editor'), 'edit_published_posts', 'w404_config', 'w404_config');
}

function w404_config(){

?>
<div class="wrap tw-bs">
<h2><?php _e('404 Page Editor', 'wcc'); ?></h2>
<p><?php _e('Make sure you click Save New 404 before you <a href="/404-19169434-broken-link" type="button" target="_blank">view the new 404</a>', '404-page-editor'); ?></p>
 <?php 
 if( isset($_POST['_wpnonce']) )
 if(  wp_verify_nonce($_POST['_wpnonce']) ): ?>
  <div id="message" class="updated" ><p><?php _e('Settings saved successfully', '404-page-editor'); ?></p></div>  
  <?php 

  else:  ?>

  <?php //exit; ?>
  
  <?php endif; ?> 

<?php 
//$config = get_option('w404_options'); 

//Set Notifications
$msg = '';
if( isset($_GET['action']) )
switch( $_GET['action'] ){
	case "make_backup":
	$msg = "
		<div class='updated settings-error notice is-dismissible'>  
		  <p>Backup created and saved to <strong>/wp-content/uploads/404-page-editor/404_backup.php</strong></p>
		</div>  
	";
	break;
	case "restore_backup":
	$msg = "
		<div class='updated settings-error notice is-dismissible'>  
		  <p>Backup restored from <strong>/wp-content/uploads/404-page-editor/404_backup.php</strong> to <strong>/wp-content/uploads/404-page-editor/404.php</strong></p>
		</div>  
	";
	break;
	case "generate_404":
	$msg = "
		<div class='updated settings-error notice is-dismissible'>  
		  <p>Template saved to /wp-content/uploads/404-page-editor/404.php - <a target='_blank' href='/404-19169434-broken-link'>View your new 404 page</a></p>
		</div>  
	";
	break;
}
echo $msg;

?> 
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" > 
 
	<div id="backup" class="postbox">
 		<h1 class="headerhndle">Create Backup / Restore Backup <span class="text-danger">Always create a backup first</span></h1>
		<div class="inside">
				<p><a class="button-primary" href="<?php print wp_nonce_url(admin_url('options-general.php?page=w404_config'), 'make_backup', 'make_backup_nonce');?>" onclick="return confirm('Save Current 404 Page to Backup? This will overwrite the current backup.');" ><?php echo __('Backup Current 404', '404-page-editor');   ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="button" href="/404-19169434-broken-link" type="button" target="_blank">View Current 404</a></p>
				<p>BEWARE: Every time you run a backup, the old backup will be overwritten.</p>
				<p><a class="text-danger" href="<?php print wp_nonce_url(admin_url('options-general.php?page=w404_config'), 'restore_backup', 'restore_backup_nonce');?>" onclick="return confirm('Restore Backup as 404 Page?');" ><?php echo __('Restore Backup', '404-page-editor'); ?></a>: Restores the 404_backup.php as the new 404.php page.</p>
		</div>
		<p class="community-events-footer">
				<a href="https://wphippos.com/" target="_blank">WP Hippos Website <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>
				|
				<a href="#" target="_blank" style="color: #069e08; font-weight:bold">Get More 404 Pages</span> <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>				
				
				<a class="pull-right" href="https://wphippos.com/plugins/" target="_blank">Documentation</span> <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>				
		</p>
	</div>

	 		
 
<?php wp_nonce_field( 'tpl_create_action', 'tpl_create_nonce'  ); ?>

<input name="tpl" type="hidden" value="<?php if( isset($_GET['tpl']) ){ echo esc_attr( $_GET['tpl'] ); } ?>">

	<div>
		<div class="inside">
		<h3><?php _e('Default Templates', '404-page-editor'); ?></h3>
		<p><?php _e('Feel free to use any of our templates and change the default text as you please. Remember to <strong>Save New 404</strong>.', '404-page-editor'); ?></p>		
	            <div> 

				
<!-- DEFAULT TEMPLATES -->
				  <p class="help-block">
				  <p></p>
				  <p><strong>Click to load the 404 page for each default WordPress theme:</strong></p>

						<?php $selected_tpl = sanitize_text_field( get_option( 'wpe_last_template') );   ?>
 
						<a class="<?php  if( $selected_tpl == '2016' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="2016" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=2016') ?>">2016</a> 
						<a class="<?php  if( $selected_tpl == '2017' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="2017" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=2017') ?>">2017</a> 
						<a class="<?php  if( $selected_tpl == '2019' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="2019" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=2019') ?>">2019</a> 
						<a class="<?php  if( $selected_tpl == '2020' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="2020" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=2020') ?>">2020</a> 				
						<a class="<?php  if( $selected_tpl == '2021' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="2021" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=2021') ?>">2021</a> 				
						<br/><br/>	

						<h3><?php _e('Seasonal Templates', '404-page-editor'); ?></h3>
						<p><?php _e('Click to load the Seasonal 404 page of your choice.', '404-page-editor'); ?></p>		

						<a class="<?php  if( $selected_tpl == 'santa' ){ echo ' button-primary '; }else{ echo ' button-secondary '; } ?> tpl_picker" data-tpl="santa" href="<?php echo admin_url('options-general.php?page=w404_config&tpl=santa') ?>"><img src="<?php echo plugins_url('inc/assets/img/seasonal/santa.jpg', __FILE__); ?>" /></a> 				

						<input type="hidden" id="selected_template" name="selected_template" value="<?php echo $selected_tpl; ?>" />														
						<p>&nbsp;</p>  

						<hr>

<!-- CHANGE TEMPLATE TEXT -->
						<h3>Change The Text</h3>
						<p><?php _e('Change the text of any selected template or leave as is, to use default.', 'wcc'); ?></p>
								<input class="input-file" style="min-width: 340px;" name="custom_title_tag" type="text" placeholder="<?php _e('New 404 Title Text', 'wcc'); ?>"> <span class="text-dimmed">That is the big text</span> <br/> <br/>
								<input class="input-file" style="min-width: 340px;" name="custom_description_tag" type="text" placeholder="<?php _e('New 404 Description Text', 'wcc'); ?>"> <span class="text-dimmed">That is the smaller text</span> <br/> <br/>						
						<br/>
<!-- END CHANGE TEMPLATE TEXT -->

						<hr>

	            </div>
	            <div>&nbsp;</div>
	            <div><p><button type="submit" class="button-primary">Save New 404</button> <a class="button" href="/404-19169434-broken-link" type="button" target="_blank">View Current 404</a></p></div>           			  
		</div>
	</div>	  
</form>
</div>

<?php 
}
?>
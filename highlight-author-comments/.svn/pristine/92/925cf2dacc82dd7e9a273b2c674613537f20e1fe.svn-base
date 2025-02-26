<?php

/*
	Admin Stuff for Highlight Author Comments Version: 1.0.2
*/ 

function hac_option_menu() {
	if (function_exists('current_user_can')) {
		if (!current_user_can('manage_options')) return;
	} else {
		global $user_level;
		get_currentuserinfo();
		if ($user_level < 8) return;
	}
	if (function_exists('add_options_page')) {
		add_options_page(__('Highlight Comments'), __('Highlight Comments'), 1, __FILE__, 'hac_options_page');
	}
}

// Install the options page
add_action('admin_menu', 'hac_option_menu');

function hac_options_page(){
	global $wpdb;
	if (isset($_POST['update_options'])) {
		check_admin_referer('highlight-author-comments-update-options'); 
		$options['highlight_style'] = trim($_POST['highlight_style'],'{}');
		$options['highlight_author_style'] = trim($_POST['highlight_author_style'],'{}');
		update_option('hac_highlight_author_comments', $options);
		// Show a message to say we've done something
		echo '<div class="updated fade"><p>' . __('Options saved') . '</p></div>';
	} else {
		// If we are just displaying the page we first load up the options array
		$options = get_option('hac_highlight_author_comments');
	}
	//now we drop into html to display the option page form
	?>
		<div class="wrap">
		<h2><?php echo __('Highlight Author Comments Options'); ?></h2>
		<form method="post" action="">
		<fieldset class="options">
		<legend>CSS Styles for Author Comments</legend>
		<table class="optiontable form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Style the comment body:') ?></th>
				<td><textarea name="highlight_style" id="highlight_style" rows="4" cols="38"><?php echo $options['highlight_style']; ?></textarea></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Style the author link:') ?></th>
				<td><textarea name="highlight_author_style" id="highlight_author_style" rows="4" cols="38"><?php echo $options['highlight_author_style']; ?></textarea></td>
			</tr>
		</table>
		</fieldset>
		<div class="submit"><input type="submit" name="update_options" value="<?php _e('Update') ?>" /></div>
		<?php if (function_exists('wp_nonce_field')) wp_nonce_field('highlight-author-comments-update-options'); ?>
		</form>    		
	</div>
	<?php	
}

function hac_install() {
	// check each of the option values and, if empty, assign a default (doing it this long way
	// lets us add new options in later versions)
	$options = get_option('hac_highlight_author_comments');
	if (!isset($options['highlight_style'])) $options['highlight_style'] = 'padding: 1em';
	if (!isset($options['highlight_author_style'])) $options['highlight_author_style'] = 'font-weight: bold';
	update_option('hac_highlight_author_comments', $options);
}

add_action('activate_'.str_replace('-admin', '', plugin_basename(__FILE__)), 'hac_install');

?>
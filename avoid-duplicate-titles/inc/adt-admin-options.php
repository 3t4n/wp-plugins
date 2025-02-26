<?php
 
/*
*
* @package    AvoidDuplicateTitles
*
*/
 
if(!defined('ABSPATH')) {
	exit;
}

// Add submenu page under Tools
function wpadt_menu() {
	global $starter_plugin_admin_page;
	$title = sanitize_text_field(esc_attr_x('Avoid Duplicate Titles','avoid-duplicate-titles'));
	
	$starter_plugin_admin_page = add_submenu_page ('options-general.php', $title, $title, 'manage_options', 'AvoidDuplicates', 'wpadt_main_function');

	add_action( 'admin_init', 'wpadt_update_avoid_duplicate_settings' );
}
if( !function_exists("wpadt_update_avoid_duplicate_settings") ) {

		function wpadt_update_avoid_duplicate_settings() {
			register_setting( 'check-individual', 'wpadt_check_individual_types' );
			register_setting( 'check-individual', 'wpadt_allow_duplicate_titles' );
    		register_setting( 'check-individual', 'wpadt_selected_post_types' );
			
}
}
add_action('admin_menu', 'wpadt_menu');

	// Create available post types array.
function wpadt_selectable_post_types() {
	$post_types = get_post_types( array( 'public' => true ), 'name' );
	foreach ( $post_types as $type => $obj ) {
			$return[$type] = $obj;
	}
	return $return;
}

// Function for saving the selected post types
function wpadt_return_post_types() {
    $option = get_option( 'wpadt_selected_post_types', 'default' );
	if ( !isset($option) ){
		$option=array('post' => 'default');
	}
    if ( $option === 'default' ) {
        $option = array( 'post' );
        add_option( 'wpadt_selected_post_types', $option );
    } elseif ( $option === '' ) {
        // For people who want the plugin on, but doing nothing
        $option = array();
    }
    return apply_filters( 'wpadt_selected_post_types', $option );
}

	
// Main function that generates the admin page
function wpadt_main_function () {
	
// check that the user has the required capability 
	if (!current_user_can('manage_options'))
	{
	  wp_die( sanitize_text_field(esc_attr_e('You do not have sufficient privileges to access this page. Sorry!','avoid-duplicate-titles') ) );
	}	

	// MAIN AMDIN CONTENT SECTION	

	// display settings page entries
	?>
   <form method="post" action="options.php">
	<?php settings_fields( 'check-individual' ); ?>
	<?php do_settings_sections( 'check-individual' ); ?>
	<table class="form-table">
	  <tr valign="top">
		<td>
		  <h2><?php sanitize_text_field(esc_attr_e('Avoid Duplicate Titles', 'avoid-duplicate-titles')) ?></h2><br>
		  <p><strong><?php sanitize_text_field(esc_attr_e('Avoid Duplicate Titles', 'avoid-duplicate-titles')) ?></strong><?php sanitize_text_field(esc_attr_e(' is able to help you avoid duplicate titles across all types of posts including custom posts.', 'avoid-duplicate-titles')) ?></p>
		</td>
	  </tr>
		<td>
		  <?php sanitize_text_field(esc_attr_e(' You can choose to check for duplicate titles across all selected post types or to test them individually.', 'avoid-duplicate-titles')) ?></p>
		  <p><?php sanitize_text_field(esc_attr_e('You may wish to enforce uniqueness within each individual post type, so for example a gallery (if you have one loaded) can have the same title as a post.', 'avoid-duplicate-titles')) ?></p>
		  <select name="wpadt_check_individual_types">
			<option value="Check-All" <?php echo esc_attr( get_option('wpadt_check_individual_types') ) == 'Check-All' ? 'selected="selected"' : ''; ?>><?php sanitize_text_field(esc_attr_e('Check All Post Types', 'avoid-duplicate-titles')) ?></option>
			<option value="Check-Individual" <?php echo esc_attr( get_option('wpadt_check_individual_types') ) == 'Check-Individual' ? 'selected="selected"' : ''; ?>><?php sanitize_text_field( esc_attr_e('Check Individual Post Types', 'avoid-duplicate-titles')) ?></option>
		  </select>
		</td>
	  </tr>
	  <tr>
		<td><p><?php sanitize_text_field(esc_attr_e( 'You can specify the post types to check for duplicate titles.', 'avoid-duplicate-titles' )); ?></p>
				<?php $option = wpadt_return_post_types();
				$post_types = wpadt_selectable_post_types();
				foreach ( $post_types as $type => $obj ) {
					if ( in_array( $type, $option ) ) {
						echo '<input type="checkbox" name="wpadt_selected_post_types[]" value="'.esc_attr(sanitize_text_field($type)).'" checked="checked">'.esc_attr(sanitize_text_field($obj->label)).'<br>';
					} else {
						echo '<input type="checkbox" name="wpadt_selected_post_types[]" value="'.esc_attr(sanitize_text_field($type)).'">'.esc_attr(sanitize_text_field($obj->label)).'<br>';
					}
				} ?>			
		 </td>
        </tr>
	  <tr>
		<td>
		  <p><?php sanitize_text_field(esc_attr_e('You can also choose to enforce uniqueness by not allowing posts with duplicate titles to be published, instead they will be saved as draft until the title is changed.', 'avoid-duplicate-titles')) ?></p>
		  <select name="wpadt_allow_duplicate_titles">
			<option value="Prevent-Duplicates" <?php echo esc_attr( get_option('wpadt_allow_duplicate_titles') ) == 'Prevent-Duplicates' ? 'selected="selected"' : ''; ?>><?php sanitize_text_field(esc_attr_e('Prevent Duplicate Titles', 'avoid-duplicate-titles')) ?></option>
			<option value="Publish-Duplicates" <?php echo esc_attr( get_option('wpadt_allow_duplicate_titles') ) == 'Publish-Duplicates' ? 'selected="selected"' : ''; ?>><?php sanitize_text_field(esc_attr_e('Publish Duplicate Titles', 'avoid-duplicate-titles')) ?></option>
		  </select>
		</td>
	  </tr>
	  <tr>
	    <td>
  		 <?php echo "  "; submit_button(); ?>
		</td>
	  </tr>
	 </table>
  </form>
<?php

}

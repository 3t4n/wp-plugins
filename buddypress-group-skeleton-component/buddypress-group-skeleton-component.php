<?php

/* Custom Group Extension for Buddypress   */

/* Add the form and save the meta - $gscomponent_custom_group_field */

add_filter( 'groups_custom_group_fields_editable', 'gscomponent_custom_group_field' ); // This adds the form to the group admin details page and the first page of the group creation steps.
add_action( 'groups_group_details_edited', 'gscomponent_custom_group_field_save' ); // This saves the meta when editing the meta on the group edit details page.
add_action( 'groups_created_group',  'gscomponent_custom_group_field_save' ); // This save the meta durring the group creation process.

/* Retrieve the meta specific to each group - $get_gscomponent_field_1 fetches the meta_value in the gscomponent-field-1 meta_key attached to the group in question
*/
function get_gscomponent_field_1() {
	global $bp, $wpdb;
	$field_1_meta = groups_get_groupmeta( $bp->groups->current_group->id, 'gscomponent-field-1' );
	return $field_1_meta;
}

/* Create the form to save the meta for the group

For the forms 'value' we echo $get_gscomponent_field_1, this is done so that when the group has existing data in the field..
*/
function gscomponent_custom_group_field() {
global $bp, $wpdb;

 ?>
	<label for="group-field-1">Field Title* <i>editable</i></label>
	<input type="text" name="group-field-1" id="group-field-1" value="<?php echo get_gscomponent_field_1(); ?>" />
    <?php

}

// Show the group meta in group header
function gscomponent_custom_group_field_show( $gscomponent_field_meta ) {

		 echo '<br /><div class="gscomponent">'. get_gscomponent_field_1() .'</div>';
}
	
add_filter( 'bp_before_group_header_meta', 'gscomponent_custom_group_field_show' );

// save the group meta to the db
function gscomponent_custom_group_field_save( $group_id ) {
	global $bp, $wpdb;

	$plain_fields = array(
		'field-1'
/* 		'field-2'     */
/* 		'field-3'     */
	);
	foreach( $plain_fields as $field ) {
		$key = 'group-' . $field;
		if ( isset( $_POST[$key] ) ) {
			$value = $_POST[$key];
			groups_update_groupmeta( $group_id, 'gscomponent-' . $field, $value );
		}
	}
}

/*
Include our custom css rules - $bp_gscomponent_insert_wp_head tells Wordpress to locate our custom style sheet and load it in the header ( specifically the <head> tag ).
If you look at line .., we are echo'ing <div class="gscomponent"> within $gscomponent_custom_group_field_show.
*/

function bp_gscomponent_insert_css() {
?>
<link href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/buddypress-group-skeleton-component/includes/style.css" media="screen" rel="stylesheet" type="text/css"/>
<?php	
}
add_action('wp_head', 'bp_gscomponent_insert_css');

?>
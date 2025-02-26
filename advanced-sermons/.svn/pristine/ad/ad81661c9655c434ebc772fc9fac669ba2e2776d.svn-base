<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Add the speaker detail fields to the add new speaker page
function asp_speaker_details_add_new_meta() { ?>

    <div class="form-field">
        <label for="asp_speaker_meta[speaker_position]"><?php _e( 'Position', 'advanced-sermons' ); ?></label>
        <input type="text" placeholder="Example: Pastor" name="asp_speaker_meta[speaker_position]" id="asp_speaker_meta[speaker_position]" value="">
    </div>
    <div class="form-field">
        <label for="asp_speaker_meta[speaker_phone]"><?php _e( 'Phone', 'advanced-sermons' ); ?></label>
        <input type="text" name="asp_speaker_meta[speaker_phone]" id="asp_speaker_meta[speaker_phone]" value="">
    </div>
    <div class="form-field">
      	<label for="asp_speaker_meta[speaker_email]"><?php _e( 'Email', 'advanced-sermons' ); ?></label>
      	<input type="text" name="asp_speaker_meta[speaker_email]" id="asp_speaker_meta[speaker_email]" value="">
    </div>
    <div class="form-field">
        <label for="asp_speaker_meta[speaker_facebook]"><?php _e( 'Facebook', 'advanced-sermons' ); ?></label>
        <input type="text" placeholder="Facebook profile URL" name="asp_speaker_meta[speaker_facebook]" id="asp_speaker_meta[speaker_facebook]" value="">
    </div>
    <div class="form-field">
        <label for="asp_speaker_meta[speaker_linkedin]"><?php _e( 'LinkedIn', 'advanced-sermons' ); ?></label>
        <input type="text" placeholder="LinkedIn profile URL" name="asp_speaker_meta[speaker_linkedin]" id="asp_speaker_meta[speaker_linkedin]" value="">
    </div>
    <div class="form-field">
        <label for="asp_speaker_meta[speaker_twitter]"><?php _e( 'Twitter', 'advanced-sermons' ); ?></label>
        <input type="text" placeholder="Twitter profile URL" name="asp_speaker_meta[speaker_twitter]" id="asp_speaker_meta[speaker_twitter]" value="">
    </div>
    <div class="form-field" style="padding-bottom: 8px;">
        <label for="asp_speaker_meta[speaker_youtube]"><?php _e( 'YouTube', 'advanced-sermons' ); ?></label>
        <input type="text" placeholder="YouTube profile URL" name="asp_speaker_meta[speaker_youtube]" id="asp_speaker_meta[speaker_youtube]" value="">
    </div>


<?php }
add_action( 'sermon_speaker_add_form_fields', 'asp_speaker_details_add_new_meta', 1, 2 );


// Add the speaker detail fields to the edit speaker page
function asp_speaker_details_edit_meta( $term ) {

		// Put the term ID into a variable
		$asp_speaker_id = $term->term_id;

		// Retrieve the existing value(s) for this meta field. This returns an array
		$asp_speaker_meta = get_option( "taxonomy_$asp_speaker_id" );

    ?>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="asp_speaker_meta[speaker_position]"><?php _e( 'Position', 'advanced-sermons' ); ?></label></th>
        <td>
            <input type="text" name="asp_speaker_meta[speaker_position]" id="asp_speaker_meta[speaker_position]" value="<?php if ( !empty($asp_speaker_meta['speaker_position'])) { echo esc_attr( $asp_speaker_meta['speaker_position'] ) ? esc_attr( $asp_speaker_meta['speaker_position'] ) : '' ; } ?>">
        </td>
    </tr>

    <tr class="form-field">
		<th scope="row" valign="top"><label for="asp_speaker_meta[speaker_phone]"><?php _e( 'Phone', 'advanced-sermons' ); ?></label></th>
  			<td>
    				<input type="text" name="asp_speaker_meta[speaker_phone]" id="asp_speaker_meta[speaker_phone]" value="<?php if ( !empty($asp_speaker_meta['speaker_phone'])) { echo esc_attr( $asp_speaker_meta['speaker_phone'] ) ? esc_attr( $asp_speaker_meta['speaker_phone'] ) : '' ; } ?>">
  			</td>
		</tr>

		<tr class="form-field">
		<th scope="row" valign="top"><label for="asp_speaker_meta[speaker_email]"><?php _e( 'Email', 'advanced-sermons' ); ?></label></th>
  			<td>
    				<input type="text" name="asp_speaker_meta[speaker_email]" id="asp_speaker_meta[speaker_email]" value="<?php if ( !empty($asp_speaker_meta['speaker_email'])) { echo esc_attr( $asp_speaker_meta['speaker_email'] ) ? esc_attr( $asp_speaker_meta['speaker_email'] ) : '' ; } ?>">
  			</td>
		</tr>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="asp_speaker_meta[speaker_facebook]"><?php _e( 'Facebook', 'advanced-sermons' ); ?></label></th>
        <td>
            <input type="text" placeholder="Facebook profile URL" name="asp_speaker_meta[speaker_facebook]" id="asp_speaker_meta[speaker_facebook]" value="<?php if ( !empty($asp_speaker_meta['speaker_facebook'])) { echo esc_attr( $asp_speaker_meta['speaker_facebook'] ) ? esc_attr( $asp_speaker_meta['speaker_facebook'] ) : '' ; } ?>">
        </td>
    </tr>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="asp_speaker_meta[speaker_linkedin]"><?php _e( 'LinkedIn', 'advanced-sermons' ); ?></label></th>
        <td>
            <input type="text" placeholder="LinkedIn profile URL" name="asp_speaker_meta[speaker_linkedin]" id="asp_speaker_meta[speaker_linkedin]" value="<?php if ( !empty($asp_speaker_meta['speaker_linkedin'])) { echo esc_attr( $asp_speaker_meta['speaker_linkedin'] ) ? esc_attr( $asp_speaker_meta['speaker_linkedin'] ) : '' ; } ?>">
        </td>
    </tr>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="asp_speaker_meta[speaker_twitter]"><?php _e( 'Twitter', 'advanced-sermons' ); ?></label></th>
        <td>
            <input type="text" placeholder="Twitter profile URL" name="asp_speaker_meta[speaker_twitter]" id="asp_speaker_meta[speaker_twitter]" value="<?php if ( !empty($asp_speaker_meta['speaker_twitter'])) { echo esc_attr( $asp_speaker_meta['speaker_twitter'] ) ? esc_attr( $asp_speaker_meta['speaker_twitter'] ) : '' ; } ?>">
        </td>
    </tr>

    <tr class="form-field">
    <th scope="row" valign="top"><label for="asp_speaker_meta[speaker_youtube]"><?php _e( 'YouTube', 'advanced-sermons' ); ?></label></th>
        <td>
            <input type="text" placeholder="YouTube profile URL" name="asp_speaker_meta[speaker_youtube]" id="asp_speaker_meta[speaker_youtube]" value="<?php if ( !empty($asp_speaker_meta['speaker_youtube'])) { echo esc_attr( $asp_speaker_meta['speaker_youtube'] ) ? esc_attr( $asp_speaker_meta['speaker_youtube'] ) : '' ; } ?>">
        </td>
    </tr>


<?php }
add_action( 'sermon_speaker_edit_form_fields', 'asp_speaker_details_edit_meta', 1, 2 );


// Save extra taxonomy fields callback function
function asp_speaker_details_save_meta( $term_id ) {
    if ( isset( $_POST['asp_speaker_meta'] ) ) {
      	$asp_speaker_id = $term_id;
      	$asp_speaker_meta = get_option( "taxonomy_$asp_speaker_id" );
      	$cat_keys = array_keys( $_POST['asp_speaker_meta'] );
          	foreach ( $cat_keys as $key ) {
            		if ( isset ( $_POST['asp_speaker_meta'][$key] ) ) {
            			$asp_speaker_meta[$key] = $_POST['asp_speaker_meta'][$key];
            		}
          	}
  	// Save the option array.
  	update_option( "taxonomy_$asp_speaker_id", $asp_speaker_meta );
    }
}
add_action( 'edited_sermon_speaker', 'asp_speaker_details_save_meta', 10, 2 );
add_action( 'create_sermon_speaker', 'asp_speaker_details_save_meta', 10, 2 );


// Add speaker details to taxamony columns
add_filter( 'manage_edit-sermon_speaker_columns', 'asp_taxonomy_columns_speaker_details', 1);
add_filter( 'manage_sermon_speaker_custom_column', 'asp_taxonomy_columns_speaker_details_manage', 1, 3);

function asp_taxonomy_columns_speaker_details( $columns ) {
    $columns['speaker-position'] = 'Position';
    return $columns;
}
function asp_taxonomy_columns_speaker_details_manage( $out ,$column_name, $term_id ) {
	global $wp_version;
	$asp_speaker_id = $term_id;
	$asp_speaker_meta = get_option( "taxonomy_$asp_speaker_id" );
    if ( $column_name == 'speaker-position' && !empty($asp_speaker_meta) ) {
		    $asp_speaker_postion = $asp_speaker_meta['speaker_position'];
        if( ( ( float )$wp_version )<3.1 )
            return $asp_speaker_postion;
        else
            echo "$asp_speaker_postion";
    }
}


// Make speaker detail columns sortable
function asp_register_speaker_details_column_for_issues_sortable( $columns ) {
  $columns['speaker-position'] = 'Position';
		return $columns;
}
add_filter('manage_edit-sermon_speaker_sortable_columns', 'asp_register_speaker_details_column_for_issues_sortable');


// Change order of speaker details admin column
function asp_speaker_admin_column_order ($defaults ) {
    $new = array();
    $tags = isset( $defaults['tags'] ) ? $defaults['tags'] : '';
    unset($defaults['tags']);
    foreach($defaults as $key=>$value) {
        if($key=='slug') {
           $new['speaker-position'] = $tags;
        }
        $new[$key]=$value;
    }
    return $new;
}
add_filter('manage_edit-sermon_speaker_columns', 'asp_speaker_admin_column_order');


// Remove sermon series description from admin column
add_filter('manage_edit-sermon_speaker_columns', 'asp_speaker_admin_column_remove_description');
function asp_speaker_admin_column_remove_description ( $columns ) {
    if( isset( $columns['description'] ) )
        unset( $columns['description'] );
    return $columns;
}

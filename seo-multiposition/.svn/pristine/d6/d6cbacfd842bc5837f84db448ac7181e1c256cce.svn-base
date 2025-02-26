<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Calls the class on the post edit screen.
 */
function call_HeaderClass() {
	new HeaderClass();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'call_HeaderClass' );
	add_action( 'load-post-new.php', 'call_HeaderClass' );
}

/**
 * The Class.
 */


class HeaderClass {

    public $sliders = array();
	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
		$post_types = array('page');     //limit meta box to certain post types
		if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'some_meta_box_name'
				,__( 'Duplicate Page For Seo Options', 'header_textdomain' )
				,array( $this, 'render_meta_box_content' )
				,'page'
				,'side'
			);
		}
	}


	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['header_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['header_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'header_inner_custom_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
		//     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		/* Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {
			if ( current_user_can( 'edit_page', $post_id ) )
				return $post_id;
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}*/

		/* OK, its safe for us to save the data now. */

		// Sanitize the user input.
		$duplicate = sanitize_text_field( $_POST['duplicate'] );
		$nation = sanitize_text_field( $_POST['nation']);
		if( !wp_is_post_revision($post_id)){
			if( $duplicate == '1' ) {
				rs_insert_duplicate_page_form($nation);
			}
		}
		// Update the meta field.
		update_post_meta( $post_id, '_duplicate', $duplicate );
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {

		$plugin_dir = ABSPATH . 'wp-content/plugins/seo-multiposition/';

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'header_inner_custom_box', 'header_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value_duplicate = get_post_meta( $post->ID, '_duplicate', true );
		$enfold = "";
		//$value_enfolde = get_post_meta( $post->ID, '_enfold', true );

		if($value_duplicate == '1'){
			$checked_yes = 'selected';
			$checked_no = '';
		}else{
			$checked_yes = '';
			$checked_no = 'selected';
		}

		/*if($value_enfolde == '1'){
			$checked1_yes = 'selected';
			$checked1_no = '';
		}else{
			$checked1_yes = '';
			$checked1_no = 'selected';
		}*/

		// Display the form, using the current value.
		echo '<script type="text/javascript">';

			echo 'jQuery(document).ready(
				function(){
					jQuery("#duplicate").change(function() {
  						if( jQuery("#duplicate").val() == "1" ){
  							jQuery("#yoast_wpseo_meta-robots-noindex").val("1");
							jQuery("#xmlsf_exclude").prop("checked", true);
  						}else{
  							jQuery("#yoast_wpseo_meta-robots-noindex").val("0");
							jQuery("#xmlsf_exclude").prop("checked", false);
  						}
					});
				}
			);';

		echo '</script>';

  	echo '<div>';
    	echo '<p>';
      	echo '<label for="duplicate">';
      	    if($value_duplicate)
            {
                echo 'Update duplicated pages ?';
            }
            else
            {
	            echo 'Duplicate this page ?';
            }
        echo '</label> ';
      echo '</p>';

      echo '<select name="duplicate" id="duplicate">
            	<option value="1" '.$checked_yes.'>yes</option>
              <option value="0" '.$checked_no.'>no</option>
            </select> <br/>';

			echo '<p>';
				echo '<label for="nation">';
					_e( 'Choose The Nation.', 'header_textdomain' );
				echo '</label>';
			echo '</p>';

			echo '<select name="nation" id="nation" >';
				foreach(glob(dirname(dirname(dirname(__FILE__))) . '/core/nations/*.php') as $filename)
				{
					echo '<option value="' . basename($filename,'.php') . '">' . __(basename($filename,'.php')) . '</option>';
				}
			echo '</select>';

			echo '<p>';
				echo '<label for="duplicate">';
					_e( ' You are using enfold theme??', 'header_textdomain' );
				echo '</label> ';
			echo '</p>';

			echo '<select name="enfold" id="enfold">
            	<option value="1" '.$enfold.'>yes</option>
              <option selected value="0" '.$enfold.'>no</option>
            </select> <br/> <br/>';

			echo '<a target="_blank" href="https://wp-love.it/apri-ticket-singolo/"> <img style="width: 100%;" src="'.WPDP_PLUGIN_PATH.'/images/plugin-FAQ.jpg" /> </a>';

    echo '</div>';

	}
}

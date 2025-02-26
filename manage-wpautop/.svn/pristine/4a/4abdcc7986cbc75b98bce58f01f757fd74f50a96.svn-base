<?php
/**
 Plugin Name: Manage WPAutoP
 Description: Manage WPAutoP lets you enable or disable WPAutoP for your specific post, page and custom post types.
 Author: webbuilders03
 Version: 1.0
 Author URI: webbuilders03@gmail.com
 License: GPLv2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: manage-wpautop
 */

namespace WBAUTOP;
class WB_Autop{
	/**
	 * WBAUTOP Constructor.
	 */
	function __construct(){
		add_action( 'add_meta_boxes', array($this, 'add_metabox') );
		add_action( 'save_post', array($this, 'save_wpautop_meta_value') );
		add_action( 'the_post', array($this, 'the_post_object') );
	}

	/**
	 * Register Metabox
	 *
	 *@param $post_type
	 */
	public function add_metabox( $post_type ){

		$assigned_post_types = array();
		$all_post_types = $this->list_post_types();
		foreach( $all_post_types as $key ){
			$assigned_post_types[] = $key['slug'];
		}

	    add_meta_box( 
	        'wb_manage_autop_box',
	        esc_html__( 'Manage WPAUTOP' ),
	        array($this, 'render_wpautop_box'),
	        $assigned_post_types,
	        'normal',
	        'default'
	    );
	}

	/**
	 * Metabox Callback
	 *
	 *@param $post post object
	 */	
	public function render_wpautop_box( $post ){
		wp_nonce_field( 'wb_autop_check', 'wb_autop_check_nonce');
		$check_value = get_post_meta( $post->ID, 'wb_autop_manage_field', true);
	?>
		<p><input type="checkbox" value="on" id="remove_wpautop" name="remove_wpautop" <?php checked( $check_value, 'on' ); ?> /><label for="remove_wpautop">Remove WPAUTOP</label></p>
	<?php
	}

	/**
	 * Save Metavalue
	 *
	 *@param $post_id id for the post
	 */	
	public function save_wpautop_meta_value( $post_id ){
		
		if( !isset( $_POST['wb_autop_check_nonce'] ) ){
			return;
		}

		$nonce = $_POST['wb_autop_check_nonce'];

		if( !wp_verify_nonce($nonce, 'wb_autop_check') ){
			return;	
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }

        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }
        
        if( isset( $_POST['remove_wpautop'] ) ){
			$remove_autop =  sanitize_key($_POST['remove_wpautop']);
			if( $remove_autop == 'on' ){
        		update_post_meta( $post_id, 'wb_autop_manage_field', $remove_autop );
        	}
    	}else{
    		update_post_meta( $post_id, 'wb_autop_manage_field', '' );
    	}
	}

	/**
	 * Get all post types
	 */	
	protected function list_post_types(){
		$args = array(
					'public'   => true,
       				'_builtin' => false
				);
		$all_post_types = array(
						array(
							'name' => 'Posts',
							'slug' => 'post'
						),
						array(
							'name' => 'Pages',
							'slug' => 'page'
						),
					);
		$get_post_types = get_post_types($args, 'object', 'and');
		foreach ($get_post_types as $key ) {
			//print_r($value);
			$all_post_types[] = array(
								'name' => $key->labels->singular_name,
								'slug' => $key->name
							);
		}
		return $all_post_types;
	}

	/**
	 * remove autop from content or excerpt
	 *
	 *@param $post post object
	 */	
	function the_post_object( $post ){
		$autop_meta = get_post_meta( $post->ID, 'wb_autop_manage_field', true );
		if( $autop_meta == 'on' ){
			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_excerpt', 'wpautop' );
		}else{
			if ( !has_filter( 'the_content', 'wpautop' ) ) {
               add_filter( 'the_content', 'wpautop' );
            }

            if ( !has_filter( 'the_excerpt', 'wpautop' ) ) {
                add_filter( 'the_excerpt', 'wpautop' );
            }
		}
	}

}

new WB_Autop();



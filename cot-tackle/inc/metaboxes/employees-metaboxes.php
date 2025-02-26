<?php
/* 
 * Metabox for the employees custom post type
 * @package     Cot Tackle
 * Author:      iam00
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists('cot_tackle_employees_metabox')) {
	function cot_tackle_employees_metabox() {
	    new Cot_Tackle_Employees_Metabox();
	}
}
if ( is_admin() ) {
    add_action( 'load-post.php', 'cot_tackle_employees_metabox' );
    add_action( 'load-post-new.php', 'cot_tackle_employees_metabox' );
}

class Cot_Tackle_Employees_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'ct_employees_metabox'
			,__( 'Employees info', 'cot-tackle' )
			,array( $this, 'render_meta_box_content' )
			,'employees'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['cot_tackle_employees_nonce'] ) )
			return $post_id;

		$nonce = $_POST['cot_tackle_employees_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'cot_tackle_employees' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'employees' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$position 	= isset( $_POST['cot_tackle_employees_position'] ) ? esc_attr($_POST['cot_tackle_employees_position']) : false;
		$facebook = isset( $_POST['cot_tackle_employees_facebook'] ) ? esc_url_raw($_POST['cot_tackle_employees_facebook']) : false;

		$twitter = isset( $_POST['cot_tackle_employees_twitter'] ) ? esc_url_raw($_POST['cot_tackle_employees_twitter']) : false;
		$google = isset( $_POST['cot_tackle_employees_google'] ) ? esc_url_raw($_POST['cot_tackle_employees_google']) : false;
		
		$github = isset( $_POST['cot_tackle_employees_github'] ) ? esc_url_raw($_POST['cot_tackle_employees_github']) : false;
		
		$mail = isset( $_POST['cot_tackle_employees_mail'] ) ? sanitize_email($_POST['cot_tackle_employees_mail']) : false;
		
		$other = isset( $_POST['cot_tackle_employees_other'] ) ? esc_url_raw($_POST['cot_tackle_employees_other']) : false;
		
		update_post_meta( $post_id, 'wpcf-employees-position', $position );
		update_post_meta( $post_id, 'wpcf-employees-facebook', $facebook );
		update_post_meta( $post_id, 'wpcf-employees-twitter', $twitter );
		update_post_meta( $post_id, 'wpcf-employees-google', $google );
		update_post_meta( $post_id, 'wpcf-employees-github', $github );
		update_post_meta( $post_id, 'wpcf-employees-mail', $mail );
		update_post_meta( $post_id, 'wpcf-employees-other', $other );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'cot_tackle_employees', 'cot_tackle_employees_nonce' );

		$position = get_post_meta( $post->ID, 'wpcf-employees-position', true );
		$facebook = get_post_meta( $post->ID, 'wpcf-employees-facebook', true );
		$twitter = get_post_meta( $post->ID, 'wpcf-employees-twitter', true );
		$google = get_post_meta( $post->ID, 'wpcf-employees-google', true );
		$github = get_post_meta( $post->ID, 'wpcf-employees-github', true );
		$mail = get_post_meta( $post->ID, 'wpcf-employees-mail', true );
		$other = get_post_meta( $post->ID, 'wpcf-employees-other', true );

	?>
		<p><strong><label for="cot_tackle_employees_position"><?php _e( 'Employee position', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_position" name="cot_tackle_employees_position" value="<?php echo esc_attr($position); ?>"></p>
		<p><strong><label for="cot_tackle_employees_facebook"><?php _e( 'Employee facebook', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_facebook" name="cot_tackle_employees_facebook" value="<?php echo esc_url($facebook); ?>"></p>
		<p><strong><label for="cot_tackle_employees_twitter"><?php _e( 'Employee twitter', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_twitter" name="cot_tackle_employees_twitter" value="<?php echo esc_url($twitter); ?>"></p>
		<p><strong><label for="cot_tackle_employees_google"><?php _e( 'Employee google plus', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_google" name="cot_tackle_employees_google" value="<?php echo esc_url($google); ?>"></p>
		<p><strong><label for="cot_tackle_employees_github"><?php _e( 'Employee github', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_github" name="cot_tackle_employees_github" value="<?php echo esc_url($github); ?>"></p>	
		<p><strong><label for="cot_tackle_employees_mail"><?php _e( 'Employee mail', 'cot-tackle' ); ?></label></strong></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_mail" name="cot_tackle_employees_mail" value="<?php echo sanitize_email($mail); ?>"></p>	
		<p><strong><label for="cot_tackle_employees_other"><?php _e( 'Employee Link', 'cot' ); ?></label></strong></p>
		<p><em><?php _e('Add a link here if you want the employee name to link somewhere.', 'cot'); ?></em></p>
		<p><input type="text" class="widefat" id="cot_tackle_employees_other" name="cot_tackle_employees_other" value="<?php echo esc_url($other); ?>"></p>	

	<?php
	}
}

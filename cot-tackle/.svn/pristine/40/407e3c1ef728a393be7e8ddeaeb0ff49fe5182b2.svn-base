<?php
/* 
 * Metabox for the Projects custom post type
 * @package     Cot Tackle
 * Author:      iam00
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists('cot_tackle_projects_metabox')) {
	function cot_tackle_projects_metabox() {
	    new Cot_Tackle_Projects_Metabox();
	}
}
if ( is_admin() ) {
    add_action( 'load-post.php', 'cot_tackle_projects_metabox' );
    add_action( 'load-post-new.php', 'cot_tackle_projects_metabox' );
}

class Cot_Tackle_Projects_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'ct_projects_metabox'
			,__( 'Project info', 'cot-tackle' )
			,array( $this, 'render_meta_box_content' )
			,'projects'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['cot_tackle_projects_nonce'] ) )
			return $post_id;

		$nonce = $_POST['cot_tackle_projects_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'cot_tackle_projects' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'projects' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$link 	= isset( $_POST['cot_tackle_projects_info'] ) ? esc_url_raw($_POST['cot_tackle_projects_info']) : false;
		update_post_meta( $post_id, 'wpcf-project-link', $link );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'cot_tackle_projects', 'cot_tackle_projects_nonce' );

		$link = get_post_meta( $post->ID, 'wpcf-project-link', true );

	?>
		<p><strong><label for="cot_tackle_projects_info"><?php _e( 'Project link', 'cot-tackle' ); ?></label></strong></p>
		<p><em><?php _e('Add an URL here to make this project link to another page (internal or external). Leave it empty and it will default to its own page.', 'cot-tackle'); ?></em></p>
		<p><input type="text" class="widefat" id="cot_tackle_projects_info" name="cot_tackle_projects_info" value="<?php echo esc_url($link); ?>"></p>	

	<?php
	}
}

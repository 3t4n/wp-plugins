<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/minhtuan2086/
 * @since      1.0.0
 *
 * @package    Yup_360_Product
 * @subpackage Yup_360_Product/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Yup_360_Product
 * @subpackage Yup_360_Product/admin
 * @author     MINH TUAN NGUYEN <minhtuan2086@gmail.com>
 */
class Yup_360_Product_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yup_360_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yup_360_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/yup-360-product-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Yup_360_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Yup_360_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/yup-360-product-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Taxonomy 360 view.
	 *
	 * @since    1.0.0
	 */

	public function register360View(){

				//add_meta_box( 'product_360_id', __('Product 360 View', 'textdomain' ),  $this->product_360_callback ,'product' ,'side','core');
				add_meta_box(
					 		'yup_render_view_meta_box_id',
					 		esc_html__( 'Product 360 View', 'text-domain' ),
					 		array( $this, 'yup_render_view_meta_box'),
					 		'product',
							'side',
							'core'
					 );
	}

	public function yup_render_view_meta_box() {


				global $post;
				echo '<strong>Check the box if you want to display product view in 360.</strong><br/><br/>';
		 		// Noncename needed to verify where the data originated
				echo '<input type="hidden" name="360viewmeta_noncename" id="360viewmeta_noncename" value="' .wp_create_nonce( '360view' ) . '" />';

				// Get the location data if its already been entered
				$prd360 					= get_post_meta($post->ID, '_enableView', true);
				$_totalFrames 		= get_post_meta($post->ID, '_totalFrames', true);
				$_endFrames 			= get_post_meta($post->ID, '_endFrames', true);
				$_currentFrames 	= get_post_meta($post->ID, '_currentFrames', true);
				$_filePrefix 			= get_post_meta($post->ID, '_filePrefix', true);
				$_fileExt 				= get_post_meta($post->ID, '_fileExt', true);
				$_heightFrame			= get_post_meta($post->ID, '_heightFrame', true);
				$_widthFrame			= get_post_meta($post->ID, '_widthFrame', true);
				$_navigationFrame	= get_post_meta($post->ID, '_navigationFrame', true);
				$_responsiveFrame	= get_post_meta($post->ID, '_responsiveFrame', true);


				// Echo out the field
				?>
				<input type="checkbox" name="_enableView" id="_enableView" value="yes" <?php if ( isset ( $prd360  ) ) checked( $prd360, 'yes' ); ?> /> Replace Product View with 360
				<br/>
				<p class="form-field">
					<label>Total Frames</label>
					<input type="text" class="widefat" name="_totalFrames" id="_totalFrames" value="<?php if ( isset ( $_totalFrames ) ) echo $_totalFrames; ?>" placeholder="32" />
				</p>
				<p class="form-field">
					<label>End Frame</label>
					<input type="text" name="_endFrames" id="_endFrames" value="<?php if ( isset ( $_endFrames ) ) echo $_endFrames; ?>" placeholder="32"  />
				</p>
				<p class="form-field">
					<label>Current Frame</label>
					<input type="text" name="_currentFrames" id="_currentFrames" value="<?php if ( isset ( $_currentFrames ) ) echo $_currentFrames; ?>" placeholder="1"  />
				</p>
				<p class="form-field">
					<label>File Prefix</label>
					<input type="text" name="_filePrefix" id="_filePrefix" value="<?php if ( isset ( $_filePrefix ) ) echo $_filePrefix; ?>" placeholder=""  />
    		</p>
				<p class="form-field">
					<label>Ext</label>
					<input type="text" name="_fileExt" id="_fileExt" value="<?php if ( isset ( $_fileExt ) ) echo $_fileExt; ?>" placeholder=".png"  />
				</p>
				<p class="form-field">
					<label>Height</label>
					<input type="text" name="_heightFrame" id="_heightFrame" value="<?php if ( isset ( $_heightFrame ) ) echo $_heightFrame; ?>" placeholder="1000"  />
				</p>
				<p class="form-field">
					<label>Width</label>
					<input type="text" name="_widthFrame" id="_widthFrame" value="<?php if ( isset ( $_widthFrame ) ) echo $_widthFrame; ?>" placeholder="1000"  />
				</p>

				<p class="form-field">
					<input type="checkbox" name="_navigationFrame" id="_navigationFrame" value="true" <?php if ( isset ( $_navigationFrame  ) ) checked( $_navigationFrame, 'true' ); ?>  /> Navigation
				</p>

				<p class="form-field">
					<input type="checkbox" name="_responsiveFrame" id="_responsiveFrame" value="true" <?php if ( isset ( $_responsiveFrame  ) ) checked( $_responsiveFrame, 'true' ); ?>  /> Responsive
				</p>


	<?php }

	public function yup_save_view_meta_box($post_id){
				// verify this came from the our screen and with proper authorization,
				// because save_post can be triggered at other times

				if(!isset($_POST['360viewmeta_noncename'])) return;

				if ( !wp_verify_nonce( $_POST['360viewmeta_noncename'], '360view' )) {
							return $post->ID;
				}

				// Is the user allowed to edit the post or page?
				if ( !current_user_can( 'edit_post', $post->ID ))
					return $post->ID;

				if( isset( $_POST[ '_enableView' ] ) ) {
					    update_post_meta( $post_id, '_enableView', 'yes' );
				} else {
					    update_post_meta( $post_id, '_enableView', '' );
				}

				// Checks for input and sanitizes/saves if needed
				if( isset( $_POST[ '_totalFrames' ] ) ) {
						 update_post_meta( $post_id, '_totalFrames', sanitize_text_field( $_POST[ '_totalFrames' ] ) );
				}else{
						 update_post_meta( $post_id, '_totalFrames', '32' );
				}


				if( isset( $_POST[ '_endFrames' ] ) ) {
						 update_post_meta( $post_id, '_endFrames', sanitize_text_field( $_POST[ '_endFrames' ] ) );
				}else{
						 update_post_meta( $post_id, '_endFrames', '32' );
				}

				if( isset( $_POST[ '_currentFrames' ] ) ) {
						 update_post_meta( $post_id, '_currentFrames', sanitize_text_field( $_POST[ '_currentFrames' ] ) );
				}else{
						 update_post_meta( $post_id, '_currentFrames', '1' );
				}

				if( isset( $_POST[ '_filePrefix' ] ) ) {
						 update_post_meta( $post_id, '_filePrefix', sanitize_text_field( $_POST[ '_filePrefix' ] ) );
				}else{
						 update_post_meta( $post_id, '_filePrefix', '' );
				}

				if( isset( $_POST[ '_fileExt' ] ) ) {
						 update_post_meta( $post_id, '_fileExt', sanitize_text_field( $_POST[ '_fileExt' ] ) );
				}else{
						 update_post_meta( $post_id, '_fileExt', '.png' );
				}

				if( isset( $_POST[ '_heightFrame' ] ) ) {
						 update_post_meta( $post_id, '_heightFrame', sanitize_text_field( $_POST[ '_heightFrame' ] ) );
				}else{
						 update_post_meta( $post_id, '_heightFrame', '1000' );
				}

				if( isset( $_POST[ '_widthFrame' ] ) ) {
						 update_post_meta( $post_id, '_widthFrame', sanitize_text_field( $_POST[ '_widthFrame' ] ) );
				}else{
						 update_post_meta( $post_id, '_widthFrame', '1000' );
				}

				if( isset( $_POST[ '_navigationFrame' ] ) ) {
							update_post_meta( $post_id, '_navigationFrame', 'true' );
				} else {
							update_post_meta( $post_id, '_navigationFrame', '' );
				}

				if( isset( $_POST[ '_responsiveFrame' ] ) ) {
							update_post_meta( $post_id, '_responsiveFrame', 'true' );
				} else {
							update_post_meta( $post_id, '_responsiveFrame', '' );
				}






	}


}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.aotomot.com
 * @since      1.0.0
 *
 * @package    Aotomot_Gallery
 * @subpackage Aotomot_Gallery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Aotomot_Gallery
 * @subpackage Aotomot_Gallery/public
 * @author     Aotomot Pty Ltd. <chandra.t@aotomot.com>
 */
class Aotomot_Gallery_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aotomot_Gallery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aotomot_Gallery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style('google-font-abel','https://fonts.googleapis.com/css?family=Abel', array(), $this->version, 'all' );

		$style = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_select_style','aotomot_basics' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aotomot-gallery-style3.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aotomot_Gallery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aotomot_Gallery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aotomot-gallery-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Aotomot Gallery : Display Function
	 */
	public static function aotomot_display_gallery( $atts ) {
		$atts = shortcode_atts( 
			array( 
				'id' => '',
			 ), $atts
		 );
	
		$data['aotg_select_layout'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_select_layout','aotomot_basics' );
		if ( $data['aotg_select_layout'] =='full' ) {
			$aotg_select_layout_class ='aot-full-width';
		} else {
			$aotg_select_layout_class ='aot-100-percent';
		}
		$data['aotg_url'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_url','aotomot_basics' );
		$data['aotg_api_key'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_api_key','aotomot_basics' );
		$data['aotg_select_order'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_select_order','aotomot_basics' );
		$data['aotg_title'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_title','aotomot_basics' );
		$data['aotg_style'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_select_style','aotomot_basics' );
		$data['aotg_grid_column'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_grid_column','aotomot_basics' );
		$data['aotg_total_image'] = Aotomot_Settings_API::aotomot_gallery_get_option('aotg_total_image','aotomot_basics' );
		$data['aotg_grad_1'] =  Aotomot_Settings_API::aotomot_gallery_get_option('aotg_grad_1','aotomot_advanced' );
		$data['aotg_grad_2'] =  Aotomot_Settings_API::aotomot_gallery_get_option('aotg_grad_2','aotomot_advanced' );

		if( $atts['id'] != '' ){
			$data['aotg_gallary_id'] =  $atts['id'];
		} else {
			$data['aotg_gallary_id'] =  Aotomot_Settings_API::aotomot_gallery_get_option('aotg_gallery_id','aotomot_basics' );
		}
	
		ob_start();
		if ( isset( $data['aotg_url'] ) && $data['aotg_url'] != '' ) :
			$aotGallery = new Aotomot_Gallery_REST_API( $data );
			$aotg_grid_col ='300px';
			if ( isset( $data['aotg_grid_column'] ) ) {
				switch ( $data['aotg_grid_column'] ) {
					case '6':
						$aotg_grid_col = '300px';
						break;
					case '4':
						$aotg_grid_col = '400px';
						break;
					case '3':
						$aotg_grid_col = '600px';
						break;
					default:
						// Default to Two Column.
						$aotg_grid_col = '700px';
						break;
				}
			}

			$resultGallery = $aotGallery->getGalleryPost( $data );

			if ( !is_wp_error( $resultGallery ) && isset( $resultGallery ) && $resultGallery ) : ?>
				
				<section id='aotg-container' class='<?php if ( isset( $aotg_select_layout_class ) ) echo $aotg_select_layout_class; ?>'>
					<!-- <div class='aotg-gradient'>
					<h3 class='aotg-title'>
						<?php
											if ( isset( $data['aotg_title'] ) ) {
												echo $data['aotg_title'];
											} else {
												echo'What we\'ve been working on';
											}

											?>
					</h3>
				</div> -->
					<style>
						.galleryGrid {
							grid-template-columns: repeat( auto-fill, minmax( <?php echo $aotg_grid_col; ?>, 1fr ) );
							-ms-grid-columns: ( minmax( <?php echo $aotg_grid_col; ?>, 1fr ) )[auto-fill];
						}

						.imagePreview:hover .image .dimmer {
							opacity: 0.7;
							background-image: linear-gradient( to right,
									<?php echo $data['aotg_grad_1']; ?> 0%,
									<?php echo $data['aotg_grad_2']; ?> 100% );
						}
					</style>
					<div class='galleryGrid <?php if ( isset( $aotg_select_layout_class ) ) echo $aotg_select_layout_class; ?>'>

						<!-- repeat this section for more images -->
						<?php foreach ( $resultGallery as $gallery ) : ?>
							<div class='imagePreview'>
								<?php if ( is_array( $gallery->image )) : ?>
									<div class='image' style='background-image: url( <?php echo $gallery->image[0]->url; ?> );'>
									<?php elseif ( isset( $gallery->image->url) ) : ?>
										<div class='image' style='background-image: url( <?php echo $gallery->image->url; ?> );'>
										<?php endif; ?>
										<div class='dimmer'></div>
										</div>
										<div class='info'>
											<h3><?php echo $gallery->name; ?></h3>
											<p class='imageNote'><?php echo $gallery->description; ?></p>
										</div>
									</div>
									<!-- repeat this section for more images -->
								<?php endforeach; ?>
							</div>
				</section>
	<?php	else :	?>
				 <p> <?php __( 'Sorry! Error while getting the Aotomot gallery display', 'aotomot-gallery' ); ?>.</p>

	<?php 	endif;
							?>
<?php 	else : ?>
				<section>
					<div>
						<h3><?php __( 'Not yet ready!', $this->plugin_name ); ?></h3>
						<p><?php __( 'Please check the Aotomot Plugin documentation for how to configure the plugin.', 'aotomot-gallery' ); ?></p>
						<p><?php __( 'Or just go to the WordPress dashboard setting-> Aotomot Gallery -> Configure all the details here.', 'aotomot-gallery' ); ?></p>
					</div>					
				</section>
	<?php
			endif;
			$aotomot_gallery = ob_get_contents();
			ob_end_clean();
			return $aotomot_gallery;
		}
	}

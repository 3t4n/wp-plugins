<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://acquaintsoft.com
 * @since             1.0.0
 * @package           Acq_Slick_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Acquaint Slick Slider
 * Plugin URI:        http://acquaintsoft.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Itcoderr
 * Author URI:        http://acquaintsoft.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acq-slick-slider
 * Domain Path:       /languages
 */

define("AQSS_TEXT_DOMAIN", "A_Q_S_S" );
define("AQSS_PLUGIN_URL", plugin_dir_url(__FILE__));


class Acq_Slick_Image_Slider {


    private static $instance;
    private $admin_thumbnail_size = 150;
    private $thumbnail_size_w = 150;
    private $thumbnail_size_h = 150;
	var $counter;

    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }

    /* ------------------Function Construct------------------------ */
	public function __construct() {
		
		add_action('admin_print_scripts-post.php', array(&$this, 'aqss_admin_print_scripts'));
        add_action('admin_print_scripts-post-new.php', array(&$this, 'aqss_admin_print_scripts'));
		add_image_size('rpg_gallery_admin_thumb', $this->admin_thumbnail_size, $this->admin_thumbnail_size, true);
        add_image_size('rpg_gallery_thumb', $this->thumbnail_size_w, $this->thumbnail_size_h, true);
        add_shortcode('rpggallery', array(&$this, 'shortcode'));

        /* --------------- Activation & Deactivation Hooks ------------------------ */
        register_activation_hook( __FILE__, 'activate_acq_slick_slider' );
		register_deactivation_hook( __FILE__, 'deactivate_acq_slick_slider' );

		/**
         * The core plugin class that is used to define internationalization,
         * admin-specific hooks, and public-facing site hooks.
         */
		require plugin_dir_path( __FILE__ ) . 'includes/class-acq-slick-slider.php';

        add_action( 'wp_enqueue_scripts', array(&$this,'AQSS_Plugin_Scripts' ));
        if (is_admin()) {
			add_action('plugins_loaded', array(&$this, 'AQSS_Translate'), 1);
			add_action('init', array(&$this, 'AcqSlickImageSlider'), 1);
		
			add_action('add_meta_boxes', array(&$this, 'add_all_aqs_meta_boxes'));
			add_action('admin_init', array(&$this, 'add_all_aqs_meta_boxes'), 1);
			
			add_action('save_post', array(&$this, 'add_image_aqs_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'aqs_settings_meta_save'), 9, 1);
			
			add_action('wp_ajax_uris_get_thumbnail', array(&$this, 'ajax_get_thumbnail_aqs'));
		}
	}

	/**
	 * Translate Plugin
	 */
	public function AQSS_Translate() {
		load_plugin_textdomain('A_Q_S_S', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
	}

	//Required JS & CSS
	function AQSS_Plugin_Scripts() {
		//js scripts
		wp_enqueue_script('aqs-jquery-slickslider-js', AQSS_PLUGIN_URL.'js/slick.js', array('jquery'), '1.1.0', true);

		// css scripts
		wp_enqueue_style('slickslider-css', AQSS_PLUGIN_URL.'css/slick.css');
		wp_enqueue_style('slickslider-theme-css', AQSS_PLUGIN_URL.'css/slick-theme.css');
	}

	//Required JS & CSS
	public function aqss_admin_print_scripts() {		
        wp_enqueue_script('media-upload');
        wp_enqueue_script('aqss-media-uploader-js', AQSS_PLUGIN_URL . 'js/aqs-multiple-media-uploader.js', array('jquery'));

		//custom script		
		wp_enqueue_script('custome-js', AQSS_PLUGIN_URL.'js/custom.js', array('jquery'), '1.0', true);
		
		//jscolor script		
		wp_enqueue_script('jscolor-js', AQSS_PLUGIN_URL.'js/jscolor.js', array('jquery'), '1.0', true);

		wp_enqueue_media();
		
		//custom add image box css
		wp_enqueue_style('aqs-meta-css', AQSS_PLUGIN_URL.'css/aqs-meta.css');
		
		//font awesome css
		wp_enqueue_style('aqs-font-awesome-4', AQSS_PLUGIN_URL.'css/font-awesome/css/font-awesome.min.css');

		//tool-tip js & css
		wp_enqueue_script('aqs-tool-tip-js',AQSS_PLUGIN_URL.'tooltip/jquery.darktooltip.min.js', array('jquery'));
		wp_enqueue_style('aqs-tool-tip-css', AQSS_PLUGIN_URL.'tooltip/darktooltip.min.css');
		
		//color-picker css n js
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'aqss-color-picker-script', plugins_url('js/aqss-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	

	// Register Custom Post Type
	public function AcqSlickImageSlider() {
		$labels = array(
			'name' => _x( 'Acquiant Slick Slider', AQSS_TEXT_DOMAIN ),
			'singular_name' => _x( 'Acquiant Slick Slider', AQSS_TEXT_DOMAIN ),
			'add_new' => __( 'Add New Slider', AQSS_TEXT_DOMAIN ),
			'add_new_item' => __( 'Add New Slider', AQSS_TEXT_DOMAIN ),
			'edit_item' => __( 'Edit Slider', AQSS_TEXT_DOMAIN ),
			'new_item' => __( 'New Image Slider', AQSS_TEXT_DOMAIN ),
			'view_item' => __( 'View Image Slider', AQSS_TEXT_DOMAIN ),
			'search_items' => __( 'Search Image Slider', AQSS_TEXT_DOMAIN ),
			'not_found' => __( 'No Image Slider found', AQSS_TEXT_DOMAIN ),
			'not_found_in_trash' => __( 'No Image Slider Found in Trash', AQSS_TEXT_DOMAIN ),
			'parent_item_colon' => __( 'Parent Image Slider:', AQSS_TEXT_DOMAIN ),
			'all_items' => __( 'All Sliders', AQSS_TEXT_DOMAIN ),
			'menu_name' => _x( 'Acquiant Slick Slider', AQSS_TEXT_DOMAIN ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title' ),
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-format-gallery',
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		);

        register_post_type( 'aqs_gallery', $args );
        add_filter( 'manage_edit-aqs_gallery_columns', array(&$this, 'aqs_gallery_columns' )) ;
        add_action( 'manage_aqs_gallery_posts_custom_column', array(&$this, 'aqs_gallery_manage_columns' ), 10, 2 );
	}
	
	// Change Title Heading and Add Shortcode Columns Heading on ACQ Slick Slider Listing
	function aqs_gallery_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Acquiant Slick Slider Title' ),
            'shortcode' => __( 'ACQ Slick Slider Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

	// Add Shortcode Value on ACQ Slick Slider Listing
    function aqs_gallery_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[AQSS id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }

    // all metabox hooks
    public function add_all_aqs_meta_boxes() {
		add_meta_box( __('Add Images', AQSS_TEXT_DOMAIN), __('Add Images', AQSS_TEXT_DOMAIN), array(&$this, 'aqs_generate_add_image_meta_box_function'), 'aqs_gallery', 'normal', 'low' );
		add_meta_box( __('Apply Setting On Acquiant Slick Slider', AQSS_TEXT_DOMAIN), __('Apply Setting On Acquiant Slick Slider', AQSS_TEXT_DOMAIN), array(&$this, 'aqs_settings_meta_box_function'), 'aqs_gallery', 'normal', 'low');
		add_meta_box ( __('Copy Slider Shortcode', AQSS_TEXT_DOMAIN), __('Copy Slider Shortcode', AQSS_TEXT_DOMAIN), array(&$this, 'aqs_shotcode_meta_box_function'), 'aqs_gallery', 'side', 'low');
	}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
    public function aqs_generate_add_image_meta_box_function($post) { ?>
    	<!-- Start: Edit Slick Slider HTML-->
		<div id="rpggallery_container">
            <ul id="rpg_gallery_thumbs" class="clearfix">
				<?php
				/* load saved photos into aqs */
				$AQSS_AllPhotosDetails = unserialize(base64_decode(get_post_meta( $post->ID, 'aqs_all_photos_details', true)));
				
				$TotalImages =  get_post_meta( $post->ID, 'aqs_total_images_count', true );
				if($TotalImages) {
					foreach($AQSS_AllPhotosDetails as $AQSS_SinglePhotoDetails) {
						$name = $AQSS_SinglePhotoDetails['rpgp_image_label'];
						$desc = $AQSS_SinglePhotoDetails['rpgp_image_desc'];						
						$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
						$url = $AQSS_SinglePhotoDetails['rpgp_image_url'];
						$url1 = $AQSS_SinglePhotoDetails['rpggallery_admin_thumb'];
						$url3 = $AQSS_SinglePhotoDetails['rpggallery_admin_large']; ?>
						<li class="rpg-image-entry" id="rpg_img">
							
							<div class="rpp-admin-inner-div1" >
								<img src="<?php echo esc_url ( $url1 ); ?>" class="rpg-meta-image" alt=""  style="">
								<input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo esc_attr( $UniqueString ); ?>" />
							</div>
							<div class="rpp-admin-inner-div2" >
								<input type="text" id="rpgp_image_url[]" name="rpgp_image_url[]" class="rpg_label_text"  value="<?php echo esc_url( $url ); ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="rpggallery_admin_thumb[]" name="rpggallery_admin_thumb[]" class="rpg_label_text"  value="<?php echo esc_url( $url1 ); ?>"  readonly="readonly" style="display:none;" />
								<input type="text" id="rpggallery_admin_large[]" name="rpggallery_admin_large[]" class="rpg_label_text"  value="<?php echo esc_url( $url3 ); ?>"  readonly="readonly" style="display:none;" />
								<p>
									<label><?php _e('Slide Title', AQSS_TEXT_DOMAIN); ?></label>
									<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" value="<?php echo esc_attr( $name ); ?>" placeholder="<?php _e('Enter Slide Title', AQSS_TEXT_DOMAIN); ?>" class="rpg_label_text">
								</p>
								<p>
									<label><?php _e('Slide Descriptions', AQSS_TEXT_DOMAIN); ?></label>
									<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" placeholder="<?php _e('Enter Slide Description', AQSS_TEXT_DOMAIN); ?>" class="rpg_label_text"><?php echo esc_attr( $desc ); ?></textarea>
								</p>
							</div>
							<a class="gallery_remove rpggallery_remove" href="#gallery_remove" id="rpg_remove_bt" ></a>
						</li>
						<?php
					} // end of foreach
				} else {
					$TotalImages = 0;
				} //end of if
				?>
            </ul>
		<!-- Start: Add Slick Slider HTML-->
		<div class="add-remove">
		<div class="rpg-image-entry add_rpg_new_image" id="aqs_gallery_upload_button" data-uploader_title="Upload Image" data-uploader_button_text="Select" >
			<div class="dashicons dashicons-plus"><span><?php _e('Add New Images', AQSS_TEXT_DOMAIN); ?></span></div>
			<p>
				
			</p>
		</div>
		
		</div>
		<!-- End: Add Slick Slider HTML-->
			
        </div>
		<!-- End: Edit Slick Slider HTML-->

		
        <?php
    }
	
	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
    public function aqs_settings_meta_box_function($post) { 
		require_once('acq-slick-slider-settings-meta-box.php');
	}
	
	// Add Shortcode Display Section
	public function aqs_shotcode_meta_box_function() { ?>
		<p><?php _e("Use below shortcode in any Page/Post to publish your slider", AQSS_TEXT_DOMAIN);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[AQSS id=".get_the_ID()."]"; ?>">
		<?php 
	}	

	public function aqs_admin_thumb($id) {
	$image  = wp_get_attachment_image_src($id, 'rpggallery_admin_original', true);
        $image1 = wp_get_attachment_image_src($id, 'rpggallery_admin_thumb', true);
        $image3 = wp_get_attachment_image_src($id, 'rpggallery_admin_large', true);
		$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        ?>
        <!-- Start: Edit Slick Slider HTML-->
		<li class="rpg-image-entry" id="rpg_img">
			<a class="gallery_remove rpggallery_remove" href="#gallery_remove" id="rpg_remove_bt" ></a>
			<div class="rpp-admin-inner-div1" >
				<img src="<?php echo esc_url( $image1[0] ); ?>" class="rpg-meta-image" alt=""  style="">
				</div>
			<div class="rpp-admin-inner-div2" >
				<input type="text" id="rpgp_image_url[]" name="rpgp_image_url[]" class="rpg_label_text"  value="<?php echo esc_url( $image[0] ); ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="rpggallery_admin_thumb[]" name="rpggallery_admin_thumb[]" class="rpg_label_text"  value="<?php echo esc_url( $image1[0] ); ?>"  readonly="readonly" style="display:none;" />
				<input type="text" id="rpggallery_admin_large[]" name="rpggallery_admin_large[]" class="rpg_label_text"  value="<?php echo esc_url( $image3[0] ); ?>"  readonly="readonly" style="display:none;" />
				<p>
					<label><?php _e('Slide Title', AQSS_TEXT_DOMAIN); ?></label>
					<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" placeholder="<?php _e('Enter Slide Title Here', AQSS_TEXT_DOMAIN); ?>" class="rpg_label_text">
				</p>
				<p>
					<label><?php _e('Slide Description', AQSS_TEXT_DOMAIN); ?></label>
					<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" placeholder="<?php _e('Enter Slide Description Here', AQSS_TEXT_DOMAIN); ?>" class="rpg_label_text"></textarea>
				</p>
			</div>
		</li>
		<!-- End: Edit Slick Slider HTML-->
        <?php
    }
	
	// get Image thumbnail
    public function ajax_get_thumbnail_aqs() {
        echo $this->aqs_admin_thumb($_POST['imageid']);
        die;
    }

    /*---------------------- Start: Add/edit data save-------------------------*/
    public function add_image_aqs_meta_box_save($PostID) {
		if(isset($PostID) && isset($_POST['rpgp_image_url'])) {
			$TotalImages = count($_POST['rpgp_image_url']);
			$ImagesArray = array();
			if($TotalImages) {
				for($i=0; $i < $TotalImages; $i++) {
					$image_label =stripslashes(sanitize_text_field($_POST['rpgp_image_label'][$i]));
					$image_desc = stripslashes(sanitize_text_field($_POST['rpgp_image_desc'][$i]));
					$url = sanitize_text_field( $_POST['rpgp_image_url'][$i] );
					$url1 = sanitize_text_field($_POST['rpggallery_admin_thumb'][$i] );
					$url3 = sanitize_text_field($_POST['rpggallery_admin_large'][$i] );
					$ImagesArray[] = array(
						'rpgp_image_label' => $image_label,
						'rpgp_image_desc' => $image_desc,
						'rpgp_image_url' => $url,
						'rpggallery_admin_thumb' => $url1,
						'rpggallery_admin_large' => $url3,
					);
				} //end of foreach
				update_post_meta($PostID, 'aqs_all_photos_details', base64_encode(serialize($ImagesArray)));
				update_post_meta($PostID, 'aqs_total_images_count', $TotalImages);
			} else {
				$TotalImages = 0;
				update_post_meta($PostID, 'aqs_total_images_count', $TotalImages);
				$ImagesArray = array();
				update_post_meta($PostID, 'aqs_all_photos_details', base64_encode(serialize($ImagesArray)));
			} //end of if
		} //end of if
    }
    /*---------------------- End: Add/edit data save-------------------------*/
	
	/*---------------------- Start: Slider Settings data save-------------------------*/
	public function aqs_settings_meta_save($PostID) {
		if(isset($PostID) && isset($_POST['aqss_action']) == "aqss-save-settings") {

			$AQSS_L3_Slider_Type				=	 sanitize_option ( 'slider_type', $_POST['aqss-l3-slider-type'] );
			$AQSS_L3_Slide_To_Show				=	 sanitize_option ( 'slide_to_show', $_POST['aqss-l3-slide-to-show'] );

			$AQSS_L3_Slide_To_Scroll				=	 sanitize_option ( 'slide_to_scroll', $_POST['aqss-l3-slide-to-scroll'] );
			
			$AQSS_L3_Infinite_Scroll			=	 sanitize_option ( 'infinite_scroll', $_POST['aqss-l3-infinite-scroll'] );

			$AQSS_L3_Slide_Title				=	 sanitize_option ( 'title', $_POST['aqss-l3-slide-title'] );
			$AQSS_L3_Auto_Slideshow				=	 sanitize_option ( 'autoplay', $_POST['aqss-l3-auto-slide'] );
			
			$AQSS_L3_Transition_Speed			=	 sanitize_text_field( $_POST['aqss-l3-transition-speed'] );
			
			
			$AQSS_L3_Navigation_Button			=	 sanitize_option ( 'navigation_button', $_POST['aqss-l3-navigation-button'] );
			$AQSS_L3_Font_Style					=	 sanitize_option ( 'font_style', $_POST['aqss-l3-font-style'] );
			$AQSS_L3_Title_Color   				=	 sanitize_option ( 'title_color', $_POST['aqss-l3-title-color'] );
			$AQSS_L3_Title_BgColor   			=	 sanitize_option ( 'title_bgcolor', $_POST['aqss-l3-title-bgcolor'] );
			$AQSS_L3_Desc_Color   				=	 sanitize_option ( 'desc_color', $_POST['aqss-l3-desc-color'] );
			$AQSS_L3_Desc_BgColor  				=	 sanitize_option ( 'desc_bgcolor', $_POST['aqss-l3-desc-bgcolor'] );
			$AQSS_L3_Custom_CSS					=	 sanitize_text_field( $_POST['aqss-l3-custom-css'] );			
			
			$AQSS_Settings_Array = serialize( array(
				'AQSS_L3_Slider_Type'			=> 	$AQSS_L3_Slider_Type,
				'AQSS_L3_Slide_To_Show'			=> 	$AQSS_L3_Slide_To_Show,
				'AQSS_L3_Infinite_Scroll'		=> 	$AQSS_L3_Infinite_Scroll,
				'AQSS_L3_Slide_To_Scroll'		=> 	$AQSS_L3_Slide_To_Scroll,
				'AQSS_L3_Slide_Title'  			=> 	$AQSS_L3_Slide_Title,
				'AQSS_L3_Auto_Slideshow'  		=> 	$AQSS_L3_Auto_Slideshow,				
				'AQSS_L3_Transition_Speed'              => 	$AQSS_L3_Transition_Speed,					
				'AQSS_L3_Navigation_Button'             => 	$AQSS_L3_Navigation_Button,
				'AQSS_L3_Font_Style'  			=> 	$AQSS_L3_Font_Style,
				'AQSS_L3_Title_Color'   		=> 	$AQSS_L3_Title_Color,
				'AQSS_L3_Title_BgColor'   		=> 	$AQSS_L3_Title_BgColor,
				'AQSS_L3_Desc_Color'   			=> 	$AQSS_L3_Desc_Color,
				'AQSS_L3_Desc_BgColor'  		=> 	$AQSS_L3_Desc_BgColor,
				'AQSS_L3_Custom_CSS'  			=> 	$AQSS_L3_Custom_CSS,				


			));
			
			$AQSS_Gallery_Settings = "AQSS_Gallery_Settings_".$PostID;
			update_post_meta($PostID, $AQSS_Gallery_Settings, $AQSS_Settings_Array);
		} //end of if
	}
	/*---------------------- End: Slider Settings data save-------------------------*/

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-acq-slick-slider-activator.php
	 */
	function activate_acq_slick_slider() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-acq-slick-slider-activator.php';
		Acq_Slick_Slider_Activator::activate();
	}
	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-acq-slick-slider-deactivator.php
	 */
	function deactivate_acq_slick_slider() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-acq-slick-slider-deactivator.php';
		Acq_Slick_Slider_Deactivator::deactivate();
	}
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acq_slick_slider() {

	$plugin = new Acq_Slick_Image_Slider();

}
run_acq_slick_slider();

/**
 * AQSS SlickSlider Short Code [URIS]
 */
require_once("acq-slick-slider-short-code.php");
<?php
/**
 * Plugin Name: Lightbox Slider - Responsive Image Gallery Slider
 * Version: 3.4.8
 * Description: Lightbox Slider is a fully responsive WordPress gallery plugin with hyper advanced functionality and user-friendly options. Create 100% responsive FREE WordPress lightbox photo gallery in minutes
 * Author: Weblizar
 * Author URI: https://www.weblizar.com
 * Plugin URI: https://weblizar.com/
 */

/**
 * Constant Variable
 */
defined( 'ABSPATH' ) or die();
define("WEBLIZAR_LBS_TEXT_DOMAIN","weblizar_lbs" );
define("WEBLIZAR_LBS_PLUGIN_URL", plugin_dir_url(__FILE__));

// Image Crop Size Function
add_image_size( 'lbsp_12_thumb', 500, 9999, array( 'center', 'top'));
add_image_size( 'lbsp_346_thumb', 400, 9999, array( 'center', 'top'));
add_image_size( 'lbsp_12_same_size_thumb', 500, 500, array( 'center', 'top'));
add_image_size( 'lbsp_346_same_size_thumb', 400, 400, array( 'center', 'top'));

/**
 * Run 'Install' script on plugin activation
 */
register_activation_hook( __FILE__, 'LBS_DefaultSettings' );
function LBS_DefaultSettings(){
    $LBS_DefaultSettingsArray = serialize( array(
        'LBS_Hover_Animation' => "fade",
        'LBS_Gallery_Layout' => "col-md-6",
        'LBS_Hover_Color_Opacity' => 1,
        'LBS_Font_Style' => "Arial",
        'LBS_Image_View_Icon' => "far fa-image",
		'LBS_Gallery_Title' => "yes",
        'wl_custom_css' => ""

    ) );
    add_option("WL_LBS_Settings", $LBS_DefaultSettingsArray);
}


function admin_content_lsf_144936() {
	if(get_post_type()=="lightbox-slider") { ?>
		<style>
		.wlTBlock{
			background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?php echo WEBLIZAR_LBS_PLUGIN_URL.'/images/bg2.jpg'; ?>') no-repeat fixed;
			background-position: 50% 0 !important;
			padding: 27px 0 23px 0;
			margin-left: -20px;
			font-family: Myriad Pro ;
			cursor: pointer;
			text-align: center;
		}
		.wlTBlock .wlTBig{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 15px 0;
		}
		.wlTBlock .wlTBig .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		.wlTBlock .WlTSmall{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}
		.wlTBlock a{
		text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.wlTBlock{ padding-top: 60px; margin-bottom: -50px; }
			.wlTBlock .WlTSmall { display: none; }
		}
		</style>
		<div class="wlTBlock">
			<a href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_new">
				<div class="wlTBig"><span class="dashicons dashicons-cart"></span><?php esc_html_e("Get Pro version only in 12$ (Offer For Limited Time)", WEBLIZAR_LBS_TEXT_DOMAIN); ?></div>
				<div class="WlTSmall"><?php esc_html_e("with PRO version you get more advanced functionality and even more flexibility in settings", WEBLIZAR_LBS_TEXT_DOMAIN); ?> </div>
			</a>
		</div>
		<?php
	}
}
add_action('in_admin_header','admin_content_lsf_144936');

//Get Ready Plugin Translation
add_action('plugins_loaded', 'LBS_GetReadyTranslation');
function LBS_GetReadyTranslation() {
	load_plugin_textdomain(WEBLIZAR_LBS_TEXT_DOMAIN, FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

// Register Custom Post Type
function LBS_CPT_Function() {
    $labels = array(
        'name'                => esc_html__( 'Lightbox Slider', 'Lightbox Slider', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'singular_name'       => esc_html__( 'Lightbox Slider', 'Lightbox Slider', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'menu_name'           => esc_html__( 'Lightbox Slider', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'parent_item_colon'   => esc_html__( 'Parent Item:', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'all_items'           => esc_html__( 'All Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'view_item'           => esc_html__( 'View Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'add_new_item'        => esc_html__( 'Add New Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'add_new'             => esc_html__( 'Add New Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'edit_item'           => esc_html__( 'Edit Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'update_item'         => esc_html__( 'Update Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'search_items'        => esc_html__( 'Search Gallery', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'not_found'           => esc_html__( 'No Gallery Found', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'not_found_in_trash'  => esc_html__( 'No Gallery found in Trash', WEBLIZAR_LBS_TEXT_DOMAIN ),
    );
    $args = array(
        'label'               => esc_html__( 'Lightbox Slider', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'description'         => esc_html__( 'Lightbox Slider', WEBLIZAR_LBS_TEXT_DOMAIN ),
        'labels'              => $labels,
        'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
        //'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-gallery',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
    );
    register_post_type( 'lightbox-slider', $args );
    add_filter( 'manage_edit-lightbox-slider_columns', 'Lightbox_Slider_set_columns' );
    add_action( 'manage_lightbox-slider_posts_custom_column', 'Lightbox_Slider_manage_col', 10, 2 );
}
function Lightbox_Slider_set_columns( $columns ) {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'title'     => esc_html__( 'Slider',WEBLIZAR_LBS_TEXT_DOMAIN ),
            'shortcode' => esc_html__( 'Lightbox Slider Shortcode',WEBLIZAR_LBS_TEXT_DOMAIN ),
            'author'    => esc_html__( 'Author',WEBLIZAR_LBS_TEXT_DOMAIN ),
            'date'      => esc_html__( 'Date', WEBLIZAR_LBS_TEXT_DOMAIN)
        );
        return $columns;
    }
function Lightbox_Slider_manage_col( $column, $post_id ) {
        global $post;
        switch ( $column ) {
            case 'shortcode' :
                echo '<input type="text" value="[LBS id=' . $post_id . ']" readonly="readonly" />';
                break;
            default :
                break;
        }
    }

// Hook into the 'init' action
add_action( 'init', 'LBS_CPT_Function', 0 );

/**
 * Add Meta Box & load required CSS and JS for interface
 */
add_action('admin_init','Lightbox_Slider_init');
function Lightbox_Slider_init() {
    add_meta_box('Lightbox_Slider_meta', esc_html__('Add New Images', WEBLIZAR_LBS_TEXT_DOMAIN), 'lightbox_slider_function', 'lightbox-slider', 'normal', 'high');

	add_action('save_post','light_box_meta_save');
	add_meta_box(esc_html__('Plugin Shortcode', WEBLIZAR_LBS_TEXT_DOMAIN) , esc_html__('Plugin Shortcode', WEBLIZAR_LBS_TEXT_DOMAIN), 'lbs_plugin_shortcode', 'lightbox-slider', 'side', 'low');
    add_meta_box(esc_html__('Lightbox Slider Pro', WEBLIZAR_LBS_TEXT_DOMAIN) , esc_html__('Lightbox Slider Pro', WEBLIZAR_LBS_TEXT_DOMAIN), 'lbs_pro_upgrade_function', 'lightbox-slider', 'side', 'low');
	add_meta_box(esc_html__('Rate us on WordPress', WEBLIZAR_LBS_TEXT_DOMAIN) , esc_html__('Rate us on WordPress', WEBLIZAR_LBS_TEXT_DOMAIN), 'lbs_rate_us_function', 'lightbox-slider', 'normal', 'high');

	// add_meta_box(esc_html__('Upgrade To Pro Version', WEBLIZAR_LBS_TEXT_DOMAIN) , esc_html__('Upgrade To Pro Version', WEBLIZAR_LBS_TEXT_DOMAIN), 'lbs_upgrade_to_pro_function', 'lightbox-slider', 'normal', 'high');

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script('theme-preview');
    wp_enqueue_script('lbs-media-uploads',WEBLIZAR_LBS_PLUGIN_URL.'js/lbs-media-upload-script.js',array('media-upload','thickbox','jquery'));
    wp_enqueue_style('dashboard');
    wp_enqueue_style('lbs-meta-css', WEBLIZAR_LBS_PLUGIN_URL.'css/lbs-meta.css');
    wp_enqueue_style('thickbox');


    // enqueue style and script of code mirror
    wp_enqueue_style('rpgp_codemirror-css', WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/codemirror.css');
    wp_enqueue_style('rpgp_blackboard', WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/blackboard.css');
    wp_enqueue_style('rpgp_show-hint-css', WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/show-hint.css');

    wp_enqueue_script('rpgp_codemirror-js',WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/codemirror.js',array('jquery'));
    wp_enqueue_script('rpgp_css-js',WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/rpg-css.js',array('jquery'));
    wp_enqueue_script('rpgp_css-hint-js',WEBLIZAR_LBS_PLUGIN_URL.'css/codemirror/css-hint.js',array('jquery'));
}

/**
plugin shortcode
**/
function lbs_plugin_shortcode(){ ?>
	<p> <?php esc_html_e("Use below shortcode in any Page/Post to publish your Lightbox Slider", WEBLIZAR_LBS_TEXT_DOMAIN); ?></p>
	<input readonly="readonly" type="text" value="<?php echo esc_attr("[LBS id=".get_the_ID()."]" ); ?>">
	<?php
}

/**
Rate us
**/
function lbs_rate_us_function() { ?>
	<div style="text-align:center">
		<h3> <?php esc_html_e("If you like our plugin then please show us some love", WEBLIZAR_LBS_TEXT_DOMAIN); ?></h3>
		<style>
		.wrg-rate-us span.dashicons{
			width: 30px;
			height: 30px;
		}
		.wrg-rate-us span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
		}
		</style>
		<a class="wrg-rate-us" style="text-align:center; text-decoration: none;font:normal 30px/l;" href="https://wordpress.org/plugins/lightbox-slider/#reviews" target="_blank">
            <?php for($star=1;$star<=5;$star++){ ?>
                <span class="dashicons dashicons-star-filled"></span>
            <?php } ?>
		</a>
		<div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="https://wordpress.org/plugins/lightbox-slider/" target="_new" class="button button-primary button-hero"><?php esc_html_e("Click Here", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Meta box interface design
 */
function lightbox_slider_function() {
    $lbs_all_photos_details = unserialize(get_post_meta( get_the_ID(), 'lbs_all_photos_details', true));
    $TotalImages =  get_post_meta( get_the_ID(), 'lbs_total_images_count', true );
    $i = 1;
    ?>
	<style>
	#titlediv #title {
		margin-bottom:15px;
	}
	</style>
    <input type="hidden" id="count_total" name="count_total" value="<?php if($TotalImages==0){ echo esc_attr( 0 ); } else { echo esc_attr( $TotalImages ); } ?>"/>
    <div style="clear:left;"></div>
    <?php
    /* load saved photos into gallery */
    if($TotalImages) {
        if(is_array($lbs_all_photos_details)){
            foreach($lbs_all_photos_details as $lbs_single_photos_detail) {
                $name = $lbs_single_photos_detail['lbs_image_label'];
                $url = $lbs_single_photos_detail['lbs_image_url'];
                ?>
                    <div class="rpg-image-entry" id="rpg_img<?php echo esc_attr($i); ?>">
    					<a class="gallery_remove" href="#gallery_remove" id="rpg_remove_bt<?php echo esc_attr( $i ); ?>"onclick="remove_meta_img(<?php echo esc_attr( $i ); ?>)"><img src="<?php echo esc_url( WEBLIZAR_LBS_PLUGIN_URL.'images/Close-icon.png' ); ?>" /></a>
    					<img src="<?php echo  esc_url($url ); ?>" class="rpg-meta-image" alt=""  style="">
    					<input type="button" id="upload-background-<?php echo esc_attr($i); ?>" name="upload-background-<?php echo esc_attr($i); ?>" value="Upload Image" class="button-primary" onClick="weblizar_image('<?php echo esc_attr($i); ?>')" />
    					<input type="text" id="img_url<?php echo esc_attr($i); ?>" name="img_url<?php echo esc_attr($i); ?>" class="rpg_label_text"  value="<?php echo esc_url( $url); ?>"  readonly="readonly" style="display:none;" />
    					<input type="text" id="image_label<?php echo esc_attr($i); ?>" name="image_label<?php echo esc_attr($i); ?>" placeholder="Enter Image Label" class="rpg_label_text" value="<?php echo esc_attr($name); ?>">
                    </div>
                <?php
                $i++;
            } // end of foreach
          }
    } else {
        $TotalImages = 0;
    }
    ?>

    <div id="append_rpg_img">
    </div>
    <div class="rpg-image-entry add_rpg_new_image" onclick="add_rpg_meta_img()">
		<div class="dashicons dashicons-plus"></div>
		<p><?php esc_html_e('Add New Image', WEBLIZAR_LBS_TEXT_DOMAIN); ?></p>
    </div>
    <div style="clear:left;"></div>

    <script>
    var rpg_i = parseInt(jQuery("#count_total").val());
    function add_rpg_meta_img() {
        rpg_i = rpg_i + 1;

        var rpg_output = '<div class="rpg-image-entry" id="rpg_img'+ rpg_i +'">'+
                            '<a class="gallery_remove" href="#gallery_remove" id="rpg_remove_bt' + rpg_i + '"onclick="remove_meta_img(' + rpg_i + ')"><img src="<?php echo  WEBLIZAR_LBS_PLUGIN_URL.'images/Close-icon.png'; ?>" /></a>'+
                            '<img src="<?php echo  WEBLIZAR_LBS_PLUGIN_URL.'images/lbs-default.jpg'; ?>" class="rpg-meta-image" alt=""  style="">'+
                            '<input type="button" id="upload-background-' + rpg_i + '" name="upload-background-' + rpg_i + '" value="Upload Image" class="button-primary" onClick="weblizar_image(' + rpg_i + ')" />'+
                            '<input type="text" id="img_url'+ rpg_i +'" name="img_url'+ rpg_i +'" class="rpg_label_text"  value="<?php echo  WEBLIZAR_LBS_PLUGIN_URL.'images/lbs-default.jpg'; ?>"  readonly="readonly" style="display:none;" />'+
                            '<input type="text" id="image_label'+ rpg_i +'" name="image_label'+ rpg_i +'" placeholder="Enter Image Label" class="rpg_label_text"   >'+
                        '</div>';
        jQuery(rpg_output).hide().appendTo("#append_rpg_img").slideDown(500);
        jQuery("#count_total").val(rpg_i);
    }

    function remove_meta_img(id){
        jQuery("#rpg_img"+id).slideUp(600, function(){
            jQuery(this).remove();
        });

        count_total = jQuery("#count_total").val();
        count_total = count_total - 1;
        var id_i= id + 1;

        for(var i=id_i;i<=rpg_i;i++){
            var j = i-1;
            jQuery("#rpg_remove_bt"+i).attr('onclick','remove_meta_img('+j+')');
            jQuery("#rpg_remove_bt"+i).attr('id','rpg_remove_bt'+j);
            jQuery("#img_url"+i).attr('name','img_url'+j);
            jQuery("#image_label"+i).attr('name','image_label'+j);
            jQuery("#img_url"+i).attr('id','img_url'+j);
            jQuery("#image_label"+i).attr('id','image_label'+j);

            jQuery("#rpg_img"+i).attr('id','rpg_img'+j);
        }
        jQuery("#count_total").val(count_total);
        rpg_i = rpg_i - 1;
    }
    </script>
    <?php
}

function lbs_upgrade_to_pro_function(){ ?>
	<div class="upgrade-to-pro-demo upgrade-to-pro-demo-admin" >
		<a href="http://demo.weblizar.com/lightbox-slider-pro-demo/" target="_new" class="button button-primary button-hero "><?php esc_html_e("View Live Demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
		<a href="http://demo.weblizar.com/lightbox-slider-pro-admin-demo/" target="_new" class="button button-primary button-hero"><?php esc_html_e("View Admin Demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
		<a href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_new" class="button button-primary button-hero button-heroup"><?php esc_html_e("Upgarde To Pro", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
		<hr>
	</div>
	<?php
}

function lbs_pro_upgrade_function(){
    $imgpath = WEBLIZAR_LBS_PLUGIN_URL."images/lbs_pro.jpg";
      ?>
        <div class="">
            <div class="update_pro_button"><a target="_blank" href="https://weblizar.com/plugins/lightbox-slider-pro/"> <?php esc_html_e("Buy Now $12", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a></div>
                <div class="update_pro_image">
                    <img class="lbs_getpro" src="<?php echo esc_attr($imgpath); ?>">
                </div>
            <div class="update_pro_button">
                <a class="upg_anch" target="_blank" href="https://weblizar.com/plugins/lightbox-slider-pro/"><?php esc_html_e("Buy Now $12", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
            </div>
        </div>
    <?php
}

/**
 * Save All Photo Gallery Images
 */
function light_box_meta_save() {
    if(isset($_POST['post_ID'])) {
        $post_ID =  $_POST['post_ID'] ;
        $post_type = get_post_type($post_ID) ;
        if($post_type == 'lightbox-slider') {
            $TotalImages =  $_POST['count_total'] ;
            $ImagesArray = array();
            if($TotalImages) {
                for($i=1; $i <= $TotalImages; $i++) {
                    $name = stripslashes( $_POST['image_label'.$i]);
                    $url =  ($_POST['img_url'.$i]) ;
                    $ImagesArray[] = array(
                        'lbs_image_label' => $name,
                        'lbs_image_url' => $url
                    );
                }
                update_post_meta($post_ID, 'lbs_all_photos_details', serialize($ImagesArray));
                update_post_meta($post_ID, 'lbs_total_images_count', $TotalImages);
            } else {
                $TotalImages = 0;
                update_post_meta($post_ID, 'lbs_total_images_count', $TotalImages);
                $ImagesArray = array();
                update_post_meta($post_ID, 'lbs_all_photos_details', serialize($ImagesArray));
            }
        }
    }
}

/**
 * Weblizar Lightbox Slider Short Code Detect Function
 * Plugin never load plugin CSS & JS files with all theme pages.
 * CSS & JS files only load on required pages where you use or embed [LBS] shortcode.
 */
function WeblizarLightboxSliderShortCodeDetect() {
    global $wp_query;
    $Posts = $wp_query->posts;
    $Pattern = get_shortcode_regex();
    foreach ($Posts as $Post) {
        if( preg_match_all( '/'. $Pattern .'/s', $Post->post_content, $Matches ) && array_key_exists( 2, $Matches ) && in_array( 'LBS', $Matches[2] ) ) {
            /**
             * js scripts
             */
				wp_enqueue_script('jquery');
                wp_enqueue_script('popper', WEBLIZAR_LBS_PLUGIN_URL.'js/popper.min.js', array('jquery'));
                wp_enqueue_script('wl-lbs-bootstrap-js',WEBLIZAR_LBS_PLUGIN_URL.'js/bootstrap.min.js', array('jquery'));
				wp_enqueue_script('wl-lbs-hover-pack-js', WEBLIZAR_LBS_PLUGIN_URL.'js/hover-pack.js', array('jquery'));
				wp_enqueue_script('wl-lbs-lightbox', WEBLIZAR_LBS_PLUGIN_URL.'js/lightbox.js', array('jquery'));


	     	/**
             * css scripts
             */
				wp_enqueue_style('wl-lbs-hover-pack-css', WEBLIZAR_LBS_PLUGIN_URL.'css/hover-pack.css');
				wp_enqueue_style('wl-lbs-reset-css', WEBLIZAR_LBS_PLUGIN_URL.'css/reset.css');
				wp_enqueue_style('wl-lbs-img-gallery-css', WEBLIZAR_LBS_PLUGIN_URL.'css/img-gallery.css');
				wp_enqueue_style('font-awesome-5', WEBLIZAR_LBS_PLUGIN_URL.'css/all.min.css');
				wp_enqueue_style('wl-lbs-lightbox', WEBLIZAR_LBS_PLUGIN_URL.'css/lightbox.css');
                wp_enqueue_style('bootstrap-latest', WEBLIZAR_LBS_PLUGIN_URL.'css/bootstrap-latest/bootstrap.min.css');

            break;
        } //end of if
    } //end of foreach
}
add_action( 'wp_footer', 'WeblizarLightboxSliderShortCodeDetect' );

/**
 * Settings Page for Lightbox Slider
 */
add_action('admin_menu' , 'LBS_SettingsPage');
function LBS_SettingsPage() {
	add_submenu_page('edit.php?post_type=lightbox-slider', esc_html__('Settings', WEBLIZAR_LBS_TEXT_DOMAIN), esc_html__('Settings', WEBLIZAR_LBS_TEXT_DOMAIN), 'administrator', 'light-box-settings', 'lightbox_slider_settings_page_function');
	add_submenu_page('edit.php?post_type=lightbox-slider', 'Recommendation', 'Recommendation', 'administrator', 'plugin-recommendation', 'LS_plugin_recommendation');
	add_submenu_page('edit.php?post_type=lightbox-slider', 'Our Offers', 'Our Offers', 'administrator', 'plugin-offers', 'LS_plugin_offers_function');
}

/**
 * Photo Gallery Settings Page
 */
function lightbox_slider_settings_page_function() {
    //css
	wp_enqueue_script('dashboard');
	wp_enqueue_script('jquery');
	wp_enqueue_style('dashboard');
    wp_enqueue_style('font-awesome', WEBLIZAR_LBS_PLUGIN_URL.'css/all.min.css');
    require_once("lightbox-slider-settings.php");
}

function LS_plugin_recommendation(){
	//css
    wp_enqueue_style('recom2', WEBLIZAR_LBS_PLUGIN_URL.'css/recom.css');
	require_once("recommendations.php");
}

function LS_plugin_offers_function(){
    wp_enqueue_style('bootstrap-latest', WEBLIZAR_LBS_PLUGIN_URL.'css/bootstrap-latest/bootstrap.min.css');
    wp_enqueue_script('rp_rp-bootstrap-js',WEBLIZAR_LBS_PLUGIN_URL.'js/bootstrap.min.js');
    require_once("offers.php");
}

/**
* LIGHT BOX SETTING PAGE
*/
// Add settings link on plugin page
function as_settings_link_lbs($links) {
    $as_settings_link1 = '<a style="font-weight:700; color:#e35400" href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_blank">'.esc_html__('Get Premium', WEBLIZAR_LBS_TEXT_DOMAIN).'</a>';
    $as_settings_link2= '<a href="edit.php?post_type=lightbox-slider&page=light-box-settings">'.esc_html__('Settings', WEBLIZAR_LBS_TEXT_DOMAIN).'</a>';
    array_unshift($links, $as_settings_link1, $as_settings_link2);
    return $links;
}
$lbs_plugin_name = plugin_basename(__FILE__);
add_filter("plugin_action_links_$lbs_plugin_name", 'as_settings_link_lbs' );

/**
 * Lightbox Slider Short Code [LBS]
 */
require_once("lightbox-slider-short-code.php");

add_action( "admin_notices", "review_admin_notice_lbs_free" );
function review_admin_notice_lbs_free() {
    global $pagenow;
    $lbs_screen = get_current_screen();
    if ( $pagenow == 'edit.php' && $lbs_screen->post_type == "lightbox-slider" ) {
        include( 'lbs-banner.php' );
    }
}
?>

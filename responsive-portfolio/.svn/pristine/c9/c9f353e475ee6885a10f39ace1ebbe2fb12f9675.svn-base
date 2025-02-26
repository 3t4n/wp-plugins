<?php
/**
 * Plugin Name: Responsive Portfolio - Responsive Image Gallery, Image Portfolio
 * Version: 2.8.2
 * Description: Responsive Portfolio Allow You To Add Unlimited Images To Your Portfolio Integrated With Light Box Preview And Masonry Effect.
 * Author: Weblizar
 * Author URI: http://weblizar.com/
 * Plugin URI: http://weblizar.com/plugins/responsive-portfolio/
 * Text Domain: weblizar_rpg
 * Domain Path: /languages
 * License: GPL2
 */
/**
 * Constant Variable
 */
defined( 'ABSPATH' ) or die();
define( "WEBLIZAR_RP_TEXT_DOMAIN", "weblizar_rpg" );
define( "WEBLIZAR_RP_PLUGIN_URL", plugin_dir_url( __FILE__ ) );

// Run 'Install' script on plugin activation
register_activation_hook( __FILE__, 'DefaultSettingsPortfolio' );
function DefaultSettingsPortfolio() {
	$DefaultSettingsArray = serialize( array(
		'WL_Hover_Animation'     => "fade",
		'WL_Gallery_Layout'      => "col-md-6",
		'WL_Image_Border'        => "yes",
		'WL_Hover_Color_Opacity' => 0.5,
		'WL_Font_Style'          => "Arial",
		'WL_Masonry_Layout'      => "no",
		'WL_Gallery_Title'       => "yes",
		'WL_Zoom_Animation'      => "yes",
		'WL_Image_Border_Color'  => "#ffffff",
		'WL_Custom_CSS'          => '',
	) );
	add_option( "WRP_Portfolio_Settings", $DefaultSettingsArray );
}

//Plugin Translation
add_action( 'plugins_loaded', 'GetReadyTranslationPortfolio' );
function GetReadyTranslationPortfolio() {
	load_plugin_textdomain( WEBLIZAR_RP_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
// CPT
function ResponsivePortfolio() {
	$labels = array(
		'name'               => esc_html_x( 'Responsive Portfolio', 'Responsive Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'singular_name'      => esc_html_x( 'Responsive Portfolio', 'Responsive Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'menu_name'          => esc_html__( 'Responsive Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'parent_item_colon'  => esc_html__( 'Parent Item:', WEBLIZAR_RP_TEXT_DOMAIN ),
		'all_items'          => esc_html__( 'All Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'view_item'          => esc_html__( 'View Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'add_new'            => esc_html__( 'Add New Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'edit_item'          => esc_html__( 'Edit Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'update_item'        => esc_html__( 'Update Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'search_items'       => esc_html__( 'Search Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'not_found'          => esc_html__( 'No Gallery Found', WEBLIZAR_RP_TEXT_DOMAIN ),
		'not_found_in_trash' => esc_html__( 'No Gallery found in Trash', WEBLIZAR_RP_TEXT_DOMAIN ),
	);
	$args   = array(
		'label'               => esc_html__( 'Responsive Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'description'         => esc_html__( 'Responsive Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
		//'taxonomies'        => array( 'category', 'post_tag' ),
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
		'capability_type'     => 'page'
	);
	register_post_type( 'responsive-portfolio', $args );
	add_filter( 'manage_edit-responsive-portfolio_columns', 'RP_set_columns' );
	add_action( 'manage_responsive-portfolio_posts_custom_column', 'RP_manage_col', 10, 2 );

}
function RP_set_columns( $columns ) {
		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'title'     => esc_html__( 'Portfolio', WEBLIZAR_RP_TEXT_DOMAIN ),
			'shortcode' => esc_html__( 'Portfolio Shortcode', WEBLIZAR_RP_TEXT_DOMAIN ),
			'author'    => esc_html__( 'Author', WEBLIZAR_RP_TEXT_DOMAIN ),
			'date'      => esc_html__( 'Date', WEBLIZAR_RP_TEXT_DOMAIN ),
		);
		return $columns;
	}
function RP_manage_col( $column, $post_id ) {
		global $post;
		switch ( $column ) {
			case 'shortcode' :
				echo '<input type="text" value="[WRP id=' . $post_id . ']" readonly="readonly" />';
				break;
			default :
				break;
		}
	}

// Hook into the 'init' action
add_action( 'init', 'ResponsivePortfolio', 0 );

/**
 * Add Meta Box & load required CSS and JS for interface
 */
add_action( 'admin_init', 'ResponsivePortfolio_init' );
function ResponsivePortfolio_init() {
	add_meta_box( 'ResponsivePortfolio_meta', esc_html__( 'Add New Images', WEBLIZAR_RP_TEXT_DOMAIN ), 'responsive_portfolio_function', 'responsive-portfolio', 'normal', 'high' );
	add_action( 'save_post', 'responsive_portfolio_meta_save' );
	add_meta_box( esc_html__( 'Plugin Shortcode', WEBLIZAR_RP_TEXT_DOMAIN ), esc_html__( 'Plugin Shortcode', WEBLIZAR_RP_TEXT_DOMAIN ), 'rp_plugin_shortcode', 'responsive-portfolio', 'side', 'low' );
	add_meta_box( esc_html__( 'Responsive Portfolio Pro', WEBLIZAR_RP_TEXT_DOMAIN ), esc_html__( 'Responsive Portfolio Pro', WEBLIZAR_RP_TEXT_DOMAIN ), 'upgrade_rpp_function', 'responsive-portfolio', 'side', 'low' );
	add_meta_box( esc_html__( 'Show us some love, Rate Us', WEBLIZAR_RP_TEXT_DOMAIN ), esc_html__( 'Show us some love, Rate Us', WEBLIZAR_RP_TEXT_DOMAIN ), 'Rate_us_meta_box_function_portfolio', 'responsive-portfolio', 'side', 'low' );
	add_meta_box( esc_html__( 'Upgrade To Pro Version', WEBLIZAR_RP_TEXT_DOMAIN ), esc_html__( 'Upgrade To Pro Version', WEBLIZAR_RP_TEXT_DOMAIN ), 'wrp_upgrade_to_pro_function', 'responsive-portfolio', 'side', 'low' );

	//wp_enqueue_script('media-upload');
	wp_enqueue_script( 'theme-preview' );
	wp_enqueue_script( 'rpg-media-uploads', WEBLIZAR_RP_PLUGIN_URL . 'js/rpg-media-upload-script.js', array(
		'media-upload',
		'thickbox',
		'jquery'
	) );
	wp_enqueue_style( 'dashboard' );
	wp_enqueue_style( 'rpg-meta-css', WEBLIZAR_RP_PLUGIN_URL . 'css/rpg-meta.css' );
	wp_enqueue_style( 'thickbox' );

	//color-picker css n js
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'rpgp-color-picker-script1', plugins_url( 'js/wl-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	// enqueue style and script of code mirror
	wp_enqueue_style( 'rpgp_codemirror-css', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/codemirror.css' );
	wp_enqueue_style( 'rpgp_blackboard', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/blackboard.css' );
	wp_enqueue_style( 'rpgp_show-hint-css', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/show-hint.css' );

	wp_enqueue_script( 'rpgp_codemirror-js', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/codemirror.js', array( 'jquery' ) );
	wp_enqueue_script( 'rpgp_css-js', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/rpg-css.js', array( 'jquery' ) );
	wp_enqueue_script( 'rpgp_css-hint-js', WEBLIZAR_RP_PLUGIN_URL . 'css/codemirror/css-hint.js', array( 'jquery' ) );
}
/**
 * Rate Us Meta Box
 */
function Rate_us_meta_box_function_portfolio() { ?>
    <div align="center">
        <p><?php esc_html_e( "Please Review & Rate Us On WordPress", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
        <a class="upgrade-to-pro-demo .fag-rate-us" style=" text-decoration: none; height: 40px; width: 40px;"
           href="http://wordpress.org/plugins/responsive-portfolio/" target="_blank">
            <span class="dashicons dashicons-star-filled"></span>
            <span class="dashicons dashicons-star-filled"></span>
            <span class="dashicons dashicons-star-filled"></span>
            <span class="dashicons dashicons-star-filled"></span>
            <span class="dashicons dashicons-star-filled"></span>
        </a>
    </div>
    <div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
        <a href="http://wordpress.org/plugins/responsive-portfolio/" target="_blank" class="button button-primary button-hero"><?php esc_html_e( "RATE US", WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
    </div>
	<?php
}
function wrp_upgrade_to_pro_function() { ?>
    <div class="upgrade-to-pro-demo" style="text-align:center;margin-bottom:10px;margin-top:10px;">
        <a href="http://demo.weblizar.com/responsive-portfolio-pro/" target="_new" class="button button-primary button-hero"><?php esc_html_e( "View Live Demo", WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
    </div>
    <div class="upgrade-to-pro-admin-demo" style="text-align:center;margin-bottom:10px;">
        <a href="http://weblizar.com/plugins/responsive-portfolio-pro/" target="_new" class="button button-primary button-hero"><?php esc_html_e( "View Admin Demo", WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
    </div>
    <div class="upgrade-to-pro" style="text-align:center;margin-bottom:10px;">
        <a href="http://weblizar.com/plugins/responsive-portfolio-pro/" target="_new" class="button button-primary button-hero"><?php esc_html_e( "Upgarde To Pro", WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
    </div>
	<?php
}

function upgrade_rpp_function() {
	$imgpath = WEBLIZAR_RP_PLUGIN_URL . "images/rpp_pro.jpg";
	?>
    <div class="">
        <div class="update_pro_button">
			<a target="_blank" href="https://weblizar.com/plugins/responsive-portfolio-pro/"><?php esc_html_e( "Buy Now $19", WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
        </div>
        <div class="update_pro_image">
            <img class="rpp_getpro" src="<?php echo esc_url($imgpath); ?>">
        </div>
        <div class="update_pro_button">
            <a class="upg_anch" target="_blank" href="https://weblizar.com/plugins/responsive-portfolio-pro/">
				<?php esc_html_e( "Buy Now $19", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
			</a>
        </div>
    </div>
	<?php
}

/**
 *plugin shortcode
 */
function rp_plugin_shortcode() { ?>
    <p><?php esc_html_e( "Use below shortcode in any Page/Post to publish your Responsive Portfolio", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
    <input readonly="readonly" type="text" value="<?php echo "[WRP id=" . get_the_ID() . "]"; ?>">
	<?php
}
/**
 * Meta box interface design
 */
function responsive_portfolio_function() {
	$rpg_all_photos_details = unserialize( get_post_meta( get_the_ID(), 'rpg_all_photos_details', true ) );
	$TotalImages            = get_post_meta( get_the_ID(), 'rpg_total_images_count', true );
	$i                      = 1;
	?>
    <input type="hidden" id="count_total" name="count_total" value="<?php if ( $TotalImages == 0 ) {
		echo 0;
	} else {
		echo esc_html($TotalImages);
	} ?>"/>
    <div style="clear:left;"></div>
	<?php
	/* load saved photos into gallery */
	if ( $TotalImages ) {
		foreach ( $rpg_all_photos_details as $rpg_single_photos_detail ) {
			$name = $rpg_single_photos_detail['rpg_image_label'];
			$url  = $rpg_single_photos_detail['rpg_image_url'];
			$link = $rpg_single_photos_detail['rpg_link'];
			?>
            <div class="rpg-image-entry" id="rpg_img<?php echo esc_attr($i); ?>">
                <a class="gallery_remove" href="#gallery_remove" id="rpg_remove_bt<?php echo esc_attr($i); ?>" onclick="remove_meta_img(<?php echo esc_attr($i); ?>)">
				   <img src="<?php echo WEBLIZAR_RP_PLUGIN_URL . 'images/Close-icon-new.png'; ?>"/>
				</a>
                <img src="<?php echo esc_url( $url ); ?>" class="rpg-meta-image" alt="" style="">
                <input type="button" id="upload-background-<?php echo esc_attr($i); ?>" name="upload-background-<?php echo esc_attr($i); ?>"
                       value="Upload Image" class="button-primary" onClick="weblizar_image('<?php echo esc_attr($i); ?>')"/>
                <input type="text" id="rpg_img_url<?php echo esc_attr($i); ?>" name="rpg_img_url<?php echo esc_attr($i); ?>"
                       class="rpg_label_text" value="<?php echo esc_url($url); ?>" readonly="readonly" style="display:none;"/>
                <input type="text" id="image_label<?php echo esc_attr($i); ?>" name="image_label<?php echo esc_attr($i); ?>"
                       placeholder="Enter Image Label" class="rpg_label_text" value="<?php echo esc_attr($name); ?>">
                <input type="text" id="rpg_link<?php echo esc_attr($i); ?>" name="rpg_link<?php echo esc_attr($i); ?>"
                       placeholder="Enter Image URL" class="rpg_label_text" value="<?php echo esc_url($link); ?>">
            </div>
			<?php
			$i ++;
		} // end of foreach
	} else {
		$TotalImages = 0;
	}
	?>

    <div id="append_rpg_img"></div>
    <div class="rpg-image-entry add_rpg_new_image" onclick="add_rpg_meta_img()">
        <div class="dashicons dashicons-plus"></div>
        <p><?php esc_html_e( 'Add New Image', WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
    </div>
    <div style="clear:left;"></div>
    <script>
        var rpg_i = parseInt(jQuery("#count_total").val());
        function add_rpg_meta_img() {
            rpg_i = rpg_i + 1;
            var rpg_output = '<div class="rpg-image-entry" id="rpg_img' + rpg_i + '">' +
                '<a class="gallery_remove" href="#gallery_remove" id="rpg_remove_bt' + rpg_i + '"onclick="remove_meta_img(' + rpg_i + ')"><img src="<?php echo WEBLIZAR_RP_PLUGIN_URL . 'images/Close-icon-new.png'; ?>" /></a>' +
                '<img src="<?php echo WEBLIZAR_RP_PLUGIN_URL . 'images/rpg-default-new.jpg'; ?>" class="rpg-meta-image" alt=""  style="">' +
                '<input type="button" id="upload-background-' + rpg_i + '" name="upload-background-' + rpg_i + '" value="Upload Image" class="button-primary" onClick="weblizar_image(' + rpg_i + ')" />' +
                '<input type="text" id="rpg_img_url' + rpg_i + '" name="rpg_img_url' + rpg_i + '" class="rpg_label_text"  value="<?php echo WEBLIZAR_RP_PLUGIN_URL . 'images/rpg-default-new.jpg'; ?>"  readonly="readonly" style="display:none;" />' +
                '<input type="text" id="image_label' + rpg_i + '" name="image_label' + rpg_i + '" placeholder="Enter Image Label" class="rpg_label_text"   >' +
                '<input type="text" id="rpg_link' + rpg_i + '" name="rpg_link' + rpg_i + '" placeholder="Enter Image URL" class="rpg_label_text"   >' +
                '</div>';
            jQuery(rpg_output).hide().appendTo("#append_rpg_img").slideDown(500);
            jQuery("#count_total").val(rpg_i);
        }

        function remove_meta_img(id) {
            jQuery("#rpg_img" + id).slideUp(600, function () {
                jQuery(this).remove();
            });

            count_total = jQuery("#count_total").val();
            count_total = count_total - 1;
            var id_i = id + 1;

            for (var i = id_i; i <= rpg_i; i++) {
                var j = i - 1;
                jQuery("#rpg_remove_bt" + i).attr('onclick', 'remove_meta_img(' + j + ')');
                jQuery("#rpg_remove_bt" + i).attr('id', 'rpg_remove_bt' + j);
                jQuery("#rpg_img_url" + i).attr('name', 'rpg_img_url' + j);
                jQuery("#image_label" + i).attr('name', 'image_label' + j);
                jQuery("#rpg_img_url" + i).attr('id', 'rpg_img_url' + j);
                jQuery("#image_label" + i).attr('id', 'image_label' + j);

                jQuery("#rpg_img" + i).attr('id', 'rpg_img' + j);
            }
            jQuery("#count_total").val(count_total);
            rpg_i = rpg_i - 1;
        }
    </script>
	<?php
}

/*** Save All Photo Gallery Images ***/
function responsive_portfolio_meta_save() {
	if ( isset( $_POST['post_ID'] ) ) {
		$post_ID   = $_POST['post_ID'];
		$post_type = get_post_type( $post_ID );
		if ( $post_type == 'responsive-portfolio' ) {
			$TotalImages = $_POST['count_total'];
			$ImagesArray = array();
			if ( $TotalImages ) {
				for ( $i = 1; $i <= $TotalImages; $i ++ ) {
					$image_label   = sanitize_text_field( "image_label" . $i );
					$name          = sanitize_text_field( $_POST[ 'image_label' . $i ] );
					$url           = sanitize_text_field( $_POST[ 'rpg_img_url' . $i ] );
					$link          = sanitize_text_field( $_POST[ 'rpg_link' . $i ] );
					$ImagesArray[] = array(
						'rpg_image_label' => $name,
						'rpg_image_url'   => $url,
						'rpg_link'        => $link,
					);
				}
				update_post_meta( $post_ID, 'rpg_all_photos_details', serialize( $ImagesArray ) );
				update_post_meta( $post_ID, 'rpg_total_images_count', $TotalImages );
			} else {
				$TotalImages = 0;
				update_post_meta( $post_ID, 'rpg_total_images_count', $TotalImages );
				$ImagesArray = array();
				update_post_meta( $post_ID, 'rpg_all_photos_details', serialize( $ImagesArray ) );
			}
		}
	}
}

/*** Weblizar Responsive Gallery Short Code Detect Function **/

function WeblizarResponsivePortfolioShortCodeDetect() {
	global $wp_query;
	$Posts   = $wp_query->posts;
	$Pattern = get_shortcode_regex();
	foreach ( $Posts as $Post ) {
		if ( preg_match_all( '/' . $Pattern . '/s', $Post->post_content, $Matches ) && array_key_exists( 2, $Matches ) && in_array( 'WRP', $Matches[2] ) ) {
			//js scripts
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-litelighter', WEBLIZAR_RP_PLUGIN_URL . 'js/jquery-litelighter.js', array( 'jquery' ) );
			wp_enqueue_script( 'jquery-rebox', WEBLIZAR_RP_PLUGIN_URL . 'js/jquery-rebox.js', array( 'jquery' ) );

			wp_enqueue_script( 'modernizr.custom', WEBLIZAR_RP_PLUGIN_URL . 'js/modernizr.custom.js', array( 'jquery' ) );
			wp_enqueue_script( 'imagesloaded11', WEBLIZAR_RP_PLUGIN_URL . 'js/masonry.pkgd.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'imagesloaded', WEBLIZAR_RP_PLUGIN_URL . 'js/imagesloaded.js', array( 'jquery' ) );
			wp_enqueue_script( 'classie', WEBLIZAR_RP_PLUGIN_URL . 'js/classie.js', array( 'jquery' ) );
			wp_enqueue_script( 'AnimOnScroll', WEBLIZAR_RP_PLUGIN_URL . 'js/AnimOnScroll.js', array( 'jquery' ) );

			//css scripts
			wp_enqueue_style( 'bootstrap', WEBLIZAR_RP_PLUGIN_URL . 'css/bootstrap-latest/bootstrap.min.css' );
			wp_enqueue_style( 'rpgp-img-gallery-css', WEBLIZAR_RP_PLUGIN_URL . 'css/img-gallery.css' );
			wp_enqueue_style( 'component', WEBLIZAR_RP_PLUGIN_URL . 'css/component.css' );
			wp_enqueue_style( 'jquery-rebox-css', WEBLIZAR_RP_PLUGIN_URL . 'css/jquery-rebox.css' );

			//font awesome css
			wp_enqueue_script( 'hover-img', WEBLIZAR_RP_PLUGIN_URL . 'js/jquery.hoverdir-top.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'lightbox-script', WEBLIZAR_RP_PLUGIN_URL . 'js/lightbox-script.js', array( 'jquery' ), '', true );

			break;
		} //end of if
	} //end of foreach
}

add_action( 'wp_footer', 'WeblizarResponsivePortfolioShortCodeDetect' );

/**
 * Settings Page for Responsive Gallery
 */
add_action( 'admin_menu', 'WRP_SettingsPage' );
function WRP_SettingsPage() {
	add_submenu_page( 'edit.php?post_type=responsive-portfolio', esc_html__( 'Settings', WEBLIZAR_RP_TEXT_DOMAIN ), esc_html__( 'Settings', WEBLIZAR_RP_TEXT_DOMAIN ), 'administrator', 'image-portfolio-settings', 'image_portfolio_settings_page_function' );
	add_submenu_page( 'edit.php?post_type=responsive-portfolio', 'Pro Screenshots', 'Pro Screenshots', 'administrator', 'get-responsive-portfolio-pro-plugin', 'get_portfolio_pro_page_function' );
	add_submenu_page( 'edit.php?post_type=responsive-portfolio', 'Recommendation', 'Recommendation', 'administrator', 'rp-plugin-recommendation', 'RP_plugin_recommendation' );
}

/*** Photo Gallery Settings Page ***/
function image_portfolio_settings_page_function() {
	//css
	wp_enqueue_style( 'font-awesome-5', WEBLIZAR_RP_PLUGIN_URL . 'css/all.min.css' );
	require_once( "responsive-portfolio-settings.php" );
}

/*** Get Responsive Portfolio Pro Plugin Page ***/
function get_portfolio_pro_page_function() {
	//css
	wp_enqueue_style( 'font-awesome-5', WEBLIZAR_RP_PLUGIN_URL . 'css/all.min.css' );
	wp_enqueue_style( 'wl-pricing-table-css', WEBLIZAR_RP_PLUGIN_URL . 'css/pricing-table.css' );
	wp_enqueue_style( 'bootstrap', WEBLIZAR_RP_PLUGIN_URL . 'css/bootstrap-latest/bootstrap.min.css' );
	require_once( "get-responsive-gallery-pro.php" );
}


function RP_plugin_recommendation() {
	//css
	wp_enqueue_style( 'rp-recom-css', WEBLIZAR_RP_PLUGIN_URL . 'css/recom.css' );
	require_once( "recommendations.php" );
}

// Review Notice Box
add_action( "admin_notices", "resp_admin_notice_resport" );
function resp_admin_notice_resport() {
	global $pagenow;
	$resp_screen = get_current_screen();
	if ( $pagenow == 'edit.php' && $resp_screen->post_type == "responsive-portfolio" ) {
		include( 'responsive-portfolio-banner.php' );
	}
}

// Add settings link on plugin page
$rport_plugin_name = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$rport_plugin_name", 'rport_links' );
function rport_links( $links ) {
	$rportfolio_link     = '<a style="font-weight:700; color:#e35400" href="https://weblizar.com/plugins/responsive-portfolio-pro/" target="_blank">'. esc_html__('Go Pro', WEBLIZAR_RP_TEXT_DOMAIN).'</a>';
	$rport_settings_link = '<a href="edit.php?post_type=responsive-portfolio">'. esc_html__('Settings', WEBLIZAR_RP_TEXT_DOMAIN).'</a>';
	array_unshift( $links, $rport_settings_link );
	array_unshift( $links, $rportfolio_link );

	return $links;
}

/*** Responsive Gallery Short Code [WRG] ***/
require_once( "responsive-portfolio-short-code.php" );
function rpffile() {
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'rpffile' );
?>

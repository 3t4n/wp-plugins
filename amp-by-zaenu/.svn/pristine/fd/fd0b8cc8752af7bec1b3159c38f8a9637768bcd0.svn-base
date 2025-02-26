<?php
/**
 * @package AMP by Zaenu
/*
Plugin Name: AMP by Zaenu
Plugin URI: https://wordpress.org/plugins/amp-by-zaenu/
Description: A simple amp page for your lovely sites.
Version: 1.2.1
Author: Zaenu
Author URI: https://www.facebook.com/zaenuromli
License: GPLv2
*/

// definisyon
define( 'zaenu_dir', plugin_dir_path( __FILE__ ) );
define('EP_PERMALINK', 1);
define( 'AMP_QUERY_VAR', apply_filters( 'amp_query_var', 'amp' ) );	
// end of definisyon

// activation and deactivation
class amp_by_zaenu_init
{
    public static function amp_by_zaenu_aktivasi(){
        touch(get_template_directory().'/amp-single.php');
		if($wrote = fopen(get_template_directory().'/amp-single.php','w')){
			
			require_once( zaenu_dir . 'amp-sample.php' );
			fwrite($wrote, $konten);
			fclose($wrote);
		}
		add_option('zaenu_logo', '', '', 'yes');
		add_option('zaenu_icon', '', '', 'yes');
		add_option('zaenu_analytics', '', '', 'yes');
		add_option('zaenu_adsenseid', '', '', 'yes');
		add_option('zaenu_adsenseslot', '', '', 'yes');
		 
		if ( is_admin() ){
			 add_action( 'admin_init', 'zaenuset' );
			 }
		function zaenuset() {
			register_setting( 'gulast', 'zaenu_logo' );
			register_setting( 'gulast', 'zaenu_icon' );
			register_setting( 'gulast', 'zaenu_analytics' );
			register_setting( 'gulast', 'zaenu_adsenseid' );
			register_setting( 'gulast', 'zaenu_adsenseslot' );
			}
	}

    public static function amp_by_zaenu_delet(){
		$file = get_template_directory().'/amp-single.php';
        if(is_file($file)){
			unlink($file);
		 }
    }
}
register_activation_hook( __FILE__, array('amp_by_zaenu_init', 'amp_by_zaenu_aktivasi' ));
register_deactivation_hook( __FILE__, array('amp_by_zaenu_init', 'amp_by_zaenu_delet' ));
// end of activation and deactivation

// hook menu
function amp_by_zaenu_menu_hook() {
     add_options_page("AMP by Zaenu", "AMP by Zaenu", 1, "amp_by_zaenu_setting", "amp_by_zaenu_admin");
}
add_action('admin_menu', 'amp_by_zaenu_menu_hook');

function amp_by_zaenu_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=amp_by_zaenu_setting">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$linknya = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$linknya", 'amp_by_zaenu_settings_link' );
// end of hook menu

// inject meta tag
function amp_by_zaenu_injek_head() {
	if ( is_single() ) {
		echo '<link rel="amphtml" href="'.get_the_permalink().'amp/">';
		}
	}
add_action('wp_head', 'amp_by_zaenu_injek_head');
// enf of inject meta tag

// init end point
function amp_by_zaenu_endpoint() {
    add_rewrite_endpoint(AMP_QUERY_VAR, EP_PERMALINK);
}
add_action( 'init', 'amp_by_zaenu_endpoint' );
// end of init end point

// init amp page
add_filter( 'template_include', 'amp_by_zaenu_template_init', 99 );
function amp_by_zaenu_template_init( $template ) {
	if( get_query_var( AMP_QUERY_VAR, false ) !== false ) {
		if ( is_single() ) {
			$template = get_template_directory().'/amp-single.php';
		}
	}
	return $template;
}
// end of init amp page

// init script
function amp_by_zaenu_add_script(){ 
    wp_enqueue_media();
    wp_enqueue_script('zaenu-uploader',plugin_dir_url( __FILE__ ).'js/uploader.js', array('jquery'), false, true );
    wp_register_script( 'zaenu-aplot', plugin_dir_url( __FILE__ ).'js/aplot.js' );
    wp_enqueue_script( 'zaenu-aplot' );
}
add_action('admin_enqueue_scripts', 'amp_by_zaenu_add_script');
// end of init script

// simple excerpt
function amp_by_zaenu__cuplikan($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '';
	} else {
		echo $excerpt;
	}
}
// end of simple excerpt

// remove paging
add_action( 'the_post', 'amp_by_zaenu_removing_nex', 99);
function amp_by_zaenu_removing_nex ( $post ) {
    if ( (get_query_var( AMP_QUERY_VAR, false ) !== false) && (false !== strpos( $post->post_content, '<!--nextpage-->' )) ) 
    { 
        $GLOBALS['pages']     = [ $post->post_content ];
        $GLOBALS['numpages']  = 0;
        $GLOBALS['multipage'] = false;
    }
};
// end of remove paging

// removing caption
add_filter( 'img_caption_shortcode', 'amp_by_zaenu_removing_caption', 10, 3 );
function amp_by_zaenu_removing_caption( $output, $attr, $content ) {
    if ( is_feed() )
        return $output;
    $defaults = array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    );
    $attr = shortcode_atts( $defaults, $attr );
	if( get_query_var( AMP_QUERY_VAR, false ) !== false ) {
    if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
        return $content;
    $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
    $attributes .= ' class="sld wp-caption ' . esc_attr( $attr['align'] ) . '"';
    $attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';
    $output = '';
    $output .= do_shortcode( $content );
    $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';
    $output .= '';
    return $output;
	}
}
// end of removing caption

// admin setting page
function amp_by_zaenu_admin() {
	
	if($_POST['zaenu_submit'] && isset($_POST['zaenu_submit'])) {
        update_option('zaenu_logo', $_POST['zaenu_logo']);
        update_option('zaenu_icon', $_POST['zaenu_icon']);
        update_option('zaenu_analytics', $_POST['zaenu_analytics']);
        update_option('zaenu_adsenseid', $_POST['zaenu_adsenseid']);
        update_option('zaenu_adsenseslot', $_POST['zaenu_adsenseslot']);
        echo '<div class="updated"><p><strong>Updated!</strong></p></div>';
		
		$logos = get_option('zaenu_logo');
		$icons = get_option('zaenu_icon');
		$analytics = get_option('zaenu_analytics');
		$adsid = get_option('zaenu_adsenseid');
		$adslot = get_option('zaenu_adsenseslot');
		if($wrote = fopen(get_template_directory().'/amp-single.php','w')){
			$fixreplace1 = "#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is";
			$fixreplace2 = '#(<[a-z ]*)(style=("|\\\')(.*?)("|\\\'))([a-z ]*>)#';
			$fixreplace3 = "Konten Video tersedia di <a target='_blank' href='".get_the_permalink()."'>".get_the_title()."</a>";
			$fixreplace4 = "'\\\\1\\\\6'";
			require_once( zaenu_dir . 'amp-single.php' );
			fwrite($wrote, $konten);
			fclose($wrote);
		}
    };	
    $zaenu_logo = get_option('zaenu_logo');
    $zaenu_icon = get_option('zaenu_icon');
    $zaenu_analytics = get_option('zaenu_analytics');
    $zaenu_adsenseid = get_option('zaenu_adsenseid');
    $zaenu_adsenseslot = get_option('zaenu_adsenseslot');
	?>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Oswald');
		h2.titls{font-family:'Oswald',sans-serif;font-weight:700;border-bottom:1px #999 solid;letter-spacing:0.05em;margin-bottom:0;padding-bottom:20px;}
		form.zaenu-form{display:block;position:relative;margin:0 auto;font-family: 'Oswald', sans-serif;}
		.zaenu-control{display:block;position:relative;margin:0 auto;padding:10px 20px;border-bottom:1px solid #999;}
		.zaenu-control label{font-family:'Oswald',sans-serif;font-size:15px;line-height:18px;margin-right:10px;width:250px;display:inline-block;font-weight:700;text-transform:uppercase;cursor:pointer;letter-spacing:0.05em;}
		form.zaenu-form input.zaenu-text{font-family:'Oswald',sans-serif;font-weight:400;font-size:15px;line-height:18px;color:#000;height:auto;background:#fff;border:none;padding:5px;letter-spacing:0.02em;margin-right:10px;}
		form.zaenu-form input.zaenu-button{font-family:'Oswald',sans-serif;font-weight:400;font-size:15px;line-height:18px;color:#fff;height:auto;background:#00AAEA;border:none;padding:5px 10px;letter-spacing:0.05em;text-transform:uppercase;cursor:pointer;border-radius:3px;}
		.notip{display:block;padding:20px;background:#FFF;color:#000;font-size:14px;line-height:17px;border-left:5px red solid;}
	</style>
	<div class="wrap">
		<div class="notip">Important! Don't forget to update your permalink first! <a href="<?php echo admin_url();?>options-permalink.php">Click Here!</a></div>
		<?php    echo "<h2 class='titls'>" . __( 'AMP SETTING', 'amp_by_zaenu_admin' ) . "</h2>"; ?>
		<form class="zaenu-form" name="zaenu_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
			<input type="hidden" name="zaenu_hidden" value="Y">
			<div class="zaenu-control">
				<label for="zaenu_button">
					<?php _e("Logo : ","amp_by_zaenu_admin"); ?>
				</label>
				<input class="zaenu-text" type="text" name="zaenu_logo" id="zaenu_logo" value="<?php echo $zaenu_logo;?>" size="60" readonly="yes"/>
				<input class="zaenu-button" type="button" name="zaenu_button" id="zaenu_button" value="upload" size="20"/>
			</div>
			<div class="zaenu-control">
				<label for="zaenu_button">
					<?php _e("Favicon : ","amp_by_zaenu_admin"); ?>
				</label>
				<input class="zaenu-text" type="text" name="zaenu_icon" id="zaenu_icon" value="<?php echo $zaenu_icon;?>" size="60" readonly="yes"/>
				<input class="zaenu-button" type="button" name="zaenu_button2" id="zaenu_button2" value="upload" size="20"/>
			</div>
			<div class="zaenu-control">
				<label for="zaenu_button">
					<?php _e("Google Analytics ID : ","amp_by_zaenu_admin"); ?>
				</label>
				<input class="zaenu-text" placeholder="UA-123456-1" type="text" name="zaenu_analytics" id="zaenu_analytics" value="<?php echo $zaenu_analytics;?>" size="60"/>
			</div>
			<div class="zaenu-control">
				<label for="zaenu_button">
					<?php _e("Google Adsense Client ID : ","amp_by_zaenu_admin"); ?>
				</label>
				<input class="zaenu-text" placeholder="ca-pub-123456789" type="text" name="zaenu_adsenseid" id="zaenu_adsenseid" value="<?php echo $zaenu_adsenseid;?>" size="60"/><a target="_blank" href="https://support.google.com/adsense/answer/7183212?hl=en">See the documentation</a>
			</div>
			<div class="zaenu-control">
				<label for="zaenu_button">
					<?php _e("Google Adsense Slot : ","amp_by_zaenu_admin"); ?>
				</label>
				<input class="zaenu-text" placeholder="123456" type="text" name="zaenu_adsenseslot" id="zaenu_adsenseslot" value="<?php echo $zaenu_adsenseslot;?>" size="60"/><a target="_blank" href="https://support.google.com/adsense/answer/7183212?hl=en">See the documentation</a>
			</div>
			<p class="submit">
			<input class="zaenu-button" type="submit" name="zaenu_submit" value="<?php _e('SAVE', 'amp_by_zaenu_admin' ) ?>" />
			</p>
		</form>
	</div> 
<?php
}
// end of admin setting page
;?>
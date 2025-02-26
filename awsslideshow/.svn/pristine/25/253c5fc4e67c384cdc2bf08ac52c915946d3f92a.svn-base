<?php
/**
 * @package AWSSlideshow
 */
/*
Plugin Name: AWS Slideshow
Plugin URI: http://awstheme.com/
Description: AWS Slideshow will build slideshows which you think it is complicated to turn out very simple, because it has a workspace for composing slideshow to be very easy for using, you only click and run.
Version: 1.0
Author: AWSTheme
Author URI: http://www.awstheme.com
License: GPLv2 or later
Text Domain: awsslideshow
*/

defined('ABSPATH') or die("No script kiddies please!");

class AWS_Slideshow_Admin {
	
	protected static $_instance = null;
	
	public $version = '1.0';
	
	function __construct(){
		
		$this->define_constants();
		
		register_activation_hook(__FILE__, array($this, 'activate_plugin'));
		register_deactivation_hook(__FILE__, array($this, 'deactivated_plugin'));
		add_action( 'plugins_loaded', array($this, 'update_db_check') );
		
		add_action( 'init', array($this, 'admin_init') );
		add_action( 'admin_menu', array($this, 'admin_menu') );
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
		add_action( 'plugins_loaded', array($this, 'loadTextdomain') );
		add_action( 'wp_ajax_aws_slides', array($this, 'aws_slides') );
		add_action( 'wp_ajax_aws_save_slides', array($this, 'aws_save_slides') );
		add_action( 'widgets_init', array( $this, 'setup_environment_widgets' ) );
		add_shortcode( 'awsslideshow', array( $this, 'aws_shortcode') );
		
		$this->includes();
	}
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	public function loadTextdomain() {
		
		$locale = apply_filters( 'plugin_locale', get_locale(), 'awsslideshow' );

		load_plugin_textdomain('awsslideshow', false, plugin_basename( dirname( __FILE__ ) ) . '/languages');
	}
	
	private function define_constants() {
		define( 'AWS_PLUGIN_FILE', __FILE__ );
		define( 'AWS_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
		define( 'AWS_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
		define( 'AWS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		define( 'AWS_VERSION', $this->version );
		
		if ( ! defined( 'AWS_LOG_DIR' ) ) {
			define( 'AWS_LOG_DIR', ABSPATH . 'aws-logs/' );
		}
	}
	
	private function includes(){
		
		if( is_admin() ){
			
			require_once(AWS_PLUGIN_DIR_PATH.'/includes/class-aws-slideshows-list-table.php');
			require_once(AWS_PLUGIN_DIR_PATH.'/includes/class-aws-slideshows-model.php');
		}
		
	}
	
	function update_db_check(){
		global $awsslideshow_db_version;
		
		if ( get_site_option( 'awsslideshow_db_version' ) != $awsslideshow_db_version ) {
		        
		}
		
	}
	
	function activate_plugin( $plugin ) {
		
		global $awsslideshow_db_version;
		
		$awsslideshow_db_version = '1.0';
		
		$model	=	new AWS_Slideshows_Model();

		$model->install();
		
	    $admins = get_role( 'administrator' );
		
	    $admins->add_cap( 'manage_awsslideshow' );
	}
	
	function deactivated_plugin( $plugin ) {
				
		$model	=	new AWS_Slideshows_Model();

		$model->uninstall();
	
	    $admins = get_role( 'administrator' );

	    $admins->remove_cap( 'manage_awsslideshow' );
	}
	
	function admin_init() {
		
		
	}
	
	function admin_enqueue_scripts( $plugin ) {
		
		if( $plugin == 'toplevel_page_manage_awsslideshow') {
		
			wp_enqueue_style( 'awsslideshow-style', AWS_PLUGIN_DIR_URL . 'css/admin_stylesheet.css');
			
			wp_enqueue_media();
			wp_enqueue_script( 'webfont-script', '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js');
			
			wp_enqueue_script( 'minicolors', AWS_PLUGIN_DIR_URL . 'js/jquery-minicolors/jquery.minicolors.js', array( 'jquery' ), '1.0');
			
			wp_enqueue_script( 'awsslideshow-script', AWS_PLUGIN_DIR_URL . 'js/angularjs/main.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-core', 'jquery-ui-draggable', 'jquery-ui-resizable', 'jquery-ui-sortable', 'thickbox' ), '1.0', true);
			
			wp_enqueue_script( 'awsslideshow-style-script', AWS_PLUGIN_DIR_URL . 'js/script.js', array( 'jquery' ), '1.0', true);
			
			$data_localize_script = array('ajax_url' => admin_url('admin-ajax.php'), 'plugin_url' => AWS_PLUGIN_DIR_URL);
			
			if(isset($_GET['id']))
				$data_localize_script['id'] = $_GET['id'];
			
			wp_localize_script( 'awsslideshow-script', 'ajax_object', $data_localize_script);
		}
	}
	
	function enqueue_scripts() {
		
		if(is_admin()) return;
		
		wp_enqueue_style( 'awsslideshow-front-style', AWS_PLUGIN_DIR_URL . 'css/jquery_awsslideshow/awsslideshow.css');
		
		wp_enqueue_script( 'webfont-script', '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js');
		wp_enqueue_script( 'modernizr-script', AWS_PLUGIN_DIR_URL . 'js/jquery_awsslideshow/modernizr.js' );
		wp_enqueue_script( 'videojs-script', AWS_PLUGIN_DIR_URL . 'js/jquery_awsslideshow/videojs/video.js' );
		wp_enqueue_script( 'touchswipe-script', AWS_PLUGIN_DIR_URL . 'js/jquery_awsslideshow/jquery.touchSwipe.min.js', array('jquery') );
		wp_enqueue_script( 'awsslideshow-script', AWS_PLUGIN_DIR_URL . 'js/jquery_awsslideshow/jquery.awslideshow.js', array( 'jquery', 'webfont-script', 'modernizr-script', 'videojs-script' ));
		wp_localize_script( 'awsslideshow-script', 'awsslideshow_object',
			array('ajax_url' => admin_url('admin-ajax.php'), 'plugin_url' => AWS_PLUGIN_DIR_URL));
		
	}
	
	function setup_environment_widgets() {
		
		
	}
	
	function orderSlides($slides){
		
		
	}
	
	public function aws_shortcode( $atts, $content = nul ){
		
		require_once(AWS_PLUGIN_DIR_PATH.'/includes/class-aws-slideshows-model.php');
		
		$model		=	new AWS_Slideshows_Model();
		
		$itemsModel	=	$model->getItem($atts['id']);
		
		$data	=	json_decode($itemsModel->slide_data);
		
		
		
		$settings	=	$data->settings;
		
		$direction	=	$settings->direction;
		
		$setting	=	'';
		$items		=	'';
		$slides		=	$data->slides;
		
		
		usort($slides, function($a, $b){
			
			if ($a->orderIndex == $b->orderIndex) {
			        return 0;
			    }
			    return ($a->orderIndex < $b->orderIndex) ? -1 : 1;
		});
		
		foreach($settings as $name => $value){
			
			$setting .= 'data-'.strtolower($name).'="'.$value.'" ';
		}
		
		foreach($slides as $key => $slide){
			
			if(!$slide->settings->published) continue;
			
			$bg_effect_in	=	$slide->effectIn->name;
			$bg_effect_out	=	$slide->effectOut->name;
			
			
			if($direction == 'horizontal'){
				
				$bg_effect_in	=	$slide->h_effectIn->name;
				$bg_effect_out	=	$slide->h_effectOut->name;
			}
			
			if($direction == 'vertical'){
				
				$bg_effect_in	=	$slide->v_effectIn->name;
				$bg_effect_out	=	$slide->v_effectOut->name;
			}
			
			$background	=	'<div '.
							'data-effectin="'.$bg_effect_in.'"'.
							'data-effectout="'.$bg_effect_out.'" ';
							
			
			if($slide->styles->from == 'image'){
				
				$background	.=	' class="box_item_bg box_item_bg_image" data-from="image" '.
								'data-src="'.$slide->styles->bgSrc.'" ';
								
			}
			
			if($slide->styles->from == 'color'){
				
				$background	.=	' class="box_item_bg box_item_bg_color" data-from="color" '.
								'data-color="'.$slide->styles->bgColor.'" ';
								
			}
			
			if($slide->styles->from == 'video'){
				
				$background	.=	' class="box_item_bg box_item_bg_video" data-from="video" '.
								'data-src="'.$slide->styles->bgColor.'" '.
								'data-auto="false" ';
								
			}
			
			$background	.=	'></div>';
			
			$container_item	=	'<div class="box_container">';
			
			foreach($slide->items as $key => $item){
				
				$easing		=	($item->timing->name != 'custom')?$item->timing->name:'ease';
				
				$container_item	.=	'<div class="box_item box_item_'.$item->kind.'" '.'data-zindex="'.$item->zindex.'" '.
									'data-effect="'.$item->effectIn->name.'" '.'data-effectOut="'.$item->effectOut->name.'" '.
									'data-top="'.$item->top.'" '.'data-left="'.$item->left.'" '.
									'data-width="'.$item->width.'" '.'data-height="'.$item->height.'" '.
									'data-delay="'.$item->delay.'" '.'data-duration="'.$item->speed.'" '.
									'data-easing="'.$easing.'" '.'data-kind="'.$item->kind.'" ';
				
				if($item->kind == 'image'){
					
					$container_item .= 'data-src="'.$item->src_img.'" data-alt="'.(isset($item->src_alt)?$item->src_alt:'image').'"></div>';
				}
				
				if($item->kind == 'video'){
					
					$container_item .= 'data-src="'.$item->src.'" data-from="'.$item->from.'" data-auto="'.$item->isAuto.'"></div>';
				}
				
				if($item->kind == 'text'){
					
					$content	=	$item->content;
					
					$container_item .=	'data-fontname="'.(isset($item->fontName)?$item->fontName:'').'" '.
										'data-fontsize="'.$item->fontSize.'" '.
										'data-fontweight="'.$item->fontWeight.'" '.
										'data-color="'.(isset($item->color)?$item->color:'#000').'" '.
										'data-bgcolor="'.$item->bgColor.'" '.
										'data-padding="'.$item->padTop.' '.$item->padRight.' '.$item->padBottom.' '.$item->padLeft.'" '.
										'>';
					if(isset($item->link) && $item->link) {
						
						$container_item .= '<a href="'.$item->link.'" style="color:'.$item->color.';">'.$content.'</a>';
						
					}else{
						
						$container_item .= $content;
					}
					
					$container_item .= '</div>';
				}
			}
			
			$container_item	.=	'</div>';
			
			$pagination		=	'<div class="direction style-1">'.
								'<a href="#" class="nextSlide icon ion-ios-arrow-right"><span>Next Slide</span></a>'.
								'<a href="#" class="prevSlide icon ion-ios-arrow-left"><span>Prev Slide</span></a>'.
								'</div>';
						
			
			$items	.=	'<div class="box_items" data-duration="'.$slide->duration.'">'.$background.$container_item.'</div>';
			
		}

		$shortcode	=	'<div class="aws_slideshow_wrap" id="slideshow_'.$itemsModel->id.'" '.$setting.'><div class="box_inner">'.$items.'</div>'.$pagination.'</div>';
		
		return $shortcode;
	}
	
	public function aws_save_slides() {
		
		$request_body = file_get_contents('php://input');
		
		$data	=	$request_body;
		
		if(isset($data) && $data){
			
			$model	=	new AWS_Slideshows_Model();
			
			$model->store(array('id' => $_GET['id'], 'slide_data' => $data));
			
		}
				
		echo wp_send_json(json_decode($data));
		
		wp_die();
	}
	
	public function aws_slides(){
		
		$model	=	new AWS_Slideshows_Model();
		
		$data	=	$model->getItem($_GET['id']);
		
		if($data && isset($data->slide_data)){
			
			echo $data->slide_data;
			
		}else{
			
			echo wp_send_json(array('error' => true));
		}
		
		wp_die();
	}
	
	function admin_menu() {
		
		add_menu_page( 'Slideshow', 'AWS Slideshow', 'manage_options', 'manage_awsslideshow', array($this, 'manager_slideshows'), 'dashicons-images-alt' );
	}
	
	function manager_slideshows(){
		
		global $wpdb;

		$slideshowListTable	=	new	AWS_Slideshow_List_Table();
		
		$action	=	$slideshowListTable->current_action();
		
		switch($action){
			
			case 'new':
				
				include_once('views/slideshows/new.php');
				break;
			case 'edit':
				
				$model	=	new AWS_Slideshows_Model();
		
				$item	=	$model->getItem($_GET['id']);	
				
				include_once('views/slideshows/edit.php');
				break;
			break;
			case 'save':
				
				$model	=	new AWS_Slideshows_Model();
				
				$model->store($_POST);
				
				$slideshowListTable->prepare_items();
					
				include_once('views/slideshows/default.php');
				break;
			default:
				
				$slideshowListTable->prepare_items();
				
				include_once('views/slideshows/default.php');
				break;
		}
		
		
	}

}

$aws_slideshow	=	AWS_Slideshow_Admin::instance();



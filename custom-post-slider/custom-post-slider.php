<?php
/*
	Plugin Name: Custom post slider
	Plugin URI: http://templaza.com
	Description: Multiple slider with Featured Image post and easy options to config.
	Version: 1.0.0
	Author: tuyennv, templaza
	Author URI: http://templaza.com
	License: GPL2
*/

define( 'TZ_CUSTOM_POST_SLIDER_DIR', plugin_dir_path( __FILE__ ) );

$custom_post_slider = 'custom-post-slider';
	function tzcustom_modify_menu(){
		$page_cat = add_menu_page('Theme page title', 'Post Slider', 'delete_pages', 'tzcustom-slideshow', 'tzcustom_options', plugins_url('images/tzsidebar.png', __FILE__));
		add_submenu_page('tzcustom-slideshow', 'Post Slider', 'Post Slider', 'delete_pages', 'tzcustom-slideshow', 'tzcustom_options');
	}
	
	add_action('admin_menu','tzcustom_modify_menu');

	function tzcustom_options(){
		require 'tzcustom-admin.php';
	}
	function tzcustom_plugin_get_version() {
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];
	}
	
	define('tzcustom_url',WP_PLUGIN_URL."/custom-post-slider/");

	require 'tzcustom-db.php';
	
	/* ---------------------------------------------------------------------------------*/
	function tzcustom_enqueue() {
		wp_enqueue_style("tzcustomStyleSheet", plugins_url("tzcustom-style.css", __FILE__), FALSE);
		wp_enqueue_style("owlcss", plugins_url("css/owl.carousel.css", __FILE__),FALSE);
		wp_enqueue_style("owltheme", plugins_url("css/owl.theme.css", __FILE__), FALSE);
		wp_enqueue_style("owltransition", plugins_url("css/owl.transitions.css", __FILE__), FALSE);
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'tzcustom_front_script',tzcustom_url.'js/tzcustom.frnt.script.js' );
	}
	add_action( 'wp_enqueue_scripts', 'tzcustom_enqueue' );
	
	function tzload_custom_wp_admin_style() {
		global $wp_version;		
		if(isset($_GET['page'])){
		$pgslug = $_GET['page'];
		$menuslug = array('tzcustom-slideshow');
			if(!in_array($pgslug,$menuslug))
        		return;
       		 
			if($wp_version >= '3.5'){
				wp_enqueue_script( 'wp-color-picker' );
				wp_enqueue_style( 'wp-color-picker' );
			}
			else
			{
				wp_enqueue_style( 'farbtastic' );
  				wp_enqueue_script( 'farbtastic' );
			}
			wp_enqueue_script( 'tzcustom-js-script', tzcustom_url . 'js/tzcustom.script.js', array( 'jquery' ) );
			wp_enqueue_style("tzcustom_admin", plugins_url("css/tzcustom_slider_admin.css", __FILE__), FALSE);
			wp_localize_script( 'tzcustom-js-script', 'tzcustomajx', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'tzcustomAjaxReqChck' => wp_create_nonce( 'tzcustomauthrequst' )));
			
		}
	
	}
	add_action( 'admin_enqueue_scripts', 'tzload_custom_wp_admin_style' );
	
	/* ---------------------------------------------------------------------------------------*/
	
	register_activation_hook(WP_PLUGIN_DIR.'/custom-post-slider/custom-post-slider.php','set_tzcustom_options');
	register_deactivation_hook(WP_PLUGIN_DIR.'/custom-post-slider/custom-post-slider.php','unset_tzcustom_options');
	
	
	function unset_tzcustom_options(){
	}
	
	function tzcustom_update_db(){
		if(get_option('tzcustom-db-version') < 2){
			set_tzcustom_options();
		}
		if(get_option('tzcustom-db-version') && !get_option('tzcustom-update-notification')){
			update_option('tzcustom-update-notification','show');
		}
		update_option('tzcustom-curr-version','1.0.0');
	}
	add_action( 'plugins_loaded', 'tzcustom_update_db' );
	/* ---------------------------------------------------------------------------------------*/
	function tzcustom_image_sizes(){
	  if ( function_exists( 'add_image_size' ) ) { 
		  global $wpdb;
		  $rth = $wpdb->get_results( "select * from ".$wpdb->prefix."tzcustom_thumbnail");		
		  foreach($rth as $th){
			  add_image_size( $th->thumb_name,$th->width,$th->height, true); 
		  }
	  }
	  if(!function_exists('tzcustom_resize') && !class_exists('TZcustom_Resize'))
		require_once( 'tzcustom_resizer.php' );
	}
	add_action('wp_loaded', 'tzcustom_image_sizes');
	
	function tzcustom_excerpt_length_one( $length ) {
		
		return get_option('tzcustom_excerptlen_one');
	}
	
	function tzcustom_excerpt_length( $length ) {
		return get_option('tzcustom_excerptlen');
	}	
	add_action( "wp_ajax_tzcustomchkCategory", "tzcustomchkCategory" );
	add_action( "wp_ajax_tzcustomUpdateLabel", "tzcustomUpdateLabel" );
	add_action( "wp_ajax_tzcustomUpdateOpt", "tzcustomUpdateOpt" );
	add_action( "wp_ajax_tzcustomListPost", "tzcustomListPost" );
	add_action( "wp_ajax_tzcustomupdateSmethod", "tzcustomupdateSmethod" );
	
	function tzcustomUpdateLabel(){
		$nonce = $_POST['checkReq'];
		$fname = $_POST['f_name'];
		$fvalue = trim($_POST['f_value']);
		if(! defined( 'ABSPATH' ) || !wp_verify_nonce( $nonce, 'tzcustomauthrequst' )){
			echo "Unauthorized request.";
			exit;
		}
		update_option($fname,$fvalue);
		exit;
	}
	
	function tzcustomSanit($str){
		return sanitize_text_field($str);
	}

	function tzcustomchkCategory(){
		$nonce = $_POST['checkReq'];
		$posttype = $_POST['post_type'];
		if(! defined( 'ABSPATH' ) || !wp_verify_nonce( $nonce, 'tzcustomauthrequst' )){
			echo "Unauthorized request.";
			exit;
		}
		$catHtml = '';
		if($posttype == 'post'){
			$catHtml = '<th scope="row">Category</th><td><select name="tzcustom_category[]" multiple="multiple">';    
			$catList = get_categories();
			foreach($catList as $scat){	 
    			$catHtml .= '<option value="'.$scat->term_id.'">'.$scat->name.'</option>';
    		}
  		$catHtml .= '</select><span style="padding-left:10px; font-size:10px; font-style:italic; vertical-align:top;">[ * You can select multiple category ]</span></td>';			
		}
		else
		{
			$posttypeobj = get_post_type_object($posttype);
			if(in_array('category',$posttypeobj->taxonomies)){
				$catHtml = '<th scope="row">Category</th><td><select name="tzcustom_category[]" multiple="multiple">';    
				$catList = get_categories();
				foreach($catList as $scat){	 
					$catHtml .= '<option value="'.$scat->term_id.'">'.$scat->name.'</option>';
				}
			$catHtml .= '</select><span style="padding-left:10px; font-size:10px; font-style:italic; vertical-align:top;">[ * You can select multiple category ]</span></td>';
			}
		}
		echo $catHtml;
		exit;
	}
	function tzcustomUpdateOpt(){
		$nonce = $_POST['checkReq'];
		$optdata = $_POST['optdata'];
		
		if(! defined( 'ABSPATH' ) || !wp_verify_nonce( $nonce, 'tzcustomauthrequst' )){
			echo "Unauthorized request.";
			exit;
		}
		
		global $wpdb;
		$all_field = array();
		parse_str($optdata,$all_field);
		
		$optID = sanitize_text_field($all_field['opt_id']);
		$optfield = sanitize_text_field($all_field['opt_field']);
		
		unset($all_field['opt_id']);
		unset($all_field['opt_field']);
		
		$update_data = array();
		foreach($all_field as $fkey => $fval){
			if(is_array($fval)){
				$update_data[$fkey] = array_map('tzcustomSanit',$fval);
			}
			else
			{
				$update_data[$fkey] = sanitize_text_field($fval);
			}
		}
		
		$update_data = serialize($update_data);
		
		$q_chk = $wpdb->prepare("select template from ".$wpdb->prefix."tzcustom_optionset where ".$optfield." = '%s' and id = %d",$update_data,$optID);
		if(!$wpdb->get_results($q_chk)){
			$q_upd = $wpdb->prepare("update ".$wpdb->prefix."tzcustom_optionset set ".$optfield." = '%s' where id = %d",$update_data,$optID);
			if($wpdb->query($q_upd)){
				echo "Updated successfully.";
			}	
		}
		else
		{
			echo 'No change.';
		}
		exit;
	}
	function tzcustomListPost(){
		$nonce = $_POST['checkReq'];
		$ptype = $_POST['ptype'];
		$pmax = $_POST['pmax'];
		$porderBy = $_POST['porderBy'];
		$porder = $_POST['porder'];
		$plist = explode(',',$_POST['plist']);
		
		if(! defined( 'ABSPATH' ) || !wp_verify_nonce( $nonce, 'tzcustomauthrequst' )){
			echo "Unauthorized request.";
			exit;
		}
		$plistHtml = '';
		$lpargs = array(
				'post_type'      => $ptype,
				'posts_per_page' => $pmax,
				'orderby'		 => $porderBy,
				'order'			 => $porder
		);
		$pl_query = new WP_Query($lpargs); while ($pl_query->have_posts()) : $pl_query->the_post();
		if($plist && in_array(get_the_id(),$plist)){
			$plistHtml .= '<option value="'.get_the_id().'" selected="selected">'.get_the_title().'</option>';
		}
		else{
			$plistHtml .= '<option value="'.get_the_id().'">'.get_the_title().'</option>';
		}
		endwhile;wp_reset_query();
		echo $plistHtml;
		exit;
	}
	function tzcustomupdateSmethod(){
		$nonce = $_POST['checkReq'];
		$selnam = $_POST['selnam'];
		$selval = $_POST['selval'];
		
		if(! defined( 'ABSPATH' ) || !wp_verify_nonce( $nonce, 'tzcustomauthrequst' )){
			echo "Unauthorized request.";
			exit;
		}
		update_option($selnam,$selval);
		exit;
	}
	/* ---------------------------------------------------------------------------------------*/


function tz_custom_head_css(){
    wp_enqueue_script( 'owljs', plugins_url("js/owl.carousel.js", __FILE__), array(), '1.0.0', true );
}
add_action('wp_head','tz_custom_head_css');


	function tzcustom_slideshow($atts) {
		global $post;
		global $wpdb;
		$custom_post_slider = 'custom-post-slider';
		$current = $post->ID;
		
		if(is_array($atts) && array_key_exists('optset',$atts)){	
			$q1 = "select * from ".$wpdb->prefix."tzcustom_optionset where id = ".intval($atts['optset']);
			$res1 = $wpdb->get_results($q1);
			if($res1){
				$plist = unserialize($res1[0]->plist);
				$query = unserialize($res1[0]->query);
				$slider = unserialize($res1[0]->slider);
				$container = unserialize($res1[0]->container);
				$content = unserialize($res1[0]->content);
				$navigation = unserialize($res1[0]->navigation);
			}
			else return;	
			$sldshowID = $atts['optset'];	
		}
		else return;
		
		$qtype = get_option('tzcustomsmethod'.$sldshowID);
		$post_format = $query['tzcustom_post_format'];

			if($qtype == 'query'){
				if($post_format !='all') {
					$query_arg = array(
						'post_type' => ($query['tzcustom_post_types']) ? $query['tzcustom_post_types'] : 'post',
						'posts_per_page' => ($query['tzcustom_maxpost']) ? $query['tzcustom_maxpost'] : 10,
						'orderby' => ($query['tzcustom_order_by']) ? $query['tzcustom_order_by'] : 'date',
						'order' => ($query['tzcustom_order']) ? $query['tzcustom_order'] : 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array(
									'' . $post_format . ''
								),
							)
						)
					);
				} else{
					$query_arg = array(
						'post_type' => ($query['tzcustom_post_types']) ? $query['tzcustom_post_types'] : 'post',
						'posts_per_page' => ($query['tzcustom_maxpost']) ? $query['tzcustom_maxpost'] : 10,
						'orderby' => ($query['tzcustom_order_by']) ? $query['tzcustom_order_by'] : 'date',
						'order' => ($query['tzcustom_order']) ? $query['tzcustom_order'] : 'DESC'
					);
				}

				if($query['tzcustom_post_types'] && $query['tzcustom_post_types'] != "page"){
					if($query['tzcustom_post_types'] == "post"){
						if(isset($query['tzcustom_category'])){
							$query_arg['cat'] = implode(',',$query['tzcustom_category']);
						}
					}
					else
					{
						$post_type_obj = get_post_type_object( $query['tzcustom_post_types'] );
						if(in_array('category',$post_type_obj->taxonomies)){
							if(isset($query['tzcustom_category'])){
								$query_arg['cat'] = implode(',',$query['tzcustom_category']);
							}
						}
					}
				}
			}
			elseif($qtype == 'plist'){
				$query_arg = array(
					'post_type' 	 => ($plist['tzcustom_post_stypes']) ? $plist['tzcustom_post_stypes'] : 'post',
					'post__in'   	 => $plist['tzcustom_plist'],
					'posts_per_page' =>	($plist['tzcustom_plistmax']) ? $plist['tzcustom_plistmax'] : 10,
					'orderby'		 => ($plist['tzcustom_plistorder_by']) ? $plist['tzcustom_plistorder_by'] : 'date',
					'order'			 => ($plist['tzcustom_plistorder']) ? $plist['tzcustom_plistorder'] : 'DESC'
				);
			}

		
		$template = $res1[0]->template;
//		$theme_name = get_template();
//		$directory = "wp-content/themes/" . $theme_name . "/".$custom_post_slider."/";

		//get all image files with a .jpg extension.
//		$tzcustoms_layout = glob($directory . "*.php");

		$theme_part = get_template_directory();
		$directory = "" . $theme_part . "/custom-post-slider/";
		$directory_plg = TZ_CUSTOM_POST_SLIDER_DIR."/tpl_views/";
		$tzcustoms_theme_layout = glob($directory . "*.php");
		$tzcustoms_plg_layout = glob($directory_plg . "*.php");

		if(!empty($tzcustoms_theme_layout)){
		  $tzcustom_layouts = $tzcustoms_theme_layout;
		}else{
		  $tzcustom_layouts = $tzcustoms_plg_layout;
		}

		foreach($tzcustom_layouts as $tzcustom_layout  ){
			$filename = substr( $tzcustom_layout, ( strrpos( $tzcustom_layout, "/" ) +1 ) );
			$filenames = str_replace('.php','',$filename);

			 if($container['tzcustom_layout'] == $filenames){
			 require_once($tzcustom_layout);
			 $function_name = "tzcustom_".$container['tzcustom_layout']."";
			 return $function_name($sldshowID,$template, $plist,$query,$query_arg,$slider,$container,$content,$navigation);
			 }
		}
}
	
	add_shortcode('tzcustom-slideshow', 'tzcustom_slideshow');
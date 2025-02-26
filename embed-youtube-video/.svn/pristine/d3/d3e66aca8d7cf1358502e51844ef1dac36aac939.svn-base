<?php

/*

Plugin Name: Embed Youtube Video 

Description: This Plugin provide you options to embed YouTube video on your website with various options. You can set YouTube videos anywhere on your website.

Author: Geek Web Solution

Version: 1.0

Author URI: http://geekwebsolution.com/

*/

if ( ! defined( 'ABSPATH' ) ) exit;

	define( 'EMBED_YOUTUBE_VIDEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

	define( 'EMBED_YOUTUBE_VIDEO_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) ); 

	require_once( plugin_dir_path( __FILE__ ) . 'functions.php' );

	// register_activation_hook( __FILE__ , 'plugin_active_embed_youtube' ); // Active button

	add_action( 'admin_menu', 'evygk_menu_embed_youtube' );    // Add menu

	add_shortcode( 'EmbedYoutube', 'evygk_embedyoutube_shortcode' );  //Create shortcode

	add_action( 'wp_ajax_delete_action', 'evygk_delete_action' ); // Delete row

	add_action( 'admin_enqueue_scripts', 'evygk_enqueue_styles_scripts_embed' );
	// Creating tables in Single site installations
		function evygk_on_activate( $network_wide ) {
		    global $wpdb;
		    if ( is_multisite() && $network_wide ) {
		        // Get all blogs in the network and activate plugin on each one
		        $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
		        foreach ( $blog_ids as $blog_id ) {
		            switch_to_blog( $blog_id );
		            evygk_create_table();
		            restore_current_blog();
		        }
		    } else {
		        evygk_create_table();
		    }
		}

		function evygk_create_table() {
		    global $wpdb;
		    $table_name = $wpdb->prefix . 'youtube_embed_video_gk';

		    if( $wpdb->get_var( "show tables like '{$table_name}'" ) != $table_name ) {

		      $sql = "CREATE TABLE $table_name (
				  id int(50) NOT NULL AUTO_INCREMENT,
				  title varchar(1000) DEFAULT '' NOT NULL,
				  url_video varchar(1000) DEFAULT '' NOT NULL,
				  option_value varchar(1000) DEFAULT '' NOT NULL,
				  created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY  (id)
				);";
			$wpdb->query($sql);

		        // require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		        //add_option( EmailLog::DB_OPTION_NAME, EmailLog::DB_VERSION );
		    }
		}

		register_activation_hook( __FILE__, 'evygk_on_activate' );


		function evygk_on_create_blog( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {
		    if ( is_plugin_active_for_network( 'embed-youtube-video/embed-youtube-video.php' ) ) {
		        switch_to_blog( $blog_id );
		        evygk_create_table();
		        restore_current_blog();
		    }
		}
		add_action( 'wpmu_new_blog', 'evygk_on_create_blog', 10, 6 );



		function evygk_on_delete_blog( $tables ) {
		    global $wpdb;
		    $tables[] = $wpdb->prefix . 'youtube_embed_video_gk';
		    return $tables;
		}
		add_filter( 'wpmu_drop_tables', 'evygk_on_delete_blog' );

	add_action( 'wp_head', 'evygk_header_css_file' );
	function evygk_header_css_file(){

	        $css=EMBED_YOUTUBE_VIDEO_PLUGIN_DIR_URL."/style.css";                
	        wp_enqueue_style( 'main-embed-css', $css ); 
	    
	}

	
	function evygk_enqueue_styles_scripts_embed()
	{
	    if( is_admin() ) {              
	        $css=EMBED_YOUTUBE_VIDEO_PLUGIN_DIR_URL."/style.css";                
	        wp_enqueue_style( 'main-embed-css', $css ); 
	    }

	}
	function evygk_menu_embed_youtube()
	{ 
		add_menu_page('Embed Youtube Video', 'Embed Youtube Video', 'manage_options', 'embed-youtube-video-list');
		add_submenu_page( 'embed-youtube-video-list', 'Embed Youtube Video', 'Embed Youtube Video',
    	'manage_options', 'embed-youtube-video-list','evygk_options_menu_list');
		add_submenu_page( 'embed-youtube-video-list', 'Add New', 'Add New',
    	'manage_options', 'embed-youtube-video-add','evygk_options_menu_add');
	}

	function evygk_options_menu_add() 
	{
		if (!current_user_can('manage_options'))  {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}
			include( plugin_dir_path( __FILE__ ) . 'options.php' );
	}

	function evygk_options_menu_list() 
	{
		if (!current_user_can('manage_options'))  {

			wp_die( __('You do not have sufficient permissions to access this page.') );

		}
			include( plugin_dir_path( __FILE__ ) . 'options_list.php' );
	}
	
	
	function evygk_embedyoutube_shortcode( $atts ) 
	{
			$attr_code =extract(shortcode_atts( array(
		      'id' =>'',
		   	), $atts ));

		   	global $wpdb;
	 		$table_name = $wpdb->prefix . 'youtube_embed_video_gk';
			$getdata = $wpdb->get_row("SELECT * FROM $table_name WHERE id=".$id);
			if(!empty($getdata))
			{
				$options=json_decode($getdata->option_value);
				preg_match('/[\?\&]v=([^\?\&]+)/',$getdata->url_video,$matches);
				$idmatch = $matches[1];
				$opval=$getdata->option_value;
				$options=json_decode($opval); 
				if(!empty($options->width)){ $width="width=".$options->width; }else{ $width=''; }
				if(!empty($options->height)){ $height="height=".$options->height; }else{ $height=''; }
				if(!empty($options->color)){ $color="&color=".$options->color; }else{ $color=''; }
				if(!empty($options->autoplay)){ $autoplay="enablejsapi=1&autoplay=".$options->autoplay; }else{ $autoplay=''; }
				if(!empty($options->loop)){ $loop="&loop=".$options->loop; }else{ $loop='&loop=0'; }
				if(!empty($options->iv_load_policy)){ $iv_load_policy="&iv_load_policy=".$options->iv_load_policy; }else{ $iv_load_policy='&iv_load_policy=3'; }
				if(!empty($options->cc_load_policy)){ $cc_load_policy="&cc_load_policy=".$options->cc_load_policy; }else{ $cc_load_policy=''; }
				if(!empty($options->autohide)){ $autohide="&autohide=".$options->autohide; }else{ $autohide=''; }
				if(!empty($options->start)){ $start="&start=".$options->start; }else{ $start=''; }
				if(!empty($options->end)){ $end="&end=".$options->end; }else{ $end=''; }
				if(!empty($options->playlist)){ $playlist="&playlist=".$options->playlist; }else{ $playlist=''; }
				if(!empty($options->as_ratio)){ $stretch="&stretch=".$options->as_ratio; }else{ $stretch=''; }
				if(!empty($options->disable_keyboard)){ $disable_keyboard="&disablekb=".$options->disable_keyboard; }else{ $disable_keyboard=''; }
				if(!empty($options->genie_menu)){ $genie_menu="&egm=".$options->genie_menu; }else{ $genie_menu=''; }
				if(!empty($options->origin)){ $origin="&origin=".$options->origin; }else{ $origin=''; }
				if(!empty($options->allowfullscreen)){ $allowfullscreen="&fs='".$options->allowfullscreen."'"; }else{ $allowfullscreen='&fs=0'; }
				if(!empty($options->rel)){ $rel="&rel=".$options->rel; }else{ $rel='&rel=0'; }
				if(!empty($options->showinfo)){ $showinfo="&showinfo=".$options->showinfo; }else{ $showinfo=''; }
				$url='https://www.youtube.com/embed/'.$idmatch.'?'.$autoplay.$color.$loop.$iv_load_policy.$cc_load_policy.$autohide.$start.$end.$playlist.$stretch.$disable_keyboard.$genie_menu.$origin.$showinfo.$rel.$allowfullscreen;
		   		return '<div class="eyvgk_video_wrap"><iframe class="eyv_embedvideo"  src="'.$url.'"  '.$width.' '.$height.'></iframe></div>';
		   		
		    }
		    else
		    {
		    	return "<p>Invaild Video Id</p>";
		    }
	}
	
	function evygk_delete_action() 
	{
			global $wpdb; 
			$table_name = $wpdb->prefix . 'youtube_embed_video_gk';
			$id=sanitize_text_field($_POST['id']);
			$nonce=$_POST['wp_nonce'];
			if(wp_verify_nonce( $nonce, 'eyv_delete_gk' ))
			{
				$wpdb->delete($table_name,array( 'id' => $id ));
			}
	}
	?>
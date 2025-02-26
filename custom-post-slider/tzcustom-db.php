<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	global $tzcustomPlist;
	global $tzcustomQuery;
	global $tzcustomSlide;
	//global $tzcustomSlide2;
	global $tzcustomContainer;
	global $tzcustomContainer2;
	global $tzcustomContainer3;
	global $tzcustomContent;
	global $tzcustomContent2;
	global $tzcustomNavigation;
	
	$tzcustomPlist = array(
			"tzcustom_post_stypes" => "post",
			"tzcustom_plistmax" => "99",
			"tzcustom_plistorder_by" => "name",
			"tzcustom_plistorder" => "ASC",
			"tzcustom_plist" => array()
	);
	
	$tzcustomQuery = array(
			"tzcustom_post_types" => "post",
			"tzcustom_post_format" => "all",
			"tzcustom_maxpost" => "10",
			"tzcustom_order_by" => "date",
			"tzcustom_order" => "DESC"
	);
	
	$tzcustomSlide = array(
			"tzcustom_autoplay" => "true",
			"tzcustom_items" => "3",
			"tzcustom_slidespeed" => "200",
			"tzcustom_rewindspeed" => "1000",
			"tzcustom_ps_hover" => "false"
	);	
	//$tzcustomSlide2 = array_merge($tzcustomSlide,array("tzcustom_slider_type" => "standard"));
	

	$tzcustomContainer = array(
			"tzcustom_default_image" => "",
			"tzcustom_sld_width" => "600",
			"tzcustom_bgcolor" => "#FFFFFF",
			"tzcustom_layout" => "default",
	);

	$tzcustomContent = array(
			"tzcustom_overlay_width" => "30",
			"tzcustom_overlay_height" => "100",
			"tzcustom_overlay_color" => "#000000",
			"tzcustom_overlay_opacity" => "0.6",
			"tzcustom_text_align" => "left",
			"tzcustom_titleFcolor" => "#FFFFFF",
			"tzcustom_titleHcolor" => "#c9c9c9",
			"tzcustom_titleFsizeL" => "20",
			"tzcustom_excptFcolor" => "#FFFFFF",
			"tzcustom_excptFsizeL" => "14",
			"tzcustom_excerptlen" => "25",
			"tzcustom_excpt_visibility" => "always show",
			"tzcustom_image_display" => "yes",
			"tzcustom_title_display" => "yes",
			"tzcustom_excerpt_display" => "no",
			"tzcustom_link_target" => "_self"
	);

	$tzcustomNavigation = array(
			"tzcustom_show_nxtprev" => "true",
			"tzcustom_show_pagination" => "true"
	);
	
	function set_tzcustom_options(){
		global $wpdb;
		global $tzcustomPlist;
		global $tzcustomQuery;
		global $tzcustomSlide;
		global $tzcustomContainer;
		global $tzcustomContent;
		global $tzcustomNavigation;
		
		$db_version = get_option('tzcustom-db-version');
		$tzcustom_opt_table = $wpdb->prefix.'tzcustom_optionset';
		
		/*if($db_version){
			update_option('tzcustom-update-notification','show');
		}*/
		
		if(!get_option('tzcustomsmethod1')){
			add_option('tzcustomsmethod1','plist');
		}
		if(!get_option('tzcustomsmethod2')){
			add_option('tzcustomsmethod2','plist');
		}
		if(!get_option('tzcustomsmethod3')){
			add_option('tzcustomsmethod3','plist');
		}		
		
		if( $wpdb->get_results("SHOW TABLES LIKE '".$tzcustom_opt_table."'") && $db_version < 2 ){
			$wpdb->query("DROP TABLE ".$tzcustom_opt_table);
		}
		
		$ins_q = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."tzcustom_optionset (
  				`id` int(5) NOT NULL AUTO_INCREMENT,
  				`template` varchar(10) CHARACTER SET utf8 NOT NULL,
				`plist` text CHARACTER SET utf8 NOT NULL,
  				`query` text CHARACTER SET utf8 NOT NULL,
  				`slider` text NOT NULL,
  				`container` text NOT NULL,
  				`content` text NOT NULL,
  				`navigation` text NOT NULL,
  				PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
		$wpdb->query($ins_q);
		
		$ins_q2 = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."tzcustom_thumbnail (
				`id` int(2) NOT NULL AUTO_INCREMENT,
				`thumb_name` varchar(500) NOT NULL,
				`width` int(4) NOT NULL,
				`height` int(4) NOT NULL,
				`crop` varchar(5) NOT NULL,
				PRIMARY KEY (`id`)
			  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
		$wpdb->query($ins_q2);
		
		$q1 = "insert into ".$tzcustom_opt_table." (template,plist,query,slider,container,content,navigation) values('owl','".serialize($tzcustomPlist)."','".serialize($tzcustomQuery)."','".serialize($tzcustomSlide)."','".serialize($tzcustomContainer)."','".serialize($tzcustomContent)."','".serialize($tzcustomNavigation)."')";

		if(!$wpdb->get_results("select id from ".$tzcustom_opt_table." where template = 'owl'")){
			$wpdb->query($q1);
		}
		
		if(!$wpdb->get_results("select id from ".$wpdb->prefix."tzcustom_thumbnail where thumb_name = 'tzcustom-thumb-one'")){
			$wpdb->query( "insert into ".$wpdb->prefix."tzcustom_thumbnail (thumb_name,width,height,crop) values('tzcustom-thumb-one',600,220,'yes')");
		}
		update_option('tzcustom-db-version',2);
	}
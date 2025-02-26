<?php
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();


function wb3d_create_database(){
	global $wpdb;
	require_once ABSPATH.'/wp-admin/includes/upgrade.php';

	$products_sql="CREATE TABLE IF NOT EXISTS $wpdb->wb3d_setting(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`ver` text NOT NULL,
	`id_ves` text NOT NULL,
	`name` varchar(1000) NOT NULL,
	`effect_name` text NOT NULL,
	`effect_color` text DEFAULT NULL,
	`thumbnail` text NOT NULL,
	`setting` longtext NOT NULL,
	`css` longtext NOT NULL,
	`html` text NOT NULL,
	`event` text NOT NULL,
	`effects` longtext NOT NULL,
	`color` longtext NOT NULL,
	`wb3d_obj` text NOT NULL,
	`layerstext` text NOT NULL,
	`open_addons` text NOT NULL,
	`date` text NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT  CHARSET=utf8";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta($products_sql);

	$d=1;
	$messages= $wpdb->get_row($wpdb->prepare("SELECT id FROM $wpdb->wb3d_setting WHERE id = %d",$d), OBJECT);

	if($messages==null){
		$wpdb->query(
			$wpdb->prepare(
			"INSERT INTO $wpdb->wb3d_setting (id, ver, id_ves, name, effect_name, effect_color, thumbnail, setting, css, html, event, effects, color, wb3d_obj, layerstext, open_addons, date) 
			VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) " ,
			array(1, '1.0.0', '0', 'new_wb3d', '[]', '"0f52a1ff932a2aff"', '../wp-content/plugins/3d-website-builder/images/noimage.png', '{"num":1,"r1":80,"g1":204,"b1":39,"a1":255,"rbl1":255,"gbl1":0,"bbl1":0,"abl1":255,"rbl2":0,"gbl2":0,"bbl2":255,"abl2":255,"r2":91,"g2":25,"b2":119,"a2":255,"r3":200,"vmaxsc-0":0,"vmaxsc-1":0,"vmaxsc-2":0,"vmaxsc-3":0,"g3":194,"wheel_s":1,"scroll":0,"wheel_c":0,"wheel":1,"fullwidth":0,"b3":44,"a3":255,"c0":0,"c1":1,"c2":2,"c3":3,"c4":4,"c5":5,"c6":6,"c7":7,"c8":8,"c9":9,"wheel":10,"w_0":1024,"w_1":900,"w_2":725,"w_3":500,"h_0":550,"h_1":628,"h_2":900,"h_3":900,"reset":50,"reset2":50,"run":0,"colortype":0,"touch":1}', '[]', '[]', '{}', '{}', '["00061e8cc3ff8f1a1abc117c43ffeeed16ff000000ffeeefefff","0004ef2121ff0a30c6ffb12267ff1589a8ff","0001d5a6bdff","0001d8b429d8","0001855050ff","00011bb85dff","0001b1ac3bff","00016a1859ff","000144c132ff","0001131398ff"]', '[]', '{}', 'img', '1654035113')
			)
		);
	}


	$products_sql="CREATE TABLE IF NOT EXISTS $wpdb->wb3d_slides (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`slider_id` text NOT NULL,
	`slide_id` int(11) NOT NULL,
	`layers` longtext NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT  CHARSET=utf8 ";
	dbDelta($products_sql);

	$messages= $wpdb->get_row($wpdb->prepare("SELECT id, slider_id, slide_id, layers FROM $wpdb->wb3d_slides WHERE id = %d  ",$d), OBJECT);


	if($messages==null){
		$wpdb->query(
		$wpdb->prepare(
		"INSERT INTO $wpdb->wb3d_slides (id, slider_id, slide_id, layers)
		VALUES (%d, %s, %d, %s) " ,
		array(1, '0', 0, '[{"loc":0,"ind":"0","bl_0":0,"bl_1":0,"bl_2":0,"bl_3":0,"layer":1,"slide_of_location":"0","slide_r":0,"cursor":0,"E_0":"to left","E_1":"to left","E_2":"to left","E_3":"to left","maxtime":-1}]')
		));
	}
}
?>
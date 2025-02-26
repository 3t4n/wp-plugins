<?php
/**
 * @package Bizarski Cute Records
 */
/*
Plugin Name: Bizarski Cute Records
Description: Album management for musicians. For documentation, visit my website. 
Plugin URI: http://cuteplugins.com/wordpress-cute-records/
Version: 1.4.1
Author: Bizarski
License: GPLv2 or later
*/

$cuterecords_cover_w = get_option('cuterecords_cover_w');
$cuterecords_cover_w = $cuterecords_cover_w ? $cuterecords_cover_w : 500;
$cuterecords_cover_h = get_option('cuterecords_cover_h');
$cuterecords_cover_h = $cuterecords_cover_h ? $cuterecords_cover_h : 500;

$cuterecords_thumb_w = get_option('cuterecords_thumb_w');
$cuterecords_thumb_w = $cuterecords_thumb_w ? $cuterecords_thumb_w : 200;
$cuterecords_thumb_h = get_option('cuterecords_thumb_h');
$cuterecords_thumb_h = $cuterecords_thumb_h ? $cuterecords_thumb_h : 200;

$cuterecords_side_w = get_option('cuterecords_side_w');
$cuterecords_side_w = $cuterecords_side_w ? $cuterecords_side_w : 200;
$cuterecords_side_h = get_option('cuterecords_side_h');
$cuterecords_side_h = $cuterecords_side_h ? $cuterecords_side_h : 200;

$cuterecords_cont_css = get_option('cuterecords_cont_css');
$cuterecords_cont_css = $cuterecords_cont_css ? $cuterecords_cont_css : 'width: 500px; background: rgba(0,0,0,.1); color: #000; padding: 10px';

$cuterecords_trklst_css = get_option('cuterecords_trklst_css');
$cuterecords_trklst_css = $cuterecords_trklst_css ? $cuterecords_trklst_css : 'width: 520px; background: rgba(0,0,0,.1); color: #000; clear: both';

$cuterecords_lyr_css = get_option('cuterecords_lyr_css');
$cuterecords_lyr_css = $cuterecords_lyr_css ? $cuterecords_lyr_css : 'width: 520px; background: #fff; color: #000';

$cuterecords_but_css = get_option('cuterecords_but_css');
$cuterecords_but_css = $cuterecords_but_css ? $cuterecords_but_css : 'background: rgba(255,255,255,.4); border: 1px solid rgba(0,0,0,.1)';

$cuterecords_but_css_h = get_option('cuterecords_but_css_h');
$cuterecords_but_css_h = $cuterecords_but_css_h ? $cuterecords_but_css_h : 'background: rgba(255,255,255,.7); border: 1px solid rgba(0,0,0,.2)';

$cuterecords_skin = get_option('cuterecords_skin');
$cuterecords_skin = $cuterecords_skin ? $cuterecords_skin : 1;

define('cuterecords_VER', '1.4.1');

define('cuterecords_COVER_WIDTH', $cuterecords_cover_w);
define('cuterecords_COVER_HEIGHT', $cuterecords_cover_h);
define('cuterecords_THUMB_WIDTH', $cuterecords_thumb_w);
define('cuterecords_THUMB_HEIGHT', $cuterecords_thumb_h);
define('cuterecords_SIDE_WIDTH', $cuterecords_side_w);
define('cuterecords_SIDE_HEIGHT', $cuterecords_side_h);
define('cuterecords_CONT_CSS', $cuterecords_cont_css);
define('cuterecords_TRKLST_CSS', $cuterecords_trklst_css);
define('cuterecords_LYR_CSS', $cuterecords_lyr_css);
define('cuterecords_BUT_CSS', $cuterecords_but_css);
define('cuterecords_BUT_CSS_H', $cuterecords_but_css_h);
define('cuterecords_SKIN', $cuterecords_skin);

define('cuterecords_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('cuterecords_PLUGIN_PATH', dirname(__FILE__));

//define('cuterecords_DIRS', '\\'); //localhost
define('cuterecords_DIRS', '/');

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

include_once dirname( __FILE__ ) . '/widget.php';

class BizarskiCuteRecords { 

	function init() { 
		if(is_admin()) { 
			wp_register_script('jquery-ui-core', cuterecords_PLUGIN_URL . 'script/jquery.ui.core.js', array('jquery'));
			wp_enqueue_script('jquery-ui-core');
			wp_register_script('jquery-ui-widget', cuterecords_PLUGIN_URL . 'script/jquery.ui.widget.js', array('jquery', 'jquery-ui-core'));
			wp_enqueue_script('jquery-ui-widget');
			wp_register_script('datepicker', cuterecords_PLUGIN_URL . 'script/datepicker.js', array('jquery', 'jquery-ui-core', 'jquery-ui-widget'));
			wp_enqueue_script('datepicker');
			wp_register_script('cuterecords-back', cuterecords_PLUGIN_URL . 'cuterecords.js.php', array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'datepicker'));
			wp_enqueue_script('cuterecords-back');
	
			wp_register_style('jquery.ui.all.css', cuterecords_PLUGIN_URL . 'script/base/jquery.ui.all.css');
			wp_enqueue_style('jquery.ui.all.css');
			wp_register_style('datePicker.css', cuterecords_PLUGIN_URL . 'script/datePicker.css');
			wp_enqueue_style('datePicker.css');
			
		} else { 
			wp_register_script('fancybox', cuterecords_PLUGIN_URL . 'script/fancybox/jquery.fancybox-1.3.4.js', array('jquery'));
			wp_enqueue_script('fancybox');
			wp_register_script('jquery-cutestream', cuterecords_PLUGIN_URL . 'script/jquery.cutestream.js', array('jquery'));
			wp_enqueue_script('jquery-cutestream');
			wp_register_script('cuterecords-front', cuterecords_PLUGIN_URL . 'cuterecords.front.js.php', array('jquery', 'fancybox', 'jquery-cutestream'));
			wp_enqueue_script('cuterecords-front');
			
			wp_register_style('fancybox', cuterecords_PLUGIN_URL . 'script/fancybox/jquery.fancybox-1.3.4.css');
			wp_enqueue_style('fancybox');
			wp_register_style('jquery.cutestream.css', cuterecords_PLUGIN_URL . 'script/jquery.cutestream.css');
			wp_enqueue_style('jquery.cutestream.css');
		}

		wp_register_style('cuterecords.css', cuterecords_PLUGIN_URL . 'cuterecords.css');
		wp_enqueue_style('cuterecords.css');

		if (!session_id()) {
			session_start();
		}
	}

	function admin() {
		if(is_super_admin()) { 
			require_once dirname( __FILE__ ) . '/include/admin.php';
		}
	}

	function admin_tracks() {
		if(is_super_admin()) { 
			require_once dirname( __FILE__ ) . '/include/admin_tracks.php';
		}
	}

	function admin_settings() {
		if(is_super_admin()) { 
			require_once dirname( __FILE__ ) . '/include/admin_settings.php';
		}
	}

	function admin_actions() {
		if(is_super_admin()) { 
			add_menu_page("Cute Gigs", "Cute Records", 'add_users', "cuterecords-admin", array("BizarskiCuteRecords", "admin"), false);
			add_submenu_page("cuterecords-admin", "Manage Records", "Manage Records", 'add_users', 'cuterecords-admin', array("BizarskiCuteRecords", "admin"));
			add_submenu_page("cuterecords-admin", "Manage Tracks", "Manage Tracks", 'add_users', 'cuterecords-tracks', array("BizarskiCuteRecords", "admin_tracks"));
			add_submenu_page("cuterecords-admin", "Settings", "Settings", 'add_users', 'cuterecords-settings', array("BizarskiCuteRecords", "admin_settings"));
		}
	}

	function install() { 
		global $wpdb;
		$cuterecords_ver = get_option("cuterecords_ver");

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		$table = "CREATE TABLE ".$wpdb->prefix."cuterecords (
		id int(11) NOT NULL AUTO_INCREMENT,
		artist VARCHAR(128) DEFAULT NULL,
		name VARCHAR(128) DEFAULT NULL,
		format VARCHAR(64) DEFAULT NULL,
		label VARCHAR(128) DEFAULT NULL,
		catalog_num VARCHAR(64) DEFAULT NULL,
		releasedate DATE NOT NULL DEFAULT '0000-00-00', 
		cover VARCHAR(128) DEFAULT NULL,
		more_info VARCHAR(256) DEFAULT NULL,
		button1_label VARCHAR(64) DEFAULT NULL,
		button1_url VARCHAR(256) DEFAULT NULL,
		button1_target TINYINT(1) NOT NULL DEFAULT '0',
		button2_label VARCHAR(64) DEFAULT NULL,
		button2_url VARCHAR(256) DEFAULT NULL,
		button2_target TINYINT(1) NOT NULL DEFAULT '0',
		button3_label VARCHAR(64) DEFAULT NULL,
		button3_url VARCHAR(256) DEFAULT NULL,
		button3_target TINYINT(1) NOT NULL DEFAULT '0',
		PRIMARY KEY  (id) 
		);";

		dbDelta($table);

		$table = "CREATE TABLE ".$wpdb->prefix."cuterecords_tracks (
		id int(11) NOT NULL AUTO_INCREMENT,
		record_id int(11) NOT NULL DEFAULT '0', 
		songnum SMALLINT NOT NULL DEFAULT '0', 
		name VARCHAR(128) DEFAULT NULL,
		lyrics text DEFAULT NULL,
		time VARCHAR(64) DEFAULT NULL,
		video VARCHAR(128) DEFAULT NULL,
		mp3 VARCHAR(128) DEFAULT NULL,
		download TINYINT(1) NOT NULL DEFAULT '0',
		PRIMARY KEY  (id), 
		KEY record_id (record_id)
		);";

		dbDelta($table);

		if($cuterecords_ver < "1.3.5" ) { 
			$results = $wpdb->get_results("SELECT id, type, time, format FROM ".$wpdb->prefix."cuterecords");
			if(count($results) > 0) { 
				foreach($results as $rec) { 
					if($rec->type) { 
						$wpdb->query("UPDATE ".$wpdb->prefix."cuterecords SET format='".$rec->type.", ".$rec->format."' WHERE id='".$rec->id."'");
					}
					if($rec->time) { 
						$wpdb->query("UPDATE ".$wpdb->prefix."cuterecords SET more_info='".$rec->time."' WHERE id='".$rec->id."'");
					}
				}
			}
			$wpdb->query("ALTER TABLE ".$wpdb->prefix."cuterecords DROP type");
			$wpdb->query("ALTER TABLE ".$wpdb->prefix."cuterecords DROP time");
		}
		
		if($cuterecords_ver < "1.3.6") { 
			$wpdb->query("SHOW COLUMNS FROM ".$wpdb->prefix."cuterecords LIKE 'url'");
			if($wpdb->num_rows > 0) { 
				$wpdb->query("ALTER TABLE ".$wpdb->prefix."cuterecords DROP url");
			}
		}

		if(!$cuterecords_ver) { 
			add_option("cuterecords_ver", cuterecords_VER);
		}
	}

	function check_db_version() { 
		global $wpdb;
		$cuterecords_ver = get_option("cuterecords_ver");
		if($cuterecords_ver != cuterecords_VER) { 
			self::install();
			update_option("cuterecords_ver", cuterecords_VER);
		}
	}

	function display_records($args) { 
		echo '<style type="text/css" media="screen">';
		echo 'a.cuterecords_button { '.cuterecords_BUT_CSS.' }';
		echo 'a.cuterecords_button:hover { '.cuterecords_BUT_CSS_H.' }';
		echo '</style>';
		global $wpdb; 

		$uploads = wp_upload_dir();
		$baseurl = $uploads['baseurl'];

		$content = '';

		if($args['id']) { 
			$id = (int)$args['id'];
			$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cuterecords WHERE id='".$id."'");
		} else { 
			$limit = $args['limit'] ? " LIMIT ".$args['limit']." " : '';
			$offset = $args['offset'] ? " OFFSET ".$args['offset']." " : '';
			$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cuterecords ORDER BY releasedate DESC".$limit.$offset);
		}

		if(count($results) > 0) { 
			foreach($results as $rec) { 
				$content .= '<div class="cuterecords_container" style="'.cuterecords_CONT_CSS.'">';
				$content .= '<a class="cuterecords_cover" href="'.$baseurl.'/covers/'.esc_attr($rec->cover).'"><img alt="" src="'.$baseurl.'/covers/thumbs/'.esc_attr($rec->cover).'" width="'.cuterecords_THUMB_WIDTH.'"></a>';
				$content .= '<div class="cuterecords_details_cont">';
				$content .= $rec->artist ? '<h4 class="cuterecords_artist">'.stripslashes($rec->artist).'</h4><br>' : '';
				$content .= '<h3 class="cuterecords_name">"'.stripslashes($rec->name).'"</h3><br>';
				$content .= '<p class="cuterecords_details"><span class="cuterecords_releasedate">'.date("F jS Y", strtotime($rec->releasedate)).'</span></p><br>';
				$content .= '<p class="cuterecords_details">';
				if($rec->catalog_num) { 
					$content .= '<span class="cuterecords_catalog_num">'.stripslashes($rec->catalog_num).'</span><span class="cuterecords_comma">, </span>';
				}
				$content .= '<span class="cuterecords_label">'.stripslashes($rec->label).'</span></p><br>';
				$content .= '<p class="cuterecords_details"><span class="cuterecords_format">'.stripslashes($rec->format).'</span></p>';
				if($rec->more_info) { 
					$content .= '<br><p class="cuterecords_details"><span class="cuterecords_more_info">'.stripslashes($rec->more_info).'</span></p>';
				}
					if(($rec->button1_label && $rec->button1_url)
					|| ($rec->button2_label && $rec->button2_url) 
					|| ($rec->button3_label && $rec->button3_url)) { 
						$content .= '<br><div class="cuterecords_buttons">';
					}
						if($rec->button1_label && $rec->button1_url) { 
							$content .= '<a'.($rec->button1_target ? ' target="_blank"' : '').' href="'.esc_attr($rec->button1_url).'" class="cuterecords_button">'.stripslashes($rec->button1_label).'</a>';
						}
						if($rec->button2_label && $rec->button2_url) { 
							$content .= '<a'.($rec->button2_target ? ' target="_blank"' : '').' href="'.esc_attr($rec->button2_url).'" class="cuterecords_button">'.stripslashes($rec->button2_label).'</a>';
						}
						if($rec->button3_label && $rec->button3_url) { 
							$content .= '<a'.($rec->button3_target ? ' target="_blank"' : '').' href="'.esc_attr($rec->button3_url).'" class="cuterecords_button">'.stripslashes($rec->button3_label).'</a>';
						}
					if(($rec->button1_label && $rec->button1_url)
					|| ($rec->button2_label && $rec->button2_url) 
					|| ($rec->button3_label && $rec->button3_url)) { 
						$content .= '</div>';
					}
				$content .= '</div>';
				$content .= '</div>';
				if($args['show_tracklist']) { 
					$content .= self::tracklist(array("id"=>$rec->id));
				}
			}
		} 
		return $content;
	}

	function show_cover($args) { 
		global $wpdb; 
		$uploads = wp_upload_dir();
		$baseurl = $uploads['baseurl'];

		$results = $wpdb->get_row("SELECT cover FROM ".$wpdb->prefix."cuterecords WHERE id='".$args['id']."'");
		$content = '<img alt="" src="'.$baseurl.'/covers/thumbs/'.esc_attr($results->cover).'" width="'.cuterecords_THUMB_WIDTH.'">';
		return $content; 
	}

	function show_full_cover($args) { 
		global $wpdb; 
		$uploads = wp_upload_dir();
		$baseurl = $uploads['baseurl'];

		$results = $wpdb->get_row("SELECT cover FROM ".$wpdb->prefix."cuterecords WHERE id='".$args['id']."'");
		$content = '<img alt="" src="'.$baseurl.'/covers/'.esc_attr($results->cover).'" width="'.cuterecords_COVER_WIDTH.'">';
		return $content; 
	}

	function tracklist($args) { 
		global $wpdb; 
		$uploads = wp_upload_dir();
		$baseurl = $uploads['baseurl'];

		$content = '';
		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cuterecords_tracks WHERE record_id='".$args['id']."' ORDER BY songnum ASC");
		if(count($results) > 0) { 
			$content .= '<table class="cuterecords_table" style="'.cuterecords_TRKLST_CSS.'">';
			$content .= '<tr><th width="8%">'.__('#').'</th><th width="80%">'.__('Title').'</th><th width="12%">'.__('Length').'</th></tr>';
			foreach($results as $track) { 
				$content .= '<tr><td valign="top">'.$track->songnum.'</td><td valign="top">';
				$content .= stripslashes($track->name);
				if($track->mp3 && $track->mp3 != '') { 
					$content .= ' <span class="cuterecords_par">[</span><span class="cutestream_mp3 cutestream_mp3_stop" id="'.esc_attr($track->mp3).'"><span class="cutestream_play_but">'.__('play').'</span></span><span class="cuterecords_par">]</span>';
					if($track->download) { 
						$content .= ' <span class="cuterecords_par">[</span><a target="_blank" href="'.$baseurl.'/mp3/'.esc_attr($track->mp3).'">'.__('download').'</a><span class="cuterecords_par">]</span>';
					}
				}
				if($track->video && $track->video != '') { 
					$content .= ' <span class="cuterecords_par">[</span><a target="_blank" href="'.esc_attr($track->video).'">'.__('video').'</a><span class="cuterecords_par">]</span>';
				}
				if($track->lyrics && $track->lyrics != '') { 
					$content .= ' <span class="cuterecords_par">[<a href="#cuterecords_lyrics_'.$track->id.'" class="cuterecords_display_lyrics">'.__('lyrics').'</a><span class="cuterecords_par">]</span>';
					$content .= '<div style="display: none">';
					$content .= '<div class="cuterecords_lyrics" id="cuterecords_lyrics_'.$track->id.'" style="'.cuterecords_LYR_CSS.'">';
					$content .= '<h2>'.stripslashes($track->name).'</h2>';
					$content .= stripslashes(nl2br($track->lyrics));
					$content .= '</div>';
					$content .= '</div>';
				} 
				$content .= '</td><td valign="top">'.stripslashes($track->time).'</td></tr>';
			}
			$content .= '</table>';
		}
		return $content; 
	}

}

register_activation_hook(__FILE__,array('BizarskiCuteRecords', 'install'));
add_action('init', array('BizarskiCuteRecords', 'init'));
add_action('plugins_loaded', array('BizarskiCuteRecords', 'check_db_version'));
add_action('admin_menu', array('BizarskiCuteRecords', 'admin_actions') );
add_shortcode('cuterecords_display', array('BizarskiCuteRecords', 'display_records'));
add_shortcode('cuterecords_show_cover', array('BizarskiCuteRecords', 'show_cover'));
add_shortcode('cuterecords_show_full_cover', array('BizarskiCuteRecords', 'show_full_cover'));
add_shortcode('cuterecords_tracklist', array('BizarskiCuteRecords', 'tracklist'));
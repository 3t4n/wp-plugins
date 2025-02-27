<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency {

	public static function hbagency_plugin_activation() {
	}
	
	public static function delete_options_prefixed( $prefix ) {
		global $wpdb;
		
		$like_prefix = $wpdb->esc_like( $prefix ) . '%';
		$wpdb->query(
			$wpdb->prepare(
				"DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
				$like_prefix
			)
		);
	}
	
	public static function hbagency_plugin_deactivation( ) {
		self::delete_options_prefixed('hbagency_wp_');
		wp_clear_scheduled_hook('hbagency_wp_cron_check_for_updates');
		
	}
	
	public static function hbagency_show_script() {
		if (get_option("hbagency_wp_website_script")) {
			wp_enqueue_script('hbagency_script_js', get_option("hbagency_wp_website_script"), array(), null, array('strategy' => 'async', 'in_footer' => false));
		}
	}
	
	public static function hbagency_show_cmp() {
		if(get_option('hbagency_wp_cmp') && get_option('hbagency_wp_has_cmp')) {
			wp_enqueue_script('hbagency_cmp_js', 'https://hbagency.it/cdn/tcf2_cmp_hbagency.js', array(), null, array('in_footer' => false, 'strategy' => 'async')); 
		}
	}

	public static function hbagency_show_cls() {
		if(get_option('hbagency_wp_cls')) {
			wp_enqueue_style('hbagency_style_css', 'https://hbagency.it/cdn/stylehb.css', null);
		}
	}

	public static function hbagency_shortcode_callback($attrs) {
		$id = $attrs['id'];
		if(!is_numeric($id) || get_option('hbagency_wp_placement_' . $id) != 1) {
			return;
		}
	
		$cssClass = '';
		if(!get_option('hbagency_wp_website_placement_' . $id . '_type')) {
			$cssClass = array_key_exists(get_option('hbagency_wp_website_placement_' . $id . '_type'), HBAGENCY_CSS_CLASSES) ? HBAGENCY_CSS_CLASSES[get_option('hbagency_wp_website_placement_' . $id . '_type')] : get_option('hbagency_wp_placement_' . $id . '_type') . "hb-no-class";
		}
		echo "<div class='" . esc_attr((array_key_exists(get_option('hbagency_wp_website_placement_' . $id . '_type'), HBAGENCY_CSS_CLASSES) == false) . " " . HBAGENCY_CSS_CLASSES[get_option('hbagency_wp_website_placement_' . $id . '_type')]) . "'></div>";
		echo "<div class='hb-ad-static " . esc_attr($cssClass) . "'><div class='hb-ad-inner'><div id='hbagency_space_" . esc_attr($attrs['id']) . "'></div></div></div>";
	}
	
	public static function hbagency_footer_hook() {
		$placements = get_option('hbagency_wp_website_placements');
	
		if(empty($placements)) {
			return;
		}
	
		foreach($placements as $p) {
			if(get_option('hbagency_wp_placement_' . $p->id) != 1) {
				continue;
			}
			switch($p->type->type) {
				case HBAGENCY_STICKY:
					echo "<div  id='HB_Footer_Close_hbagency_space_" . esc_attr($p->id) . "'>" .
						 "<div id='HB_CLOSE_hbagency_space_" . esc_attr($p->id) . "'></div>" .
						 " <div id='HB_OUTER_hbagency_space_" . esc_attr($p->id) . "'>" .
						 "<div id='hbagency_space_" . esc_attr($p->id) . "'></div>" .
						 "</div></div>";
					break;
				case HBAGENCY_FIXED:
					if($p->type->id == 28) {
						echo "<div id='hbagency_space_" . esc_attr($p->id) . "_video'><div id='hbagency_space_" . esc_attr($p->id) . "'></div></div>";
					} else {
						echo "<div id='hbagency_space_" . esc_attr($p->id) . "'></div>";
					}
	
					break;
			}
		}
	}	
	
	static function insert_placements_in_inarticle($ads, $content) {
	    if ( ! is_array( $ads ) ) {
			return $content;
	    }

	    $closing_p = '</p>';
	    $paragraphs = explode( $closing_p, $content );
	    $new_paragraphs[] = array();
	    foreach ($paragraphs as $index => $paragraph) {
			if ( trim( $paragraph ) ) {
				$paragraphs[$index] .= $closing_p;
			}
			
			$n = $index + 1;
			if(!isset($ads[$n])) {
				$new_paragraphs[$index] = $paragraphs[$index];
				continue;
			} 
			
			$line_pre = "";
			$line_post = "";
			foreach($ads[$n] as $ad) {
				if($ad['pos'] == 1) {
					$line_pre .= $ad['tag'];
				} else {
					$line_post .= $ad['tag'];
				}
			}
			
			$new_paragraphs[$index] = $line_pre . $paragraphs[$index] . $line_post;
		}
	    
	    return implode( '', $new_paragraphs );
	}
	
	static function hbagency_ininarticle_hook( $content ) {
		if (!is_single() || is_admin()) {
			return $content;
		}

		$ads = get_option('hbagency_wp_website_placements_cache_inarticle');
		if(!$ads || empty($ads)) {
			$placements = get_option('hbagency_wp_website_placements');

			if(empty($placements)) {
				return $content;
			}

			foreach($placements as $p) {
				if(get_option('hbagency_wp_placement_' . $p->id) != 1) {
					continue;
				}
				switch($p->type->type) {
					case HBAGENCY_IN_PAGE:
						$pos = intval(get_option('hbagency_wp_placement_' . $p->id . '_pos', 1));
						$count = intval(get_option('hbagency_wp_placement_' . $p->id . '_count', 1));
						$par = intval(get_option('hbagency_wp_placement_' . $p->id . '_par', 1));
						$next_par = $par;
						$cl_index = 0;
						for($i = $pos; $i < 6; $i++) {
							$data = array(
								'pos' => $pos,
								'tag' => "<div class='" . ($p->type->id == 43 ? "hb-ad-inarticle-or" : "hb-ad-inpage") . "'><div class='hb-ad-inner'><div class='hbagency_cls hbagency_space_" . $p->id . "' id='hbagency_space_" . $p->id . '_' . $cl_index++ . "'></div></div></div>");
							if(isset($ads[$next_par])) {
								array_push($ads[$next_par], $data);
							} else {
								$ads[$next_par] = array ( $data);
							}
							$next_par += $count;
						}
						break;
					case HBAGENCY_IN_ARTICLE:
						$par = intval(get_option('hbagency_wp_placement_' . $p->id . '_par', 1));
						$data = array(
							 'pos' => get_option('hbagency_wp_placement_' . $p->id . '_pos', 1), 
                                                         'tag' => "<div class='hb-ad-inarticle'><div class='hb-ad-inner'><div class='hbagency_cls' id='hbagency_space_" . $p->id . "'></div></div></div>");
						if(isset($ads[$par])) {
							array_push($ads[$par], $data);
						} else {
							$ads[$par] = array ( $data ); 
						}
					   break;
				}
			}
			
			update_option('hbagency_wp_website_placements_cache_inarticle', $ads);
		}
	    	
		return self::insert_placements_in_inarticle($ads, $content);
	}
}



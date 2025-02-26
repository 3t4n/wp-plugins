<?php

/**
 * The frontend-specific functionality of the plugin.
 *
 * @link       http://www.popeating.it
 * @since      1.0.0
 *
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/public
 */

/**
 * The frontend-specific functionality of the plugin.
 *
 * Defines the plugin name, version and
 * setups the menu link and options page
 *
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/public
 * @author     Lorenzo Noccioli <lennaz@gmail.com>
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
class PRT_Frontend {
	public function __construct($name, $version) {
        $this->plugin_name = $name;
		$this->version = $version;
		$this->options = get_option($this->plugin_name.'_options');
		
    }
	public function run() {
		if ($this->options['auto']==1) {
			add_action('the_content', array( $this, 'add_time_to_content'));
		}
	}
	
	public function enqueue_styles() {
		if ($this->options['include_css']==1) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/post-read-time.css', array(), $this->version, 'all' );
		}

	}
	
	//add time to read to the_content if requested by options
	public function add_time_to_content($content) {	
		if ((is_page() && $this->options['on_pages']==1) || is_single()) {
			global $post;
			$post_id = $post->ID;
			$minutes=$this->minutes_text($post_id);
			$return = $minutes."<br>".$content;
			return $return;
		} else {
			return $content;
		}
	}
	
	//Build the reading time string with classes, plural or singl word, and so on
	public function minutes_text($post_id) {
		$minutes=$this->calculate_time_to_read($post_id);
		if ($minutes > 1) {
			$minuteword=$this->options['plural'];
		} else {
			$minuteword=$this->options['singular'];
		}
		if ($this->options['class']) {
			$minutes="<span class='".$this->options['class']."'>".$minutes."</span>";
		}
		
		if ($this->options['class_tb']) {
			$tb="<span class='".$this->options['class_tb']."'>".$this->options['text_before']."</span>";
		} else {
			$tb=$this->options['text_before'];
		}

		if ($this->options['class_ta']) {
			$ta="<span class='".$this->options['class_ta']."'>".$minuteword."</span>";
		} else {
			$ta=$minuteword;
		}
		return $tb." ".$minutes." ".$ta;
	}
	
	public function calculate_time_to_read($post_id) {
		$wpm=$this->options['words'];
		$img=$this->options['images'];
		
		$cont=get_post_field( 'post_content', $post_id );
		$ncont=strip_tags($cont);
		
		$im_min=0;
		if ($this->options['images']==1) {
			$count_im=count( get_attached_media( 'image', $post_id ) );
			for ($c=0; $c<$count_im; $c++) {
				if ($c<10) {
					$sim+=(12-$c);
				} else {
					$sim+=3;
				}
			}
			$im_min=round(($sim/60), 0, PHP_ROUND_HALF_UP);
		}
		
		$t_min=round(sizeof(explode(" ", $ncont))/$wpm, 0, PHP_ROUND_HALF_UP);
		return $im_min+$t_min;
	}
	
	
}
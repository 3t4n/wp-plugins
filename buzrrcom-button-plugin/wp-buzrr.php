<?php
/*
Plugin Name: Buzrr.com Button Plugin
Plugin URI: http://ezbizniz.com/wp/plugins/wpbuzrr
Description: Automatically add Buzrr.com button to your posts.
Version: 1.2
Author: EzBizNiz.com
Author URI: http://ezbizniz.com/
Donate URI: http://ezbizniz.com/donate
*/

define('BUZRR_TEXT_DOMAIN', 'buzrr');
define('BUZRR_OPTION_NAME', 'buzrr-options');

include dirname (__FILE__).'/plugin.php';

class WPBuzrr extends WPBuzrrPlugin {
	/**
	 * Constructor sets up page types, starts all filters and actions
	 *
	 * @return void
	 **/
	function WPBuzrr() {
		$this->register_plugin (BUZRR_TEXT_DOMAIN, __FILE__);
		$this->add_action('wp_print_scripts');
		
		$this->add_shortcode('buzrr', 'shortcode');
		
		$this->add_filter('the_content');
		//remove_filter('get_the_excerpt', 'wp_trim_excerpt');
		//$this->add_filter('get_the_excerpt', 'improved_trim_excerpt');
		$this->add_filter('the_excerpt', 'the_content');
		
		$options = $this->get_options();
		if('on' == $options['attribution_link_enabled'])
			$this->add_action('wp_footer');
		if (is_admin()) {
			$this->add_action('admin_init');
			$this->add_action('admin_menu');
		}
	}
	
	
	/**
	 * Admin init
	 *
	 * @return void
	 **/
	function admin_init() {
		wp_register_style('buzrr-style', $this->url() . '/css/style.css');
	}
	
	
	/**
	 * Insert JS into the header
	 *
	 * @return void
	 **/
	function wp_print_scripts() {
		wp_enqueue_script('jquery');
	}
	
	
	/**
	 * Insert CSS styles into the header
	 *
	 * @return void
	 **/
	function wp_print_styles() {
		wp_enqueue_style('buzrr-style');
	}
	
	
	/**
	 * Add the Buzrr menu
	 *
	 * @return void
	 **/
	function admin_menu() {
		$page = add_options_page(__('Buzrr Options', BUZRR_TEXT_DOMAIN), __('Buzrr Options', BUZRR_TEXT_DOMAIN), 'administrator', basename (__FILE__), array ($this, 'admin_options'));
		
		add_action('admin_print_styles-' . $page, array(&$this, 'wp_print_styles'));
	}
	
	
	/**
	 * Display the options screen
	 *
	 * @return void
	 **/
	function admin_options() {
		// Save options.
		if (isset($_POST['update']) && check_admin_referer (BUZRR_ADMIN_REFERRER)) {
			$options['attribution_link_enabled'] = ('on' == $_POST['attribution_link_enabled']?'on':'');
			$options['display_in_categories'] = ('on' == $_POST['display_in_categories']?'on':'');
			$options['display_in_posts'] = ('on' == $_POST['display_in_posts']?'on':'');
			$options['display_in_pages'] = ('on' == $_POST['display_in_pages']?'on':'');
			$options['display_in_feed'] = ('on' == $_POST['display_in_feed']?'on':'');
			$options['position'] = $_POST['position'];
			$options['rss_position'] = $_POST['rss_position'];
			$options['styling'] = $_POST['styling'];
			$options['buzrr_button'] = $_POST['button_style1'];
			
			$this->update_options($options);
		}
		
		$this->render_admin('options', array ('options' => $this->get_options()));
	}
	
	
	/**
     * Get the default options.
     *
     * @return $default_options
     **/
	function get_default_options() {
		$default_options = array(
			'attribution_link_enabled'	=> '',
			'display_in_categories'		=> 'on',
			'display_in_posts'			=> 'on',
			'display_in_pages'			=> 'on',
			'display_in_feed'			=> 'on',
			'position'					=> 'after',
			'rss_position'				=> 'after',
			'styling'					=> '',
			'buzrr_button'				=> 'big_blue_buzzicon_bg'
		);
        
        return $default_options;
	}
	
	
	/**
     * Get options.
     *
     * @return $options
     **/
	function get_options() {
		$options = get_option(BUZRR_OPTION_NAME);
        
        if ($options === false)
            $options = array();
        
        $default_options = $this->get_default_options();
        
        foreach ($default_options AS $key => $value) {
            if (!isset ($options[$key]))
                $options[$key] = $value;
        }
        
        return $options;
	}
	
	
	/**
     * Function to update options.
     *
     * @return void
     **/
    function update_options($options) {
        if (isset($_POST['update']) && check_admin_referer (BUZRR_ADMIN_REFERRER)) {
            $_POST = stripslashes_deep($_POST);
            
            $current_options = $this->get_options();
            
            foreach ($options AS $key => $value) {
	            $current_options[$key] = $value;
	        }
	        
            update_option(BUZRR_OPTION_NAME, $current_options);
            
            $this->render_message(__('Your options have been updated', BUZRR_TEXT_DOMAIN));
        }
    }
	
	
	/**
	 * The filter function adding the button to the content.
	 *
	 * @return $content
	 **/
	function the_content($content) {
		global $post;
		
		$options = $this->get_options();
		
		$button = '';
		$style = '';
		$html_code = '';
		
		if(('on' == (string)$options['display_in_categories'] && (is_category() || is_home())) || ('on' == (string)$options['display_in_feed'] && is_feed()) || ('on' == (string)$options['display_in_posts'] && is_single()) || ('on' == (string)$options['display_in_pages'] && is_page()))
			$button = $this->get_button();
		
		if('' != trim($options['styling']))
			$style = ' style="' . $options['styling'] . '"';
		
		if('' != trim($button)) {
			$html_code = '<div class="buzrr_button"' . $style . '>' . $button . '</div>';
			switch($options['position']) {
				case 'before':
					$content = $html_code . $content;
					break;
				case 'before_after':
					$content = $html_code . $content . $html_code;
					break;
				case 'after':
				default:
					$content .= $html_code;
					break;
			}
			
		}
		
		return $content;
	}
	
	
	/**
	 * The filter function adding the button to the excerpt.
	 * Used to get rid of javascript code.
	 * 
	 * @return $excerpt
	 **/
	function improved_trim_excerpt($text) {
		global $post;
		if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = 80;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
		array_pop($words);
		array_push($words, '[...]');
		$text = implode(' ', $words);
		}
		}
		
		return $this->the_content($text);
	}
	
	
	/**
     * Function to add attribution link to theme footer.
     *
     * @return void
     **/
    function wp_footer() {
    	if(is_page() || is_single()) {
    		global $post;
    		
	    	$attribution_link = get_post_meta($post->ID, 'wpbuzrr_attribution_link', true);
	    	if('' == $attribution_link) {
	    		$attribution_link = $this->get_attribution_link();
	    	    add_post_meta($post->ID, 'wpbuzrr_attribution_link', $attribution_link);
	    	}
    	} else {
    		$current_options = $this->get_options();
    		
    		if(isset($current_options['attribution_link']) && 'on' != $current_options['attribution_link']) {
				$attribution_link = $current_options['attribution_link'];
			} else {
				$attribution_link = $this->get_attribution_link();
	            $current_options['attribution_link'] = $attribution_link;
	            update_option(BUZRR_OPTION_NAME, $current_options);
			}
    	}
    	
    	echo('<div id="wpbuzrr_link">' . $attribution_link . '</div>');
    }
    
	
	/**
     * Function to add attribution link to theme footer.
     *
     * @return void
     **/
    function get_attribution_link() {
    	$attribution_link_array = array(
    		'<a href="http://wordpress.org/extend/plugins/buzrrcom-button-plugin/" target="_blank">Buzrr.com Button Plugin</a>',
    		'<a href="http://ezbizniz.com/wp/plugins/wpbuzrr" target="_blank">Powered by WPBuzrr</a>',
    		'<a href="http://ezbizniz.com/wp/plugins/wpbuzrr" target="_blank">Powered by WPBuzrr</a> from <a href="http://ezbizniz.com/" target="_blank">EzBizNiz.com</a>',
    		'<a href="http://wordpress.org/extend/plugins/buzrrcom-button-plugin/" target="_blank">Powered by WPBuzrr</a> from <a href="http://ezbizniz.com/" target="_blank">EzBizNiz.com</a>'
    	);
    	
    	return ($attribution_link_array[rand(0, count($attribution_link_array)) - 1]);
    }
    
    
	/**
	 * Function to get the Buzrr.com button javascript code.
	 *
	 * @return Buzrr.com button javascript code.
	 **/
	function get_button() {
		global $post;
		
		$options = $this->get_options();
		
		return '<script>var __external_use_page_url = "' . get_permalink($post->ID) . 
			'"; var __external_use_page_summary = "' . $post->post_title . 
			'"; var __buzrr_style = "' . $options['buzrr_button'] .
			'";</script><script src="http://cdn.buzrr.com/js/button.js"> </script>';
	}
	
	
	/**
	 * Function to display the Buzrr.com button javascript code.
	 *
	 * @return void.
	 **/
	function display_button() {
		echo($this->get_button());
	}
	
	
	/**
     * Function to handle shortcodes.
     *
     * @return void
     **/
    function shortcode($atts) {
    	$options = $this->get_options();
    	
    	$styling = $options['styling'];

    	extract(shortcode_atts(array(
    		'styling'	=> $styling
        ), $atts));
        
        $output = '<div class="buzrr_button" style="' . $styling . '">' . $this->get_button() . '</div>';
        
        return $output;
    }
}

/**
 * Instantiate the plugin
 *
 * @global
 **/
$_wp_buzrr = new WPBuzrr;


/**
 * Template function to add a button anywhere in a theme.
 *
 * @return void.
 **/
function buzrr_display_button() {
	$_wp_buzrr->display_button();
}
?>
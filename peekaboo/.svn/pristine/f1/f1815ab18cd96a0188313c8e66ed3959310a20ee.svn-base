<?php

/*
Plugin Name: Peekaboo
Plugin URI: http://farinspace.com/wordpress-peekaboo-plugin/
Description: This plugin allows you to show and hide specific portions of content within a post or page. Visitors can then use custom show/hide links to show or hide the portions you've defined. The plugin enables a few WordPress shortcodes: <code>[peekaboo]</code>, <code>[peekaboo_link]</code> and <code>[peekaboo_content]</code>. See the <a href="options-general.php?page=peekaboo">settings page</a> for a quick start guide on how to use the shortcodes and to adjust default options.
Author: Dimas Begunoff
Version: 1.1
Author URI: http://www.farinspace.com/
*/

function get_the_peekaboo_link($onhide,$onshow=NULL,$name='all',$start='onhide')
{
	return Peekaboo_Plugin::get_the_link($onhide,$onshow,$name,$start);
}

function the_peekaboo_link($onhide,$onshow=NULL,$name='all',$start='onhide')
{
	Peekaboo_Plugin::the_link($onhide,$onshow,$name,$start);
}

$peekaboo = new Peekaboo_Plugin;

class Peekaboo_Plugin
{
	var $slug = 'peekaboo';
	var $option_name;
	var $plugin_url;
	var $plugin_dir;

	function Peekaboo_Plugin()
	{
		$this->option_name = $this->slug;

		$this->plugin_url = get_bloginfo('wpurl') . '/' . PLUGINDIR . '/' . $this->slug;
		$this->plugin_dir = str_replace('\\','/',dirname(__FILE__));

		register_activation_hook(__FILE__,array($this,'do_activate'));

		add_action('plugins_loaded',array($this,'do_plugins_loaded'));
		add_action('admin_menu',array($this,'do_admin_menu'));
	}

	function do_activate()
	{
		$option = get_option($this->option_name);
		if (empty($option)) update_option($this->option_name, array('onhide_text'=>'[+ show]','onshow_text'=>'[- hide]'));
	}

	function do_plugins_loaded()
	{
		add_shortcode('peekaboo',array($this,'do_peekaboo'));
		add_shortcode('peekaboo_link',array($this,'do_peekaboo_link'));
		add_shortcode('peekaboo_content',array($this,'do_peekaboo_content'));

		if (function_exists('wp_enqueue_script')) 
		{
			wp_enqueue_script('peekaboo_plugin', $this->plugin_url . '/assets/global.js', array('jquery'), '1.1');
		}

		add_filter('plugin_row_meta',array($this,'do_plugin_links'),10,2);

		add_action('wp_print_scripts', array($this,'do_wp_print_scripts'));
	}

	function do_wp_print_scripts()
	{
		global $post;

		$options = get_option($this->option_name);

		$name = 'collapse_all';

		$do = FALSE;

		if (isset($options[$name]) AND 'yes' == $options[$name])
		{
			$do = TRUE;
		}

		$option = get_post_meta($post->ID, 'peekaboo_' . $name, TRUE);

		if (in_array(strtolower($option), array('1', 'true', 't', 'yes', 'y')))
		{
			$do = TRUE;
		}
		elseif (in_array(strtolower($option), array('0', 'false', 'f', 'no', 'n')))
		{
			$do = FALSE;
		}

		if ($do)
		{
			?><script type="text/javascript"> var peekaboo_collapse_all = true; </script><?php
		}
	}

	function do_admin_menu()
	{
		add_submenu_page('options-general.php', 'Peekaboo Settings', 'Peekaboo', 'manage_options', $this->slug, array($this,'do_peekaboo_menu'));
	}

	function do_plugin_links($links, $file)
	{
		if ($file == plugin_basename(__FILE__))
		{
			$links[] = '<a href="options-general.php?page=peekaboo">Settings</a>';
		}
		return $links;
	}

	function do_peekaboo_menu()
	{
		$option_name = $this->option_name;

		if (!empty($_POST))
		{
			// verify nonce
			if (!wp_verify_nonce($_POST[$option_name.'_nonce'],$option_name)) 
			{
				die('Nonce unverified');
			}

			update_option($option_name, $_POST[$option_name]);

			$status = array
			(
				'error' => 0,
				'message' => 'Settings saved'
			);
		}

		$option = get_option($option_name);

		$nonce = '<input type="hidden" name="'. $option_name .'_nonce" value="' . wp_create_nonce($option_name) . '" />';
		
		include_once $this->plugin_dir . '/assets/menu.php';
	}

	function do_peekaboo_content($atts,$content=NULL)
	{
		$default_atts = array
		(
			'name' => 'all',
			'start'  => 'onhide'
		);

		extract(shortcode_atts($default_atts,$atts));

		return '<div class="peekaboo_content peekaboo-'. $name . (in_array($start,array('onhide','hidden'))?' peekaboo_onhide':' peekaboo_onshow') .'"'. (in_array($start,array('onshow','visible'))?'':' style="display:none;"') .'>'. do_shortcode($content) .'</div>';
	}

	function do_peekaboo_link($atts,$content=NULL)
	{
		$default_atts = array
		(
			'name' => 'all',
			'start'  => 'onhide'
		);

		extract(shortcode_atts($default_atts,$atts));

		return '<a href="#" class="peekaboo_link peekaboo-'. $name . (in_array($start,array('onhide','hidden'))?' peekaboo_onhide':' peekaboo_onshow') .'">'. do_shortcode($content) .'</a>';
	}

	function do_peekaboo($atts)
	{
		global $post;

		if (!empty($post))
		{
			$onshow_text = get_post_meta($post->ID, 'peekaboo_onshow_text', TRUE);
			$onhide_text = get_post_meta($post->ID, 'peekaboo_onhide_text', TRUE);
		}
		
		$option = get_option($this->option_name);
		
		$default_atts = array
		(
			'name'	 => 'all', 
			'onshow' => !empty($onshow_text)?$onshow_text:$option['onshow_text'],
			'onhide' => !empty($onhide_text)?$onhide_text:$option['onhide_text'],
			'start'  => 'onhide'
		);

		extract(shortcode_atts($default_atts,$atts));

		return '<a href="#" class="peekaboo_link peekaboo-'. $name . (in_array($start,array('onhide','hidden'))?' peekaboo_onhide':' peekaboo_onshow') .'"><span class="peekaboo_onhide"'. (in_array($start,array('onhide','hidden'))?'':' style="display:none;"') .'>'. $onhide .'</span><span class="peekaboo_onshow"'. (in_array($start,array('onshow','visible'))?'':' style="display:none;"') .'>'. $onshow .'</span></a>';
	}

	function get_the_link($onhide,$onshow=NULL,$name='all',$start='onhide')
	{
		if (is_array($onhide)) extract($onhide);
		
		if (is_null($onshow)) $onshow = $onhide;

		if (is_null($name)) $name = 'all';

		$start = $start == 'onhide' ? 'onhide' : 'onshow';
		
		return '<a href="#" class="peekaboo_link peekaboo-'. $name . (in_array($start,array('onhide','hidden'))?' peekaboo_onhide':' peekaboo_onshow') .'"><span class="peekaboo_onhide"'. (in_array($start,array('onhide','hidden'))?'':' style="display:none;"') .'>'. $onhide .'</span><span class="peekaboo_onshow"'. (in_array($start,array('onshow','visible'))?'':' style="display:none;"') .'>'. $onshow .'</span></a>';
	}

	function the_link($onhide,$onshow=NULL,$name='all',$start='onhide')
	{
		echo Peekaboo_Plugin::get_the_link($onhide,$onshow,$name,$start);
	}
}

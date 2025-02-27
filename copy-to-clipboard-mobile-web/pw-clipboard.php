<?php
	/* 
	Plugin Name: Copy To Clipboard - mobile + web
	Plugin URI: http://www.puzzlersworld.com/wordpress-copy-to-clipboard-plugin
	Description: Plugin to copy text to clipboard on click of a button on desktop browsers and handles gracefully by showing a popup with textbox on mobile web browsers as well. Flexibility to change caption, width, height of the button, appends your blog url after copied text, sends Click event to your Google Analytics account. Usage LMCButton, http://www.lettersmarket.com/view_blog/a-3-copy_to_clipboard_lmcbutton.html.
	Author: Avinash Singhal
	Version: 2.3 
	Author URI: http://www.puzzlersworld.com
	*/  
	
	define('PW_CLIPPY_FILE', __FILE__);
	define('PW_CLIPPY_PATH',  plugin_dir_path(__FILE__));
	
	require PW_CLIPPY_PATH.'pw_clippy_settings.php';
	
	new pw_clippy_settings();
 
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'plugin_add_settings_link' );

	function plugin_add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=pw-clippy_list_options">Settings</a>';
		array_unshift($links, $settings_link); 
		return $links;
	}
	
	function pwClipboardInit() {

		$plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
		if (!is_admin()){
			//collapse script
			wp_register_script('flash_detect_min-js', $plugin_url.'/flash_detect_min.js', array (), '1.0.0' );
			wp_enqueue_script('flash_detect_min-js');
			
			wp_register_script('lmcbutton-js', $plugin_url.'/lmcbutton.js', array (), '1.0.0' );
			wp_enqueue_script('lmcbutton-js');
			
			//css
			wp_register_style( 'pw-clipboard-css', $plugin_url.'/style.css', array (), '1.0.0' );
			wp_enqueue_style( 'pw-clipboard-css' );
		}
		add_shortcode('pw-clippy', 'pwClipboardTronic');
	}
	add_action('init', 'pwClipboardInit');
	
	function getViaLink(){
		$options = get_option('pw-clippy');
		if($options['via_link'] == 'post' || empty($options['via_link'])){
			return get_permalink();
		}else if ($options['via_link'] == 'homepage'){
			return get_home_url();
		}else{
			return "";
		}
	}
	
	function pwClipboardTronic($atts, $content = null){
		$plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
		//print_r($atts);
		$blog_url = getViaLink();
		if(!empty($blog_url)){
			$blog_url = " via ".$blog_url;
		}
		extract(shortcode_atts(array(
			'caption' => 'Copy',
			'width' => '50',
			'height' => '25',
			'js' => 'none',
			'suffix' => $blog_url,
		), $atts));
		if($js == "none"){
			$js = 'pwTrackGoogleEvent(\''.$caption.'\',FlashDetect.installed)';
		}
		$cliptext = $content;
		$cliptext = str_replace("<br />", "", $cliptext);
		$cliptext .= $suffix;
		$retStr=	'<div class="pw-clippy-div" style="display:none;">
	<div class="pw-clippy-div-content">
		<div id="pw-clippy-header"></div>
		<textarea id="pw-clippy-text"> </textarea>
		<span class="pw-clippy-close-btn"><a href="javascript:void(0);" onclick="jQuery(\'.pw-clippy-div\').slideUp();" title="Close">X</a></span>
	</div>
</div><script type="text/javascript"> ShowLMCButton('.json_encode(html_entity_decode($cliptext)).', "'.addslashes($caption).'", "'.$js.'", "'.$plugin_url.'/lmcbutton.swf", "'.$width.'", "'.$height.'");  </script>';
			return $retStr;
	}
?>
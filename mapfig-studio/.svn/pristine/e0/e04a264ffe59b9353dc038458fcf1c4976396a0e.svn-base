<?php 
	//homepage view
	function view_studio_mapcode($atts){
		global $wpdb;
		$atts2 = $atts['mapid'];
		$mtotal = $wpdb->get_var("SELECT  count(*) FROM  ".STUDIO_MAP_TABLE." WHERE id=".$atts2);
		if($mtotal==1){
			$file=dirname(__FILE__).'/shortcode.php';
			
			ob_start();
			include($file);
			$content = ob_get_clean();
			
			return $content;
		}
	}

	function studio_add_thickbox() {
		add_thickbox();
	}
    
	function add_studio_modal_button() {
		echo '<a href="#" id="insert-studio-modal-map" class="button"><i class="fa fa-leaf fa-2"></i> Add Studio Map</a>';
	}
	
	function include_studio_modal_js_file() {
		wp_enqueue_script('studio_media_button', plugins_url('js/studio-modal.js', __FILE__), array('jquery'), '1.0', true);
	}
	
	function add_studio_stylesheet() {
		wp_enqueue_style( 'studio-colorbox', plugins_url('css/colorbox.css', __FILE__) );
	}
	
	function studio_footer_admin($default){
		$file=dirname(__FILE__).'/studio_admin_button.php';
		
		ob_start();
		include($file);
		$content = ob_get_clean();
		
		echo $content;
	}
	
	add_shortcode('StudioMap', 'view_studio_mapcode');
	add_action('media_buttons', 'add_studio_modal_button', 16);
	add_action('wp_enqueue_media', 'include_studio_modal_js_file');
	add_filter('admin_footer_text', 'studio_footer_admin', 2);
	add_action('init','studio_add_thickbox');
?>
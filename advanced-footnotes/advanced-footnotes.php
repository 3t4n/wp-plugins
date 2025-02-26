<?php
	/*
		Plugin Name: Advanced Footnotes
		Description: Simple yet powerful footnotes integration on your WordPress site or theme itself.
		Version: 1.1.2
		Author: Yunus Tabakoğlu
		Author URI: http://yunustabakoglu.com/
		Text Domain: advanced_footnotes
	*/

	defined('ABSPATH') or die('Oh, hi!');

	global $advanced_footnotes_data;
	$advanced_footnotes_data = get_file_data(plugin_dir_path(__FILE__)."advanced-footnotes.php", array('Version'));

	class advanced_footnotes{
		static $footnote_nth = 0;
		static $footnote_numberless_nth = 0;
		static $footnotes = array();
		static $footnotes_numberless = array();
		
		static function is_set(){
			return (self::$footnote_nth > 0 || self::$footnote_numberless_nth > 0);
		}

		static function reset(){
			self::$footnote_nth = 0;
			self::$footnote_numberless_nth = 0;
			self::$footnotes = array();
			self::$footnotes_numberless = array();
		}

		static function add_ref($atts, $content) {
				$opts = get_option('afn_opts');
				$a = shortcode_atts( array(
						'type' => 'numeric',
				), $atts );
			
				switch($a['type']){
					case "numeric":
						self::$footnote_nth++;
						self::$footnotes[] = $content;
						return '<a class="afn-footnotes-ref hook numeric" id="article-footnote-hook-'.self::$footnote_nth.'" name="article-footnote-hook-'.self::$footnote_nth.'" href="#article-footnote-'.self::$footnote_nth.'">'.self::$footnote_nth.'</a>';
					break;
					case "numberless": case "non-numeric": default:
						self::$footnote_numberless_nth ++;
						self::$footnotes_numberless[] = $content;
						return '<a class="afn-footnotes-ref hook non-numeric" id="article-footnote-numberless-hook-'.self::$footnote_numberless_nth.'" name="article-footnote-numberless-hook-'.self::$footnote_numberless_nth.'" href="#article-footnote-numberless-'.self::$footnote_numberless_nth.'">'.$opts['var_footnotesymbol'].'</a>';
					break;
				}
		}

		static function refs_shortcode($atts){

			$opts = get_option('afn_opts');

			if(isset($opts['var_reftitle']) && trim($opts['var_reftitle']) != ""){
				$defaultTitle = $opts['var_reftitle'];
			}
			else{
				$defaultTitle = __('References', 'advanced_footnotes');
			}

			$a = shortcode_atts( array(
					'title' => $defaultTitle,
			), $atts );

			if($a['title'] === 'false' || $a['title'] === ''){
				$a['title'] = false;
			}

			return self::print_refs(false, $a['title']);
		}
		
		static function print_refs($print = true, $title = false){
			$opts = get_option('afn_opts');

			$html = '<div class="afn-footnotes">';

			if($title !== false){
				$html .= '<h3 class="afn-footnotes-title">'.$title.'</h3>';
			}
			
			$html .= '<ul class="afn-footnotes-list">';

			foreach(self::$footnotes_numberless as $nth => $footnote){
				$html .= '<li class="footnote-item afn-textarea">';
				$html .= '<a class="afn-footnotes-ref reference non-numeric" id="article-footnote-numberless-'.($nth + 1).'" name="article-footnote-numberless-'.($nth + 1).'" href="#article-footnote-numberless-hook-'.($nth + 1).'">'.$opts['var_footnotesymbol'].'</a> '.$footnote;
				$html .= '</li>';
			}
			foreach(self::$footnotes as $nth => $footnote){
				$html .= '<li class="footnote-item afn-textarea">';
				$html .= '<a class="afn-footnotes-ref reference numeric" id="article-footnote-'.($nth + 1).'" name="article-footnote-'.($nth + 1).'" href="#article-footnote-hook-'.($nth + 1).'">'.($nth + 1).'</a> '.$footnote;
				$html .= '</li>';
			}

			$html .= '</ul>';
			$html .= '</div>';

			if($print){
				echo $html;
			}
			return $html;
			
		}

		static function get_refs(){
			$refs = array();

			foreach(self::$footnotes_numberless as $nth => $footnote){
				$num = $nth+1;
				$idprefix = 'article-footnote-numberless-';
				$hrefprefix = '#article-footnote-hook-';


				$refs['numberless'][] = array(
					'classes' => 'afn-footnotes-ref reference non-numeric',
					'num' => $num,
					'idprefix' => $idprefix,
					'id' => $idprefix.$num,
					'hrefprefix' => $hrefprefix,
					'href' => $hrefprefix.$num,
					'content' => $footnote,
				);
			}

			foreach(self::$footnotes as $nth => $footnote){
				$num = $nth+1;
				$idprefix = 'article-footnote-';
				$hrefprefix = '#article-footnote-hook-';

				$refs['numeric'][] = array(
					'classes' => 'afn-footnotes-ref reference numeric',
					'num' => $num,
					'idprefix' => $idprefix,
					'id' => $idprefix.$num,
					'hrefprefix' => $hrefprefix,
					'href' => $hrefprefix.$num,
					'content' => $footnote,
				);
			}

			return $refs;
		}
	}
	add_shortcode('footnote', array('advanced_footnotes', 'add_ref'));
	add_shortcode('footnotes', array('advanced_footnotes', 'refs_shortcode'));

	add_action( 'wp_head', array('advanced_footnotes', 'reset'));

	function advanced_footnotes_mce_scripts($plugin_array){
		$plugin_array["advanced_footnotes"] =  plugin_dir_url(__FILE__) . 'assets/js/tinymce.advanced-footnotes.js';
		return $plugin_array;
	}
	add_filter("mce_external_plugins", "advanced_footnotes_mce_scripts");

	function advanced_footnotes_user_includes() {
		global $advanced_footnotes_data;
		$opts = get_option('afn_opts');
		if(isset($opts['include_js'])){
			wp_enqueue_script( 'advanced_footnotes_js', plugin_dir_url( __FILE__ ) . 'assets/js/advanced-footnotes.js', array("jquery"), $advanced_footnotes_data[0], false );
		}

		if(isset($opts['include_css'])){		
			wp_enqueue_style('advanced_footnotes_css', plugin_dir_url( __FILE__ ).'assets/css/advanced-footnotes.css', array(), $advanced_footnotes_data[0] );
		}
	}
	add_action('wp_enqueue_scripts', 'advanced_footnotes_user_includes');

	function advanced_footnotes_admin_includes() {
		global $advanced_footnotes_data;
		wp_enqueue_script( 'advanced_footnotes_js_admin', plugin_dir_url( __FILE__ ) . 'assets/js/advanced-footnotes-admin.js', array("jquery"), $advanced_footnotes_data[0], false );
	}
	add_action( 'admin_enqueue_scripts', 'advanced_footnotes_admin_includes' );

	function advanced_footnotes_register_button($buttons){
		array_push($buttons, "footnote");
		return $buttons;
	}
	add_filter("mce_buttons", "advanced_footnotes_register_button");

	function advanced_footnotes_user_head(){
		$opts = get_option('afn_opts');
		
		if(isset($opts['customcss']) && trim($opts['customcss'] != "")){
			echo '<style>' . $opts['customcss'] . '</style>'."\r\n";
		}

		if(!isset($opts['var_disablejsopts'])){
			$meta = array();

			if(isset($opts['var_scrollgap'])){
				$meta['scrollGap'] = intval($opts['var_scrollgap']);
			}
			if(isset($opts['var_scrollspeed'])){
				$meta['scrollSpeed'] = intval($opts['var_scrollspeed']);
			}

			if(count($meta) > 0){
				echo "<meta name='afn-jsopts' content='".json_encode($meta)."'>\r\n";
			}
		}
	}
	add_action('wp_head','advanced_footnotes_user_head');

	function advanced_footnotes_install(){
		if(!get_option('afn_opts')) {
			$op = array(
				'include_css'		=> "on",
				'include_js'		=> "on",
				'var_reftitle' 		=> __('References', 'advanced_footnotes'),
				'var_disablejsopts' => "on",
				'var_scrollgap'		=> "0",
				'var_scrollspeed'	=> "350",

			);
			add_option('afn_opts', $op);
		}
	}
	register_activation_hook(__FILE__, 'advanced_footnotes_install');

	function advanced_footnotes_restore(){
		delete_option('afn_opts');
		advanced_footnotes_install();
	}

	include(plugin_dir_path( __FILE__ ).'options.php');
?>
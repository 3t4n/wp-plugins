<?php
/**
 * Plugin Name: AE Syntax
 * Plugin URI: http://ringzer0devel.wordpress.com/2011/03/09/syntax-highligher-for-the-admin-code-editor/
 * Description: A simple syntax highligher for admin edit pages for themes and plugins.
 * Author: RingZer0
 * Author URI: http://ringzer0devel.wordpress.com/
 * Version: 3.0
 * Requires at least: 2.6
 * Tested up to: 3.1
 * Stable tag: 3.0
 **/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

define('AES_LIBS',plugins_url('/lib/',__FILE__));

class wp_cm_syntax {
	public function __construct(){
		add_action('admin_init',array(&$this,'admin_init'));
		add_action('admin_head',array(&$this,'admin_head'));
		add_action('admin_footer',array(&$this,'admin_footer'));
	}
	public function admin_footer(){
		if (!$this->is_editor())
			return;

		$filetype = $this->get_file_ext();

		?>

		<script type="text/javascript">

		<?php

		switch($filetype){
			case 'php': ?>
				var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
					lineNumbers: true,
					matchBrackets: true,
					mode: "application/x-httpd-php",
					indentUnit: 4,
					indentWithTabs: true,
					enterMode: "keep",
					tabMode: "shift"
				});
			<?php break;
			case 'js': ?>
				var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
					lineNumbers: true,
					matchBrackets: true,
					mode: "text/javascript",
					indentUnit: 4,
					indentWithTabs: true,
					enterMode: "keep",
					tabMode: "shift",
					onKeyEvent: function(i, e) {
						// Hook into ctrl-space
						if (e.keyCode == 32 && (e.ctrlKey || e.metaKey) && !e.altKey) return startComplete();
					}

				});
				jQuery('#template .submit').before('<p><em>JavaScript auto-complete enabled.  To use this feature, press Ctrl+Space</em></p>');
			<?php break;
			case 'css': ?>
				var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
					lineNumbers: true,
					matchBrackets: true,
					mode: "text/css",
					indentUnit: 4,
					indentWithTabs: true,
					enterMode: "keep",
					tabMode: "shift"
				});
			<?php break;
		} ?>

		</script>

		<?php
	}
	public function admin_init(){
		wp_enqueue_script('jquery');	// For AJAX code submissions
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-resizable');
	}
	public function admin_head(){
		if (!$this->is_editor())
			return;

		$filetype = $this->get_file_ext();

		?>
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>style.css" />
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>codemirror.css" />
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>codemirror.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>script.js"></script>

		<?php

		switch($filetype){
			case 'php': ?>

				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>css.css" />
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>xml.css" />
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>javascript.css" />
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>clike.css" />
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>xml.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>javascript.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>css.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>clike.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>php.js"></script>

			<?php break;
			case 'css': ?>

				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>css.css" />
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>css.js"></script>

			<?php break;
			case 'js': ?>

				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>javascript.css" />
				<link rel="stylesheet" href="<?php echo AES_LIBS; ?>complete.css" />
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>javascript.js"></script>
				<script type="text/javascript" src="<?php echo AES_LIBS; ?>complete.js"></script>

			<?php break;
		}
	}
	private function is_editor(){
		if (!strstr($_SERVER['SCRIPT_NAME'],'editor.php'))
			return false;
		return true;
	}
	private function get_file_ext(){
		if (!isset($_GET['file']))
			return 'php';
		elseif (strstr($_GET['file'],'.css'))
			return 'css';
		elseif (strstr($_GET['file'],'.js'))
			return 'js';
		else
			return 'php';
	}
}

if (is_admin())
	$aeh = new wp_cm_syntax();


?>

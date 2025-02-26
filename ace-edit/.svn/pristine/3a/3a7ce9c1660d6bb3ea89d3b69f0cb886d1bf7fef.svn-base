<?php
/* 
Plugin Name: ACE Edit
Plugin URI: https://www.wplab.com/free-plugins/ace-edit/
Description: Add syntax highlighting and more to the theme and plugin editor. 
Version: 1.1
Author: Matthias Krok
Author URI: https://www.wplab.com/ 
License: GPL2+
Text Domain: ace-edit
*/


class WPL_ACE_Editor {

	static public $PLUGIN_NAME;
	static public $PLUGIN_PATH;
	static public $PLUGIN_DIR;
	static public $PLUGIN_URL;
	
	public function __construct() {
	
		self::$PLUGIN_NAME = basename(__FILE__);
		self::$PLUGIN_PATH = plugin_basename( dirname(__FILE__) );
		self::$PLUGIN_DIR = WP_PLUGIN_DIR.'/'.self::$PLUGIN_PATH.'/';
		self::$PLUGIN_URL = WP_PLUGIN_URL.'/'.self::$PLUGIN_PATH.'/';
		
		add_action( 'admin_init', array( &$this, 'onWpAdminInit' ) );

	}
		
	public function onWpAdminInit() {
		global $pagenow;

		if ( ( $pagenow == 'theme-editor.php') || ( $pagenow == 'plugin-editor.php') ) {
			add_action( 'admin_enqueue_scripts', array( &$this, 'onWpEnqueueScripts' ) );		
			add_action( 'admin_footer', array( &$this, 'modifyTextarea' ) );
		}

	}
	
	public function onWpEnqueueScripts() {

		// ace editor
		wp_register_script( 'ace_editor', self::$PLUGIN_URL.'/js/ace/ace.js', array() );
		wp_enqueue_script( 'ace_editor' );
	    
		// ace css mode
		wp_register_script( 'ace_mode_css', self::$PLUGIN_URL.'/js/ace/mode-css.js', array( 'ace_editor' ) );
		wp_enqueue_script( 'ace_mode_css' );
	    
		// ace php mode
		wp_register_script( 'ace_mode_php', self::$PLUGIN_URL.'/js/ace/mode-php.js', array( 'ace_editor' ) );
		wp_enqueue_script( 'ace_mode_php' );
	    
		// ace chrome theme
		wp_register_script( 'ace_theme_chrome', self::$PLUGIN_URL.'/js/ace/theme-chrome.js', array( 'ace_editor' ) );
		wp_enqueue_script( 'ace_theme_chrome' );
	    
	}

	
	public function modifyTextarea() {
		global $pagenow;
		
		// set document mode
		$mode = 'CssMode';
		if ( $pagenow == 'plugin-editor.php') $mode = 'PhpMode';
		if ( substr( $_REQUEST['file'], -4 ) == '.php' ) $mode = 'PhpMode';
		if ( substr( $_REQUEST['file'], -4 ) == '.css' ) $mode = 'CssMode';
		if ( substr( $_REQUEST['file'], -3 ) == '.js' )  $mode = 'JsMode';

		?>

			<style type="text/css">
				#wpl_ace_editor {
					height: 540px;
					width: 97%;
					position: relative;
					border: 1px solid #ccc;
				}
				#template #wpl_ace_editor div {
	 				margin-right: auto;
				}

				<?php if ( $mode == 'CssMode' ): ?>
					/* hide warnings in css mode */
					#wpl_ace_editor .ace_gutter-cell.ace_warning {
						background-image: none;
					}	
				<?php endif; ?>

			</style>

		    <script type="text/javascript">
	    	    jQuery(document).ready(function() {

	            	// insert #wpl_ace_editor div after textarea
	            	jQuery('textarea[name="newcontent"]').after('<div id="wpl_ace_editor">test</div>'); 
	            	
				    var styles_textarea = jQuery('textarea[name="newcontent"]').hide();
				    var styles_editor = ace.edit("wpl_ace_editor");

				    styles_editor.setTheme("ace/theme/chrome");
				    styles_editor.setShowPrintMargin( false );

				    var JavaScriptMode = require("ace/mode/javascript").Mode;
				    var CssMode = require("ace/mode/css").Mode;
				    var PhpMode = require("ace/mode/php").Mode;
				    // styles_editor.getSession().setMode(new CssMode());
				    styles_editor.getSession().setMode(new <?php echo $mode ?>());
		
				    // connect editors with textareas
				    // http://stackoverflow.com/questions/6440439/how-do-i-make-a-textarea-an-ace-editor
				    styles_editor.getSession().setValue(styles_textarea.val());

				 	styles_editor.getSession().on('change', function(){
						styles_textarea.val(styles_editor.getSession().getValue());
					});

		        });

	    	</script>

    	<?php

	} // modifyTextarea
	
} // class WPL_ACE_Editor

// instantiate object
$oACE_Editor = new WPL_ACE_Editor();


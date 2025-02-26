<?php
/**
 * The Plugin Functions File
 * 
 * @since 2.0.0
 */ 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}	
	
	add_action( 'admin_footer', array( AH_Prism_Syntax_Highlighter::get_instance(), 'add_admin_script' ) );
	add_action( 'admin_notices', array( AH_Prism_Syntax_Highlighter::get_instance(), 'admin_notices' ) );
	
	add_filter( 'mce_buttons', array( AH_Prism_Syntax_Highlighter::get_instance(), 'add_mce_button' ) );
	add_filter( 'mce_external_plugins', array( AH_Prism_Syntax_Highlighter::get_instance(), 'add_mce_plugin' ) );
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'prism_add_settings_link' );
	
	register_activation_hook( __FILE__, array( AH_Prism_Syntax_Highlighter::get_instance(), 'activation_hook' ) );
	
	
	class AH_Prism_Syntax_Highlighter {
		private static $instance = null;
		
		public static function get_instance() {
			if ( null == self::$instance )
				self::$instance = new self;
			
			return self::$instance;
		}
		
		
		private $load_pjsh;
		
		private function __construct() {
			$this->load_pjsh = false;
		}
		
		private function decide_load_prism() {
			if ( strstr( get_post()->post_content, '<code class="language-' ) !== false ) {
				$this->load_pjsh = true;
			}
		}
		
		
		public function activation_hook() {
			$theme_css_file_contents = file_get_contents( get_stylesheet_directory() . '/style.css' );
			
			if ( preg_match( '/(pre|code) ?(,|\{)/', $theme_css_file_contents ) ) {
				update_option( 'notice_warn_theme_css', '1' );
			}
		}
		
		public function admin_notices() {
			if ( get_option( 'notice_warn_theme_css' ) == '1' ) {
?>
				<div class="updated">
					<h3>AH Code Highlighter</h3><br />
                    <p>It looks like your theme modifies<font color="red">&lt;pre&gt; and/or &lt;code&gt;</font> tags. It could interfere with Prism and result in visual bugs.<br />
					<strong>Please <a href="<?php echo admin_url() . 'theme-editor.php'; ?>">edit your theme</a> and comment out or remove the concerned lines.</strong></p>			
					<form method="post" action="options.php">
						<?php settings_fields( 'prism-settings-group' ); ?>
						<?php do_settings_sections( 'prism-settings-group' ); ?>		
						<input type="hidden" name="notice_warn_theme_css" value="0" />				
						<?php submit_button( 'Understood, hide this warning' ); ?>
					</form>
				</div>
<?php
			}
		}
		
		
		public function add_script() {
			if ( true == $this->load_pjsh ) {
				echo '<script src="' . plugins_url( 'ah-prism-syntax-highlighter/js/' . ( get_option( 'custom_prism_js' ) != '' ? esc_attr( get_option( 'custom_prism_js' ) ) : 'prism.js' ) ) . '"></script>';
			}
		}   
        
		public function add_admin_script() {
			echo
			'<script type="text/javascript">
				var currentLanguage = "' . get_option( 'default_language' ) . '";
				var currentInlineCode = ' . ( get_option( 'default_inline' ) == 'on' ? 'true' : 'false' ) . ';
				var currentLineNumbers = ' . ( get_option( 'default_line_numbers' ) == 'on' ? 'true' : 'false' ) . ';
			</script>';
			
			echo '<script src="' . plugins_url( 'ah-prism-syntax-highlighter/js/' . ( get_option( 'custom_prism_js' ) != '' ? esc_attr( get_option( 'custom_prism_js' ) ) : 'prism.js' ) ) . '"></script>';
		}
		
		
		public function add_mce_button( $mce_buttons ) {
			array_push($mce_buttons, 'prism');
			return $mce_buttons;
		}
		
		public function add_mce_plugin( $mce_plugins ) {
			$mce_plugins['prism'] = plugins_url( 'ah-prism-syntax-highlighter/js/editor-plugin.js' );
			return $mce_plugins;
		}
    
	}

function add_prism_front_script() {
        
    wp_enqueue_script( 'prism', plugin_dir_url( __FILE__ ) . 'js/prism.js', array(), '', true );
        
}  
add_action( 'wp_enqueue_scripts', 'add_prism_front_script' ); 

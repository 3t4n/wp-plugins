<?php
/*
Plugin Name: Section Page
Plugin URI: http://wordpress.org/extend/plugins/section-page/
Description: Section Page is a simple plugin allowing you to insert dropdown sections in your wordpress pages and posts.
Version: 1.0.2
Author: <a href="https://github.com/Skyree">Loïc B. Florin</a> 
Author URI: Loïc B. Florin
*/
if (!class_exists("Owc_section_page")) {

    class Owc_section_page {
		var $adminOptionsName = 'owc_section_pageAdminOptions';
		
		// Constructor
		function Owc_section_page() {
			// Action enabled
			add_action( 'admin_menu',										array( &$this, 'adminMenu' ) );
			add_action( 'wp_head',											array( &$this, 'frontEnqueues' ) );
			add_filter( 'the_content',										array( &$this, 'contentFilter' ) );
			
			if ( current_user_can('edit_posts') || current_user_can('edit_pages') || get_user_option('rich_editing') == 'true') {
				add_filter( 'mce_external_plugins', 						array( &$this, 'register_tinymce_plugin' ) ); 
				add_filter( 'mce_buttons_2', 								array( &$this, 'add_tinymce_button' ) );
			}
			// Activation/Desactivation
			register_activation_hook(__FILE__, 								array( &$this, 'init') );
			register_deactivation_hook(__FILE__, 							array( &$this, 'owc_section_page_uninstall'));
		}
		
		// On activation
		function init() {
			$this->getAdminOptions();
		}
		// On desactivation
		function owc_section_page_uninstall() {
			delete_option($this->adminOptionsName);
		}
		
		// Admin menu
		function adminMenu() {
			$plugin_page = add_options_page( __( 'Section Page', 'owc_sp' ), __( 'Section Page', 'owc_sp' ), 'manage_options', 'section-page', array(&$this, 'adminPage') );
			add_action( 'admin_head-'. $plugin_page, array( &$this, 'adminEnqueues' ) );
		}
		
		// Scripts and styles loading
		function frontEnqueues() {
			$options = $this->getAdminOptions();
			
			?>
			<script type="text/javascript">
				var owc_sp_use_char = <?php echo ($options['owc_sp_use_char']?'true':'false'); ?>;
				var owc_sp_use_animation = <?php echo ($options['owc_sp_use_animation']?'true':'false'); ?>;
			</script>
			<?php
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'owc_section_page', plugins_url( 'assets/actions.js', __FILE__ ), array( 'jquery' ) );
			echo '<link type="text/css" rel="stylesheet" href="' . plugins_url( 'assets/base.css', __FILE__ ) . '" />';
			if($options['owc_sp_css']) {
				?>
					<style type="text/css">
						<?php echo $options['owc_sp_css']; ?>
					</style>
				<?php
			}
		}
		
		// Scripts and styles loading in admin head
		function adminEnqueues() {
			wp_enqueue_script( 'codemirrorjs', plugins_url( 'assets/codemirror.js', __FILE__ ), array() );
			wp_enqueue_style( 'codemirrorcss', plugins_url( 'assets/codemirror.css', __FILE__ ), array() );
			wp_enqueue_script( 'codemirrorcssjs', plugins_url( 'assets/css.js', __FILE__ ), array() );
			wp_enqueue_script( 'codemirroruse', plugins_url( 'assets/codemirror_use.js', __FILE__ ), array('codemirrorjs', 'codemirrorcssjs') );
			?>
			<style type="text/css">
				.CodeMirror {
					width: 500px;
					border: 1px solid #ddd;
					-webkit-border-radius: 5px;
					   -moz-border-radius: 5px;
							border-radius: 5px;
				}
			</style>
			<?php
		}
		
		// Content filter
		function contentFilter($content) {
		
			$options = $this->getAdminOptions();
			$owc_sp = '<div class="owc-section-page '.$options['owc_sp_class'].'" data-up="'.$options['owc_sp_close_char'].'" data-down="'.$options['owc_sp_open_char'].'">';
			$owc_sp_open = '<div class="owc-sp-open '.$options['owc_sp_class_title'].'">';
			$owc_sp_elm = '<'.$options['owc_sp_title'].($options['owc_sp_class_title_elm']?' class="'.$options['owc_sp_class_title_elm'].'"':'').'>'.($options['owc_sp_use_char']?'<span class="owc-sp-toggle-arrow">'.$options['owc_sp_close_char'].'</span> ':'').'$2</'.$options['owc_sp_title'].'></div>';
			$owc_sp_content = '<div class="owc-sp-content '.$options['owc_sp_class_content'].'">$4</div>';
			
			$content = preg_replace( '#(\[section\=)(.*?)(\])(.*?)(\[endsection\])#si', $owc_sp.$owc_sp_open.$owc_sp_elm.$owc_sp_content.'</div>', $content );
			return $content;
		}
		
		// Get options
		function getAdminOptions() {
			$owc_section_pageAdminOptions = array(
					'owc_sp_title' => 'h2',
					'owc_sp_class' => '',
					'owc_sp_class_title_elm' => '',
					'owc_sp_class_title' => '',
					'owc_sp_class_content' => '',
					'owc_sp_use_char' => true,
					'owc_sp_close_char' => '&#9658;',
					'owc_sp_open_char' => '&#9660;',
					'owc_sp_use_animation' => true,
					'owc_sp_css' => ''
				);
			$owc_section_pageCurrentAdminOptions = get_option($this->adminOptionsName);
			if (!empty($owc_section_pageCurrentAdminOptions)) {
				foreach ($owc_section_pageCurrentAdminOptions as $key => $option)
					$owc_section_pageAdminOptions[$key] = $option;
			}
			update_option($this->adminOptionsName, $owc_section_pageAdminOptions);
			return $owc_section_pageAdminOptions;
		}
		
		// Admin page
		function adminPage() {
			$options = $this->getAdminOptions();
			if ( isset( $_POST['owc_section_page_submit'] ) && check_admin_referer( 'owc-section-page' ) ) {
				foreach($options as $opt_k => &$opt_v) {
					$options[$opt_k] = $_POST[$opt_k];
				}
				if(empty($options['owc_sp_title'])) $options['owc_sp_title'] = 'h2';
				
				update_option($this->adminOptionsName, $options);
				print '<div class="updated"><p><strong>';
				_e( 'Parameters updated', 'owc_sp' );
				print '</strong></p></div>';
			}
			include( 'owc-section-page-admin.php' );
		}

		// TinyMCE plugin
		function register_tinymce_plugin($plugin_array) {
			$plugin_array['owc_section_page_button'] = plugins_url( 'assets/dynamic.js.php', __FILE__ );
			return $plugin_array;
		}

		// TinyMCE button
		function add_tinymce_button($buttons) {
			$buttons[] = 'owc_section_page_button';
			return $buttons;
		}
	}
}

// Instanciation
add_action( 'init', 'Owc_section_page' );
function Owc_section_page() {
	global $owc_section_page;
	$owc_section_page = new Owc_section_page();
	$owc_section_page->init();
}

?>
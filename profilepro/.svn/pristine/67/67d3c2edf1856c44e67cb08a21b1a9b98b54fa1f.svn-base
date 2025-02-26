<?php

class profilepro_admin {

	var $options;

	function __construct() {
	
		/* Plugin slug and version */
		$this->slug = 'profilepro';
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$this->plugin_data = get_plugin_data(PROFILEPRO_PATH . 'index.php', false, false);
		
		
		/* Priority actions */
		add_action('admin_menu', array(&$this, 'add_menu'), 9);
		add_action('admin_enqueue_scripts', array(&$this, 'add_styles'), 9);
		add_action( 'admin_enqueue_scripts', array( $this, 'include_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'include_styles' ) );
		add_action('admin_init', array(&$this, 'admin_init'), 9);
		
	}

	function admin_init() {
		
		$this->tabs = array(
			'settings' => __('Settings','profilepro'),
			'email_template' => __('Email Template','profilepro'),
			'pending_approve' => __('User Request','profilepro'),			
		);
		$this->default_tab = 'settings';
		
		$this->options = get_option('profilepro');
		if (!get_option('profilepro')) {
			update_option('profilepro', profilepro_default_options() );
		}
		
	}
	
	
	

	function add_styles(){
	
		//wp_register_style('profilepro_admin',PROFILEPRO_URL.'admin/css/admin.css');
		//wp_enqueue_style('profilepro_admin');
		
		
		
		
	}
	
	function add_menu() {
	
		
		add_menu_page( __('ProfilePro','profilepro'), 'ProfilePro', 'manage_options', $this->slug, array(&$this, 'admin_page'),'dashicons-admin-users');
		add_submenu_page( $this->slug, __('Forms', $this->slug), __('Forms', $this->slug), 'manage_options', 'edit.php?post_type=profilepro_form', '', '' );
                  do_action("profilepro_submenu");
		
	
	}

	function admin_tabs( $current = null ) {
			$tabs = $this->tabs;
			$links = array();
			if ( isset ( $_GET['tab'] ) ) {
				$current = $_GET['tab'];
			} else {
				$current = $this->default_tab;
			}
			foreach( $tabs as $tab => $name ) :
				if ( $tab == $current ) :
					$links[] = "<a class='nav-tab nav-tab-active' href='?page=".$this->slug."&tab=$tab'>$name</a>";
				else :
					$links[] = "<a class='nav-tab' href='?page=".$this->slug."&tab=$tab'>$name</a>";
				endif;
			endforeach;
			foreach ( $links as $link )
				echo $link;
	}

	function get_tab_content() {
		$screen = get_current_screen();
		if( strstr($screen->id, $this->slug ) ) {
			if ( isset ( $_GET['tab'] ) ) {
				$tab = $_GET['tab'];
			} else {
				$tab = $this->default_tab;
			}
			require_once PROFILEPRO_PATH.'admin/dashboard/'.$tab.'.php';
		}
	}
	
	function include_scripts( $hook ){
			wp_enqueue_script('jquery');
			wp_register_script('profilepro_admin_script', PROFILEPRO_URL.'admin/assets/js/scripts.js',array('jquery'),'',true);
			wp_localize_script('profilepro_admin_script', 'data', array('url'=>PROFILEPRO_URL));
			wp_enqueue_script('profilepro_admin_script');
			wp_enqueue_script( 'jquery-ui-sortable' );
			
		}
		
		function include_styles( $hook ) {
			wp_enqueue_style( 'profilepro_admin_style', PROFILEPRO_URL.'admin/assets/css/admin_style.css' );
			
			
			
				
		}

	
	function save() {
	
		foreach($_POST as $key => $value) {
	
			if ($key != 'submit') {
				if (!is_array($_POST[$key])) {
				
					$this->options[$key] = stripslashes( esc_attr($_POST[$key]) );
				} else {
					
				
					$this->options[$key] = $_POST[$key];
					
				}
			}
		}
		
		update_option('profilepro', $this->options);
		
		echo '<div class="updated"><p><strong>'.__('Settings saved.','profilepro').'</strong></p></div>';
	}

	function reset() {
		update_option('profilepro', profilepro_default_options() );
		$this->options = array_merge( $this->options, profilepro_default_options() );
		echo '<div class="updated"><p><strong>'.__('Settings are reset to default.','profilepro').'</strong></p></div>';
	}
	
	
	
	function admin_page() {
	
		
		
		if (isset($_POST['submit'])) {
			$this->save();
		}
		
		if (isset($_POST['reset-options'])) {
			$this->reset();
		}
		
		
		
	?>
	
		<div class="wrap <?php echo $this->slug; ?>-admin">
		
			<h2 class="nav-tab-wrapper"><?php $this->admin_tabs(); ?></h2>

			<div class="<?php echo $this->slug; ?>-admin-contain">
				
				<?php $this->get_tab_content(); ?>
				
				<div class="clear"></div>
				
			</div>
			
		</div>

	<?php }

}
$profilepro_admin = new profilepro_admin();
?>

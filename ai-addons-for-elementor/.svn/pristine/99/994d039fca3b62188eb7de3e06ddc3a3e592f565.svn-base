<?php

class AIEA_Mega_Menu {
	
	private static $_instance = null;
	
	public function __construct() {
		
		global $pagenow;
		
		add_action( 'init', [ $this, 'mega_menu_cpt' ] );
		
		add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ], 90 );
		
		add_action( 'rest_api_init', [ $this, 'api_init' ] );
		
		if( $pagenow == 'nav-menus.php' ) {
			
			add_action( 'admin_footer', [ $this, 'mega_menu_footer' ] );
			
			add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
			
			add_action( 'wp_nav_menu_item_custom_fields', [ $this, 'menu_custom_fields' ], 10, 5 );

			add_action( 'wp_update_nav_menu_item', [ $this, 'update_nav_menu_item' ], 10, 3 );
			
			add_filter( 'wp_setup_nav_menu_item', [ $this, 'set_mega_menu_item' ] );
		
		}
				
	}
	
	public function plugins_loaded() {
		
		// Front-end
		$this->front_end();
		
	}

	public function front_end() {		
		
		require_once ( AIEA_DIR . 'core/mega-menu/front-end.php' );
		
	}
	
	public function admin_scripts() {
		
		wp_enqueue_style( 'bootstrap-icons', AIEA_URL . 'assets/css/front-end/bootstrap-icons.css', false, '1.8.1' );
		wp_enqueue_style( 'bootstrapicons-iconpicker', AIEA_URL . 'core/mega-menu/assets/css/bootstrapicons-iconpicker.css', false, '1.0.0' );
		wp_enqueue_script( 'bootstrapicon-iconpicker', AIEA_URL . 'core/mega-menu/assets/js/bootstrapicon-iconpicker.min.js', array( 'jquery' ), '1.0', true );
		
		wp_enqueue_style( 'ai-mega-menu', AIEA_URL . 'core/mega-menu/assets/css/mega-menu.css', false, '1.0.0' );
		wp_enqueue_script( 'ai-mega-menu', AIEA_URL . 'core/mega-menu/assets/js/mega-menu.js', array( 'jquery' ), '1.0', true );
		wp_localize_script( 'ai-mega-menu', 'aiea_mm_obj',
			array( 
				'rest_url' => esc_url(get_rest_url() . 'ai/v1/'),
				'mega_menu_html' => '<div class="ai-mega-menu-active"><h4>AI Mega Menu</h4><div class="ai-mm-fields chk-box">					
						<div class="inc-checkbox path">
							<input type="checkbox" class="ai-menu-as-mm">
							<svg viewBox="0 0 21 21">
								<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
							</svg>
						</div>
						<label>Enable this menu as mega menu</label>
						<img src="'. esc_url( AIEA_URL .  'assets/images/logo.png' ) .'" alt="Icredible" />
					</div></div>'
			)
		);
		
		
	}
	
	public function mega_menu_cpt() {
		
		require_once ( AIEA_DIR . 'core/mega-menu/cpt.php' );
		
	}
	
	public function api_init() {
		register_rest_route(
			'ai/v1', '/megamenu'. '/(?P<key>\w+(|[-]\w+))/',
			array(
				'methods'             => \WP_REST_Server::ALLMETHODS,
				'callback'            => [ $this, 'callback' ],
				'permission_callback' => '__return_true', 
			// all permissions are implimented inside the callback action
			)
		);
	}
	
	public function callback( $request ) {
		$this->request = $request;
		$menu_item = $this->request['key'];		
		return $this->get_content_editor( $menu_item );
	}
	
	public function get_content_editor( $menu_item ) {
		
		$builder_post_title = 'ai-megamenu-content-' . $menu_item;
		$builder_post_id    = aiea_modules()->get_post_by_title( $builder_post_title, OBJECT, 'aiea_content' );

		if ( is_null( $builder_post_id ) ) {
			$defaults        = array(
				'post_content' => '',
				'post_title'   => $builder_post_title,
				'post_status'  => 'publish',
				'post_type'    => 'aiea_content',
			);
			$builder_post_id = wp_insert_post( $defaults );
			update_post_meta( $builder_post_id, '_wp_page_template', 'elementor_canvas' );
		} else {
			$builder_post_id = $builder_post_id->ID;
		}

		// if wpml is active and wpml not set for this post
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
			$builder_post_id = $this->set_wpml_data($builder_post_id);
		}

		$url = admin_url( 'post.php?post=' . $builder_post_id . '&action=elementor' );
		wp_safe_redirect( $url );
		exit;
	}
	
	public function set_wpml_data($builder_post_id) {
		global $sitepress;
		$default_language = $sitepress->get_default_language();
		$wpml_element_type = apply_filters( 'wpml_element_type', 'elementskit_content' );
		$trid = $sitepress->get_element_trid( $builder_post_id, $wpml_element_type );
		if( ! $trid ) {
			$sitepress->set_element_language_details( $builder_post_id, $wpml_element_type, false, $default_language, null, false );
		}

		// get wpml post by language code
		$referer = wp_get_referer();
		$referer = parse_url($referer);
		$referer = !empty($referer['query']) ? $referer['query'] : '';
		$referer = parse_str($referer, $referer_args);

		if( !empty($referer_args['post']) ) {
			$language_details = apply_filters( 'wpml_post_language_details', NULL, $referer_args['post'] );
			if( !is_wp_error($language_details) ) {
				$builder_post_id = apply_filters( 'wpml_object_id', $builder_post_id, 'elementskit_content', true, $language_details['language_code'] );
			}
		}

		return $builder_post_id;
	}
	
	public function menu_custom_fields( $item_id, $item, $depth, $args, $id ) {
		
		$aiea_mega_menu = $item->aiea_mega_menu ? $item->aiea_mega_menu : json_encode( array( 'menu_type' => 'default', 'mega_menu' => 'no', 'icon' => '' ) );
	?>
		<textarea id="edit-menu-item-ai-mega-menu-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-ai-mega-menu screen-reader-text" rows="3" cols="20" name="menu-item-ai-mega-menu[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $aiea_mega_menu ); ?></textarea>
	<?php
	
	}
	
	public function update_nav_menu_item( $menu_id, $menu_item_db_id, $args ) {
		
		$opt_value = isset( $_REQUEST['menu-item-ai-mega-menu'][$menu_item_db_id] ) ? sanitize_textarea_field( $_REQUEST['menu-item-ai-mega-menu'][$menu_item_db_id] ) : '' ;
		update_post_meta( $menu_item_db_id, '_menu_item_aiea_mega_menu', $opt_value );
		
	}
	
	public function set_mega_menu_item( $menu_item ) {
		
		$menu_item->aiea_mega_menu = get_post_meta( $menu_item->ID, '_menu_item_aiea_mega_menu', true );	
	    return $menu_item;
		
	}
	
	public function mega_menu_footer() {
	?>
		<div class="ai-mega-menu-options">
			<div class="ai-mega-menu-options-inner">
				<a href="#" class="ai-mega-menu-options-close"><i class="dashicons dashicons-no-alt"></i></a>
				<form id="ai-mm-form">
					<h3><?php esc_html_e( 'AI Menu Settings', 'ai-addons' ); ?></h3>
					<div class="ai-mm-fields chk-box">					
						<div class="inc-checkbox path">
							<input type="checkbox" name="aiea_mega_menu[mega_menu]" class="ai-enable-elementor">
							<svg viewBox="0 0 21 21">
								<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
							</svg>
						</div>
						<label><?php esc_html_e( 'Enable Mega Menu', 'ai-addons' ); ?></label>
					</div>
					<div class="ai-mm-fields in-active" data-req="mega-menu">
						<label><?php esc_html_e( 'Mega menu width', 'ai-addons' ); ?></label>
						<div class="inc-input-group">
							<input type="number" class="ai-mm-width" value="700" /><i>px</i>
							<p class="inc-mm-desc"><?php esc_html_e( 'Put mega menu width in digit or leave empty to get full width.', 'ai-addons' ); ?></p>
						</div>
					</div>
					<div class="ai-mm-fields in-active" data-req="mega-menu">
						<label><?php esc_html_e( 'Add or update content', 'ai-addons' ); ?></label>
						<a href="#" class="ai-elementor-btn">
						<span class="elementor-logo-icon"></span> 
						<span><?php esc_html_e( 'Edit with Elementor', 'ai-addons' ); ?></span></a>
					</div>
					<div class="ai-mm-fields">
						<label><?php esc_html_e( 'Select menu icon', 'ai-addons' ); ?></label>
						<div class="inc-icon-group">
							<span class="inc-selected-iocn"></span>						
							<input type="text" class="ai-choose-icon" placeholder="<?php esc_html_e( 'Choose Icon', 'ai-addons' ); ?>" />
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="ai-elementor-frame-wrap">
			<div class="ai-elementor-frame-inner">
				<a href="#" class="ai-elementor-frame-close"><i class="dashicons dashicons-no-alt"></i></a>
				<iframe id="ai-menu-builder-frame" src="" frameborder="0"></iframe>
			</div>
		</div>
	<?php
	}
	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
} AIEA_Mega_Menu::instance();
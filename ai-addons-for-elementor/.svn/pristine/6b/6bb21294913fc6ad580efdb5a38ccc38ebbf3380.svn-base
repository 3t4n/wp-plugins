<?php 

class AIEA_Header_Footer_Base {
	
	private static $header_id = null;
	
	private static $footer_id = null;
	
	public static function get_header_id(){
		return self::$header_id;
	}
	
	public static function get_footer_id(){
		return self::$footer_id;
	}
	
	public static function aiea_hf_header_enabled() {
			
		$header_id = self::get_settings( 'type_header', '' );
		self::$header_id = $header_id;
		
		$status    = false;

		if ( '' !== $header_id ) {
			$status = true;
		}

		return apply_filters( 'aiea_hf_header_enabled', $status );
	}
	
	public static function aiea_hf_footer_enabled() {
			
		$footer_id = self::get_settings( 'type_footer', '' );
		self::$footer_id = $footer_id;
		
		$status    = false;

		if ( '' !== $footer_id ) {
			$status = true;
		}

		return apply_filters( 'aiea_hf_footer_enabled', $status );
	}
	
	public function override_header() {
		require AIEA_DIR . 'core/header-footer/view/ai-header.php';
		$templates   = [];
		$templates[] = 'header.php';
		// Avoid running wp_head hooks again.
		remove_all_actions( 'wp_head' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}
	
	public function override_footer() {
		require AIEA_DIR . 'core/header-footer/view/ai-footer.php';
		$templates   = [];
		$templates[] = 'footer.php';
		// Avoid running wp_footer hooks again.
		remove_all_actions( 'wp_footer' );
		ob_start();
		locate_template( $templates, true );
		ob_get_clean();
	}
	
	public static function get_settings( $setting = '' ) {
		if ( 'type_header' == $setting || 'type_footer' == $setting ) {
			$templates = self::get_template_id( $setting );

			$template = ! is_array( $templates ) ? $templates : $templates[0];
			
			$template = apply_filters( "aiea_hf_get_settings_{$setting}", $template );
			return $template;
		}
	}
	
	public static function get_template_id( $type ) {
		$option = [
			'location'  => 'aiea_hf_target_include_locations',
			'exclusion' => 'aiea_hf_target_exclude_locations',
			'users'     => 'aiea_hf_target_user_roles',
		];
		
		require_once( AIEA_DIR .'core/header-footer/target-rule/target-rules-fields.php' );
		
		$aiea_hf_templates = AIEA_Target_Rules_Fields::get_instance()->get_posts_by_conditions( 'ai-hf', $option );
		$current_post_id = get_the_ID();
		$template_id = ''; 
		foreach ( $aiea_hf_templates as $template ) {
			$specific_arr = $template['location']['specific'];
			$post_key = 'post-'. $current_post_id;
			if ( get_post_meta( absint( $template['id'] ), 'aiea_hf_template_type', true ) === $type ) {
				if( !empty( $specific_arr ) && in_array( $post_key, $specific_arr ) ) {				
					$template_id = $template['id'];
				} elseif( empty( $specific_arr ) && empty( $template_id ) ) {			
					$template_id = $template['id'];
				}
			}
		}
		if ( get_post_meta( absint( $template_id ), 'aiea_hf_template_type', true ) === $type ) {				
			return $template_id;
		}

		return '';
	}
		
}

/**
 * AI Header Footer Render Class
 *
 * @since 1.0.0
 */
class AIEA_Header_Footer_Render extends AIEA_Header_Footer_Base {

	private static $_instance = null;	
	
	private static $elementor_instance = null;	

	public function __construct() {

		// initiate plugin things
		$this->init();

	}

	public function init() {
		
		$is_elementor_callable = ( defined( 'ELEMENTOR_VERSION' ) && is_callable( 'Elementor\Plugin::instance' ) ) ? true : false;
		
		if ( $is_elementor_callable ) {
			self::$elementor_instance = Elementor\Plugin::instance();
			add_action( 'wp', [ $this, 'hooks' ] );
		}
		
	}
	
	public function hooks(){
						
		if ( self::aiea_hf_header_enabled() ) {
			
			$aiea_stat = $this->check_other_template('header');
			if( $aiea_stat['status'] ) {
				if ( 'elementor_canvas' !== get_page_template_slug() ) {					
					// remove exisiting header actions
					add_action( 'get_header', [ $this, 'override_header' ] );
					// render custom header
					add_action( 'aiea_hf_header', [ $this, 'aiea_hf_render_header' ] );
				}
			} else {
				add_action( $aiea_stat['header'], [ $this, 'aiea_hf_render_header' ] );
			}
		}
		
		if ( self::aiea_hf_footer_enabled() ) {
			
			$aiea_stat = $this->check_other_template('footer');
			if ( 'elementor_canvas' !== get_page_template_slug() ) {
				// remove exisiting footer actions
				add_action( 'get_footer', [ $this, 'override_footer' ] );
				// render custom footer
				add_action( 'aiea_hf_footer', [ $this, 'aiea_hf_render_footer' ] );
				
			}
		} 
		
		
	}
	
	public function check_other_template( $part = 'header' ) {
		
		require_once ( AIEA_DIR . 'core/header-footer/class.template-checker.php' );
		
		if( $part == 'header' ) $aiea_stat = aiea_hf_template_checker()->template_header_check();
		else $aiea_stat = aiea_hf_template_checker()->template_footer_check();
		
		return $aiea_stat;
		
	}
		
	public static function aiea_hf_render_header() {
		if ( false == apply_filters( 'enable_aiea_hf_render_header', true ) ) {
			return;
		}
		$header_id = self::get_header_id();
		?>
			<header>
				<?php echo self::$elementor_instance->frontend->get_builder_content_for_display( $header_id ); ?>
			</header>

		<?php

	}
	
	public static function aiea_hf_render_footer() {
		if ( false == apply_filters( 'enable_aiea_hf_render_footer', true ) ) {
			return;
		}
		$footer_id = self::get_footer_id();
		?>
			<footer>
				<?php echo self::$elementor_instance->frontend->get_builder_content_for_display( $footer_id ); ?>
			</footer>

		<?php

	}
		
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

}
AIEA_Header_Footer_Render::instance();
<?php

namespace QuadLayers\QLTGM;

class Frontend {

	protected static $instance;

	private function __construct() {
		add_action( 'template_redirect', array( $this, 'display' ) );
		add_shortcode( 'telegram', array( $this, 'do_shortcode' ) );
		add_action( 'qltgm_load', array( $this, 'load' ) );
	}

	function display() {
		$display_model   = new Models\Display();
		$display         = $display_model->get();
		$display_service = new Controllers\Display_Services();
		if ( $display_service->is_show_view( $display ) ) {
			do_action( 'qltgm_load' );
		}
	}

	function do_shortcode( $atts, $content = null ) {

		$button_model = new Models\Button();
		$button       = $button_model->get();

		$atts = wp_parse_args( $atts, $button );

		ob_start();
		?>
			<div style="width: auto;" id="qltgm" class="qltgm-js-ready <?php printf( 'qltgm-%s qltgm-%s', esc_attr( $atts['layout'] ), esc_attr( $atts['rounded'] === 'yes' ? 'rounded' : 'square' ) ); ?>">
				<a class="qltgm-toggle" data-action="open"  data-username="<?php echo esc_attr( $atts['username'] ); ?>"  href="#" target="_blank">
				<?php if ( $atts['icon'] ) : ?>
						<i class="qltgm-icon <?php echo esc_attr( $atts['icon'] ); ?>"></i>
					<?php endif; ?>
					<i class="qltgm-close" data-action="close">&times;</i>
				<?php if ( $atts['text'] ) : ?>
						<span class="qltgm-text"><?php echo esc_html( $content ); ?></span>
					<?php endif; ?>
				</a>
			</div>
			<?php
			return ob_get_clean();
	}

	function load() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_js' ) );
		add_action( 'wp_head', array( $this, 'add_frontend_css' ), 200 );
		add_action( 'wp_footer', array( $this, 'add_box' ) );
	}

	function add_js() {
		$frontend = include_once QLTGM_PLUGIN_DIR . 'build/frontend/js/index.asset.php';
		wp_enqueue_style( QLTGM_DOMAIN, plugins_url( '/build/frontend/css/style.css', QLTGM_PLUGIN_FILE ), null, QLTGM_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( QLTGM_DOMAIN, plugins_url( '/build/frontend/js/index.js', QLTGM_PLUGIN_FILE ), $frontend['dependencies'], $frontend['version'], true );
	}

	function add_box() {

		global $qltgm;

		if ( is_file( $file = apply_filters( 'qltgm_box_template', QLTGM_PLUGIN_DIR . 'templates/box.php' ) ) ) {

			$box_model       = new Models\Box();
			$contact_model   = new Models\Contact();
			$button_model    = new Models\Button();
			$display_model   = new Models\Display();
			$display_service = new Controllers\Display_Services();

			$contacts = $contact_model->get_contacts_reorder();
			$display  = $display_model->get();
			$button   = $button_model->get();
			$box      = $box_model->get();

			include_once $file;
		}
	}

	function add_frontend_css() {

		$scheme_model = new Models\Scheme();
		$scheme       = $scheme_model->get();
		?>
			<style>
				:root { 
				<?php
				foreach ( $scheme as $key => $value ) {
					if ( $value != '' ) {
						printf( '--%s-scheme-%s:%s;', QLTGM_DOMAIN, $key, $value );
					}
				}
				?>
				}
				<?php if ( $scheme['brand'] ) : ?>
					#qltgm .qltgm-toggle,
					#qltgm .qltgm-box .qltgm-header,
					#qltgm .qltgm-box .qltgm-user,
					#qltgm .qltgm-box .qltgm-user:before {
						background-color: var(--qltgm-scheme-brand);  
					}
				<?php endif; ?>
				<?php if ( $scheme['text'] ) : ?>
					#qltgm .qltgm-toggle,
					#qltgm .qltgm-toggle .qltgm-icon,
					#qltgm .qltgm-toggle .qltgm-text,
					#qltgm .qltgm-box .qltgm-header,
					#qltgm .qltgm-box .qltgm-user {
						color: var(--qltgm-scheme-text);
					}
				<?php endif; ?>
			</style>
			<?php
	}

	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}

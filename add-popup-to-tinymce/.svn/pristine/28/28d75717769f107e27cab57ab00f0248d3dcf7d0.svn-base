<?php
if ( ! class_exists( 'APTMCE_SHORTCODE' ) ) {
	class  APTMCE_SHORTCODE {
		protected static $instance = null;

		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_shortcode( 'show_popup', array( $this, 'shortcode_template' ) );
		}

		public function shortcode_template( $atts, $content = null ) {
			extract( shortcode_atts( array(
				"title"   => '',

			), $atts ) );

			ob_start();
			$title = sanitize_title( $atts[ 'title' ] );
			?>
			<a href="#<?php echo $title ?>" class="amptmc_pop"><?php echo $atts[ 'title' ] ?></a>
			<div id="<?php echo $title ?>" class="mfp-hide white-popup-block  ">
				<h2><?php echo $atts['title'] ?></h2>
				<?php echo  $content; ?>
			</div>
			<?php
			return ob_get_clean();

		}
	}
}

add_action( 'plugins_loaded', array( 'APTMCE_SHORTCODE', 'get_instance' ) );
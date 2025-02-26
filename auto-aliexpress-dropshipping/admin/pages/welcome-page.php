<?php
/**
 * Auto_Aliexpress_Welcome_Page Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Aliexpress_Welcome_Page' ) ) :

	class Auto_Aliexpress_Welcome_Page extends Auto_Aliexpress_Admin_Page {
        /**
         * Add page screen hooks
         *
         * @since 1.0.0
         *
         * @param $hook
         */
        public function enqueue_scripts( $hook ) {
            // Load admin styles
			auto_aliexpress_admin_enqueue_styles( AUTO_ALIEXPRESS_VERSION );

            $auto_aliexpress_data = new Auto_Aliexpress_Admin_Data();

        	// Load admin scripts
        	auto_aliexpress_admin_enqueue_scripts_welcome(
            	AUTO_ALIEXPRESS_VERSION,
            	$auto_aliexpress_data->get_options_data()
        	);
		}

		/**
         * Render page container
         *
         * @since 1.0.0
         */
        public function render() {

            $accessibility_enabled = get_option( 'auto_aliexpress_enable_accessibility', false ); ?>

            <main class="aliexpress-wrap <?php echo $accessibility_enabled ? 'aliexpress-color-accessible' : ''; ?> <?php echo esc_attr( 'auto-aliexpress-' . $this->page_slug ); ?>">

                <?php
                $this->render_page_content();
                ?>

            </main>

            <?php
        }
	}

endif;

<?php

/**
 * Notices class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Notices' ) )  {

	/**
	 * Notices
	 *
	 * Notice implementation
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Notices {

		/**
		 * Prints global notice
		 *
		 * @since 1.0.0
		 */

		public function global_notice() {

			$global_notice = get_option( 'ldash_general_notices_global_notice' );
			$tab_specific_notice = get_option( 'ldash_' . ldash_current_tab() . '_notices_notice' );

			if( !empty( $global_notice ) || !empty( $tab_specific_notice ) ) { ?>

				<div id="ldash-global-notice" class="ldash-notice notice notice-info inline"><p><?php echo $global_notice . ' ' . $tab_specific_notice; ?></p></div>

			<?php }

		}

		/**
		 * Prints notice
		 *
		 * @since 1.0.0
		 * @param string $type Notice type
		 * @param bool $inline Enable inline notice
		 * @param string $id ID of the notice
		 * @param string $text Text to display in the notice
		 * @param string $append Element to append the notice
		 * @param string $slide_up Slide up animation
		 * @param bool $add_script_tag Wraps a script tag around the output
		 */

		public function notice( $type, $inline, $id, $text, $append, $slide_up, $add_script_tag ) {

			if( empty( $append ) ) {

				$append = 'ldash-notices';

			}

			$classes = 'ldash-notice notice notice-' . $type;

			if( $inline == true ) {
				$classes .= ' inline';
			}

			if( $slide_up == true ) {

				$slide_up = LDASH_Notices::slide_up();

			} else {

				$slide_up = '';

			}

			if( $add_script_tag == true ) { ?>
				<script type="text/javascript">
			<?php } ?>

			$('<div id="<?php echo $id; ?>" class="<?php echo $classes; ?>"><p><?php echo $text; ?></p></div>').appendTo('#<?php echo $append; ?>')<?php echo $slide_up; ?>;

			<?php if( $add_script_tag == true ) { ?>
				</script>
			<?php } ?>

		<?php }

		/**
		 * Slide up animation used in JS
		 *
		 * @since 1.0.0
		 * @return string slide up delay and animation
		 */

		public function slide_up() {

			return '.delay(2000).slideUp(500)';

		}

	}

	new LDASH_Notices();

}
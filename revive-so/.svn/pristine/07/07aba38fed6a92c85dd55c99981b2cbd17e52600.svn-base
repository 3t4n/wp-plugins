<?php 
/**
 * Rating notice.
 *
 */


defined( 'ABSPATH' ) || exit;

/**
 * Rating notice class.
 */
class REVIVESO_RatingNotice
{
	use REVIVESO_Hooker;

	/**
	 * Register functions.
	 */
	public function register() {
		$this->action( 'admin_notices', 'show_notice', 8 );
		$this->action( 'admin_init', 'dismiss_notice', 8 );
	}

	/**
	 * Show admin notices.
	 */
	public function show_notice() {
		// Show notice after 240 hours (10 days) from installed time.
			if ( $this->calculate_time() > strtotime( '-7 days' )
				|| '1' === get_option( 'reviveso_plugin_dismiss_rating_notice' )
				|| ! current_user_can( 'manage_options' )
				|| apply_filters( 'reviveso_hide_sticky_rating_notice', false ) ) {
				return;
			}

		$dismiss = wp_nonce_url( add_query_arg( 'revs_rating_notice', 'dismiss' ), 'revs_rating_nonce' );
		$later   = wp_nonce_url( add_query_arg( 'revs_rating_notice', 'later' ), 'revs_rating_nonce' );
		if ( REVIVESO_Admin::is_reviveso_admin_page() ) {
			?>
			<!-- Global notification live region, render this permanently at the end of the document -->
			<div aria-live='assertive' class='notice pointer-events-none fixed inset-0 flex items-start px-4 py-6 sm:items-start sm:p-6 mt-6'>
				<div class='flex w-full flex-col items-end space-y-4 z-10'>
					<div class='pointer-events-auto flex w-full max-w-md divide-x divide-gray-200 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5'>
						<div class='flex w-0 flex-1 items-center p-4'>
							<div class='w-full'>
								<p class='text-sm font-medium text-gray-900'><?php
									esc_html_e( 'Hi there!', 'revive-so' ); ?></p>
								<p class="mt-1 text-sm text-gray-500"><?php
									esc_html_e( 'Stoked to see you\'re using Revive.so for a few days now - hope you like it! And if you do, please consider rating it. It would mean the world to us. Keep on rocking!', 'revive-so' ); ?></p>
							</div>
						</div>
						<div class="flex">
							<div class="flex flex-col divide-y divide-gray-200">
								<div class="flex h-0 flex-1">
									<a href="https://wordpress.org/support/plugin/revive-so/reviews/?filter=5#new-post" target="_blank" class="flex w-full items-center justify-center rounded-none rounded-tr-lg border border-transparent px-4 py-3 text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:z-10 focus:outline-none focus:ring-2 focus:ring-indigo-500"><?php
										esc_html_e( 'Ok, you deserve it', 'revive-so' ); ?></a>
								</div>
								<div class="flex h-0 flex-1">
									<a href="<?php
									echo esc_url( $dismiss ); ?>" class="revs-already-did flex w-full items-center justify-center rounded-none rounded-br-lg border border-transparent px-4 py-3 text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"><strong><?php
											esc_html_e( 'I already did', 'revive-so' ); ?></strong></a>
								</div>
								<div class="flex h-0 flex-1">
									<a href="<?php
									echo esc_url( $later ); ?>" class="revs-later flex w-full items-center justify-center rounded-none rounded-br-lg border border-transparent px-4 py-3 text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"><strong><?php
											esc_html_e( 'Nope, maybe later', 'revive-so' ); ?></strong></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		} else { ?>
			<div class="notice notice-success">
				<p>
					<?php
					esc_html_e( 'Hi there! Stoked to see you\'re using Revive.so for a few days now - hope you like it! And if you do, please consider rating it. It would mean the world to us. Keep on rocking!', 'revive-so' ); ?>

				</p>
				<p>
					<a href="https://wordpress.org/support/plugin/revive-so/reviews/?filter=5#new-post" target="_blank" class="button button-secondary"><?php
						esc_html_e( 'Ok, you deserve it', 'revive-so' ); ?></a>&nbsp;
					<a href="<?php
					echo esc_url( $dismiss ); ?>" class="revs-already-did"><strong><?php
							esc_html_e( 'I already did', 'revive-so' ); ?></strong></a>&nbsp;<strong>|</strong>
					<a href="<?php
					echo esc_url( $later ); ?>" class="revs-later"><strong><?php
							esc_html_e( 'Nope&#44; maybe later', 'revive-so' ); ?></strong></a>
				</p>
			</div>
			<?php
		}
	}
	
	/**
	 * Dismiss admin notices.
	 */
	public function dismiss_notice() {
		if ( get_option( 'reviveso_plugin_no_thanks_rating_notice' ) === '1' ) {
			if ( get_option( 'reviveso_plugin_dismissed_time' ) > strtotime( '-10 days' ) ) {
				return;
			}
			delete_option( 'reviveso_plugin_dismiss_rating_notice' );
			delete_option( 'reviveso_plugin_no_thanks_rating_notice' );
		}
	
		if ( ! isset( $_REQUEST['revs_rating_notice'] ) ) {
			return;
		}

		check_admin_referer( 'revs_rating_nonce' );

		if ( 'dismiss' === $_REQUEST['revs_rating_notice'] ) {
			update_option( 'reviveso_plugin_dismiss_rating_notice', '1' );
		}
	
		if ( 'later' === $_REQUEST['revs_rating_notice'] ) {
			update_option( 'reviveso_plugin_no_thanks_rating_notice', '1' );
			update_option( 'reviveso_plugin_dismiss_rating_notice', '1' );
			update_option( 'reviveso_plugin_dismissed_time', time() );
		}
	
		wp_safe_redirect( remove_query_arg( array( 'revs_rating_notice', '_wpnonce' ) ) );
		exit;
	}
	
	/**
	 * Calculate install time.
	 */
	private function calculate_time() {
		$installed_time = get_option( 'reviveso_plugin_installed_time' );
		
        if ( ! $installed_time ) {
            $installed_time = time();
            update_option( 'reviveso_plugin_installed_time', $installed_time );
        }

        return $installed_time;
	}
}
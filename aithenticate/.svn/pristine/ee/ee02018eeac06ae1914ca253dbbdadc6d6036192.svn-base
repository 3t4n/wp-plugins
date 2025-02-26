<?php
/**
 * Admin settings page
 *
 * @package Aithenticate
 */

/**
 * Admin settings page class
 */
class Aithenticate_Admin_Settings_Page {

	/**
	 * Hook into actions and filters.
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_action( 'admin_menu', array( $self, 'add_menu_page' ) );
		add_action( 'admin_post_aithenticate_save_settings', array( $self, 'save_settings' ) );
	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page() {
		add_menu_page(
			__( 'Aithenticate', 'aithenticate' ),
			__( 'Aithenticate', 'aithenticate' ),
			'manage_options',
			'aithenticate',
			array( $this, 'output' ),
			aithenticate()->plugin_url() . 'assets/images/logo-2.png'
		);
	}

	/**
	 * Handles the display of the main settings page in admin.
	 *
	 * @return void
	 */
	public function output() {
		?>
		<div class="aithenticate">
			<?php if ( 10 === aithenticate_get_license_type() ) : ?>
				<p class="bg-sky-500 text-white py-2 px-4">
					<span class="font-bold">
						<?php esc_html_e( 'You are using the basic version of Aithenticate.', 'aithenticate' ); ?>
					</span>
					<?php esc_html_e( 'Need more implemenations? Consider', 'aithenticate' ); ?>
					<a
						href="https://aithenticate.org/pricing/"
						class="underline text-white"
					>
						<?php esc_html_e( 'upgrading here', 'aithenticate' ); ?>
					</a>
				</p>
			<?php endif; ?>

			<header class="bg-slate-50">
				<div class="max-w-xl mx-auto py-2 px-4 flex items-center justify-between">
					<img
						class="w-52"
						src="<?php echo esc_url( aithenticate()->plugin_url() . 'assets/images/logo-1.png' ); ?>"
						alt="<?php esc_html_e( 'Aithenticate logo', 'aithenticate' ); ?>"
					>
					<a
						href="https://aithenticate.org/edit-company"
						target="_blank"
						class="bg-blue-50 block px-4 py-2 border border-solid border-slate-200"
					>
						<?php esc_html_e( 'Edit Company Profile', 'aithenticate' ); ?>
					</a>
				</div>
			</header>

			<form
				class="max-w-xl mx-auto px-4 mt-4 space-y-4"
				method="POST"
				action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
			>
				<?php wp_nonce_field(); ?>
				<input type="hidden" name="action" value="aithenticate_save_settings">

				<div class="bg-white p-4 border-l-4 border-solid border-emerald-400 space-y-4">
					<h1 class="font-bold text-lg"><?php esc_html_e( 'Welcome to Aithenticate', 'aithenticate' ); ?></h1>

					<p>
						<?php
						esc_html_e(
							"Our plugin is the bridge between technology and transparency.
							Designed for seamless integration into your website, 
							it enables clear communication about the nature of your content's creation",
							'aithenticate'
						);
						?>
					</p>

					<p>
						<?php esc_html_e( 'To change or complete your company profile', 'aithenticate' ); ?>,
						<a
							href="https://aithenticate.org/my-account"
							target="_blank"
							class="underline"
						><?php esc_html_e( 'please login here', 'aithenticate' ); ?></a>.
					</p>
				</div>

				<div class="bg-white border border-solid border-slate-200">
					<h2 class="p-4 border-b border-solid border-slate-200"><?php esc_html_e( 'Global Aithenticate settings', 'aithenticate' ); ?></h2>

					<div class="p-4 relative">
						<?php if ( 'unlimited' !== aithenticate_get_license_type() ) : ?>
							<div class="absolute inset-0 bg-black/75 z-10 text-white flex justify-center items-center">
								<a
									href="<?php echo aithenticate_has_valid_license_and_email() ? 'https://aithenticate.org/edit-company/' : 'https://aithenticate.org/pricing/'; ?>"
									class="text-white px-4 py-2 text-sm block bg-[#0ec19b]"
								>
									<?php esc_html_e( 'Upgrade to Aithenticate Unlimited', 'aithenticate' ); ?>
								</a>
							</div>
						<?php endif; ?>

						<label>
							<span
								class="block font-bold"><?php esc_html_e( 'Site wide implementation (AI content)', 'aithenticate' ); ?></span>
							<?php esc_html_e( 'Implement the Aithenticate badge on all posts or pages with one click', 'aithenticate' ); ?>
						</label>

						<?php foreach ( aithenticate_get_supported_post_types() as $post_type ) : ?>
							<div class="pretty p-switch p-fill block mt-4">
								<input
									type="checkbox"
									name="fixed_ai_post_types[]"
									value="<?php echo esc_attr( $post_type->name ); ?>"
									<?php checked( in_array( $post_type->name, aithenticate_get_fixed_ai_post_types() ) ); ?>
								/>
								<div class="state p-primary">
									<label>
										<?php esc_html_e( 'Implement Aithenticate on all', 'aithenticate' ); ?>
										<span class="font-bold"><?php echo esc_html( $post_type->label ); ?></span>
										<?php esc_html_e( '(site wide AI generated message)', 'aithenticate' ); ?>
									</label>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if ( 'unlimited' === aithenticate_get_license_type() ) : ?>
						<button class="text-white px-4 py-2 text-sm block bg-[#0ec19b] w-full">
							<?php esc_html_e( 'Save', 'aithenticate' ); ?>
						</button>
					<?php endif; ?>
				</div>

				<div class="bg-white border border-solid border-slate-200">
					<h2 class="p-4 border-b border-solid border-slate-200"><?php esc_html_e( 'Activate and connect Aithenticate (License key)', 'aithenticate' ); ?></h2>

					<div class="p-4">
						<label class="font-bold">
							<?php esc_html_e( 'Make sure to Activate and Connect your Aithenticate company profile with the plugin.', 'aithenticate' ); ?>
						</label>

						<p class="mt-4"><?php esc_html_e( 'Without this connection your Aithenticate plugin will not work properly.', 'aithenticate' ); ?></p>
						<p>
							<a
								href="https://aithenticate.org/my-account"
								target="_blank"
								class="underline text-sky-500"
							><?php esc_html_e( 'Click here to login', 'aithenticate' ); ?></a>
							<?php esc_html_e( 'to your account and view your license key', 'aithenticate' ); ?>
						</p>

						<input
							type="email"
							name="license_email"
							class="w-full mt-4 border border-solid border-slate-200 px-2"
							placeholder="<?php esc_attr_e( 'Your email used on aithenticate.org', 'aithenticate' ); ?>"
							value="<?php echo esc_attr( get_option( 'aithenticate_license_email' ) ); ?>"
						>

						<input
							type="text"
							name="license_key"
							class="w-full mt-4 border border-solid border-slate-200 px-2"
							placeholder="<?php esc_attr_e( 'Copy and paste your license key here', 'aithenticate' ); ?>"
							value="<?php echo esc_attr( get_option( 'aithenticate_license_key' ) ); ?>"
						>

						<div class="mt-4">
							<?php esc_html_e( 'License type: ', 'aithenticate' ); ?>
							<strong>
								<?php echo esc_html( aithenticate()->license ? aithenticate()->license->license_title : 'N/A' ); ?>
							</strong>
						</div>
					</div>

					<button class="text-white px-4 py-2 text-sm block bg-[#0ec19b] w-full">
						<?php esc_html_e( 'Save', 'aithenticate' ); ?>
					</button>
				</div>
			</form>
		</div>
		<?php
	}

	/**
	 * Save settings.
	 *
	 * @return void
	 */
	public function save_settings() {
		if (
			! current_user_can( 'manage_options' ) ||
			empty( $_POST['_wpnonce'] ) ||
			! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) )
		) {
			return;
		}

		$email               = sanitize_email( wp_unslash( $_POST['license_email'] ?? '' ) );
		$fixed_ai_post_types = ! empty( $_POST['fixed_ai_post_types'] ) && is_array( $_POST['fixed_ai_post_types'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['fixed_ai_post_types'] ) ) : array();

		delete_transient( sanitize_key( 'company_slug_for_' . $email ) );

		update_option( 'aithenticate_license_email', $email );
		update_option( 'aithenticate_license_key', sanitize_text_field( wp_unslash( $_POST['license_key'] ?? '' ) ) );
		update_option( 'aithenticate_fixed_ai_post_types', array_map( 'sanitize_text_field', $fixed_ai_post_types ) );

		wp_safe_redirect( wp_get_referer() );
		die;
	}

}

<?php
namespace Simple_Giveaways;

class SG_Permalink_Settings {
	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'settings_init' ) );
		add_action( 'admin_init', array( $this, 'settings_save' ) );
	}

	/**
	 * Init our settings
	 */
	public function settings_init() {
		add_settings_field(
			'sg_giveaway_slug',
			__( 'Giveaways Slug', 'giveasap' ),
			array( $this, 'slug_input' ),
			'permalink',
			'optional'
		);
	}

	/**
	 * Show a slug input box.
	 */
	public function slug_input() {
		$text = get_option( 'sg_giveaway_slug', null )
		?><fieldset>
            <?php wp_nonce_field( 'sg_giveaway_slug', 'sg_giveaway_slug_nonce' ); ?>
            <input id="sg_giveaway_slug" name="sg_giveaway_slug" type="text" class="regular-text code" value="<?php echo esc_attr( $text ); ?>" placeholder="giveaway">
        </fieldset>
		<?php
	}

	/**
	 * Save the settings
	 */
	public function settings_save() {
		if ( ! is_admin() ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

        if ( empty( $_POST['sg_giveaway_slug_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( sanitize_text_field( $_POST['sg_giveaway_slug_nonce'] ), 'sg_giveaway_slug' ) ) {
            return;
        }

		if ( isset( $_POST['permalink_structure'] ) || isset( $_POST['sg_giveaway_slug'] ) ) :
				$value = null;
			if ( isset( $_POST['sg_giveaway_slug'] ) ) {
				$value = Helpers::unslash_and_clean( $_POST['sg_giveaway_slug'] );
			}
			if ( empty( $value ) ) {
				delete_option( 'sg_giveaway_slug' );
			} else {
				update_option( 'sg_giveaway_slug', $value );
			}
			$this->flush_rules();
		endif;
	}

	/**
	 * Flush Rules
	 */
	public function flush_rules() {
		giveasap_cpt();
		flush_rewrite_rules();
	}
}

new SG_Permalink_Settings();

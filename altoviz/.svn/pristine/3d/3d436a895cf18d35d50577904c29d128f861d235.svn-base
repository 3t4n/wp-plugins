<?php
namespace Altoviz;

defined( 'ABSPATH' ) || exit;

class AOZ4WC_Admin {

	public function __construct() {
		add_filter( 'plugin_action_links_' . plugin_basename( AOZ4WC_PLUGIN_FILE ), array( $this, 'plugin_action_links' ) );
		add_action( 'admin_notices', array( $this, 'admin_notices' ), 999 );
		add_action( 'show_user_profile', array( $this, 'show_user_profile' ) );
		add_action( 'edit_user_profile', array( $this, 'show_user_profile' ) );
		add_action( 'wp_dashboard_setup', array( $this, 'wp_dashboard_setup' ) );
	}
	public function wp_dashboard_setup() {
		wp_add_dashboard_widget( 'aoz4wc_widget', 'Altoviz 🚀', array( $this, 'dashboard_widget_render' ), array( $this, 'dashboard_widget_control' ), null, 'normal' );
	}
	public function dashboard_widget_render( $screen ) {
		if ( null === $screen ) {
			$screen = get_current_screen();
		}
		if ( ! AOZ4WC()->check_woocommerce() ) {
			printf( '<p>%s 🟥</p>', esc_html__( 'The WooCoommerce plugin is not active', 'altoviz' ) );
			// '<a href="https://altoviz.com">Altoviz</a>.</p>';
		}
		if ( AOZ4WC()->check_woocommerce() && ! AOZ4WC()->check_api_key() ) {
			printf( '<p>%s 🟥</p>', esc_html__( 'The Altoviz API key might be missing, outdated or wrong', 'altoviz' ) );
			printf( esc_html__( 'You can get an Altoviz API key in the <a href="https://app.altoviz.com/go/settings/developer">app settings</a>', 'altoviz' ) );
		}
		if ( AOZ4WC()->check_requirements() ) {
			printf( '<p><a href="%s" >%s</a></p>', esc_url( AOZ4WC()->app()->get_url() ), esc_html__( 'Launch the Altoviz app', 'altoviz' ) );
			// printf('<p>%s ✅</p>', __('', 'altoviz'));
		}
	}
	public function plugin_action_links( $links ) {
		$action_links = array();
		if ( class_exists( 'woocommerce' ) ) {
			$action_links += array(
				'settings' => '<a href="' . esc_url( $this->settings_url() ) . '" title="' . esc_attr( __( 'View Altoviz Settings', 'altoviz' ) ) . '">'
								. esc_html__( 'Settings', 'altoviz' ) . '</a>',
			);
		}
		$action_links += array(
			'documentation' => '<a href="' . esc_url( $this->documentation_url() ) . '" title="' . esc_attr( __( 'View Altoviz Documentation', 'altoviz' ) ) . '">'
											. esc_html__( 'Documentation', 'altoviz' ) . '</a>',
		);
		return array_merge( $action_links, $links );
	}
	public function settings_url() {
		return AOZ4WC()->wc_admin()->get_settings_url();
	}
	public function documentation_url() {
		return AOZ4WC()->replace_subdomain( '' ) . '/woodoc';
	}
	public function admin_notices() {
		$notices = AOZ4WC()->get_notices();
		if ( count( $notices ) === 0 ) {
			return;
		}
		foreach ( $notices as $notice ) {
			if ( ! isset( $notice['message'] ) ) {
				continue;
			}
			$type = $notice['type'] ?? 'notice';
			?>
			<div class="notice notice-<?php echo esc_attr( $type ); ?> is-dismissible">
				<p><?php echo wp_kses_post( $notice['message'] ); ?>
			<?php
			$caption = isset( $notice['data'] ) && isset( $notice['data']['caption'] ) ? esc_attr( $notice['data']['caption'] ) ?? '' : '';
			$url     = isset( $notice['data'] ) && isset( $notice['data']['url'] ) ? esc_attr( $notice['data']['url'] ) ?? '' : '';
			if ( ! empty( $caption ) && ! empty( $url ) ) {
				?>
					&nbsp;<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $caption ); ?></a>
				<?php
			}
			?>
				</p>
			</div>
			<?php
		}
		AOZ4WC()->clear_notices();
	}
	public function user_profile_field( $id, $name, $type, $default_value, $value ) {
		$field            = array();
		$field['id']      = $id;
		$field['name']    = $name;
		$field['type']    = $type;
		$field['value']   = $value;
		$field['default'] = $default_value;
		return $field;
	}
	public function user_profile_fields( $user ) {
		$fields = array();
		$link   = AOZ4WC()->wc_admin()->customer_anchor_user( $user );
		if ( ! $link ) {
			$link = '---';
		}
		array_push( $fields, $this->user_profile_field( 'aoz4wc_customer_id', 'Customer', 'link', '', $link ) );
		return $fields;
	}
	public function show_user_profile( $user ) {
		$fields = $this->user_profile_fields( $user );
		// $accountant = AOZ4WC_get_user_meta($user->ID, 'aoz4wc_accountant', false);
		?>
		<h3>Altoviz 🚀</h3>
		<table class="form-table">
		<?php
		foreach ( $fields as $field ) {
			?>
			<tr>
				<th><label for="<?php echo esc_attr( $field['id'] ); ?>"><?php echo esc_html( $field['name'] ); ?></label></th>
				<td>
					<?php
					switch ( $field['type'] ) {
						case 'checkbox':
							?>
					<input type="checkbox" value="true" name="<?php echo esc_attr( $field['id'] ); ?>" <?php checked( $field['value'], 'true' ); ?> />
					<?php
							break;
						case 'link':
								echo wp_kses_data( $field['value'] );
							break;
						default:
							?>
					<input type="text" name="<?php echo esc_attr( $field['id'] ); ?>" id="<?php echo esc_attr( $field['id'] ); ?>" value="<?php echo esc_attr( $field['value'] ); ?>" class="regular-text" />
					<?php
					}
					?>
				</td>
			</tr>
				<?php
		}
		?>
		</table>
	<?php
	}
}

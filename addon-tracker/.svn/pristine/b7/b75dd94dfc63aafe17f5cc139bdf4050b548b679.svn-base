<?php
/**
 * Plugin Name: Add-on Tracker
 * Description: Tracks plugin installation, activation/deactivation, deletion, updates, and versioning with a log.
 * Version: 1.0.0
 * Author: Sahib Khan
 * Author URI: https://erkhansahib.web.app/
 * Text Domain: addon-tracker
 * Requires at least: 5.5
 * Requires PHP: 7.2
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Class Addon_Tracker
 */
class Addon_Tracker {

    private $option_key = 'addon_tracker_data';

    /**
     * Constructor
     */
    public function __construct() {
        // Hooks
        add_action( 'activated_plugin', [ $this, 'skpat_track_plugin_activation' ], 10, 2 );
        add_action( 'deactivated_plugin', [ $this, 'skpat_track_plugin_deactivation' ], 10, 2 );
        add_action( 'upgrader_process_complete', [ $this, 'skpat_track_plugin_changes' ], 10, 2 );
        add_action( 'admin_menu', [ $this, 'skpat_register_submenu_page' ] );
        add_action( 'admin_post_send_plugin_data_email', [ $this, 'skpat_send_plugin_data_email' ] );

        // Initialize plugin data if not set.
        register_activation_hook( __FILE__, [ $this, 'skpat_initialize_plugin_data' ] );
    }

    /**
     * Initializes plugin data on first activation.
     */
    public function skpat_initialize_plugin_data() {
        if ( get_option( $this->option_key ) === false ) {
            $data = [];
            foreach ( get_plugins() as $plugin_slug => $plugin_details ) {
                $data[ $plugin_slug ] = [
                    'plugin_name' => $plugin_details['Name'],
                    'version'     => $plugin_details['Version'],
                    'records'     => [
                        [
                            'status'    => is_plugin_active( $plugin_slug ) ? 'activated' : 'deactivated',
                            'timestamp' => current_time( 'mysql' ),
                        ],
                    ],
                ];
            }
            add_option( $this->option_key, $data, '', 'no' );
        }
    }

    /**
     * Tracks plugin activation.
     */
    public function skpat_track_plugin_activation( $plugin, $network_activation ) {
        $this->update_plugin_status( $plugin, 'activated' );
    }

    /**
     * Tracks plugin deactivation.
     */
    public function skpat_track_plugin_deactivation( $plugin, $network_activation ) {
        $this->update_plugin_status( $plugin, 'deactivated' );
    }

    /**
     * Tracks plugin changes (updates or deletions).
     */
    public function skpat_track_plugin_changes( $upgrader, $hook_extra ) {
        $data = get_option( $this->option_key, [] );
        $all_plugins = array_keys( get_plugins() );

        if ( isset( $hook_extra['action'] ) && $hook_extra['action'] === 'delete' ) {
            // Plugin deletion logic
            foreach ( $data as $plugin_slug => $plugin_data ) {
                if ( ! in_array( $plugin_slug, $all_plugins, true ) ) {
                    $data[ $plugin_slug ]['records'][] = [
                        'status'    => 'deleted',
                        'timestamp' => current_time( 'mysql' ),
                    ];
                    unset( $data[ $plugin_slug ]['version'] );
                }
            }
        }

        if ( isset( $hook_extra['action'] ) && $hook_extra['action'] === 'update' ) {
            foreach ( $hook_extra['plugins'] as $plugin ) {
                if ( isset( $data[ $plugin ] ) ) {
                    $plugin_details = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
                    $data[ $plugin ]['version'] = $plugin_details['Version'];
                    $data[ $plugin ]['records'][] = [
                        'status'    => 'updated',
                        'timestamp' => current_time( 'mysql' ),
                        'version'   => $plugin_details['Version'],
                    ];
                }
            }
        }

        update_option( $this->option_key, $data, 'no' );
    }

    /**
     * Updates plugin status with a new record.
     */
    private function update_plugin_status( $plugin, $status ) {
        $data = get_option( $this->option_key, [] );

        if ( ! isset( $data[ $plugin ] ) ) {
            $plugin_details = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            $data[ $plugin ] = [
                'plugin_name' => $plugin_details['Name'],
                'version'     => $plugin_details['Version'],
                'records'     => [],
            ];
        }

        $plugin_details = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
        $data[ $plugin ]['version'] = $plugin_details['Version'];
        $data[ $plugin ]['records'][] = [
            'status'    => $status,
            'timestamp' => current_time( 'mysql' ),
            'version'   => $plugin_details['Version'],
        ];

        update_option( $this->option_key, $data, 'no' );
    }

    /**
     * Registers the submenu page.
     */
    public function skpat_register_submenu_page() {
        add_submenu_page(
            'tools.php',
            __( 'Add-on Tracker', 'addon-tracker' ),
            __( 'Add-on Tracker', 'addon-tracker' ),
            'manage_options',
            'add-on-tracker',
            [ $this, 'render_submenu_page' ]
        );
    }

    /**
     * Renders the submenu page.
     */
    public function render_submenu_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $data = get_option( $this->option_key, [] );

        // Display success/error messages.
        settings_errors( 'addon_tracker_messages' );

        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Add-on Tracker', 'addon-tracker' ); ?></h1>
            <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                <?php wp_nonce_field( 'send_plugin_data_email_action', 'send_plugin_data_email_nonce' ); ?>
                <input type="hidden" name="action" value="send_plugin_data_email">
                <label for="email_recipient"><?php esc_html_e( 'Email Recipient', 'addon-tracker' ); ?></label>
                <input type="text" id="email_recipient" name="email_recipient" class="regular-text" placeholder="Enter email address">
                <?php submit_button( __( 'Send Email', 'addon-tracker' ) ); ?>
            </form>

            <table id="add-on-tracker-table" class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e( 'Plugin', 'addon-tracker' ); ?></th>
                        <th><?php esc_html_e( 'Version', 'addon-tracker' ); ?></th>
                        <th><?php esc_html_e( 'Current Status', 'addon-tracker' ); ?></th>
                        <th><?php esc_html_e( 'Records', 'addon-tracker' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $data as $plugin_slug => $plugin_data ) : ?>
                        <tr>
                            <td><?php echo esc_html( $plugin_data['plugin_name'] ); ?> (<?php echo esc_html( $plugin_slug ); ?>)</td>
                            <td><?php echo esc_html( $plugin_data['version'] ?? 'N/A' ); ?></td>
                            <td>
                                <?php
                                $status = is_plugin_active( $plugin_slug ) ? 'Active' : 'Deactivated';
                                $color  = is_plugin_active( $plugin_slug ) ? 'green' : 'red';
                                printf(
                                    '<span style="color: %s;">%s</span>',
                                    esc_attr( $color ),
                                    esc_html( $status )
                                );
                                ?>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach ( $plugin_data['records'] as $record ) : ?>
                                        <li><?php echo esc_html( $record['status'] . ' - ' . $record['timestamp'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    /**
     * Sends plugin data via email.
     */
    public function skpat_send_plugin_data_email() {

        // Verify the nonce
        if ( ! isset( $_POST['send_plugin_data_email_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['send_plugin_data_email_nonce'] ) ), 'send_plugin_data_email_action' ) ) {
            wp_die( esc_html__( 'Nonce verification failed.', 'addon-tracker' ) );
        }

        // Check user permissions
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Unauthorized request.', 'addon-tracker' ) );
        }

        if ( ! isset( $_POST['email_recipient'] ) || empty( $_POST['email_recipient'] ) ) {
            wp_die( esc_html__( 'Email recipient is required.', 'addon-tracker' ) );
        }

        $recipients = explode( ',', sanitize_email( wp_unslash ( $_POST['email_recipient'] ) ) );
        $data = get_option( $this->option_key, [] );

        ob_start();
        ?>
        <h1><?php esc_html_e( 'Add-on Tracker Data', 'addon-tracker' ); ?></h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Plugin</th>
                    <th>Version</th>
                    <th>Records</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $data as $plugin_slug => $plugin_data ) : ?>
                    <tr>
                        <td><?php echo esc_html( $plugin_data['plugin_name'] ); ?></td>
                        <td><?php echo esc_html( $plugin_data['version'] ); ?></td>
                        <td>
                            <ul>
                                <?php foreach ( $plugin_data['records'] as $record ) : ?>
                                    <li><?php echo esc_html( $record['status'] . ' - ' . $record['timestamp'] ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        $message = ob_get_clean();

        foreach ( $recipients as $recipient ) {
            wp_mail( trim( $recipient ), __( 'Add-on Tracker Data', 'addon-tracker' ), $message, [ 'Content-Type: text/html; charset=UTF-8' ] );
        }

        wp_redirect( admin_url( 'tools.php?page=add-on-tracker&email_sent=1' ) );
        exit;
    }
}

// Initialize the plugin.
new Addon_Tracker();

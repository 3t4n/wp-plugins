<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Login_History {

    public function __construct() {
        register_activation_hook( ADMINTOSH_FILE, [ $this, 'create_database_table' ] );
        add_action( 'admin_menu', [ $this, 'login_history_page' ] );
        add_action('wp_login', [ $this, 'login_activity_track' ], 10, 2);

        if( get_option('admintosh_lh_database_table') != 'yes' ) {
            $this->create_database_table();
        }

    }


    public function login_history_page() {

        add_submenu_page(
            'admintosh-setting-admin',
            esc_html__( 'Login History', 'admintosh' ),
            esc_html__( 'Login History', 'admintosh' ),
            'manage_options',
            'login-history',
            [$this, 'history_page']
        );
        

    }

    public function history_page() {
        ?>
        <div class="admintosh-login-history">
            <div class="admintosh-table-wrap">
                <h2 class="table-top-title"><?php esc_html_e( 'User Login History', 'admintosh' ); ?></h2>
                <table  id="admintosh_login_history_tbl" class="stripe responsive nowrap" style="width:100%">
                    <thead>
                        <th><?php esc_html_e( 'User Name', 'admintosh' ); ?></th>
                        <th><?php esc_html_e( 'User Role', 'admintosh' ); ?></th>
                        <th><?php esc_html_e( 'IP', 'admintosh' ); ?></th>
                        <th><?php esc_html_e( 'Login Date/Time', 'admintosh' ); ?></th>
                        <th><?php esc_html_e( 'Action', 'admintosh' ); ?></th>
                    </thead>
                    <tbody>
                        <?php
                        if( !empty( $this->get_all_login_history() ) ):
                            foreach ( $this->get_all_login_history() as $value ):
                        ?>
                        <tr>
                            <td><?php echo esc_html( $value['user_name'] ?? '' ); ?></td>
                            <td><?php echo esc_html( $value['user_role'] ?? '' ); ?></td>
                            <td><?php echo esc_html( $value['login_ip'] ?? '' ); ?></td>
                            <td><?php echo esc_html( $value['login_date'] ?? '' ).' '.esc_html( $value['login_time'] ?? '' ); ?></td>
                            <td><a href="#" class="btn-view-details pro-attr" disabled><?php esc_html_e( 'View Details', 'admintosh' ); ?></a></td>
                            
                        </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php
    }


    public function login_activity_track( $user_login, $user ) {

        // $user->ID
        $ip = Helper::get_user_ip_address();
        $loginInfo = [
            'user_name' =>  $user->display_name ?? '',
            'user_role' =>  $user->roles[0] ?? '',
            'login_date' => sanitize_text_field( current_time( get_option( 'date_format' ) ) ),
            'login_time' => sanitize_text_field( current_time( get_option( 'time_format' ) ) ),
            'login_ip'   => sanitize_text_field( $ip )
        ];

        $loginInfo = apply_filters('admintosh_user_login_info', $loginInfo, $user);
        $this->insert_login_history( $loginInfo );

    }


    public function create_database_table() {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ats_login_history';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            user_name tinytext NOT NULL,
            user_role tinytext NOT NULL,
            login_date text NOT NULL,
            login_time text NOT NULL,
            login_ip varchar(55) DEFAULT '' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
        update_option( 'admintosh_lh_database_table', 'yes' );
    }

    public function insert_login_history( $loginInfo ) {
        global $wpdb;

        $table_name = $wpdb->prefix . 'ats_login_history';

        $wpdb->insert(
            $table_name,
            array(
                'user_name'   => $loginInfo['user_name'] ?? '',
                'user_role'   => $loginInfo['user_role'] ?? '',
                'login_date'  => $loginInfo['login_date'] ?? '',
                'login_time'  => $loginInfo['login_time'] ?? '',
                'login_ip'    => $loginInfo['login_ip'] ?? ''
            )
        );
    }

    public function get_all_login_history() {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ats_login_history';

        $getResult = $wpdb->get_results( " SELECT * FROM $table_name ORDER BY ID DESC", ARRAY_A );

        if( !is_wp_error( $getResult ) ) {
            return $getResult;
        }

    }

}


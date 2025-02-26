<?php
namespace Elvez;

use \Datetime;

class LoginUtil {
	/**
	 * The singletone instance
	 *
	 * @since    1.0.0
	 */
    const USER_META_LAST_LOGIN = 'elvez_login_util_last_login';

	/**
	 * The singletone instance
	 *
	 * @since    1.0.0
	 */
    protected static $_instance = null;

   	/**
	 * The datetime format
	 *
	 * @since    1.0.0
	 */
    protected static $_format = 'Y-m-d H:i:s';
    
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
        add_action( 'wp_login', [$this, 'store_last_login'], 10, 2 );

        add_filter( 'manage_users_columns', [$this, 'add_columns'] );
		add_action( 'manage_users_custom_column', [$this, 'render_colmuns'], 10, 3 );

    }

    /**
     * Return singleton instance.
     * 
     * @since   1.0.0
     * @return  LoginUtil
     */
    public static function get_instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Update datetime format.
     * 
     * @since   1.0.0
     * @param   $format string
     */
    public function set_format( $format ) {
        self::$_format = $format;
    }

	/**
	 * Store last login time to user metadata.
	 *
	 * @since   1.0.0
     * @param   $user_login string  username
     * @param   $user       WP_USER login user
	 */
    function store_last_login( $user_login, $user ) {

        $last_login = time();
        update_user_meta( $user->ID, self::USER_META_LAST_LOGIN, $last_login );

    }

	/**
	 * Return last login time.
	 *
	 * @since   1.0.0
     * @param   $user_id    int
     * @return  $last_login DateTime
	 */
    function get_last_login( $user_id ) {

        $time_stamp = get_user_meta( $user_id, self::USER_META_LAST_LOGIN, true );
        if ( $time_stamp ) {
            $last_login = new DateTime( '@' . $time_stamp );
        } else {
            $last_login = null;
        }
        return $last_login;

    }


	/**
	 *  Add columns to list table.
	 *
	 * @since	1.0.0
	 * @var		array	$columns	admin list table colmuns
	 * @return	array
	 */
	function add_columns( $columns ) {
        $columns[self::USER_META_LAST_LOGIN] = __( 'Last Login' );
		return $columns;
	}

	/**
	 * Render custom colmun on list page.
	 *
	 * @since    1.0.0
     * @param   $value          string  custom column output
     * @param   $column_name    string
     * @param   $user_id        int
	 */
	public function render_colmuns( $value, $column_name, $user_id ) {
		switch ( $column_name ) {

			case self::USER_META_LAST_LOGIN:
                $last_login = $this->get_last_login( $user_id );
                if ( $last_login ) {
                    return wp_date( self::$_format, $last_login->getTimestamp() );
                }
		}
        return $value;
    }

}
<?php

class DyDo_Auth
{
    private $data;

    /**
     * @param string $email
     * @param string $password
     * @param bool $remember
     *
     * @return mixed
     */
    public static function login( $email, $password, $remember )
    {
        return ( new self() )->auth_login( $email, $password, $remember );
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $confirm_password
     *
     * @return mixed
     */
    public static function register( $first_name, $last_name, $username, $email, $password, $confirm_password )
    {
        return ( new self() )->auth_register( $first_name, $last_name, $username, $email, $password, $confirm_password );
    }

    /**
     * @param string $email
     * @param string $password
     * @param bool $remember
     *
     * @return mixed
     */
    private function auth_login( $email, $password, $remember = true )
    {
        // Validation
        $validation_error = $this->login_validation( $email, $password );
        if ( $validation_error ) {
            $this->set_data( $validation_error->get_error_message() );

            return $this->data;
        }

        // Login
        $creds       = [
            'user_login'    => $email,
            'user_password' => $password,
            'remember'      => $remember,
        ];
        $user_signon = wp_signon( $creds, true );
        if ( is_wp_error( $user_signon ) ) {
            $error = $this->handle_error( 'Incorrect email or password' );
            $this->set_data( $error->get_error_message() );

            return $this->data;
        }

        $user_id = $user_signon->ID;
        $this->set_data( '', [
            'id'         => $user_id,
            'user_email' => $user_signon->user_email,
            'first_name' => $user_signon->first_name,
            'last_name'  => $user_signon->last_name,
        ] );

        do_action( 'dydo_after_login', $user_id );

        return $this->data;
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $confirm_password
     *
     * @return mixed
     */
    private function auth_register( $first_name, $last_name, $username, $email, $password, $confirm_password )
    {
        // Validation
        $validation_error = $this->register_validation( $username, $email, $password, $confirm_password );
        if ( $validation_error ) {
            $this->set_data( $validation_error->get_error_message() );

            return $this->data;
        }

        // Register
        $user_id = wp_create_user( $username, $password, $email );
        if ( is_wp_error( $user_id ) ) {
            $error = $this->handle_error( 'User could not be created' );
            $this->set_data( $error->get_error_message() );

            return $this->data;
        }

        // Set the nickname
        wp_update_user( [
            'ID'           => $user_id,
            'nickname'     => "{$first_name} {$last_name}",
            'display_name' => $first_name
        ] );

        // Update user meta information
        update_user_meta( $user_id, 'first_name', $first_name );
        update_user_meta( $user_id, 'last_name', $last_name );

        // Hook
        do_action( 'dydo_after_register', $user_id );

        // Login
        return $this->auth_login( $email, $password );
    }

    /**
     * @param string $error
     * @param array $user
     */
    private function set_data( $error, $user = [] )
    {
        $this->data = [
            'error' => $error,
            'user'  => $user
        ];
    }

    /**
     * @param string $error
     *
     * @return WP_Error
     */
    private function handle_error( $error )
    {
        return new WP_Error( 'register', __( $error, DYNAMIC_DONATIONS_TEXTDOMAIN ) );
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return false|WP_Error
     */
    private function login_validation( $email, $password )
    {
        $user_exists = get_user_by( 'email', $email );

        if ( empty( $email ) || empty( $password ) || ! $user_exists ) {
            return $this->handle_error( 'Incorrect email or password' );
        }

        return false;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $confirm_password
     *
     * @return false|WP_Error
     */
    private function register_validation( $username, $email, $password, $confirm_password )
    {
        // Username validation
        if ( empty( $username ) || ! validate_username( $username ) ) {
            return $this->handle_error( 'Please enter a valid account username' );
        }

        if ( username_exists( $username ) ) {
            return $this->handle_error( 'Username already exists' );
        }

        // Email validation
        if ( empty( $email ) || ! is_email( $email ) ) {
            return $this->handle_error( 'Please provide a valid email address' );
        }

        if ( email_exists( $email ) ) {
            return $this->handle_error( 'Email already exists' );
        }

        // Password validation
        if ( empty( $password ) ) {
            return $this->handle_error( 'Please enter an account password' );
        }

        if ( $password !== $confirm_password ) {
            return $this->handle_error( 'Please make sure passwords match' );
        }

        return false;
    }
}

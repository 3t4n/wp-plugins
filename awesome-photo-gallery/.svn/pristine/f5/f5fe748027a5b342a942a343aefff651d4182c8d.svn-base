<?php

namespace APG\Core;

use APG\Core\Updater;

/**
 * Class Licenses
 * @package APG\Core
 */
class Licenses {

    /**
     * @var
     */
    public $extensions;

    /**
     * @var
     */
    private $site_url;

    /**
     * @var
     */
    private $license_api_url;

    /**
     * @var
     */
    private $error;

    /**
     * @var
     */
    private $result;

	/**
	 * @var bool
	 */
	private $show_warning;

    /**
     * @param $extensions
     */
    public function __construct( $extensions ) {
        $this->extensions      = $extensions;
        $this->licenses        = get_option( 'apg_licenses', array() );
        $this->site_url        = get_site_url();
        $this->error           = false;
        $this->license_api_url = 'https://api.licensekeys.io/';

        if( is_admin() ) {
	        $this->show_warning = false;
	        foreach( $this->licenses as $license ) {
		        if( $license['status'] !== 'active' ) {
			        $this->show_warning = true;
		        }
	        }

	        if( $this->show_warning === false ) {
		        $extensions_keys = array_keys( $this->extensions );
		        $licenses_keys   = array_keys( $this->licenses );

		        foreach( $extensions_keys as $e ) {
			        if( ! in_array( $e, $licenses_keys ) ) {
				        $this->show_warning= true;
			        }
		        }
	        }

	        if( count( $this->extensions ) > count( $this->licenses ) ) {
		        $this->show_warning = true;
	        }

            add_action( 'shutdown', array( $this, 'apg_licenses_check' ) );

	        /**
	         * Update the Add-ons
	         */
	        new Updater( $this->licenses, $this->extensions );
        }
    }

    /**
     * Show a warning that not all licenses are active
     */
    public function apg_show_license_error() {
	    if ( $this->show_warning === true ) {
		    $page = filter_input(INPUT_GET, 'page');
		    
		    if ($page !== 'apg_settings') {
			    echo '<div class="error notice">';
				    echo '<p><strong>' . __('Warning', 'apg') .':</strong> ' . __( 'There is a license problem with one of your add-ons for Awesome Photo Gallery. Please make sure you have valid license keys added in your settings.', 'apg' );
				    echo ' <a href="' . admin_url('edit.php?post_type=apg_photo_albums&page=apg_settings&open=apg-tabs-licenses') . '" class="button">' . __('Enter license keys','apg') . '</a></p>';
			    echo '</div>';
		    }
	    }
    }

    /**
     * Get available licenses
     *
     * @return mixed
     */
    public function get_licenses(){
        return $this->licenses;
    }

    /**
     * Verify a license key
     *
     * @param $license
     * @param $product
     *
     * @return bool
     */
    public function verify_license_key( $license, $product ) {
        $this->make_api_call( 'licenses/verify', array(
            'license'        => $license,
            'product_group'  => $product,
            'domain'         => $this->site_url,
        ) );

        if( $this->error === false ) {
            return true;
        }

        return false;
    }

    /**
     * Activate a license key with a given product for this domain
     *
     * @param $license
     * @param $product
     *
     * @return bool
     */
    public function activate_license_key( $license, $product ) {
        $this->make_api_call( 'licenses/activate', array(
            'license'        => $license,
            'product_group'  => $product,
            'domain'         => $this->site_url,
        ) );

        if( $this->error === false ) {
            return true;
        }

        return false;
    }

    /**
     * Activate a license key with a given product for this domain
     *
     * @param $license
     * @param $product
     *
     * @return bool
     */
    public function deactivate_license_key( $license, $product ) {
        $this->make_api_call( 'licenses/deactivate', array(
            'license'        => $license,
            'product_group'  => $product,
            'domain'         => $this->site_url,
        ) );

        if( $this->error === false ) {
            return true;
        }

        return false;
    }

    /**
     * Get the error message
     *
     * @return bool
     */
    public function get_error() {
        return $this->error;
    }

    /**
     * Get the result from the latest API call
     *
     * @return mixed
     */
    public function get_result() {
        return $this->result;
    }

    /**
     * Save the license to the database and return the update status
     *
     * @param $license
     * @param $product
     *
     * @return mixed
     */
    public function save_license( $license, $product ) {
        $this->licenses[ $product ] = array(
            'key'        => sanitize_text_field( $license ),
            'status'     => 'active',
            'last_check' => time(),
            'expires'    => null,
        );

        return update_option( 'apg_licenses', $this->licenses );
    }

    /**
     * Un-Save the license to the database and return the update status
     *
     * @param $product
     *
     * @return mixed
     */
    public function unsave_license( $product ) {
        unset( $this->licenses[ $product ] );

        return update_option( 'apg_licenses', $this->licenses );
    }

    /**
     * Check and verify the licenses to our license API (runs on shutdown in admin)
     */
    public function apg_licenses_check() {
        $last_check = get_transient( 'apg_last_license_check' );

        if( $last_check === false || ( is_numeric( $last_check ) && ( time() - $last_check ) >= 86400 ) ) {
            foreach( $this->licenses as $product => $key ) {
                $status = $this->verify_license_key( $key['key'], $product );

                if( $status === true ) {
                    $this->licenses[$product]['status'] = $this->result->status;
                }
                else{
                    // Expired, invalid or blocked
                    $this->licenses[$product]['status'] = 'inactive';

                    if( strpos( $this->result->error, 'expired' ) !== false ) {
                        $this->licenses[$product]['status'] = 'expired';
                    }
                    elseif( strpos( $this->result->error, 'blocked' ) !== false ) {
                        $this->licenses[$product]['status'] = 'blocked';
                    }
                }

                $this->licenses[$product]['last_check'] = time();
                if( isset( $this->result->expire_date ) ) {
                    $this->licenses[$product]['expires'] = $status->expire_date;
                }
            }

            if( update_option( 'apg_licenses', $this->licenses ) ) {
                // On succes, set a transient to prevent a lot of verify calls to the API.
                set_transient('apg_last_license_check', time(), 24 * HOUR_IN_SECONDS);
            }
        }

    }

    /**
     * Make an API call to the LicenseKeys.io API
     *
     * @param $path
     * @param $body
     *
     * @return bool
     */
    private function make_api_call( $path, $body ) {
        $response = wp_remote_post( $this->license_api_url . $path, array(
                'method'      => 'POST',
                'timeout'     => 30,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking'    => true,
                'body'        => $body,
            )
        );

        $this->result = json_decode($response['body']);

        if ( isset( $this->result->error ) ) {
            $this->error = $this->result->error;

            return false;
        }

        return true;
    }

}

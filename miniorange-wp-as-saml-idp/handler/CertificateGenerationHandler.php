<?php
/**
 * This file contains the `CertificateGenerationHandler` class that is responsible
 * for processing generating new X509 certificate pair.
 *
 * @package miniorange-wp-as-saml-idp\handler
 */

namespace IDP\Handler;

use IDP\Helper\Constants\MoIDPConstants;
use IDP\Helper\Traits\Instance;
use IDP\Helper\Utilities\MoIDPUtility;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Responsible for generating new x509 certificates.
 */
class CertificateGenerationHandler {

	use Instance;

	/**
	 * Private constructor to avoid direct object creation.
	 */
	private function __construct() {}

	/**
	 * Generates a new X509 cert pair and stores it in db
	 *
	 * @return void
	 */
	private function mo_idp_generate_certificates() {
		$dn = array(
			'countryName'            => 'US',
			'stateOrProvinceName'    => 'Wyoming',
			'localityName'           => 'Cheyenne',
			'organizationName'       => 'miniOrange Security Software Pvt Ltd',
			'organizationalUnitName' => 'WordPress IDP',
			'commonName'             => 'miniorange',
			'emailAddress'           => MoIDPConstants::WPIDPSUPPORT_EMAIL,
		);
		$opensslConfigPath = MSI_DIR . 'includes' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'openssl.cnf';
		$config = array(
			'config'           => $opensslConfigPath,
			'digest_alg'       => 'sha512',
			'private_key_bits' => 2048,
			'private_key_type' => OPENSSL_KEYTYPE_RSA,
		);

		$private_key = openssl_pkey_new( $config );
		$csr        = openssl_csr_new( $dn, $private_key, $config );
		$csr_signed = openssl_csr_sign( $csr, null, $private_key, 547, $config, time() );

		openssl_csr_export( $csr, $csrout );
		openssl_x509_export( $csr_signed, $public_key_out );
		openssl_pkey_export( $private_key, $private_key_out, null, $config );

		$certificates = array(
			'public_key'  => $public_key_out,
			'private_key' => $private_key_out,
		);

        update_site_option('mo_idp_new_x509_certs', $certificates);
	}

	/**
	 * Checks if a new certificate pair is already generated if not generates it.
	 * Overrides the check if $force_generate is true
	 *
	 * @param boolean $force_generate Force certificate generation.
	 *
	 * @return void
	 */
	public function mo_idp_generate_certificate_if_not_exist( $force_generate = false ) {
		$new_certs_in_db = get_site_option( 'mo_idp_new_x509_certs' );
		if ( empty( $new_certs_in_db ) || $force_generate ) {
			$this->mo_idp_generate_certificates();
		}
	}

    /**
     * Download the new certificate to a file.
     * 
     * @return void
     */
    public function mo_idp_download_new_public_cert() {
        header( 'Content-Disposition: attachment; filename=miniorange-wp-idp-cert.crt' );
        echo ( MoIDPUtility::get_new_public_cert() );
        exit;
    }

	/**
     * Download the new certificate to a file.
	 * If no SP is configured and hence there is no cert in db it downloads the new cert.
     * 
     * @return void
     */
    public function mo_idp_download_current_public_cert() {
		$public_cert = MoIDPUtility::get_public_cert();
		if( empty( $public_cert ) ){
			$this->mo_idp_download_new_public_cert();
		} else {
			header( 'Content-Disposition: attachment; filename=miniorange-wp-idp-cert.crt' );
			echo ( $public_cert );
			exit;
		}
    }
}

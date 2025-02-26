<?php
defined( 'ABSPATH' ) or exit;

global $wp_version;

if( version_compare( $wp_version, MPWP_WP_REQUIRED_VERSION, '<' ) ) {
	wp_die( esc_attr__( 'Este plugin requer no mínimo a versão ' . MPWP_WP_REQUIRED_VERSION . ' do Wordpress', 'mpwp_forms' ) );
}

update_option( MPWP_PREFIX . '_version', MPWP_VERSION );
?>
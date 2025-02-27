<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_deactivate() {
	$option = rs_ulr_get_option();
	if( $option['delete_option_on_deactivate'] === '1' ) {
		delete_option( RS_ULR__OPTION );
	}
}
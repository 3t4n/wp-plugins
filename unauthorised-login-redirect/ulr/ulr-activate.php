<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_activate() {
	if( !rs_ulr_option_exists() ) {
		$option = rs_ulr_option_defaults();
		add_option( RS_ULR__OPTION, $option );
	}
}
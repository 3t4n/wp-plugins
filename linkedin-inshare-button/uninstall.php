<?php
if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ){ exit(); }
	
delete_option( 'linkedinshare_location' );
delete_option( 'linkedinshare_displaystyle' );
delete_option( 'linkedinshare_breakbefore' );
delete_option( 'linkedinshare_breakafter' );
delete_option( 'linkedinshare_showonlyinsingle' );
delete_option( 'linkedinshare_divstyling' );
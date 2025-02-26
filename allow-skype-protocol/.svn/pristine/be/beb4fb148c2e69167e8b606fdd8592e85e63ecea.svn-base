<?php
/*
Plugin Name: Allow Skype Protocol
Description: A simple plugin to allow Skype protocol in a link.
Version: 1.01
Author: clicface
Author URI: https://www.clicface.com
License: GPLv2
*/

function ss_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'ss_allow_skype_protocol' );
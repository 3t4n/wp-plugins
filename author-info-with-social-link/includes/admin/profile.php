<?php

function sai_user_contact_methods($methods ) {

	$methods['twitter'] = __('Twitter','wdrasel');
	$methods['facebook'] =__('Facebook', 'wdrasel');
	$methods['Linkedin'] = __('Linkedin','wdrasel');

	return $methods;
}

add_filter('user_contactmethods','sai_user_contact_methods');
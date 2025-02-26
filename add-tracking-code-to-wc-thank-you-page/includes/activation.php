<?php
/*
*	@PACKAGE Tracking Code To Thank You
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! function_exists('TCTTY_Activation')){

	function TCTTY_Activation(){
		//check if tctty_setting option 
		if(!get_option('tctty_setting')){
			add_option('tctty_setting', array(
					'tctty_label' 			=> 'Your Tracking Code',
					'tctty_tr_code' 	=> '',
				));
		}
	}


}
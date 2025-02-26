<?php


namespace Level_Wp\Affiliate_Advantage\Controllers;


class Base_Controller {

	public function dd( $var ) {
		echo '<pre>';
		var_dump( $var );
		echo '</pre>';
		die;
	}

}

<?php

class FtiHelper{
	
	public static $ftLangs = array(
		'en' => 'en',
		'ru' => '',
	);
	public static $ftUrl = 'https://fortrader.org';
	
	public static function get( $param ){
		return self::${$param};
	}
	
}
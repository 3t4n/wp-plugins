<?php
/*
Plugin Name: Real IP
Plugin URI: http://blog.mudy.info/my-plugins/
Description: Correct comment's ip address if you are behind a proxy or load balancer. There is no setting. It should start working once you activate it.
Version: 1.3
Author: Yejun Yang
Author URI: http://blog.mudy.info/
*/

/*  Copyright 2009 Yejun Yang  (email : yejunx At gmail Dot com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (function_exists('filter_var')) {
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)){
		$_SERVER['REMOTE_ADDR'] = filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE);
	}
else if (isset($_SERVER['HTTP_X_REAL_IP']) && filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)){
		$_SERVER['REMOTE_ADDR'] = filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE);
	}
}
else {
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
if (isset($_SERVER['HTTP_X_REAL_IP'])){
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
	}
}
?>

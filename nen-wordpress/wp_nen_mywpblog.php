<?php
/*
Plugin Name: Nén Wordpress
Plugin URI: http://www.raudang.com/nen-qua-php
Description: plugin này sẽ xác định máy chủ của bạn nếu hỗ chợ zlib thì trang blog sẽ được nén để tăng tốc độ, tích kiệm băng thông và làm cho trang blog tải nhanh hơn.
Version: 1.0
Author: RauDang
Author URI: http://www.raudang.com
*/
/*  Copyright 2010  RauDang  (email : raudang@ymail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function wp_nen_mywpblog() {
	if (stristr($_SERVER['REQUEST_URI'], 'tinymce') !== false)  
		return false;
    if (( ini_get('zlib.output_compression') == 'On')
        OR ini_get('output_handler') == 'ob_gzhandler' ) {
        return false;
    }
	if (extension_loaded('zlib')) 
			if(!ob_start("ob_gzhandler")) ob_start();
}
add_action('init', 'wp_nen_mywpblog');
?>
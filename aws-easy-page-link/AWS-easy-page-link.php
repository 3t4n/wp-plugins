<?php
/*
Plugin Name: AWS Easy Page Link
Plugin URI: http://www.ashwebstudio.com/wordpress/aws-easy-page-link
Description: Easier way to link to already existing pages in your WordPress site
Version: 0.5
Author: Derek Ashauer
Author URI: http://www.ashwebstudio.com

=======================================

Copyright 2008  Derek Ashauer  (email : derek@ashwebstudio.com)

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

=======================================

Changelog

0.5
* Now can display unlimited levels of sub pages

0.4
* Now can display up to 2 levels of sub pages

0.3
* Updated to work with 2.5. Special thanks to Petra, petra@petradammann.de

0.2
* Fixed path issue - WordPress website made folder all lower case letters. Previous was "AWS-easy-page-link"

0.1
* Initial release

=======================================

*/

function AWS_easy_page_head($initArray){
   $initArray['external_link_list_url'] = get_option('siteurl') . '/wp-content/plugins/aws-easy-page-link/link-list.php';
   return $initArray;
} 

add_filter('tiny_mce_before_init', 'AWS_easy_page_head');

?>
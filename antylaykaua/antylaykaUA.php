<?php
/*
Plugin Name: AntylaykaUA
Plugin URI: http://wordpress.org/plugins/antylaykaua/
Description: Автоматична цензура лайливих слів в україномовних статтях.
Version: 1.00
Author: Дмитро Гаврилюк
Author URI: https://www.facebook.com/dim.hav
*/
?>
<?php
/*  Copyright 2020  Дмитро Гаврилюк  (email: dima4havryluk@gmail.com)

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
?>
<?php
define('ANTYLAYKAUA_DIR', plugin_dir_path(__FILE__));

function antylayka_filter_the_content($the_content)
{
	$badwords = array();
	if(empty($badwords))
	{
		$badwords = explode (',', file_get_contents(ANTYLAYKAUA_DIR . 'badwords.txt'));
		
	}
	$replacements = array();
	if(empty($replacements))
	{
		$replacements = explode (',', file_get_contents(ANTYLAYKAUA_DIR . 'replacements.txt'));
	}
	for ($i = 0, $cB = count($badwords), $j = 0, $cR = count($replacements); $i < $cB, $j < $cR; $i++, $j++)
	{
		$the_content = preg_replace('/\b'.$badwords[$i].'\b/ui', $replacements[$j], $the_content);	
	}
	return $the_content;
}
add_filter('the_content', 'antylayka_filter_the_content');
?>
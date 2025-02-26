<?php
/*
Plugin Name: Automatic Tag Link
Plugin URI: http://www.kylogs.com/blog/archives/564.html
Description: This plugin will automatic add tag links to words in your content which match the tag.
Version: 0.7
Author: Chen Ju
Author URI: http://www.kylogs.com/blog

Copyright 2008  Chen Ju  (email : sammy105@gmail.com)

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

/*
  You can modify the value of $replace_time which indicates the number of times to convert a tag to a normal link or 
  technorati tag link.
  $replace_times=-1 means all words which match tag name will be converted.
*/
$replace_times=3;


add_action('admin_menu','tag2link_setting_options');
add_filter('the_content','tag2link');
init_tag2link();
$tags;

function init_tag2link(){
	add_option('tag2link_times');
	add_option('tag2link_use');
}
function getPostTags(){
	
	global $post_ID;
	
}

function tag2Link($s){
	global $id;
	global $replace_times;
	global $wp_rewrite;
	
	$te=get_option('tag2link_use');
	if($te=='te')	$useTe=true;
	else $useTe=false;
	
	$us=get_option('tag2link_times');
	$replace_times=intval($us);
	if($replace_times==0) $replace_times=3;
	
	
	/*
		Get tag permalink structure
	*/
	//$structure=$this->get_tag_permastruct();
	$ss=$wp_rewrite->get_tag_permastruct();
	$structure="";
	if($ss==false) {
		$structure=get_option('siteurl').'/?tag=%tag%';
	}else $structure=get_option('siteurl').$ss;
	/*
		Get post tags
	*/
	$tags=wp_get_post_tags($id);
	$p=$s;
	if($tags==null) return $p;
	/*
		Start replace
	*/
	$count=count($tags);
	usort($tags,cmp);
	$temp=$structure;
	foreach($tags as $value){
		
		if($useTe){
			$pattern='/(?<=[^a-zA-Z])'.$value->name.'(?!.*<\/a>)/';
			$replace='<a href="http://technorati.com/tag/'.$value->slug.'">'.$value->name.'</a>';
			$p=preg_replace($pattern,$replace,$p,$replace_times);
		}
		else{
				$structure=str_replace('%tag%',$value->slug,$temp);
			if($ss==false){
				$pattern='/(?<=[^a-zA-Z])'.$value->name.'(?!.*<\/a>)/';
				//$pattern='/(?<!\/\?)(?<!\w)'.$value->name.'(?!\w)(?!(\s|\w)*<\/a>)/';
			}else{
				//$pattern='/(?<!\/)(?<!\w)'.$value->name.'(?!\w)(?!(\s|\w)*<\/a>)/';
				$pattern='/(?<=[^a-zA-Z])'.$value->name.'(?!.*<\/a>)/';
			}
			$replace='<a href="'.$structure.'">'.$value->name.'</a>';
			$p=preg_replace($pattern,$replace,$p,$replace_times);
		}
	 }		
	return $p;
}
function cmp($a,$b){
	return strlen($a->name)-strlen($b->name);
}
function tag2link_setting_options(){
		add_options_page('Tag to Links', 'Tag to Links', 5, 'automatic-tag-link/options.php');
}	
?>

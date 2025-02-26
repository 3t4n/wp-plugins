<?php
/*
Plugin Name: Fun with Theme Widgets
Plugin URI: http://www.wp-fun.co.uk/2008/12/06/fun-with-theme-widgets/
Description: Automatically registers specific theme files as widgets
Author: Andrew Rickmann
Version: 1
Author URI: http://www.wp-fun.co.uk
Generated At: www.funwithwizards.com;
*/
/*  Copyright 2007    Andrew Rickmann  (email : PLUGIN AUTHOR EMAIL)

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
class fw_theme_widgets
{
	
	
	public $widget_array = array();
	
	/**	* Constructor - PHP5 only	*/	public function __construct(){

		add_action('init',array($this,'register_theme_widgets'));


	}
	
	function register_theme_widgets(){
		
		
		//get an array of the widgets
		$this->widget_array = $this->get_theme_widget_files();
		
		foreach( $this->widget_array as $key => $widget ){
			$this->register_theme_widget($key,$widget['description']);
		}
		
	}
	
	function get_theme_widget_files(){
		
		//create a blank array
		$w_array = array();
		
		//get the path
		$path = TEMPLATEPATH;
		
		//open the directory
		$dir = opendir($path);
		while($item = readdir($dir)){
			//loop through x.widget.php files
			if ( strpos($item,'.widget.php') > 0 ){
				//open the file
				$file = file($path . '/' . $item);
				
				$w_name = 'Unknown';
				$w_description = 'Unknown';
				
				while( next($file) && !is_int(strpos(current($file),'*/')) ){
					if ( is_int( stripos(current($file),'Widget Name:') ) ){
						$w_name = trim(str_replace('Widget Name:' ,'' , current($file)));
					}
					if ( is_int( stripos(current($file),'Widget Description:') ) ){
						$w_description = trim(str_replace('Widget Description:' ,'' , current($file)));
					}
				}
				
				$w_array[$w_name] = array("description"=>$w_description , "path" => $path . '/' . $item);

			}
		}
		
		return $w_array;
		
		
		
	}
	
	function register_theme_widget($key , $description){
		
		$widget_ops = array('description' => $description );
		wp_register_sidebar_widget($key, $key , array($this,'output_theme_widget'), $widget_ops);
		
	}
	
	function output_theme_widget($args){
		extract($args);
		echo $before_widget;
        
		//make sure the file exists
		if (file_exists($this->widget_array[$widget_name]['path'])){
			include($this->widget_array[$widget_name]['path']);
			
		}
		echo $after_widget;
		
	}
}
$fw_theme_widgets = new fw_theme_widgets();
?>

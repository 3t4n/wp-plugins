<?php
/*
Plugin Name: Anetwork
Plugin URI: http://www.temsool.com/anetwork-wordpress-widget/
Version: 1.0
Author: <a href="http://www.temsool.com">Amin Diary</a>
Description: This plugin uses the <a href="http://www.Anetwork.ir" target="_blank">Anetwork</a> Javascript to return the ADs from your account. For more information about Anetwork visit <a href="http://www.Anetwork.ir" target="_blank">HERE.</a>


Copyright 2011  Amin Diary  (email: amindiary[at]gmail[dot]com)

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






class placeAnetwork extends WP_Widget {
function placeAnetwork(){
	// widget actual processes
	$widget_ops = array('classname' => 'Anetwork', 'description' => __('Presents your accounts ads on anetwork website.') );		
	$this->WP_Widget('placeAnetwork', __('Anetwork Ads'), $widget_ops);
		}
		

		
	function widget($args, $instance) {
	// outputs the content of the widget
		extract($args, EXTR_SKIP);
		$aduser = empty($instance['aduser']) ? '&nbsp;' : apply_filters('widget_title', $instance['aduser']);
		$size = empty($instance['size']) ? '&nbsp;' : apply_filters('size', $instance['size']);
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('title', $instance['title']);
		$align = empty($instance['align']) ? '&nbsp;' : apply_filters('align', $instance['align']);
		
			switch($size){
			case 1:$width=125;$height=125;break;
			case 2:$width=468;$height=60;break;
			case 3:$width=120;$height=240;break;
			}
			
			
		
		
		?> 
        <style>
        .adImg{
			text-align:<?php echo $align ?>;
			}
		.anetwork h2{
			text-align:right;
			}
        </style>
		<li  class="widget anetwork">
	<h2 class="widgettitle"><?php  echo $instance['title']; ?></h2>
    <div class="adImg">
		<script type="text/javascript" src="http://anetwork.ir/showad/?adwidth=<?php echo $width ?>&adheight=<?php echo $height ?>&aduser=<?php echo $aduser ?>"></script></div></li>
		<?
		
	}

function update($new_instance, $old_instance) {
	// processes widget options to be saved
		$instance = $old_instance;		
		$instance['title'] = ($new_instance['title']);
		$instance['aduser'] = ($new_instance['aduser']);
		$instance['size'] = ($new_instance['size']);
		$instance['align'] = ($new_instance['align']);
		
	

		return $instance;
	}
	function form($instance) {
	// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'aduser' => '1309361244', 'size' => '125x125' , 'title' => 'تبلیغات','align' => 'center') );		
		$title = ($instance['title']);
		$aduser = ($instance['aduser']);
		$size = ($instance['size']);
		$size = ($instance['align']);
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title');?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('aduser'); ?>"><?php _e('User ID');?>: <input class="widefat" id="<?php echo $this->get_field_id('aduser'); ?>" name="<?php echo $this->get_field_name('aduser'); ?>" type="text" value="<?php echo attribute_escape($aduser); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size');?>:
        <select class="widefat" name="<?php echo $this->get_field_name('size');?>" id="<?php echo $this->get_field_id('size');?>" >
        <option <?php if($instance['size']==1) echo "selected='selected' " ?> value="1"<?php selected( $instance['Size'], '125x125' ); ?>><?php _e('125x125'); ?></option>
        <option <?php if($instance['size']==2) echo "selected='selected' " ?> value="2"<?php selected( $instance['Size'], '468x60' ); ?>><?php _e('468x60'); ?></option>
        <option <?php if($instance['size']==3) echo "selected='selected' " ?> value="3"<?php selected( $instance['Size'], '120x240' ); ?>><?php _e('120x240'); ?></option>
        </select> </p>
        <p><label for="<?php echo $this->get_field_id('align'); ?>"><?php _e('Align');?>:
        <select class="widefat" name="<?php echo $this->get_field_name('align');?>" id="<?php echo $this->get_field_id('align');?>" >
        <option <?php if($instance['align']==1) echo "selected='selected' " ?> value="left"<?php selected( $instance['align'], 'Left' ); ?>><?php _e('Left'); ?></option>
        <option <?php if($instance['align']==2) echo "selected='selected' " ?> value="center"<?php selected( $instance['align'], 'Center' ); ?>><?php _e('Center'); ?></option>
        <option <?php if($instance['align']==3) echo "selected='selected' " ?> value="right"<?php selected( $instance['align'], 'Right' ); ?>><?php _e('Right'); ?></option>
        </select> </p>
<?php
	}

}
function myplugin_register_widgets() {
	register_widget( 'placeAnetwork' );

	
}

add_action( 'widgets_init', 'myplugin_register_widgets' );


	
			



?>
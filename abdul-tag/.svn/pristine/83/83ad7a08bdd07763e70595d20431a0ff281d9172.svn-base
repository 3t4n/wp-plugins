<?php
/*
Plugin Name: ABDUL TAG Widget
Plugin URI: http://wordpress.org/extend/plugins/abdul-tag-widget
Description: search for ABDUL social tagging system
Version: 0.1
Author: DreamBuilder Inc.
Author URI: http://conan.in.th/
*/


global $wp_version;

if ( version_compare( $wp_version, '2.9', '<' ) ) {
	
}


class ABDUL_TAG_Widget extends WP_Widget {

	function ABDUL_TAG_Widget() {
		$widget_ops = array('classname' => 'widget_abdul_tag', 'description' => __( " search for  Tagging system") );
		$this->WP_Widget('nstda', __('ABDUL_TAG'), $widget_ops);
	}

	function widget( $args, $instance ) {
		
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = __( 'ABDUL_TAG Updates' );


?>

<script type="text/javascript" src="/wp-content/plugins/abdul-tag-widget/js/jquery.js"></script> 

<br /><br/>
<center>
<h2>NSTDA TAG</h2>

<form id="mytag" name="mytag" onSubmit="return false;">
<input type="text" name="q" id="q" onKeyPress="javascript:myquery(event);" size="20">
<input type="hidden" name="from" id="from" value="wb:widget">
<input type="hidden" name="bot" id="bot" value="abdul">
</form> 

<br /><br/>

<table border="0" style="border:0px">
<tr style="border:none" align="left"><td width="90%" align="left" style="border:none">
<span id="mytaganswer" style="border:0px"></span>
</td></tr></table>

</center>


<?php
		
		
		
	}

	function update( $new_instance, $old_instance ) {

	}

}

add_action( 'widgets_init', 'abdul_tag_widget_init' );

function abdul_tag_widget_init() {
	register_widget('ABDUL_TAG_Widget');
}

?>
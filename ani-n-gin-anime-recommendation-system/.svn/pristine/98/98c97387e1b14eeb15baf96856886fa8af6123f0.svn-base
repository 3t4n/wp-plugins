<?php

/**
 * Plugin Name: aNi-N-gin widget
 * Version: 0.9
 * Plugin URI: http://foolrulez.org/blog/2009/09/ani-n-gin-widget-for-wordpress-released/
 * Description: This widget gives to the user who inputs his MyAnimeList.net nickname a list of recommended anime to watch considering the anime he already watched.
 * Author: Woxxy
 * Author URI: http://foolrulez.org/
 */
 
 /*  Copyright 2009  Woxxy  (email : woxxap@gmail.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'aningin_load_widgets' );

function init_method() {
    wp_enqueue_script('jquery');
}
add_action('init', init_method);


/* Function that registers our widget. */
function aningin_load_widgets() {
	register_widget( 'aningin_Widget' );
}

class aningin_Widget extends WP_Widget { 
	function aningin_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'aNi-N-gin', 'description' => 'Embed aNi-N-gin in your sidebar' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'aningin-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'aningin-widget', 'aNi-N-gin Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
	
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$home = get_bloginfo('home');		

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

 echo <<<RESULT
	<script type="text/javascript">
	jQuery(document).ready(function() {
	ARused=0;
	jQuery("#ARbutton").click(function(){
	if (ARused = 1) {
			jQuery('#ARresult').slideUp("slow", function(){	
			jQuery('#ARstatus').text('Loading...');
				});
			}
	if (jQuery("#ARnick").val() != "") {
	jQuery('#ARstatus').text('Loading...');
	jQuery("#ARresult").load("$home/wp-content/plugins/ani-n-gin-anime-recommendation-system/ani-n-gin-widget-hook.php", {
	nick: jQuery("#ARnick").val(),
	}, function(){
	jQuery('#ARstatus').text('Done.');
	jQuery('#ARresult').slideDown("slow");
	ARused = 1
	});}});});</script>
	
	<p>
		Insert <a href='http://myanimelist.net' ref='nofollow' target='_blank'>MyAnimeList</a> nick to get suggestions on which anime to watch:<br/><input id='ARnick' size="20">
		<button id='ARbutton' type="submit">Submit</button></p>
		<p><div id='ARstatus'>Online and ready.</div></p>
		<p><div id='ARresult' style='display:none'></div></p>
		<div id='ARcredits'>Powered by <a href="http://foolrulez.org/blog/2009/09/ani-n-gin-the-anime-recommendation-system/">FoOlRulez.org</a>.</div>
	</p>
RESULT;

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'aNi-N-gin');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<?php
	}
}
?>
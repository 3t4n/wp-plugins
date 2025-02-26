<?php
	CLASS nelichso_widget EXTENDS WP_Widget
	{
		function nelichso_widget()
		{
			parent::WP_Widget( 'nelichso_widget', 'Nelichso', array( 'classname' => 'nelichso_widget', 'description' => 'Integrate nelichso with WordPress' ) ) ;
		}
		function form( $instance ){ }
		function widget( $args, $instance ) { nelichso::get_instance()->widget_fetch_nelichso_html_code() ; }
	}
?>
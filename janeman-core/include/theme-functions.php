<?php 

function janemancore_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'janemancore_dashboard_widget', 'AnnurTheme Theme Support', 'janemancore_dashboard_widget_function' );
   
    
   // Move our widget to top.
		global $wp_meta_boxes;

		$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		$ours = [
			'janemancore_dashboard_widget' => $dashboard['janemancore_dashboard_widget'],
		];

		$wp_meta_boxes['dashboard']['normal']['core']= array_merge( $ours, $dashboard );
}
 
function janemancore_dashboard_widget_function(){
	echo '<p>Welcome to Janeman Wedding WordPress Theme! Do you Need Demo Import or other help? Contact the developer <a  target="_blank" href="https://annurtheme.com/contact/">here</a>. For WordPress Free Theme visit: <a href="https://annurtheme.com" target="_blank">AnnurTheme</a> See Wedding Live Demo <a href="https://annurtheme.com/wp/janemanpro" target="_blank">Live Demo</a> </p>
		<a target="_blank" href="https://www.annurtheme.com"><img src="'.JANEMANCORE_PLUGIN_IMGS.'/wp-offer.jpg" alt=""></a>';
}
 
add_action("wp_dashboard_setup", "janemancore_add_dashboard_widgets", 40);
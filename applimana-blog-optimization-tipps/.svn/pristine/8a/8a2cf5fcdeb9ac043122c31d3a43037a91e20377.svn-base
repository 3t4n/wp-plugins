<?php
/*
Plugin Name: Applimana Optimization Tips
Plugin URI: http://applimana.com/
Description: Shows technical optimization tips for your Wordpress Blog on the dashboard.
Author: SteviesWebsite
Version: 1.0.1.1115
Author URI: http://stevieswebsite.de
*/

function applimana_register_dashboard_widget( $widgets ) {
    $headline = 'Optimization Tips';
	if(strtolower(get_bloginfo('language')) == 'de-de'){
	  $headline = 'Verbesserungstipps';
	}
	wp_register_sidebar_widget( 'applimana', __($headline), 'applimana_dashboard_widget_content', array(
		'width' => 'full'
	) );
}
function applimana_add_dashboard_widget( $widgets ) {
    array_splice( $widgets, 2, 0, 'applimana' );
	return $widgets;
}
function applimana_dashboard_widget_content(){
  $url =  get_bloginfo('wpurl');
  if(substr($url,0,7) == "http://"){
    $url = substr($url,7);
  }
  if(substr($url,0,4) == "www."){
    $url = substr($url,4);
  }
  $praefix = '';
  $refresh = 'Refresh';
  if(strtolower(get_bloginfo('language')) == 'de-de'){
    $praefix = 'de.';
	$refresh = 'Neu Laden';
  }
  ?>
  <script type="text/javascript"
src="http://applimana.com/tipps.php?url=<?PHP echo urlencode($url); ?>&language=<?PHP echo urlencode(get_bloginfo('language'));?>"> 
</script>
<div style="text-align:right;">
<form action="http://<?PHP echo $praefix; ?>applimana.com" method="post">
  <input type="hidden" name="page" value="<?PHP echo urlencode($url); ?>" />
  <input name="submit" type="submit" value="<?PHP echo $refresh; ?>" />
</form>
</div>
  <?PHP
}
// Registrieren der WordPress-Hooks
add_action( 'wp_dashboard_setup', 'applimana_register_dashboard_widget' );
add_filter( 'wp_dashboard_widgets', 'applimana_add_dashboard_widget' );
?>
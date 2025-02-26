<?php
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);

  /**
  Do stuff like connect to WP database and grab user set values
  */

  header('Content-type: text/css');
  header('Cache-control: must-revalidate');


$dsgvoyoutube_bgcolor = get_option('dsgvoyoutube_bgcolor');


?>

/* CSS Document */

#hexInput {
  color: #000000;
}

.fancybox-bg {
  background: <?php echo $dsgvoyoutube_bgcolor ?>!important;
}


.dsgvoyoutube_red_container {
  background-color:#fbe4e4;
  padding: 20px;
}
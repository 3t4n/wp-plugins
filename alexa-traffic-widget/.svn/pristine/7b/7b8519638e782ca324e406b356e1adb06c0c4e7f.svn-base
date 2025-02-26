<?php
/*
Plugin Name: Alexa Traffic Widget
Plugin URI: http://www.3eo.ir/2441/alexa-traffic-widget/
Description: Shows your site Alexa rank
Version: 0.1
Author: Amir Heydari
Author URI: http://www.3eo.ir/
*/

class AlexaTrafficWidget extends WP_Widget {
  function AlexaTrafficWidget() { 
  parent::WP_Widget(false, $name = 'Alexa Traffic Widget'); 
  }

  function widget($args) {
    extract($args, EXTR_SKIP);

?>
<div align="center"><script type='text/javascript' src='http://xslt.alexa.com/site_stats/js/s/a?url=<?php echo $_SERVER['HTTP_HOST'] ?>'></script></div><h2 style="position:fixed;z-index:-99999999;left:-99999px;top:-999999px;"><a href="http://www.3eo.ir/2441/alexa-traffic-widget/">Alexa Traffic Widget</a></h2>
<?php
  }

}
add_action('widgets_init', create_function('', 'return register_widget("AlexaTrafficWidget");')); 

?>

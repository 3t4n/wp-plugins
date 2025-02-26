<?php
/*
Plugin Name: Damar Radyo Flash Player
Plugin URI: http://www.damarradyo.net/
Description: Damar Radyo Flash Player
Version: 1.0
Author: Damar Radyo
Author URI: http://www.damarradyo.net
*/

//Define plugin directories
define( 'WP_DAMARRADYO_URL_PLAYER', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)) );
define( 'WP_DAMARRADYO_DIR_PLAYER', WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__)) );

function widget_DamarRadyo_Net($args) {
    extract($args);
?>
        <?php echo $before_widget; ?>

<center><!-- Flash Player Kod Baslangici --><div id="container"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.
 <a href="http://www.radyoarabeskturk.com">Radyoarabeskturk.com</a></div>
 <script type="text/javascript" src="http://www.radyoarabeskturk.com/swfobject.js"></script>
 <script type="text/javascript">
 var s1 = new SWFObject('http://www.radyoarabeskturk.com/player.swf',
 'player',"250","30","9","#FFFFFF");
 s1.addParam("allowfullscreen","true");
 s1.addParam("allowscriptaccess","always");
 s1.addParam("flashvars","skin=http://www.radyoarabeskturk.com/skin/dangdang.swf&title=Live Stream&type=sound&file=http://yayin.damarradyo.net:7026/;stream.mp3&13202692901&duration=99999&id=scplayer&autostart=true");
 s1.write("container");
 </script><!-- Flash Player Kod Bitti  --></center>

        <?php echo $after_widget; ?>
<?php
}
register_sidebar_widget('DamarRadyo.Net Player', 'widget_DamarRadyo_Net');
?>
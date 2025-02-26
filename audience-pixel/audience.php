<?php
/*
Plugin Name: Audience Pixel
Plugin URI: http://audience.to/
Description: Enables <a href="http://audience.to/">Audience.to Pixel</a> on all pages.
Version: 1.0.0
Author: audienceto
Author URI: http://audience.to/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_audience() {
  add_option('audience_app_id', ' ');
}

function deactive_audience() {
  delete_option('audience_app_id');
}

function admin_init_audience() {
  register_setting('audience', 'audience_app_id');
}

function admin_menu_audience() {
  add_options_page('Audience Pixel', 'Audience Pixel', 'manage_options', 'audience', 'options_page_audience');
}

function options_page_audience() {
  include(WP_PLUGIN_DIR.'/audience-pixel/options.php');  
}

function audience() {
  $audience_app_id = get_option('audience_app_id');
?>

<script type="text/javascript">
    var _ATo = _ATo || [];
    (function(d,s,p){
        var f,a,i;f=function(v){return function(){_ATo.push([v].
        concat(Array.prototype.slice.call(arguments,0)));};};
        a=["track","trigger"];for(i=0;i<a.length;i++){_ATo[a[i]]=f(a[i]);};
        var t=d.createElement(s),c=d.getElementsByTagName(s)[0];
        t.async=true;
        t.id="AudienceTo-tracker";
        t.setAttribute('data-app-id', '<?php echo $audience_app_id ?>');
        t.src=p;
        c.parentNode.insertBefore(t,c);
    })(document,"script","//cdn.audience.to/js/Audience.js");
</script>

<script type="text/javascript">
    _ATo.track("visit",{page: "<?php echo get_permalink($post->ID); ?>"});
</script> 

<?php
}

register_activation_hook(__FILE__, 'activate_audience');
register_deactivation_hook(__FILE__, 'deactive_audience');

if (is_admin()) {
  add_action('admin_init', 'admin_init_audience');
  add_action('admin_menu', 'admin_menu_audience');
}

if (!is_admin()) {
  add_action('wp_head', 'audience');
}

?>

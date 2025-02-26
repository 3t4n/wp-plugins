<?php
/*
Plugin Name: All-Social FW Style (Widget)
Plugin URI: http://angelverde.info/all-social-fw-style-widget-wordpress-facebook-twitter-googleplus-feedburner/
Version: 0.1
Description: Un widget con tus sitios sociales: Facebook, Twitter, Google+ y FeedBurner al estilo FW.com
Author: Angelverde
Author URI: http://angelverde.info/
*/

class All_Social_FW_Style extends WP_Widget
{
  function All_Social_FW_Style()
  {
    $widget_ops = array('classname' => 'follow cf', 'description' => 'Un widget con tus paginas sociales: Facebook, Twitter y Google+');
    $this->WP_Widget('All_Sociall_FW_Style', 'All Social FW Style (Widget)', $widget_ops);
  }

  function form($instance)
  {
    $my_site = get_bloginfo('wpurl');
    $ops = array(
            'title' => '',
            'facebook' => 'http://www.facebook.com/el.tux.angelverde',
            'twitter' => 'angelverde',
            'googleplus' => $my_site,
            'feedburner' => 'http://feeds.feedburner.com/ElTuxAngelverde'
        );
    $instance = wp_parse_args((array) $instance, $ops);
    $title = $instance['title'];
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $googleplus = $instance['googleplus'];
    $feedburner = $instance['feedburner'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Titulo: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Pagina en Facebook: <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo attribute_escape($facebook); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Cuenta Twitter: <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo attribute_escape($twitter); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('googleplus'); ?>">URL para Google+: <input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo attribute_escape($googleplus); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('feedburner'); ?>">URL de FeedBurner: <input class="widefat" id="<?php echo $this->get_field_id('feedburner'); ?>" name="<?php echo $this->get_field_name('feedburner'); ?>" type="text" value="<?php echo attribute_escape($feedburner); ?>" /></label></p>
<?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['facebook'] = $new_instance['facebook'];
    $instance['twitter'] = $new_instance['twitter'];
    $instance['googleplus'] = $new_instance['googleplus'];
    $instance['feedburner'] = $new_instance['feedburner'];

    return $instance;
  }

  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
    $facebook = empty($instance['facebook']) ? '' : apply_filters('widget_title', $instance['facebook']);
    $twitter = empty($instance['twitter']) ? '' : apply_filters('widget_title', $instance['twitter']);
    $googleplus = empty($instance['googleplus']) ? '' : apply_filters('widget_title', $instance['googleplus']);
    $googleplus = parse_url($googleplus, PHP_URL_HOST);
    $feedburner = empty($instance['feedburner']) ? '' : apply_filters('widget_title', $instance['feedburner']);
    $feedburner = parse_url($feedburner, PHP_URL_PATH);
    $feedburner = str_replace('/', '', $feedburner);

    if (!empty($title))
      echo $before_title . $title . $after_title;;
    ?>
<div class="myaside">
    <div class="innerbox">
        <?php if(isset($facebook) && !empty($facebook)): ?>
        <iframe scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:260px; height:90px;" src="http://www.facebook.com/plugins/like.php?locale=es_CL&amp;show_faces=true&amp;href=<?php echo $facebook; ?>&amp;layout=standard&amp;action=like&amp;colorscheme=light"></iframe>
        <?php endif; ?>
        <?php if(isset($facebook) && !empty($twitter)): ?>
        <div class="followbox boxtwitter">
            <a href="https://twitter.com/<?php echo $twitter; ?>" class="twitter-follow-button" data-lang="es">Seguir @<?php echo $twitter; ?></a>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
        </div>
        <?php endif; ?>
        <?php if(isset($googleplus) && !empty($googleplus)): ?>
        <div class="followbox c_plusone boxgplus">
            <div style="height: 20px; width: 255px; display: inline-block; font-size:11px;position: relative;left: -5px; " id="___plusone_side">
                <div id="___plusone_15" style="height: 20px; width: 90px; display: inline-block; text-indent: 0pt; margin: 0pt; padding: 0pt; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline;"><iframe width="100%" scrolling="no" frameborder="0" title="+1" vspace="0" tabindex="-1" style="position: static; left: 0pt; top: 0pt; width: 90px; margin: 0px; border-style: none; height: 20px; visibility: visible;" src="https://plusone.google.com/u/0/_/+1/fastbutton?url=http%3A%2F%2F<?php echo $googleplus;?>%2F&amp;size=medium&amp;count=true&amp;annotation=&amp;hl=es_CL&amp;jsh=r%3Bgc%2F23980661-3686120e#id=I16_1318289870352&amp;parent=http%3A%2F%2Fwww.fayerwayer.com&amp;rpctoken=772496702&amp;_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe" name="I16_1318289870352" marginwidth="0" marginheight="0" id="I16_1318289870352" hspace="0" allowtransparency="true"></iframe></div> Recomiéndanos en Google+
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($feedburner) && !empty($feedburner)): ?>
        <div class="followbox boxfacebook">
            <div class="inputbox subscription">
                <form onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" method="post" action="http://feedburner.google.com/fb/a/mailverify">
<input id="email" name="email" placeholder="Recibe por correo">
<input type="hidden" name="uri" value="<?php echo $feedburner; ?>">
<input type="hidden" value="es_ES" name="loc">
<button style="display:none" type="submit">Suscribirme</button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
    <?php
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("All_Social_FW_Style");') );

function writeCSS() {
    $dir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
    echo ( '<link rel="stylesheet" type="text/css" href="'. $dir . 'wd_all_social.css">' . "\n" );
}
add_action('wp_head', 'writeCSS')

?>

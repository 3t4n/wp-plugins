<?php
/*
    Plugin Name: Average Mobile Detect
    Plugin URI:
    Description: Redirects mobile traffic to your mobile website on a page-by-page basis (posts and custom post types included). This can be overridden on any page individually with a convenient meta box adjacent to the WYSIWYG. Sets a cookie to remember which version of your website (desktop or mobile, usually) your visitors opted for. Includes a widget for inserting a link back to your mobile site, which is only generated for mobile devices. Includes two shortcodes for generating links to your mobile site--one is generated only for mobile devices and the other is generated regardless. No CSS rules are used. CSS classes are provided, yielding coders full reign to style the generated links to fit the website theme. Adds a class to the body ("mobile-detected") to help coders write styles specifically for mobile devices. Leaves 404 errors untouched, allowing you to maintain 404 statuses. Basically, it gives you loads of control of your mobile redirects.
    Version: 1.2
    Author: Average
    Author URI: http://profiles.wordpress.org/averagetechnology
    License: Public Domain
        ___
       /   |_   _____  _________ _____ ____
      / /| | | / / _ \/ ___/ __ `/ __ `/ _ \
     / ___ | |/ /  __/ /  / /_/ / /_/ /  __/
    /_/  |_|___/\___/_/   \__,_/\__, /\___/
                               /____/     ™
                               by Joe Rhoney
*/



/*
    R E D I R E C T
    ===============
*/

add_filter('template_redirect','avrgmobdtctRedirect');
function avrgmobdtctRedirect() {
  if((get_option('avrgmobdtct_redirect')==1)&&(!is_404())){
    if(!function_exists("remove_http")){
      function remove_http($url){
        $disallowed = array('http://','https://');
        foreach($disallowed as $d){
          if(strpos($url,$d)===0){
            return str_replace($d,'',$url);
          }
        }
        return $url;
      }
    }

    $avrgmobdtct_equiv = get_post_meta(get_the_ID(),'avrgmobdtct_equiv',true);
    if(!empty($avrgmobdtct_equiv)){
      $pageURN = $avrgmobdtct_equiv;
    }
    else
    {
      $pageURN = $_SERVER['REQUEST_URI'];
    }

    if(get_option('the_mobile_site_uri')){
      $the_mobile_site_uri=get_option('the_mobile_site_uri');}
    else{
      $the_mobile_site_uri=0;}

    $xhttp_the_mobile_site_uri = remove_http($the_mobile_site_uri);

    if(get_option('non_mobile_site_uri')){
      $non_mobile_site_uri=remove_http(get_option('non_mobile_site_uri'));}
    else{
      $non_mobile_site_uri=0;}

    if(!class_exists('Mobile_Detect')){
      include plugin_basename('/Mobile_Detect.php');}

    $detect = new Mobile_Detect();
    if ($detect->isMobile() && !$detect->isTablet())
    {
      $want_mobile=1;
      if(isset($_COOKIE['mobile']))
      {
        if($_COOKIE['mobile']=="true")
        {
          if(isset($_SERVER['HTTP_REFERER']))
          {
            $referer = $_SERVER['HTTP_REFERER'];
            if(strpos($referer,$xhttp_the_mobile_site_uri))
            {
              $want_mobile=0;
              setcookie("mobile","false",0,"/",$non_mobile_site_uri);
            }
          }
        }
        else
        {
          $want_mobile=0;
        }
      }
      else
      {
        $want_mobile=1;
        setcookie("mobile","true",0,"/",$non_mobile_site_uri);
      }
      if ($want_mobile==1)
      {
        header('Location: '.$the_mobile_site_uri.$pageURN,true,302);
      }
      if ($want_mobile==0)
      {
        function add_class_mobile($class) {
          $class[] = 'mobile-detected';
          return $class;
        }
        add_filter('body_class','add_class_mobile');
      }
    }
  }
}



/*
    S E T T I N G S   P A G E
    =========================
*/

# Remove default value before saving to the database
if(!function_exists('avrgxmobdefault')){
  function avrgxmobdefault($input)
  {
    if(isset($input))
    {
      if ($input=='http://')
      {
        $input = NULL;
        return $input;
      }
      else
      {
        return $input;
      }
    }
  }
}
if(!class_exists('avrgmobdtct_class')) :
define('avrgmobdtct_ID', 'avrgmobdtct');
define('avrgmobdtct_NICK', 'Mobile Detect');
  class avrgmobdtct_class
  {
    public static function file_path($file)
    {
      return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
    }
    public static function register()
    {
      register_setting(avrgmobdtct_ID.'_options', 'avrgmobdtct_redirect');
      register_setting(avrgmobdtct_ID.'_options', 'the_mobile_site_uri','avrgxmobdefault');
      register_setting(avrgmobdtct_ID.'_options', 'non_mobile_site_uri');
    }
    public static function menu()
    {
      add_options_page(avrgmobdtct_NICK.' Plugin Options', avrgmobdtct_NICK, 'manage_options', avrgmobdtct_ID.'_options', array('avrgmobdtct_class', 'options_page'));
    }
    public static function options_page()
    {
      if (!current_user_can('manage_options'))
      {
        wp_die(__('You do not have sufficient permissions to access this page.'));
      }
      $avrgmobdtctID = avrgmobdtct_ID;
      include(self::file_path('options.php'));
    }
  }
  if (is_admin())
  {
    add_action('admin_init', array('avrgmobdtct_class','register'));
    add_action('admin_menu', array('avrgmobdtct_class','menu'));
  }
endif;



/*
    W I D G E T
    ===========
*/

class avrg_mobsitelink_widget extends WP_Widget {
  function __construct()
  {
    parent::__construct(
      'mobsitelink', // Base ID
      'Mobile Site Link', // Name
      array('description'=> __('A link that goes to the mobile website as set in the Mobile Detect settings and displays itself only on mobile phones.', 'text_domain' ),) // Args
    );
  }
#   Front-end display of widget
  public function widget($args,$instance)
  {
    if(!class_exists('Mobile_Detect'))
    {
      include plugin_basename('/Mobile_Detect.php');
    }
    $detect = new Mobile_Detect();
    if ($detect->isMobile() && !$detect->isTablet())
    {
      if (get_option('the_mobile_site_uri'))
      {
        $the_mobile_site_uri=get_option('the_mobile_site_uri');
      }
      else
      {
        $the_mobile_site_uri='/'; // Fallback
      }
      $title = apply_filters('widget_title',$instance['title']);
      $class = "mobile-site-opt mobile-site-link";
      echo $args['before_widget'];
      if (!empty($title))
      {
        $mobsitelink = '<a class="'.$class.'" href="'.$the_mobile_site_uri.'" title="'.$title.'">'.$title.'</a>';
      }
      else
      {
        $mobsitelink = '<a class="'.$class.'" href="'.$the_mobile_site_uri.'" title="View Mobile Version">View Mobile Version</a></div>';
      }
      echo __($mobsitelink,'text_domain');
      echo $args['after_widget'];
    }
  }
#   Back-end widget form
  public function form($instance)
  {
    if (isset($instance['title']))
    {
      $title = $instance['title'];
    }
    else {
      $title = __('View Mobile Version','text_domain');
    }
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
<?php
  }
#   Sanitize widget form values as they are saved
  public function update( $new_instance, $old_instance )
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags( $new_instance['title']) : '';
    return $instance;
  }
}
function reg_avrg_mobsitelink_widget() {
    register_widget('avrg_mobsitelink_widget');
}
add_action('widgets_init','reg_avrg_mobsitelink_widget');



/*
    S H O R T C O D E S
    ===================
*/

#   [mobilesitelink text="mobile website" class="mobile-site-link"]
function avrgmobdtct_mobsitelink_sc($atts)
{
  if(get_option('the_mobile_site_uri'))
  {
    $the_mobile_site_uri=get_option('the_mobile_site_uri');
  }
  ob_start();
  $avrgmobdtctLinkMerged = shortcode_atts( array(
    'text'    => 'mobile website',
    'class'   => 'mobile-site-link',
    'page'    => '',
  ), $atts, 'mobilesitelink' );
  extract($avrgmobdtctLinkMerged);
  if(!empty($page))
  {
    if($page=='/')
    {
      $mobPageURN = '';
    }
    else
    {
      $mobPageURN = '/'.$page;
    }
  }
  else
  {
    $mobPageURN = $_SERVER['REQUEST_URI'];
  }
  echo '<a href="'.$the_mobile_site_uri.$mobPageURN.'" class="'.$class.'">'.$text.'</a>';
  return ob_get_clean();
}
add_shortcode('mobilesitelink', 'avrgmobdtct_mobsitelink_sc');

#   [mobilesitebutton text="View Mobile Version" class="mobile-site-button"]
function avrgmobdtct_mobsitebttn_sc($atts)
{
  if(!class_exists('Mobile_Detect'))
  {
    include plugin_basename('/Mobile_Detect.php');
  }
  $detect = new Mobile_Detect();
  if ($detect->isMobile() && !$detect->isTablet())
  {
    if(get_option('the_mobile_site_uri'))
    {
      $the_mobile_site_uri=get_option('the_mobile_site_uri');
    }
    ob_start();
    $avrgmobdtctBttnMerged = shortcode_atts( array(
      'text'    => 'View Mobile Version',
      'class'   => 'mobile-site-button',
      'page'    => '',
    ), $atts, 'mobilesitebutton' );
    extract($avrgmobdtctBttnMerged);
    if(!empty($page))
    {
      if($page=='/')
      {
        $mobPageURN = '';
      }
      else
      {
        $mobPageURN = '/'.$page;
      }
    }
    else
    {
      $mobPageURN = $_SERVER['REQUEST_URI'];
    }
    echo '<a href="'.$the_mobile_site_uri.$mobPageURN.'" class="'.$class.'">'.$text.'</a>';
    return ob_get_clean();
  }
}
add_shortcode('mobilesitebutton', 'avrgmobdtct_mobsitebttn_sc');

#   [mobilesite text="View Mobile Version" class="mobile-site-link"]
function avrgmobdtct_mobsite_sc($atts)
{
  if(!class_exists('Mobile_Detect'))
  {
    include plugin_basename('/Mobile_Detect.php');
  }
  $detect = new Mobile_Detect();
  if ($detect->isMobile() && !$detect->isTablet())
  {
    if(get_option('the_mobile_site_uri'))
    {
      $the_mobile_site_uri=get_option('the_mobile_site_uri');
    }
    ob_start();
    $avrgmobdtctScMerged = shortcode_atts( array(
      'text'    => 'View Mobile Version',
      'class'   => 'mobile-site-link',
      'page'    => '',
    ), $atts, 'mobilesite' );
    extract($avrgmobdtctScMerged);
    if(!empty($page))
    {
      if($page=='/')
      {
        $mobPageURN = '';
      }
      else
      {
        $mobPageURN = '/'.$page;
      }
    }
    else
    {
      $mobPageURN = $_SERVER['REQUEST_URI'];
    }
    echo '<a href="'.$the_mobile_site_uri.$mobPageURN.'" class="'.$class.'">'.$text.'</a>';
    return ob_get_clean();
  }
}
add_shortcode('mobilesite', 'avrgmobdtct_mobsite_sc');



/*
  M E T A B O X
  =============
*/

add_action('add_meta_boxes', 'avrgmobdtct_add');
function avrgmobdtct_add()
{
  add_meta_box('avrgmobdtctMetaBox', '(Average) Mobile Detect', 'avrgmobdtct_cb', '', 'normal', 'high');
}
function avrgmobdtct_cb($post)
{
  $values = get_post_custom($post->ID);
  $mobile_equivlant = isset( $values['avrgmobdtct_equiv']) ? esc_attr($values['avrgmobdtct_equiv'][0]) : '';
  wp_nonce_field('avrgmobdtct_nonce', 'avrgmobdtct_mb_nonce');
  ?>
  <p>
    <label for="avrgmobdtct_equiv">Mobile Equivlant:</label>
    <input type="text" class="large-text" name="avrgmobdtct_equiv" id="avrgmobdtct_equiv" value="<?php echo $mobile_equivlant; ?>" />
    <p class="description">The mobile version of this page, which you want to redirect mobile devices to. This is not necessary unless the URN/slug is different than it is on this desktop version. Start it with a slash and omit the domain name. Example: /about-author.php</p>
  </p>
  <?php
}
add_action( 'save_post', 'avrgmobdtct_save' );
function avrgmobdtct_save( $post_id )
{
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !isset( $_POST['avrgmobdtct_mb_nonce'] ) || !wp_verify_nonce( $_POST['avrgmobdtct_mb_nonce'], 'avrgmobdtct_nonce' ) ) return;
  if( !current_user_can( 'edit_post' ) ) return;
  if( isset( $_POST['avrgmobdtct_equiv']))
    update_post_meta($post_id, 'avrgmobdtct_equiv', $_POST['avrgmobdtct_equiv']);
}
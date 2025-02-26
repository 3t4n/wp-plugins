<?php
/*
    Plugin Name: AddFunc Mobile Detect
    Plugin URI:
    Description: Redirects mobile traffic (and tablet if desired) to your mobile website on a page-by-page basis (posts and custom post types included). This can be overridden on any page individually with a convenient meta box adjacent to the WYSIWYG. Sets a cookie to remember which version of your website (desktop or mobile, usually) your visitors opted for. Includes a widget for inserting a link back to your mobile site, which is only generated for mobile devices. Includes two shortcodes for generating links to your mobile site — one is generated only for mobile devices and the other is generated regardless. No CSS rules are used. CSS classes are provided, yielding coders full reign to style the generated links to fit the website theme. Adds a class to the body ("mobile-detected") to help coders write styles specifically for mobile devices. Leaves 404 errors untouched, allowing you to maintain 404 statuses. Basically, it gives you loads of control over your mobile redirects.
    Version: 3.1
    Author: AddFunc
    Author URI: http://profiles.wordpress.org/addfunc
    License: Public Domain
           ______
       _  |  ___/   _ _ __   ____
     _| |_| |__| | | | '_ \ / __/™
    |_ Add|  _/| |_| | | | | (__
      |_| |_|   \__,_|_| |_|\___\
*/



/*
    R E D I R E C T
    ===============
*/

add_filter('template_redirect','aFmobdtctRedirect');
function aFmobdtctRedirect() {
  if(get_option('aFmobdtct_redirect')!=1){
    return;
  } # Mobile redirect disabled = Abort
  if(
    ((is_front_page()) && (get_option('aFmobdtct_front')!=false))||
    ((is_page())       && (!is_front_page()) && (get_option('aFmobdtct_page')!=false))||
    ((is_home())       && (get_option('aFmobdtct_home')!=false))||
    ((is_single())     && (get_option('aFmobdtct_single')!=false))||
    ((is_attachment()) && (get_option('aFmobdtct_attachment')!=false))||
    ((is_date())       && (get_option('aFmobdtct_date')!=false))||
    ((is_author())     && (get_option('aFmobdtct_author')!=false))||
    ((is_category())   && (get_option('aFmobdtct_category')!=false))||
    ((is_tag())        && (get_option('aFmobdtct_tag')!=false))||
    ((is_search())     && (get_option('aFmobdtct_search')!=false))||
    is_404()
  ){
    return;
  } # These page types = Aborted if true
  if(!class_exists('Mobile_Detect')){
    include plugin_basename('/Mobile_Detect.php');
  }
  $detect = new Mobile_Detect();
  if(!$detect->isMobile() || ($detect->isTablet() && get_option('aFmobdtct_tablets')!=1)) return; # Desktop or tablet = Abort
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
  } # Function: remove_http()
  $aFmobdtct_equiv = get_post_meta(get_the_ID(),'aFmobdtct_equiv',true);
  $pageURN = empty($aFmobdtct_equiv) ? $_SERVER['REQUEST_URI'] : $aFmobdtct_equiv;
  if(get_option('the_mobile_site_uri')){
    $the_mobile_site_uri=get_option('the_mobile_site_uri');}
  else{
    $the_mobile_site_uri=0;
  } # Define: $the_mobile_site_uri
  $xhttp_the_mobile_site_uri = remove_http($the_mobile_site_uri);
  if(get_option('non_mobile_site_uri')){
    $non_mobile_site_uri=remove_http(get_option('non_mobile_site_uri'));
  }
  else{
    $non_mobile_site_uri=0;
  } # Define: $non_mobile_site_uri
  $want_mobile=true;
  if(isset($_COOKIE['mobile'])){
    if($_COOKIE['mobile']=="true"){
      if(isset($_SERVER['HTTP_REFERER'])){
        $referer = $_SERVER['HTTP_REFERER'];
        if(strpos($referer,$xhttp_the_mobile_site_uri)){
          $want_mobile=false;
          setcookie("mobile","false",0,"/",$non_mobile_site_uri);
        }
      }
    }
    else{
      $want_mobile=false;
    }
  }
  else{
    $want_mobile=true;
    setcookie("mobile","true",0,"/",$non_mobile_site_uri);
  } # Set Cookie: mobile
  if($want_mobile){
    header('Location: '.$the_mobile_site_uri.$pageURN,true,302);
  } # The redirect
  else{
    function add_class_mobile($class){
      $class[] = 'mobile-detected';
      return $class;
    }
    add_filter('body_class','add_class_mobile');
  } # Add CSS class to <body> indicating this is a mobile device
}



/*
    S E T T I N G S   P A G E
    =========================
*/

# Remove default value before saving to the database
if(!function_exists('aFxmobdefault')){
  function aFxmobdefault($input)
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
if(!class_exists('aFmobdtct_class')):
define('aFmobdtct_ID','aFmobdtct');
define('aFmobdtct_NICK','Mobile Detect');
  class aFmobdtct_class
  {
    public static function file_path($file)
    {
      return ABSPATH.'wp-content/plugins/'.str_replace(basename(__FILE__),"",plugin_basename(__FILE__)).$file;
    }
    public static function register()
    {
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_redirect');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_tablets');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_front');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_page');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_home');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_single');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_attachment');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_author');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_date');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_category');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_tag');
      register_setting(aFmobdtct_ID.'_options', 'aFmobdtct_search');
      register_setting(aFmobdtct_ID.'_options', 'the_mobile_site_uri','aFxmobdefault');
      register_setting(aFmobdtct_ID.'_options', 'non_mobile_site_uri');
    }
    public static function menu()
    {
      add_options_page(aFmobdtct_NICK.' Options', aFmobdtct_NICK, 'manage_options', aFmobdtct_ID.'_options', array('aFmobdtct_class', 'options_page'));
    }
    public static function options_page()
    {
      if(!current_user_can('manage_options'))
      {
        wp_die(__('You do not have sufficient permissions to access this page.'));
      }
      $aFmobdtctID = aFmobdtct_ID;
      include(self::file_path('options.php'));
    }
  }
  if(is_admin())
  {
    add_action('admin_init', array('aFmobdtct_class','register'));
    add_action('admin_menu', array('aFmobdtct_class','menu'));
  }
endif;



/*
    W I D G E T
    ===========
*/

class aFmobsitelink_widget extends WP_Widget {
  function __construct()
  {
    parent::__construct(
      'mobsitelink', // Base ID
      'Mobile Site Link', // Name
      array('description'=> __('A link that goes to the mobile website as set in the Mobile Detect settings and displays itself only on mobile phones.','text_domain'),) // Args
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
      $class = "mobile-site-opt";
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
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags( $new_instance['title']) : '';
    return $instance;
  }
}
function aFmobsitelink_reg_widget() {
    register_widget('aFmobsitelink_widget');
}
add_action('widgets_init','aFmobsitelink_reg_widget');



/*
    S H O R T C O D E S
    ===================
*/

#   [mobilesitelink text="mobile website" class="mobile-site-link"]
function aFmobdtct_mobsitelink_sc($atts)
{
  if(get_option('the_mobile_site_uri'))
  {
    $the_mobile_site_uri=get_option('the_mobile_site_uri');
  }
  ob_start();
  $aFmobdtctLinkMerged = shortcode_atts(array(
    'text'    => 'mobile website',
    'class'   => 'mobile-site-link',
    'page'    => '',
  ),$atts,'mobilesitelink');
  extract($aFmobdtctLinkMerged);
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
add_shortcode('mobilesitelink','aFmobdtct_mobsitelink_sc');

#   [mobilesitebutton text="View Mobile Version" class="mobile-site-button"]
function aFmobdtct_mobsitebttn_sc($atts)
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
    $aFmobdtctBttnMerged = shortcode_atts(array(
      'text'    => 'View Mobile Version',
      'class'   => 'mobile-site-button',
      'page'    => '',
    ),$atts,'mobilesitebutton');
    extract($aFmobdtctBttnMerged);
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
add_shortcode('mobilesitebutton', 'aFmobdtct_mobsitebttn_sc');
add_shortcode('mobilesite', 'aFmobdtct_mobsitebttn_sc');



/*
    M E T A B O X
    =============
*/

add_action('add_meta_boxes', 'aFmobdtct_add');
function aFmobdtct_add()
{
  add_meta_box('aFmobdtctMetaBox', 'Mobile Detect', 'aFmobdtct_cb', '', 'normal', 'high');
}
function aFmobdtct_cb($post)
{
  $values = get_post_custom($post->ID);
  $mobile_equivlant = isset( $values['aFmobdtct_equiv']) ? esc_attr($values['aFmobdtct_equiv'][0]) : '';
  wp_nonce_field('aFmobdtct_nonce', 'aFmobdtct_mb_nonce');
  ?>
  <p>
    <label for="aFmobdtct_equiv">Mobile Equivlant:</label>
    <input type="text" class="large-text" name="aFmobdtct_equiv" id="aFmobdtct_equiv" value="<?php echo $mobile_equivlant; ?>" />
    <p class="description">The mobile version of this page, which you want to redirect mobile devices to. This is not necessary unless the URN/slug is different than it is on this desktop version. Start it with a slash and omit the domain name. Example: /about-author.php</p>
  </p>
  <?php
}
add_action('save_post','aFmobdtct_save');
function aFmobdtct_save($post_id)
{
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)return;
  if(!isset($_POST['aFmobdtct_mb_nonce']) || !wp_verify_nonce($_POST['aFmobdtct_mb_nonce'],'aFmobdtct_nonce'))return;
  if(!current_user_can('edit_post'))return;
  if(isset($_POST['aFmobdtct_equiv']))
    update_post_meta($post_id,'aFmobdtct_equiv',$_POST['aFmobdtct_equiv']);
}
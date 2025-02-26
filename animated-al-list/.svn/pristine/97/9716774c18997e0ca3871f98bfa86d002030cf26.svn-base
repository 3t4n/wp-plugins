<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_Admin_Common extends AnimatedAl_Base{
public $file;
public static $wpdb;

public static function setWpdb()
  {
  global $wpdb;
    self::$wpdb = $wpdb;
  }

public function __construct($file)
  {
  $this->file = $file;
  if (method_exists(get_parent_class(), '__construct'))
      parent::__construct();
      
  }

public function addAdminScryptesAndStyles()
  {
  $helper = new AnimatedAl_Helper();
    $helper->addStyle("jquery-ui-css", "css/jquery-ui.css");
    $helper->addStyle("main-css", "css/main.css");
    $helper->addStyle("colorpicker-css", "css/jquery.minicolors.css");

    $helper->addScrypt("bg-file-js", "js/upload_media_bg_files.js");
    $helper->addScrypt("colorpicker-js", "js/jquery.minicolors.min.js");

   if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
    }else{
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    }
  }
public function addMenu()
  {
    $main_page = add_menu_page('Animated AL List', 'Animated AL List', 'manage_options', 'animated_al_show_about', array($this, 'animated_al_show_about'), plugins_url('images/menu_pict.png', $this->file));
       	
    $submenu = add_submenu_page('animated_al_show_about', 'Animated AL List Setup', 'Animated AL List Setup', 'manage_options', 'animated_al_show', array($this, 'execute'));
    $submenu2 = add_submenu_page('animated_al_show_about', 'Animated AL List Info', 'Animated AL List Info', 'manage_options', 'animated_al_show_info', array($this, 'animated_al_show_info'));
    $submenu3 = add_submenu_page('animated_al_show_about', 'Other Products', 'Other Products', 'manage_options', 'animated_al_show_products', array($this, 'animated_al_show_products'));

       	add_action('admin_print_styles-' . $submenu, array($this, 'addAdminScryptesAndStyles'));
       	add_action('admin_print_styles-' . $submenu2, array($this, 'addAdminScryptesAndStyles'));
       	add_action('admin_print_styles-' . $submenu3, array($this, 'addAdminScryptesAndStyles'));
       	add_action('admin_print_styles-' . $main_page, array($this, 'addAdminScryptesAndStyles'));

  }
public function init()
  {
    add_action('admin_menu', array($this, 'addMenu'));
  }
public static function onActivate($file)
  {
  register_activation_hook($file, array( '\animated_al\AnimatedAl_Admin_Common', 'animated_al_install'));
    register_deactivation_hook($file, array( '\animated_al\AnimatedAl_Admin_Common', 'animated_al_uninstall'));
  }
  
public static function animated_al_install()
  {
  self::setWpdb();
  $wpdb = self::$wpdb;

  $table_main = $wpdb->prefix.'animated_al_list_main';
  $table_items = $wpdb->prefix.'animated_al_list_items';

//main
  $sql1 = "CREATE TABLE IF NOT EXISTS `".$table_main."` (
  `list_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `list_name` varchar(100) NOT NULL,
  `list_width` int(5) DEFAULT 0,
  `list_height` int(5) DEFAULT 0,
  `list_offset_left` int(5) DEFAULT 0,
  `list_offset_top` int(5) DEFAULT 0,
  `list_duration` int(8) DEFAULT 5000,
  `list_duration_effect` int(8) DEFAULT 500,
  `list_easing` varchar(50) DEFAULT 'swing',
  `list_apply_classes` text DEFAULT '',
  `list_main_template` text DEFAULT '',
  `list_items_container` varchar(150) DEFAULT 'animated_al_list_container',
  `list_main_container` varchar(150) DEFAULT 'main_element',
  `list_item_template` text DEFAULT '',
  `list_equation` varchar(100) DEFAULT 'none',
  `list_equation_koef` varchar(100) DEFAULT '',
  `list_effect` varchar(100) DEFAULT 'default',
  `list_visible_number` int(3) DEFAULT 0,
  `radius_first_last_elem` int(5) DEFAULT 10,
  `side_of_moving_first_last` int(3) DEFAULT 1,
  `list_fullwidth` int(3) DEFAULT 0,
  `settings_buttons` int(3) DEFAULT 1,
  `settings_buttons_top` int(7) DEFAULT 0,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDb  DEFAULT CHARSET=utf8 ;
";


//items
  $sql2 = "CREATE TABLE IF NOT EXISTS `".$table_items."` (
  `item_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(150) NOT NULL DEFAULT '',
  `main_id` int(11) unsigned NOT NULL,
  
  `item_url` varchar(250) NOT NULL DEFAULT '',
  `item_text` text NOT NULL DEFAULT '',
  `item_image` varchar(250) NOT NULL DEFAULT '',
  `item_width` int(5) NOT NULL DEFAULT 0,
  `item_height` int(5) NOT NULL DEFAULT 0,
  `item_color` varchar(50) DEFAULT '#000000',
  `item_bgcolor` varchar(50) DEFAULT '#ffffff',
  `item_styles` text DEFAULT '',
  `item_classes` text DEFAULT '',
  `item_disabled` int(5)  DEFAULT 0,
  
  `item_num` int(5)  DEFAULT 0,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDb  DEFAULT CHARSET=utf8 ;
";


    $wpdb->query($sql1);
    $wpdb->query($sql2);

  }

public static function animated_al_uninstall()
  {
  self::setWpdb();
  $wpdb = self::$wpdb;
  
  $table_main = $wpdb->prefix.'animated_al_list_main';
  $table_items = $wpdb->prefix.'animated_al_list_items';
  
  $sql1 = "DROP TABLE ".$table_main.";";
  $sql2 = "DROP TABLE ".$table_items.";";
  
    $wpdb->query($sql2);
    $wpdb->query($sql1);
  }

public function execute()
  {
  $pid = null;
  if (isset($_GET['pid']))
    $pid_get = $_GET['pid'];
  if (isset($_POST['pid']))
    $pid_post = $_POST['pid'];
  
    if (isset($pid_get))$pid = $pid_get;
    if (isset($pid_post))$pid = $pid_post;
    
    $data = array();
    $data['proj_id'] = $pid;
    
    $db = new AnimatedAl_Db();

    $itemsController = new Controller_Items(new Model_Items($db));
      list($data['item_id'], $data['curlist']['edit_list_item']) = $itemsController->execute($data['proj_id']);

    $templateInfoController = new Controller_Templates(new Model_Templates($db));
      list($data['main_files'], $data['item_files']) = $templateInfoController->execute($data['proj_id']);

    $positionInfoController = new Controller_Positions(new Model_Positions($db));
      list($data['position_equation'], $data['predefined_list'], $data['predefined_effects']) = $positionInfoController->execute($data['proj_id']);

    $mainInfoController = new Controller_MainInfo(new Model_MainInfo($db));
      list($data['proj_id'], $data['all_projects'], $data['list']) = $mainInfoController->execute($data['proj_id']);

    $views = new AnimatedAl_View(array('admin/header', 
                           array('admin/tab1_header', array('admin/tab1_block1'), 'admin/tab1_footer'),
                           array('admin/tab2_header', array('admin/tab2_block1', 'admin/tab2_block2'), 'admin/tab2_footer'),
                           array('admin/tab3_header', array('admin/tab3_block1'), 'admin/tab3_footer'),
                           array('admin/tab4_header', array('admin/tab4_block1'), 'admin/tab4_footer'),
                           array('admin/tab5_header', array('admin/tab5_block1'), 'admin/tab5_footer'),
                           array('admin/tab6_header', array('admin/tab6_block1'), 'admin/tab6_footer'),
                           array('admin/tab7_header', array('admin/tab7_block1'), 'admin/tab7_footer'),
                          'admin/footer'));
    $views->setData($data);
    echo $views->viewTemplates();
  }
  
public function animated_al_show_about()
  {
    $data = array();

    $views = new AnimatedAl_View(array('animated_al_about/header', 
                           array('animated_al_about/page1_header', array('animated_al_about/page1_block1', 'animated_al_about/page1_block2'), 'animated_al_about/page1_footer'),
                          'animated_al_about/footer'));
    $views->setData($data);
    echo $views->viewTemplates();
  }
public function animated_al_show_info()
  {
    $data = array();

    $views = new AnimatedAl_View(array('animated_al_info/header', 
                           array('animated_al_info/page1_header', array('animated_al_info/page1_block1', 'animated_al_info/page1_block2'), 'animated_al_about/page1_footer'),
                          'animated_al_info/footer'));
    $views->setData($data);
    echo $views->viewTemplates();
  }
public function animated_al_show_products()
  {
    $data = array();

    $views = new AnimatedAl_View(array('other_products/header', 
                           array('other_products/page1_header', array('other_products/page1_block1'), 'other_products/page1_footer'),
                          'other_products/footer'));
    $views->setData($data);
    echo $views->viewTemplates();
  }

}
?>
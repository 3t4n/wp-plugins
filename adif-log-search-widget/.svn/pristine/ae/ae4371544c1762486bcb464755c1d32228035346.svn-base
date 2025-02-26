<?php
/* 
Plugin Name: Logbook 
Plugin URI: http://dh9sb.dx-info.de 
Description: Plugin for searching calls in a logbook. 
Author: M. Konieczny, DH9SB 
Version: 1.0f
Author URI: http://dh9sb.dx-info.de 
*/ 

global $logbook_db_version;
$logbook_db_version = "3";

function logbook_install()
{
    global $wpdb;
    global $logbook_db_version;
    
    $table_logbook = $wpdb->prefix."logbook";
    $table_logbookBooks = $wpdb->prefix."logbookBooks";
    $table_logbookRef = $wpdb->prefix."logbookRef";
    
$structure_logbook = "CREATE TABLE $table_logbook (
                      id mediumint(8) unsigned NOT NULL auto_increment,
                      MyCallsign varchar(20) NOT NULL default '',
                      Date date NOT NULL default '0000-00-00',
                      Time time NOT NULL default '00:00:00',
                      Time_off time NOT NULL default '00:00:00',
                      CallSign varchar(30) NOT NULL default '',
                      Band tinyint(3) unsigned NOT NULL default '0',
                      Frequency varchar(15) NOT NULL default '',
                      Mode varchar(15) NOT NULL default '',
                      Prop_Mode varchar(15) NOT NULL default '',
                      RSTS varchar(10) NOT NULL default '',
                      RSTR varchar(10) NOT NULL default '',
                      QSLS varchar(2) NOT NULL default ''
                      QSLR varchar(2) NOT NULL default ''
                      refid int(11) NOT NULL,
                      booksid int(11) NOT NULL,
                      PRIMARY KEY  (id)
                      ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($structure_logbook);
        $structure_logbookBooks = "CREATE TABLE $table_logbookBooks (
                    `id` int(10) NOT NULL auto_increment,
                    `uploadDate` varchar(25) NOT NULL,
                    `refid` int(10) default NULL,
                    PRIMARY KEY  (`id`)
                  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($structure_logbookBooks);   
        $structure_logbookRef = "CREATE TABLE $table_logbookRef (
                    `id` int(11) NOT NULL auto_increment,
                    `refnumber` varchar(10) NOT NULL,
                    `refdescription` varchar(255) NOT NULL,
                    PRIMARY KEY  (`id`)
                  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($structure_logbookRef);
        
        add_option("logbook_db_version", $logbook_db_version);  

  $installed_db_version = get_option( "logbook_db_version" );

   if( $installed_db_version != $logbook_db_version ) {

$structure_logbook = "CREATE TABLE $table_logbook (
                      id mediumint(8) unsigned NOT NULL auto_increment,
                      MyCallsign varchar(20) NOT NULL default '',
                      Date date NOT NULL default '0000-00-00',
                      Time time NOT NULL default '00:00:00',
                      Time_off time NOT NULL default '00:00:00',
                      CallSign varchar(30) NOT NULL default '',
                      Band tinyint(3) unsigned NOT NULL default '0',
                      Frequency varchar(15) NOT NULL default '',
                      Mode varchar(15) NOT NULL default '',
                      Prop_Mode varchar(15) NOT NULL default '',
                      RSTS varchar(10) NOT NULL default '',
                      RSTR varchar(10) NOT NULL default '',
                      QSLS varchar(2) NOT NULL default ''
                      QSLR varchar(2) NOT NULL default ''
                      refid int(11) NOT NULL,
                      booksid int(11) NOT NULL,
                      PRIMARY KEY  (id)
                      ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
                  
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($structure_logbook);
      add_option('logbook_showProp_Mode','false');
      add_option('logbook_showQSLS','false');
      add_option('logbook_showQSLR','false');
      add_option('logbook_showTime_off','false');
      update_option( "logbook_db_version", $logbook_db_version );
  }
  
}

function logbook_administration() {  
    include('logbook_administration.php');  
}

function logbook_upload() {  
    include('logbook_upload.php');  
}

function logbook_books() {  
    include('books_list.php');  
}

function logbook_refs() {  
    include('references_list.php');  
}  

function logbookAdm_admin_actions() {
        add_menu_page("Options", "Logbook", 10, "Logbook_administration", "logbook_administration");
        add_submenu_page("Logbook_administration", "Upload", "Upload", 10, "Logbook_upload", "logbook_upload"); 
        add_submenu_page("Logbook_administration", "Books", "Books", 10, "Logbook_books", "logbook_books");
        add_submenu_page("Logbook_administration", "References", "References", 10, "Logbook_refs", "logbook_refs"); 
    }

function logbook_frontend($args) {
  echo $args['before_widget'];
  echo $args['before_title'].'Logbook'.$args['after_title'];
  include('logbook_search.php');
  echo $args['after_widget'];
}
 
function logbook_init(){
 register_sidebar_widget("Logbook", "logbook_frontend");
}

function my_init_method() {
    if (!is_admin() )
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-dialog');
    wp_register_style('jquery_ui_css', plugins_url( 'js/jquery-ui.css' , __FILE__ ));        
    wp_enqueue_style('jquery_ui_css');        
}

function add_logbook_stylesheet() {
            wp_register_style('logbookStyleSheets', plugins_url('logbook.css' , __FILE__ ));
            wp_enqueue_style( 'logbookStyleSheets');
    }
    
function set_logbook_options () {
global $logbook_db_version;

     add_option('logbook_showDate','true');
     add_option('logbook_showTime','true');
     add_option('logbook_showTime_off','true');     
     add_option('logbook_showCall','false');     
     add_option('logbook_showBand','true');
     add_option('logbook_showFreq','false');
     add_option('logbook_showMode','true');
     add_option('logbook_showProp_Mode','false');
     add_option('logbook_showRSTS','true');
     add_option('logbook_showRSTR','true');
     add_option('logbook_showQSLS','true');
     add_option('logbook_showQSLR','true');
     add_option('logbook_showRefNO','true');
     add_option('logbook_showRefDesc','true');
     add_option('logbook_showMyCallsign','false');
     add_option('logbook_defaultMyCallsign','');

}

function myplugin_update_db_check() {
    global $logbook_db_version;
    if (get_site_option('logbook_db_version') != $logbook_db_version) {
        logbook_install();
    }
}

add_action('plugins_loaded', 'myplugin_update_db_check');
         
add_action('admin_menu', 'logbookAdm_admin_actions'); 
add_action("plugins_loaded", "logbook_init");
add_action('wp_print_styles', 'add_logbook_stylesheet');
add_action('init', 'my_init_method');
register_activation_hook( __FILE__, 'set_logbook_options' );
register_activation_hook(__FILE__,'logbook_install');
?>
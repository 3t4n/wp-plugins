<?php
/*
* Plugin Name: Alidani contact form
* Plugin URI: https://www.uniquetechnology.com.au/
* Description: Simple Contact Form that sends the data to email and also to a database with easy way to manage and response to the emails 
* Author: Ehssan AL Idani
* Author URI: https://www.uniquetechnology.com.au/contact-us/
* Version: 1.4
* Requires PHP: 5.6.25
* License: GPL2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Alidani contact form is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
*/

if(!defined("ABSPATH"))
    exit;

if(!defined("ALIDANI_CONTACT_FORM_DIR_PATH"))
    define("ALIDANI_CONTACT_FORM_DIR_PATH",plugin_dir_path(__FILE__));

if(!defined("ALIDANI_CONTACT_FORM_URL"))
      define("ALIDANI_CONTACT_FORM_URL",plugins_url('/alidani-contact-form'));

    function alidani_contact_form_include_assets(){
        // Style
        wp_enqueue_style("bootstrap",ALIDANI_CONTACT_FORM_URL."/assets/css/bootstrap.min.css",'');
        wp_enqueue_style("datatable",ALIDANI_CONTACT_FORM_URL."/assets/css/jquery.dataTables.min.css",'');
        wp_enqueue_style("notifybar",ALIDANI_CONTACT_FORM_URL."/assets/css/jquery.notifyBar.css",'');
        wp_enqueue_style("style",ALIDANI_CONTACT_FORM_URL."/assets/css/alidanicontactformstyle.css",'');
    
        // Scripts
        wp_enqueue_script('alidanijquery.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/alidanijquery.js',array('jquery'),'',true);
        wp_enqueue_script('bootstrap.min.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/bootstrap.min.js',array('jquery'),'',true);
        wp_enqueue_script('datatable.min.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/jquery.dataTables.min.js',array('jquery'),'',true);
        wp_enqueue_script('notifybar.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/jquery.notifyBar.js',array('jquery'),'',true);
        wp_enqueue_script('validate.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/jquery.validate.min.js',array('jquery'),'',true);
        wp_enqueue_script('alidaniscript.js',ALIDANI_CONTACT_FORM_URL.'/assets/js/alidaniscript.js',array('jquery'),'',true);
        wp_localize_script("alidaniscript.js","alidaniformajaxurl",admin_url("admin-ajax.php"));
    
    }
    
    add_action("init", "alidani_contact_form_include_assets");


    function alidani_contact_form_plugin_menu(){
        add_menu_page( "ALIDANI Contact Forms", "ALIDANI Contact Forms", "manage_options", "alidaniform", "alidani_recieve_contact_form", "dashicons-email-alt2", 29 );
        add_submenu_page( "alidaniform", "Received Emails", "Received Emails", "manage_options", "alidaniform", "alidani_recieve_contact_form" );
        add_submenu_page( "alidaniform", "Admin info", "Admin info", "manage_options", "alidaniadmininfo", "alidani_admin_info_page" );
        add_submenu_page( "alidaniform", "Form Redesign", "Form Redesign", "manage_options", "alidaninewform", "alidani_new_form_page" );
        add_submenu_page( "alidaniform", "", "", "manage_options", "editform", "alidani_edit_page" );
        add_submenu_page( "alidaniform", "", "", "manage_options", "editadminform", "alidani_admin_edit_page" );
        add_submenu_page( "alidaniform", "", "", "manage_options", "sendadminform", "alidani_admin_send_page" );
    }
    add_action( "admin_menu", "alidani_contact_form_plugin_menu" );

    add_shortcode( "alidaniform", "alidani_front_contact_form" );

    function alidani_front_contact_form(){
         if ( ! is_admin() ) {
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_front_contact_form.php";
        }
    }

    function alidani_recieve_contact_form(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_recieve_contact_form.php";
    }

    function alidani_admin_info_page(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_admin_info_page.php";

    }

    function alidani_edit_page(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_edit_page.php";
    }

    function alidani_admin_edit_page(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_admin_edit_page.php";
    }

    function alidani_admin_send_page(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_admin_send_page.php";
    }

    function alidani_new_form_page(){
        include_once ALIDANI_CONTACT_FORM_DIR_PATH."/views/alidani_new_form_page.php";
    }
    
    
     // add database Colors and Font
     function alidani_contact_form_color_font_database_table(){
        global $wpdb;
        return $wpdb->prefix."alidani_contact_form_color_font";
    }
    // add database admin
    function alidani_contact_form_admin_info_database_table(){
        global $wpdb;
        return $wpdb->prefix."alidani_contact_form_admin_info";
    }

    // add database table Front
    function alidani_contact_form_database_table(){
        global $wpdb;
        return $wpdb->prefix."alidani_contact_form_admin";
    }
    //activate hook
    function alidani_contact_form_generation_table_script(){
        global $wpdb;
        require_once ABSPATH.'wp-admin/includes/upgrade.php';
        // new table
        $sql = "CREATE TABLE `".alidani_contact_form_database_table()."` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `firstname` varchar(255)  DEFAULT NULL,
            `lastname` varchar(255)  DEFAULT NULL,
            `email` varchar(255)  DEFAULT NULL,
            `number` decimal(10,0) DEFAULT NULL,
            `enquiry` text,
            `creating` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
           ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
           dbDelta($sql);
           // Admin Info
        $sql = "CREATE TABLE `".alidani_contact_form_admin_info_database_table()."` (
            `adminid` int(11) NOT NULL AUTO_INCREMENT,
            `adminfirstname` varchar(255)  DEFAULT NULL,
            `adminlastname` varchar(255)  DEFAULT NULL,
            `adminemail` varchar(255)  DEFAULT NULL,
            `adminmessage` text,
            PRIMARY KEY (`adminid`)
           ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
           dbDelta($sql);
            // Color and font
        $sql = "CREATE TABLE `".alidani_contact_form_color_font_database_table()."` (
            `colorid` int(11) NOT NULL ,
            `colorone` varchar(255)  DEFAULT NULL,
            `colortwo` varchar(255)  DEFAULT NULL,
            `colorthree` varchar(255)  DEFAULT NULL,
            `colorfour` varchar(255)  DEFAULT NULL,
            `colorfive` varchar(255)  DEFAULT NULL,
            `colorsix` varchar(255)  DEFAULT NULL,
            `fontone` varchar(255)  DEFAULT NULL,
            `fonttwo` varchar(255)  DEFAULT NULL,
            `fontthree` varchar(255)  DEFAULT NULL,
            `fontfour` varchar(255)  DEFAULT NULL,
            `fontfive` varchar(255)  DEFAULT NULL,
            `fontsix` varchar(255)  DEFAULT NULL,
            `fontseven` varchar(255)  DEFAULT NULL,
            `fonteight` varchar(255)  DEFAULT NULL,
            PRIMARY KEY (`colorid`)
           ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
           dbDelta($sql);
           $wpdb->insert(alidani_contact_form_color_font_database_table(),array(
            "colorid"=>"1",
            "colorone"=>"#000",
            "colortwo"=>"#337ab7",
            "colorthree"=>"#fff",
            "colorfour"=>"#fff",
            "colorfive"=>"#fff",
            "colorsix"=>"#000",
            "fontone"=>"First Name:",
            "fonttwo"=>"Last Name:",
            "fontthree"=>"Email:",
            "fontfour"=>"Phone Number:",
            "fontfive"=>"Enquiry:",
            "fontsix"=>"Submit",
            "fontseven"=>"Contact Form",
        ));
    }

    register_activation_hook(__FILE__,"alidani_contact_form_generation_table_script");


    // deactivate hook
    function drop_table_plugin_alidani_contact_form(){
        global $wpdb;
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_database_table() );
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_admin_info_database_table() );
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_color_font_database_table() );
    }
    register_deactivation_hook(__FILE__,"drop_table_plugin_alidani_contact_form");
 // uninstall hook
    function delete_table_plugin_alidani_contact_form(){
        global $wpdb;
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_database_table() );
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_admin_info_database_table() );
        $wpdb->query( "DROP TABLE IF EXISTS ".alidani_contact_form_color_font_database_table() );
    }
    register_uninstall_hook(__FILE__,"delete_table_plugin_alidani_contact_form");

    //add ajax for alidanicontactlibrary
    add_action( "wp_ajax_alidanicontactlibrary","alidani_contact_ajax_handler" );
    //add ajax for alidaniadmincontactlibrary
    add_action( "wp_ajax_alidaniadmincontactlibrary","alidani_admin_contact_ajax_handler" );

    //add ajax for alidanicolorandfontlibrary
    add_action( "wp_ajax_alidanicolorandfontlibrary","alidani_color_font_contact_ajax_handler" );

    //add ajax for alidanisendcontactlibrary

    add_action( "wp_ajax_alidanisendcontactlibrary","alidani_send_contact_ajax_handler" );

    // function for alidani_color_font_contact_ajax_handler
    function alidani_color_font_contact_ajax_handler(){
        global $wpdb;
        
        if($_REQUEST['param']=="save_color_font_form"){
             
             $wpdb->update(alidani_contact_form_color_font_database_table(),array(
                "colorone"=>sanitize_hex_color($_REQUEST['colorInputColor']),
                "colortwo"=>sanitize_hex_color($_REQUEST['backcolorInputColor']),
                "colorthree"=>sanitize_hex_color($_REQUEST['interbackcolorInputColor']),
                "colorfour"=>sanitize_hex_color($_REQUEST['inputbackcolorInputColor']),
                "colorfive"=>sanitize_hex_color($_REQUEST['submitcolorInputColor']),
                "colorsix"=>sanitize_hex_color($_REQUEST['submitcolorfontColor']),
                "fontone"=>sanitize_text_field($_REQUEST['firstfieldText']),
                "fonttwo"=>sanitize_text_field($_REQUEST['secondfieldText']),
                "fontthree"=>sanitize_text_field($_REQUEST['thirdfieldText']),
                "fontfour"=>sanitize_text_field($_REQUEST['forthfieldText']),
                "fontfive"=>sanitize_text_field($_REQUEST['fifthfieldText']),
                "fontsix"=>sanitize_text_field($_REQUEST['sixthfieldText']),
                "fontseven"=>sanitize_text_field($_REQUEST['seventhfieldText']),
            ),array(
                "colorid"=> "1" ));
             echo json_encode(array("status"=>1,"message"=>"Changes has been saved!"));
    }
    wp_die();
}
    // function for alidani_send_contact_ajax_handler
    function alidani_send_contact_ajax_handler(){
        global $wpdb;
        if($_REQUEST['param']=="send_contact_form"){
            $to=array(
                "to"=>sanitize_email($_REQUEST['toSend-email']),
                "from"=>sanitize_email($_REQUEST['adminSend-email']),
        );
        $subject=array(
            "subject"=>sanitize_text_field($_REQUEST['subjectSend-email']),
        );
        $message=array(
            "message"=>sanitize_text_field($_REQUEST['sendMessage']),
        );
        wp_mail($to,$subject,$message);
        echo json_encode(array("status"=>1,"message"=>"The email has been send"));
     } wp_die();
    }
    // function for alidani_admin_contact_ajax_handler
    function alidani_admin_contact_ajax_handler(){
        global $wpdb;
       if($_REQUEST['param']=="save_admin_contact_form"){
            $wpdb->insert(alidani_contact_form_admin_info_database_table(),array(
                "adminid"=> "1",
                "adminfirstname"=>sanitize_user($_REQUEST['admin-first-name']),
                "adminlastname"=>sanitize_user($_REQUEST['admin-last-name']),
                "adminemail"=>sanitize_email($_REQUEST['admin-email']),
                "adminmessage"=>sanitize_text_field($_REQUEST['admin-message']),
            
               

            ));
            echo json_encode(array("status"=>1,"message"=>"Request created Successfully"));
        }elseif ($_REQUEST['param']=="edit_admin_contact_form"){
            $wpdb->update(alidani_contact_form_admin_info_database_table(),array(
                "adminfirstname"=>sanitize_user($_REQUEST['admin-first-name']),
                "adminlastname"=>sanitize_user($_REQUEST['admin-last-name']),
                "adminemail"=>sanitize_email($_REQUEST['admin-email']),
                "adminmessage"=>sanitize_text_field($_REQUEST['admin-message']),
                ),array(
                    "adminid"=>sanitize_text_field($_REQUEST['alidani_admin_contact_id'])
    
            ));
            echo json_encode(array("status"=>1,"message"=>"Request created Successfully"));
        }
        elseif ($_REQUEST['param']=="delete_admin_contact_form") {
                
        $wpdb->delete(alidani_contact_form_admin_info_database_table(),array(
            "adminid"=>sanitize_text_field($_REQUEST['adminid'])
        ));
        echo json_encode(array("status"=>1,"message"=>"Request Deleted Successfully"));
    }
        wp_die();
    }
    //function alidani_contact_ajax_handler
    function alidani_contact_ajax_handler(){
       global $wpdb;
       if($_REQUEST['param']=="save_contact_form"){
           
          $wpdb->insert(alidani_contact_form_database_table(),array(
                "firstname"=>sanitize_user($_REQUEST['first-name']),
                "lastname"=>sanitize_user($_REQUEST['last-name']),
                "email"=>sanitize_email($_REQUEST['email']),
                "number"=>sanitize_text_field($_REQUEST['number']),
                "enquiry"=>sanitize_text_field($_REQUEST['enquiry']),
                

           ));
           echo json_encode(array("status"=>1,"message"=>"Thank you for contacting us; we will respond as soon as possible."));

       }elseif ($_REQUEST['param']=="edit_contact_form"){
        $wpdb->update(alidani_contact_form_database_table(),array(
             "firstname"=>sanitize_user($_REQUEST['first-name']),
             "lastname"=>sanitize_user($_REQUEST['last-name']),
             "email"=>sanitize_email($_REQUEST['email']),
             "number"=>sanitize_text_field($_REQUEST['number']),
             "enquiry"=>sanitize_text_field($_REQUEST['enquiry']),
            ),array(
                "id"=>sanitize_text_field($_REQUEST['alidani_contact_id']) 

        ));
        echo json_encode(array("status"=>1,"message"=>"Request created Successfully"));
    }
    //delete the recieving form
    elseif ($_REQUEST['param']=="delete_contact_form") {

        $wpdb->delete(alidani_contact_form_database_table(),array(
        "id"=>sanitize_text_field($_REQUEST['id'])
    ));
    echo json_encode(array("status"=>1,"message"=>"Request Deleted Successfully"));
    
    }
       wp_die();
    }

    

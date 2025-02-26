<?php

/*
  Plugin Name: Anticopy / Antiprint
  Plugin URI: http://www.ligams.com/
  Description: Anticopy / Antiprint prevents users from copying or printing content. It is just a simple extension that add some CSS and JS that disable selection (copy) and print feature. Do not forget : totally prevent these features is <strong>not possible</strong>, if anyone really wants to get (steal) your content, it is possible, even with this extension enabled. It will just make it more complicated.  You may choose in admin options the features you need to disable; by default, copy and print are both disabled.
  Version: 1.0.0
  Author: <a href="http://www.ligams.com/">Stéphane Le Merre</a>
  Author URI: http://www.ligams.com
 */

if (!class_exists("anticopy")) {

    class anticopy {

        var $adminOptionsName = 'anticopy_adminoptions';

        function anticopy() {
            
        }

        function init() {
            $this->getAdminOptions();
        }

        function getAdminOptions() {
            $anticopy_adminoptions = array(
                'anticopy_enabled' => 'true',
                'antiprint_enabled' => 'true',
            );
            $anticopy_options = get_option($this->adminOptionsName);
            if (!empty($anticopy_options)) {
                foreach ($anticopy_options as $key => $option)
                    $anticopy_adminoptions[$key] = $option;
            }
            update_option($this->adminOptionsName, $anticopy_adminoptions);
            return $anticopy_adminoptions;
        }

        function addHeaderAntiCopy() {
            print '<script type="text/javascript" src="' . plugins_url('anticopy/javascript/c.js') . '"></script>';
            print '<link rel="stylesheet"  type="text/css" href="' . plugins_url('anticopy/css/c.css') . '" media="all" />';
        }

        function addHeaderAntiPrint() {
            print '<script type="text/javascript" src="' . plugins_url('anticopy/javascript/p.js') . '"></script>';
            print '<link rel="stylesheet"  type="text/css" href="' . plugins_url('anticopy/css/p.css') . '" media="print" />';
        }

        function printAdminPage() {
            $options = $this->getAdminOptions();
            if (isset($_POST['update_wp_anticopy'])) {
                if (isset($_POST['anticopy_enabled'])) {
                    $options['anticopy_enabled'] = $_POST['anticopy_enabled'];
                }
                if (isset($_POST['antiprint_enabled'])) {
                    $options['antiprint_enabled'] = $_POST['antiprint_enabled'];
                }
                update_option($this->adminOptionsName, $options);
                print '<div class="updated"><p><strong>';
                _e("Anticopy parameters updated", "wpjschat");
                print '</strong></p></div>';
            }
            include('php/admin_settings.php'); // include du formulaire HTML
        }

    }

}

$inst_anticopy = new anticopy();

$options = $inst_anticopy->getAdminOptions();
if($options['anticopy_enabled']=='true') 
    add_action('wp_head', array(&$inst_anticopy, 'addHeaderAntiCopy'), 1);

if($options['antiprint_enabled']=='true')
    add_action('wp_head', array(&$inst_anticopy, 'addHeaderAntiPrint'), 1);

if (!function_exists("anticopy_ap")) {
    function anticopy_ap() {
        global $inst_anticopy;
        if (!isset($inst_anticopy)) {
            return;
        }
        if (function_exists('add_options_page')) {
            add_options_page('Anticopy Options', 'Anticopy', 9, basename(__FILE__), array(&$inst_anticopy, 'printAdminPage'));
        }
    }
}

add_action('admin_menu', 'anticopy_ap');
add_action('activate_anticopy/anticopy.php', array(&$inst_anticopy, 'init'));
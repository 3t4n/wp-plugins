<?php
/*
Plugin Name: 404gotten.org 404 Page
Plugin URI: https://github.com/AdeptMarketing/404gotten-wp
Description: A WordPress plug-in designed to convert your 404 not found page into a way to help a Compassion child find a sponsor.
Version: 1.8
Author: Adept Marketing
Author URI: https://www.adeptmarketing.com/
*/

require_once dirname(__FILE__) . '/lib/Utility.php';
require_once dirname(__FILE__) . '/lib/View.php';

add_action('template_redirect',   array('Compassion_Core', 'load404'), 20);
add_action('admin_menu',   array('Compassion_Core', 'registerAdmin'));

/**
 * This class is the core of the NotFound plugin
 */
class Compassion_Core
{
    /**
    * Load the NotFound 404 page
    */
    static function load404()
    {
        if(is_404()) {
            // if permalink finder is defined AND no suggestions found
            if ((function_exists('kpg_permalink_finder')) && ($find<1)) {

                $omit_404 = Compassion_Utility::getOption('nf_omit_error', false);

                if(!$omit_404)
                    header("HTTP/1.1 404 Not Found");
                else
                    header("HTTP/1.1 200 OK");

                Compassion_View::load('notfound');
                exit;
            } else {
                //  permalink finder is not defined or no suggestion
                //  Use Standard function.
                $omit_404 = Compassion_Utility::getOption('nf_omit_error', false);

                if(!$omit_404)
                    header("HTTP/1.1 404 Not Found");
                else
                    header("HTTP/1.1 200 OK");

                Compassion_View::load('notfound');
                exit;
            }
        }
    }

    /**
     * Register the admin settings page
     */
    static function registerAdmin()
    {
        add_options_page('404gotten.org', '404gotten.org', 'edit_pages', 'compassion-com.php', array(__CLASS__, 'adminMenuCallback'));
    }

    /**
     * The function used by WP to print the admin settings page
     */
    static function adminMenuCallback()
    {
        $submit  = Compassion_Utility::arrayGet($_POST, 'nf_submit');
        $updated = FALSE;

        if($submit)
        {
            Compassion_Utility::setOption('cp_omit_error', Compassion_Utility::arrayGet($_POST, 'cp_omit_error', '0'));
            Compassion_Utility::setOption('cp_referral', Compassion_Utility::arrayGet($_POST, 'cp_referral', '0'));
            $updated = TRUE;
        }

        $data = array (
            'cp_omit_error' => Compassion_Utility::getOption('cp_omit_error', false),
        );

        Compassion_View::load('admin', $data);
    }
}

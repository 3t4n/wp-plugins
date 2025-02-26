<?php

/**
 * Class for working with Contact From 7 plugin
 * 
 * @package Konfirmi Plugin
 */


namespace Konfirmi\Base\Forms;

require 'ContactFormTag.php';

use WPCF7_Submission;
use WPCF7_ContactForm;
use WPCF7_TagGenerator;
use WPCF7_FormTag;
use \Konfirmi\Base\FormController;

class ContactForm extends FormController
{

    /**
     * Register hooks for working with CF7.
     */  
    public function register()
    {
        if(!in_array('contact-form-7/wp-contact-form-7.php', apply_filters('active_plugins', get_option('active_plugins'))) && !class_exists('WPCF7_ContactForm')) {
            return null;
        }

        add_action('wpcf7_before_send_mail', function($form) {
            return $this->handler($form);
        });

        $this->addWidgetInForm();
        $this->enqueueScripts();
    }

    /**
     * Callback for the CF7 hook.
     * @param WPCF7_ContactForm $form
     */
    public function handler( $form )
    {
        return $form;
    }

    /**
     * Add widget code and tag to Contact Forms
     */
    public function addWidgetInForm () {

        add_action( 'wpcf7_init', function(){
            wpcf7_add_form_tag( 'konfirmi', function($tag) {
            $id = $tag->get_id_option();
            if($this->shouldWidgetRender(1, $id)){
                return do_shortcode("[konfirmi id=\"$id\"]");
            }
            }); 
        });

        //add Tag to Generator
        add_action( 'wpcf7_admin_init', function(){
            $tag_generator = WPCF7_TagGenerator::get_instance();
            $res = $tag_generator->add( 'konfirmi', __( 'konfirmi', 'contact-form-7' ), 'wpcf7_add_tag_generator_konfirmi' );
        }, 999 );
    }

    /**
     * Init scripts for Konfirmi Plugin
     */
    public function enqueueScripts(){
        add_action('wp_enqueue_scripts', function(){
            $CF7_scripts = $this->plugin_url."assets/js/contact-form-7.js";
            wp_enqueue_script('cf7_scripts', $CF7_scripts, array('konfirmi_scripts', 'contact-form-7', 'base_class'));
        });
    }
}
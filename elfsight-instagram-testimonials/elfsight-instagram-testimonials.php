<?php
/*
Plugin Name: Elfsight Instagram Testimonials
Description: Display your prices in a simple and graphic way.
Plugin URI: https://elfsight.com/instagram-testimonials/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=instagram-testimonials&utm_content=plugin-site
Version: 1.3.1
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=instagram-testimonials&utm_content=author-url
*/

if (!defined('ABSPATH')) exit;

require_once('elfsight-portal/elfsight-portal.php');

new ElfsightPortal(array(
        'app_slug' => 'elfsight-instagram-testimonials',
        'app_name' => 'Instagram Testimonials',
        'app_version' => '1.3.1',

        'plugin_slug' => plugin_basename(__FILE__),
        'plugin_menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),
        'plugin_text_domain' => 'elfsight-instagram-testimonials',

        'embed_url' => 'https://apps.elfsight.com/embed/instagram-testimonials/?utm_source=portals&utm_medium=wordpress-org&utm_campaign=instagram-testimonials&utm_content=sign-up',
        
        'support_link' => 'https://wordpress.org/support/plugin/elfsight-instagram-testimonials'
    )
);

?>
<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.itpathsolutions.com/
 * @since      1.0.0
 *
 * @package    Advanced_Images_Gallery_With_Lightbox
 * @subpackage Advanced_Images_Gallery_With_Lightbox/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
$aigwl_object              = new Advanced_Images_Gallery_With_Lightbox();
$text_domain             = $aigwl_object->get_plugin_name();
$plugin_version          = $aigwl_object->get_version();
$layout_option  = $aigwl_object->aigwl_display_layout_options();
$hover_effect_option   = $aigwl_object->aigwl_image_hover_effect_options();	
$aigwl_public_object  = new Advanced_Images_Gallery_With_Lightbox_Public($text_domain,$plugin_version);
$aigwl_gallery_id = $aigwl_attributes['gallery_id'];
$aigwl_default_option['aigwl_display_layout'] = get_post_meta($aigwl_gallery_id,'aigwl_display_layout',true);
$aigwl_default_option['aigwl_image_hover_effect'] = get_post_meta($aigwl_gallery_id,'aigwl_image_hover_effect',true);


    /* Advanced Images Gallery With Lightbox Layout Selection */
    if($aigwl_default_option['aigwl_display_layout'] == 1):

        wp_enqueue_style( $this->plugin_name.'-grid-gallery', plugin_dir_url(dirname(__FILE__)) . 'css/grid-gallery.css', array(), $this->version, 'all' );	
        require(dirname(__FILE__) . '/grid-gallery.php');
       
    elseif($aigwl_default_option['aigwl_display_layout']  == 2):

        wp_enqueue_style( $this->plugin_name.'-masonary-gallery', plugin_dir_url(dirname(__FILE__)) . 'css/masonary-gallery.css', array(), $this->version, 'all' );	
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( $this->plugin_name.'-masonary-custom', plugin_dir_url(dirname(__FILE__)) . 'js/masonary-custom.js', array( 'jquery' ), $this->version, true );
        require(dirname(__FILE__) . '/masonary-gallery.php');
     
    elseif($aigwl_default_option['aigwl_display_layout']  == 3):

        wp_enqueue_style( $this->plugin_name.'-diamond-gallery', plugin_dir_url(dirname(__FILE__)) . 'css/diamond-gallery.css', array(), $this->version, 'all' );	
        require(dirname(__FILE__) . '/diamond-gallery.php');  
            
    elseif($aigwl_default_option['aigwl_display_layout'] == 4):

        wp_enqueue_style( $this->plugin_name.'-fullwidth-gallery', plugin_dir_url(dirname(__FILE__)) . 'css/fullwidth-gallery.css', array(), $this->version, 'all' );	
        require(dirname(__FILE__) . '/fullwidth-gallery.php');
       
    elseif($aigwl_default_option['aigwl_display_layout'] == 5):

        wp_enqueue_style( $this->plugin_name.'-slick-slider', plugin_dir_url(dirname(__FILE__)) . 'css/slick.css', array(), $this->version, 'all' );	
        wp_enqueue_style( $this->plugin_name.'-slick-custom', plugin_dir_url(dirname(__FILE__)) . 'css/slick-custom.css', array(), $this->version, 'all' );
        wp_enqueue_script( $this->plugin_name.'-slick-js', plugin_dir_url(dirname(__FILE__)) . 'js/slick.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-slick-slider-js', plugin_dir_url(dirname(__FILE__)) . 'js/slick-slider.js', array( 'jquery' ), $this->version, true );
       require(dirname(__FILE__) . '/slick-slider.php');
      
    elseif($aigwl_default_option['aigwl_display_layout'] == 6):   

        wp_enqueue_style( $this->plugin_name.'-hexagonal-gallery', plugin_dir_url(dirname(__FILE__)) . 'css/hexagonal-gallery.css', array(), $this->version, 'all' );	
        require(dirname(__FILE__) . '/hexagonal-gallery.php');  

    endif;
<?php
/*
   Plugin Name: GW CF7 Modal
   Plugin URI: http://wordpress.org/extend/plugins/gw_cf7_modal/
   Version: 1.1
   Author: Darko Gerguric
   Description: Simple plugin to show  CF7 Form in modal window
   Author URI:  https://darkog.pro
   License: GPLv3
  */



include('admin/options.php');
include('admin/media_upload.php');





/**
* add backend scripts and styles
*/
function gw_cf7_modal_admin_scripts_loader() {
// add styles and scripts
      wp_enqueue_style( 'wp-color-picker' );
       wp_enqueue_media();
      wp_enqueue_script( 'wp-color-picker-alpha', plugins_url('/admin/js/wp-color-picker-alpha.min.js', __FILE__), array( 'wp-color-picker' ) );
      $colorpicker_l10n = array('clear' => __('Clear'), 'defaultString' => __('Default'), 'pick' => __('Select Color'));
      wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
      wp_enqueue_script( 'gw_cf7_modal_admin_js', plugins_url('/admin/js/gw_cf7_modal_admin_menus_js.js', __FILE__), array(), '1.0.0', true);

     
      wp_enqueue_style( 'gw_admin-css',plugins_url('/admin/css/gw_admin.css' , __FILE__) );
    }

add_action( 'admin_enqueue_scripts', 'gw_cf7_modal_admin_scripts_loader' );



/**
* add frontend scripts and styles
*/
    function gw_cf7_modal_frontend_scripts_loader() {
      wp_enqueue_style( 'popup-css',plugins_url('/assets/gw_cf7_modal.css' , __FILE__) );
      
      }

    add_action( 'wp_enqueue_scripts', 'gw_cf7_modal_frontend_scripts_loader' );

function gw_cf7_modal_gen(){


	$args  =  array(
                  'post_type'=> 'wpcf7_contact_form',
                  'suppress_filters' => false ,
                  'p' => get_option('select_form'),
                  'numberposts' => '1');
	$forms = get_posts($args);
  $img_atts = wp_get_attachment_url( get_option('media_selector_attachment_id') );

  ?>

<!-- The Modal -->

<div class="modal">
  <div class="modal-content">
    <span class="close-button">&times;</span>
      <div class=" popup_wrap" style="">
        <div class="leftarea" >
          <?php if (get_option('left_textarea')): ?>

              <div class="left_textarea padding_1">
                <?php echo get_option('left_textarea'); ?>
              </div>

          <?php endif; ?>
        </div>
        <div class="rightarea" style="background: <?php echo get_option('form_background'); ?>;">

              <!--  start form part -->
              <div class="popup_form_wrap">
                  <?php  foreach($forms as $form) :?>
                  <?php  echo do_shortcode('[contact-form-7 id="'.$form->ID.'" title="'.$form->post_name.'"]') ?>
           
                  <?php endforeach;?>
                  <!--  / form part -->
              </div>
          </div>
      
      </div> <!-- / popup wrap -->    
          
  </div>
</div>
<style>
 .popup_wrap{ background-image:url(<?php echo $img_atts; ?>); background-color: <?php echo get_option('main_background_color'); ?> ;align-items: <?php echo get_option('leftarea_content_position'); ?> ;}

.popup_form_wrap label {color: <?php echo get_option('label_color'); ?>;}

.left_textarea,.left_textarea a { color: <?php echo get_option('leftarea_text_color'); ?>; text-align: <?php echo get_option('leftarea_text_align'); ?> ;}
.left_textarea  { background: <?php echo get_option('text_background'); ?>}
.gw_cf7_modal_close .fa {color:<?php echo get_option('close_button_color'); ?> !important;}
@media (max-width: 980px) { .popup_wrap{ background-color:  <?php echo get_option('main_background_color'); ?> ; } }
</style>
  
<?php $click_or_load = get_option('onload_or_click');

if ($click_or_load[0] == 'yes') : ?>

<script type="text/javascript">
var modal = document.querySelector(".modal");
   
var closeButton = document.querySelector(".close-button");


function toggleModal() {
       
        if(localStorage.getItem("gw_cf7_modal") !== 'yes'){
           localStorage.setItem("gw_cf7_modal", "yes");
          modal.classList.toggle("show-modal");
        }
       }




if (localStorage.getItem("gw_cf7_modal") !== 'yes') {
      document.addEventListener("DOMContentLoaded",toggleModal );
    }    




</script>
<?php endif; ?>
 <script>
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector("<?php echo get_option('click_selector'); ?>");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
	
    </script>



   
<?php

}

add_action( 'wp_footer','gw_cf7_modal_gen' );

<?php

if (!defined('ABSPATH')){
    exit;
}


// Add a tab for popup options in contact form 7 settings
add_filter( 'wpcf7_editor_panels', 'SFPMCF7_wpcf7_editor_panels' , 10, 1 ); 
function SFPMCF7_wpcf7_editor_panels( $panels ) { 
    $panels_popup = array(
        'popup-panel' => array(
            'title' => __( 'Popup Setting', 'contact-form-7' ),
            'callback' => 'SFPMCF7_wpcf7_editor_panel_popup',
        ),
    );
    $panels = array_merge($panels,$panels_popup);
    return $panels; 
}

// Add a popup setting options in the new tab for contact form 7 settings
function SFPMCF7_wpcf7_editor_panel_popup() { 
    $formid = sanitize_text_field($_REQUEST['post']);
    // POPUP ADMINPANEL FORMAT
    ?>
    <h2><?php echo __('Success Message Settings','success-fail-popup-message-for-contact-form-7');?></h2>
    <fieldset>
        <legend><?php echo __('You can Enable/Disable this Form popup and also you can other setting related to popup.','success-fail-popup-message-for-contact-form-7');?></legend>
        <p>
            <label>

                <input type="checkbox" name="sfpmcf7_enabled_popup_val" value="popupenable" <?php if (isset($formid)){if (get_post_meta( $formid, 'sfpmcf7_enabled_popup_val', true ) == $formid) {echo ' checked="checked"';}} ?>><?php echo __('Enable/Disable this Form popup','success-fail-popup-message-for-contact-form-7');?>
            </label>
        </p>

        <table class="form-table tbl_main">

            <tbody>

                <tr>
                    <th scope="row">
                        <label><?php echo __('Popup Text','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_popup_message" class="regular-text" id="sfpmcf7_popup_message" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_message', true ));?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Popup Width','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_m_popup_width" class="regular-text" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_m_popup_width', true ));?>">
                        <span class="description"><?php echo __('Value must be like: 500px / auto / 50%','success-fail-popup-message-for-contact-form-7');?></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Popup Border Radius','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="number" name="sfpmcf7_m_popup_radius" class="regular-text" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_m_popup_radius', true ));?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Auto Hide after','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_m_popup_duration" class="regular-text" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_m_popup_duration', true ));?>">
                        <span class="description"><?php echo __('Duration in milliseconds eg. 5000 (Popup will hide after 5 Seconds).','success-fail-popup-message-for-contact-form-7');?></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">
                        <label><?php echo __('Select Popup Background :','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                </tr>
                <tr>
                    <th scope="row">
                    </th>
                    <td>
                        <table class="tbl_child">
                            <tr>
                                <td>
                                    <?php 
                                      if(empty(get_post_meta( $formid, 'sfpmcf7_popup_background_option', true ))){
                                        $val = 'bg_color';
                                      } else {
                                        $val = get_post_meta( $formid, 'sfpmcf7_popup_background_option', true );
                                       }
                                     ?>
                                    <label>
                                        <input type="radio" name="sfpmcf7_popup_background_option" value="bg_color" <?php if($val == 'bg_color'){echo "checked";}?>><?php echo __('Background Color','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_popup_background_color" value="<?php echo get_post_meta( $formid, 'sfpmcf7_popup_background_color', true );?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="sfpmcf7_popup_background_option" value="image" <?php if($val == 'image'){echo "checked";}?>><?php echo __('Background Image','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <?php  
                                        echo SFPMCF7_image_uploader_field( 'image1', get_post_meta($formid, 'hidden_img_count', true ) );
                                    ?>
                                </td>
                                <td>
                                    <?php if(!empty(get_post_meta($formid, 'sfpmcf7_popup_image_color', true ))){ ?>
                                    <img src="<?php echo esc_url(get_post_meta($formid, 'sfpmcf7_popup_image_color', true )); ?>" width="50px" height="50px">
                                    <?php } ?>
                                    <input type="hidden" name="sfpmcf7_popup_image_color" class="hidden_img" value="<?php echo get_post_meta($formid, 'sfpmcf7_popup_image_color', true );?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="sfpmcf7_popup_background_option" value="gradient_color" <?php if($val == 'gradient_color'){echo "checked";}?>><?php echo __('Gradient Color','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_popup_gradient_color" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_gradient_color', true ));?>">
                                </td>
                                <td>
                                    <input class="color-picker gra_box" name="sfpmcf7_popup_gradient_color1" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_gradient_color1', true ));?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?php echo __('Popup Text Color','success-fail-popup-message-for-contact-form-7');?></label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_popup_text_color" id="sfpmcf7_popup_text_color" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_text_color', true ));?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?php echo __('Button background color','success-fail-popup-message-for-contact-form-7');?></label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_popup_button_background_color" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_button_background_color', true ));?>">
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Button Text','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_popup_button_text" class="regular-text" value="<?php echo esc_attr(get_post_meta( $formid, 'sfpmcf7_popup_button_text', true ));?>">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <h2><?php echo __('Failure message Settings','success-fail-popup-message-for-contact-form-7');?> <span class="pro_verions_link"><a href="https://www.plugin999.com/plugin/success-fail-popup-message-for-contact-form-7/" target="_blank"><?php echo __('Pro Version','popup-message-contact-form-7');?></a></span></h2>
    
    <fieldset class="verions_pro">
        <legend><?php echo __('You can Enable/Disable this Failure popup and also you can you other setting related to Failure popup.','success-fail-popup-message-for-contact-form-7');?></legend>
        <p>
            <label>
                <input type="checkbox" name="sfpmcf7_enabled_failure_popup_val" value="failurepopupenable"><?php echo __('Enable/Disable this Failure popup','success-fail-popup-message-for-contact-form-7');?>
            </label>
        </p>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Failure Popup Width','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_failure_popup_width" class="regular-text" value="">
                        <span class="description"><?php echo __('Value must be like: 500px / auto / 50%','success-fail-popup-message-for-contact-form-7');?></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('failure Popup Border Radius','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="number" name="sfpmcf7_failure_popup_radius" class="regular-text" value="">
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Auto Hide after(Failure)','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_failure_popup_duration" class="regular-text" value="">
                        <span class="description"><?php echo __('Duration in milliseconds eg. 5000 (Popup will hide after 5 Seconds).','success-fail-popup-message-for-contact-form-7');?></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">
                        <label><?php echo __('Select Popup Background :','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                </tr>
                <tr>
                    <th scope="row">
                    </th>
                    <td>
                        <table class="tbl_child">
                            <tr>
                                <td>
                                    
                                    <label>
                                        <input type="radio" name="sfpmcf7_failure_popup_background_option" value="bg_color" ><?php echo __('Background Color','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_failure_popup_background_color" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="sfpmcf7_failure_popup_background_option" value="image"><?php echo __('Background Image','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <?php  
                                        echo SFPMCF7_image_uploader_field_failer ( 'image_failure', get_post_meta($formid, 'failure_hidden_img_count', true ) );
                                    ?>
                                </td>
                                <td>
                                
                                    <input type="hidden" name="sfpmcf7_failure_popup_image_color" class="failure_hidden_img" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="sfpmcf7_failure_popup_background_option" value="gradient_color" <?php if($val == 'gradient_color'){echo "checked";}?>><?php echo __('Gradient Color','success-fail-popup-message-for-contact-form-7');?>
                                    </label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_failure_popup_gradient_color" value="">
                                </td>
                                <td>
                                    <input class="color-picker gra_box" name="sfpmcf7_failure_popup_gradient_color1" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?php echo __('Failure Popup Text Color','success-fail-popup-message-for-contact-form-7');?></label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_failure_popup_text_color" id="sfpmcf7_failure_popup_text_color" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?php echo __('Button background color','success-fail-popup-message-for-contact-form-7');?></label>
                                </td>
                                <td>
                                    <input class="color-picker" name="sfpmcf7_failure_popup_button_background_color" value="">
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label><?php echo __('Failure Button Text','success-fail-popup-message-for-contact-form-7');?></label>
                    </th>
                    <td>
                        <input type="text" name="sfpmcf7_failure_popup_button_text" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <?php 
}

// load admin css and js
add_action('admin_footer', 'SFPMCF7_wpcf7_admin_script' );
function SFPMCF7_wpcf7_admin_script() {
    ?>
    <style type="text/css">
        table.tbl_child td {
            padding: 0px 6px;
        }
        .form-table td {
            padding: 0px;
        }
    </style>
    <?php
}

// Upload background image for success popup
function SFPMCF7_image_uploader_field( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button
 
    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
 
        $image = '"><img src="' . esc_url($image_attributes[0]) . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';
 
    } 
 
    return '
    <div>
        <a href="#" class="misha_upload_image_button' . $image . '</a>
        <input type="hidden" name="' . esc_attr($name) . '" id="' . esc_attr($name) . '" value="' . esc_attr($value) . '" />
    </div>';
}

// Upload background image for failer popup
function SFPMCF7_image_uploader_field_failer( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button
 
    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
 
        $image = '"><img src="' . esc_url($image_attributes[0]) . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';
 
    } 
 
    return '
    <div>
        <a href="#" class="misha_upload_image_button_failer' . $image . '</a>
        <input type="hidden" name="' . esc_attr($name) . '" id="' . esc_attr($name) . '" value="' . esc_attr($value) . '" />
    </div>';
}


function SFPMCF7_wpcf7_after_save( $instance) { 

    $formid = $instance->id;

    if(!empty($_POST['sfpmcf7_enabled_popup_val'])) {
        $enabled_popup_id = $formid;
    }else{
        $enabled_popup_id = "";
    }
    update_post_meta( $formid, 'sfpmcf7_enabled_popup_val', $enabled_popup_id );

   

    $save_cf7_form = array(
        'sfpmcf7_popup_message' => sanitize_text_field($_POST['sfpmcf7_popup_message']),
        'sfpmcf7_m_popup_width' => sanitize_text_field($_POST['sfpmcf7_m_popup_width']),
        'sfpmcf7_m_popup_radius' => sanitize_text_field($_POST['sfpmcf7_m_popup_radius']),
        'sfpmcf7_m_popup_duration' => sanitize_text_field($_POST['sfpmcf7_m_popup_duration']),
        'sfpmcf7_popup_background_option' => sanitize_text_field($_POST['sfpmcf7_popup_background_option']),
        'sfpmcf7_popup_background_color' => sanitize_text_field($_POST['sfpmcf7_popup_background_color']),
        'sfpmcf7_popup_image_color' => sanitize_text_field($_POST['sfpmcf7_popup_image_color']),
        'sfpmcf7_popup_gradient_color' => sanitize_text_field($_POST['sfpmcf7_popup_gradient_color']),
        'sfpmcf7_popup_gradient_color1' => sanitize_text_field($_POST['sfpmcf7_popup_gradient_color1']),
        'sfpmcf7_popup_text_color' => sanitize_text_field($_POST['sfpmcf7_popup_text_color']),
        'sfpmcf7_popup_button_background_color' => sanitize_text_field($_POST['sfpmcf7_popup_button_background_color']),
        'sfpmcf7_popup_button_text' => sanitize_text_field($_POST['sfpmcf7_popup_button_text']),
        'sfpmcf7_failure_popup_gradient_color1' => sanitize_text_field($_POST['sfpmcf7_failure_popup_gradient_color1']),
    );

    foreach ($save_cf7_form as $key => $postvalue) {
        $postvalue = sanitize_text_field($postvalue);
        update_post_meta( $formid, $key, $postvalue );
    }
}
add_action( 'wpcf7_after_save', 'SFPMCF7_wpcf7_after_save' , 10, 1 ); 
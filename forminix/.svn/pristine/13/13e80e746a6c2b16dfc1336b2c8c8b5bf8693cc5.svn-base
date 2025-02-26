<?php



$form_id = isset($form_id) ? $form_id : 0;
$form_name = $this->base_client->settings->updateFormSettings($form_id, "form_name");
if($form_name == Null){
    return;
}

/* Form Scheduling & Restriction */
$is_form_allowed_to_show_by_schedule_and_restriction = $this->base_client->utils->is_form_allowed_to_show_by_schedule_and_restriction($form_id);
if(strlen(trim($is_form_allowed_to_show_by_schedule_and_restriction)) > 0){
    echo '<div class="forminix_form_hidden_by_schedule_and_restriction">'.str_replace("::avoid_empty_check::", "", $is_form_allowed_to_show_by_schedule_and_restriction).'</div>';
    return ;
}

/* Increase View Count */
$total_view = $this->base_client->settings->updateFormSettings($form_id, "total_views");
$total_view = ($total_view == Null) ? 0 : $total_view;
$this->base_client->settings->updateFormSettings($form_id, "total_views", ($total_view+1));

$form_fields = $this->base_client->settings->updateFormSettings($form_id, "form_fields");
if(empty($form_fields)){
   return;
}
$fields = json_decode($form_fields, false);
$unique_id = rand();


/* Conditional Logic */
$form_logics = $this->base_client->settings->updateFormSettings($form_id, "conditional_logic");
$form_logics = ($form_logics == Null) ? "[]" : $form_logics;
$form_logics_arr = json_decode($form_logics, false);
/* Conditional Logic */


/* Help Message Position */
$help_msg_position = $this->base_client->settings->updateFormSettings($form_id, "help_message_position");
$help_msg_position = ($help_msg_position == Null) ? "beside_label" : $help_msg_position;
/* Help Message Position */


/* Asterisk Position */
$asterisk_position = $this->base_client->settings->updateFormSettings($form_id, "asterisk_position");
$asterisk_position = ($asterisk_position == Null) ? "none" : $asterisk_position;
/* Asterisk Position */

?>
<div class="forminix_single_form" id="forminix_form_<?php echo esc_attr($unique_id);?>" data-form_id="<?php echo esc_attr($form_id);?>">
    <?php $this->field_output_generator($fields, $unique_id, $form_logics_arr, $help_msg_position, $asterisk_position); ?>
</div>




<?php
$settings = array();
/* Field Customization Settings */
$settings['bg_color'] = $this->base_client->settings->updateFormSettings($form_id, "bg_color");
$settings['bg_color'] = ($settings['bg_color'] == Null) ? "#F6F8FA" : $settings['bg_color'];

$settings['bg_color_focus'] = $this->base_client->settings->updateFormSettings($form_id, "bg_color_focus");
$settings['bg_color_focus'] = ($settings['bg_color_focus'] == Null) ? "#FFFFFF" : $settings['bg_color_focus'];

$settings['border_color'] = $this->base_client->settings->updateFormSettings($form_id, "border_color");
$settings['border_color'] = ($settings['border_color'] == Null) ? "#E4E4E6" : $settings['border_color'];

$settings['border_color_focus'] = $this->base_client->settings->updateFormSettings($form_id, "border_color_focus");
$settings['border_color_focus'] = ($settings['border_color_focus'] == Null) ? "#d9d9db" : $settings['border_color_focus'];

$settings['text_color'] = $this->base_client->settings->updateFormSettings($form_id, "text_color");
$settings['text_color'] = ($settings['text_color'] == Null) ? "#43454b" : $settings['text_color'];

$settings['text_color_focus'] = $this->base_client->settings->updateFormSettings($form_id, "text_color_focus");
$settings['text_color_focus'] = ($settings['text_color_focus'] == Null) ? "#43454b" : $settings['text_color_focus'];

$settings['radio_checked_bg_color'] = $this->base_client->settings->updateFormSettings($form_id, "radio_checked_bg_color");
$settings['radio_checked_bg_color'] = ($settings['radio_checked_bg_color'] == Null) ? "#787B83" : $settings['radio_checked_bg_color'];

$settings['label_color'] = $this->base_client->settings->updateFormSettings($form_id, "label_color");
$settings['label_color'] = ($settings['label_color'] == Null) ? "#2B2A2D" : $settings['label_color'];

$settings['padding_top_bottom'] = $this->base_client->settings->updateFormSettings($form_id, "padding_top_bottom");
$settings['padding_top_bottom'] = ($settings['padding_top_bottom'] == Null) ? "6" : $settings['padding_top_bottom'];

$settings['padding_left_right'] = $this->base_client->settings->updateFormSettings($form_id, "padding_left_right");
$settings['padding_left_right'] = ($settings['padding_left_right'] == Null) ? "12" : $settings['padding_left_right'];

$settings['text_size'] = $this->base_client->settings->updateFormSettings($form_id, "text_size");
$settings['text_size'] = ($settings['text_size'] == Null) ? "14" : $settings['text_size'];

$settings['label_text_size'] = $this->base_client->settings->updateFormSettings($form_id, "label_text_size");
$settings['label_text_size'] = ($settings['label_text_size'] == Null) ? "16" : $settings['label_text_size'];

$settings['help_msg_tooltip_bg_color'] = $this->base_client->settings->updateFormSettings($form_id, "help_msg_tooltip_bg_color");
$settings['help_msg_tooltip_bg_color'] = ($settings['help_msg_tooltip_bg_color'] == Null) ? "#2B2A2D" : $settings['help_msg_tooltip_bg_color'];

$settings['help_msg_tooltip_text_color'] = $this->base_client->settings->updateFormSettings($form_id, "help_msg_tooltip_text_color");
$settings['help_msg_tooltip_text_color'] = ($settings['help_msg_tooltip_text_color'] == Null) ? "#ffffff" : $settings['help_msg_tooltip_text_color'];

$settings['help_msg_text_color'] = $this->base_client->settings->updateFormSettings($form_id, "help_msg_text_color");
$settings['help_msg_text_color'] = ($settings['help_msg_text_color'] == Null) ? "#8a8a8a" : $settings['help_msg_text_color'];

$settings['help_msg_text_size'] = $this->base_client->settings->updateFormSettings($form_id, "help_msg_text_size");
$settings['help_msg_text_size'] = ($settings['help_msg_text_size'] == Null) ? "13" : $settings['help_msg_text_size'];

$settings['star_rating_default_bg_color'] = $this->base_client->settings->updateFormSettings($form_id, "star_rating_default_bg_color");
$settings['star_rating_default_bg_color'] = ($settings['star_rating_default_bg_color'] == Null) ? "#c8c8c8" : $settings['star_rating_default_bg_color'];

$settings['star_rating_checked_bg_color'] = $this->base_client->settings->updateFormSettings($form_id, "star_rating_checked_bg_color");
$settings['star_rating_checked_bg_color'] = ($settings['star_rating_checked_bg_color'] == Null) ? "#ffc107" : $settings['star_rating_checked_bg_color'];

$settings['range_slider_track_color'] = $this->base_client->settings->updateFormSettings($form_id, "range_slider_track_color");
$settings['range_slider_track_color'] = ($settings['range_slider_track_color'] == Null) ? "#dadae5" : $settings['range_slider_track_color'];

$settings['range_slider_thumb_color'] = $this->base_client->settings->updateFormSettings($form_id, "range_slider_thumb_color");
$settings['range_slider_thumb_color'] = ($settings['range_slider_thumb_color'] == Null) ? "#3264fe" : $settings['range_slider_thumb_color'];



?>

<style type="text/css">
    #forminix_form_<?php echo esc_attr($unique_id);?> {
        --forminix_field_bg_color: <?php echo esc_attr($settings['bg_color']);?>;
        --forminix_field_bg_color_focus: <?php echo esc_attr($settings['bg_color_focus']);?>;
        --forminix_field_border_color: <?php echo esc_attr($settings['border_color']);?>;
        --forminix_field_border_color_focus: <?php echo esc_attr($settings['border_color_focus']);?>;
        --forminix_field_text_color: <?php echo esc_attr($settings['text_color']);?>;
        --forminix_field_text_color_focus: <?php echo esc_attr($settings['text_color_focus']);?>;
        --forminix_field_radio_checked_bg_color: <?php echo esc_attr($settings['radio_checked_bg_color']);?>;
        --forminix_field_label_color: <?php echo esc_attr($settings['label_color']);?>;
        --forminix_field_padding_top_bottom: <?php echo esc_attr($settings['padding_top_bottom']);?>px;
        --forminix_field_padding_left_right: <?php echo esc_attr($settings['padding_left_right']);?>px;
        --forminix_field_text_size: <?php echo esc_attr($settings['text_size']);?>px;
        --forminix_field_label_text_size: <?php echo esc_attr($settings['label_text_size']);?>px;
        --forminix_field_help_msg_tooltip_bg_color: <?php echo esc_attr($settings['help_msg_tooltip_bg_color']);?>;
        --forminix_field_help_msg_tooltip_text_color: <?php echo esc_attr($settings['help_msg_tooltip_text_color']);?>;
        --forminix_field_help_msg_text_color: <?php echo esc_attr($settings['help_msg_text_color']);?>;
        --forminix_field_help_msg_text_size: <?php echo esc_attr($settings['help_msg_text_size']);?>px;
        --forminix_field_star_rating_default_bg_color: <?php echo esc_attr($settings['star_rating_default_bg_color']);?>;
        --forminix_field_star_rating_checked_bg_color: <?php echo esc_attr($settings['star_rating_checked_bg_color']);?>;
        --forminix_field_range_slider_bg_color: <?php echo esc_attr($settings['range_slider_track_color']);?>;
        --forminix_field_range_slider_selected_color: <?php echo esc_attr($settings['range_slider_thumb_color']);?>;
    }
</style>


<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        /* Conditional Logic */
        forminix_form_init_conditional_logic(`<?php echo esc_attr($unique_id);?>`, `<?php echo wp_json_encode($form_logics_arr);?>`);
        /* Conditional Logic */
    });

</script>
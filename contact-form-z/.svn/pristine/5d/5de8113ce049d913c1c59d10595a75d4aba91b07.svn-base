<?php

class ZCForm_Static{

    public static $static_style_count = 0;

    public static function zcform_admin_header_field_block($title = '', $manual_link = '', $bold_name = '', $rank = null, $edit = true, $hidden = false, $required = false, $size = 100){

        if(!is_null($rank)){
            $bold_name = empty($bold_name) ? $manual_link.' '.$rank : self::zcform_substr_title($bold_name);
        }
        ?>
        <div class="zcf_header_block zcf_title_show_hide" style="opacity:<?=($hidden ? '0.3' : '1')?>;">
            <div class="zcf_header_block_button">
                <button 
                    type="button"
                    class="zcf_show_hide_block" 
                    data-zcf-state-form="off"
                    title="<?=ZCFORM_EDITOR_BUTTOM_TITLE['edit']?>"
                    >
                    <span class="dashicons dashicons-edit"></span>
                </button>
                <?php if($edit):?>
                    <select class="zcf_size_field" name="<?=$manual_link?>_size_field[]" title="<?php esc_attr_e('Field width', 'contact-form-z');?>">
                        <option value="100" <?=($size == 100 ? 'selected' : '')?>>1/1</option>
                        <option value="75" <?=($size == 75 ? 'selected' : '')?>>3/4</option>
                        <option value="66" <?=($size == 66 ? 'selected' : '')?>>2/3</option>
                        <option value="50" <?=($size == 50 ? 'selected' : '')?>>1/2</option>
                        <option value="33" <?=($size == 33 ? 'selected' : '')?>>1/3</option>
                        <option value="25" <?=($size == 25 ? 'selected' : '')?>>1/4</option>
                        <option value="20" <?=($size == 20 ? 'selected' : '')?>>1/5</option>
                        <option value="16" <?=($size == 16 ? 'selected' : '')?>>1/6</option>
                    </select>
                    <button 
                        type="button"
                        class="zcf_block_field_hide" 
                        data-zcf-state="<?=($hidden ? 'on' : 'off')?>"
                        title="<?=($hidden ? ZCFORM_EDITOR_BUTTOM_TITLE['show'] : ZCFORM_EDITOR_BUTTOM_TITLE['hide'])?>"
                        >
                        <span class="dashicons dashicons-<?=($hidden ? 'visibility' : 'hidden')?>"></span>
                    </button>
                    <button 
                        type="button"
                        class="zcf_block_copy" 
                        title="<?=ZCFORM_EDITOR_BUTTOM_TITLE['copy']?>"
                        >
                        <span class="dashicons dashicons-admin-page"></span>
                    </button>
                    <button 
                        type="button"
                        class="zcf_block_move" 
                        data-zcf-block-move='up' 
                        title="<?=ZCFORM_EDITOR_BUTTOM_TITLE['up']?>"
                        >
                        <span class="dashicons dashicons-arrow-up-alt"></span>
                    </button>
                    <button 
                        type="button"
                        class="zcf_block_move" 
                        data-zcf-block-move='down' 
                        title="<?=ZCFORM_EDITOR_BUTTOM_TITLE['down']?>"
                        >
                        <span class="dashicons dashicons-arrow-down-alt"></span>
                    </button>
                    <button 
                        type="button"
                        class="zcf_block_remove" 
                        data-zcf-remove="<?=$manual_link?>"
                        title="<?=ZCFORM_EDITOR_BUTTOM_TITLE['delete']?>" 
                        >
                        <span class="dashicons dashicons-no"></span>
                    </button>
                <?php endif;?>
            </div>
            <div class="zcf_header_block_title">
                <span class="zcf_input_title"><?=$bold_name;?></span>&nbsp;<sup class="zcf_sup"><?=($required ? '*' : '&nbsp;')?></sup>
            </div>
            <div class="zcf_header_block_type">
                <i class="fa <?=$title['icon'];?> fa"></i> <?=ZCFORM_BASE_FIELDS_TITLE[$manual_link];?>
            </div>
        </div>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_admin_header_help_block($help_type = ''){
        $option_descr = [
            '' => [
                'descr' => esc_attr__('Form description', 'contact-form-z')
            ],
            'template' => [
                'descr' => esc_attr__('Select the fields to be included into the form and add them one by one. To remove a field, click the ‘X’ button. To rearrange the fields in the form, use ‘↑’ and ‘↓’ buttons. To edit the options of the added fields, click the ‘pencil’  button in the respective line.', 'contact-form-z')
            ],
            'style' => [
                'descr' => esc_attr__('Select basic colors of the form elements using the palette or a HEX code. Set height and width options for the fields.  If you need additional styling settings, you can use ‘ID’ and ‘Class’ parameters directly when editing fields in the Form tab. Requires HTML and CSS skills.', 'contact-form-z')
            ],
            'mail' => [
                'descr' => esc_attr__('All previously set Contact Form fields and their respective codes to insert into the template are indicated at the top of the section. Add the required codes to the email template by filling all fields of the email message template. You can also create additional email message templates with individual settings.', 'contact-form-z')
            ],
            'paste' => [
                'descr' => esc_attr__('To publish manually using a shortcode, select and copy the unique form shortcode from the Use a shortcode block. Open the page, post or widget to place the form and insert the shortcode where desired. For automatic publishing, use the second ‘Select Pages’ block.', 'contact-form-z')
            ],
            'message' => [
                'descr' => esc_attr__('If you need to change the text of the Contact Form notifications, find the relevant line and change the text in it. The new notification text will be active for this form only.', 'contact-form-z')
            ],
            'logic' => [
                'descr' => esc_attr__('You can set the conditional logic for filling fields and rules for redirection page setup (‘Thank you’ page).', 'contact-form-z')
            ],
            'options' => [
                'descr' => esc_attr__('You can adjust additional Contact Form settings on this page: setting of web service counters goals, reCAPTCHA options, etc.', 'contact-form-z')
            ],
            'recaptcha' => [
                'descr' => esc_attr__('reCAPTCHA is a free service used to protect you website against spam and misuse.', 'contact-form-z')
            ],
        ];
        ?>
        <table class="zcf_title_desct_help">
            <tr>
                <td><?php esc_attr_e($option_descr[$help_type]['descr'], 'contact-form-z');?></td>
                <td>
                    <a 
                        href="<?=ZCFORM_PLUGIN_URL.'#'.$help_type?>" 
                        class="button zcf_link_icon_help" 
                        target="_blank"
                        title="<?php esc_attr_e('Instruction', 'contact-form-z');?>"
                        >
                        <span class="dashicons dashicons-editor-help"></span>
                    </a>
                </td>
            </tr>
        </table>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_base_get_options(){

        ob_start();
        ?>
        <script type="text/javascript">
            var zcf_calendar_local = '<?=ZCFORM_PLUGIN_LOCALE?>';
            var zcf_file_title_list = {
              'title': '<?=esc_attr__('Select a file', 'contact-form-z');?>',
              'count_title': '<?=esc_attr__('file selected', 'contact-form-z');?>'
            };
            var zcf_message = {
              'ok': '<?=esc_attr__('Ok', 'contact-form-z');?>',
              'cancel': '<?=esc_attr__('Cancel', 'contact-form-z');?>',
              'success_title': '<?=esc_attr__('Done!', 'contact-form-z');?>',
              'confirm_title': '<?=esc_attr__('Attention!', 'contact-form-z');?>',
              'error_title': '<?=esc_attr__('Error!', 'contact-form-z');?>',
              'error': '<?=esc_attr__('Critical error. Try again later', 'contact-form-z');?>'
            };
            var zcf_admin_url = '<?=admin_url('admin.php');?>';
            var zcf_admin_ajax = '<?=admin_url('admin-ajax.php');?>';
            var zcf_is_mobile = '<?=wp_is_mobile();?>';

            var zcfMessageAlert;
            var zcfMessageSuccess;
            var zcfMessageConfirm;
            var CFileInput;
            var setDateTimeValue = function(dvalue, dtype){

              var zcf_tmz = 0;
              switch(dtype){
                case 'time':
                  dvalue = ((dvalue.getHours() * 60 * 60) + (dvalue.getMinutes() * 60));
                  break;
                case 'datetime':
                  zcf_tmz = dvalue.getTimezoneOffset() * 60000;
                  dvalue = dvalue.setSeconds(0, 0) - zcf_tmz;
                  break;
                default:
                  zcf_tmz = dvalue.getTimezoneOffset() * 60000;
                  dvalue = dvalue.setHours(0, 0, 0, 0) - zcf_tmz;
                  break;
              }

              return dvalue;

            };
        </script>
        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_admin_get_options(){

        ob_start();
        ?>
        <script type="text/javascript">
            var zcf_clone;
            var zcf_closest_block;
            var zcf_closest_table;
            var zcf_add_block_type;
            var zcf_rank;
            var zcf_rank_list;
            var zcf_clone_row;
            var zcf_length;
            var zcf_attr;
            var zcf_element;
            var zcf_action;
            var zcf_block;
            var zcf_block_index;
            var zcf_block_length;
            var zcf_num;
            var zcf_title;
            var zcf_readonly;
            var zcf_readonly_date;
            var zcf_readonly_time;
            var zcf_points;
            var zcf_points_title;
            var zcf_set_format_datetime = '';

            var zcf_field_list = {};
            var zcf_display = 'block';
            var zcf_calendar_param = {};
            var zcf_figure_svg = '<figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> ';
            var zcf_rgb = {'r': 62, 'g': 151, 'b': 235};
            var zcf_shadow_fields = true;
            var zcf_def_color = '#3e97eb';
            var zcf_def_color_border = '#ccc';
            var zcf_def_color_hover_button = '#0079ea';
            var zcf_def_color_text_button = '#fff';

            var zcf_default_date_format = '<?=empty(ZCFORM_DATE_FORMAT) ? 'Y-m-d' : ZCFORM_DATE_FORMAT?>';
            var zcf_default_time_format = '<?=empty(ZCFORM_TIME_FORMAT) ? 'H:i' : ZCFORM_TIME_FORMAT?>';
            var zcf_default_start_week = '<?=empty(ZCFORM_START_WEEK) ? 0 : ZCFORM_START_WEEK?>';

            var zcf_txt_under_block = {
              'min': '<?=esc_attr__('min', 'contact-form-z');?>',
              'max': '<?=esc_attr__('max', 'contact-form-z');?>',
              'size': '<?=esc_attr__('size', 'contact-form-z');?>',
              'format': '<?=esc_attr__('format', 'contact-form-z');?>'
            };


            var zcf_admin_message = {
              'field_off': '<?=esc_attr__('Show field', 'contact-form-z')?>',
              'field_on': '<?=esc_attr__('Hide field', 'contact-form-z')?>',
              'redirection_rules': '<?=esc_attr__('Add a checkbox, radio, dropdown or rating to the form', 'contact-form-z');?>',
              'fields_rules': '<?=esc_attr__('No fields added', 'contact-form-z');?>',
              'mail_remove': '<?=esc_attr__('Do you want to delete this letter template', 'contact-form-z')?>',
              'form_remove': '<?=esc_attr__('Are you sure you want to delete the form', 'contact-form-z')?>',
              'none': '<?=esc_attr__('Select an action', 'contact-form-z')?>',
              'delete_form': '<?=esc_attr__('Are you sure you want to delete the selected forms', 'contact-form-z')?>',
              'field_remove': '<?=esc_attr__('You want to delete this field', 'contact-form-z')?>',
              'rule_remove': '<?=esc_attr__('You want to delete this rule', 'contact-form-z')?>',
              'set_hide_field': '<?=esc_attr__('Do you want to hide this field? All rules of this field will be deleted.', 'contact-form-z')?>',
              'reset_conditions': '<?=esc_attr__('The field rules have been reset (see Logic -> Field Rules)', 'contact-form-z');?>',
              'template_title': '<?=esc_attr__('Select a Template', 'contact-form-z');?>',
              'template_ok': '<?=esc_attr__('Select form template', 'contact-form-z');?>',
              'point': '<?=esc_attr__('Point', 'contact-form-z');?>',
              'human': '<?=esc_attr__('Are you human', 'contact-form-z');?>'
            };

            var zcf_base_default_calendar_param = {
              lang: zcf_calendar_local,
              format: zcf_default_date_format,
              mask: false,
              timepicker: false,
              dayOfWeekStart: zcf_default_start_week
            };
            var zcf_base_calendar_param = {
              lang: zcf_calendar_local,
              mask: false,
              dayOfWeekStart: zcf_default_start_week
            };

            var checkFloat;
            var hexToRGB;
            var generatePreviewCalendar;
            var mailAndRedirectBlock;
            var rulesListOptions;
            var rulesMultipleOptions;
            var rulesMultipleOptionsOne;
            var rulesConditions;
            var rulesDatetime;
            var setRulesForPreview;
            var loadWindowTemplateField;
            var updatePointsList;
            var createRatingPreview;
            var setColorRatingParam;
            var styleColorRating;
            var styleColorRatingPseudo;
            var showHideMathCaptcha;
            var setMailBlockAlert;
        </script>
        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_admin_get_options_rank($rank_list){
        ?>
        <script type="text/javascript">
            zcf_field_list = {
        <?php foreach($rank_list as $key_rank => $value_rank):?>
                  '<?=$key_rank;?>': <?=$value_rank;?>,
        <?php endforeach;?>
            };
            var zcfRulesConditions = <?=json_encode(ZCFORM_SELECTOR['options']['condition'], JSON_UNESCAPED_UNICODE);?>;
            var zcf_rules_title = <?=json_encode(ZCFORM_RULES_TITLE, JSON_UNESCAPED_UNICODE);?>;
            var zcf_button_title = <?=json_encode(ZCFORM_EDITOR_BUTTOM_TITLE, JSON_UNESCAPED_UNICODE);?>;
            var zcf_template_fields_name = <?=json_encode(ZCFORM_TEMPLATE_FIELDS_NAME, JSON_UNESCAPED_UNICODE);?>;
            var zcf_base_fields_title = <?=json_encode(ZCFORM_BASE_FIELDS_TITLE, JSON_UNESCAPED_UNICODE);?>;
            var zcf_colors_style_param = <?=json_encode(ZCFORM_COLORS_STYLE, JSON_UNESCAPED_UNICODE);?>;
        </script>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_get_fields_style($style, $form_id = ''){

        list($r, $g, $b) = sscanf($style['color_focus'], "#%02x%02x%02x");
        list($r1, $g1, $b1) = sscanf($style['color_button'], "#%02x%02x%02x");
        list($r2, $g2, $b2) = sscanf($style['color_button_hover'], "#%02x%02x%02x");

        ob_start();
        ?>
        <?php if(0 !== 0):?>
            <style type="text/css">
        <?php endif;?>
            /* Field Style Start box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 0 0.2rem rgba(62, 151, 235, .4)*/ 
                                                                    
            .zcf_container_block .zcf_style_label<?=$form_id;?> {
                color: <?=(!empty($style['color_title']) ? $style['color_title'] : 'inherit')?>;
            }

            .zcf_container_block .zcf_style_field<?=$form_id;?> {
                width: <?=$style['width_value'].$style['width_unit']?>;
                height: <?=$style['height_value'].$style['height_unit']?>;
                border: 1px solid <?=$style['color_border']?>;
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
            }

            .zcf_container_block .zcf_style_field<?=$form_id?>:focus {
                border-color: <?=$style['color_focus']?> !important;
        <?=($style['shadow'] ? "box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 0 0.2rem rgba($r, $g, $b, .4)" : "")?>;
            }

            .zcf_container_block textarea.zcf_style_field<?=$form_id?>, 
            .zcf_container_block select[multiple].zcf_style_field<?=$form_id?> {
                height: <?=$style['height_textarea_value'].$style['height_textarea_unit']?>;
            }

            .zcf_container_block .zcf_style_button<?=$form_id?> {
                width: <?=$style['width_button_value'].$style['width_button_unit']?>;
                height: <?=$style['height_button_value'].$style['height_button_unit']?>;
                color: <?=$style['color_button_text']?>;
                background-color: <?=$style['color_button']?>;
                border: 1px solid <?=$style['color_button']?>;
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
            }

            .zcf_container_block .zcf_style_button<?=$form_id?>:hover {
                color: <?=$style['color_button_text']?> !important;
                background-color: <?=$style['color_button_hover']?> !important;
                border-color: <?=$style['color_button_hover']?> !important;
        <?=($style['shadow'] ? "box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 0 0.2rem rgba($r2, $g2, $b2, .4)" : "")?>;
            }                                                                                                                                                                                                                                                                                                              
            .zcf_style_button_alert<?=$form_id?> {
                color: <?=$style['color_button_text']?>;
                background-color: <?=$style['color_button']?>;
                border: 1px solid <?=$style['color_button']?>;
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
                text-transform: none;
                font-weight: normal;
            }

            .zcf_style_button_alert<?=$form_id?>:hover {
                color: <?=$style['color_button_text']?> !important;
                background-color: <?=$style['color_button_hover']?> !important;
                border-color: <?=$style['color_button_hover']?> !important;
            }                                                                                                                                                                                                                                                                                                                                                                                                                                          
            /* Field Style End*/

            /* FIle Input Style Start*/

            .zcf_container_block .zcf_input_file_box<?=$form_id?> {
                max-width: <?=$style['width_value'].$style['width_unit']?>;
                border: 1px solid <?=$style['color_border']?>;
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
            }

            .zcf_container_block .zcf_input_file<?=$form_id?> + label {
                color: <?=$style['color_border']?>;
            }

            .zcf_container_block .zcf_input_file<?=$form_id?>:focus + label,
            .zcf_container_block .zcf_input_file<?=$form_id?>.has-focus + label,
            .zcf_container_block .zcf_input_file<?=$form_id?> + label:hover {
                color: <?=$style['color_focus']?> !important;
            }

            .zcf_container_block .zcf_input_file<?=$form_id?> + label figure {
                background-color: <?=$style['color_border']?>;
            }

            .zcf_container_block .zcf_input_file<?=$form_id?>:focus + label figure,
            .zcf_container_block .zcf_input_file<?=$form_id?>.has-focus + label figure,
            .zcf_container_block .zcf_input_file<?=$form_id?> + label:hover figure {
                background-color: <?=$style['color_focus']?> !important;
            }

            /* FIle Input Style End*/

            /*Checkbox and Radio Style Start*/

            .zcf_container_block .zcf_checkmark<?=$form_id?>.zcf_checkmark_checkbox {
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
            }

            .zcf_container_block .zcf_list_container<?=$form_id?> input:checked ~ .zcf_checkmark<?=$form_id?> {
                background-color: <?=$style['color_checked']?>;
                border: 2px solid <?=$style['color_checked']?>;
            }

            /*Checkbox and Radio Style End*/                                                                                                                                                                                                                                                                                                                                                                                                
            .zcf_em_<?=$form_id?> {
                border-radius: <?=$style['border_fields_value'].$style['border_fields_unit']?>;
            }                                                                                                                                                                                                                                                                                                                                                                              
            .zcf_bubble .zcf_circle_color_<?=$form_id?> {
                background: <?=$style['color_button']?>;
                box-shadow: 0px 0px 8px rgba(<?=$r1?>, <?=$g1?>, <?=$b1?>, 0.5);
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        <?php if(0 !== 0):?>
            </style>
        <?php endif;?>


        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_get_style_rating($field, $form_id = ''){

        if(!isset($field['rating_color_points']))
            return;

        list($r, $g, $b) = sscanf($field['rating_color_points'], "#%02x%02x%02x");

        ob_start();
        ?>
        <style type="text/css">
        <?php
        switch($field['rating_type']){
            case 'stars':
                ?>
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a:before {
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                <?php
                break;
            case 'vertical':
            case 'movie':
            case 'horizontal':
                ?>
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a {
                        background-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, .4);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget .br-current-rating {
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-active,
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-selected {
                        background-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                <?php
                break;
            case 'square':
                ?>
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a {
                        border-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, .4);
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, .4);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget .br-current-rating {
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-active,
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-selected {
                        border-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                <?php
                break;
            case 'pill':
            case 'reversed':
                ?>
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a {
                        background-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, .4);
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget .br-current-rating {
                        color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                    }
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-active,
                    .zcf_form .zcf_container_block_rating_<?=$form_id;?> .br-theme-<?=$field['rating_type']?> .br-widget a.br-selected {
                        background-color: rgba(<?=$r?>, <?=$g?>, <?=$b?>, 1);
                        color: #FFF;
                    }
                <?php
                break;
        }
        ?>                                                                                                                                                                                                                                                                                                                                                                                                       
        </style>

        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_get_fields_script($data_list, $public = false, $form_generate_id = '', $options = [], $form_id = '', $page_type = ''){

        ob_start();
        $form_generate_id = !empty($form_generate_id) ? '_'.$form_generate_id : '';
        ?>
        <?php if(0 !== 0):?>
            <script type="text/javascript">
        <?php endif;?>

        <?php if(isset($options['analytic']) && !empty($options['analytic'])):?>
                document.addEventListener('zcf<?=$form_generate_id?>', function(zcf_event){
            <?=stripcslashes($options['analytic']);?>
                }, false);
        <?php endif;?>

            (function($){
              'use strict';
        <?php
        $datetime = $file = $rnum = 0;
        $rank_list = [];
        foreach($data_list as $data){

            $field_key = !is_null(key($data)) ? key($data) : '';

            $d = is_array($data[$field_key]) ? $data[$field_key] : [];
            $zcf_rnk = (isset($d[$field_key.'_rank']) ? $d[$field_key.'_rank'] : 0);
            $set_rules = (isset($d['rules']) && count($d['rules']) > 0);


            switch($field_key){
                case 'text':

                    if($d['text_mask'] && !empty($d['mask_template'])){
                        ?>

                              $('.zcf_container_field_text_<?=$zcf_rnk?>').mask(
                                  '<?=$d['mask_template']?>',
                                  {
                                    reverse: <?=(isset($d['mask_revers']) && $d['mask_revers'] ? 'true' : 'false')?>,
                                    clearIfNotMatch: <?=(isset($d['mask_clean']) && $d['mask_clean'] ? 'true' : 'false')?>,
                                    selectOnFocus: true,
                                    placeholder: '<?=$d['mask_template']?>'.replace(/[AS0]/g, "_")
                                  }
                              );
                        <?php
                    }

                    if(!empty($d['text_length_min']) || !empty($d['text_length_max']) || $set_rules):
                        ?>


                              $(".zcf_container_field_text_<?=$zcf_rnk?>").on('input.zcf', function(){

                                var zcf_val = $(this).val();
                        <?php if($public):?>

                            <?php if(!empty($d['text_length_max'])):?>

                                        var zcf_text_max0 = <?=$d['text_length_max']?>;
                                <?php if($d['text_field_type'] === 'number'):?>

                                            zcf_val = ($(this).val() > <?=$d['text_length_max']?> ? <?=$d['text_length_max']?> : $(this).val());
                                <?php else:?>

                                            zcf_val = zcf_val.substr(0, <?=$d['text_length_max']?>);
                                            zcf_text_max0 = (<?=$d['text_length_max']?> - $(this).val().length) < 0 ? 0 : (<?=$d['text_length_max']?> - $(this).val().length);
                                <?php endif;?>

                                        $(this).val(zcf_val);
                                        $('.zcf_limit_span_max_text_<?=$zcf_rnk?>').text(zcf_text_max0);
                            <?php endif;?>

                            <?php if(!empty($d['text_length_min'])):?>

                                        var zcf_text_min0 = <?=$d['text_length_min']?>;
                                <?php if($d['text_field_type'] === 'number'):?>

                                            zcf_val = ($(this).val() < <?=$d['text_length_min']?> ? <?=$d['text_length_min']?> : $(this).val());
                                <?php else:?>

                                            zcf_text_min0 = (<?=$d['text_length_min']?> + ' (' + ($(this).val().length > <?=$d['text_length_min']?> ? <?=$d['text_length_min']?> : ($(this).val().length)) + ')');
                                <?php endif;?>

                                        $(this).val(zcf_val);
                                        $('.zcf_limit_span_min_text_<?=$zcf_rnk?>').text(zcf_text_min0);
                            <?php endif;?>

                        <?php endif;?>
                        <?php
                        if($set_rules):
                            $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                            $rank_list[$rnum]['action'] = "input";
                            ?>
                            <?=self::zcform_generate_rules($d, $form_generate_id);?>

                        <?php endif;?>
                              });
                        <?php
                    endif;

                    break;
                case 'datetime':
                    $datetime++;
                    ?>
                    <?php if(!$public):?>
                              switch('<?=$d['datetime_field_type']?>'){
                                case 'time':
                                  zcf_set_format_datetime = zcf_default_time_format;
                                  break;
                                case 'datetime':
                                  zcf_set_format_datetime = zcf_default_date_format + ' ' + zcf_default_time_format;
                                  break;
                                default:
                                  zcf_set_format_datetime = zcf_default_date_format;
                                  break;
                              }

                              $('.zcf_calendar_rank_<?=$zcf_rnk?>').datetimepicker({
                                format: zcf_set_format_datetime,
                                lang: zcf_calendar_local,
                                mask: false,
                                datepicker: <?=(isset($d['datetime_field_type']) && $d['datetime_field_type'] != 'time' ? 'true' : 'false')?>,
                                timepicker: <?=(isset($d['datetime_field_type']) && $d['datetime_field_type'] != 'date' ? 'true' : 'false')?>,
                                step: <?=(isset($d['datetime_minutes_step']) ? $d['datetime_minutes_step'] : 5)?>,
                                dayOfWeekStart: zcf_default_start_week
                              });
                    <?php endif;?>

                          $('.zcf_container_field_datetime_<?=$zcf_rnk?>').datetimepicker(<?=self::zcform_generate_preview_calendar($d);?>);
                    <?php
                    if($set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>

                              $('.zcf_container_field_datetime_<?=$zcf_rnk?>').off('blur');
                              $('.zcf_container_field_datetime_<?=$zcf_rnk?>').on('change.zcf', function(){

                                var zcf_val = ($(this).val() == '' || $(this).val() === null ? null : setDateTimeValue($(this).datetimepicker('getValue'), '<?=$d['datetime_field_type']?>'));
                        <?=self::zcform_generate_rules($d, $form_generate_id);?>

                              });
                        <?php
                    endif;

                    break;
                case 'textarea':

                    if(!empty($d['textarea_length_min']) || !empty($d['textarea_length_max']) || $set_rules):
                        ?>

                              $(".zcf_container_field_textarea_<?=$zcf_rnk?>").on('input.zcf', function(){

                                var zcf_val = $(this).val();
                        <?php if($public):?>
                            <?php if(!empty($d['textarea_length_max'])):?>
                                        $(this).val($(this).val().substr(0, <?=$d['textarea_length_max']?>));
                                        $('.zcf_limit_span_max_textarea_<?=$zcf_rnk?>').text((<?=$d['textarea_length_max']?> - $(this).val().length) < 0 ? 0 : (<?=$d['textarea_length_max']?> - $(this).val().length));
                            <?php endif;?>

                            <?php if(!empty($d['textarea_length_min'])):?>
                                        $('.zcf_limit_span_min_textarea_<?=$zcf_rnk?>').text(<?=$d['textarea_length_min']?> + ' (' + ($(this).val().length > <?=$d['textarea_length_min']?> ? <?=$d['textarea_length_min']?> : ($(this).val().length)) + ')');
                            <?php endif;?>
                        <?php endif;?>

                        <?php
                        if($set_rules):
                            $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                            $rank_list[$rnum]['action'] = "input";
                            ?>
                            <?=self::zcform_generate_rules($d, $form_generate_id);?>
                        <?php endif;?>

                              });
                        <?php
                    endif;
                    break;
                case 'select':

                    if(!$public && !$d['select_multi']):
                        ?>

                              var zcf_l_check = $('.zcf_field_template_select_<?=$zcf_rnk?>').find('.zcf_body_row').find('.zcf_list_check:checked');
                              if(zcf_l_check.length > 0){
                                $('.zcf_field_template_select_<?=$zcf_rnk?>').find('.zcf_list_check').not(zcf_l_check).attr('disabled', true);
                              }

                        <?php
                    endif;

                    if(($d['select_multi'] && $d['select_max_count_check'] > 0) || $set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>
                              $('.zcf_container_field_select_<?=$zcf_rnk?>').on('change.zcf', function(){

                        <?php if($d['select_multi'] && $d['select_max_count_check'] > 0):?>
                                    if($(this).find('option:selected').length > <?=$d['select_max_count_check']?>){
                                      $(this).find('option').prop('selected', false);
                                    }
                                    if($(this).find('option:selected').length == <?=$d['select_max_count_check']?>){
                                      $(this).find('option').not(':selected').attr('disabled', true);
                                    }else{
                                      $(this).find('option').not(':selected').attr('disabled', false);
                                    }
                        <?php endif;?>

                        <?php
                        if($set_rules):

                            if($d['select_multi']):
                                ?>
                                        var zcf_val = $.map($(this).closest('.zcf_container_block').find('.zcf_container_field_select_<?=$zcf_rnk?> option:selected'), function(e){
                                          return e.value;
                                        });
                            <?php else:?>
                                        var zcf_val = $(this).val();
                            <?php endif;?>

                            <?=self::zcform_generate_rules($d, $form_generate_id);?>



                        <?php endif;?>
                              });
                        <?php
                    endif;

                    break;
                case 'checkbox':

                    if($d['checkbox_max_count_check'] > 0 || $set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>
                              $('.zcf_container_field_checkbox_<?=$zcf_rnk?>').on('change.zcf', function(){

                        <?php if($d['checkbox_max_count_check'] > 0):?>
                                    if($(this).closest('.zcf_container_block_checkbox_<?=$zcf_rnk?>').find('input:checked').length == <?=$d['checkbox_max_count_check']?>){
                                      $(this).closest('.zcf_container_block_checkbox_<?=$zcf_rnk?>').find('input').not(':checked').attr('disabled', true);
                                    }else{
                                      $(this).closest('.zcf_container_block_checkbox_<?=$zcf_rnk?>').find('input').not(':checked').attr('disabled', false);
                                    }
                        <?php endif;?>

                        <?php if($set_rules):?>
                                    var zcf_val = $.map($(this).closest('.zcf_container_block').find('.zcf_container_field_checkbox_<?=$zcf_rnk?>:checked'), function(e){
                                      return e.value;
                                    });
                            <?=self::zcform_generate_rules($d, $form_generate_id);?>

                        <?php endif;?>
                              });
                        <?php
                    endif;

                    break;
                case 'radio':

                    if($set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>

                              $('.zcf_container_field_radio_<?=$zcf_rnk?>').on('change.zcf', function(){

                                var zcf_val = $.map($(this).closest('.zcf_container_block').find('.zcf_container_field_radio_<?=$zcf_rnk?>:checked'), function(e){
                                  return e.value;
                                });
                        <?=self::zcform_generate_rules($d, $form_generate_id);?>

                              });
                        <?php
                    endif;

                    break;
                case 'accept':

                    if($d['accept_type'] == 2){
                        ?>

                              $('.zcf_label_accept_<?=$zcf_rnk?>').on('click.zcf', function(){
                                $(this).closest('.zcf_list_container').siblings('div.zcf_accept_text_block').toggle();
                              });
                        <?php
                    }

                    if($set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>

                              $('.zcf_container_field_accept_<?=$zcf_rnk?>').on('change.zcf', function(){

                                var zcf_val = $(this).prop('checked');
                        <?=self::zcform_generate_rules($d, $form_generate_id);?>

                              });
                        <?php
                    endif;

                    break;
                case 'file':

                    if($set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>

                              $('.zcf_container_field_file_<?=$zcf_rnk?>').on('change.zcf', function(){

                                var zcf_val = ($(this).val() !== '');
                        <?=self::zcform_generate_rules($d, $form_generate_id);?>

                              });
                        <?php
                    endif;


                    $file++;
                    ?>

                    <?php
                    break;
                case 'rating':
                    ?>

                          $('.zcf_container_field_rating_<?=$zcf_rnk?>').barrating('show', {
                            theme: '<?=$d['rating_type']?>',
                            allowEmpty: true,
                            deselectable: true,
                            reverse: <?=($d['rating_reverse'] ? 'true' : 'false')?>,
                            showValues: <?=(in_array($d['rating_type'], ['square', 'pill']) ? 'true' : 'false')?>,
                            showSelectedRating: <?=(in_array($d['rating_type'], ['stars', 'square', 'pill']) ? 'false' : 'true')?>
                          });
                    <?php if(!$public):?>
                              $(document).ready(function(){
                                $('.zcf_field_template_rating_<?=$zcf_rnk?>').find('.zcf_rating_color_points').wpColorPicker({
                                  defaultColor: '<?=$d['rating_color_points']?>',
                                  hide: true,
                                  palettes: false,
                                  change: function(event, ui){

                                    styleColorRating($(this).closest('.zcf_block'), hexToRGB(ui.color.toString()));
                                  },
                                  clear: function(){

                                    styleColorRating($(this).closest('.zcf_block'), {'r': 62, 'g': 151, 'b': 235});
                                  }
                                });
                              });
                    <?php endif;?>

                    <?php
                    if($set_rules):
                        $rank_list[$rnum]['field'] = "{$field_key}_{$zcf_rnk}";
                        $rank_list[$rnum]['action'] = "change";
                        ?>

                              $('.zcf_container_field_rating_<?=$zcf_rnk?>').on('change.zcf', function(){

                                var zcf_val = $(this).val();
                        <?=self::zcform_generate_rules($d, $form_generate_id);?>

                              });
                        <?php
                    endif;

                    break;
                case 'button':
                    ?>

                    <?php
                    break;
            }
            $rnum++;
        }

        if($datetime > 0){
            ?>
            <?php if(!$public):?>
                      $('.zcf_container .zcf_set_calendar_date').datetimepicker(zcf_base_default_calendar_param);
                      $('.zcf_container .zcf_set_calendar_time').datetimepicker({
                        lang: zcf_calendar_local,
                        format: zcf_default_time_format,
                        mask: false,
                        step: 5,
                        datepicker: false
                      });
                <?php
            endif;
        }

        if($file > 0){
            ?>

                  CFileInput();
            <?php
        }
        ?>

              $(document).ready(function(){

        <?php if(!$public):?>
                    setMailBlockAlert();
        <?php endif;?>

        <?php if($page_type === 'add_form'):?>
                    loadWindowTemplateField();
        <?php endif;?>

        <?php foreach($rank_list as $t):?>

                    $('.zcf_container_field_<?=$t['field']?>').trigger('<?=$t['action']?>.zcf');
        <?php endforeach;?>

                $('#zcf_form_<?=$form_id?><?=$form_generate_id?>').next('.zcf_bubbles').css('display', 'none');
                $('#zcf_form_<?=$form_id?><?=$form_generate_id?>').css('display', 'block');
              });
            })(jQuery);
        <?php if(0 !== 0):?>
            </script>
        <?php endif;?>


        <?php
        return ob_get_clean();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_admin_preload(){
        ?>

        <div class="zcf_ajax_loader">
            <div class="zcf_ajax_loader_img"></div>
        </div>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_public_preload($circle = 10, $form_id = ''){

        $circle = min([$circle, 10]);
        ?>

        <div class="zcf_bubbles">
            <?php for($i = 0; $i < $circle; $i++):?>
                <div class="zcf_bubble">
                    <div class="zcf_circle zcf_circle_color_<?=$form_id?>"></div>
                </div>
            <?php endfor;?>
        </div>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_rules_blocks($content){

        if(isset($content['options']['rules'])):

            $rnum = 1;
            foreach($content['options']['rules'] as $rules_key => $rules):
                $if_field = explode('_', $rules['rules_if'])[0];
                ?>
                <div class="zcf_rules_block_list zcf_rbl_<?=$rules_key?>" data-zcf-num="<?=$rules_key?>">
                    <input class="zcf_rules_field_type" type="hidden" value="<?=$rules['rules_if_field_type']?>" name="rules_if_field_type[<?=$rules_key?>]">
                    <table class="zcf_rules_title_table">
                        <tr>
                            <td>
                                <b><?=ZCFORM_RULES_TITLE['rule_title'];?> # <?=$rnum++;?></b>
                            </td>
                            <td>
                                <button type="button" class="button zcf_show_hide_block" data-zcf-state-form="off">
                                    <span class="dashicons dashicons dashicons-edit"></span>
                                </button>
                                <button type="button" class="button zcf_rules_remove_row">
                                    <span class="dashicons dashicons-no"></span>
                                </button>
                            </td>
                        </tr>
                    </table>
                    <table class="zcf_rules_table" style="display: none;">
                        <tr>
                            <td><?=ZCFORM_RULES_TITLE['if'];?></td>
                            <td>
                                <select class="zcf_rules_if_field zcf_rules_field_title" name="rules_if[<?=$rules_key?>]">
                                    <option value=""><?=ZCFORM_RULES_TITLE['select_field'];?></option>
                                    <?php foreach(ZCFORM_FIELDS_NAME as $field_key => $field):?>
                                        <option value="<?=$field_key;?>" <?=($field_key === $rules['rules_if'] ? 'selected' : '')?>><?=$field;?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td class="zcf_rules_if_condition_block"><?=self::zcform_rules_if_condition($if_field, $rules_key, $rules);?></td>
                            <td class="zcf_rules_if_action"><?=self::zcform_rules_if_action($if_field, $rules_key, $rules);?></td>
                        </tr>
                        <tr>
                            <td><?=ZCFORM_RULES_TITLE['then'];?></td>
                            <td>
                                <select class="zcf_rules_then" name="rules_action[<?=$rules_key?>]">
                                    <option value="show" data-zcf-attr="<?=ZCFORM_RULES_TITLE['hide'];?>" <?=($rules['rules_action'] === 'show' ? 'selected' : '')?>>
                                        <?=ZCFORM_RULES_TITLE['show'];?>
                                    </option>
                                    <option value="hide" data-zcf-attr="<?=ZCFORM_RULES_TITLE['show'];?>" <?=($rules['rules_action'] === 'hide' ? 'selected' : '')?>>
                                        <?=ZCFORM_RULES_TITLE['hide'];?>
                                    </option>
                                </select>
                            </td>
                            <td></td>
                            <td>
                                <div>
                                    <select class="zcf_rules_then_field zcf_rules_field_title" name="rules_then[<?=$rules_key?>]">
                                        <option value=""><?=ZCFORM_RULES_TITLE['select_field'];?></option>
                                        <?php foreach(ZCFORM_FIELDS_NAME as $field_key => $field):?>
                                            <option value="<?=$field_key;?>" <?=($field_key === $rules['rules_then'] ? 'selected' : '')?>><?=$field;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="zcf_rules_then_action"><?=self::zcform_rules_then_action($rules_key, $rules);?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><?=ZCFORM_RULES_TITLE['else'];?></td>
                            <td class="zcf_rules_else_title" colspan="3"><?=self::zcform_rules_else_action($rules);?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach;?>

            <?php
        endif;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_rules_if_condition($field, $rule_rank, $rule){

        if(!in_array($field, ['text', 'textarea', 'datetime'])){
            ?>
            <select class='zcf_rules_if_condition' name='rules_if_condition[<?=$rule_rank?>]'>
                <?php foreach(ZCFORM_SELECTOR['options']['condition'][$field] as $key => $value):?>
                    <option value='<?=$key?>' <?=$key === $rule['rules_if_condition'] ? 'selected' : ''?>><?=$value?></option>
                <?php endforeach;?>
            </select>
            <?php
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_rules_if_action($field, $rule_rank, $rule){

        switch($field){
            case 'text':
            case 'textarea':
            case 'datetime':
                $type = ($rule['rules_if_field_type'] === 'number' ? 'number' : $field);
                $num = 0;
                ?>

                <table class="zcf_rules_table_options zcf_rules_table_options_<?=$rule['rules_if']?>">
                    <?php foreach($rule['rules_if_condition'] as $rkey => $rvalue):?>
                        <tr>
                            <td class="zcf_rules_if_condition_block_list">
                                <select class="zcf_rules_if_condition_list " name="rules_if_condition[<?=$rule_rank?>][]">
                                    <?php foreach(ZCFORM_SELECTOR['options']['condition'][$type] as $key => $value):?>
                                        <option value='<?=$key?>' <?=$key === $rvalue ? 'selected' : ''?>><?=$value?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <input class="zcf_rules_point zcf_rules_if_<?=$rule['rules_if']?>" type="<?=$rule['rules_if_field_type']?>" name="rules_if_options[<?=$rule_rank?>][]" value="<?=$rule['rules_if_options'][$rkey]?>">
                            </td>
                            <td>
                                <?php if($num++ === 0):?>
                                    <button type="button" class="button zcf_rules_add_options" data-zcf-attr="<?=$rule['rules_if']?>">
                                        <span class="dashicons dashicons-plus"></span>
                                    </button>
                                <?php else:?>
                                    <button class="button zcf_list_remove_row">
                                        <span class="dashicons dashicons-minus"></span>
                                    </button>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <?php if($field === 'datetime'):?>
                    <script type="text/javascript">
                        (function($){
                          'use strict';
                          $(document).ready(function(){
                            rulesDatetime($('.zcf_rbl_<?=$rule_rank?>'), $('.zcf_field_template_<?=$rule['rules_if']?>').find('.zcf_datetime_type').val());
                    						  });
                    						})(jQuery);</script>
                    <?php
                endif;
                break;

            case 'select':
            case 'checkbox':
            case 'radio':
            case 'rating':

                if($rule['rules_if_multi']):
                    ?>
                    <input type="hidden" name="rules_if_multi[<?=$rule_rank?>]">
                    <div class="zcf_rules_if_block_<?=$rule['rules_if']?>">
                        <label class="zcf_label zcf_rules_all_title_checked">
                            <label><?=ZCFORM_RULES_TITLE['all'];?></label>
                            <input class="zcf_rules_all_checked" type="checkbox" name="rules_if_all_options[<?=$rule_rank?>]" <?=$rule['rules_if_all_options'] ? 'checked' : ''?>>
                            <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                        </label>
                        <?php foreach(ZCFORM_FIELDS_LIST[$rule['rules_if']] as $key => $value):?>
                            <label class="zcf_label">
                                <label class="zcf_rules_options_<?=$key?>"><?=$value?></label>
                                <input class="zcf_rules_point zcf_rules_checked" type="checkbox" name="rules_if_options[<?=$rule_rank?>][]" value="<?=$key?>" <?=in_array($key, $rule['rules_if_options']) ? 'checked' : ''?>>
                                <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                            </label>
                        <?php endforeach;?>
                    </div>

                <?php else:?>

                    <select class='zcf_rules_point zcf_rules_if_<?=$rule['rules_if']?>' name='rules_if_options[<?=$rule_rank?>]'>
                        <?php foreach(ZCFORM_FIELDS_LIST[$rule['rules_if']] as $key => $value):?>
                            <option value='<?=$key?>' <?=$key === $rule['rules_if_options'] ? 'selected' : ''?>><?=$value?></option>
                        <?php endforeach;?>
                    </select>

                <?php
                endif;
                break;

            case 'file':
            case 'accept':
                ?>
                <select class="zcf_rules_point" name="rules_if_options[<?=$rule_rank?>]">
                    <option value="true" <?=$rule['rules_if_options'] == 'true' ? 'selected' : ''?>><?=ZCFORM_RULES_TITLE['selected'];?></option>
                    <option value="false" <?=$rule['rules_if_options'] == 'false' ? 'selected' : ''?>><?=ZCFORM_RULES_TITLE['not_selected'];?></option>
                </select>
                <?php
                break;
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_rules_then_action($rule_rank, $rule){

        if($rule['rules_then_multi']){
            ?>
            <input type="hidden" name="rules_then_multi[<?=$rule_rank?>]">
            <div class="zcf_rules_then_block_<?=$rule['rules_then']?>">
                <label class="zcf_label zcf_rules_all_title_checked">
                    <label><?=ZCFORM_RULES_TITLE['all'];?></label>
                    <input class="zcf_rules_all_checked" type="checkbox" name="rules_then_all_options[<?=$rule_rank?>]" <?=$rule['rules_then_all_options'] ? 'checked' : ''?>>
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>
                <?php foreach(ZCFORM_FIELDS_LIST[$rule['rules_then']] as $key => $value):?>
                    <label class="zcf_label">
                        <label class="zcf_rules_options_<?=$key?>"><?=$value?></label>
                        <input class="zcf_rules_point zcf_rules_checked" type="checkbox" name="rules_then_options[<?=$rule_rank?>][]" value="<?=$key?>" <?=in_array($key, $rule['rules_then_options']) ? 'checked' : ''?>>
                        <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                    </label>
                <?php endforeach;?>
            </div>
            <?php
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_rules_else_action($rule){

        $f_title = ZCFORM_RULES_TITLE['field'];
        if($rule['rules_then_multi']){
            $f_title = ZCFORM_RULES_TITLE['field_values'];
        }

        switch($rule['rules_action']){
            case 'show':
                $a_title = ZCFORM_RULES_TITLE['hide'];
                break;
            case 'hide':
                $a_title = ZCFORM_RULES_TITLE['show'];
                break;
        }
        ?>

        <b><?=$a_title?></b> <?=$f_title?> <b><?=ZCFORM_FIELDS_NAME[$rule['rules_then']]?></b>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_generate_rules($d = [], $generate_id = ''){


        $action = ['show' => 'removeClass', 'hide' => 'addClass'];
        $no_action = ['show' => 'addClass', 'hide' => 'removeClass'];
        $disabled = ['show' => 'false', 'hide' => 'true'];
        $no_disabled = ['show' => 'true', 'hide' => 'false'];

        foreach($d['rules'] as $r){

            $then = explode('_', $r['then'])[0];

            switch($then){
                case 'text':
                case 'textarea':
                case 'datetime':
                case 'file':
                case 'accept':
                case 'rating':

                    echo"if({$r['if']}){";
                    echo"$('.zcf_container_block_{$r['then']}{$generate_id}').{$action[$r['action']]}('zcf_hider_rules');";
                    echo"}else{";
                    echo"$('.zcf_container_block_{$r['then']}{$generate_id}').{$no_action[$r['action']]}('zcf_hider_rules');";
                    echo"}";

                    break;
                case 'select':
                case 'checkbox':
                case 'radio':

                    if(count($r['then_list']) > 0){
                        $points = [];
                        foreach($r['then_list'] as $p){
                            $points[] = ".zcf_container_list_label_{$r['then']}{$generate_id}_".$p;
                        }

                        echo"if({$r['if']}){";
                        echo"$('".(implode(',', $points))."').{$action[$r['action']]}('zcf_hider_rules').prop('disabled', {$disabled[$r['action']]});";
                        echo"}else{";
                        echo"$('".(implode(',', $points))."').{$no_action[$r['action']]}('zcf_hider_rules').prop('disabled', {$no_disabled[$r['action']]});";
                        echo"}";
                    }

                    echo"var l_list = $('.zcf_container_block_{$r['then']}{$generate_id}').find('input, option:not([value=\"\"])').length;";
                    echo"if($('.zcf_container_block_{$r['then']}{$generate_id}').find('.zcf_hider_rules').length >= l_list){";
                    echo"$('.zcf_container_block_{$r['then']}{$generate_id}').addClass('zcf_hider_rules');";
                    echo"}else{";
                    echo"$('.zcf_container_block_{$r['then']}{$generate_id}').removeClass('zcf_hider_rules');";
                    echo"}";

                    if($then === 'select'){
                        echo"if($('.zcf_container_field_{$r['then']}{$generate_id} option:selected').prop('disabled')){";
                        echo"$('.zcf_container_field_{$r['then']}{$generate_id} option').not('[disabled]').eq(0).prop('selected', true);";
                        echo"}";
                    }
                    break;
            }
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_get_settings($value = ''){

        $settings = get_option('zcform_settings');

        if(empty($value)){
            $settings = $settings !== false ? $settings : [];
        }else{
            $settings = isset($settings[$value]) && $settings !== false ? $settings[$value] : [];
        }

        return $settings;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_update_settings($param, $value){

        $settings = get_option('zcform_settings');
        $settings = ($settings === false ? [] : (array)$settings);
        $settings = array_merge($settings, [$param => $value]);
        return update_option('zcform_settings', $settings);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_hide_secret_key($secret_key){

        $length = strlen($secret_key);

        if($length > 9){
            $length_hide = 4;
        }elseif($length > 3){
            $length_hide = 2;
        }else{
            $length_hide = $length;
        }

        $secret_key = substr($secret_key, 0 - $length_hide);
        $secret_key = str_pad($secret_key, $length, '*', STR_PAD_LEFT);

        return $secret_key;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_generate_preview_calendar($d){

        $zcf_preview_calendar_option = [
            'lang' => (isset($d['datetime_language']) && !empty($d['datetime_language']) ? $d['datetime_language'] : ZCFORM_PLUGIN_LOCALE),
            'mask' => false
        ];

        // Set Type
        $zcf_true = $d['datetime_format'] === '2';

        switch($d['datetime_field_type']){
            case 'date':

                $zcf_preview_calendar_option['format'] = ($zcf_true ? $d['date_format'] : ZCFORM_DATE_FORMAT);
                $zcf_preview_calendar_option['datepicker'] = true;
                $zcf_preview_calendar_option['timepicker'] = false;

                break;
            case 'time':

                $zcf_preview_calendar_option['format'] = ($zcf_true ? $d['time_format'] : ZCFORM_TIME_FORMAT);
                $zcf_preview_calendar_option['datepicker'] = false;
                $zcf_preview_calendar_option['timepicker'] = true;

                break;
            case 'datetime':

                $zcf_preview_calendar_option['format'] = ($zcf_true ? $d['date_format'] : ZCFORM_DATE_FORMAT).' '.($zcf_true ? $d['time_format'] : ZCFORM_TIME_FORMAT);
                $zcf_preview_calendar_option['datepicker'] = true;
                $zcf_preview_calendar_option['timepicker'] = true;

                break;
        }

        // Set Week Start
        $zcf_preview_calendar_option['dayOfWeekStart'] = ($d['datetime_start_day'] === '' ? ZCFORM_START_WEEK : $d['datetime_start_day']);

        // Set Step Minutes
        $zcf_preview_calendar_option['step'] = (!empty($d['datetime_minutes_step']) ? $d['datetime_minutes_step'] : 5);

        // Set Default Value
        switch($d['datetime_default']){
            case '1':

                if(empty($d['datetime_default_value']))
                    break;

                $zcf_preview_calendar_option['value'] = date($zcf_preview_calendar_option['format'], strtotime($d['datetime_default_value']));
                $zcf_preview_calendar_option['defaultDate'] = strtotime($d['datetime_default_value']) * 1000;
                $zcf_preview_calendar_option['defaultTime'] = $zcf_preview_calendar_option['defaultDate'];

                break;
            case '2':

                $zcf_preview_calendar_option['value'] = (time() * 1000);

                break;
            case '3':

                $zcf_interval_days = (empty($d['datetime_days']) ? 0 : $d['datetime_days'] * 86400000);
                $zcf_interval_minutes = (empty($d['datetime_minutes']) ? 0 : $d['datetime_minutes'] * 60000);
                $zcf_interval_result = (time() * 1000) + $zcf_interval_days + $zcf_interval_minutes;

                $zcf_preview_calendar_option['value'] = $zcf_interval_result;
                $zcf_preview_calendar_option['defaultDate'] = $zcf_interval_result;
                $zcf_preview_calendar_option['defaultTime'] = $zcf_interval_result;

                break;
        }

        // Set Min Limit
        switch($d['date_min_limit']){
            case '1':

                if(!empty($d['date_min_value'])){
                    $zcf_preview_calendar_option['minDate'] = strtotime($d['date_min_value']) * 1000;
                }

                if(!empty($d['time_min_value'])){
                    $zcf_preview_calendar_option['minTime'] = strtotime($d['time_min_value']) * 1000;
                }

                break;
            case '2':

                $zcf_preview_calendar_option['minDate'] = (time() * 1000);
                $zcf_preview_calendar_option['minTime'] = (time() * 1000);

                break;
            case '3':

                $zcf_interval_days = (empty($d['datetime_min_days']) ? 0 : $d['datetime_min_days'] * 86400000);
                $zcf_interval_minutes = (empty($d['datetime_min_minutes']) ? 0 : $d['datetime_min_minutes'] * 60000);

                $zcf_preview_calendar_option['minDate'] = (time() * 1000) + $zcf_interval_days;
                $zcf_preview_calendar_option['minTime'] = (time() * 1000) + $zcf_interval_minutes;

                break;
        }

        // Set Max Limit
        switch($d['date_max_limit']){
            case '1':

                if(!empty($d['date_max_value'])){
                    $zcf_preview_calendar_option['maxDate'] = strtotime($d['date_max_value']) * 1000;
                }

                if(!empty($d['time_max_value'])){
                    $zcf_preview_calendar_option['maxTime'] = strtotime($d['time_max_value']) * 1000;
                }

                break;
            case '2':

                $zcf_preview_calendar_option['maxDate'] = (time() * 1000);
                $zcf_preview_calendar_option['maxTime'] = (time() * 1000);

                break;
            case '3':

                $zcf_interval_days = (empty($d['datetime_max_days']) ? 0 : $d['datetime_max_days'] * 86400000);
                $zcf_interval_minutes = (empty($d['datetime_max_minutes']) ? 0 : $d['datetime_max_minutes'] * 60000);

                $zcf_preview_calendar_option['maxDate'] = (time() * 1000) + $zcf_interval_days;
                $zcf_preview_calendar_option['maxTime'] = (time() * 1000) + $zcf_interval_minutes;

                break;
        }

        return json_encode($zcf_preview_calendar_option);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_clean_script($script, $js = true){

        $script = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $script);
        $script = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $script);

        return ($js ? sprintf("<script type='text/javascript'>\n%s\n</script>\n", $script) : $script);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_get_text_value($text_default, $text_default_value){

        $name = '';

        if(isset($text_default)){
            if($text_default === 'text'){
                $name = $text_default_value;
            }elseif(wp_get_current_user()->exists() && $text_default !== 'text'){
                $wp_gcu = wp_get_current_user();
                switch($text_default){
                    case 'user_login':
                        $name = $wp_gcu->user_login;
                        break;
                    case 'user_email':
                        $name = $wp_gcu->user_email;
                        break;
                    case 'nickname':
                        $name = $wp_gcu->nickname;
                        break;
                    case 'first_name':
                        $name = $wp_gcu->first_name;
                        break;
                    case 'last_name':
                        $name = $wp_gcu->last_name;
                        break;
                    case 'display_name':
                        $name = $wp_gcu->display_name;
                        break;
                    case 'user_url':
                        $name = $wp_gcu->user_url;
                        break;
                }
            }
        }
        return $name;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_validate_date($date, $format = 'Y-m-d H:i'){

        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_delite_files($save = []){

        if(isset($save['file']) && count($save['file']) > 0){
            foreach($save['file'] as $flist){
                foreach($flist as $f){
                    wp_delete_file($f);
                }
            }
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public static function zcform_admin_report_script(){
        ?>
        <script type="text/javascript">
            (function($){

              $('.zcf_set_calendar_date').datetimepicker({
                lang: zcf_calendar_local,
                format: '<?=ZCFORM_DATE_FORMAT.' '.ZCFORM_TIME_FORMAT?>',
                dayOfWeekStart: <?=ZCFORM_START_WEEK?>,
                mask: false,
                step: 5,
                datepicker: true,
                timepicker: true
              });
            })(jQuery);
        </script>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_get_counter_block($data, $field = 'text', $zcf_rnk = 0){

        $txtar = (isset($data[$field.'_default']) ? $data[$field.'_default'] : '');
        $txtar_min = (isset($data[$field.'_length_min']) && $data[$field.'_length_min'] !== '' ? $data[$field.'_length_min'] : 0);
        $txtar_min_length = (!empty($txtar) ? (mb_strlen($txtar) > $txtar_min ? $txtar_min : mb_strlen($txtar)) : 0);
        $txtar_max = (isset($data[$field.'_length_max']) && $data[$field.'_length_max'] !== '' ? $data[$field.'_length_max'] : 0);
        $txtar_max_length = (!empty($txtar) ? (($txtar_max - mb_strlen($txtar)) < 0 ? 0 : ($txtar_max - mb_strlen($txtar))) : $txtar_max);
        $txtar_min_view = $field === 'text' && $data['text_field_type'] === 'number' ? $txtar_min : $txtar_min." ($txtar_min_length)";
        ?>

        <div class="zcf_style_limit_block zcf_limit_block_min_<?=$field?>_<?=$zcf_rnk?> <?=(isset($data[$field.'_counter']) && $data[$field.'_counter'] && $data[$field.'_length_min'] !== '' ? '' : 'zcf_hide_text')?>">
            <?=esc_attr__('min', 'contact-form-z');?>: <span class="zcf_limit_span_min_<?=$field?>_<?=$zcf_rnk?>"><?=$txtar_min_view?></span>
        </div>
        <div class="zcf_style_limit_block zcf_limit_block_max_<?=$field?>_<?=$zcf_rnk?> <?=(isset($data[$field.'_counter']) && $data[$field.'_counter'] && $data[$field.'_length_max'] !== '' ? '' : 'zcf_hide_text')?>">
            <?=esc_attr__('max', 'contact-form-z');?>: <span class="zcf_limit_span_max_<?=$field?>_<?=$zcf_rnk?>"><?=$txtar_max_length?></span>
        </div>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_substr_title($string = ''){

        if(mb_strlen($string) > 80){
            $string = mb_substr($string, 0, 80).'...';
        }

        return $string;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_akismet_select($data, $type = 'autor'){
        ?>

        <select class="zcf_akismet_param" name="<?=$type?>_akismet">
            <option value=""><?=esc_attr__('Not selected', 'contact-form-z');?></option>
            <?php foreach($data['fields'] as $k): if(!in_array(key($k), ['text', 'textarea'])) continue?>
                <option 
                    value="<?=key($k).'_'.$k[key($k)][key($k).'_rank']?>" 
                    <?=(isset($data['options']['akismet'][$type.'_akismet']) && $data['options']['akismet'][$type.'_akismet'] == (key($k).'_'.$k[key($k)][key($k).'_rank']) ? 'selected' : '')?>
                    >
                        <?php if(!empty($k[key($k)][key($k).'_title'])):?>
                            <?=$k[key($k)][key($k).'_title'];?>
                        <?php else:?>
                            <?=key($k);?> <?=$k[key($k)][key($k).'_rank'];?>
                        <?php endif;?>
                </option>
            <?php endforeach;?>
        </select>

        <?php
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_akismet_http($akismet, $content_akismet, $post, $generate_id){

        $spam = false;

        if(is_callable(['Akismet', 'http_post']) && (bool)Akismet::get_api_key()){

            $autor = explode('_', $akismet['autor_akismet']);
            $email = explode('_', $akismet['email_akismet']);

            $c['comment_author'] = $post[$autor[0]][$autor[1].'_'.$generate_id];
            $c['comment_author_email'] = $post[$email[0]][$email[1].'_'.$generate_id];
            $c['comment_author_url'] = '';
            $c['comment_content'] = implode('\n\n', $content_akismet);

            $c['blog'] = get_option('home');
            $c['blog_lang'] = get_locale();
            $c['blog_charset'] = get_option('blog_charset');
            $c['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $c['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $c['referrer'] = $_SERVER['HTTP_REFERER'];
            $c['comment_type'] = 'contact-form';

            if($permalink = get_permalink()){
                $c['permalink'] = $permalink;
            }

            $query_string = http_build_query($c);

            $response = Akismet::http_post($query_string, 'comment-check');

            if($response[1] == 'true'){
                $spam = true;
            }
        }

        return $spam;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_math_captcha($zcf_rnk = ''){

        session_start();

        $num1 = rand(1, 9);
        $num2 = rand(1, 9);
        $captcha_total = $num1 + $num2;

        $math = "$num1"."&nbsp;+&nbsp;"."$num2"."&nbsp;=";

        $_SESSION['rand_code'.$zcf_rnk] = $captcha_total;

        return $math;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_check_mail_block($string, $check_d = false){

        $mail_list = explode(',', $string);

        // Check Tag Email
        foreach($mail_list as $key => $mail){

            $mail = trim($mail);

            if(empty($mail)){
                return esc_attr__('The line contains an empty value.', 'contact-form-z');
            }

            if(preg_match('/\[[a-z]+\-[0-9]+\]/', $mail)){

                if(!preg_match('/\[text\-[0-9]+\]/', $mail)){
                    return esc_attr__('One of the indicated letter pattern codes is not a single line text field.', 'contact-form-z');
                }

                unset($mail_list[$key]);
            }
        }

        // Check Email
        if(count($mail_list) > 0){

            foreach($mail_list as $mail){

                $mail = trim($mail);

                // Chesk Real Email
                if(!is_email($mail)){
                    return esc_attr__('Invalid mailbox syntax is used.', 'contact-form-z');
                }

                // Chesk Email Domain
                if($check_d){

                    if(!self::zcf_check_email_domain($mail)){
                        return esc_attr__('Sender email address does not belong to the site domain.', 'contact-form-z');
                    }
                }
            }
        }

        return false;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    function zcf_check_email_domain($email){

        $site_domain = strtolower($_SERVER['SERVER_NAME']);

        if(in_array($site_domain, ['localhost', '127.0.0.1'])){
            return true;
        }

        if(preg_match('/^[0-9.]+$/', $site_domain)){
            return true;
        }

        $email_domain = strtolower(substr($email, strrpos($email, '@') + 1));

        if($email_domain == $site_domain){
            return true;
        }

        $home_url = home_url();

        if(is_multisite() and function_exists('domain_mapping_siteurl')){
            $domain_mapping_siteurl = domain_mapping_siteurl(false);

            if($domain_mapping_siteurl){
                $home_url = $domain_mapping_siteurl;
            }
        }

        if(preg_match('%^https?://([^/]+)%', $home_url, $matches)){
            $site_domain = strtolower($matches[1]);

            if($site_domain != $site_domain and $email_domain == $site_domain){
                return true;
            }
        }

        return false;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
}

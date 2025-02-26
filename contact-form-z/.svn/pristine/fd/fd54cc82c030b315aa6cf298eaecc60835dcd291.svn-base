<?php

class ZCForm_Ajax{

    public $wpdb;
    public $prefix;

    function __construct($action_name = ['error']){

        global $wpdb;
        $this->wpdb = $wpdb;
        $this->wpdb->hide_errors();
        $this->prefix = $this->wpdb->prefix;
        $this->init_hooks($action_name);
    }

    public function init_hooks($action_name){

        foreach($action_name as $ac => $act){
            if(!$act){
                add_action('wp_ajax_nopriv_'.$ac, [$this, 'zcform_callback_'.$ac]);
            }
            add_action('wp_ajax_'.$ac, [$this, 'zcform_callback_'.$ac]);
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_error(){
        wp_send_json_error(['message' => esc_html__('Critical error', 'contact-form-z')]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
    public function zcform_check_role($role){

        if(!current_user_can($role)){
            wp_send_json_error(['message' => esc_html__('You do not have permissions to access this action', 'contact-form-z')]);
        }
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_save_form(){

        $field_list = [];
        $field_mail = [];
        $field_style = [];
        $field_message = [];
        $field_options = [];
        $field_paste = [];
        $field_paste_insert = [];
        $field_patterns = [];
        $calc_rules = [];
        $count = 0;

        $plugin = [
            'date' => false,
            'mask' => false,
            'file' => false
        ];

        $rank = $number_rank = [
            'text' => 0,
            'datetime' => 0,
            'textarea' => 0,
            'select' => 0,
            'checkbox' => 0,
            'radio' => 0,
            'accept' => 0,
            'file' => 0,
            'rating' => 0,
            'button' => 0,
            'mail' => 0,
            'rules' => 0
        ];

        $this->zcform_check_role('publish_pages');

        $form_id = isset($_POST['form_id']) && !empty($_POST['form_id']) ? sanitize_key($_POST['form_id']) : 0;

        $res = $this->wpdb->get_var(
            $this->wpdb->prepare(
                "SELECT COUNT(*) FROM {$this->prefix}zcf_form_list WHERE LOWER(title) = LOWER(%s) AND id != %d;", [trim(sanitize_text_field($_POST['general_title'])), $form_id]
            )
        );

        if($res > 0){
            wp_send_json_error(['message' => esc_html__('The form with the specified title has already been created', 'contact-form-z')]);
        }

        if($form_id > 0){

            $res_rank = $this->wpdb->get_row(
                $this->wpdb->prepare(
                    "SELECT rank FROM {$this->prefix}zcf_form_list WHERE id = %d;", $form_id
                )
                , ARRAY_A, 0
            );

            if(!is_null($res_rank)){
                foreach(json_decode($res_rank['rank'], true) as $k => $v){
                    $rank[$k] = $v;
                }
            }
        }

        $general_title = (isset($_POST['general_title']) && !empty($_POST['general_title']) ? sanitize_text_field($_POST['general_title']) : esc_html__('No title', 'contact-form-z').' '.date('Y-m-d H:i:s'));

        foreach($_POST['rules_if'] as $key => $rules_if){

            if(empty($rules_if) || empty($_POST['rules_then'][$key]))
                continue;

            $rank['rules'] = max($rank['rules'], (int)sanitize_text_field($key));

            // IF
            $field_options['rules'][$key]['rules_if'] = sanitize_text_field($rules_if);
            $field_options['rules'][$key]['rules_if_field_type'] = sanitize_text_field($_POST['rules_if_field_type'][$key]);
            $field_options['rules'][$key]['rules_if_multi'] = isset($_POST['rules_if_multi'][$key]) ? true : false;

            // array condition AND array options (text, textarea, datetime)
            if(is_array($_POST['rules_if_condition'][$key]) && is_array($_POST['rules_if_options'][$key])){

                foreach($_POST['rules_if_condition'][$key] as $k => $rules_if_condition){
                    $field_options['rules'][$key]['rules_if_condition'][$k] = $rules_if_condition;
                    $field_options['rules'][$key]['rules_if_options'][$k] = sanitize_text_field($_POST['rules_if_options'][$key][$k]);
                }

                // one condition AND one options (select, radio, file, accept, rating)
            }else if(!is_array($_POST['rules_if_condition'][$key]) && !is_array($_POST['rules_if_options'][$key])){

                $field_options['rules'][$key]['rules_if_condition'] = $_POST['rules_if_condition'][$key];
                $field_options['rules'][$key]['rules_if_options'] = sanitize_text_field($_POST['rules_if_options'][$key]);

                // one condition AND array options (select, radio, checkbox, rating)
            }else if(!is_array($_POST['rules_if_condition'][$key]) && is_array($_POST['rules_if_options'][$key])){

                $field_options['rules'][$key]['rules_if_condition'] = $_POST['rules_if_condition'][$key];
                $field_options['rules'][$key]['rules_if_all_options'] = isset($_POST['rules_if_all_options'][$key]) ? true : false;
                foreach($_POST['rules_if_options'][$key] as $k => $rules_if_options){
                    $field_options['rules'][$key]['rules_if_options'][$k] = sanitize_text_field($rules_if_options);
                }
            }

            // THEN
            $field_options['rules'][$key]['rules_action'] = sanitize_text_field($_POST['rules_action'][$key]);

            $field_options['rules'][$key]['rules_then'] = sanitize_text_field($_POST['rules_then'][$key]);
            $field_options['rules'][$key]['rules_then_multi'] = isset($_POST['rules_then_multi'][$key]) ? true : false;
            $field_options['rules'][$key]['rules_then_options'] = [];

            if(isset($_POST['rules_then_options'][$key]) && count($_POST['rules_then_options'][$key]) > 0){

                $field_options['rules'][$key]['rules_then_all_options'] = isset($_POST['rules_then_all_options'][$key]) ? true : false;
                foreach($_POST['rules_then_options'][$key] as $k => $rules_then_options){
                    $field_options['rules'][$key]['rules_then_options'][$k] = sanitize_text_field($rules_then_options);
                }
            }

            $calc_rules[$field_options['rules'][$key]['rules_if']][$key] = $field_options['rules'][$key];
        }

        // Fields Point
        foreach($_POST['field'] as $field_key => $field_value){

            $field_num = $number_rank[$field_value];
            $temp_rank = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);

            $field_list[$field_key][$field_value][$field_value.'_hide'] = filter_var(sanitize_text_field($_POST[$field_value.'_hide'][$field_num]), FILTER_VALIDATE_BOOLEAN);
            $field_list[$field_key][$field_value][$field_value.'_size_field'] = sanitize_text_field($_POST[$field_value.'_size_field'][$field_num]);
            $field_list[$field_key][$field_value][$field_value.'_padding_state'] = filter_var(sanitize_text_field($_POST[$field_value.'_padding_state'][$field_num]), FILTER_VALIDATE_BOOLEAN);

            switch($field_value){

                case 'text':

                    // General
                    $field_list[$field_key]['text']['text_required'] = filter_var(sanitize_text_field($_POST['text_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['text']['text_title'] = sanitize_text_field($_POST['text_title'][$field_num]);
                    $field_list[$field_key]['text']['text_no_title'] = filter_var(sanitize_text_field($_POST['text_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['text']['text_field_type'] = sanitize_text_field($_POST['text_field_type'][$field_num]);
                    $field_list[$field_key]['text']['text_placeholder'] = sanitize_text_field($_POST['text_placeholder'][$field_num]);

                    // Options
                    $field_list[$field_key]['text']['text_default'] = sanitize_text_field($_POST['text_default'][$field_num]);
                    $field_list[$field_key]['text']['text_default_value'] = sanitize_text_field($_POST['text_default_value'][$field_num]);

                    $field_list[$field_key]['text']['text_length_min'] = sanitize_text_field($_POST['text_length_min'][$field_num]);
                    $field_list[$field_key]['text']['text_length_max'] = sanitize_text_field($_POST['text_length_max'][$field_num]);
                    $field_list[$field_key]['text']['text_counter'] = ($_POST['text_length_min'][$field_num] === '' && $_POST['text_length_max'][$field_num] === '' ? false : filter_var(sanitize_text_field($_POST['text_counter'][$field_num]), FILTER_VALIDATE_BOOLEAN));

                    $field_list[$field_key]['text']['text_list_id'] = sanitize_text_field($_POST['text_list_id'][$field_num]);
                    $field_list[$field_key]['text']['text_list_class'] = sanitize_text_field($_POST['text_list_class'][$field_num]);

                    // Mask
                    $field_list[$field_key]['text']['text_mask'] = $_POST['text_mask'][$field_num] === 'true' && !empty($_POST['mask_template'][$field_num]) ? true : false;
                    if($field_list[$field_key]['text']['text_mask']){
                        $plugin['mask'] = true;
                        $field_list[$field_key]['text']['mask_template'] = sanitize_text_field($_POST['mask_template'][$field_num]);
                        $field_list[$field_key]['text']['mask_revers'] = filter_var(sanitize_text_field($_POST['mask_revers'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                        $field_list[$field_key]['text']['mask_clean'] = filter_var(sanitize_text_field($_POST['mask_clean'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    }

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['text']['text_title'];

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'datetime':

                    $plugin['date'] = true;

                    // General
                    $field_list[$field_key]['datetime']['datetime_required'] = filter_var(sanitize_text_field($_POST['datetime_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['datetime']['datetime_title'] = sanitize_text_field($_POST['datetime_title'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_no_title'] = filter_var(sanitize_text_field($_POST['datetime_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['datetime']['datetime_placeholder'] = sanitize_text_field($_POST['datetime_placeholder'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_field_type'] = sanitize_text_field($_POST['datetime_field_type'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_language'] = sanitize_text_field($_POST['datetime_language'][$field_num]);

                    $field_list[$field_key]['datetime']['datetime_format'] = sanitize_text_field($_POST['datetime_format'][$field_num]);
                    $field_list[$field_key]['datetime']['date_format'] = sanitize_text_field($_POST['date_format'][$field_num]);
                    $field_list[$field_key]['datetime']['time_format'] = sanitize_text_field($_POST['time_format'][$field_num]);

                    // Options
                    $field_list[$field_key]['datetime']['datetime_default'] = sanitize_text_field($_POST['datetime_default'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_default_value'] = sanitize_text_field($_POST['datetime_default_value'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_days'] = sanitize_text_field($_POST['datetime_days'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_minutes'] = sanitize_text_field($_POST['datetime_minutes'][$field_num]);

                    $field_list[$field_key]['datetime']['datetime_start_day'] = sanitize_text_field($_POST['datetime_start_day'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_minutes_step'] = empty($_POST['datetime_minutes_step'][$field_num]) ? 5 : sanitize_text_field($_POST['datetime_minutes_step'][$field_num]);

                    $field_list[$field_key]['datetime']['date_min_limit'] = sanitize_text_field($_POST['date_min_limit'][$field_num]);
                    $field_list[$field_key]['datetime']['date_min_value'] = sanitize_text_field($_POST['date_min_value'][$field_num]);
                    $field_list[$field_key]['datetime']['time_min_value'] = sanitize_text_field($_POST['time_min_value'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_min_days'] = sanitize_text_field($_POST['datetime_min_days'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_min_minutes'] = sanitize_text_field($_POST['datetime_min_minutes'][$field_num]);

                    $field_list[$field_key]['datetime']['date_max_limit'] = sanitize_text_field($_POST['date_max_limit'][$field_num]);
                    $field_list[$field_key]['datetime']['date_max_value'] = sanitize_text_field($_POST['date_max_value'][$field_num]);
                    $field_list[$field_key]['datetime']['time_max_value'] = sanitize_text_field($_POST['time_max_value'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_max_days'] = sanitize_text_field($_POST['datetime_max_days'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_max_minutes'] = sanitize_text_field($_POST['datetime_max_minutes'][$field_num]);

                    $field_list[$field_key]['datetime']['datetime_list_id'] = sanitize_text_field($_POST['datetime_list_id'][$field_num]);
                    $field_list[$field_key]['datetime']['datetime_list_class'] = sanitize_text_field($_POST['datetime_list_class'][$field_num]);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['datetime']['datetime_title'];

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    break;

                case 'textarea':

                    // General
                    $field_list[$field_key]['textarea']['textarea_required'] = filter_var(sanitize_text_field($_POST['textarea_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['textarea']['textarea_title'] = sanitize_text_field($_POST['textarea_title'][$field_num]);
                    $field_list[$field_key]['textarea']['textarea_no_title'] = filter_var(sanitize_text_field($_POST['textarea_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['textarea']['textarea_placeholder'] = sanitize_text_field($_POST['textarea_placeholder'][$field_num]);

                    // Options
                    $field_list[$field_key]['textarea']['textarea_default'] = sanitize_text_field($_POST['textarea_default'][$field_num]);
                    $field_list[$field_key]['textarea']['textarea_length_min'] = sanitize_text_field($_POST['textarea_length_min'][$field_num]);
                    $field_list[$field_key]['textarea']['textarea_length_max'] = sanitize_text_field($_POST['textarea_length_max'][$field_num]);
                    $field_list[$field_key]['textarea']['textarea_counter'] = ($_POST['textarea_length_min'][$field_num] === '' && $_POST['textarea_length_max'][$field_num] === '' ? false : filter_var(sanitize_text_field($_POST['textarea_counter'][$field_num]), FILTER_VALIDATE_BOOLEAN));
                    $field_list[$field_key]['textarea']['textarea_list_id'] = sanitize_text_field($_POST['textarea_list_id'][$field_num]);
                    $field_list[$field_key]['textarea']['textarea_list_class'] = sanitize_text_field($_POST['textarea_list_class'][$field_num]);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['textarea']['textarea_title'];

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'select':

                    // General
                    $field_list[$field_key]['select']['select_required'] = filter_var(sanitize_text_field($_POST['select_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['select']['select_title'] = sanitize_text_field($_POST['select_title'][$field_num]);
                    $field_list[$field_key]['select']['select_no_title'] = filter_var(sanitize_text_field($_POST['select_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['select']['select_multi'] = filter_var(sanitize_text_field($_POST['select_multi'][$field_num]), FILTER_VALIDATE_BOOLEAN);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['select']['select_title'];

                    // List
                    $rank_field_key = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);
                    $rank_count = count($_POST['select_list_title'][$rank_field_key]);
                    foreach($_POST['select_list_title'][$rank_field_key] as $list_key => $list_value){
                        $field_list[$field_key]['select']['list_max_count'] = max($rank_count, (int)$list_key);

                        $field_list[$field_key]['select']['list'][$list_key]['select_list_title'] = sanitize_text_field($list_value);
                        $field_list[$field_key]['select']['list'][$list_key]['select_list_check'] = filter_var(sanitize_text_field($_POST['select_list_check'][$rank_field_key][$list_key]), FILTER_VALIDATE_BOOLEAN);

                        $plugin['fields_list'][$field_value.'_'.$temp_rank][$field_value.'_'.$temp_rank.'_'.$list_key] = !empty($list_value) ? $list_value : $field_value.'_'.$temp_rank.'_'.$list_key;
                        $field_patterns[$field_value][$temp_rank]['list'][$list_key] = sanitize_text_field($list_value);
                    }

                    // Options
                    $field_list[$field_key]['select']['select_default'] = sanitize_text_field($_POST['select_default'][$field_num]);
                    $field_list[$field_key]['select']['select_default_value'] = sanitize_text_field($_POST['select_default_value'][$field_num]);
                    $field_list[$field_key]['select']['select_min_count_check'] = $_POST['select_default'][$field_num] == 2 && $field_list[$field_key]['select']['select_multi'] ? sanitize_text_field($_POST['select_min_count_check'][$field_num]) : 0;
                    $field_list[$field_key]['select']['select_max_count_check'] = $_POST['select_default'][$field_num] == 2 && $field_list[$field_key]['select']['select_multi'] ? sanitize_text_field($_POST['select_max_count_check'][$field_num]) : 0;
                    $field_list[$field_key]['select']['select_list_id'] = sanitize_text_field($_POST['select_list_id'][$field_num]);
                    $field_list[$field_key]['select']['select_list_class'] = sanitize_text_field($_POST['select_list_class'][$field_num]);

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'checkbox':

                    // General
                    $field_list[$field_key]['checkbox']['checkbox_required'] = filter_var(sanitize_text_field($_POST['checkbox_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['checkbox']['checkbox_title'] = sanitize_text_field($_POST['checkbox_title'][$field_num]);
                    $field_list[$field_key]['checkbox']['checkbox_no_title'] = filter_var(sanitize_text_field($_POST['checkbox_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['checkbox']['checkbox_title'];

                    // List
                    $rank_field_key = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);
                    $rank_count = count($_POST['checkbox_list_title'][$rank_field_key]);
                    foreach($_POST['checkbox_list_title'][$rank_field_key] as $list_key => $list_value){
                        $field_list[$field_key]['checkbox']['list_max_count'] = max($rank_count, (int)$list_key);

                        $field_list[$field_key]['checkbox']['list'][$list_key]['checkbox_list_title'] = sanitize_text_field($list_value);
                        $field_list[$field_key]['checkbox']['list'][$list_key]['checkbox_list_check'] = filter_var(sanitize_text_field($_POST['checkbox_list_check'][$rank_field_key][$list_key]), FILTER_VALIDATE_BOOLEAN);

                        $plugin['fields_list'][$field_value.'_'.$temp_rank][$field_value.'_'.$temp_rank.'_'.$list_key] = !empty($list_value) ? $list_value : $field_value.'_'.$temp_rank.'_'.$list_key;
                        $field_patterns[$field_value][$temp_rank]['list'][$list_key] = sanitize_text_field($list_value);
                    }

                    // Options
                    $field_list[$field_key]['checkbox']['checkbox_min_count_check'] = sanitize_text_field($_POST['checkbox_min_count_check'][$field_num]);
                    $field_list[$field_key]['checkbox']['checkbox_max_count_check'] = sanitize_text_field($_POST['checkbox_max_count_check'][$field_num]);
                    $field_list[$field_key]['checkbox']['checkbox_list_id'] = sanitize_text_field($_POST['checkbox_list_id'][$field_num]);
                    $field_list[$field_key]['checkbox']['checkbox_list_class'] = sanitize_text_field($_POST['checkbox_list_class'][$field_num]);

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'radio':

                    // General
                    $field_list[$field_key]['radio']['radio_required'] = filter_var(sanitize_text_field($_POST['radio_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['radio']['radio_title'] = sanitize_text_field($_POST['radio_title'][$field_num]);
                    $field_list[$field_key]['radio']['radio_no_title'] = filter_var(sanitize_text_field($_POST['radio_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['radio']['radio_title'];

                    // List
                    $rank_field_key = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);
                    $rank_count = count($_POST['radio_list_title'][$rank_field_key]);
                    foreach($_POST['radio_list_title'][$rank_field_key] as $list_key => $list_value){
                        $field_list[$field_key]['radio']['list_max_count'] = max($rank_count, (int)$list_key);

                        $field_list[$field_key]['radio']['list'][$list_key]['radio_list_title'] = sanitize_text_field($list_value);
                        $field_list[$field_key]['radio']['list'][$list_key]['radio_list_check'] = filter_var(sanitize_text_field($_POST['radio_list_check'][$rank_field_key][$list_key]), FILTER_VALIDATE_BOOLEAN);

                        $plugin['fields_list'][$field_value.'_'.$temp_rank][$field_value.'_'.$temp_rank.'_'.$list_key] = !empty($list_value) ? $list_value : $field_value.'_'.$temp_rank.'_'.$list_key;
                        $field_patterns[$field_value][$temp_rank]['list'][$list_key] = sanitize_text_field($list_value);
                    }

                    // Options
                    $field_list[$field_key]['radio']['radio_list_id'] = sanitize_text_field($_POST['radio_list_id'][$field_num]);
                    $field_list[$field_key]['radio']['radio_list_class'] = sanitize_text_field($_POST['radio_list_class'][$field_num]);

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'accept':

                    // General
                    $field_list[$field_key]['accept']['accept_title'] = sanitize_text_field($_POST['accept_title'][$field_num]);
                    $field_list[$field_key]['accept']['accept_no_title'] = filter_var(sanitize_text_field($_POST['accept_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['accept']['accept_sub_title'] = sanitize_text_field($_POST['accept_sub_title'][$field_num]);
                    $field_list[$field_key]['accept']['accept_default'] = sanitize_text_field($_POST['accept_default'][$field_num]);

                    // Options
                    $field_list[$field_key]['accept']['accept_condition'] = filter_var(sanitize_text_field($_POST['accept_condition'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['accept']['accept_type'] = sanitize_text_field($_POST['accept_type'][$field_num]);
                    $field_list[$field_key]['accept']['accept_url'] = sanitize_text_field($_POST['accept_url'][$field_num]);
                    $field_list[$field_key]['accept']['accept_text'] = sanitize_textarea_field($_POST['accept_text'][$field_num]);
                    $field_list[$field_key]['accept']['accept_list_id'] = sanitize_text_field($_POST['accept_list_id'][$field_num]);
                    $field_list[$field_key]['accept']['accept_list_class'] = sanitize_text_field($_POST['accept_list_class'][$field_num]);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['accept']['accept_title'];

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'file':

                    $plugin['file'] = true;

                    // General
                    $field_list[$field_key]['file']['file_required'] = filter_var(sanitize_text_field($_POST['file_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['file']['file_title'] = sanitize_text_field($_POST['file_title'][$field_num]);
                    $field_list[$field_key]['file']['file_no_title'] = filter_var(sanitize_text_field($_POST['file_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['file']['file_multiple'] = filter_var(sanitize_text_field($_POST['file_multiple'][$field_num]), FILTER_VALIDATE_BOOLEAN);

                    // Options
                    $field_list[$field_key]['file']['file_size'] = sanitize_text_field($_POST['file_size'][$field_num]);
                    $field_list[$field_key]['file']['file_size_info'] = filter_var(sanitize_text_field($_POST['file_size_info'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['file']['file_type'] = sanitize_text_field($_POST['file_type'][$field_num]);
                    $field_list[$field_key]['file']['file_type_info'] = filter_var(sanitize_text_field($_POST['file_type_info'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['file']['file_list_class'] = sanitize_text_field($_POST['file_list_class'][$field_num]);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['file']['file_title'];

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'rating':

                    // General
                    $field_list[$field_key]['rating']['rating_required'] = filter_var(sanitize_text_field($_POST['rating_required'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['rating']['rating_title'] = sanitize_text_field($_POST['rating_title'][$field_num]);
                    $field_list[$field_key]['rating']['rating_no_title'] = filter_var(sanitize_text_field($_POST['rating_no_title'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['rating']['rating_type'] = sanitize_text_field($_POST['rating_type'][$field_num]);

                    $field_patterns[$field_value][$temp_rank]['name'] = $field_list[$field_key]['rating']['rating_title'];

                    // List
                    $rank_field_key = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);
                    $rank_count = count($_POST['rating_list_title'][$rank_field_key]);
                    foreach($_POST['rating_list_title'][$rank_field_key] as $list_key => $list_value){
                        $field_list[$field_key]['rating']['list_max_count'] = max($rank_count, (int)$list_key);

                        $field_list[$field_key]['rating']['list'][$list_key]['rating_list_title'] = sanitize_text_field($list_value);
                        $field_list[$field_key]['rating']['list'][$list_key]['rating_list_check'] = filter_var(sanitize_text_field($_POST['rating_list_check'][$rank_field_key][$list_key]), FILTER_VALIDATE_BOOLEAN);

                        $plugin['fields_list'][$field_value.'_'.$temp_rank][$field_value.'_'.$temp_rank.'_'.$list_key] = !empty($list_value) ? $list_value : $field_value.'_'.$temp_rank.'_'.$list_key;
                        $field_patterns[$field_value][$temp_rank]['list'][$list_key] = sanitize_text_field($list_value);
                    }

                    // Options
                    $field_list[$field_key]['rating']['rating_reverse'] = filter_var(sanitize_text_field($_POST['rating_reverse'][$field_num]), FILTER_VALIDATE_BOOLEAN);
                    $field_list[$field_key]['rating']['rating_color_points'] = sanitize_text_field($_POST['rating_color_points'][$field_num]);
                    $field_list[$field_key]['rating']['rating_list_id'] = sanitize_text_field($_POST['rating_list_id'][$field_num]);
                    $field_list[$field_key]['rating']['rating_list_class'] = sanitize_text_field($_POST['rating_list_class'][$field_num]);

                    // For Rules
                    $field_list[$field_key][$field_value]['rules'] = $this->zcform_calculation_rules_field($field_value, $calc_rules[$field_value.'_'.$temp_rank], $field_list[$field_key][$field_value]);

                    $count++;

                    break;

                case 'button':

                    if(isset($_POST['mathcaptcha'])){
                        $field_list[$field_key]['mathcaptcha'] = true;
                        $field_key++;

                        $field_list[$field_key][$field_value][$field_value.'_hide'] = $field_list[$field_key - 1][$field_value][$field_value.'_hide'];
                        $field_list[$field_key][$field_value][$field_value.'_size_field'] = $field_list[$field_key - 1][$field_value][$field_value.'_size_field'];
                        $field_list[$field_key][$field_value][$field_value.'_padding_state'] = $field_list[$field_key - 1][$field_value][$field_value.'_padding_state'];
                        unset($field_list[$field_key - 1][$field_value]);
                    }

                    if(isset($_POST['recaptcha'])){
                        $field_list[$field_key]['recaptcha'] = true;
                        $field_key++;

                        $field_list[$field_key][$field_value][$field_value.'_hide'] = $field_list[$field_key - 1][$field_value][$field_value.'_hide'];
                        $field_list[$field_key][$field_value][$field_value.'_size_field'] = $field_list[$field_key - 1][$field_value][$field_value.'_size_field'];
                        $field_list[$field_key][$field_value][$field_value.'_padding_state'] = $field_list[$field_key - 1][$field_value][$field_value.'_padding_state'];
                        unset($field_list[$field_key - 1][$field_value]);
                    }

                    // General
                    $field_list[$field_key]['button']['button_title'] = sanitize_text_field($_POST['button_title'][$field_num]);
                    $field_list[$field_key]['button']['button_list_id'] = sanitize_text_field($_POST['button_list_id'][$field_num]);
                    $field_list[$field_key]['button']['button_list_class'] = sanitize_text_field($_POST['button_list_class'][$field_num]);

                    break;
            }

            if(!in_array($field_value, ['button', 'accept'])){
                $patterns[$field_value.'_'.$temp_rank] = $field_patterns[$field_value][$temp_rank];
            }

            if(!in_array($field_value, ['button'])){
                $plugin['fields_name'][$field_value.'_'.$temp_rank] = !empty($field_list[$field_key][$field_value][$field_value.'_title']) ? $field_list[$field_key][$field_value][$field_value.'_title'] : $field_value.'_'.$temp_rank;
            }

            $field_list[$field_key][$field_value][$field_value.'_rank'] = sanitize_text_field($_POST[$field_value.'_rank'][$field_num]);

            $number_rank[$field_value] ++;
            $rank[$field_value] = isset($_POST[$field_value.'_rank'][$field_num]) ? max($rank[$field_value], (int)sanitize_text_field($_POST[$field_value.'_rank'][$field_num])) : $rank[$field_value];
        }

        if($count === 0){
            wp_send_json_error(['message' => esc_html__('No fields added', 'contact-form-z')]);
        }

        // Mail Point
        foreach($_POST['mail_template'] as $key => $value){

            $rank['mail'] = max($rank['mail'], (int)sanitize_text_field($value));

            $field_mail[$value]['whom'] = sanitize_text_field($_POST['whom'][$value]);
            $field_mail[$value]['from'] = sanitize_text_field($_POST['from'][$value]);
            $field_mail[$value]['subject'] = sanitize_text_field($_POST['subject'][$value]);
            $field_mail[$value]['reply-to'] = sanitize_text_field($_POST['reply-to'][$value]);
            $field_mail[$value]['body_mail'] = sanitize_textarea_field($_POST['editor_content'][$value]);
            $field_mail[$value]['files'] = [];

            if(empty($field_mail[$value]['whom'])){
                $field_mail[$value]['whom'] = get_user_option('user_email');
            }
            if(empty($field_mail[$value]['from'])){
                $field_mail[$value]['from'] = 'wordpress@'.$_SERVER['SERVER_NAME'];
            }
            if(empty($field_mail[$value]['subject'])){
                $field_mail[$value]['subject'] = $general_title.' - '.$_SERVER['SERVER_NAME'];
            }
            if(empty($field_mail[$value]['reply-to'])){
                $field_mail[$value]['reply-to'] = 'wordpress@'.$_SERVER['SERVER_NAME'];
            }
            if(empty($field_mail[$value]['body_mail'])){
                foreach($patterns as $pkey => $pvalue){
                    list($f, $r) = explode('_', $pkey);
                    if($f === 'file')
                        continue;
                    $field_mail[$value]['body_mail'] .= (empty($pvalue['name']) ? "{$f} {$r}" : $pvalue['name']).":  [{$f}-{$r}]\n\n";
                }
            }

            if(isset($_POST['mail_file'][$value])){
                foreach($_POST['mail_file'][$value] as $file_key => $file_value){
                    $field_mail[$value]['files'][$file_key] = sanitize_text_field($file_value);
                }
            }
        }

        // Style Point
        $field_style['colors_style'] = sanitize_text_field($_POST['colors_style']);
        $field_style['color_title'] = sanitize_text_field($_POST['color_title']);
        $field_style['color_border'] = sanitize_text_field($_POST['color_border']);
        $field_style['color_focus'] = sanitize_text_field($_POST['color_focus']);
        $field_style['color_button'] = sanitize_text_field($_POST['color_button']);
        $field_style['color_button_hover'] = sanitize_text_field($_POST['color_button_hover']);
        $field_style['color_button_text'] = sanitize_text_field($_POST['color_button_text']);
        $field_style['color_checked'] = sanitize_text_field($_POST['color_checked']);
        $field_style['width_value'] = sanitize_text_field($_POST['width_value']);
        $field_style['width_unit'] = sanitize_text_field($_POST['width_unit']);
        $field_style['height_value'] = sanitize_text_field($_POST['height_value']);
        $field_style['height_unit'] = sanitize_text_field($_POST['height_unit']);
        $field_style['height_textarea_value'] = sanitize_text_field($_POST['height_textarea_value']);
        $field_style['height_textarea_unit'] = sanitize_text_field($_POST['height_textarea_unit']);
        $field_style['width_button_value'] = sanitize_text_field($_POST['width_button_value']);
        $field_style['width_button_unit'] = sanitize_text_field($_POST['width_button_unit']);
        $field_style['height_button_value'] = sanitize_text_field($_POST['height_button_value']);
        $field_style['height_button_unit'] = sanitize_text_field($_POST['height_button_unit']);
        $field_style['border_fields_value'] = sanitize_text_field($_POST['border_fields_value']);
        $field_style['border_fields_unit'] = sanitize_text_field($_POST['border_fields_unit']);
        $field_style['shadow'] = isset($_POST['shadow']) ? true : false;

        // Message Point
        $field_message['msg_send'] = sanitize_textarea_field($_POST['msg_send']);
        $field_message['msg_not_send'] = sanitize_textarea_field($_POST['msg_not_send']);
        $field_message['msg_not_completed'] = sanitize_textarea_field($_POST['msg_not_completed']);
        $field_message['msg_form_required'] = sanitize_textarea_field($_POST['msg_form_required']);
        $field_message['msg_min_value'] = sanitize_textarea_field($_POST['msg_min_value']);
        $field_message['msg_max_value'] = sanitize_textarea_field($_POST['msg_max_value']);
        $field_message['msg_accept'] = sanitize_textarea_field($_POST['msg_accept']);
        $field_message['msg_field_not_completed'] = sanitize_textarea_field($_POST['msg_field_not_completed']);
        $field_message['msg_field_required'] = sanitize_textarea_field($_POST['msg_field_required']);
        $field_message['msg_load_file'] = sanitize_textarea_field($_POST['msg_load_file']);

        // Options Point
        $field_options['analytic'] = sanitize_textarea_field($_POST['analytic']);
        $field_options['send_mail'] = isset($_POST['send_mail']) ? true : false;
        $field_options['save_form'] = isset($_POST['save_form']) ? true : false;
        $field_options['recaptcha'] = isset($_POST['recaptcha']) ? true : false;
        $field_options['mathcaptcha'] = isset($_POST['mathcaptcha']) ? true : false;

        if(isset($_POST['enable_akismet'])){
            if(isset($_POST['autor_akismet']) && !empty($_POST['autor_akismet']) && isset($_POST['email_akismet']) && !empty($_POST['email_akismet'])){
                $field_options['akismet']['enable_akismet'] = true;
                $field_options['akismet']['autor_akismet'] = sanitize_text_field($_POST['autor_akismet']);
                $field_options['akismet']['email_akismet'] = sanitize_text_field($_POST['email_akismet']);
            }
        }

        // Redirect Point
        $field_options['redirection_rules'] = $_POST['redirection_rules'];
        switch($_POST['redirection_rules']){
            case 'one';

                if(!empty($_POST['one_page'])){
                    $field_options['one_page'] = sanitize_text_field($_POST['one_page']);
                }else{
                    $field_options['redirection_rules'] = '';
                }

                break;
            case 'more':

                foreach($_POST['more_page_field'] as $key => $value){

                    if(empty($_POST['more_page_list'][$key]) || empty($_POST['more_page_url'][$key]))
                        continue;

                    $field_options['list'][$key]['more_page_field'] = sanitize_text_field($value);
                    $field_options['list'][$key]['more_page_list'] = sanitize_text_field($_POST['more_page_list'][$key]);
                    $field_options['list'][$key]['more_page_url'] = $_POST['more_page_url'][$key];
                }

                if(count($field_options['list']) === 0){
                    $field_options['redirection_rules'] = '';
                }

                break;
        }

        // Paste Form Point
        $field_paste['enable_paste_form_list'] = false;
        if(isset($_POST['enable_paste_form_list'])){

            foreach($_POST['form_list_type'] as $key => $value){

                if(empty($_POST['form_list_'.$value][$key]))
                    continue;

                $field_paste['list'][$key]['form_list_type'] = sanitize_text_field($value);
                $field_paste['list'][$key]['form_list_'.$value] = sanitize_text_field($_POST['form_list_'.$value][$key]);
                $field_paste['list'][$key]['form_list_position'] = sanitize_text_field($_POST['form_list_position'][$key]);

                $field_paste_insert[] = ['post_id' => $_POST['form_list_'.$value][$key], 'post_position' => $_POST['form_list_position'][$key]];
                $field_paste['enable_paste_form_list'] = true;
            }
        }

        $save_table = "{$this->prefix}zcf_form_list";
        $save_data = [
            'title' => $general_title,
            'fields' => json_encode($field_list),
            'mail' => json_encode($field_mail),
            'style' => json_encode($field_style),
            'message' => json_encode($field_message),
            'options' => json_encode($field_options),
            'paste' => json_encode($field_paste),
            'plugin' => json_encode($plugin),
            'rank' => json_encode($rank),
            'field_patterns' => json_encode($field_patterns),
            'patterns' => json_encode($patterns),
            'add_user' => get_current_user_id()
        ];
        $save_value = ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d'];

        if($form_id > 0){
            $res = $this->wpdb->update($save_table, $save_data, ['id' => $form_id], $save_value, ['%d']);
        }else{
            $res = $this->wpdb->insert($save_table, $save_data, $save_value);
            $form_id = $this->wpdb->insert_id;
        }

        if(!$res){
            wp_send_json_error(['message' => esc_html__('Failed to save form settings', 'contact-form-z')]);
        }

        $this->wpdb->delete("{$this->prefix}zcf_form_list_post", ['form_id' => $form_id], ['%d']);

        $error = 0;
        if(count($field_paste_insert) > 0){
            foreach($field_paste_insert as $post){
                $error += $this->wpdb->insert("{$this->prefix}zcf_form_list_post", ['form_id' => $form_id, 'post_id' => $post['post_id'], 'post_position' => $post['post_position']], ['%d', '%d', '%s']);
            }

            if(count($field_paste_insert) <> $error){
                wp_send_json_success(['message' => esc_html__('Failed to save the settings for automatic form placement on pages. Form settings saved', 'contact-form-z'), 'id' => $form_id]);
            }
        }

        wp_send_json_success(['message' => esc_html__('Form settings saved', 'contact-form-z'), 'id' => $form_id]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_calculation_rules_field($field_type, $calc_rules, $field_options){

        $rules = [];

        switch($field_type){
            case 'text':
            case 'textarea':
            case 'datetime':

                $number = isset($field_options['text_field_type']) && $field_options['text_field_type'] === 'number' ? true : false;

                foreach($calc_rules as $rk => $r){
                    $if_condition = [];
                    $if_condition_or = [];
                    $if_condition_other = [];

                    foreach($r['rules_if_condition'] as $k => $cond){
                        $val = $r['rules_if_options'][$k];
                        if($field_type === 'datetime'){
                            $val = ($val == '' ? 'null' : ($field_options['datetime_field_type'] === 'time' ? ((explode(':', $val)[0] * 60 * 60) + (explode(':', $val)[1] * 60)) : strtotime($val)) * 1000);
                        }else{
                            $val = ($number && $val != '' ? $r['rules_if_options'][$k] : "'{$r['rules_if_options'][$k]}'");
                        }

                        if($cond === '||'){
                            $if_condition_or[] = "zcf_val == {$val}";
                        }else{
                            $if_condition_other[] = "zcf_val {$cond} {$val}";
                        }
                    }
                    if(count($if_condition_other) > 0){
                        $if_condition[] = implode(' && ', $if_condition_other);
                    }
                    if(count($if_condition_or) > 0){
                        $if_condition[] = implode(' || ', $if_condition_or);
                    }

                    $rules[$rk]['if'] = implode(' || ', $if_condition);
                    $rules[$rk]['action'] = $r['rules_action'];
                    $rules[$rk]['then'] = $r['rules_then'];
                    $rules[$rk]['then_list'] = [];
                    foreach($r['rules_then_options'] as $t){
                        $rules[$rk]['then_list'][] = explode('_', $t)[2];
                    }
                }

                break;

            case 'select':
            case 'checkbox':
            case 'radio':
            case 'rating':

                foreach($calc_rules as $rk => $r){
                    $if_condition = [];
                    $if_condition_or = [];
                    $if_condition_other = [];

                    if($r['rules_if_condition'] === '==' && in_array($field_type, ['select', 'radio', 'rating']) && !$r['rules_if_multi']){
                        $option = explode('_', $r['rules_if_options'])[2];
                        $if_condition_other[] = "zcf_val == '{$option}'";
                    }else{
                        foreach($r['rules_if_options'] as $option){
                            $option = explode('_', $option)[2];
                            if($r['rules_if_condition'] === '||'){
                                $if_condition_or[] = "($.inArray('{$option}', zcf_val) != -1)";
                            }else{
                                $if_condition_other[] = "($.inArray('{$option}', zcf_val) != -1)";
                            }
                        }
                    }

                    if(count($if_condition_other) > 0){
                        $if_condition[] = implode(' && ', $if_condition_other);
                    }
                    if(count($if_condition_or) > 0){
                        $if_condition[] = implode(' || ', $if_condition_or);
                    }

                    $rules[$rk]['if'] = implode(' || ', $if_condition);
                    $rules[$rk]['action'] = $r['rules_action'];
                    $rules[$rk]['then'] = $r['rules_then'];
                    $rules[$rk]['then_list'] = [];
                    foreach($r['rules_then_options'] as $t){
                        $rules[$rk]['then_list'][] = explode('_', $t)[2];
                    }
                }

                break;

            case 'file':
            case 'accept':

                foreach($calc_rules as $rk => $r){

                    $if_condition = "zcf_val == {$r['rules_if_options']}";

                    $rules[$rk]['if'] = $if_condition;
                    $rules[$rk]['action'] = $r['rules_action'];
                    $rules[$rk]['then'] = $r['rules_then'];
                    $rules[$rk]['then_list'] = [];
                    foreach($r['rules_then_options'] as $t){
                        $rules[$rk]['then_list'][] = explode('_', $t)[2];
                    }
                }

                break;
        }


        return $rules;
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_delete_form(){

        $this->zcform_check_role('delete_pages');

        if(!is_array($_POST['form_id'])){
            $_POST['form_id'] = [$_POST['form_id']];
        }

        if(count($_POST['form_id']) === 0){
            wp_send_json_error(['message' => esc_html__('No form selected', 'contact-form-z')]);
        }

        foreach($_POST['form_id'] as $form_id){
            $this->wpdb->delete("{$this->prefix}zcf_form_list", ['id' => $form_id], ['%d']);
            $this->wpdb->delete("{$this->prefix}zcf_form_list_post", ['form_id' => $form_id], ['%d']);
        }

        wp_send_json_success(['message' => esc_html__('Deletion complete', 'contact-form-z')]);

//        wp_send_json_error(['message' => ZCForm_Static::zcform_akismet_http('text', '1', [], 'Какой то текст')]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_restore_form(){

        $this->zcform_check_role('edit_posts');

        $id = isset($_POST['form_id']) && !empty($_POST['form_id']) ? sanitize_key($_POST['form_id']) : 0;

        if(empty($id)){
            wp_send_json_error(['message' => esc_html__('Form id not found', 'contact-form-z')]);
        }

        $res_form = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT form_list_id, title, fields, mail, style, message, options, paste, plugin, rank, field_patterns
                        FROM {$this->prefix}zcf_form_list_history WHERE id = %d;", $id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form)){
            wp_send_json_error(['message' => esc_html__('Selected form not found', 'contact-form-z')]);
        }

        $save_table = "{$this->prefix}zcf_form_list";
        $save_data = [
            'title' => $res_form['title'],
            'fields' => $res_form['fields'],
            'mail' => $res_form['mail'],
            'style' => $res_form['style'],
            'message' => $res_form['message'],
            'options' => $res_form['options'],
            'paste' => $res_form['paste'],
            'plugin' => $res_form['plugin'],
//            'rank' => $res_form['rank'],
            'field_patterns' => $res_form['field_patterns'],
            'add_user' => get_current_user_id()
        ];
        $save_value = ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d'];

        $res = $this->wpdb->update($save_table, $save_data, ['id' => $res_form['form_list_id']], $save_value, ['%d']);

        if(!$res){
            wp_send_json_error(['message' => esc_html__('Unable to restore form settings', 'contact-form-z')]);
        }

        $this->wpdb->delete("{$this->prefix}zcf_form_list_post", ['form_id' => $res_form['form_list_id']], ['%d']);

        $paste = json_decode($res_form['paste'], true);

        if(count($paste['list']) > 0){
            foreach($paste['list'] as $post){
                $this->wpdb->insert("{$this->prefix}zcf_form_list_post", ['form_id' => $res_form['form_list_id'], 'post_id' => $post['form_list_'.$post['form_list_type']], 'post_position' => $post['form_list_position']], ['%d', '%d', '%s']);
            }
        }

        wp_send_json_success(['message' => esc_html__('Form settings restored', 'contact-form-z'), 'id' => $res_form['form_list_id']]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_copy_form(){

        $this->zcform_check_role('edit_posts');

        $id = isset($_POST['form_id']) && !empty($_POST['form_id']) ? sanitize_key($_POST['form_id']) : 0;

        if(empty($id)){
            wp_send_json_error(['message' => esc_html__('Form id not found', 'contact-form-z')]);
        }

        $res_form = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT id, title, fields, mail, style, message, options, paste, plugin, rank, field_patterns
                        FROM {$this->prefix}zcf_form_list WHERE id = %d;", $id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form)){
            wp_send_json_error(['message' => esc_html__('Selected form not found', 'contact-form-z')]);
        }

        $save_table = "{$this->prefix}zcf_form_list";
        $save_data = [
            'title' => $res_form['title'].' '.time(),
            'fields' => $res_form['fields'],
            'mail' => $res_form['mail'],
            'style' => $res_form['style'],
            'message' => $res_form['message'],
            'options' => $res_form['options'],
            'paste' => $res_form['paste'],
            'plugin' => $res_form['plugin'],
            'rank' => $res_form['rank'],
            'field_patterns' => $res_form['field_patterns'],
            'add_user' => get_current_user_id()
        ];
        $save_value = ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d'];

        $res = $this->wpdb->insert($save_table, $save_data, $save_value);

        if(!$res){
            wp_send_json_error(['message' => esc_html__('Failed to copy form settings', 'contact-form-z')]);
        }

        $insert_id = $this->wpdb->insert_id;

        $paste = json_decode($res_form['paste'], true);

        if(count($paste['list']) > 0){
            foreach($paste['list'] as $post){
                $this->wpdb->insert("{$this->prefix}zcf_form_list_post", ['form_id' => $insert_id, 'post_id' => $post['form_list_'.$post['form_list_type']], 'post_position' => $post['form_list_position']], ['%d', '%d', '%s']);
            }
        }

        wp_send_json_success(['message' => esc_html__('Form settings copied', 'contact-form-z'), 'id' => $insert_id]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_save_recaptcha(){

        $this->zcform_check_role('publish_pages');

        $key = isset($_POST['key']) && !empty($_POST['key']) ? sanitize_text_field($_POST['key']) : '';
        $secret_key = isset($_POST['secret_key']) && !empty($_POST['secret_key']) ? sanitize_text_field($_POST['secret_key']) : '';

        if(empty($key)){
            wp_send_json_error(['message' => esc_html__('Key not specified', 'contact-form-z')]);
        }

        if(empty($secret_key)){
            wp_send_json_error(['message' => esc_html__('The secret key is not specified', 'contact-form-z')]);
        }

        $res = ZCForm_Static::zcform_update_settings('recaptcha', ['key' => $key, 'secret_key' => $secret_key]);

        if(!$res){
            wp_send_json_error(['message' => esc_html__('Failed to save keys', 'contact-form-z')]);
        }

        wp_send_json_success(['message' => esc_html__('Keys saved', 'contact-form-z')]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_load_report(){

        $this->zcform_check_role('publish_pages');

        $start = isset($_POST['start']) && !empty($_POST['start']) ? strtotime(sanitize_text_field($_POST['start'])) : strtotime();
        $end = isset($_POST['end']) && !empty($_POST['end']) ? strtotime(sanitize_text_field($_POST['end'])) : strtotime();
        $form_id = isset($_POST['form_id']) && !empty($_POST['form_id']) ? sanitize_key($_POST['form_id']) : 0;
        $type = isset($_POST['type']) && !empty($_POST['type']) ? sanitize_key($_POST['type']) : 'vew_report';

        $start = date('Y-m-d H:i', $start);
        $end = date('Y-m-d H:i', $end);

        if(empty($start) || empty($end) || empty($form_id)){
            wp_send_json_error(['message' => esc_html__('Not all options were selected', 'contact-form-z')]);
        }

        $reports_data = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT 
                    CASE d.ttype WHEN 1 THEN fl.patterns WHEN 2 THEN flh.patterns END patterns, 
                    fs.data_patterns, 
                    fs.add_date, 
                    fs.id
                FROM (
                SELECT MAX(f.id) form_id, f.ttype, s.id sid
                                FROM wp_zcf_form_save s
                                LEFT JOIN (
                                    SELECT id form_id, id, add_date, 1 ttype FROM wp_zcf_form_list 
                                    WHERE id = %d AND add_date <= %s
                                    UNION
                                    SELECT form_list_id, id, add_date, 2 FROM wp_zcf_form_list_history 
                                    WHERE form_list_id = %d AND add_date <= %s
                                ) f ON f.form_id=s.form_list_id AND f.add_date <= s.add_date
                                WHERE s.add_date >= %s AND s.add_date <= %s AND s.form_list_id = %d
                                GROUP BY 2,3
                ) d
                LEFT JOIN wp_zcf_form_list fl ON fl.id=d.form_id AND d.ttype=1
                LEFT JOIN wp_zcf_form_list_history flh ON flh.id=d.form_id AND d.ttype=2
                LEFT JOIN wp_zcf_form_save fs ON fs.id=d.sid
                ORDER BY d.ttype, fs.add_date;", [$form_id, $end, $form_id, $end, $start, $end, $form_id]
            )
            , ARRAY_A
        );

        if(is_null($reports_data) || count($reports_data) === 0){
            wp_send_json_error(['message' => esc_html__('No data for the selected period', 'contact-form-z')]);
        }

        $data = [
            'title' => [],
            'row' => []
        ];
        $template = [];
        $list_id = [];
        $num = 0;

        // Create Title
        foreach($reports_data as $d){

            if(in_array($d['id'], $list_id))
                continue;
            $list_id[] = $d['id'];

            $title = json_decode($d['patterns'], true);
            foreach($title as $tkey => $tvalue){

                if(!isset($data['title'][$tkey])){
                    $data['title'][$tkey] = $tvalue;
                    $template[$tkey] = '';
                }
            }
        }

        // Create List
        foreach($reports_data as $d){

            if(isset($data['row'][$d['id']]))
                continue;
            $num = $d['id'];

            $row = json_decode($d['data_patterns'], true);
            $data['row'][$num] = $template;
            foreach($row as $rkey => $rvalue){


                if(isset($data['title'][$rkey]['list']) && is_array($rvalue)){
                    // Checkbox, Select Multiple
                    $data['row'][$num][$rkey] = [];

                    foreach($rvalue as $value){
                        $data['row'][$num][$rkey][] = isset($data['title'][$rkey]['list'][$value]) ? $data['title'][$rkey]['list'][$value] : '';
                    }
                }elseif(isset($data['title'][$rkey]['list']) && !is_array($rvalue)){
                    // Select, Radio
                    $data['row'][$num][$rkey] = isset($data['title'][$rkey]['list'][$rvalue]) ? $data['title'][$rkey]['list'][$rvalue] : '';
                }elseif(!isset($data['title'][$rkey]['list']) && is_array($rvalue)){
                    // File
                    switch($type){
                        case 'vew_report':
                            $data['row'][$num][$rkey] = [];

                            foreach($rvalue as $key => $value){
                                $data['row'][$num][$rkey][] = "<a href='{$value}'>".(esc_html__('File', 'contact-form-z'))." ".($key + 1)."</a>";
                            }
                            break;
                        case 'create_excel':
                            $data['row'][$num][$rkey] = count($rvalue).' '.esc_html__('files', 'contact-form-z');
                            break;
                    }
                }else{
                    // Other
                    $data['row'][$num][$rkey] = $rvalue;
                }
            }
            $data['row'][$num]['add_date'] = mysql2date(ZCFORM_DATE_FORMAT.' '.ZCFORM_TIME_FORMAT, $d['add_date']);
        }
        $data['title']['add_date']['name'] = esc_html__('Date added', 'contact-form-z');


        wp_send_json_success(['d' => $data, 'title' => esc_html__('The form', 'contact-form-z').' #'.$form_id, 'title_time' => "{$start} - {$end}"]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_get_template(){

        $this->zcform_check_role('publish_pages');

        require ZCFORM_PLUGIN_DIR.'/admin/partials/template/contact-form-z-template-form.php';

        wp_die();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_math_captcha(){

        header("Content-type: text/plain");
        echo ZCForm_Static::zcform_math_captcha();

        wp_die();
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_check_mail(){

        $mail = isset($_POST['mail']) && !empty($_POST['mail']) ? $_POST['mail'] : '';
        $check = isset($_POST['check']) && !empty($_POST['check']) ? filter_var(sanitize_text_field($_POST['check']), FILTER_VALIDATE_BOOLEAN) : false;
        $res = ZCForm_Static::zcform_check_mail_block($mail, $check);

        wp_send_json_success(['state' => (!$res ? false : true), 'msg' => $res]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------

    public function zcform_callback_send_form(){

        $form_id = isset($_POST['form_id']) && !empty($_POST['form_id']) ? sanitize_key($_POST['form_id']) : 0;
        $generate_id = isset($_POST['generate_id']) && !empty($_POST['generate_id']) ? sanitize_text_field($_POST['generate_id']) : '';

        if(empty($form_id) || empty($generate_id)){
            wp_send_json_error(['message' => esc_html__('Failed to get data. Please refresh the page and try again', 'contact-form-z')]);
        }

        $res_form = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT fields, mail, message, options, field_patterns FROM {$this->prefix}zcf_form_list WHERE id = %d;", $form_id
            )
            , ARRAY_A, 0
        );

        if(is_null($res_form)){
            wp_send_json_error(['message' => esc_html__('Submitted form not found. Please update and try again', 'contact-form-z')]);
        }

        $fields = json_decode($res_form['fields'], true);
        $message = json_decode($res_form['message'], true);
        $options = json_decode($res_form['options'], true);
        $error = [];
        $error_global = [];
        $save = [];
        $tmp_file = [];
        $patterns = [];
        $content_akismet = [];

        foreach($fields as $f){

            $key = !is_null(key($f)) ? key($f) : '';
            $data = is_array($f[$key]) ? $f[$key] : [];

            if(isset($data[$key.'_hide']) && $data[$key.'_hide'])
                continue;

            $rank = (isset($data[$key.'_rank']) ? $data[$key.'_rank'] : 0);
            $generate_key = $rank.'_'.$generate_id;
            $generate_rank = $key.'_'.$rank.'_'.$generate_id;
            $value = is_array($_POST[$key][$generate_key]) ? $_POST[$key][$generate_key] : sanitize_text_field($_POST[$key][$generate_key]);
            if(!in_array($key, ['file', 'accept'])){
                $content_akismet[] = (is_array($value) ? implode(',', $value) : $value);
            }

            $f_required = (!isset($_POST[$key][$generate_key]) || $value === '') && $data[$key.'_required'] && $key !== 'file';

            if($f_required){

                $error[$generate_rank][] = $message['msg_field_required'];
                $error_global['required'] = $message['msg_form_required'];
            }

            if(!isset($_FILES[$key]['name'][$generate_key]) && isset($data['file_required']) && $data['file_required']){

                $error[$generate_rank][] = $message['msg_field_required'];
                $error_global['required'] = $message['msg_form_required'];
            }



            switch($key){

                case 'text':

                    if(!empty($data[$key.'_length_min'])){
                        if(
                            (mb_strlen($value) < $data[$key.'_length_min'] && $data['text_field_type'] !== 'number') ||
                            ($value < $data[$key.'_length_min'] && $data['text_field_type'] === 'number')
                        ){
                            $error[$generate_rank][] = $message['msg_min_value'];
                        }
                    }

                    if(!empty($data[$key.'_length_max'])){
                        if(
                            (mb_strlen($value) > $data[$key.'_length_max'] && $data['text_field_type'] !== 'number') ||
                            ($value > $data[$key.'_length_max'] && $data['text_field_type'] === 'number')
                        ){
                            $error[$generate_rank][] = $message['msg_max_value'];
                        }
                    }

                    $field = 0;

                    switch($data['text_field_type']){
                        case 'number':

                            $field += (!empty($value) && !ctype_digit($value));

                            break;
                        case 'email':

                            $field += (!is_email($value) && !empty($value));

                            break;
                        case 'tel':

                            $phone = mb_strlen(preg_replace("/[^0-9]/", "", $value));
                            $field += (($phone < 4 || $phone > 15) && !empty($value) ? 1 : 0);

                            break;
                        case 'url':

                            $field += (!get_headers($value, 1) && !empty($value));

                            break;
                    }

                    if($field > 0){

                        $error[$generate_rank][] = $message['msg_field_not_completed'];
                    }

                    break;
//--------------------------------------------------------------------------------------------------
                case 'datetime':

                    // VALID DATETIME-------------------------------------------------------------------------

                    if($f_required){

                        switch($data['datetime_format']){
                            case '1':

                                $d = ZCFORM_DATE_FORMAT;
                                $t = ZCFORM_TIME_FORMAT;

                                break;
                            case '2':

                                $d = $data['date_format'];
                                $t = $data['time_format'];

                                break;
                        }

                        switch($data['datetime_field_type']){
                            case 'date':

                                $format = $d;

                                break;
                            case 'time':

                                $format = $t;

                                break;
                            case 'datetime':

                                $format = $d.' '.$t;

                                break;
                        }

                        if(!ZCForm_Static::zcform_validate_date($value, $format)){
                            $error[$generate_rank][] = $message['msg_field_not_completed'];
                        }
                    }

                    $max = $min = 0;

                    // MIN DATETIME---------------------------------------------------------------------------
                    switch($data['date_min_limit']){
                        case '1':

                            if(!empty($data['date_min_value']) || !empty($data['time_min_value'])){
                                $min += strtotime($data['date_min_value'].' '.$data['time_min_value']) > strtotime($value);
                            }

                            break;
                        case '2':

                            $now = strtotime($value);

                            switch($data['datetime_field_type']){
                                case 'date':

                                    $now = strtotime(date('Y-m-d'));

                                    break;
                                case 'time':

                                    $now = strtotime('1970-01-01 '.date('H:i'));

                                    break;
                                case 'datetime':

                                    $now = strtotime();

                                    break;
                            }

                            $min += $now > strtotime($value);

                            break;
                        case '3':

                            $now = strtotime($value);
                            $zcf_interval_days = (empty($data['datetime_min_days']) ? 0 : $data['datetime_min_days'] * 86400);
                            $zcf_interval_minutes = (empty($data['datetime_min_minutes']) ? 0 : $data['datetime_min_minutes'] * 60);

                            switch($data['datetime_field_type']){
                                case 'date':

                                    $now = strtotime(date('Y-m-d')) + $zcf_interval_days;

                                    break;
                                case 'time':

                                    $now = strtotime('1970-01-01 '.date('H:i')) + $zcf_interval_minutes;

                                    break;
                                case 'datetime':

                                    $now = strtotime() + $zcf_interval_days + $zcf_interval_minutes;

                                    break;
                            }

                            $min += $now > strtotime($value);

                            break;
                    }

                    if($min > 0){

                        $error[$generate_rank][] = $message['msg_min_value'];
                    }

                    // MAX DATETIME---------------------------------------------------------------------------
                    switch($data['date_max_limit']){
                        case '1':

                            if(!empty($data['date_max_value']) || !empty($data['time_max_value'])){
                                $max += strtotime($data['date_max_value'].' '.$data['time_max_value']) < strtotime($value);
                            }

                            break;
                        case '2':

                            $now = strtotime($value);

                            switch($data['datetime_field_type']){
                                case 'date':

                                    $now = strtotime(date('Y-m-d'));

                                    break;
                                case 'time':

                                    $now = strtotime('1970-01-01 '.date('H:i'));

                                    break;
                                case 'datetime':

                                    $now = strtotime();

                                    break;
                            }

                            $max += $now < strtotime($value);

                            break;
                        case '3':

                            $now = strtotime($value);
                            $zcf_interval_days = (empty($data['datetime_max_days']) ? 0 : $data['datetime_max_days'] * 86400);
                            $zcf_interval_minutes = (empty($data['datetime_max_minutes']) ? 0 : $data['datetime_max_minutes'] * 60);

                            switch($data['datetime_field_type']){
                                case 'date':

                                    $now = strtotime(date('Y-m-d')) + $zcf_interval_days;

                                    break;
                                case 'time':

                                    $now = strtotime('1970-01-01 '.date('H:i')) + $zcf_interval_minutes;

                                    break;
                                case 'datetime':

                                    $now = strtotime() + $zcf_interval_days + $zcf_interval_minutes;

                                    break;
                            }

                            $max += $now < strtotime($value);

                            break;
                    }

                    if($max > 0){

                        $error[$generate_rank][] = $message['msg_max_value'];
                    }


                    break;
//--------------------------------------------------------------------------------------------------
                case 'textarea':

                    if(mb_strlen($value) < $data[$key.'_length_min'] && !empty($data[$key.'_length_min'])){

                        $error[$generate_rank][] = $message['msg_min_value'];
                    }

                    if(mb_strlen($value) > $data[$key.'_length_max'] && !empty($data[$key.'_length_max'])){

                        $error[$generate_rank][] = $message['msg_max_value'];
                    }

                    break;
//--------------------------------------------------------------------------------------------------
                case 'select':

                    if(count($value) < $data[$key.'_min_count_check'] && !empty($data[$key.'_min_count_check'])){

                        $error[$generate_rank][] = $message['msg_min_value'];
                    }

                    if(count($value) > $data[$key.'_max_count_check'] && !empty($data[$key.'_max_count_check'])){

                        $error[$generate_rank][] = $message['msg_max_value'];
                    }

                    break;
//--------------------------------------------------------------------------------------------------
                case 'checkbox':

                    if(count($value) < $data[$key.'_min_count_check'] && !empty($data[$key.'_min_count_check'])){

                        $error[$generate_rank][] = $message['msg_min_value'];
                    }

                    if(count($value) > $data[$key.'_max_count_check'] && !empty($data[$key.'_max_count_check'])){

                        $error[$generate_rank][] = $message['msg_max_value'];
                    }

                    break;
//--------------------------------------------------------------------------------------------------
                case 'radio':



                    break;
//--------------------------------------------------------------------------------------------------
                case 'accept':

                    if((empty($value) && $data[$key.'_condition']) || (!empty($value) && !$data[$key.'_condition'])){

                        $error[$generate_rank][] = $message['msg_accept'];
                    }

                    break;
//--------------------------------------------------------------------------------------------------
                case 'file':

                    if(!isset($_FILES))
                        break;

                    foreach($_FILES[$key]['error'][$generate_key] as $error_file){
                        if($error_file !== 0){
                            $error[$generate_rank][] = $message['msg_load_file'];
                            break 2;
                        }
                    }

                    if(!empty($data['file_type'])){

                        $file_type_list = explode(',', preg_replace("/\s+/", "", $data['file_type']));

                        foreach($_FILES[$key]['name'][$generate_key] as $name){

                            $ext = pathinfo($name, PATHINFO_EXTENSION);

                            if(!in_array($ext, $file_type_list)){
                                $error[$generate_rank][] = $message['msg_load_file'];
                                break 2;
                            }
                        }
                    }

                    if(!empty($data['file_size'])){

                        $file_size = $data['file_size'] * 1024 * 1024;

                        foreach($_FILES[$key]['size'][$generate_key] as $size){

                            if($size > $file_size){
                                $error[$generate_rank][] = $message['msg_load_file'];
                                break 2;
                            }
                        }
                    }

                    break;
            }

            if(in_array($key, ['button', 'recaptcha']))
                continue;

            if($key === 'file'){
                $tmp_file[$rank]['tmp_name'] = $_FILES[$key]['tmp_name'][$generate_key];
                $tmp_file[$rank]['name'] = $_FILES[$key]['name'][$generate_key];
                $tmp_file[$rank]['file_type'] = $_FILES[$key]['file_type'][$generate_key];
                $tmp_file[$rank]['size'] = $_FILES[$key]['size'][$generate_key];
            }else{
                $save[$key][$rank] = $value;
                $patterns[$key.'_'.$rank] = $value;
            }
        }

        if(count($error) > 0){
            $error_global['completed'] = $message['msg_not_completed'];
            wp_send_json_error(['error' => $error, 'error_global' => ['error' => implode('<br>', $error_global), 'generate_id' => $generate_id]]);
        }

        // Akismet
        if(isset($options['akismet']['enable_akismet'])){
            if(ZCForm_Static::zcform_akismet_http($options['akismet'], $content_akismet, $_POST, $generate_id)){
                wp_send_json_error(['error_global' => ['error' => esc_html__('Sent data is defined as spam', 'contact-form-z'), 'generate_id' => $generate_id]]);
            }
        }

// Check Math CAPTCHA
//----------------------------------------------------------------------------------------------------------------
        if($options['mathcaptcha']){

            session_start();

            if($_SESSION['rand_code0_'.$generate_id] != $_POST['mathcaptcha']){
                wp_send_json_error(['error_global' => ['error' => esc_html__('Mathematical expression is incorrect. Are you human?', 'contact-form-z'), 'generate_id' => $generate_id]]);
            }
        }

// Check reCAPTCHA
//----------------------------------------------------------------------------------------------------------------
        if($options['recaptcha']){

            require_once plugin_dir_path(dirname(__FILE__)).'includes/class-'.ZCFORM_PLUGIN_NAME.'-recaptcha.php';

            $secret = ZCForm_Static::zcform_get_settings('recaptcha')['secret_key'];

            $response = null;

            $reCaptcha = new ZCForm_ReCaptcha($secret);

            if(!empty($_POST['g-recaptcha-response'])){
                $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $value);
            }

            if($response === null && !$response->success){
                wp_send_json_error(['error_global' => ['error' => esc_html__('reCAPTCHA verification failed', 'contact-form-z'), 'generate_id' => $generate_id]]);
            }
        }

// Save File
//----------------------------------------------------------------------------------------------------------------
        /* && ($options['send_mail'] || $options['save_form']) */
        if(count($tmp_file) > 0){

            require_once( ABSPATH.'wp-admin/includes/file.php');

            foreach($tmp_file as $key_rank => $fl){

                foreach($fl['tmp_name'] as $tmp_key => $tmp_name){

                    $ext = pathinfo($fl['name'][$tmp_key], PATHINFO_EXTENSION);
                    $path = str_replace(['.', ','], '', microtime(true)).'.'.$ext;

                    $results = wp_upload_bits($path, null, file_get_contents($tmp_name));

                    if(!$results['error']){
                        $save['file'][$key_rank][$tmp_key] = $results['file'];
                        $patterns['file_'.$key_rank][$tmp_key] = parse_url($results['url'], PHP_URL_PATH);
                    }
                }
            }
        }

// Send Mail
//----------------------------------------------------------------------------------------------------------------
        //if($options['send_mail']){

        $mail = json_decode($res_form['mail'], true);
        $field_patterns = json_decode($res_form['field_patterns'], true);
        $search_mail = [];
        $replace_mail = [];

        foreach($field_patterns as $pfield => $pval){

            if(in_array($pfield, ['file', 'accept']))
                continue;

            foreach($pval as $prank => $p){

                $search_mail[] = "[{$pfield}-{$prank}]";
                $psave = $save[$pfield][$prank];

                if(isset($psave) && !is_null($psave)){

                    if(is_array($psave)){
                        $tmp_arr = [];
                        foreach($psave as $v){
                            $tmp_arr[] = $p['list'][$v];
                        }
                        $tmp_val = implode(', ', $tmp_arr);
                    }elseif(isset($p['list'])){
                        $tmp_val = $p['list'][$psave];
                    }else{
                        $tmp_val = $psave;
                    }
                }

                $replace_mail[] = $tmp_val;
            }
        }
        //wp_send_json_error(['replace_mail' => $replace_mail, 'save' => $save, 'field_patterns' => $field_patterns]);
        foreach($mail as $vm){

            if(empty(trim($vm['whom'])))
                continue;

            remove_all_filters('wp_mail_from');
            remove_all_filters('wp_mail_from_name');

            $headers = [];
            $attachments = [];

            $to = explode(',', preg_replace("/\s+/", "", str_replace($search_mail, $replace_mail, $vm['whom'])));

            $subject = empty(trim($vm['subject'])) ? esc_html__('Letter from', 'contact-form-z')." Contact Form Z #$form_id" : str_replace($search_mail, $replace_mail, $vm['subject']);

            $msg_mail = '<pre>'.str_replace($search_mail, $replace_mail, $vm['body_mail']).'</pre>';

            if(!empty(trim($vm['from']))){
                $headers[] = "From: Contact Form Z #$form_id <".str_replace($search_mail, $replace_mail, $vm['from']).">";
            }
            if(!empty(trim($vm['reply-to']))){
                $headers[] = "Reply-To: <".str_replace($search_mail, $replace_mail, $vm['reply-to']).">";
            }
            $headers[] = "Content-type: text/html; charset=utf-8";

            foreach($vm['files'] as $frank){

                if(isset($save['file'][$frank]) && count($save['file'][$frank]) > 0){
                    $attachments = array_merge($attachments, $save['file'][$frank]);
                }
            }

            if(!wp_mail($to, $subject, $msg_mail, $headers, $attachments)){
                ZCForm_Static::zcform_delite_files($save);
                wp_send_json_error(['error_global' => ['error' => $message['msg_not_send'], 'generate_id' => $generate_id]]);
            }
        }
        //}
// Save Data
//----------------------------------------------------------------------------------------------------------------
//        if($options['save_form']){

        $save_table = "{$this->prefix}zcf_form_save";
        $save_data = [
            'form_list_id' => $form_id,
            'data_patterns' => json_encode($patterns)
        ];
        $save_value = ['%d', '%s'];

        $res = $this->wpdb->insert($save_table, $save_data, $save_value);
        if(!$res){
            ZCForm_Static::zcform_delite_files($save);
            wp_send_json_error(['error_global' => ['error' => $message['msg_not_send'], 'generate_id' => $generate_id]]);
        }
//        }else{
//            ZCForm_Static::zcform_delite_files($save);
//        }
// Generate Redirect Link
//----------------------------------------------------------------------------------------------------------------

        $link = '';

        if(!empty($options['redirection_rules'])){

            switch($options['redirection_rules']){
                case 'one';

                    $link = $options['one_page'];

                    break;
                case 'more':

                    foreach($options['list'] as $key => $value){

                        list($r_field, $r_node_p, $r_node_c) = explode('_', $value['more_page_list']);

                        if(isset($save[$r_field][$r_node_p]) && $save[$r_field][$r_node_p] !== ''){
                            if((is_array($save[$r_field][$r_node_p]) && in_array($r_node_c, $save[$r_field][$r_node_p])) || $save[$r_field][$r_node_p] == $r_node_c){
                                $link = $value['more_page_url'];
                                break;
                            }
                        }
                    }


                    break;
            }
        }


        wp_send_json_success(['generate_id' => $generate_id, 'link' => $link, 'message' => $message['msg_send']]);
    }

    //----------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------
}

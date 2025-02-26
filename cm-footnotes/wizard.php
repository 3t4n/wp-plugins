<?php

use com\cminds\footnotes\settings\CMF_Settings;

class CMF_SetupWizard{

    //Common functions

    public static $steps = [
        1 => ['title' => 'Displaying Footnotes',
            'options' => [
                0 => [
                    'name' => 'cmf_footnoteOnPosttypes',
                    'title' => 'Choose post types in which to enable footnotes',
                    'type' => 'multicheckbox',
                    'value'   => ['post'],
                    'options' => [__CLASS__,'getPostTypes'],
                    'hint' => 'Select the types of posts or pages on your site where footnotes will appear.'
                ],
                1 => [
                    'name' => 'cmf_footnoteInOneLine',
                    'title' => 'How should footnote definitions be displayed',
                    'type' => 'radio',
                    'options' => [
                        0 => [
                            'title' => 'Each definition on a separate line',
                            'value' => 1
                        ],
                        1 => [
                            'title' => '3 columns with definitions',
                            'value' => 0
                        ],
                    ],
                    'hint' => 'Choose the layout for displaying footnote definitions at the bottom of the page or post.'
                ],
            ],
            'content' => "<div style='display: flex; gap: 15px; margin-top: 30px; text-align: center;'>
                <label for='cmf_footnoteInOneLine_1'>
                    <div class='cm_wizard_image_holder'>
                        <img class='cmf_footnoteInOneLine_1' src='" . CMF_PLUGIN_URL . "assets/images/wizard_step_1_1.png' width='350px' data-value='1'/>
                    </div>
                    <span>Each definition on a separate line</span>
                </label>
                <label for='cmf_footnoteInOneLine_0'>
                    <div class='cm_wizard_image_holder'>
                        <img class='cmf_footnoteInOneLine_0' src='" . CMF_PLUGIN_URL . "assets/images/wizard_step_1_2.png' width='350px' data-value='0'/>
                    </div>
                    <span>3 columns with definitions</span>
                </label></div>"
        ],
        2 => ['title' =>'Footnote Link Style',
            'options' => [
                0 => [
                    'name' => 'cmf_footnoteSymbolSize',
                    'title' => 'Size (in pixels)',
                    'type' => 'int',
                    'value' => 12,
                    'hint' => 'Set the size of the footnote link text.'
                ],
                1 => [
                    'name' => 'cmf_footnoteSymbolColor',
                    'title' => 'Color',
                    'type' => 'color',
                    'value' => '#ff990a',
                    'hint' => 'Choose the color for footnote links.'
                ],
                2 => [
                    'name' => 'cmf_footnoteFormat',
                    'title' => 'Font Style',
                    'type' => 'select',
                    'options' => [
                        0 => [
                            'title' => 'None',
                            'value' => 'none'
                        ],
                        1 => [
                            'title' => 'Bold',
                            'value' => 'bold'
                        ],
                        2 => [
                            'title' => 'Italic',
                            'value' => 'italic'
                        ],
                    ],
                    'hint' => 'Select a font style for footnote links.'
                ],
            ],
            'content'   =>"<div class='form-group cmf_footnote_link_preview_box'>
                                <label class='label'>Preview</label>
                                <div class='link_preview'>
                                    <p>Example
                                        <span class='cmf_has_footnote'>
                                            <sup>
                                                <a href='#' class='cmf_footnote_link type1'>1</a>
                                            </sup>
                                        </span>
                                    </p>
                                </div>
                            </div>"
        ],
        3 => ['title' =>'Footnote Link Anchor Style',
            'options' => [
                0 => [
                    'name' => 'cmf_footnoteSymbolLinkAnchorSize',
                    'title' => 'Size (in pixels)',
                    'type' => 'int',
                    'value' => 12,
                    'hint' => 'Set the size of the footnote anchors that appear in the footnote section below the post content.'
                ],
                1 => [
                    'name' => 'cmf_footnoteSymbolLinkAnchorColor',
                    'title' => 'Color',
                    'type' => 'color',
                    'value' => '#000000',
                    'hint' => 'Choose the color of the footnote anchor.'
                ],
            ],
            'content' => "<div class='form-group cmf_footnote_anchor_preview_box' id='cmfSimpleFootnoteDefinitionBox' style='grid-template-columns: 35% 65%'>
                                <label class='label'>Preview</label>
                                <div class='anchor_preview cmfSimpleFootnoteDefinitionItem' style='width: 100%; display: inline-flex;'>
                                    <span class='cmfSimpleFootnoteDefinitionItemId'>1. </span>
                                    <span class='cmfSimpleFootnoteDefinitionItemContent'>Footnote definition example.</span>
                                </div>
                            </div>"
        ],
        4 => ['title' =>'Creating Footnotes',
            'content' => "<p>Footnotes are added individually to each post or page.</p>
            <p>To create footnotes, open the post or page you want to edit, scroll down, and locate the \"CM Footnotes - Definitions\" metabox. Here, you can:</p>
            <ul style='list-style:pointer; padding: 0 15px; margin: 0; line-height: 1em;'>
                <li>Set a unique ID for each footnote.</li>
                <li>Enter the text for the footnote definition.</li>
                <li>Remove an existing footnote definition if needed.</li>
                <li>Add new foornote definitions.</li>
            </ul><br/>
            <div class='cm_wizard_image_holder'>
                <a href='". CMF_PLUGIN_URL . "assets/images/wizard_step_4.png' target='_blank'>
                    <img src='" . CMF_PLUGIN_URL . "assets/images/wizard_step_4.png' width='750px'/>
                </a>
            </div>"],
        5 => ['title' =>'Adding Footnotes to Content',
            'content' => "<p>You can now insert footnotes directly into your content.</p>
            <p>Use the shortcode [cm_simple_footnote id=\"x\"], where \"x\" is a footnote ID.</p>
            <ul style='list-style:pointer; padding: 0 15px; margin: 0; line-height: 1em;'>
                <li>Place shortcodes with the relevant IDs next to the terms you want to annotate.</li>
                <li>Click the button \"Update\" to save the changes.</li>
                <li>Optionally, you can disable displaying footnotes on the current page.</li>
            </ul><br/>
            <div class='cm_wizard_image_holder'>
                <a href='". CMF_PLUGIN_URL . "assets/images/wizard_step_5.png' target='_blank'>
                    <img src='". CMF_PLUGIN_URL . "assets/images/wizard_step_5.png' width='750px'/>
                </a>
            </div>"],
    ];

    public static $slug = 'cmf';

    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'add_submenu_page'),30);
        add_action('wp_ajax_cmf_save_wizard_options',[__CLASS__,'saveOptions']);
        add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueueAdminScripts' ] );
        add_action( 'admin_print_styles', [ __CLASS__, 'printAdminStyles' ] );
    }

    public static function add_submenu_page(){
        if(CMF_Settings::get('cmf_footnoteAddWizardMenu', 1)){
            add_submenu_page( CMF_MENU_OPTION, 'Setup Wizard', 'Setup Wizard', 'manage_options', self::$slug . '_setup_wizard',[__CLASS__,'renderWizard'],20 );
        }
    }

    public static function printAdminStyles(){
        $screen = get_current_screen();
        if ($screen && $screen->id === 'cm-footnotes_page_cmf_setup_wizard') {
            wp_add_inline_style('footnote', CMF_Free::cmf_footnote_dynamic_css());
        }
    }

    public static function enqueueAdminScripts(){
        $screen = get_current_screen();

        if ($screen && $screen->id === 'cm-footnotes_page_cmf_setup_wizard') {
            wp_enqueue_style('wizard-css', CMF_PLUGIN_URL . 'assets/css/wizard.css');
            wp_enqueue_script('wizard-js', CMF_PLUGIN_URL . 'assets/js/wizard.js');
            wp_localize_script('wizard-js', 'wizard_data', ['ajaxurl' => admin_url('admin-ajax.php')]);
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');
        }
    }

    public static function renderWizard(){
        require 'views/backend/wizard.php';
    }

    public static function renderSteps(){
        $output = '';
        $steps = self::$steps;
        foreach($steps as $num => $step){
            $output .= "<div class='cm-wizard-step step-{$num}' style='display:none;'>";
            $output .= "<h1>" . self::getStepTitle($num) . "</h1>";
            $output .= "<div class='step-container'>
                            <div class='cm-wizard-menu-container'>" . self::renderWizardMenu($num)." </div>";
            $output .= "<div class='cm-wizard-content-container'>";
            if(isset($step['options'])){
                $output .= "<form>";
                $output .= wp_nonce_field('wizard-form');
                foreach($step['options'] as $option){
                    $output .=  self::renderOption($option);
                }
                $output .= "</form>";
            }
            if (isset($step['content'])){
                $output .= $step['content'];
            }
            $output .= '</div></div>';
            $output .= self::renderStepsNavigation($num);
            $output .= '</div>';
        }
        return $output;
    }

    public static function renderStepsNavigation($num){
        $settings_url = admin_url( 'admin.php?page='. CMF_MENU_OPTION );
        $output = "<div class='step-navigation-container'>
            <button class='prev-step' data-step='{$num}'>Previous</button>";
        if($num == count(self::$steps)){
            $output .= "<button class='finish' onclick='window.location.href = \"$settings_url\" '>Finish</button>";
        } else {
         $output .= "<button class='next-step' data-step='{$num}'>Next</button>";
        }
        $output .= "<p><a href='$settings_url'>Skip the setup wizard</a></p></div>";
        return $output;
    }

    public static function renderOption($option){
        switch($option['type']) {
            case 'bool':
                return self::renderBool($option);
            case 'int':
                return self::renderInt($option);
            case 'string':
                return self::renderString($option);
            case 'radio':
                return self::renderRadioSelect($option);
            case 'select':
                return self::renderSelect($option);
            case 'color':
                return self::renderColor($option);
            case 'multicheckbox':
                return self::renderMulticheckbox($option);
        }
    }

    public static function renderBool($option){
        $checked = checked($option['value'],CMF_Settings::get( $option['name'] ),false);
         $output = "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
        if($option['value'] === 1 || $option['value'] === 0 ){
            $oposite_val = intval(!$option['value']);
            $output .= "<input type='hidden' name='{$option['name']}' value='{$oposite_val}'>";
        }
        $output .= "<input type='checkbox' id='{$option['name']}' name='{$option['name']}' class='toggle-input' value='{$option['value']}' {$checked}>
                <label for='{$option['name']}' class='toggle-switch'></label>
            </div>";
        return $output;
    }

    public static function renderInt($option){
        $min = isset($option['min']) ? "min='{$option['min']}'" : '';
        $max = isset($option['max']) ? "max='{$option['max']}'" : '';
        $step = isset($option['step']) ? "step='{$option['step']}'" : '';
        $value = CMF_Settings::get( $option['name'], $option['value']);
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='number' id='{$option['name']}' name='{$option['name']}' value='{$option['value']}' {$min} {$max} {$step}/>
            </div>";
    }

    public static function renderString($option){
        return "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <input type='text' id='{$option['name']}' name='{$option['name']}' value='{$option['value']}'/>
            </div>";
    }

    public static function renderRadioSelect($option){
        $options = $option['options'];
        $output = "<div class='form-group'>
                <label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
            $checked = checked($item['value'],CMF_Settings::get( $option['name'] ),false);
            $output .= "<input type='radio' id='{$option['name']}_{$item['value']}' name='{$option['name']}' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div></div>";
        return $output;
    }

    public static function renderColor($option) {
        ob_start(); ?>
        <script>
            jQuery(function ($) {
                $('input[name="<?php echo esc_attr($option['name']); ?>"]').wpColorPicker({
                    change: function (event, ui) {
                        var element = event.target;
                        var color = ui.color.toString();
                        let preview = $(element).closest('.cm-wizard-step').find('.link_preview');
                        if(preview.length > 0){
                            $('.link_preview .cmf_footnote_link').css('color',color);
                        } else {
                            $('.anchor_preview .cmfSimpleFootnoteDefinitionItemId').css('color',color);
                        }
                    }
                });
            });
        </script> <?php
        $output = ob_get_clean();
        $value = CMF_Settings::get( $option['name'], $option['value']);
        $output .= "<div class='form-group'>
            <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>";
        $output .= sprintf('<input type="text" name="%s" value="%s" />', esc_attr($option['name']), esc_attr($value));
        $output .= "</div>";
        return $output;
    }

    public static function renderSelect($option){
        $options = $option['options'];
    $output = "<div class='form-group'>
                <label for='{$option['name']}' class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <select id='{$option['name']}' name='{$option['name']}'>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
        $selected = selected($item['value'],CMF_Settings::get( $option['name'] ),false);
        $output .= "<option value='{$item['value']}' {$selected}>{$item['title']}</option>";
    }
    $output .= "</select></div>";
        return $output;
}
    public static function renderMulticheckbox($option){
        $options = $option['options'];
        $output = "<div class='form-group'>
                <label class='label'>{$option['title']}<div class='cm_field_help' data-title='{$option['hint']}'></div></label>
                <div>";
        if(is_callable($option['options'], false, $callable_name)) {
            $options = call_user_func($option['options']);
        }
        foreach($options as $item) {
            $checked = in_array($item['value'],CMF_Settings::get( $option['name'] )) ? 'checked' : '';
            $output .= "<input type='checkbox' id='{$option['name']}_{$item['value']}' name='{$option['name']}[]' value='{$item['value']}' {$checked}/>
                <label for='{$option['name']}_{$item['value']}'>{$item['title']}</label><br>";
        }
        $output .= "</div></div>";
        return $output;
    }

    public static function renderWizardMenu($current_step){
        $steps = self::$steps;
        $output = "<ul class='cm-wizard-menu'>";
        foreach ($steps as $key => $step) {
            $num = $key;
            $selected = $num == $current_step ? 'class="selected"' : '';
            $output .= "<li {$selected} data-step='$num'>Step $num: {$step['title']}</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    public static function getStepTitle($current_step){
        $steps = self::$steps;
        $title = "Step {$current_step}: ";
        $title .= $steps[$current_step]['title'];
        return $title;
    }

    //Custom functions

    public static function getPostTypes(){
        $args    = array(
            'public' => true,
        );
        $output_type = 'objects';
        $operator    = 'and';
        $post_types = get_post_types( $args, $output_type, $operator );
        $selected   = CMF_Settings::get( 'cmf_footnoteOnPosttypes' );
        if ( ! is_array( $selected ) ) {
            $selected = array();
        }
        $options = [];
        foreach ( $post_types as $post_type ) {
            $checked = in_array($post_type->name,$selected)? 'checked' :'';
            $options[] = ['title' => $post_type->labels->singular_name,
                'value' => $post_type->name];
        }
        return $options;
    }

    public static function saveOptions(){
        if (isset($_POST['data'])) {
            // Parse the serialized data
            parse_str($_POST['data'], $formData);
            if(!wp_verify_nonce($formData['_wpnonce'],'wizard-form')){
                wp_send_json_error();
            }

            foreach($formData as $key => $value){
                if( !str_contains($key, 'cmf_') ){
                    continue;
                }
                if(is_array($value)){
                    $sanitized_value = array_map('sanitize_text_field', $value);
                    CMF_Settings::set($key, $sanitized_value);
                    continue;
                }
                $sanitized_value = sanitize_text_field($value);
                CMF_Settings::set($key, $sanitized_value);
            }
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }
}

<?php

/**
 * Class for working with Contact From 7 plugin
 * 
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base\Forms;

use \Konfirmi\Base\FormController;

use GFCommon;
use GF_Field;
use GF_Fields;

class GravityForm extends FormController
{
    /**
     * Register the hook for working with CF7 data before sending.
     */  
    public function register()
    {
        if(!in_array('gravityforms/gravityforms.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return null;
        }
        $this->addWidgetInForm();
        $this->enqueueScripts();
    }

    public function validateForm()
    {
        add_filter( 'gform_validation', function ( $validation_result ) {
            $form = $validation_result['form'];
            $validation_result['is_valid'] = false;
            return $validation_result;
        });
    }

    /**
     * Add Konfirmi Widget to Gravity Forms
     */
    public function addWidgetInForm () {
        add_filter( 'gform_add_field_buttons', array($this, 'addFieldKonfirmi') );

        add_action( 'gform_field_standard_settings', array($this, 'addKonfirmiFieldSettings'), 10, 2 );

        add_action( 'gform_editor_js', array($this, 'addEditorScripts') );

        add_filter( 'gform_field_content', array($this, 'showKonfirmiWidged'), 10, 5 );
    }


    /**
     * Add "Konfirmi" button to the form editor.
     *
     * @param array $field_groups The field groups, including group name, label and fields.
     */
    public function addFieldKonfirmi ( $field_groups ) {
        foreach ( $field_groups as &$group ) {
            if ( $group['name'] == 'advanced_fields' ) {
                $group['fields'][] = array(
                    'class'     => 'button',
                    'data-type' => 'konfirmi',
                    'value'     => __( 'Konfrmi', 'gravityforms' ),
                    'onclick'   => "StartAddField('konfirmi');"
                );
                break;
            }
        }

        return $field_groups;
    }

    /**
     * Add settings for 'Konfirmi' field in the form editor 
     *
     * @param int $position The placement of the action being fired
     * @param int $form_id  The current form ID
     */
    public function addKonfirmiFieldSettings ( $position, $form_id ) {
        if ( $position == 50 ) {
            ?>
            <li class="konfirmi_setting field_setting">
                <label for="field_admin_label">
                    <?php _e("Konfirmi plugin ID", "gravityforms"); ?>
                    <?php gform_tooltip("form_field_konfirmi_value") ?>
                </label>
                <input type="number" id="field_konfirmi_value" onchange="SetFieldProperty('value', this.value);" />
            </li>
            <?php
        }
    }

    /**
     * Add scripts for 'Konfirmi' field in the form editor
     */
    public function addEditorScripts (){
        ?>
            <script type='text/javascript'>
                let konfirmi = document.querySelectorAll('.konfirmi-container');
                let titleObj = document.createElement('div');
                titleObj.innerHTML = '<div style="border: 1px solid #ccc;background: white;text-align: center;margin: auto;"><h3>Konfirmi Plugin</h3></div>';

                fieldSettings.konfirmi += ', .label_setting, .konfirmi_setting';
                konfirmi.forEach(el => {
                    el.parentNode.querySelector('.gfield_label').innerText = '';
                    el.parentNode.insertBefore(titleObj, el);
                    el.style.display = 'none';
                })

                jQuery(document).bind("gform_load_field_settings", function(event, field, form){
                    jQuery("#field_konfirmi_value").attr("value", field["value"]);
                });
            </script>
        <?php
    }

    /**
     * Generate Konfirmi Widget HTML code
     *
     * @param string $content    The field content.
     * @param array  $field      The Field Object.
     * @param string $value      The field value.
     * @param int    $lead_id    The entry ID.
     * @param int    $form_id    The form ID.
     */
    public function showKonfirmiWidged ( $content, $field, $value, $lead_id, $form_id ) {
        if ( $field->type == 'konfirmi' ) {
            $id = $field->value;
            if($this->shouldWidgetRender(3, $id)){
                $konfirmi_iframe = do_shortcode("[konfirmi id=\"$id\"]");
                $content = "{$content}{$konfirmi_iframe}";
            }
        }
        return $content;
    }

    /**
    * Init scripts for Konfirmi Plugin
    */
    public function enqueueScripts(){
        $GravityScripts = $this->plugin_url."assets/js/gravity-form.js";
        wp_enqueue_script('gf_scripts', $GravityScripts, array('konfirmi_scripts', 'gform_gravityforms', 'base_class'));
    }
}
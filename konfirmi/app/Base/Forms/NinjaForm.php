<?php

/**
 * Class for working with Ninja Forms
 * 
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base\Forms;
use Konfirmi\Base\FormController;
use Konfirmi\Models\NFKonfirmiField;
use Konfirmi\Base\Forms\ContactForm;
use Ninja_Forms;

class NinjaForm extends FormController
{
  /**
   * Register the hook for working with Ninja Form data before sending.
   */ 
	public function register()
	{
    if(!in_array('ninja-forms/ninja-forms.php', apply_filters('active_plugins', get_option('active_plugins')))) {
      return null;
    }
		add_action('ninja_forms_submit_data', function ($form_data){
      // $form_data = $this->CkeckNFVerify($form_data);
      return $form_data;
		});
    $this->addKonfirmiField();
    $this->handler();
    $this->enqueueScripts();
  }
  
  /**
   * Callback for the Ninja Form hook.
   */
  public function handler() {
    add_action('wp_ajax_nf_verify_status', function () {
      $verifyStatus = intval(sanitize_text_field($_POST['status']));
      if($verifyStatus == "1"){
        echo 'success';
      }
      echo 'fail';
      wp_die();
    });
  }

  /**
   * Add Konfirmi tag, config and code to Ninja Forms
   */
  public function addKonfirmiField() {
    // add konfirmi template
    add_action('ninja_forms_output_templates', function(){
      $konfirmiTemplate = $this->plugin_path . "templates/ninja-templates/" . $this->config['ninjaform']['templateName']. ".html";
      if(file_exists($konfirmiTemplate)){
        echo file_get_contents($konfirmiTemplate);
      }
    });
    // add konfirmi field
    add_filter('ninja_forms_register_fields', function ($fields){
      $fields['konfirmi'] = new NFKonfirmiField;
      return $fields;
    });

    // prosses konfirmi field
    add_filter( 'ninja_forms_localize_field_konfirmi', function( $field ){
      // Change the label setting of the field.
      if($this->shouldWidgetRender(2, $field[ 'settings' ][ 'widget_id' ])){
        $field[ 'settings' ][ 'widget_id' ] = do_shortcode('[konfirmi id="'. $field[ 'settings' ][ 'widget_id' ] .'"]');
        $field[ 'settings' ][ 'label' ] = "";
      } else {
        $field[ 'settings' ][ 'widget_id' ] = "";
        $field[ 'settings' ][ 'label' ] = "";
      }
      return $field;
    });

    // add custom setting for widget ID
    add_filter('ninja_forms_field_settings', function($settings){
      $settings['widget_id'] = array(
        'name' => 'widget_id',
        'type' => 'textbox',
        'label' => __( 'Widget ID', 'ninja-forms'),
        'width' => 'full',
        'group' => 'primary',
        'value' => '',
        'help' => __( 'Enter the id of the Widget.', 'ninja-forms' ),
    );
      return $settings;
    }, 11);

  }

  /**
  * Init scripts for Konfirmi Plugin
  */
  public function enqueueScripts(){
    add_action('wp_enqueue_scripts', function(){
      $NinjaScripts = $this->plugin_url."assets/js/ninja-form.js";
      wp_enqueue_script('nf_scripts', $NinjaScripts, array('konfirmi_scripts', 'nf-front-end', 'base_class'));
    });
  }
}
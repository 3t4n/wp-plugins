<?php

/*
Plugin Name: formafzar 
Plugin URI: https://formafzar.ir
Description:فرم ساز آنلاین
Version: 2.1
Author: instaform.ir
Author URI: https://instaform.ir/
*/

//Shortcode for embeding the form
  $RaveshFormIsCRM='false';
$RaveshFormIsFormican='false';

if (!class_exists("FormAfzar_plugin_Series")) {
    class FormAfzar_plugin_Series
    {
        function __construct()
        {
        }
    }
}

if (class_exists("FormAfzar_plugin_Series")) {
    $dl_pluginSeries = new FormAfzar_plugin_Series();
}

if (isset($dl_pluginSeries)) {


    function FormAfzar_replace_Short_Code($atts)
    {

        extract(shortcode_atts(array(
            "secretcode" => '',
            "formid" => '0',
            "type" => 'inline'
        ), $atts));

        $title="مشاهده‌ی فرم";
            $server = "https://formafzar.ir/";
            $comment="FORMAFZAR FORM BUILDER ---- formafzar.ir";
          $domain=esc_url($secretcode);
if (strpos($domain, 'http://') === 0 || strpos($domain, 'https://') === 0) {
    $domain = substr($domain, strpos($domain, '://') + 3); 
}

 	$scriptUrl = esc_url($server . "pages/formbuilder/ravesh-formbuilder.js");
        $formUrl = esc_url($server . $domain . "/formView/" . $formid); 
       


        $result = "";
        if ($type == "inline") {
            $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"inline\" form-theme=\"\"></script>";
        } else if ($type == "dialog") {
            $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"dialog\" form-link-text=\"" . esc_html($title) . "\" form-theme=\"\"></script>";
        } else if ($type == "fab") {
	    $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"fab\" form-link-text=\"" . esc_html($title) . "\" form-button-color=\"#3f51b5\" form-button-icon=\"" . esc_url($server . "/pages/formbuilder/images/send-icon.png") . "\" form-theme=\"\"></script>";
        } else if ($type == "link") {
 	    $result .= "<a href=\"" . esc_url($formUrl) . "\" target=\"_blank\" form-theme=\"\">" . esc_html($title) . "</a>";
        }
        $result = "\n<!--START---- $comment ----->\n" . $result . "\n<!--END--- $comment ----->\n";

        return $result;
    }

    add_shortcode('FormAfzar', 'FormAfzar_replace_Short_Code');
    function FormAfzar_add_ravesh_button_to_mce()
    {
        // check user permissions
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        // check if WYSIWYG is enabled
        if ('true' == get_user_option('rich_editing')) {
            add_filter('mce_external_plugins', 'add_ravesh_tinymce_plugin');
            add_filter('mce_buttons', 'register_ravesh_mce_button');
        }
    }

    add_action('admin_head', 'FormAfzar_add_ravesh_button_to_mce');
    function add_ravesh_tinymce_plugin($plugin_array)
    {

        $language=get_locale();
        $iconUrl=plugins_url('/', __FILE__ );
        echo "<script type='text/javascript'>var RaveshFormPath='" . esc_url($iconUrl) . "';var RaveshFormLang='" . esc_attr($language) . "';var RaveshFormIsCRM='false';var RaveshFormIsFormican='false'</script>";


         $plugin_array['my_mce_button'] =plugins_url( 'Formafzar_mce_button.js', __FILE__ );
        return $plugin_array;
    }

    function register_ravesh_mce_button($buttons)
    {
        array_push($buttons, 'my_mce_button');
        return $buttons;
    }
}



//Including block files
function loadformafzarFormsBlockFiles() {
  wp_enqueue_script(
    'formafzar-forms-block-js',
    plugin_dir_url(__FILE__) . 'formafzar-block.js',
    array('wp-blocks', 'wp-i18n', 'wp-editor'),
    true
  );
}



add_action('enqueue_block_editor_assets', 'loadformafzarFormsBlockFiles'); 

?>

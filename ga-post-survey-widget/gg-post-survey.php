<?php
/*
* Plugin Name: Google Analytics Post Survey widget
* Plugin URI: http://www.allwebtuts.com/google-analytics-post-survey-widget/
* Description: Be Smart by knowing your feedback through Analytics post survey
* Version: 2.0.3
* Author: Santhosh veer
* Author URI: https://www.allwebtuts.com.
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


//define the plugin version
if (!defined('MY_GGAPOST_SURVEY_VERSION_NUM')){ //define plugin version
    define('MY_GGAPOST_SURVEY_VERSION_NUM', '2.0.3');
}


// register admin script
add_action( 'admin_enqueue_scripts', 'ggsuvy_enqueue_color_picker' );
function ggsuvy_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('gasvy-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Plugin CSS File
add_action('wp_head','ggsur_css');
function ggsur_css() {

$mycolor = get_option('gg_post_survey_choose_color');

$output="<style>
#survey{text-align: center;font-family: arial}
#thanks{clear: both; display: none; }
.show{display: inline !important;}
#survey b, #thanks b{font-size: 20px; display: block;margin-bottom: 20px}
.surveyGrid{width: 48%;margin-top: 10px}
.surveryA{float: left; text-align: right;}
.surveryB{float: right; text-align: left}
.surveryButton{
padding:10px;border: solid 2px $mycolor;
color: $mycolor;
text-decoration: none;
border-radius: 4px 
}
.awtk{font-family: -apple-system, system-ui, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';}
</style>";

echo $output;

}

//Hide the Survey Widget in AMP Pages
add_action( 'amp_post_template_css', 'ggsvry_amp_custom_css_styles' );

function ggsvry_amp_custom_css_styles( $amp_template ) {
// only CSS here please don't use <style> tags
?>

#survey {display:none;}

<?php
}

// Plugin Js File
add_action( 'wp_footer', 'ggsurvey_post_javascript' ); // Write our JS below here
function ggsurvey_post_javascript() { ?>

<script type="text/javascript">
function rankPage(value) 
{

ga('send', {
'hitType': 'event',
'eventCategory': 'Page',
'eventAction': 'Rank',
'eventValue': value
});

}

document.addEventListener('DOMContentLoaded', function() 
{   
[].forEach.call(document.querySelectorAll(".surveryButton"), function(el) {
el.addEventListener("click", function() {
document.getElementById('surveyBlock').style.display = 'none';
document.getElementById('thanks').classList.add('show');
});
});
});

</script>

<?php
}

//plugin open registration
function activate_gg_survey() {
  add_option('gg_post_survet_title', 'Was this article helpful?');
  add_option('gg_post_survey_butone_msg', 'yes Thanks');
  add_option('gg_post_survey_buttwo_msg', 'Not really');
  add_option('gg_post_survey_feedback_titmsg', 'Thanks!');
  add_option('gg_post_survey_feedback_msg', 'Your Will feedback helps us improve our website');
  add_option('gg_post_survey_choose_color', '#1bbc9b');

}

function deactive_gg_survey() {
  delete_option('gg_post_survet_title');
  delete_option('gg_post_survey_butone_msg');
  delete_option('gg_post_survey_buttwo_msg');
  delete_option('gg_post_survey_feedback_titmsg');
  delete_option('gg_post_survey_feedback_msg');
  delete_option('gg_post_survey_choose_color');
 
}

function admin_init_ggpostsurveyregister() {
  register_setting('gg_ppst_clk', 'gg_post_survet_title');
  register_setting('gg_ppst_clk', 'gg_post_survey_butone_msg');
  register_setting('gg_ppst_clk', 'gg_post_survey_buttwo_msg');
  register_setting('gg_ppst_clk', 'gg_post_survey_feedback_titmsg');
  register_setting('gg_ppst_clk', 'gg_post_survey_feedback_msg');
  register_setting('gg_ppst_clk', 'gg_post_survey_choose_color');

}

// plugin option panel
function gg_psurvey_panel_menu() {
  add_options_page('Google Analytics Post Survey widget', 'Google Analytics Post Survey', 'manage_options', 'gg_ppst_clk', 'gg_post_survey_output');
}

// option panel page
function gg_post_survey_output() {
  include( plugin_dir_path( __FILE__ ) .'options.php');
}

// Google Analytics Post Survey - Version 2.0
function survey_my_post($content) {
    
$my_custom_text ='<div id="survey">
<div id="surveyBlock">
<div class="awtk"><b>'.get_option("gg_post_survet_title").'</b></div>
<div class="surveyGrid surveryA awtk"><a href="#gsvone" class="surveryButton" onclick="rankPage(1)">'.get_option('gg_post_survey_butone_msg').'</a></div>
<div class="surveyGrid surveryB awtk"><a href="#gsvtwo" class="surveryButton" onclick="rankPage(-1)">'.get_option('gg_post_survey_buttwo_msg').'</a></div>
</div>
<br />
<div id="thanks">
<b class="awtk">'.get_option('gg_post_survey_feedback_titmsg').'</b>
<b class="awtk">'.get_option('gg_post_survey_feedback_msg').'</b>
</div>
</div>
<br />
<br />';
    
    if(is_single() && !is_home()) {
        $content .= $my_custom_text;
    }
    return $content;
}
add_filter('the_content', 'survey_my_post');

// plugin register hooks
register_activation_hook(__FILE__, 'activate_gg_survey');
register_deactivation_hook(__FILE__, 'deactive_gg_survey');

if (is_admin()) {
  add_action('admin_init', 'admin_init_ggpostsurveyregister');
  add_action('admin_menu', 'gg_psurvey_panel_menu');

}

/* Plugin Setting Page navigation Link */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'gga_optge_links' );

function gga_optge_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'admin.php?page=gg_ppst_clk' ) . '">Plugin Settings</a>',
 );
return array_merge( $links, $mylinks );
}

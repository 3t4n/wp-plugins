<?php
/*
 * Plugin Name:	Dashboard Widgets Control
 * Description:	Displays all registered dashboard widgets and enables to remove them individually for all or for selected roles in order to avoid irritation of clients or other site contributors. When checked indiviually, the dashboard widgets and their related list-items will be highlighted for identification of unknown widget names.
 *
 * Author: Michael Finkenberger
 * Plugin URI: https://de.wordpress.org/plugins/dashboard-widgets-control/
 * Author URI: 
 *
 * Text Domain: dashboard-widgets-control
 * Domain Path: /languages
 *
 * Requires at least: 5.0
 * Tested with: 6.7
 * Requires PHP: 7.4
 *
 * Licence: GPLv2 or later
 *
 * Version: 1.2.2.0
 * Date: 20.11.2023
*/

if(!defined('ABSPATH')){exit();}// no direct access

const MFDWC_WIDGETNAME  = 'dashboard-widgets-control';
const MFDWC_VERSION = '1.2.2.0';
global $mfdwc_hint; // translated (WordPress action hook 'init')



// Provide functionality upon plugin activation
function mfdwc_dashboard_widgets_control_activate() {
  delete_option('mf_dashboard_removal'); // Option from initial version - no longer used
  delete_option('mf_dashboard_removal_roles'); // Option from initial version - no longer used
}
register_activation_hook( __FILE__, 'mfdwc_dashboard_widgets_control_activate' );



// Do some stuff upon plugin deactivation
function mfdwc_dashboard_widgets_control_deactivate() {
  // Nothing, yet...
}
register_deactivation_hook( __FILE__, 'mfdwc_dashboard_widgets_control_deactivate' );



// Clean up upon plugin uninstall
function mfdwc_dashboard_widgets_control_uninstall() {
  
// Delete all options used in the Dashboard Widget Management plugin
  delete_option('mfdwc_removal_context');
  delete_option('mfdwc_removal_roles');
}
register_uninstall_hook( __FILE__, 'mfdwc_dashboard_widgets_control_uninstall' );



// Load the plugin's textdomain to retrieve the translations
function mfdwc_translations() {
  
  $domain = 'dashboard-widgets-control';
  $mfem_locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
  $mfem_mofile = $domain . '-' . $mfem_locale . '.mo'; // determine the correct .mo-file
  $mfem_mopath = WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) . '/languages/';
/* * /
  unload_textdomain( $domain ); // make sure that the WordPress translations are unloaded (This functionality should only used, when the standard mechanism through Wordpress would fail for any reason.)
  if ( !load_textdomain( $domain, $mfem_mopath . $mfem_mofile ) ) // Load the very plugin translations (if they exist for $mfem_locale) as the WP SVN version synchronization seems failing...
    load_plugin_textdomain( $domain, false, basename( dirname( __FILE__ ) ) . '/languages/' ); // else: load WordPress plugin translations from /wp-content/languages/plugins/
/* */
  load_plugin_textdomain( $domain, false, basename( dirname( __FILE__ ) ) . '/languages/' ); // load WordPress plugin translations with normal logic
  
}
add_action( 'init', 'mfdwc_translations' );



function mfdwc_translate_global_strings () {
  global $mfdwc_hint;  // translated

  $mfdwc_hint = __('If needed, the table can be moved horizontally on small screens, using touchscreen swipe or keyboard left/right arrows, once clicked','dashboard-widgets-control');
}
add_action('init', 'mfdwc_translate_global_strings');



// Enqueue plugin style-file
function mfdwc_add_stylesheet() {
  $css_url = plugin_dir_url(__FILE__).'styles/mfdwc.css';
  wp_register_style( 'mfdwc-css', $css_url, array(), MFDWC_VERSION, 'all' );
  wp_enqueue_style( 'mfdwc-css' );
}
add_action( 'admin_enqueue_scripts', 'mfdwc_add_stylesheet' );



// Enqueue plugin tooltip script
function hook_mfdwc_tooltip_script() {
  $js_url = plugin_dir_url(__FILE__).'js/mfdwc_tooltips.js';
  wp_register_script( 'mfdwc_tooltip_script', $js_url, array('jquery'), MFDWC_VERSION, true ); // in the footer to reach the tooltips entered upon $(document).ready()
  wp_enqueue_script( 'mfdwc_tooltip_script' );
}
add_action( 'admin_enqueue_scripts', 'hook_mfdwc_tooltip_script' );  // Just for the admin area



function mfdwc_save_dashboard_widgets_option() {
  if ( isset($_POST['execute_dashboard_widgets_control']) ) {
    $sanitized_widgets_array = array();
    if ( isset($_POST['selected_widgets']) ) foreach ( (array)$_POST['selected_widgets'] as $selected_widget_context ) {
      $widget_data_sanitized = sanitize_text_field($selected_widget_context);
      $widget_name = substr($widget_data_sanitized, 0, strpos($widget_data_sanitized, '|'));
      $widget_context = substr($widget_data_sanitized, strpos($widget_data_sanitized, '|') + 1);
      $sanitized_widgets_array[$widget_name] = $widget_context;
    }
    update_option('mfdwc_removal_context', $sanitized_widgets_array, 'yes');
    
    $sanitized_roles_array = array();
    foreach ( $_POST['selected_roles'] as $selected_widget_roles ) {
      $widget_data_sanitized = sanitize_text_field($selected_widget_roles);
      $widget_name = substr($widget_data_sanitized, 0, strpos($widget_data_sanitized, '|'));
      $widget_role = substr($widget_data_sanitized, strpos($widget_data_sanitized, '|') + 1);
      if ( isset($sanitized_roles_array[$widget_name]) )
        $sanitized_roles_array[$widget_name] .= '|'.$widget_role;
      else
        $sanitized_roles_array[$widget_name]  = $widget_role;
    }
    update_option('mfdwc_removal_roles', $sanitized_roles_array, 'yes');
  }
  
  wp_redirect( esc_url_raw( add_query_arg(
    array(
      'tbd' => null,
    ),
    admin_url( 'index.php' )
  ) ) );
  
  status_header(200); // everything is OK
  exit();             // request-handler should always exit...
}
// Register the function to handle the Dashboard Widget Removal Option including data sanitization
add_action( 'admin_post_mfdwc-save-dashboard-widgets-option', 'mfdwc_save_dashboard_widgets_option' );



function mfdwc_dashboard_add_help_tab() {
  global $mfdwc_hint;  // translated

  if ( ( current_user_can('manage_options') ) && ( $mfdwc_screen = get_current_screen() ) ) {
    
    // The help-tab for the dashboard widget
    $id = 'mfdwc_plugin_help';
    $title = __('Dashboard Widgets Control','dashboard-widgets-control');
    $content  = '<p>'.__('This plugin will register and display a new dashboard widget called Dashboard Widgets Control.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('In order to have full administration control, this plugin will ensure visibility of all dashboard widgets, regardless the display options settings.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('You will find information listed for all registered dashboard widgets plus the WP Welcome Panel.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('Once a checkbox is individually checked, the list item and the related dashboard widget will be highlighted (if currently visible) in order to identify unknown widget names.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('By selecting "All Roles" or individual roles for each widget, you can define widget existence with full granularity. Once you press "Submit...", your selection is stored and executed. Any role selection will be stored for later use, regardless, whether the related widget was checked to disappear or not.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('Pressing "Reset..." will reset the form to its initial state when the page was loaded. Other than upon page load, all selected dashboard widgets and their respective list item will be highlighted (if currently visible).','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('Checking "Select/Deselect all" will select or deselect all dashboard widgets. Again, all selected dashboard widgets and their list items will be highlighted (if currently visible).','dashboard-widgets-control').'</p>';
    $content .= '<p>'.__('Pressing an individual widget ID table cell or the little target symbol in the dashboard widget header will toggle the highlighting of list items and related dashboard widgets (if currently visible) to reveal unknown widget names.','dashboard-widgets-control').'</p>';
    $content .= '<p>'.$mfdwc_hint.'</p>';
    $content .= '<p>'.__('Plugin Version','dashboard-widgets-control').': '.MFDWC_VERSION.'</p>';
    
    $mfdwc_screen->add_help_tab( array( 
     'id' => $id,           // unique id for the tab
     'title' => $title,     // unique visible title for the tab
     'content' => $content, // actual help text
     'callback' => false,   // callback fnuction (not used here)
     'priority' => 1000     // priority for sorting (default = 10, 1000 means (hopefully) the last in row)
    ) );
  }
}
add_action( 'load-index.php', 'mfdwc_dashboard_add_help_tab' , 20 );



//add_theme_support( 'wp-block-styles' ); // Add the wp-block-table feature???



function mfdwc_dashboard_widgets_control() {
  $widget_id = 'dashboard-widgets-control';
  $widget_name = __('Dashboard Widgets Control','dashboard-widgets-control');
  $callback = 'mfdwc_control_dashboard_widgets';
  $control_callback = null;
  $callback_args = null;
  $context = 'normal';
  $priority = 'high';
  
  if ( current_user_can('manage_options') )
    wp_add_dashboard_widget( $widget_id, $widget_name, $callback, $control_callback, $callback_args, $context, $priority);
}
add_action('wp_dashboard_setup', 'mfdwc_dashboard_widgets_control' );

function mfdwc_control_dashboard_widgets(){
  global $wp_meta_boxes;
  global $wp_roles;
  global $mfdwc_hint;  // translated
  
  $widget_names = array('---' => array(), 'normal' => array(), 'side' => array(), 'column3' => array(), 'column4' => array() );
  
  $removed_widgets = array();
  if ( get_option('mfdwc_removal_context') ) $removed_widgets = get_option('mfdwc_removal_context');
  $removed_widgets_roles = array();
  if ( get_option('mfdwc_removal_roles') ) $removed_widgets_roles = get_option('mfdwc_removal_roles');
  
  echo '<form id="mfdwc_form" action="'.esc_attr( admin_url( 'admin-post.php' ) ).'" method="post">';
  echo '<input type="hidden" name="action" value="mfdwc-save-dashboard-widgets-option" />';
  
  echo '<figure class="mfdwc-block-table">';
  echo '<table id="mfdwc-table" border="1" style="border-collapse:collapse; margin-left:auto; margin-right:auto;">';
  echo '<caption style="font-weight:bold;">'.__('List of Registered Dashboard Widgets','dashboard-widgets-control').'<br>'.__('Context, ID, Title and Priorities','dashboard-widgets-control').'<br><span style="font-size:0.7em;">('.__('Widgets decide by themselves about their general visbility for roles!','dashboard-widgets-control').')</span></caption>';
  echo '<tbody>';
  echo '<tr style="background-color:lightblue;"><th style="padding:2px; font-size:0.8em;">'.__('Context','dashboard-widgets-control').'</th><th style="padding:2px;"><span style="font-size:0.9em;">'.__('Widget ID','dashboard-widgets-control').'</span><br><span style="font-size:0.8em;">'.__('Widget Title','dashboard-widgets-control').'<br>('.__('Priorities','dashboard-widgets-control').')</span></th><th style="padding:2px; color:darkred;">'.__('&#10008;','dashboard-widgets-control').'</th><th style="padding:2px; color:darkred; font-size:0.9em;">'.__('For Roles','dashboard-widgets-control').'</th></tr>';
  
  $mfdwc_meta_boxes = array_reverse($wp_meta_boxes['dashboard']); // Get just the dashboard related WordPress meta boxes
  $mfdwc_meta_boxes['---']['---']['welcome-panel'] = array('id' => 'welcome-panel', 'title' => 'WP Welcome Panel');
  $mfdwc_meta_boxes = array_reverse($mfdwc_meta_boxes);
  
  foreach ( $mfdwc_meta_boxes as $context => $context_data ) {
    echo '<tr><td class="mf-'.$context.'" style="text-align:center; padding:2px; font-size:0.8em;">'.$context.'</td>';
    foreach ($context_data as $priority => $context_priority_widgets ) {
      foreach ($context_priority_widgets as $widget_name => $widget_data ) { // Build the $widget_names array from the Wordpress dashboard meta boxes array. Make all widgets visible, regardless the display options settings!
        echo '<script type="text/javascript">
          jQuery("#'.$widget_name.'").removeClass("hidden");
          if ( "'.$widget_name.'" != "welcome-panel") jQuery("#'.$widget_name.'").css("display","block");
        </script>';
        if ( ( ! isset($widget_names[$context][$widget_name]['priorities']) ) || ( ! in_array($priority, (array)$widget_names[$context][$widget_name]['priorities']) ) ) $widget_names[$context][$widget_name]['priorities'][] = $priority;
        if ( isset($widget_data['title']) ) $widget_names[$context][$widget_name]['title'] = $widget_data['title'];
      }
    }
    $widget_name_count = count($widget_names[$context]);
    echo '<script type="text/javascript">jQuery(".mf-'.$context.'").attr("rowspan", '.$widget_name_count.');</script>';
    $mf_count = 0;
    foreach ( $widget_names[$context] as $widget_name_registered => $title_and_priorities) {
      $mf_count += 1;
      $mf_checked = ( isset($removed_widgets[$widget_name_registered]) ) ? ' checked="checked"' : '';
      $mf_selected = ( ( ! isset($removed_widgets_roles[$widget_name_registered])) || ( strpos($removed_widgets_roles[$widget_name_registered], 'all') === false ) ) ? '' : 'selected="selected"';
      
      if ( $mf_count <> 1 ) echo '<tr>';
      $widget_removed_here = "<span style='color:DarkGoldenRod'>".__("Widget was removed here!","dashboard-widgets-control")."</span>"; // ' -> "
      $mfdwc_tooltip = " mfdwc_tooltip='".__("Click = toggle highlight","dashboard-widgets-control")."'"; // ' -> "
      if ( ! isset($title_and_priorities['title']) ) { // The title isn't set (by WordPress) in the array, if the related dashboard widget is not visible. Therefore, this will need to be adjusted later in the frontend for the Wordpress Welcome Panel -> see jQuery part below...
        $title_and_priorities['title'] = $widget_removed_here;
        $mfdwc_tooltip = "";
      }
      $mfdwc_welcome_panel_list_id = ( $widget_name_registered == 'welcome-panel' ) ? ' id="mfdwc-welcome-panel"' : '';
      echo '<td'.$mfdwc_tooltip.' class="mfdwc-list-item" widget="'.$widget_name_registered.'" style="text-align:center; padding:2px; background-color:white; font-size:0.9em;" id="'.$widget_name_registered.'-list-item">'.$widget_name_registered . '<br><span style="font-size:0.89em;"><span style="color:#6a969f; font-weight:bold;"><span'.$mfdwc_welcome_panel_list_id.'>'.$title_and_priorities['title'].'</span></span><br>(' . implode(', ', (array)$title_and_priorities['priorities']) . ')</span></td>';
      
      if ( $widget_name_registered != MFDWC_WIDGETNAME ) {
        echo '<td style="text-align:center; padding:2px;"><input style="margin-left:auto; margin-right:auto;" type="checkbox" name="selected_widgets[]" value="'.$widget_name_registered.'|'.$context.'"'.$mf_checked.' id="'.$widget_name_registered.'-check" onclick="mark_widget(\''.$widget_name_registered.'\')"/></td>';
        echo '<td style="text-align:center;">';
        echo '<select class="mfdwc_form-select" style="font-size:0.7em;" id="roles" name="selected_roles[]" size="3" multiple>';
        echo '<option value="'.$widget_name_registered.'|all"'.$mf_selected.'>'.__('All Roles','dashboard-widgets-control').'</option>';
        foreach ( $wp_roles->role_names as $mfem_key=>$mfem_value) {
          $mf_selected = ( strpos($removed_widgets_roles[$widget_name_registered], $mfem_key) === false ) ? '' : 'selected="selected"';
          echo '<option value="'.$widget_name_registered.'|'.$mfem_key.'"'.$mf_selected.'>'._x($mfem_value,'User role').'</option>';
        }
        echo '</select>';
        echo '<input type="hidden" name="selected_roles[]" value="'.$widget_name_registered.'|*"/>'; // Hidden default option to generate the widget entry in the array even if no role is selected
        echo '</td></tr>';
      }
      else echo '<td style="text-align:center; padding:2px; background-color:#caf6ff;" colspan="2"><input style="margin-top:auto; margin-bottom:auto;" type="reset" class="button" name="reset" value="'.__('Reset','dashboard-widgets-control').'..." onclick="mark_widget(\'reset_widgets\')"/></td></tr>';
    }
  }
  echo '<tr style="background-color:lightgrey;"><td style="text-align:right; padding:2px; font-size:0.8em;" colspan="2">'.__('Select/Deselect all','dashboard-widgets-control').'</td><td style="padding:2px;" colspan="2"><input type="checkbox" name="select-all" id="select-all"/></td></tr>';
  echo '</tbody>';
  echo '</table>';
  echo '</figure>';
  echo '<div style="text-align:center; font-size:0.8em;">('.__('Hint','dashboard-widgets-control').': '.$mfdwc_hint.'.)</div>';
  echo '<p></p>';
  echo '<div style="text-align:center;"><input type="submit" class="button-primary" name="execute_dashboard_widgets_control" value="'.__('Submit','dashboard-widgets-control').'..."/></div>';
  echo '</form>';
  
  $mfdwc_dashboard_widget_ids_js = '[]';
  if ( get_option('mfdwc_removal_roles') ) {
    $dashboard_widgets_array = get_option('mfdwc_removal_roles');
    $mfdwc_dashboard_widget_ids_js = '[';
    foreach ( $dashboard_widgets_array as $widget_id => $roles ) $mfdwc_dashboard_widget_ids_js .= '"'.$widget_id.'", ';
    $mfdwc_dashboard_widget_ids_js = substr($mfdwc_dashboard_widget_ids_js, 0, strlen($mfdwc_dashboard_widget_ids_js) - 2).']';
  } else echo'<div style="width:100%; text-align:center; color:darkred; font-size:1.5em;">'.__('Please submit once to activate','dashboard-widgets-control').'!</div>';

  echo '<script type="text/javascript">
    var $ = jQuery;

    $(document).ready(function() {

      $("#" + "mfdwc-table" + " th, #" + "mfdwc-table" + " td").css({"border-style":"solid", "border-width":"1px", "border-color":"grey"});
      $("." + "mfdwc_form-select").css({"border-width":"0px","padding":"0px","margin":"0px"});
      $("." + "mfdwc_form-select").parent().css({"padding-left":"2px","padding-right":"2px"});

      $(".postbox-header .handle-actions").before("<div class=\"press-to-highlight\"><button'.$mfdwc_tooltip.' class=\"button-primary\" style=\"background-color:transparent; border-width:0px; padding:0px 5px 0px 5px;\"><img  style=\"vertical-align:middle;\" src=\"'.plugin_dir_url(__FILE__).'img/target.png\" width=\"15\"></button></div>"); // Add button to dashboard widget "postbox-header"
      $(".welcome-panel-close").before("<div class=\"press-to-highlight\" style=\"text-align:right; width:94%;\"><button'.$mfdwc_tooltip.' class=\"button-primary\" style=\"background-color:transparent; border-width:0px; padding:0px 5px 0px 0px;\"><img  style=\"vertical-align:top;\" src=\"'.plugin_dir_url(__FILE__).'img/target.png\" width=\"15\"></button></div>"); // Add button to dashboard widget "welcome-panel"
      $(".welcome-panel-close").css("display","none");

      if ( $("#welcome-panel").length == 0 ) { // Adjustment as announced above, since this panel is not part of the standard WordPress dashboard widgets
        $("#mfdwc-welcome-panel").html("'.$widget_removed_here.'");
        $("#welcome-panel-list-item").removeAttr("mfdwc_tooltip");
      }


      $(".mfdwc-list-item").click(function(){ mfdwc_toggle_widget($(this).attr("widget")); });

  	  mfdwc_dashboard_widget_ids = '.$mfdwc_dashboard_widget_ids_js.';

      $(".press-to-highlight").click(function(event) {
        // Toggle highlighting for dashboard widget and its list item - triggered from the dashboard widget
        if ( $(this).parent().attr("id") == "welcome-panel" )
          mfdwc_toggle_widget( "welcome-panel" );
        else;
          mfdwc_toggle_widget( $(this).parent().parent().attr("id") );
      });
      $("#select-all").click(function(event) {
        // Listen for click on toggle checkbox
        if(this.checked) {
          // Iterate each checkbox
          $(":checkbox").each(function() {
              this.checked = true;                        
          });
        } else {
          $(":checkbox").each(function() {
            this.checked = false;                       
          });
          widget_id = "'.MFDWC_WIDGETNAME.'";
          widget_id_list_item = "'.MFDWC_WIDGETNAME.'" + "-list-item";
          $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"white"}); // On bulk deselect, remove the highlighting of the plugin and its list item as well (in case it was highlighted)
        }
        mfdwc_dashboard_widget_ids.forEach(mfdwc_mark_as_selected);
      });
    });

    function mark_widget(widget_id) {
      widget_id_check = widget_id + "-check";
      if ( widget_id != "reset_widgets" ) {
        if ( ( document.getElementById(widget_id_check).checked ) && ( ! $("#" + widget_id).length ) )
          mfdwc_toggle_widget(widget_id);
        else
          mfdwc_mark_as_selected(widget_id);
      }
      else {
        setTimeout(mfdwc_mark_as_selected_delayed, 50);
      }
    }
    function mfdwc_toggle_widget(widget_id) {
      widget_id_list_item = widget_id + "-list-item";
      if ( $("#" + widget_id_list_item).css("background-color") == "rgb(255, 255, 255)" ) {
        $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"LemonChiffon"});
        if ( ! $("#" + widget_id).length )
          setTimeout( function(){ $("#" + widget_id_list_item).css({"background-color":"white"}); }, 400 );
      }
      else
        $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"white"});
    }
    function mfdwc_unmark_list_item(widget_id_list_item) {
      $("#" + widget_id_list_item).css({"background-color":"white"});
    }
    function mfdwc_mark_as_selected_delayed() {
      mfdwc_dashboard_widget_ids.forEach(mfdwc_mark_as_selected);
      widget_id = "'.MFDWC_WIDGETNAME.'";
      widget_id_list_item = "'.MFDWC_WIDGETNAME.'" + "-list-item";
      $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"white"}); // On bulk deselect, remove the highlighting of the plugin and its list item as well (in case it was highlighted)
}
    function mfdwc_mark_as_selected(widget_id) {
      widget_id_check = widget_id + "-check";
      widget_id_list_item = widget_id + "-list-item";
      if ( document.getElementById(widget_id_check).checked ) {
        if ( $("#" + widget_id).length ) $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"LemonChiffon"});
      }
      else
        $("#" + widget_id + ", #" + widget_id_list_item).css({"background-color":"white"});
    }
  </script>
  ';
}



function mfdwc_remove_selected_dashboard_widgets() { // The very function ;-)
//  remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Probably an older panel I found while searching the web, however, not found active these days (2021)...

  if ( get_option('mfdwc_removal_context') ) {
    $dwc_user = wp_get_current_user();
    $dwc_user_roles = ( array ) $dwc_user->roles;
    $removed_widgets = get_option('mfdwc_removal_context');
    $removed_widgets_roles = get_option('mfdwc_removal_roles');
    
    foreach ( $removed_widgets as $widget_name => $widget_context ) {
      if ( ( ! (strpos($removed_widgets_roles[$widget_name], 'all') === false ) ) || ( count( array_intersect( $dwc_user_roles, explode( '|', $removed_widgets_roles[$widget_name] ) ) ) <> 0 ) ) {
        if ( $widget_name <> 'welcome-panel')
          remove_meta_box( $widget_name, 'dashboard', $widget_context ); // Normal Dashboard Widget
        else
          remove_action( 'welcome_panel', 'wp_welcome_panel'); // Wordpress Welcome Panel
      }
    }
  }
}
add_action('wp_dashboard_setup', 'mfdwc_remove_selected_dashboard_widgets', 9999);



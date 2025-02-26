<?php



function adh_update_adminbar($wp_adminbar)
{

  // remove unnecessary items

  foreach ($GLOBALS['list_settings'] as $key) {
    if (esc_attr(get_option('adh_' . $key)) == 0 && is_numeric(esc_attr(get_option('adh_' . $key)))) {
      $wp_adminbar->remove_node($key);
    }
  }

  if (esc_attr(get_option("adh_drag")) == 1 || !is_numeric(esc_attr(get_option("adh_drag")))) {

    $position = 0;

    if (is_numeric(esc_attr(get_option("adh_position")))) {
      $position = esc_attr(get_option("adh_position"));
    }

    $position = 'position-' . $position;

    $wp_adminbar->add_node([
      'id' => 'drag-handle',
      'meta' => [
        'html' => "<div class='handle " . $position . "'><div class='handle-child trapezoid-1'></div><div class='handle-child trapezoid-2'></div></div>"
      ]
    ]);
  }

  if (esc_attr(get_option("adh_hidebtn")) == 1 || !is_numeric(esc_attr(get_option("adh_hidebtn")))) {
    $wp_adminbar->add_node([
      'id' => 'hide-btn',
      'meta' => [
        'html' => "<div class='hide-btn'></div>"
      ]
    ]);
  }
}


function adh_plugin_assets()
{
  wp_enqueue_script('my1-1', ADH_PLUGIN_URL . 'js/main.js', array('jquery-ui-draggable'), null, true);
  wp_enqueue_style('my2-2', ADH_PLUGIN_URL . 'css/main.css');
}

//initialize
add_action('init', 'adh_initialize');


function adh_initialize()
{
  $user_id = get_current_user_id();
  $adh_use_menu_plugin = get_user_meta($user_id, 'adh_use_menu_plugin');

  if (empty($adh_use_menu_plugin)) {
    $GLOBALS['use-plugin'] = 1;
  } else {
    if (is_numeric($adh_use_menu_plugin[0])) {
      $GLOBALS['use-plugin'] = $adh_use_menu_plugin[0];
    }
  }

  if ($GLOBALS['use-plugin'] == 1) {
    //initialize all the plugin
    adh_start_plugin();
  }
}


function adh_start_plugin()
{
  add_action('admin_bar_menu', 'adh_update_adminbar', 999);
  add_action('add_admin_bar_menus', 'adh_plugin_assets');
}

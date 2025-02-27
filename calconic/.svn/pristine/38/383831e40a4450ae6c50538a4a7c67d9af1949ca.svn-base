<?php

$APIOption = 'calconic_api_key';

function calconic_CreatePage() {
  $apiKey = get_option('calconic_api_key');
  $container  = '<div class=\'wp-calconic-core-wrapper\'>';

  if ($apiKey) {
    $container .= '<script>window.calconic = {}; window.calconic.apiKey = \'' . $apiKey . '\'</script>';
  } else {
    $container .= '<script>window.calconic = {}; window.calconic.apiKey = \'\'</script>';
  }

  $container .= '<div id=\'wp-calconic-core\'></div>';
  $container .= '</div>';

  echo $container;
}

function calconic_CreatePageReference() {
  add_menu_page(
    'Calconic - Calculator Builder',
    'Calconic',
    'edit_posts',
    'calconic',
    'calconic_CreatePage'
  );
}

function calconic_RegisterPluginPage() {
  add_action('admin_menu', 'calconic_CreatePageReference');
}

function calconic_RemovePageReference() {
  remove_menu_page('calconic');
}

function calconic_DeregisterPluginPage() {
  update_option('calconic_api_key', '');
  add_action('admin_menu', 'calconic_RemovePageReference', 99);
}

function calconic_CreateOption() {
  if (get_option($APIOption) === false) {
    update_option($APIOption, '');
  }
}

function calconic_SetAPIKey($key) {
  if ($key) {
    update_option($APIOption, $key, true);

    return true;
  }

  return false;
}

function calconic_UnsetAPIKey() {
  update_option($APIOption, '');
}

function calconic_DeleteOption() {
  delete_option($APIOption);
}

function calconic_DivShortCode($id) {
  $divStr  = "<div class=\"calconic-calculator\" data-calculatorid=\"";
  $divStr .= $id . "\"></div>";

  return $divStr;
}

function calconic_AnchorShortCode($id, $content = 'Lightbox link') {
  $anchorStr  = "<a href=\"#/calculator/";
  $anchorStr .= $id . "\" ";
  $anchorStr .= "data-calculatorid=\"";
  $anchorStr .= $id . "\">" . $content . "</a>";

  return $anchorStr;
}

function calconic_ShortCodeResolver($attributes, $content) {
  $id   = $attributes['id'];
  // $type = $attributes['type'] || 'direct';

  $type = 'direct';

  if (isset($attributes['type'])) {
    $type = $attributes['type'];
  }

  if ($type === 'lightbox') {
    return calconic_AnchorShortCode($id, $content);
  }

  return calconic_DivShortCode($id);
}

function calconic_EnqueueCalconicScript() {
  $handle    = "calconic-script";
  $src       = "https://storage.googleapis.com/calconic-cdn/static/js/calconic.min.js";
  $deps      = array();
  $ver       = '1.0.0';
  $inFooter  = false;

  wp_register_script($handle, $src, $deps, $ver, $inFooter);
  wp_enqueue_script($handle);
}

function calconic_EnqueueAdminScript($hook) {
  $handle    = 'calconic-admin';
  $src       = plugins_url('scripts/calconic.js', __FILE__);
  $deps      = array();
  $ver       = '1.1.11';
  $inFooter  = true;

  if ($hook === 'toplevel_page_calconic') {
    wp_register_script(
      'react',
      plugins_url('scripts/dependencies/react.production.min.js', __FILE__),
      array(),
      '15.6.1',
      false
    );
    wp_enqueue_script('react');
    wp_register_script(
      'react-dom',
      plugins_url('scripts/dependencies/react-dom.production.min.js', __FILE__),
      array(),
      '15.6.1',
      false
    );
    wp_enqueue_script('react-dom');
    wp_register_script(
      'redux',
      plugins_url('scripts/dependencies/redux.min.js', __FILE__),
      array(),
      '3.7.2',
      false
    );
    wp_enqueue_script('redux');
    wp_register_script(
      'react-redux',
      plugins_url('scripts/dependencies/react-redux.min.j', __FILE__),
      array('react', 'react-dom'),
      '5.0.6',
      false
    );
    wp_enqueue_script('react-redux');
    wp_register_script(
      'react-router-dom',
      plugins_url('scripts/dependencies/react-router-dom.min.js', __FILE__),
      array('react', 'react-dom'),
      '4.2.2',
      false
    );
    wp_enqueue_script('react-router-dom');
    wp_register_script(
      'react-transition-group',
      plugins_url('scripts/dependencies/react-transition-group.min.js', __FILE__),
      array('react', 'react-dom'),
      '2.2.0',
      false
    );
    wp_enqueue_script('react-transition-group');
    wp_register_script(
      'redux-logger',
      plugins_url('scripts/dependencies/redux-logger.js', __FILE__),
      array('redux'),
      '3.0.6',
      false
    );
    wp_enqueue_script('redux-logger');
    wp_register_script(
      'redux-thunk',
      plugins_url('scripts/dependencies/redux-thunk.min.js', __FILE__),
      array('redux'),
      '2.2.0',
      false
    );
    wp_enqueue_script('redux-thunk');
    wp_register_script(
      'promise',
      plugins_url('scripts/dependencies/promise.js', __FILE__),
      array(),
      '6.1.0',
      false
    );
    wp_enqueue_script('promise');
    wp_register_script(
      'whatwg-fetch',
      plugins_url('scripts/dependencies/fetch.js', __FILE__),
      array(),
      '2.0.3',
      false
    );
    wp_enqueue_script('whatwg-fetch');
    wp_register_script(
      'antd',
      plugins_url('scripts/dependencies/antd.min.js', __FILE__),
      array('react', 'react-dom'),
      '2.13.0',
      false
    );
    wp_enqueue_script('antd');
    wp_register_script($handle, $src, $deps, $ver, $inFooter);
    wp_enqueue_script($handle);
    wp_enqueue_style(
      'antd',
      plugins_url('scripts/dependencies/antd.min.css', __FILE__),
      array(),
      '2.13.0'
    );
    wp_enqueue_style(
      'calconic-admin-style',
      plugins_url('styles/calconic.css', __FILE__),
      array(),
      '1.0.0'
    );
    wp_enqueue_style(
      'calconic-admin-montserrat',
      plugins_url('scripts/fonts/montserrat.calconic.css', __FILE__),
      array(),
      '1.0.0'
    );
    wp_enqueue_style(
      'calconic-admin-lato',
      plugins_url('scripts/fonts/lato.calconic.css', __FILE__),
      // "https://fonts.googleapis.com/css?family=Lato:300,400,700",
      array(),
      '1.0.0'
    );

    $nonceData = array(
      'requestUrl' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('calconic-nonce')
    );

    wp_localize_script($handle, 'calconicRequest', $nonceData);
  }
}

function calconic_RegisterScripts() {
  add_action('wp_enqueue_scripts', 'calconic_EnqueueCalconicScript');
  add_action('admin_enqueue_scripts', 'calconic_EnqueueAdminScript');
}

function calconic_DeregisterScript() {
  wp_dequeue_script("calconic-script");
  wp_dequeue_script('calconic-admin');
}

function calconic_ParseShortcode() {
  add_shortcode('calconic', 'calconic_ShortCodeResolver');
}

function calconic_RegisterShortcodes() {
  add_action('init', 'calconic_ParseShortcode');
}

function calconic_DeregisterShortCodes() {
  remove_shortcode('calconic');
}

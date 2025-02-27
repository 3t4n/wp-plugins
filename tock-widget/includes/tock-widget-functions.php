<?php
/*
 * Add menu to the Admin Control Panel
 */

// Hook the 'admin_menu' action hook, run the function named 'add_tock_admin_link()'
add_action( 'admin_menu', 'add_tock_admin_link' );

// Add a new top level menu link to the admin control panel
function add_tock_admin_link()
{
    add_submenu_page(
      'tools.php',
      'Tock widget', // Title of the page
      'Tock widget', // Text to show on the menu link
      'manage_options', // Capability requirement to see the link
      plugin_dir_path(__FILE__) . '/tock-admin-page.php' // The 'slug' - file to display when clicking the link
    );
}

/**
 * Add code to async fetch tock widget code.
 */
function hook_tock_widget_js_to_head() {
  $domainName = get_option('tock_domain_name');
  ?>
    <script>
      !function(t,o,c,k){if(!t.tock){var e=t.tock=function(){e.callMethod?
      e.callMethod.apply(e,arguments):e.queue.push(arguments)};t._tock||(t._tock=e),
      e.push=e,e.loaded=!0,e.version='1.0',e.queue=[];var f=o.createElement(c);f.async=!0,
      f.src=k;var g=o.getElementsByTagName(c)[0];g.parentNode.insertBefore(f,g)}}(
      window,document,'script','https://www.exploretock.com/tock.js');

      tock('init', '<?php echo esc_attr($domainName)?>');
    </script>
<?php
}
add_action('wp_head', 'hook_tock_widget_js_to_head');

/**
 * Set up the block code.
 */
function loadTockBlockScript() {
  wp_enqueue_script(
    'tock-widget-script',
    plugin_dir_url(__FILE__) . 'tock-block.js',
    array('wp-blocks', 'wp-i18n', 'wp-editor'),
    true
  );
  $imgSrc = plugin_dir_url( __FILE__ ) . 'assets/booknow.png';
  wp_localize_script('tock-widget-script', 'tockBlockVars', array('imgSrc' => $imgSrc));
}

add_action('enqueue_block_editor_assets', 'loadTockBlockScript');

/**
 * Dynamically create the widget button link.
 */
function tock_render_widget($props) {
  return '<div style="text-align:center;"><div id="Tock_widget_container" data-tock-display-mode="Button" data-tock-color-mode="Blue" data-tock-locale="en-us" data-tock-timezone="America/New_York" style="display:inline-block;"></div></div>';
}

register_block_type('tock/booking-widget', array(
  'render_callback' => 'tock_render_widget',
));

<?php 
/**
 * Plugin Name: Anchors Away
 * Plugin URI: https://github.com/tleen/anchors-away
 * Description: Disable links on your (non-administrative) pages with optional popup message.
 * Version: 1.0.1
 * Author: tleen
 * Author URI: http://www.thomasleen.com
 * License: MIT
 */
defined('ABSPATH') or die;


//* -- Client Execution -- *//

function aa_enqueue_scripts(){
  wp_enqueue_script('jquery');
  wp_enqueue_script('anchors-away', plugins_url( 'anchors-away.js', __FILE__ ), array('jquery'));
  
  function aa_embed_footer(){
    $message = get_option('aa-message-text');
?>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    this.anchorsAway(<?php echo($message ? json_encode($message) : '') ?>);
/* ]]> */
</script>
<?php
  }  
  add_action('wp_footer', 'aa_embed_footer');    
}
add_action('wp_enqueue_scripts', 'aa_enqueue_scripts');


//* -- Admin Options Execution -- *//

add_action('admin_menu', 'aa_plugin_menu' );

function aa_plugin_menu() {
  add_menu_page('Anchors Away Plugin Settings', 'Anchors Away', 'administrator', __FILE__, 'aa_settings_page', 'dashicons-editor-unlink');

  add_action('admin_init', 'aa_register_settings');
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'aa_add_action_links');

function aa_add_action_links($links){
  $links[] = '<a href="' . admin_url('?page=' . plugin_basename(__FILE__)) . '">Settings</a>';
  return $links;
}

function aa_register_settings(){
  // xx - sanitize
  register_setting('aa-settings-group', 'aa-message-text');
}

function aa_settings_page(){
?>
<div class="wrap">
  <h2>Anchors Away Settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'aa-settings-group' ); ?>
    <?php do_settings_sections( 'aa-settings-group' ); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row" style="width: 80px">Message:</th>
        <td><input type="text" name="aa-message-text" size="50" value="<?php echo esc_attr(get_option('aa-message-text')) ?>" /></td>
      </tr>      
    </table>
    <p>Set message to display when user clicks on a deactivated link. If message is empty, no message will be shown.</p>
    <?php submit_button(); ?>
  </form>
</div>
<?php  
}
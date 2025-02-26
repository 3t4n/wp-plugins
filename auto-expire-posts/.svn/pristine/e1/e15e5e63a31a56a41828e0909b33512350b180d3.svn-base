<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/plugins/auto-expire-posts/
 * @since      1.0.0
 *
 * @package    Auto_Expire_Posts
 * @subpackage Auto_Expire_Posts/admin/partials
 */

// todo: add more useful options.

$options = get_option('auto_expire_posts_options');
if (!$options) {
 $options = array(
   'default_status' => 'private',
 );
}

if (!empty($_POST['_wpnonce'])
  && wp_verify_nonce($_POST['_wpnonce'], 'auto_expire_posts_update_options')) {
  if (!empty($_POST['default_status'])
    && array_key_exists($_POST['default_status'], Auto_Expire_Posts::$statuses)) {
    $options['default_status'] = sanitize_text_field($_POST['default_status']);
  }

  update_option('auto_expire_posts_options', $options);
}
?>

<h1>Auto Expire Posts Options</h1>

<form method="post" action="" novalidate="novalidate" id="auto-expire-posts-form">
  <input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo wp_create_nonce('auto_expire_posts_update_options'); ?>">

  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row">Default Status</th>
        <td>
          <fieldset>
            <select name="default_status">
              <?php
              foreach (Auto_Expire_Posts::$statuses as $key => $val) {
                echo '<option name="' . esc_attr($key) . '"' . ($key === $options['default_status'] ? ' selected' : '') . ' value="' . esc_attr($key) . '">' . esc_html($val) . '</option>';
              }
              ?>
            </select>
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>

  <p class="submit">
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
  </p>
</form>

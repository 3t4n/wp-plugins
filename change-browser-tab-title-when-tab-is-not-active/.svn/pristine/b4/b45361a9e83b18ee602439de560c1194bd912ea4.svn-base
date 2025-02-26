<?php

/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       https://plugin.nl
* @since      1.0.0
*
* @package    Browser_Tab_Title_Reminder
* @subpackage Browser_Tab_Title_Reminder/admin/partials
*/
?>

<div class="wrap">
  <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
  <p><?php _e('On this page you can edit the delay before a new title shows on a page and edit what the title tag displays when a user is active in another tab or outside the browser. When the user is active again the old title tag will be displayed again. ', $this->plugin_name);?></p>
  <?php
  $options = get_option($this->plugin_name);

  if (!isset($options['bttr_delay'])){
    $delay = 3000;
  }else{
    $delay = $options['bttr_delay'];
  }

  if (!isset($options['bttr_title'])){
    $title = "";
  } else{
    $title = $options['bttr_title'];
  }

?>

  <form method="post" name="browser_tab_title_reminder_options" action="options.php">
    <?php
      settings_fields($this->plugin_name);
      do_settings_sections($this->plugin_name);
    ?>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="<?php echo $this->plugin_name; ?>-title-tag">Title on inactive tab</label>
          </th>
          <td>
            <input class="regular-text input" type="input" id="<?php echo $this->plugin_name; ?>-title-tag" name="<?php echo $this->plugin_name; ?>[bttr_title]" value="<?php echo $title; ?>" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="<?php echo $this->plugin_name; ?>-delay">Delay before showing new title</label>
          </th>
          <td>
            <input class="regular-text input" type="number" id="<?php echo $this->plugin_name; ?>-delay" name="<?php echo $this->plugin_name; ?>[bttr_delay]" value="<?php echo $delay; ?>" />
          </td>
        </tr>
      </tbody>
    </table>

    <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

  </form>
</div>

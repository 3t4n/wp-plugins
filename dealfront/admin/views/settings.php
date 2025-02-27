<?php
// No direct access to this file
if (!defined('ABSPATH')) {
  exit;
}
?>

<?php if (isset($_GET['settings-updated'])): ?>
  <?php if (get_option('leadfeeder_tracker_id') == ''): ?>
    <div id="message" class="notice notice-warning is-dismissible">
      <p><strong>Leadfeeder script is disabled.</strong></p>
    </div>
  <?php else: ?>
    <div id="message" class="notice notice-success is-dismissible">
      <p>
        <strong>
          Leadfeeder tracker installed successfully. <a href="https://app.dealfront.com/l/install-tracker" target="_blank">Go to Leadfeeder</a>
        </strong>
      </p>
    </div>
  <?php endif; ?>
<?php endif; ?>

<!-- placeholder to display validation errors -->
<div id="dealfront-validation-errors" style="display: none;">
  <div id="message" class="notice notice-warning">
    <p id="message-text"></p>
  </div>
</div>

<div id="business-info-wrap" class="wrap">
  <div class="wp-header">
    <img src="<?php echo esc_url(plugins_url('../static/Lf+by+df-Logo.svg', __FILE__)); ?>" alt="Dealfront"
      class="dealfront-logo" />
    <div class="large-text gutter-bottom">Turn page views into pipeline</div>
    <span>
      Identify anonymous companies visiting your website and automatically send them to your CRM for sales teams to
      convert.
    </span>
  </div>

  <form method="post" action="options.php" id="tracker-settings-form">
    <?php settings_fields('dealfront');
    do_settings_sections('dealfront'); ?>

    <div id="dealfront-form-area">
      <ol>
        <li>
          Visit the <a href="https://app.dealfront.com/l/install-tracker" target="_blank">website tracker settings in Leadfeeder</a> to find your unique tracker ID.
        </li>
        <li>Enter the tracker ID below to start identifying companies visiting your website.</li>
      </ol>

      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row">
              <label for="leadfeeder_tracker_id">
                Leadfeeder tracker ID
              </label>
            </th>

            <td>
              <input type="text" name="leadfeeder_tracker_id" id="leadfeeder_tracker_id"
                value="<?php echo esc_attr(get_option('leadfeeder_tracker_id')); ?>" />
              <p class="description" id="wp_leadfeeder_tracker_id_description">
                (Leave blank to disable)
              </p>
            </td>
          </tr>
        </tbody>

      </table>
    </div>

    <span>
      <?php submit_button("Save Changes", "primary", "submit", false); ?>
      <?php if (esc_attr(get_option('leadfeeder_tracker_id'))): ?>
        <a href="https://app.dealfront.com/l/install-tracker" target="_blank" class="dealfront-secondary-button">Go to Leadfeeder</a>
      <?php endif; ?>
    </span>

    <div class="large-gutter-bottom"></div>

    <div>
      Facing issues? <a href="https://help.dealfront.com/en/articles/3749362-installing-the-leadfeeder-tracker-on-a-wordpress-website" target="_blank">Visit our help center</a>
    </div>
  </form>
</div>

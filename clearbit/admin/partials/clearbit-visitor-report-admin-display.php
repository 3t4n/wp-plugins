<?php
  $signup_url = 'https://dashboard.clearbit.com/signup?simple=true&ref=wvr';
  $reports_url = 'https://app.clearbit.com/visitor-report';

  $site_url = get_option('siteurl');
  $domain = parse_url($site_url, PHP_URL_HOST);
  $user = wp_get_current_user();

  $signup_url = $signup_url . '?domain=' . $domain . '&email=' . $user->user_email;

  if ($_POST['key']) {
    delete_option('wvr-plugin-just-activated');
    update_option('wvr-plugin-api-key', sanitize_text_field($_POST['key']));

    $success = true;
  }

  $api_key = esc_attr( get_option( 'wvr-plugin-api-key' ) );
?>

<div class="wrap">
  <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
  <?php if ($success) { ?>
    <div class="notice notice-success is-dismissible">
      <p>Clearbit API key was set successfully!</p>
    </div>
  <?php } ?>
  <?php settings_errors(); ?>
  <form method="post" action="">
    <table class="form-table">
      <tr valign="top">
        <th scope="row">API Key</th>
        <td>
          <input name="key" type="text" value="<?php echo esc_html($api_key); ?>" class="regular-text code" placeholder="e.g. pk_accb4cb2fcda3017eb...">
          <p class="description">Find your API key by <a href="<?php echo esc_url_raw($signup_url) ?>" target="_blank">signing into or creating your Clearbit account here</a></p>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row"></th>
        <td>
          <?php submit_button('Confirm your API key', 'primary', 'submit', false); ?>
          <?php if ($api_key) { ?>
            &nbsp;<a href="<?php echo $reports_url; ?>" class="button button-secondary" target="_blank">
              <span style="display:flex;justify-content:center;align-items:center;gap:0.25rem">
                <span>View your reports</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:16px;height:16px;">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
              </span>
            </a>
          <?php } ?>
        </td>
      </tr>
    </table>
  </form>
</div>

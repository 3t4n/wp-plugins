<?php
  /**
   * ANKA Commerce Payment Button Admin Setting class to handle admin settings.
   *
   * @package Anka_Commerce
   * @since 1.0.0
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  class Anka_Commerce_Payment_Button_Admin_Setting {
    /**
     * Add admin menu to manage payment buttons.
     *
     * It adds the main menu and submenus for managing payment buttons.
     */
    public static function anka_commerce_payment_button_admin_menu() {
      global $wp_filesystem;

      // Initialize the WP_Filesystem if not already initialized.
      if ( ! function_exists( 'WP_Filesystem' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
      }
      WP_Filesystem();

      $icon_file_path = ANKA_COMMERCE_PLUGIN_DIR . 'assets/img/anka-pay-logoicon.svg';
      $icon_data = '';

      if ( $wp_filesystem->exists( $icon_file_path ) && $wp_filesystem->is_readable( $icon_file_path ) ) {
        $contents = $wp_filesystem->get_contents( $icon_file_path );
        if ( $contents !== false ) {
          $icon_data = base64_encode( $contents );
        }
      }

      add_menu_page(
        __('Payment Buttons', 'anka-commerce'),
        __('Payment Buttons', 'anka-commerce'),
        'manage_options',
        'anka_commerce_payment_buttons',
        array(__CLASS__, 'anka_commerce_payment_button_payment_buttons_admin_page'),
        'data:image/svg+xml;base64,' . $icon_data,
        56
      );

      add_submenu_page(
        'anka_commerce_payment_buttons',
        __('Add New Button', 'anka-commerce'),
        __('Add New', 'anka-commerce'),
        'manage_options',
        'anka_commerce_payment_buttons_form',
        array(__CLASS__, 'anka_commerce_payment_button_payment_buttons_form_admin_page')
      );

      add_submenu_page(
        'anka_commerce_payment_buttons',
        __('Settings', 'anka-commerce'),
        __('Settings', 'anka-commerce'),
        'manage_options',
        'anka_commerce_payment_buttons_settings',
        array(__CLASS__, 'anka_commerce_payment_button_payment_buttons_settings_admin_page')
      );
    }

    /**
     * Render the admin page for managing payment buttons.
     *
     * It lists all the payment buttons and provides actions to edit or delete them.
     */
    public static function anka_commerce_payment_button_payment_buttons_admin_page() {
      global $wpdb;

      $cache_key = 'anka_commerce_payment_buttons_all';
      $buttons = wp_cache_get($cache_key, 'anka_commerce');

      if ($buttons === false) {
        $buttons = $wpdb->get_results("SELECT id, title, amount, currency, shortcode, payment_url FROM {$wpdb->prefix}anka_commerce_payment_buttons");

        if (!empty($buttons)) {
          wp_cache_set($cache_key, $buttons, 'anka_commerce', 3600); // Cache for 1 hour
        }
      }

      echo '<div class="wrap">';
      echo '<h1>' . esc_html__('Payment Buttons', 'anka-commerce') . '</h1>';
      echo '<a href="' . esc_url(admin_url('admin.php?page=anka_commerce_payment_buttons_form')) . '" class="button button-primary" style="margin-bottom: 10px">' . esc_html__('Add New Button', 'anka-commerce') . '</a>';
      echo '<table class="wp-list-table widefat fixed striped">';
      echo '<thead><tr><th>' . esc_html__('Title', 'anka-commerce') . '</th><th>' . esc_html__('Amount', 'anka-commerce') . '</th><th>' . esc_html__('Currency', 'anka-commerce') . '</th><th>' . esc_html__('Shortcode', 'anka-commerce') . '</th><th>' . esc_html__('Payment link', 'anka-commerce') . '</th><th>' . esc_html__('Actions', 'anka-commerce') . '</th></tr></thead>';
      echo '<tbody>';

      foreach ($buttons as $button) {
        echo '<tr>';
        echo '<td>' . esc_html($button->title) . '</td>';
        echo '<td>' . esc_html(number_format($button->amount, 2)) . '</td>';
        echo '<td>' . esc_html($button->currency) . '</td>';
        echo '<td>[anka_pay_button shortcode="' . esc_html($button->shortcode) . '"]</td>';
        echo '<td><a href="' . esc_url($button->payment_url) . '" target="_blank">' . esc_html__('View', 'anka-commerce') . '</a></td>';
        echo '<td>';
        echo '<a href="' . esc_url(admin_url('admin.php?page=anka_commerce_payment_buttons_form&edit=' . $button->id . '&_wpnonce=' . wp_create_nonce('edit_button_nonce'))) . '">' . esc_html__('Edit', 'anka-commerce') . '</a> | ';
        echo '<a href="' . esc_url(admin_url('admin.php?page=anka_commerce_payment_buttons&delete=' . $button->id . '&_wpnonce=' . wp_create_nonce('delete_button_nonce'))) . '" onclick="return confirm(\'Are you sure you want to delete this button?\')">' . esc_html__('Delete', 'anka-commerce') . '</a>';
        echo '</td>';
        echo '</tr>';
      }

      echo '</tbody></table></div>';

      if (isset($_GET['delete']) && is_numeric($_GET['delete']) && isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'delete_button_nonce')) {
        self::anka_commerce_payment_button_delete_button(intval($_GET['delete']));
      }
    }

    /**
     * Render the admin form for adding/editing payment buttons.
     *
     * It provides a form to add or edit a payment button.
     * Only the button text can be edited after creation.
     */
    public static function anka_commerce_payment_button_payment_buttons_form_admin_page() {
      $api_token = get_option('anka_commerce_api_token') ?: get_option('woocommerce_ankapay_settings')['api_token'];

      if (empty($api_token)) {
        echo '<div class="notice notice-error"><p>' . esc_html__('Please set your API token in the settings before creating a payment button.', 'anka-commerce') . '</p>';
        echo '<p><a href="' . esc_url(admin_url('admin.php?page=anka_commerce_payment_buttons_settings')) . '">' . esc_html__('Go to Settings', 'anka-commerce') . '</a></p></div>';

        return;
      }

      global $wpdb;
      $is_edit = isset($_GET['edit']) && isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'edit_button_nonce');

      $button = null;

      if ($is_edit) {
        $button_id = intval($_GET['edit']);

        $cache_key = 'anka_commerce_payment_button_' . $button_id;
        $button = wp_cache_get($cache_key, 'anka_commerce');

        if ($button === false) {
          $button = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}anka_commerce_payment_buttons WHERE id = %d", $button_id));

          if ($button) {
            wp_cache_set($cache_key, $button, 'anka_commerce', 3600); // Cache for 1 hour
          }
        }
      }

      echo '<div class="wrap">';
      echo '<h1>' . ($is_edit ? esc_html__('Edit Payment Button', 'anka-commerce') : esc_html__('Add New Payment Button', 'anka-commerce')) . '</h1>';
      echo '<form method="post" action="">';
      wp_nonce_field('anka_commerce_payment_button_save_button', 'anka_commerce_nonce');

      echo '<table class="form-table">';
      echo '<tr><th><label for="title">' . esc_html__('Title', 'anka-commerce') . '</label></th><td><input type="text" name="anka_commerce_payment_button_title" id="title" value="' . esc_attr($button ? $button->title : '') . '" class="regular-text" ' . ($is_edit ? 'disabled' : '') . ' required></td></tr>';
      echo '<tr><th><label for="description">' . esc_html__('Description', 'anka-commerce') . '</label></th><td><textarea name="anka_commerce_payment_button_description" id="description" class="regular-text" ' . ($is_edit ? 'disabled' : '') . '>' . esc_textarea($button ? $button->description : '') . '</textarea></td></tr>';
      echo '<tr><th><label for="amount">' . esc_html__('Amount', 'anka-commerce') . '</label></th><td><input type="number" step="0.01" name="anka_commerce_payment_button_amount" id="amount" value="' . esc_attr($button ? $button->amount : '') . '" class="regular-text" ' . ($is_edit ? 'disabled' : '') . ' required></td></tr>';
      echo '<tr><th><label for="currency">' . esc_html__('Currency', 'anka-commerce') . '</label></th><td><input type="text" name="anka_commerce_payment_button_currency" id="currency" value="' . esc_attr($button ? $button->currency : 'EUR') . '" class="regular-text" ' . ($is_edit ? 'disabled' : '') . ' required></td></tr>';
      echo '<tr><th><label for="button_text">' . esc_html__('Button Text', 'anka-commerce') . '</label></th><td><input type="text" name="anka_commerce_payment_button_button_text" id="button_text" value="' . esc_attr($button ? $button->button_text : __('Pay Now', 'anka-commerce')) . '" class="regular-text" required></td></tr>';
      echo '</table>';

      echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="' . ($is_edit ? esc_attr__('Update Button', 'anka-commerce') : esc_attr__('Create Button', 'anka-commerce')) . '"></p>';
      echo '</form></div>';

      self::anka_commerce_payment_button_form_submission($is_edit, $button ? $button->id : null);
    }

    /**
     * Render the admin settings page for payment buttons.
     *
     * It provides settings to configure the ANKA Payment Button.
     */
    public static function anka_commerce_payment_button_payment_buttons_settings_admin_page() {
      if (isset($_POST['anka_commerce_payment_button_save_settings'])) {
        check_admin_referer('anka_commerce_payment_button_save_button_settings');

        update_option('anka_commerce_api_token', sanitize_text_field($_POST['anka_commerce_api_token']));
        update_option('anka_commerce_payment_button_btn_color', sanitize_hex_color($_POST['anka_commerce_payment_button_btn_color']));
        update_option('anka_commerce_payment_button_success_page_id', intval($_POST['anka_commerce_payment_button_success_page_id']));

        echo '<div class="updated"><p>' . esc_html__('Settings saved.', 'anka-commerce') . '</p></div>';
      }

      $api_token = get_option('anka_commerce_api_token') ?: get_option('woocommerce_ankapay_settings')['api_token'];
      $button_color = get_option('anka_commerce_payment_button_btn_color', '#B818B2');
      $default_success_page = get_page_by_path('anka-commerce-payment-button-success');
      $success_page_id = get_option('anka_commerce_payment_button_success_page_id', $default_success_page ? $default_success_page->ID : 0);

      ?>
      <div class="wrap">
        <h1><?php esc_html_e('ANKA Payment Button Settings', 'anka-commerce'); ?></h1>
        <form method="post" action="">
          <?php wp_nonce_field('anka_commerce_payment_button_save_button_settings'); ?>
          <table class="form-table">
            <tr>
              <th scope="row"><?php esc_html_e('API Token', 'anka-commerce'); ?></th>
              <td>
                <input type="password" name="anka_commerce_api_token" value="<?php echo esc_attr($api_token); ?>" class="regular-text" />
                <p class="description">
                  <?php
                    echo wp_kses(
                      sprintf(
                        /* translators: %s: URL to ANKA Pay API settings */
                        __('Find your API Token in your API and Webhook Settings <a href="%s" target="_blank">here</a>.', 'anka-commerce'),
                        esc_url('https://www.anka.africa/account/en/pay_by_links/api_setting')
                      ),
                      array(
                        'a' => array(
                          'href' => array(),
                          'target' => array()
                        )
                      )
                    );
                  ?>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Button Color', 'anka-commerce'); ?></th>
              <td><input type="text" name="anka_commerce_payment_button_btn_color" value="<?php echo esc_attr($button_color); ?>" class="regular-text" /></td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Success Page', 'anka-commerce'); ?></th>
              <td>
                <?php
                  wp_dropdown_pages(array(
                    'name'             => 'anka_commerce_payment_button_success_page_id',
                    'selected'         => esc_attr($success_page_id),
                    'show_option_none' => esc_html__('Select a page', 'anka-commerce'),
                  ));
                ?>
              </td>
            </tr>
          </table>
          <p class="submit">
            <input type="submit" name="anka_commerce_payment_button_save_settings" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'anka-commerce'); ?>">
          </p>
        </form>
      </div>
      <?php
    }

    /**
     * Handle form submission for adding/editing payment buttons.
     *
     * It saves the payment button data to the database and generates a payment link if a new button is created.
     */
    private static function anka_commerce_payment_button_form_submission($is_edit, $button_id = null) {
      if (!isset($_POST['anka_commerce_nonce']) || !wp_verify_nonce($_POST['anka_commerce_nonce'], 'anka_commerce_payment_button_save_button')) {
        return;
      }

      global $wpdb;
      $table_name = $wpdb->prefix . 'anka_commerce_payment_buttons';

      $data = array(
        'button_text' => sanitize_text_field($_POST['anka_commerce_payment_button_button_text'])
      );

      if ($is_edit && $button_id) {
        $updated = $wpdb->update($table_name, $data, array('id' => $button_id));

        if ($updated !== false) {
          $cache_key = 'anka_commerce_payment_button_' . $button_id;
          wp_cache_delete($cache_key, 'anka_commerce');
        }
      } else {
        $data['title'] = sanitize_text_field($_POST['anka_commerce_payment_button_title']);
        $data['description'] = sanitize_textarea_field($_POST['anka_commerce_payment_button_description']);
        $data['amount'] = floatval($_POST['anka_commerce_payment_button_amount']);
        $data['currency'] = sanitize_text_field($_POST['anka_commerce_payment_button_currency']);
        $response = Anka_Commerce_Payment_Button::anka_commerce_payment_button_create_payment_link($data);

        if ($response['success'] === false) {
          if (isset($response['errors'])) {
            echo '<div class="error"><p>' . esc_html($response['errors']) . '</p></div>';
          } else {
            echo '<div class="error"><p>' . esc_html__('Failed to create payment link.', 'anka-commerce') . '</p></div>';
          }

          return;
        }

        $data['payment_url'] = $response['redirect_url'];
        $data['shortcode'] = 'acpb_' . uniqid();

        $inserted = $wpdb->insert($table_name, $data);

        if ($inserted !== false) {
          $cache_key = 'anka_commerce_payment_buttons_all';
          wp_cache_delete($cache_key, 'anka_commerce');

          $new_button_id = $wpdb->insert_id;
          $cache_key = 'anka_commerce_payment_button_' . $new_button_id;
          wp_cache_set($cache_key, (object) $data, 'anka_commerce', 3600); // Cache for 1 hour
        }
      }

      wp_safe_redirect(admin_url('admin.php?page=anka_commerce_payment_buttons'));
      exit;
    }

    /**
     * Delete a payment button.
     */
    public static function anka_commerce_payment_button_delete_button($button_id) {
      global $wpdb;

      $cache_key = 'anka_commerce_payment_button_' . $button_id;
      $button = wp_cache_get($cache_key, 'anka_commerce');

      if ($button === false) {
        $button = $wpdb->get_row($wpdb->prepare(
          "SELECT * FROM {$wpdb->prefix}anka_commerce_payment_buttons WHERE id = %d",
          $button_id
        ));

        if ($button) {
          wp_cache_set($cache_key, $button, 'anka_commerce', 3600); // Cache for 1 hour
        }
      }

      if ($button) {
        $table_name = $wpdb->prefix . 'anka_commerce_payment_buttons';

        $deleted = $wpdb->delete($table_name, array('id' => $button_id), array('%d'));

        if ($deleted !== false) {
          wp_cache_delete($cache_key, 'anka_commerce');

          wp_redirect(admin_url('admin.php?page=anka_commerce_payment_buttons'));
          exit;
        }
      } else {
        echo '<div class="notice notice-error"><p>' . esc_html__('Button not found or could not be deleted.', 'anka-commerce') . '</p></div>';
      }
    }
  }
?>

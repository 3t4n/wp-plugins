<?php

function tswchc_get_settings_tab() {
  $prev_rules = json_decode(get_option('tswchc_rules'));

  // Initialize fallback category URL
  $cat_url = '';

  if (is_array($prev_rules)) {
    // Loop through the prev_rules array to find the first category
    foreach ($prev_rules as $rule) {
      $category_slug = $rule->category;

      // Try to get the term object using the category slug
      $category_term = get_term_by('slug', $category_slug, 'product_cat');

      // If the category is found, get its URL
      if ($category_term) {
        $cat_url = get_term_link($category_term);
        break; // Exit the loop once the first valid category URL is found
      }
    }
  }

  // If no valid category URL was found, fall back to the default category (uncategorized)
  if (empty($cat_url)) {
    $default_category = get_term_by('slug', 'uncategorized', 'product_cat');
    if ($default_category) {
      $cat_url = get_term_link($default_category);
    }
  }
?>

  <div class="accordion" id="accordion-settings">

    <div class="accordion-item">

      <h4 class="accordion-header">

        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-redirect-mode" aria-expanded="true" aria-controls="collapse-redirect-mode">

          <?php _e('Redirect Mode', 'ts-wchc'); ?>

        </button>

      </h4>

      <div id="collapse-redirect-mode" class="accordion-collapse collapse show" aria-labelledby="heading-redirect-mode">

        <div class="accordion-body">

          <div class="form-group">
            <label for="tswchc_redirect_mode"><?php _e('Redirect Mode', 'ts-wchc'); ?></label>
            <select class="form-select" id="tswchc_redirect_mode" name="tswchc_redirect_mode">
              <option value="url" <?php echo esc_html(get_option('tswchc_redirect_mode') == 'url' ? 'selected="selected"' : '') ?>><?php _e('Custom URL', 'ts-wchc'); ?></option>
              <option value="display-message" <?php echo esc_html(get_option('tswchc_redirect_mode') == 'display-message' ? 'selected="selected"' : '') ?>><?php _e('Display a Message', 'ts-wchc'); ?></option>
            </select>
            <small class="form-text text-muted"><?php _e('Select if you want to redirect users to an URL or display a custom message if they attempt to access a hidden category or product page.', 'ts-wchc'); ?></small>
          </div>

          <div class="form-group redirect-mode hidden" data-mode="url">
            <label for="tswchc_redirect_url"><?php _e('Redirect URL', 'ts-wchc'); ?></label>
            <input type="text" class="form-control" id="tswchc_redirect_url" name="tswchc_redirect_url" value="<?php echo esc_attr(get_option('tswchc_redirect_url')); ?>">
            <small class="form-text text-muted"><?php _e('Redirects to shop page if empty |', 'ts-wchc'); ?> <i><?php echo wc_get_page_permalink('shop') ?></i></small>
          </div>

          <div class="form-group redirect-mode hidden" data-mode="display-message">
            <label for="tswchc_display_custom_message"><?php _e('Message to Display', 'ts-wchc'); ?></label>
            <?php
            $content = get_option('tswchc_display_custom_message');
            wp_editor($content, 'tswchc_display_custom_message', $settings = array('textarea_rows' => '25', 'editor_height' => 300,));
            ?>
          </div>

          <div class="form-group redirect-mode hidden" data-mode="display-message">
            <label for="tswchc_message_styles"><?php _e('Message Styles', 'ts-wchc'); ?></label>
            <textarea class="form-control" id="tswchc_message_styles" name="tswchc_message_styles" rows="8"><?php echo esc_attr(get_option('tswchc_message_styles')); ?></textarea>
            <small class="form-text text-muted"><?php _e('Add styles to personalize your message', 'ts-wchc'); ?></small>
          </div>

        </div>

      </div>

    </div>

    <div class="accordion-item">

      <h4 class="accordion-header">

        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-advanced-settings" aria-expanded="true" aria-controls="collapse-advanced-settings">

          <?php _e('Advanced Settings', 'ts-wchc'); ?>

        </button>

      </h4>

      <div id="collapse-advanced-settings" class="accordion-collapse collapse" aria-labelledby="heading-advanced-settings">

        <div class="accordion-body">

          <div class="form-group">

            <div class="row">

              <div class="col-md-6 how-img">
                <label for="tswchc_import_data"><?php _e('IMPORT', 'ts-wchc'); ?></label>
                <small class="form-text text-muted"><?php _e('Select and upload a JSON settings file.', 'ts-wchc'); ?></small>
                <input type="file" name="settings_file" id="settings_file" accept="application/JSON">

                <a href="#" id="tswchc-import-settings" class="btn btn-secondary disabled"><?php _e('Import Settings', 'ts-wchc'); ?></a>
              </div>
              <div class="col-md-6">
                <label for="tswchc_export_data"><?php _e('EXPORT', 'ts-wchc'); ?></label>
                <small class="form-text text-muted"><?php _e('Click in order to generate a download link.', 'ts-wchc'); ?></small>
                <a href="#" id="tswchc-export-settings" class="btn btn-secondary"><?php _e('Export Settings', 'ts-wchc'); ?></a>
                <div id="tswchc-settings-link-wrapper"></div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

<?php } ?>
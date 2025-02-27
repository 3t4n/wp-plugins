<?php
  if(!defined('ABSPATH')) exit;

  if(current_user_can('administrator') && isset($_POST['elpl_submit'])) {

    check_admin_referer('store-elpl-settings', 'easy-lite-preloader-settings');

    if(
      isset($_POST['easy-lite-preloader-settings']) && 
      get_option('elpreloader_settings') != $_POST['elpreloader-settings']
    ) {
      $elpreloader_settings = [];
      foreach ( $_POST['elpreloader-settings'] as $key => $value ) {
        if ( $key === 'pages' ) {
          $pages = [];
          foreach ( $value as $page => $on ) {
            $pages[$page] = sanitize_text_field($page);
          }
          $elpreloader_settings[ $key ] = $pages;
        } elseif ( $key === 'image-url' ) {
          $elpreloader_settings[ $key ] = esc_url_raw($value);
        } elseif ( $key === 'image-dimension' ) {
          $dimension = explode('x', strtolower(sanitize_text_field($value)));
          if ( sizeof($dimension) == 2 ) {
            $elpreloader_settings[ $key ] = (int) trim($dimension[0]).'x'.(int) trim($dimension[1]);
          } else {
            $elpreloader_settings[ $key ] = '64x64';
          }
        } elseif ( $key === 'background' ) {
          $elpreloader_settings[ $key ] = sanitize_hex_color_no_hash($value);
        } elseif ( $key === 'bg-transparency' ) {
          $elpreloader_settings[ $key ] = (float) sanitize_text_field($value);
        } elseif ( $key === 'message' ) {
          $elpreloader_settings[ $key ] = sanitize_textarea_field($value);
        } else {
          $elpreloader_settings[ $key ] = sanitize_text_field($value);
        }
      }
      update_option('elpreloader_settings', $elpreloader_settings);
    }
  }

  $settings = get_option('elpreloader_settings');
  $display_on = isset($settings['show_in']) ? $settings['show_in'] : 'entire';
?>

<div id="easy-lite-preloader-preview" style="display: none;">
  <div class="easy-lite-preloader-wrap">
    <button type="button" id="elpl-preview-close">&#10005;</button>
    <img src="" alt="Loading...">
    <p></p>
  </div>
</div>

<div id="elpl-wrap">
  <h2 id="elpl-title">Easy Lite Preloader</h2>
  <?php if(isset($_POST['elpl_submit'])): ?>
    <div class="updated">
      <p>Content updated successfully</p>
    </div>
  <?php endif;?>

  <hr>

  <form id="elpl-form" method="post" action="">
    <?php wp_nonce_field('store-elpl-settings', 'easy-lite-preloader-settings'); ?>
    <div class="row">
      <div class="w3 fl">
        <p>Pages where preloader will be displayed</p>
      </div>
      <div class="w9 fl">
        <ul class="w4 fl">
          <li>
            <label for="page-entire">
              <input type="radio" class="display-for" name="elpreloader-settings[show_in]" value="entire" id="page-entire" <?php echo $display_on === "entire" ? 'checked':''; ?>>
              Entire Website
            </label>
          </li>
          <li>
            <label for="page-custom">
              <input type="radio" class="display-for" name="elpreloader-settings[show_in]" value="custom" id="page-custom" <?php echo $display_on === "custom" ? 'checked':''; ?>>
              Selected Pages Only
            </label>
            <ul class="w8 custom-pages">
              <?php
                $has_static_front = false;
                $pages = get_pages(['sort_column' => 'post_title']);
                foreach( $pages as $key => $page ) {
                ?>
                  <li>
                    <label for="page-<?php echo $page->ID; ?>">
                      <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][<?php echo $page->ID; ?>]" id="page-<?php echo $page->ID; ?>" <?php echo isset($settings['pages']) && isset($settings['pages'][$page->ID]) ? 'checked':''; ?>>
                      <?php if($page->ID == get_option('page_on_front')) : $has_static_front = true; ?>
                        <?php echo $page->post_title; ?> <b>(Front Page)</b>
                      <?php else: ?>
                        <?php echo $page->post_title; ?>
                      <?php endif; ?>
                    </label>
                  </li>
                <?php
                }
              ?>
              <?php if(!$has_static_front): ?>
              <li>
                <label for="page-front">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][front]" id="page-front" <?php echo isset($settings['pages']) && isset($settings['pages']['front']) ? 'checked':''; ?>>
                  Front Page
                </label>
              </li>
              <?php endif; ?>
              <li>
                <label for="page-posts">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][posts]" id="page-posts" <?php echo isset($settings['pages']) && isset($settings['pages']['posts']) ? 'checked':''; ?>>
                  All Posts
                </label>
              </li>
              <li>
                <label for="page-archives">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][archives]" id="page-archives" <?php echo isset($settings['pages']) && isset($settings['pages']['archives']) ? 'checked':''; ?>>
                  Archives
                </label>
              </li>
              <li>
                <label for="page-categories">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][categories]" id="page-categories" <?php echo isset($settings['pages']) && isset($settings['pages']['categories']) ? 'checked':''; ?>>
                  Categories
                </label>
              </li>
              <li>
                <label for="page-search">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][search]" id="page-search" <?php echo isset($settings['pages']) && isset($settings['pages']['search']) ? 'checked':''; ?>>
                  Search Results
                </label>
              </li>
              <li>
                <label for="page-404">
                  <input type="checkbox" <?php echo $display_on === "entire" ? 'disabled' : ''; ?> class="page-checkbox" name="elpreloader-settings[pages][404]" id="page-404" <?php echo isset($settings['pages']) && isset($settings['pages']['404']) ? 'checked':''; ?>>
                  404 Page
                </label>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Show Preloader on<br>small screens and large screens</p>
      </div>
      <div class="w9 fl">
        <ul>
          <li>
            <label for="show-on-mobile">
              <input type="checkbox" id="show-on-mobile" name="elpreloader-settings[show-on-mobile]" <?php echo isset($settings['show_in']) ? (isset($settings['show-on-mobile']) ? 'checked':''):'checked'; ?>>
              Show on mobile/tablets
            </label>
          </li>
          <li>
            <label for="show-on-desktop">
              <input type="checkbox" id="show-on-desktop" name="elpreloader-settings[show-on-desktop]" <?php echo isset($settings['show_in']) ? (isset($settings['show-on-desktop']) ? 'checked':''):'checked'; ?>>
              Show on Desktops
            </label>
          </li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Preloader Image URL</p>
      </div>
      <div class="w9 fl">
        <input type="url" class="input-url" name="elpreloader-settings[image-url]" value="<?php echo isset($settings['image-url']) ? esc_url($settings['image-url']) : esc_url(ELPRELOADER).'assets/images/dog.gif'; ?>">
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Preloader Image Dimension<br>(width x height)</p>
      </div>
      <div class="w9 fl">
        <input type="text" id="elpl-dimension" class="input-xs" name="elpreloader-settings[image-dimension]" value="<?php echo isset($settings['image-dimension']) ? esc_attr($settings['image-dimension']) : '64x32'; ?>">
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Background Color</p>
      </div>
      <div class="w9 fl">
        <input type="text" id="elpl-bg-color" class="jscolor input-xs" name="elpreloader-settings[background]" value="<?php echo isset($settings['background']) ? esc_attr($settings['background']) : '36454F'; ?>">
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Background Transparency<br>Possible value (0 to 1)</p>
      </div>
      <div class="w9 fl">
        <input type="number" id="elpl-bg-transparency" class="input-xs" name="elpreloader-settings[bg-transparency]" value="<?php echo isset($settings['bg-transparency']) ? esc_attr($settings['bg-transparency']) : '1'; ?>" min="0" max="1" step="any">
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Quotation or Message (optional)</p>
      </div>
      <div class="w9 fl">
        <textarea name="elpreloader-settings[message]" rows="5"><?php echo isset($settings['message']) ? esc_attr($settings['message']) : 'Expect nothing, live frugally on surprise. - Alice Walker'; ?></textarea>
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Message Color</p>
      </div>
      <div class="w9 fl">
        <input type="text" id="elpl-message-color" class="jscolor input-xs" name="elpreloader-settings[message-color]" value="<?php echo isset($settings['message-color']) ? esc_attr($settings['message-color']) : 'A2A2A2'; ?>">
      </div>
    </div>

    <div class="row">
      <div class="w3 fl">
        <p>Message Font Size (px)</p>
      </div>
      <div class="w9 fl">
        <input type="number" id="elpl-message-font" class="input-xs" name="elpreloader-settings[message-font]" value="<?php echo isset($settings['message-font']) ? esc_attr($settings['message-font']) : '18'; ?>">
      </div>
    </div>

    <hr class="clear">
    <button type="button" id="elpreloader-preview" class="elpl-btn-info">Preview</button>
    <input type="submit" name="elpl_submit" value="Save Changes" class="elpl-btn-primary">
  </form>

</div>
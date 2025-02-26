<?php
if (!defined('ABSPATH')) exit;
if (isset($_GET['lang'])) {
  $current_language_id = sanitize_text_field(wp_unslash($_GET['lang']));
}
if (isset($_GET['shop_id'])) {
  $shop_id = sanitize_text_field(wp_unslash($_GET['shop_id']));
}
$shopid = sanitize_text_field(get_option('accessibility_shopid'));
$token = get_option('accessibility_tokken');
$accessibility_url = get_option('accessibility_url');
$data = array('shopid' => $shopid, 'language_translation_id' => $current_language_id);
$content = assistant_api_call('/getShopData', $data, 'get');
if (isset($_POST['btnAdd'])) {
  if (!isset($_POST['accessibility_lang_nonce']) || !wp_verify_nonce(wp_unslash(sanitize_key($_POST['accessibility_lang_nonce'])), 'accessibility_lang_nonce')) {

    print 'Sorry, You can not update....';
    exit;
  } else {
    $widget_enable = 0;
    $keyboard_nav = $cursor = $big_cursor = $reading_guide = $desaturate = $contrast = $invert_contrast = $dark_contrast = $light_contrast = $bigger_text = $highlight_links = $reset_all = $alignment = $invert_contrast = "";
    $error = array();

    if (isset($_POST['keyboard_nav'])) {
      $keyboard_nav = sanitize_text_field(wp_unslash($_POST['keyboard_nav']));
      if (empty($keyboard_nav)) {
        $error[] = "Keybaord shoud not empty.";
      }
    }

    if (isset($_POST['big_cursor'])) {
      $big_cursor = sanitize_text_field(wp_unslash($_POST['big_cursor']));
      if (empty($big_cursor)) {
        $error[] = "Big Cursor should not be empty.";
      }
    }

    if (isset($_POST['reading_guide'])) {
      $reading_guide = sanitize_text_field(wp_unslash($_POST['reading_guide']));
      if (empty($reading_guide)) {
        $error[] = "Reading Guide Color should not be empty.";
      }
    }

    if (isset($_POST['high_saturation'])) {
      $high_saturation = sanitize_text_field(wp_unslash($_POST['high_saturation']));
      if (empty($high_saturation)) {
        $error[] = "High saturation should not be empty.";
      }
    }

    if (isset($_POST['low_saturation'])) {
      $low_saturation = sanitize_text_field(wp_unslash($_POST['low_saturation']));
      if (empty($low_saturation)) {
        $error[] = "Low saturation should not be empty.";
      }
    }

    if (isset($_POST['desaturate'])) {
      $desaturate = sanitize_text_field(wp_unslash($_POST['desaturate']));
      if (empty($desaturate)) {
        $error[] = "Desaturate should not be empty.";
      }
    }

    if (isset($_POST['invert_colors'])) {
      $invert_contrast = sanitize_text_field(wp_unslash($_POST['invert_colors']));
      if (empty($invert_contrast)) {
        $error[] = "Invert Colors should not be empty.";
      }
    }

    if (isset($_POST['dark_contrast'])) {
      $dark_contrast = sanitize_text_field(wp_unslash($_POST['dark_contrast']));
      if (empty($dark_contrast)) {
        $error[] = "Dark Contrast should not be empty.";
      }
    }

    if (isset($_POST['light_contrast'])) {
      $light_contrast = sanitize_text_field(wp_unslash($_POST['light_contrast']));
      if (empty($light_contrast)) {
        $error[] = "Light Contrast should not be empty.";
      }
    }

    if (isset($_POST['bigger_text'])) {
      $bigger_text = sanitize_text_field(wp_unslash($_POST['bigger_text']));
      if (empty($bigger_text)) {
        $error[] = "Bigger Text should not be empty.";
      }
    }


    if (isset($_POST['highlight_links'])) {
      $highlight_links = sanitize_text_field(wp_unslash($_POST['highlight_links']));
      if (empty($highlight_links)) {
        $error[] = "Highlight Links should not be empty.";
      }
    }

    if (isset($_POST['word_spacing'])) {
      $word_spacing = sanitize_text_field(wp_unslash($_POST['word_spacing']));
      if (empty($word_spacing)) {
        $error[] = "Word Spacing should not be empty.";
      }
    }

    if (isset($_POST['letter_spacing'])) {
      $letter_spacing = sanitize_text_field(wp_unslash($_POST['letter_spacing']));
      if (empty($letter_spacing)) {
        $error[] = "Letter Spacing should not be empty.";
      }
    }

    if (isset($_POST['line_height'])) {
      $line_height = sanitize_text_field(wp_unslash($_POST['line_height']));
      if (empty($line_height)) {
        $error[] = "Line Height should not be empty.";
      }
    }

    if (isset($_POST['left_alignment'])) {
      $left_alignment = sanitize_text_field(wp_unslash($_POST['left_alignment']));
      if (empty($left_alignment)) {
        $error[] = "Left Alignment should not be empty.";
      }
    }

    if (isset($_POST['right_alignment'])) {
      $right_alignment = sanitize_text_field(wp_unslash($_POST['right_alignment']));
      if (empty($right_alignment)) {
        $error[] = "Alignment should not be empty.";
      }
    }

    if (isset($_POST['center'])) {
      $center = sanitize_text_field(wp_unslash($_POST['center']));
      if (empty($center)) {
        $error[] = "Center should not be empty.";
      }
    }

    if (isset($_POST['readable_fonts'])) {
      $readable_fonts = sanitize_text_field(wp_unslash($_POST['readable_fonts']));
      if (empty($readable_fonts)) {
        $error[] = "Readable Fonts should not be empty.";
      }
    }


    if (isset($_POST['reading_mask'])) {
      $reading_mask = sanitize_text_field(wp_unslash($_POST['reading_mask']));
      if (empty($reading_mask)) {
        $error[] = "Reading Mask should not be empty.";
      }
    }

    if (isset($_POST['highlight_titles'])) {
      $highlight_titles = sanitize_text_field(wp_unslash($_POST['highlight_titles']));
      if (empty($highlight_titles)) {
        $error[] = "Highlight Titles should not be empty.";
      }
    }

    if (isset($_POST['text_magnifier'])) {
      $text_enhancer = sanitize_text_field(wp_unslash($_POST['text_magnifier']));
      if (empty($text_enhancer)) {
        $error[] = "Text Enhancer should not be empty.";
      }
    }

    if (isset($_POST['image_alt_tooltip'])) {
      $image_alt_tooltip = sanitize_text_field(wp_unslash($_POST['image_alt_tooltip']));
      if (empty($image_alt_tooltip)) {
        $error[] = "Image Alt Tooltip should not be empty.";
      }
    }

    if (isset($_POST['image_hide'])) {
      $image_hide = sanitize_text_field(wp_unslash($_POST['image_hide']));
      if (empty($image_hide)) {
        $error[] = "Image Hide should not be empty.";
      }
    }

    if (isset($_POST['video_hide'])) {
      $video_hide = sanitize_text_field(wp_unslash($_POST['video_hide']));
      if (empty($video_hide)) {
        $error[] = "Video Hide should not be empty.";
      }
    }

    if (isset($_POST['stop_animation'])) {
      $stop_animation = sanitize_text_field(wp_unslash($_POST['stop_animation']));
      if (empty($stop_animation)) {
        $error[] = "Stop Animation should not be empty.";
      }
    }

    if (isset($_POST['text_speech'])) {
      $text_speech = sanitize_text_field(wp_unslash($_POST['text_speech']));
      if (empty($text_speech)) {
        $error[] = "Text Speech should not be empty.";
      }
    }

    if (isset($_POST['accessibility_assistant'])) {
      $accessibility_assistant = sanitize_text_field(wp_unslash($_POST['accessibility_assistant']));
      if (empty($accessibility_assistant)) {
        $error[] = "Accessibility Assistant should not be empty.";
      }
    }

    if (isset($_POST['reset_all'])) {
      $reset_all = sanitize_text_field(wp_unslash($_POST['reset_all']));
      if (empty($reset_all)) {
        $error[] = "Reset All should not be empty.";
      }
    }

    if (isset($_POST['statement'])) {
      $statement = sanitize_text_field(wp_unslash($_POST['statement']));
      if (empty($statement)) {
        $error[] = "Statement should not be empty.";
      }
    }

    if (isset($_POST['hide_interface'])) {
      $hide_interface = sanitize_text_field(wp_unslash($_POST['hide_interface']));
      if (empty($hide_interface)) {
        $error[] = "Hide Interface should not be empty.";
      }
    }

    $visible_lang_switcher = "off";
    if (isset($_POST['visible_lang_switcher'])) {
      $widget_enable = sanitize_text_field(wp_unslash($_POST['visible_lang_switcher']));
      if ($widget_enable == "on") {
        $visible_lang_switcher = "on";
      }
    }

    $default_language_switcher = "off";
    if (isset($_POST['default_language_switcher'])) {
      $widget_enable = sanitize_text_field(wp_unslash($_POST['default_language_switcher']));
      if ($widget_enable == "on") {
        $default_language_switcher = "on";
      }
    }

    if (empty($error)) {
      $send_data = array(
        'language_id' => $current_language_id,
        'shop_id' => $shop_id,
        'is_default' => $default_language_switcher,
        'is_visible' => $visible_lang_switcher,
        'keyboard_nav' => $keyboard_nav,
        'big_cursor' => $big_cursor,
        'reading_guide' => $reading_guide,
        'high_saturation' => $high_saturation,
        'low_saturation' => $low_saturation,
        'desaturate' => $desaturate,
        'invert_colors' => $invert_contrast,
        'dark_contrast' => $dark_contrast,
        'light_contrast' => $light_contrast,
        'bigger_text' => $bigger_text,
        'highlight_links' => $highlight_links,
        'word_spacing' => $word_spacing,
        'letter_spacing' => $letter_spacing,
        'line_height' => $line_height,
        //'alignment' => $_POST['alignment'],
        'left_alignment' => $left_alignment,
        'right_alignment' => $right_alignment,
        'center' => $center,
        'readable_fonts' => $readable_fonts,
        'reading_mask' => $reading_mask,
        'highlight_titles' => $highlight_titles,
        'text_magnifier' => $text_enhancer,
        'image_alt_tooltip' => $image_alt_tooltip,
        'image_hide' => $image_hide,
        'video_hide' => $video_hide,
        'stop_animation' => $stop_animation,
        'text_speech' => $text_speech,
        'accessibility_assistant' => $accessibility_assistant,
        'reset_all' => $reset_all,
        'statement' => $statement,
        'hide_interface' => $hide_interface,
      );
    } else {
      echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error! </strong>';
      foreach ($error as $err) {
        // Escape the error message before outputting it
        echo ' ' . esc_html($err) . ', ';
      }
      echo '</div>';
    }

    $returnsenddata = assistant_api_call('/languageUpdate', $send_data, 'post');

    // exit;
    if ($returnsenddata['status'] == 200) {
      echo '<div  class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success! </strong> </div>';
      $content = assistant_api_call('/getShopData', $data, 'get');
    } elseif ($returnsenddata['status'] == 400) {
      echo '<div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error! </strong>';
      echo esc_html($returnsenddata['messages']);
      echo '</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error! </strong>';
      echo esc_html($returnsenddata['messages']);
      echo '</div>';
    }
  }
}

?>

<!-- header -->
<div class="ada-cc-edit-langauges">

  <div class="ada-cc-logo">
    <div class="ada-cc-icon">
      <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__)) . '/assets/square-icon-svg-file-1.png'); ?>" alt="">
    </div>
    <div class="ada-cc-name">
      <p class="ada-cc-text">Accessibility by CartCoders</p>
    </div>
  </div>
  <div class="ada-cc-searchmain">
    <div class="ada-cc-left">
      <div class="ada-cc-top">
        <p> <span style="color: #bfcad8;">pages</span> / Settings</p>
      </div>
      <div class="ada-cc-bottom">
        <p class="ada-cc-dash-text">Settings</p>
        <p class="ada-cc-dash-text"><?php echo esc_html($content['data']['language_translations_data']['language_name']); ?></p>
      </div>
    </div>
  </div>

  <form method="post" id="accessibility_language_frm">
    <?php wp_nonce_field('accessibility_lang_nonce', 'accessibility_lang_nonce'); ?>
    <input id="shopid" type="hidden" name="shopid" class="form-control" value="<?php echo esc_attr($shopid); ?>">
    <!-- edit-langauges-inner-whitediv -->
    <div class="ada-cc-edit-inner-main">
      <div class="ada-cc-edit-sub-inner-main">
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Language Controllers</h3>
            <button id="btnBack" class="back-btn">Back</button>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller">
              <input type="checkbox" id="default_language_switcher" name="default_language_switcher" <?php if ($content['data']['language_translations_data']['is_default'] == 1) {
                                                                                                        echo "checked";
                                                                                                      } ?>>
              <span class="ada-cc-span" for="checkbox1"></span>
              <label for="text">Set <?php echo esc_html($content['data']['language_translations_data']['language_name']); ?> Default Language</label>
            </div>
            <div class="ada-cc-controller">
              <input type="checkbox" name="visible_lang_switcher" id="visible_lang_switcher" <?php if ($content['data']['language_translations_data']['is_visible'] == 1) {
                                                                                                echo "checked";
                                                                                              } ?>>
              <span class="ada-cc-span" for="checkbox1"></span>
              <label for="text">Show Language</label>
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Navigation and Interaction Controllers</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>Keyboard Nav</label>
              <input type="text" placeholder="Keyboard Nav" id="keyboard_nav" name="keyboard_nav" value="<?php echo esc_attr($content['data']['language_translations_data']['keyboard_nav']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Big Cursor</label>
              <input type="text" placeholder="Big Cursor" id="big_cursor" name="big_cursor" value="<?php echo esc_attr($content['data']['language_translations_data']['big_cursor']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Reading Guide</label>
              <input type="text" placeholder="Reading Guide" id="reading_guide" name="reading_guide" value="<?php echo esc_attr($content['data']['language_translations_data']['reading_guide']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Visual Customization Controllers</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>High Saturation</label>
              <input type="text" placeholder="High Saturation" id="high_saturation" name="high_saturation" value="<?php echo esc_attr($content['data']['language_translations_data']['high_saturation']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Low Saturation</label>
              <input type="text" placeholder="Low Saturation" id="low_saturation" name="low_saturation" value="<?php echo esc_attr($content['data']['language_translations_data']['low_saturation']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Desaturate</label>
              <input type="text" placeholder="Desaturate" id="desaturate" name="desaturate" value="<?php echo esc_attr($content['data']['language_translations_data']['desaturate']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Invert Colors</label>
              <input type="text" placeholder="Invert Colors" id="invert_colors" name="invert_colors" value="<?php echo esc_attr($content['data']['language_translations_data']['invert_colors']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Dark Contrast</label>
              <input type="text" placeholder="Dark Contrast" id="dark_contrast" name="dark_contrast" value="<?php echo esc_attr($content['data']['language_translations_data']['dark_contrast']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Light Contrast</label>
              <input type="text" placeholder="Light Contrast" id="light_contrast" name="light_contrast" value="<?php echo esc_attr($content['data']['language_translations_data']['light_contrast']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Bigger Text</label>
              <input type="text" placeholder="Bigger Text" id="bigger_text" name="bigger_text" value="<?php echo esc_attr($content['data']['language_translations_data']['bigger_text']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Text Customization Controllers</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>Highlight Links</label>
              <input type="text" id="highlight_links" name="highlight_links" placeholder="Highlight Links" value="<?php echo esc_attr($content['data']['language_translations_data']['highlight_links']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Word Spacing</label>
              <input type="text" placeholder="Word Spacing" id="word_spacing" name="word_spacing" value="<?php echo esc_attr($content['data']['language_translations_data']['word_spacing']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Letter Spacing</label>
              <input type="text" placeholder="Letter Spacing" id="letter_spacing" name="letter_spacing" value="<?php echo esc_attr($content['data']['language_translations_data']['letter_spacing']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Line Height</label>
              <input type="text" placeholder="Line Height" id="line_height" name="line_height" value="<?php echo esc_attr($content['data']['language_translations_data']['line_height']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Left Alignment</label>
              <input type="text" placeholder="Left Alignment" id="left_alignment" name="left_alignment" value="<?php echo esc_attr($content['data']['language_translations_data']['left_alignment']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Right Alignment</label>
              <input type="text" placeholder="Right Alignment" id="right_alignment" name="right_alignment" value="<?php echo esc_attr($content['data']['language_translations_data']['right_alignment']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Center</label>
              <input type="text" placeholder="Center" id="center" name="center" value="<?php echo esc_attr($content['data']['language_translations_data']['center']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Readable Fonts</label>
              <input type="text" placeholder="Readable Fonts" id="readable_fonts" name="readable_fonts" value="<?php echo esc_attr($content['data']['language_translations_data']['readable_fonts']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Reading Mask</label>
              <input type="text" placeholder="Reading Mask" id="reading_mask" name="reading_mask" value="<?php echo esc_attr($content['data']['language_translations_data']['reading_mask']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Highlight Titles</label>
              <input type="text" placeholder="Highlight Titles" id="highlight_titles" name="highlight_titles" value="<?php echo esc_attr($content['data']['language_translations_data']['highlight_titles']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Text Enhancer</label>
              <input type="text" placeholder="Text Enhancer" id="text_magnifier" name="text_magnifier" value="<?php echo esc_attr($content['data']['language_translations_data']['text_magnifier']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Image Alt Tooltip</label>
              <input type="text" placeholder="Image Alt Tooltip" id="image_alt_tooltip" name="image_alt_tooltip" value="<?php echo esc_attr($content['data']['language_translations_data']['image_alt_tooltip']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Media Control</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>Image Hide</label>
              <input type="text" placeholder="Image Hide" id="image_hide" name="image_hide" value="<?php echo esc_attr($content['data']['language_translations_data']['image_hide']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Video Hide</label>
              <input type="text" placeholder="Video Hide" id="video_hide" name="video_hide" value="<?php echo esc_attr($content['data']['language_translations_data']['video_hide']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Stop Animation</label>
              <input type="text" placeholder="Stop Animation" id="stop_animation" name="stop_animation" value="<?php echo esc_attr($content['data']['language_translations_data']['stop_animation']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Speech Support</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>Text Speech</label>
              <input type="text" placeholder="Text Speech" id="text_speech" name="text_speech" value="<?php echo esc_attr($content['data']['language_translations_data']['text_speech']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-all-controller">
          <div class="ada-cc-top-heading-main">
            <h3 class="heading">Utility Settings</h3>
          </div>
          <div class="ada-cc-controller-details">
            <div class="ada-cc-controller-input-main">
              <label>Accessibility Assistant</label>
              <input type="text" placeholder="Accessibility Assistant" id="accessibility_assistant" name="accessibility_assistant" value="<?php echo esc_attr($content['data']['language_translations_data']['accessibility_assistant']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Reset all</label>
              <input type="text" placeholder="Reset all" id="reset_all" name="reset_all" value="<?php echo esc_attr($content['data']['language_translations_data']['reset_all']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Statement</label>
              <input type="text" placeholder="Statement" id="statement" name="statement" value="<?php echo esc_attr($content['data']['language_translations_data']['statement']); ?>">
            </div>
            <div class="ada-cc-controller-input-main">
              <label>Hide Interface</label>
              <input type="text" placeholder="Hide Interface" id="hide_interface" name="hide_interface" value="<?php echo esc_attr($content['data']['language_translations_data']['hide_interface']); ?>">
            </div>
          </div>
        </div>
        <div class="ada-cc-edit-langauges-save-btn">
          <button class="save-btn" name="btnAdd" type="submit">Save</button>
        </div>
      </div>
    </div>
  </form>
  <div class="ada-cc-contactus-footer">
    <p class="ada-cc-contactus-line">Have questions or need assistance? <a href="https://assistance.cartcoders.com?domain=accessibility-assistant.cartcoders.com" target="_blank"> Contact us</a></p>
  </div>
</div>
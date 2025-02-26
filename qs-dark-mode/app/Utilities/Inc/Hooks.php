<?php


add_filter('upload_mimes', 'qs_dark_mode_mime_types');
add_filter('qs_dm_localize_options', 'qs_dark_mode_lite_localize_options_theme_preset', 10);

function qs_dark_mode_lite_localize_options_theme_preset($options)
{

  $options['theme_preset']       = qs_dark_mode_theme_preset();
  $options['qs_dm_lite_version'] = QS_DARK_MODE_LITE_VERSION;
  return $options;
}

// Mime Type svg support
function qs_dark_mode_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


add_filter('wp_handle_upload_prefilter', 'qs_sanitize_svg_upload');
function qs_sanitize_svg_upload($file)
{
  if ($file['type'] === 'image/svg+xml') {

    // Load the file's contents
    $svg_content = file_get_contents($file['tmp_name']);

    // Extract the XML and DOCTYPE declarations if they exist
    preg_match('/^(<\?xml.*?\?>)?\s*(<!DOCTYPE.*?>)?\s*(<svg.*)/s', $svg_content, $matches);

    $xml_declaration = isset($matches[1]) ? $matches[1] : '';
    $doctype_declaration = isset($matches[2]) ? $matches[2] : '';
    $svg_body = isset($matches[3]) ? $matches[3] : '';

    // Define allowed SVG tags and attributes
    $allowed_tags = [
      'svg' => [
        'xmlns' => true,
        'width' => true,
        'height' => true,
        'viewBox' => true,
        'fill' => true,
        'stroke' => true,
        'stroke-width' => true,
        'version' => true,
        'baseProfile' => true,
      ],
      'g' => ['fill' => true],
      'path' => ['d' => true, 'fill' => true],
      'polygon' => ['points' => true, 'fill' => true, 'stroke' => true],
      'circle' => ['cx' => true, 'cy' => true, 'r' => true],
      'rect' => ['x' => true, 'y' => true, 'width' => true, 'height' => true, 'fill' => true],
      'line' => ['x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true],
      'title' => [],
      'desc' => [],
    ];

    $clean_svg_body = wp_kses($svg_body, $allowed_tags);

    $clean_svg = $xml_declaration . "\n" . $doctype_declaration . "\n" . $clean_svg_body;


    file_put_contents($file['tmp_name'], $clean_svg);
  }

  return $file;
}

// preloader

add_action('wp_body_open', 'qs_dark_mode_wp_body_open');

if (!function_exists('qs_dark_mode_wp_body_open')) {

  function qs_dark_mode_wp_body_open()
  {

    $qs_dark_mode_theme_preset = qs_dark_mode_theme_preset();
    $qs_dark_mode_theme_preset = json_decode($qs_dark_mode_theme_preset, true);
    $bg_color = isset($qs_dark_mode_theme_preset['--qs-dm-bg']) ? $qs_dark_mode_theme_preset['--qs-dm-bg'] : '#0000';
    $option = get_option('qsf_dark_mode_theme_preset_options');

    if ($option && isset($option['theme_custom_color']) && $option['theme_custom_color'] == 'on') {

      $bg_color = qs_dark_mode_theme_background_color();
    }

    if (qs_dark_mode_active() && qs_dark_mode_default()) {
      echo sprintf('<div class="qs-skip-dark-mode qs-dark-mode-preloader-overlay" style="background-color:%s"> </div>', esc_attr($bg_color));
    }
  }
}

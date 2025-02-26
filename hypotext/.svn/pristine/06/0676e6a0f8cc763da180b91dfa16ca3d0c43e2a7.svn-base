<?php
/*
* Plugin Name: Hypotext
* Description: Hypotext integration.
* Version: 1.0.1
* Author: Dejan SEO
* Author URI: http://dejanseo.com.au
*/

/**
 * @param array $atts
 *   The attributes passed within the opening tag.
 * @param null|string $content
 *   The content between the opening and closing tags.
 *
 * @return string
 *   The generated html for output.
 */
function hypotext_shortcode($atts, $content = NULL) {
  // Call this function to add any defaults that aren't set.
  $atts = shortcode_atts(array(
    'target' => NULL,
    'id' => NULL,
  ), $atts);

  // If we have target set, this is a link referencing the content.
  if (!empty($atts['target'])) {
    return '<a href="#" id="hypotext-anchor-' . $atts['target'] . '" class="hypotext closed" rel="hypotext-content-' . $atts['target'] . '">' . do_shortcode($content) . '</a>';
  }
  // If id is set, this is the content.
  elseif (!empty($atts['id'])) {
    return '<div class="hypotext-content hypotext-content-' . $atts['id'] . '" rel="hypotext-anchor-' . $atts['id'] . '">' .
           '<a href="#" class="hypotext closed close" rel="hypotext-content-' . $atts['id'] . '"></a>' .
           do_shortcode($content) . '</div>';
  }

  // Return an empty string in case required data wasn't provided.
  return '';
}

/**
 * Function to register our scripts.
 */
function hypotext_scripts() {
  // Register the script like this for a plugin:
  wp_register_script( 'hypotext', plugins_url( '/js/hypotext.js', __FILE__ ), array('jquery') );
  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script( 'hypotext' );
}

function hypotext_css() {
  wp_register_style( 'hypotext', plugins_url('/css/hypotext.css', __FILE__) );
  wp_enqueue_style( 'hypotext' );
}

// Register our js.
add_action( 'wp_enqueue_scripts', 'hypotext_scripts' );
// Register our css.
add_action( 'wp_enqueue_scripts', 'hypotext_css' );
// Register our shortcode.
add_shortcode('hypotext', 'hypotext_shortcode');

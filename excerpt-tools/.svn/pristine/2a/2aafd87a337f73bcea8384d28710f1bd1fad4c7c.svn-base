<?php

namespace Bang\excerpt_tools;
 /*
 Plugin Name: Excerpt Tools 
 Plugin URI: http://www.bang-on.net/
 Description: Customize your excerpts. Allows you to limit the length of excerpts with a jQuery character counter, display a custom title and description for the excerpt box and show the excerpt box on pages.
 Author: Marcus Downing and Zack Kakia
 Author URI: http://www.bang-on.net/
 Version: 0.7
 */

if (!defined('EXCERPT_TOOLS_DEBUG'))
  define('EXCERPT_TOOLS_DEBUG', false);

$jscounter = plugins_url( 'js/jquery.charcounter.js', __FILE__ );

add_action('admin_init', __NAMESPACE__.'\box_init');

// Checks options to see if custom excerpts are turned on. if so, adds them
function box_init() {
  $options = get_option('e_tools');
  if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: init', $options);
  $title = isset($options['excerpt_title']) ? trim((string) $options['excerpt_title']) : '';
  if (empty($title) || !is_string($title)) $title = __('Excerpt', 'excerpt-tools');
  if (empty($title) || !is_string($title)) $title = 'Excerpt';
  if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: Title: "%s"', $title);

  $excerpt_icon = isset($options['excerpt_icon']) ? trim((string) $options['excerpt_icon']) : '';
  if (empty($excerpt_icon)) $excerpt_icon = 'format-quote';
  foreach (possible_icons() as $icon => $name) {
    if ($excerpt_icon == $icon) {
      if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: Icon', $icon);
      $title = "<i class='dashicons dashicons-$icon'></i>&nbsp; ".$title;
      break;
    }
  }

  foreach (get_post_types(array(), 'objects') as $post_type) {
    if (isset($options['enable_'.$post_type->name]) && $options['enable_'.$post_type->name] == 1) {
      if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: Init: Add meta box', $post_type->name, $title);
      remove_meta_box('postexcerpt', $post_type->name, 'normal');
      add_meta_box('e_tools_excerpt', $title, __NAMESPACE__.'\meta_box', $post_type->name, 'normal', 'high');
    }
  }
  if (EXCERPT_TOOLS_DEBUG >= 2) {
    global $wp_meta_boxes;
    foreach ($wp_meta_boxes as $post_type => $value) {
      do_action('log', 'Excerpt tools: Init: $wp_meta_boxes[%s]', $post_type, $value);
    }
  }
}
 
add_action('init', __NAMESPACE__.'\init');
add_action('admin_init', __NAMESPACE__.'\admin_init');
add_action('admin_menu', __NAMESPACE__.'\add_page');

// Init plugin options to white list our options
function admin_init() {
   register_setting('e_tools_options', 'e_tools');
}

// Add menu page
function add_page() {
   add_options_page('Excerpt Options', 'Excerpt Tools', 'manage_options', 'e_tools_handler', __NAMESPACE__.'\settings_page');
}

// Check if we need to adjust all excerpts
function init() {
  $options = get_option('e_tools');
  if (isset($options['enforce_length']) && $options['enforce_length']) {
    add_filter('wp_trim_excerpt', __NAMESPACE__.'\filter_trim_excerpt', 11, 2);
    add_filter('option_relevanssi_excerpt_length', __NAMESPACE__.'\option_relevanssi_excerpt_length', 99);
  }
}

function filter_trim_excerpt($excerpt, $raw) {
  // if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: wp_trim_excerpt', '@filter', 'wp_trim_excerpt');

  $options = get_option('e_tools');
  $len = intval($options['excerpt_length']);

  if (mb_strlen($excerpt) > $len) {
    $affix = '';
    $r = strrpos($excerpt, '...', strlen($excerpt) - 5);
    if ($r === false) strrpos($excerpt, '…', strlen($excerpt) - 5);
    if ($r !== false) {
      $affix = substr($excerpt, $r);
      $excerpt = substr($excerpt, 0, $r);
    }

    // if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: trim excerpt: %s...%s', substr($excerpt, 0, 30), substr($excerpt, strlen($excerpt) - 30));

    $short = mb_substr($excerpt, 0, $len + 1);
    $pos = mb_strrpos($short, ' ');
    if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: trim excerpt: excerpt length = %s; desired length = %s; found space at %s: "%s%', mb_strlen($excerpt), $len, $pos, $short);
    if ($pos !== false && $pos > 0) 
      $excerpt = mb_substr($short, 0, $pos);
    else
      $excerpt = $short;

    $excerpt = rtrim($excerpt);
    $excerpt = rtrim($excerpt, " :.");
    $excerpt = $excerpt.$affix;
  }

  return $excerpt;
}

function option_relevanssi_excerpt_length($length) {
  $options = get_option('e_tools');
  $len = intval($options['excerpt_length']) - 3; // make way for an ellipsis!
  if ($length > $len) $length = $len;
  return $length;
}

// Draw the menu page itself
function settings_page() {
  global $jscounter;
  $options = get_option('e_tools');
  if (!isset($options['excerpt_title'])) $options['excerpt_title'] = '';
  if (!isset($options['excerpt_icon'])) $options['excerpt_icon'] = 'format-quote';

?>
<div class="wrap">
  <h2><?php _e('Excerpt Tools', 'excerpt-tools'); ?></h2>
  <form method="post" action="options.php">
    <?php settings_fields('e_tools_options'); ?>
  <div class='metabox-holder'>

    <div class='stack-group'>
      <div class='stack-block'>

  <div class='postbox'>

  <h3><?php _e('Post types', 'excerpt-tools'); ?></h3>
   <table class="form-table">
      <?php
        $post_types = array();
        $post_type_icons = array(
          'post' => 'dashicons-admin-post',
          'page' => 'dashicons-admin-page',
          'attachment' => 'dashicons-admin-media',
          );

        foreach (get_post_types(array(), 'objects') as $post_type) {
          // if ($post_type->exclude_from_search) continue;
          if (in_array($post_type->name, array('revision', 'nav_menu_item'))) continue;

          $post_types[$post_type->name] = $post_type->labels->name;
          if (preg_match('/^dashicons-/', $post_type->menu_icon))
            $post_type_icons[$post_type->name] = $post_type->menu_icon;
        }
        if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: Settings: Post types', $post_types);

        foreach ($post_types as $key => $name) {
          echo "<tr><td><label for='e_tools_enable_$key'>";
          echo "<input type='checkbox' name='e_tools[enable_$key]' id='e_tools_enable_$key' value='1' "; checked(isset($options["enable_$key"]) && intval($options["enable_$key"])); echo "> &nbsp;";
          if (isset($post_type_icons[$key]))
            echo "<i class='dashicons ${post_type_icons[$key]}'></i>&nbsp; ";
          echo $name;
          echo "</td></tr>";
        }

        $length = '';
        if (!empty($options['excerpt_length'])) {
          $len = intval($options['excerpt_length']);
          if ($len > 0)
            $length = $len;
        }

        $enforce_length = isset($options['enforce_length']) && (boolean) $options['enforce_length'];
        $excerpt_length_html = isset($options['excerpt_length_html']) && (boolean) $options['excerpt_length_html'];
      ?>
    </table>
  </div>

    </div><div class='stack-block'>

  <div class='postbox'>

  <h3><?php _e('Options', 'excerpt-tools'); ?></h3>
  <div class='inside'>
   <table class="form-table">
      <tr valign="top">
        <th scope="row"><?php _e('Excerpt Length', 'excerpt-tools'); ?></th>
        <td><input type="text" name="e_tools[excerpt_length]" id='excerpt_length' value="<?php echo $length; ?>" placeholder='150' style='text-align: right; width: 4em;' /> &nbsp;characters
          <p><label for='enforce_length'><input type='checkbox' name='e_tools[enforce_length]' id='enforce_length' <?php checked($enforce_length); ?>>
          <?php _e('Enforce this length limit on all excerpts, including Relevanssi search results', 'excerpt-tools'); ?></p>
          <p><label for='excerpt_length_html'><input type='checkbox' name='e_tools[excerpt_length_html]' id='excerpt_length_html' <?php checked($excerpt_length_html); ?>>
          <?php _e('Exclude HTML tags from this length', 'excerpt-tools'); ?></p>
          </td>
      </tr>
      
      <tr valign="top">
        <th scope="row"><?php _e('Excerpt title', 'excerpt-tools'); ?></th>
        <td><input type="text" name="e_tools[excerpt_title]" id='excerpt_title' value="<?php echo $options['excerpt_title']; ?>" placeholder='Excerpt' style='width: 24em;' /></td>
      </tr>
      
      <tr valign="top">
        <th scope="row"><?php _e('Excerpt icon', 'excerpt-tools'); ?></th>
        <td>
          <?php
            $excerpt_icon = $options['excerpt_icon'];
            $possible_icons = possible_icons();
            foreach ($possible_icons as $icon => $name) {
              echo "<div style='margin-bottom: 6px;'><label for='excerpt_icon-$icon'>";
              $checked = checked($icon, $excerpt_icon, false);
              echo "<input type='radio' name='e_tools[excerpt_icon]' id='excerpt_icon-$icon' value='$icon' $checked>&nbsp;";
              if ($icon != 'none') echo "&nbsp; <i class='dashicons dashicons-$icon'></i> &nbsp; ";
              echo $name."<label></div>";
            }
          ?>
        </td>
      </tr>
      
      <tr valign="top">
        <th scope="row"><?php _e('Excerpt description', 'excerpt-tools'); ?></th>
        <td>
          <textarea rows="2" cols="60" name="e_tools[excerpt_text]" id="excerpt_text"><?php echo $options['excerpt_text']; ?></textarea>
        </td>
      </tr>
    </table>
    
  </div>
    </div></div>
</div>

<p class="submit">
  <input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
</p>
    
</div>
  </form>
</div>

<?php
}


function possible_icons() {
  return array(
    'format-quote' => 'Quote',
    'editor-quote' => 'Quote (smaller)',
    'text' => 'Text',
    'editor-help' => 'Help',
    'info' => 'Info',
    'admin-comments' => 'Comment bubble',
    'format-chat' => 'Chat bubbles',
    'welcome-write-blog' => 'Writing',
    'nametag' => 'Name tag',
    'exerpt-view' => 'Excerpt view',
    'none' => 'No icon',
  );
}

function meta_box($post) {
  ?></div><div class='outside' style='padding-bottom: 8px;'><?php

  wp_enqueue_script('jquery');
  $options = get_option('e_tools');
  if (EXCERPT_TOOLS_DEBUG) do_action('log', 'Excerpt tools: Meta box', $options);
  if (EXCERPT_TOOLS_DEBUG >= 2) do_action('log', 'Excerpt tools: Meta box', '@trace');
  $title = $options['excerpt_title'];
  if (empty($title))
    $title = __('Excerpt');

  $length = intval($options['excerpt_length']);
  if (empty($length) || $length <= 0)
    $length = 150;

  if (!empty($options['excerpt_text']))
    echo "<p>".$options['excerpt_text']."</p>";
  ?>

    <textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt" style='width: 100%; min-width: 100%; max-width: 100%; border-width: 0 0 1px 0; resize: vertical;'><?php 
      echo $post->post_excerpt; 
    ?></textarea>

  <script type="text/javascript"  src="<?php echo plugins_url( 'js/jquery.charcounter.js', __FILE__ ); ?>"> </script>
  <script>

    jQuery(function($) {
      var progress = $("<span></span>").insertBefore($("#excerpt")).css({
        'height': '3px',
        'line-height': '3px',
        'width': '0',
        'display': 'block',
        'background': '#2ea2cc',
        'margin-top': '2px',
        'margin-bottom': '2px'
      });

      $("#excerpt").charCounter( <?php  echo $length; ?>, {
        container: "<div id='counter' class='counter' style='padding-top:5px; padding-left: 8px;'></div>",
        classname: "counter",
        callback: function (value, max) {
          if (typeof progress !== 'undefined') {
            var colour = '#2ea2cc';
            percent = Math.round(value * 10000.0 / max) / 100;

            if (value == max) {
              colour = '#e03030';
            } else if (percent >= 90) {
              colour = '#f89000';
            } else if (percent >= 80) {
              colour = '#ecb800';
            }
            progress.css({
              'width': percent+'%',
              'background': colour
            });
          }
        },
        format: "%1 characters remaining"
      });

      // progress.insertAfter($("#excerpt"));

      $("#e_tools_excerpt .inside").each(function () {
        var inside = $(this);
        if (!$.trim(inside.html())) {
          inside.remove();
        }
      });
    });

  </script>
  <?php
}

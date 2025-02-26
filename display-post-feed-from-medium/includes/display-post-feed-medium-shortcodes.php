<?php
if (!defined('ABSPATH')) {
  exit; /* Exit if accessed directly */
}

/* WP Shortcode to display form on any page or post. */
if (!function_exists('dpffm_show_medium_posts')) {
function dpffm_show_medium_posts($atts)
{
  ob_start();

  $offset = "";

  $placeholder_image = plugin_dir_url( dirname( __FILE__ ) ) . '/assets/images/medium-placeholder.jpg';

  if (!empty(get_option('dpffm_handle'))) {
    $handle = get_option('dpffm_handle');
  }else{
    $handle = 'galaxy-ux-studio';
  }

  if (!empty(get_option('dpffm_titletag'))) {
    $title_tag = get_option('dpffm_titletag');
  }else{
    $title_tag = 'h2';
  }

  $hide_subtitle = get_option('dpffm_subtitle') == 'false' ? false : get_option('dpffm_subtitle');

  $hide_image = get_option('dpffm_hideimage') == 'false' ? false : get_option('dpffm_hideimage');

  if (!empty(get_option('upload_image'))) {
    $placeholder_image = get_option('upload_image');
  }else{
    $placeholder_image = DPFFM_URL."assets/images/medium-placeholder.jpg";
  }

  if (!empty(get_option('dpffm_readmore'))) {
    $readmore_text = get_option('dpffm_readmore');
  }else{
    $readmore_text = 'Read More';
  }

  if (!empty(get_option('dpffm_dateformat'))) {
    $date_format = get_option('dpffm_dateformat');
  }else{
    $date_format = "M d, Y";
  }

  if (!empty(get_option('dpffm_view'))) {
    $list = get_option('dpffm_view');
  }else{
    $list = 'list';
  }

  if (!empty(get_option('dpffm_gridview'))) {
    $display = get_option('dpffm_gridview');
  }else{
    $display = "2";
  }

  if (!empty(get_option('dpffm_numposts'))) {
    $total = get_option('dpffm_numposts');
  }else{
    $total = "10";
  }

  $content = null;

  /* declare variable to get the medium URL */
  $medium_url = "https://api.rss2json.com/v1/api.json?rss_url=https://medium.com/feed/" . $handle;

  $response = wp_remote_get($medium_url);
  $responseBody = wp_remote_retrieve_body( $response );
  $json= json_decode( $responseBody );

  $items = array();
  $count = 0;
  if (isset($json->items)) {
    $posts = $json->items;
    foreach ($posts as $post) {
      $items[$count]['title'] = $post->title;
      $items[$count]['url'] = $post->link;
      $items[$count]['author'] = $post->author;
      $start = strpos($post->description, '<p>');
      $end = strpos($post->description, '</p>', $start);
      $paragraph = substr($post->description, $start, $end - $start + 4);
      $items[$count]['subtitle'] = mb_strimwidth(html_entity_decode(strip_tags($paragraph)), 0, 200, "...");

      if (!empty($post->thumbnail)) {
        $image = $post->thumbnail;
      } else {
        $image = $placeholder_image;
      }
      $items[$count]['image'] = $image;
      $items[$count]['date'] = date($date_format, strtotime($post->pubDate));

      $count++;
    }
    if ($offset) {
      $items = array_slice($items, $offset);
    }

    if (count($items) > $total) {
      $items = array_slice($items, 0, $total);
    }

    if ($list == 'List') {
      $list_class = "list";
    } else {
      $list_class = "row";
    }
  }
?>  
  <div id="dpffm-medium-container" class="dpffm-medium-container">
    <div id="dpffm-medium-demo" class="dpffm-medium-<?php echo esc_attr($list_class); ?>">
      <?php foreach ($items as $item) { ?>
        <div class="dpffm-medium-item dpffm-medium-flex-grid<?php if ($display >1 ) { echo esc_attr($display); } ?>">
          <?php if ($hide_image == false){ ?>
            <div class="medium-post-image">
              <a href="<?php echo esc_url($item['url']); ?>" target="_blank">
                <?php
                  if ($list) {
                    echo '<img src="' . esc_url($item['image']) . '" class="dpffm-medium-img" />';
                  } else {
                    echo '<img src="' . esc_url($item['image']) . '" class="dpffm-medium-img" />';
                  }
                ?>
              </a>
            </div>
          <?php } ?>
          <div class="medium-post-meta-tags">
            <p class="display-medium-author">
              <?php echo "<span class='display-medium-author'>" . esc_html($item['author']) . "</span>"; ?></p>
            <p class="display-medium-date">
              <?php echo "<span class='display-medium-date'>" . esc_html($item['date']) . "</span>"; ?>
            </p>
          </div>
          <div class="medium-post-title">
            <a href="<?php echo esc_url($item['url']); ?>" target="_blank">
              <<?php echo esc_html($title_tag); ?> class="dpffm-medium-title details-title"><?php echo esc_attr($item['title']); ?></<?php echo esc_html($title_tag); ?>>
            </a>
          </div>
          <?php if ($hide_subtitle != true){  ?>
          <div class="medium-post-content">
            <p>
            <?php echo "<span class='display-medium-subtitle'>" . esc_html($item['subtitle']) . "</span>"; ?>
              <span class="display-medium-readmore">
                <a href="<?php echo esc_url($item['url']); ?>" target="_blank" class="text-right display-medium-readmore"><?php echo esc_html($readmore_text); ?></a>
              </span>
            </p>
          </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php
  if (empty($items)) echo "<div class='dpffm-medium-no-post'>No posts found!</div>";
  return ob_get_clean();
  } /* end of the function */
} /* end of if exist function */
add_shortcode('show_medium_posts', 'dpffm_show_medium_posts');
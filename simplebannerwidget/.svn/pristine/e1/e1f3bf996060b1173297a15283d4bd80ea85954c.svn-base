<?php
class SimpleBannerWidget extends WP_Widget
{

  public function __construct()
  {
    $this->prefix = "simple-banner-widget__";
    parent::__construct(
      'simple-banner-widget',
      'SimpleBannerWidget',
      array('description' => 'banners',)
    );
  }


  public function widget($args, $instance)
  {
    extract($args);
    if ($instance['title'] != '') {
      $title = apply_filters('widget_title', $instance['title']);
    }
    $title = $instance['title'];
    $data = json_decode($instance['data'], false);
    $size = $instance['size'];
    $style = $instance['style'];
    echo $args['before_widget'];
    ?>
    <div class="<?php echo $this->prefix; ?>wrap <?php echo $this->prefix . $style; ?>">
      <?php if ($title != "") : ?>
        <h3 class="<?php echo $this->prefix; ?>title"><?php echo $title; ?></h3>
      <?php endif; ?>
      <div class="<?php echo $this->prefix; ?>banners">
        <?php if (is_array($data)) : ?>

          <?php foreach ($data as $item) : ?>
            <div class="<?php echo $this->prefix; ?>item">
              <?php echo ($item->url == "") ? '<span>' : '<a href="' . $item->url . '" target="_blank" rel="noopener noreferrer">' ?>

              <?php echo wp_get_attachment_image($item->image_id, $size); ?>

              <?php echo ($item->url == "") ? '</span>' : '</a>' ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <?php
    echo $args['after_widget'];
  }

  public function form($instance)
  {

    $data = isset($instance['data']) ? $instance['data'] : "";
    $data_name = $this->get_field_name('data');
    $data_id = $this->get_field_id('data');

    $title = isset($instance['title']) ? $instance['title'] : "";
    $title_name = $this->get_field_name('title');
    $title_id = $this->get_field_id('title');

    $size = isset($instance['size']) ? $instance['size'] : "";
    $size_name = $this->get_field_name('size');
    $size_id = $this->get_field_id('size');
    $sizes = get_intermediate_image_sizes();

    $style = isset($instance['style']) ? $instance['style'] : "";
    $style_name =  $this->get_field_name('style');
    $style_id = $this->get_field_id('style');
    $styles = ["horizontal", "vertical", "none"];

    ?>
    <div id="<?php echo $this->id; ?>" class="simple-banner-widget">
      <p>
        <label for="<?php echo $title_id; ?>">Title:</label>
        <input class="widefat" id="<?php echo $title_id; ?>" name="<?php echo $title_name; ?>" type="text" value="<?php echo esc_attr($title); ?>">
      </p>
      <div class="inner-add-form">

        <p>
          <button class="button upload-image-button">
            Select Image
          </button>
          <input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->prefix; ?>image" type="url" class="widefat image" style="margin-top: 5px" disabled>
          <input id="<?php echo $this->get_field_id('image_id'); ?>" name="<?php echo $this->prefix; ?>image_id" type="hidden" class="widefat image_id" style="margin-top: 5px">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('url'); ?>">URL:</label>
          <input id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->prefix; ?>url" type="text" class="widefat url">
        </p>

        <input id="<?php echo $data_id; ?>" name="<?php echo $data_name ?>" type="hidden" class="widefat data" value=<?php echo esc_attr($data); ?>>
        <p>
          <button class="button add-button">
            ADD
          </button>
        </p>
      </div>

      <p>
        <div class="view">
        </div>
      </p>
      <p>
        <label for="<?php echo $size_id; ?>">Size:</label>
        <select id="<?php echo $size_id; ?>" name="<?php echo $size_name; ?>" class="widefat">
          <?php foreach ($sizes as $size) : ?>
            <option <?php selected($instance['size'], $size); ?> value="<?php echo $size ?>"><?php echo $size ?></option>
          <?php endforeach; ?>
        </select>
      </p>
      <p>
        <label for="<?php echo $style_id; ?>">Style:</label>
        <select id="<?php echo $style_id; ?>" name="<?php echo $style_name; ?>" class="widefat">
          <?php foreach ($styles as $style) : ?>
            <option <?php selected($instance['style'], $style); ?> value="<?php echo $style ?>"><?php echo $style ?></option>
          <?php endforeach; ?>
        </select>
      </p>
    </div>


  <?php
  }
  function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['data'] = !empty($new_instance['data']) ? $new_instance['data'] : '';
    $instance['title'] = !empty($new_instance['title']) ? $new_instance['title'] : '';
    $instance['size'] = !empty($new_instance['size']) ? $new_instance['size'] : '';
    $instance['style'] = !empty($new_instance['style']) ? $new_instance['style'] : '';

    return $instance;
  }
}

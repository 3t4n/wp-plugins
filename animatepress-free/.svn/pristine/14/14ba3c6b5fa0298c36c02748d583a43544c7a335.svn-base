<?php

defined('ABSPATH') or die('Something went wrong.');

$colors = array(
  "black"   => "#000000",
  "white"   => "#ffffff",
  "red"     => "#ffadad",
  "orange"  => "#ffd6a5",
  "yellow"  => "#fdffb6",
  "green"   => "#caffbf",
  "blue"    => "#9bf6ff",
  "purple"  => "#bdb2ff",
  "pink"    => "#ffc6ff"
);

$transitions = array(
  "fade" => array(
    "demo"    => esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/assets/videos/fade.webm',
    "legend"  => "Fade",
    "premium" => false
  ),
  "slide-top"   => array(
    "demo"    => esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/assets/videos/slidetop.webm',
    "legend"  => "Slide top",
    "premium" => false
  ),
  "slide-right" => array(
    "demo"    => esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/assets/videos/slideright.webm',
    "legend"  => "Slide right",
    "premium" => false
  ),
  "slide-bottom" => array(
    "demo"    => esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/assets/videos/slidebottom.webm',
    "legend"  => "Slide bottom",
    "premium" => false
  ),
  "slide-left" => array(
    "demo"    => esc_url(ANIMATEPRESSFREE_PLUGIN_URL) . 'admin/assets/videos/slideleft.webm',
    "legend"  => "Slide left",
    "premium" => false
  ),
);

$is_transition_active = get_option('animatepress_free_transition_activate');
$free_color_value     = get_option('animatepress_free_transition_color', '#000000');
$transition_value     = get_option('animatepress_free_transition');

?>

<div id="transitions-settings" class="animatepress-settings__menu-content">

  <p class="animatepress-settings__menu-content__title"><?php esc_html_e('Customize your transition :', 'animatepress-free'); ?> </p>

  <div class="animatepress-settings__menu-content__option">
    <label class="animatepress-settings__menu-content__label" for="animatepress_transition_activate"><?php esc_html_e('Enable transition :', 'animatepress-free'); ?></label>
    <div class="animatepress-settings__menu-content__option__input">
      <input id="animatepress_transition_activate" type="checkbox" name="animatepress_free_transition_activate" value="1" <?php checked(1, $is_transition_active, true); ?>>
    </div>
  </div>

  <div class="animatepress-settings__menu-content__option">
    <label for="animatepress_free_color" class="animatepress-settings__menu-content__label">
      <?php esc_html_e('Select a color :', 'animatepress-free'); ?>
    </label>
    <div class="animatepress-settings__menu-content__colors-wrapper">
      <?php foreach ($colors as $label => $hex) : ?>
        <input type="radio" name="animatepress_free_transition_color" id="<?php echo esc_attr($label); ?>" value="<?php echo esc_attr($hex); ?>" <?php checked($hex, $free_color_value, true); ?>>
        <label for="<?php echo esc_attr($label); ?>" style="--bullet-color:<?php echo esc_attr($hex); ?>;"></label>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="animatepress-settings__menu-content__option">
    <label class="animatepress-settings__menu-content__label">
      <?php esc_html_e('Select a transition :', 'animatepress-free'); ?>
    </label>
    <div class="animatepress-settings__menu-content__effects-wrapper">
      <?php foreach ($transitions as $value => $data) : ?>
        <input type="radio" name="animatepress_free_transition" id="<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>" <?php checked($value, $transition_value, true); ?> <?php if ($data['premium']) echo 'disabled'; ?>>
        <label for="<?php echo esc_attr($value); ?>" data-name="<?php echo esc_attr($data['legend']); ?>" <?php if ($data['premium']) echo 'class="disabled"'; ?>>
          <div class="demo-video-poster"></div>
          <?php if ($data['premium']) : ?>
            <span class="animatepress-settings-premium-label"><img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/lock.svg" alt="Disabled"> <?php esc_html_e('Premium only', "animatepress-free"); ?></span>
          <?php endif; ?>
          <video class="demo-video" muted preload="none">
            <source type="video/webm" src="<?php echo esc_url($data['demo']); ?>">
          </video>
        </label>
      <?php endforeach; ?>
        <a href="https://www.animatepress.net" target="_blank" class="animatepress-settings__submit-btn animatepress-settings__submit-btn--listing"><?php esc_html_e('Want more transitions ?', "animatepress-free"); ?></a>
    </div>
  </div>

</div>
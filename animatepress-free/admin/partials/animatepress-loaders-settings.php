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


$loaders = array(
  "spinner-basic"     => array("demo" => "", "legend" => "Spinner", "premium" => false),
  "dots-basic"        => array("demo" => "", "legend" => "Dots", "premium" => false),
  "bars-basic"        => array("demo" => "", "legend" => "Bars","premium" => false),
  "progressbar-basic" => array("demo" => "", "legend" => "Progress","premium" => false),
   "pulse-basic"      => array("demo" => "", "legend" => "Pulse","premium" => false),
);

$is_loader_active             = get_option('animatepress_free_loader_activate');
$free_loader_color_value      = get_option('animatepress_free_loader_color', '#000000');
$loader_value                 = get_option('animatepress_free_loader');

?>

<div id="loaders-settings" class="animatepress-settings__menu-content">

  <p class="animatepress-settings__menu-content__title"><?php esc_html_e('Add a loader to your transition :', 'animatepress-free'); ?> </p>

  <div class="animatepress-settings__menu-content__option">
    <label class="animatepress-settings__menu-content__label" for="animatepress_loader_activate"><?php esc_html_e('Enable loader :', 'animatepress-free'); ?></label>
    <div class="animatepress-settings__menu-content__option__input">
      <input id="animatepress_loader_activate" type="checkbox" name="animatepress_free_loader_activate" value="1" <?php checked(1, $is_loader_active, true); ?>>
    </div>
  </div>

  <p class="animatepress-settings__menu-content__title"><?php esc_html_e('Choose from these generic loaders :', 'animatepress-free'); ?> </p>

  <div class="animatepress-settings__menu-content__option">
    <label class="animatepress-settings__menu-content__label">
      <?php esc_html_e('Select a color :', 'animatepress-free'); ?>
    </label>
    <div class="animatepress-settings__menu-content__colors-wrapper">
      <?php foreach ($colors as $label => $hex) : ?>
        <input type="radio" name="animatepress_free_loader_color" id="loader-<?php echo esc_attr($label); ?>" value="<?php echo esc_attr($hex); ?>" <?php checked($hex, $free_loader_color_value, true); ?>>
        <label for="loader-<?php echo esc_attr($label); ?>" style="--bullet-color:<?php echo esc_attr($hex); ?>;"></label>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="animatepress-settings__menu-content__option">
    <label class="animatepress-settings__menu-content__label"><?php esc_html_e('Select a loader :', 'animatepress-free'); ?></label>
    <div class="animatepress-settings__menu-content__effects-wrapper">
      <?php foreach ($loaders as $value => $data) : ?>
        <input type="radio" name="animatepress_free_loader" id="<?php echo esc_attr($value); ?>" value="<?php echo esc_attr($value); ?>" <?php checked($value, $loader_value, true); ?> <?php if ($data['premium']) echo 'disabled'; ?>>
        <label for="<?php echo esc_attr($value); ?>" data-name="<?php echo esc_attr($data['legend']); ?>">
          <?php if ($data['premium']) : ?>
            <span class="animatepress-settings-premium-label"><img src="<?php echo esc_url(ANIMATEPRESSFREE_PLUGIN_URL); ?>admin/assets/images/lock.svg" alt="Disabled"> <?php esc_html_e('Premium only', "animatepress-free"); ?></span>
          <?php endif; ?>
          <div class="<?php echo esc_attr($value); ?>" data-animation="<?php echo esc_attr($value); ?>">
            <?php if (esc_attr($value) === 'spinner-2') : ?>
              <?php for ($i = 1; $i <= 12; $i++) : ?>
                <span></span>
              <?php endfor; ?>
            <?php endif; ?>
            <?php if (esc_attr($value) === 'spinner-3') : ?>
              <?php for ($i = 1; $i <= 5; $i++) : ?>
                <span></span>
              <?php endfor; ?>
            <?php endif; ?>
          </div>
        </label>
      <?php endforeach; ?>
      <a href="https://www.animatepress.net" target="_blank" class="animatepress-settings__submit-btn animatepress-settings__submit-btn--listing"><?php esc_html_e('Want more loaders ?', "animatepress-free"); ?></a>
    </div>
  </div>
</div>
<?php
  $chosen_color = $primary_color ? $primary_color : '#0A66C2';
  $chosen_color_2 = $secondary_color ? $secondary_color : '#000';
  $text_color = $button_text_color ? $button_text_color : '#fff';
?>

<a target="<?php echo esc_attr($button_target) ?>" href="<?php echo esc_url_raw($button_link) ?>">
  <button id="<?php echo esc_attr($id) ?>"class="button-3-pushable-<?php echo esc_attr($id) ?> panda-button <?php echo esc_attr($custom_class) ?>" role="button" show-time="<?php echo $button_show_time ? esc_attr($button_show_time) : 0 ?>">
    <span class="button-3-shadow-<?php echo esc_attr($id) ?>"></span>
    <span class="button-3-edge-<?php echo esc_attr($id) ?>"></span>
    <span class="button-3-front-<?php echo esc_attr($id) ?> text">
      <?php echo esc_html($inner_text) ?>
    </span>
  </button>
</a>

<p class="there-is-content">&nbsp;</p>
<style>
.button-3-pushable-<?php echo esc_attr($id) ?> {
  <?php echo $button_show_time === 0 || !$button_show_time ? 'display: flex;' : 'display: none;' ?>
  position: relative;
  border: none;
  background: transparent;
  padding: 0;
  cursor: pointer;
  outline-offset: 4px;
  transition: filter 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-3-shadow-<?php echo esc_attr($id) ?> {
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 12px;
  background: hsl(0deg 0% 0% / 0.25);
  will-change: transform;
  transform: translateY(2px);
  transition:
    transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

.button-3-edge-<?php echo esc_attr($id) ?> {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 12px;
  background: linear-gradient(
    to left,
    <?php echo esc_html($chosen_color) ?>,
    <?php echo esc_html($chosen_color_2) ?>,
    <?php echo esc_html($chosen_color_2) ?>,
    <?php echo esc_html($chosen_color) ?>
  );
}

.button-3-front-<?php echo esc_attr($id) ?> {
  display: flex;
  align-items: center;
  position: relative;
  padding: <?php echo esc_html(($size * .4)) ?>px <?php echo esc_html($size) ?>px;
  border-radius: 12px;
  font-size:  <?php echo esc_html($font_size) ?>px;
  color: <?php echo esc_html($text_color) ?>;
  background: <?php echo esc_html($chosen_color) ?>;
  will-change: transform;
  font-weight: <?php echo esc_html($text_weight) ?>;
  transform: translateY(-4px);
  transition:
    transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

@media (min-width: 768px) {
  .button-3-front-<?php echo esc_attr($id) ?> {
    font-size:  <?php echo esc_html(((int) str_replace('px', '', $font_size)) + .25) ?>px;
    padding: <?php echo esc_html(($size * .4)) ?>px <?php echo esc_html(($size * 1.2)) ?>px;
  }
}

.button-3-pushable-<?php echo esc_attr($id) ?>:hover {
  background: transparent !important;
  filter: brightness(110%);
  -webkit-filter: brightness(110%);
}

.button-3-pushable-<?php echo esc_attr($id) ?>:hover .button-3-front-<?php echo esc_attr($id) ?> {
  transform: translateY(-6px);
  transition:
    transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

.button-3-pushable-<?php echo esc_attr($id) ?>:active .button-3-front-<?php echo esc_attr($id) ?> {
  transform: translateY(-2px);
  transition: transform 34ms;
}

.button-3-pushable-<?php echo esc_attr($id) ?>:hover .button-3-shadow-<?php echo esc_attr($id) ?> {
  transform: translateY(4px);
  transition:
    transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

.button-3-pushable-<?php echo esc_attr($id) ?>:active .button-3-shadow-<?php echo esc_attr($id) ?> {
  transform: translateY(1px);
  transition: transform 34ms;
}

.button-3-pushable-<?php echo esc_attr($id) ?>:focus:not(:focus-visible) {
  outline: none;
}
</style>
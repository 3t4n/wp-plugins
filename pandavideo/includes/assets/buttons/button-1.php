<?php
  $chosen_color = $primary_color ? $primary_color : '#0A66C2';
  $text_color = $button_text_color ? $button_text_color : '#fff';
?>
<a href="<?php echo esc_url_raw($button_link) ?>" target="<?php echo esc_attr($button_target) ?>">
  <button id="<?php echo esc_attr($id) ?>" class="button-1-<?php echo esc_attr($id) ?> panda-button <?php echo esc_attr($custom_class) ?>" role="button" show-time="<?php echo esc_attr($button_show_time) ? esc_attr($button_show_time) : 0 ?>"><?php echo esc_html($inner_text) ?></button>
</a>
<p class="there-is-content">&nbsp;</p>
<style>
.button-1-<?php echo esc_html($id) ?> {
  font-weight: <?php echo esc_html($text_weight) ?>;
  align-items: center;
  appearance: none;
  background-color: <?php echo esc_html($chosen_color) ?>;
  border-radius: 4px;
  border-width: 0;
  box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px, rgba(0, 0, 0, 0.4) 0 -3px 0 inset;
  box-sizing: border-box;
  color: <?php echo esc_html($text_color) ?>;
  cursor: pointer;
  <?php echo $button_show_time === 0 || !$button_show_time ? 'display: flex;' : 'display: none;' ?>
  justify-content: center;
  list-style: none;
  overflow: hidden;
  padding: <?php echo esc_html($size * .4) ?>px <?php echo esc_html($size) ?>px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  will-change: box-shadow,transform;
  font-size: <?php echo esc_html($font_size) ?>;
}
.button-1-<?php echo esc_html($id) ?>:hover {
  background: <?php echo esc_html($chosen_color) ?> !important;
  color: <?php echo esc_html($text_color) ?>;
  box-shadow: rgba(45, 35, 66, 0.4) 0 2px 8px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px, rgba(0, 0, 0, 0.4) 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-1-<?php echo esc_html($id) ?>:active {
  box-shadow: rgba(0, 0, 0, 1) 0 3px 7px inset;
  transform: translateY(2px);
}
</style>
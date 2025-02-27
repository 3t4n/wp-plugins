<?php
  $chosen_color = $primary_color ? $primary_color : '#0A66C2';
  $chosen_color_2 = $secondary_color ? $secondary_color : '#16437E';
  $text_color = $button_text_color ? $button_text_color : '#fff';
?>
<a target="<?php echo esc_attr($button_target) ?>" href="<?php echo esc_url_raw($button_link) ?>">
  <button id="<?php echo esc_attr($id) ?>" class="button-2-<?php echo esc_attr($id) ?> panda-button <?php echo esc_attr($custom_class) ?>" role="button" target="_blank" href="<?php echo esc_url_raw($button_link) ?>" show-time="<?php echo $button_show_time ? esc_attr($button_show_time) : 0 ?>"><?php echo esc_html($inner_text) ?></button>
</a>
<p class="there-is-content">&nbsp;</p>
<style>
.button-2-<?php echo esc_attr($id) ?> {
  <?php echo $button_show_time === 0 || !$button_show_time ? 'display: flex;' : 'display: none;' ?>
  align-items: center;
  background-color: <?php echo esc_html($chosen_color) ?>;
  border: 0;
  border-radius: 100px;
  box-sizing: border-box;
  color: <?php echo esc_html($text_color) ?>;
  cursor: pointer;
  font-size:  <?php echo esc_html($font_size) ?>;
  font-weight: <?php echo esc_html($text_weight) ?>;
  justify-content: center;
  max-width: 480px;
  min-height: <?php echo esc_html(($size * 0.9)) ?>px;
  min-width: 0px;
  overflow: hidden;
  padding: <?php echo esc_html(($size * .4)) ?>px <?php echo esc_html($size) ?>px;
  text-align: center;
  touch-action: manipulation;
  transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
}

.button-2-<?php echo esc_attr($id) ?>:hover,
.button-2-<?php echo esc_attr($id) ?>:focus { 
  background-color: <?php echo esc_html($chosen_color_2) ?>;
}

.button-2-<?php echo esc_attr($id) ?>:disabled { 
  cursor: not-allowed;
  background: rgba(0, 0, 0, .08);
}
</style>
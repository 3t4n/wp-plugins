<?php
$display = (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? $cssData['head_icon_width_number']: 0;


if ($cssData['title_text_align'] == 'flex-start') {
    $textAlign = 'left';
} elseif ($cssData['title_text_align'] == 'center') {
    $textAlign = 'center';
} else {
    $textAlign = 'right';
}

?>

<style>
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?> {
  width: 100%;
  float: left; 
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head {
  float: left;
  cursor: pointer;
  width: 100%; 
  position: relative;  
  display: flex;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-left-icon {
  float: left; 
  width: <?php echo esc_attr($cssData['indicator_width_number']) ?>px;
  text-align: center;
  color:<?php echo esc_attr($cssData['indicator_color']) ?>;
  font-size: <?php echo esc_attr($cssData['indicator_font_size_number']) ?>px;
  background-color: <?php echo esc_attr($cssData['indicator_background_color']) ?>;
  border-top: <?php echo esc_attr($cssData['top_border_height_number']) ?>px solid <?php echo esc_attr($cssData['title_border_top_color']) ?>;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-left-icon {
  color:<?php echo esc_attr($cssData['indicator_hover_color']) ?>;
  background-color: <?php echo esc_attr($cssData['indicator_background_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-left-icon{
  float: left;
  text-align: center;
  color: <?php echo esc_attr($cssData['title_icon_color']) ?>;
  width: <?php echo esc_attr($cssData['head_icon_width_number']) ?>px;
  font-size: <?php echo esc_attr($cssData['head_icon_font_size_number']) ?>px;
  background-color: <?php echo esc_attr($cssData['icon_background_color']) ?>;
  display: <?php echo esc_attr((isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none') ?>;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-left-icon{
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?>;
  background-color: <?php echo esc_attr($cssData['icon_background_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-title {
  float: left; 
  position: relative;   
  margin-left: <?php echo esc_attr($cssData['title_empty_space']) ?>px;
  width: calc(100% - <?php echo esc_attr(($cssData['indicator_width_number']  + $cssData['title_empty_space']));?>px);
  border-top: <?php echo esc_attr($cssData['top_border_height_number']) ?>px solid <?php echo esc_attr($cssData['title_border_top_color']) ?>; 
  background-color: <?php echo esc_attr($cssData['title_bg_color']) ?> !important;
  display: flex;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-heading{
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform:<?php echo esc_attr($cssData['title_text_transform']) ?>;
  font-size: <?php echo esc_attr($cssData['title_font_size_number']) ?>px;
  font-weight: <?php echo esc_attr($cssData['title_font_weight']) ?>;
  line-height: <?php echo esc_attr($cssData['title_line_height_number']) ?>px;
  justify-content: <?php echo esc_attr($cssData['title_text_align']) ?>;
  text-align: <?php echo esc_attr($textAlign) ?>; 
  color: <?php echo esc_attr($cssData['title_font_color']) ?>;
  background-color: <?php echo esc_attr($cssData['title_bg_color']) ?> !important;
  padding: <?php echo esc_attr($cssData['title_padding_top_number']) ?>px <?php echo esc_attr($cssData['title_padding_right_number']) ?>px <?php echo esc_attr($cssData['title_padding_bottom_number']) ?>px <?php echo esc_attr($cssData['title_padding_left_number']) ?>px;
  float: left;
  width: calc(100% - <?php echo esc_attr($display);?>px); 
  display: flex;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-heading{
  color: <?php echo esc_attr($cssData['title_text_hover_color']) ?> ;
  background-color: <?php echo esc_attr($cssData['title_bg_hover_color']) ?>!important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content {
  float: left;   
  width: calc(100% - <?php echo(($cssData['indicator_width_number'] ? esc_attr($cssData['indicator_width_number']) : 20) + ($cssData['title_empty_space'] ? esc_attr($cssData['title_empty_space']) : 20)) ?>px);
  position: relative;
  display: none;
  border-left: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_color']) ?>;
  border-bottom: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_color']) ?>;
  border-right: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_color']) ?>;
  margin-left: <?php echo esc_attr(($cssData['indicator_width_number'] + $cssData['title_empty_space']));?>px;
  margin-bottom: <?php echo esc_attr($cssData['description_margin_bottom']) ?>px;
  background-color: <?php echo esc_attr($cssData['description_font_background_color']) ?>;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content:hover {
  background-color: <?php echo esc_attr($cssData['description_background_hover_color']) ?>;
  border-left: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_hover_color']) ?>;
  border-bottom: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_hover_color']) ?>;
  border-right: <?php echo esc_attr($cssData['description_border_height']) ?>px solid <?php echo esc_attr($cssData['description_border_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature {
  float: left;
  box-sizing: border-box;
  font-size: <?php echo esc_attr($cssData['description_font_size_number']) ?>px;
  color: <?php echo esc_attr($cssData['description_font_color']) ?>; 
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  font-weight: <?php echo esc_attr($cssData['description_font_weight']) ?>;
  text-transform: <?php echo esc_attr($cssData['description_text_transform']) ?>;
  text-align: <?php echo esc_attr($cssData['description_text_align']) ?>;
  width: 100%;
  padding-left: <?php echo esc_attr($cssData['description_padding_left_number']) ?>px;
  padding-right: <?php echo esc_attr($cssData['description_padding_right_number']) ?>px;
  padding-top: <?php echo esc_attr($cssData['description_padding_top_number']) ?>px; 
  padding-bottom: <?php echo $cssData['description_padding_bottom_number'] ?>px; 
  line-height: <?php echo esc_attr($cssData['description_line_height_number']) ?>px;
  <?php
  if (isset($cssData['content_limit_show_hide']) && $cssData['description_scroll'] > 0) {
      echo "max-height: {$cssData['description_scroll']}px; overflow-y: auto;";
  } else {
      echo "height: auto;";
  }
  ?>
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature {
  color: <?php echo esc_attr($cssData['description_text_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids) ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-heading{
  color: <?php echo esc_attr($cssData['title_text_hover_color']) ?>!important;
  background-color: <?php echo esc_attr($cssData['title_bg_hover_color']) ?> !important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids)?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon{
  background-color: <?php echo esc_attr($cssData['indicator_background_hover_color']) ?> !important;
  color: <?php echo esc_attr($cssData['indicator_hover_color']) ?> !important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-title-left-icon {
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?> !important;
  background-color: <?php echo esc_attr($cssData['icon_background_hover_color']) ?> !important;
}

.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after, 
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after {
  background-color: <?php echo esc_attr($cssData['title_bg_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
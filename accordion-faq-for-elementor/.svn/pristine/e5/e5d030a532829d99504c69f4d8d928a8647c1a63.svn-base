<?php
$display = $cssData['indicator_width_number'];
$display += (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? $cssData['head_icon_width_number']: 0;
if ($cssData['title_text_align'] == 'flex-start') {
    $textAlign = 'left';
} elseif ($cssData['title_text_align'] == 'center') {
    $textAlign = 'center';
} else {
    $textAlign = 'right';
}
?>
<style>
.afaq-6310-faq-template-<?php echo esc_attr($ids);?> {
  width: 100%;
  float: left; 
  } 

.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head {
  float: left;
  cursor: pointer;
  width: 100%;  
  border-top: <?php echo esc_attr($cssData['top_border_height_number']) ?>px solid <?php echo esc_attr($cssData['title_border_top_color']) ?>;
  position: relative; 
  text-align: center;
  box-sizing: border-box;
  display: flex;
  overflow: hidden;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-head-title {
  float: left;
  width: calc(100% - <?php echo esc_attr($display); ?>px);
  font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['title_font_family'])); ?>;
  text-transform: <?php echo esc_attr($cssData['title_text_transform']) ?>;
  position: relative;  
  font-size: <?php echo esc_attr($cssData['title_font_size_number']) ?>px;
  font-weight:<?php echo esc_attr($cssData['title_font_weight']) ?>;
  color: <?php echo esc_attr($cssData['title_font_color']) ?>;
  line-height: <?php echo esc_attr($cssData['title_line_height_number']) ?>px;
  justify-content: <?php echo esc_attr($cssData['title_text_align']) ?>;
  text-align: <?php echo esc_attr($textAlign); ?>;
  background-color: <?php echo esc_attr($cssData['title_bg_color']) ?>; 
  padding: <?php echo esc_attr($cssData['title_padding_top_number']) ?>px <?php echo esc_attr($cssData['title_padding_right_number']) ?>px <?php echo esc_attr($cssData['title_padding_bottom_number']) ?>px <?php echo esc_attr($cssData['title_padding_left_number']) ?>px;
  display: flex;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-head-title{
color:<?php echo esc_attr($cssData['title_text_hover_color']) ?>;
background-color: <?php echo esc_attr($cssData['title_bg_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon {
  float: left;
  width: <?php echo esc_attr($cssData['indicator_width_number']) ?>px;
  padding-right: <?php echo esc_attr(ceil($cssData['indicator_width_number']/7)) ?>px;
  text-align: center;
  font-size: <?php echo esc_attr($cssData['indicator_font_size_number']) ?>px;
  background-color:<?php echo esc_attr($cssData['indicator_background_color']) ?>;
  color: <?php echo esc_attr($cssData['indicator_color']) ?>;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon {
  background-color: <?php echo esc_attr($cssData['indicator_background_hover_color']) ?>;
  color: <?php echo esc_attr($cssData['indicator_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-right-icon {
  float: left;
  width: <?php echo esc_attr($cssData['head_icon_width_number']) ?>px;
  padding-left: <?php echo esc_attr(ceil($cssData['head_icon_width_number']/7)) ?>px;
  font-size: <?php echo esc_attr($cssData['head_icon_font_size_number']) ?>px;
  color:<?php echo esc_attr($cssData['title_icon_color']) ?>;
  background-color: <?php echo esc_attr($cssData['title_bg_color']) ?>; 
  text-align: center;
  display: <?php echo esc_attr((isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none') ?>;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-right-icon {
  background-color:<?php echo esc_attr($cssData['title_bg_hover_color']) ?>;
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after {
  content: "";
  position: absolute;
  width: <?php echo esc_attr($cssData['angle_width_number']); ?>px;
  height:  100%;
  left: <?php echo esc_attr($cssData['angle_from_left_number']); ?>px;
  background-color: <?php echo esc_attr($cssData['title_bg_color']) ?>;
  transform: skewX(-14deg);
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after {
  background-color:<?php echo esc_attr($cssData['title_bg_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-content {
  float: left;
  width: 100% ;  
  position: relative;
  background-color: <?php echo esc_attr($cssData['description_font_background_color']) ?>;
  display: none;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-content:hover {
  background-color: <?php echo esc_attr($cssData['description_background_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-content-feature {
  float: left;
  width: 100%;   
  box-sizing: border-box;
  font-weight: <?php echo esc_attr($cssData['description_font_weight']) ?>;
  font-size: <?php echo esc_attr($cssData['description_font_size_number']) ?>px;
  font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['description_font_family'])); ?>;
  color: <?php echo esc_attr($cssData['description_font_color']) ?>;
  line-height: <?php echo esc_attr($cssData['description_line_height_number']) ?>px;
  text-transform: <?php echo esc_attr($cssData['description_text_transform']) ?>;
  text-align: <?php echo esc_attr($cssData['description_text_align']) ?>;
  padding-left: <?php echo esc_attr($cssData['description_padding_left_number']) ?>px;
  padding-right: <?php echo esc_attr($cssData['description_padding_right_number']) ?>px;
  padding-top: <?php echo esc_attr($cssData['description_padding_top_number']) ?>px; 
  padding-bottom: <?php echo esc_attr($cssData['description_padding_bottom_number']) ?>px;
  <?php
  if (isset($cssData['content_limit_show_hide']) && $cssData['description_scroll'] > 0) {
      echo "max-height: {$cssData['description_scroll']}px; overflow-y: auto;";
  } else {
      echo "height: auto;";
  }
  ?>
}
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-content:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-content-feature {
  color: <?php echo esc_attr($cssData['description_text_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids)?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-head-title{
  color: <?php echo esc_attr($cssData['title_text_hover_color']) ?> !important; 
  background: <?php echo esc_attr($cssData['title_bg_hover_color']) ?> !important; 
}
.afaq-6310-faq-template-<?php echo esc_attr($ids)?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon{
  background-color: <?php echo esc_attr($cssData['indicator_background_hover_color']) ?> !important;
  color: <?php echo esc_attr($cssData['indicator_hover_color']) ?> !important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-right-icon {
  background-color:<?php echo esc_attr($cssData['title_bg_hover_color']) ?> !important;
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?> !important;
}

.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after, 
.afaq-6310-faq-template-<?php echo esc_attr($ids);?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids);?>-left-icon::after {
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
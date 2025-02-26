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
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?> {
  float: left;   
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s; 
  margin-bottom: 10px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head {
  float: left;
  width: 100%;
  cursor: pointer; 
  background: <?php echo esc_attr($cssData['title_bg_color']) ?>;
  position: relative;
  display: flex;
  box-sizing: border-box;
  overflow: hidden;
  border-radius: 10px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active{
  border-radius: 10px 10px 0 0;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo ($ids); ?>-head-title{ 
  color: <?php echo esc_attr($cssData['title_text_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-left-icon {  
  float: left;   
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo esc_attr($cssData['head_icon_width_number']) ;?>px; 
  color: <?php echo esc_attr($cssData['title_icon_color']) ?>;
  font-size: <?php echo esc_attr($cssData['head_icon_font_size_number']) ?>px;   
  display: <?php echo esc_attr((isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none') ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-left-icon{
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?>;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-title{
  float: left;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>; 
  font-size: <?php echo esc_attr($cssData['title_font_size_number']) ?>px;
  font-weight:<?php echo esc_attr($cssData['title_font_weight']) ?>;
  text-transform: <?php echo esc_attr($cssData['title_text_transform']); ?>;  
  line-height: <?php echo esc_attr($cssData['title_line_height_number']) ?>px;
  width: calc(100% - <?php echo esc_attr($display) ?>px);
  justify-content: <?php echo esc_attr($cssData['title_text_align']) ?>;
  text-align: <?php echo esc_attr($textAlign) ?>;
  color: <?php echo esc_attr($cssData['title_font_color']) ?>; 
  padding: <?php echo esc_attr($cssData['title_padding_top_number']) ?>px <?php echo esc_attr($cssData['title_padding_right_number']) ?>px <?php echo esc_attr($cssData['title_padding_bottom_number']) ?>px <?php echo esc_attr($cssData['title_padding_left_number']) ?>px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-right-icon{
  float: left;
  text-align: center;
  font-size: <?php echo esc_attr($cssData['indicator_font_size_number']) ?>px; 
  width: <?php echo esc_attr($cssData['indicator_width_number']) ?>px ;  
  color: <?php echo esc_attr($cssData['indicator_color']) ?>; 
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-label-head:hover .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-right-icon{
  color:<?php echo esc_attr($cssData['indicator_hover_color']) ?>; 
}

.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content {
  float: left;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  width: 100%;
  position: relative;
  background: <?php echo esc_attr($cssData['title_bg_color']) ?>;
  display: none; 
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature {
  float: left;  
  width: 100%; 
  box-sizing: border-box;
  line-height: <?php echo esc_attr($cssData['description_line_height_number']) ?>px;
  text-align: <?php echo esc_attr($cssData['description_text_align']) ?>;
  color: <?php echo esc_attr($cssData['description_font_color']) ?>;
  text-transform: <?php echo esc_attr($cssData['description_text_transform']) ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  font-size: <?php echo esc_attr($cssData['description_font_size_number']) ?>px;
  font-weight:<?php echo esc_attr($cssData['description_font_weight']) ?>;
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

.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-title{
  color: <?php echo esc_attr($cssData['title_text_hover_color']) ?> !important; 
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-left-icon{
  color: <?php echo esc_attr($cssData['icon_hover_color']) ?> !important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-active .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-head-right-icon{
  color:<?php echo esc_attr($cssData['indicator_hover_color']) ?> !important;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
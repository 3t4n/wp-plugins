<?php 
$display = $cssData['indicator_width_number'];
$display += (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? $cssData['head_icon_width_number']: 0;

if($cssData['title_text_align'] == 'flex-start') {
  $textAlign = 'left';
} else if($cssData['title_text_align'] == 'center') {
  $textAlign = 'center';
} else {
  $textAlign = 'right';
}
?>

<style>
  .afaq-6310-faq-template-<?php echo $ids; ?> {
  width: 100%;
  float: left;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  float: left;
  width: 100%;
  cursor: pointer;
  position: relative;  
  overflow: hidden;
  border-top: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
  box-sizing: border-box;
  display: flex;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-right-icon {
  float: left; 
  display: flex;
  justify-content: center;
  align-items: center;
  width: <?php echo $cssData['indicator_width_number'] ?>px;
  color:<?php echo $cssData['indicator_color'] ?>;
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px;
  background-color: <?php echo $cssData['indicator_background_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::after {
  content: "";
  position: absolute;
  width: <?php echo $cssData['angle_width_number']; ?>px;
  left: <?php echo $cssData['angle_from_left_number']; ?>px;
  height: 50%;
  bottom: 0;
  background-color: <?php echo $cssData['icon_background_color'] ?>;
  transform: skewX(-28deg);
  z-index: 1;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::after {
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::before {
  content: "";
  position: absolute;
  width: <?php echo $cssData['angle_width_number']; ?>px;
  left: <?php echo $cssData['angle_from_left_number']; ?>px;
  height: 50%;
  top: 0;
  background-color: <?php echo $cssData['icon_background_color'] ?>;
  transform: skewX(28deg);
  z-index: 1;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::before {
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left;
  width: calc(100% - <?php echo $display ?>px);
  position: relative;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform:<?php echo $cssData['title_text_transform'] ?>;  
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  font-weight: <?php echo $cssData['title_font_weight']?>;
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  justify-content: <?php echo $cssData['title_text_align'] ?>; 
  text-align: <?php echo $textAlign ?>;
  color: <?php echo $cssData['title_font_color'] ?>;
  padding-left: 20px;   
  background-color: <?php echo $cssData['title_bg_color'] ?>;
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  display: flex;
  align-items: center;
  box-sizing: inherit;
 
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?> ;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-left-icon{
  float: left;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  color: <?php echo $cssData['title_icon_color'] ?>;
  width: <?php echo $cssData['head_icon_width_number'] ?>px;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;
  background-color: <?php echo $cssData['icon_background_color'] ?>;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
  justify-content: center;
  align-items: center;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left;   
  width: 100%;
  position: relative;
  display: none;
  background-color: <?php echo $cssData['description_font_background_color'] ?>;
  margin-bottom:<?php echo $cssData['description_margin_bottom'] ?>px;  
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover {
  background-color: <?php echo $cssData['description_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
  float: left;
  box-sizing: border-box;
  font-size: <?php echo $cssData['description_font_size_number'] ?>px;
  color: <?php echo $cssData['description_font_color'] ?>; 
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  font-weight: <?php echo $cssData['description_font_weight'] ?>;
  text-transform: <?php echo $cssData['description_text_transform'] ?>;
  text-align: <?php echo $cssData['description_text_align'] ?>;
  width: 100%;
  padding-left: <?php echo $cssData['description_padding_left_number'] ?>px;
  padding-right: <?php echo $cssData['description_padding_right_number'] ?>px;
  padding-top: <?php echo $cssData['description_padding_top_number'] ?>px; 
  padding-bottom: <?php echo $cssData['description_padding_bottom_number'] ?>px; 
  line-height: <?php echo $cssData['description_line_height_number'] ?>px;
  <?php 
  if(isset($cssData['content_limit_show_hide']) && $cssData['description_scroll'] > 0){
    echo "max-height: {$cssData['description_scroll']}px; overflow-y: auto;";
  }else{
    echo "height: auto;";
  }
  ?>
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
  color: <?php echo $cssData['description_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {  
  color: <?php echo $cssData['title_text_hover_color'] ?> ;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::before {
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon::after {
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}

.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
<?php 
$display = ($cssData['indicator_width_number'] ? $cssData['indicator_width_number'] : 20) + ($cssData['title_empty_space'] ? $cssData['title_empty_space'] : 20);
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
  cursor: pointer;
  width: 100%;
  position: relative;
  display: flex;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left;
  display: flex;
  box-sizing: inherit;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform:<?php echo $cssData['title_text_transform'] ?>;
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  font-weight: <?php echo $cssData['title_font_weight']?>;
  justify-content: <?php echo $cssData['title_text_align'] ?>; 
  text-align: <?php echo $textAlign; ?>;
  color: <?php echo $cssData['title_font_color'] ?>;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
  margin-right:<?php echo $cssData['title_empty_space'] ?>px;  
  width: calc(100% - <?php echo $display;?>px);
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  border-top: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?> ;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
  
}
.afaq-6310-faq-template-<?php echo $ids; ?>-left-icon {
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  color: <?php echo $cssData['title_icon_color'] ?>;
  width: <?php echo $cssData['head_icon_width_number'] ?>px;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;
  background-color: <?php echo $cssData['icon_background_color'] ?>;
  border-top: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
}

.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
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
  border-top: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
  border-radius: 0px <?php echo ($cssData['top_border_height_number'] ? $cssData['top_border_height_number'] : 15) + 15 ?>px 0px 0px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?>;
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
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover{
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

.afaq-6310-faq-template-<?php echo $ids; ?>-right-icon::after {
  content: "";
  display: block;
  position: absolute;
  width: <?php echo ceil($cssData['indicator_width_number'] * .30 )?>px;
  height: <?php echo ceil($cssData['indicator_width_number'] * .30 )?>px;
  box-shadow: -2px 2px 2px rgba(0, 0, 0, 0.3), -3px 3px 5px rgba(0, 0, 0, 0.3);
  top: <?php echo $cssData['top_border_height_number'] ?>px;
  right: 0px;
  border-radius: 0px 33px 0px 0px;
  background: right;
  transform: skewX(75deg, 30deg) rotate(10deg);
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?> ;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-right-icon{
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?> !important;
  color: <?php echo $cssData['indicator_hover_color'] ?> !important;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
<?php 
$hidenn = (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 2: 1;

if ($cssData['title_text_align'] == 'flex-start') {
    $textAlign = 'left';
} elseif ($cssData['title_text_align'] == 'center') {
    $textAlign = 'center';
} else {
    $textAlign = 'right';
}

?>

<style>
.afaq-6310-faq-template-<?php echo $ids; ?> {
  float: left;
  width: 100%;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  float: left;
  width: 100%;
  position: relative;
  cursor: pointer;
  display: flex;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover 
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
  background-color:<?php echo $cssData['indicator_background_hover_color'] ?>;
  border-color: <?php echo $cssData['indicator_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:after{
   position: absolute;
  content: "";
  width: <?php echo ceil($cssData['indicator_border_size_number']) ?>px;
  height:100%;
  background: <?php echo $cssData['description_border_color'] ?>;
  left: <?php echo ceil(($cssData['indicator_width_number'] / 2)  - ($cssData['indicator_border_size_number'] / 2))?>px;
  z-index: 0;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  float: left;
  position: relative;
  text-align: center;
  display: flex;
  box-sizing: border-box;
  justify-content: center;
  align-items: center;
  z-index: 1;
  width:<?php echo $cssData['indicator_width_number'] ?>px;
  height:<?php echo $cssData['indicator_width_number'] ?>px;
  line-height: <?php echo $cssData['indicator_width_number'] ?>px;
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px;
  border-radius: <?php echo $cssData['indicator_border_radius'] ?>%;
  border: <?php echo ceil($cssData['indicator_border_size_number']) ?>px solid <?php echo $cssData['indicator_border_color'] ?>;
  color:<?php echo $cssData['indicator_color'] ?>;
  background-color:<?php echo $cssData['indicator_background_color'] ?>;  
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color:<?php echo $cssData['title_text_hover_color'] ?>;
}

.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  display: flex;
  float: left;
  box-sizing: border-box;
  width: 100%;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform: <?php echo $cssData['title_text_transform'] ?>;
  padding: <?php echo $cssData['title_padding_top_number']?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  color: <?php echo $cssData['title_font_color'] ?>;
  font-weight:<?php echo $cssData['title_font_weight'] ?>;
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  justify-content: <?php echo $cssData['title_text_align'] ?>;
   text-align: <?php echo $textAlign ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i{
  color:<?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i{
  color:<?php echo $cssData['title_icon_color'] ?>;
  font-size:<?php echo $cssData['head_icon_font_size_number'] ?>px;
  margin-right: 10px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left;
  position: relative;
  width: 100%;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content::after {
  position: absolute;
  content: "";
   width: <?php echo ceil($cssData['indicator_border_size_number']) ?>px;
  height:100%;
  background: <?php echo $cssData['description_border_color'] ?>;
  left: <?php echo ceil(($cssData['indicator_width_number'] / 2)  - ($cssData['indicator_border_size_number'] / 2))?>px;
  z-index: 0;
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
  width: calc(100% - <?php echo ceil(($cssData['indicator_width_number'] ? $cssData['indicator_width_number'] : 20)  * 2) + ($cssData['description_padding_left_number'] ? $cssData['description_padding_left_number'] : 20) + ($cssData['description_padding_right_number'] ? $cssData['description_padding_right_number'] : 20) ?>px);  
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5) inset,
    0 1px 2px rgba(255, 255, 255, 0.9);
  margin: 0 <?php echo $cssData['indicator_width_number'] ?>px 10px;
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
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature  {
  color:<?php echo $cssData['description_text_hover_color'] ?>;
}

/* active class start */
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
  color: <?php echo $cssData['title_text_hover_color'] ?> !important;  
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i {
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
  background-color:<?php echo $cssData['indicator_background_hover_color'] ?>;
  border-color: <?php echo $cssData['indicator_border_hover_color'] ?>;
}

.afaq-6310-faq-template-<?php echo $ids;?>-active .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after, 
.afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
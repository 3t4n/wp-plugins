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
.afaq-6310-faq-template-<?php echo $ids; ?> {
  float: left;
  width: 100%;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-left-section {
  float: left;
  width: <?php echo $cssData['angle_width_number']; ?>px;
  position: relative;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-right-section {
  float: left;
  width: calc(100% - <?php echo $cssData['angle_width_number']; ?>px);
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {   
  float: left;
  width: 100%;
  border: <?php echo $cssData['title_border_size'] ?>px solid <?php echo $cssData['title_border_color'] ?>;  
  border-radius: 0 8px 8px 0;
  position: relative;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
  cursor: pointer;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
  box-sizing: border-box;
  display: flex;
}
.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-right-section .afaq-6310-faq-template-<?php echo $ids; ?>-label-head{
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
  border: <?php echo $cssData['title_border_size'] ?>px solid <?php echo $cssData['title_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  float: left;
  width: <?php echo $cssData['indicator_width_number'] ?>px;  
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px;
  color: <?php echo $cssData['indicator_color'] ?>;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo $cssData['head_icon_width_number'] ?>px; 
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;
  color: <?php echo $cssData['title_icon_color'] ?>;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
  
}
.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left;
  display: flex;
  box-sizing: inherit;
  line-height:<?php echo $cssData['title_line_height_number'] ?>px;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform:<?php echo $cssData['title_text_transform'] ?>;
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  font-weight: <?php echo $cssData['title_font_weight']?>;
  justify-content: <?php echo $cssData['title_text_align'] ?>; 
  text-align: <?php echo $textAlign ?>;
  color: <?php echo $cssData['title_font_color'] ?>; 
  width: calc(100% - <?php echo $display ?>px);
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow {
  display: block;
  width: 100%;
  height: <?php echo $cssData['title_line_height_number']  + 3 ?>px; 
  line-height: <?php echo ceil($cssData['title_line_height_number'] * .3 + 2 ) + ceil($cssData['title_line_height_number']  + 3 )?>px;
  background:<?php echo $cssData['number_background_color'] ?>;
  font-size: <?php echo $cssData['head_number_size'] ?>px;
  color: <?php echo $cssData['number_color'] ?>;
  text-align: center;
}
.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-section .afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow  {  
  color: <?php echo $cssData['number_hover_color'] ?>; 
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow-before {
  content: "";
  border-top:  15px solid  <?php echo $cssData['arrow_sign_top_color'] ?>;
  border-left:  <?php echo ceil($cssData['angle_width_number']/2); ?>px solid transparent;
  border-right:  <?php echo ceil($cssData['angle_width_number']/2); ?>px solid transparent;
  position: absolute;
  left: 0;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow-after {
  content: "";
  border-top: 15px solid <?php echo $cssData['arrow_sign_top_color'] ?>;
  border-left: <?php echo ceil($cssData['angle_width_number']/2); ?>px solid transparent;
  border-right: <?php echo ceil($cssData['angle_width_number']/2); ?>px solid transparent;
  position: absolute;
  left: 0;
  border-top-color:<?php echo $cssData['number_background_color'] ?>;
  bottom: -15px;
  z-index: 1;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left;
  width: 100%;
  box-sizing: border-box;
  background: <?php echo $cssData['description_font_background_color'] ?>;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover{
  background:<?php echo $cssData['description_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
  float: left;
  box-sizing: border-box;
  width: 100%;
  line-height: <?php echo $cssData['description_line_height_number'] ?>px;
  text-align: <?php echo $cssData['description_text_align'] ?>;
  color: <?php echo $cssData['description_font_color'] ?>;
  text-transform: <?php echo $cssData['description_text_transform'] ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  font-size: <?php echo $cssData['description_font_size_number'] ?>px;
  font-weight:<?php echo $cssData['description_font_weight']?>; 
   padding-left: <?php echo $cssData['description_padding_left_number'] ?>px;
  padding-right: <?php echo $cssData['description_padding_right_number'] ?>px;
  padding-top: <?php echo $cssData['description_padding_top_number'] ?>px; 
  padding-bottom: <?php echo $cssData['description_padding_bottom_number'] ?>px;
  <?php 
  if(isset($cssData['content_limit_show_hide']) && $cssData['description_scroll'] > 0){
    echo "max-height: {$cssData['description_scroll']}px; overflow-y: auto;";
  }else{
    echo "height: auto;";
  }
  ?>
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
  color: <?php echo $cssData['description_font_color'] ?>;
}

/* active sectionn start  */
.afaq-6310-faq-template-<?php echo $ids; ?>-active{
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-label-head{ 
  border: <?php echo $cssData['title_border_size'] ?>px solid <?php echo $cssData['title_border_hover_color'] ?>;  
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
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
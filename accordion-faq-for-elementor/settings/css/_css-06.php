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
  width: 100%;
  float: left;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  float: left;
  cursor: pointer;
  width: 100%;
  position: relative; 
  text-align: center;
  box-sizing: border-box;
  display: flex;
  overflow: hidden;
  border-top: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover {
  background-color: rgb(0, 92, 92);
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo $cssData['head_icon_width_number'] ?>px; 
  color: <?php echo $cssData['title_icon_color'] ?>;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;
  background-color: <?php echo $cssData['icon_background_color'] ?>;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  float: left;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo $cssData['indicator_width_number'] ?>px;
  font-size:<?php echo $cssData['indicator_font_size_number'] ?>px; 
  color: <?php echo $cssData['indicator_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon::after {
  content: "";
  position: absolute;
  height: 4px;
  width: <?php echo ceil($cssData['indicator_width_number'] * 0.28) ?>px;
  background-color:<?php echo $cssData['indicator_color'] ?>;
  z-index: 0;
  right: 0px;
  top: calc(50% - 2px);
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon::after{
  background-color:<?php echo $cssData['indicator_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left;
  width: calc(100% - <?php echo $display ?>px);
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform: <?php echo $cssData['title_text_transform'] ?>;
  position: relative;  
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  font-weight:<?php echo $cssData['title_font_weight'] ?>;
  color: <?php echo $cssData['title_font_color'] ?>;
  justify-content: <?php echo $cssData['title_text_align'] ?>; 
  text-align: <?php echo $textAlign ?>;
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  display: flex;
  align-items: center;
  box-sizing: inherit;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?>;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left; 
  position: relative;
  display: none;
  border-left: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_color'] ?>;
  border-bottom: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_color'] ?>;
  border-right: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_color'] ?>;
  width: 100% ;
  box-sizing: border-box;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
  background-color: <?php echo $cssData['description_font_background_color'] ?>; 
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover {
  background-color: <?php echo $cssData['description_background_hover_color'] ?>;
  border-left: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_hover_color'] ?>;
  border-bottom: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_hover_color'] ?>;
  border-right: <?php echo $cssData['description_border_height'] ?>px solid <?php echo $cssData['description_border_hover_color'] ?>;
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
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature{
  color: <?php echo $cssData['description_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
  color: <?php echo $cssData['title_text_hover_color'] ?> !important; 
  background: <?php echo $cssData['title_bg_hover_color'] ?> !important; 
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon{
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?> !important;
  color: <?php echo $cssData['indicator_hover_color'] ?> !important;
}

.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon::after{
  background-color:<?php echo $cssData['indicator_hover_color'] ?>;

}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
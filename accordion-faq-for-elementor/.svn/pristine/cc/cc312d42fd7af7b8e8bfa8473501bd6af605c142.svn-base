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
  width: calc(100% - <?php echo $cssData['angel_width_number'] ?>px);
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  float: left;
  position: relative;
  cursor: pointer;
  box-sizing: border-box;
  display: flex; 
  width: 100%;
  border-bottom: <?php echo $cssData['title_border_size'] ?>px solid <?php echo $cssData['title_border_color'] ?>;  
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover{
 border-color: <?php echo $cssData['title_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon-after {
  content: "";
  position: absolute;
  top: 0px;
  bottom: 0;
  border-left: <?php echo $cssData['angel_width_number'] ?>px solid <?php echo $cssData['title_bg_color'] ?>;
  border-top: <?php echo ceil($cssData['title_line_height_number'] / 2 )?>px solid transparent;
  border-bottom: <?php echo ceil($cssData['title_line_height_number'] / 2 )?>px solid transparent;
  right: -<?php echo $cssData['angel_width_number'] ?>px ;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon-after  {
  border-left-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  float: left;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo $cssData['head_icon_width_number'] ?>px; 
  color: <?php echo $cssData['title_icon_color'] ?>;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
}
 .afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left;
  width: calc(100% - <?php echo $display ?>px);
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  text-transform:<?php echo $cssData['title_text_transform'] ?>; 
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  font-weight: <?php echo $cssData['title_font_weight']?>;
  justify-content: <?php echo $cssData['title_text_align'] ?>; 
  text-align: <?php echo $textAlign ?>;
  color: <?php echo $cssData['title_font_color'] ?>;
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?>;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  width: <?php echo $cssData['indicator_width_number'] ?>px;  
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px;
  color: <?php echo $cssData['indicator_color'] ?>;
  background-color: <?php echo $cssData['title_bg_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color: <?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['title_bg_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left;
  width: 100%;
  box-sizing: border-box;
  position: relative;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
  display: flex;
  box-sizing: border-box;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature { 
  float: left;
  box-sizing: border-box;
  width: 100%;
  background-color: <?php echo $cssData['description_font_background_color'] ?>;
  margin-left: <?php echo ceil($cssData['title_line_height_number'] / 2 )?>px;
  font-size: <?php echo $cssData['description_font_size_number'] ?>px;
  line-height: <?php echo $cssData['description_line_height_number'] ?>px;
  color: <?php echo $cssData['description_font_color'] ?>;
  text-align: <?php echo $cssData['description_text_align'] ?>;
  text-transform: <?php echo $cssData['description_text_transform'] ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  padding-left: <?php echo $cssData['description_padding_left_number'] ?>px;
  padding-right: <?php echo $cssData['description_padding_right_number'] ?>px;
  padding-top: <?php echo $cssData['description_padding_top_number'] ?>px; 
  padding-bottom: <?php echo $cssData['description_padding_bottom_number'] ?>px;
  font-weight: <?php echo $cssData['description_font_weight']?>;
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
  background-color: <?php echo $cssData['description_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content::before {
  content: "";
  border-right:  <?php echo ceil($cssData['title_line_height_number'] / 2 )?>px solid <?php echo $cssData['description_shadow_color'] ?>;
  border-bottom:  <?php echo ceil($cssData['title_line_height_number'] / 2 )?>px solid transparent;
  position: absolute;
  top: 0;
  left: 0px;
}

/* active class start */
 .afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
  color: <?php echo $cssData['title_text_hover_color'] ?> !important;  
  background-color:<?php echo $cssData['title_bg_hover_color'] ?> !important;  
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color:<?php echo $cssData['title_bg_hover_color'] ?> !important;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
  background-color:<?php echo $cssData['title_bg_hover_color'] ?> !important;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon-after  {
  border-left: <?php echo $cssData['angel_width_number'] ?>px solid <?php echo $cssData['title_bg_hover_color'] ?>;

}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
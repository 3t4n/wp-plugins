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
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  background: <?php echo $cssData['title_bg_color'] ?>;
  position: relative;
  float: left;
  width: 100%;
  cursor: pointer;
  border-bottom: <?php echo $cssData['top_border_height_number'] ?>px solid <?php echo $cssData['title_border_top_color'] ?>;
  border-radius: 0 15px 0 15px;  
  box-sizing: border-box;
  display: flex;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left; 
  display: flex;
  box-sizing: inherit;
  width: calc(100% - <?php echo $display ?>px);
  justify-content: <?php echo $cssData['title_text_align'] ?>;
  text-align: <?php echo $textAlign ?>;
  font-size:<?php echo $cssData['title_font_size_number'] ?>px;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  font-weight:<?php echo $cssData['title_font_weight'] ?>; 
  line-height: <?php echo $cssData['title_line_height_number'] ?>px; 
  color:<?php echo $cssData['title_font_color'] ?>;
  text-transform:<?php echo $cssData['title_text_transform'] ?>;
  padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  color: <?php echo $cssData['title_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  float: left;
  display: flex;
  box-sizing: inherit;
  justify-content: center;
  align-items: center;
  width:<?php echo $cssData['head_icon_width_number'] ?>px;  
  color: <?php echo $cssData['title_icon_color'] ?>;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px;

}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  float: left;
  box-sizing: inherit;
  justify-content: center;
  align-items: center;
  width:<?php echo $cssData['indicator_width_number'] ?>px; 
  color:<?php echo $cssData['indicator_color'] ?>;
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px;
  display: <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? 'flex': 'none' ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
float: left;
width: 100%;
box-sizing: border-box;
background-color: <?php echo $cssData['description_font_background_color'] ?>;
position: relative;
border-top-left-radius: 15px;
border-bottom-right-radius: 15px;

}
.afaq-6310-faq-template-<?php echo $ids; ?>-content::after{
  content: "";
  position: absolute;
  top: 0;
  left: 36px;
  border: 7px solid transparent;
  border-top: 7px solid <?php echo $cssData['title_border_top_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover {
  background-color: <?php echo $cssData['description_background_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature { 
  float: left; 
  box-sizing: border-box;
  width: 100%;
  padding-left: <?php echo $cssData['description_padding_left_number'] ?>px;
  padding-right: <?php echo $cssData['description_padding_right_number'] ?>px;
  padding-top: <?php echo $cssData['description_padding_top_number'] ?>px; 
  padding-bottom: <?php echo $cssData['description_padding_bottom_number'] ?>px;
  line-height: <?php echo $cssData['description_line_height_number'] ?>px;
  text-align: <?php echo $cssData['description_text_align'] ?>;
  color: <?php echo $cssData['description_font_color'] ?>;
  text-transform: <?php echo $cssData['description_text_transform'] ?>;
  font-family: <?php echo str_replace("+", " ", $cssData['description_font_family']); ?>;
  font-size: <?php echo $cssData['description_font_size_number'] ?>px;
  font-weight:<?php echo $cssData['description_font_weight']?>;
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

/* active class start */
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
  color: <?php echo $cssData['title_text_hover_color'] ?> !important;  
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  color: <?php echo $cssData['icon_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
  color:<?php echo $cssData['indicator_hover_color'] ?>;
}

.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
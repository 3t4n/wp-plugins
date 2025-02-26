<style>
.afaq-6310-faq-template-<?php echo $ids; ?>{
  float: left;
  width: 100%;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
  float: left;
  width: 100%;
  position: relative;  
  margin-bottom: <?php echo $cssData['title_margin_bottom'] ?>px;
  display: flex;
  box-sizing: border-box;

}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
  width: <?php echo $cssData['head_icon_width_number'] ;?>px; 
  float: left; 
  position: relative;
  z-index: 3; 
  display: flex;
  justify-content: center;
  align-items: center;
  box-sizing: inherit;
  color: <?php echo $cssData['title_icon_color'] ?>;
  font-size: <?php echo $cssData['head_icon_font_size_number'] ?>px; 
  background-color: <?php echo $cssData['icon_background_color'] ?>;  
  border-right: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_color'] ?>; 
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  color: <?php echo $cssData['icon_hover_color'] ?>;
  background-color: <?php echo $cssData['icon_background_hover_color'] ?>;
  border-right: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
  float: left; 
  position: relative;
  z-index: 3;
  display: flex;
  box-sizing: inherit;
  width: 100%;
  cursor: pointer;
  font-family: <?php echo str_replace("+", " ", $cssData['title_font_family']); ?>;
  background: <?php echo $cssData['title_bg_color'] ?>;
  font-size: <?php echo $cssData['title_font_size_number'] ?>px;
  font-weight:<?php echo $cssData['title_font_weight']?>;
  text-transform: <?php echo $cssData['title_text_transform']; ?>;  
  line-height: <?php echo $cssData['title_line_height_number'] ?>px;
  justify-content: <?php echo $cssData['title_text_align'] ?>;
   padding: <?php echo $cssData['title_padding_top_number'] ?>px <?php echo $cssData['title_padding_right_number'] ?>px <?php echo $cssData['title_padding_bottom_number'] ?>px <?php echo $cssData['title_padding_left_number'] ?>px;
  color: <?php echo $cssData['title_font_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{
  background-color:<?php echo $cssData['title_bg_hover_color'] ?> ;
  color: <?php echo $cssData['title_text_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon{
  float: left;
  position: relative;
  z-index: 3;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: <?php echo $cssData['indicator_font_size_number'] ?>px; 
  width: <?php echo $cssData['indicator_width_number'] ?>px;  
  color: <?php echo $cssData['indicator_color'] ?>;
  background-color:<?php echo $cssData['indicator_background_color'] ?>;
  border-left: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon{
  color:<?php echo $cssData['indicator_hover_color'] ?>;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?>;
  border-left: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:before,
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:after{
  content: "";
  width: 50%;
  height: 20%;
  box-shadow: 0 12px 12px rgba(0, 0, 0, 0.4);
  position: absolute;
  bottom: 10px;
  left: 0px;
  transform: rotate(-2deg);
  z-index: 0;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:after{
  left: auto;
  right: 0px;
  transform: rotate(2deg);
  z-index: 0;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content {
  float: left;
  width: 100%;
  box-sizing: border-box;
  position: relative;
  background-color: <?php echo $cssData['description_bg_color'] ?>;
  margin-bottom: <?php echo $cssData['description_margin_bottom'] ?>px;
  border-bottom: <?php echo $cssData['description_border_bottom'] ?>px solid <?php echo $cssData['description_border_bottom_color'] ?>; 
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
.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature{
  color: <?php echo $cssData['description_text_hover_color'] ?>;
  background-color: <?php echo $cssData['description_bg_hover_color']?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{
  color: <?php echo $cssData['title_text_hover_color'] ?> !important; 
  background: <?php echo $cssData['title_bg_hover_color'] ?> !important; 
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
  background: <?php echo $cssData['icon_background_hover_color'] ?> !important;
  color: <?php echo $cssData['icon_hover_color'] ?> !important;
  border-right: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_hover_color'] ?>;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon{
  color:<?php echo $cssData['indicator_hover_color'] ?> !important;
  background-color: <?php echo $cssData['indicator_background_hover_color'] ?> !important;
  border-left: <?php echo $cssData['head_icon_border_size'] ?>px solid <?php echo $cssData['title_icon_border_hover_color'] ?>;
  
}

.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature img.alignright{
  margin-left: 15px;
}
</style>
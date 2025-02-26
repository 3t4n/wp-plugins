<?php
  $borderWidth = !empty($cssData['box_border_width']) ? esc_attr($cssData['box_border_width']) : 0;
  $computedWidth = "calc(100% - {$borderWidth}px * 2)";

  $customCSS = ".anc-6310-counter-".esc_attr($ids)." {
    border-style: solid;
    font-family: Amaranth;
    letter-spacing: 0.11em;
    border-width: ".esc_attr($cssData['box_border_width'])."px;
    border-color: ".esc_attr($cssData['box_border_color']).";
    background-color: ".esc_attr($cssData['box_background_color']).";
    box-shadow: 0 0 ".esc_attr(($cssData['box_shadow_blur']?$cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_color']).";
    width: <?php echo $computedWidth; ?>;
    -webkit-border-radius: ".esc_attr($cssData['box_radius'])."px;
    -o-border-radius: ".esc_attr($cssData['box_radius'])."px;
    -moz-border-radius: ".esc_attr($cssData['box_radius'])."px;
    -ms-border-radius: ".esc_attr($cssData['box_radius'])."px;
    border-radius: ".esc_attr($cssData['box_radius'])."px;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    height: 100%;
  }
  .anc-6310-counter-".esc_attr($ids).":hover {
    background-color: ".esc_attr($cssData['box_background_hover_color']).";
    border-color: ".esc_attr($cssData['box_border_hover_color']).";
    box-shadow: 0 0 ".(esc_attr($cssData['box_shadow_blur'] ? $cssData['box_shadow_blur']:0) * 2)."px ".esc_attr($cssData['box_shadow_width'])."px ".esc_attr($cssData['box_shadow_hover_color']).";
  }
  .anc-6310-counter-".esc_attr($ids)."-paralax {
    background-image: url('https://wpmart.org/wp-content/uploads/anc/counter-02-background.jpeg');
    background-attachment: fixed;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    font-size: 0;
    width: 100%;
  }
  .anc-6310-counter-".esc_attr($ids)."-common-overlay{
    background-color: ".esc_attr($cssData['image_overlay_color']).";
    overflow: hidden;
    font-size: 0;
  }
  .anc-6310-counter-".esc_attr($ids)."-common-overlay:hover{
    background-color: ".esc_attr($cssData['image_overlay_hover_color']).";
  }
  .anc-6310-counter-".esc_attr($ids)."-row{
    padding: 110px 0 80px;
    overflow: hidden;
    font-size: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  .anc-6310-counter-".esc_attr($ids)."-icon {
    text-align: ".esc_attr($cssData['icon_text_align']).";
  }
  .anc-6310-counter-".esc_attr($ids)."-icon i{
    color: rgba(255, 255, 255, 1);
    font-size: 50px;
    margin-left: ".esc_attr($cssData['icon_margin_left'])."px;
    margin-right: ".esc_attr($cssData['icon_margin_right'])."px;
    margin-top: ".esc_attr($cssData['icon_margin_top'])."px;
    margin-bottom: ".esc_attr($cssData['icon_margin_bottom'])."px;
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
  }
  @-webkit-keyframes hvr-pulse {
    25% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
    75% {
      -webkit-transform: scale(0.9);
      transform: scale(0.9);
    }
  }
  @keyframes hvr-pulse {
    25% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
    75% {
      -webkit-transform: scale(0.9);
      transform: scale(0.9);
    }
  }
  .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-icon i{
    color: rgba(255, 255, 255, 1);
    -webkit-animation-name: hvr-pulse;
    animation-name: hvr-pulse;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
  }
  .anc-6310-counter-".esc_attr($ids)."-count-content {
    margin-top: ".esc_attr($cssData['number_margin_top'])."px;
    margin-bottom: ".esc_attr($cssData['number_margin_bottom'])."px;
    margin-left: ".esc_attr($cssData['number_margin_left'])."px;
    margin-right: ".esc_attr($cssData['number_margin_right'])."px;
    text-align: ".esc_attr($cssData['number_text_align']).";
  }
  .anc-6310-counter-".esc_attr($ids)."-count-content-inner {
    position: relative;
    display: inline-block;
    padding-bottom: 5px;
  }
  .anc-6310-counter-".esc_attr($ids)."-count-content-inner:after{
    content: '';
    position: absolute;
    top: ".esc_attr($cssData['underline_margin_top'])."px;
    left: 0;
    right: 0;
    height: ".esc_attr($cssData['underline_height'])."px;
    -webkit-border-radius: ".esc_attr($cssData['underline_radius'])."px;
    -o-border-radius: ".esc_attr($cssData['underline_radius'])."px;
    -moz-border-radius: ".esc_attr($cssData['underline_radius'])."px;
    -ms-border-radius: ".esc_attr($cssData['underline_radius'])."px;
    border-radius: ".esc_attr($cssData['underline_radius'])."px;
    background-color: ".esc_attr($cssData['underline_background_color']).";
  }
  .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-content-inner:after {
    background-color: ".esc_attr($cssData['underline_background_hover_color']).";
  }
  .anc-6310-counter-".esc_attr($ids)."-count-number {
    display: inline-block;
    font-family: ".str_replace("+", " ", esc_attr($cssData['number_font_family'])).";
    font-weight: ".esc_attr($cssData['number_font_weight']).";
    font-size: ".esc_attr($cssData['number_font_size'])."px;
    color: rgb(255, 255, 255);
    line-height: ".esc_attr($cssData['number_line_height'])."px;
  }
  .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-number {
    color: rgb(255, 255, 255);
  }
  .anc-6310-counter-".esc_attr($ids)."-count-title {
    font-family: ".str_replace("+", " ", esc_attr($cssData['title_font_family'])).";
    font-weight: ".esc_attr($cssData['title_font_weight']).";
    font-size: 18px;
    color: rgb(255, 255, 255);
    text-transform: ".esc_attr($cssData['title_text_transform']).";
    line-height: ".esc_attr($cssData['title_line_height'])."px;
    margin-top: ".esc_attr($cssData['title_margin_top'])."px;
    margin-bottom: ".esc_attr($cssData['title_margin_bottom'])."px;
    margin-left: ".esc_attr($cssData['title_margin_left'])."px;
    margin-right: ".esc_attr($cssData['title_margin_right'])."px;
    text-align: ".esc_attr($cssData['title_text_align']).";
    word-break: break-word;
  }
  .anc-6310-counter-".esc_attr($ids).":hover .anc-6310-counter-".esc_attr($ids)."-count-title {
    color: rgb(255, 255, 255);
  }
  .anc_6310_number_counter_style_".esc_attr($ids)." figcaption {
    padding: 0;
    margin: 0;
    border: none;
  }
  .anc-6310-owl-carousel .anc-6310-item-".esc_attr($ids)." {
      padding: 5px 0;
  }
  ";

  wp_register_style("anc-6310-custom-code-" . esc_attr($ids) . "-css", "");
  wp_enqueue_style("anc-6310-custom-code-" . esc_attr($ids) . "-css");
  wp_add_inline_style("anc-6310-custom-code-" . esc_attr($ids) . "-css", $customCSS);
?>
<style type="text/css">
  .afaq_6310_main_template_<?php echo esc_attr($ids) ?>{
  display: flex;
}
  .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content img{
    max-width: 100% !important;
    height: auto;
  }
  .afaq_6310_main_template,
  .afaq_6310_main_template a {
    box-shadow: none !important;
    font-size: 0;
  }
  br.afaq-6310-break-row{
    width: 100%;
    height: 1px;
    float: left;
    clear: both;
  }
  .afaq-6310-row {
    width: 100%;
    clear: both;
    display: table;
    text-align: center;
    margin-left: -15px;
    margin-right: -15px;
    font-size: 0;
  }
  .afaq-6310-col-1 img[image_hover],
  .afaq-6310-col-2 img[image_hover],
  .afaq-6310-col-3 img[image_hover],
  .afaq-6310-col-4 img[image_hover],
  .afaq-6310-col-6 img[image_hover] {
    width: 100% !important;
    height: auto !important;
  }
  .afaq-6310-img-responsive {
    width: 100%;
    height: auto;
  }
  .afaq_6310_faq_faq_style_<?php echo esc_attr($ids) . " figcaption" ?> {
    padding: 0;
    margin: 0;
    border: none;
  }
  .afaq-6310-owl-carousel .afaq-6310-item-<?php echo esc_attr($ids) ?> {
    padding: 5px 0;
  }
  .afaq_6310_faq_faq_info {
    cursor: pointer;
  }

  .no-ml-mr-mb-0{
  margin-left: 0 !important;
  margin-right: 0 !important;
  margin-bottom: 0 !important;
  width: 25% !important;
  padding-left: 0 !important;
  padding-right: 0 !important;
  }
  .afaq-6310-col-1 {
    width: 100%;
    margin-bottom: 30px;
    float: left;
    position: relative;
  }
  .afaq-6310-col-2,
  .afaq-6310-col-3,
  .afaq-6310-col-4,
  .afaq-6310-col-5,
  .afaq-6310-col-6 {
    margin-right: auto;
    margin-bottom: 30px;
    display: inline-block;
    padding-left: 15px;
    padding-right: 15px;
    vertical-align: top;
  }
  .afaq-6310-col-2 {
    width: calc(50% - 4px);
  }
  .afaq-6310-col-3 {
    width: calc(33.33% - 4px);
  }
  .afaq-6310-col-4 {
    width: calc(25% - 4px);
  }
  .afaq-6310-col-5 {
    width: calc(20% - 4px);
  }
  .afaq-6310-col-6 {
    width: calc(16.6667% - 4px);
  }
  .afaq-6310-col-2:nth-child(2n),
  .afaq-6310-col-3:nth-child(3n),
  .afaq-6310-col-4:nth-child(4n),
  .afaq-6310-col-5:nth-child(5n),
  .afaq-6310-col-6:nth-child(6n) {
    margin-right: 0;
  }
  <?php
    if(isset($cssData['search_template_show_hide'])){
  ?>
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template {
    float: left;
    width: 100%;
    display: flex;
    margin-top: 5px;
    margin-bottom: 5px;
    justify-content: <?php echo esc_attr($cssData['search_box_align']) ?>;
  }
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main {
    float: left;
    width: <?php echo esc_attr($cssData['search_width']) ?>%;   
    border-radius: <?php echo esc_attr((isset($cssData['search_border_radious_number'] ) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23 ); ?>px; 
    overflow: hidden;   
    margin-bottom: 5px;
  }
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input {
    float: left !important;
    outline: none !important;
    margin: 0 !important;
    padding: 0 0 0 10px !important;
    width: calc(100% - <?php echo esc_attr($cssData['search_box_height_number']) ?>px);
    border: <?php echo esc_attr((isset($cssData['search_border_width_number']) && $cssData['search_border_width_number'] !== '') ? $cssData['search_border_width_number'] : 1); ?>px solid <?php echo esc_attr((isset($cssData['search_border_color']) && $cssData['search_border_color'] !== '') ? $cssData['search_border_color'] : ''); ?> !important;
    line-height: <?php echo esc_attr((isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] - ($cssData['search_border_width_number'] * 2) : 30 - ($cssData['search_border_width_number'] * 2)) ?>px !important;
    min-height: <?php echo esc_attr((isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] - ($cssData['search_border_width_number'] * 2) : 30  - ($cssData['search_border_width_number'] * 2)) ?>px !important;
    font-size: <?php echo esc_attr((isset($cssData['search_font_size_number']) && $cssData['search_font_size_number'] !== '') ? $cssData['search_font_size_number'] : 12) ?>px;
    border-radius: <?php echo esc_attr((isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23); ?>px 0 0 <?php echo esc_attr((isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23); ?>px !important;
    background: <?php echo esc_attr((isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'); ?>;
    border-right: none !important;
    font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['searce_font_family'])); ?>;
  }
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:focus,
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:active,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:focus,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:active  {
    outline: none !important;
    box-shadow: 0 0 0 0 #FFF !important;
    border-right: none !important;
  }
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-button,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-button  {
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    width: <?php echo esc_attr((isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30) ?>px;
    height: <?php echo esc_attr((isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30)  ?>px !important;
    line-height: <?php echo esc_attr((isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30)  ?>px !important;
    border: <?php echo esc_attr((isset($cssData['search_border_width_number']) && $cssData['search_border_width_number'] !== '') ? $cssData['search_border_width_number'] : 1); ?>px solid <?php echo esc_attr((isset($cssData['search_border_color']) && $cssData['search_border_color'] !== '') ? $cssData['search_border_color'] : ''); ?> !important;
    border-radius: 0 <?php echo esc_attr((isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23); ?>px <?php echo esc_attr((isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23); ?>px 0;
    border-left: hidden !important;
    text-align: left;
    cursor: pointer;
    color: <?php echo esc_attr((isset($cssData['search_icon_color']) && $cssData['search_icon_color'] !== '') ? $cssData['search_icon_color'] : '#171717'); ?>;
    font-size: <?php echo esc_attr((isset($cssData['search_icon_size_number']) && $cssData['search_icon_size_number']  !== '') ? $cssData['search_icon_size_number'] : 12); ?>px;
    background: <?php echo esc_attr((isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'); ?>;
  }
  .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-button:hover,
  .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main .afaq-6310-search-template-button:hover  {
    color: <?php echo esc_attr((isset($cssData['search_icon_hover_color']) && $cssData['search_icon_hover_color'] !== '') ? $cssData['search_icon_hover_color'] : '#171717'); ?>;
  }
  @media only screen and (max-width: 600px) {
    .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main,
    .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-search-template-main  {
      width: 100%;
    }
  }
  <?php    
    }
    //Category Template Start
    if(isset($cssData['category_template_show_hide'])){
      $categoryTemplate = (isset($cssData['selected_category_template']) && $cssData['selected_category_template'] != '') ? $cssData['selected_category_template'] : 'category-template-01'; 
      $category_per_row = isset($cssData['category_per_row']) ? $cssData['category_per_row'] : 2;
      if($categoryTemplate == 'category-template-01'){
?>
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> {
          float: left;
          width: 100%;
          font-family: sans-serif;
          margin-bottom: 10px;
          display: flex;
          flex-wrap: wrap;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper  {
          float: left;
          width: calc(<?php echo esc_attr(100/$category_per_row) ?>% - 10px);
          border-bottom: <?php echo esc_attr((isset($cssData['category_01_border_size_number']) && $cssData['category_01_border_size_number']  !== '') ? $cssData['category_01_border_size_number'] : 0); ?>px solid <?php echo esc_attr((isset($cssData['category_01_border_color']) && $cssData['category_01_border_color'] !== '') ? $cssData['category_01_border_color'] : '#80808085'); ?>;
          cursor: pointer;
          transition: .5s;
          margin-top: 15px;
        }
        <?php
          for($x = 1; $x <= $category_per_row - 1; $x++){
            echo ".afaq-6310-faq-for-elementor-".esc_attr($ids)." .afaq-6310-category-template-".esc_attr($ids)." .afaq-6310-category-template-".esc_attr($ids)."-wrapper:nth-child({$category_per_row}n+{$x}), .afaq-6310-faq-for-elementor-special-".esc_attr($ids)." .afaq-6310-category-template-".esc_attr($ids)." .afaq-6310-category-template-".esc_attr($ids)."-wrapper:nth-child({$category_per_row}n+{$x}) {
              margin-right: ".(($category_per_row * 10) / ($category_per_row - 1))."px;
            }";
          }
        ?>
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover, 
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover, 
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo $ids; ?> .afaq-6310-category-wrapper-active {
          background-color: <?php echo esc_attr((isset($cssData['category_01_title_background_hover_color']) && $cssData['category_01_title_background_hover_color'] !== '') ? $cssData['category_01_title_background_hover_color'] : '#ededed'); ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon {
          width: 80px;
          height: calc(80px - 20px);
          display: flex;
          justify-content: center;
          float: left;
          padding: 10px 0px;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i, 
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i, 
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i {
          color: <?php echo esc_attr((isset($cssData['category_icon_hover_color']) && $cssData['category_icon_hover_color'] !== '') ? $cssData['category_icon_hover_color'] : '#00b4b3'); ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-left-icon i {
          display: inline-block;
          text-align: center;
          line-height: <?php echo esc_attr((isset($cssData['category_01_icon_font_size_number']) && $cssData['category_01_icon_font_size_number']  !== '') ? $cssData['category_01_icon_font_size_number'] : 35); ?>px;
          ;
          font-size: <?php echo esc_attr((isset($cssData['category_01_icon_font_size_number']) && $cssData['category_01_icon_font_size_number']  !== '') ? $cssData['category_01_icon_font_size_number'] : 35); ?>px;
          color: <?php echo esc_attr((isset($cssData['category_01_icon_color']) && $cssData['category_01_icon_color'] !== '') ? $cssData['category_01_icon_color'] : '#00b4b3'); ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-content-wrapper,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-content-wrapper {
          float: left;
          width: calc(100% - 80px);
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title,
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title {
          color: <?php echo esc_attr((isset($cssData['category_01_title_hover_color']) && $cssData['category_01_title_hover_color'] !== '') ? $cssData['category_01_title_hover_color'] : '#5bd6f5'); ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-title {
          float: left;
          font-weight: <?php echo esc_attr($cssData['category_01_title_font_weight']) ?>;
          line-height: <?php echo esc_attr((isset($cssData['category_01_title_line_height_number']) && $cssData['category_01_title_line_height_number'] !=='') ? $cssData['category_01_title_line_height_number'] : 14); ?>px; 
          width: 100%;         
          padding: 10px 9px 10px;
          font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['category_01_title_font_family'])); ?>; 
          font-size: <?php echo esc_attr((isset($cssData['category_01_title_font_size_number_number']) && $cssData['category_01_title_font_size_number_number']  !== '') ? $cssData['category_01_title_font_size_number_number'] : 16); ?>px;
          color: <?php echo esc_attr((isset($cssData['category_01_title_color']) && $cssData['category_01_title_color'] !== '') ? $cssData['category_01_title_color'] : '#dbf0e4'); ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description,
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-wrapper:hover .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?> .afaq-6310-category-wrapper-active .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description  {
          color: <?php echo esc_attr((isset($cssData['category_01_description_hover_color']) && $cssData['category_01_description_hover_color'] !== '') ? $cssData['category_01_description_hover_color'] : '#4f676e') ?>;
        }
        .afaq-6310-faq-for-elementor-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description,
        .afaq-6310-faq-for-elementor-special-<?php echo esc_attr($ids); ?> .afaq-6310-category-template-<?php echo esc_attr($ids); ?>-description {
          float: left;
          width: 100%;
          padding: 0 8px 10px;
          font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['category_01_description_font_family'])); ?>;
          font-weight: <?php echo esc_attr($cssData['category_01_description_font_weight']) ?>;
          font-size: <?php echo esc_attr((isset($cssData['category_01_description_font_size_number_number']) && $cssData['category_01_description_font_size_number_number']  !== '') ? $cssData['category_01_description_font_size_number_number'] : 13); ?>px;
          line-height: <?php echo esc_attr((isset($cssData['category_01_description_line_height_number_number']) && $cssData['category_01_description_line_height_number_number']  !== '') ? $cssData['category_01_description_line_height_number_number'] : 20); ?>px;
          color: <?php echo esc_attr((isset($cssData['category_01_description_color']) && $cssData['category_01_description_color'] !== '') ? $cssData['category_01_description_color'] : '#8a8a8a') ?>;
        }
<?php
      } else if($categoryTemplate == 'category-template-02'){
      } else if($categoryTemplate == 'category-template-03'){   
      }
    }
  ?>
  @media screen and (max-width: 767px) {
    .afaq-6310-col-2,
    .afaq-6310-col-3,
    .afaq-6310-col-4,
    .afaq-6310-col-5,
    .afaq-6310-col-6 {
      width: 100%;
      margin-right: 0;
    }
  }
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignleft{
  margin-right: 15px;
}
.afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-content-feature img.alignright{
  margin-left: 15px;
}
 /* button section start  */
 .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-read-more-button {
    float: left;
    width: 100%;
    text-align: <?php echo esc_attr($cssData['button_align']) ?>;
    margin-top: <?php echo esc_attr($cssData['button_margin_top_number']) ?>px;
    margin-bottom: <?php echo esc_attr($cssData['button_margin_bottom_number']) ?>px;
  }
  .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-read-more-button>a {
    font-family: <?php echo esc_attr(str_replace("+", " ", $cssData['button_font_family'])); ?>;
    font-size: <?php echo esc_attr($cssData['button_font_size_number']) ?>px;
    font-weight: <?php echo esc_attr($cssData['button_font_weight']) ?>;
    display: inline-block;
    color: <?php echo esc_attr($cssData['button_font_color']) ?>;
    background-color: <?php echo esc_attr($cssData['button_background_color']) ?> !important;
    border-radius: <?php echo esc_attr($cssData['button_border_radius_number']) ?>px;
    cursor: pointer;
    text-decoration: none !important;
    text-transform: <?php echo esc_attr($cssData['button_text_transform']) ?>;
    line-height: <?php echo esc_attr(ceil($cssData['button_height_number'])); ?>px;
    width: <?php echo esc_attr($cssData['button_width_number']) ?>px;
    text-align: center;
    border: <?php echo esc_attr($cssData['button_border_width']) ?> solid <?php echo esc_attr($cssData['button_border_color']) ?>;
  }
  .afaq-6310-faq-template-<?php echo esc_attr($ids); ?>-read-more-button>a:hover {
    background-color: <?php echo esc_attr($cssData['button_background_hover_color']) ?> !important;
    color: <?php echo esc_attr($cssData['button_font_hover_color']) ?>;
    border: <?php echo esc_attr($cssData['button_border_width']) ?> solid <?php echo esc_attr($cssData['button_border_hover_color']) ?>;
  }
  .afaq-6310-faq-for-elementor .alignleft{
    float: left !important;
  }
  .afaq-6310-faq-for-elementor .alignright{
    float: right !important;
  }
</style>


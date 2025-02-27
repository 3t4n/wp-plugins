<?php
/**
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public/partials
 */

?>

<?php $config_options = get_option('florist-one-flower-delivery'); 

  $navStyle = (isset($config_options['choose_colors'])) ? ($config_options['choose_colors'] === 0 ? "" : "custom")  : "";
  $nav_color_1 = ($navStyle != "custom") ? '#000000' : $config_options['navigation_color'];
  $nav_color_2 = ($navStyle != "custom") ? '#000000' : $config_options['navigation_hover_color'];
  $nav_text = ($navStyle != "custom") ? '#ffffff' : $config_options['navigation_text_color'];
  $nav_hover = ($navStyle != "custom") ? '#000000' :$config_options['navigation_hover_text_color'];
  $btn_1 = ($navStyle != "custom") ? '#ffffff' : $config_options['button_color'];
  $btn_2 = ($navStyle != "custom") ? '#ffffff' : $config_options['button_hover_color'];
  $btn_hover = ($navStyle != "custom") ? '#000000' : $config_options['button_hover_text_color'];
  $btn_text = ($navStyle != "custom") ? 'rgba(0,0,0,.75)' : $config_options['button_text_color'];
  $link_text = ($navStyle != "custom") ? '#000000' : $config_options['link_color'];
  $header_color = ($navStyle != "custom") ? '#000000' : $config_options['heading_color'];
  $body_text = ($navStyle != "custom") ? '#444444' : $config_options['text_color'];
  
?>
  
  <style>

/* 
  .florist-one-flower-delivery-ssl-warning {
    display:none;
  }
 */
  .florist-one-flower-delivery {
    color: <?php echo esc_html($body_text); ?>
  }
  .bootstrap-fhws-obituaries-container a, .bootstrap-fhws-obituaries-container a:link, .bootstrap-fhws-obituaries-container a:hover, .bootstrap-fhws-obituaries-container a:active, .bootstrap-fhws-obituaries-container a:visited{
    color: <?php echo esc_html($link_text); ?>;
  }
  #florist-one-flower-delivery-menu-nav .nav-link, #florist-one-flower-delivery-menu-cart-button {
     background: none;
     color: <?php echo esc_html($body_text); ?>;
  }
  #florist-one-flower-delivery-menu-nav .nav-link:hover, #florist-one-flower-delivery-menu-cart-button:hover {
    color: <?php echo esc_html($nav_hover); ?>;
  }
  #florist-one-flower-delivery-menu-nav .nav-link.active   {
    background: <?php echo esc_html($nav_color_1) ?>;
    background: -moz-linear-gradient(top, <?php echo esc_html($nav_color_1) ?> 0%, <?php echo esc_html($nav_color_2) ?> 40%, <?php echo esc_html($nav_color_2) ?> 60%, <?php echo esc_html($nav_color_1) ?> 100%);
    background: -webkit-linear-gradient(top, <?php echo esc_html($nav_color_1) ?> 0%, <?php echo esc_html($nav_color_2) ?> 40%, <?php echo esc_html($nav_color_2) ?> 60%, <?php echo esc_html($nav_color_1) ?> 100%);
    background: linear-gradient(to bottom, <?php echo esc_html($nav_color_1) ?> 0%, <?php echo esc_html($nav_color_2) ?> 40%, <?php echo esc_html($nav_color_2) ?> 60%, <?php echo esc_html($nav_color_1) ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_html($nav_color_1) ?>', endColorstr='<?php echo esc_html($nav_color_2) ?>',GradientType=0 );
    color: <?php echo esc_html($nav_text) ?>;
    text-decoration: none;
  }
  
  #florist-one-flower-delivery-view-modal .btn,
  .florist-one-flower-delivery-button .btn,
  a.large-button,
  a.large-button:link,
  a.large-button:visited,
  a.large-button:active,
  input.large-button,
  .florist-one-flower-delivery .btn,
  a.florist-one-flower-delivery-button:link,
  a.florist-one-flower-delivery-button:visited,
  a.florist-one-flower-delivery-button:active {
    background: <?php echo esc_html($btn_1) ?>;
    background: -moz-linear-gradient(top,  <?php echo esc_html($btn_1) ?> 0%, <?php echo esc_html($btn_2) ?> 40%, <?php echo esc_html($btn_2) ?> 60%, <?php echo esc_html($btn_1) ?> 100%);
    background: -webkit-linear-gradient(top,  <?php echo esc_html($btn_1) ?> 0%, <?php echo esc_html($btn_2) ?> 40%, <?php echo esc_html($btn_2) ?> 60%, <?php echo esc_html($btn_1) ?> 100%);
    background: linear-gradient(to bottom,  <?php echo esc_html($btn_1) ?> 0%, <?php echo esc_html($btn_2) ?> 40%, <?php echo esc_html($btn_2) ?> 60%, <?php echo esc_html($btn_1) ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_html($btn_1) ?>', endColorstr='<?php echo esc_html($btn_2) ?>',GradientType=0 );
    color: <?php echo esc_html($btn_text) ?>;
    text-decoration: none;
  }
  
  ul.florist-one-flower-delivery-menu-desktop-menu a:hover,
  div.florist-one-flower-delivery-menu-mobile-menu .slicknav_menu .slicknav_nav a:hover,
  div.florist-one-flower-delivery-menu-cart:hover {
    background: <?php echo esc_html($nav_color_2) ?>;
    background: -moz-linear-gradient(top, <?php echo esc_html($nav_color_2) ?> 0%, <?php echo esc_html($nav_color_1) ?> 40%, <?php echo esc_html($nav_color_1) ?> 60%, <?php echo esc_html($nav_color_2) ?> 100%);
    background: -webkit-linear-gradient(top, <?php echo esc_html($nav_color_2) ?> 0%, <?php echo esc_html($nav_color_1) ?> 40%, <?php echo esc_html($nav_color_1) ?> 60%, <?php echo esc_html($nav_color_2) ?> 100%);
    background: linear-gradient(to bottom, <?php echo esc_html($nav_color_2) ?> 0%, <?php echo esc_html($nav_color_1) ?> 40%, <?php echo esc_html($nav_color_1) ?> 60%, <?php echo esc_html($nav_color_2) ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_html($nav_color_2) ?>', endColorstr='<?php echo esc_html($nav_color_1) ?>',GradientType=0 );
    color: <?php echo esc_html($nav_hover) ?>;
  }
  
  #florist-one-flower-delivery-view-modal .btn:hover,
  .florist-one-flower-delivery .btn:hover,
  a.florist-one-flower-delivery-button:hover,
  a.large-button:hover,
  input.large-button:hover,
  a.florist-one-flower-delivery-button:hover  {
    background: <?php echo esc_html($btn_2) ?>;
    background: -moz-linear-gradient(top,  <?php echo esc_html($btn_2) ?> 0%, <?php echo esc_html($btn_1) ?> 40%, <?php echo esc_html($btn_1) ?> 60%, <?php echo esc_html($btn_2) ?> 100%);
    background: -webkit-linear-gradient(top,  <?php echo esc_html($btn_2) ?> 0%, <?php echo esc_html($btn_1) ?> 40%, <?php echo esc_html($btn_1) ?> 60%, <?php echo esc_html($btn_2) ?> 100%);
    background: linear-gradient(to bottom,  <?php echo esc_html($btn_2) ?> 0%, <?php echo esc_html($btn_1) ?> 40%, <?php echo esc_html($btn_1) ?> 60%, <?php echo esc_html($btn_2) ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_html($btn_2) ?>', endColorstr='<?php echo esc_html($btn_1) ?>',GradientType=0 );
    color: <?php echo esc_html($btn_hover) ?>;
    text-decoration: none;
  }

  ul.florist-one-flower-delivery-menu-desktop-menu a:link, ul.florist-one-flower-delivery-menu-desktop-menu a:visited, ul.florist-one-flower-delivery-menu-desktop-menu a:active, div.florist-one-flower-delivery-menu-cart a{
    text-decoration: none;
    color: <?php echo esc_html($nav_text) ?>;
  }
  ul.florist-one-flower-delivery-menu-desktop-menu a:hover, div.florist-one-flower-delivery-menu-cart a:hover{
    text-decoration: none;
    color: <?php echo esc_html($nav_hover) ?>;
  }
  .florist-one-flower-delivery-loading:not(:required):after {
   -webkit-box-shadow: <?php echo esc_html($nav_color_1) ?> 1.5em 0 0 0, <?php echo esc_html($nav_color_1) ?> 1.1em 1.1em 0 0, <?php echo esc_html($nav_color_1) ?> 0 1.5em 0 0, <?php echo esc_html($nav_color_1) ?> -1.1em 1.1em 0 0, <?php echo esc_html($nav_color_1) ?> -1.5em 0 0 0, <?php echo esc_html($nav_color_1) ?> -1.1em -1.1em 0 0, <?php echo esc_html($nav_color_1) ?> 0 -1.5em 0 0, <?php echo esc_html($nav_color_1) ?> 1.1em -1.1em 0 0;
   box-shadow: <?php echo esc_html($nav_color_1) ?> 1.5em 0 0 0, <?php echo esc_html($nav_color_1) ?> 1.1em 1.1em 0 0, <?php echo esc_html($nav_color_1) ?> 0 1.5em 0 0, <?php echo esc_html($nav_color_1) ?> -1.1em 1.1em 0 0, <?php echo esc_html($nav_color_1) ?> -1.5em 0 0 0, <?php echo esc_html($nav_color_1) ?> -1.1em -1.1em 0 0, <?php echo esc_html($nav_color_1) ?> 0 -1.5em 0 0, <?php echo esc_html($nav_color_1) ?> 1.1em -1.1em 0 0;
  }
  .bootstrap-fhws-obituaries-container h1, .bootstrap-fhws-obituaries-container h2, .bootstrap-fhws-obituaries-container h3, .bootstrap-fhws-obituaries-container h4{
    color: <?php echo esc_html($header_color) ?>;
  }
  #florist-one-flower-delivery-loader {
   color: <?php echo esc_html($header_color) ?>;
  }
  
  <?php if (esc_html($navStyle) != "custom") {  ?>
    
    .f1fd_primary,
    .fd_one_button_primary
     {
      background:#000000 !important;
      color:#ffffff !important;
    }
    .f1fd_secondary,
    .fd_one_button_secondary
     {
      background:#ffffff !important;
      color:#000000 !important;
    }
    .f1fd_secondary:hover,
    .fd_one_button_secondary:hover 
    {
      border:1px #222222 solid !important;
    }
    .florist-one-flower-delivery-menu-link-more {
      border:1px #222222 solid !important;
    }
    .bootstrap-fhws-obituaries-container .nav-link:focus, .f1fd-size-ctl:focus,
    .bootstrap-fhws-obituaries-container a:focus,
    .bootstrap-fhws-obituaries-container button:focus,
    .bootstrap-fhws-obituaries-container input:focus,
    .bootstrap-fhws-obituaries-container textarea:focus {
      outline:none !important;
      -moz-box-shadow:    inset 0 0 2px rgba(0,0,0,.55) !important;
      -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.55) !important;
      box-shadow:        inset 0 0 2px rgba(0,0,0,.55) !important;
      color:#000000;
    } 
    /* active styling */
    #florist-one-flower-delivery-menu-nav .nav-link.active, .f1fd-size-ctl.active {
      position:relative !important;
      color:#000000;
      background:none;
    }

    #florist-one-flower-delivery-menu-nav .nav-link.active:after, .f1fd-size-ctl.active:after {
      content:'';
      position:absolute;
      width:calc(100% - 14px);
      height:1px;
      background:#000;
      left:7px;
      bottom:6px;
    }
    
    .f1fd-size-ctl.active:after {
      width:calc(100% - 6px);
      bottom:0;
      left:3px;
    }
  
  <?php } ?>
    
  
  </style>

  <div class="florist-one-flower-delivery-deceased-display" id="florist-one-flower-delivery-deceased-display">
    <div class="florist-one-flower-delivery-deceased-display-photo" id="florist-one-flower-delivery-deceased-display-photo"></div>
    <div class="florist-one-flower-delivery-deceased-display-name" id="florist-one-flower-delivery-deceased-display-name"></div>
  </div>

  <?php
    if ($config_options['affiliate_id'] == 0) {
        echo '<div class="florist-one-flower-delivery-ssl-warning">&#9888;' . __( 'A valid Florist One AffiliateID is required for the Florist One Flower Delivery plugin to work!', 'flower-delivery-by-florist-one' ) . '</div>';
    }

    ?>

<div class="florist-one-flower-delivery-menu" id="florist-one-flower-delivery-menu">

  <?php

    $categories = array();

    if ($config_options['products'] == 0) {
        // special occasions / holidays added to the list first
        if (($config_options['products_cm'] == 1) && ((date('m') == 12 && date('d') >= 15) || (date('m') == 12 && date('d') <= 26))) {
            array_push($categories, array('short' => 'cm', 'long' => __( 'Christmas', 'flower-delivery-by-florist-one' )));
        }
        if (($config_options['products_ea'] == 1) && ((date('m') == 03 && date('d') >= 15) || (date('m') == 04 && date('d') <= 30))) {
            array_push($categories, array('short' => 'ea', 'long' => __( 'Easter', 'flower-delivery-by-florist-one' )));
        }
        if (($config_options['products_md'] == 1) && ((date('m') == 04 && date('d') >= 20) || (date('m') == 05 && date('d') <= 15))) {
            array_push($categories, array('short' => 'md', 'long' => __( 'Mother\'s Day', 'flower-delivery-by-florist-one' )));
        }
        if (($config_options['products_tg'] == 1) && ((date('m') == 11 && date('d') >= 01) || (date('m') == 11 && date('d') <= 30))) {
            array_push($categories, array('short' => 'tg', 'long' => __( 'Thanksgiving', 'flower-delivery-by-florist-one' )));
        }
        if (($config_options['products_vd'] == 1) && ((date('m') == 01 && date('d') >= 15) || (date('m') == 02 && date('d') <= 15))) {
            array_push($categories, array('short' => 'vd', 'long' => __( 'Valentine\'s Day', 'flower-delivery-by-florist-one' )));
        }
        // regular products
        array_push($categories, array('short' => 'ao', 'long' => __( 'Everyday', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'gw', 'long' => __( 'Get Well', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'nb', 'long' => __( 'New Baby', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'ty', 'long' => __( 'Thank You', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'bd', 'long' => __( 'Birthday', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'lr', 'long' => __( 'Love &amp; Romance', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'an', 'long' => __( 'Anniversary', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'sy', 'long' => __( 'Funeral &amp; Sympathy', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'v', 'long' => __( 'Vase Arrangements', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'p', 'long' => __( 'Plants', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'b', 'long' => __( 'Balloons', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'r', 'long' => __( 'Roses', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'c', 'long' => __( 'Centerpieces', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'o', 'long' => __( 'One Sided Arrangements', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'x', 'long' => __( 'Fruit Baskets', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'pt', 'long' => __( 'Plant Trees', 'flower-delivery-by-florist-one' )));
    } else {
        // funeral & sympathy products
        array_push($categories, array('short' => 'pt', 'long' => __( 'Plant Trees', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fa', 'long' => __( 'Table Arrangements', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fb', 'long' => __( 'Baskets', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fs', 'long' => __( 'Sprays', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fp', 'long' => __( 'Plants', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fl', 'long' => __( 'Inside Casket', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fw', 'long' => __( 'Wreaths', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fh', 'long' => __( 'Hearts', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fx', 'long' => __( 'Crosses', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fc', 'long' => __( 'Casket Sprays', 'flower-delivery-by-florist-one' )));
        array_push($categories, array('short' => 'fu', 'long' => __( 'Urn Arrangements', 'flower-delivery-by-florist-one' )));
        // funeral fruit baskets if enabled
        if ($config_options['products_fb'] == 1) {
            array_push($categories, array('short' => 'x', 'long' => __( 'Fruit Baskets', 'flower-delivery-by-florist-one' )));
        }
    }

  ?>
</div>
<div class="row mb-4">  
  <div class="flex-row d-flex justify-content-end text-dark mt-1 mb-1"><!-- start of text size options-->
      <span class="d-flex align-items-center me-2"><?php esc_html_e( 'Size:', 'flower-delivery-by-florist-one' ) ?></span>
      <a class="active px-1 d-flex f1fd-size-ctl" id="f1fd-text-size-base" tabindex="0" role="button" >
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
          <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z"/>
        </svg>
      </a>      
      <a class="px-1 d-flex align-items-center f1fd-size-ctl justify-content-center" id="f1fd-text-size-zoom1" tabindex="0" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
          <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z"/>
        </svg>
      </a>
      <a class="px-1 d-flex align-items-center f1fd-size-ctl justify-content-center" id="f1fd-text-size-zoom2" tabindex="0" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-type" viewBox="0 0 16 16">
          <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z"/>
        </svg>
      </a>
  </div>
  <div class="col-12">
    <nav id="florist-one-flower-delivery-menu-nav" class="navbar navbar-expand-md p-1 navbar-light md-bg-light">
      <p class="d-sm-block d-md-none mx-auto fs-4 mb-1"><?php esc_html_e( 'Flower Menu', 'flower-delivery-by-florist-one' );?></p>
      <div class="d-md-flex justify-content-center w-100 p-0">
        <button class="navbar-toggler h-25 w-100 me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-0 flex-wrap justify-content-left text-center">
            <?php 
              $modify = ($config_options['products'] == 0) ? 1: 0;
              for ($i=0;$i<count((array)$categories);$i++) {
                $make_active = ($i == 1) ? "active" : ""; 
                if  ($config_options['products'] != 0){
                  $show_tree = (isset($config_options['show_trees'])) ? ($config_options['show_trees'] == 0 ? '_show' : '') : "_show";
                } else {
                  $show_tree = '';
                }
              
                if(esc_html($categories[$i]['short']) =="pt"){
                  echo '<li class="nav-item m-1 border"><a href="#" id="florist-one-flower-delivery-menu-link-'. (0) .'" class="nav-link florist-one-flower-delivery-menu-plant-a-tree-link" data-page="1" data-category="'. esc_attr($categories[$i]['short']) . esc_attr($show_tree) .'">'.esc_attr($categories[$i]['long']).'</a></li>';
                } else {
                  echo '<li class="nav-item m-1 border"><a href="#" id="florist-one-flower-delivery-menu-link-'. ($i + esc_attr($modify)) .'" class="nav-link florist-one-flower-delivery-menu-link " data-page="1" data-category="'. esc_attr($categories[$i]['short']) .'">'. esc_attr($categories[$i]['long']) .'</a></li>';
                }
              }
            ?>
            <li class="nav-item m-1 border"><a href="#" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal"  id="florist-one-flower-delivery-menu-link-99" class="nav-link florist-one-flower-delivery-menu-customer-service-link" data-category=""><?php esc_html_e( 'Customer Service', 'flower-delivery-by-florist-one' ); ?></a></li>
          </ul>
            </div>
            <button type="button" id="florist-one-flower-delivery-menu-cart-button" data-bs-toggle="modal" data-bs-target="#florist-one-flower-delivery-view-modal" href="#" class="florist-one-flower-delivery-menu-cart-button btn mx-auto border-0 p-1  nav-link  mt-1 p-2  h-100 mb-auto ">
              <span id="florist-one-cart-count" class="rounded-circle badge bg-dark"><?php echo esc_attr($cart_count);?><span class="visually-hidden">Items in Cart</span></span>
                <svg viewBox="0 0 24 24" width="36" height="36" stroke="currentColor" stroke-width="2" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <p class="lh-1 text-muted text-center"><?php esc_html_e( 'My Cart', 'flower-delivery-by-florist-one' );?></p>
            </button>
        </div>
      </div>
    </nav>
  </div> 
</div>
<div class="bootstrap-fhws-obituaries-container bootstrap-fhws-obituaries-container-1"><!--modal container-->
  <div class="modal fhws-modal fade" id="florist-one-flower-delivery-view-modal" tabindex="-1" aria-labelledby="florist-one-flower-delivery-view-modal-label" aria-hidden="true" data-bs-backdrop="false" style="background-color: rgba(0, 0, 0, 0.3);">
    <div class="fhws-modal-dialog modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header py-1 border-0">
          <div class="modal-header-text"></div>
          <button type="button" class="ms-auto f1fd_secondary border-0" data-bs-dismiss="modal" aria-label="Close">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </button>
        </div>
        <div class="modal-body px-4 py-0">
        </div>
<!-- 
        <div class="modal-footer justify-content-end p-0">
          <span id="florist-one-flower-delivery-continue-show-modal" class="m-0 p-0">
            <button type="button" id="florist-one-flower-delivery-view-modal-close" class="border f1fd_secondary btn btn-lg m-1" data-bs-dismiss="modal"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg></button>
          </span>
          <span id="florist-one-flower-delivery-checkout-show-modal" class="m-0 p-0">
            <a href="#" class="florist-one-flower-delivery-checkout f1fd_primary btn btn-lg m-1" data-bs-dismiss="modal" data-page="4" data-code=""><?php esc_html_e( 'Checkout', 'flower-delivery-by-florist-one' ); ?><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg></a>
          </span>
        </div>
 -->
      </div>
    </div>
  </div>
</div><!-- end container -->  




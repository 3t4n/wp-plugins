<style type="text/css">
    .owl-item .item:hover {
        cursor: pointer;
    }
    /*
     General style for the slider
    */
    .outer_wrap-<?php echo $random_adl_rec_post_wrapper_id; ?>{
        position: relative;
        margin-bottom: 70px;
    }
    .header-<?php echo $random_adl_rec_post_wrapper_id; ?>{
        position: relative;
    }

    /*SLider title */
    .header-<?php echo $random_adl_rec_post_wrapper_id; ?> h1.a-rcp-title{
        text-align: center;
        margin: 5px 0;
        color: <?php echo $adl_rec_post_header_title_font_color;?>;
        font-size: <?php echo $adl_rec_post_header_title_font_size;?>;
    }
    /*post title*/
    .outer_wrap-<?php echo $random_adl_rec_post_wrapper_id; ?> h1.a-rcp-post-title a {
        font-size:<?php echo $adl_rec_post_title_font_size;?>;
        color: <?php echo $adl_rec_post_title_font_color;?>;
    }
    .outer_wrap-<?php echo $random_adl_rec_post_wrapper_id; ?> h1.a-rcp-post-title a:hover,
    .outer_wrap-<?php echo $random_adl_rec_post_wrapper_id; ?> h1.a-rcp-post-title a:visited,
    .outer_wrap-<?php echo $random_adl_rec_post_wrapper_id; ?> h1.a-rcp-post-title a:active {
        color: <?php echo $adl_rec_post_title_hover_font_color;?>;
    }
    /*
    NAVIGATION BUTTONS
    */
    .<?php echo $prevButton;?>,
    .<?php echo $nextButton;?>
     {
        position: absolute;
        top: 40%;
        background: <?php echo $adl_rec_post_nav_arrow_bg_color;?>;
        z-index: 9999;
        width: 42px;
        height: 39px;
        border-radius: 50%;
        color: <?php echo $adl_rec_post_nav_arrow_color;?>;
        outline: none;
        border: none;
        webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }
    .<?php echo $nextButton;?> {
        right: -1.6%;
    }
    .<?php echo $prevButton;?> {
        left: -1.6%;
    }

    .<?php echo $prevButton; ?>:hover,
    .<?php echo $nextButton; ?>:hover {
        background: <?php echo $adl_rec_post_nav_arrow_bg_hover_color;?>;
        color: <?php echo $adl_rec_post_nav_arrow_hover_color;?>;
    }
    .<?php echo $prevButton;?> > i.icon-left-open-big,
    .<?php echo $nextButton;?> > i.icon-right-open-big {
        font-size: 20px;
    }

    #a-rcp-slider-wrapper-<?php echo $random_adl_rec_post_wrapper_id; ?> .a-rcp-themed{
        border-color: <?php echo $adl_rec_post_border_color ?>;
    }
    #a-rcp-slider-wrapper-<?php echo $random_adl_rec_post_wrapper_id; ?> .a-rcp-themed:hover{
        border-color: <?php echo $adl_rec_post_border_hover_color ?>;
    }
    #a-rcp-slider-wrapper-<?php echo $random_adl_rec_post_wrapper_id; ?> .a-rcp-themeb{
        border-color: <?php echo $adl_rec_post_border_color ?>;
    }
    #a-rcp-slider-wrapper-<?php echo $random_adl_rec_post_wrapper_id; ?> .a-rcp-themeb:hover{
        border-color: <?php echo $adl_rec_post_border_hover_color ?>;
    }



</style>


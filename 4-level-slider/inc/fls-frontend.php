<?php
//FRONTEND SECTION
function fls_plugin_content() {
    $background_color = get_option('fls_background_color');
    if(!$background_color) $background_color = "rgba(11, 145, 147,0.8)";
    $text_color = get_option('fls_text_color');
    if(!$text_color) $text_color = "#FFFFFF";

    $flsslider_one_title = get_option('fls_slide_1_title', 'Slide 1');
    if(!$flsslider_one_title) $flsslider_one_title = "Slider 1";
    $flsslider_one_link = get_option('flsslider_one_1_link', '#');
    if(!$flsslider_one_link) $flsslider_one_link = "#";
    $flsslider_one_img = get_option('flsslider_one_1_img');
    if(!$flsslider_one_img) $flsslider_one_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_two_title = get_option('fls_slide_2_title', 'Slide 2');
    if(!$flsslider_two_title) $flsslider_two_title = "Slider 2";
    $flsslider_two_link = get_option('flsslider_one_2_link');
    if(!$flsslider_two_link) $flsslider_two_link = "#";
    $flsslider_two_img = get_option('flsslider_one_2_img', 'http://lab.ascdev.org/example.jpg');
    if(!$flsslider_two_img) $flsslider_two_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_three_title = get_option('fls_slide_3_title', 'Slide 3');
    if(!$flsslider_three_title) $flsslider_three_title = "Slider 3";
    $flsslider_three_link = get_option('flsslider_one_3_link');
    if(!$flsslider_three_link) $flsslider_three_link = "#";
    $flsslider_three_img = get_option('flsslider_one_3_img');
    if(!$flsslider_three_img) $flsslider_three_img = "http://lab.ascdev.org/example.jpg";

    $flsslider_four_title = get_option('fls_slide_4_title');
    if(!$flsslider_four_title) $flsslider_four_title = "Slider 4";
    $flsslider_four_link = get_option('flsslider_one_4_link');
    if(!$flsslider_four_link) $flsslider_four_link = "#";
    $flsslider_four_img = get_option('flsslider_one_4_img');
    if(!$flsslider_four_img) $flsslider_four_img = "http://lab.ascdev.org/example.jpg";

    $content = "";

    $content .= '<section class="fls-slider text-center">
    <div id="background-slideshow" class="background-slideshow">
        <div class="fls-slider-controls" style="background: '.$background_color.';">
            <div class="fls-slider-name active"><a href="'.$flsslider_one_link.'" style="color: '.$text_color.';">'.$flsslider_one_title.'</a> <span class="fls-slider-number">1</span></div>
            <div class="fls-slider-name"><a href="'.$flsslider_two_link.'" style="color: '.$text_color.';">'.$flsslider_two_title.'</a> <span class="fls-slider-number">2</span></div>
            <div class="fls-slider-name"><a href="'.$flsslider_three_link.'" style="color: '.$text_color.';">'.$flsslider_three_title.'</a> <span class="fls-slider-number">3</span></div>
            <div class="fls-slider-name"><a href="'.$flsslider_four_link.'" style="color: '.$text_color.';">'.$flsslider_four_title.'</a> <span class="fls-slider-number">4</span></div>
        </div>
        <img class="current" src="'.$flsslider_one_img.'">
        <img src="'.$flsslider_two_img.'">
        <img src="'.$flsslider_three_img.'">
        <img src="'.$flsslider_four_img.'">
    </div>
    </section>';

    return $content;
}
add_shortcode('four_level_slider', 'fls_plugin_content');
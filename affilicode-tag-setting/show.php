<?php

function affilicode_show_h()
{
  if(is_page() || is_single())
  {
    if(have_posts()) : while (have_posts()) : the_post();
    $show_h_tag = get_post_meta(get_the_ID(), "affilicode_tag_h", true);
    $show_h_decode = wp_specialchars_decode($show_h_tag, ENT_QUOTES);
    echo $show_h_decode;
    endwhile; endif;
    rewind_posts();
  }
}

function affilicode_show_b()
{
  if(is_page() || is_single())
  {
    if(have_posts()) : while (have_posts()) : the_post();
    $show_b_tag = get_post_meta(get_the_ID(), "affilicode_tag_b", true);
    $show_b_decode = wp_specialchars_decode($show_b_tag, ENT_QUOTES);
    echo $show_b_decode;
    endwhile; endif;
    rewind_posts();
  }
}
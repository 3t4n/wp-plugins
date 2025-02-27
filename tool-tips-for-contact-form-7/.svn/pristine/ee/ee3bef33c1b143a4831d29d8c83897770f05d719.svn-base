<?php
function ttfcf7_tooltips( $atts, $content = null){

ob_start();
   $question_img = get_option('question_img','question_1.png');
    ?>  
      <span class="mytooltips" custom_shortcode="<?php echo $content; ?>" data-tippy-placement="auto" data-tippy-maxWidth="<?php echo esc_attr(get_option('max_width','350')); ?>" data-tippy-arrow="<?php echo esc_attr(get_option('box_arrow',"true")); ?>" data-tippy-trigger="mouseenter click" data-tippy-offset="<?php echo esc_attr(get_option('box_offset','[0,10]')); ?>">
        <img src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/<?php echo esc_attr($question_img);?>">
     </span>
<?php
$output= ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('mytooltips','ttfcf7_tooltips');
add_filter( 'wpcf7_form_elements', 'do_shortcode' );

function ttfcf7_tooltips_style() {
   $ttbg_color = get_option('ttbg_color','#333');
   $tttext_color = get_option('tttext_color','#ffffff');
   ?>
   <style type="text/css">
      .tippy-box {
         background-color: <?php echo esc_attr($ttbg_color); ?>;
         color: <?php echo esc_attr($tttext_color); ?>;
      }
      .tippy-arrow {
         color: <?php echo esc_attr($ttbg_color); ?>;
      }
   </style>
   <?php
}
add_action( 'wp_footer', 'ttfcf7_tooltips_style' );
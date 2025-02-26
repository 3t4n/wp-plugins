<?php

$main_template_file = plugin_dir_path( __FILE__ )."../../templates/front_templates/main/".$front['main']['list_main_template'];
  $item_template_file = plugin_dir_path( __FILE__ )."../../templates/front_templates/item/".$front['main']['list_item_template'];

$main_template = file_get_contents($main_template_file);
  $item_template = file_get_contents($item_template_file);
  
  //Main Replacing
  $main_template = str_replace("[MAIN_WIDTH]", sanitize_text_field($front['main']['list_width']), $main_template);
  $main_template = str_replace("[MAIN_HEIGHT]", sanitize_text_field($front['main']['list_height']), $main_template);
  $main_template = str_replace("[ITEMS_CONTAINER]", sanitize_text_field($front['main']['list_items_container']), $main_template);
  $main_template = str_replace("[MAIN_CONTAINER]", sanitize_text_field($front['main']['list_main_container']), $main_template);
  
  $output = ""; $swp_template = ""; $num = 0;

  foreach ($front['items'] as $key=>$item)
    {
    $num++;
    $swp_template = $item_template;
      //Item Replacing
      $swp_template = str_replace("[ITEM_URL]", esc_url($item['item_url']), $swp_template);
      
      $swp_text_field = str_replace("'", "\'", htmlspecialchars(stripslashes($item['item_text'])));
      $swp_template = str_replace("[ITEM_TEXT]", sanitize_text_field($swp_text_field), $swp_template);
      
      $swp_template = str_replace("[ITEM_IMAGE]", esc_url($item['item_image']), $swp_template);
      $swp_template = str_replace("[ITEM_WIDTH]", sanitize_text_field($item['item_width']), $swp_template);
      $swp_template = str_replace("[ITEM_HEIGHT]", sanitize_text_field($item['item_height']), $swp_template);
      
      if (!array_key_exists('item_styles',$item))$item['item_styles'] = "";
      $swp_template = str_replace("[ITEM_STYLES]", sanitize_text_field($item['item_styles']), $swp_template);
      
      if (!array_key_exists('item_classes',$item))$item['item_classes'] = "";
      $swp_template = str_replace("[ITEM_CLASSES]", sanitize_text_field($item['item_classes']), $swp_template);
      
      $swp_template = str_replace("[ITEM_COLOR]", sanitize_text_field($item['item_color']), $swp_template);
      $swp_template = str_replace("[ITEM_BGCOLOR]", sanitize_text_field($item['item_bgcolor']), $swp_template);
      $swp_template = str_replace("[ITEM_NUM]", $num, $swp_template);
      $swp_template = str_replace("\n", " ", $swp_template);
      $swp_template = str_replace("\r", " ", $swp_template);
      
      $output .= "'".$swp_template."',";
    }
    $output = substr($output, 0 , -1);
    
    //Making sting of arguments of equation
    $koefs = str_replace("***", " ,", "{".$front['main']['list_equation_koef']."}");
    $koefs = str_replace("**", ":", $koefs);
    
    $parent_params = $front['main']['list_width'].", ".$front['main']['list_height'];
?>
  <?php echo $main_template; ?>

<style>
<?php if (isset($front['slider']))echo stripslashes($front['slider']['apply_classes']); ?>
</style>
<script>

jQuery(function($) {

if (window.animated_al_lists === undefined) window.animated_al_lists = [];

window.animated_al_lists.push($.fn.animated_al_list_init_setup({container:'.<?php echo $front['main']['list_items_container']; ?>',
  equation:'<?php echo $front['main']['list_equation']; ?>',
  koefs:<?php echo $koefs; ?>, width:<?php echo $front['main']['list_width']; ?>, height:<?php echo $front['main']['list_height']; ?>,
  items_src:[<?php echo $output; ?>], left_offset:<?php echo $front['main']['list_offset_left']; ?>, 
  top_offset:<?php echo $front['main']['list_offset_top']; ?>, r:<?php echo $front['main']['radius_first_last_elem']; ?>,
  side_moving_fl_elem:<?php echo $front['main']['side_of_moving_first_last']; ?>,
  duration_effect:<?php echo $front['main']['list_duration_effect']; ?>, duration:<?php echo $front['main']['list_duration']; ?>,
  list_effect:'<?php echo $front['main']['list_effect']; ?>', list_easing:'<?php echo $front['main']['list_easing']; ?>',
  parent_params:[<?php echo $parent_params; ?>], fullwidth:<?php echo $front['main']['list_fullwidth']; ?>,
  main_container:'.<?php echo $front['main']['list_main_container']; ?>', list_visible_number:<?php echo $front['main']['list_visible_number']; ?>})  );

    $(window).on("blur focus", function(e) {

    var prevType = $(this).data("prevType");

        switch (e.type) {
            case "blur":
            window.animated_al_lists_blur = true;
            $.each(window.animated_al_lists, function (i, v) {
                v.animate.stop();
            });
                break;
            case "focus":
            if (window.animated_al_lists_blur)
              {
            $.each(window.animated_al_lists, function(i, v){
                v.animate.start();
                });
                window.animated_al_lists_blur = false;
              }
                break; 
        }

      $(this).data("prevType", e.type);
    });

    $( window ).on("resize", function() {
       $.each(window.animated_al_lists, function (i, v) {
        v.animate.resize();
       });
    });

      if (animated_al_lists_once_execute === undefined) 
        {
          $( window ).trigger("resize");
            var animated_al_lists_once_execute = true;
        }


  });
</script>

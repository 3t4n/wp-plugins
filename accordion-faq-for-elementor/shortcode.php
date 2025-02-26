<?php
global $wpdb;
$style_table = $wpdb->prefix . 'afaq_6310_style';
$icon_table = $wpdb->prefix . 'afaq_6310_icons';
$faq_table = $wpdb->prefix . 'afaq_6310_faq';

$styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
if(!$styledata) return;
$css = explode("!!##!!", esc_attr($styledata['css']));
$key = explode(",", $css[0]);
$value = explode("||##||", $css[1]);

$tempData = array_combine($key, $value);
$cssData = [];
if($tempData){
   foreach($tempData as $tkey=>$tvalue){
      $cssData[$tkey] = esc_attr( $tvalue );
   }
}

$faqs_order  = explode(",", esc_attr($styledata['templateids']));
$faqs = [];
if($faqs_order){
   foreach($faqs_order as $cid){
      if($cid != ''){
         $results = $wpdb->get_row('SELECT * FROM ' . $faq_table . ' where id=' . $cid . ' ORDER BY title ASC', ARRAY_A);
         if($results){
            $faqs[] = array_map('esc_attr', $results);
          }
      }
   }
}
if(!$faqs) {
   return;
}


$category_order  = explode(",", esc_attr($styledata['categoryids']));

if (file_exists(afaq_6310_plugin_url . "output/" . esc_attr($styledata['style_name']) . ".php")) {
   $fonts = "";
   if(isset($cssData['title_font_family']) && $cssData['title_font_family']){
      $fonts = $cssData['title_font_family'];
   }
   if(isset($cssData['description_font_family']) && $cssData['description_font_family']){
      $fonts .= "|" . $cssData['description_font_family'];
   }
   if(isset($cssData['number_font_family']) && $cssData['number_font_family']){
      $fonts .= "|" . $cssData['number_font_family'];
   }
   if(isset($cssData['category_01_title_font_family']) && $cssData['category_01_title_font_family']){
      $fonts .= "|" . $cssData['category_01_title_font_family'];
   }
   if(isset($cssData['category_01_description_font_family']) && $cssData['category_01_description_font_family']){
      $fonts .= "|" . $cssData['category_01_description_font_family'];
   }
   if(isset($cssData['searce_font_family']) && $cssData['searce_font_family']){
      $fonts .= "|" . $cssData['searce_font_family'];
   }
   if(isset($cssData['button_font_family']) && $cssData['button_font_family']){
      $fonts .= "|" . $cssData['button_font_family'];
   }

   $template_id = substr(esc_attr($styledata['style_name']), -2);

   $templates = [];
    for ($i = 1; $i <= 20; $i++) {
        $templates[] = sprintf('template-%02d', $i); // %02d ensures two digits with leading zero
    }
   if (!in_array($styledata['style_name'], $templates, true)) {
      return;
   }
   
   wp_enqueue_style('afaq-6310-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('afaq-font-awesome-4-07', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
   wp_enqueue_style("afaq-6310-googlesss-font-{$ids}", "https://fonts.googleapis.com/css?family={$fonts}");

   include afaq_6310_plugin_url . "output/css/_css-{$template_id}.php";
   include afaq_6310_plugin_url . "output/css/common-output-css.php";
   echo "<div class='afaq_6310_main_template_{$ids}'>";
   include afaq_6310_plugin_url . "output/" . esc_attr($styledata['style_name']) . ".php";
   echo "</div>";

   wp_enqueue_script('afaq-6310-output', plugins_url('assets/js/afaq-6310-output.js', __FILE__), array('jquery'), TRUE);

   if ($cssData['custom_css']) {
      echo "<style type='text/css'>" . $cssData['custom_css'] . "</style>";
   }
}
else{
   echo "This template only available in pro version.";
}
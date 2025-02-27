<?php
global $wpdb;
$style_table = $wpdb->prefix . 'imh_6310_style';


$cssData = [];
if ($ids) {
   $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
   if(!$styledata) return;
   $css = explode("!!##!!", $styledata['css']);
   $key = explode(",", $css[0]);
   $value = explode("||##||", $css[1]);
   $filterKey = [];
   $filterValue = [];
   for ($i = 0; $i < count($key); $i++) {
      $filterKey[] = esc_attr($key[$i]);
   }
   for ($i = 0; $i < count($value); $i++) {
      $filterValue[] = esc_attr($value[$i]);
   }
   $cssData = array_combine($filterKey, $filterValue);
}
$jsonData = isset($cssData['json_data']) ? json_decode(stripslashes(html_entity_decode($cssData['json_data']))) : [];

wp_enqueue_style('imh-6310-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('imh-6310-font-awesome-4-07', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
wp_enqueue_style('imh-6310-owl-carousel', plugins_url('output-common-css.css', __FILE__));
include imh_6310_plugin_url . "output-css.php";
?>
<style>.imh-6310-point-icons{display: none}</style>
<div class="imh-6310-annotation-box imh-6310-annotation-box-<?php echo $ids; ?>" data-id="<?php echo $ids; ?>">
   <img src="<?php echo isset($cssData['main_image']) ? $cssData['main_image'] : '' ?>" class="imh-6310-main-image imh-6310-img"  data-imh-cls="imh-6310-main-image imh-6310-img" data-imh-value="<?php echo isset($cssData['main_image']) ? $cssData['main_image'] : '' ?>" alt="<?php echo esc_attr($styledata['name']) ?>"  />
   <?php
   if ($jsonData) {    
 
      $counter = 1;

      foreach ($jsonData as $js) {
         $jsonCode = json_encode($js);
       
            if (!$js->fontAwesomeIcon && !$js->fontAwesomeHoverIcon) {
               continue;
            }
            if (!$js->fontAwesomeIcon) {
               $fontAwesomeIcon = $js->fontAwesomeHoverIcon;
               $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
            }
            else if (!$js->fontAwesomeHoverIcon) {
               $fontAwesomeIcon = $js->fontAwesomeIcon;
               $fontAwesomeHoverIcon = $js->fontAwesomeIcon;
            } else {
               $fontAwesomeIcon = $js->fontAwesomeIcon;
               $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
            }
            $points = "                          
                <i class='{$fontAwesomeIcon} imh-6310-pin-main-img'></i>
                <i class='{$fontAwesomeHoverIcon} imh-6310-pin-hover-img'></i>              
              ";
         
         
         echo "
              <div data-id='{$counter}' data-json='{$jsonCode}' class='imh-6310-drag imh-6310-point-{$ids}-{$counter}' style='display: none'>
               <div class='imh-6310-point-icons'>
                  {$points}
               </div>
            </div>  
            ";
         imh_6310_load_templates($js, $counter, $ids);
         $pointCssCode = "
              .imh-6310-point-{$ids}-{$counter} .imh-6310-tooltip{
                background: #FFF;
                color: #000;
                font-size: 16px;
              }
            ";
       
            $pointCssCode .= "
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img {
               color: ".esc_attr($js->fontAwesomeIconColor)." !important;
               font-size:".esc_attr($js->fontAwesomIconSize)."px !important;
            }
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
               color: ".esc_attr($js->fontAwesomeIconHoverColor)." !important;
               font-size:".esc_attr($js->fontAwesomIconSize)."px !important;
            }
            ";
         wp_register_style("imh-6310-template-" . esc_attr($counter) . "-css", "");
         wp_enqueue_style("imh-6310-template-" . esc_attr($counter) . "-css");
         wp_add_inline_style("imh-6310-template-" . esc_attr($counter) . "-css", $pointCssCode);
         $counter++;
         if($counter == 7){
            break;
         }
      }
   }
 

   ?>
</div>

<?php
wp_enqueue_script('imh-6310-output', plugins_url('assets/js/main-output-file.js', __FILE__), array('jquery'), TRUE);
?>
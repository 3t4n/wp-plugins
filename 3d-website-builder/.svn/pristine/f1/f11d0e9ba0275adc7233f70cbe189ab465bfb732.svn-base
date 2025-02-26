<?php
/**
* Author : Keivan Kamali
*/

if(!defined('ABSPATH')) exit();

function wb3d_add_shortcode($attr, $content = null){

      global $wb3d_cunter0; 
      global $wb3d_html;
      global $wb3d_check_file;
      global $wb3d_version;

      if($wb3d_cunter0>0){
            return;
      }
      $wb3d_cunter0++;

      require wb3d_DIR.'admin/sql/sql_admin.php';
      global $wb3d_open_addons_A;
      wp_enqueue_script( 'wb3dewrw');


      extract( shortcode_atts(
            array(
                  'alias' => '',
            ), $attr )
      );



      global $wb3d_addons;
      global $wb3d_open_addons_A;

      global $wb3d_php_id_num;
      global $wb3d_php_id;
      global $wb3d_php_ids;
  
      $wb3d_addons[0]='img';
      $wb3d_addons[1]='panel';


      if(!isset($wb3d_check_file["img"])){
            $wb3d_check_file["img"]=-1;
      }


      if($wb3d_check_file["img"]!="img"){
            require wb3d_DIR.'includes/img/view/index.php';
            $wb3d_check_file["img"]="img";
      }

      wb3d_get_sql_data("view",$alias,($wb3d_cunter0-1));
      wb3d_enqueue_function("view");

      wp_enqueue_script( 'img-js',wb3d_plagin_URL.'includes/img/view/index.min.js?', array(), $wb3d_version, true);
  
      for ($i=0;$i<count($wb3d_open_addons_A[0]);$i++) {
            if (file_exists(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js')) {
                  wp_enqueue_script( $wb3d_open_addons_A[0][$i].'-js',wb3d_plagin_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js?', array(), $wb3d_version, true);
            }
            else if (file_exists(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js')) {
                  wp_enqueue_script( $wb3d_open_addons_A[0][$i].'-js',wb3d_plagin_Pro_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js?', array(), $wb3d_version, true);
            }
            
            if (file_exists(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css')) {
                  wp_enqueue_style( $wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css?', false,$wb3d_version);
            }
            else  if (file_exists(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css')) {
                  wp_enqueue_style( $wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_Pro_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css?', false,$wb3d_version);
            }
      }

      global $wb3d_attr_alias;  
      global $wb3d_cache;  
      $wb3d_attr_alias=$attr['alias'];
      ob_start();
      echo '<div id="wb3d_'.esc_html($wb3d_cunter0-1).'" style="min-height:300px;min-width:300px;height:100%; width:100%;z-index:9999;position: relative;top: 0px;left: 0px;">' ;
      echo '<div id="wb3d_waiting" >';
      echo '<div id="wb3d_waiting3" >';
      echo '<img src="'.esc_url(wb3d_plagin_images_URL).'1.gif">';
      echo '</div>';
      echo '</div>';

      echo '<div id="wb3dh_'.esc_html($wb3d_cunter0-1).'" style="min-height:300px;height:100%; width:100%;z-index:9999;position: absolute;top: 0px;left: 0px;margin:auto;overflow:hidden">' ;


      echo wp_kses_post($GLOBALS['wb3d_html']);
      
      echo '</div></div>';
      return ob_get_clean();

}
?>
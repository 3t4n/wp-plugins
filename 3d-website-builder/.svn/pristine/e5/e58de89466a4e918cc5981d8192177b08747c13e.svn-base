<?php
/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
if(!defined('ABSPATH')) exit();

function wb3d_create_img($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
  
      global $wb3d_html;
      $full="full-".$y;

      if($B[$full]){
            $wb3d_html.='<div id="wb3dfullscrean-'.$idm.'" class="wb3d_pointer imgbuttom wb3d_absolute"  style="background-image: url('.esc_url(wb3d_plagin_URL).'includes/img/images/full.png);background-size: 100% 100%;top:5px;left:5px;z-index:110;width:14px;height:14px"></div>';  
      }

      $img1_="img1_".$y;
      $src1=esc_html($B[$img1_]) ;

      $title_="title_".$y;
      $alt_="alt_".$y;

      if(!isset($B[$title_])){
            $B[$title_]='';
      }
      if(!isset($B[$alt_])){
            $B[$alt_]='';
      }

      $title=' title="'.esc_attr($B[$title_]).'" ';
      $alt=' alt="'.esc_attr($B[$alt_]).'" ';
      
      $wb3d_html.='<img class="wb3d_absolute" '.$title.$alt.' id="wb3dimg-'.$idm.'" src="'.$src1.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      
}


?>
<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();


function wb3d_create_ajaxwb3d($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,   $dlnum,$aa,$w_0,$name_0,$y_0){
      global $wb3d_html;
      global $wb3d_dataslide;
      global $wb3d_layers;
      global $wb3d_setting;

      $wb3d_html.='<div class="wb3d_waiting" id="wb3d_waiting'.$idm.'" >';
      $wb3d_html.='<div class="wb3d_waiting3" id="wb3d_waiting3'.$idm.'" >';
      $wb3d_html.='<img src="'.esc_url(wb3d_plagin_images_URL).'1.gif">';
      $wb3d_html.='</div>';
      $wb3d_html.='</div>';

      $tmp= "slider_".$y ;
      $sn2=$B[$tmp];
      $patern='';
      $ajax_= "ajax_".$y ;
      $ajax_=$B[$ajax_];
      $parent=0;
      if($ajax_===0){
            for( $p=0;$p<$wb3d_setting[$sn2]["num"];$p++){
                  $ff=$wb3d_dataslide[$sn2][$p][0]['slide_of_location'];
                  $aa=&$wb3d_dataslide[$sn2][$p];
                  $wb3d_layers[$sn2.'-'.$ff]=$aa[0]['layer'];
                  for( $i=0;$i<  $wb3d_layers[$sn2.'-'.$ff];$i++){
                        if($i===0){
                              wb3d_create_slider(1,$cu,$ff,$patern,$sn2,$wslide,$name,$y,$B,"view");
                        }
                        else{			
                              wb3d_createlayer(1,$cu,$sn2,$ff,$i,$aa,$wslide,$name,$y,$parent,"view");
                        }
                  }
                  $wb3d_html.='</div>';
            }
      }
      
}


?>
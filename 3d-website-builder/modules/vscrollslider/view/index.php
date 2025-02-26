<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();

function wb3d_create_vscrollslider($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y,$dlnum,$aa,$w_0,$name_0,$y_0){

      global $wb3d_html;
      $m_=' onMouseDown="mouseIsDown=true;return false" onMouseUp="mouseIsDown=false" ';

      $img_="img_".$y;
      $img2_="img2_".$y;
      $src1=$B[$img_] ;
      $src2=$B[$img2_] ;

      if($src1!=""){
            $wb3d_html.='<img class="wb3d_absolute" '.$m_. ' id="wb3de1-'.$idm.'-2"  src="'.$src1.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      $wb3d_html.='<div class="wb3d_absolute" '.$m_. ' id="wb3df-'.$idm.'-2"  >';
      if($src2!=""){
            $wb3d_html.='<img class="wb3d_pointer wb3d_absolute" '.$m_. ' id="wb3de-'.$idm.'-2"  src="'.$src2.'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';
      }
      else{
            $wb3d_html.='<div class="wb3d_pointer wb3d_absolute" '.$m_. ' id="wb3de-'.$idm.'-2"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/></div>';
      }
      $wb3d_html.='</div>';
}


?>
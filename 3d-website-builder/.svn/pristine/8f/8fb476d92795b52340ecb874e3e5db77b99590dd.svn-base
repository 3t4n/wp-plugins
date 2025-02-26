<?php 
if(!defined('ABSPATH')) exit();



function wb3d_create_afterbefore($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;

      $image1_="image1_".$y;
      $image2_="image2_".$y;

      $ver_="ver_".$y;
      $wb3d_html.='<img class="wb3d_absolute" id="wb3d20-'.$idm.'" src="'.$B[$image1_] .'"  style=" width:100%;height:100%;top:0px;left:0px;z-index:1;"/>';

      if($B[$ver_]==1){
            $wb3d_html.='<div class="wb3d_absolute"  id="wb3d21-'.$idm.'" style="height:100%;width:50%;top:0px;left:0px;z-index:2;overflow:hidden;border-right:1px solid #fff;">';
            $wb3d_html.='<img class="wb3d_absolute" id="wb3d22-'.$idm.'" src="'.$B[$image2_] .'" style="height:100%;width:200%;top:0px;left:0px;"/>';
            $wb3d_html.='</div>';
      }
      else{
            $wb3d_html.='<div class="wb3d_absolute" id="wb3d21-'.$idm.'" style="height:50%;width:100%;top:0px;left:0px;z-index:2;overflow:hidden;border-bottom:1px solid #fff;">';
            $wb3d_html.='<img class="wb3d_absolute" id="wb3d22-'.$idm.'" src="'.$B[$image2_] .'" style="height:200%;width:100%;top:0px;left:0px;"/>';
            $wb3d_html.='</div>';
      }

}


?>
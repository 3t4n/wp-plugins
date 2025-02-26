<?php 
if(!defined('ABSPATH')) exit();


function wb3d_create_screans($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;
      $wb3d_html.='<img class="wb3d_absolute"  id="wb3d0-'.$idm.'" src="'.wb3d_plagin_URL.'/images/1.png" style="z-index:1;width:100%;height:100%" />';  
      $wb3d_html.='<img class="wb3d_absolute"  id="wb3d1-'.$idm.'" src="'.wb3d_plagin_URL.'/images/2.png" style="z-index:1;width:100%;height:100%" />';  
      $wb3d_html.='<img class="wb3d_absolute"  id="wb3d2-'.$idm.'" src="'.wb3d_plagin_URL.'/images/3.png" style="z-index:1;width:100%;height:100%" />';  
      $wb3d_html.='<img class="wb3d_absolute"  id="wb3d3-'.$idm.'" src="'.wb3d_plagin_URL.'/images/4.png" style="z-index:1;width:100%;height:100%" />';  
}


?>
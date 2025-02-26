<?php 
if(!defined('ABSPATH')) exit();





function wb3d_create_audio($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;

      $download_="download-".$y;
      if($B[$download_]!=1){
            $download_='controlsList="nodownload" ';
      }
      else{
            $download_=' ';
      }

      $audio_="audio_".$y;
      $src1=$B[$audio_] ;
      $wb3d_html.='<audio controls  '.$download_.' id="wb3d2-'.$idm.'" src="'.$src1.'"  style=" width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;">';
      $wb3d_html.='Your browser does not support the audio element.';
      $wb3d_html.='</audio>';
}


?>
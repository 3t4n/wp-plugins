<?php 
if(!defined('ABSPATH')) exit();

function wb3d_create_video($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;

      $control_="control-".$y;

      if($B[$control_]==1){
            $control_=' controls ';
      }
      else{
            $control_=' ';
      }

      $loop="loop-".$y;

      if($B[$loop]==1){
            $loop=' loop ';
      }
      else{
            $loop=' ';
      }


      $download_="download-".$y;

      if($B[$download_]!=1){
            $download_='controlsList="nodownload" ';
      }
      else{
            $download_=' ';
      }


      $mute="mute-".$y;
      if($B[$mute]==1){
            $mute=' muted '; 
      }
      else{
            $mute=' ';
      }

      $image_="image_".$y;
      if($B[$image_]!=""){
            $poster=' poster="'.$B[$image_].'"';
      }
      else{
            $poster=' ';;
      }
      $video_="video_".$y;
      $image2_="image2_".$y;
      $src1=$B[$video_] ;
      $wb3d_html.='<video class="wb3d_absolute" '.$poster.$control_.$mute.$download_.$loop.' preload="auto"  src="'.$src1.'" id="wb3d2-'.$idm.'"   style=" width:100%;height:100%;top:0px;left:0px;z-index:1;">';

      $wb3d_html.='</video>';
}

?>
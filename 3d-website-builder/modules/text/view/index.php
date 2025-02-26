<?php 
if(!defined('ABSPATH')) exit();

function wb3d_create_text($level,$cu,$sn,$idm,$B,$T,$wslide,$name,$y){
      global $wb3d_html;
      $value_="text_".$y;
      $x=$B[$value_];
      $wb3d_html.=$x;
}


?>
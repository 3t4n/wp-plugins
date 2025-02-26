<?php //GET Block height admin only section
function bcbh_getblockheight() {
$myFile = "https://get.wpblockheight.com/blockheight/now.txt";
   $lines = file($myFile);//file in to an array
   //var_dump($lines);
   return(preg_replace("/[^0-9]/", "", $lines[0]));
 
} ?>

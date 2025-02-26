<?php 
global $wpdb;

function lucky_draw_display_as($display_as,$SKU,$skutext,$textlinkcolor): string{

    if($display_as=="Link"){
  $link= lucky_draw_get_product_link_by_sku($SKU);
$text='<b><a class="LinkPsreview" target="_blank" style=text-decoration:none;color:'.$textlinkcolor.'; href="'.$link.'" style="text-decoration:none;">'.$skutext.'</a></b>';
}else{
  $text='<b>'.$skutext.'</b>';
 
}
return $text;

}

 function lucky_draw_draw_type(){
  global $wpdb;
$draw_type = $wpdb->get_var($wpdb->prepare("SELECT placement FROM %i  ORDER BY id DESC LIMIT 1 ",Lucky_Draw_Database)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
return $draw_type;
}


function Luckydrawcheckifset($value,$name){

  if(isset($_POST[$value])){
     $name=wp_kses_post(wp_unslash($_POST[$value])); 
    
    }
     else{ 
      $name=''; 
    }

    return $name;


}


function LuckyDrawgetpositon($string){


    switch($string){

    case "Topleft":
      $position="top:20px;left:20px";
    break;

    case "Topcenter":
      $position="top:20px;left:220px";
    break;

    case "Topright":
      $position="top:20px;right:220px;left:auto";
    break;

    case "Bottomleft":
      $position="top:auto;right:auto;left:20px;bottom:20px";
    break;

    case "Bottomcenter":
      $position="top:auto;right:auto;left:220px;bottom:20px";
    break;

    case "Bottomright":
      $position="top:auto;right:20px;left:auto;bottom:20px";
    break;

    } 

    return $position;
  }    
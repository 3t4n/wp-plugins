<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function awtb_target_blank() {
  $awtb_class_name = get_option('awtb_class_name'); 
  $awtb_id_name = get_option('awtb_id_name') ;
  $awtb_chooseclr = get_option('awtb_chooseclr') ;
	?>
    <style>
    .awtb_ExternalLink{ color:<?php echo $awtb_chooseclr; ?> !important}
    </style>
<script>
  jQuery(document).ready(function(){ 
  
  <?php if($awtb_class_name) {?>
  jQuery("a<?php echo '.'.$awtb_class_name; ?>[href*='https://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank"); 
  jQuery("a<?php echo '.'.$awtb_class_name; ?>[href*='http://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank"); 
  
  <?php } elseif($awtb_id_name){?>
   jQuery("a<?php echo '#'.$awtb_id_name; ?>[href*='https://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank"); 
  jQuery("a<?php echo '#'.$awtb_id_name; ?>[href*='http://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank");
   
  <?php } else{?>
    jQuery("a[href*='https://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank"); 
  jQuery("a[href*='http://']:not([href*='"+window.location.hostname+"'])").addClass("awtb_ExternalLink").attr("target","_blank");
  
  <?php }?>
  
});</script>
<?php }
add_action( 'wp_footer', 'awtb_target_blank' );
<?php
ob_start();
global $wpdb;
function show_data($atts, $content=null){
 global $wpdb;
 extract(shortcode_atts( array(		
		'id' => '',
     'title' => '',
 ),$atts));
 
 $display_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."contact_detail where id=%d",$atts['id']));
// print_r($display_data);

    $upload_dir = wp_upload_dir();
    $upload_loc_address = $upload_dir['baseurl'].'/contact_images/'.$display_data->address_image;
    $upload_loc_phone = $upload_dir['baseurl'].'/contact_images/'.$display_data->phone_image;
    $upload_loc_mobile = $upload_dir['baseurl'].'/contact_images/'.$display_data->mobile_image;
    $upload_loc_fax = $upload_dir['baseurl'].'/contact_images/'.$display_data->fax_image;
    $upload_loc_email = $upload_dir['baseurl'].'/contact_images/'.$display_data->email_image;
//include 'show_datacss.php';
?>
<section id='slick'>
<div class="w-47"><div class="clrfx mt-10"></div>
     <div class="field">
     <p class="text-font-color"><span><?php 
     if(@getimagesize($upload_loc_address)) { ?> <img src="<?php echo $upload_loc_address ?>"/> <?php  } 
     else {?> <img src="<?php echo $upload_dir['url'].'/'.$display_data->address_image ?>"/> <?php }
     ?>
     </span><strong>We are at:</strong> <?php echo ($display_data->address) ?></p>
     </div>
     <div class="clrfx mt-10 mb-20 bt"></div>
     <div class="field">
        <p class="text-font-color"><span><?php if(@getimagesize($upload_loc_phone)) { ?> <img src="<?php echo $upload_loc_phone ?>"/> <?php  } 
     else {?> <img src="<?php echo $upload_dir['url'].'/'.$display_data->phone_image ?>"/> <?php }
     ?></span><strong>Call Us:</strong> <?php echo ($display_data->phone) ?></p>
        </div>
     <?php if($display_data->mobile != '')
     {?>
        <div class="clrfx mt-10 mb-20 bt"></div>
         <div class="field">
        <p class="text-font-color"><span><?php if(@getimagesize($upload_loc_mobile)) { ?> <img src="<?php echo $upload_loc_mobile ?>"/> <?php  } 
     else {?> <img src="<?php echo $upload_dir['url'].'/'.$display_data->mobile_image ?>"/> <?php }
     ?></span><strong>Call Us:</strong> <?php echo ($display_data->mobile) ?></p>
        </div>
     <?php } 
      if($display_data->fax != '')
     {
     ?>
        <div class="clrfx mt-10 mb-20 bt"></div>
         <div class="field">
        <p class="text-font-color"><span><?php if(@getimagesize($upload_loc_fax)) { ?> <img src="<?php echo $upload_loc_fax ?>"/> <?php  } 
     else {?> <img src="<?php echo $upload_dir['url'].'/'.$display_data->fax_image ?>"/> <?php }
     ?></span><strong>Fax no:</strong> <?php echo ($display_data->fax) ?></p>
        </div>
     <?php } ?>
        <div class="clrfx mt-10 mb-20 bt"></div>
        <div class="field">
        <p class="text-font-color"><span><?php if(@getimagesize($upload_loc_email)) { ?> <img src="<?php echo $upload_loc_email ?>"/> <?php  } 
     else {?> <img src="<?php echo $upload_dir['url'].'/'.$display_data->email_image ?>"/> <?php }
     ?></span><strong>Email to us:</strong> <?php echo ($display_data->email)?></p>
        </div>
        </div>
</section>
<style type="text/css">
.text-font-color{
    text-decoration:none;background:#fff;
    color:<?php echo get_option('font_color'); ?>; float:left; 
    font-size: <?php echo get_option('font_size'); ?>;  
    width: <?php echo get_option('width'); ?>;
    height: <?php echo get_option('height'); ?>;
    text-align:<?php echo get_option('textalign'); ?>;
    background:<?php echo get_option('background'); ?>;              
}
.text-font-color:hover{color:<?php echo get_option('font_hover_color'); ?>;}
</style> 
<?php } ?>
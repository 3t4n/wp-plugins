<?php 
//setting page
function avk_option_background(){
	 global $avk_background;
	ob_start();?>
     <div class="wrap avk_sticky">	
      <h1><div class="avk_left">Support Developer</div>
      <div class="avk_left">
      <form id="myFormId" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="admin@codeerror.co.uk">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Developer Support">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" width="1" height="1">
</form></div><div class="clear"></div>

</h1>
      <form method="post" action="options.php">
      <?php  
	        settings_fields('avk_background_groups');
	  ?>
     
     
      <h4><?php _e('Activate Background Manager','avk_domain');?></h4>
      <p>
     <input type="checkbox" name="avk_background[avk_abackground]" value="1"<?php checked(1, $avk_background['avk_abackground']);?> /><label for="avk_background[avk_abackground"> Activate Background </label>
     </p>
      <h4><?php _e('Background Image Upload','avk_domain');?></h4>
      
      <img alt="background" src="<?php echo $avk_background['avk_bgimage'] ?>" width="700" />
     <div>
    <label for="image_url">Image</label>
    <input type="text" name="avk_background[avk_bgimage]" id="image_url"  value="<?php echo $avk_background['avk_bgimage'] ?>" class="regular-text">
    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">

</div>

      
     
     <h4><?php _e('Background color','avk_domain');?></h4>
      <p>
     <input type="text" id="avk_background[avk_bgcolor]" name="avk_background[avk_bgcolor]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_background['avk_bgcolor']?>"/></p>
     
     <h4><?php _e('Header color','avk_domain');?></h4>
      <p>
     <input type="text" id="avk_background[avk_hcolor]" name="avk_background[avk_hcolor]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_background['avk_hcolor']?>"/></p>
     <h4><?php _e('Footer color','avk_domain');?></h4>
      <p>
     <input type="text" id="avk_background[avk_fcolor]" name="avk_background[avk_fcolor]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_background['avk_fcolor']?>"/></p>
     
   
     <p class="submit">
<input type="submit" name="Save" value="<?php _e('Save change','avk_name');?>" class="button-primary"/>
</p>
 <!-- <p class="reset">
<input type="reset" name="Reset" value="<?php _e('Reset','avk_name');?>" class="button-primary"/>
</p> -->


     </p></form>
     </div>
     
 <script type="text/javascript">
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
        });
    });
});
</script>   
   
   
  
     <?php echo ob_get_clean();
     
}
function avk_background_manager(){
add_options_page('Avk Background Manager', 'Background Manager', 'administrator',__FILE__, 'avk_option_background');

}
add_action('admin_menu', 'avk_background_manager');

function avk_setting_background(){
	register_setting('avk_background_groups','avk_background');
}
add_action('admin_init','avk_setting_background');


?>


    

	



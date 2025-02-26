<?php 
//setting page
function avk_option_stickypage(){
	 global $avk_options;
	 global $avk_options_url;
	ob_start();?>
     <div class="wrap avk_sticky">	
      <h1><div class="avk_left">Support Developer</div>
      <div class="avk_left">
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
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
	        settings_fields('avk_setting_groups');
	  ?>
     
     
      <h4><?php _e('Activate Sticky Header','avk_domain');?></h4>
      <p>
     <input type="checkbox" name="avk_settings[avk_random]" value="1"<?php checked(1, $avk_options_url['avk_random']);?> /><label for="avk_settings[avk_random]"> Activate Sticky Header </label>
     </p>
      <h4><?php _e('Logo Upload','avk_domain');?></h4>
      
      <img alt="logo" src="<?php echo $avk_options_url['avk_image_url'] ?>" width="120" />
     <div>
    <label for="image_url">Image</label>
    <input type="text" name="avk_settings[avk_image_url]" id="image_url"  value="<?php echo $avk_options_url['avk_image_url'] ?>" class="regular-text">
    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">

</div>

      
     
     <h4><?php _e('Background color','avk_domain');?></h4>
      <p>
     <input type="text" id="avk_settings[avk_color]" name="avk_settings[avk_color]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_options_url['avk_color']?>"/></p>
     <h4>Text Color & font size </h4>
      <p>
     <div class="avk_left">
     <input type="text" id="avk_settings[avk_tcolor]" name="avk_settings[avk_tcolor]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_options_url['avk_tcolor']?>"/></div>
     <div class="avk_left">
     <input  class="small-text" type="number" value="<?php echo $avk_options_url['avk_tfont']?>" min="1" step="1" id="avk_settings[avk_tfont]" name="avk_settings[avk_tfont]"></div>
     <div class="clear"></div>
     </p>
     
     <h4><?php _e('Hover color','avk_domain');?></h4>
      <p>
     <input type="text" id="avk_settings[avk_hcolor]" name="avk_settings[avk_hcolor]" class="my-color-field" data-default-color="#effeff" value="<?php echo $avk_options_url['avk_hcolor']?>"/></p>
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
function avk_sticky_header(){
add_options_page('Avk Sticky Header', 'Sticky Header', 'administrator',__FILE__, 'avk_option_stickypage');

}
add_action('admin_menu', 'avk_sticky_header');

function avk_setting_sticky(){
	register_setting('avk_setting_groups','avk_settings');
}
add_action('admin_init','avk_setting_sticky');

?>
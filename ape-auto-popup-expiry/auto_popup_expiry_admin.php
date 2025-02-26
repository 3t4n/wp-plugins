<style>
tr{ border-bottom:1px solid #ddd;}
.form-table th { width: 250px;}
#choice{ margin-bottom:50px; border-bottom:1px dotted #0073aa; margin-bottom:30px; padding-bottom:30px;}
.none{ display:none;}
input{
width: 180px;
height: 41px;
border: none;
box-shadow: inset 0px 0px 2px rgba(0,0,0,0.3);
}

.wp-core-ui p .button, .wp-core-ui p .button:hover, .wp-core-ui p .button:focus {
vertical-align: baseline;
height: 50px;
font-size: 15px;
background-color: #909;
border: none;
box-shadow: none;
text-shadow: none;
text-transform: uppercase;
letter-spacing: 0px;
}

.wp-core-ui p .button:hover, .wp-core-ui p .button:focus{ background-color:#5a0099;}
</style>

<!--START-WRAPPER-APE-AUTO-POPUP-EXPIRY-->
<div style="margin-top:20px;" id="wrapper_auto_expiry">


	<img width="50px" height="auto" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/ape.png'; ?>" />
    <h2 style="margin:0px; margin-bottom:5px; color:#909; font-size: 21px;">APE - Auto Popup Expiry</h2>
	<p style="margin:0px; font-size: 16px; margin-top:15px;">This is version 2.0</p>
	<small style="margin:0px; font-size: 14px;">By <a href="#" title="Auto popup expiry for wordpress" target="_blank">Edoardo Rinaldi</a></small>
    
    

<div style="margin-top:30px; padding-top:30px; border-top:1px dotted #0073aa; margin-bottom:30px; padding-bottom:30px; border-bottom:1px dotted #0073aa;">
    
	<form method="post" action="options.php" class="toggle">
		<?php wp_nonce_field('update-options'); ?>



        <div id="choice">
        	<h3 style="margin:0px; margin-bottom:15px; color:#909; font-size: 21px;">Select Type</h3>
<!--<div style="margin-bottom:10px;"><input id="option_pop" name="myoption" type="radio" value="popup" <?php //checked( 'popup', get_option( 'myoption' ) ); ?> /><strong>Classic PopUp</strong></div>
<div><input id="option_notification" name="myoption" type="radio" value="notification" <?php //checked( 'notification', get_option( 'myoption' ) ); ?> /><strong>Notification PopUp</strong></div>-->

			<?php include('inc/switch.php'); ?>



        </div>



		<h3 style="margin:0px; margin-bottom:5px; color:#909; font-size: 21px;">Popup Details:</h3>
		<p style="margin:0px; font-size:16px;">
			<strong style="color:#C00;">Important:</strong> Put this shortcode in your Website Page to Display the Popup: <code>[Ape]</code>
		</p>
        


<!------>
<div id="wrapper_type-popup">
<!------>
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ) . 'css/animate.css'; ?>" />

		<table class="form-table">

			<tr valign="top">
				<th scope="row">
					<label for="popup_window_width">Popup Width:<br/><i style="font-size:12px;">(Use "px" or "auto")</i></label>
				</th>
				<td>
					<input type="text" id="popup_window_width" name="popup_window_width" value="<?php echo get_option('popup_window_width'); ?>" placeholder="width" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="popup_window_height"> Popup Height:<br/><i style="font-size:12px;">(Use "px" or "auto")</i></label>
				</th>
				<td>
					<input type="text" id="popup_window_height" name="popup_window_height" value="<?php echo get_option('popup_window_height'); ?>" placeholder="height" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="popup_window_image">Select Image:<br/><i style="font-size:12px;">(Select or upload an image)</i></label>
				</th>
				 <td>
					<?php
                    wp_enqueue_script('jquery');
                    wp_enqueue_media();
                    ?>
                    <div>
                    
                        <input type="text" name="popup_window_image" id="popup_window_image" class="regular-text" value="<?php echo get_option('popup_window_image'); ?>" placeholder="image popup">
                        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
                    
                    </div>
                    
                    
                    <script type="text/javascript">
                    jQuery(document).ready(function($){
                        jQuery('#upload-btn').click(function(e) {
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
                                var popup_window_image = uploaded_image.toJSON().url;
                                // Let's assign the url value to the input field
                                jQuery('#popup_window_image').val(popup_window_image);
                            });
                        });
                    });
                    </script>				
               </td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="popup_window_target">Custom Link:<br/><i style="font-size:12px;">(Leave empty if there is no link)</i></label>
				</th>
				<td>
					<input style=" width:350px; margin-right: 5px;" type="text" id="popup_window_link" name="popup_window_link" value="<?php echo get_option('popup_window_link'); ?>" placeholder="Insert link here" />
                    <span><em>Open in new window?</em></span> <input style="margin-left: 5px;" name="popup_window_target" type="checkbox" value="1" <?php checked( '1', get_option( 'popup_window_target' ) ); ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="popup_window_color">Border Color<br/><i style="font-size:12px;">(Select the border color of the Popup)</i></label>
				</th>
				<td>
					<input type="color" id="popup_window_color" name="popup_window_color" value="<?php echo get_option('popup_window_color'); ?>">
                </td>
			</tr>



			<tr valign="top">
				<th scope="row"><label for="popup_window_radius">Border Radius<br/><i style="font-size:12px;">(Set the border-radius value in px)</i></label>
				</th>
				<td>
				<input type="text" id="popup_window_radius" name="popup_window_radius" value="<?php echo get_option('popup_window_radius'); ?>" placeholder="" />
                </td>
			</tr>



			<tr valign="top">
				<th scope="row">
					<label for="popup_window_border_w">Border Width<br/><i style="font-size:12px;">(Set the border width value in px)</i></label>
				</th>
				<td>
				<input type="text" id="popup_window_border_w" name="popup_window_border_w" value="<?php echo get_option('popup_window_border_w'); ?>" placeholder="" />
                </td>
			</tr>


			<tr valign="top" style="border:none;">
				<th scope="row" style="padding:0px;">
                <h2 style="margin-bottom:0px; color:#909; font-size: 21px;">Expiration Details:</h2>
                </th>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="popup_window_date">Expiration date:<br/><i style="font-size:12px;">(Leave empty if there is no deadline)</i></label>
				</th>
				<td>
					<input type="date" id="popup_window_date" name="popup_window_date" value="<?php echo get_option('popup_window_date'); ?>" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="popup_window_fadeout">FadeOut Time:<br/><i style="font-size:12px;">(es 5000 = 5 second)</i></label>
				</th>
				<td>
					<input type="text" id="popup_window_fadeout" name="popup_window_fadeout" value="<?php echo get_option('popup_window_fadeout'); ?>" placeholder="FadeOut" />
				</td>
			</tr>



		</table>

    
 
<!------>
</div>
<!------>
 
 
 
 
<div class="clr"></div>




<!---NOTIFICATION--->
<div id="wrapper_type-notification" class="none">
<!------>

<style>
#notification_text{ width:500px; height:200px; resize:none;}
</style>
		<table class="form-table">


			<tr valign="top">
				<th scope="row">
					<label for="notification_text">Content Here:<br/><i style="font-size:12px;">(Write here the message)<br/><span style="color:#393">This textarea is &lt;HTML&gt; Friendly</span></i></label>
				</th>
				<td>
					<textarea id="notification_text" name="notification_text" placeholder="write text here..."><?php echo get_option('notification_text'); ?></textarea>
                </td>
			</tr>



			<tr valign="top">
				<th scope="row">
					<label for="notification_width">Widget Width:<br/><i style="font-size:12px;">(Use "px" or "auto")</i></label>
				</th>
				<td>
					<input type="text" id="notification_width" name="notification_width" value="<?php echo get_option('notification_width'); ?>" placeholder="width" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="notification_height"> Widget Height:<br/><i style="font-size:12px;">(Use "px" or "auto")</i></label>
				</th>
				<td>
					<input type="text" id="notification_height" name="notification_height" value="<?php echo get_option('notification_height'); ?>" placeholder="height" />
				</td>
			</tr>



			<tr valign="top">
				<th scope="row">
					<label for="notification_bkg_color">Widget Color<br/><i style="font-size:12px;">(Select the color of the widget)</i></label>
				</th>
				<td>
					<input type="color" id="notification_bkg_color" name="notification_bkg_color" value="<?php echo get_option('notification_bkg_color'); ?>">
                </td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="notification_font_color">Font Color<br/><i style="font-size:12px;">(Select the color of the font)</i></label>
				</th>
				<td>
					<input type="color" id="notification_font_color" name="notification_font_color" value="<?php echo get_option('notification_font_color'); ?>">
                </td>
			</tr>



			<tr valign="top">
				<th scope="row"><label for="notification_radius">Border Radius<br/><i style="font-size:12px;">(Set the border-radius value in px)</i></label>
				</th>
				<td>
				<input type="text" id="notification_radius" name="notification_radius" value="<?php echo get_option('notification_radius'); ?>" placeholder="" />
                </td>
			</tr>



			<tr valign="top">
				<th scope="row">
					<label for="notification_margin">Margin<br/><i style="font-size:12px;">(Set the interior margin value in px)</i></label>
				</th>
				<td>
				<input type="text" id="notification_margin" name="notification_margin" value="<?php echo get_option('notification_margin'); ?>" placeholder="" />
                </td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="notification_position">Widget Position<br/><i style="font-size:12px;">(Select the position of the widget)</i></label>
				</th>
				<td>
					Top: <input style="width:120px;" placeholder="(es. 5px)" type="text" id="notification_position_top" name="notification_position_top" value="<?php echo get_option('notification_position_top'); ?>">
					Right: <input style="width:120px;" placeholder="(es. 5px)" type="text" id="notification_position_right" name="notification_position_right" value="<?php echo get_option('notification_position_right'); ?>">
					Left: <input style="width:120px;" placeholder="(es. 5px)" type="text" id="notification_position_left" name="notification_position_left" value="<?php echo get_option('notification_position_left'); ?>">
					Bottom: <input style="width:120px;" placeholder="(es. 5px)" type="text" id="notification_position_bottom" name="notification_position_bottom" value="<?php echo get_option('notification_position_bottom'); ?>">
                </td>
			</tr>



			<tr valign="top">
				<th scope="row">
					<label for="notification_close_color">Icon Close Color<br/><i style="font-size:12px;">(Select the color of the X icon)</i></label>
				</th>
				<td>
					<input type="color" id="notification_close_color" name="notification_close_color" value="<?php echo get_option('notification_close_color'); ?>">
                </td>
			</tr>

			
			<tr valign="top" style="border:none;">
				<th scope="row" style="padding:0px;">
                <h2 style="margin-bottom:0px; color:#909; font-size: 21px;">Animation Details:</h2>
                </th>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="myselect">Animation IN:<br/><i style="font-size:12px;">(Select the Entry Animation)</i></label>
				</th>
				<td>
					<?php include('inc/anim-in.php'); ?>
				</td>
			</tr>
            
			<tr valign="top">
				<th scope="row">
					<label for="myselectout">Animation OUT:<br/><i style="font-size:12px;">(Select the Exit Animation)</i></label>
				</th>
				<td>
					<?php include('inc/anim-out.php'); ?>
				</td>
			</tr>
            
            
			<tr valign="top" style="border:none;">
				<th scope="row" style="padding:0px;">
                <h2 style="margin-bottom:0px; color:#909; font-size: 21px;">Expiration Details:</h2>
                </th>
			</tr>
            
			<tr valign="top">
				<th scope="row">
					<label for="notification_date">Expiration date:<br/><i style="font-size:12px;">(Leave empty if there is no deadline)</i></label>
				</th>
				<td>
					<input type="date" id="notification_date" name="notification_date" value="<?php echo get_option('notification_date'); ?>" />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row">
					<label for="notification_fadeout">FadeOut Time:<br/><i style="font-size:12px;">(es 5000 = 5 second)</i></label>
				</th>
				<td>
					<input type="text" id="notification_fadeout" name="notification_fadeout" value="<?php echo get_option('notification_fadeout'); ?>" placeholder="FadeOut" />
				</td>
			</tr>


		</table>

<!------>
</div>
<!------>



		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="popup_window_height,popup_window_width,popup_window_date,popup_window_image,popup_window_fadeout, popup_window_link,popup_window_target,popup_window_color,popup_window_radius,popup_window_border_w,myoption,notification_text,notification_width,notification_height,notification_date,notification_fadeout,notification_bkg_color,notification_font_color,notification_radius,notification_margin,notification_close_color,notification_position_top,notification_position_right,notification_position_left,notification_position_bottom,myselect,myselectout" />
		<p class="submit">
			<input type="submit" name="Submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
    
 
 


    
    
<div>
	<h3>Display Popup and Shortcode</h3>
	<p style="font-size:16px;">
	<strong style="color:#C00;">Important:</strong> Put this shortcode in your Website Page to Display the Popup: 
	<code>[Ape]</code>
	</p>
</div>


</div>



<script type="text/javascript">

jQuery("#option_pop").click(function(){
  jQuery("#wrapper_type-popup").removeClass('none');
  jQuery("#wrapper_type-notification").addClass('none');
});

jQuery("#option_notification").click(function(){
  jQuery("#wrapper_type-notification").removeClass('none');
  jQuery("#wrapper_type-popup").addClass('none');
});
</script>
<!--END-WRAPPER-APE-AUTO-POPUP-EXPIRY-->



<?php
//CHECK WHAT TIPOLOGY IS ACTIVE OR WAS SELECTED LAST TIME
$myoption=(get_option('myoption')==null)?'':get_option('myoption');
//POPUP TYPE
if($myoption == 'popup'){ ?>
	<script type="text/javascript">
      jQuery("#wrapper_type-popup").removeClass('none');
      jQuery("#wrapper_type-notification").addClass('none');
    </script>
<?php }; ?>

<?php
//NOTIFICATION TYPE
if($myoption == 'notification'){ ?>
	<script type="text/javascript">
      jQuery("#wrapper_type-popup").addClass('none');
      jQuery("#wrapper_type-notification").removeClass('none');
    </script><?php }; ?>
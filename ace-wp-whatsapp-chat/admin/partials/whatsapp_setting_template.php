<div class="ace-app-container">
<form action="" method="post">
	<div class="ace-app-title-bar" >
		<div class="ace-app-title-content" >
			<div class="ace-app-title-menu" id="ace-app-menu1"><i class="fab fa-whatsapp fa-2x" style="color: white;"></i>&nbsp<span><?php _e('Whatsapp Chat'); ?></span></div>
		    <div class="ace-whatsapp-rmenu">
				<div class="ace-app-title-menu" id="ace-app-menu4"><span>Get Help ?</span></div>
				<div class="ace-app-title-menu" id="ace-app-menu5" ><a target="_blank" href="https://www.paypal.me/acewebx">You Liked It ? Donation </a><i class="fab fa-paypal fa-2x"></i></div>
			</div>
		</div>
	</div>
			<!-- Phone no. field -->
			<div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-phone-content position-left">
					<h1> <?php _e('WhatsApp Phone Number', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Full phone number in international format. Example:', 'ace_whatsapp_chat_wp' ); ?>&nbsp<mark>+010000000</mark>&nbsp</h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-phone-field position-right">
					<input type="text" name="whatsapp_no" value="<?php echo $get_setting_value['ace_whatsapp_no']; ?>"><br>
				</div>
			</div>

			<!-- start msg field -->
			<div class="ace-whatsapp ace-position-msg">
				<div class="ace-whatsapp-content ace-whatsapp-msg-content position-left">
					<h1> <?php _e('Message to start chat', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3> <?php _e('Pre-filled message that will automatically appear in the text field of a chat. Example:', 'ace_whatsapp_chat_wp'); ?></h3>
					<h3><mark><?php _e('Hello! I am interested in your service', 'ace_whatsapp_chat_wp'); ?></mark></h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-msg-field position-right">
						<input type="text" name="whatsapp_start_chat" value="<?php  echo  $get_setting_value['whatsapp_start_chat']; ?>">
				</div>
			</div>

			<!-- Button text field -->
			<!--
			 <div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-btn-content position-left">
					<h1> <?php _e('Edit text on button', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Customize your whatsapp chat button text. Example:', 'ace_whatsapp_chat_wp'); ?>
						&nbsp<mark><?php _e('Whatsapp Chat'); ?></mark>&nbsp </h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-btn-field position-right">
						<input type="text" name="whatsapp_content" value="<?php echo $get_setting_value['whatsapp_content']; ?>">
				</div>
			</div>
			 -->

			<!-- Button hidden on destop -->
			<div class="ace-whatsapp">
				 <div class="ace-whatsapp-content ace-whatsapp-hide-btn-bar position-left">
					<h1><?php _e('Hide button', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3> <?php _e('Turn on to', 'ace_whatsapp_chat_wp'); ?>&nbsp<mark><?php _e('hide whatsapp', 'ace_whatsapp_chat_wp'); ?> </mark>&nbsp<?php _e('chat for website.', 'ace_whatsapp_chat_wp'); ?></h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-hide-btn-onoff position-right">
				  <label class="ace-whatsapp-switch">
				  <input type="checkbox" name="wp_hidden_button" value="1" <?php echo $hiden_btn_check ; ?> >
				  <span class="ace-whatsapp-slider round"></span>
			 	  </label>
			 	</div>
		 	</div>

			<!-- Home page button show -->
			<div class="ace-whatsapp" id="ace-display-home">
				 <div class="ace-whatsapp-content ace-whatsapp-home-page position-left">
					<h1><?php _e('Display Only Home Page', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3> <?php _e('Turn on to display', 'ace_whatsapp_chat_wp'); ?>&nbsp<mark><?php _e('only home page', 'ace_whatsapp_chat_wp'); ?> </mark>&nbsp<?php _e('from your website.', 'ace_whatsapp_chat_wp'); ?></h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-home-onoff position-right">
				  <label class="ace-whatsapp-switch">
				  <input type="checkbox" name="wp_display_home" value="1" <?php echo $display_home; ?> >
				  <span class="ace-whatsapp-slider round"></span>
			 	  </label>
			 	</div>
		 	</div>

		 	<!-- Home page Mobile display button show -->
			<div class="ace-whatsapp" id="ace-mobile-app">
				 <div class="ace-whatsapp-content ace-whatsapp-mobile position-left">
					<h1><?php _e('Mobile Display', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3> <?php _e('Turn on to keep visible for', 'ace_whatsapp_chat_wp'); ?>&nbsp<mark><?php _e('mobile display', 'ace_whatsapp_chat_wp'); ?> </mark>&nbsp<?php _e('only', 'ace_whatsapp_chat_wp'); ?></h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-mobile-onoff position-right">
				  <label class="ace-whatsapp-switch">
				  <input type="checkbox" name="wp_mobile_display" value="1" <?php echo $mobile_display; ?> >
				  <span class="ace-whatsapp-slider round"></span>
			 	  </label>
			 	</div>
		 	</div>

			<!-- Button background color field -->
			<div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-bgbtncolor position-left">
					<h1> <?php _e('Button Background Color', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Customize your whatsapp chat', 'ace_whatsapp_chat_wp'); ?>&nbsp<mark><?php _e('button background color.', 'ace_whatsapp_chat_wp'); ?> </mark>&nbsp</h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-bgbtncolor-field position-right">
						<input type="color" name="whatsapp_btn_color" value="<?php echo $get_setting_value['ace_whatsapp_btn_color']; ?>">
				</div>
			</div>

			<!-- Button color field -->
			<div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-txtbtncolor position-left">
					<h1> <?php _e('Button Color', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Customize your whatsapp chat button', 'ace_whatsapp_chat_wp'); ?>&nbsp<mark><?php _e('button color.', 'ace_whatsapp_chat_wp'); ?> </mark>&nbsp</h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-txtbtncolor-field position-right">
						<input type="color" name="whatsapp_txtbtn_color" value="<?php echo $get_setting_value['ace_whatsapp_txtbtn_color']; ?>">
				</div>
			</div>

		 	<!-- Button Background Hover effect -->
		 	<div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-bghovercolor position-left">
					<h1> <?php _e('Button Mouse Hover Background Color ', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Customize your whatsapp chat button background mouse hover color effect.', 'ace_whatsapp_chat_wp'); ?> </h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-bghovercolor-field position-right">
						<input type="color" name="whatsapp_hover_color" value="<?php echo $get_setting_value['ace_whatsapp_hover_color']; ?>">
				</div>
			</div>

			<!-- Button Hover effect -->
		 	<div class="ace-whatsapp">
				<div class="ace-whatsapp-content ace-whatsapp-txthovercolor position-left">
					<h1> <?php _e('Button Mouse Hover Color', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('Customize your whatsapp chat button mouse hover color effect.', 'ace_whatsapp_chat_wp'); ?> </h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-bghovercolor-field position-right">
						<input type="color" name="whatsapp_txthover_color" value="<?php echo $get_setting_value['ace_whatsapp_txthover_color']; ?>">
				</div>
			</div>


			<!-- Button left right position  -->
		 	<div class="ace-whatsapp">
			 	 <div class="ace-whatsapp-content ace-whatsapp-left-btn position-left">
					<h1><?php _e('Horizontal Side Position', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3><?php  _e('Select button to move whatsapp chat button to the left side and right side of the screen.', 'ace_whatsapp_chat_wp');?> </h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-left-onoff position-right">
						 <input type="radio" name="wp_position_button" value="left" <?php echo $position_check_left; ?> id="size_2" />
						 <label for="size_2" class="postion_left_"><?php _e('Left', 'ace_whatsapp_chat_wp'); ?></label>				  
						<input type="radio" name="wp_position_button" value="right" <?php echo $position_check_right; ?> id="size_1" />
						 <label for="size_1"><?php _e('Right', 'ace_whatsapp_chat_wp'); ?></label>
				 </div>
		 	</div>

		 	<!-- vertical postion Top middle bottom  -->
		 	<div class="ace-whatsapp">
			 	 <div class="ace-whatsapp-content ace-whatsapp-vtl-btn position-left">
					<h1><?php _e('Vertical Side Position', 'ace_whatsapp_chat_wp'); ?></h1>
					<h3><?php  _e('Select button to  move whatsapp chat button  to the Top, Center, Bottom of the screen.', 'ace_whatsapp_chat_wp'); ?></h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-vtl-onoff position-right">
					<ul>
					  <li>
					    <input type="radio" id="f-option" name="wp_position_vtl" value="top" <?php echo $position_top; ?> >
					    <label class="top_position_" for="f-option"><?php _e('Top', 'ace_whatsapp_chat_wp'); ?></label>
					    
					    <div class="check"><div class="inside"></div></div>
					  </li>
					  
					  <li>
					    <input type="radio" id="s-option" name="wp_position_vtl" value="center" <?php echo $position_center; ?> >
					    <label for="s-option"><?php _e('Center', 'ace_whatsapp_chat_wp'); ?></label>
					    
					    <div class="check"><div class="inside"></div></div>
					  </li>
					  
					  <li>
					    <input type="radio" id="t-option" name="wp_position_vtl" value="bottom" <?php echo $position_bottom; ?> >
					    <label for="t-option"><?php _e('Bottom', 'ace_whatsapp_chat_wp'); ?></label>
					    
					    <div class="check"><div class="inside"></div></div>
					  </li>
					</ul>
			 	</div>
		 	</div>
		 	<div class="ace-whatsapp ace-shortcode-content" id="ace-shortcode">
				<div class="ace-whatsapp-content ace-whatsapp-shortcode position-left">
					<h1> <?php _e('Shortcode', 'ace_whatsapp_chat_wp'); ?> </h1>
					<h3> <?php _e('To create Whatsapp chat button use shortcode wherever you want ', 'ace_whatsapp_chat_wp'); ?> </h3>
					<h3> <?php _e('Just copy the shortcode and paste it on any page and on hide button.', 'ace_whatsapp_chat_wp'); ?> </h3>
				</div>
				<div class="ace-whatsapp-content ace-whatsapp-shortcode-field position-right">
						<h3>&nbsp<mark>[whats-app-chat-btn-code]</mark>&nbsp</h3>
				</div>
			</div>
		 	<div class="ace-whatsappp">
				<div class="ace-whatsapp-chat-save">
					<input type="submit" name="ace_chat_setting_save" value="<?php _e('Save', 'ace_whatsapp_chat_wp'); ?>" >
				</div>
			</div>
	</div>
</form>

<div class="ace-s-model" id="ace-cs-contact">

<div class="ace-cs-contact" >
<div class="ace-sp-close"><i class="fa fa-times" aria-hidden="true"></i>
</div>
<div class="ace-contact-h"><h1>Support</h1></div>
<form action="" method="post" class="ace-popup-spot" id="ace_support_form">

<div class="ace-contact-row ace-contact-name">
<p>Please Submit Your Query We Will Get Back To You 12-24 Hours </p>
<label for="name">Name</label>

<input type="text" name="ace_mail_name" placeholder="Name" id="name" required="required">

</div>

<div class="ace-contact-row ace-contact-email">

<label for="email">Email</label>

<input type="email" name="ace_mail_email" placeholder="Email" id="email" required="required">

</div>

<div class="ace-contact-row ace-contact-web">

<label for="website">WebSite</label>

<input type="text" name="ace_mail_web" value="<?php echo home_url(); ?>" readonly>

</div>

<div class="ace-contact-row ace-contact-Comment">

<label for="textarea">Comment</label>

<textarea name="ace_mail_comment" rows="8" cols="42" class="ace_textarea" ></textarea>

</div>

<div class="ace-contact-row ace-contact-name">

<input type="Submit" name="ace_mail_submit" value="Submit">

</div>	

</form>

</div>

</div>
<script type="text/javascript">
jQuery(document).ready( function(){
	jQuery("#ace-app-menu4").click(function(){
	   jQuery("#ace-cs-contact").show();
	
	});

	jQuery(".ace-sp-close").click(function(){
	   jQuery("#ace-cs-contact").hide();
	});
});
</script>

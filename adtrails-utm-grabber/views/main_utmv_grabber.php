<div class="ad_main">
	<h1><?php print apply_filters('ad_utmgrabber_main_heading', __('AdTrails UTM Grabber - Free'), 'ad_utmv_grabber');?> </h1>
	<button class="tablink">Setting</button>
	<div class="ad_free_setting">		
			<?php print apply_filters('ad_utmgrabber_pro_settings', '', "ad_utmv_grabber"); ?>
			<?php print apply_filters('ad_utmgrabber_tabs', $this->getView("_tabs_menu"), "ad_utmv_grabber");?>		
			<div id="cf7" class="ad_tabcontent" >
				<?php print $this->getView("_contact_form7");  ?>
			</div>
				
			<div id="wpforms" class="ad_tabcontent" style="display:none" >
				<h3>WP Forms</h3>
				<?php print apply_filters('ad_utmgrabber_wpforms', $this->getView("_gravity_form"), "ad_utmv_grabber");	?>
			</div>
			
			<div id="gravity" class="ad_tabcontent" style="display:none" >
				<h3>Gravity</h3>
				<?php print apply_filters('ad_utmgrabber_gravity', $this->getView("_gravity_form"), "ad_utmv_grabber");	?>
			</div>

			<div id="ninja" class="ad_tabcontent" style="display:none">
				<h3>Ninja</h3>
				<?php print apply_filters('ad_utmgrabber_ninja', $this->getView("_gravity_form"), "ad_utmv_grabber");?> 
			</div>

			<div id="zapier" class="ad_tabcontent" style="display:none">
				<h3>Zapier</h3>
				<?php print apply_filters('ad_utmgrabber_zapier', $this->getView("_gravity_form"), "ad_utmv_grabber"); ?>				
			</div>
		<?php echo submit_button(); ?>
		</form>
		<!-- proPopup model -->
		<div id="proPopup" class="ad_modal">
		  <!-- proPopup content -->
		  <div class="ad_modal-content">
			<span onclick="UtmvGrabberAdmin.spanCloseBtn();" class="ad_close">&times;</span>
			<p> <?php print _e('This feature is only available in pro version.', 'ad_utmv_grabber'); ?></p>
			<p> <?php print _e('To purchase AdTrails UTM Grabber Pro ', 'ad_utmv_grabber'); ?> <a class="ad_purchase_btn" target="_blank" href="https://www.adtrails.com/pricing/" >click here </a> </p>
		  </div>
		</div>
	</div>
	<div class="ad_free_info">
	<div class="adtrails_logo"> 
		<img src="<?php echo UTMV_GRABBER_URL; ?>/assets/img/adtrails.png" >
		<h3>By Actuate Media</h3>
		<h3><?php print _e('Thankyou For Using AdTrails UTM Grabber', 'ad_utmv_grabber'); ?></h3>
		<p><?php print _e('Please Rate Us ', 'ad_utmv_grabber'); ?> <a href=""> AdTrails UTM Grabber</a></p>
		 <span class="ad_review_stars"> * * * * * </span>
	</div>
	<div class="ad_plugin_desc">
		<h4 class="ad_h4" ><?php print _e('About AdTrails Plugin', 'ad_utmv_grabber'); ?> </h4>
		<p class="ad_para1"><?php print _e("When it comes to digital marketing, attribution is everything. Google Analytics can help attribute a source/medium to a goal, and more, but it cannot attribute an advertising instance to a person. AdTrails UTM grabber can help you better understand the actual source of your website's form submissions. To purchase AdTrails UTM Grabber - Premium Plugin", "ad_utmv_grabber"); ?> <a class="ad_purchase_btn" target="_blank" href="https://www.adtrails.com/pricing/" >click here </a></p>
		<p class="ad_para1"><?php print _e('For more information & support visit our website:', 'ad_utmv_grabber'); ?> <a target="_blank" href="https://www.adtrails.com/" href="https://www.adtrails.com" >https://www.adtrails.com </a>
		Copyright © Actuate Media dba AdTrails
		</p>
	</div>
	</div>
	<!-- Activate button popup for free -->
</div>
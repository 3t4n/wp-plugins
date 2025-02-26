<div class='tg_info_box tg_box'>
    <div class='tg_info_box_inner'>
        <div class="tg_info_box_inner_header"><?php _e("Update", '1000grad-epaper'); ?></div>
        <div class='tg_info_box_inner_content'>
			<div class="misc-pub-section text-justify tg_text_box">

				<h3><?php _e("Dear edelpaper- / 1000 ° ePaper WordPress plugin users", '1000grad-epaper'); ?></h3>

				<p><?php _e("Our WordPress plugin is moving. To be able to continue to use our service, please read through the following important notice.", '1000grad-epaper'); ?></p>

				<p><b><?php _e("We will shut down the formerly used server for the Plugin on the 31st of March 2016!", '1000grad-epaper');?></b> <?php _e("But there is no need to worry. We will continue to provide our service with a new, improved and updated WordPress Plugin.", '1000grad-epaper'); ?></p>

				<p><?php _e("For technical reasons we have to shut down the server where we provided our service for the edelpaper WordPress Plugin formerly. The date is set to be the 31st of March 2016. All documents (pdf and flip books) that are hosted on the “old” server are no longer accessible then.", '1000grad-epaper'); ?></p>

				<p>
					<h4><?php _e("How can I use the new service?", '1000grad-epaper'); ?></h4>

					<p>
						<?php _e("In order to use this new version it is necessary to perform an update of your plugin. In the last step you have to go though a new registration.", '1000grad-epaper'); ?>
					</p>
			
					<div>
						<input type="hidden" class="tg_translation" value="<?php _e("Have you backuped your old pdf files in the box at the end of this page? They will be removed in the next step. \n\nIn the last step you have to go though a new registration.", "1000grad-epaper")?>"/>
					    <a class="button_blue" id="tg_epaper_delete_account" href=""><?php _e("Update Plugin", "1000grad-epaper")?></a>
				    </div>					
				</p>


				<p>
					<h4><?php _e("Why should I perform the update as free user of the Plugin?", '1000grad-epaper'); ?></h4>

					<p><?php _e("There are 3 good reasons to perform the update as a free user: ", '1000grad-epaper'); ?></p>

					<ol>
						<li><?php _e("You still will be able to continue to use our free service of the Plugin to integrate ePaper or flipbooks after the 31st of March 2016.", '1000grad-epaper'); ?></li>
						<li><?php _e("New HTML5 Player - we provide a new player which is based on HTML5 and JavaScript basis for your edelpaper production. So you can use your interactive documents in your WordPress projects and run them completely without flash.", '1000grad-epaper'); ?></li>
						<li><?php _e("Two free Permalinks/Channels for documents per Plugin. Instead of just one interactive document as you were used to in version 1.4.1., you can now use two documents concerning to our terms of use for free.", '1000grad-epaper'); ?></li>
					</ol>
				</p>

				<p>
					<h4><?php _e("Which are the advantages as a professional user?", '1000grad-epaper'); ?></h4>

					<p><?php _e("You will be able to continue to use our service after the 31st of March 2016.", '1000grad-epaper') ?></p>
					<ol>
						<li><?php _e("New HTML5 player. We provide a new player which is based on HTML5 and JavaScript for the edelpaper. So you can use the flip books in your WordPress projects and run them completely without flash.", '1000grad-epaper'); ?></li>
						<li><?php _e("Add multimedia content to your documents. Through the new registration you get access to our edelpaper workspace. You can log in at any time with your email address and the password that you used when registering for the Plugin. With the new edelpaper workspace you will have more options to customize your flip books. So you can upgrade your flip books with links to other editorial posts or web pages and applications, videos or integrate tracking.", '1000grad-epaper'); ?></li>
						<li><?php _e("With the edelpaper <b>Professional plan</b> you will have more storage for flip books in your workspace.", '1000grad-epaper'); ?></li>
						<li><?php _e("It is also possible to insert a logo of your company and to insert your own background image in the edelpaper player. Now you are able to customize each document according to your own corporate identity.", '1000grad-epaper'); ?></li>
						<li><?php _e("The new edelpaper service gives you the opportunity to download your interactive documents as a downloadable zip file if needed (via so called “Download Credit”). So you may run it as a web application on your own webserver (self hosting).  The Download Credit option is available in the new edelpaper workspace.", '1000grad-epaper'); ?></li>
						<li><?php _e("With the new edelpaper service gives you can also use your flip books on other platforms and reach new customers and clients outside the WordPress universe as well.", '1000grad-epaper'); ?></li>
					</ol>
				</p>
				
				<p>
					<h4><?php _e("What is changing in prices and payment methods?", '1000grad-epaper'); ?></h4>

					<p><?php _e("In addition to PayPal we also give you the possibility to pay via credit card now. We offer the edelpaper Professional plan with 2 Permalinks to publish your PDF files as interactive online flip books. You are still able to subscribe to the edelpaper Professional plan subscription (with monthly or annually payment). There are two options:", '1000grad-epaper'); ?></p>
					<ol>
						<li><?php _e("Professional plan – $9.90 per month", '1000grad-epaper'); ?></li>
						<li><?php _e("Professional Annual plan – $99.00 per year ($8,25 per month).", '1000grad-epaper'); ?></li>
					</ol>
					<p><?php _e("Please take advantage of our new service and test it for 30 days free of charge. Find out more about our prices here:", '1000grad-epaper'); ?></p>
					<p>
						<iframe class="wp-embedded-content" sandbox="allow-scripts" security="restricted" style="" src="https://www.edelpaper.com/e/prices/embed" data-secret="OPtZTMq3Yf" width="500" height="336" title="Embedded WordPress Post" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
					</p>
				</p>

			</div>

		</div>
	</div>
</div>



<div class='tg_info_box tg_box'>
    <div class='tg_info_box_inner'>
        <div class="tg_info_box_inner_header"><?php _e("Backup your pdf files", '1000grad-epaper'); ?></div>
        <div class='tg_info_box_inner_content'>
			<div class="misc-pub-section text-justify tg_text_box">
				<p>
					<h4><?php _("Backup your pdf files"); ?></h4>

					<?php foreach ($this->oView->channelobject->channels as $iChannel => $oChannelInfo){ ?>
						<?php if(isset($oChannelInfo->id_epaper)){ ?>
							<div class="tg_epaper_left">
								<dl>
							    	<dt>
							    		<?php echo $this->getEpaperLink($oChannelInfo, $oChannelInfo->epaperInfo) ?>  
							    	</dt>
							    	<dd style="padding-top:20px;">
							    		<a href="<?php echo $oChannelInfo->epaperInfo->source_pdf ?>" target="_blank" class="button_blue" download><?php _e("Download pdf", '1000grad-epaper') ?></a>
							    	</dd>
							    </dl>
							</div>
						<?php } ?>
					<?php } ?>
					<div class="clear"></div>
				</p>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        TgEpaper.initDeleteAccount();
    });
</script>
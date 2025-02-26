<div class='wrap amazonfeedadmin'>

	<h2>Amazon Feed: Dashboard</h2>
	
	<ul id="tabnav">
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=dashboard" class='highlighted'>Dashboard</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=options">Options</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=message_log">Message Log</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache">View Cache</a></li>
		<li><a href="http://www.warkensoft.com/category/wordpress/amazonfeed-wordpress/" class='highlighted-external'>AmazonFeed Blog</a></li>
	</ul>
	
	
	<table class='widefat' style='width: 600px;'>
		<tr>
			<td align="left">
				<p>
				<strong>Welcome to the <a href='http://www.warkensoft.com/php-downloads/amazonfeed-wordpress-plugin/' target='_blank'>AmazonFeed WordPress plugin</a> version <?php echo $this->options['Version']; ?>.</strong>  This
				plugin is designed to allow you to quickly and easily promote products from Amazon on your WordPress
				blog related to the topics you write about.  It is designed to function as unobtrusively as possible,
				choosing products to be displayed based directly on either your blog categories or tags.  In other words
				all you need to do is categorize/tag your posts as you normally would, and AmazonFeed will find products
				to promote to your visitors related to those blog post topics.
				</p>
				
				<?php if(!$this->live) { ?>
				<p class='amazonfeedwarning'>
				<strong>It looks like you have not yet configured AmazonFeed</strong> with all the required options.  Visit the <a href="<?php echo $homePath; ?>&amazonFeedAdminPage=options">Options
				page</a> to save your preferred plugin options.  You will need to enter things like your AWS Access Key,
				your associates tag and your display options.
				</p>
				<?php } ?>
	
				<?php if($this->live AND $this->options['AllowTip'] != true) { ?>
				<p class='amazonfeedwarning'>
				<strong>Are you finding this plugin useful?</strong>  Why not give a little back and help support the ongoing development
				of this plugin.  A lot of time and effort have gone into it's creation and a nice way to say thank-you
				would be to enable the tip option (see under the search tab of the <a href="<?php echo $homePath; ?>&amazonFeedAdminPage=options">options page</a>).<br/>
				<br/>
				Alternatively, you could <a href='http://www.warkensoft.com/php-downloads/donate/' target='_blank'>donate a little to my boat fund</a>, or if you're interested in receiving a tax receipt, you could always make a donation to my
				ministry.  I work as a full time PHP programmer at a non-profit ministry in Canada called TruthMedia.
				You can read more about my work and how you might donate and receive a tax receipt on my <a target='_blank' href='http://www.warkensoft.com/about-me/' target='_blank'>About page</a>.
				</p>
				<?php } ?>
				
				<p>
				In this latest version of AmazonFeed there is also a <strong>sidebar widget</strong> option which allows you to easily display
				relevant products on the sidebar(s) of your site.  In order to use this widget you simply need to enable it under
				the Appearance &gt; Widgets tab of the blog's administrative navigation.
				</p>
				
				<p>
				Got questions about how the plugin works or how to make it do specific things?  <a target='_blank' href='http://www.warkensoft.com/php-downloads/amazonfeed-wordpress-plugin/frequently-asked-questions/'>Check out our FAQ here.</a>
				Need help with the initial installation?  <a target='_blank' href='http://www.warkensoft.com/php-downloads/amazonfeed-wordpress-plugin/installation-instructions/'>Read our installation instructions.</a>
				</p>
	
				<p>
				<strong>If you are having any problems with the plugin</strong>, want to report a bug or feature request, or simply want to lavish praise ;)
				I would ask that you post your comments on the AmazonFeed blog post most closely matching your installed version.  You can
				<a target='_blank' href='http://www.warkensoft.com/category/wordpress/amazonfeed-wordpress/'>view the AmazonFeed blog here</a>. 
				</p>
				
				<p>
				Of course, praise is always nice.  The highest praise you can give for the plugin is to <strong>recommend it to others</strong>.  A link from your site to mine would be awesome, or you can <a href='http://digg.com/software/AmazonFeed_WordPress_Plugin' target='_blank'>digg it</a> or <a href='http://wordpress.org/extend/plugins/amazonfeed/' target='_blank'>rate it on WordPress.com</a>.
				</p>
	
			</td>
		</tr>
	
	</table>
	
</div>
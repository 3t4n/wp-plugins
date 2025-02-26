<?php
if( !defined('ABSPATH') ){ exit();}
?>

<h1 style="visibility: visible;">WP Tumblr Auto Publish (V <?php echo xyz_tbap_plugin_get_version(); ?>)</h1>

<div style="width: 99%">
<p style="text-align: justify">
<?php $wp_tbap="WP Tumblr Auto Publish";
	  $tbap_pub_msg=sprintf( __('%s automatically publishes posts from your blog to your LinkedIn pages. It allows you to filter posts based on post-types and categories.<br/>%s is developed and maintained by','auto-publish-tumblr'),$wp_tbap,$wp_tbap); 
      echo $tbap_pub_msg; ?> <a href="http://xyzscripts.com">XYZScripts</a>.</p>
<p style="text-align: justify">
<?php $tbap_smap_url="https://xyzscripts.com/wordpress-plugins/social-media-auto-publish/features";
	  $tbap_smap_plugin = "XYZ Social Media Auto Publish";
	  $tbap_feature_msg=sprintf( __('If you would like to have more features , please try <a href="%s" target="_blank">%s</a> which is a premium version of this plugin. We have included a quick comparison of the free and premium plugins for your reference.','auto-publish-tumblr'),$tbap_smap_url,$tbap_smap_plugin); 
	  echo $tbap_feature_msg; ?>
	
</p>
 </div>
 <table class="xyz-premium-comparison" cellspacing=0 style="width: 99%;">
	<tr style="background-color: #EDEDED">
		<td><h2> <?php _e('Feature group','auto-publish-tumblr'); ?> </h2></td>
		<td><h2> <?php _e('Feature','auto-publish-tumblr'); ?> </h2></td>
		<td><h2> <?php _e('Free','auto-publish-tumblr'); ?> </h2>
		</td>
		<td><h2> <?php _e('Premium','auto-publish-tumblr'); ?> </h2></td>
		<td><h2>  <?php $tbap_smap="SMAP";
		                $tbap_premium_msg=sprintf( __('%s Premium','auto-publish-tumblr'),$tbap_smap);
		                echo $tbap_premium_msg; ?>+</h2></td>

	</tr>
	<!-- Supported Media  -->
	<tr>
		<td rowspan="6"><h4> <?php _e('Supported Media','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Facebook','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Twitter','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('LinkedIn','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Instagram','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Tumblr','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Pinterest','auto-publish-tumblr'); ?> <span style="color: #FF8000;font-size: 14px;font-weight: bold;">*</span></td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Posting Options  -->
	<tr>
		<td rowspan="15"><h4> <?php _e('Posting Options','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Publish to facebook pages','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
		<tr>
		<td> <?php _e('Publish to twitter profile','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Publish to linkedin profile/company pages','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Publish to instagram Business accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>

		<tr>
		<td> <?php _e('Publish to tumblr profile','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td>  <?php _e('Publish to pinterest boards','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to add twitter image description for visually impaired people','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to republish existing posts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Publish to multiple social media accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Seperate message formats for publishing to multiple social media accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Save auto publish settings of individual posts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Hash Tags support for Facebook, Twitter, Linkedin, Instagram, Pinterest and Tumblr','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to use post tags as hash tags','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
	<td> <?php _e('Option to use post categories as hash tags','auto-publish-tumblr'); ?> </td>
	<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
	</td>
	<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
	</td>
	<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
	</td>
</tr>
	<tr>
		<td> <?php _e('Enable/Disable SSL peer verification','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Image Options  -->
	<tr>
	<td rowspan="5"><h4> <?php _e('Image Options','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Publish images along with post content','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Separate default image url for publishing to multiple social media accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
		<tr>
		<td> <?php _e('Option to specify preference from featured image, post content, post meta and open graph tags','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Publish multiple images to facebook, tumblr, linkedin and twitter along with post content','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to specify multiphoto preference from post content and post meta','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Video Options  -->
	<tr>
	<td rowspan="4"><h4> <?php _e('Video/Audio Options','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Publish video to facebook, tumblr, Linkedin, Pinterest, Instagram and twitter along with post content','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to specify preference from post content, post meta and open graph tags','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Publish audio to tumblr along with post content','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to specify audio preference from  post content, post meta and open graph tags','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Filter Options  -->
	<tr>
	<td rowspan="9"><h4> <?php _e('Filter Options','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Filter posts to publish based on categories','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Filter posts to publish based on custom post types','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Filter posts to publish based on sticky posts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Configuration to enable/disable page publishing','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Category filter for individual accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Custom post type filter for individual accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Enable/Disable page publishing for individual accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Override auto publish scheduling for individual accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Override auto publish based on sticky posts for individual accounts','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Scheduling  -->
	<tr>
	<td rowspan="4"><h4> <?php _e('Scheduling','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Instantaneous post publishing','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Scheduled post publishing using cron','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Status summary of auto publish tasks by mail','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Configurable auto publishing time interval','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Publishing History  -->
	<tr>
		<td rowspan="4"><h4> <?php _e('Publishing History','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('View auto publish history','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('View auto publish error logs','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td>  <?php _e('Option to republish post','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Option to reschedule publishing','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Installation and Support -->
	<tr>
		<td rowspan="2"><h4> <?php _e('Installation and Support','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Free Installation','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Privilege customer support','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<!-- Addons and Support -->
	<tr>
		<td rowspan="3"><h4> <?php _e('Addon Features','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Advanced Autopublish Scheduler','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		</tr>
		<tr>
		<td> <?php _e('URL-Shortener','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td> <?php _e('Privilege Management','auto-publish-tumblr'); ?> </td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/cross.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
		<td><img src="<?php echo plugins_url("images/tick.png",XYZ_TBAP_PLUGIN_FILE);?>">
		</td>
	</tr>
	<tr>
		<td rowspan="2"><h4> <?php _e('Other','auto-publish-tumblr'); ?> </h4></td>
		<td> <?php _e('Price','auto-publish-tumblr'); ?> </td>
		<td> <?php _e('FREE','auto-publish-tumblr'); ?> </td>
		<td> <?php _e('Starts from 39 USD','auto-publish-tumblr'); ?> </td>
		<td> <?php _e('Starts from 69 USD','auto-publish-tumblr'); ?> </td>
	</tr>
	<tr>
		<td> <?php _e('Purchase','auto-publish-tumblr'); ?> </td>
		<td></td>
		<td style="padding: 2px" colspan="2"><a target="_blank"href="https://xyzscripts.com/wordpress-plugins/social-media-auto-publish/purchase"  class="xyz-tbap-buy-button"> <?php _e('Buy Now','auto-publish-tumblr'); ?> </a>
		</td>
	</tr>
</table>
<br/>
<div style="clear: both;"></div>
<span style="color: #FF8000;font-size: 14px;font-weight: bold;"> * </span> <?php _e('Pinterest is added on experimental basis.','auto-publish-tumblr'); ?>

<?php
if( !defined('ABSPATH') ){ exit();}
function xyz_tbap_admin_notice()
{
	add_thickbox();
	$sharelink_text_array_tb = array
						(
						"I Use WP Tumblr Auto Publish  wordpress plugin from @xyzscripts and you should too",
						"WP Tumblr Auto Publish  wordpress Plugin from @xyzscripts is awesome",
						"Thanks @xyzscripts for developing such a wonderful Tumblr auto publishing wordpress plugin",
						"I was looking for a Tumblr publishing plugin like this. Thanks @xyzscripts",
						"Its very easy to use WP Tumblr Auto Publish  wordpress Plugin from @xyzscripts",
						"I installed WP Tumblr Auto Publish from @xyzscripts, it works flawlessly",
						"The WP Tumblr Auto Publish wordpress plugin that i use works terrific", 
						"I am using WP Tumblr Auto Publish wordpress plugin from @xyzscripts and I like it",
						"The WP Tumblr Auto Publish plugin from @xyzscripts is simple and works fine",
						"I've been using this Tumblr plugin for a while now and it is really good",
						"WP Tumblr Auto Publish wordpress plugin is a fantastic plugin",
						"WP Tumblr Auto Publish wordpress plugin is easy to use and works great. Thank you!",
						"Good and flexible Tumblr Auto publish plugin especially for beginners",
						"The best Tumblr auto publish wordpress plugin I have used ! THANKS @xyzscripts",
						);
$sharelink_text_tb = array_rand($sharelink_text_array_tb, 1);
$sharelink_text_tb = $sharelink_text_array_tb[$sharelink_text_tb];
$xyz_tbap_link = admin_url('admin.php?page=tumblr-auto-publish-settings&tbap_blink=en');
$xyz_tbap_link = wp_nonce_url($xyz_tbap_link,'tbap-blk');
$xyz_tbap_notice = admin_url('admin.php?page=tumblr-auto-publish-settings&tbap_notice=hide');
$xyz_tbap_notice = wp_nonce_url($xyz_tbap_notice,'tbap-shw');
	echo '
	<script type="text/javascript">
			function xyz_tbap_shareon_tckbox(){
			tb_show("Share on","#TB_inline?width=500&amp;height=75&amp;inlineId=show_share_icons_tb&class=thickbox");
		}
	</script>
	<div id="tbap_notice_td" class="error" style="color: #666666;margin-left: 2px; padding: 5px;line-height:16px;">'?>
	<p><?php
	   $tbap_url="https://wordpress.org/plugins/auto-publish-tumblr/";
	   $tbap_xyz_url="https://xyzscripts.com/";
	   $tbap_wp="WP Tumblr Auto Publish";
	   $tbap_xyz_com="xyzscripts.com";
	   $tbap_thanks_msg=sprintf( __('Thank you for using <a href="%s" target="_blank"> %s </a> plugin from <a href="%s" target="_blank"> %s </a>. Would you consider supporting us with the continued development of the plugin using any of the below methods?','auto-publish-tumblr'),$tbap_url,$tbap_wp,$tbap_xyz_url,$tbap_xyz_com); 
	   echo $tbap_thanks_msg; ?></p>
	
	<p>
	<a href="https://wordpress.org/support/plugin/auto-publish-tumblr/reviews" class="button xyz_rate_btn" target="_blank"> <?php _e('Rate it 5★\'s on wordpress','auto-publish-tumblr'); ?> </a>
	<?php if(get_option('xyz_credit_link')=="0") ?>
		<a href="<?php echo $xyz_tbap_link; ?>" class="button xyz_backlink_btn xyz_blink"> <?php _e('Enable Backlink','auto-publish-tumblr'); ?> </a>
	
	<a class="button xyz_share_btn" onclick=xyz_tbap_shareon_tckbox();> <?php _e('Share on','auto-publish-tumblr'); ?> </a>
		<a href="https://xyzscripts.com/donate/5" class="button xyz_donate_btn" target="_blank"> <?php _e('Donate','auto-publish-tumblr'); ?> </a>
	
	<a href="<?php echo $xyz_tbap_notice; ?>" class="button xyz_show_btn"> <?php _e('Don\'t Show This Again','auto-publish-tumblr'); ?> </a>
	</p>

	<div id="show_share_icons_tb" style="display: none;">
	<a class="button" style="background-color:#3b5998;color:white;margin-right:4px;margin-left:100px;margin-top: 25px;" href="http://www.facebook.com/sharer/sharer.php?u=https://xyzscripts.com/wordpress-plugins/tumblr-auto-publish/" target="_blank"> <?php _e('Facebook','auto-publish-tumblr'); ?> </a>
	<a class="button" style="background-color:#00aced;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://Twitter.com/share?url=https://xyzscripts.com/wordpress-plugins/tumblr-auto-publish/&text='.$sharelink_text_tb.'" target="_blank"> <?php _e('Twitter','auto-publish-tumblr'); ?> </a>
	<a class="button" style="background-color:#007bb6;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://www.linkedin.com/shareArticle?mini=true&url=https://xyzscripts.com/wordpress-plugins/tumblr-auto-publish/" target="_blank"> <?php _e('LinkedIn','auto-publish-tumblr'); ?> </a>
	</div>
	<?php echo '</div>';
}
$tbap_installed_date = get_option('tbap_installed_date');
if ($tbap_installed_date=="") {
	$tbap_installed_date = time();
}
 if($tbap_installed_date < ( time() - (30*24*60*60) ))
{
 	if (get_option('xyz_tbap_dnt_shw_notice') != "hide")
	{
		add_action('admin_notices', 'xyz_tbap_admin_notice');
	}
}

<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   AdsOptimal
 * @author    team@adsoptimal.com
 * @license   GPL-2.0+
 * @link      http://www.adsoptimal.com
 * @copyright 2014 Your Name or Company Name
 */
	if (isset($_POST["adsoptimal_access_token"])) update_option('adsoptimal_access_token', $_POST["adsoptimal_access_token"]);
	if (isset($_POST["adsoptimal_email"])) update_option('adsoptimal_email', $_POST["adsoptimal_email"]);
	if (isset($_POST["adsoptimal_publisher_id"])) update_option('adsoptimal_publisher_id', $_POST["adsoptimal_publisher_id"]);
	if (isset($_POST["adsoptimal_settings"])) update_option('adsoptimal_settings', $_POST["adsoptimal_settings"]);
	
	if (isset($_POST["enable_desktop_ad"])) update_option('adsoptimal_enable_desktop_ad', $_POST["enable_desktop_ad"]);
	if (isset($_POST["top_ad_alignment"])) update_option('adsoptimal_top_ad_alignment', $_POST["top_ad_alignment"]);
	if (isset($_POST["content_ad_alignment"])) update_option('adsoptimal_content_ad_alignment', $_POST["content_ad_alignment"]);
	if (isset($_POST["footer_ad_alignment"])) update_option('adsoptimal_footer_ad_alignment', $_POST["footer_ad_alignment"]);
	if (isset($_POST["enable_post_ad"])) update_option('adsoptimal_enable_post_ad', $_POST["enable_post_ad"]);
	if (isset($_POST["enable_page_ad"])) update_option('adsoptimal_enable_page_ad', $_POST["enable_page_ad"]);
	
	if (isset($_POST["top_ad_type"])) update_option('adsoptimal_top_ad_type', $_POST["top_ad_type"]);
	if (isset($_POST["content_ad_type"])) update_option('adsoptimal_content_ad_type', $_POST["content_ad_type"]);
	if (isset($_POST["footer_ad_type"])) update_option('adsoptimal_footer_ad_type', $_POST["footer_ad_type"]);
	if (isset($_POST["content_ad_every"])) update_option('adsoptimal_content_ad_every', $_POST["content_ad_every"]);
?>
<form method="post" id="myForm">
<input type="hidden" name="adsoptimal_access_token" value="<?php echo get_option('adsoptimal_access_token', '') ?>">
<input type="hidden" name="adsoptimal_email" value="<?php echo get_option('adsoptimal_email', '') ?>">
<input type="hidden" name="adsoptimal_publisher_id" value="<?php echo get_option('adsoptimal_publisher_id', '') ?>">
<input type="hidden" name="adsoptimal_settings" value="<?php echo get_option('adsoptimal_settings', '{}') ?>">
<input ao-switch="enable_desktop_ad" id="enable_desktop_ad" name="enable_desktop_ad" type="hidden" value="<?php echo get_option('adsoptimal_enable_desktop_ad', 'false') ?>">
<input ao-switch="top_ad_alignment" id="top_ad_alignment" name="top_ad_alignment" type="hidden" value="<?php echo get_option('adsoptimal_top_ad_alignment', 'center') ?>">
<input ao-switch="content_ad_alignment" id="content_ad_alignment" name="content_ad_alignment" type="hidden" value="<?php echo get_option('adsoptimal_content_ad_alignment', 'center') ?>">
<input ao-switch="footer_ad_alignment" id="footer_ad_alignment" name="footer_ad_alignment" type="hidden" value="<?php echo get_option('adsoptimal_footer_ad_alignment', 'center') ?>">
<input ao-switch="enable_post_ad" id="enable_post_ad" name="enable_post_ad" type="hidden" value="<?php echo get_option('adsoptimal_enable_post_ad', 'true') ?>">
<input ao-switch="enable_page_ad" id="enable_page_ad" name="enable_page_ad" type="hidden" value="<?php echo get_option('adsoptimal_enable_page_ad', 'true') ?>">
<input type="hidden" name="top_ad_type" value="<?php echo get_option('adsoptimal_top_ad_type', '300x250') ?>">
<input type="hidden" name="content_ad_type" value="<?php echo get_option('adsoptimal_content_ad_type', '300x250') ?>">
<input type="hidden" name="footer_ad_type" value="<?php echo get_option('adsoptimal_footer_ad_type', '300x250') ?>">
<input type="hidden" name="content_ad_every" value="<?php echo get_option('adsoptimal_content_ad_every', '100') ?>">
</form>
<div class="authenticate" style="display: none;">
	<div style="box-shadow: 0px 0px 10px #666666; color: #ffffff; width: 350px; margin: 100px auto 0px; padding: 15px; text-align: center; background: url(https://cdn.adsoptimal.com/assets/theme-v3/herounit.bg.topbar.png); background-size: 100% 100%; background-color: #53428d; -webkit-border-radius: 7px; -moz-border-radius: 7px; border-radius: 7px;">
		<h3 style="margin-top: 0px; font-weight: 300; font-family: 'Roboto', sans-serif;">Connect Your AdsOptimal Account</h3>
		<p style="padding: 50px 0;"><a class="btn btn-outline-inverse connect" href="javascript:void(0);" style="font-size: 15px; line-height: 40px; padding: 0 30px;">Connect AdsOptimal</a></p>
		<p style="font-weight: 300; font-family: 'Roboto', sans-serif;">Earn highest revenues for your mobile web. Monetize with innovative ads and reach powered buyers.</p>
	</div>
</div>
<div class="authenticating" style="display: none;">
	<div style="box-shadow: 0px 0px 10px #666666; color: #ffffff; width: 350px; margin: 100px auto 0px; padding: 15px; text-align: center; background: url(https://cdn.adsoptimal.com/assets/theme-v3/herounit.bg.topbar.png); background-size: 100% 100%; -webkit-border-radius: 7px; -moz-border-radius: 7px; border-radius: 7px;">
		<h3 style="margin-top: 0px; font-weight: 300; font-family: 'Roboto', sans-serif;">Connect Your AdsOptimal Account</h3>
		<h4 style="padding: 50px 0; line-height: 42px; font-weight: 300; font-family: 'Roboto', sans-serif;">Retrieving Your Account..</h4>
		<p style="font-weight: 300; font-family: 'Roboto', sans-serif;">Earn highest revenues for your mobile web. Monetize with innovative ads and reach powered buyers.</p>
	</div>
</div>
<div class="authenticated" style="display: none;">
	<div style="background: url(https://cdn.adsoptimal.com/assets/theme-v3/herounit.bg.topbar.png); background-size: 100% 100%; min-width: 940px;">
		<img src="http://www.adsoptimal.com/assets/theme-v2/white-logo.png" style="width: 170px; height: 50px; float: left;">
		<div class="btn-group pull-right" style="margin: 8px 10px 0 0;">
			<button class="btn btn-outline-inverse dropdown-toggle" type="button" data-toggle="dropdown" style="">
				<span class="email-address" style="text-shadow: none;"></span> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a class="change-account" href="javascript:void(0);">Change Account</a></li>
			</ul>
		</div>
		<div class="btn-group pull-right" style="margin: 8px 10px 0 0;">
			<button class="btn btn-outline-inverse dropdown-toggle" type="button" data-toggle="dropdown" style="">
				<span class="earning" style="text-shadow: none;">$0.00</span> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="https://www.adsoptimal.com/customer/insights" target="_blank">Insights</a></li>
				<li><a href="https://www.adsoptimal.com/customer/payout" target="_blank">Payout</a></li>
			</ul>
		</div>
		<div style="clear: both;"></div>
	</div>
	<?php if (isset($_POST["adsoptimal_settings"])) { ?>
	<div class="container" style="padding-top: 10px;">
		<div class="alert alert-success" style="font-family: 'Helvetica W01 Light', 'Roboto', sans-serif; font-weight: 300; font-size: 16px; line-height: 20px; margin-bottom: 8px;"><span class="icon success"></span> Your changes have been saved successfully.</div>
	</div>
	<?php } ?>
	<div class="adsoptimal-injection-container" style="margin: 0 auto; background-color: #ffffff;">
	</div>
</div>
<script type="text/javascript" charset="utf-8">
var $ = jQuery;
var settings = {
	'host':     "//www.adsoptimal.com"
, 'clientId': "8d1ccad0433322bed59691fb0d6367a1f4846da1b70ce114cacc7202478e6cd9"
, 'api': "v4"
, 'extraParams': "client=1.1&cms=wordpress"
};
/*var settings = {
	'host':     "http://localhost:3000"
, 'clientId': "8d1ccad0433322bed59691fb0d6367a1f4846da1b70ce114cacc7202478e6cd9"
, 'api': "v4"
, 'extraParams': "client=1.1&cms=wordpress"
};*/
var VIEW = { AUTHENTICATE:0, AUTHENTICATING:1, AUTHENTICATED:2 };

var AdsOptimal = {
	openOAuth: (function() {
		var popupWindow=null;
		return function(redirect_uri, logout) {
			url = settings.host + '/oauth/authorize?ss=wordpress&client_id=' + settings.clientId + '&redirect_uri=' + encodeURIComponent(redirect_uri) + '&response_type=token';
			if (logout) url = settings.host + '/oauth/logout?redirect=' + encodeURIComponent(url);
			
			if(popupWindow && !popupWindow.closed) popupWindow.focus();
			else popupWindow = window.open(url,"_blank","directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,width=515, height=600,top=" + (screen.height - 600)/2 + ",left=" + (screen.width - 515)/2);
			
			function parent_disable() {
				if(popupWindow && !popupWindow.closed) popupWindow.focus();
			}
			
			$(document.body).bind('focus', parent_disable);
			$(document.body).bind('click', parent_disable);
		}
	})(),
	
	extractQuery: function(hash, regex) {
		var match = hash.match(regex);
		return !!match && match[1];
	},
	switchView: function(view) {
		$('div.authenticate').hide();
		$('div.authenticating').hide();
		$('div.authenticated').hide();
		
		switch(view) {
			case VIEW.AUTHENTICATE:
				$('div.authenticate').show();
				break;
			case VIEW.AUTHENTICATING:
				$('div.authenticating').show();
				break;
			case VIEW.AUTHENTICATED:
				$('div.authenticated').show();
				break;
		}
	},
	
	updateSettings: function() {
		if (window.disabledUpdateSettings) return;
		AdsOptimal.saveSettings(false);
	},
	saveSettings: function(save) {
		console.log('NOT IMPLEMENTED');
	},
	restoreSettings: function() {
		console.log('NOT IMPLEMENTED');
	},
	
	oAuthCallback: function(token) {
		AdsOptimal.switchView(VIEW.AUTHENTICATING);
		
		$.ajax({
				url: settings.host + '/api/' + settings.api + '/publisher_info?' + settings.extraParams
			, beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', "Bearer " + token);
					xhr.setRequestHeader('Accept',        "application/json");
				}
			, success: function (response) {
					if (response.data) {
						AdsOptimal.switchView(VIEW.AUTHENTICATING);
						$('[name="adsoptimal_access_token"]').val(token);
						$('[name="adsoptimal_email"]').val(response.data.email);
						$('[name="adsoptimal_publisher_id"]').val(response.data.publisher_id);
						AdsOptimal.updateSettings();
						$('#myForm')[0].submit();
					} else {
						AdsOptimal.switchView(VIEW.AUTHENTICATE);
					}
				}
		});
	},
	initialize: function() {
		$("a.connect").click(function() {
			AdsOptimal.openOAuth(location.href.replace('#' + location.hash,""), false);
		});
		$(".change-account").click(function() {
			AdsOptimal.openOAuth(location.href.replace('#' + location.hash,""), true);
		});
		
		var token = AdsOptimal.extractQuery(window.location.hash, /access_token=(\w+)/);
		var error = AdsOptimal.extractQuery(window.location.hash, /error=(\w+)/);
		if (error == 'access_denied') {
			window.close();
		}
		else if(token) {
			try { window.opener.AdsOptimal.oAuthCallback(token); }
			catch(ex) { }
			window.close();
		}
		else {
			AdsOptimal.switchView(VIEW.AUTHENTICATE);
			
			$('.email-address').text($('[name="adsoptimal_email"]').val());
			
			if ($('[name="adsoptimal_access_token"]').val()) {
				AdsOptimal.switchView(VIEW.AUTHENTICATED);
				
				$('.earning').text('...');
				if ($('[name="adsoptimal_access_token"]').val()) {
					$.ajax({
							url: settings.host + '/api/' + settings.api + '/insight_info?' + settings.extraParams
						, beforeSend: function (xhr) {
								xhr.setRequestHeader('Authorization', "Bearer " + $('[name="adsoptimal_access_token"]').val());
								xhr.setRequestHeader('Accept',        "application/json");
							}
						, success: function (response) {
								if (response.data) {
									$('.earning').text('$' + response.data.pending_payout.toFixed(2));
								} else {
									$('.earning').text('Insight');
								}
							}
					});
				}
				
				var container = $('.adsoptimal-injection-container');
				container.html('<div style="font-size: 26px; font-weight: 300; padding: 50px; text-align: center;">Please wait a moment..</div>');
				$.ajax({
						url: settings.host + '/api/' + settings.api + '/settings_injection.html?' + settings.extraParams
					, beforeSend: function (xhr) {
							xhr.setRequestHeader('Authorization', "Bearer " + $('[name="adsoptimal_access_token"]').val());
							xhr.setRequestHeader('Accept',        "text/html");
						}
					, success: function (response) {
							var container = $('.adsoptimal-injection-container');
							response = response.replace('{{SITE}}', settings.host);
							container.html(response);
							
							container.find('[src]').each(function() {
								if ($(this).attr('src').indexOf('http://') == -1)
									$(this).attr('src', settings.host + $(this).attr('src'));
							});
							AdsOptimal.restoreSettings();
						}
				});
			}
		}
	}
};
AdsOptimal.initialize();
</script>
<style type="text/css">
.container { width: 940px !important; }
</style>
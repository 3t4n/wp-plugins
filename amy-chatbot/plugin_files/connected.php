<?php
// connected page
function amy_connectedpage()
{
	if (amy_get_isamylive() == "") {
		amy_update_isamylive("false");
	}
	$plugin_url = esc_html(amy_get_plugin_url());
	amy_update_connect("connected");
	$nonce_amylivecheck = wp_create_nonce("nonce_amylivecheck");
	$nonce_reset = wp_create_nonce("nonce_reset");
	$t_emailId = amy_get_emailidconnected();
	$t_campaignId = amy_get_campaignd();
	$t_token = amy_get_token();
	$t_firstName = amy_get_firstname();
	$t_lastName = amy_get_lastname();
	$t_amyRrigin = "https://app.amy.us";
	$t_siteId = amy_get_siteid();
	$adminConsoleUrl = $t_amyRrigin . "/ui/dashboard?siteId=" . $t_siteId;
	$t_adminConsoleUrl = $t_token == "" ? $adminConsoleUrl : "https://app.amy.us/cmsui/integrationcms/handover?token=" . $t_token . "&returnUrl=" . $adminConsoleUrl;

	$t_agentId = amy_get_agentid();
	$t_avatarUrl = amy_get_avatarurl();
	$editBotFlowUrl = $t_amyRrigin . "/ui/build?siteId=" . $t_siteId;
	$t_editBotFlowUrl = $t_token == "" ? $editBotFlowUrl : "https://app.amy.us/cmsui/integrationcms/handover?token=" . $t_token . "&returnUrl=" . $editBotFlowUrl;
	$editdesignUrl = $t_amyRrigin . "/ui/design?siteId=" . $t_siteId;
	$t_editdesignUrl = $t_token == "" ? $editdesignUrl : "https://app.amy.us/cmsui/integrationcms/handover?token=" . $t_token . "&returnUrl=" . $editdesignUrl;
	$t_taskbotId = amy_get_taskbotid();
	$t_signinsuccess = amy_get_signinsuccess();
	$viewCollectedLeadsUrl = $t_amyRrigin . "/ui/report/collected-leads-list/?siteId=" . $t_siteId;
	$t_viewCollectedLeadsUrl = $t_token == "" ? $viewCollectedLeadsUrl : "https://app.amy.us/cmsui/integrationcms/handover?token=" . $t_token . "&returnUrl=" . $viewCollectedLeadsUrl;
	$t_viewCollectedLeadsUrl = $t_amyRrigin . "/ui/report/collected-leads-list/?siteId=" . $t_siteId;
	$t_amyDomain = get_option("siteurl");
	$amypremivewurl = "https://app.amy.us/frontEnd/assets/livechat/previewpage/?campaignId=" . $t_campaignId . "&siteId=" . $t_siteId;
	$amylivestatus = get_option("amy_isamylive");

	$isamylive = ""; // $amylivestatus=="true"?"":"disabled-btn";
	// amy_update_token("");
?>
	<title>Connected</title>
	<style type="text/css">
		.amy-btn-primary {
			background-color: #E35EE5;
		}

		.amy-btn-primary:hover {
			background-color: #DB48DE;
		}

		.amy-btn-primary:active {
			background-color: #FA85F4;
		}

		.btn-outline-secondary:not(:disabled):not(.disabled).active,
		.btn-outline-secondary:not(:disabled):not(.disabled):active,
		.show>.btn-outline-secondary.dropdown-toggle {
			color: unset !important;
			background-color: unset !important;
			border-color: unset !important;
		}


		a.text-primary:focus,
		a.text-primary:hover {
			color: unset !important;
		}

		.btn {
			box-shadow: unset !important;
		}

		#wpcontent {
			padding-left: 0px;
		}

		a:focus {
			box-shadow: unset !important;
		}

		.content__container {
			position: fixed;
		}

		.anchor-link {
			text-decoration: none !important;
			color: #012138 !important;
		}

		.anchor {
			text-decoration: none !important;
			color: #fff !important;

		}

		.anchor:hover {
			text-decoration: none !important;
			color: #fff !important;

		}

		.text:hover {
			color: #012138 !important;
		}

		.connected-container {
			padding-right: 0px;
		}

		.anchor-link:hover {
			text-decoration: none !important;
			color: #012138 !important;
		}

		#divPreview {
			background: unset !important;
		}

		#divPreview:hover {
			border-color: #fff !important;
			color: #fff !important;
		}

		.primary-pink {
			background-color: #f482fa !important;
			background: unset !important;
			color: #fff !important;
		}

		.primary-pink:hover {
			border: 2px solid #f482fa;
			color: #fff !important;
		}

		.normal-text:hover {
			color: #fff !important;
		}

		.disabled-btn {
			pointer-events: none;
			cursor: not-allowed !important;
		}

		.icon-container {
			cursor: pointer;
		}

		.resetpopupbutton {
			box-shadow: 0 1px 1px 0 rgb(0 0 0 / 14%) !important;
		}

		.resetpopupbutton:hover {
			color: #fff !important;
			box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%) !important;
		}

		.amy-btn {
			padding: 9px 20px;
			border-radius: 28px;
			font-size: 0.875rem !important;
			min-width: 80px;
			font-weight: 400;
			line-height: 1.35;
			color: #fff;
			font-weight: bold;
			box-sizing: border-box;
			transition: background-color 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, box-shadow 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms, border 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
		}

		.cancelpopupbutton {
			background-color: #fff;
			color: #E35EE5;
			border: 1px solid rgba(227, 94, 229, 0.5);
			border-color: #b6b8d1;
		}

		.cancelpopupbutton:hover {
			border: 1px solid #E35EE5;
			background-color: rgba(227, 94, 229, 0.1);
			color: #E35EE5;
		}

		.cancelpopupbutton:active {
			background-color: #fff !important;
			border: 2 px solid #DBDBE8 !important;
			color: #f482fa !important;
		}

		.resetpopupbutton:active {

			border: 2px solid #f482fa !important;
			color: #fff !important;

		}

		.profile-email {
			display: flex;
			flex-direction: column;
			margin-top: 5px;
		}

		.viewAmybtn {
			/*border : solid 1px #EEEFF5;
			border-radius : 24px;
			*/
		}

		.turnOffAmy {
			border: none;
			background: none;
			outline: none;
		}

		a.text-primary.viewAmybtn:hover {
			text-decoration: none !important;
			color: #DB48DE !important;
		}

		a.text-primary.viewAmybtn:focus {
			text-decoration: none !important;
			color: #DB48DE !important;
		}

		a.text-primary.disableHoverColor:hover {
			text-decoration: none !important;
			color: #DB48DE !important;
		}

		a.text-primary.disableHoverColor:focus {
			text-decoration: none !important;
			color: #DB48DE !important;
		}

		.justify-content-between {
			height: 96px;
		}

		.quick-access-text {
			color: rgba(0, 0, 0, 0.6);
			font-weight: 400;
		}

		.card {
			margin-top: 0px !important;
			max-width: 100% !important;
		}

		.container {
			max-width: 100% !important;
		}

		#wpfooter {
			display: none !important;
		}

		#wpbody-content {
			padding-bottom: 0px !important;

		}

		#wpbody {
			background-color: #F5F5FA;
		}

		.profile-img {
			width: 35px;
			height: 35px;
			margin-right: 43px;
			margin-left: 27px;
			margin-top: 31px;
			margin-bottom: 32px
		}

		.profile-email {
			margin-top: 22px;
		}

		.profile-img img {
			width: 100%;
			height: 100%;
			margin: 0px;
		}

		.section-body {
			min-height: calc(100vh - 32px);
		}
	</style>
	</head>

	<body>
		<section class="section-body">
			<div class="container-fluid bg-white connected-container ">
				<div class="container">
					<div class="row justify-content-between">
						<div class="sidebar-logo d-flex align-items-center" style="left: 40px;position: relative;">
							<img src=<?php echo $plugin_url ?>./images/logo.svg>
							<h1 class="sidebar-logo-heading ml-2" style="margin-left:17px !important">Amy</h1>
						</div>
						<div class="profile d-flex">
							<div class="profile-email">
								<div>
									<span class="font_14"><?php echo esc_html($t_emailId) ?></span>
								</div>
								<!-- 						<span class="font_14"><?php echo esc_html($t_firstName) ?> <?php echo esc_html($t_lastName) ?></span> <br>               -->
								<div style="text-align:right;">
									<a class="text-primary font_14_b disableHoverColor" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalReset">Reset Account</a>
								</div>
							</div>
							<div class="profile-img">
								<img src="<?php echo esc_html($t_avatarUrl) ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid pt-7 bg-gray pb-5">
				<div class="row justify-content-center">
					<div class="col-md-7">
						<div class="card p-4" style="max-width:655px;">
							<h5 class="font_20_b text-center text-heading-amy-toggle">Amy is now ready to help customers on your website!</h5>
							<div class="text-center mt-3">
								<img style="display:none;" id="amyonimage" src=<?php echo $plugin_url ?>/images/logo.svg>
								<img style="display:none;" id="amyoffimage" src=<?php echo $plugin_url ?>/images/sleep.png>
							</div>
							<form action="" name="amylivecheck" method="post" style="display:inline-block">
								<input type=hidden name="nonce_amylivecheck" id="nonce_amylivecheck" value="<?php echo esc_html($nonce_amylivecheck) ?>" style="display:none" />
								<div class="text-center mt-4">
									<input type="hidden" name="hdisamylive" id="hdisamylive" value="<?php echo esc_html($amylivestatus) ?>" />


									<input type="button" id="btnTurnOff" style="display:none" class="text-primary font_14_b turnOffAmy" onclick="setAmyLive(false)" value="Turn Off Amy" />

									<input type="button" id="btnTurnOn" style="display:none;padding: 8px 60px 9px;border-radius: 24px;text-align:center;font-weight: bold;font-size: 14px;line-height: 19px;border:none;color:#fff;margin-bottom:5px;" class="font_14_b amy-btn-primary" onclick="setAmyLive(true)" value="Set Amy Live" />

									<input type="hidden" name="amylivecheck" value="amylivecheck" />
									<input type="hidden" name="amylive" id="amylive" value="false" />
								</div>
							</form>
							<div class="text-center p-2">
								<a class="text-primary font_14_b btn viewAmybtn" href='<?php echo esc_html($t_amyDomain) ?>' target='_blank'>Preview Amy on your website</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center" style="margin-top:40px;">
					<div class="col-md-7">
						<span class="font_14_b">Quick Access</span>
					</div>
				</div>
				<div class="row justify-content-center" style="padding-top:16px">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-4">
								<a href='<?php echo esc_html($t_editdesignUrl) ?>' target='_blank' class="anchor-link">
									<div class="card text-center p-3">
										<div class="ready-card-image">
											<img src=<?php echo $plugin_url ?>./images/edit.png>
										</div>
										<p class="font_14_b pt-2 quick-access-text">Change Design</p>
									</div>
								</a>
							</div>

							<div class="col-md-4">
								<a href='<?php echo esc_html($t_editBotFlowUrl) ?>' target='_blank' class="anchor-link">
									<div class="card text-center p-3">
										<div class="ready-card-image">
											<img src=<?php echo $plugin_url ?>./images/message.png>
										</div>
										<p class="font_14_b pt-2 quick-access-text">Edit Chatbot Flow</p>
									</div>
								</a>
							</div>

							<div class="col-md-4">
								<a href='<?php echo esc_html($t_viewCollectedLeadsUrl) ?>' target='_blank' class="anchor-link">
									<div class="card text-center p-3">
										<div class="ready-card-image">
											<img src=<?php echo $plugin_url ?>./images/graph.png>
										</div>
										<p class="font_14_b pt-2  quick-access-text">View Collected Leads</p>
									</div>
								</a>
							</div>

						</div>
					</div>
				</div>
				<div class="row justify-content-center mt-3">
					<a href='<?php echo esc_html($t_adminConsoleUrl) ?>' target='_blank' class="font_14_b text-primary disableHoverColor">Go to Amy admin console</a>
				</div>
			</div>

		</section>
		<div class="modal fade" id="exampleModalReset" tabindex="-1" aria-labelledby="exampleModalLabelReset" aria-hidden="true" style="top:22%;">
			<div class="modal-dialog" style="max-width:385px;">
				<div class="modal-content card-box_2 border-0" style="padding:30px;min-height:unset;color:#000;width:90%">
					<div class="modal-body" style="padding:0;">
						<div class="row">
							<div class="col-12"><span class="h2 " style="font-size:16px;line-height:22px;font-weight:700;color:#000;">Reset your account?</span></div>
						</div>
						<div style="margin-top:16px;">
							<div>
								<p style="color:rgba(0,0,0,0.6);margin-bottom:20px;font-size:16px;line-height:20px; letter-spacing:0.04rem">
									By confirming, your current Amy Chatbot account will be disconnected
									from this plugin and Amy Chatbot will be removed from your
									WordPress website.
								</p>
							</div>
						</div>
						<div class="row" style="justify-content:flex-end;">

							<div>
								<div style="margin-right:30px;" class="d-grid gap-2">
									<form name="resetform" action="" method="post">
										<input type=hidden name="nonce_reset" id="nonce_reset" value="<?php echo esc_html($nonce_reset) ?>" style="display:none" />
										<input type=hidden name="reset">
									</form>
									<button type="button" style="width:120%;" class="btn btn-outline-secondary amy-btn cancelpopupbutton" data-bs-dismiss="modal">
										Cancel
									</button>
								</div>
							</div>
							<div>
								<div class="d-grid gap-2" style="margin-right:30px;">
									<button type="button" style="width:120%;" class="btn resetpopupbutton amy-btn amy-btn-primary" onclick="javascript:document.forms['resetform'].submit();">
										Reset
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		var siteId = "<?php echo esc_html(amy_get_siteid()) ?>"
		var token = "<?php echo esc_html(amy_get_token()) ?>"
		var appAmyUsBaseAPI = 'https://app.amy.us'


		document.addEventListener('visibilitychange', function() {
			document.visibilityState === 'visible' && checkTokenExpired()
		})

		window.onload = function fn() {
			getAmySwitchState()
			checkTokenExpired()
		}

		function checkTokenExpired() {
			$.ajax({
				url: appAmyUsBaseAPI + "/api/LiveChat/campaigns?siteId=" + siteId,
				headers: {
					Authorization: `Bearer ${token}`,
				},
				type: "get",
				success: function(data) {},
				error: function(error) {
					if (error.status === 401) {
						document.forms['resetform'].submit()
					}
				}
			});
		}

		function getAmySwitchState() {
			$.get(appAmyUsBaseAPI + "/api/bot/amyswitch?siteId=" + siteId, function(data, status) {
				if (status === 'success') {
					showHideTurnOnOffAmy(data.isEnabled)
				}
			});
		}


		function SetPreviewButton(isAmyLive) {
			if (isAmyLive == true) {
				$('.viewAmybtn').text('View Amy on your website');
				$('.viewAmybtn').css('border', '1px solid #DBDBE8');
				$('.viewAmybtn').css('border-radius', '24px');
				$('.text-heading-amy-toggle').text('Amy is Live!');
			} else {
				$('.viewAmybtn').text('Preview Amy on your website');
				$('.viewAmybtn').css('border', 'none');
				$('.text-heading-amy-toggle').text('Amy is now ready to help customers on your website!');

			}
		}

		function showHideTurnOnOffAmy(isEnabled) {
			if (isEnabled) {
				$("#btnTurnOn").hide();
				$("#amyonimage").show();
				$("#amyoffimage").hide();
				$("#btnTurnOff").show();
				SetPreviewButton(true);
			} else {
				$("#btnTurnOn").show();
				$("#btnTurnOff").hide();
				$("#amyonimage").hide();
				$("#amyoffimage").show();
				SetPreviewButton(false);
			}
		}

		function setAmyLive(val) {
			$.post(appAmyUsBaseAPI + "/api/bot/amyswitch:" + (val ? 'enable' : 'disable') + '?siteId=' + siteId,
				function(data, status) {
					if (status === 'success') {
						showHideTurnOnOffAmy(val)
					}
				})
			return false;
		}

		// function sendData(amylivecheck, amyliveval) {
		// 	$.ajax({
		// 		type: "POST",
		// 		url: "",
		// 		data: $.param(formData),
		// 		contentType: 'application/x-www-form-urlencoded; charset=UTF-8'
		// 	}).done(function(data) {
		// 		$("#hdisamylive").val(amyliveval);
		// 		showHideTurnOnOffAmy();
		// 		console.log('success:' + data);
		// 	}).fail(function(data) {
		// 		console.log('failure : ' + data);
		// 	});
		// }

		function RedirectFunc(url) {
			window.open(url, '_blank');
		}

		function resetYourAccount() {

			var email = $('#emailId').val();
			var data = JSON.stringify({
				"action": "reset",
				"comm100livechat_email": email
			});
			window.parent.postMessage({
				'func': 'callBackFromIFrame',
				'message': data
			}, "*");
		}

		function syncIntegration(portalUrl, email, firstName, lastName, siteId, codePlanId, taskBotId, isAmyLive, agentId) {

			var data = JSON.stringify({
				"action": "sync",
				"amylivechat_cpanel_domain": portalUrl,
				"amylivechat_email": email,
				"amylivechat_amy_fname": firstName,
				"amylivechat_amy_lname": lastName,
				"amylivechat_site_id": siteId,
				"amylivechat_plan_id": codePlanId,
				"amylivechat_tbotid": taskBotId,
				"amylivechat_amy_live": isAmyLive,
				"amylivechat_agent_id": agentId
			});
			window.parent.postMessage({
				'func': 'callBackFromIFrame',
				'message': data
			}, "*");

		}
		//ends here
	</script>
<?php
}
?>
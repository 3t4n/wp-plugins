<?php
global $current_user;
      get_currentuserinfo();
  $customer_id=$current_user->ID;
  $sp_or_cart=1;
  $ticaretCRMoptions_message=get_option('ticaretCRMoptions_message');

		//Getting the users inputs to show in the input text place.
		$ticaretCRMoptions = get_option('ticaretCRMoptions');
		$lastCRMoptions = get_option('lastCRMoptions');
?>
<form class="editcomment" method="post" id="tms_setup_form" onsubmit="appsila_wqt_setting_page_settings_tab()" action="#">
	<div class="col-md-12">
			<h1 style="text-align:center" >
			    	Appsila WooQuote <!-- Main title. -->
				<small>1.5.0</small>
			</h1>
			<div class="nav-center settings-nav-tab-div-class">
				<ul class="nav nav-tabs">
	            <li class="active"><a data-toggle="tab" href="#wooquote-offers-tab-href" id="wooquote-offers-tab-id">WooQuote Offers</a></li>
			    <li><a data-toggle="tab" href="#subscription-settings-tab-href" id="subscription-settings-tab-id">Subscription Settings</a></li>
			    <li><a data-toggle="tab" href="#coupon-settings-tab-href" id="coupon-settings-tab-id">Coupon Settings</a></li>
			    <li><a data-toggle="tab" href="#label-translation-tab-href" id="label-translation-tab-id">Label Translation</a></li>
			    <li><a data-toggle="tab" href="#help-and-installation-tab-href" id="help-and-installation-tab-id">Help & Installation</a></li>
			  </ul>
			</div>
			<div class="col-md-12">
					<div class="tab-content">
							<div class="tab-pane fade in active" id="wooquote-offers-tab-href">
									<div class="">
<!--********************************TAB1 WooQuote Mainpage*********************************************-->
											<?php include('PartialViews/PartialView_Tab_Offers.php')?>
									</div>
							</div>
							<div id="subscription-settings-tab-href" class="tab-pane fade">
									<div class="">
<!--********************************TAB2 Subscription Settings*********************************************-->
											<?php include('PartialViews/PartialView_Tab_Subscription_Settings.php')?>
									</div>
							</div>
							<div id="coupon-settings-tab-href" class="tab-pane fade">
									<div class="">
<!--********************************TAB3 Coupon settings.*****************************************************-->
											<?php include('PartialViews/PartialView_Tab_Coupon_Settings.php')?>
									</div>
							</div>
							<div id="label-translation-tab-href" class="tab-pane fade">
									<div class="">
<!--********************************TAB4 Label translation.***************************************************-->
											<?php include('PartialViews/PartialView_Tab_Label_Translation.php')?>
									</div>
							</div>
							<div id="help-and-installation-tab-href" class="tab-pane fade">
									<div class="">
<!--********************************TAB5 Help and installation.***********************************************-->
											<?php include('PartialViews/PartialView_Tab_Help_And_Installation.php')?>
									</div>
							</div>
					</div>
        </div>
	</div>
</form>

<div style="text-align:center" class="" id="help-tab-global-navigation-content-id">
	Incase of any issues in understanding the above steps, please see
	<a href="#" onclick="open_tab('#help-and-installation-tab-href');" target = "_self">
		Help and Installation
	</a>
		or email us at
		<a href="mailto:support@appsila.com">support@appsila.com
		</a>
</div>
<div class="modal-partial-location" id="modal-partial-location-id">
	<div class="clear-fix"></div>
			<?php include('PartialViews/PartialView_Component_Modal_Result.php')?>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>

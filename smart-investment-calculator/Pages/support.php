<style type="text/css">
	.support-card{
		width: 400px;
		border-radius: 0;
		text-align: center;
	}
.support-card h1 {font-size: 23px;}
.icon-support-sgsr{width: 100px;}

</style>

<div style="display: grid;
  grid-template-columns: auto auto auto;">
  <?php $SGSR_LINK = plugins_url( '/', __FILE__ );?>
<!-- -------------------------- -->
<div class="shadow font support-card" style="margin-top: 20px;margin-right: 10px;">
<img src="<?php echo esc_html($SGSR_LINK).'icons/customer-service.svg'; ?>" class="icon-support-sgsr">
<h1>Customer Support</h1>
<p><b>Email:</b> support@wppluginbox.com </p>

<button type="button" class="btn" onclick="window.open('https://www.tidio.com/talk/6g4qjsaq4glmdaovk3wq3uqubfi0zlfm','_self')" style="margin-top: 20px;">Live Chat</button>
</div>



<div class="shadow font support-card" style="margin-top: 20px;margin-right: 10px;">
	<img src="<?php echo esc_html($SGSR_LINK).'icons/malware.svg'; ?>" class="icon-support-sgsr">
<h1>Report a Bug</h1>
<p style="visibility: hidden;"><b>Email:</b> support@wppluginbox.com </p>

<button type="button" class="btn" onclick="window.open('https://wppluginbox.com/support-sgsr/','_self')" style="margin-top: 20px;">Submit Query</button>
</div>


<div class="shadow font support-card" style="margin-top: 20px;margin-right: 10px;">
<img src="<?php echo esc_html($SGSR_LINK).'icons/setting.svg'; ?>" class="icon-support-sgsr">
<h1>Require Custom Features</h1>
<p style="visibility: hidden;"><b>Email:</b> support@wppluginbox.com </p>

<button type="button" class="btn" onclick="window.open('https://wppluginbox.com/support-sgsr/','_self')" style="margin-top: 20px;">Submit Query</button>
</div>


<div class="shadow font support-card" style="margin-top: 20px;margin-right: 10px;">
<img src="<?php echo esc_html($SGSR_LINK).'icons/rate.svg'; ?>" class="icon-support-sgsr">
<h1>Review this Plugin on WordPress</h1>
<p style="visibility: hidden;"><b>Email:</b> support@wppluginbox.com </p>

<button type="button" class="btn" onclick="window.open('https://wordpress.org/support/plugin/smart-investment-calculator/reviews/','_self')" style="margin-top: 20px;">Review</button>
</div>

<!-- -------------------------- -->
</div>




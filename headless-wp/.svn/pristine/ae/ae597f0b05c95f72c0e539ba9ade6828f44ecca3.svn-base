<?php

class Mo_Headless_Site_Support {
	
	public static function support(){
	?>
		<div class="mo_headless_support_layout">
			<div>
				<h3>Contact Us</h3>
				<p>Need any help? Couldn't find an answer in <a href="https://faq.miniorange.com">FAQ</a>?<br>Just send us a query so we can help you.</p>
				
				<form method="post" action="">
					<?php wp_nonce_field('mo_headless_contact_us_query_form','mo_headless_contact_us_query_form_fields'); ?>
					<input type="hidden" name="option" value="mo_headless_contact_us_query_option" />
					<table class="mo_headless_settings_table">
						<tr>
							<td><input type="email" class="mo_headless_table_textbox" required name="mo_headless_contact_us_email" placeholder="Enter email here"
							value="<?php echo get_option("mo_oauth_admin_email"); ?>"></td>
						</tr>
						<tr>
							<td><input class="mo_headless_table_textbox" type="tel" id="contact_us_phone" pattern="[\+]\d{11,14}|[\+]\d{1,4}[\s]\d{9,10}|[\+]\d{1,4}[\s]" placeholder="Enter phone here" name="mo_headless_contact_us_phone" value="<?php echo get_option('mo_oauth_client_admin_phone');?>"></td>
						</tr>
						<tr>
							<td><textarea class="mo_headless_table_textbox" onkeypress="mo_oauth_valid_query(this)" placeholder="Enter your query here" onkeyup="mo_oauth_valid_query(this)" onblur="mo_oauth_valid_query(this)" required name="mo_headless_contact_us_query" rows="4" style="resize: vertical;"></textarea></td>
						</tr>
					</table>
					<div style="text-align:left;">
						<input type="submit" name="submit" style="margin:15px; width:100px;" class="button button-primary button-large" value="Submit" />
					</div>
					<p>If you want custom features in the plugin, just drop an email at <a href="mailto:oauthsupport@xecurify.com">oauthsupport@xecurify.com</a></p>
				</form>
			</div>
		</div>
		<script>
			jQuery("#contact_us_phone").intlTelInput();
		</script>
	<?php
	}
}
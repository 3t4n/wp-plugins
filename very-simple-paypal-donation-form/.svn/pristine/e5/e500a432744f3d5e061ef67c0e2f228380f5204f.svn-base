<div class="wrap ahsilver_docs">

	<h1>Very Simple PayPal Donation Form</h1>

	<p>To include the donation form on a page, use the shortcode <code>[vsdf_donation_form]</code>.</p>

	<p>Modify your settings below. Please fill in all fields.</p>

	<form action='options.php' method='post'>
		<?php
		settings_fields( 'vsdf_page' );
		do_settings_sections( 'vsdf_page' );
		submit_button();
		?>
	</form>

	<div class="springthistle">
		<a href="http://springthistle.com" target="_blank"><img src="<?php echo VSDF_PLUGINDIR; ?>/assets/springthistle-logo.png'" alt="Springthistle Tech logo" /></a>
		<p>This plugin was created by Aaron Hodge Silver of <a href="http://springthistle.com" target="_blank">Springthistle Tech</a>.</p>
	</div>

</div>

<script type="text/javascript">
var radioValue = jQuery(".amount_radio:checked").val();

jQuery( document ).ready(function($) {
	jQuery('#the_amounts').bind("propertychange change click keyup input paste", setup_radios);
	setup_radios();
});

function setup_radios() {
	var str = jQuery('#the_amounts').val(); // get the string of comma-separated amounts
	var amounts = str.split(','); // split it into an array
	var html = ''; // set up the html string as blank
	for (var i = 0, len = amounts.length; i < len; i++) {
		html += '<label for="vsdf_settings[default_checked_amount]" class="amountsradio"><input type="radio" name="vsdf_settings[default_checked_amount]" value="'+amounts[i].trim()+'"';
		if (radioValue == amounts[i].trim()) html += ' checked="checked"';
		html += '>'+jQuery('#the_currency_symbol').val()+amounts[i].trim()+'</label> &nbsp; ';
	}
	jQuery('.amountsradio').parent().html(html);
}
</script>
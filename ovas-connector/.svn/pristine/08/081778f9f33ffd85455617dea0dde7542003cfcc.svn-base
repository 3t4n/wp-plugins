<?php if (! defined('ABSPATH')) {
	exit;
} // Exit if accessed directly
?>
<style>
	#tag-generator-panel-ovas_connect_tags {
		border-radius: 5px;
		box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2);
	}

	form[data-id="ovas_connect_tags"] .control-box button {
		width: 25%;
		min-width: 15em;
	}

	#ovas_include_shortcode {
		display: none;
	}

	.control-box button.button.button-primary {
		margin-bottom: 2rem;
	}
</style>
<script>
	function addShortcodeToCf7Form(shortcode) {
		document.getElementById('ovas_shortcode_to_include').value = shortcode;
		document.getElementById('ovas_include_shortcode').click();
	}
</script>
<header class="description-box">
		<h3><?php esc_html_e('Insert tags requried for the \'Ovas Connect\' plugin to function', 'ovas-connect'); ?></h3>
		<h4><?php esc_html_e('Insert tags in the form that add extra data to be available in the emails and for the API', 'ovas-connect'); ?></h4>
</header>
<div class="control-box">
	<fieldset>
		<legend>
			<?php esc_html_e('The IBAN number of an iDeal payment after it has been completed', 'ovas-connect'); ?>
		</legend>
		<button type="button" class="button button-primary" onclick="addShortcodeToCf7Form('[hidden ovas_iban]')">IBAN</button>

		<legend>
			<?php esc_html_e('The transaction ID of an iDeal payment after it has been completed', 'ovas-connect'); ?>
		</legend>
		<button type="button" class="button button-primary" onclick="addShortcodeToCf7Form('[hidden ovas_transaction_id]')">Transaction ID</button>


		<legend>
			<?php esc_html_e('The email sent by CF7', 'ovas-connect'); ?>
		</legend>
		<button type="button" class="button button-primary" onclick="addShortcodeToCf7Form('[hidden ovas_email_object]')">email data</button>


		<legend>
			<?php esc_html_e('The \'mail (2)\' email sent by CF7', 'ovas-connect'); ?>
		</legend>
		<button type="button" class="button button-primary" onclick="addShortcodeToCf7Form('[hidden ovas_email2_object]')">mail (2) data</button>

		<legend>
			<?php esc_html_e('The form needs 1 element with the \'pronamic_pay_description\' tag to be able to process completed iDeal payments. This can be changed from a text field to a hidden field', 'ovas-connect'); ?>
		</legend>
		<button type="button" class="button button-primary" onclick="addShortcodeToCf7Form('[text payment_description pronamic_pay_description]')">Pronamic pay description tag</button>
	</fieldset>

	<input type="hidden" id="ovas_shortcode_to_include" class="code" readonly="readonly" onfocus="this.select()" data-tag-part="tag" aria-label="The form-tag to be inserted into the form template">
	<button type="button" id="ovas_include_shortcode" class="button button-primary" data-taggen="insert-tag">INSERT</button>
</div>
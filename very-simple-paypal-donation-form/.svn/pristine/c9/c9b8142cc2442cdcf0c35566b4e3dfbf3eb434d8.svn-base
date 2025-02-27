<form id="vsdf_form">
	<div id="errors" style="display: none;"></div>

	<div id="amounts">

		<div class="button-wrap">
			<?php
			global $vsdf;
			$options = $vsdf->get_options();
			$checked = $options['default_checked_amount'];
			$radios = $css = '';
			foreach ($vsdf->get_amounts($options['the_amounts']) as $amt) {
				$radios .= '<input class="hidden radio-label" type="radio" name="radio_amount" value="'.$amt.'" id="amount-'.$amt.'" ';
				if ($checked == $amt) $radios .= 'checked="checked"';
				$radios .= '/><label class="button-label" for="amount-'.$amt.'"><h1>'.$options['the_currency_symbol'].$amt.'</h1></label>';
				$css .= '#amount-'.$amt.':checked + .button-label { background: #0bd451; color: #efefef; }
		#amount-'.$amt.':checked + .button-label:hover { background: #05ae40; color: #e2e2e2; }';
			}
			?>

			<?php echo $radios; ?>

			<input class="hidden radio-label" type="radio" name="radio_amount" value="0" id="amount-other" />
			<label class="button-label" for="amount-other"><h1>Other</h1></label>
			<div class="pre_dollar"><input type="number" id="amount-typed" name="amount-typed" value="<?php echo $options['other_amount']; ?>" /></div>
			<style type="text/css">#vsdf_form .pre_dollar:before { content: '<?php echo $options['the_currency_symbol'] ?>';}</style>
		</div>

		<style type="text/css">
			<?php echo $css.' '.$options['css']; ?>
		</style>

	</div>
	<?php if ($options['recurring'] == 'Yes'): ?>
	<div id="one-or-monthly">
		<div id="types">
			<div class="type_text">
				I'd like this amount to &nbsp;
			</div>
			<div class="type_dropdown">
				<span class="dropdown-el">
					<input type="radio" name="type" value="once" checked="checked" id="once"><label for="once">be a one-time donation</label>
					<input type="radio" name="type" value="recur" id="recur"><label for="recur">recur monthly</label>
				</span>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
	<?php else: ?>
	<input type="radio" name="type" value="once" id="once" checked="checked" style="display: none;" />
	<?php endif; ?>
	<div id="submit-row">
		<input type="submit" id="go" value="<?php echo $options['button_text'] ?>" />
	</div>
</form>

<!-- One-time donation form -->
<form id="onetime" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="display: none !important;">
<input type="hidden" name="cmd" value="_donations" />
<input type="hidden" name="business" value="<?php echo $options['paypal_email']; ?>" />
<input type="hidden" name="item_name" value="One-time Donation" />
<input type="hidden" name="cn" value="Any Special Note?" />
<input type="hidden" name="currency_code" value="<?php echo $options['the_currency']; ?>" />
<input type="hidden" name="on0" value="In honor of" />
<input type="hidden" name="on1" value="Send notification to" />
<input type="hidden" name="return" value="<?php echo get_permalink($options['thanks_page']); ?>" />
<!-- one-time amount -->
<input type="text" name="amount" value="100" />
<!-- in honor of name -->
<input type="text" name="os0" id="os0" />
<!-- honor of address -->
<input type="text" name="os1" id="os1" />
<!-- one-time submit -->
<input value="Donate Now" name="submit27" type="submit" />
</form>

<!-- Recurring donation form -->
<form id="recurring" name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="display: none !important;">
<input type="hidden" name="cmd" value="_xclick-subscriptions" />
<input type="hidden" name="business" value="<?php echo $options['paypal_email']; ?>" />
<input type="hidden" name="item_name" value="Monthly Support" />
<input type="hidden" name="currency_code" value="<?php echo $options['the_currency']; ?>" />
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="return" value="<?php echo get_permalink($options['thanks_page']); ?>" />
<input type="hidden" name="p3" value="1" />
<input type="hidden" name="t3" value="M" />
<input type="hidden" name="src" value="1" />
<input type="hidden" name="sra" value="1" />
<!-- monthly amount -->
<input type="text" name="a3" value="10" type="hidden" />
<!-- in honor of name -->
<input type="text" name="os0" id="os0" />
<!-- honor of address -->
<input type="text" name="os1" id="os1" />
<!-- submit -->
<input value="Start recurring donation" name="submit" type="submit" />
</form>


<?php
/**
 * The VSDonationFormSettings is a class that manages all functions having to do with
 * creating the fields on the settings page.
 *
 * @package	VSDonationForm
 *
 * @since	1.1
 */

class VSDonationFormSettings {

	/* -------------------------------------------------------------------------- *
	 * Actions & Hooks
	 * -------------------------------------------------------------------------- */

	function __construct() {
		add_action( 'admin_init', array($this, 'settings_init' ));
	}

	/* -------------------------------------------------------------------------- *
	 * Registering Settings Fields
	 * -------------------------------------------------------------------------- */

	function settings_init(  ) {

		register_setting( 'vsdf_page', 'vsdf_settings' );

		add_settings_section(
			'vsdf_donation_settings',
			__( 'Donation Settings', 'vsdf' ),
			array($this, 'donation_section_callback'),
			'vsdf_page'
		);

		add_settings_field(
			'paypal_email',
			__( 'PayPal Email Address', 'vsdf' ),
			array($this, 'paypal_email_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'the_currency',
			__( 'Currency Code', 'vsdf' ),
			array($this, 'the_currency_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'the_currency_symbol',
			__( 'Currency Symbol', 'vsdf' ),
			array($this, 'the_currency_symbol_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'the_amounts',
			__( 'Amount Options', 'vsdf' ),
			array($this, 'the_amounts_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'default_checked_amount',
			__( 'Amount checked by default', 'vsdf' ),
			array($this, 'checked_amt_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'other_amount',
			__( 'Default amount in "other"', 'vsdf' ),
			array($this, 'other_amount_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_field(
			'recurring',
			__( 'Show recurring option?', 'vsdf' ),
			array($this, 'recurring_render'),
			'vsdf_page',
			'vsdf_donation_settings'
		);

		add_settings_section(
			'display_settings',
			__( 'Display Settings', 'vsdf' ),
			array($this, 'display_section_callback'),
			'vsdf_page'
		);

		add_settings_field(
			'button_text',
			__( 'Button Text', 'vsdf' ),
			array($this, 'button_text_render'),
			'vsdf_page',
			'display_settings'
		);

		add_settings_field(
			'thanks_page',
			__( 'Thank you/Return page', 'vsdf' ),
			array($this, 'thanks_page_render'),
			'vsdf_page',
			'display_settings'
		);

		add_settings_field(
			'css',
			__( 'Additional CSS', 'vsdf' ),
			array($this, 'css_render'),
			'vsdf_page',
			'display_settings'
		);

	}

	function paypal_email_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='email' name='vsdf_settings[paypal_email]' value='<?php echo $options['paypal_email']; ?>'>
		<?php
	}

	function the_currency_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='text' id="the_currency" name='vsdf_settings[the_currency]' value='<?php echo $options['the_currency']; ?>' style="width: 50px;">
		<br />
		<div class="note">A list of currency codes can be found on <a href="https://developer.paypal.com/docs/integration/direct/rest/currency-codes/" target-"_blank">PayPal's website</a>.</div>
		<?php
	}

	function the_currency_symbol_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='text' id="the_currency_symbol" name='vsdf_settings[the_currency_symbol]' value='<?php echo $options['the_currency_symbol']; ?>' style="width: 30px;">
		<?php
	}

	function the_amounts_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='text' id="the_amounts" name='vsdf_settings[the_amounts]' value='<?php echo $options['the_amounts']; ?>'>
		<br />
		<div class="note">Enter just numbers separated by commas.</div>
		<?php
	}

	function checked_amt_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		$amounts = $vsdf->get_amounts($options['the_amounts']);
		if (!empty($amounts)) {
			foreach ($amounts as $amount) {
				echo '<label for "vsdf_settings[default_checked_amount]" class="amountsradio"><input type="radio" name="vsdf_settings[default_checked_amount]" class="amount_radio"';
				checked( $options['default_checked_amount'], $amount );
				echo ' value="'.$amount.'">$'.$amount.'</label> &nbsp; ';
			}
		}
	}

	function other_amount_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='number' name='vsdf_settings[other_amount]' style="width: 4em;" min="5"  value='<?php echo $options['other_amount']; ?>'>
		<?php
	}

	function recurring_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='radio' name='vsdf_settings[recurring]' <?php checked( $options['recurring'], 'Yes' ) ?> value="Yes" /> Yes &nbsp;
		<input type='radio' name='vsdf_settings[recurring]' <?php checked( $options['recurring'], 'No' ) ?> value="No" /> No<br />
		<div class="note">Note: PayPal allows recurring donations only for Business and Premier accounts.</div>
		<?php
	}

	function button_text_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<input type='text' name='vsdf_settings[button_text]' value='<?php echo $options['button_text']; ?>'>
		<?php
	}

	function thanks_page_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		$pages = get_pages(array());
		?>
		<select name='vsdf_settings[thanks_page]'>
			<option value="0"></option>
			<?php
				foreach ($pages as $page) {
					echo '<option value="'.$page->ID.'"';
					selected( $options['thanks_page'], $page->ID );
					echo '>'.$page->post_title.'</option>';
				}
			?>
		</select>
	<?php
	}

	function css_render(  ) {
		global $vsdf;
		$options = $vsdf->get_options();
		?>
		<textarea name='vsdf_settings[css]'><?php echo $options['css']; ?></textarea>
		<?php
	}

	function donation_section_callback(  ) {
	}

	function display_section_callback(  ) {
	}

}

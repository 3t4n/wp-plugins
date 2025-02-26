<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wrap" style="padding:10px 40px 40px 40px;background-color:#dedede;">

<div style="float:left;margin-left:10%;width:180px;"><?php echo do_shortcode("[accountable_press_seal size='medium']");?></div>

	<div class="wrap" style="padding-top:25px;"><h1><strong><?php _e( 'Accountable Press Toolkit', 'accountable-press' ); ?></strong></h1>
</div>

<div style="clear: both;"></div>

	<div style="width:80%;text-align:left;margin-left:auto;margin-right:auto;">

<?php
//grab users first name
$user_info = get_userdata(get_current_user_id());
      $first_name = ' '.$user_info->first_name;
?>

<p style="font-size:14px;"><strong><?php _e( "Hi$first_name!", 'gn-publisher' ); ?></strong></p>

<p style="font-size:14px;"><?php _e( "The Accountable Press Toolkit adds three items:", 'gn-publisher' ); ?></p>


	<ol style="font-size:14px;">

<li style="margin: 15px 0;">
<?php _e( 'An Accountable Press <strong>&#x3C;link&#x3E; tag</strong> to your site\'s head tag. The &#x3C;link&#x3E; tag is one option that other sites, search engines and news aggregators can use to confirm your status as a Certified Accountable Press Publisher. The &#x3C;link&#x3E; tag is embeded in your site\'s html code and does not affect the appearence of your site.' ); ?>
</li>

<li style="margin: 15px 0;">
<?php _e( 'An Accountable Press Seal <strong>widget</strong> that makes it easy to display your Accountable Press Seal on a sidebar or footer.' ); ?>
</li>

<li style="margin: 15px 0;">
<?php _e( 'An Accountable Press Seal <strong>shortcode</strong> that makes it easy to display your Accountable Press Seal anywhere on your site.' ); ?>
</li>

	</ol>


<h3><?php _e( "Important", 'accountable-press' ); ?></h3>


<p style="font-size:14px;"><?php
			printf(
				__( 'You must add your Accountable Press Profile ID below. You can find your Profile ID on your <a href="%1$s">Accountable Press Account page</a> after your site is Certified.', 'gn-publisher' ),
				'https://accountable.press/account/'
			);
	?></p>


<p style="font-size:14px;"><?php _e( 'After adding your Profile ID, click on the "Save Profile ID" button.', 'accountable-press' ); ?></p>


	<form action="" method="post">

		<table class="form-table">
			<tr>
				<th><?php _e( 'Accountable Press Account ID:', 'accountable-press' ); ?></th>
				<td style="width:10em;text-align:center;">
					<input type="text" class="regular-text" style="width:7em;" name="accountable_press_account_id" value="<?php echo esc_attr( $account_id ); ?>" >
				</td>

				<td style="align:left;">
<?php wp_nonce_field( 'save_accountable_press_settings', '_wpnonce' ); ?>
			<input type="submit" name="save_accountable_press_settings" id="submit" class="button button-primary" value="<?php _e( 'Save Profile ID', 'accountable-press' ); ?>" />
				</td>
			</tr>
		</table>		
			</form>


		<div>

<h3><?php _e( "The Accountable Press &#x3C;link&#x3E; Tag", 'accountable-press' ); ?></h3>

<p style="font-size:14px;"><?php _e( 'The &#x3C;link&#x3E; tag is automatically included in the &#x3C;head&#x3E; tag of your html source code as long as the Accountable Press Toolkit plugin is activated and you have saved your Profile ID above. There\'s nothing further that you need to do.', 'accountable-press' ); ?></p>


<h3><?php _e( "Displaying the Certified Accountable Press Seal", 'accountable-press' ); ?></h3>

<p style="font-size:14px;"><?php _e( "There are two methods of displaying the Certified Accountable Press Seal on your site:", 'gn-publisher' ); ?></p>

	<ul style="font-size:14px;list-style-type:disc;margin-left: 15px;">

<li style="margin: 15px 0;">

<?php printf( __( 'The Certified Accountable Press Seal is available as a widget. Simply go to your  <a href="%s">widgets page</a> and drag it to your sidebar or footer section. There are three size options to choose from: small (80px wide), medium (120px wide) and large(160px wide).', 'accountable-press' ), admin_url('widgets.php') ); ?>

</li>

<li style="margin: 15px 0;">


<?php printf( __( 'You can also use the %s shortcode to display the Certified Accountable Press Seal anywhere shortcodes can be used. You may specify a size (small, medium or large) to change the size of the seal. Example: %s.', 'accountable-press' ), '<code>[accountable_press_seal]</code>', '<code>[accountable_press_seal size="medium"]</code>' ); ?>

</li>

	</ul>


<p style="font-size:14px;"><?php _e( "The Certified Accountable Press Seal links to your Accountable Press Public Profile. Your Public Profile confirms your site's status as a Certified Accountable Press publisher. Displaying the Seal is highly recommended, but optional.", 'gn-publisher' ); ?></p>



<h3><?php _e( "Accountable Press Support", 'accountable-press' ); ?></h3>

<p style="font-size:14px;"><?php printf( __( 'If you need any help, don\'t hesitate to ask! You can contact us through our <a href="%1$s">contact form on Accountable Press</a> or drop us an email at <a href="%2$s">support@accountable.press</a>.', 'accountable-press' ),
				'https://accountable.press/contact/',
				'mailto:support@accountable.press'
 ); ?>
</p>

<br />
<br />
<br />
<br />


		</div>
	</div>

</div>
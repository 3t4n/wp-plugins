<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="wrap">
<!--<h1>Incogneato Settings</h1>-->
<?php
echo '<img src="' . plugins_url( 'images/incogneato.png', __FILE__ ) . '" > ';
?>
<form method="post" action="options.php">
	<?php settings_fields( 'incogneato-anonymous-suggestion-box' ); ?>
	<?php do_settings_sections( 'incogneato-anonymous-suggestion-box' ); ?>
	<table class="form-table">
		<tr valign="top">
			<th colspan="2">If you haven't already, get started by creating an account at <a href="https://www.incognea.to" target="_blank">incognea.to</a>. Then, fill in your "Box ID" below with the five characters following "ansr.me/".  See <a href="https://www.incognea.to/how-to-add-incogneato-to-your-wordpress-site/">here</a> for more help.<br /><br />
			You can also change the default button text.
			</th>
			<td>
		</tr>
		<tr valign="top">
			<th scope="row">Box ID *</th>
			<td>
				<input type="text" name="iasb_box_id" value="<?php echo esc_attr( get_option( 'iasb_box_id' ) ); ?>" style="width: 300px" />
			</td>
			</tr>
			<tr valign="top">
				<th scope="row">Button Text</th>
			<td>
				<input type="text" name="iasb_box_title" value="<?php echo esc_attr( get_option( 'iasb_box_title' ) ); ?>" style="width: 300px" />
			</td>
		</tr>
    </table>
    <?php submit_button(); ?>
	<small>* Mandatory field</small>
</form>
</div>
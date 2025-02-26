<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Clik_Clik
 * @author    Clik Clik <support@clikclik.com.au>
 * @license   GPL-2.0+
 * @link      http://www.clikclik.com.au
 * @copyright 2014 Clik Clik
 */
?>

<div class="wrap">	

	<h2>
		<?php if ( empty($this->settings) ) : ?>
			<span class="signup-container">Sign up for Clik Clik</span>
			<span class="sign-in-container hide">Clik Clik Sign In</span>
		<?php else : ?>
			<?php echo esc_html( get_admin_page_title() ); ?>
		<?php endif; ?>
	</h2>

	<div class="message-container <?php echo isset($this->message['status']) ? $this->message['status'] : 'hide'; ?>">
		<button>X</button>
		<p><strong><?php echo isset($this->message['content']) ? $this->message['content'] : ''; ?></strong></p>
	</div>

	<?php if ( isset($_GET['signup']) ) : ?>
		<div class="message-container updated">
			<button>X</button>
			<p><strong>One more thing... before you can start accepting online bookings through the Clik Clik plugin, you will need to complete the brief setup wizard within your Clik Clik <a href="http://www.clikclik.com.au/account/?allow_wizard=true" class="new_wix_window">account dashboard</a>.</strong></p>
		</div>
	<?php endif; ?>

	<?php if ( empty($this->settings) ) : ?>


		<div class="signup-container">

			<h3>Start accepting online bookings today.</h3>


			<form action="http://www.clikclik.com.au/wordpress/signup/" class="ajax-submit signup-form">
				<input type="hidden" name="origin" value="wordpress" />

				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row"><label for="business_name"><?php _e( 'Business Name' ); ?></label></th>
							<td>
								<input type="text" name="business_name" id="business_name" class="regular-text" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="email"><?php _e( 'Email' ); ?></label></th>
							<td>
								<input type="text" name="email" id="email" class="regular-text" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="username"><?php _e( 'Username' ); ?></label></th>
							<td>
								<input type="text" name="username" id="username" class="regular-text" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="password"><?php _e( 'Password' ); ?></label></th>
							<td>
								<input type="password" name="password" id="password" class="regular-text" />
							</td>
						</tr>
					</tbody>
				</table>

				<p class="submit">
					<input type="submit" name="submit" class="button button-primary submit-button" value="Start My Free 30 Day Trial" data-loading-text="Signing up...">
				</p>

			</form>

			Already have an account? <a href="#" class="show-sign-in">Sign In</a>

			<br><br>

			<small>Want to know more about Clik Clik before signing up? Visit us at <a href="http://www.clikclik.com.au" target="_blank">http://www.clikclik.com.au</a></small>

		</div>

		<div class="sign-in-container hide">

			<form action="http://www.clikclik.com.au/wordpress/sign-in/" class="ajax-submit sign-in-form">
				<input type="hidden" name="origin" value="wordpress" />

				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row"><label for="login_username"><?php _e( 'Username' ); ?></label></th>
							<td>
								<input type="text" name="login_username" id="login_username" class="regular-text" />
							</td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="login_password"><?php _e( 'Password' ); ?></label></th>
							<td>
								<input type="password" name="login_password" id="login_password" class="regular-text" />
							</td>
						</tr>
					</tbody>
				</table>

				<p class="submit">
					<input type="submit" name="submit" class="button button-primary submit-button" value="Sign In" data-loading-text="Signing in...">
				</p>

			</form>

			Don't have an account? <a href="#" class="show-signup">Sign Up</a>

		</div>

	<?php else : ?>

		<form action="http://www.clikclik.com.au/wordpress/save-settings/" class="ajax-submit save-settings-form">
			<input type="hidden" id="unique_id" name="unique_id" value="<?php echo $this->settings['unique_id']; ?>">

			<p>
				Signed in with <strong><?php echo $this->settings['business_name']; ?></strong><br />
				<a href="http://www.clikclik.com.au/account/?allow_wizard=true" class="new_wix_window">View Dashboard</a> | 
				<a href="http://www.clikclik.com.au/wordpress/disconnect/" class="disconnect">Disconnect Account</a>
			</p>

			<h3 class="title">Show/Hide Components</h3>

			<p>
				You can specify which components of the Clik Clik app you want to display on your website.
			</p>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="display_availability"><?php _e( 'Availability Calendar' ); ?></label></th>
						<td>
							<label>
								<input name="display_availability" type="radio" value="show" <?php echo $this->settings['display_availability'] == 'show' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Show' ); ?>
							</label><br />
							<label>
								<input name="display_availability" type="radio" value="hide" <?php echo $this->settings['display_availability'] == 'hide' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Hide' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="display_company"><?php _e( 'Company Information' ); ?></label></th>
						<td>
							<label>
								<input name="display_company" type="radio" value="show" <?php echo $this->settings['display_company'] == 'show' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Show' ); ?>
							</label><br />
							<label>
								<input name="display_company" type="radio" value="hide" <?php echo $this->settings['display_company'] == 'hide' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Hide' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="display_resources"><?php _e( 'Staff/Resource Details' ); ?></label></th>
						<td>
							<label>
								<input name="display_resources" type="radio" value="show" <?php echo $this->settings['display_resources'] == 'show' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Show' ); ?>
							</label><br />
							<label>
								<input name="display_resources" type="radio" value="hide" <?php echo $this->settings['display_resources'] == 'hide' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Hide' ); ?>
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="display_services"><?php _e( 'Services Offered' ); ?></label></th>
						<td>
							<label>
								<input name="display_services" type="radio" value="show" <?php echo $this->settings['display_services'] == 'show' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Show' ); ?>
							</label><br />
							<label>
								<input name="display_services" type="radio" value="hide" <?php echo $this->settings['display_services'] == 'hide' ? 'checked="checked"' : ''; ?> /> <?php _e( 'Hide' ); ?>
							</label>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title">Color Settings</h3>

			<p>
				Change the color settings of the Clik Clik app to match your website theme/template.
			</p>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><label for="color_main_bg"><?php _e( 'Main Background Color' ); ?></label></th>
						<td>
							<input type="text" name="color_main_bg" id="color_main_bg" value="<?php echo $this->settings['color_main_bg']; ?>" class="wp-color-picker" data-default-color="#effeff" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="color_section_bg"><?php _e( 'Section Background Color' ); ?></label></th>
						<td>
							<input type="text" name="color_section_bg" id="color_section_bg" value="<?php echo $this->settings['color_section_bg']; ?>" class="wp-color-picker" data-default-color="#effeff" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="color_primary_font"><?php _e( 'Primary Font Color' ); ?></label></th>
						<td>
							<input type="text" name="color_primary_font" id="color_primary_font" value="<?php echo $this->settings['color_primary_font']; ?>" class="wp-color-picker" data-default-color="#effeff" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="color_secondary_font"><?php _e( 'Secondary Font Color' ); ?></label></th>
						<td>
							<input type="text" name="color_secondary_font" id="color_secondary_font" value="<?php echo $this->settings['color_secondary_font']; ?>" class="wp-color-picker" data-default-color="#effeff" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="color_general_font"><?php _e( 'General Font Color' ); ?></label></th>
						<td>
							<input type="text" name="color_general_font" id="color_general_font" value="<?php echo $this->settings['color_general_font']; ?>" class="wp-color-picker" data-default-color="#effeff" />
						</td>
					</tr>
				</tbody>
			</table>

			<p class="submit">
				<input type="submit" name="submit" class="button button-primary submit-button" value="Save Changes" data-loading-text="Saving...">
			</p>

		</form>

	<?php endif; ?>

</div>
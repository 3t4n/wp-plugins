<?php

/**
 * Displaying HTML form in Settings: AdQuire tab in Settings submenu
 */
function adqwp_options_page() {
	global $adqwp_options;
?>
	<div class='wrap'>
		<h2> AdQuire Settings </h2>

		<p id='separatingLines'></p>
		<h3> Configurations </h3>
		<form method='post' action='options.php'>
			<?php settings_fields('adqwp_settings_group'); ?>

			<table class='form-table' id='generalFields'>
				<tbody>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[PubCode]'>
								<?php _e('PubCode: ', 'adqwp_domain'); ?>
							</label>
							<label id='required'>*</label>
						</th>
						<td>
							<input
								id='adqwp_settings[PubCode]'
								name='adqwp_settings[PubCode]'
								type='text'
								required='required'
								placeholder='ex: ABC'
								value="<?php print $adqwp_options['PubCode']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[Pin]'>
								<?php _e('System Password: ', 'adqwp_domain'); ?>
							</label>
							<label id='required'>*</label>
						</th>
						<td>
							<input
								id='adqwp_settings[Pin]'
								name='adqwp_settings[Pin]'
								type='text'
								required='required'
								placeholder='ex: JhTPxKDj4Zzu'
								value="<?php print $adqwp_options['Pin']; ?>"
							/>
							<br />
							<p>
								<b> PubCode </b> &amp; <b> System Password </b> will be
								provided by <em> Permission Data </em>
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[embed]'
								title='Shortlink page ID (http://sub.yourdomain.com/wp-admin/post.php?post=6)'
							>
								<?php _e(
									'Page ID to embed AdQuire snippet: ',
									'adqwp_domain'
								); ?>
							</label>
							<label id='required'>*</label>
						</th>
						<td>
							<input
								id='adqwp_settings[embed]'
								name='adqwp_settings[embed]'
								type='number'
								required='required'
								placeholder='ex: 4'
								value="<?php print $adqwp_options['embed']; ?>"
							/>
							<p>
								<b> Page ID </b> is the number associated with the
								Shortlink of the page where AdQuire snippet
								will be embedded (e.g. http://sub.yourdomain.com/wp-admin/post.php?post=6)
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[Container]'
								title='HTML ID of the HTML Container'
							>
								<?php _e('Container ID: ', 'adqwp_domain'); ?>
							</label>
							<label id='required'>*</label>
						</th>
						<td>
							<input
								id='adqwp_settings[Container]'
								name='adqwp_settings[Container]'
								type='text'
								required='required'
								placeholder='ex: container'
								value="<?php 
									if ($adqwp_options['Container'] == '') { 
										print 'EmbedHere';
									} else {
										print $adqwp_options['Container'];
									}
								?>"
							/>
							<p>
								<b> Container </b> is the HTML ID attribute for your Container
								to insert AdQuire Snippet (Do NOT include # symbol,
								just the ID name)
							</p>
							<br />
							<p>
								<strong>
									AdQuire will be embedded <em> after </em> the HTML element
									you have specified
								</strong>
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[MainTitle]'
							>
								<?php _e('MainTitle: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[MainTitle]'
								name='adqwp_settings[MainTitle]'
								type='text'
								placeholder='ex: Special Offers'
								value="<?php print $adqwp_options['MainTitle']; ?>"
							/>
							<p>
								<b>MainTitle</b> is the headline displayed above
								the AdQuire Offers
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[MainSubtitle]'
							>
								<?php _e('MainSubtitle: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[MainSubtitle]'
								name='adqwp_settings[MainSubtitle]'
								type='text'
								placeholder='ex: Please select any offers you like!'
								value="<?php print $adqwp_options['MainSubtitle']; ?>"
							/>
							<p>
								<b>MainSubtitle</b> is the sub-headline displayed above
								the AdQuire Offers and below the MainTitle
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[exit_url]'
							>
								<?php _e('Page_id of URL or exit_url: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[exit_url]'
								name='adqwp_settings[exit_url]'
								type='text'
								placeholder='ex: 3 | http://www.permissiondata.com'
								value="<?php print $adqwp_options['exit_url']; ?>"
							/>
							<p>
								<b>Redirect Url</b>: When AdQuire finishes,
								the user will be redirected to this URL
								<br />
								<br />
								This URL can be the Page_ID of one of your pages on WordPress
								site/blog or an arbitrary URL
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<p id='info'>
				* AdQuire Snippet is used to load and display AdQuire
				<br />
				* AdQuire Capture is used to retrieve and store form data users entered
			</p>
			<p id='separatingLines'></p>

			<h3> Advanced Settings </h3>
			<p>
				Mapping form fields to AdQuire fields
				<br />
				Enter your form fields so they can be mapped to AdQuire's form fields
				<br />
				Please do <strong> NOT </strong> fill with your personal information
			</p>

			<input
				type='button'
				id='btnInfoMappingFieldsToggle'
				value='Form Mapping'
			/>
			<!-- Temporary until we can automate the mapping -->
			<table class='form-table' id='mappingFieldsCore'>
				<tbody>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[adqcapture]'
								title='Shortlink page ID (http://sub.yourdomain.com/wp-admin/post.php?post=4)'
							>
								<?php _e(
									'Page ID to embed AdQuire Capture: ',
									'adqwp_domain'
								); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[adqcapture]'
								name='adqwp_settings[adqcapture]'
								type='number'
								placeholder='ex: 6'
								value="<?php print $adqwp_options['adqcapture']; ?>"
							/>
							<p>
								<b> Page ID </b> is the number associated with the Shortlink
								of the page where AdQuire Capture will be embedded
								(e.g. http://sub.yourdomain.com/wp-admin/post.php?post=4)
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label
								class='description'
								for='adqwp_settings[form]'
								title='HTML Selector of the HTML form'
							>
								<?php _e('Form selector: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[form]'
								name='adqwp_settings[form]'
								type='text'
								placeholder='ex: #form_id | .form_class'
								value="<?php print $adqwp_options['form']; ?>"
							/>
							<p>
								<b> Form </b> is the HTML ID or Class attribute for your form
								<br /> (Include # or . symbol)
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<p id='separatingLinesTwo'></p>
			<table class='form-table' id='mappingFields'>
				<tbody>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[first_name]'>
								<?php _e('First Name field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[first_name]'
								name='adqwp_settings[first_name]'
								type='text'
								placeholder='ex: first_name'
								value="<?php print $adqwp_options['first_name']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[last_name]'>
								<?php _e('Last Name field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[last_name]'
								name='adqwp_settings[last_name]'
								type='text'
								placeholder='ex: last_name'
								value="<?php print $adqwp_options['last_name']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[email]'>
								<?php _e('Email field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[email]'
								name='adqwp_settings[email]'
								type='text'
								placeholder='ex: email'
								value="<?php print $adqwp_options['email']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[gender]'>
								<?php _e('Gender field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[gender]'
								name='adqwp_settings[gender]'
								type='text'
								placeholder='ex: gender'
								value="<?php print $adqwp_options['gender']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row' id='dob'>
						<th>
							<label class='description' for='adqwp_settings[dob]'>
								<?php _e('Date of Birth field (full date): ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[dob]'
								name='adqwp_settings[dob]'
								type='text'
								placeholder='ex: dob'
								value="<?php print $adqwp_options['dob']; ?>"
							/>
							<br />
							<p>
								If you have a single field for the date of birth, use this
								field only; leave the rest blank
							</p>
						</td>
					</tr>
					<tr scope='row' id='dob_month'>
						<th>
							<label class='description' for='adqwp_settings[dob_month]'>
								<?php _e('Date of Birth - Month field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[dob_month]'
								name='adqwp_settings[dob_month]'
								type='text'
								placeholder='ex: dob_month'
								value="<?php print $adqwp_options['dob_month']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row' id='dob_day'>
						<th>
							<label class='description' for='adqwp_settings[dob_day]'>
								<?php _e('Date of Birth - Day field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[dob_day]'
								name='adqwp_settings[dob_day]'
								type='text'
								placeholder='ex: dob_day'
								value="<?php print $adqwp_options['dob_day']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row' id='dob_year'>
						<th>
							<label class='description' for='adqwp_settings[dob_year]'>
								<?php _e('Date of Birth - Year field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[dob_year]'
								name='adqwp_settings[dob_year]'
								type='text'
								placeholder='ex: dob_year'
								value="<?php print $adqwp_options['dob_year']; ?>"
							/>
							<br />
							<p>
								If instead, you have three separate fields for your
								date of birth; use dateofbirth-day, dateofbirth-month and
								dateofbirth-year
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[address1]'>
								<?php _e('Address 1 field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[address1]'
								name='adqwp_settings[address1]'
								type='text'
								placeholder='ex: address1'
								value="<?php print $adqwp_options['address1']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[address2]'>
								<?php _e('Address 2 field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[address2]'
								name='adqwp_settings[address2]'
								type='text'
								placeholder='ex: address2'
								value="<?php print $adqwp_options['address2']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[zipcode]'>
								<?php _e('Zipcode field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[zipcode]'
								name='adqwp_settings[zipcode]'
								type='text'
								placeholder='ex: zipcode'
								value="<?php print $adqwp_options['zipcode']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[city]'>
								<?php _e('City field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[city]'
								name='adqwp_settings[city]'
								type='text'
								placeholder='ex: city'
								value="<?php print $adqwp_options['city']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[state]'>
								<?php _e('State field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[state]'
								name='adqwp_settings[state]'
								type='text'
								placeholder='ex: state'
								value="<?php print $adqwp_options['state']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[phone]'>
								<?php _e('Phone Number field (full phone #): ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[phone]'
								name='adqwp_settings[phone]'
								type='text'
								placeholder='ex: phone'
								value="<?php print $adqwp_options['phone']; ?>"
							/>
							<br />
							<p>
								If you have a single field for the phone number, use this
								field only; leave the rest blank
							</p>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[phone1]'>
								<?php _e('Phone Number 1 field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[phone1]'
								name='adqwp_settings[phone1]'
								type='text'
								placeholder='ex: phone1'
								value="<?php print $adqwp_options['phone1']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[phone2]'>
								<?php _e('Phone Number 2 field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[phone2]'
								name='adqwp_settings[phone2]'
								type='text'
								placeholder='ex: phone2'
								value="<?php print $adqwp_options['phone2']; ?>"
							/>
						</td>
					</tr>
					<tr scope='row'>
						<th>
							<label class='description' for='adqwp_settings[phone3]'>
								<?php _e('Phone Number 3 field: ', 'adqwp_domain'); ?>
							</label>
						</th>
						<td>
							<input
								id='adqwp_settings[phone3]'
								name='adqwp_settings[phone3]'
								type='text'
								placeholder='ex: phone3'
								value="<?php print $adqwp_options['phone3']; ?>"
							/>
							<br />
							<p>
								If instead, you have three separate fields for your
								phone number; use phone1, phone2 and phone3
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<p class='submit'>
				<input
					type='submit'
					id='btnSubmitForm'
					class='button button-primary'
					value="<?php _e('Save', 'adqwp_domain'); ?>"
				/>
			</p>
		</form>
 	</div>
	 
<?php
}

/**
 * @param int|string $exit_url URL to redirect to or page_id of URL
 * @return bool
 */
function adqwp_exit_url_is_number($exit_url) {
	if (is_numeric(trim($exit_url))) {
		return true;
	}
	return false;
}

/**
 * If exit_url is a number, get the absolute URL of the page_id
 * and store it back into $adqwp_options
 */
function adqwp_check_exit_url() {
	global $adqwp_options;

	if (adqwp_exit_url_is_number($adqwp_options['exit_url'])) {
		$adqwp_options['exit_url'] = get_page_link($adqwp_options['exit_url']);
	}
}

add_action('admin_head', 'adqwp_check_exit_url');

/**
 * Adds AdQuire form to the top-level menu page (AdQuire)
 */
function adqwp_add_options_link() {
	add_menu_page(
		'AdQuire Settings',
		'AdQuire',
		'manage_options',
		'adqwp-options',
		'adqwp_options_page',
		plugins_url('/images/adquire.png', __FILE__)
	);
}

add_action('admin_menu', 'adqwp_add_options_link');

/**
 * Registers WP settings and sets it to adqwp_settings_group (from form)
 * to be used to sanitize and save data
 */
function adqwp_register_settings() {
	register_setting('adqwp_settings_group', 'adqwp_settings');
}

add_action('admin_init', 'adqwp_register_settings');

?>
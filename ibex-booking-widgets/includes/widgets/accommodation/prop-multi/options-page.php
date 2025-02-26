<p><a href="http://ibexplus.com/booking-page/multi-property/" target="_blank" class="button">Manual Instructions</a>
		<a href="http://ibexplus.com/booking-page/multi-property/" target="_blank" class="button">Demo</a></p>

<form action="options.php" method="post">
	<?php settings_fields('ibw-options-prop-multi')?>
	<?php do_settings_sections('ibw-options-prop-multi')?>
	
	<p class="submit"><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>
</form>

<hr class="hrt" />
		
		
<h3>Details</h3>
<p>The multi property booking screen displays a list of available properties under the account and then leads on to the single booking page screen for a property.</p>
<p>This page is embedded in your website, the guest never leaves.</p>

<h4>Code &amp; Options</h4>
<p>The booking page runs from a <a href="http://codex.wordpress.org/Shortcode" target="_blank">shortcode</a>, which is a block of code that can be pasted in posts, pages and text widgets.</p>
<p><code>[ibw-multi-bookingpage]</code></p>
<p>The following are a list of options available for this widget (use the generator further down to use the options).</p>
<table class="table widefat">
	<thead>
		<tr>
			<th class="">Option</th>
			<th class="manage-column">Name</th>
			<th class="manage-column">Required?</th>
			<th class="manage-column">Description</th>
			<th class="manage-column">Example</th>
			<th class="manage-column">Default</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>ru</td>
			<td>Company/Sales Channel</td>
			<td></td>
			<td>Also known as a "Registered User". This is the id/name of the company/sales channel the booking page should use. Using this can limit/change the rooms/prices avaiable for display. If nothing is specified then it will default to your standard account.</td>
			<td>mycustomcompany</td>
			<td>Your Operator ID</td>
		</tr>
		<tr class="alternate">
			<td>width</td>
			<td>Booking Frame Width</td>
			<td></td>
			<td>How wide to set the frame the booking page loads in. Defaults to 100%. Can take % values or pixles (eg 600px).</td>
			<td>500px</td>
			<td>100%</td>
		</tr>
		<tr>
			<td>height</td>
			<td>Booking Frame Height</td>
			<td></td>
			<td>The booking page will try to size itself correctly, but if it fails it will default to this height. Cak take % or pixles, we suggest pixles though.</td>
			<td>825px</td>
			<td>600px</td>
		</tr>
	</tbody>
</table>

<hr class="hrt" />

<h3>Generator</h3>
<p>Fill out the following fields and at the bottom the shortcode you want will be generated.</p>

<table class="form-table ibw-generator-form" data-base="ibw-multi-bookingpage" data-target="#multi-prop-generator-code">
	<tbody>
		<tr>
			<th scope="row">Company/Sales Channel</th>
			<td><input type="text" value="" placeholder="none" data-field="ru" data-format="^[\d\w\s]+$" class="generator-field"><br /><span class="description">Filter on a specific company or sales channel</span></td>
		</tr>
		<tr>
			<th scope="row">Width</th>
			<td><input type="text" value="" placeholder="100%" data-field="width" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="px"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Height</th>
			<td><input type="text" value="" placeholder="600px" data-field="height" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="%"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
	</tbody>
</table>

<h4>Results</h4>
<p><input type="text" id="multi-prop-generator-code" class="shortcode-result" readonly="readonly" data-original="Please fill out the form above" value="Please fill out the form above" /></p>
<p><a href="http://ibexplus.com/booking-page/single-property/" target="_blank" class="button">Manual Instructions</a>
		<a href="http://ibexplus.com/booking-page/single-property/" target="_blank" class="button">Demo</a></p>

<form action="options.php" method="post">
	<?php settings_fields('ibw-options-prop-single')?>
	<?php do_settings_sections('ibw-options-prop-single')?>

	<p class="submit"><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>
</form>

<hr class="hrt" />


<h3>Details</h3>
<p>The single property booking screen is the main booking screen for iBex accommodation accounts. A single property lists all of its available rooms and a guest is able to book directly from it.</p>
<p>This page is embedded in your website, the guest never leaves.</p>

<p>To use this widget you need to know which property you want to load. If you have multiple properties you want guests to choose from before booking, then you want the multi property booking widget instead.</p>

<h4>Code &amp; Options</h4>
<p>The booking page runs from a <a href="http://codex.wordpress.org/Shortcode" target="_blank">shortcode</a>, which is a block of code that can be pasted in posts, pages and text widgets.</p>
<p><code>[ibw-bookingpage pid="xxxx"]</code></p>
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
			<td>pid</td>
			<td>Property ID</td>
			<td>Yes</td>
			<td>The ID of the property to show the booking page for.</td>
			<td>1234</td>
			<td></td>
		</tr>
		<tr class="alternate">
			<td>ru</td>
			<td>Company/Sales Channel</td>
			<td></td>
			<td>Also known as a "Registered User". This is the id/name of the company/sales channel the booking page should use. Using this can limit/change the rooms/prices avaiable for display. If nothing is specified then it will default to your standard account.</td>
			<td>mycustomcompany</td>
			<td>Your Operator ID</td>
		</tr>
		<tr>
			<td>width</td>
			<td>Booking Frame Width</td>
			<td></td>
			<td>How wide to set the frame the booking page loads in. Defaults to 100%. Can take % values or pixles (eg 600px).</td>
			<td>500px</td>
			<td>100%</td>
		</tr>
		<tr class="alternate">
			<td>height</td>
			<td>Booking Frame Height</td>
			<td></td>
			<td>The booking page will try to size itself correctly, but if it fails it will default to this height. Cak take % or pixles, we suggest pixles though.</td>
			<td>825px</td>
			<td>600px</td>
		</tr>
		<tr>
			<td>rmtype</td>
			<td>Property Room Types</td>
			<td></td>
			<td>A comma seperated list of room types IDs to filter the booking screen on</td>
			<td>12347,654987,12345</td>
			<td></td>
		</tr>
	</tbody>
</table>

<hr class="hrt" />

<h3>Generator</h3>
<p>Fill out the following fields and at the bottom the shortcode you want will be generated.</p>

<table class="form-table ibw-generator-form" data-base="ibw-bookingpage" data-target="#single-prop-generator-code">
	<tbody>
		<tr>
			<th scope="row">Property ID</th>
			<td><input type="text" value="" placeholder="Property ID (required)" data-field="pid" data-format="^(\d+|auto)$" data-required="true" class="generator-field"><br /><span class="description">Property ID to use</span></td>
		</tr>
		<tr>
			<th scope="row">Company/Sales Channel</th>
			<td><input type="text" value="" placeholder="none" data-field="ru" data-format="^[\d\w\s]+$" class="generator-field"><br /><span class="description">Filter on a specific company or sales channel</span></td>
		</tr>
		<tr>
			<th scope="row">Width</th>
			<td><input type="text" value="" placeholder="100%" data-field="width" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="%"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Height</th>
			<td><input type="text" value="" placeholder="600px" data-field="height" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="px"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Room Types</th>
			<td><input type="text" value="" placeholder="" data-field="rmtype" data-format="^([\d,])+$" class="generator-field"><br /><span class="description">Filter on specific room types</span></td>
		</tr>
	</tbody>
</table>

<h4>Results</h4>
<p><input type="text" id="single-prop-generator-code" class="shortcode-result" readonly="readonly" data-original="Please fill out the form above" value="Please fill out the form above" /></p>

<hr class="hrt" />

<h3>Advanced Feature</h3>
<p>If you specify <code>auto</code> as the property ID, then the page will look for a parameter called <code>pid</code> passed in and use that.</p>
<p>Eg: <code>http://mysite.example.com/booking-page?pid=1234</code> would use 1234 as the pid, while <code>http://mysite.example.com/booking-page?pid=5555</code> would use 5555.</p>
<p>This is useful in cases where you have multiple properties listed under one account, but want to have a single copy of the booking page and want to hard-code links to it.</p>
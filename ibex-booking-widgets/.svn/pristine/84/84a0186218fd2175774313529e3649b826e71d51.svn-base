<p><a href="http://ibexplus.com/widgets/rate-calendar/" target="_blank" class="button">Manual Instructions</a>
		<a href="http://ibexplus.com/widgets/rate-calendar/rate-calendar-demo/" target="_blank" class="button">Demo</a></p>
		
<h3>Details</h3>
<p>The last minute rate calendar widget shows what rooms/rates are available within the next few days. When clicking on a particular room/rate & date the bookings page will load with the room/rate & dates selected.</p>

<p>To use this widget you need to know which property you want to load.</p>

<h4>Code &amp; Options</h4>
<p>The rates calendar runs from a <a href="http://codex.wordpress.org/Shortcode" target="_blank">shortcode</a>, which is a block of code that can be pasted in posts, pages and text widgets.</p>
<p><code>[ibw-ratescalendar pid="xxx"]</code></p>
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
			<td>The ID of the property to show the calendar for.</td>
			<td>1234</td>
			<td></td>
		</tr>
		<tr class="alternate">
			<td>ru</td>
			<td>Company/Sales Channel</td>
			<td></td>
			<td>Also known as a "Registered User". This is the id/name of the company/sales channel the calendar page should use. Using this can limit/change the rooms/prices avaiable for display. If nothing is specified then it will default to your standard account.</td>
			<td>mycustomcompany</td>
			<td>Your Operator ID</td>
		</tr>
		<tr>
			<td>width</td>
			<td>Width</td>
			<td></td>
			<td>How wide to set the frame the calendar loads in. Can take % values or pixles (eg 600px).</td>
			<td>500px</td>
			<td>700px</td>
		</tr>
		<tr class="alternate">
			<td>height</td>
			<td>Height</td>
			<td></td>
			<td>The calendar will try to size itself correctly, but if it fails it will default to this height. Cak take % or pixles, we suggest pixles though.</td>
			<td>825px</td>
			<td>400px</td>
		</tr>
		<tr>
			<td>allminstays</td>
			<td>Show All Min Stays</td>
			<td></td>
			<td>If true, all min stay values for each rate are shown. If false, only the first found value is shown for each day.</td>
			<td>true</td>
			<td>true</td>
		</tr>
		<tr class="alternate">
			<td>hideunavailableminstays</td>
			<td>Hide Unavailable Min Stays</td>
			<td></td>
			<td>If true and Show All Min Stays is true, then any min stays with no rate values are hidden.</td>
			<td>true</td>
			<td>true</td>
		</tr>
		<tr>
			<td>showmaxguests</td>
			<td>Show Max Guests</td>
			<td></td>
			<td>If true, the number of max guests will be shown for each rate on the calendar.</td>
			<td>true</td>
			<td>true</td>
		</tr>
		<tr class="alternate">
			<td>showratename</td>
			<td>Show Rate Name</td>
			<td></td>
			<td>If true, then the rate name column will be shown on the calendar.</td>
			<td>true</td>
			<td>true</td>
		</tr>
		<tr>
			<td>dateoffset</td>
			<td>Start Offset</td>
			<td></td>
			<td>Number of days to start the calendar from. Defaults to today (0).</td>
			<td>12</td>
			<td>0</td>
		</tr>
		<tr class="alternate">
			<td>days</td>
			<td>Days to Show</td>
			<td></td>
			<td>The number of days to show on the calendar. Defaults to 7.</td>
			<td>14</td>
			<td>7</td>
		</tr>
		<tr>
			<td>target</td>
			<td>Target Page</td>
			<td></td>
			<td>The ID of the page that should be loaded when this widget is used. Leave blank to use the default booking page.</td>
			<td>1234</td>
			<td></td>
		</tr>
		<tr>
			<td>theme</td>
			<td>Theme</td>
			<td></td>
			<td>The theme to apply.</td>
			<td><?php echo join(', ', iBex_Widgets_Accommodation_SingleRatesCalendar::getThemes())?></td>
			<td>navy</td>
		</tr>
	</tbody>
</table>

<hr class="hrt" />

<h3>Generator</h3>
<p>Fill out the following fields and at the bottom the shortcode you want will be generated.</p>

<table class="form-table ibw-generator-form" data-base="ibw-ratescalendar" data-target="#ratescalendar-generator-code">
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
			<td><input type="text" value="" placeholder="700px" data-field="width" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="%"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Height</th>
			<td><input type="text" value="" placeholder="600px" data-field="height" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="px"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Show All Min Stays</th>
			<td><select class="generator-field" data-field="allminstays" data-format=".*" data-required="false">
				<option value="">True</option>
				<option value="false">False</option>
			</select></td>
		</tr>
		<tr>
			<th scope="row">Hide Unavailable Min Stays</th>
			<td><select class="generator-field" data-field="hideunavailminstays" data-format=".*" data-required="false">
				<option value="">True</option>
				<option value="false">False</option>
			</select></td>
		</tr>
		<tr>
			<th scope="row">Show Max Guests</th>
			<td><select class="generator-field" data-field="showmaxguests" data-format=".*" data-required="false">
				<option value="">True</option>
				<option value="false">False</option>
			</select></td>
		</tr>
		<tr>
			<th scope="row">Show Rate Name</th>
			<td><select class="generator-field" data-field="showratename" data-format=".*" data-required="false">
				<option value="">True</option>
				<option value="false">False</option>
			</select></td>
		</tr>
		<tr>
			<th scope="row">Start Date Offset</th>
			<td><input type="text" value="" placeholder="0" data-field="dateoffset" data-format="^\d+$" class="generator-field"></td>
		</tr>
		<tr>
			<th scope="row">Days to Show</th>
			<td><input type="text" value="" placeholder="7" data-field="days" data-format="^\d+$" class="generator-field"></td>
		</tr>
		<tr>
			<th scope="row">Target</th>
			<td><input type="text" value="" placeholder="" data-field="target" data-format="^(\d+|multi|https?://.*)$" class="generator-field"><br /><span class="description">ID of the target page (if different from default).</span></td>
		</tr>
		<tr>
			<th scope="row">Theme</th>
			<td><select class="generator-field" data-field="theme" data-format=".*" data-required="false">
				<option value="">Navy</option>
				<?php foreach(iBex_Widgets_Accommodation_SingleRatesCalendar::getThemes() as $theme){ if($theme == 'navy') continue; ?>
				<option value="<?php echo $theme?>"><?php echo ucfirst($theme)?></option>
				<?php } ?>
			</select></td>
		</tr>
	</tbody>
</table>

<h4>Results</h4>
<p><input type="text" id="ratescalendar-generator-code" class="shortcode-result" readonly="readonly" data-original="Please fill out the form above" value="Please fill out the form above" /></p>

<hr class="hrt" />

<h3>Advanced Feature</h3>
<p>If you specify <code>auto</code> as the property ID, then the page will look for a parameter called <code>pid</code> passed in and use that.</p>
<p>Eg: <code>http://mysite.example.com/last-minute-rates?pid=1234</code> would use 1234 as the pid, while <code>http://mysite.example.com/last-minute-rates?pid=5555</code> would use 5555.</p>
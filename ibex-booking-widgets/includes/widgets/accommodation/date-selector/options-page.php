<?php 

$dateSelector = iBex_Widgets_Accommodation_DateSelector::getInstance();
$themeSave = $dateSelector->runCustomForms();

?>

<p><a href="http://ibexplus.com/widgets/date-selector/" target="_blank" class="button">Manual Instructions</a>
		<a href="http://ibexplus.com/widgets/date-selector/" target="_blank" class="button">Demo</a></p>
		
<?php if(!get_option('ibw-option-prop-single-default-bp', false)){ ?>
<div class="error settings-error"> 
	<p><strong>Please setup & define the <a href="?page=ibex-widgets&widget=accommodation-prop-single">default property booking page</a> first.</strong></p>
</div>
<?php return; } ?>


<?php if($themeSave){ ?>
<div class="updated"> 
	<p>Theme saved successfully.</p>
</div>
<?php } ?>
		
<h3>Details</h3>
<p>Suited for the sidebar, it lets a guest pick a set of dates and search for availability.</p>

<h4>Code &amp; Options</h4>
<p><code>[ibw-dateselector]</code></p>
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
			<td>mode</td>
			<td>Mode</td>
			<td></td>
			<td>Either <code>horizontal</code> or <code>vertical</code>. Defaults to vertical if left out.</td>
			<td>horizontal</td>
			<td>vertical</td>
		</tr>
		<tr class="alternate">
			<td>text</td>
			<td>Button Text</td>
			<td></td>
			<td>Change the "Search Availability" text on the button.</td>
			<td>Search!</td>
			<td>Search Availability</td>
		</tr>
		<tr>
			<td>width</td>
			<td>Width</td>
			<td></td>
			<td>Adjust the width of the widget.</td>
			<td>500px</td>
			<td>100%</td>
		</tr>
		<tr class="alternate">
			<td>height</td>
			<td>Height</td>
			<td></td>
			<td>Adjust the height of the widget.</td>
			<td>825px</td>
			<td>120px</td>
		</tr>
		<tr>
			<td>target</td>
			<td>Target Page</td>
			<td></td>
			<td>The ID of the page that should be loaded when this widget is used. Leave blank to use the default booking page, or set to "multi" to use the multi-property booking page.</td>
			<td>1234</td>
			<td></td>
		</tr>
	</tbody>
</table>

<h3>Generator</h3>
<p>Fill out the following fields and at the bottom the shortcode you want will be generated.</p>

<table class="form-table ibw-generator-form" data-base="ibw-dateselector" data-target="#date-selector-generator-code" data-themeoverride="">
	<tbody>
		<tr>
			<th scope="row">Mode</th>
			<td><select class="generator-field" data-field="mode" data-format=".*" data-required="false">
				<option value="">Vertical</option>
				<option value="horizontal">Horizontal</option>
			</select></td>
		</tr>
		<tr>
			<th scope="row">Button Text</th>
			<td><input type="text" value="" placeholder="Search Availability" data-field="text" data-iscontent="true" data-format=".*" class="generator-field"></td>
		</tr>
		<tr>
			<th scope="row">Width</th>
			<td><input type="text" value="" placeholder="100%" data-field="width" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="%"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Height</th>
			<td><input type="text" value="" placeholder="120px" data-field="height" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="px"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Target</th>
			<td><input type="text" value="" placeholder="" data-field="target" data-format="^(\d+|multi|https?://.*)$" class="generator-field"><br /><span class="description">ID of the target page (if different from default). <code>multi</code> is also acceptable.</span></td>
		</tr>
	</tbody>
</table>

<h4>Results</h4>
<p><textarea id="date-selector-generator-code" class="shortcode-result" readonly="readonly" data-original="Please fill out the form above">Please fill out the form above</textarea></p>

<hr class="hrt" />

<h3>Theme</h3>
<p>Set the style of the date selector. Colours accept any hex code or listed <a href="http://www.w3schools.com/cssref/css_colornames.asp" target="_blank">css colour name</a>.</p>
<form action="" method="post">
	<input type="hidden" name="act" value="update_theme" />
	<input type="hidden" name="themeid" value="default" />
	
<table class="form-table">
<tr>
<?php 
$themeVals = get_option('ibw-dateselector-theme-default', array());
$i=0;foreach($dateSelector->getThemeOptions() as $k=>$v){ ?>
	<?php if($i > 0 && $i%4==0){ ?></tr><tr><?php } ?>
		<th style="font-weight:bold"><?php echo ucfirst(preg_replace('#([A-Z])#', ' \1', $k)) ?></th>
		<td><input type="text" name="theme[default][<?php echo $k?>]" class="themefield" placeholder="<?php echo $v?>" <?php if(isset($themeVals[$k]) && $themeVals[$k] != $v){ ?>value="<?php echo htmlentities($themeVals[$k]); ?>"<?php } ?> data-key="<?php echo $k?>" /></td>
<?php $i++; } ?>
</tr>
</table>
<p class="submit">
	<input name="save_theme" type="submit" class="button-primary" value="<?php esc_attr_e('Save Theme'); ?>" />
	<input name="default_theme" type="submit" class="button" value="<?php esc_attr_e('Restore Default'); ?>" />
</p>
</form>
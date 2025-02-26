<?php 

$miniCalendar = iBex_Widgets_Accommodation_MiniCalendar::getInstance();
$themeSave = $miniCalendar->runCustomForms();

?>

<p><a href="http://ibexplus.com/widgets/mini-calendar/" target="_blank" class="button">Manual Instructions</a>
		<a href="http://ibexplus.com/widgets/mini-calendar/" target="_blank" class="button">Demo</a></p>
		
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
<p>Suited for the sidebar, it lets a guest pick a date on a basic calendar which shows an indication of availability.</p>

<h4>Code &amp; Options</h4>
<p><code>[ibw-minicalendar pid="xxx"]</code></p>
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
			<td>width</td>
			<td>Width</td>
			<td></td>
			<td>Adjust the width of the widget.</td>
			<td>230px</td>
			<td>230px</td>
		</tr>
		<tr>
			<td>height</td>
			<td>Height</td>
			<td></td>
			<td>Adjust the height of the widget.</td>
			<td>260px</td>
			<td>260px</td>
		</tr>
		<tr class="alternate">
			<td>target</td>
			<td>Target Page</td>
			<td></td>
			<td>The ID of the page that should be loaded when this widget is used. Leave blank to use the default booking page.</td>
			<td>1234</td>
			<td></td>
		</tr>
	</tbody>
</table>

<h3>Generator</h3>
<p>Fill out the following fields and at the bottom the shortcode you want will be generated.</p>

<table class="form-table ibw-generator-form" data-base="ibw-minicalendar" data-target="#date-selector-generator-code" data-themeoverride="">
	<tbody>
		<tr>
			<th scope="row">Property ID</th>
			<td><input type="text" value="" placeholder="Property ID (required)" data-field="pid" data-format="^(\d+|auto)$" data-required="true" class="generator-field"><br /><span class="description">Property ID to use</span></td>
		</tr>
		<tr>
			<th scope="row">Width</th>
			<td><input type="text" value="" placeholder="230px" data-field="width" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="%"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr>
			<th scope="row">Height</th>
			<td><input type="text" value="" placeholder="260px" data-field="height" data-format="^\d+(em|px|%)?$" class="generator-field" data-defaultunit="px"><br /><span class="description">Must have a unit after it, eg 500px or 100%</span></td>
		</tr>
		<tr style="display:none">
			<th scope="row">Target</th>
			<td><input type="text" value="" placeholder="" data-field="target" data-format="^(\d+|https?://.*)$" class="generator-field"><br /><span class="description">ID of the target page. Only required if you're using a different page from the default.</span></td>
		</tr>
	</tbody>
</table>

<h4>Results</h4>
<p><textarea id="date-selector-generator-code" class="shortcode-result" readonly="readonly" data-original="Please fill out the form above">Please fill out the form above</textarea></p>

<hr class="hrt" />

<h3>Theme</h3>
<p>Set the style of the mini calendar. Colours accept any hex code or listed <a href="http://www.w3schools.com/cssref/css_colornames.asp" target="_blank">css colour name</a>.</p>
<form action="" method="post">
	<input type="hidden" name="act" value="update_theme" />
	<input type="hidden" name="themeid" value="default" />
	
<table class="form-table">
<tr>
<?php 
$themeVals = get_option('ibw-minicalendar-theme-default', array());
$i=0;foreach($miniCalendar->getThemeOptions() as $k=>$v){ ?>
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
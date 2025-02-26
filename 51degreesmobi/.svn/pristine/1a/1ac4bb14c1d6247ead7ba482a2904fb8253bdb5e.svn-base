<?php

/* *********************************************************************
 * This Source Code Form is copyright of 51Degrees Mobile Experts Limited. 
 * Copyright 2014 51Degrees Mobile Experts Limited, 5 Charlotte Close,
 * Caversham, Reading, Berkshire, United Kingdom RG4 7BY
 * 
 * This Source Code Form is the subject of the following patent 
 * applications, owned by 51Degrees Mobile Experts Limited of 5 Charlotte
 * Close, Caversham, Reading, Berkshire, United Kingdom RG4 7BY: 
 * European Patent Application No. 13192291.6; and 
 * United States Patent Application Nos. 14/085,223 and 14/085,301.
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0.
 * 
 * If a copy of the MPL was not distributed with this file, You can obtain
 * one at http://mozilla.org/MPL/2.0/.
 * 
 * This Source Code Form is "Incompatible With Secondary Licenses", as
 * defined by the Mozilla Public License, v. 2.0.
 * ********************************************************************* */
 
 /*
	Plugin Name: 51Degrees Mobile Device Detector
	Plugin URI: http://51degrees.com/Support/Documentation/PHP/Distributions/Wordpress.aspx
	Description: Uses the 51Degrees Device Detector to find out what device the end user is viewing your site on. You can access the variable using $_51d. See the documentation for full information on how to use.
	Version: 3.1.6.1
	Author: 51Degrees
	Author URI: http://51Degrees.com
	License: This Source Code Form is subject to the terms of the Mozilla Public License, v. 2.0. If a copy of the MPL was not distributed with this file, You can obtain one at http://mozilla.org/MPL/2.0/. This Source Code Form is "Incompatible With Secondary Licenses", as defined by the Mozilla Public License, v. 2.0.
*/

$dir = dirname(__FILE__);
global $fiftyone_degrees_return_strings;
$fiftyone_degrees_return_strings = TRUE;
require_once $dir.'/51Degrees/51Degrees.php';

require_once $dir.'/51Degrees/51Degrees_metadata.php';

if (get_option('51d_enable_udp'))
	@include_once $dir.'/51Degrees/51Degrees_usage.php';

/**
	Prints the javascript essential to get the 51Degrees admin menu to work.
*/
function _51d_print_javascript() {
	?>
<script type="text/javascript" src="<?php echo plugins_url()."/51degreesmobi/51Degrees/51Degrees_update.js"; ?>" ></script>
<script type="text/javascript" >
	// toggles if the advanced section is visible
	function toggleAdvanced() {
		var adv_prop = document.getElementById('advanced_properties');
		var adv_toggle = document.getElementById('adv_toggle');
		if(adv_prop.style.display != 'none')
		{
			adv_prop.style.display = 'none';
			adv_toggle.value = 'Show';
		}
		else
		{
			adv_prop.style.display = 'block';
			adv_toggle.value = 'Hide';
		}return false;
	}

	// toggles if a rows is active in the advanced property section.
	function toggleRow(ev) {
		var valuesSelect = document.getElementById(ev.srcElement.id.replace('check_', '51d_cond_'));
		if(valuesSelect != null)
		{
			if(ev.srcElement.checked)
				valuesSelect.removeAttribute("disabled");
			else
				valuesSelect.disabled = "disabled";
		}
		else
			console.log('no values object with that name.');
	}

	function updateKey() {
		var key = (document.getElementById('_51d_license_text').value);
		var url = "<?php echo add_query_arg('51D_LicenseKey', 'KEY_HERE'); ?>";

		var keyPost = new XMLHttpRequest();
		keyPost.onreadystatechange = function () {
			if(keyPost.readyState == 4 && keyPost.status == 200) {
				getDataUpdate();
			}
		}
		keyPost.open('GET', url.replace("KEY_HERE", key));
		keyPost.send();
	}
	
	function getDataUpdate() {
		document.getElementById("51d_message_update").style.display = "inline";
		document.getElementById("51d_admin_panel").style.display = "none";
		
		scrollTo(0, 0);
		
		fiftyone_degrees_update_location = "<?php echo plugins_url()."/51degreesmobi/51Degrees/51Degrees_update.php"; ?>";
		fiftyone_degrees_start_updates();
		_request.onload = updatePendingFinish;
		
	}
	
	function getUpdateKey() {
		return document.getElementById('_51d_license_text').value;
	}
	
	function updatePendingFinish() {
		document.getElementById("51d_update_finished").style.display = "inline";
		if(_request.responseText === undefined || _request.responseText.length == 0) {
				var message = "The update procedure could not be launched, probably because the server does not support flushing.\n";
				message += "The update can be downloaded manually from ";
				message += "<a href=\"https://51degrees.com/Products/Downloads/Premium.aspx?LicenseKeys="+getUpdateKey()+"&Type=WordPress&Download=True\">51Degrees</a>.";
			}
		else
			var message = "Updating has finished. Press to go back to the admin page."
			
		document.getElementById("51d_update_status").innerHTML = message;
	}
	
	function updateFinished() {
		window.location.reload();
	}

	function checkRedirectText() {
		if(document.getElementById("theme_list").value == "_redirect")
			document.getElementById("redirect_text").style.display = "inline";
		else
			document.getElementById("redirect_text").style.display = "none";
	}
</script>
<?php
}

function _51d_submit_settings()
{
	update_option('51d_enable_udp', isset($_POST['51d_enable_udp']));
}

function _51d_submit_filter() {
	$updatedFilter = array();

	if(isset($_POST['_51D_Theme'])) {
		if($_POST['_51D_Theme'] == '_redirect')	{
			$updatedFilter['action'] = 'redirect';
			$updatedFilter['url'] = $_POST['_51D_RedirectionUrl'];
			unset($_POST['_51D_RedirectionUrl']);
		}
		else {
			$updatedFilter['action'] = 'theme';
			$updatedFilter['theme'] = @get_theme($_POST['_51D_Theme']);
		}
		unset($_POST['_51D_Theme']);
	}

	$conditions = array();
	foreach($_POST as $key => $value) {
		if(substr($key, 0, 10) == "_51d_cond_")
			$conditions[str_replace("_51d_cond_", "", $key)] = $value;
	}
			
	$updatedFilter['conditions'] = $conditions;

	$filters = get_option('51DFilterStore');
	if($filters == false)
		$filters = array();

	if($_POST['_51D_FilterName'] != $_POST['_51D_SubmitFilter']) { // renaming filter
		$newFilters = array();
		foreach($filters as $key => $filter) {
			if($key == $_POST['_51D_SubmitFilter'])
				$newFilters[$_POST['_51D_FilterName']] = $updatedFilter;
			else
				$newFilters[$key] = $filter;
		}
		$filters = $newFilters;
	}
	else
		$filters[$_POST['_51D_FilterName']] = $updatedFilter;

	update_option('51DFilterStore', $filters);
	header('Location: '.add_query_arg( 'filter', $_POST['_51D_FilterName'] ));
}

function _51d_print_admin_panel() {
	if(file_exists(dirname(__FILE__).'/51Degrees/51Degrees.php'))
	{
		_51d_print_javascript();

		?>
		
		<div id="51d_admin_panel" class="wrap">
			<h2>51Degrees Device Detection</h2>
      <form method="GET" >
        <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>" />
        <input type="hidden" name="_51D_NewFilter" value="true" />
        <input class="button-primary" type="submit" value="Create New Rule" />
      </form>
			<form id="_51DFilterMenu" class="update-nav-menu" method="post">
				<?php
					_51d_print_filters();
					echo '</form>';
					echo '<br/>';
          _51d_print_documentation();
          echo '<br />';
					_51d_print_settings();
					echo '<br />';
					_51d_print_license_section();
				?>
			</form>
		</div>
		<?php
		_51d_print_update_messages();
	}
	else
	{
		?>
		<div id="51d_admin_panel" class="wrap">
			<h2>51Degrees Device Detection</h2>
			<p>51Degrees Device Detection cannot run as the plugin is unable to write files. This is necessary to create the data files needed for
				detection and to install mobile friendly themes. Please enable file writing, or unzip the 51Degrees data file at 
				'<?php echo dirname(__FILE__).'/51Degrees.zip' ?>' to '<?php echo dirname(__FILE__); ?>' manually.
			</p>
			</div>
		<?php
	}
}

/**
	Creates a new filter, saves with the other filters and returns its name.
*/
function _51d_create_filter() {
	$filters = get_option('51DFilterStore');
	if($filters == false)
		$filters = array();

	$newFilter = array();
	$filterCount = count($filters);
	do {
		$filterCount++;
		$name = 'Rule '.$filterCount; // making sure that a filter with a new name is generated.
	} while(isset($filters[$name]));

	$newFilter['url'] = false;
	$filters[$name] = $newFilter;
	update_option('51DFilterStore', $filters);
	return $name;
}

function _51d_update_settings() {
	try {
		update_option("enable_51DUDP", $_REQUEST['enable_51DUDP'] == true);

		?>
			<div id="message" class="updated fade">
				<p>Options saved.</p>
			</div>

		<?php
	}
	catch (Exception $e) {
		?>

			<div id="message" class="updated fade">
				<p>Failed to save options. Error: <?php echo $e->get_message(); ?></p>
			</div>

		<?php
	}
}

function _51d_print_basic_properties($filter) {
	?>
	<div id="_51DDeviceConditions" style="border:1px solid; background-color:#ffffff; padding: 3px;">
	<?php
		global $_51d_meta_data;

		if (isset($filter['conditions']))
			$conditions = $filter['conditions'];
		else
			$conditions = array();

		// add a key and value here to add a property to the default field.
		$properties = array(
			"Mobile" => "IsMobile",
			"Small Screen Phone" => "IsSmallScreen",
			"SmartPhone" => "IsSmartPhone",
			"Tablet" => "IsTablet",
			"Console" => "IsConsole",
			"EReader" => "IsEReader");

		$propertyDescriptions = array(
			"IsMobile" => "Indicates that the device's primary data connection is wireless and is designed to operate mostly from battery power (ie a mobile phone, smart phone or tablet etc)",
			"IsSmallScreen" => "Is a mobile device with a screen size smaller than 2 1/2 inches.",
			"IsSmartPhone" => "Is a mobile device with a screen size larger then 2 1/2 inches running a modern smart phone operating system including Android, iOS, BlackBerry or Windows Phone.",
			"IsTablet" => "The manufacturer of the device sells the device primarily as a tablet.",
			"IsConsole" => "Indicates if the device is neither a phone or a computer/tablet (ie a games console or television).",
			"IsEReader" => "Indicates if the device is an e-reader.");

		// this array will contain default properties that are not in the current data set
		$absentProp = array();

		foreach($properties as $name => $property) {
			if(isset($_51d_meta_data[$property])) {
				echo '<input type="checkbox" value="True" name="_51d_cond_!'.$property.'"';

				if(isset($conditions['!'.$property]) && $conditions['!'.$property] == true)
					echo 'checked="checked"';

				echo '/> '.$name.'<p class="description">'.$propertyDescriptions[$property].'</p>';
			}
			else
				$absentProp[$name] = $property;
		}

		if(count($absentProp) > 0)
		{
	?>
		<br />
		<div id="disabled_properties" style="background-color: #F3F781;border-color: #000000;border-width:0.1em;border-style:solid; padding: 1em;">
			<p style="font-size:1.2em; font-weight:bold; color: red;">
				<a href="http://51degrees.com/Purchase/Wordpress.aspx" title="Upgrade to enable additional features." target="_blank">Enable these Options</a>
			</p>

	<?php

		foreach($absentProp as $name => $property) {
			echo '<input type="checkbox" disabled="disabled" /> '.$name;
			echo '<p class="description">'.$propertyDescriptions[$property].'</p>';
		}
	}
}

function _51d_print_license_section() {
global $_51d_meta_data;
	?>
    <div id=u"licensing" style="margin-left: 12px">
		<h3>Upgrade Device Data</h3>
		<p>If you have <a href="http://51degrees.com/Purchase/Wordpress.aspx" target="_blank" >purchased</a> a licence key for device data paste it into the text box below and select Update. This process requires your PHP environment to support file updates and outbound web connectivity.
		</p>
	<?php
		$license = get_option('_51d_license_text');
			
	?>
        Licence key: <input id="_51d_license_text" style="width:70%" type="text"
			value="<?php if($license) echo $license; else echo "Enter a licence key here."; ?>" />
        <br />
		<button id="51d_update_button" name="_51d_get_update" type="button" class="button-primary" onclick="updateKey()">Automatically Update</button>
		<?php if($license)
			echo "<a href='https://51degrees.com/Products/Downloads/Premium.aspx?LicenseKeys=$license&Type=PHP&Download=True'>Download Upgraded Plugin</a>";
		?>
		<p>You can also copy the licence key into the 
		<a href="https://51degrees.com/Products/Downloads/Premium.aspx" target="_blank">51Degrees.com Downloads page</a>
		and download an upgraded plugin preloaded with current device data. You must delete the currently installed version of this plugin before
		uploading the upgraded one. <a href="http://51degrees.com/Support/Documentation/PHP/Distributions/Wordpress.aspx" target="_blank">Learn More</a></p>
		<p>
      <?php echo "Data type: <i>{$_51d_meta_data["DatasetName"]}</i> Published: <i>{$_51d_meta_data["Date"]}</i>"; ?>
    </p>
    </div>
    <?php
}

function _51d_print_update_messages() {
	?>
	<div id="51d_message_update" style="display:none;">
        <div style="height: 40px;"></div>
		51Degrees Device Data now updating. This may take a few minutes. Please leave this page open.
		<p>
			<div id="update_message"></div>
		</p>
		<div id="51d_update_finished" style="display:none;" >
			<div id="51d_update_status"></div> <br />
			<button type="button" class="button-primary" onclick="updateFinished()">Back</button>
		</div>			
	</div>
	<?php
}

function _51d_print_filter_tab($index, $filters) {
	global $keys;
	$key = $keys[$index];
	$filter = $filters[$key];

	?>

    <div id="_51DFilterTab" class="menu-edit" style="border-color: #DFDFDF;
	-webkit-border-radius: 3px; border-radius: 3px; border-width: 1px; border-style: solid;">

		<div id="nav-menu-header">

			<table style="width:100%; height:100%; border-spacing: 0;">
				<th style="width:20%"/>
				<th style="width:80%"/>
				<tr>
					<td>
					</td>
					<td>
						<h3 style="font-size:1.5em">Device Type</h3>
					</td>
				</tr>
				<tr>
					<td>
					  When a device is:
					</td>
					<td>
						<h3>Basic Properties</h3>
            <p>A device that matches any one of these rules will be actioned upon.<p>
						<?php _51d_print_basic_properties($filter); ?>
					</td>
				</tr>
				<tr>
					<td>
						Or has all of the selected features:
					</td>
					<td>
						<div>
              <h3 style="float: left" >Advanced Properties </h3>
               <input id="adv_toggle" class="button-primary" type="button" onclick="toggleAdvanced()" value="Show" style="margin: 0.8em; margin-bottom: 1em;" />
            </div>
						<div id="advanced_properties" style="display:none">
            <p>A device must match all of the values selected here to redirected.<p>

							<div id="advanced_properties_table" style="height:400px; border-color: #000000; border: 1px solid; overflow-y:scroll; background-color:#ffffff;">
								<!-- makes the property values appear more presentable -->
								<style type="text/css">
									.maxWidth{ width: 100%; }
								</style>

								<table style="width: 99%; border-spacing: 0px">
									<th style="background-color:#dddddd;">Enabled</th>
									<th style="width: 50%; background-color:#dddddd;">Property</th>
									<th style="width: 50%; background-color:#dddddd;">Value</th>
									<?php
										if (isset($filter['conditions']))
											$conditions = $filter['conditions'];
										else
											$conditions = array();
										global $_51d_meta_data;
										if(isset($_51d_meta_data)) {
											$toggle = false;
											foreach($_51d_meta_data as $dataKey => $data) {
                                                if($dataKey == 'DatasetName' || $dataKey == 'Date')
													continue;
												if($toggle)
													echo '<tr style="background-color:#dddddd;">';
												else
													echo '<tr style="background-color:#ffffff;">';
												$toggle = !$toggle;
												
												$current_value = false;
												$has_value = false;
												if (array_key_exists($dataKey, $conditions)) {
													$current_value = $conditions[$dataKey];
													$has_value = true;
												}

												if ($has_value) {
													$checked_attr = ' checked="checked"';
													$disabled_attr = ' ';
												}
												else {
													$checked_attr = ' ';
													$disabled_attr = ' disabled="disabled"';
												}
												echo '<td><input id="check_'.$dataKey.'" type="checkbox"'.$checked_attr.' onclick="toggleRow(event)"/></td>';
												echo '<td>'.$dataKey.' <img title="'.$data['Description'].'" src="'.plugin_dir_url( $file ).'51degreesmobi/help.png" /></td>';
												echo '<td>';
													echo '<select id="51d_cond_'.$dataKey.'" name="_51d_cond_'.$dataKey.'" class="maxWidth"'.$disabled_attr.' >';
													
														foreach ($data['Values'] as $valueKey => $value) {
															if ($has_value && $current_value === $valueKey)
																$select_attr = ' selected="selected"';
															else
																$select_attr = ' ';
															echo '<option value="'.$valueKey.'"'.$select_attr.' >'.$valueKey.'</option>';
														}
													echo '</select>';
												echo '</td>';
											echo '</tr>';
											}
										}
										else
											echo '<td>No properties found. Your 51Degrees installation maybe missing some files.</td>';

									?>
								</table>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<h3 style="font-size:1.5em">Action</h3>
					</td>
				</tr>
				<tr>
					<td>Then change theme to</td>
					<td>
            <p>Choose what action to use when a device has been matched. A device can be redirected to
            any webpage (even beyond this site) or served any theme you have installed.<p>
						<select id="theme_list" name="_51D_Theme" style="width:40%" onclick="checkRedirectText()">
							<?php
								// sort themes alphabetically
								$themes = array();
								foreach(@get_themes() as $theme) {
									$themes[] = $theme;
								}
								asort($themes);
								foreach($themes as $theme) {
									echo '<option';
									if(isset($filter['theme']['Name']) && $filter['theme']['Name'] == $theme['Name'])
										echo ' selected="selected"';
									echo ' value="'.$theme['Name'].'">';
									echo $theme['Name'];
									echo '</option>';
								}

								echo '<option value="_redirect"';
								if(isset($filter['action']) && $filter['action'] == 'redirect')
									echo ' selected="selected"';
								echo '>[Redirect to url]</option>';
							?>
						</select>
						<input id="redirect_text" type="text" name="_51D_RedirectionUrl" style="width:40%;display:none" <?php if(isset($filter['url'])) echo ' value="'.$filter['url'].'"'; ?> />
						<script text="javascript">checkRedirectText();</script>
						<p style="font-size:1.2em; font-weight:bold; color: red;">
							<a href="http://51degrees.com/Purchase/Wordpress/Themes.aspx" target="_blank" title="Find more mobile aware themes">Get more Themes</a>
						</p>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			<button name="_51D_SubmitFilter" class="button-primary" type="submit" value="<?php echo $key; ?>">Save Rule</button>
			<a href="
				<?php echo add_query_arg('DeleteFilter', $key); ?>" onclick="return confirm('Are you sure you want to delete this rule?')">Delete
			</a>

			<div style="height:10px" ></div>
		</div>
    </div>
    <?php
}

function _51d_print_filters() {
	echo '<div id="_51DFilterTabs">';

	$filters = get_option('51DFilterStore');

	if ($filters == false || count($filters) == 0)
		echo 'No rules have been created. Click the button above to create your first redirection rule.';
	else {
		$keys = array_keys($filters);
		$GLOBALS['keys'] = &$keys;
		if(isset($_GET["filter"]) && isset($filters[$_GET["filter"]]))
			$selectedTab = $_GET["filter"];
		else
			$selectedTab = $keys[0];
	?>
    <p>
    Use this screen to create rules that control if devices are sent to another page or served a different theme based
    on what kind of devices they are. Multiple rules can be created to do different things with different devices.
    </p>
    <div class="nav-tabs-nav" style="margin-top: 0px; margin-right: 20px; margin-bottom: 0px; margin-left: 20px;">
		<div style="nav-tabs-wrapper" style="padding: 0px; margin-right: -268px; margin-left: 0px; ">

			<script type="text/javascript">
				function dragOver(ev) {
					ev.toElement.style.width = "100px";
				}

				function dragStart(ev) {
					ev.toElement.style.display = "hidden";
				}
			</script>
        <?php

		foreach($keys as $index => $key) {
			if($selectedTab == $key) {
				echo '<span draggable="true" class="nav-tab nav-tab-active">';

				if($index != 0)
					echo '<a title="Decrease Priority" style="text-decoration: none" href="'.add_query_arg('ShiftFilter', $keys[$index - 1]) .'"><strong>&lt;</strong></a>    ';

				echo '<input style="width:80px" type="text" name="_51D_FilterName" value="'.$key.'"/>';

				if($index == count($keys) - 2)
					echo '    <a title="Increase Priority" style="text-decoration: none" href="'.add_query_arg('ShiftFilter', '_LAST') .'"><strong>&gt;</strong></a>';
				else if($index < count($keys) - 2)
					echo '    <a title="Increase Priority" style="text-decoration: none" href="'.add_query_arg('ShiftFilter', $keys[$index + 1]) .'"><strong>&gt;</strong></a>';

				echo '</span>';
				$keyIndex = $index;
			}
			else {
				echo '<a href="'.add_query_arg('filter', $key).'" draggable="true" ondragstart="dragStart(event)" class="nav-tab">'.$key.'</a>';
			}
			echo '<div class="tab_spacers" style="width:5px; display:inline-block" ondragover="dragOver(event)"></div>';
		}

		echo '</div>';
		echo '</div>';//end of tabs
		_51d_print_filter_tab($keyIndex, $filters);
	}

	echo '</div>';
}

function _51d_print_settings() {
	if(get_option('enable_51DUDP'))
		$udp_enabled = 'checked="checked"';
	?>

        <div id="_51DGlobalSettings" style="margin-left: 12px" >
			<h3>Global Settings</h3>
			<p>These settings control 51Degrees Device Detection on all pages in the site.</p>
			<form id="_51DGlobalSettingsMenu" method="post">

				<p>
					<input type="checkbox" name="51d_enable_udp" <?php if(get_option('51d_enable_udp')) echo 'checked="checked"'; ?> />
					Share usage data with 51Degrees. <a href="http://51degrees.com/Support/FAQs/UsageData.aspx">Learn More</a>
				</p>
				<p>
					<button name="_51D_SubmitGlobalSettings" class="button-primary" type="submit">Submit</button>
				</p>
			</form>
		</div>
	<?php
}

function _51d_print_documentation() {
  ?>
    <div style="margin-left: 12px" >
    <h3>Documentation</h3>
    <p>For assistance, refer to help tab at the top of this page. You can also use the tooltips, or see
    our <a href="http://51degrees.com/Support/Documentation/PHP/Distributions/Wordpress.aspx">user guide</a> and 
    <a href="http://51degrees.com/Support/Forum.aspx">support forum</a>.</p>
    </div>
    <?php
}

function _51d_add_admin_menu() {
	$options_page = add_menu_page('51Degrees.mobi','51Degrees.mobi','manage_options', __FILE__,'_51d_print_admin_panel');

	add_action('load-'.$options_page, '_51d_admin_menu_preprocess');
}

function _51d_admin_menu_preprocess() {

	//A new filter is to be created
	if(isset($_GET['_51D_NewFilter'])) {
		$newFilter = _51d_create_filter();
		//redirect to new filter location
		$newUrl = remove_query_arg('filter');
		header( 'Location:'.str_replace('_51D_NewFilter=true', 'filter='.$newFilter, $newUrl)) ;
		exit;
	}

	if(isset($_GET["51D_LicenseKey"])) {
		update_option('_51d_license_text', $_GET["51D_LicenseKey"]);
		file_put_contents(dirname(__FILE__)."/51Degrees/license.lic", $_GET["51D_LicenseKey"]);
		exit;
	}
	
	if(isset($_POST['_51D_SubmitFilter'])) {
		_51D_Submit_Filter();
		exit;
	}

	if(isset($_POST['_51D_SubmitGlobalSettings'])) {
		_51d_submit_settings();
	}

	if(isset($_GET['ShiftFilter']) && isset($_GET['filter'])) {
		$filters = get_option('51DFilterStore');

		// The key of the filter moved by the user
		$insertedFilterKey = $_GET['filter'];

		// The key of the filter that is being displaced by the insertedFilter
		$shiftedFilterKey = $_GET['ShiftFilter'];

		if($shiftedFilterKey != null && $insertedFilterKey != null) {
			$newFilters = array();
			foreach($filters as $key => $filter) {
				if($key == $insertedFilterKey)
					continue;
				if($key == $shiftedFilterKey)
					$newFilters[$insertedFilterKey] = $filters[$insertedFilterKey];
				$newFilters[$key] = $filters[$key];
			}
			if($shiftedFilterKey == '_LAST')
				$newFilters[$insertedFilterKey] = $filters[$insertedFilterKey];

			update_option('51DFilterStore', $newFilters);
			header('Location: '.remove_query_arg('ShiftFilter'));
		}
	}

	if(isset($_GET['DeleteFilter'])) {
		$filters = get_option('51DFilterStore');
		if($filters != false) {
			if(isset($filters[$_GET['DeleteFilter']])) {
				unset($filters[$_GET['DeleteFilter']]);
				update_option('51DFilterStore', $filters);
			}
		}
		$newUrl = remove_query_arg('DeleteFilter');
		header('Location: '.remove_query_arg('filter', $newUrl));
		exit;
	}

	// help section only supported in 3.3+
	global $wp_version;
	$version = (float)substr($wp_version, 0, 3);

	if($version >= 3.3) {

		// The POSTS have been dealt with, add help to options screen
		$screen = get_current_screen();

		// Add as many tabs as necessary
		$screen->add_help_tab( array(
			'id'	=> 'property_help_overview',
			'title'	=> __('Overview'),
			'content'	=> '<p><strong>' . __('Detection') . '</strong> - ' .
                  __('This plugin contains a small database capable of determining the requesting device\'s properties ' .
                     'extremely quickly using the finger prints (technically called useragents) sent by web browsers.') . '</p>' .
                     '<p><strong>' . __('Optimisation') . '</strong> - ' .
                  __('Knowledge of the requesting device\'s capabilities enables the theme to be tailored to the device, or ' .
                     'the request redirected to another web site. For example; rules can be defined to treat small screen ' .
                     'mobile devices, smartphones and tablets differently from each other. Adverts could be optimised for the ' .
                     'smaller screens, or content limited to the essential parts of a page.') . '</p>'
		) );

		$screen->add_help_tab( array(
			'id'	=> 'property_help_rules',
			'title'	=> __('Rules'),
			'content'	=> '<p>' . __(
						'At the top of the settings page are the rules tabs. Select Create Rule to add the first rule. Select ' .
						'the tab name to change it to something more meaningful to you.'
						) . '</p>' . '<p>' . __(
						'Select the + symbol to add additional rules.' 
						) . '</p>' . '<p>' . __(
						'Rules are evaluated in order from left to right. The first one which matches the requesting device ' .
						'is used to control the response.'
						) . '</p>'
		) );

		$screen->add_help_tab( array(
			'id'	=> 'property_help_device_type',
			'title'	=> __('Device Type'),
			'content'	=> '<p>' . __(
						'Below the Rules tabs are tick boxes for basic properties that can be used to adjust which types of ' .
						'devices will be affected by the rule. Selecting one or more of these property tick boxes associates ' .
						'the rule to the device type. For example; to apply a rule to Tablet devices only you would select the ' .
						'Tablet tick box and none of the others.'
						) . '</p>' . '<p>' . __(
						'Within the Advanced Properties section it is possible to customise the rule using more ' .
						'properties. For example; if you would like your rule to apply to devices with a screen resolution ' .
						'of 800x480 pixels then you would select the IsMobile, ScreenPixelsHeight and ScreenPixelsHeight ' .
						'tickboxes and set their Value boxes to True, 800 and 480 respectively.'
						) . '</p>'

		) );

		$screen->add_help_tab( array(
			'id'	=> 'property_help_action',
			'title'	=> __('Action'),
			'content'	=> '<p>' . __(
						'The action controls how the site responds to requests from matching devices.' .
						'Two possible actions are available:'
						) .	'</p>' . '<ol>' . '<li>' .  __(
						'Change the theme to one more suited to the requesting devices capabilities. For example; on a small ' .
						'screen devices removes less important content, or displays mobile optimised adverts.'
						) . '</li>' . '<li>' . __(
						'Redirect the request to another web site more suited to the device.'
						) . '</li>' . '</ol>' . '<p>' . __(
						'A drop down list in the Action area contains a list of all the installed themes. One of these can be ' .
						'chosen for use with the rule. Alternatively the [Redirect to url] option can be selected and a text ' .
						'box will appear to the right of the drop down list. This is where a new Url can be placed to redirect ' .
						'all requests from devices matching the rule.'
						) . '</p>'
		) );
		
		$screen->set_help_sidebar(
			__('<strong>For more information:</strong> 
			<p><a href="http://51degrees.com/Products/DeviceData.aspx" target="_blank">Overview</a></p>
			<p><a href="http://51degrees.com/Support/Documentation/PHP/Distributions/Wordpress.aspx" target="_blank">Documentation</a></p>
			<p><a href="http://51degrees.com/Purchase/Wordpress.aspx" target="_blank">Upgrade Device Data</a></p>')
		);

	}
}

function gzfile_get_contents($filename, $use_include_path = 0) { 
    $file = @gzopen($filename, 'rb', $use_include_path); 
    if ($file) { 
        $data = ''; 
        while (!gzeof($file)) { 
            $data .= gzread($file, 1024); 
        } 
        gzclose($file); 
    } 
    return $data;
}

function _51d_set_options() {
	// install themes
	$dir = dirname(__FILE__);
	$theme_directory = "$dir/themes/";
	if(WP_Filesystem())
	{
		$themes = glob($theme_directory . "*.zip");
		foreach($themes as $theme) {
			$targetdir = get_theme_root().'/';
			unzip_file($theme, $targetdir);
		}
	}
	add_option('51d_enable_udp', false);
}

function _51d_unset_options() {
	delete_option('51d_enable_udp');
	delete_option('51DFilterStore');
	delete_option('_51d_license_text');
}

function _51d_loadTemplateFilters($current) {
	return _51d_loadFilters($current, 'Template');
}

function _51d_loadStylesheetFilters($current) {
	return _51d_loadFilters($current, 'Stylesheet');
}

function _51d_loadFilters($currentTheme, $tag) {
// only load themes on non admin pages
	if(!is_admin()) {
		$theme = _51d_checkFilters();
		if(empty($theme))
			return $currentTheme;
		return $theme[$tag];
	}
	return $currentTheme;
}

function _51d_checkFilters() {
	// confirm that session is enabled for every request
	@session_start();
	// check if user has requested not to be switched
	if(isset($_SESSION['NO_SWITCH']) && $_SESSION['NO_SWITCH'] == true)
		return false;
	
	// check if the browser has been detected already
	if(isset($_SESSION['_51d_themeName']))
		return $_SESSION['_51d_themeName'];

	if(!isset($GLOBALS['_51d_themeName'])) {
		// get 51d data from global scope
		global $_51d;
		//checking device filters
		$filters = get_option('51DFilterStore');
		if($filters != false) {
			foreach($filters as $filter) {
				if(isset($filter['conditions'])) {
					$validConditions = true;
					// check all conditions
					foreach($filter['conditions'] as $key => $condition) {
						$name = $key;
						$basic_property = false;
						if($name[0] == '!') {
							$name = ltrim($name, '!');
							$basic_property = true;
						}
						$match = $_51d[$name] == $condition;
						if ($basic_property && $match) {
							$validConditions = true;
							break;
						}
						if($basic_property && !$match) {
							$validConditions = false;
						}
						if (!$basic_property && !$match) {
							$validConditions = false;
							break;
						}
					}
					if($validConditions == true && isset($filter['action'])) {
						if($filter['action'] == 'theme') {
							//change theme
							$theme = @get_theme($filter['theme']['Title']);

							if(!empty($theme)) {
								$GLOBALS['_51d_themeName'] = $theme;
								$_SESSION['_51d_theme_name'] = $theme;
								return $theme;
							}
						}
						else if($filter['action'] == 'redirect' && isset($filter['url'])) {
							header('Location: '.$filter['url']);
							exit;
						}
						break;
					}
				}
			}
		} // no filters, stored, carry on

		$GLOBALS['_51d_themeName'] = false;
		$_SESSION['_51d_theme_name'] = false;
		return false;
	}
	else
		return $GLOBALS['_51d_themeName'];
}

add_action('admin_menu', '_51d_add_admin_menu');
add_filter('template', '_51d_loadTemplateFilters');
add_filter('stylesheet', '_51d_loadStylesheetFilters');

register_activation_hook(__FILE__,'_51d_set_options');
register_deactivation_hook(__FILE__,'_51d_unset_options');

?>

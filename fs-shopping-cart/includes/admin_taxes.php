<?php
function fssc_taxes() {
	global $wpdb,$fscartconfig;

	if (!isset($_GET['f'])) {
		$TaxesPage = 'taxes';
	} else {
		$TaxesPage = $_GET['f'];
	}
	
	if (isset($_POST['submit'])) {
		if ($TaxesPage == 'taxes') {
			$Province = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_provinces");
			foreach ($Province as $Province) {
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_provinces SET taxvalue1 = '".$_POST[$Province->province_id.'-taxvalue1']."', taxvalue2 = '".$_POST[$Province->province_id.'-taxvalue2']."', taxvalue3 = '".$_POST[$Province->province_id.'-taxvalue3']."' WHERE province_id = ".$Province->province_id);
			}
			echo '<div id="message" class="updated fade"><p>The tax values have been updated.</p></div>';
		} elseif ($TaxesPage == 'settings') {
			if ($_POST['taxname1'] == '' || $_POST['taxname1'] == ' ') {
				$_POST['taxname1'] = 'not set';
			}
			if ($_POST['taxname2'] == '' || $_POST['taxname2'] == ' ') {
				$_POST['taxname2'] = 'not set';
			}
			if ($_POST['taxname3'] == '' || $_POST['taxname3'] == ' ') {
				$_POST['taxname3'] = 'not set';
			}
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['taxname1']."' WHERE config_name = 'TaxName1'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['taxname2']."' WHERE config_name = 'TaxName2'");
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_config SET config_value = '".$_POST['taxname3']."' WHERE config_name = 'TaxName3'");
			$sql = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_config");
			while($dbfscartconfig = mysql_fetch_array($sql)) {
				$fscartconfig[$dbfscartconfig['config_name']] = $dbfscartconfig['config_value'];
			}
			echo '<div id="message" class="updated fade"><p>The tax names have been updated.</p></div>';
		}
	}
	
	
	
	echo '<div class="wrap">';
	echo '<form name="update-fssc-taxes" action="#" method="POST">';
	echo '<h2>Taxes</h2>';
	echo '<div class="nav-tabs-nav">';
	echo '<div class="nav-tabs-wrapper">';
	echo '<div class="nav-tabs">';
	echo '<span class="nav-tab'; if ($TaxesPage == 'taxes') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-taxes&f=taxes" style="text-decoration: none; color: #333333;'; if ($TaxesPage == 'taxes') { echo ' font-weight: bold;'; } echo '">Taxes</a></span>';
	echo '<span class="nav-tab'; if ($TaxesPage == 'settings') { echo ' nav-tab-active" style="background-color: #fafafa; border-bottom: none;'; } echo '"><a href="admin.php?page=fssc-taxes&f=settings" style="text-decoration: none; color: #333333;'; if ($TaxesPage == 'settings') { echo ' font-weight: bold;'; } echo '">Tax Names</a></span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	if ($TaxesPage == 'taxes') {

		$Country = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 ORDER BY country_name");
		foreach ($Country as $Country) {
		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column" width="200">'.$Country->country_name.'</th>
			<th scope="col" id="title" class="manage-column" align="center" width="100">'.$fscartconfig['TaxName1'].'</th>
			<th scope="col" id="title" class="manage-column" align="center" width="100">'.$fscartconfig['TaxName2'].'</th>
			<th scope="col" id="title" class="manage-column" align="center" width="100">'.$fscartconfig['TaxName3'].'</th>
			<th scope="col" id="title" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Update All Taxes" style="padding: 3px 8px;"></th>
			</tr>
			</thead>
			<tbody>';
			$Province = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_provinces WHERE country_id = $Country->country_id AND province_visibility = 1 ORDER BY province_name");
			foreach ($Province as $Province) {
				echo '<tr><th>'.$Province->province_name.'</th>';
				echo '<td align="center"><input type="text" name="'.$Province->province_id.'-taxvalue1" value="'.$Province->taxvalue1.'" size="3"></td>';
				echo '<td align="center"><input type="text" name="'.$Province->province_id.'-taxvalue2" value="'.$Province->taxvalue2.'" size="3"></td>';
				echo '<td align="center"><input type="text" name="'.$Province->province_id.'-taxvalue3" value="'.$Province->taxvalue3.'" size="3"></td>';
				echo '<td align="center">&nbsp;</th></tr>';
			}
			if (count($Province) == 0) {
				echo '<tr><td colspan="5">No states and provinces found.</td></tr>';
			}
			echo '</tbody></table>';
		}

	} elseif ($TaxesPage == 'settings') {
		
		echo '<table class="widefat page fixed" cellspacing="0">
			<thead>
			<tr>
			<th scope="col" id="title" class="manage-column" width="200">Tax Names</th>
			<th scope="col" id="title" class="manage-column">&nbsp;</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th scope="col" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Tax Names" style="padding: 3px 8px;"></th>
			<th scope="col" id="title" class="manage-column">&nbsp;</th>
			</tr>
			</tfoot>
			<tbody>';
		echo '<tr><td>Tax Name 1</td><td><input type="text" name="taxname1" value="'.$fscartconfig['TaxName1'].'" size="5"></td></tr>';
		echo '<tr><td>Tax Name 2</td><td><input type="text" name="taxname2" value="'.$fscartconfig['TaxName2'].'" size="5"></td></tr>';
		echo '<tr><td>Tax Name 3</td><td><input type="text" name="taxname3" value="'.$fscartconfig['TaxName3'].'" size="5"></td></tr>';
		echo '</tbody></table>';
		
	}
	echo '</form>';
	echo '</div>';
}
?>
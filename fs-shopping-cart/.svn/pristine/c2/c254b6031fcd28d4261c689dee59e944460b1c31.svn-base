<?php
	if (isset($_POST['submit'])) {
		$Countries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries ORDER BY country_name");
		foreach ($Countries as $Countries) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_countries SET currency_percentage = ".$_POST['cur-'.$Countries->country_id]." WHERE country_id = ".$Countries->country_id);
			if ($_POST['C'.$Countries->country_id] == 1) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_countries SET country_visibility = 1 WHERE country_id = ".$Countries->country_id); } else { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_countries SET country_visibility = 0 WHERE country_id = ".$Countries->country_id); }
			$Province = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_provinces WHERE country_id = $Countries->country_id ORDER BY province_name");
			foreach ($Province as $Province) {
				if ($_POST['P'.$Province->province_id] == 1) { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_provinces SET province_visibility = 1 WHERE province_id = ".$Province->province_id); } else { $wpdb->query("UPDATE ".$wpdb->prefix."fssc_provinces SET province_visibility = 0 WHERE province_id = ".$Province->province_id); }
			}
		}
		if (isset($_POST['new-location']) && isset($_POST['parent-location'])) {
			if ($_POST['new-location'] != '') {
				if ($_POST['parent-location'] == '0') {
					$url = fssc_url_generator($_POST['new-location']);
					$URLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_countries WHERE country_url = '$url'");
					if ($URLCheck > 0) {
						for ($i=1;$i<99;$i++) {
							$newurl = $url.$i;
							$NewURLCheck = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."fssc_countries WHERE country_url = '$newurl'");
							if ($NewURLCheck == 0) {
								$url = $newurl;
								$i = 100;
							}
						}
					}			
					$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_countries (country_name, country_url, country_code, currency_code, country_visibility) VALUES ('".addslashes($_POST['new-location'])."', '$url', 'NA', 1, 1)");
				} else {
					$_POST['parent-location'] = str_replace('c-','',$_POST['parent-location']);
					$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_provinces (province_name, country_id, province_visibility) VALUES ('".addslashes($_POST['new-location'])."', ".$_POST['parent-location'].", 1)");
				}
			}
		}
	}


	echo '<form name="fssc-locations" action="#" method="POST">';
	echo '<table class="widefat page fixed" cellspacing="0" border="1">
	<thead>
	<tr>
	<th scope="col" class="manage-column" width="225">Add New Location</th>
	<th scope="col" class="manage-column"><input type="submit" name="submit" class="button-primary" value="Add Location" style="padding: 3px 8px;"></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th scope="col" class="manage-column" width="225">&nbsp;</th>
<th scope="col" class="manage-column">&nbsp;</th>
	</tr>
	</tfoot>
	<tbody>';
	echo '<tr>';
	echo '<td><input type="text" name="new-location" value=""></td>';
	echo '<td>';
	echo '<select name="parent-location">';
	echo '<option value="0">New Country</option>';
	$Countries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries ORDER BY country_name");
	foreach ($Countries as $Countries) {
		echo '<option value="c-'.$Countries->country_id.'">'.$Countries->country_name.'</option>';
	}
	echo '</select></td></tr></tbody></table>';
	echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column" width="25">&nbsp;</th>
		<th scope="col" id="title" class="manage-column" width="200">Countries</th>
		<th scope="col" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Visible Locations" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" id="title" class="manage-column" width="25">&nbsp;</th>
		<th scope="col" id="title" class="manage-column" width="200">Countries</th>
		<th scope="col" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Visible Locations" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
	$Countries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries ORDER BY country_name");
	foreach ($Countries as $Countries) {
		$CCheck = '';
		if ($Countries->country_visibility == 1) { $CCheck = ' checked="true"'; }
		echo '<tr><td><input type="checkbox" name="C'.$Countries->country_id.'" value="1"'.$CCheck.'</td><td>'.$Countries->country_name.'</td><td>Add <input type="text" name="cur-'.$Countries->country_id.'" value="'.$Countries->currency_percentage.'" style="width: 25px;">% to prices for this country.</td></tr>';
		$Province = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_provinces WHERE country_id = $Countries->country_id ORDER BY province_name");
		foreach ($Province as $Province) {
			$CCheck = '';
			if ($Province->province_visibility == 1) { $CCheck = ' checked="true"'; }
			echo '<tr><td><input type="checkbox" name="P'.$Province->province_id.'" value="1"'.$CCheck.'</td><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;'.$Province->province_name.'</td></tr>';
		}
	}
	echo '</tbody></table></form>';

?>
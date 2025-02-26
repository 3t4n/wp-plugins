<?php

function fssc_finder_ordering_fix() {
	global $wpdb;
	$Ordering = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_order, option_id");
	$count = 0;
	$ID = 0;
	foreach ($Ordering as $Ordering) {
		$count++;
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $count WHERE option_id = $Ordering->option_id");
		$SOrdering = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = $Ordering->option_id ORDER BY option_order, option_id");
		$Scount = 0;
		$SID = 0;
		foreach ($SOrdering as $SOrdering) {
			$Scount++;
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $Scount WHERE option_id = $SOrdering->option_id");
		}
	}
}

// fs_brand_page() displays the page content for the first submenu of the custom Shopping Cart menu
function fssc_finder() {
	global $wpdb;
	
	if (isset($_GET['f'])) {
		if ($_GET['f'] == "up"){
			$NewOrder = $wpdb->get_var("SELECT option_order FROM ".$wpdb->prefix."fssc_finder_options WHERE option_id = ".$_GET['id']);
			$OldOrder = $NewOrder - 1;	
			$UpdateRow = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_order = $OldOrder AND option_parent = ".$_GET['parent']);
			if (count($UpdateRow) > 0) {
				$OldID = $UpdateRow->option_id;
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $OldOrder WHERE option_id = ".$_GET['id']);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $NewOrder WHERE option_id = ".$UpdateRow->option_id);
			}
		} elseif ($_GET['f'] == "down"){
			$NewOrder = $wpdb->get_var("SELECT option_order FROM ".$wpdb->prefix."fssc_finder_options WHERE option_id = ".$_GET['id']);
			$OldOrder = $NewOrder + 1;	
			$UpdateRow = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_order = $OldOrder AND option_parent = ".$_GET['parent']);
			if (count($UpdateRow) > 0) {
				$OldID = $UpdateRow->option_id;
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $OldOrder WHERE option_id = ".$_GET['id']);
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_order = $NewOrder WHERE option_id = ".$UpdateRow->option_id);
			}
		}
	}

	echo '<div class="wrap">';
	echo '<h2>Product Finder Configuration</h2>';
	echo '<p>&nbsp;</p>';
	
	if (isset($_POST['add-tab'])) {
		if ($_POST['new-tab'] != '') {
			$TabOrder = $wpdb->get_var("SELECT COUNT(tab_id) FROM ".$wpdb->prefix."fssc_finder_tabs") + 1;
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_finder_tabs (tab_name, tab_order) VALUES ('".addslashes($_POST['new-tab'])."', $TabOrder)");
			echo '<p>Tab Added.</p>';
		}
	} elseif (isset($_POST['update-tabs'])) {
		$Tabs = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_tabs ORDER BY tab_order");
		foreach ($Tabs as $Tabs) {
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_tabs SET tab_name = '".$_POST[$Tabs->tab_id.'_name']."' WHERE tab_id = ".$Tabs->tab_id);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_tabs SET tab_type = '".$_POST[$Tabs->tab_id.'_type']."' WHERE tab_id = ".$Tabs->tab_id);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_tabs SET tab_match = '".$_POST[$Tabs->tab_id.'_match']."' WHERE tab_id = ".$Tabs->tab_id);
			$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_tabs SET tab_category = '".$_POST[$Tabs->tab_id.'_category']."' WHERE tab_id = ".$Tabs->tab_id);
		}
		echo '<p>Tabs Updated.</p>';
	} elseif (isset($_POST['add_field'])) {
		$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_finder_options (option_name, option_parent) VALUES ('".addslashes($_POST['option_field'])."', 0)");
		echo '<p>Field Added.</p>';
		fssc_finder_ordering_fix();
	} elseif (isset($_POST['add_value'])) {
		$Values = explode(',',$_POST['option_value']);
		for ($i=0;$i<=count($Values);$i++) {
			if ($Values[$i] != '') {
				$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_finder_options (option_name, option_parent) VALUES ('".addslashes($Values[$i])."', ".$_POST['option_parent'].")");
			}
		}
		echo '<p>Value Added.</p>';
		fssc_finder_ordering_fix();
	} elseif (isset($_POST['update-options'])) {
		$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_adv = 0");
		$Fields = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_id");
		foreach ($Fields as $Fields) {
			if (isset($_POST[$Fields->option_id.'adv'])) { 
				$wpdb->query("UPDATE ".$wpdb->prefix."fssc_finder_options SET option_adv = 1 WHERE option_id = ".$Fields->option_id);
			} 
		}
		echo '<p>Options Updated.</p>';
		fssc_finder_ordering_fix();
	}


	
	
	// FINDER TABS
	echo '<form name="fssctabs" action="" method="POST"><table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" id="title" class="manage-column" style="" width="250">Add Tab</th>
	<th scope="col" id="title" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Add Tab" style="padding: 3px 8px;"></th>
	</tr>
	</thead>
	<tbody><tr><td colspan="2">Tab Name: <input type="text" name="new-tab" value="" size="30"></td></tr>
	</tbody></table></form>
	<br />
	<form name="update-tabs" action="" method="POST">
	<table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" id="title" class="manage-column" style="" width="250">Tabs</th>
	<th scope="col" id="title" class="manage-column" style="" colspan="3"><input type="submit" name="submit" class="button-primary" value="Update Tabs" style="padding: 3px 8px;"></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
	<th scope="col" id="title" class="manage-column" style="" width="250">Tabs</th>
	<th scope="col" id="title" class="manage-column" style="" colspan="3"><input type="submit" name="submit" class="button-primary" value="Update Tabs" style="padding: 3px 8px;"></th>
	</tr>
	</tfoot>
	<tbody>';
	$Tabs = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_tabs ORDER BY tab_order");
	$TabCount = count($Tabs);
	foreach ($Tabs as $Tabs) {
		echo '<tr><td width="150"><input type="text" name="'.$Tabs->tab_id.'_name" value="'.$Tabs->tab_name.'" size="30"></td>';
		echo '<td width="150"><select name="'.$Tabs->tab_id.'_type">';
		echo '<option value="Finder Options"'; if ($Tabs->tab_type == 'Finder Options') { echo ' selected'; } echo '>Finder Options</option>';
		echo '<option value="Accessories"'; if ($Tabs->tab_type == 'Accessories') { echo ' selected'; } echo '>Accessories</option>';
		echo '</select><br><select name="'.$Tabs->tab_id.'_match">';
		echo '<option value="No"'; if ($Tabs->tab_type == 'No') { echo ' selected'; } echo '>Global Accessories</option>';
		echo '<option value="Yes"'; if ($Tabs->tab_type == 'Yes') { echo ' selected'; } echo '>Individual Product Accessories</option>';
		echo '</select></td>';
		echo '<td>';
		if ($Tabs->tab_type == 'Accessories') {
			?><select name="<?php echo $Tabs->tab_id; ?>_category"><?php fssc_categories_basic (0, 0, $Tabs->tab_category, ""); ?></select><?php
		} else {
			echo '&nbsp;';
		}
		echo '</td>';
		echo '<td align="center" valign="middle">';
		if ($Tabs->tab_order == 1) {
			echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" border="0" alt="UP"> ';
		} else {
			echo '<a href="admin.php?page=fssc-finder&f=up&tid='.$Tabs->tab_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up.gif" border="0" alt="UP"></a> ';
		}
		if ($Tabs->tab_order == $TabCount) {
			echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="Down"> ';
		} else {
			echo '<a href="admin.php?page=fssc-finder&f=down&tid='.$Tabs->tab_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down.gif" border="0" alt="Down"></a> ';
		}
		echo '</td></tr>';
	}
	echo '</tbody></table></form><br /><br />';
	
	
	
	// FINDER CONFIGURATION
	echo '<form name="finder-config" action="" method="POST"><table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" id="title" class="manage-column" width="120">Manage Options</th>
	<th scope="col" id="title" class="manage-column" width="200">&nbsp;</th>
	<th scope="col" id="title" class="manage-column" width="200">&nbsp;</th>
	<th scope="col" id="title" class="manage-column">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td width="120">Option Field:</td>
	<td width="200"><input type="text" name="option_field" value="" size="30"></td>
	<td width="200">&nbsp;</td>
	<td><input type="submit" name="submit" class="button-primary" value="Add Field" style="padding: 3px 8px;"></td>
	</tr>
	<tr>
	<td width="120">Field Value:</td>
	<td width="200"><input type="text" name="option_value" value="" size="30"></td>
	<td width="200"><select name="option_parent" style="width: 190px">';
	$Parents = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_name");
	foreach ($Parents as $Parents) {
		echo '<option value="'.$Parents->option_id.'">'.$Parents->option_name.'</option>';
	}
	echo '</select></td>
	<td><input type="submit" name="submit" class="button-primary" value="Add Value" style="padding: 3px 8px;"></td>
	</tr>
	</tbody></table></form>
	<br />
	<form name="update-tabs" action="" method="POST">';
	$Tabs = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_tabs WHERE tab_type = 'Finder Options' ORDER BY tab_order");
	foreach ($Tabs as $Tabs) {
		echo '<option value="'.$Tabs->tab_id.'"></option>';
		echo '<table class="widefat page fixed" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" id="title" class="manage-column" style="" width="250" colspan="2">Current Options</th>
		<th scope="col" id="title" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Options" style="padding: 3px 8px;"></th>
		</tr>
		</thead>
		<tfoot>
		<tr>
		<th scope="col" id="title" class="manage-column" style="" width="250" colspan="2">Current Options</th>
		<th scope="col" id="title" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Options" style="padding: 3px 8px;"></th>
		</tr>
		</tfoot>
		<tbody>';
		$Fields = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_order");
		$ParentCount = count($Fields);
		foreach ($Fields as $Fields) {
			$Checked = '';
			if ($Fields->option_adv == 1) { $Checked = ' checked'; } 
			echo '<tr>';
			echo '<td align="center" width="60">';
			if ($Fields->option_order == 1) {
				echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" border="0" alt="UP"> ';
			} else {
				echo '<a href="admin.php?page=fssc-finder&f=up&id='.$Fields->option_id.'&parent=0"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up.gif" border="0" alt="UP"></a> ';
			}
			if ($Fields->option_order == $ParentCount) {
				echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="DOWN"> ';
			} else {
				echo '<a href="admin.php?page=fssc-finder&f=down&id='.$Fields->option_id.'&parent=0"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down.gif" border="0" alt="DOWN"></a> ';
			}
			echo '</td>';
			echo '<td colspan="2"><input type="checkbox" name="'.$Fields->option_id.'adv" value="1"'.$Checked.'> <strong>'.$Fields->option_name.' ('.$Fields->option_order.')</strong></td></tr>';
			$Values = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = ".$Fields->option_id." ORDER BY option_order");
			$SubCount = count($Values);
			foreach ($Values as $Values) {
				echo '<tr>';
				echo '<td align="center" width="60">';
				if ($Values->option_order == 1) {
					echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up-g.gif" border="0" alt="UP"> ';
				} else {
					echo '<a href="admin.php?page=fssc-finder&f=up&id='.$Values->option_id.'&parent='.$Fields->option_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-up.gif" border="0" alt="UP"></a> ';
				}
				if ($Values->option_order == $SubCount) {
					echo '<img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down-g.gif" border="0" alt="DOWN"> ';
				} else {
					echo '<a href="admin.php?page=fssc-finder&f=down&id='.$Values->option_id.'&parent='.$Fields->option_id.'"><img src="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/btn-mini-down.gif" border="0" alt="DOWN"></a> ';
				}
				echo '</td>';
				echo '<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$Values->option_name.' ('.$Values->option_order.')</td></tr>';
				
			}
		}
		echo '</tbody></table>';
	}

	echo '</form><br /><br />';
	
	if (isset($_POST['update-desc'])) {
		$wpdb->query("DELETE FROM ".$wpdb->prefix."fssc_finder_options_desc");
		$Fields = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_id");
		foreach ($Fields as $Fields) {
			$wpdb->query("INSERT INTO ".$wpdb->prefix."fssc_finder_options_desc (option_id, option_desc) VALUES (".$Fields->option_id.", '".addslashes($_POST['desc_'.$Fields->option_id])."')");
		}
	}
	
	echo '<form name="desc" action="" method="POST"><table class="widefat page fixed" cellspacing="0">
	<thead>
	<tr>
	<th scope="col" id="title" class="manage-column" style="" width="250">Option Field Descriptions</th>
	<th scope="col" id="title" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Descriptions" style="padding: 3px 8px;"></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
	<th scope="col" id="title" class="manage-column" style="" width="250">Option Field Descriptions</th>
	<th scope="col" id="title" class="manage-column" style=""><input type="submit" name="submit" class="button-primary" value="Update Descriptions" style="padding: 3px 8px;"></th>
	</tr>
	</tfoot>
	<tbody>';
	$Fields = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_finder_options WHERE option_parent = 0 ORDER BY option_id");
	foreach ($Fields as $Fields) {
		echo '<tr><td colspan="2"><strong>'.$Fields->option_name.'</strong><br><textarea style="width: 500px; height: 200px;" name="desc_'.$Fields->option_id.'">'.stripslashes($wpdb->get_var("SELECT option_desc FROM ".$wpdb->prefix."fssc_finder_options_desc WHERE option_id = ".$Fields->option_id)).'</textarea></td></tr>';
	}
	echo '</tbody></table></form><br /><br />';
	
	
	
	echo '</div>';


}
?>
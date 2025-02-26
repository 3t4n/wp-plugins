<?php
/*
Plugin Name: Starcross Baseball Linescore
Plugin URI: http://www.starcrossonline.com/baseball-linescore/
Description: Adds the ability to add a baseball game's linescore to posts.
Author: Jonathan Cross
Version: 1.0
Author URI: http://www.starcrossonline.com/
*/

require_once(ABSPATH . PLUGINDIR . '/starcross-baseball-linescore/linescoreClasses.php');

function starLinescore() {
	// Get the post object.
	if(!is_object($GLOBALS['post']) && isset($GLOBALS['post_cache'][$GLOBALS['post']])) {
		$post	= $GLOBALS['post_cache'][$GLOBALS['post']];
	} else {
		$post	= $GLOBALS['post'];
	}

	// Get the linescore for the current post.
	$linescore	= get_post_meta($post->ID, 'Linescore');

	// Extract the table into an array.
	$Linescore_extractor	= new Linescore_extractor($linescore[0]);
	$linescore				= $Linescore_extractor->extractTable();

	// Extras displayed or not.
	$extrasDisplay	= ($linescore['1'][10] != '') ? 'block' : 'none';
?>
<script type="text/javascript">
function starLinescoreExtras() {
	var extrasVisitorTable	= document.getElementById('extrasVisitorTable');
	var extrasHomeTable		= document.getElementById('extrasHomeTable');

	if (extrasVisitorTable.style.display == 'none') {
		extrasVisitorTable.style.display	= 'block';
	} else {
		extrasVisitorTable.style.display	= 'none';
	}

	if (extrasHomeTable.style.display == 'none') {
		extrasHomeTable.style.display	= 'block';
	} else {
		extrasHomeTable.style.display	= 'none';
	}
}
</script>

<div id="starLinescoreStuff" class="dbx-group">
<div class="dbx-b-ox-wrapper">
	<fieldset id="starLinescore" class="dbx-box">
		<div class="dbx-h-andle-wrapper">
			<h3 class="dbx-handle">Line Score</h3>
		</div>

		<div class="dbx-c-ontent-wrapper">
			<div class="dbx-content">
				<table>
				<tr>
					<th>Team</th>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					<th><acronym title="Runs">R</acronym></th>
					<th><acronym title="Hits">H</acronym></th>
					<th><acronym title="Errors">E</acronym></th>
					<th><button type="button" onclick="starLinescoreExtras();return false;">Extras</button></th>
				</tr><tr>
					<td><input name="linescore[1][Team]" size="5" value="<?php echo $linescore['1']['Team']; ?>" type="text" tabindex="10001" /></td>
					<td><input name="linescore[1][1]" size="1" value="<?php echo $linescore['1']['1']; ?>" type="text" tabindex="10002" /></td>
					<td><input name="linescore[1][2]" size="1" value="<?php echo $linescore['1']['2']; ?>" type="text" tabindex="10003" /></td>
					<td><input name="linescore[1][3]" size="1" value="<?php echo $linescore['1']['3']; ?>" type="text" tabindex="10004" /></td>
					<td><input name="linescore[1][4]" size="1" value="<?php echo $linescore['1']['4']; ?>" type="text" tabindex="10005" /></td>
					<td><input name="linescore[1][5]" size="1" value="<?php echo $linescore['1']['5']; ?>" type="text" tabindex="10006" /></td>
					<td><input name="linescore[1][6]" size="1" value="<?php echo $linescore['1']['6']; ?>" type="text" tabindex="10007" /></td>
					<td><input name="linescore[1][7]" size="1" value="<?php echo $linescore['1']['7']; ?>" type="text" tabindex="10008" /></td>
					<td><input name="linescore[1][8]" size="1" value="<?php echo $linescore['1']['8']; ?>" type="text" tabindex="10009" /></td>
					<td><input name="linescore[1][9]" size="1" value="<?php echo $linescore['1']['9']; ?>" type="text" tabindex="10010" /></td>
					<td><input name="linescore[1][R]" size="1" value="<?php echo $linescore['1']['R']; ?>" type="text" tabindex="10020" /></td>
					<td><input name="linescore[1][H]" size="1" value="<?php echo $linescore['1']['H']; ?>" type="text" tabindex="10021" /></td>
					<td><input name="linescore[1][E]" size="1" value="<?php echo $linescore['1']['E']; ?>" type="text" tabindex="10022" /></td>
				</tr>
				</table>
				<table id="extrasVisitorTable" style="display: <?php echo $extrasDisplay; ?>;">
				<tr id="extrasVisitorHead">
					<th>&nbsp;</th>
					<th>10</th>
					<th>11</th>
					<th>12</th>
					<th>13</th>
					<th>14</th>
					<th>15</th>
					<th>16</th>
					<th>17</th>
					<th>18</th>
				</tr>
				<tr id="extrasVisitor">
					<td>&nbsp;</td>
					<td><input name="linescore[1][10]" size="1" value="<?php echo $linescore['1']['10']; ?>" type="text" tabindex="10011" /></td>
					<td><input name="linescore[1][11]" size="1" value="<?php echo $linescore['1']['11']; ?>" type="text" tabindex="10012" /></td>
					<td><input name="linescore[1][12]" size="1" value="<?php echo $linescore['1']['12']; ?>" type="text" tabindex="10013" /></td>
					<td><input name="linescore[1][13]" size="1" value="<?php echo $linescore['1']['13']; ?>" type="text" tabindex="10014" /></td>
					<td><input name="linescore[1][14]" size="1" value="<?php echo $linescore['1']['14']; ?>" type="text" tabindex="10015" /></td>
					<td><input name="linescore[1][15]" size="1" value="<?php echo $linescore['1']['15']; ?>" type="text" tabindex="10016" /></td>
					<td><input name="linescore[1][16]" size="1" value="<?php echo $linescore['1']['16']; ?>" type="text" tabindex="10017" /></td>
					<td><input name="linescore[1][17]" size="1" value="<?php echo $linescore['1']['17']; ?>" type="text" tabindex="10018" /></td>
					<td><input name="linescore[1][18]" size="1" value="<?php echo $linescore['1']['18']; ?>" type="text" tabindex="10019" /></td>
				</tr>
				</table>
				<table>
				<tr>
					<td><input name="linescore[2][Team]" size="5" value="<?php echo $linescore['2']['Team']; ?>" type="text" tabindex="10023" /></td>
					<td><input name="linescore[2][1]" size="1" value="<?php echo $linescore['2']['1']; ?>" type="text" tabindex="10024" /></td>
					<td><input name="linescore[2][2]" size="1" value="<?php echo $linescore['2']['2']; ?>" type="text" tabindex="10025" /></td>
					<td><input name="linescore[2][3]" size="1" value="<?php echo $linescore['2']['3']; ?>" type="text" tabindex="10026" /></td>
					<td><input name="linescore[2][4]" size="1" value="<?php echo $linescore['2']['4']; ?>" type="text" tabindex="10027" /></td>
					<td><input name="linescore[2][5]" size="1" value="<?php echo $linescore['2']['5']; ?>" type="text" tabindex="10028" /></td>
					<td><input name="linescore[2][6]" size="1" value="<?php echo $linescore['2']['6']; ?>" type="text" tabindex="10029" /></td>
					<td><input name="linescore[2][7]" size="1" value="<?php echo $linescore['2']['7']; ?>" type="text" tabindex="10030" /></td>
					<td><input name="linescore[2][8]" size="1" value="<?php echo $linescore['2']['8']; ?>" type="text" tabindex="10031" /></td>
					<td><input name="linescore[2][9]" size="1" value="<?php echo $linescore['2']['9']; ?>" type="text" tabindex="10032" /></td>
					<td><input name="linescore[2][R]" size="1" value="<?php echo $linescore['2']['R']; ?>" type="text" tabindex="10042" /></td>
					<td><input name="linescore[2][H]" size="1" value="<?php echo $linescore['2']['H']; ?>" type="text" tabindex="10043" /></td>
					<td><input name="linescore[2][E]" size="1" value="<?php echo $linescore['2']['E']; ?>" type="text" tabindex="10044" /></td>
				</tr>
				</table>
				<table id="extrasHomeTable" style="display: <?php echo $extrasDisplay; ?>;">
				<tr id="extrasHomeHead">
					<th>&nbsp;</th>
					<th>10</th>
					<th>11</th>
					<th>12</th>
					<th>13</th>
					<th>14</th>
					<th>15</th>
					<th>16</th>
					<th>17</th>
					<th>18</th>
				</tr>
				<tr id="extrasHome">
					<td>&nbsp;</td>
					<td><input name="linescore[2][10]" size="1" value="<?php echo $linescore['2']['10']; ?>" type="text" tabindex="10033" /></td>
					<td><input name="linescore[2][11]" size="1" value="<?php echo $linescore['2']['11']; ?>" type="text" tabindex="10034" /></td>
					<td><input name="linescore[2][12]" size="1" value="<?php echo $linescore['2']['12']; ?>" type="text" tabindex="10035" /></td>
					<td><input name="linescore[2][13]" size="1" value="<?php echo $linescore['2']['13']; ?>" type="text" tabindex="10036" /></td>
					<td><input name="linescore[2][14]" size="1" value="<?php echo $linescore['2']['14']; ?>" type="text" tabindex="10037" /></td>
					<td><input name="linescore[2][15]" size="1" value="<?php echo $linescore['2']['15']; ?>" type="text" tabindex="10038" /></td>
					<td><input name="linescore[2][16]" size="1" value="<?php echo $linescore['2']['16']; ?>" type="text" tabindex="10039" /></td>
					<td><input name="linescore[2][17]" size="1" value="<?php echo $linescore['2']['17']; ?>" type="text" tabindex="10040" /></td>
					<td><input name="linescore[2][18]" size="1" value="<?php echo $linescore['2']['18']; ?>" type="text" tabindex="10041" /></td>
				</tr>
				</table>

				<table>
				<tr>
					<th>Win</th>
					<th>Loss</th>
					<th>Save</th>
				</tr>
					<td><input name="linescore[win]" size="30" value="<?php echo $linescore['win']; ?>" type="text" tabindex="10045" /></td>
					<td><input name="linescore[loss]" size="30" value="<?php echo $linescore['loss']; ?>" type="text" tabindex="10046" /><br /></td>
					<td><input name="linescore[save]" size="30" value="<?php echo $linescore['save']; ?>" type="text" tabindex="10047" /><br /></td>
				<tr>
				</tr>
				</table>

				Boxscore URL<br />
				<input name="linescore[boxscore]" size="75" value="<?php echo $linescore['boxscore']; ?>" type="text" tabindex="10050" />
			</div>
		</div>
	</fieldset>
</div>
</div>
<?php
}

function starLinescoreSave($post_id) {
	// Check POST array for linescore.
	if (!isset($_POST['linescore']) || !is_array($_POST['linescore']) || empty($_POST['linescore']['1']['Team']) || empty($_POST['linescore']['2']['Team'])) {
		return;
	}

	$linescore	= $_POST['linescore'];

	// Filter.
	if (get_magic_quotes_gpc()) {
		foreach ($linescore as $key => $value) {
			if (is_string($value)) {
				$linescore[$key]	= stripslashes($value);
			}
		}
	}
	$linescore['win']	= htmlspecialchars($linescore['win'], ENT_QUOTES);
	$linescore['loss']	= htmlspecialchars($linescore['loss'], ENT_QUOTES);
	$linescore['save']	= htmlspecialchars($linescore['save'], ENT_QUOTES);

	// Build table head.
	$tableHead	= '<table class="ruler"><thead><tr><th>Team</th>';
	for ($i = 1; $i < 19; $i ++) {
		if ($linescore['1'][$i] != '' || $linescore['2'][$i] != '') {
			$tableHead	.= '<th>' . $i . '</th>';
		}
	}
	$tableHead	.= '<th><acronym title="Runs">R</acronym></th><th><acronym title="Hits">H</acronym></th><th><acronym title="Errors">E</acronym></th></tr></thead>';

	// Build table data for visiting team.
	$tableVisit	= '<tr><td>' . $linescore['1']['Team'] . '</td>';
	foreach ($linescore['1'] as $key => $value) {
		if (in_array($key, array('Team', 'R', 'H', 'E'))) {
			continue;
		}
		$tableVisit	.= ($value != '') ? '<td>' . $value . '</td>' : '';
	}
	$tableVisit	.= '<td><strong>' . $linescore['1']['R'] . '</strong></td><td><strong>' . $linescore['1']['H'] . '</strong></td><td><strong>' . $linescore['1']['E'] . '</strong></td></tr>';

	// Build table data for home team.
	$tableHome	= '<tr><td>' . $linescore['2']['Team'] . '</td>';
	foreach ($linescore['2'] as $key => $value) {
		if (in_array($key, array('Team', 'R', 'H', 'E'))) {
			continue;
		}
		$tableHome	.= ($value != '') ? '<td>' . $value . '</td>' : '';
	}
	$tableHome	.= '<td><strong>' . $linescore['2']['R'] . '</strong></td><td><strong>' . $linescore['2']['H'] . '</strong></td><td><strong>' . $linescore['2']['E'] . '</strong></td></tr>';

	// Prepare Win.
	ob_start();
	if (!empty($linescore['win']) && !empty($linescore['win'])) {
?>
<div class="linescoreWLS">
	<strong>W:</strong> <?php echo $linescore['win']; ?><win />
	<strong>L:</strong> <?php echo $linescore['loss']; ?><loss />
<?php
		if (!empty($linescore['save'])) {
?>
	<strong>S:</strong> <?php echo $linescore['save']; ?><save />
<?php
		}
?>
</div>
<?php
	}
	$tableWLS	= ob_get_clean();

	// Prepare boxscore URL.
	$linescore['boxscore']	= str_replace('&amp;', '&', $linescore['boxscore']);
	$linescore['boxscore']	= str_replace('&', '&amp;', $linescore['boxscore']);

	$tableFoot	= '</table>' . $tableWLS . '<p><a href="' . $linescore['boxscore'] . '">Boxscore</a></p>';
	$table		= $tableHead . '<tbody>' . $tableVisit . $tableHome . '</tbody>' . $tableFoot;

	// Save $table.
	global $wpdb;
	$query		= "SELECT `meta_id`"
		. "\n	FROM `" . $wpdb->postmeta . "`"
		. "\n	WHERE `post_id` = '" . intval($post_id) . "'"
		. "\n		AND `meta_key` = 'Linescore'";
	$result		= $wpdb->get_results($query, ARRAY_A);
	if (is_array($result[0])) {
		$query	= "UPDATE `" . $wpdb->postmeta . "`"
			. "\n	SET `meta_value` = '" . $wpdb->escape($table) . "'"
			. "\n	WHERE `meta_id` = '" . intval($result[0]['meta_id']) . "'";
	} else {
		$query	= "INSERT INTO `" . $wpdb->postmeta . "` ("
			. "\n		`post_id`,"
			. "\n		`meta_key`,"
			. "\n		`meta_value`"
			. "\n	) VALUES ("
			. "\n		'" . intval($post_id) . "',"
			. "\n		'Linescore',"
			. "\n		'" . $wpdb->escape($table) . "'"
			. "\n	)";
	}
	$wpdb->query($query);
}

add_action('simple_edit_form', 'starLinescore');
add_action('edit_form_advanced', 'starLinescore');
add_action('edit_page_form', array(&$podPress, 'page_form'));
add_action('save_post', 'starLinescoreSave');
add_action('edit_post', 'starLinescoreSave'); // seems to be a duplicate

?>
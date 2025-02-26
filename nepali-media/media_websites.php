<h1>Nepali Media</h1>

<?php
if(!defined("NEPALI_MEDIA_DIRECTORY")) die();

if(!class_exists("SQLite3"))
{
	echo "SQLite database support required. Enable: <strong>extension=sqlite3</strong> in your php.ini.";
	return;
}
?>

<table class="wp-list-table widefat striped">
	<thead>
		<tr>
			<th>S.N.</th>
			<th>Media</th>
			<th>URL</th>
			<th>HTTPs?</th>
		</tr>
	</thead>
	<tbody>
<?php
$dbh = new SQLite3(NEPALI_MEDIA_DIRECTORY."/nepali-media.db");
$select_sql = "SELECT * FROM nepali_media ORDER BY RANDOM() LIMIT 100;";
$statement = $dbh->prepare($select_sql);
$resource = $statement->execute();

$sn = 0;
while($row = $resource->fetchArray(SQLITE3_ASSOC)):
	$row["media_name"] = $this->media_name($row["media_name"], $row["media_url"]);
	$row["media_type"] = "";
	$is_ssl = preg_match("/^https\:\/\//is", $row["media_url"])?true:false;
	$row["media_secure"] = $is_ssl?"Yes":"";
?>
		<tr>
			<td><?php echo ++$sn; ?></td>
			<td><a href="<?php echo $row["media_url"]; ?>"><?php echo $row["media_name"]; ?></a></td>
			<td style="color: <?php echo $is_ssl?'green':'black'; ?>"><?php echo $row["media_url"]; ?></td>
			<td><?php echo $row["media_secure"]; ?></td>
		</tr>
<?php
endwhile;
?>
	</tbody>
</table>

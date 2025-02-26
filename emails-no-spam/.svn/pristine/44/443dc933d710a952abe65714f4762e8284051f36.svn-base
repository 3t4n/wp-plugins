<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;

$time = time();
$table_name = $wpdb->prefix.'my_lists';
$cron = $wpdb->get_row( 
	"
	SELECT *
	FROM $table_name 
	WHERE $time > $table_name.date_init
	AND $table_name.id_msg <> 0
	AND $table_name.quantity > $table_name.sends
	ORDER BY $table_name.date_init ASC 
	"
, ARRAY_A );


if ( $cron  )
{
$id_list = $cron['id_list'];
$date_init = $cron['date_init'];
$id_msg = $cron['id_msg'];


echo '<table>
<tr>
<td>List Id
</td>

<td>'.$id_list.'
</td>
</tr>

<tr>
<td>Message
</td>

<td>'.$id_msg.'
</td>
</tr>

<tr>
<td>Schedule
</td>

<td>'.date("d-m-Y G:i:s", $date_init).'
</td>
</tr>

<tr>
<td>Last
</td>

<td>'.date("d-m-Y G:i:s", $time).'
</td>
</tr>


</table>';


require_once(EMAILS_NO_SPAM_DIR. 'scripts/send-list/cron.php' );

}
else
{
echo '<h2>List Not Found!</h2>';

}

?>
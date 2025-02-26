<?php
$secret_key = get_option('dl_leadback_secret_key');
$client_id = get_option('dl_leadback_client_id');
$date = date('Y-m-d');


$date_from = $_GET['date_from'];
if($date_from == 'today') {				// если сегодня
	$date_from = date('Y-m-d');
} elseif($date_from == 'yesterday') {	// если вчера
	$date_from = date('Y-m-d',strtotime("-1 day"));
} elseif($date_from == 'week') {		// если неделя
	$date_from = date('Y-m-d',strtotime("-7 day"));
} elseif($date_from == 'month') {		// если месяц
	$date_from = date('Y-m-d',strtotime("-1 month"));
} elseif($date_from == 'quart') {		// если квартал
	$date_from = date('Y-m-d',strtotime("-3 month"));
} else {
	$date_from = date('Y-m-d',strtotime("-7 day"));	
}

$date_to = date('Y-m-d');

$get_url_stat = array(
	'secret_key' => $secret_key,
	'client_id' => $client_id,
	'date_from' => $date_from,
	'date_to' => $date_to,
);

$url_stat = 'https://leadback.ru/api/stat.php?'. http_build_query( $get_url_stat );
$json_data_stat = file_get_contents( $url_stat );
$json_data_stat = json_decode( $json_data_stat, true );

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Дата', 'Количество звонков', 'Показы виджета'],
		<?	
		foreach($json_data_stat[data] as $data => $massiv) {
			
			$convarsion = $json_data_stat[data][$data][returnSiteName()][conversion_count];
			$impression = $json_data_stat[data][$data][returnSiteName()][impression_count];
			
			echo '["' . date('d.m.Y', strtotime($data)) . '", ' . $convarsion . ', ' . $impression . '],' ;
			
		} 
		?>
	]);

	var options = {
		legend: {position: 'top'},
		'chartArea': {'width': '93%', 'height': '250px'},
	};

	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

	chart.draw(data, options);
  }
</script>


<div class="wrap">
<h2>DL Leadback Статистика</h2> 


<?php if ( $json_data_stat[totalCount] == '0' ) {
	
	echo '<div class="error"><p>Звонков нет</p></div>';
	
} else {
	
?>

<div class="wp-filter" >
	<ul class="filter-links">
		<li>Показать</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_stat&date_from=week"
			<?php
			if($_GET['date_from'] == '') { 
				echo 'class="current"';
			} elseif($_GET['date_from'] == 'week') {
				echo 'class="current"';
			}; ?>
			>неделя
			</a>
			</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_stat&date_from=month"
			<?php if($_GET['date_from'] == 'month') echo 'class="current"'; ?>
			>месяц
			</a>
			</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_stat&date_from=quart"
			<?php if($_GET['date_from'] == 'quart') echo 'class="current"'; ?>
			>квартал
			</a>
		</li>
	</ul>
</div>

<div class="postbox" id="first">
	<div class="inside">
		<div id="curve_chart" style="width: 100%;"></div>
	</div>
</div>	

<table class="wp-list-table widefat fixed striped posts">

<thead>
	<tr>
		<th scope="col" class="manage-column column-title">Дата</th>
		<th scope="col" class="manage-column column-categories">Количество звонков</th>
		<th scope="col" class="manage-column column-categories">Показы виджета</th>
	</tr>
</thead>

<tbody>
<?php

$json_data_stat[data] = array_reverse($json_data_stat[data]);

foreach($json_data_stat[data] as $data => $massiv) {
	
	$convarsion = $json_data_stat[data][$data][returnSiteName()][conversion_count];
	$impression = $json_data_stat[data][$data][returnSiteName()][impression_count];
	
?>	
	<tr>
		<th scope="col" class="manage-column column-title"><?php echo date('Y.m.d', strtotime($data)); ?></th>
		<th scope="col" class="manage-column column-categories"><?php echo $convarsion; ?></th>
		<th scope="col" class="manage-column column-categories"><?php echo $impression; ?></th>
	</tr>
<?php } ?>	
</tbody>

<tfoot>
	<tr>
		<th scope="col" class="manage-column column-title">Дата</th>
		<th scope="col" class="manage-column column-categories">Количество звонков</th>
		<th scope="col" class="manage-column column-categories">Показы виджета</th>
	</tr> 
</tfoot>

</table>

<pre>
<? // print_r ($json_data_stat); ?>
</pre>

<? } ?>

</div>
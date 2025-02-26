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

$order = $_GET['order'];

if($date_from == '') $date_from = 'desc';


$date_to = date('Y-m-d');

$get_url_calls = array(
	'secret_key' => $secret_key,
	'client_id' => $client_id,
	'date_from' => $date_from,
	'date_to' => $date_to,
	'order' => $order,
);

$url_calls = 'https://leadback.ru/api/calls.php?'. http_build_query($get_url_calls);
$json_data_calls = file_get_contents($url_calls);
$json_data_calls = json_decode($json_data_calls, true);
?>

<div class="wrap">
<h2>DL Leadback Список звонков

<a href="http://leadback.ru/calls.php" target="_blank" style="float: right" class="button">Звонки на Leadback.ru</a>

</h2>

<?php 

if ($json_data_calls[error_message] == 'Invalid value client_id OR secret_key') {
	
	echo '<div class="error"><p>Недопустимое значение <strong>client_id</strong> или <strong>secret_key</strong></p></div>';
	
} elseif ( $json_data_calls[totalCount] == '0' ) {
	
	echo '<div class="error"><p>Звонков нет</p></div>';
	
} else {

?>

<div class="wp-filter" >
	<ul class="filter-links">
		<li>Показать</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_calls&date_from=today"
			<?php if($_GET['date_from'] == 'today') echo 'class="current"'; ?>
			>сегодня
			</a>
		</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_calls&date_from=yesterday"
			<?php if($_GET['date_from'] == 'yesterday') echo 'class="current"'; ?>
			>вчера
			</a>
		</li>
		<li>
			<a
			href="admin.php?page=dl_leadback_calls&date_from=week"
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
			href="admin.php?page=dl_leadback_calls&date_from=month"
			<?php if($_GET['date_from'] == 'month') echo 'class="current"'; ?>
			>месяц
			</a>
			</li>
		<li style="border-right: 1px solid #e5e5e5;">
			<a
			href="admin.php?page=dl_leadback_calls&date_from=quart"
			<?php if($_GET['date_from'] == 'quart') echo 'class="current"'; ?>
			>квартал
			</a>
		</li>
		
		<li style="margin: 0 10px;">Cортировка</li>
		<li>
			<a href="admin.php?page=dl_leadback_calls&date_from=<?php
			if($_GET['date_from'] == '') { 
				echo 'week';
			} else {
				echo $_GET['date_from'];
			}; ?>&order=desc"
			
			<? if($_GET['order'] == '') {
				echo 'class="current"';
			} elseif($_GET['order'] == 'desc') {
				echo 'class="current"';
			}; ?>
			>по убыванию
			</a>
		</li>
		<li>
			<a href="admin.php?page=dl_leadback_calls&date_from=<?php
			if($_GET['date_from'] == '') { 
				echo 'week';
			} else {
				echo $_GET['date_from'];
			} ?>&order=asc"
			
			<?php if($_GET['order'] == 'asc') echo 'class="current"'; ?>
			>по возрастанию
			</a>
		</li>
	</ul>
</div>

<table class="wp-list-table widefat fixed striped posts">

<thead>
	<tr>
		<th scope="col" class="manage-column column-author">№</th>
		<th scope="col" class="manage-column column-categories">Номер клиента</th>
		<th scope="col" class="manage-column column-title">Запись звонка</th>
		<th scope="col" class="manage-column column-categories">Дата и время звонка</th>
		<th scope="col" class="manage-column column-categories">Номер менеджера</th>
		<th scope="col" class="manage-column column-categories">Сайт</th>
	</tr>
</thead>

<tbody>
<?php

foreach($json_data_calls[data] as $key => $value) {
	
?>	
	<tr>
		<th scope="col" class="manage-column column-author"><?php echo $json_data_calls[data][$key][id_call]; ?></th>
		<th scope="col" class="manage-column column-categories"><?php echo $json_data_calls[data][$key][callback_phone]; ?></th>
		<th scope="col" class="manage-column column-title"><audio controls><source src="<?php echo $json_data_calls[data][$key][record_url]; ?>" type="audio/mpeg">Тег audio не поддерживается вашим браузером. <a href="<?php echo $json_data_calls[data][$key][record_url]; ?>">Скачайте запись</a></audio></th>
		<th scope="col" class="manage-column column-categories"><?php echo $json_data_calls[data][$key][date_create]; ?></th>
		<th scope="col" class="manage-column column-categories"><?php echo $json_data_calls[data][$key][operator_phone]; ?></th>
		<th scope="col" class="manage-column column-categories"><?php echo $json_data_calls[data][$key][site]; ?></th>
	</tr>
<?php } ?>	
</tbody>

<tfoot>
	<tr>
		<th scope="col" class="manage-column column-author">№</th>
		<th scope="col" class="manage-column column-categories">Номер клиента</th>
		<th scope="col" class="manage-column column-title">Запись звонка</th>
		<th scope="col" class="manage-column column-categories">Дата и время звонка</th>
		<th scope="col" class="manage-column column-categories">Номер менеджера</th>
		<th scope="col" class="manage-column column-categories">Сайт</th>
	</tr> 
</tfoot>

</table>

<?php } ?>

<pre>
<? // print_r ($json_data_calls); ?>
</pre>

</div>
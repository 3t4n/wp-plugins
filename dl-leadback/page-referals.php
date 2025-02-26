<div class="wrap">
<h2>DL Leadback Список клиентов
<a href="http://leadback.ru/partner.php" target="_blank" style="float: right" class="button">Партнёрская программа на Leadback.ru</a>
</h2>

<br>

<?php
$secret_key = get_option( 'dl_leadback_secret_key' );
$client_id = get_option( 'dl_leadback_client_id' );

$get_url_referals = array(
	'secret_key' => $secret_key,
	'client_id' => $client_id,
);

$url_referals = 'https://leadback.ru/api/referals.php?'. http_build_query( $get_url_referals );
$json_data_referals = file_get_contents( $url_referals );
$json_data_referals = json_decode( $json_data_referals, true );

if ($json_data_referals[error_message] == 'Invalid value client_id OR secret_key') {
	
	echo '<div class="error"><p>Недопустимое значение <strong>client_id</strong> или <strong>secret_key</strong></p></div>';
	
} elseif ( $json_data_referals[totalCount] == '0' ) {
	
	echo '<div class="error"><p>Клиентов нет</p></div>';
	
} else {

?>
<table class="wp-list-table widefat fixed striped posts">

<thead>
	<tr>
		<th scope="col" class="manage-column">Имя</th>
		<th scope="col" class="manage-column">Телефон, почта</th>
		<th scope="col" class="manage-column column-date">Время регистрации</th>
		<th scope="col" class="manage-column column-date">Последнее посещение</th>
		<th scope="col" class="manage-column column-date">Название тарифа</th>
		<th scope="col" class="manage-column column-date">Тариф до</th>
		<th scope="col" class="manage-column column-date">Баланс, кол-во мин.</th>
		<th scope="col" class="manage-column column-date">Количество сайтов</th>
	</tr>
</thead>

<tbody>
<?php

foreach($json_data_referals[data] as $key => $value) {
	
?>	
	<tr>
		<th scope="col" class="manage-column"><?php echo $json_data_referals[data][$key][name]; ?></th>
		<th scope="col" class="manage-column"><?php echo $json_data_referals[data][$key][phone]; ?><br><?php echo $json_data_referals[data][$key][email]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][create_time]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][last_visit]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][tariff_name]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][tariff_expired_at]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][tariff_balance]; ?></th>
		<th scope="col" class="manage-column column-date"><?php echo $json_data_referals[data][$key][count_sites]; ?></th>
	</tr>
<?php } ?>	
</tbody>

<tfoot>
	<tr>
		<th scope="col" class="manage-column">Имя</th>
		<th scope="col" class="manage-column">Телефон, почта</th>
		<th scope="col" class="manage-column column-date">Время регистрации</th>
		<th scope="col" class="manage-column column-date">Последнее посещение</th>
		<th scope="col" class="manage-column column-date">Название тарифа</th>
		<th scope="col" class="manage-column column-date">Тариф до</th>
		<th scope="col" class="manage-column column-date">Баланс, кол-во мин.</th>
		<th scope="col" class="manage-column column-date">Количество сайтов</th>
	</tr> 
</tfoot>

</table>

<?php } ?>

</div>
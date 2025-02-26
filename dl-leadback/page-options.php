<?php
$secret_key = get_option('dl_leadback_secret_key');
$client_id = get_option('dl_leadback_client_id');
$campaign = get_option('dl_leadback_campaign');

$get_url_widgets = array(
	'secret_key' => $secret_key,
	'client_id' => $client_id,
);

$url_widgets = 'https://leadback.ru/api/widgets.php?'. http_build_query($get_url_widgets);
$json_data_widgets = file_get_contents($url_widgets);
$json_data_widgets = json_decode($json_data_widgets, true);
?>

<div class="wrap">

	<h2>DL Leadback</h2>
	
	<p class="description" >LeadBack - это умный виджет "обратный звонок" для сайта, который увеличивает количество звонков с сайта в 2 раза, без дополнительных вложений в рекламу. Если вы сейчас получаете 5 звонков с сайта, то с использованием leadback их будет 10.</p>
	
	<p class="description" >Привлекайте клиентов в LeadBack, используя вашу реферальную ссылку, и получайте вознаграждение 10% от их платежей.</p>
	
	<p><a href="http://leadback.ru/?pid=5727" target="_blank" class="button">Зарегистрироваться на LeadBack</a></p>

	<h2>Настройки Leadback</h2>
	
	<form method="post" action="options.php">
	
	<?php settings_fields( 'dl-leadback-settings-group' ); ?>
	<?php settings_errors(); ?>

	<table class="form-table">
		<p><a href="http://leadback.ru/api.php" target="_blank" class="button">Получить API для интеграции</a></p>
		<? 
		
		if($secret_key <> '' or $client_id <> '') {
		
		if($json_data_widgets[error_message] == 'Invalid value client_id OR secret_key') { 
		
		echo '<div class="error"><p>Недопустимое значение <strong>client_id</strong> или <strong>secret_key</strong></p></div>';
		
		} else {
			
		?>
		
		<tr valign="top">
			<th scope="row">Использовать виджет для домена</th>
			<td>
			<? foreach($json_data_widgets[data] as $key => $value) { ?>
				<p>
					<input 
						type="radio" 
						name="dl_leadback_campaign"
						
						<?php checked( $json_data_widgets[data][$key][widget_key] , $campaign , true );  ?>
						
						value="<? echo $json_data_widgets[data][$key][widget_key]; ?>"
						required
						><? echo $json_data_widgets[data][$key][site]; ?>
						</p>
			<? } ?>
			</td>
		</tr>
		
		<? } } ?>
	
		<tr valign="top">
			<th scope="row">Секретный ключ API (<em>secret_key</em>)</th>
			<td>
				<input
					type="text"
					name="dl_leadback_secret_key"
					placeholder="secret_key"
					size="35"
					value="<?php echo get_option('dl_leadback_secret_key'); ?>"
					required
				/>	
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">ID-клиента (<em>client_id</em>)</th>
			<td>
				<input
					type="text"
					name="dl_leadback_client_id"
					placeholder="client_id"
					size="35"
					value="<?php echo get_option('dl_leadback_client_id'); ?>"
					required
				/>
			</td>
		</tr>
	</table>
	
	<?php submit_button(); ?>
	
	</form>
	
</div>


<pre>
<? // echo print_r ($json_data_widgets); ?>
</pre>
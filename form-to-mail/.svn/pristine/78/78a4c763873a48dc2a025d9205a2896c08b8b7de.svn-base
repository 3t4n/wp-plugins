<?php
function ftm_content_box($post) {
	$content = $post->post_content;
	
	if(is_array(json_decode($content,true))){
		$content = json_decode($content,true);
	}else{
		$content = [];
	}
?>
	<script>
		jQuery(document).ready(function(){
			
		})
		jQuery(document).on('click','#ftm_add_field',function(){
			var ftm_content_field = jQuery('#ftm_content_field').html();
			console.log(ftm_content_field);
			jQuery('#ftm_field_list').append(ftm_content_field);
			return false;
		})
	</script>
<table class="hidden">
	<tbody id="ftm_content_field">
	<?php ftm_content_field() ?>
	</tbody>
</table>
<table class="widefat fixed">
	<thead>
		<tr>
			<th>Название</th>
			<th>Имя</th>
			<th>Тип</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="ftm_field_list">
<?php
	foreach($content as $field){
		ftm_content_field($field);
	}
	ftm_content_field();
?>
	</tbody>
</table>
<br />
<button id="ftm_add_field" class="button button-primary button-large">Добавить поле</button>
<?php
}

function ftm_content_field($field = []){
?>
	<tr>
		<td>
			<input type="text" name="ftm_content[label][]" value="<?php echo $field['label']; ?>">
		</td>
		<td>
			<input type="text" name="ftm_content[name][]" value="<?php echo $field['name']; ?>">
		</td>
		<td>
			<select name="ftm_content[type][]">
				<option value="string">Строка</option>
				<option value="array" <?php echo ($field['type'] == 'array')?'selected':''; ?>>Множественный выбор</option>
				<option value="tel" <?php echo ($field['type'] == 'tel')?'selected':''; ?>>Телефон</option>
				<option value="email" <?php echo ($field['type'] == 'email')?'selected':''; ?>>E-mail</option>
			</select>
		</td>
		<td>
			<select name="ftm_content[required][]">
				<option value="false">Необязательное</option>
				<option value="true" <?php echo ($field['required'] == 'true')?'selected':''; ?>>Обязательное</option>
			</select>
		</td>
	</tr>
<?php	
}
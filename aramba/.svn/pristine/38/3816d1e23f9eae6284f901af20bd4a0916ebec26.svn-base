<div class="aramba-wrap">
	
	<h2>Aramba Integration</h2>
	
	<form action="" method="post" name="aramba_import" id="aramba_import">
		<h3><? _e('Choose users for export', 'aramba'); ?></h3>
		<div class="vendosoft-form-item">
			<select id="user_role" name="user_role">
				<option value="all"><?php _e('All', 'aramba'); ?></option>
				<?php wp_dropdown_roles('subscriber'); ?>
			</select>
		</div>
		<h3><? _e('Choose group for export', 'aramba'); ?></h3>
		<div class="vendosoft-form-item">
			<select name="group">
				<? for ($i = 0; $i < count($listOfGroups["items"]); $i++) { ?>
					<option value="<? echo $listOfGroups["items"][$i]["id"]; ?>"><? echo $listOfGroups["items"][$i]["name"]; ?></option>
				<? } ?>
			</select>
		</div>
		<div class="vendosoft-form-item">
			<input type="submit" name="aramba_import_button" id="aramba_import_button" value="<? _e('Add contact', 'aramba'); ?>"/>
		</div>
	</form>
	<div class="import-result">
		
	</div>
  <div class="aramba-notice notice-info">
    Если у Ваc возникают проблемы при добавлении контактов через модуль, выгрузите их в .csv файл и загрузите файл в нашем личном кабинете
  </div>
</div>
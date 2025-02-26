<div class="mail365-wrap">
	
	<h2>Mail365 Integration</h2>
	
	<form action="" method="post" name="mail365_import" id="mail365_import">
		<h3><? _e('Choose users for export', 'mail365'); ?></h3>
		<div class="vendosoft-form-item">
			<select id="user_role" name="user_role">
				<option value="all"><?php _e('All', 'mail365'); ?></option>
				<?php wp_dropdown_roles('subscriber'); ?>
			</select>
		</div>
		<h3><? _e('Choose group for export', 'mail365'); ?></h3>
		<div class="vendosoft-form-item">
			<select name="group">
				<? for ($i = 0; $i < count($listOfGroups["items"]); $i++) { ?>
					<option value="<? echo $listOfGroups["items"][$i]["id"]; ?>"><? echo $listOfGroups["items"][$i]["name"]; ?></option>
				<? } ?>
			</select>
		</div>
		<div class="vendosoft-form-item">
			<input type="submit" name="mail365_import_button" id="mail365_import_button" value="<? _e('Add contact', 'mail365'); ?>"/>
		</div>
	</form>
	<div class="import-result">
		
	</div>
  <div class="mail365-notice notice-info">
    Если у Ваc возникают проблемы при добавлении контактов через модуль, выгрузите их в .csv файл и загрузите файл в нашем личном кабинете
  </div>
</div>
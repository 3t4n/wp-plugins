<?php 
class AopfAutoofficeForm{

	public static function aopf_autooffice_getForm($data, $params) {
		if (!empty($params['newsletter'])) {
			if (!empty($data['load']['newsletter'])) {
				?>
				<div style="padding: 4px 0 4px 0">
					<select name="<?=$params['newsletter']['name']?>" class="widget-title ui-sortable-handle" style="width:100%" id="<?=$params['newsletter']['id']?>">
						<option value="0"><?=__('Choose Newsletter', 'autooffice')?></option>
						<?php foreach ($data['load']['newsletter'] as $key=>$value) { ?>
							<option value="<?=$key?>" <?=($params['newsletter']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
						<?php } ?>
					</select>
				</div>
				<?php
			} else {
				?>
				<div style="padding: 4px 0 4px 0">
					<input type="number" min="1" placeholder="<?=__('Id newsletter', 'autooffice')?>" name="<?=$params['newsletter']['name']?>" value="<?=$params['newsletter']['value']?>" id="<?=$params['newsletter']['id']?>" class="form-control">
				</div>
				<?php
			}
		}

		if (!empty($params['advertising'])) {
			if (!empty($data['load']['advertising'])) {
				?>
				<div style="padding: 4px 0 4px 0">
					<select name="<?=$params['advertising']['name']?>" class="widget-title ui-sortable-handle" style="width:100%" id="<?=$params['advertising']['id']?>">
						<option value="0"><?=__('Choose Advertising', 'autooffice')?></option>
						<?php foreach ($data['load']['advertising'] as $key=>$value) { ?>
							<option value="<?=$key?>" <?=($params['advertising']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
						<?php } ?>
					</select>
				</div>
				<?php
			} else {
				?>
				<div style="padding: 4px 0 4px 0">
					<input type="number" min="1" placeholder="<?=__('Id advertising channel', 'autooffice')?>" name="<?=$params['advertising']['name']?>" id="<?=$params['advertising']['id']?>" value="<?=$params['advertising']['value']?>" class="form-control">
				</div>
				<?php
			}
		}
		
		if (!empty($params['subsform'])) {
			if (!empty($data['load']['subsform'])) {
				?>
				<div style="padding: 4px 0 4px 0">
					<select name="<?=$params['subsform']['name']?>" class="widget-title ui-sortable-handle" style="width:100%" id="<?=$params['subsform']['id']?>">
						<option value="0"><?=__('Choose Subsform', 'autooffice')?></option>
						<?php foreach ($data['load']['subsform'] as $key=>$value) { ?>
							<option value="<?=$key?>" <?=($params['subsform']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
						<?php } ?>
					</select>
				</div>
				<?php
			} else {
				?>
				<div style="padding: 4px 0 4px 0">
					<input type="number" min="1" placeholder="<?=__('Id subsform', 'autooffice')?>" name="<?=$params['subsform']['name']?>" value="<?=$params['subsform']['value']?>" id="<?=$params['subsform']['id']?>" class="form-control">
				</div>
				<?php
			}
		}

		if (!empty($params['title'])) {
			?>
			<div style="padding: 4px 0 4px 0">
				<input type="text" placeholder="<?=__('Form Title', 'autooffice')?>" name="<?=$params['title']['name']?>" value="<?=$params['title']['value']?>" id="<?=$params['title']['id']?>" class="form-control">
			</div>
			<?php
		}
	}
}
			
			
			
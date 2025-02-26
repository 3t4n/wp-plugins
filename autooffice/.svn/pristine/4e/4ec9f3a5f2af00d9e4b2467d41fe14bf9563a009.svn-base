<?php 
if (!empty($this->data['post']['newsletter']['value'])) {
	$radio_check = $this->data['post']['newsletter']['value'];
} else if (!empty($this->data['select']['newsletter']['value'])) {
	$radio_check = $this->data['select']['newsletter']['value'];
} else {
	$radio_check = 1;
}
?>
<div id="autooffice_theme" class="wrap">
	<h2><?=_e('Plugin settings', 'autooffice')?></h2>
	<p>&nbsp;</p>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-11 col-md-10 col-lg-9">
   
				<div class="row">
					<div class="col-sm-offset-4 col-sm-8">
						<?php if (AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'all')) { ?>
							
							<div class="alert alert-danger">
								<?=AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'all')?>
							</div>
							
						<?php } elseif (AutoofficeModel::aopf()->aopf_autooffice_hasSession('success', 'all')) { ?>
					   
							<div class="alert alert-success">
								<?=AutoofficeModel::aopf()->aopf_autooffice_getSession('success', 'all')?>
							</div>
					   
						<?php } ?>
					</div>
				</div>

				<form method="post" name="autooffice_setting_form" class="form-horizontal" role="form">   

					<div class="row">
						<div class="col-sm-offset-4 col-sm-8">
							<div class="alert alert-info">
								<small><?=_e('Warning Base Settings', 'autooffice')?></small>
								<ul style="padding:6px 0 0 30px;list-style:disc" id="accordion">
									<li data-toggle="collapse" data-parent="#accordion" href="#collapse">
										<small><?=_e('Warning Base Settings text1', 'autooffice')?></small>
										<span class="glyphicon glyphicon-info-sign" style="cursor:pointer"></span>
									</li>
									<ul style="padding:6px 0 0 30px;list-style:none" id="collapse" class="panel-collapse collapse">
										<li>
											<small>
												<?php
												$info = __('Warning Base Settings text5', 'autooffice');
												$info = preg_replace('/{{scrin_1}}/', '', $info);
												$info = preg_replace('/{{scrin_2}}/', '', $info);
												$info = preg_replace('/{{scrin_3}}/', '<img style="max-width:90%" src="'.AOPF_AUTOOFFICE_URL.'assets/img/screen-3.jpg">', $info);
												echo $info;
												?>
											</small>
										</li>
									</ul>
									<li><small><?=_e('Warning Base Settings text2', 'autooffice')?></small></li>
									<li><small><?=_e('Warning Base Settings text3', 'autooffice')?></small></li>
									<li><small><?=_e('Warning Base Settings text4', 'autooffice')?></small></li>
								</ul>
							</div>
							<div class="alert alert-warning">
								<?=_e('Form Note', 'autooffice')?>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="Autooffice_stores_id" class="col-sm-4 control-label">
							<?=_e('Stores ID', 'autooffice')?> <span style="color:red">*</span>
						</label>
						<div class="col-sm-8">
							<input type="number" min="1" name="Autooffice[stores_id]" id="Autooffice_stores_id" value="<?=!empty($this->data['post']['stores_id']['value']) ? $this->data['post']['stores_id']['value'] : $this->data['select']['stores_id']['value']?>" class="form-control" <?=$this->data['select']['api_key']['required'] ? 'required' : ''?>>
							<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'stores_id') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'stores_id').'</div>' : ''?>
						</div>
					</div>
					<div class="form-group">
						<label for="Autooffice_stores_name" class="col-sm-4 control-label">
							<?=_e('Stores Name', 'autooffice')?> <span style="color:red">*</span>
						</label>
						<div class="col-sm-8">
							<input type="text" maxlength="225" name="Autooffice[stores_name]" id="Autooffice_stores_name" value="<?=!empty($this->data['post']['stores_name']['value']) ? $this->data['post']['stores_name']['value'] : $this->data['select']['stores_name']['value']?>" class="form-control" <?=$this->data['select']['stores_name']['required'] ? 'required' : ''?>>
							<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'stores_name') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'stores_name').'</div>' : ''?>
						</div>
					</div>
					<div class="form-group">
						<label for="Autooffice_api_key" class="col-sm-4 control-label">
							<?=_e('Stores APi Key', 'autooffice')?> <span style="color:red">*</span>
						</label>
						<div class="col-sm-8">
							<input type="text" maxlength="225" name="Autooffice[api_key]" id="Autooffice_api_key" value="<?=!empty($this->data['post']['api_key']['value']) ? $this->data['post']['api_key']['value'] : $this->data['select']['api_key']['value']?>" class="form-control" <?=$this->data['select']['api_key']['required'] ? 'required' : ''?>>
							<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'api_key') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'api_key').'</div>' : ''?>
						</div>
					</div>

					<?php 
					if (
						!empty($this->data['select']['stores_name']['value']) && 
						!empty($this->data['select']['api_key']['value']) &&
						!empty($this->data['select']['stores_id']['value'])
					) { 
						asort($this->data['load']['newsletter']);
						?>

						<div class="form-group">
							<?php if (!empty($this->data['load']['newsletter'])) { ?>

								<label for="Autooffice_newsletter" class="col-sm-4 control-label">
									<?=__('Id newsletter', 'autooffice')?> <span style="color:red">*</span>
								</label>
								<div class="col-sm-8">
									<select name="Autooffice[newsletter]" id="Autooffice_newsletter" class="form-control" style="max-width:100%" <?=$this->data['select']['newsletter']['required'] ? 'required' : ''?>>
										<option value=""><?=__('Choose Newsletter', 'autooffice')?></option>
										<?php foreach ($this->data['load']['newsletter'] as $key=>$value) { ?>
											<option value="<?=$key?>" <?=($this->data['select']['newsletter']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
										<?php } ?>
									</select>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'newsletter') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'newsletter').'</div>' : ''?>
								</div>

							<?php } else { ?>
							
								<label for="Autooffice_newsletter" class="col-sm-4 control-label">
									<?=__('Id newsletter', 'autooffice')?> <span style="color:red">*</span>
								</label>
								<div class="col-sm-8">
									<input type="number" min="1" name="Autooffice[newsletter]" id="Autooffice_newsletter" value="<?=$this->data['post']['newsletter']['value'] ? $this->data['post']['newsletter']['value'] : $this->data['select']['newsletter']['value']?>" class="form-control" required="required" <?=$this->data['select']['newsletter']['required'] ? 'required' : ''?>>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'newsletter') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'newsletter').'</div>' : ''?>
								</div>

							<?php } ?>
						</div>

						<div class="form-group">
							<?php if (!empty($this->data['load']['advertising'])) { ?>
						
								<label for="Autooffice_advertising" class="col-sm-4 control-label">
									<?=__('Id advertising channel', 'autooffice')?>
								</label>
								<div class="col-sm-8">
									<select name="Autooffice[advertising]" id="Autooffice_advertising" class="form-control" style="max-width:100%" <?=$this->data['select']['advertising']['required'] ? 'required' : ''?>>
										<option value="0"><?=__('Choose Advertising', 'autooffice')?></option>
										<?php foreach ($this->data['load']['advertising'] as $key=>$value) { ?>
											<option value="<?=$key?>"<?=($this->data['select']['advertising']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
										<?php } ?>
									</select>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'advertising') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'advertising').'</div>' : ''?>
								</div>
							<?php } else { ?>	
								
								<label for="Autooffice_advertising" class="col-sm-4 control-label">
									<?=__('Id advertising channel', 'autooffice')?>
								</label>
								<div class="col-sm-8">
									<input type="number" min="0" name="Autooffice[advertising]" id="Autooffice_advertising" value="<?=$this->data['post']['advertising']['value'] ? $this->data['post']['advertising']['value'] : $this->data['select']['advertising']['value']?>" class="form-control" <?=$this->data['select']['advertising']['required'] ? 'required' : ''?>>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'advertising') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'advertising').'</div>' : ''?>
								</div>
								
							<?php } ?>	
						</div>

						<div class="form-group">
							<?php if (!empty($this->data['load']['subsform'])) { ?>
						
								<label for="Autooffice_subsform" class="col-sm-4 control-label">
									<?=__('Id subsform', 'autooffice')?>
								</label>
								<div class="col-sm-8">
									<select name="Autooffice[subsform]" id="Autooffice_subsform" class="form-control" style="width:100%" <?=$this->data['select']['subsform']['required'] ? 'required' : ''?>>
										<option value="0"><?=__('Choose Subsform', 'autooffice')?></option>
										<?php foreach ($this->data['load']['subsform'] as $key=>$value) { ?>
											<option value="<?=$key?>"<?=($this->data['select']['subsform']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
										<?php } ?>
									</select>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'subsform') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'subsform').'</div>' : ''?>
								</div>
							<?php } else { ?>	
								
								<label for="Autooffice_subsform" class="col-sm-4 control-label">
									<?=__('Id subsform', 'autooffice')?>
								</label>
								<div class="col-sm-8">
									<input type="number" min="0" name="Autooffice[subsform]" id="Autooffice_subsform" value="<?=$this->data['post']['subsform']['value'] ? $this->data['post']['subsform']['value'] : $this->data['select']['subsform']['value']?>" class="form-control" <?=$this->data['select']['subsform']['required'] ? 'required' : ''?>>
									<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'subsform') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'subsform').'</div>' : ''?>
								</div>
								
							<?php } ?>	
						</div>
					
					<?php } ?>

					<input type="submit" name="submit" id="submit" class="button button-primary pull-right" value="<?=_e('Save', 'autooffice')?>">
					<div class="clearfix"></div>
				</form>

			</div>
		</div>
	</div>
</div>
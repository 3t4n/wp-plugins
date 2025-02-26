<div id="autooffice_theme" class="wrap">
	<h2><?=_e('Plugin settings', 'autooffice')?></h2>
	<p>&nbsp;</p>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-11 col-md-10 col-lg-9">
   
				<?php if (!empty($error)) { ?>
					
					<div class="alert alert-danger">
						<?=$error?>
					</div>
					
				<?php } elseif (!empty($success)) { ?>
			   
					<div class="alert alert-success">
						<?=$success?>
					</div>
			   
				<?php } elseif (!empty($message)) { ?>
			   
					<div class="alert alert-info">
						<?=$message?>
					</div>
			   
				<?php } ?>

				<form method="post" name="autooffice_setting_form" class="form-horizontal" role="form">   
				
					<div class="form-group">
						<label for="Autooffice_stores_name" class="col-sm-4 control-label">
							<?=_e('Stores Name', 'autooffice')?>
						</label>
						<div class="col-sm-8">
							<input type="text" maxlength="225" name="Autooffice[stores_name]" id="Autooffice_stores_name" value="<?=$this->data['stores_name']['value'] ? $this->data['stores_name']['value'] : ''?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="Autooffice_api_key" class="col-sm-4 control-label">
							<?=_e('Stores APi Key', 'autooffice')?>
						</label>
						<div class="col-sm-8">
							<input type="text" maxlength="225" name="Autooffice[api_key]" id="Autooffice_api_key" value="<?=$this->data['api_key']['value'] ? $this->data['api_key']['value'] : ''?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<?php if (!empty($data->newsletter)) { ?>

							<label for="Autooffice_newsletter" class="col-sm-4 control-label">
								<?=__('Id newsletter', 'autooffice')?>
							</label>
							<div class="col-sm-8">
								<select name="Autooffice[newsletter]" id="Autooffice_newsletter" class="form-control" style="width:100%">
									<option value="0"><?=__('Choose Newsletter', 'autooffice')?></option>
									<?php foreach ($data->newsletter as $key=>$value) { ?>
										<option value="<?=$key?>" <?=($this->data['newsletter']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
									<?php } ?>
								</select>
							</div>

						<?php } else { ?>
						
							<label for="Autooffice_newsletter" class="col-sm-4 control-label">
								<?=__('Id newsletter', 'autooffice')?>
							</label>
							<div class="col-sm-8">
								<input type="number" min="1" name="Autooffice[newsletter]" id="Autooffice_newsletter" value="<?=$this->data['newsletter']['value'] ? $this->data['newsletter']['value'] : ''?>" class="form-control">
							</div>

						<?php } ?>
					</div>

					<div class="form-group">
						<?php if (!empty($data->advertising)) { ?>
					
							<label for="Autooffice_api_key" class="col-sm-4 control-label">
								<?=__('Id advertising channel', 'autooffice')?>
							</label>
							<div class="col-sm-8">
								<select name="Autooffice[advertising]" id="Autoofficeadvertising" class="form-control" style="width:100%">
									<option value="0"><?=__('Choose Advertising', 'autooffice')?></option>
									<?php foreach ($data->advertising as $key=>$value) { ?>
										<option value="<?=$key?>"<?=($this->data['advertising']['value']==$key) ? 'selected' : ''?>><?=$value?></option>
									<?php } ?>
								</select>
							</div>
						<?php } else { ?>	
							
							<label for="Autooffice_advertising" class="col-sm-4 control-label">
								<?=__('Id advertising channel', 'autooffice')?>
							</label>
							<div class="col-sm-8">
								<input type="number" min="1" name="Autooffice[advertising]" id="Autooffice_advertising" value="<?=$this->data['advertising']['value'] ? $this->data['advertising']['value'] : ''?>" class="form-control">
							</div>
							
						<?php } ?>	
					</div>

					<input type="submit" name="submit" id="submit" class="button button-primary pull-right" value="<?=_e('Save', 'autooffice')?>">
					<div class="clearfix"></div>
			   </form>  
			</div>
		</div>
	</div>
</div>
<?php
function aopf_autooffice_page_settings_html() {
	echo '<script type="text/javascript">
		function resetForm() {
			var default_form = document.getElementById("Autooffice_default_form_html");
			var edit_form = document.getElementById("Autooffice_form_html");
			edit_form.value = default_form.value;
		}
		function selectForm() {
			var form = document.getElementById("Autooffice_form_html");
			form.select();
			document.execCommand("Copy");
		}
	</script>';
}
add_action('admin_footer', 'aopf_autooffice_page_settings_html');

$form = !empty($this->data['post']['form_html']['value']) ? $this->data['post']['form_html']['value'] : $this->data['select']['form_html']['value'];
$form = AutoofficeModel::aopf()->aopf_autooffice_parserForm($form);
?>
<div id="autooffice_theme" class="wrap">
	<h2><?=_e('Plugin settings', 'autooffice')?></h2>
	<p>&nbsp;</p>
	
	<div class="container-fluid">
		<div class="row">
		
			<div class="col-sm-12">

				<?php if (AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'all')) { ?>
								
					<div class="alert alert-danger">
						<?=AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'all')?>
					</div>
								
				<?php } elseif (AutoofficeModel::aopf()->aopf_autooffice_hasSession('success', 'all')) { ?>
						   
					<div class="alert alert-success">
							<?=AutoofficeModel::aopf()->aopf_autooffice_getSession('success', 'all')?>
					</div>
						   
				<?php } ?>

				<form method="post" name="autooffice_setting_form_css" class="form-horizontal" role="form">	
					<div class="form-group">
						<label for="Autooffice_subsform" class="col-sm-12">
							<?=__('Code Html', 'autooffice')?>
						</label>
						<div class="col-sm-12">
							<textarea style="font-size:13px" name="Autooffice[form_html]" id="Autooffice_form_html" class="form-control" rows="24" <?=$this->data['select']['form_html']['required'] ? 'required' : ''?>><?=$form?></textarea>
							<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'form_html') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'form_html').'</div>' : ''?>
						</div>
					</div>
					<input type="submit" name="submit" id="submit" class="btn btn-primary pull-right" value="<?=_e('Save', 'autooffice')?>">
					<input type="button" name="reset" onclick="resetForm()" id="reset" class="btn btn-warning pull-right" value="<?=_e('Reset', 'autooffice')?>" style="margin-right:6px">
					<input type="button" name="select" onclick="selectForm()" id="select" class="btn btn-success pull-right" value="<?=_e('Copy', 'autooffice')?>" style="margin-right:6px">
				</form>	
				
			</div>
			
			<div class="form-group" style="display:none">
				<label for="Autooffice_subsform" class="col-sm-12">
					<?=__('Default Code Html', 'autooffice')?>
				</label>
				<div class="col-sm-12">
					<textarea style="font-size:13px;resize:none" id="Autooffice_default_form_html" class="form-control" rows="16" readonly><?=AutoofficeModel::aopf()->aopf_autooffice_getDefaultForm()?></textarea>
				</div>
			</div>
			
		</div>
	</div>
</div>
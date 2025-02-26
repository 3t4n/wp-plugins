<?php
function aopf_autooffice_page_settings_js() {
	echo '<script type="text/javascript">
		function resetForm() {
			var elem = document.getElementById("Autooffice_form_js");
			elem.value="";
		}
	</script>';
}
add_action('admin_footer', 'aopf_autooffice_page_settings_js');
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
				
				<form method="post" name="autooffice_setting_form_js" class="form-horizontal" role="form">	
					<div class="form-group">
						<label for="Autooffice_subsform" class="col-sm-12">
							<?=__('Code Js', 'autooffice')?>
						</label>
						<div class="col-sm-12">
							<textarea style="font-size:13px" name="Autooffice[form_js]" id="Autooffice_form_js" class="form-control" rows="20" <?=!empty($this->data['select']['form_js']['required']) ? 'required' : ''?>><?=!empty($this->data['post']['form_js']['value']) ? $this->data['post']['form_js']['value'] : $this->data['select']['form_js']['value']?></textarea>
							<?=AutoofficeModel::aopf()->aopf_autooffice_hasSession('error', 'form_js') ? '<div class="alert alert-danger">'.AutoofficeModel::aopf()->aopf_autooffice_getSession('error', 'form_js').'</div>' : ''?>
						</div>
					</div>
					<input type="submit" name="submit" id="submit" class="btn btn-primary pull-right" value="<?=_e('Save', 'autooffice')?>">
					<input type="button" name="reset" id="reset" class="btn btn-warning pull-right" value="<?=_e('Reset', 'autooffice')?>" style="margin-right:6px" onclick="resetForm()">
				</form>	
			</div>
			
		</div>
	</div>
</div>
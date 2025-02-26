<?php $opid = get_option('ibw-option-base-operatorid', '');
if(!empty($opid)){ ?>

<p>Listed are the widgets available for use.</p>
	
<div class="ibex-widget-groups">
<?php foreach($this->admin->getAvailableWidgets() as $widgetGroupName => $widgets){
	$readMeText = file_get_contents(IBEX_BW_PLUGIN_DIR . '/includes/widgets/' . $widgetGroupName . '/desc.txt');
	if(count($widgets) == 0) continue;
	?>
	<div class="ibex-widget-group group-<?php echo $widgetGroupName?>">
		<h3><?php echo ucwords($widgetGroupName)?></h3>
		<p><?php echo $readMeText; ?></p>
		
		<div class="ibex-widgets">
			<?php if(count($widgets) == 0){ ?>
				No available widgets.				
			<?php } else { foreach($widgets as $widgetCode => $widgetTitle){ ?>
				<div class="ibex-widget">
					<a href="?page=ibex-widgets&amp;widget=<?php echo $widgetGroupName . '-' . $widgetCode?>"><span class="widget-title"><?php echo $widgetTitle?></span></a>
				</div>
			<?php }} ?>
		</div>
	</div>
<?php } ?>
</div>
<?php } else { ?>
<div class="error settings-error"> 
	<p><strong>Please save a operator ID before continuing.</strong></p>
</div>
<?php } ?>


<form action="options.php" method="post">
	<?php settings_fields('ibw-options-base')?>
	<?php do_settings_sections('ibw-options-base')?>
	
	<p class="submit"><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>
</form>
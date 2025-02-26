<?php $admin = iBex_Manager::getInstance();

$widget = isset($_GET['widget']) ? htmlentities($_GET['widget']) : null;

$obj = null;
if($widget){
	$path = explode('-', $widget, 2);
	$objName = iBex_Manager::getWidgetClassFile($path[0], $path[1]);
	$obj = new $objName;
	$return = true;
}
else {
	$obj = new iBex_Widgets_Base();
	$return = false;
}

/* @var $obj iBex_Widgets_Base */

$obj->addSettingsSection();

?>
<div class="wrap ibex-widgets-admin">
	<div class="icon32"><br></div>
	<h2>iBex Widgets<?php echo $obj->getTitle() ? ' - ' . $obj->getTitle() : ''?></h2>
	
	<?php if($return){ ?>
	<p><a href="?page=ibex-widgets">&laquo; Return to Widget Listing</a></p>
	<?php } ?>	
	
	<?php echo $obj->optionsPage() ?>
	
</div>
<?php 

// Don't use wordpress themes
define('WP_USE_THEMES', false);

require '../../../../../../wp-blog-header.php';

// Get the options
$opid = get_option('ibw-option-base-operatorid', '');

$objectTypes = array(
	'date'		=>	array('ClientDateSelector', IBEX_BW_PLUGIN_DIR . '/includes/widgets/accommodation/date-selector'), 
	'calendar'	=>	array('ClientCalendar', IBEX_BW_PLUGIN_DIR . '/includes/widgets/accommodation/mini-calendar'), 
	'agent'		=>	array('ClientAgentSelector', IBEX_BW_PLUGIN_DIR . '/includes/widgets/accommodation/date-selector'), 
);
$objectType = (isset($_GET['type']) && isset($objectTypes[$_GET['type']])) ? $objectTypes[$_GET['type']] : $objectTypes['date'];

// Get the css based on the object type
$theTemplate = isset($_GET['template']) ? htmlentities($_GET['template']) : 'theme-default';
$css = @file_get_contents($objectType[1] . '/' . preg_replace('/([^a-zA-Z0-9\-])/', '', $theTemplate) . '.css');

$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
$layoutFormat = ($mode == 'horizontal') ? 'Horizontal' : 'Vertical';
$bookingText = isset($_GET['text']) ? htmlentities($_GET['text']) : null;

$target = isset($_GET['target']) ? htmlentities($_GET['target']) : null;

// Add any extra params if required
$httpAgent = plugins_url('scripts/ibex-message-agent.html' , dirname(__FILE__));

$pid = isset($_GET['pid']) ? htmlentities($_GET['pid']) : false;

header(':', true, 200);

?>
<html>
<body style="background-color: transparent">
	<form action="http://ibex.seekom.com/accommodation/<?php echo $objectType[0] ?>.php" method="post">
		<input type="hidden" name="operator" id="operator" value="<?php echo $opid ?>" />
		<?php if($pid){ ?><input type="hidden" name="property" id="property" value="<?php echo $pid ?>" /><?php } ?>
		<input type="hidden" name="layoutFormat" id="layoutFormat" value="<?php echo $layoutFormat ?>" />
		<input type="hidden" name="clientStyles" id="clientStyles" value="<?php echo $css ?>" />
		
		<input type="hidden" name="buttonText" id="buttonText" value="<?php echo $bookingText; ?>" />
		
		<input type="hidden" name="gotoPage" id="gotoPage"  value="<?php echo $target; ?>" />
		<input type="hidden" name="targetWindow" id="targetWindow" value="_top" />
		
		<input type="hidden" name="hostMessageAgent" id="hostMessageAgent" value="<?php echo $httpAgent; ?>">
		
		<script language="javascript" type="text/javascript">
			document.forms[0].submit();
		</script>
	</form>
</body>
</html>
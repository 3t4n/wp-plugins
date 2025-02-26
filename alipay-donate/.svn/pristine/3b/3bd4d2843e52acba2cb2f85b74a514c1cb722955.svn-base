<?php 

require_once "{$_SERVER['DOCUMENT_ROOT']}/wp-load.php";
require_once 'includes/cls.option.php';

$options = new WS_AliDo_Option(WS_ALIDO_ID);




isset($_GET['bill']) || $_GET['bill'] = 'any';

$bill = urlencode( $_GET['bill']);

$email = urlencode($options->get('email'));

$url = urlencode( get_option('siteurl'));

$query = "bill={$bill}&url={$url}&email={$email}";



$gateway = 'http://www.waisir.com/addons/alipay/inc.alipay_donate.php?';

$goto = $gateway . $query;

header('Location:' . $goto );
?>
<html>
<head>
<title>redirecting...</title>
</head>

</html>
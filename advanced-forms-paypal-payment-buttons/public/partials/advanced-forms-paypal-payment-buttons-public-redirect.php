<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/public/partials
 */

?>
<html>
<head>
<title>Redirecting to Paypal...</title>
</head>
<body>
<br>
<h1 style="text-align: center;">Redirecting to PayPal...</h1>
<br>
<?php
	echo $form;
?>
<script type="text/javascript">
document.af_ppb.submit();
</script>
</body>
</html>
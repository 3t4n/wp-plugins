<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.leadnow.pl
 * @since      1.0.0
 *
 * @package    Leadnow_Fastpay
 * @subpackage Leadnow_Fastpay/public/partials
 */
?>
<div class="fastpay__wrapper" id="<?php echo $id ?>">
    <iframe src="<?php echo $iframeSrc; ?>" style="width: 100%; min-height: 350px; border: none;"></iframe>
    <iframe src="<?php echo $termsSrc; ?>" style="width: 100%; min-height: 35px; border: none;" class="fastpay__terms"></iframe>
</div>
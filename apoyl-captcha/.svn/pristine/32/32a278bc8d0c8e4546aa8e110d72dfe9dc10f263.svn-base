<?php
/*
 * @link       http://www.girltm.com
 * @since      1.0.0
 * @package    APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/public/partials
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<script>

jQuery(document).ready(function(){
	jQuery('#wp-submit').click(function(e){
		 e.preventDefault();
		 jQuery('#clicaptcha-submit-info').clicaptcha({
			src: apoyl_captcha_url,
			callback: function(){
				jQuery('#registerform').submit();
			}
		});
	});
});
</script>
<p><input type="hidden" id="clicaptcha-submit-info" name="clicaptcha-submit-info"></p>

<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_TENCENTVIDEO
 * @subpackage APOYL_TENCENTVIDEO/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>


<h1 class="wp-heading-inline"><?php esc_html_e('settings','apoyl-tencentvideo'); ?></h1>

<p>
    <?php _e('settings_desc','apoyl-tencentvideo'); ?>
    </p>
  
<ul class="subsubsub">
	<li><a href="options-general.php?page=apoyl-tencentvideo-settings"
		<?php if($do=='') echo 'class="current"';?> aria-current="page"><?php esc_html_e('settingsname','apoyl-tencentvideo'); ?><span
			class="count"></span></a></li>

</ul>

<div class="clear"></div>
<hr>
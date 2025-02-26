<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
?>
<h1 class="wp-heading-inline"><?php _e('settings','apoyl-ip'); ?></h1>
<p><?php _e('settings_desc','apoyl-ip'); ?></p>
<p><?php _e('time','apoyl-ip'); echo wp_date('Y-m-d H:i:s',time());?></p>
<ul class="subsubsub">
	<li><a href="options-general.php?page=apoyl-ip-settings"
		<?php if($do=='') echo 'class="current"';?> aria-current="page"><?php _e('settingsname','apoyl-ip'); ?><span
			class="count"></span></a></li>

</ul>

<div class="clear"></div>
<hr>
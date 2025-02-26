<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_TENCENTCOS
 * @subpackage APOYL_TENCENTCOS/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<h1 class="wp-heading-inline"><?php _e('settings','apoyl-tencentcos'); ?></h1>

<p>
    <?php _e('settings_desc','apoyl-tencentcos'); ?>
    </p>
  
<ul class="subsubsub">
	<li><a href="options-general.php?page=apoyl-tencentcos-settings"
		<?php if($do=='') echo 'class="current"';?> aria-current="page"><?php _e('settingsname','apoyl-tencentcos'); ?><span
			class="count"></span></a> |</li>
	<li><a href="options-general.php?page=apoyl-tencentcos-settings&do=syn"
		<?php if($do=='syn') echo 'class="current"';?>><?php _e('nav_syn','apoyl-tencentcos'); ?><span
			class="count"></span></a></li>
</ul>

<div class="clear"></div>
<hr>
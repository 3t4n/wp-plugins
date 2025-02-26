<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_ALIYUNOSS
 * @subpackage APOYL_ALIYUNOSS/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
?>

<h1 class="wp-heading-inline"><?php _e('settings','apoyl-aliyunoss'); ?></h1>

<p>
    <?php _e('settings_desc','apoyl-aliyunoss'); ?>
    </p>
  
<ul class="subsubsub">
	<li><a href="options-general.php?page=apoyl-aliyunoss-settings"
		<?php if($do=='') echo 'class="current"';?> aria-current="page"><?php _e('settingsname','apoyl-aliyunoss'); ?><span
			class="count"></span></a> |</li>
	<li><a href="options-general.php?page=apoyl-aliyunoss-settings&do=syn"
		<?php if($do=='syn') echo 'class="current"';?>><?php _e('nav_syn','apoyl-aliyunoss'); ?><span
			class="count"></span></a></li>
</ul>

<div class="clear"></div>
<hr>
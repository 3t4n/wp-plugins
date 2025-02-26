<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_QINIUKODO
 * @subpackage APOYL_QINIUKODO/admin/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<h1 class="wp-heading-inline"><?php _e('settings','apoyl-qiniukodo'); ?></h1>

<p>
    <?php _e('settings_desc','apoyl-qiniukodo'); ?>
    </p>
  
<ul class="subsubsub">
	<li><a href="options-general.php?page=apoyl-qiniukodo-settings"
		<?php if($do=='') echo 'class="current"';?> aria-current="page"><?php _e('settingsname','apoyl-qiniukodo'); ?><span
			class="count"></span></a> |</li>
	<li><a href="options-general.php?page=apoyl-qiniukodo-settings&do=syn"
		<?php if($do=='syn') echo 'class="current"';?>><?php _e('nav_syn','apoyl-qiniukodo'); ?><span
			class="count"></span></a></li>
</ul>

<div class="clear"></div>
<hr>
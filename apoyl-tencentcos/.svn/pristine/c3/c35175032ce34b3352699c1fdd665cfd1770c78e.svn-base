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
$updateflag = false;
$next = false;
$arr = get_option($options_name);
if (! empty($_POST['synsubmit']) && check_admin_referer('apoyl-tencentcos-settings', '_wpnonce')) {
    $pagenum = isset($_POST['pagenum']) ? intval($_POST['pagenum']) : 1;
    $num = 2;
    $start = ($pagenum - 1) * $num;
    $end = $pagenum * $num;
    $attachdata = $this->get_attachs($num, $pagenum);
    if (isset($attachdata['data'])) {
        if ($attachdata['done'])
            $updateflag = true;
        $file=apoyl_tencentcos_file('addthumbnails');
        if($file){
            include $file;
        }else {
            require_once APOYL_TENCENTCOS_DIR . 'api/ApoylTencentcosCom.php';
            foreach ($attachdata['data'] as $v) {
                $obj = new ApoylTencentcosCom($arr);
                $a = explode('wp-content/', $v->guid);
                if (isset($a[1]))
                    $remsg = $obj->putObj($a[1]);
                if ($arr['opendebug']) {
                    $updateflag = true;
                    break;
                }
            }
        }
        $next = true;
        $pagenum ++;
        if(!$updateflag){
        ?><form action="" method="post" name="apoyl-tencentcos-syn"
	id="apoyl-tencentcos-syn">
	<input type="hidden" name="pagenum" value="<?php echo $pagenum;?>" />
<?php      wp_nonce_field("apoyl-tencentcos-settings");?>
                  <input type="hidden" name="synsubmit" value="1" />
</form>
<script type="text/JavaScript">setTimeout("document.getElementById('apoyl-tencentcos-syn').submit();", 5000);</script>
<?php
        }
    } else {
        
        $updateflag = true;
    }
}

?>


<div class="wrap">
<?php include  APOYL_TENCENTCOS_DIR . 'admin/partials/nav.php';?>

<?php 

if ($arr['opendebug'] && isset($remsg)) {
   
    if (is_bool($remsg))
        echo '<div id="message" class="updated fade"><p>' . __('opendebug_result', 'apoyl-tencentcos') . '</p></div>';
    else
        echo '<div id="message" class="updated error"><p>' . esc_attr($remsg) . '</p></div>';

    exit();
} elseif ($updateflag) {
    echo '<div id="message" class="updated fade"><p>' . __('synsuccess', 'apoyl-tencentcos') . '</p></div>';
    exit();
}
?>

<?php

if (! $arr['open']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_open','apoyl-tencentcos'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"><?php _e('history','apoyl-tencentcos');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['accessid']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_accessid','apoyl-tencentcos'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"><?php _e('history','apoyl-tencentcos');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['secretkey']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_secretkey','apoyl-tencentcos'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"><?php _e('history','apoyl-tencentcos');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['region']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_region','apoyl-tencentcos'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"><?php _e('history','apoyl-tencentcos');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['bucket']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_bucket','apoyl-tencentcos'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings');?>"><?php _e('history','apoyl-tencentcos');?></a>
		</p>
	</div>
 <?php exit;} ?>
<?php if($next){?>
<div id="message" class="updated fade">
		<p>
			<strong><?php _e('next_desc','apoyl-tencentcos'); ?> <?php echo  esc_attr($start);?> ~ <?php echo  esc_attr($end);?> <img
				src="<?php echo esc_url(APOYL_TENCENTCOS_URL.'admin/img/loading.gif');?>"
				style="vertical-align: bottom;" /></strong>
		</p>
	</div>
<?php
    
exit();
}
?>	
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-tencentcos-settings&do=syn');?>"
		name="settings-apoyl-tencentcos" method="post">
		<p><?php _e('syn_desc','apoyl-tencentcos'); ?></p>
                <?php
                wp_nonce_field("apoyl-tencentcos-settings");
                submit_button(__('synsubmit', 'apoyl-tencentcos'),'primary','synsubmit');
                ?>
               
    </form>
</div>
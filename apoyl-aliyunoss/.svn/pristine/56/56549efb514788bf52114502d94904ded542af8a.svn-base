<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_ALIYUNOSS
 * @subpackage APOYL_ALIYUNOSS/admin/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
$updateflag = false;
$next = false;
$arr = get_option($options_name);
$error_msg=false;
if (! empty($_POST['synsubmit']) && check_admin_referer('apoyl-aliyunoss-settings', '_wpnonce')) {
    $pagenum = isset($_POST['pagenum']) ? intval($_POST['pagenum']) : 1;
    $num = 2;
    $start = ($pagenum - 1) * $num;
    $end = $pagenum * $num;
    $attachdata = $this->get_attachs($num, $pagenum);
    if (isset($attachdata['data'])) {
        if ($attachdata['done'])
            $updateflag = true;
        $file=apoyl_aliyunoss_file('addthumbnails');
        if($file){
            include $file;
        }else{
            require_once APOYL_ALIYUNOSS_DIR . 'api/ApoylAliyunossCom.php';

            foreach ($attachdata['data'] as $v) {
                $obj = new ApoylAliyunossCom($arr);
                $a = explode('wp-content/', $v->guid);
                if (isset($a[1]))
                    $ret=$obj->putObj($a[1]);
                    if($ret&&isset($arr['opendebug'])&&intval($arr['opendebug'])>0){
                        $error_msg=true;
                        $updateflag = true;
                    }
                     
            }
        }
        $next = true;
        $pagenum ++;
        if(!$updateflag){
        ?><form action="" method="post" name="apoyl-aliyunoss-syn"
	id="apoyl-aliyunoss-syn">
	<input type="hidden" name="pagenum" value="<?php echo $pagenum;?>" />
<?php      wp_nonce_field("apoyl-aliyunoss-settings");?>
                  <input type="hidden" name="synsubmit" value="1" />
</form>
<script type="text/JavaScript">setTimeout("document.getElementById('apoyl-aliyunoss-syn').submit();", 5000);</script>
<?php
        }
    } else {
        
        $updateflag = true;
    }
}

?>


<div class="wrap">
<?php include  APOYL_ALIYUNOSS_DIR . 'admin/partials/nav.php';?>
<?php 
if($error_msg){
	echo '<div id="message" class="error fade"><p>' .__('error_msg','apoyl-qiniukodo'). '</p></div>';
	if($ret)var_dump($ret);
	exit;
}
?>
<?php if($updateflag) { echo '<div id="message" class="updated fade"><p>' . __('synsuccess','apoyl-aliyunoss') . '</p></div>'; exit; } ?>

<?php

if (! $arr['open']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_open','apoyl-aliyunoss'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings');?>"><?php _e('history','apoyl-aliyunoss');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['accessid']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_accessid','apoyl-aliyunoss'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings');?>"><?php _e('history','apoyl-aliyunoss');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['secretkey']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_secretkey','apoyl-aliyunoss'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings');?>"><?php _e('history','apoyl-aliyunoss');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['region']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_region','apoyl-aliyunoss'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings');?>"><?php _e('history','apoyl-aliyunoss');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['bucket']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_bucket','apoyl-aliyunoss'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings');?>"><?php _e('history','apoyl-aliyunoss');?></a>
		</p>
	</div>
 <?php exit;} ?>
<?php if($next){?>
<div id="message" class="updated fade">
		<p>
			<strong><?php _e('next_desc','apoyl-aliyunoss'); ?> <?php echo  esc_attr($start);?> ~ <?php echo  esc_attr($end);?> <img
				src="<?php echo esc_url(APOYL_ALIYUNOSS_URL.'admin/img/loading.gif');?>"
				style="vertical-align: bottom;" /></strong>
		</p>
	</div>
<?php
    
exit();
}
?>	
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-aliyunoss-settings&do=syn');?>"
		name="settings-apoyl-aliyunoss" method="post">
		<p><?php _e('syn_desc','apoyl-aliyunoss'); ?></p>
                <?php
                wp_nonce_field("apoyl-aliyunoss-settings");
                submit_button(__('synsubmit', 'apoyl-aliyunoss'),'primary','synsubmit');
                ?>
               
    </form>
</div>
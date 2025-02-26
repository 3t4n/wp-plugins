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

$updateflag = false;
$next = false;
$arr = get_option($options_name);
$error_msg=false;
if (! empty($_POST['synsubmit']) && check_admin_referer('apoyl-qiniukodo-settings', '_wpnonce')) {
    $pagenum = isset($_POST['pagenum']) ? intval($_POST['pagenum']) : 1;

    $num = 2;
    $start = ($pagenum - 1) * $num;
    $end = $pagenum * $num;
    $attachdata = $this->get_attachs($num, $pagenum);

    if (isset($attachdata['data'])) {

        if ($attachdata['done'])
            $updateflag = true;

        require_once APOYL_QINIUKODO_DIR . 'api/ApoylQiniukodoCom.php';

        foreach ($attachdata['data'] as $v) {
            $obj = new ApoylQiniukodoCom($arr);
            $a = explode('wp-content/', $v->guid);
         
            if (isset($a[1])){
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
        ?><form action="" method="post" name="apoyl-qiniukodo-syn"
	id="apoyl-qiniukodo-syn">
	<input type="hidden" name="pagenum" value="<?php echo $pagenum;?>" />
<?php      wp_nonce_field("apoyl-qiniukodo-settings");?>
                  <input type="hidden" name="synsubmit" value="1" />
</form>
<script type="text/JavaScript">setTimeout("document.getElementById('apoyl-qiniukodo-syn').submit();", 5000);</script>
<?php
        }
    } else {
        
        $updateflag = true;
    }
}

?>


<div class="wrap">
<?php include  APOYL_QINIUKODO_DIR . 'admin/partials/nav.php';?>
<?php 
if($error_msg){
	echo '<div id="message" class="error fade"><p>' .__('error_msg','apoyl-qiniukodo'). '</p></div>';
	if($ret)var_dump($ret);
	exit;
}
?>
<?php if($updateflag) { echo '<div id="message" class="updated fade"><p>' . __('synsuccess','apoyl-qiniukodo') . '</p></div>'; exit; } ?>

<?php

if (! $arr['open']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_open','apoyl-qiniukodo'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings');?>"><?php _e('history','apoyl-qiniukodo');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['accessid']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_accessid','apoyl-qiniukodo'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings');?>"><?php _e('history','apoyl-qiniukodo');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['secretkey']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_secretkey','apoyl-qiniukodo'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings');?>"><?php _e('history','apoyl-qiniukodo');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['region']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_region','apoyl-qiniukodo'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings');?>"><?php _e('history','apoyl-qiniukodo');?></a>
		</p>
	</div>
 <?php exit;} ?>
 <?php

if (! $arr['bucket']) {
    ?>
     <div id="message" class="error fade">
		<p><?php  _e('error_bucket','apoyl-qiniukodo'); ?> <a
				href="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings');?>"><?php _e('history','apoyl-qiniukodo');?></a>
		</p>
	</div>
 <?php exit;} ?>
<?php if($next){?>
<div id="message" class="updated fade">
		<p>
			<strong><?php _e('next_desc','apoyl-qiniukodo'); ?> <?php echo  esc_attr($start);?> ~ <?php echo  esc_attr($end);?> <img
				src="<?php echo esc_url(APOYL_QINIUKODO_URL.'admin/img/loading.gif');?>"
				style="vertical-align: bottom;" /></strong>
		</p>
	</div>
<?php
    
exit();
}
?>	
	<form
		action="<?php echo admin_url('options-general.php?page=apoyl-qiniukodo-settings&do=syn');?>"
		name="settings-apoyl-qiniukodo" method="post">
		<p><?php _e('syn_desc','apoyl-qiniukodo'); ?></p>
                <?php
                wp_nonce_field("apoyl-qiniukodo-settings");
                submit_button(__('synsubmit', 'apoyl-qiniukodo'),'primary','synsubmit');
                ?>
               
    </form>
</div>
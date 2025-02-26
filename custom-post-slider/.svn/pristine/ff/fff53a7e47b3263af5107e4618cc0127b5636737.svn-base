<?php
	if ( ! defined( 'ABSPATH' ) || ! current_user_can( 'manage_options' ) ) exit;
	
	global $wpdb;
	global $wp_version;
	$stsMgs = '';
	$flg = 0;
	
	if(isset($_GET['tab'])){
		$currTab = $_GET['tab'];
	}
	else
	{
		$currTab = 'owl';
	}
	if(isset($_GET['hide'])){
		update_option('tzcustom-update-notification','hide');
	}
	if(isset($_POST['optset-id'])){
		if ( !isset($_POST['tzcustom_wpnonce']) || !wp_verify_nonce($_POST['tzcustom_wpnonce'],'tzcustom-checkauthnonce') )
		{
			print 'Sorry, your nonce did not verify.';
			exit;
		}
		
		if(isset($_POST['del-optset'])){
		$q_del = $wpdb->prepare("delete from ".$wpdb->prefix."tzcustom_optionset where id = %d",$_POST['optset-id']);
			
			if($wpdb->query($q_del)){
				delete_option('optset'.$_POST['optset-id']);
				$stsMgs =  "Deleted successfully.";
			}
		}
		elseif(isset($_POST['dup-optset'])){
			
			$q_sel = "select * from ".$wpdb->prefix."tzcustom_optionset where id = ".$_POST['optset-id'];
			$res = $wpdb->get_results($q_sel);
			//echo get_option('tzcustomsmethod'.$_POST['optset-id']);exit;
			//echo '<pre>';
			//print_r($res);exit;
			$q_add = $wpdb->prepare("insert into ".$wpdb->prefix."tzcustom_optionset (template,plist,query,slider,container,content,navigation) values(%s,%s,%s,%s,%s,%s,%s,%s)",$res[0]->template,$res[0]->plist,$res[0]->query,$res[0]->slider,$res[0]->container,$res[0]->content,$res[0]->navigation);
			
			if($wpdb->query($q_add)){
				update_option('tzcustomsmethod'.$_POST['nextoptid'],get_option('tzcustomsmethod'.$_POST['optset-id']));
				$stsMgs =  "Duplicated successfully.";
			}
		}
	}
	if(isset($_POST['tzcustom_submit'])){
		
		if($_POST['tzcustom_submit'] == 'Add new slideshow'){
			
			if ( !isset($_POST['tzcustom_wpnonce']) || !wp_verify_nonce($_POST['tzcustom_wpnonce'],'tzcustom-checkauthnonce') )
			{
			   print 'Sorry, your nonce did not verify.';
			   exit;
			}
			
			$all_field = $_POST;
			$tem_list = array('owl','two','three');
			$template = sanitize_text_field($_POST['template']);
			if( ! in_array( $template, $tem_list )){
				exit;
			}
			global $tzcustomPlist;
			global $tzcustomQuery;
			global $tzcustomSlide;
			//global $tzcustomSlide2;
			global $tzcustomContainer;
			global $tzcustomContainer2;
			global $tzcustomContainer3;
			global $tzcustomContent;
			global $tzcustomContent2;
			global $tzcustomNavigation;

			if( $template == 'owl'){
				$q_add = $wpdb->prepare("insert into ".$wpdb->prefix."tzcustom_optionset (template,plist,query,slider,container,content,navigation) values(%s,%s,%s,%s,%s,%s,%s)",$template,serialize($tzcustomPlist),serialize($tzcustomQuery),serialize($tzcustomSlide),serialize($tzcustomContainer),serialize($tzcustomContent),serialize($tzcustomNavigation));
			}
			if($wpdb->query($q_add)){
				update_option('tzcustomsmethod'.$_POST['nextoptid'],'plist');
				$stsMgs =  "Added successfully.";
			}
		}
		
	}
	
	if(isset($_POST['tzcustom_add_thumb'])){
		if($_POST['tzcustom_add_thumb'] == 'Add'){
			
			if ( !isset($_POST['tzcustom_wpnonce']) || !wp_verify_nonce($_POST['tzcustom_wpnonce'],'tzcustom-checkauthnonce') )
			{
			   print 'Sorry, your nonce did not verify.';
			   exit;
			}
			
			$thumb_name = sanitize_text_field($_POST['tzcustom_thumb_name']);
			$width = sanitize_text_field($_POST['tzcustom_thumb_width']);
			$height = sanitize_text_field($_POST['tzcustom_thumb_height']);
			$crop = sanitize_text_field($_POST['tzcustom_crop']);
	
			$q = $wpdb->prepare("insert into ".$wpdb->prefix."tzcustom_thumbnail (thumb_name,width,height,crop) values(%s,%d,%d,%s)",$thumb_name,$width,$height,$crop);
			 if($wpdb->query($q)){
				$stsMgs =  "Added successfully.";
			}				
		}
	}
	if(isset($_POST['update_thumb'])){
		
		if ( !isset($_POST['tzcustom_wpnonce']) || !wp_verify_nonce($_POST['tzcustom_wpnonce'],'tzcustom-checkauthnonce') )
		{
		   print 'Sorry, your nonce did not verify.';
		   exit;
		}
		
		$thumb_id = sanitize_text_field($_POST['thumb_id']);
		$thumb_name = sanitize_text_field($_POST['tzcustom_thumb_name']);
		$width = sanitize_text_field($_POST['tzcustom_thumb_width']);
		$height = sanitize_text_field($_POST['tzcustom_thumb_height']);
		$crop = sanitize_text_field($_POST['tzcustom_crop']);
			
		$q = $wpdb->prepare("update ".$wpdb->prefix."tzcustom_thumbnail set thumb_name = '%s',width = %d, height = %d, crop = '%s' where id = %d",$thumb_name,$width,$height,$crop,$thumb_id);
		if($wpdb->query($q)){
			$stsMgs =  "Updated successfully.";
		}
	}
	
	$q1 = "select * from ".$wpdb->prefix."tzcustom_optionset where template = 'owl'";
	$res1 = $wpdb->get_results($q1);

	$q_thumb = "select * from ".$wpdb->prefix."tzcustom_thumbnail";
	$res_thumb = $wpdb->get_results($q_thumb);
	$catList = get_categories();	
	$customPostTypes = get_post_types(array('public' => true, '_builtin' => false)); 
?>
<script>
	jQuery(document).ready(function($) {
        $("legend.tzcustom-legend").click(function(){
			if($(this).hasClass('tzcustomsm')){
				$(this).parent().find("div").eq(0).slideToggle(100,'linear',function(){});
			}
			else{
				$(this).parent().find("table").slideToggle(100,'linear',function(){});
			}
			if($(this).hasClass('closed')){
				$(this).css('background-image','url(<?php echo tzcustom_url?>images/up.png)');
				$(this).removeClass('closed');
			}
			else
			{
				$(this).css('background-image','url(<?php echo tzcustom_url?>images/down.png)');
				$(this).addClass('closed');
			}
		})
    });
</script>
<style>
.metabox-holder {
	width:72%;
}
.tzcustom-col-right {
	width:22%;
	float:right;
	position:relative;
	background-color:#fff;
	margin-top:30px;
	padding:10px;
}
.tzcustom-col-right li {
	list-style:inside;
	color:#0074a2;
	text-decoration:underline;
}
.form-table th {
	font-size:12px;
}
fieldset {
	border:1px solid #999999;
	margin-bottom:20px;
	padding:0px 5px 10px 20px;
}
.tzcustom-legend {
	background-color:#6E6E6E;
 background-image:url(<?php echo tzcustom_url?>images/up.png);
	background-repeat:no-repeat;
	background-position: 96px 6px;
	color:#FFF;
	border:1px solid #999;
	padding:4px 10px;
	font-size:12px;
	margin-left:10px;
	cursor:pointer;
	border-radius:4px;
}
.postbox .inside {
	position:relative;
	margin: 15px 25px;
}
.wp-admin select {
	font-size:12px;
}
.wp-admin select[multiple], #wpcontent select[multiple] {
	height: auto;
}
.form-table, .form-table td, .form-table th, .form-table td p, .form-wrap label {
	font-size:12px;
}
.tzcustom-optset-label {
	width:200px;
}
.ajx-sts {
	color: #298A08;
	font-size: 12px;
	font-style: italic;
	font-weight: bold;
	padding-left: 20px;
}
.postbox .down {
 background-image:url(<?php echo tzcustom_url?>images/downb.png);
	background-repeat:no-repeat;
	background-position: 4px 10px;
}
.postbox .up {
 background-image:url(<?php echo tzcustom_url?>images/upb.png);
	background-repeat:no-repeat;
	background-position: 4px 10px;
}
.tzcustom-highlight {
	border: 1px solid #7AD03A !important;
}
.tzcustom-hide {
	display:none;
}
.tzcustom-fade {
	color:#D1D0CE;
}
</style>
<div class="wrap">
  <?php if(get_option('tzcustom-update-notification') && get_option('tzcustom-update-notification') == 'show'){?>
  <div id="message" class="updated below-h2">
    <p>Advanced post slider is updated. <span style="margin:0 10px;"><input class="button" type="button" onclick="document.location.href='http://www.wpcue.com/custom-post-slider-2-3-0/';" value="Check what's new in version 2.3"></span>
    <input class="button" type="button" onclick="document.location.href='admin.php?page=tzcustom-slideshow&hide=1';" value="Hide this message">
    </p>
  </div>
  <?php }?>
  <?php if($stsMgs != ''){?>
  <div id="message" class="updated below-h2">
    <p><?php echo $stsMgs;?></p>
  </div>
  <?php }?>
  <h2 class="nav-tab-wrapper">
	  <a href="?page=tzcustom-slideshow&tab=owl" class="nav-tab <?php if($currTab == 'owl'){echo 'nav-tab-active';}?>" title="Thumbnail and overlaid title excerpt">Owl Carousel</a>
  </h2>
  <?php if($currTab == 'owl'){
	  		require 'templates/template-owl.php';
		}
?>
</div>
<meta name="wpversion" content="<?php echo $wp_version;?>" />

<?php if ( ! defined( 'ABSPATH' ) ) exit;

$fmcfFntListArr = fmcf_font_nm_list_arr();
?>
<div class="fmcf_main_container">
<h1 class="fmcf_main_title">Font Plugin</h1>
<ul>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-upload-fonts-page');?>">Upload Fonts</a></li>
  <li class="fmcf_tab fmcf_tabSelected"><a>Google Fonts</a><span class="fmcf_active_tab"></span></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-assign-fonts');?>">Assign Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-set-color');?>">Color Settings</a></li>
</ul>
<div class="fmcf_container">

<div class="">
		<div class="fmcf_google_font_tab_container">
			<a href="<?php echo admin_url('admin.php?page=fmcf-predefined-fonts');?>" class="fmcf_nav_btn fmcf_disable_btn">Local Fonts</a>
			<a href="<?php echo admin_url('admin.php?page=fmcf-google-fonts');?>" class="fmcf_nav_btn">Google Fonts</a>
		</div>	
		<div class="fmcf_google_font_preview_container">				
			
			<form action="" id="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="" id="" value="">
	<?php include FMCF_DIR_PATH.'views/fmcf-main.php';	?>
	<div class="font_assign_list">
	<table class="font_list_table">
		<tr>
			<th>#</th>
			<th>Font Name</th>
			<th>Action</th>
		</tr>
		<?php if(isset($GLOBALS['fmcfPredefinedFntArr']) && count($GLOBALS['fmcfPredefinedFntArr']) > 0){
		for($i=1;$i<=count($GLOBALS['fmcfPredefinedFntArr']);$i++){
		?>
		<tr>
			<td><?php echo esc_html($i); ?></td>
			<td><img src="<?php echo FMCF_PLUGIN_URL; ?>assests/font/<?php echo esc_html($GLOBALS['fmcfPredefinedFntArr'][$i]); ?>.png" style="max-width: 175px;" /></td>
			<td><button class="fmcf_font_add <?php echo (in_array($GLOBALS['fmcfPredefinedFntArr'][$i], $fmcfFntListArr)) ? 'fmcf_disable_btn' : ''; ?>" value="<?php echo esc_html($i); ?>" data-txt="<?php echo (in_array($GLOBALS['fmcfPredefinedFntArr'][$i], $fmcfFntListArr)) ? 'Added' : 'Add'; ?>"><?php echo (in_array($GLOBALS['fmcfPredefinedFntArr'][$i], $fmcfFntListArr)) ? 'Added' : 'Add'; ?></button></td>
		</tr>
		<?php } } ?>		
	</table>
</div>
	
</form>
			
		</div>
		<div class="clear"></div>
	</div>


</div>
</div>

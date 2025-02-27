<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<div class="fmcf_main_container">
<h1 class="fmcf_main_title">Font Plugin</h1>
<ul>
  <li class="fmcf_tab fmcf_tabSelected"><a>Upload Fonts</a><span class="fmcf_active_tab"></span></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-google-fonts');?>">Google Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-assign-fonts');?>">Assign Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-set-color');?>">Color Settings</a></li>
</ul>
<div class="fmcf_container">

<form id="fmcfStylishFontFlFrm" class="fmcf_font_upload_form" method="post" enctype="multipart/form-data">
	<input type="hidden" id="fmcfStylishFontsAction" name="fmcfStylishFontsAction" value="fmcfStoreStylishFonts"/>						
	<?php include FMCF_DIR_PATH.'views/fmcf-main.php';	?>
	<div class="fmcf_form_control">
		 <label class="fmcf_label_control">Font Name*</label>
		 <div class="fmcf_field">
			 <input type="text" name="fmcfFontNm" id="fmcfFontNm" value="" class="" placeholder="Enter Font Name" required maxlength="100" />
			 <span class="fmcf_note" id="fmcfFontNmError">Please give font name. (Only Characters,Space are allowed)</span>
		 </div>                 
	</div> 
	
	<div class="fmcf_form_control">
		<label class="fmcf_label_control">Font File*</label>
		<div class="fmcf_file_field_container">
			<div class="fmcf_file_field">
				<span class="fmcf_file_icon"></span>
				<span class="fmcf_file_text">
					<label for="fmcfFontFileTtf" class="fmcf_file_text_label"><input type="file" id="fmcfFontFileTtf" name="fmcfFontFileTtf" value="" class="fmcf_upload_font fmcf_upload_font_ttf" accept=".ttf" required style="display:none;" />Click To Upload TTF File</label>
					<small class="">ttf (Size: Upto 10MB)</small> 
					<span class="fmcf_fntFl_msg"></span> 
				</span>			
			</div>
			<div class="fmcf_file_field">
				<span class="fmcf_file_icon"></span>
				<span class="fmcf_file_text">
					<label for="fmcfFontFileWoff" class="fmcf_file_text_label"><input type="file" id="fmcfFontFileWoff" name="fmcfFontFileWoff" value="" class="fmcf_upload_font fmcf_upload_font_woff" accept=".woff" required style="display:none;" />Click To Upload WOFF File</label>
					<small class="">woff (Size: Upto 10MB)</small> 
					<span class="fmcf_fntFl_msg"></span> 
				</span>			
			</div>
			<div class="fmcf_file_field">
				<span class="fmcf_file_icon"></span>
				<span class="fmcf_file_text">
					<label for="fmcfFontFileWoff2" class="fmcf_file_text_label"><input type="file" id="fmcfFontFileWoff2" name="fmcfFontFileWoff2" value="" class="fmcf_upload_font fmcf_upload_font_woff2" accept=".woff2" required style="display:none;" />Click To Upload WOFF2 File</label>
					<small class="">woff2 (Size: Upto 10MB)</small> 
					<span class="fmcf_fntFl_msg"></span>
				</span>			
			</div>
			<span class="fmcf_file_note">By clicking on Upload, you confirm that you have rights to use this font.</span>                    	
		</div>
		
		
	</div>   
	<div class="fmcf_form_control">		
		<span id="fmcfFontMsg" class=""></span>
		<button type="submit" name="fmcfFontUpdFl" id="fmcfFontUpdFl" class="fmcf_save_btn" />Upload</button>
		<button type="reset" name="fmcfFontCancelFl" id="fmcfFontCancelFl" class="fmcf_cancel_btn" />Cancel</button>
	</div>
</form>

<?php 
$getFmcfData = fmcf_font_list_table_data();

if($getFmcfData['fmcf_tbl_rows'] > 0)
{
	$i=1;
?>

<div class="font_assign_list">
	<table class="font_list_table">
		<thead>
		<tr>
			<th>#</th>
			<th>Font Name</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($getFmcfData['fmcf_tbl_data'] as $fmcfTblVal) { ?>
			<tr>
				<td><?php echo esc_html($i);?></td>
				<td class="fmcf_font_name <?php echo esc_html($fmcfTblVal['name']);?>"><?php echo esc_html($fmcfTblVal['org_name']);?></td>
				<td><a href="javascript:void(0);" class="fmcfDelFontData fmcf_delete" id="<?php echo esc_html($fmcfTblVal['id']); ?>"></a></td>
			</tr>
		<?php $i++; } ?>
		</tbody>
	</table>
</div>
</div>
<?php } ?>
</div>

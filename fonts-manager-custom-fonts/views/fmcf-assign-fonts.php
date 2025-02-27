<?php if ( ! defined( 'ABSPATH' ) ) exit;

$fmcfFontsList = fmcf_font_list_table_data();

$fmcfFontAssignList = fmcf_assign_font_list_data();
$fmcfAssignFontsArray = array();
foreach($fmcfFontAssignList['fmcf_tbl_data'] as $fmcfAssignFont){ 
	$fmcfAssignFontsArray[] = $fmcfAssignFont['element_and_tag'];
}

$fmcfNotAssignFontsArr = array();
if(isset($fmcfFontsList['fmcf_tbl_data'][0]['id']) && $fmcfFontsList['fmcf_tbl_data'][0]['id'] != '')
{
	$fmcfGetNotAssignElemList = fmcf_get_not_assign_sel_font_element($fmcfFontsList['fmcf_tbl_data'][0]['id']);

	foreach($fmcfGetNotAssignElemList as $fmcfNtAssignEle)
	{
		$fmcfNotAssignFontsArr[] = 	$fmcfNtAssignEle['element_and_tag'];
	}	

	$fmcfAssignClsStr = fmcf_assign_font_class_data($fmcfFontsList['fmcf_tbl_data'][0]['id']);
}
?>
<div class="fmcf_main_container">
<h1 class="fmcf_main_title">Font Plugin</h1>
<ul>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-upload-fonts-page');?>">Upload Fonts</a></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-google-fonts');?>">Google Fonts</a></li>
  <li class="fmcf_tab fmcf_tabSelected"><a>Assign Fonts</a><span class="fmcf_active_tab"></span></li>
  <li class="fmcf_tab"><a href="<?php echo admin_url('admin.php?page=fmcf-set-color');?>">Color Settings</a></li>
</ul>
<div class="fmcf_container">
<form action="" id="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="" id="" value="">
	<?php include FMCF_DIR_PATH.'views/fmcf-main.php';	?>
	<div class="fmcf_form_control">

		<label class="fmcf_label_control">Select Font</label>
		<div class="fmcf_field">
			<select name="fmcfFontSel" id="fmcfFontSelElem" class="fmcf_font_list">

				<?php if($fmcfFontsList['fmcf_tbl_rows'] == 0){ ?>
					<option value="">No font is avaiable</option>
				<?php } else{ ?>
			<?php foreach ($fmcfFontsList['fmcf_tbl_data'] as $frow){ ?>
					<option value="<?php echo esc_html($frow['id']); ?>" Class="<?php echo esc_html($frow['name']); ?>"><?php echo esc_html($frow['org_name']); ?></option>
			<?php } } ?>
			</select>				
		</div>
	</div>		
	<div class="fmcf_form_control">
		<label class="fmcf_label_control">Select Heading Font</label>
		<div class="fmcf_checkbox_control">
			<input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h1" name="fmcfElement[]" value="h1" <?php echo (in_array('h1',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h1',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
			<label for="fmcf_elem_h1" class="fmcf_checkbox_label">&lt;h1&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h2" name="fmcfElement[]" value="h2" <?php echo (in_array('h2',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h2',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_h2" class="fmcf_checkbox_label">&lt;h2&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h3" name="fmcfElement[]" value="h3" <?php echo (in_array('h3',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h3',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_h3" class="fmcf_checkbox_label">&lt;h3&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h4" name="fmcfElement[]" value="h4" <?php echo (in_array('h4',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h4',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_h4" class="fmcf_checkbox_label">&lt;h4&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h5" name="fmcfElement[]" value="h5" <?php echo (in_array('h5',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h5',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_h5" class="fmcf_checkbox_label">&lt;h5&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_h6" name="fmcfElement[]" value="h6" <?php echo (in_array('h6',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('h6',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_h6" class="fmcf_checkbox_label">&lt;h6&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_title_post" name="fmcfElement[]" value="title_post" <?php echo (in_array('title_post',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('title_post',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_title_post" class="fmcf_checkbox_label">Post Title</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_title_page" name="fmcfElement[]" value="title_page" <?php echo (in_array('title_page',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('title_page',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_title_page" class="fmcf_checkbox_label">Page Title</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_title_category" name="fmcfElement[]" value="title_category" <?php echo (in_array('title_category',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('title_category',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_title_category" class="fmcf_checkbox_label">Category Title</label>
		</div>
	</div>
	
	<div class="fmcf_form_control">
		<label class="fmcf_label_control">Select Other Tags Font</label>
		<div class="fmcf_checkbox_control">
			<input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_body" name="fmcfElement[]" value="body" <?php echo (in_array('body',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('body',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
			<label for="fmcf_elem_body" class="fmcf_checkbox_label">&lt;body&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_p" name="fmcfElement[]" value="p" <?php echo (in_array('p',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('p',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_p" class="fmcf_checkbox_label">&lt;p&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_ul" name="fmcfElement[]" value="ul" <?php echo (in_array('ul',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('ul',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_ul" class="fmcf_checkbox_label">&lt;ul&gt; <small>(Unordered List)</small></label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_li" name="fmcfElement[]" value="li" <?php echo (in_array('li',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('li',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_li" class="fmcf_checkbox_label">&lt;li&gt; <small>(List)</small></label>
		</div>		
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_ol" name="fmcfElement[]" value="ol" <?php echo (in_array('ol',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('ol',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_ol" class="fmcf_checkbox_label">&lt;ol&gt; <small>(Ordered List)</small></label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_a" name="fmcfElement[]" value="a" <?php echo (in_array('a',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('a',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_a" class="fmcf_checkbox_label">&lt;a&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_b" name="fmcfElement[]" value="b" <?php echo (in_array('b',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('b',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_b" class="fmcf_checkbox_label">&lt;b&gt;</label>
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_i" name="fmcfElement[]" value="i" <?php echo (in_array('i',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('i',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_i" class="fmcf_checkbox_label">&lt;i&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>	
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_span" name="fmcfElement[]" value="span" <?php echo (in_array('span',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('span',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_span" class="fmcf_checkbox_label">&lt;span&gt; <small>(Container)</small></label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_em" name="fmcfElement[]" value="em" <?php echo (in_array('em',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('em',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_em" class="fmcf_checkbox_label">&lt;em&gt; <small>(Emphasis tag)</small></label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_table" name="fmcfElement[]" value="table" <?php echo (in_array('table',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('table',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_table" class="fmcf_checkbox_label">&lt;table&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>	
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_tr" name="fmcfElement[]" value="tr" <?php echo (in_array('tr',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('tr',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_tr" class="fmcf_checkbox_label">&lt;tr&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>	
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_td" name="fmcfElement[]" value="td" <?php echo (in_array('td',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('td',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_td" class="fmcf_checkbox_label">&lt;td&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>	
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_th" name="fmcfElement[]" value="th" <?php echo (in_array('th',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('th',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_th" class="fmcf_checkbox_label">&lt;th&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_small" name="fmcfElement[]" value="small" <?php echo (in_array('small',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('small',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_small" class="fmcf_checkbox_label">&lt;small&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_u" name="fmcfElement[]" value="u" <?php echo (in_array('u',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('u',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_u" class="fmcf_checkbox_label">&lt;u&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_strike" name="fmcfElement[]" value="strike" <?php echo (in_array('strike',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('strike',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_strike" class="fmcf_checkbox_label">&lt;strike&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_center" name="fmcfElement[]" value="center" <?php echo (in_array('center',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('center',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_center" class="fmcf_checkbox_label">&lt;center&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>
		<div class="fmcf_checkbox_control">		
		  <input type="checkbox" class="fmcf_checkbox" id="fmcf_elem_marquee" name="fmcfElement[]" value="marquee" <?php echo (in_array('marquee',$fmcfAssignFontsArray))?"checked":""; ?> <?php echo (in_array('marquee',$fmcfNotAssignFontsArr))?"disabled":""; ?>>
		  <label for="fmcf_elem_marquee" class="fmcf_checkbox_label">&lt;marquee&gt;</label>
		  <input type="hidden" id="fmcfAssignFontsStoreAction" name="fmcfAssignFontsStoreAction" value="fmcfAssignFontsStore"/>			
		</div>		
	</div>

	<div class="fmcf_form_control">
		<label class="fmcf_label_control">Add Class List </label>
		<div class="fmcf_field">
			<textarea class="" id="fmcfFntClassList" name="fmcfClassList"><?php echo (isset($fmcfAssignClsStr[0]['element_and_tag']) &&  $fmcfAssignClsStr[0]['element_and_tag'] != '') ? $fmcfAssignClsStr[0]['element_and_tag'] : ''; ?></textarea>
			<span class="fmcf_note">(Please Add Comma(,) separated) (ex. .classname1,.classname2,.classname3, etc...)</span>
		</div>
	</div>
	<div class="fmcf_form_control">	
		<button type="submit" name="fmcfAssignFontSubmit" id="fmcfAssignSubmitBtn" class="submit_btn fmcf_save_btn">Save</button>
	</div>
</form>
<div class="font_assign_list">
	<table class="font_list_table">
		<tr>
			<th>#</th>
			<th>Font Name</th>
			<th>Tags</th>
			<th>Action</th>
		</tr>
		<?php $fmcfAssignedElemWithFntList = fmcf_get_assigned_list();
	if(count($fmcfAssignedElemWithFntList) > 0){
			$fmcfIndexNo = 1;
			foreach($fmcfAssignedElemWithFntList as $key => $fmcfElemWithFntVal)
			{
		 ?>
			<tr>
				<td><?php echo esc_html($fmcfIndexNo); ?></td>
				<td class="fmcf_font_name <?php echo esc_html(fmcf_file_nm_set($fmcfElemWithFntVal['font_name'])); ?>"><?php echo (isset($fmcfElemWithFntVal['font_name']) && $fmcfElemWithFntVal['font_name'] != '') ? esc_html($fmcfElemWithFntVal['font_name']) : ''; ?></td>
				<td><?php echo (isset($fmcfElemWithFntVal['elems']) && $fmcfElemWithFntVal['elems'] != '') ? esc_html(fmcf_elem_proper_nm($fmcfElemWithFntVal['elems'])) : ''; ?></td>
				<td><a href="javascript:void(0);" class="fmcfDelAssignedFntData fmcf_delete" id="<?php echo (isset($fmcfElemWithFntVal['font_id']) && $fmcfElemWithFntVal['font_id'] != '') ? esc_html($fmcfElemWithFntVal['font_id']) : 0; ?>"></a></td>
			</tr>
					
	<?php $fmcfIndexNo++; } 
	}else{ ?>
		<tr><td colspan="4">Data Not Found</td></tr>
	<?php }?>
	</table>
</div>
</div>
</div>
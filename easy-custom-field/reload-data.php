<?php 
if( $_GET['connection'] == '1' ){
	include_once('../../../wp-config.php');
}

	$sql = "select * from ".RC_CTRL_TBL." order by  ListingID, id ASC ";
	$db_process = mysql_query($sql);
	$rows = mysql_num_rows($db_process);
	if( $rows > 0 ){
		while( $rs = mysql_fetch_array( $db_process) ){
			if( $rs['form_type'] == '1' ) {
?>
<div id="recordsArray_<?php echo $rs['position']; ?>">
<div class='eHelp' align='left'>
	  <div style='float:right'>
		<a onClick="saveCoords('<?php echo $rs['position']; ?>_fldname','<?php echo $rs['position']; ?>_size','<?php echo $rs['position']; ?>','1');" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;
		<a onClick="remove('<?php echo $rs['position']; ?>','-1','1');" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a onclick="cfgShowHide('<?php echo $rs['position'];?>', '<?php echo RC_FULLPATH;?>')" style="cursor:pointer;cursor:hand;"><img src="<?php echo RC_FULLPATH;?>/image/arr1.gif" id="cfgimg_<?php echo $rs['position']; ?>" align="absmiddle" border="0" alt="" /></a>
	  </div>
	  <div style="color: #0066FF;font-weight:bold; font-size:12px">Text Box&nbsp;<span style='font-size:10px; font-weight:normal; color:#666666; padding-top:4px;' ><?php if( $rs['flag'] == '2'){ ?>:&nbsp;<?php  echo $rs['fld_name'];  ?><?php } ?></span>&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response'> </span></div>
	  <!--<div align='left' style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response' ></div>-->
	<div id="collsp_<?php echo $rs['position']; ?>" style="margin-top:6px; border-top:1px solid #dddddd; <?php if( $rs['flag'] == '2'){ ?> display:none <?php } ?>">
	  <p><b>Name:</b>&nbsp;<input type='text' id='<?php echo $rs['position']; ?>_fldname' class='widefat' style="width:150px;" value="<?php echo $rs['fld_name']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Field Size:</b>&nbsp;<input type='text' name='size' class='widefat' style='width:45px;' id='<?php echo $rs['position']; ?>_size' value="<?php echo $rs['text_fld_size']; ?>" >&nbsp;px</p>
    </div>
</div>
</div>

			<?php
			}elseif( $rs['form_type'] == '2' ){
			?>
			
<div id="recordsArray_<?php echo $rs['position']; ?>">
<div class='eHelp' align='left'>
	<div style='float:right'>
		<a onclick="saveCoords('<?php echo $rs['position']; ?>_radio_fldname','','<?php echo $rs['position']; ?>','2');" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a onClick="remove('<?php echo $rs['position']; ?>','-1','2');" style='text-decoration:none; cursor:pointer'>Remove</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a onclick="cfgShowHide('<?php echo $rs['position'];?>', '<?php echo RC_FULLPATH;?>')" style="cursor:pointer;cursor:hand;"><img src="<?php echo RC_FULLPATH;?>/image/arr1.gif" id="cfgimg_<?php echo $rs['position']; ?>" align="absmiddle" border="0" alt="" /></a>	
	</div>
	<div style="color: #0066FF;font-weight:bold; font-size:12px">Radio Button&nbsp;<span style='font-size:10px; font-weight:normal;color:#666666; padding-top:4px;' ><?php if( $rs['flag'] == '2'){ ?>:&nbsp;<?php  echo $rs['fld_name'];  ?><?php } ?></span>&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response'> </span></div>
	
	
	<div id="collsp_<?php echo $rs['position']; ?>" style="margin-top:6px; border-top:1px solid #dddddd; <?php if( $rs['flag'] == '2'){ ?> display:none <?php } ?>">
	<p><b>Name:</b>&nbsp;<input type='text' name='<?php echo $rs['position']; ?>_radio_fldname' id='<?php echo $rs['position']; ?>_radio_fldname' value="<?php echo $rs['fld_name']; ?>" class='widefat' style="width:150px;"></p>
	<div id='<?php echo $rs['position']; ?>_radioReplace'>
	<?php 
    if( $rs['flag'] == '2'){ 
	$breakRadioValues = $rs['fld_values'];
	$breakValues = explode( ',' ,trim($breakRadioValues,',') );
	$total = array();
	foreach($breakValues as $key => $val){
	?>
	<p style='padding: 0 0 0 20px'><input name='<?php echo $rs['position']; ?>_radio_default_value' type='radio' value='<?php echo $val; ?>' <?php if( trim($rs['default_value']) == trim($val) ){ echo "checked"; } ?> ><a onclick="replaceRadioAfterInsert('<?php echo $rs['position']; ?>_radioReplace','<?php echo $rs['position']; ?>','<?php echo count($breakValues); ?>','<?php echo $breakRadioValues; ?>');" style='text-decoration:none; cursor:pointer'>&nbsp;<?php  echo $val; ?></a></p>
	<?php
	}
	}else{ ?>
	<p style='padding: 0 0 0 20px'><input name='<?php echo $rs['position']; ?>_radio' type='radio' value='radiobutton'><a  onclick="replaceRadio('<?php echo $rs['position']; ?>_radioReplace','<?php echo $rs['position']; ?>');" style='text-decoration:none; cursor:pointer' title='click to edit option'>&nbsp;&nbsp;Option&nbsp;&nbsp;1</a></p>
	<?php 
	}
	 ?>
	</div>
	</div>
</div>
</div>	
			<?php
			} elseif( $rs['form_type'] == '3' ){
			?>
			
<div id="recordsArray_<?php echo $rs['position']; ?>">
<div class='eHelp' align='left'>

<div style='float:right'>
<a onclick="saveCoords('<?php echo $rs['position']; ?>_checkbox_fldname','<?php echo $rs['position']; ?>_check','<?php echo $rs['position']; ?>','3');" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a onclick="remove('<?php echo $rs['position']; ?>','-1','3');" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a onclick="cfgShowHide('<?php echo $rs['position'];?>', '<?php echo RC_FULLPATH;?>')" style="cursor:pointer;cursor:hand;"><img src="<?php echo RC_FULLPATH;?>/image/arr1.gif" id="cfgimg_<?php echo $rs['position']; ?>" align="absmiddle" border="0" alt="" /></a></div>
  <div style="color: #0066FF;font-weight:bold; font-size:12px">Check Box&nbsp;<span style='font-size:10px; font-weight:normal; color:#666666; padding-top:4px;' ><?php if( $rs['flag'] == '2'){ ?>:&nbsp;<?php  echo $rs['fld_name'];  ?><?php } ?></span>&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response'> </span></div>
 
<div id="collsp_<?php echo $rs['position']; ?>" style="margin-top:6px; border-top:1px solid #dddddd; <?php if( $rs['flag'] == '2'){ ?> display:none <?php } ?>">

<p><b>Name:</b>&nbsp;<input type='text' name='<?php echo $rs['position']; ?>_radio_fldname' class='widefat' style="width:150px;" id='<?php echo $rs['position']; ?>_checkbox_fldname' value="<?php echo trim($rs['fld_name']);  ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Default:</b>&nbsp;&nbsp;<input type='radio' name='<?php echo $rs['position']; ?>_check'  value='checked' <?php if( $rs['flag'] == '2'){ if( $rs['default_value'] == 'checked' ){ echo "checked"; } }else{ echo "checked"; } ?> > Checked&nbsp;&nbsp;<input type='radio' name='<?php echo $rs['position']; ?>_check'  value='unchecked' <?php if( $rs['default_value'] == 'unchecked' ){ echo "checked"; } ?> > Unchecked</p>
</div>
</div>
</div>			
			<?php
			} elseif( $rs['form_type'] == '4' ) {
			?>		
<div id="recordsArray_<?php echo $rs['position']; ?>">
<div class='eHelp' align='left'>
<div style='float:right'>
<a onclick="saveCoords('<?php echo $rs['position']; ?>_optionName','<?php echo $rs['position']; ?>_OptionValues','<?php echo $rs['position']; ?>','4');" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a onclick="remove('<?php echo $rs['position']; ?>','-1','4');" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a onclick="cfgShowHide('<?php echo $rs['position'];?>', '<?php echo RC_FULLPATH;?>')" style="cursor:pointer;cursor:hand;"><img src="<?php echo RC_FULLPATH;?>/image/arr1.gif" id="cfgimg_<?php echo $rs['position']; ?>" align="absmiddle" border="0" alt="" /></a></div>
  <div style="color: #0066FF;font-weight:bold; font-size:12px">Select Box&nbsp;<span style='font-size:10px; font-weight:normal; color:#666666; padding-top:4px;' ><?php if( $rs['flag'] == '2'){ ?>:&nbsp;<?php  echo $rs['fld_name'];  ?><?php } ?></span>&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response'> </span></div>
 
<div id="collsp_<?php echo $rs['position']; ?>" style="margin-top:6px; border-top:1px solid #dddddd; <?php if( $rs['flag'] == '2'){ ?> display:none <?php } ?>">

<p>
<?php if( $rs['flag'] == '2'){ ?>
<div style="width:100%">
<!-- Left -->
<div style="float:left;">
<b>Name:</b><br><input type='text' name='fldname' id='<?php echo $rs['position']; ?>_optionName' value="<?php echo trim($rs['fld_name']);  ?>" class='widefat' style="width:130px;">
</div>
<!-- Right -->
<div style="float:right;">
<b>Default:</b><br>
<select id='<?php echo $rs['position']; ?>_DefaultOption' class='widefat' style="width:130px;">
<option selected="selected" >Select</option>
<?php
$options = explode( ',' , $rs['fld_values'] ); 
foreach( $options as $key=>$val ){
	if( $val == '' ){ unset( $options[$key] );
	}else{ 	?>
	 <option value="<?php echo trim($val) ?>" <?php if( trim($val) == trim( $rs['default_value'] ) ) {  echo "selected"; } ?> ><?php echo trim($val) ?></option> 
<?php
} }
?>
</select>
</div>
<!-- Center -->
<div align="center">
<b>Options:</b><br><textarea id='<?php echo $rs['position']; ?>_OptionValues' style="width:150px; height:100px;">
<?php
$options = explode( ',' , $rs['fld_values'] ); 
foreach( $options as $key=>$val ){
	if( $val == '' ){ unset( $options[$key] );
	}else{ 	echo trim($val)."\n"; }
}
?></textarea><br><small>Enter new value in new line</small>
</div>
</div>
<?php } else { ?>
<div style='width:65%'>
	<div style='float:left;'>
	<b>Name:</b><br><input type='text' name='fldname' id='<?php echo $rs['position']; ?>_optionName' class='widefat' style='width:130px;'>
	</div>
	<div align='center'>
	<b>Options:</b><br><textarea id='<?php echo $rs['position']; ?>_OptionValues' style='width:150px; height:100px;'></textarea><br>
	<span style='font-size:10px;padding-left:133px'>Enter new value in new line</span>
	</div>
</div>	
<?php } ?>
</p>

</div>
</div>
</div>
		
	<?php		
			} elseif( $rs['form_type'] == '5' ) {
			$textarea = $rs['fld_values'];
			$textarea = explode( ',' ,$textarea );
			?>
			
<div id="recordsArray_<?php echo $rs['position']; ?>">
<div class='eHelp' align='left'>
<div style='float:right'><a onclick="saveCoords('<?php echo $rs['position']; ?>_textareafldname','','<?php echo $rs['position']; ?>','5');" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a onclick="remove('<?php echo $rs['position']; ?>','-1','5');" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a onclick="cfgShowHide('<?php echo $rs['position'];?>', '<?php echo RC_FULLPATH;?>')" style="cursor:pointer;cursor:hand;"><img src="<?php echo RC_FULLPATH;?>/image/arr1.gif" id="cfgimg_<?php echo $rs['position']; ?>" align="absmiddle" border="0" alt="" /></a></div>
	  <div style="color: #0066FF;font-weight:bold; font-size:12px">TextArea&nbsp;<span style='font-size:10px; font-weight:normal; color:#666666; padding-top:4px;' ><?php if( $rs['flag'] == '2'){ ?>:&nbsp;<?php  echo $rs['fld_name'];  ?><?php } ?></span>&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='<?php echo $rs['position']; ?>insert_response'> </span></div>
	 
	<div id="collsp_<?php echo $rs['position']; ?>" style="margin-top:6px; border-top:1px solid #dddddd; <?php if( $rs['flag'] == '2'){ ?> display:none <?php } ?>">
<p><b>Name:</b>&nbsp;<input type='text' id='<?php echo $rs['position']; ?>_textareafldname' class='widefat' style="width:150px;" value="<?php echo $rs['fld_name'];  ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Rows:</b>&nbsp;<input type='text' style='width:45px;' id='<?php echo $rs['position']; ?>_rows' value="<?php echo $textarea['0']; ?>" class='widefat'  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Cols:</b>&nbsp;<input type='text' style='width:45px;' class='widefat' id='<?php echo $rs['position']; ?>_cols' value="<?php echo $textarea['1']; ?>" >
</p>
</div>
</div>
</div>
			<?php
			}
		 } // Eof while
	}
?>



<?php
class easy_custom_fields {
	function  cfgCreateControlTable(){
		$rs = mysql_query("SHOW TABLES LIKE '".RC_CTRL_TBL."'");
		$exists = mysql_fetch_row($rs);
		if ( !$exists ) {
			  $sql = "CREATE TABLE `".RC_CTRL_TBL."` (
					  `id` int(12) NOT NULL auto_increment,
					  `form_type` enum('1','2','3','4','5') NOT NULL,
					  `fld_name` varchar(30) NOT NULL,
					  `text_fld_size` varchar(5) NOT NULL,
					  `fld_values` text NOT NULL,
					  `default_value` varchar(200) NOT NULL,
					  `position` int(5) NOT NULL,
					  `flag` enum('1','2') NOT NULL,
					  `ListingID` int(11) NOT NULL,
					  PRIMARY KEY  (`id`)
					);";
			  mysql_query($sql);
			return true;
		}
		return false;
	}

  function easy_custom_fields_options() {
	add_options_page(RC_NAME, RC_NAME, 8, __FILE__, array('easy_custom_fields', 'rcf_gui_post_option_page') );
  }
  
  function ecf_add_meta_box(){
    global $wp_version, $table_prefix;
	
	if ( $wp_version > 2.1 &&  $wp_version < 2.7 ) { 
		add_action( 'dbx_page_advanced', array( 'easy_custom_fields', 'insert_gui' ) );
		if( $wp_version >= 2.5 &&  $wp_version <= 2.6 ) { 
			add_action( 'edit_page_form', array( 'easy_custom_fields', 'insert_gui' ) );		
		} else {
			add_action( 'dbx_page_advanced', array( 'easy_custom_fields', 'insert_gui' ) );		
		}
	}

	if( $wp_version > 2.6 ) {   
		add_meta_box('easy-cf', RC_NAME, array('easy_custom_fields', 'insert_gui') , 'post', 'normal');
		add_meta_box('easy-cf', RC_NAME, array('easy_custom_fields', 'insert_gui') , 'page', 'normal');
	}
  }
    
  function rcf_gui_post_option_page() {
	global $wpdb;
	$rc_activate = get_option('rc_activate');
	$reg_msg = '';
	$rc_msg = '';
	$form_1 = 'rc_reg_form_1';
	$form_2 = 'rc_reg_form_2';
		// Activate the plugin if email already on list
	if ( trim($_GET['mbp_onlist']) == 1 ) {
		$rc_activate = 2;
		update_option('rc_activate', $rc_activate);
		$reg_msg = 'Thank you for registering the plugin. It has been activated'; 
	} 
	// If registration form is successfully submitted
	if ( ((trim($_GET['submit']) != '' && trim($_GET['from']) != '') || trim($_GET['submit_again']) != '') && $rc_activate != 2 ) { 
		update_option('rc_name', $_GET['name']);
		update_option('rc_email', $_GET['from']);
		$rc_activate = 1;
		update_option('rc_activate', $rc_activate);
	}
	if ( intval($rc_activate) == 0 ) { // First step of plugin registration
		global $userdata;
		rcRegisterStep1($form_1,$userdata);
	} else if ( intval($rc_activate) == 1 ) { // Second step of plugin registration
		$name  = get_option('rc_name');
		$email = get_option('rc_email');
		rcRegisterStep2($form_2,$name,$email);
	} else if ( intval($rc_activate) == 2 ) { // Options page
		if ( trim($reg_msg) != '' ) {
			echo '<div id="message" class="updated fade"><p><strong>'.$reg_msg.'</strong></p></div>';
		}
		
  ?>
<!-- drag n drop  html -->
<script type="text/javascript" src="<?php echo RC_FULLPATH; ?>js/drag-drop-custom.js"></script>
<script type="text/javascript" src="<?php echo RC_FULLPATH; ?>js/jquery-min.js"></script>
<script type="text/javascript" src="<?php echo RC_FULLPATH; ?>js/jquery-ui-custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	$(function() {
		$("#dropContent").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
			$.post("<?php echo RC_FULLPATH;  ?>process-records.php", order, function(theResponse){
				$("#testt").html(theResponse);
			}); 															 
		}								  
		});
	});

});	
</script>
<link rel="stylesheet" href="<?php echo RC_FULLPATH; ?>style.css" type="text/css">
<div class="wrap">
<h2><?php echo RC_NAME.' '.RC_VERSION; ?></h2>
<strong><img src="<?php echo RC_FULLPATH;?>image/how.gif" border="0" align="absmiddle" /> <a href="http://wordpress.org/extend/plugins/easy-custom-fields/other_notes/" target="_blank">How to use it</a>&nbsp;&nbsp;&nbsp;
		<img src="<?php echo RC_FULLPATH;?>image/comment.gif" border="0" align="absmiddle" /> <a href="http://www.maxblogpress.com/forum/forumdisplay.php?f=22" target="_blank">Community</a></strong>
<form action="" name="form" method="post">
<input type="hidden" value="0" id="theValue" />
<div id="stage" align="center">

	<div id="dragSpace" align="center" style="text-align:left">
		<div id="dragList">
			<div id="dragTitle">Drag items to build your Custom Field </div>
			<div class="textfield" id="1">Text Box</div>
			<div class="radiobuttom" id="2">Radio Button</div>
			<div class="checkbox" id="3">Check Box</div>
			<div class="select" id="4">Select Box</div>
			<div class="textarea" id="5">Textarea</div>
		</div>
		<div style="float: left; height: 450px; width: 10px;"></div>
	</div>

<!--C3D2DA-->
	<div id="mainContainer">
		<div id="workSpace"> 
			<div id="tabs"></div>
			<div id="pList"><br>You can drag different form fields from the left hand column on to this work space to begin building Custom Fields</div>
			<!-- drop box define -->
			<div id="dropBox" class="finalList">
				<div id="dropContent"><?php include_once('reload-data.php'); ?></div> <!-- Main drop point -->
			</div>
			<!-- Eof drop point -->
			<p class="clear"></p>
			<p style="text-align:center;"><strong><?php echo RC_NAME.' '.RC_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
		   <p align="center">This plugin is the result of <a href="http://www.maxblogpress.com/blog/219/maxblogpress-revived/" target="_blank">MaxBlogPress Revived</a> project.</p>
		</div>
	</div>
	
</div>
</form>
</div>
<!-- Eof drag n drop html -->
<script type="text/javascript">
/* -------------------------- */
/* Show Hide */
/* -------------------------- */
function cfgShowHide(id, path) {
  var div = document.getElementById('collsp_'+id);
  var img = document.getElementById('cfgimg_'+id);
  if ( div.style.display == 'none' ) {
  	div.style.display = 'block';
	img.src = path + '/image/arr2.gif';
  } else { 
  	div.style.display = 'none';
	img.src = path + '/image/arr1.gif';
  }
}
/* -------------------------- */
/* Trim */
/* -------------------------- */
function trim(str) {
  return str.replace(/^\s+|\s+$/g, '');
}
/* -------------------------- */
/* TextField */
/* -------------------------- */
function textfield(idOfDraggedItem, x){ 
	var textfield = "<div id='recordsArray_"+x+"'><div class='eHelp' align='left'><div style='float:right'><a onclick=\"saveCoords('"+ x +"_fldname','"+ x +"_size','"+ x +"','1');\" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a  onclick=\"remove('"+x+"','-1','1');\" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"cfgShowHide('"+ x +"', '<?php echo RC_FULLPATH;?>');\" style='cursor:pointer;cursor:hand;'><img src='<?php echo RC_FULLPATH;?>/image/arr1.gif' id='cfgimg_"+ x +"' align='absmiddle' border='0' alt='' /></a></div><div style='color: #0066FF;font-weight:bold; font-size:12px'>Text Box&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='"+x+"insert_response' ></span></div><div id='collsp_"+ x +"' style='margin-top:6px; border-top:1px solid #dddddd;'><p><b>Name:</b>&nbsp;<input type='text' class='widefat' style='width:150px;' name='fldname' id='"+ x +"_fldname'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Field Size:</b>&nbsp;<input type='text' class='widefat' style='width:45px;' name='size' id='"+ x +"_size' >&nbsp;px</p></div></div></div>";
	return textfield;
}
/* -------------------------- */
/* Radio */
/* -------------------------- */
function radio(idOfDraggedItem, x){ 
	var radio = "<div id='recordsArray_"+x+"'><div class='eHelp' align='left'><div style='float:right'><a onclick=\"saveCoords('"+ x +"_radio_fldname','','"+ x +"','2');\" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a onclick=\"remove('"+x+"','-1','1');\" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"cfgShowHide('"+x+"', '<?php echo RC_FULLPATH;?>');\" style='cursor:pointer;cursor:hand;'><img src='<?php echo RC_FULLPATH;?>/image/arr1.gif' id='cfgimg_"+x+"' align='absmiddle' border='0' alt='' /></a></div><div style='color: #0066FF;font-weight:bold; font-size:12px'>Radio Button&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='"+x+"insert_response' ></span></div><div id='collsp_"+x+"' style='margin-top:6px; border-top:1px solid #dddddd;'><p><b>Name:</b>&nbsp;<input type='text' name='"+ x +"_radio_fldname' id='"+ x +"_radio_fldname' class='widefat' style='width:150px;'></p><div id='"+x+"_radioReplace'><p style='padding: 0 0 0 20px'><input name='"+ x +"_radio' type='radio' value='radiobutton'><a  onclick=\"replaceRadio('"+ x +"_radioReplace','"+x+"');\" style='text-decoration:none; cursor:pointer' title='click to edit option'>&nbsp;&nbsp;Option&nbsp;&nbsp;1</a></p></div></div></div></div>";
	return radio;
}
/* -------------------------- */
/* Replace Radio */
/* -------------------------- */
function replaceRadio(changeDiv,x) {
	var html = document.getElementById(changeDiv).innerHTML = "<p style='padding: 0 0 0 50px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='"+ x +"radioValue' id='"+ x +"radioValue' class='widefat' style='width:150px;' value='Option value'>&nbsp;<a style='text-decoration:none; cursor:pointer' onClick=\"addNewRadio('"+x+"');\">[+]</a><div id='"+ x +"addnewRadio' ></div></p>";
	document.getElementById(changeDiv).innerHTML = html;
}
/* -------------------------- */
/* Replace Radio After Insert */
/* -------------------------- */
function replaceRadioAfterInsert(changeDiv,x,totalvalues,values) {
	var str = ''; 
	var records_array = values.split(",");
	var first = "<div id='"+ x +"addnewRadio'>";
	var del = 'del';
	for( i=0; i<totalvalues; i++ ){
		if( records_array[i] == '' ){
		} else {		 
		//str += "<div id='"+x+i+del+"'><p style='padding: 0 0 0 50px'>&nbsp;&nbsp;&nbsp;&nbsp;<a style='text-decoration:none; cursor:pointer' onclick=\"removeElement('"+x+"','"+i+del+"')\" >[-]</a>&nbsp;<input type='text' name='"+ x +"radioValue' id='"+ x +"radioValue' value='"+records_array[i]+"'>&nbsp;<a style='text-decoration:none; cursor:pointer' onClick=\"addNewRadio('"+x+"');\">[+]</a></p></div>";
	str += "<div id='"+x+i+del+"'><p style='padding: 0 0 0 50px'>&nbsp;&nbsp;&nbsp;&nbsp;";
	if( i == 0 ){
	str +="&nbsp;&nbsp;&nbsp;&nbsp;";
	}else{
	str += "<a style='text-decoration:none; cursor:pointer' onclick=\"removeElement('"+x+"','"+i+del+"')\" >[-]</a>";
	}
	str += "&nbsp;<input class='widefat' style='width:150px;' type='text' name='"+ x +"radioValue' id='"+ x +"radioValue' value='"+records_array[i]+"'>&nbsp;<a style='text-decoration:none; cursor:pointer' onClick=\"addNewRadio('"+x+"');\">[+]</a>";
	str += "</p></div>";
		}
	}
	var dynamicbody = str;
	var last = "</div>";
	var html = document.getElementById(changeDiv).innerHTML = first + dynamicbody + last;
	document.getElementById(changeDiv).innerHTML = html;
}
/* -------------------------- */
/* Add New Radio */
/* -------------------------- */
function addNewRadio(x) {
  var radio = document.getElementById(x+'addnewRadio');
  var numi = document.getElementById('theValue');
  var num = (document.getElementById('theValue').value -1)+ 2;
  numi.value = num;
  var newdiv = document.createElement('div');
  var divIdName = num;
  newdiv.setAttribute('id',x+divIdName);
  newdiv.innerHTML = "<p style='padding: 0 0 0 50px'>&nbsp;&nbsp;&nbsp;&nbsp;<a style='text-decoration:none; cursor:pointer' onclick=\"removeElement('"+x+"','"+divIdName+"')\">[-]</a>&nbsp;<input type='text' class='widefat' style='width:150px;' name='"+ x +"radioValue' value=''>&nbsp;<a style='text-decoration:none; cursor:pointer' onclick=\"addNewRadio('"+x+"');\">[+]</a></p>";
  radio.appendChild(newdiv);
}
/* -------------------------- */
/* Remove Add Radio */
/* -------------------------- */
function removeElement(x,divNum) { 
  var d = document.getElementById(x+'addnewRadio');
  var olddiv = document.getElementById(x+divNum);
  d.removeChild(olddiv);
}
/* -------------------------- */
/* CheckBox */
/* -------------------------- */
function checkbox(idOfDraggedItem, x){ 
	var checkbox = "<div id='recordsArray_"+x+"'><div class='eHelp' align='left'><div style='float:right'><a onclick=\"saveCoords('"+ x +"_checkbox_fldname','"+ x +"_check','"+ x +"','3');\" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a  onclick=\"remove('"+x+"','-1','1');\" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"cfgShowHide('"+ x +"', '<?php echo RC_FULLPATH;?>');\" style='cursor:pointer;cursor:hand;'><img src='<?php echo RC_FULLPATH;?>/image/arr1.gif' id='cfgimg_"+ x +"' align='absmiddle' border='0' alt='' /></a></div><div style='color: #0066FF;font-weight:bold; font-size:12px'>Check Box&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='"+x+"insert_response' ></span></div><div id='collsp_"+ x +"' style='margin-top:6px; border-top:1px solid #dddddd;'><p><b>Name:</b>&nbsp;<input type='text' name='"+ x +"_radio_fldname' id='"+ x +"_checkbox_fldname' class='widefat' style='width:150px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Default:</b>&nbsp;&nbsp;<input type='radio' name='"+ x +"_check'  value='checked' checked > Checked&nbsp;&nbsp;<input type='radio' name='"+ x +"_check'  value='unchecked' >   Unchecked</p></div></div></div>";
	return checkbox;
}
/* -------------------------- */
/* SelectBox */
/* -------------------------- */
function optionbox(idOfDraggedItem, x) {
	var optionbox = "<div id='recordsArray_"+x+"'><div class='eHelp' align='left'><div style='float:right'><a onclick=\"saveCoords('"+ x +"_optionName','"+ x +"_OptionValues','"+ x +"','4');\" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a  onclick=\"remove('"+x+"','-1','1');\" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"cfgShowHide('"+ x +"', '<?php echo RC_FULLPATH;?>');\" style='cursor:pointer;cursor:hand;'><img src='<?php echo RC_FULLPATH;?>/image/arr1.gif' id='cfgimg_"+ x +"' align='absmiddle' border='0' alt='' /></a></div><div style='color: #0066FF;font-weight:bold; font-size:12px'>Select Box&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='"+x+"insert_response' ></span></div><div id='collsp_"+ x +"' style='margin-top:6px; border-top:1px solid #dddddd;'><p><div style='width:65%'><div style='float:left;'><b>Name:</b><br><input type='text' name='fldname' id='"+ x +"_optionName' class='widefat' style='width:130px;'></div><div align='center'><b>Options:</b><br><textarea id='"+ x +"_OptionValues' style='width:150px; height:100px;'></textarea><br><span style='font-size:10px;padding-left:133px'>Enter new value in new line</span></div></p></div></div></div>";
	return optionbox;
}
/* -------------------------- */
/* TextArea */
/* -------------------------- */
function textarea(idOfDraggedItem, x) {
	var textarea = "<div id='recordsArray_"+x+"'><div class='eHelp' align='left'><div style='float:right'><a onclick=\"saveCoords('"+ x +"_textareafldname','','"+ x +"','5');\" style='text-decoration:none; cursor:pointer'>Save</a>&nbsp;|&nbsp;<a  onclick=\"remove('"+x+"','-1','1');\" style='text-decoration:none; cursor:pointer'>Remove</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"cfgShowHide('"+ x +"', '<?php echo RC_FULLPATH;?>');\" style='cursor:pointer;cursor:hand;'><img src='<?php echo RC_FULLPATH;?>/image/arr1.gif' id='cfgimg_"+ x +"' align='absmiddle' border='0' alt='' /></a></div><div style='color: #0066FF;font-weight:bold; font-size:12px'>TextArea&nbsp;&nbsp;<span style='font-size:10px; font-weight:normal; color:#CC0000; padding-top:4px;' id='"+x+"insert_response' ></span></div><div id='collsp_"+ x +"' style='margin-top:6px; border-top:1px solid #dddddd;'><p><b>Name:</b>&nbsp;<input type='text' name='fldname' id='"+ x +"_textareafldname' class='widefat' style='width:150px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Rows:</b>&nbsp;<input type='text' style='width:45px;' class='widefat' id='"+ x +"_rows' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Cols:</b>&nbsp;<input type='text' class='widefat' style='width:45px;' id='"+ x +"_cols' ></p></div></div></div>";
	return textarea;
}
/* -------------------------- */
/* Remove Drop Elelent */
/* -------------------------- */
function removeElementDrop(divNum) {
	boolReturn = confirm("All data related to it will be permanently lost. Are you sure to delete it?");
	if ( boolReturn == true ) {
		var d = document.getElementById('dropContent');
		var olddiv = document.getElementById(divNum);
		d.removeChild(olddiv);
	} else {
		return false;
	}	
}
/* -------------------------- */
/* Save */
/* -------------------------- */
function saveCoords(fldname,fldID,x,form_type){ 
	var position = x;
	if( form_type == '1' ) { 
	var text_field_name =  document.getElementById(fldname).value;
	var text_field_size = document.getElementById(fldID).value;
		// ** START **
		if ( text_field_name == "" ) {
		alert( "Please Enter TextBox Name." );
		return false ;
		}else  if ( text_field_size == "" ) {
		alert( "Please Enter your text form size." );
		return false ;
		}
		// ** END **
	insert( text_field_name, text_field_size, position, form_type, '', '2' );
	
	}else if( form_type == '2' ){ 
	var DynamicInputBoxValues = [];
	var radio_name =  document.getElementById(fldname).value;
		// ** START **
		if ( radio_name == "" ) {
		alert( "Please Enter Radio Name." );
		return false ;
		}
		// ** END **
	
	// while drag n drop	
	var radio_check_option = document.getElementsByName( x +'_radio');
		for(var i = 0; i < radio_check_option.length; i++ ) {
			if( radio_check_option[i].checked == true || radio_check_option[i].checked == false  ){ 
			alert( "You cannot save default option 1, click on option 1 to change your value" );
			return false ;
			}
		}
	// After value insert and diaplayed
	var allRecords = [];
	var defaultValue;
	var check_default_option = document.getElementsByName( x +'_radio_default_value');
		for(var i = 0; i < check_default_option.length; i++ ) {
			if( check_default_option[i].checked == true ){ 
			defaultValue = check_default_option[i].value; 
			}
			allRecords.push( check_default_option[i].value );	
		}
    // replace check box with input form	
	var NoOfList = document.getElementsByName( x +'radioValue');
		for(var i = 0; i < NoOfList.length; i++) {
			DynamicInputBoxValues.push( ( NoOfList[i].value ));
		}
		
	if( DynamicInputBoxValues != '' ){
		insert( radio_name, DynamicInputBoxValues, position, form_type, '', '2' );  
	}else{
		insert( radio_name, allRecords, position, form_type, defaultValue, '2' );  
	}	
	
	}else if( form_type == '3' ){ 
	var checkbox_name =  document.getElementById(fldname).value;
		if ( checkbox_name == "" ) {
		alert( "Please Enter Check Box Name." );
		return false ;
		}
	var checked_value =  document.getElementsByName(fldID);
		for(var i = 0; i < checked_value.length; i++) {
		if( checked_value[i].checked == true ){ var chooseValue = checked_value[i].value; }
		}	
	insert( checkbox_name, chooseValue, position, form_type, '', '2' );  
	
	}else if( form_type == '4' ){ 
	var option_name =  document.getElementById(fldname).value;
	var option_values =  document.getElementById(fldID).value;
	var records_array = option_values.split("\n"); // make value as a,b,c...
		// ** START **
		if ( option_name == "" ) {
		alert( "Please Enter Option Name." );
		return false ;
		}else  if ( option_values == "" ) {
		alert( "Please Enter Option Values." );
		return false ;
		}
		// ** END **
		
	// Finding default value of select option
	var default_option_value = document.getElementById( x +'_DefaultOption');
	if( default_option_value != undefined ){ 
	var strUser = default_option_value.options[default_option_value.selectedIndex].value;
	}else{
	var strUser = '';
	}
		
	insert( option_name, records_array, position, form_type, strUser, '2' );  
	
	} else if ( form_type == '5' ){ 
	var textarea_name =  document.getElementById(fldname).value;
	var textarea_rows =  document.getElementById( x +'_rows').value;
	var textarea_cols =  document.getElementById( x +'_cols').value;
	var textarea_value = textarea_rows + "," + textarea_cols;
		// ** START **
		if ( textarea_name == "" ) {
		alert( "Please Enter TextArea Name." );
		return false ;
		}else  if ( textarea_rows == "" ) {
		alert( "Please Enter TextArea row size." );
		return false ;
		}else  if ( textarea_cols == "" ) {
		alert( "Please Enter TextArea Cols size." );
		return false ;
		}
		// ** END **
	insert( textarea_name, textarea_value, position, form_type, '', '2' );  
	}
}
/* -------------------------- */
/* Drag N Drop */
/* -------------------------- */
function dropItems(idOfDraggedItem,targetId,x,y) {
	var html = document.getElementById('dropContent').innerHTML;
	if(html.length>0)html = html;
	if( idOfDraggedItem == '1'  ){ 
	rcDropZones( '1', x, '1' );
	html = html + textfield(idOfDraggedItem, x); 
	} else if( idOfDraggedItem == '2'  ){ 
	rcDropZones( '2', x, '1'  );
	html = html + radio(idOfDraggedItem, x); 
	} else if( idOfDraggedItem == '3'  ){ 
	rcDropZones( '3', x, '1'  );
	html = html + checkbox(idOfDraggedItem, x); 
	} else if( idOfDraggedItem == '4'  ){ 
	rcDropZones( '4', x, '1'  );
	html = html + optionbox(idOfDraggedItem, x); 
	} else if( idOfDraggedItem == '5'  ){ 
	rcDropZones( '5', x, '1'  );
	html = html + textarea(idOfDraggedItem, x); 
	}
	document.getElementById('dropContent').innerHTML = html;
}
/* -------------------------- */
/* Float Drag N Drop */
/* -------------------------- */
function onDragFunction(cloneId,origId) {
	self.status = 'Started dragging element with id ' + cloneId;
	var obj = document.getElementById(cloneId);
	obj.style.background='url(<?php echo RC_FULLPATH;  ?>image/drag.gif)';
}
/* -------------------------- */
/* Main Calling Function Drag N Drop */
/* -------------------------- */
var dragDropObj = new DHTMLgoodies_dragDrop();
dragDropObj.addSource('1',true,true,true,false,'onDragFunction');	
dragDropObj.addSource('2',true,true,true,false,'onDragFunction');	
dragDropObj.addSource('3',true,true,true,false,'onDragFunction');	
dragDropObj.addSource('4',true,true,true,false,'onDragFunction');	
dragDropObj.addSource('5',true,true,true,false,'onDragFunction');	
dragDropObj.addTarget('dropBox','dropItems');	// Set <div id="dropBox"> as a drop target. Call function dropItems on drop
dragDropObj.init();
/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
	var request_type;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer"){
		request_type = new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		request_type = new XMLHttpRequest();
	}
	return request_type;
}// end of function 

var http = createObject();
/* -------------------------- */
/* SAVE DROP ZONES */
/* -------------------------- */
var nocache = 0;
function rcDropZones( form_type, position, flag ) {
	nocache = Math.random();
	if( form_type == '1' ) {
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?flag=' +flag+'&position=' +position+'&form_type=' +form_type+'&nocache = '+nocache);
	} else if( form_type == '2' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?flag=' +flag+'&position=' +position+'&form_type=' +form_type+'&nocache = '+nocache);
	} else if( form_type == '3' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?flag=' +flag+'&position=' +position+'&form_type=' +form_type+'&nocache = '+nocache);
	} else if( form_type == '4' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?flag=' +flag+'&position=' +position+'&form_type=' +form_type+'&nocache = '+nocache);
	} else if( form_type == '5' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?flag=' +flag+'&position=' +position+'&form_type=' +form_type+'&nocache = '+nocache);
	}
	http.onreadystatechange = function insertReply() {
									if(http.readyState == 4){}
								}
	http.send(null);
}
/* -------------------------- */
/* INSERT */
/* -------------------------- */
var nocache = 0;
function insert( field_name, field_value, position, form_type, defaultvalue,flag ) {
	document.getElementById(position+'insert_response').innerHTML = '<img src="<?php echo RC_FULLPATH;?>image/spinner.gif" border="0" align="absmiddle"> Saving...';
	var site_url='';
	var site_name = '';
	nocache = Math.random();
	if( form_type == '1' ) {
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?text_field_name='+field_name+'&text_field_size=' +field_value+'&position=' +position+'&form_type=' +form_type+'&flag=' +flag+'&nocache = '+nocache);
	} else if( form_type == '2' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?radio_field_name='+field_name+'&radio_value=' +field_value+'&position=' +position+'&form_type=' +form_type+'&default_value=' +defaultvalue+'&flag=' +flag+'&nocache = '+nocache);
	} else if( form_type == '3' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?checkbox_field_name='+field_name+'&checkbox_checked_value=' +field_value+'&position=' +position+'&form_type=' +form_type+'&flag=' +flag+'&nocache = '+nocache);
	} else if( form_type == '4' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?option_name='+field_name+'&option_value=' +field_value+'&position=' +position+'&form_type=' +form_type+'&option_default=' +defaultvalue+'&flag=' +flag+'&nocache = '+nocache);
	} else if( form_type == '5' ){ 
	http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?textarea_name='+field_name+'&textarea_value=' +field_value+'&position=' +position+'&form_type=' +form_type+'&flag=' +flag+'&nocache = '+nocache);
	}
	http.onreadystatechange = function insertReply() {
									if(http.readyState == 4){
										///var response = http.responseText;
										///var records = response.split(",");
										///document.getElementById(position+'insert_response').innerHTML = '&nbsp;'+records['0'];
										setTimeout('refreshdiv()', 1000);
									}
								}
	http.send(null);
}
/* -------------------------- */
/* REMOVE */
/* -------------------------- */
function remove( position, msg, form_type ){
	var ret = removeElementDrop('recordsArray_'+position);
	if ( ret != false ) {
		nocache = Math.random();
		http.open('get', '<?php echo RC_FULLPATH;  ?>process-records.php?position='+position+'&msg=' +msg+'&form_type=' +form_type+'&nocache = '+nocache);
		http.onreadystatechange = function insertReply() {
										if(http.readyState == 4){ }
									}
		http.send(null);
	}
}
/* -------------------------- */
/* REFRESH */
/* -------------------------- */
function refreshdiv() {
	var connection = 1;
	nocache = Math.random();
	http.open('GET', '<?php echo RC_FULLPATH;  ?>reload-data.php?connection='+connection+'&nocache = '+nocache);
	http.onreadystatechange = function() {
								if(http.readyState == 4){
									var response = http.responseText;
									document.getElementById('dropContent').innerHTML = response;
								}
							}
	http.send(null);
}
 
</script>
  <?php
  }	
} // Eof option page  

  function sanitize_name( $name ) {
    $name = sanitize_title( $name ); // taken from WP's wp-includes/functions-formatting.php
    $name = str_replace( '-', '_', $name );
    return $name;
  }
  
  function get_custom_fields() {  
	  global $table_prefix;
	  
	  if ( get_option('rc_activate') == 2 ) {
		  $custom_fields = array();
		  $sql = "select * from ".RC_CTRL_TBL." where flag='2' order by ListingID, id ASC";
		  $db_process = mysql_query( $sql );
		  $noOfrows = mysql_num_rows( $db_process );
		  while( $db_records = mysql_fetch_array( $db_process ) ) {
			  $fieldname = $db_records['fld_name'];
		
			  if( $db_records['form_type'] == '1'  ){
			  $custom_fields[$fieldname] = array( 'type' => "textfield" , 'size' => $db_records['text_fld_size'] );
			  }
			  if( $db_records['form_type'] == '2'  ){
			  $custom_fields[$fieldname] = array( 'type' => "radio" , 'value' => $db_records['fld_values'], 'default' => trim($db_records['default_value']) );
			  }
			  if( $db_records['form_type'] == '3'  ){
			  $custom_fields[$fieldname] = array( 'type' => "checkbox" , 'default' => trim($db_records['default_value']) );
			  }
			  if( $db_records['form_type'] == '4'  ){
			  $custom_fields[$fieldname] = array( 'type' => "select" ,  'value' => $db_records['fld_values'], 'default' => trim($db_records['default_value']) );
			  }
			  if( $db_records['form_type'] == '5'  ){
			  $textarea_conf  = explode( "," , $db_records['fld_values'] );
			  $custom_fields[$fieldname] = array( 'type' => "textarea" ,  'rows' => $textarea_conf['0'], 'cols' => $textarea_conf['1'] );
			  }
		  }
	      return $custom_fields;
	  }
  }
  
  function make_textfield( $name, $size = 25 ) {
    $title = $name;
    $name = 'rc_' . easy_custom_fields::sanitize_name( $name );
    
    if( isset( $_REQUEST[ 'post' ] ) ) {
      $value = get_post_meta( $_REQUEST[ 'post' ], $title );
      $value = $value[ 0 ];
    }
    
    $out = 
      '<tr>' .
      '<th scope="row">' . $title . ' </th>' .
      '<td> <input id="' . $name . '" name="' . $name . '" value="' . attribute_escape($value) . '" type="textfield" size="' . $size . '" /></td>' .
      '</tr>';
    return $out;
  }
  
  function make_checkbox( $name, $default ) { 
    $title = $name;
    $name = 'rc_' . easy_custom_fields::sanitize_name( $name );
    
    if( isset( $_REQUEST[ 'post' ] ) ) {
      $checked = get_post_meta( $_REQUEST[ 'post' ], $title );
      $checked = $checked ? 'checked="checked"' : '';
    }
    else {
      if ( isset( $default ) && trim( $default ) == 'checked' ) {
        $checked = 'checked="checked"';
      }    
    }
    
    $out =
      '<tr>' .
      '<th scope="row" valign="top">' . $title. ' </th>' .
      '<td>';
      
    $out .=  
      '<input class="checkbox" name="' . $name . '" value="true" id="' . $name . '" "' . $checked . '" type="checkbox" />';
       
    $out .= '</td>';
    
    return $out;
  }
  
  function make_radio( $name, $values, $default ) {
    $title = $name;
    $name = 'rc_' . easy_custom_fields::sanitize_name( $name );
    
    if( isset( $_REQUEST[ 'post' ] ) ) {
      $selected = get_post_meta( $_REQUEST[ 'post' ], $title );
      $selected = $selected[ 0 ];
    }
    else {
      $selected = $default;
    }
  
    $out =
      '<tr>' .
      '<th scope="row" valign="top">' . $title . ' </th>' .
      '<td>';
    
    foreach( $values as $val ) {
      $id = $name . '_' . easy_custom_fields::sanitize_name( $val );
      
      $checked = ( trim( $val ) == trim( $selected ) ) ? 'checked="checked"' : '';
      
      $out .=  
        '<label for="' . $id . '" class="selectit"><input id="' . $id . '" name="' . $name . '" value="' . $val . '" "' . $checked . '" type="radio"> ' . $val . '</label><br>';
    }   
    $out .= '</td>';
    
    return $out;      
  }
  
  function make_select( $name, $values, $default ) {
    $title = $name;
    $name = 'rc_' . easy_custom_fields::sanitize_name( $name );
    
    if( isset( $_REQUEST[ 'post' ] ) ) {
      $selected = get_post_meta( $_REQUEST[ 'post' ], $title );
      $selected = $selected[ 0 ];
    }
    else {
      $selected = $default;
    }
    
    $out =
      '<tr>' .
      '<th scope="row">' . $title . ' </th>' .
      '<td>' .
      '<select name="' . $name . '">' .
      '<option value="" >Select</option>';
      
    foreach( $values as $val ) {
      $checked = ( trim( $val ) == trim( $selected ) ) ? 'selected="selected"' : '';
    
      $out .=
        '<option value="' . $val . '" ' . $checked . ' > ' . $val. '</option>'; 
    }
    $out .= '</select></td>';
    
    return $out;
  }
  
  function make_textarea( $name, $rows, $cols ) {
    $title = $name;
    $name = 'rc_' . easy_custom_fields::sanitize_name( $name );
    
    if( isset( $_REQUEST[ 'post' ] ) ) {
      $value = get_post_meta( $_REQUEST[ 'post' ], $title );
      $value = $value[ 0 ];
    }
    
    $out = 
      '<tr>' .
      '<th scope="row" valign="top">' . $title . ' </th>' .
      '<td> <textarea id="' . $name . '" name="' . $name . '" type="textfield" rows="' .$rows. '" cols="' .$cols. '">' .attribute_escape($value). '</textarea></td>' .
      '</tr>';
    return $out;
  }


  function insert_gui() {   // menu under content....
    global $wp_version;
  	
	if( $wp_version >= 2.1 &&  $wp_version < 2.5 ) {
		$top = "<div class='dbx-b-ox-wrapper'>
				<fieldset id='trackbacksdiv' class='dbx-box'>
				<div class='dbx-h-andle-wrapper'>
				<h3 class='dbx-handle'>".RC_NAME."</h3>
				</div>
			    <div class='dbx-c-ontent-wrapper'>
				<div class='dbx-content'>";
			
		$bottom = "</div>
			       </div>
		           </fieldset>
		           </div>";		
	}

	if ( $wp_version >= 2.5 &&  $wp_version < 2.7 ) { 
		$top = "<div id='trackbacksdiv22' class='postbox closed'><h3>".RC_NAME."</h3><div class='inside'><p>";
		$bottom = "</p></div></div>";
	}
	
    $fields = easy_custom_fields::get_custom_fields();
    if( $fields == null) {
		echo '<p>No custom fields added yet. Administrator is required to add a list of custom fields from the plugin\'s settings page.</p>';
		return;
	}
	
    $out = '<input type="hidden" name="rc-custom-field-gui-verify-key" id="rc-custom-field-gui-verify-key"
			value="' . wp_create_nonce('rc-custom-field-gui') . '" />';
	$out .= $top;		
    $out .= '<table class="editform">';
    foreach( $fields as $title => $data ) {
      if( $data[ 'type' ] == 'textfield' ) {
        $out .= easy_custom_fields::make_textfield( $title, $data[ 'size' ] );
      }
      else if( $data[ 'type' ] == 'checkbox' ) {
        $out .= 
          easy_custom_fields::make_checkbox( $title, $data[ 'default' ] );
      }
      else if( $data[ 'type' ] == 'radio' ) {
        $out .= 
          easy_custom_fields::make_radio( 
            $title, explode( ',', trim($data[ 'value' ],',') ), $data[ 'default' ] );
      }
      else if( $data[ 'type' ] == 'select' ) {
        $out .= 
          easy_custom_fields::make_select( 
            $title, explode( ',', trim($data[ 'value' ],',') ), $data[ 'default' ] );
      }
      else if( $data[ 'type' ] == 'textarea' ) {
        $out .= 
          easy_custom_fields::make_textarea( $title, $data[ 'rows' ], $data[ 'cols' ] );
      }
    }
    
    $out .= '</table>';
	$out .= $bottom;
    echo $out;
	
  }

  function edit_meta_value( $id ) {  
    global $wpdb;
        
    if( !isset( $id ) )
      $id = $_REQUEST[ 'post_ID' ];
    
    
    if( !current_user_can('edit_post', $id) )
        return $id;
        
    if( !wp_verify_nonce($_REQUEST['rc-custom-field-gui-verify-key'], 'rc-custom-field-gui') )
        return $id;
    
    $fields = easy_custom_fields::get_custom_fields();
    
    if ( $fields == null )
    	return;
    
    foreach( $fields as $title  => $data) {
      $name = 'rc_' . easy_custom_fields::sanitize_name( $title );
      $title = $wpdb->escape(stripslashes(trim($title)));
      
      $meta_value = stripslashes(trim($_REQUEST[ "$name" ]));
      if( isset( $meta_value ) && !empty( $meta_value ) ) {
        delete_post_meta( $id, $title );
        
        if( $data[ 'type' ] == 'textfield' || 
            $data[ 'type' ] == 'radio'  ||
            $data[ 'type' ] == 'select' || 
            $data[ 'type' ] == 'textarea' ) {
          add_post_meta( $id, $title, $meta_value );
        }
        else if( $data[ 'type' ] == 'checkbox' )
          add_post_meta( $id, $title, 'true' );
      }
      else {
        delete_post_meta( $id, $title );
      }
    }
  }
  
}

// Srart Registration.

/**
 * Plugin registration form
 */
function rcRegistrationForm($form_name, $submit_btn_txt='Register', $name, $email, $hide=0, $submit_again='') {
	$wp_url = get_bloginfo('wpurl');
	$wp_url = (strpos($wp_url,'http://') === false) ? get_bloginfo('siteurl') : $wp_url;
	$plugin_pg    = 'options-general.php';
	$thankyou_url = $wp_url.'/wp-admin/'.$plugin_pg.'?page='.$_GET['page'];
	$onlist_url   = $wp_url.'/wp-admin/'.$plugin_pg.'?page='.$_GET['page'].'&amp;mbp_onlist=1';
	if ( $hide == 1 ) $align_tbl = 'left';
	else $align_tbl = 'center';
	?>
	
	<?php if ( $submit_again != 1 ) { ?>
	<script><!--
	function trim(str){
		var n = str;
		while ( n.length>0 && n.charAt(0)==' ' ) 
			n = n.substring(1,n.length);
		while( n.length>0 && n.charAt(n.length-1)==' ' )	
			n = n.substring(0,n.length-1);
		return n;
	}
	function tcValidateForm_0() {
		var name = document.<?php echo $form_name;?>.name;
		var email = document.<?php echo $form_name;?>.from;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var err = ''
		if ( trim(name.value) == '' )
			err += '- Name Required\n';
		if ( reg.test(email.value) == false )
			err += '- Valid Email Required\n';
		if ( err != '' ) {
			alert(err);
			return false;
		}
		return true;
	}
	//-->
	</script>
	<?php } ?>
	<table align="<?php echo $align_tbl;?>">
	<form name="<?php echo $form_name;?>" method="post" action="http://www.aweber.com/scripts/addlead.pl" <?php if($submit_again!=1){;?>onsubmit="return tcValidateForm_0()"<?php }?>>
	 <input type="hidden" name="unit" value="maxbp-activate">
	 <input type="hidden" name="redirect" value="<?php echo $thankyou_url;?>">
	 <input type="hidden" name="meta_redirect_onlist" value="<?php echo $onlist_url;?>">
	 <input type="hidden" name="meta_adtracking" value="mr-easy-custom-fields">
	 <input type="hidden" name="meta_message" value="1">
	 <input type="hidden" name="meta_required" value="from,name">
	 <input type="hidden" name="meta_forward_vars" value="1">	
	 <?php if ( $submit_again == 1 ) { ?> 	
	 <input type="hidden" name="submit_again" value="1">
	 <?php } ?>		 
	 <?php if ( $hide == 1 ) { ?> 
	 <input type="hidden" name="name" value="<?php echo $name;?>">
	 <input type="hidden" name="from" value="<?php echo $email;?>">
	 <?php } else { ?>
	 <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $name;?>" size="25" maxlength="150" /></td></tr>
	 <tr><td>Email: </td><td><input type="text" name="from" value="<?php echo $email;?>" size="25" maxlength="150" /></td></tr>
	 <?php } ?>
	 <tr><td>&nbsp;</td><td><input type="submit" name="submit" value="<?php echo $submit_btn_txt;?>" class="button" /></td></tr>
	 </form>
	</table>
	<?php
}

/**
 * Register Plugin - Step 2
 */
function rcRegisterStep2($form_name='frm2',$name,$email) {
	$msg = 'You have not clicked on the confirmation link yet. A confirmation email has been sent to you again. Please check your email and click on the confirmation link to activate the plugin.';
	if ( trim($_GET['submit_again']) != '' && $msg != '' ) {
		echo '<div id="message" class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
	}
	?>
	<style type="text/css">
	table, tbody, tfoot, thead {
		padding: 8px;
	}
	tr, th, td {
		padding: 0 8px 0 8px;
	}
	</style>
	<div class="wrap"><h2> <?php echo RC_NAME.' '.RC_VERSION; ?></h2>
	 <center>
	 <table width="100%" cellpadding="3" cellspacing="1" style="border:1px solid #e3e3e3; padding: 8px; background-color:#f1f1f1;">
	 <tr><td align="center">
	 <table width="650" cellpadding="5" cellspacing="1" style="border:1px solid #e9e9e9; padding: 8px; background-color:#ffffff; text-align:left;">
	  <tr><td align="center"><h3>Almost Done....</h3></td></tr>
	  <tr><td><h3>Step 1:</h3></td></tr>
	  <tr><td>A confirmation email has been sent to your email "<?php echo $email;?>". You must click on the link inside the email to activate the plugin.</td></tr>
	  <tr><td><strong>The confirmation email will look like:</strong><br /><img src="http://www.maxblogpress.com/images/activate-plugin-email.jpg" vspace="4" border="0" /></td></tr>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td><h3>Step 2:</h3></td></tr>
	  <tr><td>Click on the button below to Verify and Activate the plugin.</td></tr>
	  <tr><td><?php rcRegistrationForm($form_name.'_0','Verify and Activate',$name,$email,$hide=1,$submit_again=1);?></td></tr>
	 </table>
	 </td></tr></table><br />
	 <table width="100%" cellpadding="3" cellspacing="1" style="border:1px solid #e3e3e3; padding:8px; background-color:#f1f1f1;">
	 <tr><td align="center">
	 <table width="650" cellpadding="5" cellspacing="1" style="border:1px solid #e9e9e9; padding:8px; background-color:#ffffff; text-align:left;">
	   <tr><td><h3>Troubleshooting</h3></td></tr>
	   <tr><td><strong>The confirmation email is not there in my inbox!</strong></td></tr>
	   <tr><td>Dont panic! CHECK THE JUNK, spam or bulk folder of your email.</td></tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr><td><strong>It's not there in the junk folder either.</strong></td></tr>
	   <tr><td>Sometimes the confirmation email takes time to arrive. Please be patient. WAIT FOR 6 HOURS AT MOST. The confirmation email should be there by then.</td></tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr><td><strong>6 hours and yet no sign of a confirmation email!</strong></td></tr>
	   <tr><td>Please register again from below:</td></tr>
	   <tr><td><?php rcRegistrationForm($form_name,'Register Again',$name,$email,$hide=0,$submit_again=2);?></td></tr>
	   <tr><td><strong>Help! Still no confirmation email and I have already registered twice</strong></td></tr>
	   <tr><td>Okay, please register again from the form above using a DIFFERENT EMAIL ADDRESS this time.</td></tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr>
		 <td><strong>Why am I receiving an error similar to the one shown below?</strong><br />
			 <img src="http://www.maxblogpress.com/images/no-verification-error.jpg" border="0" vspace="8" /><br />
		   You get that kind of error when you click on &quot;Verify and Activate&quot; button or try to register again.<br />
		   <br />
		   This error means that you have already subscribed but have not yet clicked on the link inside confirmation email. In order to  avoid any spam complain we don't send repeated confirmation emails. If you have not recieved the confirmation email then you need to wait for 12 hours at least before requesting another confirmation email. </td>
	   </tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr><td><strong>But I've still got problems.</strong></td></tr>
	   <tr><td>Stay calm. <strong><a href="http://www.maxblogpress.com/contact-us/" target="_blank">Contact us</a></strong> about it and we will get to you ASAP.</td></tr>
	 </table>
	 </td></tr></table>
	 </center>		
	<p style="text-align:center;margin-top:3em;"><strong><?php echo RC_NAME.' '.RC_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	</div>
	<?php
}

/**
 * Register Plugin - Step 1
 */
function rcRegisterStep1($form_name='frm1',$userdata) {
	$name  = trim($userdata->first_name.' '.$userdata->last_name);
	$email = trim($userdata->user_email);
	?>
	<style type="text/css">
	tabled , tbody, tfoot, thead {
		padding: 8px;
	}
	tr, th, td {
		padding: 0 8px 0 8px;
	}
	</style>
	<div class="wrap"><h2> <?php echo RC_NAME.' '.RC_VERSION; ?></h2>
	 <center>
	 <table width="100%" cellpadding="3" cellspacing="1" style="border:2px solid #e3e3e3; padding: 8px; background-color:#f1f1f1;">
	  <tr><td align="center">
		<table width="548" align="center" cellpadding="3" cellspacing="1" style="border:1px solid #e9e9e9; padding: 8px; background-color:#ffffff;">
		  <tr><td align="center"><h3>Please register the plugin to activate it. (Registration is free)</h3></td></tr>
		  <tr><td align="left">In addition you'll receive complimentary subscription to MaxBlogPress Newsletter which will give you many tips and tricks to attract lots of visitors to your blog.</td></tr>
		  <tr><td align="center"><strong>Fill the form below to register the plugin:</strong></td></tr>
		  <tr><td align="center"><?php rcRegistrationForm($form_name,'Register',$name,$email);?></td></tr>
		  <tr><td align="center"><font size="1">[ Your contact information will be handled with the strictest confidence <br />and will never be sold or shared with third parties ]</font></td></tr>
		</table>
	  </td></tr></table>
	 </center>
	<p style="text-align:center;margin-top:3em;"><strong><?php echo RC_NAME.' '.RC_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	</div>
	<?php
}
?>

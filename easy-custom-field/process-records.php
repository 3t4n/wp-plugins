<?php 
include_once('../../../wp-config.php');

// Global Values
$position = trim($_GET['position']);
$form_type = trim($_GET['form_type']);
$msg = trim($_GET['msg']);
$flag = $_GET['flag'];

// Text Field
$text_field_name = trim($_GET['text_field_name']);
$text_field_size = trim($_GET['text_field_size']);

// Radio
$radio_field_name = trim($_GET['radio_field_name']);
$radio_value = trim($_GET['radio_value']);
$default_value = trim($_GET['default_value']);

// Check Box
$checkbox_field_name = trim($_GET['checkbox_field_name']);
$checkbox_checked_value = trim($_GET['checkbox_checked_value']);

// option Box
$option_name = trim($_GET['option_name']);
$option_values = trim($_GET['option_value']);
$option_default = trim($_GET['option_default']);

// textarea
$textarea_name = trim($_GET['textarea_name']);
$textarea_value = trim($_GET['textarea_value']);

$sql = "select position,flag from ".RC_CTRL_TBL." where position = '$position' ";
$process = mysql_query($sql);
$db_position = mysql_fetch_array($process);

// Test
     $max_listingId_sql = "select MAX(ListingID) as max from ".RC_CTRL_TBL."";
	 $process_max = mysql_query($max_listingId_sql);	
     $max = mysql_fetch_array($process_max);
	 $max_value = $max[0] + 1; 
// Eof test	

if( $form_type == '1' ){

	if( $db_position['position'] == $position ){
		if( $db_position['position'] == $position && $msg == '-1' ) {
			$sql_delete = " delete from ".RC_CTRL_TBL." 
					 where position = '$position' ";
			mysql_query($sql_delete);
		} else {
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$text_field_name',
					 text_fld_size = '$text_field_size',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $text_field_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
		}
	} else {
		$sql = "insert into ".RC_CTRL_TBL."(form_type,fld_name,text_fld_size,position,flag,ListingID) 
				values('$form_type','$text_field_name','$text_field_size','$position','$flag','$max_value')";
		mysql_query($sql);
	}		

}elseif( $form_type == '2' ){
	
	if( $db_position['position'] == $position ){
		if( $db_position['position'] == $position && $msg == '-1' ) {
			$sql_delete = " delete from ".RC_CTRL_TBL." 
					 where position = '$position' ";
			mysql_query($sql_delete);
		} else {
			if( $default_value == '' ){
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$radio_field_name',
					 fld_values = '$radio_value',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $radio_field_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
			}else{
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$radio_field_name',
					 fld_values = '$radio_value',
					 default_value = '$default_value',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $radio_field_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
			}
		}
	} else {
		$sql = "insert into ".RC_CTRL_TBL."(form_type,fld_name,fld_values,position,flag,ListingID) 
				values('$form_type','$radio_field_name','$radio_value','$position','$flag','$max_value')";
		mysql_query($sql);
	}		
	
	
}elseif( $form_type == '3' ){
	
	if( $db_position['position'] == $position ){
		if( $db_position['position'] == $position && $msg == '-1' ) {
			$sql_delete = " delete from ".RC_CTRL_TBL." 
					 where position = '$position' ";
			mysql_query($sql_delete);
		} else {
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$checkbox_field_name',
					 default_value = '$checkbox_checked_value',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $checkbox_field_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
		}
	} else {
		$sql = "insert into ".RC_CTRL_TBL."(form_type,fld_name,default_value,position,flag,ListingID) 
				values('$form_type','$checkbox_field_name','$checkbox_checked_value','$position','$flag','$max_value')";
		mysql_query($sql);
	}		
	
	
}elseif( $form_type == '4' ){
	
	if( $db_position['position'] == $position ){
		if( $db_position['position'] == $position && $msg == '-1' ) {
			$sql_delete = " delete from ".RC_CTRL_TBL." 
					 where position = '$position' ";
			mysql_query($sql_delete);
		} else {
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$option_name',
					 fld_values = '$option_values',
					 default_value = '$option_default',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $option_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
		}
	} else {
		$sql = "insert into ".RC_CTRL_TBL."(form_type,fld_name,fld_values,position,flag,ListingID) 
				values('$form_type','$option_name','$option_values','$position','$flag','$max_value')";
		mysql_query($sql);
	}		
	
	
}elseif( $form_type == '5' ){

	if( $db_position['position'] == $position ){
		if( $db_position['position'] == $position && $msg == '-1' ) {
			$sql_delete = " delete from ".RC_CTRL_TBL." 
					 where position = '$position' ";
			mysql_query($sql_delete);
		} else {
			$sql = " update ".RC_CTRL_TBL." set 
					 fld_name = '$textarea_name',
					 fld_values = '$textarea_value',
					 flag = '$flag'
					 where position = '$position' ";
			mysql_query($sql);
		    $result = $textarea_name;
			$result .= ',';
			$result .= $position;
			echo  $result;
		}
	} else {
		$sql = "insert into ".RC_CTRL_TBL."(form_type,fld_name,fld_values,position,flag,ListingID) 
				values('$form_type','$textarea_name','$textarea_value','$position','$flag','$max_value')";
		mysql_query($sql);
	}		
}
?>

<?php 
$action 				= $_POST['action'];
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		$query = "UPDATE ".RC_CTRL_TBL." SET ListingID = " . $listingCounter . " WHERE position = " . $recordIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
}

?>
<?php

function aspose_contact_form_generateAlphabet($na) {
    $sa = "";
    while ($na >= 0) {
        $sa = chr($na % 26 + 65) . $sa;
        $na = floor($na / 26) - 1;
    }
    return $sa;
}

function aspose_contact_form_shortcode( $atts) {

    $atts = shortcode_atts( array(
        'action' => 'list',
        'filename' => ''
    ), $atts, 'apc' );


    $filename = $atts['filename'];
    $action =  $atts['action'];

    global $wpdb;
    if(!empty($filename) && $action == 'entry'){

        if(isset($_POST) && isset($_POST['apc-submit']) && !empty($_POST['apc-submit'])) {

            include_once('apc-sdk-shortcode-call.php');
        }

		$sql_query = "SELECT head_row FROM ".$wpdb->prefix."apc_shortcodes WHERE `filename` = '".$filename."' ";
        $sql_result = $wpdb->get_results($sql_query);
        $html_string = '<form method="post"><table cellspacing="10" cellpadding="10">';
        $html_string .='<input type="hidden" name="filename" value = "'.$filename.'" />';
        if(is_array($sql_result) && count($sql_result) > 0 ) {
            foreach($sql_result as $sql_res){
                $head_row_array = unserialize($sql_res->head_row);
                foreach($head_row_array as $key=>$head){
                    $html_string .='<tr>';

                    $html_string .='<td><label for ="col_'.$key.'"> '.$head.' </label></td>';
                    $html_string .='<td> <input type="text" name="col[]" id="col_'.$key.'" placeholder="Enter '.$head.'" /> </td> ';
                    $html_string .='</tr>';
                }
            }
            $html_string .='<tr><td colspan="2" style="text-align: right;"><input type="submit" name="apc-submit" class="button" value = "Save" /></td></tr>';
            $html_string .='</table></form>';

            return $html_string;
        } else {
            return "Invalid File.";
        }


    } else {
        if($action == "list" && !empty($filename)) {

            return include_once('apc-sdk-shortcode-listing-call.php');
        } else {
            return 'Invalid File Name.';
        }
    }

}

add_shortcode( 'apc', 'aspose_contact_form_shortcode' );



/**
*
* Shortcode for Forms
**/
function aspose_contact_form_form_shortcode($atts) {
	
	$atts = shortcode_atts( array(
        'id' => '',
        'name' => ''
    ), $atts, 'afForm' );

	$formID = $atts['id'];
    $formName = $atts['name'];
	
	//if(true){
	//	return "FormID:". $formID . ", FormName:" . $formName . "<br>";
	//}
	global $wpdb;
	
	if(isset($_POST) && isset($_POST['apc-submit']) && !empty($_POST['apc-submit'])) {

		include_once('apc-form-call.php');
	}	

			$aspose_contact_form_script = "<script>
		(function($){
			
			jQuery.validator.setDefaults({
  debug: true,
  success: 'valid'
});
			
			
			$().ready(function() {
				// validate the comment form when it is submitted
				$('#asposeCF').validate();
			
			});
	});
	</script>";
	
	        $aspose_contact_form_style = "	<style>
			form {
				//width: 70%
			}
label {
display: block;
margin-top: 1rem;
}
input{
	width:100%;
	display: block;
}

.element-wrap{
	width:100%;
	display: block;
}
form.asposeCF label.error, label.error {
	/* remove the next line when you have trouble in IE6 with labels in list */
	color: red;
	font-style: italic
}
</style>


	";
	
	wp_enqueue_script( 'aspose-jquery-validateor', plugins_url( 'js/jquery.validate.js', __FILE__ ), array('jquery') );
	
	$sql_query = "SELECT form_contents FROM ".$wpdb->prefix."aspose_forms WHERE form_id = '".$formID."' OR form_name = '" .$formName. "' ";
	$sql_result = $wpdb->get_row($sql_query, ARRAY_A);	
	if(!isset($sql_result)){
		return "Sorry! it seems From Name is not valid";
	}
	$html_string = $aspose_contact_form_script . $aspose_contact_form_style . '<form method="post" id="asposeCF">';
	$html_string .= $sql_result["form_contents"];
    $html_string .='<input type="submit" name="apc-submit" class="button" value = "Save" />';
    $html_string .='</form>';	
	$html_string = do_shortcode($html_string);
	
	return $html_string; 	
}
add_shortcode( 'afForm', 'aspose_contact_form_form_shortcode' );

/**
*
* Shortcodes for Form Elements
**/

// Text field
function aspose_contact_form_text_shortcode( $atts) {

    $atts = shortcode_atts( array(
        'id' => '',
        'name' => '',
		'type' => '',		
		'minlength' => '',
		'isrequired' => ''				
    ), $atts, 'afText' );
	
	$textId 		= $atts['id'];
    $textName 		=  $atts['name'];
    $textType 		=  $atts['type'];	
	$textMinLength	= $atts['minlength'];	
	$required 		= $atts['isrequired'];
	
	$textTypes = array("date", "email", "month", "number", "password", "tel", "text", "time", "url", "week");
	
 	$textType = in_array(strtolower($textType), $textTypes)  ? strtolower($textType) : "text";
	$required = (strtolower($required) == strtolower("yes")) ? "required" : "";
	
	return "<br><span class='element-wrap'><input type='".$textType."' id='".$textId."' name='".$textName."' minlength='".$textMinLength."' ".$required." /></span>";
}
add_shortcode( 'afText', 'aspose_contact_form_text_shortcode' );


// Text Field
function aspose_contact_form_textarea_shortcode( $atts) {

    $atts = shortcode_atts( array(
        'id' => '',
        'name' => '',
		'rows' => '',
		'cols' => '',
		'minlength' => '',
		'isrequired' => ''		
    ), $atts, 'afTextarea' );
	
	$textId 		= $atts['id'];
    $textName 		= $atts['name'];
	$textRows 		= $atts['rows'];
    $textCols 		= $atts['cols'];
	$textMinLength	= $atts['minlength'];
	$required 		= $atts['isrequired'];
	
	$required = (strtolower($required) == strtolower("yes")) ? "required" : "";
	
	return "<br><span class='element-wrap'><textarea id='".$textId."' name='".$textName."' cols='".$textCols."' rows='".$textRows."' minlength='".$textMinLength."'  ".$required."></textarea></span>";
}
add_shortcode( 'afTextarea', 'aspose_contact_form_textarea_shortcode' );


// Dropdown Field
function aspose_contact_form_dropdown_shortcode( $atts) {

    $atts = shortcode_atts( array(
        'id' => '',
        'name' => '',
		'options' => ''
    ), $atts, 'afDropdown' );
	
	$textId = $atts['id'];
    $textName =  $atts['name'];
	$textOptions = explode(",", $atts['options']);
	
	$options = "";
	foreach ($textOptions as $value) {
		$options .= "<option>" .$value. "</option>";
	}
	
	return "<br><span class='element-wrap'><select id='".$textId."' name='".$textName."' >". $options ."</select></span>";
}
add_shortcode( 'afDropdown', 'aspose_contact_form_dropdown_shortcode' );
<?php
header("Content-type: application/x-javascript;charset=utf-8"); 
require('../../../wp-blog-header.php');
?>
// File Name: oneshop-validation.js.php
// Version: 1.0.2	06/11/2009
// Author: 1shoppingcart.com
// Author URI: http://1shoppingcart.com
// Copyright 2009 1shoppingcart.com  (email : support@1shoppingcart.com)

jQuery(function($) {
    var errorContainer = $("<div class='error'><u><b><?php echo get_option("oneshop_field_name_Name_missing_field_validate_message"); ?></b></u></div>").appendTo("#oneshop_custom_form").hide();
	var errorLabelContainer = $("<div class='error errorlabels'></div>").appendTo("#oneshop_custom_form").hide();
	$("#oneshop_custom_form").validate({
		errorContainer: errorContainer,
		errorLabelContainer: errorLabelContainer,
		ignore: ":hidden",
		messages: 
		{
			Name: "<?php echo get_option("oneshop_field_name_Name_validate_message"); ?>",
			Email1: 
			{
				required: 	"<?php echo get_option("oneshop_field_name_Email_validate_message"); ?>",
				email: 		"<?php echo get_option("oneshop_field_name_Email_invalid_message"); ?>"
			},
			Company: 	"<?php echo get_option("oneshop_field_name_Company_validate_message"); ?>",
			HomePhone:	"<?php echo get_option("oneshop_field_name_Homephone_validate_message"); ?>",
			WorkPhone:	"<?php echo get_option("oneshop_field_name_Workphone_validate_message"); ?>",
			Address1: 	"<?php echo get_option("oneshop_field_name_Address1_validate_message"); ?>",
			Address2: 	"<?php echo get_option("oneshop_field_name_Address2_validate_message"); ?>",
			City: 		"<?php echo get_option("oneshop_field_name_City_validate_message"); ?>",
			State: 		"<?php echo get_option("oneshop_field_name_State_validate_message"); ?>",
			Zip: 		"<?php echo get_option("oneshop_field_name_Zip_validate_message"); ?>",				
			Country: 	"<?php echo get_option("oneshop_field_name_Country_validate_message"); ?>",
			Fax: 		"<?php echo get_option("oneshop_field_name_Fax_validate_message"); ?>",
			field1: 	"<?php echo get_option("oneshop_field_name_Custom1_validate_message"); ?>",
			field2: 	"<?php echo get_option("oneshop_field_name_Custom2_validate_message"); ?>",
			field3: 	"<?php echo get_option("oneshop_field_name_Custom3_validate_message"); ?>",
			field4: 	"<?php echo get_option("oneshop_field_name_Custom4_validate_message"); ?>",
			field5: 	"<?php echo get_option("oneshop_field_name_Custom5_validate_message"); ?>",
			field6: 	"<?php echo get_option("oneshop_field_name_Custom6_validate_message"); ?>",
			field7: 	"<?php echo get_option("oneshop_field_name_Custom7_validate_message"); ?>",
			field8: 	"<?php echo get_option("oneshop_field_name_Custom8_validate_message"); ?>",
			field9: 	"<?php echo get_option("oneshop_field_name_Custom9_validate_message"); ?>",
			field10: 	"<?php echo get_option("oneshop_field_name_Custom10_validate_message"); ?>"
		}
	});
});
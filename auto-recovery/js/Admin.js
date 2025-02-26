/* Used to show and hide the admin tabs for uar */
function ShowTab(TabName) {
		jQuery(".OptionTab").each(function() {
				jQuery(this).addClass("HiddenTab");
				jQuery(this).removeClass("ActiveTab");
		});
		jQuery("#"+TabName).removeClass("HiddenTab");
		jQuery("#"+TabName).addClass("ActiveTab");
		
		jQuery(".nav-tab").each(function() {
				jQuery(this).removeClass("nav-tab-active");
		});
		jQuery("#"+TabName+"_Menu").addClass("nav-tab-active");
}

function ShowOptionTab(TabName) {
	jQuery(".uar-option-set").each(function() {
		jQuery(this).addClass("uar-hidden");
	});
	jQuery("#"+TabName).removeClass("uar-hidden");
	
	// var activeContentHeight = jQuery("#"+TabName).innerHeight();
	// jQuery(".uar-options-page-tabbed-content").animate({
	// 	'height':activeContentHeight
	// 	}, 500);
	// jQuery(".uar-options-page-tabbed-content").height(activeContentHeight);

	jQuery(".options-subnav-tab").each(function() {
		jQuery(this).removeClass("options-subnav-tab-active");
	});
	jQuery("#"+TabName+"_Menu").addClass("options-subnav-tab-active");
}

jQuery(document).ready(function() {
	SetActionDeleteHandlers();

	jQuery('.ewd-uar-add-recovery-action-item').on('click', function(event) {
		var ID = jQuery(this).data('nextid');

		var HTML = "<tr id='ewd-uar-recovery-action-row-" + ID + "'>";
		HTML += "<td><a class='ewd-uar-delete-recovery-action-item' data-actionid='" + ID + "'>Delete</a></td>";
		HTML += "<td><input type='text' name='Recovery_Action_" + ID + "_Email_Address' /></td>";
		HTML += "<td><select name='Recovery_Action_" + ID + "_Action_Type' >"
		HTML += "<option value='Reminder'>Reminder</option>";
		HTML += "<option value='New_Admin'>Create Admin</option>";
		HTML += "</select></td>";
		HTML += "<td><select name='Recovery_Action_" + ID + "_Email_To_Send' >";
		jQuery(uar_messages).each(function(index, el) {
			HTML += "<option value=" + el.ID + ">" + el.Name + "</option>";
		});
		HTML += "</select></td>";
		HTML += "<td><select name='Recovery_Action_" + ID + "_Inactivity_Interval' >";
		HTML += "<option value='1'>1</option>";
		HTML += "<option value='2'>2</option>";
		HTML += "<option value='3'>3</option>";
		HTML += "<option value='4'>4</option>";
		HTML += "<option value='5'>5</option>";
		HTML += "<option value='6'>6</option>";
		HTML += "<option value='7'>7</option>";
		HTML += "<option value='8'>8</option>";
		HTML += "<option value='9'>9</option>";
		HTML += "<option value='10'>10</option>";
		HTML += "<option value='11'>11</option>";
		HTML += "<option value='12'>12</option>";
		HTML += "</select></td>";
		HTML += "<td><select name='Recovery_Action_" + ID + "_Inactivity_Unit' >";
		HTML += "<option value='Days'> Day(s)</option>";
		HTML += "<option value='Weeks'>Week(s)</option>";
		HTML += "<option value='Months'>Month(s)</option>";
		HTML += "</select></td>";
		HTML += "</tr>";

		//jQuery('table > tr#ewd-uasp-add-reminder').before(HTML);
		jQuery('#ewd-uar-recovery-actions-table tr:last').before(HTML);

		ID++;
		jQuery(this).data('nextid', ID); //updates but doesn't show in DOM

		SetActionDeleteHandlers();

		event.preventDefault();
	});
});

function SetActionDeleteHandlers() {
	jQuery('.ewd-uar-delete-recovery-action-item').on('click', function(event) {
		var ID = jQuery(this).data('actionid');
		var tr = jQuery('#ewd-uar-recovery-action-row-'+ID);

		tr.fadeOut(400, function(){
            tr.remove();
        });

		event.preventDefault();
	});
}

jQuery(document).ready(function() {
	SetMessageDeleteHandlers();

	jQuery('.ewd-uar-add-email').on('click', function(event) {
		var Counter = jQuery(this).data('nextcounter');
		var Max_ID = jQuery(this).data('maxid');

		var HTML = "<tr id='ewd-uar-email-message-" + Counter + "'>";
		HTML += "<td><input type='hidden' name='Email_Message_" + Counter + "_ID' value='" + Max_ID + "' /><a class='ewd-uar-delete-message' data-messagecounter='" + Counter + "'>Delete</a></td>";
		HTML += "<td><input type='text' name='Email_Message_" + Counter + "_Name'></td>";
		HTML += "<td><textarea name='Email_Message_" + Counter + "_Body'></textarea></td>";
		HTML += "</tr>";

		//jQuery('table > tr#ewd-uasp-add-reminder').before(HTML);
		jQuery('#ewd-uar-email-messages-table tr:last').before(HTML);

		Counter++;
		Max_ID++;
		jQuery(this).data('nextcounter', Counter); //updates but doesn't show in DOM
		jQuery(this).data('maxid', Max_ID); //updates but doesn't show in DOM

		SetMessageDeleteHandlers();

		event.preventDefault();
	});
});

function SetMessageDeleteHandlers() {
	jQuery('.ewd-uar-delete-message').on('click', function(event) {
		var ID = jQuery(this).data('messagecounter');
		var tr = jQuery('#ewd-uar-email-message-'+ID);

		tr.fadeOut(400, function(){
            tr.remove();
        });

		event.preventDefault();
	});
}
jQuery(document).ready(function() {
	jQuery('#ewd-uar-test-email-click').on('click', function() {
		var link = jQuery(this).data('actionlink');
		var email = jQuery('#ewd-uar-test-email-address').val();

		var data = 'email=' + email;
		jQuery.post(link, data, function(response) {});

		jQuery('#ewd-uar-test-email-address').val("Sent!");
	});
});

jQuery(document).ready(function() {
	jQuery('.ewd-uar-spectrum').spectrum({
		showInput: true,
		showInitial: true,
		preferredFormat: "hex",
		allowEmpty: true
	});

	jQuery('.ewd-uar-spectrum').css('display', 'inline');

	jQuery('.ewd-uar-spectrum').on('change', function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = EWD_UAR_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
		else {
			jQuery(this).css('background', 'none');
		}
	});

	jQuery('.ewd-uar-spectrum').each(function() {
		if (jQuery(this).val() != "") {
			jQuery(this).css('background', jQuery(this).val());
			var rgb = EWD_UAR_hexToRgb(jQuery(this).val());
			var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
			if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
			else {jQuery(this).css('color', '#000000');}
		}
	});
});

function EWD_UAR_hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}
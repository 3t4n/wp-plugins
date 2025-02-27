jQuery(document).ready(function () {
	
	jQuery("#all_checked_visitor").click(function() {
        var checkBoxes = jQuery("input[name=em-checkbox]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });      

}); 

function ManageVisitor(action, id, nonce) {

    //Delete visitor
    if (action == "deletevisitor") {
		if (confirm('Are you sure want to delete this visitor?')) {
			jQuery.ajax({
				type: 'POST',
				url: location.href,
				data: '&action=' + action + "&id=" + id + "&nonce=" + nonce, 
				success: function(response) {
					jQuery("#vst_record-" + id).fadeOut(1500, "linear");
					jQuery("#datatables-1").DataTable()
					jQuery('#all_checked_visitor:button').toggle(function() {
						jQuery('input:checkbox').attr('checked', 'checked');
						jQuery(this).val('uncheck all');
					}, function() {
						jQuery('input:checkbox').removeAttr('checked');
						jQuery(this).val('check all');
					})
				}
			});
		}
    }
	
	//View visitor
    if (action == "viewvisitor") {
        jQuery("#em_input_load").show();
        jQuery("#em_visitor_table").css({
            "opacity": "0.27"
        });
        jQuery.ajax({
            type: 'POST',
            url: location.href,
            data: '&action=' + action + "&id=" + id,
            success: function(response) {
                jQuery("#modal-view-visitor").show();
                jQuery('#modal-view-visitor').html(jQuery(response).find('div#inner-modal'));
                jQuery("#datatables-1").DataTable();
                jQuery('#all_checked_visitor:button').toggle(function() {
                    jQuery('input:checkbox').attr('checked', 'checked');
                    jQuery(this).val('uncheck all');
                }, function() {
                    jQuery('input:checkbox').removeAttr('checked');
                    jQuery(this).val('check all');
                })
                jQuery("#em_input_load").hide();
                jQuery("#em_visitor_table").css({
                    "opacity": "1"
                });
            }
        });
    }

    //Delete all visitor
    if (action == "deleteallvisitor") {
        if (confirm('Are you sure want to delete all selected visitors?')) {
            var AllVisitors = [];
            jQuery('input:checkbox:checked').map(function() {
                if (jQuery.isNumeric(this.value)) {
                    AllVisitors.push(this.value);
                }
            });
            //console.log(AllVisitors);
            if (AllVisitors.length) {
                jQuery.ajax({
                    type: 'POST',
                    url: location.href,
                    data: '&action=' + action + "&id=" + AllVisitors + "&nonce=" + nonce,
                    success: function(response) {
                        for (i = 0; i < AllVisitors.length; i++) {
                            jQuery("#vst_record-" + AllVisitors[i]).fadeOut(1500, "linear");
                        }
						jQuery('#all_checked_visitor:button').toggle(function() {
							jQuery('input:checkbox').attr('checked', 'checked');
							jQuery(this).val('uncheck all');
						}, function() {
							jQuery('input:checkbox').removeAttr('checked');
							jQuery(this).val('check all');
						})
						
                    }
                });
            } else {
                alert("No Visitors selected to delete.");
            }
        }
    }
}
//event visitor show
function EventVisitorShow(action){
	jQuery("#em_input_load").show();
	jQuery("#em_visitor_table").css({
		"opacity": "0.27"
	});
	var select_event = jQuery('#select_event').val();
	jQuery.ajax({
		type: 'POST',
		url: location.href,
		data:'&select_event=' + select_event + '&action=' + action,
		success: function(response) {
			jQuery('#em_visitor_table').html(jQuery(response).find('div#em_visitor_table'));
			jQuery("#datatables-1").remove();
			jQuery("#datatables-1").DataTable();
			jQuery("#em_input_load").hide();
			jQuery("#em_visitor_table").css({
				"opacity": "1"
			});
			jQuery('#all_checked_visitor:button').toggle(function() {
				jQuery('input:checkbox').attr('checked', 'checked');
				jQuery(this).val('uncheck all');
			}, function() {
				jQuery('input:checkbox').removeAttr('checked');
				jQuery(this).val('check all');
			})
		}
	});
}
//show status
function ShowStaus(id){
	jQuery("#new_status_" + id).show();
	jQuery("#span_close_" + id).show();
	jQuery("#save_status_" + id).hide();
	jQuery("#span_status_" + id).hide();
}
//close status
function CloseStaus(id){
	jQuery("#new_status_" + id).hide();
	jQuery("#span_close_" + id).hide();
	jQuery("#save_status_" + id).show();
	jQuery("#span_status_" + id).show();
}

// update status
function UpdateStatus(status, id){
	if(status && id) {
		jQuery("#new_status_" + id).hide();
		jQuery("#span_close_" + id).hide();
		jQuery("#status-updating-msg-" + id).show();
		var PostData = 'action=update-status' + '&id=' + id + '&status=' + status ;
		jQuery.ajax({
			dataType : 'html',
			type: 'POST',
			url : location.href,
			cache: false,
			data : PostData,
			success: function(data) {
				jQuery("#status-updating-msg-" + id).hide();
				var str = status;
				str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
					return letter.toUpperCase();
				});
				jQuery("#span_status_" + id).text(str);
				jQuery("#save_status_" + id).show();
				jQuery("#span_status_" + id).show();
				jQuery('#all_checked_visitor:button').toggle(function() {
                    jQuery('input:checkbox').attr('checked', 'checked');
                    jQuery(this).val('uncheck all');
                }, function() {
                    jQuery('input:checkbox').removeAttr('checked');
                    jQuery(this).val('check all');
                })
			}
		});
	} else {
		jQuery("#new_status_" + id).hide();
		jQuery("#span_close_" + id).hide();
		jQuery("#save_status_" + id).show();
		jQuery("#span_status_" + id).show();
	}
}

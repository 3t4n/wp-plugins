jQuery(document).ready(function() {
    jQuery("#add_row").on("click", function() {
		var RowLength = jQuery('#rowcount').val();
                 jQuery.ajax({
                        type: 'post',
                        url: ajaxurl,
                        data: {
                                'action'   : 'echosignaddNewRow',
                                'row'      : RowLength,
                        },
                        success:function(data) {
                                jQuery('#templateTable').append(data);
				jQuery('#rowcount').val(parseInt(++RowLength));
                        },
                        error: function(errorthrown){
                                console.log(errorthrown);
                        }
               });

});

jQuery("#add_custom_row").on("click", function() {
		var RowLength = jQuery('#rowcount').val();
                // Dynamic Rows Code
                 jQuery.ajax({
                        type: 'post',
                        url: ajaxurl,
                        data: {
                                'action'   : 'echosignaddNewCustomRow',
                                'row'      : RowLength,
                        },
                        success:function(data) {
                                jQuery('#templateTable').append(data);
				jQuery('#rowcount').val(parseInt(++RowLength));
                        },
                        error: function(errorthrown){
                                console.log(errorthrown);
                        }
               });

});



});


function echosign_removeRow(id) {
          var ID = id.split('-');
          var length = ID['1'];
          jQuery('#row-'+length).addClass('hide');
          jQuery('#row-'+length).html('');
	  jQuery('#'+id).remove();
          return false;
 }

function show_upload_template() {
	document.getElementById('upload_echosign_template').style.display = '';
}

function hide_new_template() {
        document.getElementById('upload_echosign_template').style.display = 'none';
}

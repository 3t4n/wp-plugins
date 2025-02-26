(function( $ ) {
	'use strict';

	$(document).ready(function() {

       /**
    	 *	this file is included for functionalility of affiliate page
    	 *
    	 * @since    1.0.0
    	 */	

       var ciwcamp_active_tab = $("#ciwcamp-active-data").val();
       
       if(ciwcamp_active_tab=="ciwcamp-sales")
       {
           $("#ciwcamp_sales_table").dataTable().fnDestroy();
           ciwcamp_display_sales_list("all");
       }

       $("#ciwcamp-sales-btn").click(function(){

           $("#ciwcamp_sales_table").dataTable().fnDestroy();
           ciwcamp_display_sales_list("all");

       });


    });


    /**
     * this function is used for sales list ajax datatables
     *
     * @since    1.0.0
     */	

    function ciwcamp_display_sales_list(ciwcamp_status)
		{
			var  ciwcamp_sales_table = $(document).find('#ciwcamp_sales_table').DataTable( {
				"processing" : true,
				"serverSide" : true,
				"bsortable"  : true,
				"info"       : false,
				select       : true,
				"ajax"       : {
					data: {
						action: 'ciwcamp_sales_list_action',
						'ciwcamp_status' : ciwcamp_status
						},
					type      : 'POST',
					dataType  : 'json',
					url       : ciwcamp_ajax_object.ciwcamp_ajax_url,
					
                },
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_text_search,
                    'processing':  "<div class='ciwcamp-loader'><img src='"+ciwcamp_notification_object.ciwcamp_translatable_strings.ciwcamp_loader_src+"'/></div>"
                },
				columnDefs : [
					{
						"targets": [0],
						"orderable": false,
						"searchable": true,
					}
				],
				order : [[1, 'asc']],
			});
		}

})( jQuery );

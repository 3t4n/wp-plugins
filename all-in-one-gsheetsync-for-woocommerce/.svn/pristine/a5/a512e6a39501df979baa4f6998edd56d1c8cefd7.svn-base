$ = jQuery;
$(document).ready(function() {
    var mode = $("#aiogsclogmode").val();
    if(mode == 'true'){ 
    $('#aiogsc_logstable').dataTable({        
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": aiogsc_url.ajax_url,
        }
    } );
}
} );             

// JavaScript Document

jQuery( document ).ready( function( $ ) {
    
    $('body').on('click', '#wpstv-trigger-import', function(e){
        e.preventDefault();
        var urlImport = $('#rovidx_smart_tv_roku_dp_json').val();
        var importType = $('#rovidx_smart_tv_import_type').val();
        var importData = wpstv_import_data( urlImport, importType);
        
    });
    
    function wpstv_import_data(url, importType) {
        var dataPack = {
           action: 'rovidx_start_json_import',
           in_url: url, 
           in_type: importType,     
        }
        
        $.ajax({
			url: wpstvdata.ajax_url,
			type: 'post',
            data: dataPack,
			beforeSend: function() {
                $('#r-import-console').html('<i class="fas fa-spinner fa-pulse"></i> <strong>Import:</strong> This may take a minute if you have a lot of content!');
			},
			cache: false,
            success: function(e) {
                console.log(e);
                var out = '';
                $.each(e, function(indx,val){
                    out += 'Imported ' + val + ' in to ' + indx + '<br>';
                });
                $('#r-import-console').html(out);
            }
		});
    }
    
});
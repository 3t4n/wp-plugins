var doughnutData = [{color: "#f1b956"},{color: "#884c86"},{color: "#46BFBD"},{color: "#f0f0f0"}];
var config = {type: 'doughnut',
    data: {
        datasets: [{data: [0,0,0,1],
            backgroundColor: ["#F1B956","#884C86","#46BFBD","#000"],
            label: 'Dataset 3'
        }],
        labels: ["field1","field2","field3","None"]
    }
};

window.onload = function() {
    var ctx = document.getElementById("chart-area");
    if(typeof ctx !== 'undefined' && ctx !== null) {
        ctx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
    }
};
/*-------------------------------------------------------------*/
jQuery(document).ready(function() {
    var amount, dataFeature = '';
    $ = jQuery;
    jQuery.each(jQuery('.badget-list').find('li'), function (index, value) {
        dataFeature += $(this).data('feature');
        dataFeature += ',';
    });

    var res = dataFeature.split(',');
    var totallendth, nul = 0,
        totallentdh = res.length - 1,
        brand = 0,
        checklendth = [],
        brandsngl = 0;

    jQuery('.badget-list input').on('change', function () {
        
        var d = 0,
            m = 0;
        jQuery(".badget-list input:checked").each(function () {
            d += parseInt(jQuery(this).attr("data-min"), 10);
            m += parseInt(jQuery(this).attr("data-max"), 10);
        });
        jQuery("#amount").val(d+'$ '+ " - " + m+'$');
        jQuery(".data-min").attr("data-minval", amount);
        jQuery(".data-max").attr("data-maxval", amount);

        var totalcw = 0;
        
        for (var i = 0, limit = res.length; i < limit - 1; i++) {
            var sngdataFeature = '.' + res[i];

            brandsngl = jQuery(sngdataFeature).find('input:checked').length;
            checklendth[i] = jQuery(sngdataFeature).find('input:checked').length;
            
            totalcw += checklendth[i] << 0;
            if (totalcw == 0) {                
                totalcw = 0;
                nul = 1;
            } else {
                nul = 0;
            }
        }
        
        /*---- Remove Old Dataset----*/
        config.data.datasets.splice(0, 1);
        window.myDoughnut.update();
       
       /*----- Add New----*/
        checklendth[3] = 0;
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(checklendth[index]);
            newDataset.backgroundColor.push(doughnutData[index].color);
        }
        config.data.datasets.push(newDataset);
        window.myDoughnut.update();  

    });

    var lineHeight = parseInt($('#message').css('line-height'), 10);
    $('#message').css({
        minHeight: lineHeight * 3
    });
});

jQuery(document).ready(function($) {

    $('.validate.adf_upload_url').change(function(event) {
        var filename = $(this).val();
        var valid_extensions = /(\.jpg|\.jpeg|\.gif|\.png|\.doc|\.docx|\.pdf)$/i;   
        if( !valid_extensions.test(filename))
        {
           alert('Invalid File Type, Allow only .jpg , .jpeg , .png , .gif , .doc and .pdf files');
           $(this).val('');
        }
    });

    jQuery('.discuss-button').click(function(e,data) {
        e.preventDefault();

        var error_counter  = 0;
        if( $('.validate.adf_upload_url').val() == ''){
            $('.file-field span .material-icons.add').css({'backgroundColor':'red'});
            error_counter++;
        } else{ $('.file-field span .material-icons.add').removeAttr('style'); }

        $('.validate').each(function(index, el) {
            if($(this).val() == ''){$(this).css({'border-color':'red'}); error_counter++;} else {$(this).removeAttr('style');}   
        });

        var dayArr = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
        var dayIndx = jQuery.inArray($('#visibility').val().toLowerCase(), dayArr);
        var dayForm = 0;        
        if($('#visibility').data('id') == 6){ dayForm = 0; }else { dayForm = $('#visibility').data('id') + 1; }  
        if(dayForm != dayIndx){
            $('#visibility').css({'border-color':'red'});
            error_counter++;
        }         
        $('.validate').each(function(index, el) {
           $(this).focus(function(event) {
               $(this).removeAttr('style');
           }); 
        });

        if(error_counter == 0 )
        {                
            jQuery('.discuss-button').after('<img src="http://atlaswebsitedesign.com/wp-content/plugins/discuss-form/assets/images/loadder.gif" class="discuss-loader-image" style="padding-left:10px; margin-top:-10px;">');
            var fd = new FormData();
            var file = jQuery(document).find('#open_in_browser');
            var caption = jQuery(this).find('input[name=img_caption]');
            var individual_file = file[0].files[0];
            fd.append("file", individual_file);
            var individual_capt = jQuery('.adf').serialize();
            fd.append("post", individual_capt); 
            fd.append("security", adf_ajax_nonce);  
            fd.append('action', 'adf_mail_send');  

            $.ajax({
                url: adf_demo_ajaxurl, // point to server-side PHP script 
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,                    
                success: function(php_script_response){
                    jQuery('.discuss-button').after('<div class="output" style="margin-bottom: 40px; color: rgb(0, 0, 0); text-align: center;">'+php_script_response+'</div>')
                    $('.adf').trigger("reset"); 
                    jQuery('.discuss-loader-image').remove();                
                    return false;
                },
                error: function(errorThrown)
                {
                  console.log(errorThrown);
                }        
            });
        }    

        return false;
	});
});
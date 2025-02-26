var row = [];
jQuery('document').ready(function(){
	jQuery(".jsslider").ionRangeSlider({
       skin: "round",
       hide_min_max: true,
       onChange: function(data){
            var val = data.from;
            //console.log(val);
            var name = data.input[0].name;
            jQuery('#' + name).val(val);
            update_bang_tinh_lai();
       }
    });

    jQuery('.group-nhaplieu input').on('change', function(){
        var name = this.id;
        var range = jQuery('.jsslider[name="'+name+'"]').data("ionRangeSlider");
        if(range){
            var value = jQuery(this).val();
            range.update({from: value});
        }
        
        update_bang_tinh_lai();
    });
    
    jQuery('input[name="kieu_tra_no"]').on('change', function(){
    	update_bang_tinh_lai();
    });
    update_bang_tinh_lai();

    jQuery(window).on('resize', function(){
        
        if(jQuery('#innter-tinhlaivay').width() < 800){
            jQuery('#innter-tinhlaivay').addClass('breakpoint');
        }else{
           jQuery('#innter-tinhlaivay').removeClass('breakpoint');
        }

    });
    jQuery(window).trigger('resize');

    jQuery(".open-popup").on('click', function() {
        jQuery(".custom-model-main").addClass('model-open');
    }); 
    jQuery(".close-btn, .bg-overlay").click(function(){
        jQuery(".custom-model-main").removeClass('model-open');
    });

    jQuery('.inputbox input').on('blur', function(){
        var id = jQuery(this).attr('id');
        if(jQuery(this).val() == ""){
             jQuery('label[for="'+id+'"]').removeClass('mini');
        }
       
    });

    jQuery('.inputbox input').on('focus', function(){
        var id = jQuery(this).attr('id');
        jQuery('label[for="'+id+'"]').addClass('mini');
    });

    jQuery('#btn-nhanbangtinh').click(function(){
        jQuery('#btn-nhanbangtinh').text("Đang xử lý...");
        var data = {
            'action' : 'lsnh_summit_profile',
            'user_name' : jQuery('#user_name').val(),
            'user_phone' : jQuery('#user_phone').val(),
            'user_email' : jQuery('#user_email').val(),
        };
        jQuery('#formerror').hide();
        jQuery.post(lsnh.ajax_url,data, function(response){
            if(response!=1){
                jQuery('#formerror').html(response);
                jQuery('#formerror').show();
            }else{
                let csvContent = "data:text/csv;charset=utf-8," 
                + rows.map(e => e.join(",")).join("\n");
                

                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "bang_thanh_toan_lai.csv");
                document.body.appendChild(link); // Required for FF

                link.click();
                jQuery(".close-btn").click();
            }
            jQuery('#btn-nhanbangtinh').text("NHẬN BẢNG TÍNH");
        });
    });

});


function converNumber(number)
{
	var strNumber="";
	strNumber= String(number);
	return strNumber.replace(/\d(?=(?:\d{3})+(?!\d))/g, '$&,')
}


function update_bang_tinh_lai() {
    
    
    var months = new Array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");

    var laisuat = jQuery('#interest').val();
    var ti_le_vay = jQuery('#ti_le_vay').val();
    var so_thang_an_hang = jQuery('#so_thang_an_hang').val();
    var so_thang_an_hang_tmp = so_thang_an_hang;
    jQuery('#phan_tram_vay').text(ti_le_vay);
    jQuery('#phan_tram_von_ban_dau').text(100 - ti_le_vay);
    var gia_tri_bds = jQuery('#gia_tri_bds').val() * 1000000000;
    var gia_tri_bds_vat = gia_tri_bds * 1.1;
    var tong_vay = gia_tri_bds_vat * ti_le_vay / 100;
    jQuery('#von_ban_dau').text(converNumber(Math.round(gia_tri_bds_vat - tong_vay)));
    
    jQuery('#so_tien_vay').text(converNumber(Math.round(tong_vay)));
    
    jQuery('#gia_co_vat').text(converNumber(Math.round(gia_tri_bds_vat)));
    
    var so_thang_vay = jQuery('#thoi_han_vay').val() * 12;
    
    var now  = new Date(jQuery('#nam_mua').val(),jQuery('#thang_mua').val(),1);
	
	var day = now.getDate();
	var month = now.getMonth();
	var year = now.getFullYear();
	var kieu_lai_suat = jQuery("input[name='kieu_tra_no']:checked").val();

	var strDate=  ( (month<10)? "0" + month:month )  + "/" + year;
    jQuery('#thoi_gian_bat_dau').text(strDate);
    

    var tong_lai = 0;
    var goc_con_lai = tong_vay;

    var goc_tra_co_dinh_hang_thang = Math.ceil(tong_vay/so_thang_vay);
    var goc_tra_co_dinh_hang_thang_da_tru_an_hang = goc_tra_co_dinh_hang_thang;
    if(so_thang_an_hang > 0){
        goc_tra_co_dinh_hang_thang_da_tru_an_hang = Math.ceil((tong_vay + (so_thang_an_hang * goc_tra_co_dinh_hang_thang)) /so_thang_vay);
    }
    

    //console.log("tong vay" + tong_vay);
    //console.log("laisuat " + laisuat);
    //console.log("so_thang_vay " + so_thang_vay);
	jQuery('#tablelai_content').html('');
    rows = [
        ["KỲ TRẢ NỢ","LẦN TRẢ", "GỐC", "LÃI", "GỐC + LÃI"],
    ];
    var lock = 1000;
    var tong_tra_goc_lai = 0
    for (index = 0; index <= so_thang_vay; index++) { 

    	if(month==12)
		{
			month=1;
			year=year+1;
		}
		else
		{
			month=month+1;
		}
		strDate= ( (month<10)? "0" + month:month ) + "/" + year;

    	var html = "<tr>";
        if(index < lock){
        	html += "<td>"+strDate+"</td><td>"+index+"</td>";
        }
    	if(index == 0){
    		html += "<td>"+converNumber(Math.round(goc_con_lai))+"</td><td></td><td></td>";
            rows.push([strDate,index,"","",""]);
    	}else{
            var goc_tra_co_dinh_hang_thang_tmp = goc_tra_co_dinh_hang_thang;

    		if(kieu_lai_suat == "du_no_giam_dan"){
    			
                if(so_thang_an_hang_tmp > 0){
                    so_thang_an_hang_tmp--;
                    //khong can tra goc ;
                    goc_tra_co_dinh_hang_thang_tmp = 0;
                }else{
                    goc_con_lai = goc_con_lai - goc_tra_co_dinh_hang_thang_tmp;
                }
                var lai_cua_thang = goc_con_lai * (laisuat / 100/ 12);
	        	
	        	var tong_goc_lai = lai_cua_thang + goc_tra_co_dinh_hang_thang_tmp;
	        	tong_tra_goc_lai += tong_goc_lai;
    		}else{
                var goc_tra_co_dinh_hang_thang_tmp = goc_tra_co_dinh_hang_thang_da_tru_an_hang;
                if(so_thang_an_hang_tmp > 0){
                    so_thang_an_hang_tmp--;
                    //khong can tra goc ;
                    goc_tra_co_dinh_hang_thang_tmp = 0;
                }else{
                    
                }

    			var lai_cua_thang = tong_vay * (laisuat / 100/ 12);
	        	
	        	var tong_goc_lai = lai_cua_thang + goc_tra_co_dinh_hang_thang_tmp;
	        	tong_tra_goc_lai += tong_goc_lai;
    		}
            if(index < lock){
                html += "<td>"+converNumber(Math.round(goc_tra_co_dinh_hang_thang_tmp))+"</td>";

                html += "<td>"+converNumber(Math.round(lai_cua_thang))+"</td>";
                html += "<td>"+converNumber(Math.round(tong_goc_lai))+"</td>";  
            }
    		
            rows.push([strDate,index,goc_tra_co_dinh_hang_thang_tmp,lai_cua_thang,tong_goc_lai]);
    	}

    	
    	jQuery('#trung_binh_thang').text(converNumber(Math.round(tong_tra_goc_lai / so_thang_vay)));
    	
    	html += "</tr>";

        
        jQuery(html).appendTo(jQuery('#tablelai_content'));
    }

}
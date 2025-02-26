function showchec(entity) {
	var checkBox = document.getElementById("schedule");
	var orders_chec = document.getElementById(entity + "_chec");
	if (checkBox.checked == true) {
		orders_chec.style.display = "block";
	} else {
		orders_chec.style.display = "none";
	}
}


function showDivOdr(entity) {
	var select_val = document.getElementById(entity + '_frequency');
	if (select_val.value == 'daily') {
		document.getElementById(entity + '_hidden_div').style.display = "block";
	} else {
		document.getElementById(entity + '_hidden_div').style.display = "none";
	}
	if (select_val.value == 'weekly') {
		document.getElementById(entity + '_hidden_div_1').style.display = "block";
	} else {
		document.getElementById(entity + '_hidden_div_1').style.display = "none";
	}
	if (select_val.value == 'monthly') {
		document.getElementById(entity + '_hidden_div_2').style.display = "block";
	} else {
		document.getElementById(entity + '_hidden_div_2').style.display = "none";
	}
	if (select_val.value == 'yearly') {
		document.getElementById(entity + '_hidden_div_3').style.display = "block";
	} else {
		document.getElementById(entity + '_hidden_div_3').style.display = "none";
	}
	if (select_val.value == 'once') {
		document.getElementById(entity + '_hidden_div_4').style.display = "block";
	} else {
		document.getElementById(entity + '_hidden_div_4').style.display = "none";
	}
}

function FnregExpTest_h(entity) {
	var hour_h = document.getElementById(entity+"_ex_hours").value;
	var reg_h = /^(1[0-2]?|[1-9])$/;
	if(hour_h.match(reg_h)==null)
	{
		document.getElementById(entity+"_ex_hours").value="";
		var a = document.getElementById(entity+"_ex_hours_Alert");
		a.classList.add("show");
		setTimeout(function(){ a.classList.remove("show"); }, 3000);
	}
}
function min_regExpFn_M(entity) {
	var minute_m = document.getElementById(entity+"_ex_minutes").value;
	var reg_mn_m = /^([0-9]?|[1-5][0-9]?|6[0]?)$/;
	if(minute_m.match(reg_mn_m)==null)
	{
		document.getElementById(entity+"_ex_minutes").value="";
		var b = document.getElementById(entity+"_ex_minutes_Alert");
		b.classList.add("show");
		setTimeout(function(){ b.classList.remove("show"); }, 3000);
	}
}
function FnregExpTest(entity) {
	var hour = document.getElementById(entity+"_hours").value;
	var reg = /^(1[0-2]?|[1-9])$/;
	if(hour.match(reg)==null)
	{
		document.getElementById(entity+"_hours").value="";
		var x = document.getElementById(entity+"_hours_Alert");
		x.classList.add("show");
		setTimeout(function(){ x.classList.remove("show"); }, 3000);
	}
}
function min_regExpFn(entity) {
	var minute = document.getElementById(entity+"_minutes").value;
	var reg_mn = /^([0-9]?|[1-5][0-9]?|6[0]?)$/;
	if(minute.match(reg_mn)==null)
	{
		document.getElementById(entity+"_minutes").value="";
		var x = document.getElementById(entity+"_minutes_Alert");
		x.classList.add("show");
		setTimeout(function(){ x.classList.remove("show"); }, 3000);
	}
}

//To save the entity data's as JSON - code end
//Accordion code start
jQuery(document).ready(function () {
        var acc = document.getElementsByClassName("accordion");
	var panel = document.getElementsByClassName("panel");
        var i;
        for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
			var setClasses = !this.classList.contains('active');
			setClass(acc, 'active', 'remove');
			setClass(panel, 'show', 'remove');
			
			if (setClasses)
			{
				this.classList.toggle("active");
				this.nextElementSibling.classList.toggle("show");
			}
		});
	}
	function setClass(els, className, fnName)
	{
		for (var i = 0; i < els.length; i++) {
 	        els[i].classList[fnName](className);
    		}
	}
//});
//Accordion code end

	$('.entity-form').on('submit', function(e) {
		e.preventDefault();
		var $form = $(this);
		$.post($form.attr('action'), $form.serialize(), function(data) {
			var ent = document.getElementById("save_alert");
			ent.classList.add("show");
			setTimeout(function(){ ent.classList.remove("show"); }, 3000);
		}, 'json');
	});

	$('.order-form,.inventory-form,.customer-form,.credentials-form').on('submit', function(e) {
                e.preventDefault();		
		var $form = $(this);	
		var formId = $form.attr('id');
		if(formId == 'order-form')
		{
			var validateVal = true;
		$(".product_identifier_dbsave_woo,.product_identifier_dbsave_google").each(function(){
			if(this.value == 'select')
			{
				validateVal = false;
				return false;				
			}			
		   });	
			if(validateVal == false)
			{
                        showSnackbar('Order Selection Mapping missing. Please correct it.');				
			return false;
			}
		}
		if(formId == 'customer-form')
		{
			var validateVal = true;
			$(".product_identifier_dbsave_woo_customer,.product_identifier_dbsave_google_customer").each(function(){
				if(this.value == 'select')
				{
					validateVal = false;
					return false;
				}
			});
			if(validateVal == false)
			{
				showSnackbar('Order Selection Mapping missing. Please correct it.');
				return false;
			}
		}		
		$.post($form.attr('action'), $form.serialize(), function(data) {
			if(data.success == true)
			{
			showSnackbar(data.message);
			}
			if(data.success)
			{
			if(data.module == 'order')
			{
				window.location.href = 'admin.php?page=aiogsc-settings&msg=false&tab=order';
			}
                        else if(data.module == 'orderitem')
                        {
                                window.location.href = 'admin.php?page=aiogsc-settings&msg=false&tab=orderitem';
                        }				
			else if(data.module == 'customer')
			{
				window.location.href = 'admin.php?page=aiogsc-settings&msg=false&tab=customer';				
			}
			else if(data.module == 'inventory')
			{
				window.location.href = 'admin.php?page=aiogsc-settings&msg=false&tab=inventory';				
			}
                        else if(data.module == 'credential')
			{
				window.location.href = 'admin.php?page=aiogsc-settings&msg=false&tab=credential';
			}
			}			
			return false;
		}, 'json');
	});

    var google_sheet_id = jQuery('#google_sheet_customer').val();
	
	if(google_sheet_id != undefined)
	{
		var urlParam = getUrlParameter('tab');
if(urlParam == 'customer')		
		{
var data = {
	action: 'aiogsc_RetrieveCustomerHeaders',
	google_sheet_id: google_sheet_id,
	secureKey: aiogsc_ajax_object.nonce,
};
jQuery.ajax({
	type: 'post',
	url: aiogsc_ajax_object.ajax_url,
	data: data,
	success: function (response) {
		jQuery("#bind_attribute_customer").empty().append(response.load_html);
		jQuery("#customer_mapping_header").empty().append(response.map_headers);		
	},
});
}
	}

var google_sheet_order_id = jQuery('#google_sheet_order').val();        
if(google_sheet_order_id != undefined)
{
	var urlParam = getUrlParameter('tab');	
	if(urlParam == 'order')
	{
var data = {
action: 'aiogsc_RetrieveOrderHeaders',
google_sheet_id: google_sheet_order_id,
secureKey: aiogsc_ajax_object.nonce,
};
jQuery.ajax({
type: 'post',
url: aiogsc_ajax_object.ajax_url,
data: data,
success: function (response) {
jQuery("#bind_attribute_html").empty().append(response.load_html);
jQuery("#order_maping_headers").empty().append(response.map_headers);	

},
});
}
}

var google_sheet_orderitem_id = jQuery('#google_sheet_orderitem').val();
if(google_sheet_orderitem_id != undefined)
{
        var urlParam = getUrlParameter('tab');

        if(urlParam == 'orderitem')
        {
var data = {
action: 'aiogsc_RetrieveOrderItemHeaders',
google_sheet_orderitem_id: google_sheet_orderitem_id,
secureKey: aiogsc_ajax_object.nonce,
};
jQuery.ajax({
type: 'post',
url: aiogsc_ajax_object.ajax_url,
data: data,
success: function (response) {
jQuery("#orderitembind_attribute_html").empty().append(response.load_html);
jQuery("#orderitem_maping_headers").empty().append(response.map_headers);

},
});
}
}

var google_sheet = jQuery('#google_sheet').val();

if(google_sheet != undefined)
{
        var urlParam = getUrlParameter('tab');
        if(urlParam == 'inventory')
        {	
var data = {
        action: 'aiogsc_RetrieveSheetHeaders',
        google_sheet_id: google_sheet,
		secureKey: aiogsc_ajax_object.nonce,
};
jQuery.ajax({
        type: 'post',
        url: aiogsc_ajax_object.ajax_url,
        data: data,
        success: function (response) {
                jQuery("#identity_bind_html").html(response.load_html);
                jQuery("#qty_bind_html").html(response.qty_html);
                jQuery("#inventory_map_headers").html(response.map_headers);
        },
});
}
}
      
	$( ".google_sheet_drop" ).change(function(e) {	
		var google_sheet_id = $('#google_sheet').val();		
		var data = {
			action: 'aiogsc_RetrieveSheetHeaders',
			google_sheet_id: google_sheet_id,
			secureKey: aiogsc_ajax_object.nonce,
		};		
		jQuery.ajax({
			type: 'post',
            url: aiogsc_ajax_object.ajax_url,
						
			data: data,
			success: function (response) {
				$("#identity_bind_html").html(response.load_html);		
                $("#qty_bind_html").html(response.qty_html);				
				$("#inventory_map_headers").html(response.map_headers);				

			},
		});
	});

$( ".google_sheet_order_drop" ).change(function(e) { 
	var google_sheet_id = $('#google_sheet_order').val();
	var data = {
		action: 'aiogsc_RetrieveOrderHeaders',
		google_sheet_id: google_sheet_id,
		secureKey: aiogsc_ajax_object.nonce,
	};
	jQuery.ajax({
		type: 'post',
		url: aiogsc_ajax_object.ajax_url,		
		data: data,
		success: function (response) {
			$("#bind_attribute_html").empty().append(response.load_html);
            $("#order_maping_headers").empty().append(response.map_headers);			
		},
	});
});

$( ".google_sheet_orderitem_drop" ).change(function(e) {
        var google_sheet_id = $('#google_sheet_orderitem').val();
        var data = {
                action: 'aiogsc_RetrieveOrderItemHeaders',
                google_sheet_orderitem_id: google_sheet_id,
				secureKey: aiogsc_ajax_object.nonce,
        };
        jQuery.ajax({
                type: 'post',
                url: aiogsc_ajax_object.ajax_url,				
                data: data,
                success: function (response) {
                        $("#orderitembind_attribute_html").empty().append(response.load_html);
                        $("#orderitem_maping_headers").empty().append(response.map_headers);                        
                },
        });
});
	
$( ".google_sheet_customer_drop" ).change(function(e) {
	var google_sheet_id = $('#google_sheet_customer').val();
	var data = {
		action: 'aiogsc_RetrieveCustomerHeaders',
		google_sheet_id: google_sheet_id,
		secureKey: aiogsc_ajax_object.nonce,
	};
	jQuery.ajax({
		type: 'post',
		url: aiogsc_ajax_object.ajax_url,		
		data: data,
		success: function (response) {
			$("#bind_attribute_customer").empty().append(response.load_html);
			$("#customer_mapping_header").empty().append(response.map_headers);			
		},
	});
});

	$("#insteand_synz").click(function(){
		
		var google_sheet_id = $('#google_sheet_id').val();
		var google_qty = $('#google_qty').val();	
		var google_product_identifier = $('#google_product_identifier').val();
		var data = {
			action: 'retrieveSheetValues',
			google_sheet_id: google_sheet_id,
            google_qty: google_qty,
            google_product_identifier: google_product_identifier,	
			secureKey: aiogsc_ajax_object.nonce,		
		};
		jQuery.ajax({
			type: 'post',			
			url: aiogsc_ajax_object.ajax_url,
			data: data,
			success: function (response) {				
				showSnackbar('Product Synz Successfully');				
			},
		});
	});	


	$("#debugModeSwitch").change(function(){
		var isChecked = $(this).prop("checked");
		var modemsg = isChecked ? 'ON' : 'OFF';		
		var data = {
			action: 'aiogsc_SetLogOption',  
			debugMode: isChecked,
			secureKey: aiogsc_ajax_object.nonce,
		};
		jQuery.ajax({
			type: 'post',			
			url: aiogsc_ajax_object.ajax_url,
			data: data,
			success: function (response) {				
				showSnackbar('Debug Mode is ' + modemsg);				
			},
		});
	});
	
	$("#clearlog").click(function(){
	
		var data = {
			action: 'clearlog',  	
			secureKey: aiogsc_ajax_object.nonce,
		};
		jQuery.ajax({
			type: 'post',			
			url: aiogsc_ajax_object.ajax_url,
			data: data,
			dataType: 'json', 	
			success: function (response) {				
				showSnackbar(response.msg);				
			},
		});
	});

});


//Ajax call code end

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};


function showSnackbar(errorMsg) {
	  var x = document.getElementById("snackbar");
	        x.innerHTML = errorMsg;
	        x.className = 'show';
	  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function closeNotification() {
    var notification = document.getElementById('notification');
    notification.style.display = 'none';
}


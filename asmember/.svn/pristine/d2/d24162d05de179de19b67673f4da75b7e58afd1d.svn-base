

function asverein_photos_gallery_order_vor(id,url)
{	
	jQuery.ajaxSetup({async: false});  
	jQuery.post(			
			asverein_ajaxurl.ajaxurl,
			{				
				action:'asverein-photos-gallery-order-vor',
				id:id
			},
			function(response)
			{						
				result_to=response;				
			}
			
	);
	location.href=url;
	
	
}
	
	
	

jQuery(document).ready(function()
{



	
	
	


jQuery('#button-asverein-members-import').click(function()
{
	
	var url = jQuery('#button-asverein-members-import').attr('data-first');
	var asverein_members_import_send_msg = jQuery('#asverein-members-import-send-msg').val();
	var asverein_members_import_membership_id = jQuery('#asverein-members-import-membership-id').val();
	var asverein_members_import_update 			= jQuery('#asverein-members-import-update').val();
			
	jQuery('#asverein-members-import-wrapper').html('Import wird gestartet...');
	jQuery.post(
		asverein_ajaxurl.ajaxurl,
		{
			action:'asverein-members-import-file',
			url:url,
			asverein_members_import_membership_id:asverein_members_import_membership_id,
			asverein_members_import_send_msg:asverein_members_import_send_msg,
			asverein_members_import_update:asverein_members_import_update
		},
		function(response){jQuery('#asverein-members-import-wrapper').html(response);}
	);
	
});






jQuery('#button-asverein-protokoll-view').click(function()
{
	//var fenster = window.open("/wp-content/plugins/asverein/admin/protokoll-view.html", "_blank", "toolbar=no,scrollbars=no,top=100,left=100,width=400,height=400");
	var fenster = window.open("", "_blank", "toolbar=no,scrollbars=yes,top=100,left=100,width=1000,height=800");

	
	var id= jQuery('#asverein-protokoll-view-id').val();
	
	jQuery.ajaxSetup({async: false});  

	jQuery.post(
			
			asverein_ajaxurl.ajaxurl,
			{				
				action:'asverein-protokoll-view',
				id:id
			},
			function(response)
			{
						
				result_to=response;
				//jQuery('#asverein-newsletter-send-wrapper').html('<br>Anzahl Empf&auml;nger: '+result_to);
				fenster.document.write(response);
				
			}
			
	);
	
	
	

	
})

jQuery('#asverein-newsletter-send-button').click(function()
{
	
	//var id= jQuery('#button-asaffili-import-file2').attr('data-first');
	var id= jQuery('#asverein-newsletter-send-id').val();
	var step= jQuery('#asverein-newsletter-step').val();
	var url=jQuery('#temp_asverein_url').val();
	var wrapper_ausgabe="";
	var start=1;
	var result_count=0;
	var result_to=0;
	var result_send=0;
	
	var stat_gesamt=0;
	var stat_insert=0;
	var stat_update=0;
	
	var abbruch=0;
	var max=0;
	
	/*
	jQuery('#asverein-newsletter-send-wrapper').html('<img src="/wp-content/plugins/asaffili/assets/images/loader.gif"/>');
	*/
	
	
	jQuery.ajaxSetup({async: false});  

	jQuery.post(
			
			asverein_ajaxurl.ajaxurl,
			{				
				action:'asverein-newsletter-send-new',
				id:id
			},
			function(response)
			{
						
				result_to=response;
				jQuery('#asverein-newsletter-send-wrapper').html('<br>Anzahl Empf&auml;nger: '+result_to);
			}
			
	);


	jQuery.post(
			
		asverein_ajaxurl.ajaxurl,
		{				
			action:'asverein-newsletter-send-step',
			id:id,
			step:step
		},
		function(response)
		{							
			result_count=parseInt(response);
			result_send=result_count;
			jQuery('#asverein-newsletter-send-wrapper').append('<br>Anzahl gesendet: '+result_send+' von '+result_to);
		}
			
	);
	
	
	while(result_count>0 && max<1000)
	{
		jQuery.post(
			
			asverein_ajaxurl.ajaxurl,
			{				
				action:'asverein-newsletter-send-step',
				id:id,
				step:step
			},
			function(response)
			{							
				result_count=parseInt(response);
				result_send=result_send+parseInt(response);
				jQuery('#asverein-newsletter-send-wrapper').html('<br>Anzahl Empf&auml;nger: '+result_to);
				jQuery('#asverein-newsletter-send-wrapper').append('<br>Anzahl gesendet: '+result_send+' von '+result_to);
			}
			
		);
		
		max=max+1;
		
	}
	
	jQuery.post(
			
		asverein_ajaxurl.ajaxurl,
		{				
			action:'asverein-newsletter-send-end',
			id:id,
			anzahl:result_send
		},
		function(response)
		{	
			location.href=url;						
		}
			
	);
	
	
	
	
	
});




	
jQuery('#asverein-newsletter-test-button').on("click",function()
{
	//var id= jQuery('#button-asaffili-set-import').attr('data-first');
	
	var id= jQuery('#asverein-newsletter-test-id').val();
	var email=jQuery('#asverein-newsletter-test-email').val();
	
	
	
	jQuery.ajax({
        type: "POST",
        async: "false",
        url: asverein_ajaxurl.ajaxurl,
        data: {action:'asverein-newsletter-test',
				id:id,
				email:email},
        	success: function (data, textStatus, XMLHttpRequest)
        	{
            	alert("Erfolg"+data);
            	
        	},
        	error: function (XMLHttpRequest, textStatus, errorThrown) {
            	alert("Fehler 123"+errorThrown);
        	}
        
    
	});
    

});



	

	
jQuery('#button-asverein-members-payment').click(function()
{
	var id= jQuery('#button-asverein-members-payment').attr('data-first');
	
	
	jQuery('#asverein-members-payment-wrapper').html('Anlegen begonnen');
	
	jQuery.post(
		asverein_ajaxurl.ajaxurl,
		{
			action:'asverein-members-payment',
			id:id
		},
		function(response)
		{
			jQuery('#asverein-members-payment-wrapper').html(response);
			
		}
	);
	
});



jQuery('#button-asverein-paten-form-delete').click(function()
{
	var id=jQuery('#temp-asverein-paten-form-delete-id').val();
	var url=jQuery('#temp-asverein-url').val();
	
	
	jQuery.post(
		asverein_paten_ajaxurl.ajaxurl,
		{
			action:'asverein-paten-del',
			id:id,			
		},
		function(response)
		{
			jQuery('#asverein-paten-new-wrapper').html(response);
			location.href=url;
		}
	);
	
	
})





jQuery('#button-asverein-paten-insert-payment').click(function()
{
	var id=jQuery('#temp-asverein-paten-form-delete-id').val();
	var url=jQuery('#temp-asverein-url').val();
	
	
	jQuery.post(
		asverein_paten_ajaxurl.ajaxurl,
		{
			action:'asverein-paten-insert-payment',
			id:id,			
		},
		function(response)
		{
			jQuery('#asverein-paten-list-wrapper').html(response);
			location.href=url;
		}
	);
	
	
})



	

	
jQuery('#button-asverein-paten-new-save').click(function()
{
	var pate_id=jQuery('#asverein-paten-new-pate-id').val();
	var user_id=jQuery('#asverein-paten-new-user-id option:selected').val();
	var user_str=jQuery('#asverein-paten-new-user-id option:selected').text();
	
	var betrag=jQuery('#asverein-paten-new-betrag').val();
	
	var betrag_period = jQuery('#asverein-paten-new-betrag-period').val();
	
	var period=jQuery('#asverein-paten-new-period option:selected').val();
	
	var payment_ab=		jQuery('#asverein-paten-new-payment-ab').val();
	var datum_erstell=	jQuery('#asverein-paten-new-datum-erstell').val();
	
	var url=jQuery('#temp-asverein-url').val();
		
	jQuery('#asverein-paten-new-wrapper').html(betrag);
	
		
	
	jQuery('#asverein-paten-new-wrapper').html('Anlegen begonnen');
	
	jQuery.post(
		asverein_paten_ajaxurl.ajaxurl,
		{
			action:'asverein-paten-new',
			user_id:user_id,
			user_str:user_str,
			pate_id:pate_id,
			betrag:betrag,
			betrag_period:betrag_period,
			period:period,
			payment_ab:payment_ab,
			datum_erstell:datum_erstell
		},
		function(response)
		{
			jQuery('#asverein-paten-new-wrapper').html(response);
			location.href=url;
		}
	);
	
});


});
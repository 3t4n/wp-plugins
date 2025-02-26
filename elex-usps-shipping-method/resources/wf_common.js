

jQuery(document).ready(function(){


	jQuery('#woocommerce_wf_shipping_usps_availability').change(function()
	{
		var value =document.getElementById("woocommerce_wf_shipping_usps_availability").value;
		if (value === "specific") {
			jQuery('#woocommerce_wf_shipping_usps_countries').closest('tr').show();
		} else {
			jQuery('#woocommerce_wf_shipping_usps_countries').closest('tr').hide();
		}
	});
	jQuery("#woocommerce_wf_shipping_usps_usps_est_delivery").change(function () {
		if (
		  document.getElementById("woocommerce_wf_shipping_usps_usps_est_delivery")
			.checked
		) {
		  jQuery("#woocommerce_wf_shipping_usps_usps_cut_off_time")
			.closest("tr")
			.show();
		  jQuery("#woocommerce_wf_shipping_usps_usps_working_days")
			.closest("tr")
			.show();
			jQuery("#woocommerce_wf_shipping_usps_usps_lead_time")
			.closest("tr")
			.show();
		} else {
		  jQuery("#woocommerce_wf_shipping_usps_usps_cut_off_time")
			.closest("tr")
			.hide();
		  jQuery("#woocommerce_wf_shipping_usps_usps_working_days")
			.closest("tr")
			.hide();
			jQuery("#woocommerce_wf_shipping_usps_usps_lead_time")
			.closest("tr")
			.hide();
		}
	  });
	  
	jQuery(window).on('load',function () {
		const val = document.getElementById(
		  "woocommerce_wf_shipping_usps_api_mode"
		).value;
		if(val=='old_api'){
		  jQuery(document).find(".new_api_field").closest("tr").hide();
		  jQuery(document).find(".old_api_field").closest("tr").show();
		}else{
		  jQuery(document).find(".new_api_field").closest("tr").show();
		  jQuery(document).find(".old_api_field").closest("tr").hide();
		}

		jQuery(".tab_general").on("click",function(){
			var value = jQuery('#woocommerce_wf_shipping_usps_api_mode').val();
			  if (value === "new_api") {
				  jQuery(document).find(".new_api_field").closest("tr").show();
				  jQuery(document).find(".old_api_field").closest("tr").hide();	
				  			 
			  } else {
				  jQuery(document).find(".new_api_field").closest("tr").hide();
				  jQuery(document).find(".old_api_field").closest("tr").show();
			  }


		});
		jQuery(".tab_rates").on("click",function(){
			var value = jQuery('#woocommerce_wf_shipping_usps_api_mode').val();
			  if (value === "new_api") {
				jQuery(document).find(".new_api_rates").closest("tr").show();
				jQuery(document).find(".old_api_rates").closest("tr").hide();
				jQuery(document).find(".old_api_rates").hide();
				jQuery(document).find(".new_api_rates").show();
	  
			  } else {
				jQuery(document).find(".new_api_rates").closest("tr").hide();
				jQuery(document).find(".old_api_rates").closest("tr").show();
				jQuery(document).find(".old_api_rates").show();
				jQuery(document).find(".new_api_rates").hide();

			  }

			  if (
				document.getElementById("woocommerce_wf_shipping_usps_usps_est_delivery")
				  .checked && value === "new_api"
			  ) {
				jQuery("#woocommerce_wf_shipping_usps_usps_cut_off_time")
				  .closest("tr")
				  .show();
				jQuery("#woocommerce_wf_shipping_usps_usps_working_days")
				  .closest("tr")
				  .show();
				  jQuery("#woocommerce_wf_shipping_usps_usps_lead_time")
					.closest("tr")
					.show();
			  } else {
				jQuery("#woocommerce_wf_shipping_usps_usps_cut_off_time")
				  .closest("tr")
				  .hide();
				jQuery("#woocommerce_wf_shipping_usps_usps_working_days")
				  .closest("tr")
				  .hide();
				  jQuery("#woocommerce_wf_shipping_usps_usps_lead_time")
					.closest("tr")
					.hide();
			  }
		});
	  });

	jQuery("#woocommerce_wf_shipping_usps_api_mode").change(function () {
		var value = document.getElementById(
		  "woocommerce_wf_shipping_usps_api_mode"
		).value;
		if (value == "new_api") {
			jQuery(document).find(".new_api_field").closest("tr").show();
			jQuery(document).find(".old_api_field").closest("tr").hide();

		} else {
			jQuery(document).find(".new_api_field").closest("tr").hide();
			jQuery(document).find(".old_api_field").closest("tr").show();

		}
	  });
	  
});


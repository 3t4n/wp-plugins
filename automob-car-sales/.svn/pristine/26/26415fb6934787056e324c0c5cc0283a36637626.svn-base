function am_show_interested_form ($,status) 
{
	$("#am-ajax-result").hide();
	if (status==true) {
		$("#am-dim-background,#car-item-form").fadeIn();	
	}else if (status==false) {
		$("#am-dim-background,#car-item-form").fadeOut();
	}

}

function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}
Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
    var n = this,
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
        decSeparator = decSeparator == undefined ? "." : decSeparator,
        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
        sign = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
};

function getFormattedDistance(value){
	return Number(value).formatMoney(0, am_settings.thousands_separater,am_settings.decimal_separater)+''+am_settings.distance_unit;
}

function getFormattedMoney(value){
	return am_settings.currency_symbol+""+Number(value).formatMoney(2, am_settings.thousands_separater,am_settings.decimal_separater);
}
function getFormatted(value,type){
	if (type=="distance")
	{
		return getFormattedDistance(value);

	}else if (type=="currency")
	{
		return getFormattedMoney(value);
	}else{
		return value;
	}
}



jQuery( document ).ready(function($) {
	 $('#automob-search-form select').select2();
	$('#automob-search-form input[type="range"]').rangeslider({
	    polyfill : false,
	    onInit : function() { 
	    	console.log();
	        this.output = $( '<div class="range-output" />' ).insertAfter( this.$range ).html( getFormatted(this.$element.val(),$(this.$element).attr('value-type')));
	    },
	    onSlide : function( position, value ) {
	        this.output.html(getFormatted(value,$(this.$element).attr('value-type')));
	    }
	});
    

	$('.automob-contact-form').submit(function(event) {
		$("#am-ajax-spinner").show();
		$('.automob-contact-form input[type="submit"]').hide();
		event.preventDefault();

		
        $.ajax({
            url: amSearchParams.ajaxurl,
            dataType:'json',
			type: 'post',
			data: $('.automob-contact-form').serialize(),
		})
		.done(function($result) {
			if ($result.status=="success")
			{
				$("#am-ajax-result").html('Email sent successfully!');
				$("#am-ajax-result").css("color","green");
				$("#am-ajax-result").show();
				$('.automob-contact-form').trigger('reset');

			}else{
				$("#am-ajax-result").html('Email NOT sent successfully!');
				$("#am-ajax-result").css("color","red");
				$("#am-ajax-result").show();
			}
		})
		.fail(function() {
				$("#am-ajax-result").html('Email NOT sent successfully!');
				$("#am-ajax-result").css("color","red");
				$("#am-ajax-result").show();
				$('.automob-contact-form input[type="submit"]').show();
		})
		.always(function() {
			$("#am-ajax-spinner").hide();
			// $('.automob-contact-form input[type="submit"]').show();
		});
		return false;

		// $.ajax({
		// 	url: '/path/to/file',
		// 	type: 'default GET (Other values: POST)',
		// 	dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		// 	data: {param1: 'value1'},
		// })
		// .done(function() {
		// 	console.log("success");
		// })
		// .fail(function() {
		// 	console.log("error");
		// })
		// .always(function() {
		// 	console.log("complete");
		// });
		

	});


    $("body").on("input propertychange", "#am-sorting select", function(event) {
        location.href=updateQueryStringParameter(location.href,"order_dir",$("#am-direction").val());
    });
    
	$("a#am-iam-intrested").click(function(event) {
		event.preventDefault();
		am_show_interested_form($,true);
	});

	$("a#am-reset-form").click(function(event) {
		// event.preventDefault();
		$("#automob-search-form #model_year").val($("#automob-search-form #model_year").attr('min')).change();
		$("#automob-search-form #asking_price").val($("#automob-search-form #asking_price").attr('max')).change();
		$("#automob-search-form #mileage").val($("#automob-search-form #mileage").attr('max')).change();
	});

	

	$("#am-close-form,#am-dim-background").click(function(event) {
		event.preventDefault();
		am_show_interested_form($,false);
	});
		/* This is basic - uses default settings */
		
	$("a.grouped_elements").fancybox();
		/* Apply fancybox to multiple items */
		
		$("a.group").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});
	});

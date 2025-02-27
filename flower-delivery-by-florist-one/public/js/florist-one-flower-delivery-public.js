(function( $ ) {
	'use strict';

var ajaxurl = ajax_object.ajax_url;
var historyBool = false;
var additionalUrlParams = {};

$(window).ready(function() {

  //text size control          
  var originalSize = $('.bootstrap-fhws-obituaries-container').css('font-size');
  var $sizeCtrl = $(".f1fd-size-ctl");
  $sizeCtrl.on('click' , function(e){      
    $sizeCtrl.removeClass('active'); 
    $(this).addClass('active');
    window.localStorage.setItem('fhwstextsize', $(this).index('.f1fd-size-ctl'));  
    switch($(this).attr('id')) {
      case "f1fd-text-size-base":
        var f1FdSize = originalSize;
        break;
      case "f1fd-text-size-zoom1":
        var f1FdSize = '18px';
        break;
      case "f1fd-text-size-zoom2":
        var f1FdSize = '20px';
        break;
    }
    $('.bootstrap-fhws-obituaries-container').css('font-size', f1FdSize);    
  });
  
  /*get cart count*/
  var data = {
	'action': 'getCartCount',
	'random' : Math.random()
  };

   jQuery.post(ajaxurl, data, function(response, status){ 
	  jQuery("#florist-one-cart-count").text(response);
   },"html");

  // set session variables for prepopulations
  var data = {
		'action': 'setFlowerSessionData',
		'facility_id': $("#florist-one-flower-delivery-facility-id").val(),
		'florist-one-flower-delivery-delivery-date' : $("#florist-one-flower-delivery-delivery-date").val(),
		'random' : Math.random()
	};
  	
	 var localStorageData = JSON.parse(window.localStorage.getItem('chekoutInfo'));
	 if (localStorageData != null) {
	   console.log("ls:true");
	
     var data = {
		'action': 'setFlowerSessionData',
		'facility_id': $("#florist-one-flower-delivery-facility-id").val(),
		'florist-one-flower-delivery-delivery-date' : $("#florist-one-flower-delivery-delivery-date").val(),
		'random' : Math.random()
	};
  
   }
  //display checkout stored values
	jQuery.post(ajaxurl,data);

  //modal
  $('.bootstrap-fhws-obituaries-container-1').appendTo("body");
  $('.fhws-modal').on("click",function(event){
    $(event.target).modal('hide');
  }); 
  $('.fhws-modal-dialog').draggable();
  
  $('#florist-one-flower-delivery-view-modal').on('shown.bs.modal', function (event) {
     if ( $('.checkout-form').is(':visible')){
        $('#florist-one-continue-shopping-arrow').hide();
      } else {
        $('#florist-one-continue-shopping-arrow').show();
      }
  
  });

	$('#florist-one-flower-delivery-view-modal').on('show.bs.modal', function (event) {
      var $modal = $('#florist-one-flower-delivery-view-modal');
    
      $modal.find('.modal-body').html("");
      $modal.find('.modal-header-text').html('').text(event.relatedTarget.text);
    
      if($(event.relatedTarget).hasClass('florist-one-flower-delivery-menu-cart-button') || $(event.relatedTarget).hasClass('florist-one-flower-delivery-add-to-cart')){
        $('.modal-header-text').html(jQuery('.florist-one-flower-delivery-menu-cart-button p').text());
      }
      
      if ( $('.checkout-form').is(':visible')){
        $('#florist-one-flower-delivery-view-modal-close').hide();
      
      } else {
        $('#florist-one-flower-delivery-view-modal-close').show();
        $('#florist-one-continue-shopping-arrow').show();
      }
  });
  
  $('#florist-one-flower-delivery-view-modal').on('hide.bs.modal', function (event) {
    if($('.checkout-form').is(':visible')){
      getCheckout(); 
    }
  });

	if($(".florist-one-flower-delivery-menu").get(0)){
       
		var pagetitle = $(document).find("title").text();

		// capture additional url params
		if (getUrlParameter('nam')){
			additionalUrlParams.name = getUrlParameter('nam');
			$(".florist-one-flower-delivery-deceased-display-name").html('<h3>Send Flowers for <span id="florist-one-flower-delivery-deceased-display-name-title">' + additionalUrlParams.name + '</span></h3>');
		}
		if (getUrlParameter('loc')){ additionalUrlParams.location = getUrlParameter('loc'); }
		if (getUrlParameter('ins')){ additionalUrlParams.institution = getUrlParameter('ins'); }
		if (getUrlParameter('ad1')){ additionalUrlParams.address1 = getUrlParameter('ad1'); }
		if (getUrlParameter('ad2')){ additionalUrlParams.address2 = getUrlParameter('ad2'); }
		if (getUrlParameter('cit')){ additionalUrlParams.city = getUrlParameter('cit'); }
		if (getUrlParameter('sta')){ additionalUrlParams.state = getUrlParameter('sta'); }
		if (getUrlParameter('cou')){ additionalUrlParams.country = getUrlParameter('cou'); }
		if (getUrlParameter('zip')){ additionalUrlParams.zip = getUrlParameter('zip'); }
		if (getUrlParameter('pho')){ additionalUrlParams.phone = getUrlParameter('pho'); }
		if (getUrlParameter('pic')){
			additionalUrlParams.picture = getUrlParameter('pic');
			$(".florist-one-flower-delivery-deceased-display-photo").html('<img src="' + additionalUrlParams.picture + '" />');
		}

		if (getUrlParameter('viewitem')){
			var data = {
		    'action' : 'getProduct',
		    'code' : getUrlParameter('viewitem'),
				'random' : Math.random()
		  };
		}
		else if (getUrlParameter('buyitem')){
			historyBool = true;
			var data = {
		    'action' : 'addToCart',
		    'code' : getUrlParameter('buyitem'),
				'random' : Math.random()
			};
		}
		else if ($(".florist-one-flower-delivery-container").attr("data-def_cat")){
		
			if ($(".florist-one-flower-delivery-container").attr("data-def_cat") != 'cart'){
				var data = {
					'action' : 'getProducts',
					'category' : $(".florist-one-flower-delivery-container").attr("data-def_cat"),
					'page' : 1,
					'additionalUrlParams': (jQuery.isEmptyObject(additionalUrlParams)) ? null : additionalUrlParams,
					'random' : Math.random()
				};
			}
			else{
				var data = {
					'action' : 'getCart',
					'random' : Math.random()
				};
			}
		}
		else if (getUrlParameter('revieworder')){
			historyBool = true;
			var data = {
				'action' : 'checkout',
				'page' : 4,
				'random' : Math.random()
			};
		}
		else if (getUrlParameter('orderno')){
			checkout(5, new Array({name:"orderno", value:getUrlParameter('orderno')}) );
		}
		else{
			
			var $plantTrees = $('.florist-one-flower-delivery-menu-plant-a-tree-link');
			if(getUrlParameter('show')){
				var showTrees = false;
				if(getUrlParameter('show') == "trees"){
					$plantTrees.attr('data-category', 'pt_show' );
				}
				if(getUrlParameter('show') == "flowers"){
					$plantTrees.attr('data-category', 'pt');
				}
			}
            if ($plantTrees.attr('data-category') == "pt_show" ){	
            	
                var data = {
                    'action' : 'getTree',
                    'code' : 'TREES',
                    'lovedone' : ($("#florist-one-flower-delivery-deceased-display-name-title").text() == "" || !$("#florist-one-flower-delivery-deceased-display-name-title").is(":visible")) ? "" : $("#florist-one-flower-delivery-deceased-display-name-title").text(),
                    'random' : Math.random()
                    
                };
            } else {
            
                var data = {
                    'action' : 'getProducts',
                    'category' : ( ( $(".florist-one-flower-delivery-container").attr("data-def_cat") ) ? $(".florist-one-flower-delivery-container").attr("data-def_cat") : 'default' ),
                    'page' : 1,
                    'additionalUrlParams': (jQuery.isEmptyObject(additionalUrlParams)) ? null : additionalUrlParams,
                    'random' : Math.random()
                };
            }
            
		}
		History.pushState(data, pagetitle, "");
	}
	
  var localStorageTextSize = JSON.parse(window.localStorage.getItem('fhwstextsize'));
  if (localStorageTextSize != null) {
    $('.f1fd-size-ctl').eq(localStorage.getItem("fhwstextsize")).click();
  }
	
});

$(document).on("change","#florist-one-flower-delivery-customer-country", function(e) {

  var d = '#florist-one-flower-delivery-customer-state';
  var pc = '#florist-one-flower-delivery-customer-postal-code';
  function _x(e,s,d){
    var c = 'fhws-hide-state';
    var t = $("." + e);
    t.removeClass(c);
    if (s == "hide"){t.addClass(c)}
    $(d).val(''); $(pc).val('');
  }
  switch(this.value) {
    case "CA":
      _x("fhws-country-ca","show",d);_x("fhws-country-us","hide",d);
      $(d).prop("disabled", false); $(pc).prop("disabled", false);
      $(d).prev().text('Province*')
      $(pc).attr("placeholder", "Postal Code*").prev().text('Postal Code*');
      $(d + ' option:first').html('&#8212; Select &#8212;');
      
      break;
    case "US":
      _x("fhws-country-ca","hide",d);_x("fhws-country-us","show",d);
      $(d).prop("disabled", false); $(pc).prop("disabled", false);
      $(d).prev().text('State*')
      $(pc).attr("placeholder", "Zip Code*").prev().text('Zip Code*');
      $(d + ' option:first').html('&#8212; Select &#8212;');
      break;
    default:
      _x("fhws-country-ca","hide");_x("fhws-country-us","hide");
      $(d).prop("disabled", true);
      $(d).val('');
      if ($(d).next().hasClass('alert-danger')){
        $(d).next().remove();
      }
      if ($(pc).next().hasClass('alert-danger')){
        $(pc).next().remove();
      }
      $(pc).prop("disabled", false);
      $(d).prev().text('State');
      $(pc).attr("placeholder", "Postal Code").prev().text('Postal Code');
      $(d + ' option:first').html('&#8212; Not Required &#8212;');
  }
  
});


$(document).on("change", "input[name='florist-one-flower-delivery-plant-a-tree-select-from-number']", function(e){

    var $a = $(this);
    var $button = $('#plant-a-tree-add-to-cart1');
    var price = parseInt($a.attr("data-price")).toFixed(2);
    $button.attr('data-price',$a.attr("data-price")).attr('data-number', $a.val()).attr('data-name', $a.attr("data-name")).attr('data-code', $a.attr("data-name"));
    $('.florist-one-flower-delivery-single-product-price').text("$" + price);

});

function selectYourOwnTreeCalc(amount, number, calc , minTrees){

    var totalPrice = (amount !=null)? (Math.round(amount * 100) / 100).toFixed(2) : '';
    var getPrice = $('.florist-one-flower-delivery-plant-a-tree-select-your-own-price').text();
    var pricePresent = isNaN(getPrice);
    var $container =  $('#fws-trees-calculate-msg');
    var $addToCart = '<svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="currentColor" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>';
    var min = '<div class="alert alert-danger lh-base" role="alert">We’re sorry but the minimum number of trees that can be planted is ' +  minTrees + '</div>';
    var useModal = ($('#florist-one-flower-delivery-view-modal').hasClass('show')) ? "" : 'data-bs-toggle="modal"';
    var price =' <p class="fs-5 florist-one-flower-delivery-plant-a-tree-select-your-own-price">$' + totalPrice + '</p>' +
                '<button type="button" data-checkout="show" href="#" class="f1fd_primary florist-one-flower-delivery-add-to-cart btn mt-3" ' + useModal +' data-bs-target="#florist-one-flower-delivery-view-modal" id="plant-a-tree-add-to-cart2">Add To Cart ' + $addToCart +'</button>'
    var msg = (number < parseInt(minTrees)) ? min : (calc)? price: (pricePresent)? getPrice : '';
    $container.html(msg);

    if (calc){

        $('#plant-a-tree-add-to-cart2').attr('data-number',number)
            .attr('data-price', amount)
            .attr('data-name',  'Plant ' + number + " Trees")
            .attr('data-code',  'Plant ' + number + " Trees");

    }

}

$(document).on("input", "#florist-one-flower-delivery-plant-a-tree-select-your-own", function(e){
    
});

$(document).on("click", ".florist-one-flower-delivery-plant-a-tree-select-your-own-calculate", function(e){
    e.preventDefault();
    var valInput = $('#florist-one-flower-delivery-plant-a-tree-select-your-own');  
    var minTrees = valInput.attr('min');
    var trees = parseInt(valInput.val().trim());
    if (isNaN(trees) || trees < minTrees){
        valInput.focus();
        selectYourOwnTreeCalc(null,this.value,false,minTrees);
    } else {
      var data = {
        'action': 'getTreesTotal',
        'code': "TREES",
        'number': trees,
        'price': null,
        'random' : Math.random()
      };
      
	  jQuery.post(ajaxurl, data, function(response, status){ 
	  console.log(data);
	  console.log(response);
		selectYourOwnTreeCalc(response, trees, true, minTrees);
	   }, "html");
    }
    History.pushState(data, "", "");
    
    
});

$(document).on("click", "a.florist-one-flower-delivery-menu-link", function(e){

	e.preventDefault();
	
		document.getElementById('florist-one-flower-delivery-menu').scrollIntoView(false);
      
  var data = {
      'action' : 'getProducts',
      'category' : $(this).attr("data-category"),
      'page' : $(this).attr("data-page"),
      'additionalUrlParams': (jQuery.isEmptyObject(additionalUrlParams)) ? null : additionalUrlParams
  };

  History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-menu-plant-a-tree-link", function(e){

	if ( $(this).attr("href") == '#' ){
		e.preventDefault();
		document.getElementById('florist-one-flower-delivery-menu').scrollIntoView(false);
	  var data = {
	    'action' : 'getTree',
	    'code' : "TREES",
	    'lovedone' : ($("#florist-one-flower-delivery-deceased-display-name-title").text() == "" || !$("#florist-one-flower-delivery-deceased-display-name-title").is(":visible")) ? "" : $("#florist-one-flower-delivery-deceased-display-name-title").text(),
	    'random' : Math.random()
	  };
	  History.pushState(data, "", "");
	}
});

$(document).on("click", ".florist-one-flower-delivery-menu-link-more", function(e){

	e.preventDefault();
	
  var data = {
      'action' : 'getProductsMore',
      'category' : $(this).attr("data-category"),
      'page' : $(this).attr("data-current-page"),
      'random' : Math.random()
  };
  
 
  if(parseInt($(this).attr("data-current-page")) == parseInt($(this).attr("data-pages"))){
  
    $(this).remove();
  }
   $(this).attr("data-current-page", parseInt($(this).attr("data-current-page")) + 1);
  History.pushState(data, "", "");
  
});

$(document).on("click", ".florist-one-flower-delivery-many-products-single-product", function(e){
	if ( $(this).attr("href") == '#' ){
		e.preventDefault();
		
		var thisCode = $(this).attr("data-code");
		
	  var data = {
	    'action' : (thisCode == "TREES")? 'getTree' : 'getProduct',
	    'code' : thisCode,
	    'random' : Math.random()
	  };
	  History.pushState(data, "", "");
	}
});


$(document).on("click", ".florist-one-flower-delivery-add-to-cart", function(e){

	if ( $(this).attr("href") == '#' ){
	
	  $(".fhw-add-to-cart-msg").remove();
		historyBool = true;
		e.preventDefault();
		
       var data = {
        'action' : 'addToCart',
        'code' :  $(this).attr("data-code"),
        'num' : ($('#fws-add-to-cart-amount').is(":visible")) ?  $('#fws-add-to-cart-amount').val() : 1,
        'random' : Math.random()
	  	
	  	};
		History.pushState(data, "", ""); 
	}
});

$(document).on("click", ".florist-one-flower-delivery-menu-cart-button", function(e){
	e.preventDefault();
	//checkout
  var data = {
    'action' : 'getCart',
    'code' : null,
    'random' : Math.random()
  };
  History.pushState(data, "", "");
  
});

$(document).on("click", "a.florist-one-flower-delivery-cart-remove-item", function(e){
	e.preventDefault();
	removeFromCart($(this).attr("data-code"));
});

$(document).on("click", "a.florist-one-flower-delivery-menu-customer-service-link", function(e){
	e.preventDefault();
  var data = {
    'action' : 'getCustomerService',
    'random' : Math.random()
  };
  History.pushState(data, "", "");
});

$(document).on("click", "a.florist-one-flower-delivery-checkout-process-order", function(e){
	e.preventDefault();
	processOrder();
});

$(document).on("focusout", ".checkout-form" , function(e){

  var key = e.target.name;
  var value = e.target.value;
  
  if(e.target.name == "florist-one-flower-delivery-tree-certificate"){
  
      //store checkout in local storage
      var checkoutInput = (JSON.parse(window.localStorage.getItem('chekoutInfo')) == null)? {} : JSON.parse(window.localStorage.getItem('chekoutInfo'));
      checkoutInput[key] = value;
      window.localStorage.setItem('chekoutInfo', JSON.stringify(checkoutInput));
 
  } else {
    // validate and store value in local storage
    var validator = $( ".checkout-form" ).validate();
    validator.element( "#" + key );
 
    var validator = $(".checkout-form").data('validator');
    if(validator.check("#" + key)){
          
      //store checkout in local storage
      var checkoutInput = (JSON.parse(window.localStorage.getItem('chekoutInfo')) == null)? {} : JSON.parse(window.localStorage.getItem('chekoutInfo'));
      checkoutInput[key] = value;
      window.localStorage.setItem('chekoutInfo', JSON.stringify(checkoutInput));
     
    } 
  }

});

$(document).on("click", ".checkout-form-continue-next-step" , function(e){
  e.preventDefault();
	$(".checkout-form").submit();

})

$(document).on("click", ".florist-one-flower-delivery-checkout", function(e){
 
	e.preventDefault();
	document.getElementById('florist-one-flower-delivery-menu').scrollIntoView(false);
	
	var dataCheckout = {
      'action': 'setFlowerSessionData',
      'name': $("#florist-one-flower-delivery-recipient-name").val(),
      'florist-one-flower-delivery-delivery-date' : $("#florist-one-flower-delivery-delivery-date").val(),
      'facility_id': $("#florist-one-flower-delivery-facility-id").val(),
      'random' : Math.random()
		};
    
    var localStorageData = JSON.parse(window.localStorage.getItem('chekoutInfo'));
    if (localStorageData != null) {
      jQuery.each(localStorageData, function( key, value ) {
        dataCheckout[key] = value; 
      });
    }
    
    jQuery.post(ajaxurl,dataCheckout);
	
    var data = {
      'action' : 'checkout',
      'page' : 4,
      'validated'  : null,
      'formdata' : dataCheckout,
      'random' : Math.random()
      
    };
    History.pushState(data, "", "");
});

$(document).on("click","a.florist-one-flower-delivery-checkout-continue-checkout", function(e){
	historyBool = true;
	e.preventDefault();
	var page = $(".florist-one-flower-delivery-checkout-page").val();
	var data = {
		'action' : 'continue-checkout-' + page,
		'page' : page,
		'random' : Math.random()
	};
	History.pushState(data, "", "");
});

$(document).on("click", ".child_window_closed", function(e){
	e.preventDefault();

  //check order & redirect user accordingly
	var data = {
		'action': 'checkOrder',
		'orderno': $(".child_window_closed").val()
	};

	jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

});

$(document).on("keydown","#florist-one-flower-delivery-tree-certificate-sender-display-name, #florist-one-flower-delivery-tree-certificate-name-of-loved-one", function(e) {

  if($(this).length < 59){
    $(this).val($(this).val().substring(0,59));
  }
 
});

var processOrder = function(){

		var data = {
			'action': 'processOrder'
		};

		jQuery.post(ajaxurl, data, function(response, status){
			if ( typeof response.errors !== 'undefined' ) {

				if (response.errors.length > 0){
					$(".florist-one-flower-delivery-review-error-message").css("display","block");
				}

				for(var i=0;i<response.errors.length;i++){
	        if (response.errors[i].substr(0, 21) == 'invalid delivery date'){
	          jQuery(".florist-one-flower-delivery-review-delivery-date").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 11) == 'cardmessage'){
	          jQuery(".florist-one-flower-delivery-review-card-message").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 19) == 'specialinstructions'){
	          jQuery(".florist-one-flower-delivery-review-special-instructions").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'recipient name'){
	          jQuery(".florist-one-flower-delivery-review-recipient-name").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 21) == 'recipient institution'){
	          jQuery(".florist-one-flower-delivery-review-recipient-institution").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 18) == 'recipient address1'){
	          jQuery(".florist-one-flower-delivery-review-recipient-address-1").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 18) == 'recipient address2'){
	          jQuery(".florist-one-flower-delivery-review-recipient-address-2").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'recipient city'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 15) == 'recipient state'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'recipient country'){
	          jQuery(".florist-one-flower-delivery-review-recipient-country").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 15) == 'recipient phone'){
	          jQuery(".florist-one-flower-delivery-review-recipient-phone").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'recipient zipcode'){
	          jQuery(".florist-one-flower-delivery-review-recipient-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 13) == 'customer name'){
	          jQuery(".florist-one-flower-delivery-review-customer-name").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'customer address1'){
	          jQuery(".florist-one-flower-delivery-review-customer-address-1").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 17) == 'customer address2'){
	          jQuery(".florist-one-flower-delivery-review-customer-address-2").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 13) == 'customer city'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer state'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 16) == 'customer country'){
	          jQuery(".florist-one-flower-delivery-review-customer-country").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer phone'){
	          jQuery(".florist-one-flower-delivery-review-customer-phone").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 16) == 'customer zipcode'){
	          jQuery(".florist-one-flower-delivery-review-customer-city").css("color", "red");
	        }
	        else if (response.errors[i].substr(0, 14) == 'customer email'){
	          jQuery(".florist-one-flower-delivery-review-customer-email").css("color", "red");
	        }
					else if (
						response.errors[i] == 'credit card number is required' ||
						response.errors[i] == 'invalid card for american express' ||
						response.errors[i] == 'invalid card for visa, discovery, or mastercard'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-card-number").css("color", "red");
					}
					else if (
						response.errors[i] == 'credit card failure'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card").css("color", "red");
					}
					else if (
						response.errors[i] == 'security code is required'  ||
						response.errors[i] == 'invalid security code for american express' ||
						response.errors[i] == 'invalid security code for visa, discovery, or mastercard'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-cvv2").css("color", "red");
					}
					else if (
						response.errors[i] == 'invalid expiration year' ||
						response.errors[i] == 'invalid expiration month' ||
						response.errors[i] == 'credit card expiration month is required' ||
						response.errors[i] == 'credit card expiration year is required'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-expiration").css("color", "red");
					}
					else if (
						response.errors[i] == 'invalid credit card type' ||
						response.errors[i] == 'credit card type is required'
					){
						jQuery(".florist-one-flower-delivery-review-credit-card-card-type").css("color", "red");
					}
	        else{
	          alert(response.errors[i]);
	        }
				}
			}
			else{
				checkout(5, new Array({name:"orderno", value:response.ORDERNO}) );
			}
		}, "json");

}

History.Adapter.bind(window, "statechange", function() {

  // trigged after click in menu
  
  var state = History.getState();
	if (typeof state.data.action !== 'undefined') {

	  if (state.data.action == 'getProducts'){
			$("a.florist-one-flower-delivery-menu-link").removeClass("active");
			$("a.florist-one-flower-delivery-menu-customer-service-link").removeClass("active");
			$("a.florist-one-flower-delivery-menu-plant-a-tree-link").removeClass("active");
			if(state.data.category != "default"){
				$("a.florist-one-flower-delivery-menu-link[data-category='" + state.data.category + "']").addClass("active");
			}
			else{
				$("#florist-one-flower-delivery-menu-link-1").addClass("active");
			}
	    getProducts(state.data.category, state.data.page, state.data.additionalUrlParams);
	    
	  } else if (state.data.action == 'getProductsMore'){
	    getProductsMore(state.data.category, state.data.page);
	  }
	  else if (state.data.action == 'getProduct'){
	    getProduct(state.data.code);
	  }
	  else if (state.data.action == 'getTree'){
      
      if (!$('#florist-one-flower-delivery-view-modal').hasClass('show')){
        $("#florist-one-flower-delivery-menu-nav").find('a').removeClass("active");
        $("a.florist-one-flower-delivery-menu-plant-a-tree-link").addClass("active");
      };
      
      getTree(state.data.code , state.data.lovedone);
    }
	  else if (state.data.action == 'addToCart'){
			$("a.florist-one-flower-delivery-menu-link").removeClass("active");
			if(historyBool){
	    	addToCart(state.data.code, state.data.num);
			}
			else{
				getCart(state.data.code);
			}
			historyBool = false;
	  } 
	  else if (state.data.action == 'getCart'){
	    getCart(state.data.code);
	  }
	  else if (state.data.action == 'getCustomerService'){
	    showCustomerService();
	  }
	  else if (state.data.action == 'checkout'){
			$("a.florist-one-flower-delivery-menu-link").removeClass("active");
	    checkout(state.data.page, state.data.formdata, state.data.validated);
	  }
		else if (state.data.action.substring(0,18) == 'continue-checkout-'){
			if(historyBool){
				var $form = $(".checkout-form");
				$form.submit();
			}
			else{
				checkout(state.data.page, state.data.formdata, state.data.validated);
			}
			historyBool = false;
	  }

	} 

});

var getProducts = function(category, page, additionalUrlParams){

		var data = {
			'action': 'getProducts',
			'category': category,
			'page': page,
			'additionalUrlParams': additionalUrlParams
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");

}

var getProductsMore = function(category, page){

		var data = {
			'action': 'getProductsMore',
			'category': category,
			'page': page
		};

		jQuery.post(ajaxurl, data, function(response, status){ 
		
		  jQuery('#florist-one-flower-delivery-many-products-display').append(response);
		  var itemsPage = (page == $('.florist-one-flower-delivery-menu-link-more').attr('data-pages'))? $('.florist-one-flower-delivery-menu-link-more').attr('data-items-count') :$('.florist-one-flower-delivery-menu-link-more').attr('data-count')*page;
		  jQuery('#florist-one-pagnation').text(itemsPage);

		}, "html");
		
}

var getProduct = function(code){

		var data = {
			'action': 'getProduct',
			'code': code
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_modal(response, status); }, "html");
	
}

var getTree = function(code,lovedone){

		var data = {
			'action': 'getTree',
			'code': code,
			'lovedone' : lovedone
		};

    if ($('#fws-trees-container').is(':visible')){
      $('#florist-one-flower-delivery-view-modal').modal('hide');
    }

		if (jQuery('#florist-one-flower-delivery-view-modal').hasClass('show')){
		  jQuery.post(ajaxurl, data, function(response, status){ make_modal(response, status); 
		  jQuery('#plant-a-tree-add-to-cart1').attr('data-bs-toggle','');
		  
		  }, "html");
		} else {
			jQuery.post(ajaxurl, data, function(response, status){ make_page(response, status); }, "html");
    } 
    
}

var addToCart = function(code, num){

		var data = {
			'action': 'addToCart',
			'code': code,
			'num' : num
		};
		
		if (jQuery('#florist-one-flower-delivery-view-modal').hasClass('show')){
		   
        jQuery.post(ajaxurl, data, function(response, status){  make_modal(response, status); 
        $('#florist-one-cart-count').text($('#shopping_cart_count').text());
		  }, "html");
		} else {
			jQuery.post(ajaxurl, data, function(response, status){
        make_modal(response, status); 
        $('#florist-one-cart-count').text($('#shopping_cart_count').text());
			}, "html");
    } 
    
}

var removeFromCart = function(code){

		var data = {
			'action': 'removeFromCart',
			'code': code
		};

  jQuery.post(ajaxurl, data, function(response, status){ make_modal(response, status); 
  $('#florist-one-cart-count').text($('#shopping_cart_count').text());
  
  }, "html");
	
}

var getCheckout = function() {

  if(jQuery('.checkout-form').is(':visible')){

    document.getElementById('florist-one-flower-delivery-menu').scrollIntoView(false);
  
    var dataCheckout = {
      'action': 'setFlowerSessionData',
      'name': $("#florist-one-flower-delivery-recipient-name").val(),
      'florist-one-flower-delivery-delivery-date' : $("#florist-one-flower-delivery-delivery-date").val(),
      'facility_id': $("#florist-one-flower-delivery-facility-id").val(),
      'random' : Math.random()
    };
    
    var localStorageData = JSON.parse(window.localStorage.getItem('chekoutInfo'));
    if (localStorageData != null) {
      jQuery.each(localStorageData, function( key, value ) {
        dataCheckout[key] = value; 
      });
    }
  
    jQuery.post(ajaxurl,dataCheckout);

    var data = {
      'action' : 'checkout',
      'page' : 4,
      'validated'  : null,
      'formdata' : dataCheckout,
      'random' : Math.random()
    
    };
    History.pushState(data, "", "");
  }

}

var getCart = function(code){

		var data = {
			'action': 'getCart',
			'code': code
		};

	  jQuery.post(ajaxurl, data, function(response, status){ make_modal(response, status); }, "html");

}

var showCustomerService = function(code){

		var data = {
			'action': 'getCustomerService'
		};

		jQuery.post(ajaxurl, data, function(response, status){ make_modal(response, status); }, "html");
		
}

var checkout = function(page, formdata, validated){

		var data = {
			'action': 'checkout',
			'page': page,
			'formdata': formdata,
			'validated': validated
		};

		jQuery.post(ajaxurl, data, function(response, status){ 
		  $('#florist-one-flower-delivery-view-modal').modal('hide'); 
		  document.getElementById('florist-one-flower-delivery-menu').scrollIntoView(false);
		  make_page(response, status, page);
		  
		}, "html");
		
}

var make_page = function(response, status, page){

  $(".florist-one-flower-delivery").html(response);

  if (page !== undefined) {
    initCheckoutFormValidation();
  }

}

var make_modal = function (response, status){

    $('#florist-one-flower-delivery-view-modal').find('.modal-body').html("").html(response);

}


var scroll_to_top = function(){

	window.scrollTo(0, $('.florist-one-flower-delivery-menu').offset().top - 60);

}

var initCheckoutFormValidation = function(){
  var submitted;
  $(document).ready(function(){
  	var $form = $(".checkout-form");
  	$form.validate({
  		rules: {
  			"florist-one-flower-delivery-delivery-date": {
  				required: true
  			},
  			"florist-one-flower-delivery-tree-certificate": {
  			    required :true
  			},
  			"florist-one-flower-delivery-tree-certificate-email-behalf-recipient-name": {
  			  required: {
            depends:function(){
              $(this).val($(this).val().trim());
                if ($("#florist-one-flower-delivery-tree-certificate-email-behalf").is(":checked")) {  
                  return true;
              } else {
                  return false;
              }
            }
          },
          maxlength: 100
  			},
  			"florist-one-flower-delivery-tree-certificate-email-behalf-recipient-email": {
  			  required: {
            depends:function(){
              $(this).val($(this).val().trim());
                if ($("#florist-one-flower-delivery-tree-certificate-email-behalf").is(":checked")) {  
                  return true;
              } else {
                  return false;
              }
            }
          },
          emailVer: true,
          maxlength: 100
  			},
  			"florist-one-flower-delivery-tree-certificate-email-behalf-message-to-recipient": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return false;
              }
          },
          maxlength: 500
  			},
  			"florist-one-flower-delivery-tree-certificate-name-of-loved-one": {
  			    required: {
                     depends:function(){
                  $(this).val($(this).val().trim());
                  if($(this).length < 59){
                    $(this).val($(this).val().substring(0,59));
                  }
                  return true;
              }
          },
  			},
  			"florist-one-flower-delivery-tree-certificate-sender-display-name": {
  			    required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  if($(this).length < 59){
                    $(this).val($(this).val().substring(0,59));
                  }
                  return true;
              }
          },
  			},
  			"florist-one-flower-delivery-special-card-message": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 200
  			},
  			"florist-one-flower-delivery-special-special-instructions": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return false;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-name": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-institution": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return false;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-address-1": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-address-2": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return false;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-city": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-recipient-state": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-recipient-country": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-recipient-postal-code": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim().toUpperCase());
                  return true;
              }
          },
  				maxlength: 7,
					recipientZip: true
  			},
  			"florist-one-flower-delivery-recipient-phone": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 20,
					phoneNumber: true
  			},
  			"florist-one-flower-delivery-customer-name": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-address-1": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-address-2": {
  				rrequired: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return false;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-city": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100
  			},
  			"florist-one-flower-delivery-customer-state": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-customer-country": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-customer-phone": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 20,
  				phoneNumber: true
  			},
  			"florist-one-flower-delivery-customer-email": {
  				required: {
              depends:function(){
                  $(this).val($(this).val().trim());
                  return true;
              }
          },
  				maxlength: 100,
					emailVer: true
  			},
  			"florist-one-flower-delivery-customer-postal-code": {
  				required: {
              depends:function(){
              
                var $cVal = $("#florist-one-flower-delivery-customer-country").val();
                
                if($cVal == "CA" || $cVal == "US" ){
                  $(this).val($(this).val().trim().toUpperCase());
                  return true;
                } else {
                  $(this).val($(this).val().trim());
                  return false;
                }
                  
              }
          },
          maxlength: 15,
					customerZip: true
  			},
  			"florist-one-flower-delivery-billing-credit-card": {
  				required: true,
  				maxlength: 2
  			},
  			"florist-one-flower-delivery-billing-credit-card-no": {
  				required: true,
  				maxlength: 16,
					creditCardNumber: true
  			},
  			"florist-one-flower-delivery-billing-exp-month": {
  				required: true,
  				maxlength: 2,
					CCExp: {
						month: '#florist-one-flower-delivery-billing-exp-month',
						year: '#florist-one-flower-delivery-billing-exp-year'
					}
  			},
  			"florist-one-flower-delivery-billing-security-code": {
  				required: true,
  				maxlength: 4,
					CCCVV2: {
						cc_type: '#florist-one-flower-delivery-billing-credit-card',
						cc_cvv2: '#florist-one-flower-delivery-billing-security-code'
					}
  			}
  		},
  		onkeyup: false,
      onfocusout: function(element) {
          if ($(element).hasClass('ofo')) {
              this.element(element);
          }
      },
  		onchange: false,
  		focusInvalid: false,
  		errorClass: "alert alert-danger w-100",
  		invalidHandler: function(event, validator) {
        submitted = true;
  		},
  		showErrors: function(errorMap, errorList) {
  		 
  		 if (submitted) {
  		    $(".floristone-checkout-errors").remove();
            var summary = "Please ensure you have entered the following: <br/><br/>";
            $.each(errorList, function() { 
            
            var inputName = $("label[for='" + this.element.id + "']").text();
            var inputName = inputName.split('*');
            var sectionLabel = "";
            
            var section = this.element.id.split("-")
            if (section.indexOf("customer") !== -1){
            
              sectionLabel = "Bill To ";
            
            }
            if (section.indexOf("recipient") !== -1){
            
              sectionLabel = "Deliver To ";
            
            }
            
            summary +=  sectionLabel + inputName[0] + "<br/>"; 
            
            });
            $(".checkout-form-continue-next-step").before('<div class="my-2 alert alert-danger floristone-checkout-errors">' + summary + '</div>');
            submitted = false;
        }
          
      
        this.defaultShowErrors();
      },
  		submitHandler: function(){
  		
  			checkout(4, $form.serializeArray(),true);
  			
  			$(document).ajaxStop(function(){
          $('#fws-checkout-form-payment').click();
        });

  		},
  		errorPlacement: function(error, element) 
       {
            if ( element.is(":radio") )
            {
              error.insertBefore( element.parents('#florist-one-flower-delivery-tree-certificate-info') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
        },
        messages:
        {
          "florist-one-flower-delivery-tree-certificate":
          {
            required:"Please select a delivery method."
          }
        },
  	});
  });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document)
	.ready(function(){

		$('.florist-one-flower-delivery-loading').hide();
		
      jQuery.validator.addMethod("phoneNumber", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) ||
          phone_number.match(/(.*?\d){10}/gm);
      }, "Please specify a valid phone number");
      
      jQuery.validator.addMethod("customerZip", function(value, element) {
		
        var $cVal = jQuery('#florist-one-flower-delivery-customer-country').val();
        if($cVal == "CA"){
          return this.optional(element) || /(^[A-Za-z]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$)/.test(value);
        } 
        if ($cVal == "US"){
          return this.optional(element) || /(^\d{5}$)/.test(value); 
        } 
        
        if ($cVal != "US" && $cVal != "CA" ){
          return this.optional(element) || /(.*?)/.test(value); 
        } 
    
      }, function () {
    
        var $cVal = jQuery('#florist-one-flower-delivery-customer-country').val();
    
        var msg;
        if ($cVal == "CA"){
          msg="Please Enter a Valid Canadian Postal Code | ANA NAN (A=letter N=Number)"; 
          return msg;
        } 
        
        if ($cVal == "US"){
          msg="Pleas Enter a Valid Zip Code | NNNNN (N=Number)" ;
          return msg;
        } 
        
    
      });

      jQuery.validator.addMethod("recipientZip", function(value, element) {
        return this.optional(element) || /(^\d{5}$)|(^[A-Za-z]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$)/.test(value)
      }, "This is not a valid US or Canadian ZIP");
    
      jQuery.validator.addMethod("emailVer", function(value, element) {
        return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)
      }, "Please enter a valid email address");
    
  
      jQuery.validator.addMethod("CCExp", function(value, element, params) {
        var minMonth = new Date().getMonth() + 1;
        var minYear = new Date().getFullYear();
        minYear = (minYear + '').substring(2, 4);
        var month = parseInt($(params.month).val(), 10);
        var year = parseInt($(params.year).val(), 10);
        return this.optional(element) || (year > minYear || (year == minYear && month >= minMonth));
      }, "Your Credit Card Expiration date is invalid.");

      jQuery.validator.addMethod("CCCVV2", function(value, element, params) {
        var cc_type = $(params.cc_type).val();
        var cc_cvv2 = $(params.cc_cvv2).val();
        return this.optional(element) || ((cc_type == 'AX' && cc_cvv2.length == 4) || (cc_type != 'AX' && cc_cvv2.length == 3));
      }, "Your CVV2 is invalid.");

      jQuery.validator.addMethod("creditCardNumber", function(value, element) {
        var strippedValue = value.replace(/[^0-9]+/g,'');
        return this.optional(element) ||  /^.{15,16}$/.test(strippedValue)
      }, "Please enter a valid credit card number.");
      
	})
  .ajaxStart(function () {
    jQuery('#florist-one-flower-delivery-loader').removeClass("d-none");
  })
  .ajaxStop(function () {
    jQuery('#florist-one-flower-delivery-loader').addClass("d-none");
  });

	$(document).on("change", ".florist-one-flower-delivery-location", function(e){
		e.preventDefault();
		
		const deliveryInfo = [
		  ['florist-one-flower-delivery-recipient-institution',$('option:selected',this).attr("data-location-institution")],
		  ['florist-one-flower-delivery-recipient-address-1',$('option:selected',this).attr("data-location-address-1")],
		  ['florist-one-flower-delivery-recipient-city',$('option:selected',this).attr("data-location-city")],
		  ['florist-one-flower-delivery-recipient-state',$('option:selected',this).attr("data-location-state")],
		  ['florist-one-flower-delivery-recipient-country',$('option:selected',this).attr("data-location-country")],
		  ['florist-one-flower-delivery-recipient-phone',$('option:selected',this).attr("data-location-phone")],
		  ['florist-one-flower-delivery-facility-id',$('option:selected',this).attr("data-location-facility-id")],
		  ['florist-one-flower-delivery-recipient-postal-code',$('option:selected',this).attr("data-location-zipcode")]
		]
		
		console.log(deliveryInfo);
      //store checkout in local storage
      var checkoutInput = (JSON.parse(window.localStorage.getItem('chekoutInfo')) == null)? {} : JSON.parse(window.localStorage.getItem('chekoutInfo'));
      for (let i = 0; i < deliveryInfo.length; i++) {
        checkoutInput[deliveryInfo[i][0]] = deliveryInfo[i][1];
        $("#" + deliveryInfo[i][0]).val(deliveryInfo[i][1]);
      }
      
      window.localStorage.setItem('chekoutInfo', JSON.stringify(checkoutInput));
		
	});

})( jQuery );

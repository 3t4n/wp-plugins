/** @TODO JQUERY HAS SOME PROBLEM AROUND SOLVED*/
var $=jQuery;
/**GLOBALS*/
var name , surname , address , phone , email , modal, modali, modal9, modal10;
jQuery(function(){
  /** submit isleminden sonraki durumda mesaj gelmis ise modal durumu acar*/
      isSettingPageModalNeedsToOpen();
      	$('.accordion-toggle-icon').parent().click(function()
        {
             $(this).find('.accordion-toggle-icon').toggleClass('accordion-open-icon accordion-close-icon'); //Adds 'a', removes 'b' and vice versa
        });   	
     	appsila_wqt_fixinApplyButtonRequestFormCutPasteLocation();    

});
function appsila_wqt_fixinApplyButtonRequestFormCutPasteLocation(){
	if($('#modal-form-movement-holder-appsila-on-cart-page-only')!=undefined){	
		$('body').on('change',function(){
                if($('#appsila-wqt-request-quote-on-cart-page-modal-container-id').css('display')=='none'){
                    removeValidationFromRequestQuoteModal();
                }
                else if($('#appsila-wqt-request-quote-on-cart-page-modal-container-id').css('display')=='block'){
                    addValidationToRequestQuoteModal();
                }
        });
	}	
}
/**
 * @desc Sayfa yuklendiginde bir modal uzerine yazi eklenen bir
 * kosul olustugunda sayfa ile beraber mesajlı modalı otomatik acar.
 * @return {Boolean} [description]0
 */
function wc_key_and_secret_page(){
   window.open("admin.php?page=wc-settings&tab=api&section=keys&create-key=1");
   $('#create_key_and_secret_modal').modal('hide');
}
function removeValidationFromRequestQuoteModal(){
        $('.woocommerce-cart-form').attr('novalidate','novalidate'); 
}    
function addValidationToRequestQuoteModal(){
        $('.woocommerce-cart-form').removeAttr('novalidate');
}
function isSettingPageModalNeedsToOpen(){
  if ($('#modal-bodyddd-content-message-taken').html()!==null&&$('#modal-bodyddd-content-message-taken').html()!==undefined&&$('#modal-bodyddd-content-message-taken').html().trim()!=="") {
    $('#result-modal').modal('show');
     //$('.modal-backdrop').removeClass("modal-backdrop");
    setTimeout(function(){$('#result-modal').modal('hide');},6000);
  }
}
function open_tab(tab){
    $('.nav-tabs a[href='+tab+']').tab('show');
}
function open_step_under_tab(tab,stepValue){
    $('.nav-tabs a[href='+tab+']').tab('show');

    setTimeout(function(open_the_wanted_one){
      $.when($("button[aria-expanded='true']")
             .each(function(){this.click()})
            )
      .then(function(){
          open_the_wanted_one(stepValue);
      });

        function open_the_wanted_one (stepValue){
            setTimeout(function(){
            if($('#'+stepValue).attr('aria-expanded')==undefined||$('#'+stepValue).attr('aria-expanded')=='false'){
                                $("#"+stepValue)
                                  .click(function( e,stepValue ) {})
                                  .trigger( "click",[stepValue ]
                                          );
                           }
            },400);
        }
    },500);
};
// function jump_to_help_tab(value){
//   jQuery('#hasan4').each(function(elm){this.click();});
// }
function appsila_wqt_setting_page_settings_tab(){
}
function appsila_wqt_handle_form_submission()
{
   console.log("podafjpsıadjgoısdfhgoıdsfjgosıdfgjoı");
}

function appsila_wqt_request_quote_on_cart_page_modal(){
  
  $('#appsila-wqt-request-quote-on-cart-page-modal-container-id').modal('show');
  appsila_wqt_modal_null_inputs_fill_defaults()
 }

function appsila_wqt_ponpilii(){
  $('#appsila-wqt-request-quote-on-single-product-page-modal-container-id').modal('show');
  appsila_wqt_modal_null_inputs_fill_defaults();
}
function appsila_wqt_modal_null_inputs_fill_defaults(){
  if ($('#billing_phone').val()==""||$('#billing_phone').val()==null||$('#billing_phone').val()===undefined) {
    $('#billing_phone').val("+");
  }
  if ($('#billing_address_1').val()==""||$('#billing_address_1').val()==" "||$('#billing_address_1').val()==null||$('#billing_address_1').val()===undefined) {
    $('#billing_address_1').val("    ");
  }
}
function appsila_wqt_ponpili2(){
   modal = document.getElementById('popup2myModal');
   modal.style.display = "none";
}
function appsila_wqt_popup9Close(){
  /**@see Modal-Nulls fixing*/
  appsila_wqt_modal_null_inputs_fill_defaults();
   $(".modal").modal('hide');
   modal9 = document.getElementById('popup9myModal');
   modal9.style.display = "none";
}
function appsila_wqt_popup10Close(){
   modal10 = document.getElementById('popup10myModal');
   modal10.style.display = "none";
}
function appsila_wqt_ponpilii2(){
   modali = document.getElementById('popup3myModal');
   modali.style.display = "none";
}


// Get the button that opens the modal
modal = document.getElementById('popup2myModal');
modali = document.getElementById('popup3myModal');
modal9 = document.getElementById('popup9myModal');
moda10 = document.getElementById('popup10myModal');
var myVar;
var btn2 = document.getElementById("insert_empty_cart_button");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
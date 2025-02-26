//  product_block
//search fxs
function searchClear() {
    jQuery(".searchbar").val("");
    document.getElementById('search').value = '';
    jQuery('#search').click();
}
function searchGo() {
    parent.document.getElementById('search').value = currentSearch;
    jQuery('#search').click();
}
function searchInput(element) {
    currentSearch = element.value;
}

// common admin
var displayMode = 'metabox';
var ajax = '';
var nonce = '';

function product_update(asin , prod_id , element) {

	if(element!='') {   
		jQuery(element).css({
			'webkit-transform':'rotate(360deg)', 
			'-moz-transform':'rotate(360deg)',
			'transform':'rotate(360deg)'
		});
	}

	var action = "product_update";
	console.log("Product "+asin+" with id ["+prod_id+"] is being updated...", 'pending');

	jQuery.ajax(
		ajax, {
			method : "POST",
			dataType : "json",
			data : {
                action: action,
                nonce: nonce,
                asin: asin
			},
			success: function(response) {
				jQuery("#product-"+asin).html(response);
				console.log(' ...Done!', 'update');
				product_display(displayMode, asin);
			},
			error: function(response) {
				console.log(' ...FAILED!', 'update');
			}
		}
	);

}

function product_display(mode = 'warehouse', asin = '') {
	var action = "product_display";
	var asin = asin;

	jQuery.ajax( 
        ajax, {
            method : "POST",
            dataType : "json",
            data : {
                action: action,
                nonce: nonce,
                mode: mode,
                asin: asin
            },
            success: function(response) {
                jQuery("#product_display").html(response);
            },
            error: function(response) {
                console.log('ERROR! Impossible to update the list!');				 
            }
        }
	);
}

function textareaFit(e) {
	var cs = window.getComputedStyle(e.target);
	e.target.style.height = "auto";
	e.target.style.height = (e.target.scrollHeight + parseInt(cs.getPropertyValue("border-top-width")) + parseInt(cs.getPropertyValue("border-bottom-width"))) + "px";
}
			
function ctrl_v_this_field(field) {
	navigator.clipboard.writeText(field);
	console.log(field+" copied into the clipboard!");		
}

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
	tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
	tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function copyInputShowTaglineRevertBack(e) {
    navigator.clipboard.writeText(jQuery(e.target).val());
    jQuery(e.target).css('width', jQuery(e.target).width() + 'px');
    jQuery(e.target).html( jQuery(e.target)[0].dataset.tagline );
    setTimeout(function() {
        jQuery(e.target).html( jQuery(e.target)[0].dataset.prefix + ': ' + jQuery(e.target).val() );
        jQuery(e.target).css('width', '');
    }, 900);
}

function copyInputOverlayOn(e) {
    jQuery(e.target).css('width', jQuery(e.target).width() + 'px');
    jQuery(e.target).html( 'Click to copy the '+jQuery(e.target)[0].dataset.prefix );
}
function copyInputOverlayOff(e) {
    jQuery(e.target).html( jQuery(e.target)[0].dataset.prefix + ': ' + jQuery(e.target).val()  );
    jQuery(e.target).css('width', '');
}

function product_delete(element) {
	action = "product_delete";
	nonce = jQuery("main").attr("data-nonce");
	button = jQuery(element);
	asin = '';
	asin = jQuery(element).attr("data-asin");
	if (asin == "") { console.log("product already deleted!"); return; }
	if (confirm("Delete product "+asin+"?") == true) {
		console.log("deleting asin = "+asin);
		jQuery.ajax( 
            ajax, {
                method : "POST",
                dataType : "json",
                data : {
                    action: action,
                    nonce: nonce,
                    asin: asin
                },
                success: function(response) {
                    jQuery(button).css("background-color", "red");
                    jQuery(button).css("color", "white");
                    jQuery(button).html("☠");
                    jQuery(button).attr("data-asin", "");
                    jQuery("#product-"+asin+" *:not(.product_delete)").css("opacity", "0.9");
                    jQuery("#product-"+asin+" *:not(.product_delete)").css("filter", "blur(0.5px)");
                    warehouse_log("Product "+asin+" has been deleted from the database!"); 
                    product_display(displayMode);
                    console.log('success ' + response);
                },
                error: function(response) {
                    console.log('error ' + response);
                    warehouse_log("There are issues in deleting product "+asin); 				 
                }
            }
		);
	}
}

jQuery(document).ready(
    function() {
        
        ajax = jQuery("#amazingaffiliates_ajax").attr( "data-ajax" );
        nonce = jQuery("#amazingaffiliates_ajax").attr( "data-nonce" );
        
        jQuery("body").on( 'click' , '.tocopy' , function(e) {
            copyInputShowTaglineRevertBack(e);
        });
        
        jQuery("body").on( 'mouseover' , '.tocopy' , function(e) {
            copyInputOverlayOn(e);
        });
        jQuery("body").on( 'mouseout' , '.tocopy' , function(e) {
            copyInputOverlayOff(e);
        });
        
    }
);


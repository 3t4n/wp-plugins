var wpversion;
jQuery(document).ready(function($) {
	//alert('got');
	var wpversion = $('meta[name=wpversion]').attr("content");
	//alert($('meta[name=wpversion]').attr("content"));
	$(".postbox h3.tzcustom-expand,.postbox .handlediv").click(function(e){
		if($(this).hasClass('tzcustom-highlight')){
			$(this).removeClass('tzcustom-highlight')
		}
		if($(this).parent().hasClass('closed')){
		$(this).parent().removeClass('closed');
		$(this).parent().find(".handlediv").removeClass('down');
		$(this).parent().find(".handlediv").addClass('up');
		}
		else
		{
		$(this).parent().addClass('closed');
		$(this).parent().find(".handlediv").removeClass('up');
		$(this).parent().find(".handlediv").addClass('down');
		}
	});
	
	if(wpversion >= '3.5'){
	 	$(".tzcustom-color-picker").wpColorPicker();
	}
	else{
		 jQuery('.tzcustomfarb').hide();
		 $('.tzcustomfarb').each(function() {
			 //alert();
			 var sell = $(this).parent().find('.tzcustom-color-picker').attr('id');
			 //alert(sell);
			 jQuery(this).farbtastic("#"+sell);
		 });
		 
		 $('.tzcustom-color-picker').click(function() {
        	$(this).parent().find('.tzcustomfarb').fadeIn();
		});
	
		$(document).mousedown(function() {
			$('.tzcustomfarb').each(function() {
				var display = $(this).css('display');
				if ( display == 'block' )
					$(this).fadeOut();
			});
		});
	 }//
});

function onlyNum(evt)
{
    var e = window.event || evt;
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;

}
function NumNdNeg(evt)
{
    var e = window.event || evt;
    var charCode = e.which || e.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 45)
        return false;

    return true;

}

function advpsCheckCat(p,n){
	var fldSel = 'tzcustom-cat-field'+n;
	if(p != "page"){
		jQuery.ajax({
			  type : "post",
			  context: this,
			  dataType : "html",
			  url : tzcustomajx.ajaxurl,
			  data : {action: "tzcustomchkCategory",post_type:p,checkReq:tzcustomajx.tzcustomAjaxReqChck},
			  success: function(response) {
				 //alert(response);return;
					jQuery('#'+fldSel).html(response);
				},
				complete : function(){
					
				}
		});///
	}
	else
	{
		jQuery('#'+fldSel).html('');
	}
}

function tzcustomUpdateLabel(f,v,id){
	jQuery('#tzcustombox'+id).css('display','inline');
	jQuery.ajax({
		  type : "post",
		  context: this,
		  dataType : "html",
		  url : tzcustomajx.ajaxurl,
		  data : {action: "tzcustomUpdateLabel",f_name:f,f_value:v,checkReq:tzcustomajx.tzcustomAjaxReqChck},
		  success: function(response) {
			 jQuery('#tzcustomtxt'+id).html(v);
			jQuery('#tzcustombox'+id).css('display','none');
			},
			complete : function(){
				
			}
	});///
}
function tzcustomupdateOptionSet(id){
	var optdata = jQuery('#'+id).serialize();

	jQuery('.ajx-sts').html('');
	jQuery('#'+id).find('.ajx-loader').css('display','inline');
	
	jQuery.ajax({
		  type : "post",
		  context: this,
		  dataType : "html",
		  url : tzcustomajx.ajaxurl,
		  data : {action: "tzcustomUpdateOpt",optdata:optdata,checkReq:tzcustomajx.tzcustomAjaxReqChck},
		  success: function(response) {
			 
			jQuery('#'+id).find('.ajx-loader').css('display','none');
			jQuery('#'+id).find('.ajx-sts').html(response);
			setTimeout('clearText()',4000);
			},
			complete : function(){
				
			}
	});///
}
function listPost(n){
	var fldSel = 'tzcustom-plist-field'+n;
	
	var ptype = jQuery("#plist"+n+" select[name=tzcustom_post_stypes]").val();
	var pmax = jQuery("#plist"+n+" input[name=tzcustom_plistmax]").val();
	var porderBy = jQuery("#plist"+n+" select[name=tzcustom_plistorder_by]").val();
	var porder = jQuery("#plist"+n+" select[name=tzcustom_plistorder]").val();
	
	jQuery('#plist'+n).find('.ajx-loaderp').css('display','inline');
	
	jQuery.ajax({
		  type : "post",
		  context: this,
		  dataType : "html",
		  url : tzcustomajx.ajaxurl,
		  data : {action: "tzcustomListPost",ptype:ptype,pmax:pmax,porderBy:porderBy,porder:porder,checkReq:tzcustomajx.tzcustomAjaxReqChck},
		  success: function(response) {
			 jQuery('#'+fldSel).html(response);
			 jQuery('#plist'+n).find('.ajx-loaderp').css('display','none');
			
		  },
		  complete : function(){
			  
		  }
	});///
}
function tzupdateSm(elem,id){
	jQuery('#smudtsts'+id).css('display','inline');
	
	var selval = jQuery(elem).val();
	var selnam = jQuery(elem).attr('name');
	
	if(selval == 'query'){
		jQuery("#plist"+id+" table").addClass("tzcustom-hide");
		jQuery("#query"+id+" table").removeClass("tzcustom-hide");
	}
	else
	{
		jQuery("#query"+id+" table").addClass("tzcustom-hide");
		jQuery("#plist"+id+" table").removeClass("tzcustom-hide");
	}
	
	jQuery.ajax({
		  type : "post",
		  context: this,
		  dataType : "html",
		  url : tzcustomajx.ajaxurl,
		  data : {action: "tzcustomupdateSmethod",selnam:selnam,selval:selval,checkReq:tzcustomajx.tzcustomAjaxReqChck},
		  success: function(response) {	
		  	jQuery('#smudtsts'+id).css('display','none');
		  },
		  complete : function(){
			  
		  }
	});///
}

function tzcustomdeleteOptSet(id){
	var rsp = confirm("Do you really want to delete this slider?");
	if(rsp){
		jQuery("#frmOptDel"+id).removeAttr("onsubmit");
		jQuery("#frmOptDel"+id).submit();
	}
}
function pagerAttr(v){
	alert(v);
}
function clearText(){
	jQuery('.ajx-sts').html('');
}
function sliderType(v,id){
	if(v != 'standard'){
		jQuery("#tzcustom-pthumb-lvl"+id).addClass('tzcustom-fade');
		jQuery("#tzcustom-pthumb"+id).attr('disabled','disabled');
	}
	else
	{
		jQuery("#tzcustom-pthumb-lvl"+id).removeClass('tzcustom-fade');
		jQuery("#tzcustom-pthumb"+id).removeAttr('disabled');
	}
}
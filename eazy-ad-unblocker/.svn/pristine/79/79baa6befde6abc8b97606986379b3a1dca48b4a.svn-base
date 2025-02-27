var eazyAdUnblockerDialogClosed = true; //July 30 2020
var eazy_ad_unblocker_loaded = false; //Dec 13 2020
var eazy_ad_unblocker_dialog_opener = null; 
var eazy_ad_unblocker_global_error = false; //April 23 2022
var eazyAdUnblockerFlaggedURL = eazy_ad_unblocker.ad_url;
var eazy_ad_unblocker_msg_var = "#"+eazy_ad_unblocker_popup_params.eazy_ad_unblocker_dialog_message;
var eazyAdUnblockerHolderDiv = null;
var eazyAdUnblockerEffectiveWidth = null;

//May 15 2022
function detectAdblock(URL, callback, params) {
    fetch(URL, {
        method: 'HEAD'
    }).then((response) => {
        // If the request is redirected, then the ads are blocked.
        callback(response.redirected, params);
		
    }).catch((error) => {
        // If the request fails completely although connected to the internet, 
        // then the ads are blocked.
        callback(window.navigator.onLine, params);
		
    })
}


jQuery(document).ready(function($){
	
	var openingWidth = 0;			
	
	//popup adjustment on scroll April 15 2020
	var lastScrollTop = 0;
	
	//Aug 11 2024
	eazyAdUnblockerHolderDiv = jQuery("<div>");
	jQuery(eazyAdUnblockerHolderDiv).prop("id", eazy_ad_unblocker_popup_params.eazy_ad_unblocker_holder); //eazy_ad_unblocker_holder_id
	jQuery(eazyAdUnblockerHolderDiv).addClass(eazy_ad_unblocker_popup_params.eazy_ad_unblocker_holder_class_name); //eazy_holder_class
	jQuery("body").append(eazyAdUnblockerHolderDiv);
	
	
	jQuery(window).scroll(function(e){
		
		var st = $(this).scrollTop();
		
		var direction = '';
		
		if (st > lastScrollTop){
			// downscroll code
			direction = 'down';
			
		} else {
			// upscroll code
			direction = 'up';
		}
		lastScrollTop = st;
		
		var popupParent = $(eazy_ad_unblocker_msg_var).closest(".ui-dialog"); //July 31 2020
		
		//Aug 11 2024
		
		var nodeLength = $(popupParent).length;
		
		if(nodeLength == 0)
		{
			console.log('stat = No Parent');
			return;
		}
		
		var popupHeight = $(popupParent).height(); //July 31 2020
		
		var fromTop = $(window).scrollTop();
		
		var docuHeight = $(document).height();
		
		var dialogBottom = $(popupParent).offset().top + $(popupParent).outerHeight(true); //July 31 2020
		
		var remaining = 0;
		
		if(window.innerHeight > $(popupParent).outerHeight(true)){
			
			$(popupParent).position({ my: 'center', at: 'center', of: window });
			
		}
		else if(popupHeight > window.innerHeight && popupHeight < docuHeight)
		{
			
			/******Begin Dec 13 2020*****/
			var dialog = popupParent; //July 31 2020
					
			var offset = dialog.offset();
			
			
			if(fromTop + window.innerHeight > dialogBottom && fromTop + window.innerHeight <= docuHeight)
			{
				//bottom of dialog reaches bottom of viewport
				if(eazy_ad_unblocker_loaded && direction == 'down')
				{
					
					$(popupParent).position({ my: 'bottom', at: 'bottom', of: window, using: function(param1, param2){
						
						//animation begin
						
						var animationDuration = Math.round(1000 * 250 / docuHeight);  
						
						$(this).animate(param1, animationDuration , "linear"); 
						
						//end animation
						
					} });
				}
			}
			else if(fromTop <= offset.top || offset.top <= 0) 
			{
				//top of dialog reaches top of viewport
				if(eazy_ad_unblocker_loaded && direction == 'up')
				{
					
					$(popupParent).position({ my: 'top', at: 'top', of: window, using: function(param1, param2){
						
						//begin animation
						var animationDuration = Math.round(1000 * 250 / docuHeight);
						
						$(this).animate(param1, animationDuration , "linear"); 
						
						//end animation
						
					} });
				}
			} 
			
			/*****End Dec 13 2020*****/
		} 
		
	});	
	//end adjustment
	
});
	
jQuery(document).ready(function($){
	
	//Nov 11 2020
	
	var $ = jQuery.noConflict();
	
	/****Dec 21 2020****/
	var eff_width = eazy_unblocker_width.unblocker_width;
	
	var eazy_unblocker_is_not_number_flag = (isNaN(parseInt(eff_width)));
	
	var eff_width_full = 0;
	
	if(eazy_unblocker_is_not_number_flag)
	{
		eff_width_full = 0;
	}
	else
	{
		eff_width_full = parseInt(eff_width);
	}
	
	eazyAdUnblockerEffectiveWidth = (window.screen.width <= 540)?window.screen.width:((eff_width_full != 0 && eff_width_full < window.screen.width)?eff_width_full:'auto');
	
	
	eazy_ad_unblocker_dialog_opener = jQuery(eazy_ad_unblocker_msg_var).dialog({ 
		modal: true,
		autoOpen: false,
		closeOnEscape: false,
		width: eazyAdUnblockerEffectiveWidth,
		resizable: false,
		draggable: false,
		open: function(){
				
				eazyAdUnblockerDialogClosed = false; //July 30 2020
				
				var eazyParent = jQuery(this).parents('.ui-dialog'); 
				
				var eazyAdUnblockerOverlayParent = jQuery(eazyParent).parents("#"+eazy_ad_unblocker_popup_params.eazy_ad_unblocker_holder);
				
				jQuery(eazyAdUnblockerOverlayParent).children(".ui-widget-overlay:eq(0)").prop('id', eazy_ad_unblocker_popup_params.eazy_ad_unblocker_dialog_overlay );//'eazy_ad_unblocker_dialog-overlay'
				
				jQuery("#"+eazy_ad_unblocker_popup_params.eazy_ad_unblocker_dialog_overlay).css({'background-color': '#000', 'opacity': eazy_opacity.opacity, 'z-index': 999998 }); //999998
				
				jQuery(eazyParent).css({'z-index': 999999 }); 
				
				/*--adjust popup to follow scrolling 15 April 2020--*/
				
				var winHeight = jQuery(window).height();
				
				var popupHeight = jQuery(this).height();
				
				//blur
				
				jQuery(eazyParent).prop('tabindex', -1).focus(); //Aug 11 2024
				
				//end blur 
				
				/*----------end popup----------*/
				
				/**June 23 2020 close btn change**/
				if(eazy_close_btn.admin_btn_show == 'no')
				{
					
					jQuery(eazyParent).prop("id", eazy_ad_unblocker_popup_params.eazy_ad_unblocker_dialog_parent); //"eazy_ad_unblocker_dialog-parent"
					
				}
					 
				/**end June 23, 2020 btn change**/
				/***for bootstrap themes Nov 29 2020***/
				
				var scriptElems = jQuery("script");
				
				var bootstrapOn = false;
				
				jQuery(scriptElems).each(function(index, elem){
					
					var src = jQuery(elem).prop("src");
					
					if(src.search("bootstrap") != -1)
					{
						bootstrapOn = true;
					}
					
				});
				if(bootstrapOn)
				{
					
					var btnSpan = jQuery('div.ui-dialog-titlebar button.ui-dialog-titlebar-close span.ui-icon-closethick').length;
					
					if(btnSpan == 0) //new code block to check if jquery dialog btn is being blocked by bootstrap Nov 29 2020
					{
						jQuery(eazy_ad_unblocker_msg_var).parent(".ui-dialog").children(".ui-dialog-titlebar").children("button.ui-dialog-titlebar-close").html("<span class='bootstrapOn'>X</span>");
					
						var color = jQuery(eazy_ad_unblocker_msg_var).parent(".ui-dialog").children(".ui-dialog-titlebar").css("background-color");
						
						jQuery(eazy_ad_unblocker_msg_var).parent(".ui-dialog").children(".ui-dialog-titlebar").children("button.ui-dialog-titlebar-close").children(".bootstrapOn").css({'color': color, 'font-size': '14px', 'position': 'relative', 'bottom': '4px'});
					}
				}
				
				/***for bootstrap themes Nov 29 2020 End***/
				
				/***For aspect ratio of images Dec 4 2020***/
				jQuery(eazy_ad_unblocker_msg_var+" img").each(function(index, ui){
						
				if(window.screen.width <= jQuery(ui).prop("width"))
				{
				
					var aspectRatio = jQuery(ui).prop("width")/jQuery(ui).prop("height");
					
					var newWidth = (window.screen.width - 20);

					var newHeight = Math.floor(newWidth / aspectRatio);
					
					jQuery(ui).prop("height", newHeight);
					
					jQuery(ui).prop("width", newWidth);
				
				}
				else if(parseInt(jQuery(eazy_ad_unblocker_msg_var).css("width")) <= jQuery(ui).prop("width"))
				{
					/****Begin 13 Dec 2020****/
					
					var aspectRatio = jQuery(ui).prop("width")/jQuery(ui).prop("height");
					
					var newWidth = (parseInt(jQuery(eazy_ad_unblocker_msg_var).css("width")) - 20);

					var newHeight = Math.floor(newWidth / aspectRatio);
					
					jQuery(ui).prop("height", newHeight);
					
					jQuery(ui).prop("width", newWidth);
					
					/****End 13 Dec 2020****/
				}
			});
			
			jQuery(eazy_ad_unblocker_msg_var+" video").each(function(index, ui){
				
				if(window.screen.width <= jQuery(ui).prop("width"))
				{
				
					var aspectRatio = jQuery(ui).prop("width")/jQuery(ui).prop("height");
					
					var newWidth = (window.screen.width - 20);

					var newHeight = Math.floor(newWidth / aspectRatio);
					
					jQuery(ui).prop("height", newHeight);
					
					jQuery(ui).prop("width", newWidth);
				
				}
				else if(parseInt(jQuery(eazy_ad_unblocker_msg_var).css("width")) <= jQuery(ui).prop("width"))
				{
					/****Begin 13 Dec 2020****/
					
					var aspectRatio = jQuery(ui).prop("width")/jQuery(ui).prop("height");
					
					var newWidth = (parseInt(jQuery(eazy_ad_unblocker_msg_var).css("width")) - 20);

					var newHeight = Math.floor(newWidth / aspectRatio);
					
					jQuery(ui).prop("height", newHeight);
					
					jQuery(ui).prop("width", newWidth);
					/****End 13 Dec 2020****/
				}
			});
		
			//fix
			jQuery(eazy_ad_unblocker_msg_var).css("overflow-x", "hidden");
				/*****end aspect ratio Dec 4 2020****/
				
			////jQuery('#eazy_ad_unblocker_loading').remove(); //Aug 11 2024
				
		},
		close: function( event, ui ){  
			eazyAdUnblockerDialogClosed = true;
			
			//Aug 18 2024
			jQuery(eazy_ad_unblocker_msg_var).dialog("destroy");
			//END Aug 18 2024
		},
		appendTo: $(('#'+eazy_ad_unblocker_popup_params.eazy_ad_unblocker_holder))
	}); //Nov 11 2020 //eazy_ad_unblocker_holder id

	//Aug 18 2024
	
	console.log(eazyAdUnblockerFlaggedURL);
	
	detectAdblock(eazyAdUnblockerFlaggedURL, function(isAdblockerDetected, params){
		
		console.log(`ads are ${isAdblockerDetected? 'blocked' : 'not blocked'}`);
		
		if(isAdblockerDetected)
		{
			preventDeleteDialog();
			jQuery(params).dialog("open");
		} 
		
	}, eazy_ad_unblocker_dialog_opener);
	
	//End Aug 18 2024
		
	eazy_ad_unblocker_loaded = true;
	
		
		var maxWidth = Math.max.apply(Math, jQuery(eazy_ad_unblocker_msg_var+'>div').map(function(){ return jQuery(this).width(); }).get());
		
		if(jQuery(eazy_ad_unblocker_msg_var+" audio").width() < maxWidth)
		{
			jQuery(eazy_ad_unblocker_msg_var+" audio").css("width", maxWidth+'px');
		}
		
		jQuery(eazy_ad_unblocker_msg_var).css("height", "auto");
		
		var queryParam = eazy_ad_unblocker_msg_var;
		
		var dialogParent = document.querySelector(queryParam).parentNode;
		
		//Nov 11 2020
		var appendToDiv = dialogParent.parentNode;
		//End Nov 11 2020
		
		//DOM event handlers
		//let mList = appendToDiv,
		let mList = document.body,
		options = {
		  childList: true,
		  subtree: true,
		  attributes: true,
		  attributeOldValue: true,
		  characterData: true,
		  characterDataOldValue: true
		},
		observer = new MutationObserver(mCallback);
		

		function mCallback(mutations){
			
			
			for(var z=0; z<mutations.length; z++){
				
			var mutation = mutations[z]; 
			 
			if(mutation.type === 'childList')
			{
			  //check only removal here!
			  
			  if(mutation.removedNodes.length > 0 && mutation.addedNodes.length == 0)
			  {
				  for(var i = 0; i < mutation.removedNodes.length; i++)
				  {  
						  
					  if(!eazyAdUnblockerDialogClosed)
					  {
						 
						 eazyAdUnblockerUndoMutations(mutation);
						 
					  } 
					  
				  }
			  }
			  else
			  {
				  continue;
			  }
			  
			}
		  }
		}
		
		function eazyAdUnblockerUndoMutations(undidMutations){
			
			
		  if (undidMutations){ 
			
			record = undidMutations;
			
			type = record.type;
			target = record.target;
			if (type === "childList") {
			  
			  removedNodes = record.removedNodes;
			  nextSibling = record.nextSibling;

				if(removedNodes)
				{
					for(var i = 0; i < removedNodes.length; i++)
					{
						var removedNode = removedNodes[i];		
						target.insertBefore(removedNode, nextSibling);
					}
				}	
				  
			} else {
			  value = record.oldValue;

			  if (type === "characterData") {
				target.data = value;
			  }

			  if (type === "attributes") {
				target.setAttribute(record.attributeName, value);
			  }
			}
		  }
		} 

		observer.observe(mList, options);
	
});
				
function preventDeleteDialog()
{
	
	//prevent inspect element right click
	document.addEventListener('contextmenu', function(e){
		e.preventDefault();
	});
					
	//prevent dev shortcuts on Edge, FF, Chrome, Opera
	document.onkeydown = function(e) {
		if(event.keyCode == 123) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			return false;
		}
		if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			return false;
		}
		
		//firefox
		
		if(navigator.userAgent.search("Firefox") != -1)
		{

			if(e.ctrlKey && e.shiftKey && e.keyCode == 'K'.charCodeAt(0)){
				return false;
			}
			
		}
		
	}
}
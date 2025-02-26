function ai_check_blocks(value)
{
	var check_value=jQuery.trim(value);
	if(jQuery(value).length)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function value_empty_check(msg)
{
	var check_value=jQuery.trim(msg);  if(check_value==0 || check_value===null || check_value=="undefined" || check_value===undefined || typeof check_value === "undefined" || check_value === "NaN") {  return true; } else {  return false; }
}	  
jQuery(document).on('touchstart click', '.ai_emo_counter', function(e){
	
		vex.defaultOptions.className = 'vex-theme-flat-attack';
		vex.dialog.alert("<div class='ai_reaction_loader'><span class='ai_reaction_loader_inner'></span></div>")
		var main_url=jQuery('.web_url').val();
		var activity_id=jQuery(this).parents('.activity-item').attr("id");		
		var postData = {
			action: 'ai_get_activity_reactions_list',
			activity_id:activity_id
		}
		jQuery.ajax({
			method:"POST",
			url:main_url,
			data:postData,
			dataType:'json',
		 })	
		  .done(function( msg ) {

			jQuery(document).find(".vex-dialog-message").html(msg['html']);
			
		  });	
});
jQuery(document).on('tap click', '.ai_bp_reactions_default', function(e){
	e.preventDefault();
	var $this = jQuery(this);
	if (e.type == "tap")
	{
		ai_build_my_reactions($this);
		if(jQuery(this).parents('.activity-content').find('.main_smiley_div').css('display') == 'none')
		{
			jQuery(this).parents('.activity-content').find('.main_smiley_div').stop().fadeIn();
		}
		else
		{
			jQuery(this).parents('.activity-content').find('.main_smiley_div').stop().fadeOut();		
		}
	}
	else
	{
		ai_bp_reactions_manage_actions($this,"default");
	}
});
jQuery(document).on('touchstart click', '.ai_bp_reactions', function(e){
	e.preventDefault();
	var $this = jQuery(this);	
	ai_bp_reactions_manage_actions($this,"all");

});

jQuery(document).ready(function() {
	
	if(ai_check_blocks('.ai_bp_reactions')==true)
	{
		jQuery(document).tipsy({live: 'a.ai_bp_reactions',gravity: 's'});
	}
	if(ai_check_blocks('#ai_counter')==true)
	{	
		jQuery(document).tipsy({live: 'a.ai_acb_counter',gravity: 's',html: true});
	}
	var total_smiley =jQuery('.activity-item').first().find('#ai_bp_ul li').size();
	if(total_smiley <= 3)
	{
		jQuery('.main_smiley_div').css('left',parseInt(30)+'%')
	}
});
jQuery(document).on({
    mouseenter: function(){
       jQuery(this).parents('.activity-content').find('.main_smiley_div').stop().fadeIn();
	   ai_build_my_reactions(jQuery(this));

    },
    mouseleave: function(){
        jQuery(this).parents('.activity-content').find('.main_smiley_div').stop().fadeOut();
		ai_build_my_reactions(jQuery(this));

    }
}, '.ai_bp_reactions_default,#ai_bp_ul');

jQuery(document).on('touchstart click', '#ai_counter,.ai_bp_reactions_acted', function(e){
	e.preventDefault();
});


jQuery(document).on('touchstart click', '.ai_front', function(){
	jQuery('.ai_front').attr('disabled',true);
	var $this = jQuery(this);
	var id = jQuery(this).attr("ai_id");
	var check_value = jQuery(this).val();
	var main_url=jQuery('.web_url').val();
		var postData = {
			action: 'ai_front_smiley',
			id:id,
			check_value:check_value,
		}
		jQuery.ajax({
			method:"POST",
			url:ajaxurl,
			data:postData,
		 })	
		 .done(function( msg ) {
			 jQuery('.ai_front').removeAttr('disabled',true);
			 if(check_value == 1)
			 {
				  $this.val('0');
			 }
			else
			{
				 $this.val('1');
			}
		 });
});

function ai_ar_center_me(container,element) {
	var total_elements_width = ai_ar_get_meta_elements_width(element);
	//alert(total_elements_width);
    //pass element name to be centered on screen
    var pWidth = jQuery(container).parents("li.activity-item").width();
   // var pTop = jQuery(container).scrollTop()
    var eWidth = jQuery(element).parents("li.activity-item").find(".main_smiley_div ul").width();
    jQuery(element).parents("li.activity-item").find(".main_smiley_div").css('left', -parseInt(total_elements_width - (total_elements_width/2)) + 'px')
}

function ai_ar_get_meta_elements_width(selector)
{
var totalWidth = 0;
if(jQuery(selector).parents("li").find(".activity-meta .acomment-reply").length || jQuery(selector).parents("li").find(".activity-meta .fav").length || jQuery(selector).parents("li").find(".activity-meta .delete-activity").length || jQuery(selector).parents("li").find(".activity-meta .unfav").length || jQuery(selector).parents("li").find(".activity-meta .view").length)
{
var main = jQuery(selector).parents("li.activity-item").find(".activity-meta > a")
jQuery(main).each(function(index) {
	//alert(jQuery(this).outerWidth());
    totalWidth += parseInt(jQuery(this).outerWidth());
});	
	return totalWidth;
}
else
{
	return 0;
}

}

function ai_build_my_reactions(selector)
{
	var reaction_width=parseFloat(jQuery(selector).parents("li").find(".main_smiley_div > ul > li > a > img").first().css("width"))+8;
	
	var total_reactions=jQuery(selector).parents("li").find(".main_smiley_div > ul > li").length;
	var final_width=parseFloat(reaction_width)*parseInt(total_reactions);
	var main_reaction_parent_width=jQuery(selector).parents("li").width();
	jQuery(".main_smiley_div ul").width(final_width);
		// MAIN CASE 1 (IF TEXT-ALIGN IS NOT NULL)
		if( jQuery(selector).parents('div.activity-meta').css('text-align')  !== null )  { 
		
				if (jQuery('#buddypress div.activity-meta').css('text-align') == 'right')   // CASE 1 (IF TEXT-ALIGN IS RIGHT)
				{
				   jQuery(".main_smiley_div").css({"right":"1px","left":"auto"});
				} 
				else if (jQuery('#buddypress div.activity-meta').css('text-align') == 'left') 	// CASE 2 (IF TEXT-ALIGN IS LEFT)
				{
					// CASE (IF WIDTH IS LESS THEN 420)
					if(jQuery(window).width()<420) 
					{
						if (jQuery('#buddypress div.activity-meta').find('.delete-activity').css('display') == 'block')
						{
							// CASE (IF THE ELEMENTS ARE INLINE BLOCK)
							jQuery(".main_smiley_div").css({"left":"1px","right":"auto"});
						}
						else
						{
							// CASE (IF THE ELEMENTS ARE BLOCK)			
							jQuery(".main_smiley_div").css({"left":"1px","right":"auto"});							
						}
	
					}					
					else if(jQuery(window).width()<740) // CASE (IF WIDTH IS LESS THEN 740)
					{
						if (jQuery('#buddypress div.activity-meta').find('.delete-activity').css('display') == 'block')
						{
							// CASE (IF THE ELEMENTS ARE INLINE BLOCK)
							jQuery(".main_smiley_div").css({"left":"1px","right":"auto"});
						}
						else
						{
							// CASE (IF THE ELEMENTS ARE BLOCK)		
							ai_ar_center_me(selector,selector);							
						}
	
					}					
					else 	// CASE 3 (IF TEXT-ALIGN IS NOT THERE)
					{
						ai_ar_center_me(selector,selector);
					}
				}
		} 
		else { 
					ai_ar_center_me(selector,selector);	 
		}
}

function ai_bp_reactions_manage_actions(selector,module)
{
	var reaction_id=selector.find("img").attr('smiley_id');
	var activity=selector.parents('.activity-item').attr("id");
	var arr = activity.split('-');
	var activity_id = arr[1];
	
		selector.parents('.activity-meta').find('.main_smiley_div').hide();
		selector.parents('.activity-meta').find('.ai_bp_reactions_loader').css('display','inline');
		selector.parents('.activity-meta').find(".ai_emo_counter").hide();	
			var main_url=jQuery('.web_url').val();
			var postData = {
				action: 'ai_bp_reactions_manage_reactions',
				id:reaction_id,
				activity_id:activity_id,
			}
			jQuery.ajax({
				method:"POST",
				url:main_url,
				data:postData,
				dataType:'json',
			 }).done(function( msg ) {
					var user = msg['username'];
					var user_id = msg['user_id'];

					var reaction_count = msg['reaction_count'];


							var reaction_img = msg['reaction_img'];		
							var reaction_return_id = msg['reaction_id'];
							var reaction_name = msg['reaction_name'];	
							var main_reaction_count=jQuery.trim(reaction_count);

	
					selector.parents('.activity-meta').find(".ai_bp_reactions_default img").attr("src",reaction_img);	
					selector.parents('.activity-meta').find(".ai_bp_reactions_default img").attr("smiley_id",reaction_return_id);
					selector.parents('.activity-meta').find(".ai_bp_reactions_default span").text(reaction_name);
					selector.parents('.activity-meta').find(".ai_emo_counter").text(main_reaction_count);
					selector.parents('.activity-meta').find(".ai_emo_counter").show();
					selector.parents('.activity-meta').find('.ai_bp_reactions_loader').hide();

			  });
}
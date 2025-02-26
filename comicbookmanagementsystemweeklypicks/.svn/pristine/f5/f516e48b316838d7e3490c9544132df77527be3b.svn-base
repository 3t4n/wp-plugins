/**Javascript for CBMS Weekly Picks.*/

jQuery(document).ready(function($) 
{
	try
	{
		$parentwidth = $("#cbms_weekly_picks_holder").parent().width();
		if($parentwidth > 1320)
		  {	  
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "120%", "width": "42em", "float": "right", "margin-right": "8em", "margin-top":"0em"});		  
		  }
		else if($parentwidth > 1263)
		  {
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "120%", "width": "42em", "float": "right", "margin-right": "6em", "margin-top":"0em"});
		  }
		else if($parentwidth > 1007)
		  {		
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});		  
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "42em", "float": "right", "margin-right": "4em", "margin-top":"0em"});	  
		  }	
		else if($parentwidth > 847)
		  {	  
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "100%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});		  
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "42em", "float": "right", "margin-right": "0em", "margin-top":"0em"});	
		  }		
		else if($parentwidth > 500)
		  { 
			$("#cbms_weekly_picks_holder").css({"font-size": "85%"});	
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	  		  	  
		  }
		else if($parentwidth > 400)
		  { 
			$("#cbms_weekly_picks_holder").css({"font-size": "70%"});	 
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	  			
		  }	
		else
		  {
			$("#cbms_weekly_picks_holder").css({"font-size": "50%"});	 
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	 		  
		  }	
	}catch(err){}	
	
	try
	{
	   $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left")});	   
	   $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left")});							
	   $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left")});				
	   $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left")});				
	   $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left")});				
	   $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left")});				
	   $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left")});				
									
	   var count = 1;

	   function animate_display()
	   {
		 $("#cbms_weekly_pick_1").css({"transition":"3s"});  
		 $("#cbms_weekly_pick_2").css({"transition":"3s"});  		
		 $("#cbms_weekly_pick_3").css({"transition":"3s"});  
		 $("#cbms_weekly_pick_4").css({"transition":"3s"});  
		 $("#cbms_weekly_pick_5").css({"transition":"3s"});  
		 $("#cbms_weekly_pick_6").css({"transition":"3s"});  
		 $("#cbms_weekly_pick_7").css({"transition":"3s"});     
	   
		 if(count == 1)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
		   }
		else if(count == 2)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
		   }
		else if(count == 3)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
		   }		   
		else if(count == 4)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
		   }		   
		else if(count == 5)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
		   }
		else if(count == 6)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
		   }	
		else if(count == 7)
		   {
		     $("#cbms_weekly_pick_1").css({"top" : $("#cbms_weeklypick_1").position().top + "px", "margin-left" : $("#cbms_weeklypick_1").css("margin-left"), "width": $("#cbms_weeklypick_1").width() + "px", "height": $("#cbms_weeklypick_1").height() + "px"});	  
			 $("#cbms_weekly_pick_2").css({"top" : $("#cbms_weeklypick_2").position().top + "px", "margin-left" : $("#cbms_weeklypick_2").css("margin-left"), "width": $("#cbms_weeklypick_2").width() + "px", "height": $("#cbms_weeklypick_2").height() + "px"});	  
			 $("#cbms_weekly_pick_3").css({"top" : $("#cbms_weeklypick_3").position().top + "px", "margin-left" : $("#cbms_weeklypick_3").css("margin-left"), "width": $("#cbms_weeklypick_3").width() + "px", "height": $("#cbms_weeklypick_3").height() + "px"});	  
			 $("#cbms_weekly_pick_4").css({"top" : $("#cbms_weeklypick_4").position().top + "px", "margin-left" : $("#cbms_weeklypick_4").css("margin-left"), "width": $("#cbms_weeklypick_4").width() + "px", "height": $("#cbms_weeklypick_4").height() + "px"});	  
		     $("#cbms_weekly_pick_5").css({"top" : $("#cbms_weeklypick_5").position().top + "px", "margin-left" : $("#cbms_weeklypick_5").css("margin-left"), "width": $("#cbms_weeklypick_5").width() + "px", "height": $("#cbms_weeklypick_5").height() + "px"});	  
		     $("#cbms_weekly_pick_6").css({"top" : $("#cbms_weeklypick_6").position().top + "px", "margin-left" : $("#cbms_weeklypick_6").css("margin-left"), "width": $("#cbms_weeklypick_6").width() + "px", "height": $("#cbms_weeklypick_6").height() + "px"});	  
		     $("#cbms_weekly_pick_7").css({"top" : $("#cbms_weeklypick_7").position().top + "px", "margin-left" : $("#cbms_weeklypick_7").css("margin-left"), "width": $("#cbms_weeklypick_7").width() + "px", "height": $("#cbms_weeklypick_7").height() + "px"});	  
		   }		   
		 count++;
		 
		 if(count == 8)
		   {
			 count = 1;
		   }
		
	   }	
	   animate_display();
	   var call_animation = setInterval(animate_display, 8000);
	   
	}catch(err){}	
		
	

	  
	$(window).resize(function() 
	{
	  try
	  {
		$parentwidth = $("#cbms_weekly_picks_holder").parent().width();
		if($parentwidth > 1320)
		  {	  
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "120%", "width": "42em", "float": "right", "margin-right": "8em", "margin-top":"0em"});		  
		  }
		else if($parentwidth > 1263)
		  {
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "120%", "width": "42em", "float": "right", "margin-right": "6em", "margin-top":"0em"});
		  }
		else if($parentwidth > 1007)
		  {		
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "120%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});		  
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "42em", "float": "right", "margin-right": "4em", "margin-top":"0em"});	  
		  }	
		else if($parentwidth > 847)
		  {	  
			$("#cbms_weekly_picks_holder").css({"font-size": "100%"});	 
			$("#cbms_weekly_picks_tag").css({"display":"block", "position": "absolute", "top":"17em", "left":"4em", "font-size": "100%", "margin": "0em, 0em, 0em, 0em", "width":"12em", "padding": "0em, 0em, 0em, 0em"});		  
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "42em", "float": "right", "margin-right": "0em", "margin-top":"0em"});	
		  }		
		else if($parentwidth > 500)
		  { 
			$("#cbms_weekly_picks_holder").css({"font-size": "85%"});	
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	  		  	  
		  }
		else if($parentwidth > 400)
		  { 
			$("#cbms_weekly_picks_holder").css({"font-size": "70%"});	 
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	  			
		  }	
		else
		  {
			$("#cbms_weekly_picks_holder").css({"font-size": "50%"});	 
			$("#cbms_weekly_picks_tag").css({"position": "relative", "top":"2em", "left":"50%", "font-size": "100%", "margin": "0em, -6em, 0em, 0em", "width":"12em", "padding": "3em, 0em, 0em, 0em"});	
			$("#cbms_weekly_picks").css({"font-size": "100%", "width": "100%", "margin-right":"0em", "margin-top":"9em"});	 		  
		  }
	 	}catch(err){}	 
	});

});





jQuery(document).ready(function($)
	{
		
		
		$(document).on('click', '.tab-nav li', function()
			{
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})
		

		
		$(document).on('click', '.new_user_profile_social', function()
			{
				var user_profile_social = prompt("Please add new social site","");
				
				$(".user-profile-social").append('<input type="text" name="author_box_user_profile_social['+user_profile_social+']" value="'+user_profile_social+'"  /><br />');

			
		
			})

		
		

		
	
 		

	});	








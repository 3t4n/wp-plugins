jQuery(function($)
{
  $(document).ready(function()
	{
	$('.text-slider-how-to-each-bar').click(function()
	{
		var each_user_role_id = $(this).attr('data-user-role');
         $('#' + each_user_role_id ).slideToggle();
        if ($('#' + 'text-sliders-bar-item-' + each_user_role_id).text() == '+')
        {
        	 $('#' + 'text-sliders-bar-item-' + each_user_role_id).text('-');
        }
        else
        {
        	if ($('#' + 'text-sliders-bar-item-' + each_user_role_id).text() == '-')
        	{
        		$('#' + 'text-sliders-bar-item-' + each_user_role_id).text('+');
        	}
        }
      });
   });
});
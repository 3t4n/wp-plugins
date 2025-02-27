jQuery(document).ready(function($) 
{
	$('.peekaboo_link').click(function(e)
	{
		e.preventDefault();

		var name = get_name(this);

		var link = $('.peekaboo_link.peekaboo-'+name);

		if (name == 'all')
		{
			var content = $('.peekaboo_content');

			$('.peekaboo_onhide, .peekaboo_onshow','.peekaboo_link').hide();
			
			/* check if at least one is hidden */
			if (content.filter(':hidden').length) 
			{
				link.add(content).removeClass('peekaboo_onhide').addClass('peekaboo_onshow');

				content.show();
				$('.peekaboo_onshow','.peekaboo_link').show();
			}
			else 
			{
				link.add(content).removeClass('peekaboo_onshow').addClass('peekaboo_onhide');

				content.hide();
				$('.peekaboo_onhide','.peekaboo_link').show();
			}
		}
		else
		{
			var content = $('.peekaboo_content.peekaboo-'+name);

			if (content.filter(':visible').length)
			{
				set_hidden(link, content);
			}
			else 
			{
				if ('undefined' != typeof peekaboo_collapse_all && peekaboo_collapse_all)
				{
					hide_all();
				}

				set_visible(link, content);
			}

			var all_link = $('.peekaboo_link.peekaboo-all');

			/* check if at least one is hidden */
			if ($('.peekaboo_content:hidden').length)
			{
				$('.peekaboo_onhide, .peekaboo_onshow',all_link).hide();
				$('.peekaboo_onhide',all_link).show();
			}

			/* check if all are visible */
			if (!$('.peekaboo_content:hidden').length)
			{
				$('.peekaboo_onhide, .peekaboo_onshow',all_link).hide();
				$('.peekaboo_onshow',all_link).show();
			}
		}
	});

	$('.peekaboo_link').each(function(e)
	{
		var name = get_name(this);

		var content = $('.peekaboo_content.peekaboo-'+name);

		$('.peekaboo_onhide, .peekaboo_onshow', this).hide();
		
		if (content.filter(':visible').length) 
		{
			$('.peekaboo_onshow', this).show();
		}
		else 
		{
			$('.peekaboo_onhide', this).show();
		}
	});

	function hide_all()
	{
		$('.peekaboo_content').hide();

		$('.peekaboo_onhide, .peekaboo_onshow', '.peekaboo_link').hide();

		$('.peekaboo_onhide', '.peekaboo_link').show();
	}

	function set_hidden(link, content)
	{
		$(link).add(content).removeClass('peekaboo_onshow').addClass('peekaboo_onhide');
		
		$(content).hide();

		$('.peekaboo_onshow', link).hide();

		$('.peekaboo_onhide', link).show();
	}

	function set_visible(link, content)
	{
		$(link).add(content).removeClass('peekaboo_onhide').addClass('peekaboo_onshow');

		$(content).show();

		$('.peekaboo_onhide', link).hide();

		$('.peekaboo_onshow', link).show();
	}

	function get_name(elem)
	{
		// try
		// return $(elem).attr('class').match(/peekaboo-(\w*)/i)[1];

		var css_class = $(elem).attr('class').split(' ');

		css_class = $.grep(css_class,function(e,i)
		{
			return (e.substr(0,9) == 'peekaboo-');
		});

		return css_class[0].split('-')[1];
	}
});

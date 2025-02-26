(function($) {

$( document ).ready(function() 
{
	//tabs
	$("#fantasticmenu-admintabs").tabs();

    //add a new menu section
    $(document).on('click', 'input.add-a-menu-section', function()
    {

		var menusectioncount = $("input#section_count").val();
		var s = Number(menusectioncount) + 1;
			
		var data = {
		'action': 'fwl_add_restaurant_menu_section',
		's': s
		};


		$.post(ajaxurl, data, function(response) 
		{
			$('div#restaurant-menu-accordion').append(response);
			$("input#section_count").val(s);
		});	
    });	


    //delete a menu section
    $(document).on('click', 'a.delete-this-menu-section', function()
    {
    	var result = confirm("Are you sure you want to delete this section and all the menu items in it?");
		if (result) {
		    $(this).parent().parent("div.single-menu-section-wrap").remove();
		}	
    	
    });


	//add a new menu item
	$(document).on('click', 'input.add-new-menu-item', function()
	{		
		var itemcount = $(this).siblings('.menuitemcount').val();
		
		var i = parseInt(itemcount) + 1;

		var s = $(this).siblings("input.counter").val();

		var data = {
		'action': 'fwl_add_restaurant_menu_item',
		'i': i,
		's':s
		};


		$.post(ajaxurl, data, function(response) 
		{
			$('div#section_'+s+'_wrapper').find('div.menu-items-wrapper').append(response);
			// $('div#section_'+s+'_menu-item-'+(i-1)).after(response);

			var itemcount = $("input#section_"+s+"_menuitemcount").val();
			itemcount++;
			$("input#section_"+s+"_menuitemcount").val(itemcount);
			// $( "#restaurant-menu-accordion" ).accordion("refresh");
		});	
	});


	//delete a menu item
	$(document).on('click', 'input.delete-item-button', function()
	{
			$(this).parent().parent("div.menu-item-section").remove();
	});	



	//sortable menu sections
    $("#restaurant-menu-accordion").sortable({
    	items: 'div.single-menu-section-wrap',
    	handle: ".sort-menu-section",
    	axis: "y",

    });

    $("#restaurant-menu-accordion").on( "sortstop", function( event, ui ) {

    	//Re-assign using index number
        $.map($(this).children('.single-menu-section-wrap'), function(el) {
					
			var sectionID = $(el).index();				
			var sectionOrder = $(el).find('input.section-order-number');

			$(sectionOrder).val(sectionID);
        });
    });

    //sortable menu items
    $(".menu-items-wrapper").sortable({
    	items: 'div.menu-item-section',
    	// handle: ".sort-menu-section",
    	axis: "y",

    });


    $(".menu-items-wrapper").on( "sortstop", function( event, ui ) {

    	//Re-assign using index number
        $.map($(this).children('div.menu-item-section'), function(el) {
					
			var itemOrderID = $(el).index();				
			var itemOrder = $(el).find('input.item-order-number');

			$(itemOrder).val(itemOrderID);
        });
    });


	//add a price option
	$(document).on('click', 'input.add-price-option', function()
	{		
			var x = $(this).siblings("input.counter").val();
			x++;
			var i = $(this).parent().parent().siblings("input.counter").val();
			var s = $(this).parent().parent().parent().parent().parent().siblings("input.counter").val();

			var data = {
			'action': 'fwl_add_restaurant_menu_price_option',
			's' : s,
			'i' : i,
			'x': x
			};


			$.post(ajaxurl, data, function(response) 
			{
				$('div#section_'+s+'_item-'+i+'_price-option-'+(x-1)).after(response).addClass( 'notlast').removeClass('last');
				$('input#section_'+s+'_item_'+i+'_option_count').val(x);
			});	
	});

	//delete a price option
	$(document).on('click', 'input.remove-price-option', function()
	{
			$(this).parent("div.single-price-option").remove();
	});	

	//Toggle button  Single.Multi price options
	$(document).on('click', '.menu-item-section a.toggler', function()
    {
        $(this).toggleClass('off');

        test = $(this).hasClass("off");

        if(test){
        	console.log('turned off');
        	$(this).parent().siblings("input.item-price-box").prop('readonly', false);
        	$(this).parent().siblings("div.price-options-box").slideUp(200).addClass( 'pricetype_single').removeClass('pricetype_multi');
        	$(this).parent().siblings("input.menuitem_pricetype").val('single');

        }else{
        	console.log('turned on');
        	$(this).parent().siblings("input.item-price-box").prop('readonly', true);
        	$(this).parent().siblings("div.price-options-box").slideDown(200).addClass( 'pricetype_multi').removeClass('pricetype_single');
        	$(this).parent().siblings("input.menuitem_pricetype").val('multi');

        }
    });

    //Toggle button  if/use theme default
	$(document).on('click', 'section.setting-color a.toggler', function()
    {
        $(this).toggleClass('off');
        
        test = $(this).hasClass("off");

        if(test){
        	console.log('switch to use theme default');
        	$(this).siblings('label').text('theme default');
        	$(this).parent().siblings("div.sp-replacer").hide();
        	$(this).parent().siblings("input.hidden-input-for-switch").val('theme default');

        }else{
        	console.log('switch to use customize color');
        	$(this).siblings('label').text('customize color');
        	$(this).parent().siblings("div.sp-replacer").css('display', 'inline-block');
        	$(this).parent().siblings("input.hidden-input-for-switch").val('customize color');
        }
    });


    //Toggle Menu section
	$(document).on('click', 'a.menu-section-header-toggle', function()
	{
	    $(this).toggleClass('off');

	    test = $(this).hasClass("off");

	    if(test)
	    {
	    	//console.log('turned off');
	    	$(this).parent("h3").next("div.single-menu-section-content").slideUp(200);
	    	$(this).parent("h3").next("div.single-menu-section-content").find("input.displayStatus").val('off');


	    }else{
	    	//console.log('turned on');
	    	$(this).parent("h3").next("div.single-menu-section-content").slideDown(200);
	    	$(this).parent("h3").next("div.single-menu-section-content").find("input.displayStatus").val('on');

	    }
    });



	//Color Picker
	$(".colorpicker").spectrum({
        preferredFormat: "hex",
        showAlpha: true,
        showInput: true,
        showPalette: true,
        hide: function(color) {
            $(this).attr('value',color);
        }
    });

	//hide & show different options based on number of columns selected
	$(document).on('change', "#set-number-of-columns", function()
	{
		var number_of_columns = $("#set-number-of-columns option:selected").val();

		switch(number_of_columns) {
			    case '1':
			        $("#column-one-end-configuration").hide();
			        $("#column-two-end-configuration").hide();
			        break;
			    case '2':
			        $("#column-one-end-configuration").show();
			        $("#column-two-end-configuration").hide();
			        break;
		        case '3':
			        $("#column-one-end-configuration").show();
			        $("#column-two-end-configuration").show();
			        break;
		}

	});

	//restore to skin default font
	$(document).on('click', 'a.skin-default', function()
	{
		var active_skin = $('.active_skin').find(':selected').val();
		
		var select = $(this).siblings('select');

		var field = select.attr('name');

		var data = {
			'action': 'fwl_get_skin_default_value',
			'skin': active_skin,
			'field': field,
		};

		$.post(ajaxurl, data, function(response) 
		{
			console.log(response);
			select.val(response);
		});	
	});	
});
})(jQuery);
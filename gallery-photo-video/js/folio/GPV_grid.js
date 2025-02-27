(function( $ ){
	$.fn.GPVGRID = function(option) {
		var obj = $.extend(option);
		var column=obj.column;			
		var instance=jQuery(this);
		var gpv_container=jQuery('.gpv_container');
		var grid_item=jQuery('.grid-item');
		var grid_details=jQuery('.grid-details');
		var grid_close=jQuery('.grid-close');
		var grid_arrow=jQuery('.grid-arrow');
		var grid_thumbnail=jQuery('.grid-thumbnail');

		var grid_width=jQuery(this).width();
		var grid_main_obj=jQuery(this).find(grid_item);				

		if(column<=4){
			max_width=100;		
			var per_column_width=(max_width/column)-0.1;
			grid_main_obj.css({'width':per_column_width+'%'});
			instance.show();
		}

		instance.find(grid_thumbnail).click(function(){			
			var height=jQuery(this).next().height();	
			height=height+15;			
			gpv_container.removeClass('gpv_bg_color');
			gpv_container.find(grid_thumbnail).removeClass('img-open');

			gpv_container.find(grid_details).removeClass('grid-open');
			gpv_container.find(grid_item).find(grid_arrow).fadeOut();
			gpv_container.find(grid_item).css({'margin-bottom':0});
			gpv_container.find(grid_item).find(grid_details).fadeOut();

			instance.find(grid_thumbnail).find(grid_arrow).fadeOut();
			instance.find(grid_thumbnail).parent().css({'margin-bottom':0});
			instance.find(grid_thumbnail).next().fadeOut();

			instance.addClass('gpv_bg_color');
			jQuery(this).find(grid_arrow).fadeIn();
			jQuery(this).parent().css({'margin-bottom':height+'px'});			
			jQuery(this).addClass('img-open');
			jQuery(this).next().fadeIn().addClass('grid-open');
			jQuery(this).next().find('img').addClass('zoomIn_gpv');
			jQuery(this).next().find('h2').addClass('bounceInDown_gpv');
			jQuery(this).next().find('p').addClass('fadeIn_gpv');				
			
		});

instance.find(grid_close).click(function(){			
	instance.find(this).parent().slideUp(function(){
		jQuery(this).removeClass('grid-open');				
		jQuery(this).parent().find(grid_arrow).hide();		
		jQuery(this).parent().css({'margin-bottom':0});
		jQuery(this).parents('.gpv_container').removeClass('gpv_bg_color');
	});
});		

jQuery(window).resize(function(){
	var resize_height=instance.find('.grid-open').height();
	resize_height=resize_height+15;
	instance.find('.grid-open').parent().css({'margin-bottom':resize_height+'px'});			
});
return this;
}; 
})( jQuery );

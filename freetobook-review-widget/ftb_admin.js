var ftb_reviews_widget_ranges={}
ftb_reviews_widget_ranges.mini=[150,250]
ftb_reviews_widget_ranges.reviews=[250,350]
ftb_reviews_widget_ranges.combined=[250,350]
ftb_reviews_widget_ranges.narrow=[160,250]
ftb_reviews_widget_ranges.search=[250,350]
ftb_reviews_widget_ranges.thin=[385,420]


function ftb_reviews_update_slider_range(id,type)
{
	var sliderId='#ftb_review_slider_'+id;
	var widthId='#ftb_review_width_'+id;

	var vals=ftb_reviews_widget_ranges[type];
	
	jQuery(sliderId).slider('option','min',vals[0]);
	jQuery(sliderId).slider('option','max',vals[1]);
	if (jQuery(widthId).val()<vals[0]) 
	{
		jQuery(widthId).val(vals[0])
		jQuery(sliderId).slider('value',vals[0]);
	}
	
	if (jQuery(widthId).val()>vals[1]) 
	{
		jQuery(widthId).val(vals[1])
		jQuery(sliderId).slider('value',vals[1]);
	}

	
}

function ftb_reviews_add_handlers()
{
	jQuery('.ftbr_style_radio').bind('click',function(){

		var name=jQuery(this).attr('name');
		var id=name.match(/\[([0-9]*)\]/);
		
		jQuery('#ftb_review_widget_preview_' + id[1]).css('background-image',"url('" + freetobook_reviews_params.base_url + '/images/previews/' + jQuery(this).val() + ".png')");
		ftb_reviews_update_slider_range(id[1],jQuery(this).val());
	});


	jQuery('.ftb_slider').each(function(){

		var id=this.id.match(/ftb_review_slider_([0-9]*)/);
		var	wid=this.id.replace('slider','width');
		var value=jQuery('#' + wid ).val();
		var type=jQuery('input[name="widget-freetobook_reviews['+ id[1] +'][style]"]:checked').val()
		var range=ftb_reviews_widget_ranges[type];

		if (!range) range=[150,400];

		jQuery(this).slider({
			min:range[0],
			max:range[1],
			value:value,
			slide:function(event,ui){
				var	id=this.id.replace('slider','width');
				jQuery('#' + id).val(ui.value)	
			}
		});
	});

	
}

jQuery(document).ready(function() {

	ftb_reviews_add_handlers();

	/* hook into save handler */
	jQuery(document).ajaxSuccess(function(e, xhr, settings) { 
        var widget_id_base = 'freetobook_reviews';

        if(settings.data.search('action=save-widget') != -1 && 
			settings.data.search('id_base=' + widget_id_base) != -1) { 
            ftb_reviews_add_handlers();			
			
        } 
	});	
});
jQuery(document).ready(function($){
	$('.thumb').click(function(){
		cat=$(this).attr('data-cat');
		pwidth=$(this).attr('data-pwidth');
		pheight=$(this).attr('data-pheight');
		vid=$(this).attr('data-vid');
		if(cat===undefined){
			cat='none';
		}
		json=$(this).find('div.playlist').html();
		obj = $.parseJSON(json);
		$('body').append("<table class='flashbox' data-cat='"+cat+"'><tr><td><div class='flashbox-container'><iframe width='"+pwidth+"' height='"+pheight+"' src='https://www.youtube.com/embed/"+vid+"' frameborder='0' allowfullscreen></iframe></div></td></tr></table>");
		 $('.flashbox td div').append("<div class='playlist'></div>");

	});
	$(document).on('click','.flashbox',function(){
		$(this).remove();
	});
});
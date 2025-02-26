jQuery(document).ready(function($){
	setInterval(function(){
		$('.cloud').first().css({'overflow':'hidden'}).animate({'opacity':'0','height':'0px'},function(){
			$(this).remove();
		});
	},3000);

	$('.categories-title').mouseover(function(){
		$('.categories-shortcode').css({'display':'none'});
		$(this).next().css({'display':'block'});
	});
});

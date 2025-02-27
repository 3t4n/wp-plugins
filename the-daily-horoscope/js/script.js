jQuery(function(){
	jQuery(".daily-horoscope-star").change(function(){
		jQuery.get("http://dailyhoroscopeplugin.com/horoscope/",{type:jQuery(this).val()},function(data){
			jQuery(".daily-horoscope-display").empty().append(data);
		},'json');
	});
});
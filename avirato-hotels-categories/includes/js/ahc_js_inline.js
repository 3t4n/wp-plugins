jQuery(document).ready(function() {
	jQuery(".photo").click(function() {
		var clickedClass = jQuery(this).attr("class");
		var clickedStyle = jQuery(this).attr("style");
		var stage = jQuery(this).parent('.gallery-roundup').find('.stage').attr("class");
		jQuery(this).parent('.gallery-roundup').find('.stage').attr("class", clickedClass);
		jQuery(this).attr("class", stage).removeAttr("style");
	});
});
jQuery(document).ready(function() {
	var url = window.location.href;
	if (url.indexOf('?lang=en') > -1 || url.indexOf('/en/') > -1 || jQuery('html').attr('lang') == 'en-US' || jQuery('html').attr('lang') == 'EN' || jQuery('html').attr('lang') == 'en-GB') {
		jQuery(".descCat.CatEn").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgEn").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Maximum capacity:');
		jQuery(".ahc_serv b").text('Services');
		jQuery(".ahcButton").text('BOOK NOW');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=en');
		});
	}else if(url.indexOf('?lang=fr') > -1 || url.indexOf('/fr/') > -1 || jQuery('html').attr('lang') == 'fr-FR' || jQuery('html').attr('lang') == 'FR'){
		jQuery(".descCat.CatFr").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgFr").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Capacité maximale:');
		jQuery(".ahc_serv b").text('Les services');
		jQuery(".ahcButton").text('POUR RÉSERVER');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=fr');
		});
	}else if(url.indexOf('?lang=it') > -1 || url.indexOf('/it/') > -1 || jQuery('html').attr('lang') == 'it-IT' || jQuery('html').attr('lang') == 'IT'){
		jQuery(".descCat.CatIt").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgEn").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Capacità massima:');
		jQuery(".ahc_serv b").text('Servizi');
		jQuery(".ahcButton").text('PER PRENOTARE');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=it');
		});
	}else if(url.indexOf('?lang=de') > -1 || url.indexOf('/de/') > -1 || jQuery('html').attr('lang') == 'de-DE' || jQuery('html').attr('lang') == 'DE'){
		jQuery(".descCat.CatDe").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgEn").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Maximale Kapazität:');
		jQuery(".ahc_serv b").text('Dienstleistungen');
		jQuery(".ahcButton").text('ZU BUCHEN');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=de');
		});
	}else if(url.indexOf('?lang=cat') > -1 || url.indexOf('/cat/') > -1 || jQuery('html').attr('lang') == 'ca' || jQuery('html').attr('lang') == 'CA'){
		jQuery(".descCat.CatCat").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".catMaxCap span").text('Capacitat Màxima:');
		jQuery(".ahc_serv b").text('Serveis');
		jQuery(".ahcButton").text('RESERVAR');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=cat');
		});
	}else if(url.indexOf('?lang=pt') > -1 || url.indexOf('/pt/') > -1 || jQuery('html').attr('lang') == 'pt-PT' || jQuery('html').attr('lang') == 'PT'){
		jQuery(".descCat.CatPt").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgEn").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Capacidade máxima:');
		jQuery(".ahc_serv b").text('Serviços');
		jQuery(".ahcButton").text('RESERVAR');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=pt');
		});
	}else if(url.indexOf('?lang=ru') > -1 || url.indexOf('/ru/') > -1 || jQuery('html').attr('lang') == 'ru-RU' || jQuery('html').attr('lang') == 'RU'){
		jQuery(".descCat.CatRu").css('display','block');
		jQuery(".descCat.CatEsp").css('display','none');
		jQuery(".engineIcon .ahcIconImgEn").css('display','block');
		jQuery(".engineIcon .ahcIconImgEs").css('display','none');
		jQuery(".catMaxCap span").text('Максимальная емкость:');
		jQuery(".ahc_serv b").text('услуги');
		jQuery(".ahcButton").text('ЗАБРОНИРОВАТЬ');
		jQuery(".ahcButton").each(function(){
			jQuery(this).attr('href', jQuery(this).attr('href')+'&lang=ru');
		});
	}
});

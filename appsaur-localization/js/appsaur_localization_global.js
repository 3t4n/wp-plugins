jQuery(document).ready(function(){
	jQuery('.run').click();
});

jQuery(document).on('click','.al-action-btn',function(){
	mth=jQuery(this).attr('mth');
	if(mth.trim()=='undefined'){
		mth='main';
	}
	params=jQuery(this).attr('params').replace(/:/gi,'=').replace(/;/gi,'&');
	tg='#'+jQuery(this).attr('tg');
	jQuery.post(ajaxurl,'action=appsaur_localization_'+mth+'_controller&'+params,function(d){
		jQuery(tg).html(d);
	},'html');
});
jQuery(document).on('click','.al-save-btn',function(){
	data=jQuery('#data-form').serialize();
	mth=jQuery(this).attr('mth');
	if(mth.trim()=='undefined'){
		mth='main';
	}
	params=jQuery(this).attr('params').replace(/:/gi,'=').replace(/;/gi,'&');
	tg='#'+jQuery(this).attr('tg');
	jQuery.post(ajaxurl,'action=appsaur_localization_'+mth+'_controller&'+params+data,function(d){
		jQuery(tg).html(d);
	},'html');
	return false;
});

setInterval(function(){
	jQuery('.run').click();
},500);

jQuery(document).on('click','.run',function(){
	jQuery(this).remove();
});




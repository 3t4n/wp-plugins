jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
});

function showTemplates(){
	document.getElementById("ageverify-gallery").style.display = "initial";
	document.getElementById("ageverify-custombg").style.display = "none";
	document.getElementById('img-upload').style.backgroundColor = '#666';
	document.getElementById('img-remove').style.backgroundColor = '#82c240';
}

function showCustom(){
	document.getElementById("ageverify-gallery").style.display = "none";
	document.getElementById("ageverify-custombg").style.display = "initial";
	document.getElementById('img-upload').style.backgroundColor = '#82c240';
	document.getElementById('img-remove').style.backgroundColor = '#666';
}

jQuery(document).ready(function(){
   jQuery('#img-upload').click(function(e){
        e.preventDefault();
        var upload = wp.media({
        title:'Choose Image', //Title for Media Box
        multiple:false //For limiting multiple image
        })
        .on('select', function(){
            var select = upload.state().get('selection');
            var attach = select.first().toJSON();
            console.log(attach.id); //the attachment id of image
            console.log(attach.url); //url of image
            jQuery('#img-src').attr('src',attach.url);
			jQuery('#altbackground').attr('value',attach.url);
		document.getElementById('img-upload').innerHTML = 'Change Image';
		document.getElementById('img-src').style.display = 'initial';
		document.getElementById('ageverify-gallery').style.display = 'none';
        })
        .open();
   });
});

jQuery(document).ready(function(){
   jQuery('#img-remove').click(function(e){
            jQuery('#img-src').attr('src','');
			jQuery('#altbackground').attr('value','');
	   document.getElementById('img-upload').innerHTML = 'Upload Your Own';
	   document.getElementById('img-src').style.display = 'none';
	   document.getElementById('ageverify-gallery').style.display = 'initial';
   });
});

jQuery(document).ready(function(){
   jQuery('#altlogoselect').click(function(e){
        e.preventDefault();
        var upload = wp.media({
        title:'Choose Image', //Title for Media Box
        multiple:false //For limiting multiple image
        })
        .on('select', function(){
            var select = upload.state().get('selection');
            var attach = select.first().toJSON();
            console.log(attach.id); //the attachment id of image
            console.log(attach.url); //url of image
            jQuery('#logoimg-src').attr('src',attach.url);
			jQuery('#altlogo').attr('value',attach.url);
        })
        .open();
   });
});
/*
jQuery(document).ready(function(){
   jQuery('#avlogoselect').click(function(e){
            jQuery('#logoimg-src').attr('src','');
			jQuery('#altlogo').attr('value','');
   });
});*/







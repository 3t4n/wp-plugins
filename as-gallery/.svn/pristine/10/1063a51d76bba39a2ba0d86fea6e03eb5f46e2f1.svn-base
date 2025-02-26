!function($,t,i,s){"use strict";var o=function(){return this.init.apply(this,arguments)};o.prototype={defaults:{onstatechange:function(){},isRange:!1,showLabels:!0,showScale:!0,step:1,format:"%s",theme:"theme-green",width:300,disable:!1},template:'<div class="slider-container">          <div class="back-bar">                <div class="selected-bar"></div>                <div class="pointer low"></div><div class="pointer-label">123456</div>                <div class="pointer high"></div><div class="pointer-label">456789</div>                <div class="clickable-dummy"></div>            </div>            <div class="scale"></div>       </div>',init:function(t,i){this.options=$.extend({},this.defaults,i),this.inputNode=$(t),this.options.value=this.inputNode.val()||(this.options.isRange?this.options.from+","+this.options.from:this.options.from),this.domNode=$(this.template),this.domNode.addClass(this.options.theme),this.inputNode.after(this.domNode),this.domNode.on("change",this.onChange),this.pointers=$(".pointer",this.domNode),this.lowPointer=this.pointers.first(),this.highPointer=this.pointers.last(),this.labels=$(".pointer-label",this.domNode),this.lowLabel=this.labels.first(),this.highLabel=this.labels.last(),this.scale=$(".scale",this.domNode),this.bar=$(".selected-bar",this.domNode),this.clickableBar=this.domNode.find(".clickable-dummy"),this.interval=this.options.to-this.options.from,this.render()},render:function(){return 0!==this.inputNode.width()||this.options.width?(this.domNode.width(this.options.width||this.inputNode.width()),this.inputNode.hide(),this.isSingle()&&(this.lowPointer.hide(),this.lowLabel.hide()),this.options.showLabels||this.labels.hide(),this.attachEvents(),this.options.showScale&&this.renderScale(),void this.setValue(this.options.value)):void console.log("jRange : no width found, returning")},isSingle:function(){return"number"==typeof this.options.value?!0:-1!==this.options.value.indexOf(",")||this.options.isRange?!1:!0},attachEvents:function(){this.clickableBar.click($.proxy(this.barClicked,this)),this.pointers.on("mousedown touchstart",$.proxy(this.onDragStart,this)),this.pointers.bind("dragstart",function(t){t.preventDefault()})},onDragStart:function(t){if(!(this.options.disable||"mousedown"===t.type&&1!==t.which)){t.stopPropagation(),t.preventDefault();var s=$(t.target);this.pointers.removeClass("last-active"),s.addClass("focused last-active"),this[(s.hasClass("low")?"low":"high")+"Label"].addClass("focused"),$(i).on("mousemove.slider touchmove.slider",$.proxy(this.onDrag,this,s)),$(i).on("mouseup.slider touchend.slider touchcancel.slider",$.proxy(this.onDragEnd,this))}},onDrag:function(t,i){i.stopPropagation(),i.preventDefault(),i.originalEvent.touches&&i.originalEvent.touches.length?i=i.originalEvent.touches[0]:i.originalEvent.changedTouches&&i.originalEvent.changedTouches.length&&(i=i.originalEvent.changedTouches[0]);var s=i.clientX-this.domNode.offset().left;this.domNode.trigger("change",[this,t,s])},onDragEnd:function(t){this.pointers.removeClass("focused"),this.labels.removeClass("focused"),$(i).off(".slider")},barClicked:function(t){if(!this.options.disable){var i=t.pageX-this.clickableBar.offset().left;if(this.isSingle())this.setPosition(this.pointers.last(),i,!0,!0);else{var s=Math.abs(parseInt(this.pointers.first().css("left"),10)-i+this.pointers.first().width()/2)<Math.abs(parseInt(this.pointers.last().css("left"),10)-i+this.pointers.first().width()/2)?this.pointers.first():this.pointers.last();this.setPosition(s,i,!0,!0)}}},onChange:function(t,i,s,o){var e,n;i.isSingle()?(e=0,n=i.domNode.width()):(e=s.hasClass("high")?i.lowPointer.position().left+i.lowPointer.width()/2:0,n=s.hasClass("low")?i.highPointer.position().left+i.highPointer.width()/2:i.domNode.width());var h=Math.min(Math.max(o,e),n);i.setPosition(s,h,!0)},setPosition:function(t,i,s,o){var e,n=this.lowPointer.position().left,h=this.highPointer.position().left,a=this.highPointer.width()/2;s||(i=this.prcToPx(i)),t[0]===this.highPointer[0]?h=Math.round(i-a):n=Math.round(i-a),t[o?"animate":"css"]({left:Math.round(i-a)}),e=this.isSingle()?0:n+a,this.bar[o?"animate":"css"]({width:Math.round(h+a-e),left:e}),this.showPointerValue(t,i,o),this.isReadonly()},setValue:function(t){var i=t.toString().split(",");this.options.value=t;var s=this.valuesToPrc(2===i.length?i:[0,i[0]]);this.isSingle()?this.setPosition(this.highPointer,s[1]):(this.setPosition(this.lowPointer,s[0]),this.setPosition(this.highPointer,s[1]))},renderScale:function(){for(var t=this.options.scale||[this.options.from,this.options.to],i=Math.round(100/(t.length-1)*10)/10,s="",o=0;o<t.length;o++)s+='<span style="left: '+o*i+'%">'+("|"!=t[o]?"<ins>"+t[o]+"</ins>":"")+"</span>";this.scale.html(s),$("ins",this.scale).each(function(){$(this).css({marginLeft:-$(this).outerWidth()/2})})},getBarWidth:function(){var t=this.options.value.split(",");return t.length>1?parseInt(t[1],10)-parseInt(t[0],10):parseInt(t[0],10)},showPointerValue:function(t,i,o){var e=$(".pointer-label",this.domNode)[t.hasClass("low")?"first":"last"](),n,h=this.positionToValue(i);if($.isFunction(this.options.format)){var a=this.isSingle()?s:t.hasClass("low")?"low":"high";n=this.options.format(h,a)}else n=this.options.format.replace("%s",h);var l=e.html(n).width(),r=i-l/2;r=Math.min(Math.max(r,0),this.options.width-l),e[o?"animate":"css"]({left:r}),this.setInputValue(t,h)},valuesToPrc:function(t){var i=100*(t[0]-this.options.from)/this.interval,s=100*(t[1]-this.options.from)/this.interval;return[i,s]},prcToPx:function(t){return this.domNode.width()*t/100},positionToValue:function(t){var i=t/this.domNode.width()*this.interval;return i+=this.options.from,Math.round(i/this.options.step)*this.options.step},setInputValue:function(t,i){if(this.isSingle())this.options.value=i.toString();else{var s=this.options.value.split(",");this.options.value=t.hasClass("low")?i+","+s[1]:s[0]+","+i}this.inputNode.val()!==this.options.value&&(this.inputNode.val(this.options.value),this.options.onstatechange.call(this,this.options.value))},getValue:function(){return this.options.value},isReadonly:function(){this.domNode.toggleClass("slider-readonly",this.options.disable)},disable:function(){this.options.disable=!0,this.isReadonly()},enable:function(){this.options.disable=!1,this.isReadonly()},toggleDisable:function(){this.options.disable=!this.options.disable,this.isReadonly()}};var e="jRange";$.fn[e]=function(i){var s=arguments,n;return this.each(function(){var h=$(this),a=$.data(this,"plugin_"+e),l="object"==typeof i&&i;a||(h.data("plugin_"+e,a=new o(this,l)),$(t).resize(function(){a.setValue(a.getValue())})),"string"==typeof i&&(n=a[i].apply(a,Array.prototype.slice.call(s,1)))}),n||this}}(jQuery,window,document);


jQuery(document).ready(function($){
	var pophtml = '<div class="as_ga_main_overlay"></div>'+
				 '<div class="as_gl_main_popup">'+
				 	'<div class="as_gl_main_content">'+
				 		'<div class="as_gl_inner_content">'+
				 			'<div class="as_gl_image">'+
				 			'</div>'+
				 			'<div class="as_gl_content">'+
				 				'<form action="#" id="as_gl_popup_form">'+
				 					'<label for="as_enter_title">Title</label>'+
				 					'<p><input class="widefat" type="text" Placeholder="Title" value="" id="as_enter_title" /></p>'+
				 					'<label for="as_enter_alt_text">Alt Text</label>'+
				 					'<p><input class="widefat" type="text" Placeholder="Alt Text" value="" id="as_enter_alt_text" /></p>'+
				 					'<button id="as_gl_insert">Insert</button>'+
				 					'<span id="as_image_id" style="display:none;" as-imgid=""></span>'+
				 					'<span id="as_image_thamb" style="display:none;" as-imgthamb=""></span>'+
				 				'</form>'+
				 			'</div>'+
				 			'<ul class="as_gl_button">'+
				 				'<li><a class="button" id="as_gl_upload" href="javascript:void(0)">Upload</a></li>'+
				 				'<li><a class="button" id="as_gl_cancel" href="javascript:void(0)">Cancel</a></li>'+
				 				'<li><label for="as_gl_insert" class="button button-primary button-large" id="as_gl_insert" href="javascript:void(0)">Insert</label></li>'+
				 			'</li>'+
				 		'</div>'+
				 	'</div>'+
				 '</div>';

$('html body').append(pophtml);	

$('li#as_add_new_gallery').on('click', function(){
	$('.as_ga_main_overlay, .as_gl_main_popup').fadeIn(300);	

});	

$('#as_gl_cancel').on('click', function(){
	$('.as_ga_main_overlay, .as_gl_main_popup').fadeOut(300);
});
$('form#as_gl_popup_form').on('submit', function(e){	
	e.preventDefault();
	var titleval = $('#as_enter_title').val();
	var a1 = $('#as_add_new_gallery').attr('as-data');
	var altval = $('#as_enter_alt_text').val();
	var idval = $('#as_image_id').attr('as-imgid');
	var imgval = $('.as_gl_image img').attr('src');
	var as_thamb = $('#as_image_thamb').attr('as-imgthamb');
	var imgchack = $('.as_gl_image').html();
	if (a1 == '') {
		a1 = 0;
	}else{
		a1++;
	}
if (imgchack !== '') {
	if (imgval !== '') {
		$('<li/>', {
		id: 'as_remove_'+a1,
		onclick: 'as_gl_remove_img('+a1+')',
		html: '<span class="hover_overlay"></span>'+
					'<img src="'+as_thamb+'" alt="Anu islam" />'+
					'<input value="'+imgval+'" type="hidden" name="as_gl_image['+a1+'][image]" />'+
					'<input value="'+titleval+'" type="hidden" name="as_gl_image['+a1+'][title]" />'+
					'<input value="'+altval+'" type="hidden" name="as_gl_image['+a1+'][alt]" />'+
					'<input value="'+idval+'" type="hidden" name="as_gl_image['+a1+'][id]" />'
		}).insertBefore('#as_add_new_gallery');
$('#as_enter_title').val('');
$('#as_enter_alt_text').val('');
$('.as_gl_image img').remove('img');
	
		$('.as_ga_main_overlay, .as_gl_main_popup').fadeOut(300);
		$('#as_add_new_gallery').attr('as-data', a1);		
	}else{
		alert('Please select Image');
	}
}else{
	alert('Please select Image');
}

});




    $('#as_gl_upload').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var as_gallery_url_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
//             console.log(as_gallery_url_image.id);

            var as_gal_url = as_gallery_url_image.toJSON().url;
            var as_thamb_url = as_gallery_url_image.toJSON().sizes.thumbnail.url;

            // Let's assign the url value to the input field
            $('.as_gl_image').html('<img src="'+as_gal_url+'" alt="anu" />');
            $('#as_image_id').attr('as-imgid', as_gallery_url_image.id);
            $('#as_image_thamb').attr('as-imgthamb', as_thamb_url);
        });
    });

    $('#as_gl_left_icon_upload').click(function(e) {
        e.preventDefault();
        as_click_to_wp_popup('#as_gl_left_icon', 'Upload Lightbox Left Icon');
    });

    $('#as_gl_right_icon_upload').click(function(e) {
        e.preventDefault();
        as_click_to_wp_popup('#as_gl_right_icon', 'Upload Lightbox Right Icon');
    });


    $('#as_gl_close_icon_upload').click(function(e) {
        e.preventDefault();
        as_click_to_wp_popup('#as_gl_close_icon', 'Upload Lightbox Close Icon');
    });




    var as_gl_color = {
        // you can declare a default color here,
        // or in the data-default-color attribute on the input
        defaultColor: false,
        // a callback to fire whenever the color changes to a valid color
        change: function(event, ui){
            
        },
        // a callback to fire when the input is emptied or an invalid color
        clear: function() {},
        // hide the color picker controls on load
        hide: true,
        // show a group of common colors beneath the square
        // or, supply an array of colors to customize further
        palettes: false
    };
    $('#as_gl_bg_overlay_color').wpColorPicker(as_gl_color);
    $('#as_gl_title_color').wpColorPicker(as_gl_color);
    $('#as_gl_main_border_color').wpColorPicker(as_gl_color);
    $('#as_gl_main_hover_color').wpColorPicker(as_gl_color);
    $('#as_gl_title_tx_color').wpColorPicker(as_gl_color);


//
    $('#as_gl_bg_overlay_opacity').jRange({
        from: 1,
        to: 10,
        step: 1,
        width: 400,
        showLabels: true
    });
    $('#as_gl_speed').jRange({
        from: 100,
        to: 5000,
        step: 50,
        width: 400,
        showLabels: true
    });


    $('#as_gl_title_bg_opacity').jRange({
        from: 1,
        to: 10,
        step: 1,
        width: 400,
        showLabels: true
    });

//


$('#as_gl_resset').on('click', function(e){
    e.preventDefault();
    var as_gl_resset = confirm("Want to reset all options?");
    if (as_gl_resset === true) {
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
                action: 'as_gl_reset_options',
                as_bool_val:  'yes',
            },
        success: function(data){
            if (data == 'reset') {
                location.reload(true);
            }
        }
    });
    }

});




$( ".anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle" ).toggle(function() {
     $('.anu_my_stutas_main').removeClass('as_gl_right');
     $('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').removeClass('as_gl_close');
     $('.anu_my_stutas_main').addClass('as_gl_left');
     $('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').addClass('as_gl_open');
}, function() {
     $('.anu_my_stutas_main').removeClass('as_gl_left');
     $('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').removeClass('as_gl_open');
     $('.anu_my_stutas_main').addClass('as_gl_right');
     $('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').addClass('as_gl_close');
});




});

function as_gl_remove_img(id){
	var as_result = confirm("Want to delete?");
	if (as_result) {
	   jQuery('#as_remove_'+id).remove();	   
	}
}
function as_click_to_wp_popup(id, title){

        var image = wp.media({
            title: title,
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var as_gallery_url_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
//             console.log(as_gallery_url_image.id);
            var as_gal_url = as_gallery_url_image.toJSON().url;
            var as_gal_id = as_gallery_url_image.id;

           jQuery(id).val(as_gal_url);
        });
}

function as_gl_remove(id){
    jQuery('#'+id).val('');
}
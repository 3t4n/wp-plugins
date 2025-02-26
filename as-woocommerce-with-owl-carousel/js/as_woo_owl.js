!function($,t,i,s){"use strict";var o=function(){return this.init.apply(this,arguments)};o.prototype={defaults:{onstatechange:function(){},isRange:!1,showLabels:!0,showScale:!0,step:1,format:"%s",theme:"theme-green",width:300,disable:!1},template:'<div class="slider-container">          <div class="back-bar">                <div class="selected-bar"></div>                <div class="pointer low"></div><div class="pointer-label">123456</div>                <div class="pointer high"></div><div class="pointer-label">456789</div>                <div class="clickable-dummy"></div>            </div>            <div class="scale"></div>       </div>',init:function(t,i){this.options=$.extend({},this.defaults,i),this.inputNode=$(t),this.options.value=this.inputNode.val()||(this.options.isRange?this.options.from+","+this.options.from:this.options.from),this.domNode=$(this.template),this.domNode.addClass(this.options.theme),this.inputNode.after(this.domNode),this.domNode.on("change",this.onChange),this.pointers=$(".pointer",this.domNode),this.lowPointer=this.pointers.first(),this.highPointer=this.pointers.last(),this.labels=$(".pointer-label",this.domNode),this.lowLabel=this.labels.first(),this.highLabel=this.labels.last(),this.scale=$(".scale",this.domNode),this.bar=$(".selected-bar",this.domNode),this.clickableBar=this.domNode.find(".clickable-dummy"),this.interval=this.options.to-this.options.from,this.render()},render:function(){return 0!==this.inputNode.width()||this.options.width?(this.domNode.width(this.options.width||this.inputNode.width()),this.inputNode.hide(),this.isSingle()&&(this.lowPointer.hide(),this.lowLabel.hide()),this.options.showLabels||this.labels.hide(),this.attachEvents(),this.options.showScale&&this.renderScale(),void this.setValue(this.options.value)):void console.log("jRange : no width found, returning")},isSingle:function(){return"number"==typeof this.options.value?!0:-1!==this.options.value.indexOf(",")||this.options.isRange?!1:!0},attachEvents:function(){this.clickableBar.click($.proxy(this.barClicked,this)),this.pointers.on("mousedown touchstart",$.proxy(this.onDragStart,this)),this.pointers.bind("dragstart",function(t){t.preventDefault()})},onDragStart:function(t){if(!(this.options.disable||"mousedown"===t.type&&1!==t.which)){t.stopPropagation(),t.preventDefault();var s=$(t.target);this.pointers.removeClass("last-active"),s.addClass("focused last-active"),this[(s.hasClass("low")?"low":"high")+"Label"].addClass("focused"),$(i).on("mousemove.slider touchmove.slider",$.proxy(this.onDrag,this,s)),$(i).on("mouseup.slider touchend.slider touchcancel.slider",$.proxy(this.onDragEnd,this))}},onDrag:function(t,i){i.stopPropagation(),i.preventDefault(),i.originalEvent.touches&&i.originalEvent.touches.length?i=i.originalEvent.touches[0]:i.originalEvent.changedTouches&&i.originalEvent.changedTouches.length&&(i=i.originalEvent.changedTouches[0]);var s=i.clientX-this.domNode.offset().left;this.domNode.trigger("change",[this,t,s])},onDragEnd:function(t){this.pointers.removeClass("focused"),this.labels.removeClass("focused"),$(i).off(".slider")},barClicked:function(t){if(!this.options.disable){var i=t.pageX-this.clickableBar.offset().left;if(this.isSingle())this.setPosition(this.pointers.last(),i,!0,!0);else{var s=Math.abs(parseInt(this.pointers.first().css("left"),10)-i+this.pointers.first().width()/2)<Math.abs(parseInt(this.pointers.last().css("left"),10)-i+this.pointers.first().width()/2)?this.pointers.first():this.pointers.last();this.setPosition(s,i,!0,!0)}}},onChange:function(t,i,s,o){var e,n;i.isSingle()?(e=0,n=i.domNode.width()):(e=s.hasClass("high")?i.lowPointer.position().left+i.lowPointer.width()/2:0,n=s.hasClass("low")?i.highPointer.position().left+i.highPointer.width()/2:i.domNode.width());var h=Math.min(Math.max(o,e),n);i.setPosition(s,h,!0)},setPosition:function(t,i,s,o){var e,n=this.lowPointer.position().left,h=this.highPointer.position().left,a=this.highPointer.width()/2;s||(i=this.prcToPx(i)),t[0]===this.highPointer[0]?h=Math.round(i-a):n=Math.round(i-a),t[o?"animate":"css"]({left:Math.round(i-a)}),e=this.isSingle()?0:n+a,this.bar[o?"animate":"css"]({width:Math.round(h+a-e),left:e}),this.showPointerValue(t,i,o),this.isReadonly()},setValue:function(t){var i=t.toString().split(",");this.options.value=t;var s=this.valuesToPrc(2===i.length?i:[0,i[0]]);this.isSingle()?this.setPosition(this.highPointer,s[1]):(this.setPosition(this.lowPointer,s[0]),this.setPosition(this.highPointer,s[1]))},renderScale:function(){for(var t=this.options.scale||[this.options.from,this.options.to],i=Math.round(100/(t.length-1)*10)/10,s="",o=0;o<t.length;o++)s+='<span style="left: '+o*i+'%">'+("|"!=t[o]?"<ins>"+t[o]+"</ins>":"")+"</span>";this.scale.html(s),$("ins",this.scale).each(function(){$(this).css({marginLeft:-$(this).outerWidth()/2})})},getBarWidth:function(){var t=this.options.value.split(",");return t.length>1?parseInt(t[1],10)-parseInt(t[0],10):parseInt(t[0],10)},showPointerValue:function(t,i,o){var e=$(".pointer-label",this.domNode)[t.hasClass("low")?"first":"last"](),n,h=this.positionToValue(i);if($.isFunction(this.options.format)){var a=this.isSingle()?s:t.hasClass("low")?"low":"high";n=this.options.format(h,a)}else n=this.options.format.replace("%s",h);var l=e.html(n).width(),r=i-l/2;r=Math.min(Math.max(r,0),this.options.width-l),e[o?"animate":"css"]({left:r}),this.setInputValue(t,h)},valuesToPrc:function(t){var i=100*(t[0]-this.options.from)/this.interval,s=100*(t[1]-this.options.from)/this.interval;return[i,s]},prcToPx:function(t){return this.domNode.width()*t/100},positionToValue:function(t){var i=t/this.domNode.width()*this.interval;return i+=this.options.from,Math.round(i/this.options.step)*this.options.step},setInputValue:function(t,i){if(this.isSingle())this.options.value=i.toString();else{var s=this.options.value.split(",");this.options.value=t.hasClass("low")?i+","+s[1]:s[0]+","+i}this.inputNode.val()!==this.options.value&&(this.inputNode.val(this.options.value),this.options.onstatechange.call(this,this.options.value))},getValue:function(){return this.options.value},isReadonly:function(){this.domNode.toggleClass("slider-readonly",this.options.disable)},disable:function(){this.options.disable=!0,this.isReadonly()},enable:function(){this.options.disable=!1,this.isReadonly()},toggleDisable:function(){this.options.disable=!this.options.disable,this.isReadonly()}};var e="jRange";$.fn[e]=function(i){var s=arguments,n;return this.each(function(){var h=$(this),a=$.data(this,"plugin_"+e),l="object"==typeof i&&i;a||(h.data("plugin_"+e,a=new o(this,l)),$(t).resize(function(){a.setValue(a.getValue())})),"string"==typeof i&&(n=a[i].apply(a,Array.prototype.slice.call(s,1)))}),n||this}}(jQuery,window,document);

function selectText(e) {
    if (document.selection) {
        var a = document.body.createTextRange();
        a.moveToElementText(document.getElementById(e)), a.select()
    } else if (window.getSelection) {
        var a = document.createRange();
        a.selectNode(document.getElementById(e)), window.getSelection().addRange(a)
    }
}
jQuery(document).ready(function(e) {
    e(".as_woo_owl_save_conf span").click(function() {
        e(".as_woo_owl_save_conf").fadeOut(800)
    }), e(".as_woo_owl_show_short_code").hide(), e('.as_woo_owl_btn_style input[type="radio"]').click(function() {
        var a = e(this).val();
        e("#as_woo_owl_get_name").attr("as_button_name", a)
    }), e('ul.as_woo_owl_select_icon li label input[type="radio"]').click(function() {
        var a = e(this).val();
        e("#as_icon_data").attr("as_icon_data", a)
    }), e(".as_woo_owl_add_new").click(function() {
        var a = e('#carousel_name[type="text"]').val(),
            a = a.replace(/\s+/g, "");
        if ("" == !a) var a = 'carousel_name="' + e.trim(a) + '" ';
        else var a = "";
        var t = e('#items[type="number"]').val(),
            t = t.replace(/\s+/g, "");
        if ("" == !t) var t = 'items="' + e.trim(t) + '" ';
        else var t = "";
        var l = e('#itemsDesktop_one[type="number"]').val(),
            r = e('#itemsDesktop_two[type="number"]').val();
        if ("" == !l && "" == !r) var o = 'itemsdesktop="' + l + "," + r + '" ';
        else var o = "";
        var v = e('#itemsDesktopSmall_one[type="number"]').val(),
            s = e('#itemsDesktopSmall_two[type="number"]').val();
        if ("" == !v && "" == !s) var i = 'itemsdesktopsmall="' + v + "," + s + '" ';
        else var i = "";
        var n = e('#itemsTablet_one[type="number"]').val(),
            _ = e('#itemsTablet_two[type="number"]').val();
        if ("" == !n && "" == !_) var c = 'itemstablet="' + n + "," + _ + '" ';
        else var c = "";
        var m = e("select#itemsTabletSmall").val();
        if ("" == !m) var m = 'itemstabletsmall="' + m + '" ';
        var d = e('#itemsMobile_one[type="number"]').val(),
            p = e('#itemsMobile_two[type="number"]').val();
        if ("" == !d && "" == !p) var f = "itemsmobile=" + d + "," + p + " ";
        else var f = "";
        var u = e("select#singleItem").val();
        if ("" == !u) var u = 'singleitem="' + u + '" ';
        else var u = "";
        var w = e("select#itemsScaleUp").val();
        if ("" == !w) var w = 'itemsscaleup="' + w + '" ';
        else var w = "";
        var y = e('#slideSpeed[type="number"]').val();
        if ("" == !y) var y = 'slidespeed="' + y + '" ';
        else var y = "";
        var g = e('#paginationSpeed[type="number"]').val();
        if ("" == !g) var g = 'paginationspeed="' + g + '" ';
        else var g = "";
        var b = e('#rewindSpeed[type="number"]').val();
        if ("" == !b) var b = 'rewindspeed="' + b + '" ';
        else var b = "";
        var h = e("select#autoPlay").val();
        if ("" == !h) var h = 'autoplay="' + h + '" ';
        else var h = "";
        var k = e("select#stopOnHover").val();
        if ("" == !k) var k = 'stoponhover="' + k + '" ';
        else var k = "";
        var x = e("select#navigation").val();
        if ("" == !x) var x = 'navigation="' + x + '" ';
        else var x = "";
        var S = e('#navigationText_one[type="text"]').val(),
            T = e('#navigationText_two[type="text"]').val(),
            S = S.replace(/\s+/g, ""),
            T = T.replace(/\s+/g, "");
        if ("" == !S && "" == !T) var S = e.trim(S),
            T = e.trim(T),
            z = "navigationtext='\"" + S + '","' + T + "\"' ";
        else var z = "";
        var D = e("select#rewindNav").val();
        if ("" == !D) var D = 'rewindnav="' + D + '" ';
        else var D = "";
        var E = e("select#scrollPerPage").val();
        if ("" == !E) var E = 'scrollperpage="' + E + '" ';
        var I = e("select#pagination").val();
        if ("" == !I) var I = 'pagination="' + I + '" ';
        var L = e("select#paginationNumbers").val();
        if ("" == !L) var L = 'paginationnumbers="' + L + '" ';
        var N = e("select#responsive").val();
        if ("" == !N) var N = 'responsive="' + N + '" ';
        var P = e("select#lazyLoad").val();
        if ("" == !P) var P = 'lazyload="' + P + '" ';
        var R = e("select#lazyFollow").val();
        if ("" == !R) var R = 'lazyfollow="' + R + '" ';
        var B = e("select#lazyEffect").val();
        if ("" == !B) var B = 'lazyeffect="' + B + '" ';
        var M = e("select#mouseDrag").val();
        if ("" == !M) var M = 'mousedrag="' + M + '" ';
        var O = e("select#touchDrag").val();
        if ("" == !O) var O = 'touchdrag="' + O + '" ';
        var j = e("select#afterLazyLoad").val();
        if ("" == !j) var j = 'afterlazyload="' + j + '" ';
        var F = e("#as_woo_owl_get_name").attr("as_button_name"),
            F = 'button="' + F + '" ',
            H = e("#as_icon_data").attr("as_icon_data"),
            H = 'icon="' + H + '" ',
            Q = e("select#as_woo_owl_add_to_cart").val();

        var get_type = e('#as_woo_owl_product_type').val();

    	if (get_type != 'def') {
    		get_type = 'porduct_type="'+get_type+'"';
    	}else{
    		get_type = '';
    	}

    	var get_cat = e('#as_woo_owl_product_category').val();

    	if (get_cat) {
    		get_cat = 'product_cat="'+get_cat+'"';
    	}else{
    		get_cat = '';
    	}

        if ("" == !Q) var Q = 'add_to_cart="' + Q + '" ';    
            
        e(".as_woo_owl_show_short_code").fadeIn(200), e(".as_woo_owl_show_short_code").text("[as_featured_product " + get_type + ' ' + get_cat +' '+ a +' '+ t +' '+ w +' '+ o +' '+ i +' '+ c +' '+ m +' '+ f +' '+ u +' '+ y +' '+ g +' '+ b +' '+ h +' '+ k +' '+ x +' '+ z +' '+ D +' '+ E +' '+ I +' '+ L +' '+ N +' '+ P +' '+ R +' '+ B +' '+ M +' '+ O +' '+ j +' '+ F +' '+ Q +' '+ H +' '+ "]")
    	})


	e( ".anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle" ).toggle(function() {
	     e('.anu_my_stutas_main').removeClass('as_gl_right');
	     e('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').removeClass('as_gl_close');
	     e('.anu_my_stutas_main').addClass('as_gl_left');
	     e('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').addClass('as_gl_open');
	}, function() {
	     e('.anu_my_stutas_main').removeClass('as_gl_left');
	     e('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').removeClass('as_gl_open');
	     e('.anu_my_stutas_main').addClass('as_gl_right');
	     e('.anu_my_stutas_main .anu_stutas_inner span.as_gl_toggle').addClass('as_gl_close');
	});


	e('#as_woo_owl_reset_btn').click(function(){
		var as_woo_owl = confirm("Want to Reset all options?");
		if (as_woo_owl) {
			e.ajax({
					type: 'POST',
					url: ajaxurl,
					data: {
						action: 'as_woo_owl_reset'
				},
				success: function(data){
					if (data == 'ok') {
						location.reload(true);
					}
				}
			});
		}
	});

    e('#as_woo_owl_setting_reset').click(function(){
        var as_woo_owla = confirm("Want to Reset all options?");
        if (as_woo_owla) {
            e.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        action: 'as_woo_owl_setting_reset'
                },
                success: function(data){
                    if (data == 'ok') {
                        location.reload(true);
                    }
                }
            });
        }
    });



	e('#as_woo_owl_product_type').change(function(ev){
		var as_select_val = e(this).val();
		if (as_select_val == 'category') {
			as_woo_owl_insert_more_option(e);
		}else{
			e('#as_woo_owl_product_category').remove();
		}
	});
    
e('#as_woo_owl_set_loader_image').click(function(e){
    e.preventDefault()
    as_woo_owl_click_to_wp_popup('#loader_gif', 'Upload loader gif');
});

    
e('#as_woo_owl_atc_loader_image').click(function(e){
    e.preventDefault()
    as_woo_owl_click_to_wp_popup('#as_atc_loader_gif', 'Add To Cart loader gif');
});


e('#as_woo_loader_bg_color').wpColorPicker();
e('#as_woo_add_to_cart_bg_color').wpColorPicker();


    e('#as_woo_loader_bg_opacity').jRange({
        from: 1,
        to: 10,
        step: 1,
        width: 500,
        showLabels: true
    });

    e('#as_woo_add_to_cart_bg_opacity').jRange({
        from: 1,
        to: 10,
        step: 1,
        width: 500,
        showLabels: true
    });



});

function as_woo_owl_insert_more_option(e){

		e.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'as_woo_owl_get_tarm'
			},
			success: function(data){				
				e('#as_woo_owl_appand').append(data);
			}
		});

}


function as_woo_owl_click_to_wp_popup(id, title){

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

           jQuery(id).val(as_gal_url);
        });
}
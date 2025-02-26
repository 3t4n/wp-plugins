(function() {

    var win = window;
    var FR = win.FileReader;
    var doc = win.document;
    var kjua = win.kjua;

    var gui_val_pairs = [
        ['size', 'px'],
        ['minversion', ''],
        ['quiet', ' modules'],
        ['rounded', '%'],
        ['msize', '%'],
        ['mposx', '%'],
        ['mposy', '%']
    ];

    function el_by_id(id) {
        return doc.getElementById(id);
    }
    function el_by_class(id) {
        return doc.getElementsByClassName(id);
    }

    function val_by_id(id) {
        var el = el_by_id(id);
        return el && el.value;
    }
    function val_by_class(id) {
        var el = el_by_class(id);
        return el && el.value;
    }

    function int_by_id(id) {
        return parseInt(val_by_id(id), 10);
    }

    function on_event(el, type, fn) {
        el.addEventListener(type, fn);
    }

    function on_ready(fn) {
        on_event(doc, 'DOMContentLoaded', fn);
    }

    function for_each(list, fn) {
        Array.prototype.forEach.call(list, fn);
    }

    function all(query, fn) {
        var els = doc.querySelectorAll(query);
        if (fn) {
            for_each(els, fn);
        }
        return els;
    }

    function update_qrcode() {
	
        var options = {
			
		        text:"Master QR Generator",
                width: int_by_id('qrnputsize'),
                height: int_by_id('qrnputsize'),
                dotScale: val_by_id('dot_scale'),
                colorDark: val_by_id('qrc_color'),
                colorLight: val_by_id('qr_bg'),

        };
        var container = el_by_id('masterqrdemos');
        for_each(container.childNodes, function(child) {
            container.removeChild(child);
        });
		new QRCode(container,options);
		
		
    }

    function update() {
        update_qrcode();
    }

    jQuery(document).ready(function() {

        jQuery(".qrc-bgcolor-picker").wpColorPicker({
            change: function(event, ui) {
                el_by_id('qr_color');
                el_by_id('qr_bg');
                setTimeout(update, 100);

            }
        });


    })

    on_ready(function() {
        all('input, textarea, select', function(el) {
            on_event(el, 'input', update);
            on_event(el, 'change', update);
        });
        on_event(win, 'load', update);
        setTimeout(update, 250)
    });



}(jQuery));








(function($){$(document).ready(function(){"use strict";$(function(){$('.qrc-color-picker').wpColorPicker();})});$(document).ready(function(){$('#qr_print_tzx_ty').on('change',function(){$('#qr_print_product_ty').hide();if($(this).val()=='product_cat'){$('#qr_print_product_ty').show();$('#qr_print_cat_ty').hide()}else{$('#qr_print_product_ty').hide();$('#qr_print_cat_ty').show()}})})})(jQuery);(function($){"use strict";function initColorPicker(widget){widget.find('.qrc-widget-color-picker').wpColorPicker({change:_.throttle(function(){$(this).trigger('change')},3000)})}
function onFormUpdate(event,widget){initColorPicker(widget)}
$(document).on('widget-added widget-updated',onFormUpdate);$(document).ready(function(){$('#widgets-right .widget:has(.qrc-widget-color-picker)').each(function(){initColorPicker($(this))})})}(jQuery));(function($){function MASTERQR_PRO_Post(){$(document).ready(function(){"use strict";$('#downloadbutonPro').click(function(){var image=document.querySelector("#master_MtxBuxpro canvas").toDataURL("image/png").replace("image/png","image/octet-stream");this.setAttribute("href",image)})})}
MASTERQR_PRO_Post()})(jQuery);



(function($) {

	

    jQuery(document).ready(function($) {
		
		$('#qr_download_hide').on('change', function() {
if($(this).val() == 'yes'){
	$('a.btn_fromt_canvas').css('display','none');
}if($(this).val() == 'no'){
	$('a.btn_fromt_canvas').css('display','inline-block');
}
    
});
		
if($('#qr_download_hide').val() == 'yes'){
	$('a.btn_fromt_canvas').css('display','none');
}if($('#qr_download_hide').val() == 'no'){
	$('a.btn_fromt_canvas').css('display','inline-block');
}		
$("#qr_download_text").on("input", function() {
    $("a.btn_fromt_canvas").text($(this).val());
});		
		
	$('#dt_background').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('a.btn_fromt_canvas').css("background",$(this).val());
    }
});		
	$('#dt_clor').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('a.btn_fromt_canvas').css("color",$(this).val());
    }
});		

/* Print Button*/	
		$('#qr_print_hide').on('change', function() {
if($(this).val() == 'yes'){
	$('.mqrprints').css('display','none');
}if($(this).val() == 'no'){
	$('.mqrprints').css('display','inline-block');
}
    
});
		
if($('#qr_print_hide').val() == 'yes'){
	$('.mqrprints').css('display','none');
}if($('#qr_print_hide').val() == 'no'){
	$('.mqrprints').css('display','inline-block');
}		
$("#qr_print_text").on("input", function() {
    $(".mqrprints").text($(this).val());
});		
$("#qrnputsize").on("input", function() {
    $("#mqrbtnalign").css('width',$(this).val() + 'px');
});		
		
	$('#print_background').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.mqrprints').css("background",$(this).val());
    }
});		
	$('#print_clor').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.mqrprints').css("color",$(this).val());
    }
});	
		
		
	
		
			        $('.qrcdesings').submit(function() {
            $('.qrcs_desingcrt').addClass("fancyLoaderCss");
            $('.qrcsdhicr_dsigns').hide();
            var b = $(this).serialize();
            $.post('options.php', b).error(function() {
                alert('error')
            }).success(function() {
                $(".qrcs_desingcrt").removeClass("fancyLoaderCss");
                $('.qrcsdhicr_dsigns').show();
                $('.qrcsdhicr_dsigns').html('<span class="dashicons dashicons-saved"></span>')
            });
            return false;
        });
	
		
        // Suffix that will be used on the classes of the content divs.
        var tab_suffix = '-tab';

        // Not necessary, just to enable people to choose whatever tab_suffix they want.
        function escape_regexp(str) {
            return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
        }

        // Get the class ending with tab_suffix from an element.
        function get_tab_name_from_class(el) {
            var tab_class_pattern = new RegExp('\\S*' + escape_regexp(tab_suffix));
            if ($(el) && $(el).attr('class')) {
                return $(el).attr('class').match(tab_class_pattern)[0];
            }
        }

        // Update the dom with the selected tab.
        function hash_content_update() {

            var active_section,
                tab_names;

            // Get all classes ending with -tab from div elements directly inside .tab-content.
            tab_names = $('div.tab-content > div').map(function() {
                var tab_name = get_tab_name_from_class($(this));
                if (tab_name) {
                    return tab_name.split(tab_suffix)[0];
                }
            }).get();

            if (tab_names.length > 0) {

                // Show first tab initially.
                active_section = tab_names[0];

                // Check if the url hash matches one of the tab names.
                if (document.location.href.split('#')[1] && tab_names.indexOf(document.location.href.split('#')[1]) > -1) {
                    active_section = document.location.href.split('#')[1];
                }
                // Handle tab contents.
                $('div.tab-content div.active').removeClass('active');
                $('div.tab-content div.' + active_section + tab_suffix).addClass('active');

                // Handle tab menu.
                $('div.tab-nav ul li.active').removeClass('active');
                $('div.tab-nav ul li a[href="#' + active_section + '"]').closest('li').addClass('active');

            }

        }

        // Set listener for hashchange
        $(window).bind('hashchange', function() {
            hash_content_update();
        });

        // Run the initial content update.
        hash_content_update();

    });

}(jQuery));
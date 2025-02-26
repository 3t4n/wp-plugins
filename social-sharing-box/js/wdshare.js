(function ($) {
	

var $box = $("#wdshare-share-box");
var $win = $(window);
var minTop = 0;
var _wdshare_left_offset = 0;

$(function () {
	
	$box = $("#wdshare-share-box");
    if (!$box.length) return false; 
    $box.next("p:empty").remove(); // Compensate for wpautop
    
    setLeftOffset();
    
    $win.resize(function () {
    	if (_wdshare_data.min_width && $win.width() < _wdshare_data.min_width) {
    		$box.addClass('wdqs-inline');
    		$win.unbind('scroll', scrollDispatcher);
    	} else {
    		$box.removeClass('wdqs-inline');
    		init();
    	}
    });
    
	// Check for minimum width right away
    if (_wdshare_data.min_width && $win.width() < _wdshare_data.min_width) {
    	$box.addClass('wdqs-inline');
    	return;
    } else {
    	$box.find('iframe').load(init);
    }
});

function setLeftOffset () {
	if ("text" == _wdshare_data.offset.htype) {
		_wdshare_left_offset = ("left" == _wdshare_data.offset.hdir) ?
			$box.parent().offset().left - ($box.outerWidth() + _wdshare_data.offset.hoffset)
			:
			($box.parent().offset().left + $box.parent().width()) - _wdshare_data.offset.hoffset
		;
	} else if ("page" == _wdshare_data.offset.htype) {
		_wdshare_left_offset = ("left" == _wdshare_data.offset.hdir) ?				
			_wdshare_data.offset.hoffset
			:
			$win.width() - ($box.outerWidth() + _wdshare_data.offset.hoffset)
		;
	} else {
		_wdshare_left_offset = ("left" == _wdshare_data.offset.hdir) ?
			$(_wdshare_data.horizontal_selector).offset().left - ($box.outerWidth() + _wdshare_data.offset.hoffset)
			:
			($(_wdshare_data.horizontal_selector).offset().left + $(_wdshare_data.horizontal_selector).width()) - _wdshare_data.offset.hoffset
		;
	}
}

function setTopOffset () {
	if ("page-bottom" == _wdshare_data.offset.vtype) {
		minTop = $win.height() - ($box.outerHeight() + _wdshare_data.offset.voffset);
	} else if ("page-top" == _wdshare_data.offset.vtype) {
		minTop = _wdshare_data.offset.voffset;
	} else if ("text" == _wdshare_data.offset.vtype) {
		minTop = $box.parent().offset().top + _wdshare_data.offset.voffset;
	} else if ("selector" == _wdshare_data.offset.vtype) {
		minTop = $(_wdshare_data.top_selector).offset().top + _wdshare_data.offset.voffset;
	}
}

function init () {
	if ($box.is(".wdqs-inline")) return;
	if ($win.height() < $box.height()) {
		$box.addClass('wdqs-inline');
		$win.unbind('scroll', scrollDispatcher);
		return;
	}
	
	// Calculate minimum top
	setTopOffset();
	setLeftOffset();

	// Position the box first
    $box.css({
    	"display": "block",
    	"z-index": parseInt(_wdshare_data.z_index),
    	"position": (($.browser.msie && !_wdshare_data.allow_fixed) ? "absolute" : "fixed")
    });
    scrollDispatcher();
    $win.unbind('scroll', scrollDispatcher).bind('scroll', scrollDispatcher);
}

function scrollDispatcher () {
	var vPos = $win.scrollTop();
	if ($("#wpadminbar").length) vPos += $("#wpadminbar").height();
	if ($("#wp-admin-bar").length) vPos += $("#wp-admin-bar").height();
	if (vPos > minTop) {
		$box.offset({
        	"top": vPos,
        	"left": _wdshare_left_offset
        });
	} else {
		$box.offset({
        	"top": minTop,
        	"left": _wdshare_left_offset
        });
	}
}

})(jQuery);
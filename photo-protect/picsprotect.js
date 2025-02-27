/*
 Plugin Name: Photo Protect
 Plugin URI: http://wordpress.org/plugins/photo-protect/
 Description: Adds an invisible layer over your images to protect them from copying.
 Version: 1.1
 Author: Visual Watermark
 Author URI: http://www.visualwatermark.com/wp-photo-protect/
 */

var pp_viewport_size = {
    width : 0,
    height : 0
};
var pp_cover_timeout = null;
var pp_timeout_interval = 1000;

function pp_elements_by_class(tagName, className) {
    var images = document.getElementsByTagName(tagName);
    var result = [];
    for (var i = 0; i < images.length; ++i) {
        if ((' ' + images[i].className + ' ').indexOf(' ' + className + ' ') > -1) {
            result.push(images[i]);
        }
    }
    return result;
}

function pp_ends_with(subjectString, searchString) {
	var position = subjectString.length;
	position -= searchString.length;
	var lastIndex = subjectString.indexOf(searchString, position);
	return lastIndex !== -1 && lastIndex === position;
}

function pp_cover() {
    var images = pp_elements_by_class('img', 'pp_post_image');

    for (var i = 0; i < images.length; ++i) {
        var item = images[i];
        var itemPos = pp_get_position(item);
        var parentPos = {
            left : 0,
            top : 0
        };

        var offsetParent = item.offsetParent;

        if (offsetParent != null) {
            if (offsetParent.tagName.toLowerCase() != 'body') {

                // IE
                if (offsetParent.currentStyle) {
                    while (offsetParent != null && offsetParent.currentStyle.position != 'relative' && offsetParent.currentStyle.styleFloat == 'none' && offsetParent.tagName.toLowerCase() != 'body' && offsetParent.tagName.toLowerCase() != 'html')
                    offsetParent = offsetParent.OffsetParent;

                    // for IE 6-8
                    if (offsetParent != null && offsetParent.styleFloat != 'none')
                        while (offsetParent != null && offsetParent.currentStyle.position != 'relative' && offsetParent.tagName.toLowerCase() != 'body' && offsetParent.tagName.toLowerCase() != 'html')
                        offsetParent = offsetParent.parentNode;
                }

                if (offsetParent != null) {
                    parentPos = pp_get_position(offsetParent);
                    //offsetParent.style.border = "2px solid black";
                }
            }
            var itemSize = [item.offsetWidth, item.offsetHeight];

            var cover = item.ppCover;
            if (cover == null) {
                var cover = document.createElement('img');
                cover.src = pp_plugin.blank_gif;
                cover.className = "pp_cover";
                // For debug purposes
                //cover.style.cssText = "position:absolute; border:1px solid blue; box-shadow:inset 0 0 30px blue; max-width:100%; max-height:100%; margin:0px;  padding:0px; background:none;";
                cover.style.cssText = "position:absolute; border: none; max-width:100%; max-height:100%; margin:0px;  padding:0px; background:none;";
                item.parentNode.appendChild(cover);
                item.ppCover = cover;
            }

            cover.style.width = item.offsetWidth + "px";
            cover.style.height = item.offsetHeight + "px";

            cover.style.left = itemPos.left - parentPos.left + "px";
            cover.style.top = itemPos.top - parentPos.top + "px";

        }
		
		if (item.parentNode != null && item.parentNode.tagName === "A") {
			var link = item.parentNode;
			if (link.href && link.href.length > 4) {
				var ext = link.href.substr(link.href.length - 4).toLowerCase();				
				if (ext === ".jpg" || ext === "jpeg" || ext === ".png" || ext === ".gif") {
					link.href = "";
				}
			}
		}
    }

    setTimeout(pp_cover, pp_timeout_interval);
};

function pp_get_viewport_size() {
    var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], w = w.innerWidth || e.clientWidth || g.clientWidth, h = w.innerHeight || e.clientHeight || g.clientHeight;

    return {
        width : w,
        height : h
    };
}

function pp_get_position2(element) {
    var l = 0;
    var t = 0;
    while (element) {
        l += (element.offsetLeft - element.scrollLeft);
        t += (element.offsetTop - element.scrollTop);
        element = element.offsetParent
    }

    return {
        left : Math.round(l),
        top : Math.round(t)
    };
}

function pp_get_position1(element) {
    var rect = element.getBoundingClientRect();

    var body = document.body;
    var html = document.documentElement;

    var scrollTop = window.pageYOffset || html.scrollTop || body.scrollTop;
    var scrollLeft = window.pageXOffset || html.scrollLeft || body.scrollLeft;

    var clientTop = html.clientTop || body.clientTop || 0;
    var clientLeft = html.clientLeft || body.clientLeft || 0;

    var top = rect.top + scrollTop - clientTop;
    var left = rect.left + scrollLeft - clientLeft;

    return {
        top : Math.round(top),
        left : Math.round(left)
    };
}

function pp_get_position(element) {
    if (element.getBoundingClientRect) {
        return pp_get_position1(element)
    } else {
        // for older browser
        return pp_get_position2(element);
    }
}

setTimeout(pp_cover, 200); 
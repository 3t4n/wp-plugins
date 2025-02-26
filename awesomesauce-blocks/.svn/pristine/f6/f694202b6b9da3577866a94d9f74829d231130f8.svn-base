window.awesomesauce_settings = {};
window.awesomesauce_phrases = {};
window.awesomesauce = {};

document.addEventListener("DOMContentLoaded", function () {
    awesomesauce_handle_force_fullwidth();
    awesomesauce_block_in_view();
});

function awesomesauce_handle_force_fullwidth() {
    if (typeof window.awesomesauce_configuration["force_fullwidth_delay"] != 'undefined') {
        setTimeout(function () {
            awesomesauce_force_fullwidth();
        }, window.awesomesauce_configuration["force_fullwidth_delay"]);

        window.addEventListener("resize", function () {
            setTimeout(function () {
                awesomesauce_force_fullwidth();
            }, window.awesomesauce_configuration["force_fullwidth_delay"]);
        });
    } else {
        awesomesauce_force_fullwidth();

        window.addEventListener("resize", function () {
            awesomesauce_force_fullwidth();
        });
    }
}

function awesomesauce_force_fullwidth() {
    document.querySelectorAll('.awesomesauce_force_fullwidth_origin').forEach(function (element) {
        awesomesauce_force_fullwidth_resize(element);
    });
}

function awesomesauce_force_fullwidth_resize(element) {
    var rect = element.getBoundingClientRect();
    var left_offset = Math.round(rect.left + window.scrollX);

    var document_width = document.body.offsetWidth;

    var width = 'width:' + document_width + 'px!important;';
    var left = 'transform: translate3d(-' + left_offset + 'px, 0px, 0px);';

    var nextElement = element.nextElementSibling;

    if (nextElement && nextElement.classList.contains('awesomesauce_force_fullwidth')) {
        nextElement.style.cssText = width + left;
    }
}

function awesomesauce_modify_color_opacity(color, opacity) {
    if (!color.includes("rgba(")) {
        color = awesomesauce_color_to_rgba(color);
    }

    var parts = [];
    color.match(/[.\d]+/g).map(function (a) {
        parts.push(+a);
    });

    var red = parts[0];
    var green = parts[1];
    var blue = parts[2];

    return 'rgba(' + red + ',' + green + ',' + blue + ',' + opacity + ')';
}

function awesomesauce_color_to_rgba(color, opacity) {
    return awesomesauce_rgb_to_rgba(awesomesauce_hex_to_rgba(color, opacity), opacity);
}

function awesomesauce_color_to_rgba_array(color, opacity) {
    var rgba = awesomesauce_color_to_rgba(color, opacity);
    return rgba.replace(/rgba\(|\)/g, "").split(",");
}

function awesomesauce_color_to_hex(color) {
    var rgba_array = awesomesauce_color_to_rgba_array(color);
    rgba_array.pop();

    return '#' + rgba_array.map(function (value) {
        let hex = parseInt(value).toString(16);
        return hex.padStart(2, "0");
    }).join('');
}

function awesomesauce_hex_to_rgba(color, opacity) {
    if (typeof opacity == 'undefined') {
        opacity = 1;
    }
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(color);
    return result ? 'rgba(' + parseInt(result[1], 16) + ',' + parseInt(result[2], 16) + ',' + parseInt(result[3], 16) + ',' + opacity + ')' : color;
}

function awesomesauce_rgb_to_rgba(color, opacity) {
    if (typeof opacity == 'undefined') {
        opacity = 1;
    }

    if (color.includes("rgb(")) {
        return color.replace("rgb(", "rgba(").replace(")", "," + opacity + ")");

    } else if (color.includes("rgba(")) {
        var parts = color.split(",");
        return parts[0] + ',' + parts[1] + ',' + parts[2] + ',' + opacity + ')';

    } else {
        return color;
    }
}

function awesomesauce_block_in_view() {
    document.querySelectorAll('.awesomesauce_block').forEach(function (element) {

        var observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (!element.classList.contains('awesomesauce_fade_in')) {
                        element.classList.add('awesomesauce_fade_in');
                    }
                    setTimeout(function () {
                        entry.target.classList.add('in_view');
                        var event = new CustomEvent('in_view');
                        element.dispatchEvent(event);
                    }, window.awesomesauce_configuration["in_view_delay"]);
                    observer.unobserve(entry.target);
                }
            });
        });

        if (element) {
            observer.observe(element);
        }
    });
}
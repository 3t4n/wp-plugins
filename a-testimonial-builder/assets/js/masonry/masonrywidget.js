/**
 * VrMasonry
 * @type Object VrMasonry
 */
var VrMasonry = function () {

    var height = 0;

    var settings = {},
            defaults = {
                hashurl: null,
                identify: null,
                width: '100%',
                container: '#masonryWidget',
                callback: function () {
                }
            };

    /**
     * init
     * @param {Object} options
     * @returns {undefined}
     */
    var init = function (options) {
        try {
            settings = JQNative.extend({}, defaults, options);
            process();
        } catch (Error) {
            VrSystem.log(Error);
        }
    };

    /**
     * appendContainer
     * @returns {undefined}
     */
    var appendContainer = function () {
        var container = getContainer();
        if (container === null && settings.container) {
            var div = document.createElement("div");
            div.id = settings.container.replace("#", '');
            document.body.appendChild(div);
        }
    };

    /**
     * hasContainer
     * @returns {Boolean}
     */
    var hasContainer = function () {
        return getContainer() !== null;
    };

    /**
     * @returns {HTMLElement | null}
     */
    var getContainer = function () {
        if (settings && typeof settings.container != 'undefined') {
            return document.getElementById(settings.container.replace('#', ''));
        }
        return null;
    };

    /**
     * getUrl
     * @returns {string}
     */
    var getUrl = function () {
        var url = VrSystem.decodeTxt(settings.hashurl);
        url = url.replace('http:', '');
        url = url.replace('https:', '');
        return url;
    };

    /**
     * process
     * @returns {undefined}
     */
    var process = function () {
        JQNative.ready(function () {
            appendContainer();
            if (hasContainer()) {
                initWidget();
            }
        });
    };

    /**
     * destroy
     * @returns {undefined}
     */
    var destroy = function () {
        if (hasContainer()) {
            var container = getContainer();
            container.innerHTML = '';
        } else if (settings) {
            VrSystem.log('Container "' + settings.container + '" not found.');
        }
    };

    /**
     * getRemoteServer
     * @returns {String}
     */
    var getRemoteServer = function () {
        var url = getUrl();
        var path = url;
        var url_path = url.split('/js/');
        if (typeof url_path[0] != 'undefined') {
            path = url_path[0];
        }
        path = path.replace('http:', '');
        path = path.replace('https:', '');
        return path;
    };

    /**
     * getContentUrl
     * @returns {String}
     */
    var getContentUrl = function () {
        var url = getRemoteServer();
        return window.location.protocol + url + '/masonry';
    };

    /**
     * createIframe
     * @returns {undefined}
     */
    var createIframe = function () {
        var iframe = getIframe();
        if (iframe !== null) {
            iframe.remove();
        }

        var iframe = document.createElement("iframe");
        iframe.id = 'masonryWidgetIframe';
        iframe.src = getContentUrl() + "?token=" + settings.identify + "&domain=" + getParentDomain();
        iframe.frameborder = 0;
        iframe.scrolling = 'no';
        iframe.style.border = 'none';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.overflow = 'hidden';
        iframe.onload = function () {
            settings.callback();
            initResizer();
        };

        getContainer().append(iframe);
    };

    /**
     * getWidth
     * @returns {target.width|jQuery@call;extend.width|settings.width|String}
     */
    var getWidth = function () {
        return settings.width.indexOf('%') == -1 ? settings.width + 'px' : settings.width;
    };

    /**
     * @returns {(ElementTagNameMap[string] | null) | (Element | null)}
     */
    var getIframe = function () {
        var container = getContainer();
        if (container) {
            return container.querySelector('iframe');
        }
        return null;
    };

    /**
     * setSettings
     * @param {Object} options
     * @returns {undefined}
     */
    var setSettings = function (options) {
        settings = options;
    };
    /**
     * initWidget
     * @returns {undefined}
     */
    var initWidget = function () {
        try {
            createIframe();
        } catch (Error) {
            timeOutInitWidget();
        }
    };

    var attempt = 0;

    /**
     * initResizer
     * @returns {undefined}
     */
    var initResizer = function () {
        try {
            var iframe = getIframe();
            if (iframe) {
                iFrameResize({
                    log: true,
                    autoResize: true,
                    checkOrigin: true,
                    heightCalculationMethod: 'max',
                    warningTimeout: 10000
                }, iframe);
            }
        } catch (Error) {
            VrSystem.log(Error);
            if (attempt <= 5) {
                timeOutInitWidget();
            }
            attempt++;
        }
    };

    /**
     * timeOutInitWidget
     * @returns {undefined}
     */
    var timeOutInitWidget = function () {
        setTimeout(function () {
            initResizer();
        }, 1000);
    };

    /**
     * refreshIframe
     * @returns {undefined}
     */
    var refreshIframe = function (settings) {
        var iframe = getIframe();
        if (iframe !== null) {
            iframe.src = iframe.src;
        }
    };

    /**
     * widgetIsInit
     * @returns boolean
     */
    var widgetIsInit = function () {
        var iframe = getIframe();
        return iframe !== null && settings.identify;
    };

    window.addEventListener("message", function (event) {
        var iframes = document.getElementsByName('iframe');
        for (var i = 0; i < iframes.length; i++) {
            if (iframes[i].contentWindow != event.source)
                continue;
            break;
        }
        onMessage(event.data);
    }, false);

    var onMessage = function (msg) {
        var msgId = '[iFrameSizer]',
                msgIdLen = msgId.length;
        if (typeof msg === 'string') {
            if (msg.indexOf(msgId) != -1) {
                function processMsg(msg) {
                    var data = msg.substr(msgIdLen).split(':');
                    return {height: data[1], width: data[2]};
                }

                var data = processMsg(msg);
                msg = {app: 'vr_masonry', cmd: 'resize', params: {height: data.height, width: data.width}};
            }
        }

        if (typeof msg.app == 'undefined' || msg.app != 'vr_masonry')
            return;
        switch (msg.cmd) {
            case 'resize':
                resize(msg.params);
                break;
        }
    };

    var resize = function (params) {
        var widget = getIframe();
        if (widget && parseInt(params.height) > parseInt(height)) {
            widget.style.height = params.height;
            height = params.height;
        }
        if (widget && params.width)
            widget.style.width = params.width;
    };

    var getParentDomain = function () {
        return window.location.hostname;
    };

    return {
        init: function (settings) {
            init(settings);
        },
        isInit: function () {
            return false;
        },
        process: function () {
            process();
        },
        setSettings: function (setings) {
            setSettings(setings);
        },
        refreshIframe: function (settings) {
            refreshIframe(settings);
        },
        destroy: function () {
            destroy();
        }
    };
}();

var JQNative = {};
JQNative.extend = function (out) {
    out = out || {};
    for (var i = 1; i < arguments.length; i++) {
        if (!arguments[i])
            continue;
        for (var key in arguments[i]) {
            if (arguments[i].hasOwnProperty(key))
                out[key] = arguments[i][key];
        }
    }
    return out;
};
JQNative.ready = function (fn) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
};

/**
 * VrSystem Class
 * @type Object VrSystem
 */
var VrSystem = {
    encN: 5,
    objectLength: function (obj) {
        var result = 0;
        for (var prop in obj) {
            if (obj.hasOwnProperty(prop)) {
                result++;
            }
        }
        return result;
    },
    log: function (message) {
        try {
            console.log(message);
        } catch (e) {
            //alert(message);
        }
    },
    decodeTxt: function (s) {
        // DECODES AND UNESCAPES ALL TEXT.
        var s1 = unescape(s.substr(0, s.length - 1));
        var t = '';
        for (var i = 0; i < s1.length; i++)
            t += String.fromCharCode(s1.charCodeAt(i) - s.substr(s.length - 1, 1));
        return unescape(t);
    },
    encodeTxt: function (s) {
        // ENCODES, IN UNICODE FORMAT, ALL TEXT AND THEN ESCAPES THE OUTPUT
        s = escape(s);
        var ta = new Array();
        for (var i = 0; i < s.length; i++)
            ta[i] = s.charCodeAt(i) + this.encN;
        return "" + escape(eval("String.fromCharCode(" + ta + ")")) + this.encN;
    },
    strPad: function (input, pad_length, pad_string, pad_type) {	// Pad a string to a certain length with another string
        var half = '', pad_to_go;
        var str_pad_repeater = function (s, len) {
            var collect = '', i;
            while (collect.length < len)
                collect += s;
            collect = collect.substr(0, len);
            return collect;
        };

        if (pad_type != 'STR_PAD_LEFT' && pad_type != 'STR_PAD_RIGHT' && pad_type != 'STR_PAD_BOTH') {
            pad_type = 'STR_PAD_RIGHT';
        }
        if ((pad_to_go = pad_length - input.length) > 0) {
            if (pad_type == 'STR_PAD_LEFT') {
                input = str_pad_repeater(pad_string, pad_to_go) + input;
            } else if (pad_type == 'STR_PAD_RIGHT') {
                input = input + str_pad_repeater(pad_string, pad_to_go);
            } else if (pad_type == 'STR_PAD_BOTH') {
                half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
                input = half + input + half;
                input = input.substr(0, pad_length);
            }
        }
        return input;
    },
    replaceAll: function (find, replace, str) {
        return str.replace(new RegExp(find, 'g'), replace);
    },
    hex2rgba: function (hex, opacity) {
        //extract the two hexadecimal digits for each color
        var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
        var matches = patt.exec(hex);

        //convert them to decimal
        var r = parseInt(matches[1], 16);
        var g = parseInt(matches[2], 16);
        var b = parseInt(matches[3], 16);

        //create rgba string
        var rgba = "rgba(" + r + "," + g + "," + b + "," + opacity + ")";

        //return rgba colour
        return rgba;
    },
    removeProtocol: function (path) {
        path = path.replace('http:', '');
        path = path.replace('https:', '');
        return path;
    }
};
(function($, window, document, undefined) {
    'use strict';
    var defaults = {};

    function Plugin(element, options) {
        this.$rdwapp = $(element);
        this.init(this);
    }
    Plugin.prototype = {
        timeDateToString: function(time) {
            var minutes = '' + time.getMinutes();
            if (minutes.length === 1) {
                minutes = '0' + minutes;
            }
            return time.getHours() + ':' + minutes;
        },
        timeStringToInt: function(a, b) {
            return parseInt(a + b);
        },
        init: function(plugin) {
            var $rdwapp = this.$rdwapp;
            $rdwapp.on('rdwapp.init', function(e) {
                plugin.mobiledevice = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
            });
            $rdwapp.on('rdwapp.time', function(e) {
                var $contact = $(e.target),
                    timefrom = $contact.data('timefrom') || false,
                    timeto = $contact.data('timeto') || false,
                    timezone = parseInt($contact.data('timezone')) || 0;
                if (!timeto || !timefrom || (timefrom === timeto)) {
                    return true;
                }
                var timeCurrent = new Date(),
                    n = timeCurrent.getTimezoneOffset(),
                    timeZoneOffset = -n - timezone;
                var timeTo = new Date(),
                    timeFrom = new Date();
                var hr, min;
                hr = plugin.timeStringToInt(timefrom[0], timefrom[1]);
                min = plugin.timeStringToInt(timefrom[3], timefrom[4]);
                timeFrom.setHours(hr);
                timeFrom.setMinutes(min + timeZoneOffset);
                hr = plugin.timeStringToInt(timeto[0], timeto[1]);
                min = plugin.timeStringToInt(timeto[3], timeto[4]);
                timeTo.setHours(hr);
                timeTo.setMinutes(min + timeZoneOffset);
                if (!(timeCurrent.getTime() >= timeFrom.getTime() && timeCurrent.getTime() <= timeTo.getTime())) {
                    $contact.addClass('rdwapp-readonly');
                }
                if (!timezone) {
                    return true;
                }
                $contact.find('.from').text(plugin.timeDateToString(timeFrom));
                $contact.find('.to').text(plugin.timeDateToString(timeTo));
            });
            $rdwapp.on('rdwapp.pro', function(e) {
                $rdwapp.find('.rdwapp-toggle').trigger('rdwapp.time');
                $rdwapp.find('.rdwapp-account').each(function(i, contact) {
                    $(contact).trigger('rdwapp.time');
                });
            });
            $rdwapp.on('rdwapp.resize', function(e) {
                if ($(this).hasClass('rdwapp-show')) {
                    $(this).trigger('rdwapp.toggle');
                }
            });
            $rdwapp.on('rdwapp.init', function(e) {
                if (!plugin.mobiledevice) {
                    $rdwapp.addClass('desktop').removeClass('mobile');
                } else {
                    $rdwapp.addClass('mobile').removeClass('desktop');
                }
                $rdwapp.addClass('rdwapp-js-ready');
            });
            $rdwapp.on('rdwapp.init', function(e) {
                if ($rdwapp.hasClass('rdwapp-premium')) {
                    $rdwapp.trigger('rdwapp.pro');
                }
            });
            $rdwapp.addClass('rdwapp-js-ready').trigger('rdwapp.init');
            $rdwapp.on('rdwapp.height', function(e) {
                var $container = $(e.delegateTarget),
                    $body = $container.find('.rdwapp-body'),
                    $carousel = $body.find('.rdwapp-carousel');
                var $header = $container.find('.rdwapp-header'),
                    $footer = $container.find('.rdwapp-footer'),
                    height = ($(window).innerHeight() - $header.outerHeight() - $footer.outerHeight());
                if (!plugin.mobiledevice) {
                    height = ($(window).innerHeight() * 0.7 - $header.outerHeight() - $footer.outerHeight());
                }
                $carousel.css({
                    'max-height': height + 'px'
                });
            });
            $rdwapp.on('rdwapp.toggle', function(e) {
                var $container = $(e.delegateTarget),
                    $box = $container.find('.rdwapp-box');
                $container.addClass('rdwapp-transition');
                $box.removeClass('response texting');
                setTimeout(function() {
                    $container.toggleClass('rdwapp-show').trigger('rdwapp.height');
                }, 10);
                setTimeout(function() {
                    $container.toggleClass('rdwapp-transition');
                }, 300);
            });
            $rdwapp.on('click', '[data-action=box], [data-action=close]', function(e) {
                e.preventDefault();
                $(e.delegateTarget).trigger('rdwapp.toggle');
            });
            $rdwapp.on('click', '[data-action=open]', function(e) {
                var url = 'https://api.whatsapp.com/send';
                if (!plugin.mobiledevice) {
                    url = 'https://web.whatsapp.com/send';
                }
                var $button = $(this),
                    message = $button.data('message') || '',
                    phone = $button.data('phone') || '';
                $(this).attr('href', url + '?phone=' + phone + '&text=' + message);
            });
            $rdwapp.on('click', '[data-action=previous]', function(e) {
                e.preventDefault();
                var $container = $(e.delegateTarget),
                    $box = $container.find('.rdwapp-box');
                $box.addClass('closing');
                setTimeout(function() {
                    $box.removeClass('response').removeClass('closing');
                    $box.removeClass('texting')
                }, 300);
            });
            $rdwapp.on('click', '[data-action=chat]', function(e) {
                e.preventDefault();
                var $contact = $(this),
                    $container = $(e.delegateTarget),
                    $box = $container.find('.rdwapp-box'),
                    avatar = $contact.find('.rdwapp-avatar img').attr('src'),
                    name = $contact.find('.rdwapp-name').text(),
                    label = $contact.find('.rdwapp-label').text(),
                    time = $contact.find('.rdwapp-time').text(),
                    message = $contact.data('message'),
                    phone = $contact.data('phone');
                $box.addClass('response').addClass('opening');
                $container.trigger('rdwapp.height');
                setTimeout(function() {
                    $box.removeClass('opening');
                }, 300);
                var $reply = $box.find('.rdwapp-reply'),
                    $header = $box.find('.rdwapp-header'),
                    $avatar = $header.find('.rdwapp-avatar img'),
                    $number = $header.find('.rdwapp-number'),
                    $name = $header.find('.rdwapp-name'),
                    $label = $header.find('.rdwapp-label'),
                    $message = $box.find('.rdwapp-message');
                var meta = time ? time + ' - ' + label : label;
                $reply.data('phone', phone);
                $avatar.attr('src', avatar);
                $number.html(phone);
                $name.html(name);
                $label.html(meta);
                $message.html(message);
            });
            $rdwapp.on('click', 'textarea', function(e) {
                $rdwapp.off('rdwapp.resize');
            });
            $rdwapp.on('keypress', 'textarea', function(e) {
                if (e.keyCode == 13) {
                    $rdwapp.find('.rdwapp-reply').trigger('click');
                    setTimeout(function() {
                        window.location = $rdwapp.find('.rdwapp-reply').attr('href');
                    }, 100);
                }
            });
            $rdwapp.on('keyup', '[data-action=response]', function(e) {
                e.preventDefault();
                var $textarea = $(this).find('textarea'),
                    $pre = $(this).find('pre'),
                    $reply = $(this).find('.rdwapp-reply'),
                    $container = $(e.delegateTarget),
                    $box = $container.find('.rdwapp-box'),
                    $buttons = $box.find('.rdwapp-buttons');
                $pre.html($textarea.val());
                setTimeout(function() {
                    $box.addClass('texting').css({
                        'padding-bottom': $pre.outerHeight()
                    });
                    $buttons.addClass('active');
                    var message = $textarea.val();
                    $reply.data('message', message);
                    if (message == '') {
                        $box.removeClass('texting');
                        $buttons.removeClass('active');
                    }
                }, 300);
            });
        }
    };
    $.fn.rdwapp = function(options) {
        var args = arguments;
        if (options === undefined || typeof options === 'object') {
            return this.each(function() {
                if (!$.data(this, 'plugin_rdwapp')) {
                    $.data(this, 'plugin_rdwapp', new Plugin(this, options));
                }
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            var returns;
            this.each(function() {
                var instance = $.data(this, 'plugin_rdwapp');
                if (instance instanceof Plugin && typeof instance[options] === 'function') {
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }
                if (options === 'destroy') {
                    $.data(this, 'plugin_rdwapp', null);
                }
            });
            return returns !== undefined ? returns : this;
        }
    }

    function rdwapp_init() {
        $('div#rdwapp').rdwapp();
    }
    rdwapp_init();
    $(window).on('load', function() {
        rdwapp_init();
    });
    $(window).on('click', function(e) {
        if (!$(e.target).closest('#rdwapp.rdwapp-show').length) {
            $('div#rdwapp.rdwapp-show').trigger('rdwapp.toggle');
        }
    });
    $(window).on('resize', function(e) {
        $('div#rdwapp').trigger('rdwapp.resize');
        $('div#rdwapp').trigger('rdwapp.init');
    });
})(jQuery, window, document);
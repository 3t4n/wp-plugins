( function( $ ) {

    "use strict";

    function isTouchEnabled() {
    return (('ontouchstart' in window)
        || (navigator.MaxTouchPoints > 0)
        || (navigator.msMaxTouchPoints > 0));
    }

    $(document).ready(function () {
        $("path[id^=\"wdmap_\"]").each(function (i, e) {
            addEvent($(e).attr('id'));
        });
    });

    function addEvent(id, relationId) {
        var _obj = $('#' + id);
        var _Textobj = $('#' + id + ',' + '#' + wd_map_config[id]['title']);
        var _abb = $('#' + wd_map_config[id]['title']);
        $('#wdmapwrapper').css({'opacity': '1'});

        if(wd_map_config['default']['wdshowvisns'] === true) {
            $('#wdvisns').css({'fill': wd_map_config['default']['wdvisns']});
            $('#wdvisns').css({'opacity': '1'});
        } else {
            $('#wdvisns').css({'opacity': '0'});
        }

        _obj.attr({'fill': wd_map_config[id]['upclr'], 'stroke': wd_map_config['default']['wdbrdrclr']});

        _Textobj.attr({'cursor': 'default'});

        if (wd_map_config[id]['enbl'] === true) {
            if (isTouchEnabled()) {
                var touchmoved;
                _Textobj.on('touchend', function (e) {
                    if (touchmoved !== true) {
                        _Textobj.on('touchstart', function (e) {
                            let touch = e.originalEvent.touches[0];
                            let x = touch.pageX - 10, y = touch.pageY + (-15);

                            let $wdmtip = $('#tipwdmap');
                            let wdmaptipw = $wdmtip.outerWidth(),
                                wdmaptiph = $wdmtip.outerHeight();

                            x = (x + wdmaptipw > $(document).scrollLeft() + $(window).width()) ? x - wdmaptipw - (20 * 2) : x
                            y = (y + wdmaptiph > $(document).scrollTop() + $(window).height()) ? $(document).scrollTop() + $(window).height() - wdmaptiph - 10 : y

                            if (wd_map_config[id]['targt'] !== 'none') {
                                _obj.css({'fill': wd_map_config[id]['dwnclr']});
                            }
                            $wdmtip.show().html(wd_map_config[id]['hover']);
                            $wdmtip.css({left: x, top: y})
                        })
                        _Textobj.on('touchend', function () {
                            _obj.css({'fill': wd_map_config[id]['upclr']});
                            if (wd_map_config[id]['targt'] === '_blank') {
                                window.open(wd_map_config[id]['url']);
                            } else if (wd_map_config[id]['targt'] === '_self') {
                                window.parent.location.href = wd_map_config[id]['url'];
                            }
                            $('#tipwdmap').hide();
                        })
                    }
                }).on('touchmove', function (e) {
                    touchmoved = true;
                }).on('touchstart', function () {
                    touchmoved = false;
                });
            }
            _Textobj.attr({'cursor': 'pointer'});

            _Textobj.on('mouseenter', function () {
                $('#tipwdmap').show().html(wd_map_config[id]['hover']);
                _obj.css({'fill': wd_map_config[id]['ovrclr']});
                _abb.css({'fill': wd_map_config['default']['wdvisnshover']});
            }).on('mouseleave', function () {
                $('#tipwdmap').hide();
                _obj.css({'fill': wd_map_config[id]['upclr']});
                _abb.css({'fill': wd_map_config['default']['wdvisns']});
            });
            if (wd_map_config[id]['targt'] !== 'none') {
                _Textobj.on('mousedown', function () {
                    _obj.css({'fill': wd_map_config[id]['dwnclr']});
                });
            }
            _Textobj.on('mouseup', function () {
                _obj.css({'fill': wd_map_config[id]['ovrclr']});
                if (wd_map_config[id]['targt'] === '_blank') {
                    window.open(wd_map_config[id]['url']);
                } else if (wd_map_config[id]['targt'] === '_self') {
                    window.parent.location.href = wd_map_config[id]['url'];
                }
            });
            _Textobj.on('mousemove', function (e) {
                let x = e.pageX + 10, y = e.pageY + 15;

                let $mwd = $('#tipwdmap');
                let wdmaptipw = $mwd.outerWidth(), wdmaptiph = $mwd.outerHeight();

                x = (x + wdmaptipw > $(document).scrollLeft() +
                    $(window).width()) ? x - wdmaptipw - (20 * 2) : x
                y = (y + wdmaptiph > $(document).scrollTop() + $(window).height()) ?
                    $(document).scrollTop() + $(window).height() - wdmaptiph - 10 : y

                $mwd.css({left: x, top: y})
            })
        }
        else {
            _abb.css({'fill-opacity':'0.5'});
        }
    }
})(jQuery);

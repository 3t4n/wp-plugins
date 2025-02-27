( function( $ ) {

    "use strict";

    function isTouchEnabled() {
    return (('ontouchstart' in window)
        || (navigator.MaxTouchPoints > 0)
        || (navigator.msMaxTouchPoints > 0));
    }

    $(document).ready(function () {
        $("path[id^=\"usrmap_\"]").each(function (i, e) {
            addEvent($(e).attr('id'));
        });
    });

    function addEvent(id, relationId) {
        var _obj = $('#' + id);
        var _Textobj = $('#' + id + ',' + '#' + usr_map_config[id]['title']);
        var _abb = $('#' + usr_map_config[id]['title']);
        $('#usrmapwrapper').css({'opacity': '1'});

        if(usr_map_config['default']['usrshowvisns'] === true) {
            $('#usrvisns').css({'fill': usr_map_config['default']['usrvisns']});
            $('#usrvisns').css({'opacity': '1'});
        } else {
            $('#usrvisns').css({'opacity': '0'});
        }

        if(usr_map_config['default']['usrshowlakes'] === true) {
            $('#usrlakes path').css({'stroke': usr_map_config['default']['usrbrdrclr']});
            $('#usrlakes').css({'fill': usr_map_config['default']['usrlakesfill']});
            $('#usrlakes').css({'visibility': 'visible'});
        } else {
            $('#usrlakes').css({'visibility': 'hidden'});
        }

        _obj.attr({'fill': usr_map_config[id]['upclr'], 'stroke': usr_map_config['default']['usrbrdrclr']});

        _Textobj.attr({'cursor': 'default'});

        if (usr_map_config[id]['enbl'] === true) {
            if (isTouchEnabled()) {
                var touchmoved;
                _Textobj.on('touchend', function (e) {
                    if (touchmoved !== true) {
                        _Textobj.on('touchstart', function (e) {
                            let touch = e.originalEvent.touches[0];
                            let x = touch.pageX - 10, y = touch.pageY + (-15);

                            let $usrmtip = $('#tipusrmap');
                            let usrmaptipw = $usrmtip.outerWidth(),
                                usrmaptiph = $usrmtip.outerHeight();

                            x = (x + usrmaptipw > $(document).scrollLeft() + $(window).width()) ? x - usrmaptipw - (20 * 2) : x
                            y = (y + usrmaptiph > $(document).scrollTop() + $(window).height()) ? $(document).scrollTop() + $(window).height() - usrmaptiph - 10 : y

                            if (usr_map_config[id]['targt'] !== 'none') {
                                _obj.css({'fill': usr_map_config[id]['dwnclr']});
                            }
                            $usrmtip.show().html(usr_map_config[id]['hover']);
                            $usrmtip.css({left: x, top: y})
                        })
                        _Textobj.on('touchend', function () {
                            _obj.css({'fill': usr_map_config[id]['upclr']});
                            if (usr_map_config[id]['targt'] === '_blank') {
                                window.open(usr_map_config[id]['url']);
                            } else if (usr_map_config[id]['targt'] === '_self') {
                                window.parent.location.href = usr_map_config[id]['url'];
                            }
                            $('#tipusrmap').hide();
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
                $('#tipusrmap').show().html(usr_map_config[id]['hover']);
                _obj.css({'fill': usr_map_config[id]['ovrclr']});
                _abb.css({'fill': usr_map_config['default']['usrvisnshover']});
            }).on('mouseleave', function () {
                $('#tipusrmap').hide();
                _obj.css({'fill': usr_map_config[id]['upclr']});
                _abb.css({'fill': usr_map_config['default']['usrvisns']});
            });
            if (usr_map_config[id]['targt'] !== 'none') {
                _Textobj.on('mousedown', function () {
                    _obj.css({'fill': usr_map_config[id]['dwnclr']});
                });
            }
            _Textobj.on('mouseup', function () {
                _obj.css({'fill': usr_map_config[id]['ovrclr']});
                if (usr_map_config[id]['targt'] === '_blank') {
                    window.open(usr_map_config[id]['url']);
                } else if (usr_map_config[id]['targt'] === '_self') {
                    window.parent.location.href = usr_map_config[id]['url'];
                }
            });
            _Textobj.on('mousemove', function (e) {
                let x = e.pageX + 10, y = e.pageY + 15;

                let $musr = $('#tipusrmap');
                let usrmaptipw = $musr.outerWidth(), usrmaptiph = $musr.outerHeight();

                x = (x + usrmaptipw > $(document).scrollLeft() +
                    $(window).width()) ? x - usrmaptipw - (20 * 2) : x
                y = (y + usrmaptiph > $(document).scrollTop() + $(window).height()) ?
                    $(document).scrollTop() + $(window).height() - usrmaptiph - 10 : y

                $musr.css({left: x, top: y})
            })
        }
        else {
            _abb.css({'fill-opacity':'0.5'});
        }
    }
})(jQuery);

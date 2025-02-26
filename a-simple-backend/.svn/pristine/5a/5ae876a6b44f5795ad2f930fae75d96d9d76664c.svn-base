(function($) {
    var _session = null;
    var _basic = function() {
        $.ajax({
            url: ajaxurl,
            data: {
                action: 'basic'
            },
            success: function() {
                if(console.log) {
                    console.log("Revert to Basic Mode");
                }
            }
        });
    };
    var _expire = function() {
        var timeout = 1800000;
        if(_session) {
            _session = clearTimeout(_session);
        }

        _session = setTimeout(_basic, timeout);
    };

    var _resize = function() {
        $(".postbox-container > .ui-sortable").each(function() {
            var that = $(this);
            var postboxes = $(".postbox", that);

            if(postboxes.length) {
                var min_height = 0;
                var outer_width = 0;
                var w = that.width();
                var length = postboxes.length;

                postboxes.css({
                    minHeight: 0,
                    minWidth: 0
                });
                postboxes.removeClass('postbox-last');
                postboxes.removeClass('postbox-right');
                postboxes.removeClass('postbox-nth-row');

                postboxes.each(function () {
                    var that = $(this);

                    if (that.height() > min_height) {
                        min_height = that.height();
                    }

                    outer_width += that.outerWidth(true);
                });

                //if(outer_width > that.width()) {
                    var _postboxes = [];
                    if(length%2) {   //odd
                        _postboxes = postboxes.filter(function(index) {
                            var that = $(this);
                            if(index < length - 1) {
                                return true;
                            } else {
                                that.addClass('postbox-last');
                                return false;
                            }
                        });
                        length = _postboxes.length;
                    } else {    //even
                        _postboxes = postboxes;
                    }
                    var columns = 0;
                    var tw = 0;


                    _postboxes.each(function() {
                        if(tw + $(this).outerWidth(true) < that.width()) {
                            tw += $(this).outerWidth(true);
                            columns++;
                        }
                    });

                    //even
                    if(length%2 == 0) {
                        while (columns % 2) {
                            columns--;
                        }
                    }

                    if(columns > 1) {
                        var spacer = parseFloat(_postboxes.eq(length - 1).css("margin-right")) / columns;
                        var min_width = (that.width() / columns) + spacer;
                        var right = 1;
                        _postboxes.each(function (index) {
                            var that = $(this);
                            that.css({
                                minWidth: min_width - parseFloat(that.css('margin-right')) - parseFloat(that.css('border-left-width')) - parseFloat(that.css('border-right-width'))
                            });
                            if (index >= columns) {
                                that.addClass('postbox-nth-row');
                            }
                            if (right < columns) {
                                right++;
                            } else {
                                that.addClass('postbox-right');
                                right = 1;
                            }
                        });
                    } else {
                        _postboxes.addClass('postbox-last');
                    }
                //}

                postboxes.each(function() {
                    var that = $(this);

                    if(! that.hasClass('postbox-last') && ! that.hasClass('closed')) {
                        that.css({
                            minHeight: min_height
                        });
                    }
                });
            }
        });
    };

    $(document).ready(function() {
        $(this).on(window.interact.touchStart, _expire).on(window.interact.touchMove, _expire);

        var settings = $(".asimplebackend-settings");
        var export_import = $(".asimplebackend-export-import", settings);
        var export_import_form = $(".asimplebackend-export-import-form", settings);

        var repos_file_input = function() {
            var button = $(".asimplebackend-settings .asimplebackend-export-import a:last-child");
            var input = $("input[type='file']", export_import_form);

            if(button.length && input.length) {
                input.css({
                    top: 0,
                    left: 0
                });

                var button_offset = button.offset();
                var input_offset = input.offset();

                input.css({
                    height: button.outerHeight(),
                    width: button.outerWidth(),
                    top: button_offset.top - input_offset.top,
                    left: button_offset.left - input_offset.left
                });
            }
        };

        $(window).on('load mobileinit resize orientationchange', repos_file_input);

        settings.css({
            height: 'auto'
        });
        settings.animate({
            opacity: 1
        }, {
            queue: false,
            duration: 1000
        });

        $("input[type='file']", export_import_form).change(function(e) {
            e.preventDefault();

            var that = $(this);
            var file = that.val().split(/[\\/]/).pop();

            if(file.split('.').pop().toLowerCase() == 'json') {
                export_import_form.submit();
            }
        });

        $("form", settings).not('.asimplebackend-export-import-form').on("submit", function(e) {
            $(this).parent().hide();
            $("input[type='checkbox']", this).not('.menu-item-checkbox').not('.menu-item-allow').each(function() {
                var that = $(this);

                if (that.prop("checked")) {
                    that.prop("checked", false);
                } else {
                    that.prop("checked", true);
                }
            });
        }).on('keypress', function(e) {
            e = e || event;

            if(e.which == 13) {
                e.preventDefault(); //don't submit on Enter key
            }
        });

        $("#asimplebackend-custom-rss").next().on('change', function() {
            $(this).prev().val($(this).val());
        });

        if(! asimplebackend_mode) {  //basic mode
            //why interval, not resize or init?
            //async methods. thats why.
            //var i = setInterval(_resize, 200);
            if(! $.inArray(pagenow, asimplebackend_exempt)) {
                $(window).on('load mobileinit resize orientationchange', _resize);
            }

            if(! $("#submitdiv").length && asimplebackend_save) {
                var submit = document.createElement("input");
                var span = document.createElement("span");
                var title = $("#titlediv #titlewrap");
                var input = $("#title", title);
                var post_type = $("#post_type").val();
                var status = $("#asimplebackend-post-status");

                span.className = "asimplebackend-cb-wrapper";
                span = $(span);

                if(status.val() != 'publish') {
                    var cb = document.createElement("input");
                    var label = document.createElement("label");

                    span.addClass('asimplebackend-draft');

                    cb.id = "asimplebackend-cb-draft";
                    cb.type = "checkbox";
                    cb.name = "asimplebackend-post-draft";
                    if (status.val() == 'draft') {
                        cb.checked = true;
                    }
                    cb = $(cb);

                    label.htmlFor = cb.attr("id");
                    label.innerHTML = "Save for Later";
                    label = $(label);

                    span.append(cb);
                    span.append(label);
                }

                submit.id = "publish";
                submit.name = "publish";
                submit.type = "submit";
                submit.value = "Save Changes...";
                submit.className = "asimplebackend-button button button-primary button-large";
                submit = $(submit);

                span.append(submit);

                var _resize_title = function() {
                    var w = span.outerWidth(true);

                    input.css({
                        width: ''
                    });

                    input.css({
                        width: input.width() - w
                    });
                };

                title.append(span);

                $(window).on('load mobileinit resize orientationchange', _resize_title);
            }
        }

        if(! $('#wp-admin-bar-backend-basic').length) {
            var _text = setInterval(function () {
                $(".wp-editor-container iframe").each(function () {
                    var ifr = $(this);

                    //WooCommerce Add Product
                    if(typeof pagenow != 'undefined' && pagenow == 'product') {
                        ifr.css({
                            minHeight: 200
                        });

                        _text = clearInterval(_text);
                    } else {
                        var height = ifr.contents().find('html').height();
                        ifr.prop('scrolling', 'no');

                        ifr.css({
                            height: height
                        });
                    }
                });
            }, 1000);
        }

        $(".asimplebackend-plugins-tooltip", settings).tooltip({
            tooltipClass: 'asimplebackend-tooltip',
            position: {
                at: "right center",
                my: "left center",
                collision: "flipfit flipfit"
            },
            hide: false,
            show: false,
            open: function(event, ui) {
                ui.tooltip.css({
                    top: parseFloat(ui.tooltip.css('top')) - ui.tooltip.outerHeight()
                });
            },
            close: function(event, ui) {
                //ensure class is removed
                $(".asimplebackend-plugins-tooltip", settings).removeClass('asimplebackend-tooltip-open');
            }
        }).unbind('mouseover');

        $(".asimplebackend-plugins-tooltip", settings).each(function() {
            var that = $(this);

            that.click(function(e) {
                e.stopPropagation();
                e.preventDefault();
            }).on(window.interact.touchEnd, function(e) {
                var that = $(this);

                if(that.hasClass('asimplebackend-tooltip-open')) {
                    that.tooltip('close');
                } else {
                    that.addClass('asimplebackend-tooltip-open');
                    that.tooltip('open');
                }
            });
        });
    });

    $(window).on('load mobileinit', function() {
        $("input[type='submit'].hide").removeClass('hide');
    });
})(jQuery);
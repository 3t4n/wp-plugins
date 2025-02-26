(function($) {
    var menu = function() {
        var submit = $('.asimplebackend-settings .submit-add-to-menu');
        var form = $('.asimplebackend-settings form');
        var menu_sortable = $(".asimplebackend-settings #menu-to-edit");

        var refresh_sliders = function() {
            var subs = $(".menu-submenu-item");
            subs.each(function() {
                var that = $(this);
                var select = $("select", that);
                var slider = $(".asimplebackend-slider", that);

                if (!slider.hasClass("ui-slider")) {
                    var s = slider.slider({
                        min: 0,
                        max: 1,
                        range: "min",
                        value: 0,
                        slide: function(e, ui) {
                            select[0].selectedIndex = ui.value;
                        },
                    });

                    select.on('change', function() {
                        s.slider("value", this.selectedIndex);
                    }).trigger('change');
                }
            });

            var items = $(".menu-item-page, .menu-item-custom", ".asimplebackend-settings");
            items.each(function() {
                var that = $(this);

                if (!that.hasClass('menus-move-bind')) {
                    that.addClass('menus-move-bind');

                    $(".menus-move-up", that).on(window.interact.touchEnd, function(e) {
                        e.preventDefault();
                        that.prev().before(that);
                        check_menu();
                    });
                    $(".menus-move-down", that).on(window.interact.touchEnd, function(e) {
                        e.preventDefault();
                        that.next().after(that);
                        check_menu();
                    });
                    $(".menus-move-top", that).on(window.interact.touchEnd, function(e) {
                        e.preventDefault();
                        that.siblings().eq(0).before(that);
                        check_menu();
                    });
                }
            });
        };

        refresh_sliders();
        var refresh_names = function() {
            var menus = menu_sortable.children();

            menus.each(function(index, value) {
                var that = $(this);
                var input = $('input, select, textarea', that);

                input.each(function() {
                    var that = $(this);
                    var name = that.attr('name');

                    that.attr('name', name.slice(0, name.indexOf('[')) + '[' + index + name.substr(name.indexOf(']')));
                });
            });
        };
        var menus_move = function(index, v) {
            var that = $(this);

            if (index) {
                $(".menus-move-up", that).show();
                $(".menus-move-top", that).show();
            } else {
                $(".menus-move-up", that).hide();
                $(".menus-move-top", that).hide();
            }

            if (index == that.parent().children().length - 1) { //last
                $(".menus-move-down", that).hide();
            } else {
                $(".menus-move-down", that).show();
            }
        };
        var check_menu = function() {
            var menus = menu_sortable.children();

            if (menus.length < 1) {
                menus.find('.field-move').hide();
            } else {
                menus.find('.field-move').show();
            }

            menus.each(menus_move);
            refresh_names();
        };
        menu_sortable.sortable({
            stop: check_menu
        });

        check_menu();

        //custom link text input
        $(".asimplebackend-settings #custom-menu-item-name").on('blur', function() {
            $(this).addClass('input-with-default-title');
        }).on('focus', function() {
            $(this).removeClass('input-with-default-title');
        });

        $(document).on(window.interact.touchEnd, '.asimplebackend-settings .item-edit', function(e) {
            e.preventDefault();
            var that = $(this);
            var parent = that.parents("li");
            var settings = $(".menu-item-settings", parent);

            settings.slideToggle(200);
            parent.toggleClass('menu-item-edit-inactive');
            parent.toggleClass('menu-item-edit-active');
        }).on('click', '.asimplebackend-settings .item-edit', function(e) {
            console.log('111');
            e.preventDefault();
        });


        $(document).on(window.interact.touchEnd, '.asimplebackend-settings .item-cancel', function(e) {
            e.preventDefault();
            var that = $(this);
            var parent = that.parents("li");
            var settings = $(".menu-item-settings", parent);

            settings.hide(0);
            parent.toggleClass('menu-item-edit-inactive');
            parent.toggleClass('menu-item-edit-active');
        }).on('click', '.asimplebackend-settings .item-cancel', function(e) {
            console.log('222');
            e.preventDefault();
        });

        $(document).on(window.interact.touchEnd, '.asimplebackend-settings .item-delete', function(e) {
            e.preventDefault();
            var that = $(this);
            var parent = that.parents("li");

            parent.animate({
                opacity: 0,
                height: 0
            }, {
                queue: false,
                duration: 200,
                complete: function() {
                    parent.remove();
                }
            });
        }).on('click', '.asimplebackend-settings .item-delete', function(e) {
            console.log('333');
            e.preventDefault();
        });

        $(".asimplebackend-settings #add-menu, .asimplebackend-settings #add-page, .asimplebackend-settings #add-media").each(function() {
            var that = $(this);
            var select_all = $(".select-all", that);
            var checkboxes = $(".menu-item-checkbox", that);

            select_all.on(window.interact.touchEnd, function(e) {
                e.preventDefault();

                checkboxes.prop('checked', true);
            }).on('click', function(e) {
                e.preventDefault();
            });
        });

        $(".asimplebackend-settings .asimplebackend-alpha-desc").on(window.interact.touchEnd, function(e) {
            e.preventDefault();

            var menus = menu_sortable.children();
            var titles = [];

            menus.sort(function(a, b) {
                return $(".menu-item-title", a).html().localeCompare($(".menu-item-title", b).html());
            });

            menus.detach().appendTo(menu_sortable);

            refresh_names();
        }).click(function(e) {
            e.preventDefault();
        });

        $(".asimplebackend-settings .asimplebackend-alpha-asc").on(window.interact.touchEnd, function(e) {
            e.preventDefault();

            var menus = menu_sortable.children();
            var titles = [];

            menus.sort(function(a, b) {
                return $(".menu-item-title", b).html().localeCompare($(".menu-item-title", a).html());
            });

            menus.detach().appendTo(menu_sortable);

            refresh_names();
        }).click(function(e) {
            e.preventDefault();
        });

        $(document).on('focus', '.asimplebackend-settings .edit-menu-item-title', function(e) {
            var that = $(this);
            that.attr('data-original', that.val());

        }).on('keyup', function(e) {
            var that = $(this);
            that.closest('.menu-item-page').find('.menu-item-title').html(that.val());
        }).on('change', function(e) {
            var that = $(this);
            if ($.trim(that.val()) == '') {
                that.val(that.attr('data-original'));
                that.trigger('keyup');
            }
        });

        submit.on(window.interact.touchEnd, function(e) {
            e.preventDefault();
            e.stopPropagation();

            var that = $(this);
            var action = null;
            var data = {};
            var empty = true;
            var items = 0;
            var check = [];

            switch (that.attr('id')) {
                case 'submit-menu':
                    data.action = 'add_menu';
                    data.menu = [];
                    check = $(".asimplebackend-settings #add-menu .menu-item-checkbox");
                    if (check.length) {
                        check.each(function() {
                            var that = $(this);

                            if (that.is(":checked")) {
                                empty = false;
                                var menu = {
                                    name: that.parent().siblings(".menu-item-name").val(),
                                    orig: that.parent().siblings(".menu-item-name").val(),
                                    index: menu_sortable.children().length + items,
                                    link: that.parent().siblings(".menu-item-link").val()
                                };

                                if (that.parent().siblings(".menu-item-submenu").length) {
                                    menu.submenu = that.parent().siblings(".menu-item-submenu").val();
                                }

                                if (that.parent().hasClass('submenu-item-title')) {
                                    menu.toplink = '1';
                                }

                                data.menu.push(menu);
                                items++;
                            }
                        });
                    }
                    break;
                case 'submit-customlink':
                    var link = $(".asimplebackend-settings #custom-menu-item-link");
                    var name = $(".asimplebackend-settings #custom-menu-item-name");
                    var target = $(".asimplebackend-settings #custom-menu-item-target");

                    data.action = 'add_link';
                    data.link = link.val();
                    data.name = name.val();
                    data.target = target.val();
                    data.index = menu_sortable.children().length + items;

                    if ($.trim(data.link).length && $.trim(data.link) != 'http://' && $.trim(data.link) != 'https://' && $.trim(data.name).length) {
                        empty = false;
                        //clear
                        link.val("http://");
                        name.val("");
                        items++;
                    }
                    break;
                case 'submit-page':
                    data.action = 'add_page';
                    data.page = [];

                    check = $(".asimplebackend-settings #add-page .menu-item-checkbox");
                    if (check.length) {
                        check.each(function() {
                            var that = $(this);
                            if (that.is(":checked")) {
                                empty = false;
                                var page = {
                                    name: that.parent().siblings(".menu-item-name").val(),
                                    orig: that.parent().siblings(".menu-item-name").val(),
                                    index: menu_sortable.children().length + items,
                                    link: that.parent().siblings(".menu-item-link").val(),
                                };

                                data.page.push(page);
                                items++;
                            }
                        });
                    }
                    break;
                case 'submit-media':
                    data.action = 'add_media';
                    data.media = [];

                    check = $(".asimplebackend-settings #add-media .menu-item-checkbox");
                    if (check.length) {
                        check.each(function() {
                            var that = $(this);
                            if (that.is(":checked")) {
                                empty = false;

                                var media = {
                                    name: that.parent().siblings(".menu-item-name").val(),
                                    orig: that.parent().siblings(".menu-item-name").val(),
                                    index: menu_sortable.children().length + items,
                                    link: that.parent().siblings(".menu-item-link").val()
                                };

                                data.media.push(media);
                                items++;
                            }
                        });
                    }
                    break;
            }

            if (!empty) {
                that.siblings(".spinner").addClass('is-active');
                $.ajax({
                    complete: function() {
                        that.siblings(".spinner").removeClass('is-active');
                        $(".asimplebackend-settings #add-menu .menu-item-checkbox").prop('checked', false); //uncheck selected menu(s)
                    },
                    data: data,
                    method: 'POST',
                    success: function(data, status, xhr) {
                        $(".asimplebackend-settings #menu-to-edit").append(data);
                        refresh_sliders();
                    },
                    url: ajaxurl
                });
            }
        });
    };

    $(window).load(menu);
})(jQuery);
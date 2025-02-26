(function ($, undefined) {

    /*
     * Slider object.
     */
    $.Slider = function (options, element) {

        this.$el = $(element);
        this._init(options);
    };
    $.timer = function (func, time, autostart) {
        this.set = function (func, time, autostart) {
            this.init = true;
            if (typeof func == 'object') {
                var paramList = ['autostart', 'time'];
                for (var arg in paramList) {
                    if (func[paramList[arg]] != undefined) {
                        eval(paramList[arg] + " = func[paramList[arg]]");
                    }
                }
                ;
                func = func.action;
            }
            if (typeof func == 'function') {
                this.action = func;
            }
            if (!isNaN(time)) {
                this.intervalTime = time;
            }
            if (autostart && !this.isActive) {
                this.isActive = true;
                this.setTimer();
            }
            return this;
        };
        this.once = function (time) {
            var timer = this;
            if (isNaN(time)) {
                time = 0;
            }
            window.setTimeout(function () {
                timer.action();
            }, time);
            return this;
        };
        this.play = function (reset) {
            if (!this.isActive) {
                if (reset) {
                    this.setTimer();
                }
                else {
                    this.setTimer(this.remaining);
                }
                this.isActive = true;
            }
            return this;
        };
        this.pause = function () {
            if (this.isActive) {
                this.isActive = false;
                this.remaining -= new Date() - this.last;
                this.clearTimer();
            }
            return this;
        };
        this.stop = function () {
            this.isActive = false;
            this.remaining = this.intervalTime;
            this.clearTimer();
            return this;
        };
        this.toggle = function (reset) {
            if (this.isActive) {
                this.pause();
            }
            else if (reset) {
                this.play(true);
            }
            else {
                this.play();
            }
            return this;
        };
        this.reset = function () {
            this.isActive = false;
            this.play(true);
            return this;
        };
        this.clearTimer = function () {
            window.clearTimeout(this.timeoutObject);
        };
        this.setTimer = function (time) {
            var timer = this;
            if (typeof this.action != 'function') {
                return;
            }
            if (isNaN(time)) {
                time = this.intervalTime;
            }
            this.remaining = time;
            this.last = new Date();
            this.clearTimer();
            this.timeoutObject = window.setTimeout(function () {
                timer.go();
            }, time);
        };
        this.go = function () {
            if (this.isActive) {
                this.action();
                this.setTimer();
            }
        };
        if (this.init) {
            return new $.timer(func, time, autostart);
        } else {
            this.set(func, time, autostart);
            return this;
        }
    };
    $.Slider.defaults = {
        current: 0, // index of current slide
        bgincrement: 50, // increment the bg position (parallax effect) when sliding
        autoplay: false, // slideshow on / off
        interval: 40000, // time between transitions
        animationIn: "fadeInUp",
        animationOut: "fadeOutUp",
        pauseOnHover: false,
        keyboard: false,
        mousewheel: false,
        thumbnails: false,
        swipe: false
    };
    $.Slider.prototype = {
        _init: function (options) {

            this.options = $.extend(true, {}, $.Slider.defaults, options);
            this.$slides = this.$el.children('div.fruit-slide');
            this.slidesCount = this.$slides.length;
            this.current = this.options.current;
            if (this.current < 0 || this.current >= this.slidesCount) {

                this.current = 0;
            }

            $current = this.$slides.eq(this.current);
            var i = $current.attr("data-animate-in") ? $current.attr("data-animate-in") : this.options.animationIn;
            this.$slides.eq(this.current).addClass('active animated ' + i);
            var first_data = $current.find('.fruit-foreground .fruit-content .fruit-data');
            var first_anim_in = first_data.attr("data-animate-in") ? first_data.attr("data-animate-in") : 'fadeIn';
            first_data.addClass('animated ' + first_anim_in);
            var $navigation = $('<nav class="fruit-dots"/>');
            for (var i = 0; i < this.slidesCount; ++i) {

                $navigation.append('<span/>');
            }
            $navigation.appendTo('div.bullets');
            this.$navNext = this.$el.find('span.fruit-arrows-next');
            this.$navPrev = this.$el.find('span.fruit-arrows-prev');
            this.$pages = this.$el.find('nav.fruit-dots > span');
            this.isAnimating = false;
            this.bgpositer = 0;
            this.cssAnimations = Modernizr.cssanimations;
            this.cssTransitions = Modernizr.csstransitions;
            if (!this.cssAnimations || !this.cssAnimations) {

                this.$el.addClass('fruit-slider-fb');
            }

            this._updatePage();
            // load the events
            this._loadEvents();
            // slideshow
            if (this.options.autoplay) {

                this._startSlideshow();
            }

            if (this.options.pauseOnHover) {

                this._pauseonHover();
            }

            if (this.options.keyboard) {

                this._keyboard();
            }

            if (this.options.mousewheel) {

                this._mousewheel();
            }
            if (this.options.swipe) {

                this._swipe();
            }

            if (this.options.thumbnails) {

                this._thumbnails();
            }

        },
        _navigate: function (page, dir) {

            var $current = this.$slides.eq(this.current), $next, _self = this;
            if (this.current === page || this.isAnimating)
                return false;
            this.isAnimating = true;
            // check dir
            var classTo, classFrom, d;
            if (!dir) {

                (page > this.current) ? d = 'next' : d = 'prev';
            }
            else {

                d = dir;
            }

            this.current = page;
            $next = this.$slides.eq(this.current);
            if (this.cssAnimations && this.cssAnimations) {

                this.current = page;
                $next = this.$slides.eq(this.current);
                var next_data = $next.find('.fruit-foreground .fruit-content .fruit-data');
                var data_anim_in = next_data.attr("data-animate-in") ? next_data.attr("data-animate-in") : 'fadeIn';
                add_anim_in = 'animated ' + data_anim_in;
                var current_data = $current.find('.fruit-foreground .fruit-content .fruit-data');
                var current_data_anim_in = current_data.attr("data-animate-in") ? current_data.attr("data-animate-in") : 'fadeOut';
                current_anim_in = 'animated ' + current_data_anim_in;
                var current_data_out = $current.find('.fruit-foreground .fruit-content .fruit-data');
                var data_anim_out = current_data_out.attr("data-animate-out") ? current_data_out.attr("data-animate-out") : 'fadeOut';
                add_anim_out = 'animated ' + data_anim_out;
                var next_data_out = $next.find('.fruit-foreground .fruit-content .fruit-data');
                var next_data_anim_out = next_data_out.attr("data-animate-out") ? next_data_out.attr("data-animate-out") : 'fadeOut';
                next_anim_out = 'animated ' + next_data_anim_out;
                var r = $current.attr("data-animate-out") ? $current.attr("data-animate-out") : this.options.animationOut;
                var i = $next.attr("data-animate-in") ? $next.attr("data-animate-in") : this.options.animationIn;
                if (d === 'next') {

                    classTo = 'animated ' + r;
                    classFrom = 'animated ' + i;
                    ++this.bgpositer;
                }
                else {

                    classTo = 'animated ' + r;
                    classFrom = 'animated ' + i;
                    --this.bgpositer;
                }

                this.$el.css('background-position', this.bgpositer * this.options.bgincrement + '% 0%');
            }

            if (this.cssAnimations && this.cssAnimations) {

                var i = $current.attr("data-animate-in") ? $current.attr("data-animate-in") : this.options.animationIn;
                var r = $next.attr("data-animate-out") ? $next.attr("data-animate-out") : this.options.animationOut;
                var data = $next.find('.fruit-foreground .fruit-content .fruit-data');
                var current_data = $current.find('.fruit-foreground .fruit-content .fruit-data');
                var rmClasses = 'animated';
                $current.removeClass(rmClasses);
                $current.removeClass(i);
                $current.addClass(classTo);
                data.removeClass(next_anim_out);
                data.addClass(add_anim_in);
                current_data.removeClass(current_anim_in);
                current_data.addClass(add_anim_out);
                $next.removeClass(rmClasses);
                $next.removeClass(r);
                $next.addClass(classFrom);
                $current.removeClass('active');
                $next.addClass('active');
            }

            // fallback
            if (!this.cssAnimations || !this.cssAnimations) {

                $next.css('left', (d === 'next') ? '100%' : '-100%').stop().animate({
                    left: '0%'
                }, 1000, function () {
                    _self.isAnimating = false;
                });
                $current.stop().animate({
                    left: (d === 'next') ? '-100%' : '100%'
                }, 1000, function () {
                    $current.removeClass('active');
                });
            }

            this._updatePage();
        },
        _updatePage: function () {

            this.$pages.removeClass('fruit-dots-current');
            this.$pages.eq(this.current).addClass('fruit-dots-current');
            var $thumbnails = $(".fruit-thumbnails");
            $("ul li", $thumbnails).removeClass("active");
            $("ul li", $thumbnails).eq(this.current).addClass("active");
        },
        _startSlideshow: function () {

            var _self = this;
            this.slideshow = setTimeout(function () {

                var page = (_self.current < _self.slidesCount - 1) ? page = _self.current + 1 : page = 0;
                _self._navigate(page, 'next');
                if (_self.options.autoplay) {

                    _self._startSlideshow();
                }

            }, this.options.interval);
        },
        _pauseonHover: function () {

            var _self = this;
            if (this.options.autoplay == true)
            {
                if (this.options.pauseOnHover == true) {
                    $('.fruit-slide').hover(function () {
                        clearTimeout(_self.slideshow);
                        _self.options.autoplay = false;
                    }, function () {
                        _self._startSlideshow();
                    })
                }
            }
        },
        _keyboard: function () {
            var _self = this;
            $(document).keydown(function (e) {

                if (e.keyCode == 37) {
                    if (_self.options.autoplay) {
                        clearTimeout(_self.slideshow);
                        _self.options.autoplay = false;
                    }
                    var page = (_self.current > 0) ? page = _self.current - 1 : page = _self.slidesCount - 1;
                    _self._navigate(page, 'prev');
                    return false;
                }
                if (e.keyCode == 39) {
                    if (_self.options.autoplay) {
                        clearTimeout(_self.slideshow);
                        _self.options.autoplay = false;
                    }
                    var page = (_self.current < _self.slidesCount - 1) ? page = _self.current + 1 : page = 0;
                    _self._navigate(page, 'next');
                    return false;
                }
            })
        },
        _swipe: function () {
            var _self = this;

            $(".fruit-slide").swipe({
                //Generic swipe handler for all directions
                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {

                    if (direction == 'right') {

                        if (_self.options.autoplay) {
                            clearTimeout(_self.slideshow);
                            _self.options.autoplay = false;
                        }
                        var page = (_self.current > 0) ? page = _self.current - 1 : page = _self.slidesCount - 1;
                        _self._navigate(page, 'prev');
                        return false;
                    }
                    else if (direction == 'left') {

                        if (_self.options.autoplay) {
                            clearTimeout(_self.slideshow);
                            _self.options.autoplay = false;
                        }
                        var page = (_self.current < _self.slidesCount - 1) ? page = _self.current + 1 : page = 0;
                        _self._navigate(page, 'next');
                        return false;
                    }
                }
            })

        },
        _mousewheel: function () {

            var _self = this;
            $('.fruit-slide').bind("mousewheel DOMMouseScroll", function (e) {
                var t = parseInt(e.originalEvent.wheelDelta || -e.originalEvent.detail);
                if (t < 0) {
                    if (_self.options.autoplay) {
                        clearTimeout(_self.slideshow);
                        _self.options.autoplay = false;
                    }
                    var page = (_self.current < _self.slidesCount - 1) ? page = _self.current + 1 : page = 0;
                    _self._navigate(page, 'next');
                    return false;
                }
                if (t > 0) {
                    if (_self.options.autoplay) {
                        clearTimeout(_self.slideshow);
                        _self.options.autoplay = false;
                    }
                    var page = (_self.current > 0) ? page = _self.current - 1 : page = _self.slidesCount - 1;
                    _self._navigate(page, 'prev');
                    return false;
                }
                e.stopImmediatePropagation();
                e.stopPropagation();
                e.preventDefault();
            });
        },
        _thumbnails: function () {
            var _self = this;
            $length = this.slidesCount - 1;
            var $thumbnails = $(".fruit-thumbnails");
            var t;
            var n = 100 / ($length + 1);
            if (n > 25)
                n = 25;
            for (t = 0; t <= $length; t++) {
                var src = $(".fruit-background img").eq(t).attr("data-thumbnail") ? $(".fruit-background img").eq(t).attr("data-thumbnail") : $(".fruit-background img").eq(t).attr("src");
                var alt_tag = $(".fruit-background img").eq(t).attr("alt");
                $("ul", $thumbnails).append('<li style="width: ' + n + '%" class="fruit-thumbnail"><a href="javascript:void(0);"><img src="' + src + '" alt="' + alt_tag + '" /></a></li>')
            }
            $("ul li", $thumbnails).eq($current.index()).addClass("active");
            $("ul li a", $thumbnails).click(function () {
                var e = $(this).closest("li").index();
                var t = $current;
                _self.page(e);
                return false;
                $("ul li", $thumbnails).removeClass("active");
                $("ul li", $thumbnails).eq(e).addClass("active");
            })
        },
        page: function (idx) {


            if (idx >= this.slidesCount || idx < 0) {

                return false;
            }

            if (this.options.autoplay) {

                clearTimeout(this.slideshow);
                this.options.autoplay = false;
            }

            this._navigate(idx);
        },
        _loadEvents: function () {

            var _self = this;
            this.$pages.on('click.cslider', function (event) {


                _self.page($(this).index());
                return false;
            });
            this.$navNext.on('click.cslider', function (event) {

                if (_self.options.autoplay) {

                    clearTimeout(_self.slideshow);
                    _self.options.autoplay = false;
                }

                var page = (_self.current < _self.slidesCount - 1) ? page = _self.current + 1 : page = 0;
                _self._navigate(page, 'next');
                return false;
            });
            this.$navPrev.on('click.cslider', function (event) {

                if (_self.options.autoplay) {

                    clearTimeout(_self.slideshow);
                    _self.options.autoplay = false;
                }

                var page = (_self.current > 0) ? page = _self.current - 1 : page = _self.slidesCount - 1;
                _self._navigate(page, 'prev');
                return false;
            });
            if (this.cssTransitions) {

                if (!this.options.bgincrement) {

                    this.$el.on('webkitAnimationEnd.cslider animationend.cslider OAnimationEnd.cslider', function (event) {

                        if (event.originalEvent.animationName === 'toRightAnim4' || event.originalEvent.animationName === 'toLeftAnim4') {

                            _self.isAnimating = false;
                        }

                    });
                }
                else {

                    this.$el.on('webkitTransitionEnd.cslider transitionend.cslider OTransitionEnd.cslider', function (event) {

                        if (event.target.id === _self.$el.attr('id'))
                            _self.isAnimating = false;
                    });
                }

            }

        }
    };
    var logError = function (message) {
        if (this.console) {
            console.error(message);
        }
    };
    $.fn.cslider = function (options) {

        if (typeof options === 'string') {

            var args = Array.prototype.slice.call(arguments, 1);
            this.each(function () {

                var instance = $.data(this, 'cslider');
                if (!instance) {
                    logError("cannot call methods on cslider prior to initialization; " +
                            "attempted to call method '" + options + "'");
                    return;
                }

                if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {
                    logError("no such method '" + options + "' for cslider instance");
                    return;
                }

                instance[ options ].apply(instance, args);
            });
        }
        else {

            this.each(function () {

                var instance = $.data(this, 'cslider');
                if (!instance) {
                    $.data(this, 'cslider', new $.Slider(options, this));
                }
            });
        }

        return this;
    };
})(jQuery);

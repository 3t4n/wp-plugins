jQuery(document).ready(function ($) {

    "use strict";

    var scrollTopPos = $(window).scrollTop(),
        scrollBottomPos = 0,
        counterOffset = 0,
        counterOuterWidth,
        counterCount,
        countersOuter,
        counters,
        $this;

    function ms_counter_width() {

        $('.mstoic-shortcodes-counters').each(function() {

            $this = $(this);

            countersOuter = $this.find('.counter-outer');

            counters = countersOuter.find('.counter');

            counterCount = countersOuter.length;

            counterOuterWidth = $this.width();

            if (counterCount == 1) {
                return;
            }

            // Setting width if screen size is very less
            if (counterOuterWidth < 350) {
                counters.css({'width': 'auto', 'height': 'auto'});
                counterOuterWidth = $this.width();
                countersOuter.find('.counter').css({'width': (counterOuterWidth) + 'px', 'height': (counterOuterWidth) + 'px'});
            } else {
                countersOuter.find('.counter').css({'width': '300px', 'height': '300px'});
            }

            if (counterOuterWidth < 350) {
                // Outer width is very less, do nothing.
            } else if (counterOuterWidth >= 350 && counterOuterWidth < 650) {
                countersOuter.css({'width': '98%'});
            } else if (counterOuterWidth >= 650 && counterOuterWidth < 950) {
                countersOuter.css({'width': '48%'});
            } else if (counterOuterWidth >= 950 && counterOuterWidth < 1250) {
                countersOuter.css({'width': '31.33%'});
            } else if (counterOuterWidth >= 1250) {
                countersOuter.css({'width': '23%'});
            }

        });

    }

    function ms_counter() {

        $('.mstoic-shortcodes-counters .counter').not('.done').each(function () {

            //console.log('aaa');

            counterOffset = $(this).offset().top + 150;

            scrollBottomPos = scrollTopPos + $(window).height();

            //console.log(counterOffset + ',' + scrollBottomPos);

            if (counterOffset < scrollBottomPos) {
                $(this).addClass('done');
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).find('.count').text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).find('.count').text(Math.ceil(now));
                    }
                });

            }

        });

    }

    var slider,
        slides,
        temp = 0,
        firstSlide,
        secondSlide,
        lastSlide,
        seconds = 1,
        interval,
        duration,
        sliderMinWidth = 99999,
        sliderMinHeight = 99999,
        sliderItem,
        testimonialMaxHeight = 0;


    function moveSlideToFirst(slider, slides) {
        lastSlide = slides.last();
        slider.prepend(lastSlide);
    }

    function moveSlideToLast(slider, firstSlide) {
        firstSlide.removeClass('slideZTH slideHTZ slideMHTZ slideZTMH');
        slider.append(firstSlide);
    }

    function runSlider(slider) {

        slides = slider.find('.mstoic-slide');

        firstSlide = slides.eq(0);
        secondSlide = slides.eq(1);

        firstSlide.removeClass('slideZTH slideMHTZ slideHTZ').addClass('slideZTMH');
        secondSlide.removeClass('slideZTH slideMHTZ slideZTMH').addClass('slideHTZ');

        duration = slider.data('duration') + '000';

        // Append the slide to last
        setTimeout(moveSlideToLast, duration, slider, firstSlide);

    }

    function reverseSlider(slider) {

        slides = slider.find('.mstoic-slide');

        firstSlide = slides.eq(0);

        lastSlide = slides.eq(-1);

        moveSlideToFirst(slider, slides);

        firstSlide.removeClass('slideHTZ slideMHTZ slideZTMH').addClass('slideZTH')
        lastSlide.removeClass('slideZTH slideHTZ slideZTMH').addClass('slideMHTZ');

    }

    var sliderItemsContainer;

    $('.ms_slider').each(function() {

        slider = $(this);

        slider.find(' > br').remove();

        if (slider.hasClass('mstoic-slider')) {
            sliderItem = 'imageSlider';
            sliderItemsContainer = 'img';
        } else if (slider.hasClass('testimonials')) {
            sliderItem = 'testimonial';
            sliderItemsContainer = '.ms_testimonial';
            slider.find(' > p ').remove();
        }

        slider.find(sliderItemsContainer).each(function() {
            $(this).wrap('<div class="mstoic-slide">');
        });

        slides = slider.find('.mstoic-slide');

        if (sliderItem == 'imageSlider') {

            sliderMinWidth = 99999;
            sliderMinHeight = 99999;

            slider.css({'width': '9999px', 'height': '9999px'});

            //console.log('Slider Width: ' + slider.width() + ' Slider Height: ' + slider.height() );
            //console.log('Slides Width: ' + slides.width() + ' Slides Height: ' + slides.height() );
            //console.log('Image Width: ' + slides.find('img').width() + ' Image Height: ' + slides.find('img').height());

            slides.each( function() {

                //console.log('Image: ' + $(this).find('img').attr('src'));

                // Finding the minimum width
                if(sliderMinWidth >= $(this).find('img').width()) {
                    sliderMinWidth = $(this).find('img').width();
                }

                // Finding the minimum height
                if(sliderMinHeight >= $(this).find('img').height()) {
                    sliderMinHeight = $(this).find('img').height();
                }

                $(this).append('<i class="fa fa-chevron-left" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i>');

            });

            var outerWidth = slider.parent('div').width();

            // If outer width is less than the minimum image width - set height
            if (sliderMinWidth > outerWidth) {
                sliderMinHeight = sliderMinHeight * outerWidth / sliderMinWidth;
            }

            slides.css({'height': sliderMinHeight, 'max-width': '100%'});

            slider.css({'height': sliderMinHeight, 'max-width': '100%', 'display': 'block'});

        } else if (sliderItem == 'testimonial') {
            slides.each( function() {

                temp = $(this).find('.data');
                // Finding the minimum width
                if(testimonialMaxHeight <= temp.outerHeight()) {
                    testimonialMaxHeight = temp.outerHeight();
                }

                $(this).append('<i class="fa fa-chevron-left" aria-hidden="true"></i><i class="fa fa-chevron-right" aria-hidden="true"></i>');

            });

            slides.find('.data').css({'height': testimonialMaxHeight});

            slider.css({'height': slides.height(), 'display': 'block'});
        }

        var randomNumber = Math.floor(Math.random() * 999);

        $(slider).data( 'intervalName', 'myVar' + randomNumber );

        temp = 'myVar' + randomNumber;

        duration = slider.data('duration');

        $(slider).addClass(temp);

        $('head').append('<style>' +
            '.' + temp + ' .slideZTMH {' +
                '-webkit-animation: MinusHundred ' +duration+'s'+ ' forwards;' +
                'animation: MinusHundred ' +duration+'s'+ ' forwards;' +
            '}' +

            ' .' + temp + ' .slideHTZ {' +
            '-webkit-animation: zero ' +duration+'s'+ ' forwards;' +
            'animation: zero ' +duration+'s'+ ' forwards;' +
            '}' +

            ' .' + temp + ' .slideZTH {' +
            '-webkit-animation: Hundred ' +duration+'s'+ ' forwards;' +
            'animation: Hundred ' +duration+'s'+ ' forwards;' +
            '}' +

            ' .' + temp + ' .slideMHTZ {' +
            '-webkit-animation: zero ' +duration+'s'+ ' forwards;' +
            'animation: zero ' +duration+'s'+ ' forwards;' +
            '}' +

            '</style>');
        slider = $(this);

        //msIntervals = { temp: seconds+'000' };

        seconds = slider.data('interval');

        window[temp] = setInterval(runSlider, seconds+'000', slider);

    });

    $('.ms_slider .fa-chevron-right').click(function() {

        slider = $(this).closest('.ms_slider');

        interval = slider.data('intervalName');

        clearInterval(eval(interval));

        temp = 1;

        runSlider(slider);

        seconds = slider.data('interval');

        window[interval] = setInterval(runSlider, seconds+'000', slider);
    });

    $('.ms_slider .fa-chevron-left').click(function() {

        slider = $(this).closest('.ms_slider');

        interval = slider.data('intervalName');

        clearInterval(eval(interval));

        temp = 1;

        reverseSlider(slider);

        seconds = slider.data('interval');

        window[interval] = setInterval(runSlider, seconds+'000', slider);
    });

    $('.button-show-text').click(function() {
        var $this = $(this);
        var $expendableBox = $this.closest('.expendable-box');
        $this.hide();
        $expendableBox.find('.hidden-text').slideDown(200);
        $expendableBox.find('.button-hide-text').slideDown(200);

    });

    $('.button-hide-text').click(function() {
        var $this = $(this);
        var $expendableBox = $this.closest('.expendable-box');
        $this.hide();
        $expendableBox.find('.hidden-text').slideUp(200);
        $expendableBox.find('.button-show-text').slideDown(200);
    });

    var $this, // Used in all the functions
        $tooltipEle, // The tooltip element
        tooltipClasses, // All the classes of the tooltip element
        $tooltipContent, // The tooltip content element
        tooltipClass, // The directional class of the tooltip
        i, // The counter element that can be used by all the functions
        temp; // Temporary Variable to anything and everything
    function ms_tooltip_direction() {

        //console.log ('1');
        $('.mstoic-shortcodes.tooltip .tooltip-item').hover(function() {
            $this = $(this);
            $tooltipEle = $this.parent('.mstoic-shortcodes.tooltip');
            $tooltipContent = $tooltipEle.find('.tooltip-content');
            tooltipClasses = $tooltipEle.attr('class').split(' ');

            for(i=0; i<tooltipClasses.length; i++) {
                if(tooltipClasses[i] !== 'mstoic-shortcodes' && tooltipClasses[i] !== 'tooltip') {
                    tooltipClass = tooltipClasses[i];
                }
            }

            if (tooltipClass == 'right') {
                if ( ($this.offset().left + $(this).find('.tooltip-item').outerWidth() + 200) > $(window).width() ) {
                    $tooltipEle.removeClass('right').addClass('left');
                }
            } else if (tooltipClass == 'left') {
                if ( $this.offset().left < 200 ) {
                    $tooltipEle.removeClass('left').addClass('right');
                }
            } else if (tooltipClass == 'top') {
                console.log($(window).scrollTop());
                if ( ($this.offset().top - $tooltipContent.height()) < $(window).scrollTop() ) {
                    $tooltipEle.removeClass('top').addClass('bottom');
                }
            } else if (tooltipClass == 'bottom') {
                if ( ($this.offset().top + $tooltipContent.height()) > $(window).scrollTop() + $(window).height()) {
                    $tooltipEle.removeClass('bottom').addClass('top');
                }
            }

        }, function() { // On Mouse Leave
            setTimeout(removeTootipClass, 200, $tooltipEle, tooltipClass);
        });

    }

    function removeTootipClass($tooltipEle, tooltipClass) {
        $tooltipEle.removeClass('top right bottom left').addClass(tooltipClass);
    }

    $(document).ready(function() {
        ms_counter_width();
        ms_counter();
        ms_tooltip_direction();
    });

    $(document).scroll(function() {

        scrollTopPos = $(window).scrollTop();

        ms_counter();

    });

    $(window).resize(function() {
        ms_counter_width();
    });

    var clickable = [
        ['ms_related_posts_singular', 'link'],
    ],
        $outer,
        inner,
        temp;
    function makeCompleteBoxClickable() {
        $(clickable).each(function() {
            $outer = $('.' + $(this)[0]);
            inner = $(this)[1];
            $outer.each(function() {
                temp = $(this).find('.' + inner);
                $(this).wrapInner('<a class="full-box-link" href="'+temp.attr('href')+'"></a>');
            });
        });
    }
    makeCompleteBoxClickable();

    function css3CalcCheck() {
        $('body').append('<div id="css3-calc"></div>');
        if( $('#css3-calc').width() == 20) {
            // Calc is available
            if ($('.mstoic-theme').length>0) {
                $('.related-pics').css({'background-color': $('body').css('background-color')});
            }
            $('.related-pics').addClass('css-calc');
        }
        $('#css3-calc').remove(); // Remove the test element
    }
    css3CalcCheck();

    var childrenFinder = [
        ['related-pics', 'ms_related_posts_singular', 4], // Max 4
    ];
    var $parent,
        parent,
        child,
        maxCount,
        count;

    /**
     * Counts children of a parent and adds 'count-1' 'count-4' class to all the children
     */
    function countChildren() {
        $(childrenFinder).each(function() {
            $this = $(this);
            parent = $this[0];
            $parent = $('.' + parent);
            child = $this[1];
            maxCount = $this[2];

            //console.log(maxCount);

            $parent.each(function() {
                $this = $(this);
                count = $this.find('.' + child).length;
                if (count > maxCount) {
                    count = maxCount;
                }
                $this.find('.'+child).addClass('count-' + count);
            });
        });
    }
    countChildren();

    var sameHeight = [
        ['related-pics', 'ms_related_posts_singular'],           // Parent, Children
    ];
    var children,
        maxChildHeight,
        newOffset,
        newClass,
        i;
    /**
     * Makes all the children of maximum height
     */
    function sameHeightFunction() {

        newClass = 0;

        $(sameHeight).each(function() {

            parent = $(this)[0];
            $parent = $('.' + parent);
            child = $(this)[1];

            if (parent === 'related-pics') {
                relatedPostsWithPics('');
            }

            $parent.each(function() {

                $this = $(this);                    // Parent Element
                children = $this.find('.'+child);   // Child

                newOffset = 0;

                // Set to normal
                $(children).css({'height': 'auto'}).removeClass('done');

                $(children).each(function() {

                    if ($(this).offset().top == newOffset) {
                        // Do nothing. Same height element
                    } else {
                        // New Height found, update class, and update offset
                        newOffset = $(this).offset().top;
                        newClass++;
                    }
                    $(this).addClass('eqHeight' + newClass);

                });

                for (i = 1; i<=newClass; i++) {
                    maxChildHeight = 0;

                    $('.eqHeight' + i).css({'height': ''});

                    $('.eqHeight' + i).each(function() {
                        if (maxChildHeight < parseInt( $(this).css('height') ) ) {
                            maxChildHeight = parseInt( $(this).css('height') );
                        }
                    });

                    $('.eqHeight' + i).css({'height': maxChildHeight});
                    $('.eqHeight' + i).removeClass('eqHeight' + i);
                }

            });

            if (parent === 'related-pics') {
                relatedPostsWithPics('absolute');
            }

        });
    }

    function relatedPostsWithPics(temp) {
        $('.related-pics p.title').css({'position': temp});
    }

    $(document).ready(function() {
        sameHeightFunction();
    });

    $(window).resize(function() {
        sameHeightFunction();
    });

}(jQuery));
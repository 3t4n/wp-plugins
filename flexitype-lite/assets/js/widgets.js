(function ($) {
    "use strict";

    var customSearch = function ($scope, $) { 
        $(".flexitype-search-icon.open").on("click", function () {
            $(".flexitype-search-box")
                .fadeIn()
                .addClass("active");
            }
        );
        $(".flexitype-search-box-icon").on("click", function () {
            $(this).fadeIn().removeClass("active");
        });
        $(".flexitype-search-box-icon").on("click", function () {
            $(".flexitype-search-box")
                .fadeOut()
                .removeClass("active");
            }
        );
	}
    
    var videoPopup = function () {
        $(document).ready(function () {
            $(".flexitype-video-popup-icon").on("click", function (e) {
                e.preventDefault();
                $("body").css({
                    "overflow": "hidden",
                    "margin-right": "12px"
                });
                var videoUrl = $(this).attr('href').replace("watch?v=", "embed/") + "?autoplay=1";
                $(".flexitype-video-popup iframe").attr('src', videoUrl);
                $(".flexitype-video-popup, .video-overlay").addClass("active show");
            });
        
            $(".flexitype-video-popup .video_close").on("click", function () {
                $(".flexitype-video-popup, .video-overlay").removeClass("active show");
                $(".flexitype-video-popup iframe").attr('src', ''); 
                $("body").css({
                    "overflow": "",
                    "margin-right": ""
                });
            });
        });        
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/flexitype-search.default', customSearch);
        elementorFrontend.hooks.addAction('frontend/element_ready/flexitype-video.default', videoPopup);
    });


})(jQuery);
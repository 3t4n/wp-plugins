/**
 * Parallaxer for Elementor
 * Frontend JavaScript
 * 
 * @package Parallaxer
 */

(function($) {
    'use strict';

    var Parallaxer = {
        /**
         * Initialize Rellax instances
         */
        initRellax: function() {
            var elements = document.getElementsByClassName('rellax');
            if (elements.length > 0) {
                var rellax = new Rellax('.rellax');

                // Handle resize events
                window.addEventListener('resize', function() {
                    if (rellax) {
                        rellax.refresh();
                    }
                });
            }
        },

        /**
         * Initialize module
         */
        init: function() {
            // Initialize on document ready
            $(document).ready(function() {
                Parallaxer.initRellax();
            });

            // Re-initialize when Elementor frontend is initialized
            $(window).on('elementor/frontend/init', function() {
                elementorFrontend.hooks.addAction('frontend/element_ready/global', function() {
                    Parallaxer.initRellax();
                });
            });
        }
    };

    // Initialize
    Parallaxer.init();
})(jQuery);

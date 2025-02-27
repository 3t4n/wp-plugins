Object.size = function(obj) {
    var size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

(function($) {
    'use strict';
    jQuery(window).on('load', function() {
        $(document).ready(function() {
            $('.gt-expand-compress').click(function() {
                $(this).parents('.gt-content').toggleClass('gt-expand-compress-toggle');
            });
            $('.gt-tree ul').not(':has(li)').remove();
            $('.gt-style-2 .parents > li > div > .info:not(".unknown")').each(function() {
                var thisW = $(this).width();
                $(this).width(thisW.toFixed(0))
            });
            $('.gt-style-2-alt .parents > li > div > .info:not(".unknown")').each(function() {
                var thisW = $(this).width();
                $(this).width(thisW.toFixed(0))
            });
            $('.gt-content > .gt-tree').each(function() {
                var scene = this;
                if (scene) {
                    var sceneParentWidth = scene.parentNode.getBoundingClientRect().width;
                    var sceneWidth = scene.getBoundingClientRect().width;
                    var ratio = 1 / (sceneWidth / sceneParentWidth);
                    inseatePanzoom(scene, ratio, 'initial')
                }
            });
            

            

            
            function inseatePanzoom(scene, ratio, load = null) {
                panzoom(scene, {
                    beforeWheel: function(e) {
                        // Ignore zoom if shift key is not pressed or if target is an input field
                        const shouldIgnore = !e.shiftKey || isExcludedElement(e.target);
                        return shouldIgnore;
                    },
                    onTouch: function(e) {
                        
                        return;
                    },
                    maxZoom: 1,
                    minZoom: 0.1,
                    zoomSpeed: 0.1,
                })
            }

            // Helper function to check if the target is an excluded element
            function isExcludedElement(element) {
                const excludedTags = ['INPUT', 'TEXTAREA', 'SELECT', 'BUTTON'];
                return excludedTags.includes(element.tagName);
            }

        })
    });
})(jQuery);
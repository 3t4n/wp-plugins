(function($){
    $( document ).ready(function() {

        $('.fl-builder-content-editing .fl-module.fl-module-dadevarzan-scroll-add-class .dadevarzan-scroll-add-class').html('Edit Dadevarzan Scroll Add class here.')

        var wrapAddClass = $(window);
        var bodyAddClass = $('body');

        wrapAddClass.on('load scroll', function(e) {
            <?php
            if ( !empty($settings->dadevarzan_class_form_field) ) {
                foreach ( $settings->dadevarzan_class_form_field as $key => $item ) {
                    ?>

                    var selectorTop<?php echo esc_attr($key);?> = $( "<?php echo esc_attr($item->selector);?>" ).offset().top;
                    var scrollTopPos<?php echo $key;?> = wrapAddClass.scrollTop();

                    if ( scrollTopPos<?php echo esc_attr($key);?> > selectorTop<?php echo esc_attr($key);?> ) {
                        bodyAddClass.addClass("<?php echo esc_attr($item->css_class);?>");
                    } else {
                        bodyAddClass.removeClass("<?php echo esc_attr($item->css_class);?>");
                    }
                    <?php
                }
            }
            ?>
        });
    });
})(jQuery);

jQuery(document).ready(function ($) {
    $('.fl-content-carousel').bxSlider({
        pager: <?php echo ( $settings->pager ) ? $settings->pager : 'true'; ?>,
        auto: <?php echo ( $settings->auto_play ) ? $settings->auto_play : 'true'; ?>,
        autoControls: <?php echo ( $settings->auto_controls ) ? $settings->auto_controls : 'true'; ?>,
        speed: <?php echo ( $settings->speed ) ? $settings->speed : '500'; ?>,
        slideSelector: 'div.fl-carousel-item',
        minSlides: <?php echo ( $settings->min_slides ) ? $settings->min_slides : '1'; ?>,
        maxSlides: <?php echo ( $settings->max_slides ) ? $settings->max_slides : '4'; ?>,
        moveSlides: <?php echo ( $settings->move_slides ) ? $settings->move_slides : '4'; ?>,
        slideWidth: <?php echo ( $settings->slide_width ) ? $settings->slide_width : '200'; ?>,
        shrinkItems: <?php echo ( $settings->shrink_items ) ? $settings->shrink_items : 'true'; ?>,
    });
});
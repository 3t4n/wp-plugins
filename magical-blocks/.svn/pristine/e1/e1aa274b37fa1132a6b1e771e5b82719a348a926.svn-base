<?php


/**
 * 
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
use Carbon_Fields\Field\Complex_Field;

/**
 * 
 */
class mgbBlockCarousel
{

    function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'mg_carousel']);
    }


    function mg_carousel()
    {
        Block::make(__('Magical Image Carousel', 'magical-blocks'))
            ->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
            ->set_icon('format-gallery')
            ->set_keywords([__('Carousel', 'magical-blocks'), __('slider', 'magical-blocks'), __('gallery', 'magical-blocks')])
            //   ->set_preview_mode( false )
            ->set_mode('edit')


            ->add_tab(__('Add Carousel images'), array(
                Field::make('media_gallery', 'mgbc_carousel_img', __('Carouesl images'))
                    ->set_type(array('image'))
                /*Field::make( 'complex', 'mgb-Carousels', __( 'Carousel','magical-blocks' ) )
        ->setup_labels( $Carousel_labels )
        ->add_fields( array(
            Field::make( 'text', 'title', __( 'Carousel Title','magical-blocks' ) ),
            Field::make( 'textarea', 'desc', __( 'Carousel Description','magical-blocks' ) ),
        ) )*/
            ))
            ->add_tab(__('Carouesl Options'), array(
                Field::make('separator', 'mgbc_sep_options', __('Carouesl options', 'magical-blocks')),
                Field::make('checkbox', 'mgbc_autoplay', __('autoplay', 'magical-blocks'))
                    ->set_default_value('yes'),
                Field::make('text', 'mgbc_delay', __('Autoplay delay time', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(3000),
                Field::make('checkbox', 'mgbc_loop', __('Loop', 'magical-blocks'))
                    ->set_default_value('yes'),
                Field::make('checkbox', 'mgbc_autoheight', __('Auto Height', 'magical-blocks'))
                    ->set_default_value('yes'),
                Field::make('checkbox', 'mgbc_grabcursor', __('Grab Cursor', 'magical-blocks'))
                    ->set_default_value('yes'),
                Field::make('checkbox', 'mgbc_nav', __('Show Nav', 'magical-blocks')),
                Field::make('checkbox', 'mgbc_dots', __('Show Dots', 'magical-blocks'))
                    ->set_default_value('yes'),
                Field::make('text', 'mgbc_items_big', __('Item Per View For Big Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(3),
                Field::make('text', 'mgbc_space_big', __('Space Between For Big Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(10),
                Field::make('text', 'mgbc_items_medium', __('Item Per View For Medium Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(2),
                Field::make('text', 'mgbc_space_medium', __('Space Between For Medium Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(10),
                Field::make('text', 'mgbc_items_small', __('Item Per View For Small Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number')->set_default_value(1),
                Field::make('text', 'mgbc_space_small', __('Space Between For Small Screen', 'magical-blocks'))
                    ->set_attribute('type', 'number'),
                Field::make('select', 'mgbc_img_size', __('Image size', 'magical-blocks'))
                    ->set_options(array(
                        'thumbnail' => __('Thumbnail (150*150)', 'magical-blocks'),
                        'medium' => __('Medium (300*300)', 'magical-blocks'),
                        'mgb-medium' => __('Magical Medium (600*600)', 'magical-blocks'),
                        'mgb-vertical' => __('Magical vertical (600*900)', 'magical-blocks'),
                        'medium_large' => __('Medium large (768*0)', 'magical-blocks'),
                        'large' => __('Large ( 1024*1024)', 'magical-blocks'),
                        'full' => __('Orginal size', 'magical-blocks'),
                    ))
                    ->set_default_value('mgb-medium'),
                Field::make('text', 'mgbc_img_height', __('Imaeg height', 'magical-blocks'))->set_help_text(__('Set image height. Leave empty for auto height.'))->set_attribute('type', 'number'),

            ))


            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                $rand_num = wp_rand(23548, 5894);
                $mgbc_carousel_img = isset($fields['mgbc_carousel_img']) ? $fields['mgbc_carousel_img'] : '';
                $mgbc_autoplay = isset($fields['mgbc_autoplay']) ? $fields['mgbc_autoplay'] : 'yes';
                $mgbc_delay = isset($fields['mgbc_delay']) ? $fields['mgbc_delay'] : '3000';
                $mgbc_loop = isset($fields['mgbc_loop']) ? $fields['mgbc_loop'] : 'yes';
                $mgbc_autoheight = isset($fields['mgbc_autoheight']) ? $fields['mgbc_autoheight'] : 'yes';
                $mgbc_grabcursor = isset($fields['mgbc_grabcursor']) ? $fields['mgbc_grabcursor'] : 'yes';
                $mgbc_nav = isset($fields['mgbc_nav']) ? $fields['mgbc_nav'] : '';
                $mgbc_dots = isset($fields['mgbc_dots']) ? $fields['mgbc_dots'] : 'yes';
                $mgbc_items_big = isset($fields['mgbc_items_big']) ? $fields['mgbc_items_big'] : '3';
                $mgbc_space_big = isset($fields['mgbc_space_big']) ? $fields['mgbc_space_big'] : '10';
                $mgbc_items_medium = isset($fields['mgbc_items_medium']) ? $fields['mgbc_items_medium'] : '2';
                $mgbc_space_medium = isset($fields['mgbc_space_medium']) ? $fields['mgbc_space_medium'] : '10';
                $mgbc_items_small = isset($fields['mgbc_items_small']) ? $fields['mgbc_items_small'] : '1';
                $mgbc_space_small = isset($fields['mgbc_space_small']) ? $fields['mgbc_space_small'] : '';
                $mgbc_img_size = isset($fields['mgbc_img_size']) ? $fields['mgbc_img_size'] : 'mgb-medium';
                $mgbc_img_height = isset($fields['mgbc_img_height']) ? $fields['mgbc_img_height'] : '';


?>
            <div class="mgbc mgb-carousel mgbc<?php echo esc_attr($rand_num); ?>">
                <style type="text/css">
                    <?php if ($mgbc_img_height) : ?>.mgb-carousel<?php echo esc_attr($rand_num); ?>img {
                        height: <?php echo esc_attr($mgbc_img_height); ?>px;
                    }

                    <?php endif; ?>
                </style>




                <div class="swiper-container mgc<?php echo esc_attr($rand_num); ?>">
                    <div class="mgb-carousel<?php echo esc_attr($rand_num); ?>">
                        <div class="swiper-wrapper">
                            <?php

                            if ($mgbc_carousel_img) :
                                foreach ($mgbc_carousel_img as $mgbcarousel) :

                            ?>
                                    <div class="swiper-slide">
                                        <div class="mgbc-img">
                                            <?php echo wp_get_attachment_image($mgbcarousel, $mgbc_img_size);  ?>
                                        </div>
                                    </div>

                                <?php
                                endforeach;

                            else :
                                ?>
                                <div class="mp-error text-center pb-5 pt-5">
                                    <?php esc_html_e('No post found!', 'magical-posts-display'); ?>
                                </div>
                            <?php

                            endif; ?>
                        </div>

                        <?php if ($mgbc_nav) : ?>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev sbp<?php echo esc_attr($rand_num); ?>"></div>
                            <div class="swiper-button-next sbn<?php echo esc_attr($rand_num); ?>"></div>
                        <?php endif; ?>
                    </div>
                    <?php if ($mgbc_dots) : ?>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination mgbc-dots pagination-mgpc<?php echo esc_attr($rand_num); ?>"></div>
                    <?php endif; ?>
                </div>

            </div>

            <script>
                var swiper = new Swiper('.mgb-carousel<?php echo esc_attr($rand_num); ?>', {
                    <?php if ($mgbc_autoheight) : ?>
                        autoHeight: true,
                    <?php endif; ?>
                    effect: 'slide',
                    grabCursor: <?php if ($mgbc_grabcursor) : ?>true<?php else : ?>false<?php endif; ?>,
                    <?php if ($mgbc_autoplay) : ?>
                        autoplay: {
                            delay: <?php echo esc_attr($mgbc_delay); ?>,
                        },
                    <?php endif; ?>
                    slidesPerView: <?php echo esc_attr($mgbc_items_big); ?>,
                    <?php if ($mgbc_space_big) : ?>
                        spaceBetween: <?php echo esc_attr($mgbc_space_big); ?>,
                    <?php endif; ?>
                    <?php if ($mgbc_loop) : ?>
                        loop: true,
                    <?php endif; ?>
                    breakpoints: {
                        0: {
                            slidesPerView: <?php echo esc_attr($mgbc_items_small); ?>,
                            <?php if ($mgbc_space_small) : ?>
                                spaceBetween: <?php echo esc_attr($mgbc_space_small); ?>
                            <?php endif; ?>
                        },
                        768: {
                            slidesPerView: <?php echo esc_attr($mgbc_items_medium); ?>,
                            <?php if ($mgbc_space_medium) : ?>
                                spaceBetween: <?php echo esc_attr($mgbc_space_medium); ?>
                            <?php endif; ?>
                        },
                        992: {
                            slidesPerView: <?php echo esc_attr($mgbc_items_big); ?>,
                            <?php if ($mgbc_space_big) : ?>
                                spaceBetween: <?php echo esc_attr($mgbc_space_big); ?>
                            <?php endif; ?>
                        }
                    },
                    <?php if ($mgbc_dots) : ?>
                        pagination: {
                            el: '.pagination-mgpc<?php echo esc_attr($rand_num); ?>',
                            clickable: true,
                            // type: 'progressbar',
                        },
                    <?php endif; ?>
                    <?php if ($mgbc_nav) : ?>
                        navigation: {
                            nextEl: '.sbn<?php echo esc_attr($rand_num); ?>',
                            prevEl: '.sbp<?php echo esc_attr($rand_num); ?>',
                        },
                    <?php endif; ?>
                });
            </script>

<?php
            });
    }
}

new mgbBlockCarousel();

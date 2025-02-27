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
class mgbHoverCard
{

    function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'mghc_hvrcard']);
    }


    function mghc_hvrcard()
    {

        Block::make(__('Image Hover card', 'magical-blocks'))
            ->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
            ->set_icon('format-image')
            ->set_keywords([__('card', 'magical-blocks'), __('hover', 'magical-blocks'), __('image', 'magical-blocks')])
            //   ->set_preview_mode( true )
            ->set_mode('both')


            ->add_tab(__('Image & Text'), array(
                Field::make('image', 'mghc_image', __('Image', 'magical-blocks')),
                Field::make('text', 'mghc_title', __('Title', 'magical-blocks')),
                Field::make('textarea', 'mghc_desc', __('Description', 'magical-blocks')),
                Field::make('checkbox', 'mghc_showbtn', __('Show Button'))
                    ->set_option_value('yes'),
                Field::make('text', 'mghc_btn_text', __('Button text', 'magical-blocks'))->set_default_value(__('Read More', 'magical-blocks')),
                Field::make('text', 'mghc_btn_url', __('Button url', 'magical-blocks'))->set_default_value('#'),


            ))
            ->add_tab(__('Style'), array(
                Field::make('separator', 'mghc_sep_title', __('Content Style', 'magical-blocks')),

                Field::make('select', 'mghc_hvr_style', __('Select Hover Style', 'magical-blocks'))
                    ->set_options(array(
                        'imghvr-fade' => __('Fade', 'magical-blocks'),
                        'imghvr-push-up' => __('Push Up', 'magical-blocks'),
                        'imghvr-push-down' => __('Push Down', 'magical-blocks'),
                        'imghvr-push-left' => __('Push Left', 'magical-blocks'),
                        'imghvr-push-right' => __('Push Right', 'magical-blocks'),
                        'imghvr-slide-up' => __('Slide Up', 'magical-blocks'),
                        'imghvr-slide-down' => __('Slide Down', 'magical-blocks'),
                        'imghvr-slide-left' => __('Slide Left', 'magical-blocks'),
                        'imghvr-slide-right' => __('Slide Right', 'magical-blocks'),
                        'imghvr-reveal-down' => __('Reveal Down', 'magical-blocks'),
                        'imghvr-reveal-left' => __('Reveal Left', 'magical-blocks'),
                        'imghvr-reveal-right' => __('Reveal Right', 'magical-blocks'),
                        'imghvr-reveal-up' => __('Reveal Up', 'magical-blocks'),
                        'imghvr-hinge-down' => __('Hinge Down', 'magical-blocks'),
                        'imghvr-hinge-left' => __('Hinge Left', 'magical-blocks'),
                        'imghvr-hinge-right' => __('Hinge Right', 'magical-blocks'),
                        'imghvr-hinge-up' => __('Hinge Up', 'magical-blocks'),
                    ))
                    ->set_default_value('imghvr-hinge-down'),

                Field::make('select', 'mghc_img_size', __('Image size', 'magical-blocks'))
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

                Field::make('text', 'mghc_img_height', __('Image height', 'magical-blocks'))->set_help_text(__('Tyepe number for height.Leave empty for auto height'))
                    ->set_attribute('type', 'number'),

                Field::make('select', 'mghc_align', __('Content Align', 'magical-blocks'))
                    ->set_options(array(
                        'left' => __('Left', 'magical-blocks'),
                        'center' => __('Center', 'magical-blocks'),
                        'right' => __('Right', 'magical-blocks'),
                    ))
                    ->set_default_value('center'),

                Field::make('color', 'mghc_color', __('Content color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),

                Field::make('color', 'mghc_bg_color', __('Card background color', 'magical-blocks')),

                Field::make('text', 'mghc_cont_space', __('Content top space', 'magical-blocks'))->set_help_text(__('Content top space set by px'))
                    ->set_attribute('type', 'number')
                    ->set_default_value('30'),

                Field::make('select', 'mghc_title_tag', __('Select title tag', 'magical-blocks'))
                    ->set_options(array(
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                        'p' => 'p',
                    ))
                    ->set_default_value('h5'),

                Field::make('separator', 'mghc_sep_content', __('Button style', 'magical-blocks')),
                Field::make('select', 'mghc_btn', __('Select button', 'magical-blocks'))
                    ->set_options(array(
                        'primary' => __('Primary', 'magical-blocks'),
                        'secondary' => __('Secondary', 'magical-blocks'),
                        'success' => __('Success', 'magical-blocks'),
                        'info' => __('Info', 'magical-blocks'),
                        'light' => __('Light', 'magical-blocks'),
                        'dark' => __('Dark', 'magical-blocks'),
                        'warning' => __('Warning', 'magical-blocks'),
                        'danger' => __('Danger', 'magical-blocks'),
                        'link' => __('Link', 'magical-blocks'),
                    ))
                    ->set_default_value('info'),

            ))



            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                wp_enqueue_style('mgb-hover-img');
                $rand_num = wp_rand(23548, 5894);
                $mghc_image = isset($fields['mghc_image']) ? $fields['mghc_image'] : '';


?>
            <style type="text/css">
                <?php if (!empty($fields['mghc_color'])) : ?>.mgb-hvrcard<?php echo esc_attr($rand_num); ?>,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>p,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>.mghc-title {
                    color: <?php echo esc_attr($fields['mghc_color']); ?>;
                }

                <?php endif; ?><?php if ($fields['mghc_bg_color']) : ?>.mgb-hvrcard<?php echo esc_attr($rand_num); ?>[class*=" imghvr-"] figcaption,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>[class^=imghvr-] figcaption,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>figure.mghc-hover:before,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>[class*=" imghvr-"],
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>[class^=imghvr-] {
                    background-color: <?php echo esc_attr($fields['mghc_bg_color']); ?> !important;
                }

                <?php endif; ?><?php if ($fields['mghc_cont_space'] != '30') : ?>.mgb-hvrcard<?php echo esc_attr($rand_num); ?>figcaption.mghc-content {
                    top: <?php echo esc_attr($fields['mghc_cont_space']); ?>px;
                }

                <?php endif; ?><?php if ($fields['mghc_img_height']) : ?>.mgb-hvrcard<?php echo esc_attr($rand_num); ?>,
                .mgb-hvrcard<?php echo esc_attr($rand_num); ?>img {
                    height: <?php echo esc_attr($fields['mghc_img_height']); ?>px;
                }

                <?php endif; ?>
            </style>

            <div class="mg-shadow mgb-hvrcard mgb-hvrcard<?php echo esc_attr($rand_num); ?> ">
                <figure class="mghc-hover <?php echo esc_attr($fields['mghc_hvr_style']); ?>">
                    <?php
                    if ($mghc_image) {
                        echo wp_get_attachment_image($mghc_image, $fields['mghc_img_size']);
                    } else {
                    ?>
                        <img src="<?php echo esc_url(MGBLOCKS_ASSETS . 'img/hvr-default.jpg'); ?>" alt="<?php esc_attr_e('Hover default image', 'magical-blocks'); ?>">
                    <?php
                    }

                    ?>
                    <figcaption class="mghc-content text-<?php echo esc_attr($fields['mghc_align']); ?>">
                        <<?php echo esc_attr($fields['mghc_title_tag']); ?> class="mghc-title"><?php echo esc_html($fields['mghc_title']); ?></<?php echo esc_attr($fields['mghc_title_tag']); ?>>
                        <?php echo wp_kses_post(apply_filters('the_content', $fields['mghc_desc'])); ?>
                        <?php if ($fields['mghc_showbtn']) : ?>
                            <a class="btn btn-<?php echo esc_attr($fields['mghc_btn']); ?>" href="<?php echo esc_url($fields['mghc_btn_url']); ?>"><?php echo esc_html($fields['mghc_btn_text']); ?></a>
                        <?php endif; ?>
                    </figcaption>
                </figure>
            </div>

<?php
            });
    }
}

new mgbHoverCard();

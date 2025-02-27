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
class blockAccordion
{

    function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'mg_accordion']);
    }


    function mg_accordion()
    {
        $accordion_labels = array(
            'plural_name' => __('Accordion Items', 'magical-blocks'),
            'singular_name' => __('Accordion Item', 'magical-blocks'),
        );
        Block::make(__('Magical Accordion', 'magical-blocks'))
            ->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
            ->set_icon('heart')
            ->set_keywords([__('accordion', 'magical-blocks'), __('tab', 'magical-blocks'), __('content', 'magical-blocks')])
            ->set_mode('both')
            ->add_tab(__('Add Accordion'), array(
                Field::make('complex', 'mgb-accordions', __('Accordion', 'magical-blocks'))
                    ->setup_labels($accordion_labels)
                    ->add_fields(array(
                        Field::make('text', 'title', __('Accordion Title', 'magical-blocks')),
                        Field::make('textarea', 'desc', __('Accordion Description', 'magical-blocks')),
                    ))
            ))
            ->add_tab(__('Accordion Settings'), array(
                Field::make('separator', 'mgba_sep_title', __('Title settings', 'magical-blocks')),
                Field::make('color', 'mgba_title_color', __('Title color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),
                Field::make('color', 'mgba_title_bgcolor', __('Title background color', 'magical-blocks')),
                Field::make('select', 'mgba_title_tag', __('Select title tag', 'magical-blocks'))
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
                Field::make('select', 'mgba_title_align', __('Title Position'))
                    ->set_options(array(
                        'left' => __('Left', 'magical-blocks'),
                        'center' => __('Center', 'magical-blocks'),
                        'right' => __('Right', 'magical-blocks'),

                    ))
                    ->set_default_value('left'),
                Field::make('separator', 'mgba_sep_content', __('Content settings', 'magical-blocks')),
                Field::make('color', 'mgba_content_color', __('Content color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),
                Field::make('color', 'mgba_content_bgcolor', __('Content background color', 'magical-blocks'))

            ))



            ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
                $rand_num = wp_rand(23548, 5894);

?>


            <div class="accordion mgba-accordion mgacm<?php echo esc_attr($rand_num); ?> mgba-style1 mb-4 mt-4" id="mgacm<?php echo esc_attr($rand_num); ?>" role="tablist" aria-multiselectable="true">
                <style type="text/css">
                    <?php if ($fields['mgba_title_color']) : ?>.mgacm<?php echo esc_attr($rand_num); ?>.mgbaccordion-head {
                        background: <?php echo esc_html($fields['mgba_title_color']); ?>
                    }

                    <?php endif; ?><?php if ($fields['mgba_content_color']) : ?>.mgacm<?php echo esc_attr($rand_num); ?>.mgbaccordion-title,
                    .mgacm<?php echo esc_attr($rand_num); ?>.mgbaccordion-icon {
                        color: <?php echo esc_html($fields['mgba_content_color']); ?>;
                    }

                    <?php endif; ?><?php if ($fields['mgba_title_bgcolor']) : ?>.mgacm<?php echo esc_attr($rand_num); ?>.mgba-content {
                        background: <?php echo esc_html($fields['mgba_title_bgcolor']); ?>
                    }

                    <?php endif; ?><?php if ($fields['mgba_content_bgcolor']) : ?>.mgacm<?php echo esc_attr($rand_num); ?>.mgba-content p,
                    .mgacm<?php echo esc_attr($rand_num); ?>.mgba-content {
                        color: <?php echo esc_html($fields['mgba_content_bgcolor']); ?>;
                    }

                    <?php endif; ?>
                </style>

                <!-- Accordion card -->
                <?php
                $count = 0;
                if ($fields['mgb-accordions']) :
                    foreach ($fields['mgb-accordions'] as $mgbaccordion) :
                        $count++;
                        if ($count == 1) {
                            $aria_ex = 'true';
                            $aria_show = 'show';
                        } else {
                            $aria_ex = 'false';
                            $aria_show = '';
                        }
                ?>

                        <div class="card">
                            <!-- Card header -->
                            <div class="mgbaccordion-head z-depth-1 mb-1" role="tab" id="heading<?php echo esc_attr($rand_num . $count); ?>">
                                <a class="mgbaccordion-title-link" data-toggle="collapse" data-parent="#mgacm<?php echo esc_attr($rand_num); ?>" href="#collapse<?php echo esc_attr($rand_num . $count); ?>" aria-expanded="<?php echo esc_attr($aria_ex); ?>" aria-controls="collapse<?php echo esc_attr($rand_num . $count); ?>">
                                    <div class="row">
                                        <div class="col-md-11 col-sm-10">
                                            <<?php echo esc_attr($fields['mgba_title_tag']); ?> class="mb-0 white-text text-uppercase mgbaccordion-title text-<?php echo esc_attr($fields['mgba_title_align']); ?>">
                                                <?php echo esc_html($mgbaccordion['title']); ?>
                                            </<?php echo esc_attr($fields['mgba_title_tag']); ?>>
                                        </div>
                                        <div class="col-md-1 col-sm-2 text-right mgbaccordion-icon">
                                            <i class="mba-up fas fa-chevron-up"></i>
                                            <i class="mba-down fas fa-chevron-down"></i>
                                        </div>
                                    </div>


                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse<?php echo esc_attr($rand_num . $count); ?>" class="collapse <?php echo esc_attr($aria_show); ?>" role="tabpanel" aria-labelledby="heading<?php echo esc_attr($rand_num . $count); ?>" data-parent="#mgacm<?php echo esc_attr($rand_num); ?>" style="">
                                <div class="card-body mb-1 rgba-grey-light white-text mgba-content">
                                    <?php echo wp_kses_post(apply_filters('the_content', $mgbaccordion['desc'])); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- Accordion card -->

            </div>

<?php
            });
    }
}

new blockAccordion();

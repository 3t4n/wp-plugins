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
class mgbInfoBox
{

    function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'mgbi_infobox']);
    }


    function mgbi_infobox()
    {

        Block::make(__('Info Box', 'magical-blocks'))
            ->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
            ->set_icon('welcome-write-blog')
            ->set_keywords([__('card', 'magical-blocks'), __('info', 'magical-blocks'), __('icon', 'magical-blocks')])
            //   ->set_preview_mode( true )
            ->set_mode('both')


            ->add_tab(__('Icon & Text'), array(
                Field::make('icon', 'mgbi_icon', __('Icon', 'crb'))
                    ->set_default_value('fas fa-info-circle')
                    ->add_fontawesome_options(),
                Field::make('text', 'mgbi_title', __('Title', 'magical-blocks'))->set_default_value(__('Info Box Title', 'magical-blocks')),
                Field::make('textarea', 'mgbi_desc', __('Description', 'magical-blocks'))->set_default_value(__('Info Box description goes here.', 'magical-blocks')),
                Field::make('checkbox', 'mgbi_showbtn', __('Show Button'))
                    ->set_option_value('yes'),
                Field::make('text', 'mgbi_btn_text', __('Button text', 'magical-blocks'))->set_default_value(__('Read More', 'magical-blocks')),
                Field::make('text', 'mgbi_btn_url', __('Button url', 'magical-blocks'))->set_default_value('#'),
                Field::make('select', 'mgbi_content_position', __('Content Position', 'magical-blocks'))
                    ->set_options(array(
                        'left' => __('Left', 'magical-blocks'),
                        'center' => __('Center', 'magical-blocks'),
                        'right' => __('Right', 'magical-blocks'),
                    ))
                    ->set_default_value('center'),


            ))
            ->add_tab(__('Style'), array(
                Field::make('separator', 'mgbi_sep_content', __('Content Style', 'magical-blocks')),

                Field::make('text', 'mgbi_cont_height', __('Set fixed height', 'magical-blocks'))->set_help_text(__('You can set info box fixed height by this option. Height set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbi_cont_padding', __('Content Padding', 'magical-blocks'))->set_help_text(__('Enter content padding. padding set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbi_cont_bgcolor', __('Content background color', 'magical-blocks')),

                Field::make('separator', 'mgbi_sep_icon', __('Icon Style', 'magical-blocks')),
                Field::make('text', 'mgbi_icon_size', __('Icon size', 'magical-blocks'))->set_help_text(__('Tyepe number for icon size. Icon size set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbi_icon_margin', __('Icon bottom space', 'magical-blocks'))->set_help_text(__('Tyepe number icon margin. Icon margin set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbi_icon_color', __('Icon color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),

                Field::make('separator', 'mgbi_sep_title', __('Title Style', 'magical-blocks')),
                Field::make('select', 'mgbi_title_tag', __('Select title tag', 'magical-blocks'))
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
                Field::make('text', 'mgbi_title_size', __('Title size', 'magical-blocks'))->set_help_text(__('Tyepe number for icon size. Icon size set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbi_title_margin', __('Title bottom space', 'magical-blocks'))->set_help_text(__('Tyepe number icon margin. Icon margin set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbi_title_color', __('Title color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),

                Field::make('separator', 'mgbi_sep_desc', __('Description Style', 'magical-blocks')),

                Field::make('text', 'mgbi_desc_size', __('Description size', 'magical-blocks'))->set_help_text(__('Tyepe number for icon size. Icon size set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbi_desc_margin', __('Description bottom space', 'magical-blocks'))->set_help_text(__('Tyepe number icon margin. Icon margin set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbi_desc_color', __('Description color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),


                Field::make('separator', 'mgbi_sep_btn', __('Button style', 'magical-blocks')),
                Field::make('select', 'mgbi_btn', __('Select button', 'magical-blocks'))
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
                $rand_num = wp_rand(94358, 98524);
                $mgbiitag = esc_attr($fields['mgbi_title_tag']);
                $mgbiitag = $mgbiitag ? $mgbiitag : 'h5';
                $mgbi_icon = isset($fields['mgbi_icon']) ? $fields['mgbi_icon'] : '';
                $mgbi_title = isset($fields['mgbi_title']) ? $fields['mgbi_title'] : __('Info Box Title', 'magical-blocks');
                $mgbi_desc = isset($fields['mgbi_desc']) ? $fields['mgbi_desc'] : __('Info Box description goes here.', 'magical-blocks');
                $mgbi_showbtn = isset($fields['mgbi_showbtn']) ? $fields['mgbi_showbtn'] : '';
                $mgbi_btn_text = isset($fields['mgbi_btn_text']) ? $fields['mgbi_btn_text'] : __('Read More', 'magical-blocks');
                $mgbi_btn_url = isset($fields['mgbi_btn_url']) ? $fields['mgbi_btn_url'] : '#';
                $mgbi_content_position = isset($fields['mgbi_content_position']) ? $fields['mgbi_content_position'] : '#';
                $mgbi_cont_height = isset($fields['mgbi_cont_height']) ? $fields['mgbi_cont_height'] : '';
                $mgbi_cont_padding = isset($fields['mgbi_cont_padding']) ? $fields['mgbi_cont_padding'] : '';
                $mgbi_cont_bgcolor = isset($fields['mgbi_cont_bgcolor']) ? $fields['mgbi_cont_bgcolor'] : '';
                $mgbi_icon_size = isset($fields['mgbi_icon_size']) ? $fields['mgbi_icon_size'] : '';
                $mgbi_icon_margin = isset($fields['mgbi_icon_margin']) ? $fields['mgbi_icon_margin'] : '';
                $mgbi_icon_color = isset($fields['mgbi_icon_color']) ? $fields['mgbi_icon_color'] : '';
                $mgbi_title_size = isset($fields['mgbi_title_size']) ? $fields['mgbi_title_size'] : '';
                $mgbi_title_margin = isset($fields['mgbi_title_margin']) ? $fields['mgbi_title_margin'] : '';
                $mgbi_title_color = isset($fields['mgbi_title_color']) ? $fields['mgbi_title_color'] : '';
                $mgbi_desc_size = isset($fields['mgbi_desc_size']) ? $fields['mgbi_desc_size'] : '';
                $mgbi_desc_margin = isset($fields['mgbi_desc_margin']) ? $fields['mgbi_desc_margin'] : '';
                $mgbi_desc_color = isset($fields['mgbi_desc_color']) ? $fields['mgbi_desc_color'] : '';
                $mgbi_btn = isset($fields['mgbi_btn']) ? $fields['mgbi_btn'] : 'info';


?>
            <style type="text/css">
                <?php if ($mgbi_cont_padding || $mgbi_cont_bgcolor || $$mgbi_cont_height) : ?>.mgbinfo<?php echo esc_attr($rand_num); ?> {
                    <?php if ($mgbi_cont_padding) : ?>padding: <?php echo esc_attr($mgbi_cont_padding); ?>px;
                    <?php endif; ?><?php if ($mgbi_cont_bgcolor) : ?>background-color: <?php echo esc_attr($mgbi_cont_bgcolor); ?>;
                    <?php endif; ?><?php if ($mgbi_cont_height) : ?>height: <?php echo esc_attr($mgbi_cont_height); ?>px <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbi_icon_size || $mgbi_icon_margin || $mgbi_icon_color) : ?>.mgbinfo<?php echo esc_attr($rand_num); ?>i {
                    <?php if ($mgbi_icon_size) : ?>font-size: <?php echo esc_attr($mgbi_icon_size); ?>px;
                    <?php endif; ?><?php if ($mgbi_icon_margin) : ?>margin-bottom: <?php echo esc_attr($mgbi_icon_margin); ?>px;
                    <?php endif; ?><?php if ($mgbi_icon_color) : ?>color: <?php echo esc_attr($mgbi_icon_color); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbi_title_size || $mgbi_title_margin || $mgbi_title_color) : ?>.mgbinfo<?php echo esc_attr($rand_num); ?>.mgb-infobox-title {
                    <?php if ($mgbi_title_size) : ?>font-size: <?php echo esc_attr($mgbi_title_size); ?>px;
                    <?php endif; ?><?php if ($mgbi_title_margin) : ?>margin-bottom: <?php echo esc_attr($mgbi_title_margin); ?>px;
                    <?php endif; ?><?php if ($mgbi_title_color) : ?>color: <?php echo esc_attr($mgbi_title_color); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbi_desc_size || $mgbi_desc_margin || $mgbi_desc_color) : ?>.mgbinfo<?php echo esc_attr($rand_num); ?>.mgb-infobox-desc {
                    <?php if ($mgbi_desc_size) : ?>font-size: <?php echo esc_attr($mgbi_desc_size); ?>px;
                    <?php endif; ?><?php if ($mgbi_desc_margin) : ?>margin-bottom: <?php echo esc_attr($mgbi_desc_margin); ?>px;
                    <?php endif; ?><?php if ($mgbi_desc_color) : ?>color: <?php echo esc_attr($mgbi_desc_color); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?>
            </style>

            <div class="mg-shadow mb-3 mgbinfo-box mgbinfo<?php echo esc_attr($rand_num); ?> text-<?php echo esc_attr($mgbi_content_position); ?>">
                <?php if ($mgbi_icon) : ?>
                    <div class="mgb-infobox-icon">
                        <i class="fas fa-<?php echo esc_attr($mgbi_icon['icon']); ?>"></i>
                    </div>
                <?php endif; ?>
                <div class="mgb-infobox-text">
                    <?php if ($mgbi_title) : ?>
                        <<?php echo esc_attr($mgbiitag); ?> class="mgb-infobox-title"><?php echo esc_html($mgbi_title); ?></<?php echo esc_attr($mgbiitag); ?>>
                    <?php endif; ?>
                    <?php if ($mgbi_desc) : ?>
                        <p class="mgb-infobox-desc"><?php echo esc_html($mgbi_desc); ?></p>
                    <?php endif; ?>
                    <?php if ($mgbi_showbtn) : ?>
                        <a class="btn btn-<?php echo esc_attr($mgbi_btn); ?>" href="<?php echo esc_url($mgbi_btn_url); ?>"><?php echo esc_html($mgbi_btn_text); ?></a>
                    <?php endif; ?>
                </div>

            </div>

<?php
            });
    }
}

new mgbInfoBox();

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
class mgbCard
{

    function __construct()
    {
        add_action('carbon_fields_register_fields', [$this, 'mgb_card']);
    }


    function mgb_card()
    {

        Block::make(__('Magical Card', 'magical-blocks'))
            ->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
            ->set_icon('media-default')
            ->set_keywords([__('card', 'magical-blocks'), __('grid', 'magical-blocks'), __('image', 'magical-blocks')])
            //   ->set_preview_mode( true )
            ->set_mode('both')


            ->add_tab(__('Image & Text'), array(
                Field::make('separator', 'mgbc_img', __('Card Image', 'magical-blocks')),
                Field::make('image', 'mgbc_image', __('Image', 'magical-blocks')),
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
                Field::make('separator', 'mgbc_content', __('Card Content', 'magical-blocks')),
                Field::make('text', 'mgbc_title', __('Title', 'magical-blocks'))->set_default_value(__('Card Title', 'magical-blocks')),
                Field::make('textarea', 'mgbc_desc', __('Description', 'magical-blocks'))->set_default_value(__('Card description goes here.', 'magical-blocks')),
                Field::make('checkbox', 'mgbc_showbtn', __('Show Button'))
                    ->set_option_value('yes')->set_default_value('yes'),
                Field::make('text', 'mgbc_btn_text', __('Button text', 'magical-blocks'))->set_default_value(__('Read More', 'magical-blocks')),
                Field::make('text', 'mgbc_btn_url', __('Button url', 'magical-blocks'))->set_default_value('#'),
                Field::make('select', 'mgbc_align', __('Content Position', 'magical-blocks'))
                    ->set_options(array(
                        'left' => __('Left', 'magical-blocks'),
                        'center' => __('Center', 'magical-blocks'),
                        'right' => __('Right', 'magical-blocks'),
                    ))
                    ->set_default_value('center'),


            ))
            ->add_tab(__('Card Style'), array(
                Field::make('separator', 'mgbc_sep_content', __('Content Style', 'magical-blocks')),

                Field::make('text', 'mgbc_cont_padding', __('Content Padding', 'magical-blocks'))->set_help_text(__('Enter content padding. padding set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbc_cont_bgcolor', __('Content background color', 'magical-blocks')),

                Field::make('separator', 'mgbc_sep_img', __('Image Style', 'magical-blocks')),
                Field::make('checkbox', 'mgbc_img_width', __('Set 100% image width', 'magical-blocks'))
                    ->set_option_value('yes'),
                Field::make('text', 'mgbc_img_height', __('Image height', 'magical-blocks'))->set_help_text(__('Set image height. Leave empty for auto height.'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbc_img_margin', __('Image bottom space', 'magical-blocks'))->set_help_text(__('Tyepe image bottom margin. Icon margin set by px'))
                    ->set_attribute('type', 'number'),

                Field::make('separator', 'mgbc_sep_title', __('Title Style', 'magical-blocks')),
                Field::make('select', 'mgbc_title_tag', __('Select title tag', 'magical-blocks'))
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
                Field::make('text', 'mgbc_title_size', __('Title font size', 'magical-blocks'))->set_help_text(__('Tyepe number for icon size. Icon size set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbc_title_margin', __('Title bottom space', 'magical-blocks'))->set_help_text(__('Tyepe number icon margin. Icon margin set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbc_title_color', __('Title color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),

                Field::make('separator', 'mgbc_sep_desc', __('Description Style', 'magical-blocks')),

                Field::make('text', 'mgbc_desc_size', __('Description size', 'magical-blocks'))->set_help_text(__('Tyepe number for icon size. Icon size set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('text', 'mgbc_desc_margin', __('Description bottom space', 'magical-blocks'))->set_help_text(__('Description bottom margin. Margin set by px'))
                    ->set_attribute('type', 'number'),
                Field::make('color', 'mgbc_desc_color', __('Description color', 'magical-blocks'))
                    ->set_palette(array('#FF0000', '#00FF00', '#0000FF')),


                Field::make('separator', 'mgbc_sep_btn', __('Button style', 'magical-blocks')),
                Field::make('select', 'mgbc_btn', __('Select button', 'magical-blocks'))
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
                $rand_num = wp_rand(9588, 38424);
                $mgbiitag = esc_attr($fields['mgbc_title_tag']);
                $mgbiitag = $mgbiitag ? $mgbiitag : 'h5';
                $mgbc_image = isset($fields['mgbc_image']) ? $fields['mgbc_image'] : '';
                $mgbc_img_size = isset($fields['mgbc_img_size']) ? $fields['mgbc_img_size'] : 'mgb-medium';
                $mgbc_title = isset($fields['mgbc_title']) ? $fields['mgbc_title'] : _('Card Title', 'magical-blocks');
                $mgbc_desc = isset($fields['mgbc_desc']) ? $fields['mgbc_desc'] : __('Card description goes here.', 'magical-blocks');
                $mgbc_showbtn = isset($fields['mgbc_showbtn']) ? $fields['mgbc_showbtn'] : 'yes';
                $mgbc_btn_text = isset($fields['mgbc_btn_text']) ? $fields['mgbc_btn_text'] : __('Read More', 'magical-blocks');
                $mgbc_btn_url = isset($fields['mgbc_btn_url']) ? $fields['mgbc_btn_url'] : '#';
                $mgbc_align = isset($fields['mgbc_align']) ? $fields['mgbc_align'] : 'center';
                $mgbc_cont_padding = isset($fields['mgbc_cont_padding']) ? $fields['mgbc_cont_padding'] : '';
                $mgbc_cont_bgcolor = isset($fields['mgbc_cont_bgcolor']) ? $fields['mgbc_cont_bgcolor'] : '';
                $mgbc_img_width = isset($fields['mgbc_img_width']) ? $fields['mgbc_img_width'] : '';
                $mgbc_img_height = isset($fields['mgbc_img_height']) ? $fields['mgbc_img_height'] : '';
                $mgbc_img_margin = isset($fields['mgbc_img_margin']) ? $fields['mgbc_img_margin'] : '';
                $mgbc_title_size = isset($fields['mgbc_title_size']) ? $fields['mgbc_title_size'] : '';
                $mgbc_title_margin = isset($fields['mgbc_title_margin']) ? $fields['mgbc_title_margin'] : '';
                $mgbc_title_color = isset($fields['mgbc_title_color']) ? $fields['mgbc_title_color'] : '';
                $mgbc_desc_size = isset($fields['mgbc_desc_size']) ? $fields['mgbc_desc_size'] : '';
                $mgbc_desc_margin = isset($fields['mgbc_desc_margin']) ? $fields['mgbc_desc_margin'] : '';
                $mgbc_desc_color = isset($fields['mgbc_desc_color']) ? $fields['mgbc_desc_color'] : '';
                $mgbc_btn = isset($fields['mgbc_btn']) ? $fields['mgbc_btn'] : 'info';


?>
            <style type="text/css">
                <?php if ($mgbc_cont_padding || !empty($mgbc_cont_bgcolor)) : ?>.mgb-card<?php echo esc_attr($rand_num); ?> {
                    <?php if ($mgbc_cont_padding) : ?>padding: <?php echo esc_attr($mgbc_cont_padding); ?>px;
                    <?php endif; ?><?php if ($mgbc_cont_bgcolor) : ?>background-color: <?php echo esc_attr($mgbc_cont_bgcolor); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbc_img_height || $mgbc_img_margin) : ?>.mgb-card<?php echo esc_attr($rand_num); ?>img {
                    <?php if ($mgbc_img_height) : ?>height: <?php echo esc_attr($mgbc_img_height); ?>px;
                    <?php endif; ?><?php if ($mgbc_img_margin) : ?>margin-bottom: <?php echo esc_attr($mgbc_img_margin); ?>px;
                    <?php endif; ?><?php if ($mgbc_img_width  == 'yes') : ?>width: 100%;
                    <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbc_title_size || $mgbc_title_margin || $mgbc_title_color) : ?>.mgb-card<?php echo esc_attr($rand_num); ?>.mgc-title {
                    <?php if ($mgbc_title_size) : ?>font-size: <?php echo esc_attr($mgbc_title_size); ?>px;
                    <?php endif; ?><?php if ($mgbc_title_margin) : ?>margin-bottom: <?php echo esc_attr($mgbc_title_margin); ?>px;
                    <?php endif; ?><?php if ($mgbc_title_color) : ?>color: <?php echo esc_attr($mgbc_title_color); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?><?php if ($mgbc_desc_size || $mgbc_desc_margin || $mgbc_desc_color) : ?>.mgb-card<?php echo esc_attr($rand_num); ?>.mgcard-desc {
                    <?php if ($mgbc_desc_size) : ?>font-size: <?php echo esc_attr($mgbc_desc_size); ?>px;
                    <?php endif; ?><?php if ($mgbc_desc_margin) : ?>margin-bottom: <?php echo esc_attr($mgbc_desc_margin); ?>px;
                    <?php endif; ?><?php if ($mgbc_desc_color) : ?>color: <?php echo esc_attr($mgbc_desc_color); ?>;
                    <?php endif; ?>
                }

                <?php endif; ?>
            </style>

            <div class="mb-3 mg-card mg-shadow text-<?php echo esc_attr($mgbc_align); ?> mgb-card<?php echo esc_attr($rand_num); ?>">
                <?php if ($mgbc_image) : ?>
                    <div class="mg-card-img mb-3">
                        <figure>
                            <?php echo wp_get_attachment_image($mgbc_image, $fields['mgbc_img_size']); ?>
                        </figure>
                    </div>
                <?php endif; ?>
                <div class="mgb-cpadding mg-card-text">
                    <?php
                    if ($mgbc_title) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($mgbiitag),
                            'class="mgc-title"',
                            esc_html($mgbc_title)
                        );
                    endif;
                    ?>
                    <?php if ($mgbc_desc) : ?>
                        <p class="mgcard-desc"><?php echo wp_kses_post($mgbc_desc); ?></p>
                    <?php endif; ?>
                    <?php if ($mgbc_showbtn) : ?>
                        <a class="mgb-btn btn btn-<?php echo esc_attr($mgbc_btn); ?>" href="<?php echo esc_url($mgbc_btn_url); ?>"><?php echo esc_html($mgbc_btn_text); ?></a>
                    <?php endif; ?>
                </div>

            </div>

<?php
            });
    }
}

new mgbCard();

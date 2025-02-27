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
class mgbBanner
{

	function __construct()
	{
		add_action('carbon_fields_register_fields', [$this, 'mgb_banner']);
	}


	function mgb_banner()
	{

		Block::make(__('Magical Banner', 'magical-blocks'))
			->set_category('magical-blocks', __('Magical Block', 'magical-blocks'), 'welcome-view-site')
			->set_icon('archive')
			->set_keywords([__('banner', 'magical-blocks'), __('call to action', 'magical-blocks'), __('button', 'magical-blocks')])
			//  ->set_preview_mode( true )
			->set_mode('both')

			->add_tab(__('Text and Image'), array(
				Field::make('separator', 'mgbba_content', __('Banner Content', 'magical-blocks')),
				Field::make('text', 'mgbba_title', __('Banner Title', 'magical-blocks'))->set_default_value(__('Welcome Magical Blocks', 'magical-blocks')),
				Field::make('text', 'mgbba_subtitle', __('Banner Sub Title', 'magical-blocks'))->set_default_value(__('One Of The Best WordPress Gutenbur Blocks Addons', 'magical-blocks')),
				/* Field::make( 'textarea', 'mgbba_desc', __( 'Description','magical-blocks' ) ),*/
				Field::make('checkbox', 'mgbba_showbtn', __('Show 1st Button'))
					->set_option_value('yes')->set_default_value('yes'),
				Field::make('text', 'mgbba_btn_text', __('Button text', 'magical-blocks'))->set_default_value(__('Read More', 'magical-blocks')),
				Field::make('text', 'mgbba_btn_url', __('Button url', 'magical-blocks'))->set_default_value('#'),
				Field::make('checkbox', 'mgbba_showbtn2', __('Show 2nd Button'))
					->set_option_value('yes')->set_default_value('yes'),
				Field::make('text', 'mgbba_btn_text2', __('2nd Button text', 'magical-blocks'))->set_default_value(__('View Details', 'magical-blocks')),
				Field::make('text', 'mgbba_btn_url2', __('2nd Button url', 'magical-blocks'))->set_default_value('#'),
				Field::make('select', 'mgbba_align', __('Content Position', 'magical-blocks'))
					->set_options(array(
						'left' => __('Left', 'magical-blocks'),
						'center' => __('Center', 'magical-blocks'),
						'right' => __('Right', 'magical-blocks'),
					))
					->set_default_value('center'),
				Field::make('separator', 'mgbba_img', __('Banner Image and background color', 'magical-blocks')),
				Field::make('image', 'mgbba_image', __('Image', 'magical-blocks'))->set_help_text(__('Banner Image size should be 1600*900', 'magical-blocks')),
				Field::make('select', 'mgbba_img_size', __('Image size', 'magical-blocks'))
					->set_options(array(
						'mgb-banner' => __('Magical banner (1600*800)', 'magical-blocks'),
						'medium_large' => __('Medium large (768*0)', 'magical-blocks'),
						'large' => __('Large ( 1024*1024)', 'magical-blocks'),
						'full' => __('Orginal size', 'magical-blocks'),
					))
					->set_default_value('mgb-banner'),
				Field::make('color', 'mgbba_bgcolor', __('Banner Background color', 'magical-blocks'))
					->set_palette(array('#FF0000', '#00FF00', '#0000FF')),
				Field::make('text', 'mgbba_cont_opacity', __('Background color opacity', 'magical-blocks'))->set_help_text(__('You can set opacity for background image show in overlay. Enter 0.1 to 0.9 for opacity and enter 1 for hide opacity.', 'magical-blocks'))
					->set_attribute('type', 'number'),

			))
			->add_tab(__('Banner Style'), array(
				Field::make('separator', 'mgbba_sep_content', __('Content Style', 'magical-blocks')),
				Field::make('text', 'mgbba_height', __('Banner height', 'magical-blocks'))->set_help_text(__('Set Banner height. Default banner height is 800.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_height_tablet', __('Banner height for tablet', 'magical-blocks'))->set_help_text(__('Set Banner height. Default banner height is 600.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_height_mobile', __('Banner height for mobile', 'magical-blocks'))->set_help_text(__('Set Banner height. Default banner height is 500.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_cont_bpadding', __('Content top Padding', 'magical-blocks'))->set_help_text(__('You can use top padding for set banner content position. padding set by px'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_bottom_margin', __('Banner bottom space', 'magical-blocks'))->set_help_text(__('Type banner bottom margin. Banner bottom margin set by px'))
					->set_attribute('type', 'number'),

				Field::make('separator', 'mgbba_sep_img', __('Background Image Style', 'magical-blocks')),
				Field::make('checkbox', 'mgbba_img_width', __('Set 100% image width', 'magical-blocks'))
					->set_option_value('yes')->set_default_value('yes'),
				Field::make('text', 'mgbba_img_height', __('Image height', 'magical-blocks'))->set_help_text(__('Set image height. Leave empty for auto height.'))
					->set_attribute('type', 'number'),


				Field::make('separator', 'mgbba_sep_title', __('Title Style', 'magical-blocks')),

				Field::make('text', 'mgbba_title_size', __('Title font size', 'magical-blocks'))->set_help_text(__('Type number for icon size. Icon size set by px'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_title_size_tablet', __('Title font size for tablet', 'magical-blocks'))->set_help_text(__('Type number for icon size. Icon size set by px'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_title_size_mobile', __('Title font size for mobile', 'magical-blocks'))->set_help_text(__('Type number for icon size. Icon size set by px'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_title_bmargin', __('Title bottom space', 'magical-blocks'))->set_help_text(__('Type number icon margin. Icon margin set by px'))
					->set_attribute('type', 'number'),
				Field::make('color', 'mgbba_title_color', __('Title color', 'magical-blocks'))
					->set_palette(array('#FF0000', '#00FF00', '#0000FF')),

				Field::make('separator', 'mgbba_sep_subtitle', __('Sub Title Style', 'magical-blocks')),

				Field::make('text', 'mgbba_subtitle_size', __('Sub Title Font Size', 'magical-blocks'))->set_help_text(__('Type number for Subtitle font size.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_subtitle_size_tablet', __('Sub Title Font Size For Tablet', 'magical-blocks'))->set_help_text(__('Type number for Subtitle font size.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_subtitle_size_mobile', __('Sub Title Font Size For Mobile', 'magical-blocks'))->set_help_text(__('Type number for Subtitle font size.'))
					->set_attribute('type', 'number'),
				Field::make('text', 'mgbba_subtitle_margin', __('Sub Title bottom space', 'magical-blocks'))->set_help_text(__('Sub Title bottom margin. Margin set by px'))
					->set_attribute('type', 'number'),
				Field::make('color', 'mgbba_subtitle_color', __('Sub Title color', 'magical-blocks'))
					->set_palette(array('#FF0000', '#00FF00', '#0000FF')),


				Field::make('separator', 'mgbba_sep_btn', __('Button style', 'magical-blocks')),
				Field::make('select', 'mgbba_btn_one', __('Select Button One', 'magical-blocks'))
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
				Field::make('select', 'mgbba_btn_two', __('Select Button Two', 'magical-blocks'))
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
					->set_default_value('success'),

			))

			->set_render_callback(function ($fields, $attributes, $inner_blocks) {

				$mgbba_title = isset($fields['mgbba_title']) ? $fields['mgbba_title'] : __('Welcome Magical Blocks', 'magical-blocks');
				$mgbba_subtitle = isset($fields['mgbba_subtitle']) ? $fields['mgbba_subtitle'] : __('One Of The Best WordPress Gutenbur Blocks Addons', 'magical-blocks');
				$mgbba_showbtn = isset($fields['mgbba_showbtn']) ? $fields['mgbba_showbtn'] : 'yes';
				$mgbba_btn_text = isset($fields['mgbba_btn_text']) ? $fields['mgbba_btn_text'] : __('Read More', 'magical-blocks');
				$mgbba_btn_url = isset($fields['mgbba_btn_url']) ? $fields['mgbba_btn_url'] : '#';
				$mgbba_showbtn2 = isset($fields['mgbba_showbtn2']) ? $fields['mgbba_showbtn2'] : 'yes';
				$mgbba_btn_text2 = isset($fields['mgbba_btn_text2']) ? $fields['mgbba_btn_text2'] : __('View Details', 'magical-blocks');
				$mgbba_btn_url2 = isset($fields['mgbba_btn_url2']) ? $fields['mgbba_btn_url2'] : '#';
				$mgbba_align = isset($fields['mgbba_align']) ? $fields['mgbba_align'] : 'center';
				// Image section
				$mgbba_image = isset($fields['mgbba_image']) ? $fields['mgbba_image'] : '';
				$mgbba_img_size = isset($fields['mgbba_img_size']) ? $fields['mgbba_img_size'] : 'mgb-banner';
				$mgbba_bgcolor = isset($fields['mgbba_bgcolor']) ? $fields['mgbba_bgcolor'] : '';
				$mgbba_cont_opacity = isset($fields['mgbba_cont_opacity']) ? $fields['mgbba_cont_opacity'] : '0.5';

				//style section 
				$mgbba_height = isset($fields['mgbba_height']) ? $fields['mgbba_height'] : '';
				$mgbba_height_tablet = isset($fields['mgbba_height_tablet']) ? $fields['mgbba_height_tablet'] : '';
				$mgbba_height_mobile = isset($fields['mgbba_height_mobile']) ? $fields['mgbba_height_mobile'] : '';
				$mgbba_cont_bpadding = isset($fields['mgbba_cont_bpadding']) ? $fields['mgbba_cont_bpadding'] : '';
				$mgbba_bottom_margin = isset($fields['mgbba_bottom_margin']) ? $fields['mgbba_bottom_margin'] : '';
				$mgbba_img_width = isset($fields['mgbba_img_width']) ? $fields['mgbba_img_width'] : '';
				$mgbba_img_height = isset($fields['mgbba_img_height']) ? $fields['mgbba_img_height'] : '';
				$mgbba_title_size = isset($fields['mgbba_title_size']) ? $fields['mgbba_title_size'] : '';
				$mgbba_title_size_tablet = isset($fields['mgbba_title_size_tablet']) ? $fields['mgbba_title_size_tablet'] : '';
				$mgbba_title_size_mobile = isset($fields['mgbba_title_size_mobile']) ? $fields['mgbba_title_size_mobile'] : '';
				$mgbba_title_bmargin = isset($fields['mgbba_title_bmargin']) ? $fields['mgbba_title_bmargin'] : '';
				$mgbba_title_color = isset($fields['mgbba_title_color']) ? $fields['mgbba_title_color'] : '';
				$mgbba_subtitle_size = isset($fields['mgbba_subtitle_size']) ? $fields['mgbba_subtitle_size'] : '';
				$mgbba_subtitle_size_tablet = isset($fields['mgbba_subtitle_size_tablet']) ? $fields['mgbba_subtitle_size_tablet'] : '';
				$mgbba_subtitle_size_mobile = isset($fields['mgbba_subtitle_size_mobile']) ? $fields['mgbba_subtitle_size_mobile'] : '';
				$mgbba_subtitle_margin = isset($fields['mgbba_subtitle_margin']) ? $fields['mgbba_subtitle_margin'] : '';
				$mgbba_subtitle_color = isset($fields['mgbba_subtitle_color']) ? $fields['mgbba_subtitle_color'] : '';
				$mgbba_btn_one = isset($fields['mgbba_btn_one']) ? $fields['mgbba_btn_one'] : 'info';
				$mgbba_btn_two = isset($fields['mgbba_btn_two']) ? $fields['mgbba_btn_two'] : 'success';

				$rand_num = wp_rand(68547, 932547);

?>
			<style type="text/css">
				<?php if ($mgbba_cont_opacity <= 1 || $mgbba_bgcolor) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-bgcolor {
					<?php if ($mgbba_cont_opacity) : ?>opacity: <?php echo esc_attr($mgbba_cont_opacity); ?>;
					<?php endif; ?><?php if ($mgbba_bgcolor) : ?>background-color: <?php echo esc_attr($mgbba_bgcolor); ?>;
					<?php endif; ?>
				}

				<?php endif; ?><?php if ($mgbba_height != '800') : ?>.mgbanner.banner-main.mgbb<?php echo esc_attr($rand_num); ?>,
				.mgbb<?php echo esc_attr($rand_num); ?>.mgb-bimg {
					height: <?php echo esc_attr($mgbba_height); ?>px;
				}

				<?php endif; ?><?php if ($mgbba_cont_bpadding) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text {
					padding-top: <?php echo esc_attr($mgbba_cont_bpadding); ?>px;
				}

				<?php endif; ?><?php if ($mgbba_bottom_margin) : ?>.mgbb<?php echo esc_attr($rand_num); ?> {
					margin-bottom: <?php echo esc_attr($mgbba_bottom_margin); ?>px;
				}

				<?php endif; ?><?php if ($mgbba_img_width != 'yes') : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgb-bimg img {
					width: auto;
				}

				<?php endif; ?><?php if ($mgbba_img_height) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgb-bimg img {
					height: <?php echo esc_attr($mgbba_img_height); ?>px;
					min-height: <?php echo esc_attr($mgbba_img_height); ?>px;
				}

				<?php endif; ?><?php if ($mgbba_title_size || $mgbba_title_bmargin || $mgbba_title_color) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-title {
					<?php if ($mgbba_title_size) : ?>font-size: <?php echo esc_attr($mgbba_title_size); ?>px;
					<?php endif; ?><?php if ($mgbba_title_bmargin) : ?>margin-bottom: <?php echo esc_attr($mgbba_title_bmargin); ?>px;
					<?php endif; ?><?php if ($mgbba_title_color) : ?>color: <?php echo esc_attr($mgbba_title_color); ?>;
					<?php endif; ?>
				}

				<?php endif; ?><?php if ($mgbba_subtitle_size || $mgbba_subtitle_margin || $mgbba_subtitle_color) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-subtitle {
					<?php if ($mgbba_subtitle_size) : ?>font-size: <?php echo esc_attr($mgbba_subtitle_size); ?>px;
					<?php endif; ?><?php if ($mgbba_subtitle_margin) : ?>margin-bottom: <?php echo esc_attr($mgbba_subtitle_margin); ?>px;
					<?php endif; ?><?php if ($mgbba_subtitle_color) : ?>color: <?php echo esc_attr($mgbba_subtitle_color); ?>;
					<?php endif; ?>
				}

				<?php endif; ?>@media (max-width: 991px) {

					<?php if ($mgbba_height_tablet != '600') : ?>.mgbanner.banner-main.mgbb<?php echo esc_attr($rand_num); ?>,
					.mgbb<?php echo esc_attr($rand_num); ?>.mgb-bimg {
						height: <?php echo esc_attr($mgbba_height_tablet); ?>px;
					}

					<?php endif; ?><?php if ($mgbba_subtitle_size_tablet) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-subtitle {
						font-size: <?php echo esc_attr($mgbba_subtitle_size_tablet); ?>px;
					}

					<?php endif; ?><?php if ($mgbba_title_size_tablet) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-title {
						font-size: <?php echo esc_attr($mgbba_title_size_tablet); ?>px;
					}

					<?php endif; ?>
				}

				@media (max-width: 767px) {

					<?php if ($mgbba_height_mobile != '500') : ?>.mgbanner.banner-main.mgbb<?php echo esc_attr($rand_num); ?>,
					.mgbb<?php echo esc_attr($rand_num); ?>.mgb-bimg {
						height: <?php echo esc_attr($mgbba_height_mobile); ?>px;
					}

					<?php endif; ?><?php if ($mgbba_title_size_mobile) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-title {
						font-size: <?php echo esc_attr($mgbba_title_size_mobile); ?>px;
					}

					<?php endif; ?><?php if ($mgbba_subtitle_size_mobile) : ?>.mgbb<?php echo esc_attr($rand_num); ?>.mgbb-text .mgbb-subtitle {
						font-size: <?php echo esc_attr($mgbba_subtitle_size_mobile); ?>px;
					}

					<?php endif; ?>
				}
			</style>

			<div class="mgbanner banner-main mgbb<?php echo esc_attr($rand_num); ?>">
				<div class="mgb-bimg">
					<?php if ($mgbba_image) : ?>
						<?php echo wp_get_attachment_image($mgbba_image, $mgbba_img_size); ?>
					<?php endif; ?>
					<div class="mgbb-bgcolor"></div>
				</div>
				<div class="mgbb-text text-<?php echo esc_attr($mgbba_align); ?>">
					<div class="mgbb-inner">
						<div class="container">
							<?php if ($mgbba_title) : ?>
								<h1 class="mgbb-title"><?php echo esc_html($mgbba_title); ?></h1>
							<?php endif; ?>
							<?php if ($mgbba_subtitle) : ?>
								<h4 class="mgbb-subtitle"><?php echo esc_html($mgbba_subtitle); ?></h4>
							<?php endif; ?>
							<?php if ($mgbba_showbtn) : ?>
								<a href="<?php echo esc_url($mgbba_btn_url); ?>" class="btn btn-<?php echo esc_attr($mgbba_btn_one); ?> btn-lg mgbb-btn"><?php echo esc_html($mgbba_btn_text); ?></a>
							<?php endif; ?>
							<?php if ($mgbba_showbtn2) : ?>
								<a href="<?php echo esc_url($mgbba_btn_url2); ?>" class="btn btn-<?php echo esc_attr($mgbba_btn_two); ?> btn-lg mgbb-btn ml-4"><?php echo esc_html($mgbba_btn_text2); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

<?php
			});
	}
}

new mgbBanner();

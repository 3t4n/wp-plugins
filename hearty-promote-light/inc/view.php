<?php

class HeartyPromoteLightView {

	public static function generate_view($settings_instance) {

		$options = get_option('heartypromotelight_options');

		$options_i = array();

		$i = 1;

		if (empty($options)) { return '<p>Please save your settings and try again.</p>'; }

		foreach ($options as $k => $v) {

			if ($i > 1) {

				$k_arr = explode('_', $k);

				if (end($k_arr) == $settings_instance) {

					$options_i[str_replace('_'.$settings_instance, '', $k)] = $v;

				}

			}

			$i++;

		}

		$number_of_content_items = 4;

		// params

		$layout_effect                          = $options_i['layout_effect'];

		$title_google_font                      = $options_i['title_google_font'];
		$title_font_weight                      = $options_i['title_font_weight'];
		$title_font_style                       = $options_i['title_font_style'];
		$title_padding                          = $options_i['title_padding'];
		$title_font_size                        = $options_i['title_font_size'];
		$title_line_height                      = $options_i['title_line_height'];
		$title_text_align                       = $options_i['title_text_align'];
		$title_icon_font_size                   = $options_i['title_icon_font_size'];
		$title_icon_vertical_align              = $options_i['title_icon_vertical_align'];

		$description_text_font_size             = $options_i['description_text_font_size'];
		$description_text_line_height           = $options_i['description_text_line_height'];
		$description_text_align                 = $options_i['description_text_align'];

		for ($j=1;$j<=$number_of_content_items;$j++) {

		${'show_column'.$j}                     = $options_i['show_column'.$j];
		${'column_border_color'.$j}             = $options_i['column_border_color'.$j];
		${'column_border_radius'.$j}            = $options_i['column_border_radius'.$j];
		${'upload_image'.$j}                    = $options_i['upload_image'.$j];
		${'image_link'.$j}                      = $options_i['image_link'.$j];
		${'image_link_target'.$j}               = $options_i['image_target'.$j];
		${'image_alt'.$j}                       = $options_i['image_alt'.$j];
		${'title_text'.$j}                      = $options_i['title_text'.$j];
		${'title_color'.$j}                     = $options_i['title_color'.$j];
		${'title_bg_color'.$j}                  = $options_i['title_bg_color'.$j];
		${'title_link'.$j}                      = $options_i['title_link'.$j];
		${'title_link_target'.$j}               = $options_i['title_link_target'.$j];
		${'title_icon'.$j}                      = $options_i['title_icon'.$j];
		${'description_text'.$j}                = str_replace("\n", '<br />', $options_i['description_text'.$j]);
		${'description_text_color'.$j}          = $options_i['description_text_color'.$j];

		}

		$custom_id = rand(10000,90000);

		wp_register_style('heartypromotelight-googlefonts-title'.$custom_id, 'https://fonts.googleapis.com/css?family='.str_replace(" ","+",$title_google_font).':'.$title_font_weight.str_replace("normal","",$title_font_style));

		wp_enqueue_style('heartypromotelight-googlefonts-title'.$custom_id);

		// end params

		ob_start();

		// html

		?>

		  <style type="text/css">

			.heartypromotelight1-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color1; ?>; }
			.heartypromotelight2-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color2; ?>; }
			.heartypromotelight3-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color3; ?>; }
			.heartypromotelight4-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color4; ?>; }
			.heartypromotelight5-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color5; ?>; }
			.heartypromotelight6-<?php echo $custom_id; ?>:hover { background-color: <?php echo $title_bg_color6; ?>; }

		  </style>

		  <?php if ($layout_effect != 'layout-effect-none') { ?>

		  <script type="text/javascript">
			jQuery(document).ready(function() {
			jQuery('#heartypromotelight-<?php echo $custom_id; ?> .layout-effect').addClass("heartyhide").viewportChecker({
			  classToAdd: 'heartyshow <?php echo $layout_effect; ?>', // Class to add to the elements when they are visible
			  offset: 100
			  });
			});
		  </script>

		  <?php } ?>

		<div id="heartypromotelight-<?php echo $custom_id; ?>" class="hrty-row">

		  <?php
		  $col_class = '';
		  $active_columns = array($show_column1,$show_column2,$show_column3,$show_column4,$show_column5,$show_column6);
		  $columns_check = 0; foreach ($active_columns as $active_column) { if ($active_column == 1) { $columns_check++; } }

			if ($columns_check == 6) { $col_class = 'hrty-col-lg-2 hrty-col-md-4 hrty-col-sm-6 hrty-col-xs-12'; }
			else if ($columns_check == 5) { $col_class = 'hrty-col-lg-2-4 hrty-col-md-4 hrty-col-sm-6 hrty-col-xs-12'; }
			else if ($columns_check == 4) { $col_class = 'hrty-col-lg-3 hrty-col-md-3 hrty-col-sm-6 hrty-col-xs-12'; }
			else if ($columns_check == 3) { $col_class = 'hrty-col-lg-4 hrty-col-md-4 hrty-col-sm-4 hrty-col-xs-12'; }
			else if ($columns_check == 2) { $col_class = 'hrty-col-lg-6 hrty-col-md-6 hrty-col-sm-6 hrty-col-xs-12'; }
			else if ($columns_check == 1) { $col_class = 'hrty-col-lg-12 hrty-col-md-12 hrty-col-sm-12 hrty-col-xs-12'; }

			for ($i=1;$i<7;$i++) {

			if ((${'show_column'.$i}) !=0) { ?>

			<div class="heartypromotelight <?php echo $col_class; ?>">

			  <div id="heartypromotelight-box<?php echo $i; ?>"
				class="heartypromotelight<?php echo $i; ?>-<?php echo $custom_id; ?> layout-effect"
				style="border: 1px solid <?php echo ${'column_border_color'.$i}; ?>;
				-webkit-border-radius: <?php echo ${'column_border_radius'.$i}; ?>;
				-moz-border-radius: <?php echo ${'column_border_radius'.$i}; ?>;
				border-radius: <?php echo ${'column_border_radius'.$i}; ?>;">

				<div id="heartypromotelight-image<?php echo $i; ?>"
					  style="height:100%; text-align: center;">

				  <?php // Do not receive link if the link setting is empty
				  if(empty(${'image_link'.$i})) { ?>

					<?php if (${'upload_image'.$i}) { ?>
					  <img src="<?php echo ${'upload_image'.$i}; ?>"
					  alt="<?php echo ${'image_alt'.$i}; ?>"/>
					<?php } else { ?>
					  <img src="<?php echo plugins_url('/demo/demo-image'.$i.'.jpg', __DIR__); ?>"
					  alt="<?php echo ${'image_alt'.$i}; ?>" />
					<?php } ?>

				  <?php } else { ?>

					<a href="<?php echo ${'image_link'.$i}; ?>" target="_<?php echo ${'image_link_target'.$i}; ?>" >

					<?php if (${'upload_image'.$i}) { ?>
					  <img src="<?php echo ${'upload_image'.$i}; ?>"
					  alt="<?php echo ${'image_alt'.$i}; ?>"/>
					<?php } else { ?>
					  <img src="<?php echo plugins_url('/demo/demo-image'.$i.'.jpg', __DIR__); ?>"
					  alt="<?php echo ${'image_alt'.$i}; ?>" />
					<?php } ?>

					</a>

				  <?php } ?>

				</div>

				<p id="heartypromotelight-text<?php echo $i; ?>"
				  style="color: <?php echo ${'description_text_color'.$i}; ?>;
						font-size: <?php echo $description_text_font_size; ?>;
						line-height: <?php echo $description_text_line_height; ?>;
						text-align: <?php echo $description_text_align; ?>;">
						  <?php echo ${'description_text'.$i}; ?>
				</p>

				<h4 id="heartypromotelight-title<?php echo $i; ?>"
					style="color: <?php echo ${'title_color'.$i}; ?>;
						background-color: <?php echo ${'title_bg_color'.$i}; ?>;
						font-family: '<?php echo $title_google_font; ?>', sans-serif;
						font-weight: <?php echo $title_font_weight; ?>;
						font-style: <?php echo $title_font_style; ?>;
						padding: <?php echo $title_padding; ?>;
						font-size: <?php echo $title_font_size; ?>;
						line-height: <?php echo $title_line_height; ?>;
						text-align: <?php echo $title_text_align; ?>;
						margin-bottom:0;">
					<i class="<?php echo ${'title_icon'.$i}; ?>"
					  style="color: <?php echo ${'title_color'.$i}; ?>;
							font-size: <?php echo $title_icon_font_size; ?>;
							vertical-align: <?php echo $title_icon_vertical_align; ?>;
							padding-right: 0.4em;"></i>

				  <?php // Do not receive link if the link setting is empty
				  if(empty(${'title_link'.$i})) { ?>

					<?php echo ${'title_text'.$i}; ?>

				  <?php } else { ?>

					<a href="<?php echo ${'title_link'.$i}; ?>" target="_<?php echo ${'title_link_target'.$i}; ?>"
							style="color: <?php echo ${'title_color'.$i}; ?>;">

					  <?php echo ${'title_text'.$i}; ?>

					</a>

				  <?php } ?>

				</h4>

			  </div>

			</div>

		  <?php } } ?>

		</div>

		<?php

		// end html

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}


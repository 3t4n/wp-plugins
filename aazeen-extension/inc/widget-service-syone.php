<?php
/**
 * service Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */


if ( !class_exists( 'aazeen_servicetwo_widget' ) ) {

	class aazeen_servicetwo_widget extends WP_Widget {

		public function __construct() {
			$widget_ops = array(
				'classname' => 'aazeen_service_widget aazeen_widgtes',
				'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'aazeen_servicetwo_widget', __( 'Aazeen - Service(style 2)', 'aazeen-extension' ), $widget_ops );
			$this->alt_option_name = 'aazeen_servicetwo_widget';

			add_action('wp_enqueue_scripts', array(&$this, 'aazeen_service2_style'));
			include "default.php";
			$this->defaults = $defaults_servicetwo_widget;
			}


		function widget($args, $instance) {

			 $button1_color = isset( $instance['button1_color'] ) ? $instance['button1_color'] : '#1abc9c';
			 $button_style = isset( $instance['button_style'] ) ? $instance['button_style'] : 'btn-round';
			 $content_color = isset( $instance['content_color'] ) ? $instance['content_color'] : '#fff';
			 $title_color = isset( $instance['title_color'] ) ? $instance['title_color'] : '#fff';
			 $gred_color1 = isset( $instance['gred_color1'] ) ? $instance['gred_color1'] : '';
			 $gred_color2 = isset( $instance['gred_color2'] ) ? $instance['gred_color2'] : '';
			 $gred_color3 = isset( $instance['gred_color3'] ) ? $instance['gred_color3'] : '';




			 if ( 225 > ariColor::newColor( $button1_color )->luminance ) {
				 // Our background color is dark, so we need to create a light text color.
				 $button1_color_bg = '#fff';
			 } else {

				 // Our background color is light, so we need to create a dark text color
				 $button1_color_bg =  '#000' ;

			 }
			 $button1_color_bg = esc_attr( $button1_color_bg );

	 	 		extract($args);
				$instance = wp_parse_args((array) $instance, $this->defaults);
 			 	echo $before_widget;

 			 ?>
		<?php	 //Stylesheet-loaded in Customizer Only.
			if(is_customize_preview()){
				$id= $this->id;
				echo "<style> #".$id." .feature__content p
	 			{
	 				color: $content_color;
	 			}
				#".$id." .service2__content h3.feature__title
				{
					color: $title_color;
				}
				#".$id." .service2 .btn.btn-primary
				{
					color: $button1_color_bg;
				}
				#".$id." .service2 .btn.btn-primary
			 {
			 	background-color: $button1_color ;
			 	border-color:$button1_color;
			 	box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button1_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button1_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button1_color, .12) . ";
			 }
			 #".$id." .service2 .btn.btn-primary
			 {
				 color: $button1_color_bg;
			 }</style>";
			}
			 ?>

	<!--section head start-->
	<div id="servicetwo" >
		<div class="grid-container full">
			<div class="grid-x  align-center" data-equalizer>
				<?php	if ( !empty($instance['title1']) || !empty($instance['text1']) || !empty($instance['image_uri1'])): ?>
					<!-- feature one start -->
					<div class="cell small-24 medium-12 large-auto">
						<div class="service2 <?php echo esc_attr($gred_color1); ?>" <?php if (!empty($instance['image_uri1'])): ?>style="background-image: url(<?php echo esc_url($instance['image_uri1']); ?>); <?php endif;?>" data-equalizer-watch>
							<?php if (!empty($instance['image_uri1'])): ?>
							<div class="overlay"></div>
							<?php endif;?>
							<div class="service2__content">
							<?php if (!empty($instance['title1'])): ?>
								<h3 class="feature__title"><?php echo apply_filters('widget_title', $instance['title1']); ?></h3>
							<?php endif;?>
							<?php if (!empty($instance['text1'])): ?>
								<div class="feature__content">
									<p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text1'])); ?></p>
								</div>
							<?php endif;?>
							<?php if( !empty($instance['url1']) ):?>
											<a class="btn btn-primary <?php echo esc_attr($instance['button_style']); ?>" href="<?php echo esc_url($instance['url1']);?>" >
												<span><?php if( !empty($instance['link_text1']) ):?> <?php echo $instance['link_text1'];?><?php endif;?></span>
											</a>
							<?php endif;?>
						</div>
						</div>
					</div>
					<!-- feature one end -->
				<?php endif; ?>
				<?php	if ( !empty($instance['title2']) || !empty($instance['text2']) || !empty($instance['image_uri2'])): ?>
					<!-- feature two start -->
					<div class="cell small-24 medium-12 large-auto">
						<div class="service2 <?php echo esc_attr($gred_color2); ?>" <?php if (!empty($instance['image_uri2'])): ?>style="background-image: url(<?php echo esc_url($instance['image_uri2']); ?>); <?php endif;?>" data-equalizer-watch>
							<?php if (!empty($instance['image_uri2'])): ?>
							<div class="overlay"></div>
							<?php endif;?>
							<div class="service2__content">
							<?php if (!empty($instance['title2'])): ?>
								<h3 class="feature__title"><?php echo apply_filters('widget_title', $instance['title2']); ?></h3>
							<?php endif;?>
							<?php if (!empty($instance['text2'])): ?>
								<div class="feature__content">
									<p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text2'])); ?></p>
								</div>
							<?php endif;?>
							<?php if( !empty($instance['url2']) ):?>
								<div class="feature__button">
									<div class="button-wrapper ">
										<span>
											<a class="btn btn-primary <?php echo esc_attr($instance['button_style']); ?>" href="<?php echo esc_url($instance['url2']);?>">
												<span><?php if( !empty($instance['link_text2']) ):?> <?php echo $instance['link_text2'];?><?php endif;?></span>
											</a>
										</span>
									</div>
								</div>
							<?php endif;?>
						</div>
						</div>
					</div>
					<!-- feature two end -->
				<?php endif; ?>

				<?php	if (!empty($instance['title3']) || !empty($instance['text3']) || !empty($instance['image_uri3'])): ?>
					<!-- feature three start -->
					<div class="cell small-24 medium-12 large-auto">
						<div class="service2 <?php echo esc_attr($gred_color3); ?>" <?php if (!empty($instance['image_uri3'])): ?>style="background-image: url(<?php echo esc_url($instance['image_uri3']); ?>); <?php endif;?>" data-equalizer-watch>
							<?php if (!empty($instance['image_uri3'])): ?>
							<div class="overlay"></div>
							<?php endif;?>
							<div class="service2__content">
							<?php if (!empty($instance['title3'])): ?>
								<h3 class="feature__title"><?php echo apply_filters('widget_title', $instance['title3']); ?></h3>
							<?php endif;?>
							<?php if (!empty($instance['text3'])): ?>
								<div class="feature__content">
									<p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text3'])); ?></p>
								</div>
							<?php endif;?>
							<?php if( !empty($instance['url3']) ):?>
								<div class="feature__button">
									<div class="button-wrapper ">
										<span>
											<a class="btn btn-primary <?php echo esc_attr($instance['button_style']); ?>" href="<?php echo esc_url($instance['url3']);?>">
												<span><?php if( !empty($instance['link_text3']) ):?> <?php echo $instance['link_text3'];?><?php endif;?></span>
											</a>
										</span>
									</div>
								</div>
							<?php endif;?>
						</div>
						</div>
					</div>
					<!-- feature three end -->
				<?php endif; ?>

		</div>
	</div>
	</div>
<?php
		 echo $after_widget;

 }

 function update($new_instance, $old_instance) {

		 $instance = $old_instance;

  /*Box 1 */
		 $instance['image_uri1'] = strip_tags( $new_instance['image_uri1'] );
		 $instance['title1'] = strip_tags($new_instance['title1']);
		 $instance['text1'] = stripslashes(wp_filter_post_kses($new_instance['text1']));
		 $instance['link_text1'] = strip_tags( $new_instance['link_text1'] );
		 $instance['url1'] = strip_tags( $new_instance['url1'] );
		 $instance['gred_color1'] = strip_tags($new_instance['gred_color1']);
		 $instance['gred_color3'] = strip_tags($new_instance['gred_color3']);
		 $instance['gred_color2'] = strip_tags($new_instance['gred_color2']);

 /*Box 2 */
	 $instance['image_uri2'] = strip_tags( $new_instance['image_uri2'] );
	 $instance['title2'] = strip_tags($new_instance['title2']);
	 $instance['text2'] = stripslashes(wp_filter_post_kses($new_instance['text2']));
	 $instance['link_text2'] = strip_tags( $new_instance['link_text2'] );
	 $instance['url2'] = strip_tags( $new_instance['url2'] );


 /*Box 3 */
		 $instance['image_uri3'] = strip_tags( $new_instance['image_uri3'] );
		 $instance['title3'] = strip_tags($new_instance['title3']);
		 $instance['text3'] = stripslashes(wp_filter_post_kses($new_instance['text3']));
		 $instance['link_text3'] = strip_tags( $new_instance['link_text3'] );
		 $instance['url3'] = strip_tags( $new_instance['url3'] );

/*Box 4 */
		 $instance['image_uri4'] = strip_tags( $new_instance['image_uri4'] );
		 $instance['title4'] = strip_tags($new_instance['title4']);
		 $instance['text4'] = stripslashes(wp_filter_post_kses($new_instance['text4']));
		 $instance['link_text4'] = strip_tags( $new_instance['link_text4'] );
		 $instance['url4'] = strip_tags( $new_instance['url4'] );

		 $instance['button1_color'] = strip_tags($new_instance['button1_color']);
		 // Button one style
		 $instance[ 'button_style' ]	= strip_tags( $new_instance[ 'button_style' ] );
		 $instance['title_color'] = strip_tags($new_instance['title_color']);
		 $instance['content_color'] = strip_tags($new_instance['content_color']);

		 return $instance;

 }
 function form($instance) {
	 /* Set up some default widget settings. */
	 $instance = wp_parse_args((array) $instance, $this->defaults); ?>


<!--BLOCK 1 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Block 1', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">

		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri1'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri1']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri1' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri1' ); ?>"
				value="<?php if( !empty($instance['image_uri1']) ): echo $instance['image_uri1']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri1' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<script type="text/javascript">
			jQuery( function( $ ) {

				function getEnhancedSelectFormatStringsgra() {
					var formatString = {
						formatMatches: function( matches ) {
							if ( 1 === matches ) {
								return suffice_enhanced_select_params.i18n_matches_1;
							}

							return suffice_enhanced_select_params.i18n_matches_n.replace( '%qty%', matches );
						},
						formatNoMatches: function() {
							return suffice_enhanced_select_params.i18n_no_matches;
						},
						formatAjaxError: function() {
							return suffice_enhanced_select_params.i18n_ajax_error;
						},
						formatInputTooShort: function( input, min ) {
							var number = min - input.length;

							if ( 1 === number ) {
								return suffice_enhanced_select_params.i18n_input_too_short_1;
							}

							return suffice_enhanced_select_params.i18n_input_too_short_n.replace( '%qty%', number );
						},
						formatInputTooLong: function( input, max ) {
							var number = input.length - max;

							if ( 1 === number ) {
								return suffice_enhanced_select_params.i18n_input_too_long_1;
							}

							return suffice_enhanced_select_params.i18n_input_too_long_n.replace( '%qty%', number );
						},
						formatSelectionTooBig: function( limit ) {
							if ( 1 === limit ) {
								return suffice_enhanced_select_params.i18n_selection_too_long_1;
							}

							return suffice_enhanced_select_params.i18n_selection_too_long_n.replace( '%qty%', limit );
						},
						formatLoadMore: function() {
							return suffice_enhanced_select_params.i18n_load_more;
						},
						formatSearching: function() {
							return suffice_enhanced_select_params.i18n_searching;
						}
					};

					return formatString;
				}

				function getEnhancedSelectFormatResultgra( icon ) {
					if ( icon.id && $( icon.element ).data( 'icon' ) ) {
						return '<div class="gra ' + $( icon.element ).data( 'icon' ) + '"></div> ' ;
					}

					return '<div class="gra ' + $( icon.element ).data( 'icon' ) + '"></div> ' ;
				}

				$( document.body )

					.on( 'suffice-enhanced-select-init', function() {

						// Icon Picker
						$( ':input.suffice-enhanced-select-gra' ).filter( ':not(.enhanced)' ).each( function() {
							var select2_args = $.extend({
								minimumResultsForSearch: 10,
								allowClear:  true,
										 escapeMarkup: function (markup) {return markup;},
								placeholder: $( this ).data( 'placeholder' ),
								templateResult: getEnhancedSelectFormatResultgra
							}, getEnhancedSelectFormatStringsgra() );
							$( this ).select2( select2_args ).addClass( 'enhanced' );
						});
					})

					.trigger( 'suffice-enhanced-select-init' );

			});

			</script>
			<p>
				<?php _e('OR', 'aazeen-extension') ?>
			</p>

			<div id="tg-widget-icon-picker" class="suffice-icon enhanced">
			<label for="<?php echo $this->get_field_id('gred_color1'); ?>"><?php _e('Background Color or overlay', 'aazeen-extension') ?></label>
			<select id="<?php echo $this->get_field_id('gred_color1'); ?>" name="<?php echo $this->get_field_name('gred_color1'); ?>" class="widefat suffice-enhanced-select-gra" data-placeholder="<?php esc_attr_e( 'Choose gradient color&hellip;', 'suffice-toolkit' ); ?>">
				<option value=""></option>
				<?php  $array = array();
								for ($x = 1; $x <= 40; $x++) {
										?>
				<option value="<?php echo 'gradient_'.$x ?>" class="<?php echo 'gradient_'.$x ?>" data-icon="<?php echo esc_attr( 'gradient_'.$x ); ?>" <?php echo selected($instance['gred_color1'], 'gradient_'.$x); ?> > <?php _e('gradient-'.$x, 'aazeen-extension') ?></option>
				<?php
								} ?>
			</select>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text1'); ?>" id="<?php echo $this->get_field_id('text1'); ?>"><?php if( !empty($instance['text1']) ): echo htmlspecialchars_decode($instance['text1']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link_text1'); ?>"><?php _e('Link Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text1'); ?>" id="<?php echo $this->get_field_id('link_text1'); ?>" value="<?php if( !empty($instance['link_text1']) ): echo $instance['link_text1']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url1'); ?>" id="<?php echo $this->get_field_id('url1'); ?>" value="<?php if( !empty($instance['url1']) ): echo esc_url($instance['url1']); endif; ?>">
		</p>

	</div>
</div>

<!--BLOCK 2 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Block 2', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri2'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri2']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri2' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri2' ); ?>"
				value="<?php if( !empty($instance['image_uri2']) ): echo $instance['image_uri2']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri2' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<?php _e('OR', 'aazeen-extension') ?>
		</p>

		<div id="tg-widget-icon-picker" class="suffice-icon enhanced">
		<label for="<?php echo $this->get_field_id('gred_color2'); ?>"><?php _e('Background Color or overlay', 'aazeen-extension') ?></label>
		<select id="<?php echo $this->get_field_id('gred_color2'); ?>" name="<?php echo $this->get_field_name('gred_color2'); ?>" class="widefat suffice-enhanced-select-gra" data-placeholder="<?php esc_attr_e( 'Choose gradient color&hellip;', 'suffice-toolkit' ); ?>">
			<option value=""></option>
			<?php  $array = array();
							for ($x = 1; $x <= 40; $x++) {
									?>
			<option value="<?php echo 'gradient_'.$x ?>" class="<?php echo 'gradient_'.$x ?>" data-icon="<?php echo esc_attr( 'gradient_'.$x ); ?>" <?php echo selected($instance['gred_color2'], 'gradient_'.$x); ?> > <?php _e('gradient-'.$x, 'aazeen-extension') ?></option>
			<?php
							} ?>
		</select>
	</div>

		<p>
			<label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>"><?php if( !empty($instance['text2']) ): echo htmlspecialchars_decode($instance['text2']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link_text2'); ?>"><?php _e('Link Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text2'); ?>" id="<?php echo $this->get_field_id('link_text2'); ?>" value="<?php if( !empty($instance['link_text2']) ): echo $instance['link_text2']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url2'); ?>" id="<?php echo $this->get_field_id('url2'); ?>" value="<?php if( !empty($instance['url2']) ): echo esc_url($instance['url2']); endif; ?>" class="widefat">
		</p>

	</div>
</div>

<!--BLOCK 3 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Block 3', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri3'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri3']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri3' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri3' ); ?>"
				value="<?php if( !empty($instance['image_uri3']) ): echo $instance['image_uri3']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri3' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<?php _e('OR', 'aazeen-extension') ?>
		</p>

		<div id="tg-widget-icon-picker" class="suffice-icon enhanced">
		<label for="<?php echo $this->get_field_id('gred_color3'); ?>"><?php _e('Background Color or overlay', 'aazeen-extension') ?></label>
		<select id="<?php echo $this->get_field_id('gred_color3'); ?>" name="<?php echo $this->get_field_name('gred_color3'); ?>" class="widefat suffice-enhanced-select-gra" data-placeholder="<?php esc_attr_e( 'Choose gradient color&hellip;', 'suffice-toolkit' ); ?>">
			<option value=""></option>
			<?php  $array = array();
							for ($x = 1; $x <= 40; $x++) {
									?>
			<option value="<?php echo 'gradient_'.$x ?>" class="<?php echo 'gradient_'.$x ?>" data-icon="<?php echo esc_attr( 'gradient_'.$x ); ?>" <?php echo selected($instance['gred_color3'], 'gradient_'.$x); ?> > <?php _e('gradient-'.$x, 'aazeen-extension') ?></option>
			<?php
							} ?>
		</select>
	</div>

		<p>
			<label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Text', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text3'); ?>" id="<?php echo $this->get_field_id('text3'); ?>"><?php if( !empty($instance['text3']) ): echo htmlspecialchars_decode($instance['text3']); endif; ?></textarea>
			<p>
				<label for="<?php echo $this->get_field_id('link_text3'); ?>"><?php _e('Link Text', 'promote'); ?></label>
				<input type="text" name="<?php echo $this->get_field_name('link_text3'); ?>" id="<?php echo $this->get_field_id('link_text3'); ?>" value="<?php if( !empty($instance['link_text3']) ): echo $instance['link_text3']; endif; ?>" class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('url3'); ?>"><?php _e('Link', 'promote'); ?></label>
				<input type="text" name="<?php echo $this->get_field_name('url3'); ?>" id="<?php echo $this->get_field_id('url3'); ?>" value="<?php if( !empty($instance['url3']) ): echo esc_url($instance['url3']); endif; ?>" class="widefat">
			</p>
		</p>
	</div>
</div>

<!---end accordino---->
<div class="block_accordion">
  <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>

  <div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id( 'content_color' ); ?>" class="icon-color"><?php _e('Content Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_color' ); ?>" name="<?php echo $this->get_field_name( 'content_color' ); ?>" value="<?php echo $instance['content_color']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
		</p>

	</p>
	<label for="<?php echo $this->get_field_id('button_style'); ?>"><?php _e('button style', 'aazeen-extension') ?></label>
	<select id="<?php echo $this->get_field_id('button_style'); ?>" name="<?php echo $this->get_field_name('button_style'); ?>" class="widefat">
		<option value="btn-sm" <?php if ( 'btn-sm' == $instance['button_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Small', 'aazeen-extension') ?></option>
		<option value="regu" <?php if ( 'regu' == $instance['button_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Regular', 'aazeen-extension') ?></option>
		<option value="btn-round" <?php if ( 'btn-round' == $instance['button_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round', 'aazeen-extension') ?></option>
		<option value="btn-lg" <?php if ( 'btn-round' == $instance['button_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Large', 'aazeen-extension') ?></option>
		<option value="btn-round btn-lg" <?php if ( 'btn-round btn-lg' == $instance['button_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round Large', 'aazeen-extension') ?></option>

	</select>
	<p>

		<p>
		 <label for="<?php echo $this->get_field_id( 'button1_color' ); ?>" class="icon-color"><?php _e('button bg Color', 'aazeen-extension') ?></label>
		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button1_color' ); ?>" name="<?php echo $this->get_field_name( 'button1_color' ); ?>" value="<?php echo $instance['button1_color']; ?>" type="text" />
	 </p>


</div>
</div>
<?php
 }
	 //ENQUEUE CSS
	 function aazeen_service2_style() {
		 $settings = get_option( $this->option_name );

		 if ( empty( $settings ) ) {
			 return;
		 }

		 foreach ( $settings as $instance_id => $instance ) {
			 $id = $this->id_base . '-' . $instance_id;

			 if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				 continue;
			 }
			 $button1_color= '#1abc9c';
			 $content_color='#fff';
			 $title_color='#fff';

			 if ( ! empty( $instance['button1_color'] ) ) {
 		$button1_color = esc_attr($instance['button1_color']);
 			}
			if ( ! empty( $instance['content_color'] ) ) {
				$content_color = esc_attr($instance['content_color']);
			}
			if ( ! empty( $instance['title_color'] ) ) {
				$title_color = esc_attr($instance['title_color']);
			}

				$id= $this->id;
		 $inline_css='';


		 /*content  Color  for text */
 		$inline_css .=

 			"#".$id." .feature__content p
 			{
 				color: $content_color;
 			}"
 		;

		$inline_css .=

			"#".$id." .service2__content h3.feature__title
			{
				color: $title_color;
			}"
		;

		/*----------- button one -----------*/

		$inline_css .=
		 " #".$id." .service2 .btn.btn-primary
		 {
			 background-color: $button1_color ;
			 border-color:$button1_color;
			 box-shadow:0 2px 2px 0 " . Kirki_Color::get_rgba($button1_color, .14) . ",0 3px 1px -2px " . Kirki_Color::get_rgba($button1_color, .2) . ",0 1px 5px 0 " . Kirki_Color::get_rgba($button1_color, .12) . ";
		 }"

		;

		if ( 225 > ariColor::newColor( $button1_color )->luminance ) {
			// Our background color is dark, so we need to create a light text color.
			$button1_color_bg = '#fff';
		} else {

			// Our background color is light, so we need to create a dark text color
			$button1_color_bg =  '#000' ;

		}
		$button1_color_bg = esc_attr( $button1_color_bg );
		/*  Color calculation for text */
		$inline_css .=
			"#".$id." .service2 .btn.btn-primary
			{
				color: $button1_color_bg;
			}"
		;

		wp_add_inline_style( 'aazeen-style', $inline_css );
		}
		 }

	}
}


 // register aazeen_ex dual category posts widget
 function aazeen_ex_servicetwo_widget() {
     register_widget( 'aazeen_servicetwo_widget' );
 }
 add_action( 'widgets_init', 'aazeen_ex_servicetwo_widget' );

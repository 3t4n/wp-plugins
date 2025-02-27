<?php
/**
 * Text With Icon Widget
 *
 * @package Meteorite
 */

class Meteorite_Text_With_Icon extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_text_with_icon_widget', 'description' => __('Display a textblock with an icon on top/left', 'meteorite_extensions'));
		parent::__construct(false, $name = __('Meteorite: Text With Icon', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_text_with_icon_widget';
	}

	function form( $instance ) {
		$title 			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 			= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Icon above';
		$headline		= isset( $instance['headline'] ) ? esc_attr( $instance['headline'] ) : '';
		$divider 		= isset( $instance['divider'] ) ? esc_attr($instance['divider'] ) : 'Yes';
		$icon			= isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : '';
		$image_url		= isset( $instance['image_url'] ) ? esc_url( $instance['image_url'] ) : '';
		$image_alt_text	= isset( $instance['image_alt_text'] ) ? esc_attr( $instance['image_alt_text'] ) : '';
		$border			= isset( $instance['border'] ) ? esc_attr( $instance['border'] ) : 'None';
		$hover			= isset( $instance['hover'] ) ? esc_attr($instance['hover'] ) : 'No';
		$link			= isset( $instance['link'] ) ? esc_url( $instance['link'] ) : '';
		$link_target	= isset( $instance['link_target'] ) ? esc_attr( $instance['link_target'] ) : '_self';
		$animation 		= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
		$text			= isset( $instance['text'] ) ? wp_kses_post( force_balance_tags( $instance['text'] ) ) : '';
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Information', 'meteorite_extensions' ); ?></h4>
				<p>
					<?php echo sprintf( '%1$s<a href="//fontawesome.com/v4.7.0/cheatsheet/" target="_blank">%2$s</a>&#46;&nbsp;%3$s',
						_x( 'You can find a list of the available icons ', 'Icon description', 'meteorite_extensions' ),
						_x( 'here', 'Icon description', 'meteorite_extensions' ),
						_x( 'Usage example: <strong>fa-android</strong>', 'Icon description', 'meteorite_extensions')
					); ?>
				</p>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Title', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter a widget title.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Icon Above', 'Small Icon Above', 'Large Icon Above', 'Icon Left', 'Hexagon', 'Hexagon Left');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Headline', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter your headline here.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="text" value="<?php echo $headline; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Divider', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Show a divider after the headlines?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('divider'); ?>" id="<?php echo $this->get_field_id('divider'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Yes', 'No');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $divider == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Icon', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your icon. Example: <strong>fa-android</strong>.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Image', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Upload an alternative image.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="tt-media-uploader">
								<div class="tt-media-image-holder" <?php if ( ! $image_url ) { echo 'style="display: none;"'; } ?> >
									<img src="<?php echo esc_url( meteorite_get_attachment_thumb_url( $image_url ) ); ?>" alt="" class="tt-media-image img-thumbnail" />
								</div>
								<div class="tt-media-meta-fields">
									<input type="hidden" class="tt-media-upload-url" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $image_url; ?>" />
								</div>
								<a class="tt-media-upload-btn btn btn-primary" id="tt-media-upload-btn" href="#"><?php _e( 'Upload', 'meteorite_extensions' ); ?></a>
								<a class="tt-media-remove-btn btn btn-default" id="tt-media-remove-btn" href="#" <?php if ( ! $image_url ) { echo 'style="display: none;"'; } ?>><?php _e( 'Remove', 'meteorite_extensions' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-field-desc">
				<h4><?php _e( 'Image Alt Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Describe your image here in a few words.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('image_alt_text'); ?>" name="<?php echo $this->get_field_name('image_alt_text'); ?>" type="text" value="<?php echo $image_alt_text; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Border', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a border style.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('border'); ?>" id="<?php echo $this->get_field_id('border'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Square', 'Rounded', 'Round');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $border == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Hover Style', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Activate the hover effect?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('hover'); ?>" id="<?php echo $this->get_field_id('hover'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hover == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Link', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'If you want your icon and headline to be linked, paste your link here.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Link Target', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( '_self = open in same window', 'meteorite_extensions' ); ?></p>
				<p><?php _e( '_blank = open in new window.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('link_target'); ?>" id="<?php echo $this->get_field_id('link_target'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $link_target == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'This text will be displayed below headline.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Animation', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose an animation type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('animation'); ?>" id="<?php echo $this->get_field_id('animation'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Fade In', 'Fade In Up', 'Fade In Left', 'Fade In Right', 'Fade In One By One', 'Fade In Up One By One');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $animation == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= sanitize_text_field($new_instance['title']);
		$instance['type'] 			= sanitize_text_field($new_instance['type']);
		$instance['headline'] 		= sanitize_text_field($new_instance['headline']);
		$instance['divider'] 		= sanitize_text_field($new_instance['divider']);
		$instance['icon'] 			= sanitize_text_field($new_instance['icon']);
		$instance['image_url']		= esc_url_raw($new_instance['image_url']);
		$instance['image_alt_text'] = sanitize_text_field($new_instance['image_alt_text']);
		$instance['hover'] 			= sanitize_text_field($new_instance['hover']);
		$instance['border'] 		= sanitize_text_field($new_instance['border']);
		$instance['link'] 			= esc_url_raw($new_instance['link']);
		$instance['link_target'] 	= sanitize_text_field($new_instance['link_target']);
		$instance['animation'] 		= sanitize_text_field($new_instance['animation']);
		if ( current_user_can('unfiltered_html') ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		}

		return $instance;
	}

	function widget( $args, $instance ) {

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type 			= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Icon above';
		$headline		= isset( $instance['headline'] ) ? esc_html( $instance['headline'] ) : '';
		$divider		= isset( $instance['divider'] ) ? esc_attr($instance['divider'] ) : 'Yes';
		$icon			= isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : '';
		$image_url		= isset( $instance['image_url'] ) ? esc_url($instance['image_url']) : '';
		$image_alt_text = isset( $instance['image_alt_text'] ) ? esc_attr($instance['image_alt_text']) : '';
		$hover			= isset( $instance['hover'] ) ? esc_attr($instance['hover'] ) : 'No';
		$border 		= isset( $instance['border'] ) ? esc_attr($instance['border']) : 'None';
		$link			= isset( $instance['link'] ) ? esc_url( $instance['link'] ) : '';
		$link_target 	= isset( $instance['link_target'] ) ? esc_attr($instance['link_target']) : '_self';
		$animation 		= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';
		$text 			= isset( $instance['text'] ) ? $instance['text'] : '';

		if ( $divider == 'Yes' ) :
			$divider_class = 'has-divider';
		else :
			$divider_class = '';
		endif;

		if ( $border == 'Square' ) {
			$border_class = 'border-square';
		} elseif ( $border == 'Rounded' ) {
			$border_class = 'border-rounded';
		} elseif ( $border == 'Round' ) {
			$border_class = 'border-round';
		} else {
			$border_class = 'border-none';
		}

		if ( $hover == 'Yes' ) :
			$hover_class = 'hover-effect';
		else :
			$hover_class = ''; 
		endif;

		if ( $link_target == '_self' ) {
			$target = '_self';
		} elseif ( $link_target == '_blank' ) {
			$target = '_blank';
		}

		$animation_class = '';
		$animation_single = '';
		if ( $animation == 'Fade In' ) {
			$animation_class = 'fade-in';
		} elseif ( $animation == 'Fade In Up' ) {
			$animation_class = 'fade-in-up';
		} elseif ( $animation == 'Fade In Left' ) {
			$animation_class = 'fade-in-left';
		} elseif ( $animation == 'Fade In Right' ) {
			$animation_class = 'fade-in-right';
		} elseif ( $animation == 'Fade In One By One' ) {
			$animation_single = 'fade-in-single';
		} elseif ( $animation == 'Fade In Up One By One' ) {
			$animation_single = 'fade-in-up-single';
		}

		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; }
		?>

		<div class="meteorite-text-with-icon <?php echo $animation_class . ' ' . $animation_single; ?>">
			<?php if ( $type == 'Icon Above' ) : ?>
			<div class="type-icon-above meteorite-item <?php echo $hover_class; ?>">
				<?php if ( $icon ) : ?>
					<div class="icon <?php echo $border_class; ?>">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
						<?php else : ?>
							<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
						<?php endif; ?>
					</div>
				<?php elseif ( $image_url ) : ?>
					<div class="image">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
						<?php else : ?>
							<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $headline ) : ?>
					<h3 class="title <?php echo $divider_class ?>">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
						<?php else : ?>
							<?php echo $headline; ?>
						<?php endif; ?>
					</h3>
				<?php endif; ?>
				<?php if ( $text ) : ?>
					<div class="description">
						<?php echo wpautop( $text ); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php elseif ( $type == 'Small Icon Above' ) : ?>
			<div class="type-small-icon-above meteorite-item <?php echo $hover_class; ?>">
				<?php if ( $icon ) : ?>
					<div class="icon <?php echo $border_class; ?>">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
						<?php else : ?>
							<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
						<?php endif; ?>
					</div>
				<?php elseif ( $image_url ) : ?>
					<div class="image">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
						<?php else : ?>
							<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $headline ) : ?>
					<h3 class="title <?php echo $divider_class ?>">
						<?php if ( $link ) : ?>
							<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
						<?php else : ?>
							<?php echo $headline; ?>
						<?php endif; ?>
					</h3>
				<?php endif; ?>
				<?php if ( $text ) : ?>
					<div class="description">
						<?php echo wpautop( $text ); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php elseif ( $type == 'Large Icon Above' ) : ?>
				<div class="type-large-icon-above meteorite-item <?php echo $hover_class; ?>">
					<?php if ( $icon ) : ?>
						<div class="icon <?php echo $border_class ?>">
							<?php if ( $link ) : ?>
								<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
							<?php else : ?>
								<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
							<?php endif; ?>
						</div>
					<?php elseif ( $image_url ) : ?>
						<div class="image">
							<?php if ( $link ) : ?>
								<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
							<?php else : ?>
								<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if ( $headline ) : ?>
						<h3 class="title <?php echo $divider_class ?>">
							<?php if ( $link ) : ?>
								<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
							<?php else : ?>
								<?php echo $headline; ?>
							<?php endif; ?>
						</h3>
					<?php endif; ?>
					<?php if ( $text ) : ?>
						<div class="description">
							<?php echo wpautop( $text ); ?>
						</div>
					<?php endif; ?>
				</div>

			<?php elseif ( $type == 'Icon Left' ) : ?>
				<div class="type-icon-left meteorite-item clearfix <?php echo $hover_class; ?>">
					<?php if ( $icon ) : ?>
						<div class="icon <?php echo $border_class ?>">
							<?php if ( $link ) : ?>
								<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
							<?php else : ?>
								<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
							<?php endif; ?>
						</div>
					<?php elseif ( $image_url ) : ?>
						<div class="image">
							<?php if ( $link ) : ?>
								<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
							<?php else : ?>
								<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>	
					<div class="info">
						<?php if ( $headline ) : ?>
							<h3 class="title <?php echo $divider_class ?>">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
								<?php else : ?>
									<?php echo $headline; ?>
								<?php endif; ?>
							</h3>
						<?php endif; ?>
						<?php if ( $text ) : ?>
							<div class="description">
								<?php echo wpautop( $text ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="clearfix"></div>

			<?php elseif ( $type == 'Hexagon' ) : ?>
				<div class="type-hexagon meteorite-item <?php echo $hover_class; ?>">
					<?php if ( $icon ) : ?>
						<div class="svg-container text-with-icon-svg">
							<?php 
							if ( function_exists('meteorite_svg_hexagon') ) :
								meteorite_svg_hexagon();
							endif; 
							?>
							<div class="icon">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
								<?php else : ?>
									<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif ( $image_url ) : ?>
						<div class="svg-container text-with-icon-svg">
							<?php 
							if ( function_exists('meteorite_svg_hexagon') ) :
								meteorite_svg_hexagon();
							endif; 
							?>
							<div class="image">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
								<?php else : ?>
									<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="info">
						<?php if ( $headline ) : ?>
							<h3 class="title <?php echo $divider_class ?>">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
								<?php else : ?>
									<?php echo $headline; ?>
								<?php endif; ?>
							</h3>
						<?php endif; ?>
						<?php if ( $text ) : ?>
							<div class="description">
								<?php echo wpautop( $text ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

			<?php elseif ( $type == 'Hexagon Left' ) : ?>
				<div class="type-hexagon-left meteorite-item clearfix <?php echo $hover_class; ?>">
					<?php if ( $icon ) : ?>
						<div class="svg-container text-with-icon-svg">
							<?php 
							if ( function_exists('meteorite_svg_hexagon') ) :
								meteorite_svg_hexagon();
							endif; 
							?>
							<div class="icon">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><i class="fa ' . $icon . '"></i></a>'; ?>
								<?php else : ?>
									<?php echo '<i class="fa ' . $icon . '"></i>'; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif ( $image_url ) : ?>
						<div class="svg-container text-with-icon-svg">
							<?php 
							if ( function_exists('meteorite_svg_hexagon') ) :
								meteorite_svg_hexagon();
							endif; 
							?>
							<div class="image">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '"><img src="' . $image_url . '" alt="' . $image_alt_text . '" /></a>'; ?>
								<?php else : ?>
									<?php echo '<img src="' . $image_url . '" alt="' . $image_alt_text . '" />'; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="info">
						<?php if ( $headline ) : ?>
							<h3 class="title <?php echo $divider_class ?>">
								<?php if ( $link ) : ?>
									<?php echo '<a href="' . $link . '" class="smooth-scroll" target="' . $target . '">' . $headline . '</a>'; ?>
								<?php else : ?>
									<?php echo $headline; ?>
								<?php endif; ?>
							</h3>
						<?php endif; ?>
						<?php if ( $text ) : ?>
							<div class="description">
								<?php echo wpautop( $text ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="clearfix"></div>

			<?php endif; ?>

			</div>
		
		<?php
		echo $args['after_widget'];

	}
}
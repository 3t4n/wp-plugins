<?php
/**
 * Clients widget
 *
 * @package Meteorite
 */

class Meteorite_Clients extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_clients_widget', 'description' => __( 'Display your clients in a carousel.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Clients', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_clients_widget';
	}
	
	function form($instance) {
		$title			 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type			 = isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Default';
		$number			 = isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category		 = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$itemsLarge		 = isset( $instance['itemsLarge'] ) ? esc_attr( $instance['itemsLarge'] ) : '4';
		$itemsMedium	 = isset( $instance['itemsMedium'] ) ? esc_attr( $instance['itemsMedium'] ) : '2';
		$itemsSmall		 = isset( $instance['itemsSmall'] ) ? esc_attr( $instance['itemsSmall'] ) : '1';
		$enable_autoplay = isset( $instance['enable_autoplay'] ) ? esc_attr( $instance['enable_autoplay'] ) : 'On';
		$autoplay		 = isset( $instance['autoplay'] ) ? intval( $instance['autoplay'] ) : 5000;
		$pagination		 = isset( $instance['pagination'] ) ? esc_attr( $instance['pagination'] ) : 'Show';
		$target			 = isset( $instance['target'] ) ? esc_attr( $instance['target'] ) : '_self';
		$center_content	 = isset( $instance['center_content'] ) ? esc_attr( $instance['center_content'] ) : 'No';
		$animation		 = isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Information', 'meteorite_extensions' ); ?></h4>
				<p><?php _e('In order to display this widget, you must first add some clients from the dashboard. Set your client logos as featured images.', 'meteorite_extensions'); ?></p>
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
							$options = array('Default', 'Bordered');
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
				<h4><?php _e( 'Number', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Number of clients to show (-1 shows all of them).', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" class="form-control tt-form-element" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Category', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the slug for your category or leave empty to show all clients.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Number Of Items', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose how many clients should be shown on the same time.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Desktop', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsLarge'); ?>" id="<?php echo $this->get_field_id('itemsLarge'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4', '5', '6');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsLarge == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Tablet', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsMedium'); ?>" id="<?php echo $this->get_field_id('itemsMedium'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4', '5', '6');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsMedium == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Items Mobile', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('itemsSmall'); ?>" id="<?php echo $this->get_field_id('itemsSmall'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4', '5', '6');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $itemsSmall == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Customize', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Customize this carousel', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Autoplay', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('enable_autoplay'); ?>" id="<?php echo $this->get_field_id('enable_autoplay'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('On', 'Off');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $enable_autoplay == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Enter an autoplay time [ms].', 'meteorite_extensions' ); ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" type="text" value="<?php echo $autoplay; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Pagination', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('pagination'); ?>" id="<?php echo $this->get_field_id('pagination'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Show', 'Hide');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $pagination == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Link Target (Client Logos)', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( '_self = open in same window', 'meteorite_extensions' ); ?></p>
				<p><?php _e( '_blank = open in new window.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $target == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Alignment', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Center the clients? (Use only if you have less clients than items set for desktop view)', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('center_content'); ?>" id="<?php echo $this->get_field_id('center_content'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $center_content == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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

	<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			 = sanitize_text_field($new_instance['title']);
		$instance['type'] 			 = sanitize_text_field($new_instance['type']);
		$instance['number'] 		 = sanitize_text_field($new_instance['number']);
		$instance['category'] 		 = sanitize_text_field($new_instance['category']);
		$instance['itemsLarge'] 	 = sanitize_text_field($new_instance['itemsLarge']);
		$instance['itemsMedium'] 	 = sanitize_text_field($new_instance['itemsMedium']);
		$instance['itemsSmall'] 	 = sanitize_text_field($new_instance['itemsSmall']);
		$instance['enable_autoplay'] = sanitize_text_field($new_instance['enable_autoplay']);
		$instance['autoplay'] 		 = absint($new_instance['autoplay']);
		$instance['pagination'] 	 = sanitize_text_field($new_instance['pagination']);
		$instance['target'] 		 = sanitize_text_field($new_instance['target']);
		$instance['center_content']	 = sanitize_text_field($new_instance['center_content']);
		$instance['animation'] 		 = sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 			 = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type 			 = isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Default';
		$category 		 = isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$number 		 = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number ) {
			$number = -1;
		}		
		$itemsLarge		 = isset( $instance['itemsLarge'] ) ? esc_attr($instance['itemsLarge']) : '4';
		$itemsMedium	 = isset( $instance['itemsMedium'] ) ? esc_attr($instance['itemsMedium']) : '2';
		$itemsSmall		 = isset( $instance['itemsSmall'] ) ? esc_attr($instance['itemsSmall']) : '1';
		$enable_autoplay = isset( $instance['enable_autoplay'] ) ? esc_attr($instance['enable_autoplay']) : 'On';
		$autoplay 		 = ( ! empty( $instance['autoplay'] ) ) ? intval( $instance['autoplay'] ) : 5000;
		$pagination		 = isset( $instance['pagination'] ) ? esc_attr($instance['pagination']) : 'Show';
		$target 		 = isset( $instance['target'] ) ? esc_attr($instance['target']) : '_self';
		$center_content	 = isset( $instance['center_content'] ) ? esc_attr($instance['center_content']) : 'No';
		$animation 		 = isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';
		
		$clients = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'clients',
			'posts_per_page'	  => $number,
			'client-category'	  => $category
		) );

		$type_class = '';
		if ( $type == 'Bordered' ) {
			$type_class = 'client-bordered';
		}

		$data_autoplay = 'false';
		if ( $enable_autoplay == 'On' ) :
			$data_autoplay = intval($autoplay);
		endif;

		$data_pagination = 'false';
		if ( $pagination == 'Show' ) :
			$data_pagination = 'true';
		endif;

		if ( $target == '_blank' ) {
			$target_blank = "_blank";
		} elseif ( $target == '_self' ) {
			$target_blank = "_self";
		}

		$centered_class = '';
		if ( $center_content == 'Yes' ) :
			$centered_class = 'centered';
		endif;

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

		if ( $clients->have_posts() && post_type_exists( 'clients' )  ) :
		global $post;
		?>

		<div class="meteorite-clients-wrap">
			<div class="meteorite-clients carousel owl-carousel <?php echo $centered_class . ' ' . $animation_class . $animation_single ?>" data-items-large="<?php echo $itemsLarge; ?>" data-items-medium="<?php echo $itemsMedium; ?>" data-items-small="<?php echo $itemsSmall; ?>" data-autoplay="<?php echo $data_autoplay; ?>" data-pagination="<?php echo $data_pagination; ?>">
				<?php 
				while ( $clients->have_posts() ) : $clients->the_post();
					$link = get_post_meta( get_the_ID(), 'tt-client-link', true );
					if ( has_post_thumbnail() ) : ?>
						<div class="client-item meteorite-item <?php echo $type_class; ?>">
							<?php if ( $link ) : ?>
								<a target="<?php echo $target_blank; ?>" href="<?php echo esc_url( $link ); ?>"><?php the_post_thumbnail( 'meteorite-large-thumb' ); ?></a>
							<?php else : ?>
								<?php the_post_thumbnail( 'meteorite-large-thumb' ); ?>
							<?php endif; ?>
						</div>
					<?php
					endif;
				endwhile; ?>
			</div>
		</div>

		<?php
		wp_reset_postdata();

		elseif ( current_user_can('edit_theme_options') ) :
			echo '<div class="no-posts-notice">' . sprintf( _x('Info: you have not created any clients. Make sure you have installed the %1$s plugin and created some clients %2$s', 'no posts info', 'meteorite_extensions'),
				'Terra Themes Tools',
				'<a href="' . esc_url( get_admin_url('', 'edit.php?post_type=clients') ) . '">' . __('here', 'meteorite_extensions') . '</a>'
			) . '</div>';
		endif;
		echo $args['after_widget'];

	}
	
}
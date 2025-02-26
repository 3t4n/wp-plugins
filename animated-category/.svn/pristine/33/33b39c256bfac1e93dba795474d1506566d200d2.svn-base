<?php

class Animated_cat extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('anime_cat', 'Animated Category', array(
			'description' => 'Animated category widgets'
		));
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	}
	
	

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string $hook_suffix
	 */
	public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}
	
	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}
	
	/**
	 * Widget output.
	 *
	 * @since  1.0
	 *
	 * @access public
	 * @param  array $args
	 * @param  array $instance
	 */
	public  function widget( $args, $instance )
	{
		$color = ( ! empty( $instance['color'] ) ) ? $instance['color'] : '#56a3d5';
		?>			
			<?php echo $args['before_widget']; ?>		        
		        <div class="news_content">
		            <?php echo $args['before_title']; ?> <?php echo $instance['title']; ?> <?php echo $args['after_widget']; ?>
		            <div class="anime-cat">
						<ul class="tags">
							<?php								
								$args = array(
									'number'     => $number,
									'orderby'    => $orderby,
									'order'      => $order,
									'hide_empty' => true,
									'include'    => $ids
								);
								$categories = get_terms( 'category', $args );
								foreach( $categories as $cat )  {
									$cat_link = get_term_link( $cat, 'category' );
								   echo '<li>';
								   echo '<'.'a href='. esc_url( $cat_link ) .'>'.$cat->name ;
								  
								   if ($instance['count']) {
									 echo '<span style="background: '.$color.'">'.$cat->count.'</span>';
								   }
								   echo '</a>';
								   echo '</li>';
								}
							?>
						</ul>
					</div>
		        </div>		                        
		    <?php echo $args['after_widget']; ?>
		<?php
		
		return true;
	}

	/**
	 * Saves widget settings.
	 *
	 * @since  1.0
	 *
	 * @access public
	 * @param  array $new_instance
	 * @param  array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'title' ]  = strip_tags( $new_instance['title'] );
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
		$instance[ 'color' ] = strip_tags( $new_instance['color'] );

		return $instance;
	}
	
	/**
	 * Prints the settings form.
	 *
	 * @since  1.0
	 *
	 * @access public
	 * @param  array $instance
	 */
	public function form( $instance )
	{
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		
		$color = esc_attr( $instance[ 'color' ] );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'anim-cat'); ?></label>

				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat title">
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked( $count ); ?> > <?php _e('Show post counts', 'anim-cat'); ?><br>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Color :' ); ?></label><br>
				<input type="text" name="<?php echo $this->get_field_name( 'color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color' ); ?>" value="<?php echo $color; ?>" data-default-color="#56a3d5" />
			</p>
		<?php
	}

}

<?php 

/***
 *
 * Widget
 *
 */


class Cyberslider_Widgets extends WP_Widget {
	// constructor
		function Cyberslider_Widgets() {
		// Give widget name here
		parent::WP_Widget(false, $name = __('Cyberslider Widgets', 'wp_widget_plugin') );
		}
		function form($instance) {
		// Check values
		if( $instance) {

				$title = esc_attr($instance['title']);
				$selected = esc_attr($instance['select']);	

				} 
				else {

				$title = '';
				$selected='';

				}?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', CS_TEXTDOMAIN); ?>
					</label>
						
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>

				<p>
				<?php 
					global $wpdb;
					$table_name=$wpdb->prefix .'cyberslider';
					 $slider = $wpdb->get_results( 
								"SELECT id, name FROM $table_name 
								ORDER BY id ASC"
								);?>

		        	<label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('Slider', CS_TEXTDOMAIN); ?>
		       		</label>

				        <select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">
				  
				  	   		<?php
						 		foreach ($slider as $single){ ?>
				                         <option value="<?php echo $single->id; ?>"<?php selected( $selected, $single->id ); ?> > <?php echo  $single->name; ?>
				                         </option>
				            	<?php } ?>
				        </select>
		    	</p>
				<?php	
			} 
				//update the new slider
				function update($new_instance, $old_instance) {
						$instance = $old_instance;
						//Cyberslider Fields
						$instance['title'] = strip_tags($new_instance['title']);
						$instance['select'] = strip_tags($new_instance['select']);
						return $instance;
				}

				// display Cyberslider widget
				function widget($args, $instance) {
					extract( $args );

						// these are the Cyberslider widget options
							$title = apply_filters('widget_title', $instance['title']);
							 $select =$instance['select'];

								echo $before_widget;

								// Display the Cyberslider widget title
								echo '<div class="widget-text wp_widget_plugin_box" style="width:269px; padding:5px 9px 20px 5px;  background: light-blue; border-radius: 5px; margin: 10px 0 25px 0;">';
										echo '<div class="widget-title" style="width: 90%; height:30px; margin-left:3%; ">';

											// Check if Cyberslider title is set
											if ( $title ) {
													echo $before_title . $title . $after_title ;
											}
										echo '</div>';
									
											// Check if Cyberslider is set
										echo '<div class="widefat">';
											if( $select ) {
												echo '<p class="widefat">';
												echo do_shortcode('[cyberslider id="'.$select.'"]');
												echo '</p>';
											}
										echo '</div>';
								echo '</div>';
							echo $after_widget;
				}
	}

		// register Cyberslider widget
	add_action('widgets_init', create_function('', 'return register_widget("Cyberslider_Widgets");'));
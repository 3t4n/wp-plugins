<?php

class suevafree_count_widget extends WP_Widget {

	public function __construct() {

		parent::__construct( "suevafree_count_widget", "SuevaFree Counter Widget", array("description" => "SuevaFree Counter Widget"));

	}

    public function form( $instance ) {

		$defaults = array(

			'title' => '',
            'title_size' => '50px',
			'description' => '',
            'description_size' => '20px',
            'color' => '#ffffff',
			'layout' => '',
			'columns' => 'col-md-4',
            'background_image' => '',
            'background_color' => '#2d3032',

        );

		$instance = wp_parse_args( (array) $instance, $defaults );

		$layouts = array(

			""  => esc_html__( "Default", "suevafree-essential-kit"),
			"circle"  => esc_html__( "Circle", "suevafree-essential-kit"),

		);

		$columns = array(

			"col-md-1"  => esc_html__( "12", "suevafree-essential-kit"),
			"col-md-2"  => esc_html__( "6", "suevafree-essential-kit"),
			"col-md-3"  => esc_html__( "4", "suevafree-essential-kit"),
			"col-md-4"  => esc_html__( "3", "suevafree-essential-kit"),
			"col-md-6"  => esc_html__( "2", "suevafree-essential-kit"),
			"col-md-12" => esc_html__( "1", "suevafree-essential-kit"),

		);

	?>

		<p>

        	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( "Title","suevafree-essential-kit"); ?>:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" />

        </p>

		<p>

            <label for="<?php echo $this->get_field_id( 'title_size' ); ?>"><?php esc_html_e( "Title size: (Default value : 50px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title_size' ); ?>" name="<?php echo $this->get_field_name( 'title_size' ); ?>" value="<?php echo esc_attr($instance['title_size']); ?>" />

		</p>

		<p>

        	<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( "Description","suevafree-essential-kit"); ?>:</label>
        	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo esc_attr($instance['description']); ?>" />

		</p>

		<p>

            <label for="<?php echo $this->get_field_id( 'description_size' ); ?>"><?php esc_html_e( "Description size: (Default value : 20px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'description_size' ); ?>" name="<?php echo $this->get_field_name( 'description_size' ); ?>" value="<?php echo esc_attr($instance['description_size']); ?>" />

		</p>

		<p>

        	<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php esc_html_e( "Color ( text and border):","suevafree-essential-kit"); ?></label></p>
        	<input type="text" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo $instance['color']; ?>" data-default-color="<?php echo $instance['color']; ?>" class="widefat sueva_color_picker"  />

        </p>

		<p>

			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php esc_html_e( "Layout:", "suevafree-essential-kit"); ?></label>

            <select class="widefat" name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>">

				<?php

					foreach ($layouts as $option => $value) {

					    if ($option == $instance['layout'] ) {

							echo "<option value='".$option."' selected='selected' >".$value."</option>";

						} else {

							echo "<option value='".$option."'>".$value."</option>";

						};

					}

                ?>

            </select>

		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php esc_html_e( "Columns:", "suevafree-essential-kit"); ?></label>

            <select class="widefat" name="<?php echo $this->get_field_name( 'columns' ); ?>" id="<?php echo $this->get_field_id( 'columns' ); ?>">

				<?php

					foreach ($columns as $option => $value) {

					    if ($option == $instance['columns'] ) {

							echo "<option value='".$option."' selected='selected' >".$value."</option>";

						} else {

							echo "<option value='".$option."'>".$value."</option>";

						};

					}

                ?>

            </select>

		</p>

		<p class="sueva_widget_upload">

            <label for="<?php echo $this->get_field_id( 'background_image' ); ?>"><?php esc_html_e( "Background image","suevafree-essential-kit"); ?></label>
            <input class="widefat upload_attachment" type="text" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo $instance['background_image']; ?>" />
			<input type="button" name="upload_button" class="button upload_button" value="<?php esc_attr_e('Upload', 'suevafree-essential-kit'); ?>" />

		</p>

		<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( "Background color:","suevafree-essential-kit"); ?></label></p>

        <p><input type="text" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $instance['background_color']; ?>" data-default-color="<?php echo $instance['background_color']; ?>" class="widefat sueva_color_picker"  /></p>

		<p><strong><?php echo esc_html__( "Counters:", "suevafree-essential-kit");?></strong></p>

        <?php

			$sueva_counters = isset( $instance['sueva_counters'] ) ? $instance['sueva_counters'] : array();

			$stream_num = count($sueva_counters);
			$sueva_counters[$stream_num+1] = '';
			$sueva_counters_html = array();
			$counter = 0;

			$sueva_counters_html[] = '<div class="counter-wrapper">';

			foreach ( $sueva_counters as $counter_item ) {

				$sueva_counters_html[] = '<div class="counter-box">';

				if ( isset($counter_item['counter_title']) ) {

					$sueva_counters_html[] = sprintf(
						'<label>Title:</label><p><input type="text" name="%1$s[%2$s][counter_title]" value="%3$s" class="widefat sourc%2$s"></p>',
						$this->get_field_name( 'sueva_counters' ),
						$counter,
						esc_attr( $counter_item['counter_title'] )

					);

				}

				if ( isset($counter_item['counter_count']) ) {

					$sueva_counters_html[] = sprintf(
						'<label>Count:</label><p><input type="text" name="%1$s[%2$s][counter_count]" value="%3$s" class="widefat sourc%2$s"></p>',
						$this->get_field_name( 'sueva_counters' ),
						$counter,
						esc_attr( $counter_item['counter_count'] )

					);

				}

				if ( isset($counter_item['counter_title']) || isset($counter_item['counter_count']) ) {

					$sueva_counters_html[] = sprintf('<p><span class="button suevafree_ek_delete_counter">'. esc_html__( "Delete","suevafree-essential-kit") . '</span></p>');

				}

				$counter += 1;

				$sueva_counters_html[] = '</div>';

			}

			$sueva_counters_html[] = '</div>';

			echo join( $sueva_counters_html );

		?>

            <input id="<?php echo $this->get_field_id('add_field'); ?>" class="button suevafree_ek_add_counter" type="button" value="<?php esc_html_e( 'Add counter', "suevafree-essential-kit" )?>" />

			<script type="text/javascript">

				jQuery.noConflict()(function($){

					"use strict";
					/* <![CDATA[ */
					var fieldID   = <?php echo json_encode( '#' . $this->get_field_id('add_field')); ?>;
					var fieldname = <?php echo json_encode($this->get_field_name('sueva_counters')); ?>;
					var fieldnum  = <?php echo json_encode($counter-1 ) ?>;
					/* ]]> */

					var count = fieldnum;

					$(fieldID).click(function() {

                        $(this).prev('.counter-wrapper').append("<div class='counter-box'><p><label>Title</label></p><p><input type='text' name='"+fieldname+"["+(count+1)+"][counter_title]' value='' class='widefat sourc"+(count+1)+"'></p><p><label>Count</label></p><p><input type='text' name='"+fieldname+"["+(count+1)+"][counter_count]' value='' class='widefat sourc"+(count+1)+"'></p><p><span class='button suevafree_ek_delete_counter'>Delete</span></p></div>");

                        count++;

                    });

                    $(".suevafree_ek_delete_counter").on('click', function() {
                        $(this).parent().parent('.counter-box').remove();
                    });

                });

            </script>

        <?php

    }

    public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_size'] = strip_tags( $new_instance['title_size'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['description_size'] = strip_tags( $new_instance['description_size'] );
		$instance['color'] = strip_tags( $new_instance['color'] );
		$instance['layout'] = strip_tags( $new_instance['layout'] );
		$instance['columns'] = strip_tags( $new_instance['columns'] );
		$instance['background_image'] = strip_tags( $new_instance['background_image'] );
		$instance['background_color'] = strip_tags( $new_instance['background_color'] );

        $instance['sueva_counters'] = array();

        if ( isset( $new_instance['sueva_counters'] ) ) {

		    foreach ( $new_instance['sueva_counters'] as $counter )  {

				$instance['sueva_counters'][] = $counter;

		    }

		} else {

			$instance['sueva_counters'][] = array();

		}

        return $instance;

    }

	public function widget( $args, $instance ) {

		extract( $args );

		$allowed = array(

			'div' => array(
				'id' => array(),
				'class' => array(),
			),
			'article' => array(
				'id' => array(),
				'class' => array(),
			),
			'h4' => array(
				'class' => array(),
			)

		);

		echo wp_kses($before_widget, $allowed);

		$title = apply_filters( 'widget_title', $instance['title'] );

		?>

		<style scoped>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget {
				background-color: <?php echo esc_attr($instance['background_color']); ?>;
				<?php if ( $instance['background_image']) : ?>
					background-image:url(<?php echo esc_attr($instance['background_image']); ?>);
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					background-attachment: fixed;
				<?php endif; ?>
			}
			<?php if ( $instance['title_size']) : ?>

				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget h4 {
					font-size:<?php echo esc_attr($instance['title_size']); ?>;
				}

			<?php endif; ?>

			<?php if ( $instance['description_size']) : ?>

				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .subtitle {
					font-size:<?php echo esc_attr($instance['description_size']); ?>;
				}

			<?php endif; ?>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget h4 ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .subtitle ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .suevafree-counter ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .suevafree-counter .count {
				color: <?php echo esc_attr($instance['color']); ?>;
			}

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .suevafree-counter {
				border-color: <?php echo esc_attr($instance['color']); ?>;
			}

			<?php if ( $title ) : ?>

				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget h4 {
					margin-bottom:100px;
				}

				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .subtitle {
					margin-top:-95px;
				}

			<?php endif; ?>

			<?php if ( $instance['description']) : ?>

				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-counter-widget .subtitle {
					margin-bottom:100px;
				}

			<?php endif; ?>

        </style>

        <section class="suevafree-counter-widget">

        	<div class="container">

            	<div class="row">

            		<?php

            			if ( $title )
							echo '<h4>' . esc_attr($title) . '</h4>' ;

            			if ( $instance['description'] )
							echo '<div class="subtitle">' . esc_attr($instance['description']) . '</div>' ;

            			if ( $instance['sueva_counters'] ) :

            				foreach ( $instance['sueva_counters'] as $item ) {

								echo '<div data-scroll-reveal="enter bottom move 50px, after 0.9s" class="suevafree-counter-item ' . esc_attr($instance['columns']) . '"> ' . do_shortcode('[counter layout="' . esc_attr($instance['layout']) . '" title="'.$item['counter_title'].'" count="'.$item['counter_count'].'"]') . '</div>';

            				}

            			endif;

            		?>

                </div>

			</div>

        </section>

        <?php

		echo wp_kses($after_widget, $allowed);

	}

}

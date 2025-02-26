<?php
defined( 'ABSPATH' ) or die();
error_reporting(E_ALL & ~E_NOTICE);

class WL_AGM_LITE_MAP_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array(
			'classname'   => 'WL_AGM_LITE_MAP_Widget',
			'description' => esc_html__( 'Google Map Widget to dispay Advance Maps', WL_AGM_LITE_DOMAIN ),
		);
		parent::__construct( 'WL_AGM_LITE_MAP_Widget', esc_html__( 'IS-Google Maps Lite Widget', WL_AGM_LITE_DOMAIN ), $widget_options );
	}

	public function widget( $args, $instance ) {
		$title  = apply_filters( 'widget_title', $instance['title'] );
		$map_id = apply_filters( 'widget_map_id', $instance['map_id'] );

		$title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$map_id = apply_filters( 'map_id', $map_id, $instance, $this->id_base );

		echo wp_kses_post($args['before_widget']);
		if ( ! empty( $title ) )
		echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']); 

		$p_type = get_post_type( $map_id );
		if ( ! empty ( $p_type ) && $p_type == 'wl_agm_locations' ) {
			echo do_shortcode( '[WL_AGM_LOCATION id=' . $map_id . ']' );
		} elseif ( ! empty ( $p_type ) && $p_type == 'wl_agm_maps' ) {
			echo do_shortcode( '[WL_AGM_Map id=' . $map_id . ']' );
		} elseif ( ! empty ( $p_type ) && $p_type == 'wl_agm_routes' ) {
			echo do_shortcode( '[WL_AGM_Route id=' . $map_id . ']' );
		} elseif ( ! empty ( $p_type ) && $p_type == 'wl_agm_inter_maps' ) {
			echo do_shortcode( '[WL_AGM_I_Map id=' . $map_id . ']' );
		}
		echo wp_kses_post($args['after_widget']);
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )  && isset( $instance[ 'map_id' ] ) ) {
		$title = $instance[ 'title' ];
		$map_id = $instance[ 'map_id' ];	
		}
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', WL_AGM_LITE_DOMAIN ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'map_id' ) ); ?>"><?php esc_html_e( 'Select Map:', WL_AGM_LITE_DOMAIN ); ?></label>
            <select class="widefat wl_agm_google_map_widget_id" id="<?php echo esc_attr( $this->get_field_id( 'map_id' ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( 'map_id' ) ); ?>">
                <option value=""><?php esc_html_e( '---- Select ----', WL_AGM_LITE_DOMAIN ); ?></option>
				<?php $post_type = array( "Single Location"   => 'wl_agm_locations',
				                          "Multi Location"    => 'wl_agm_maps',
				                          "Rout Maps"         => 'wl_agm_routes',
				                          "Interactive Map's" => 'wl_agm_inter_maps'
				);
				foreach ( $post_type as $key => $type ) {
					$args      = array( 'post_type' => $type );
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) { ?>
                        <optgroup label="<?php echo esc_attr( $key ); ?>">
							<?php while ( $the_query->have_posts() ): $the_query->the_post();
								if ( ! empty ( get_the_title() ) ) { ?>
                                    <option value="<?php echo esc_attr( get_the_ID() ); ?>" <?php selected( $map_id, get_the_ID() ); ?>><?php echo esc_html( get_the_title() ); ?></option>
								<?php } endwhile;
							wp_reset_postdata(); ?>
                        </optgroup>
					<?php } ?>
                    </optgroup>
				<?php } ?>
            </select>
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
	    $new_instance = wp_parse_args(
	    $new_instance, array(
                'title'  => '',
                'map_id' => '',
                'text'   => '',
                'filter' => false, // For back-compat.
                'visual' => null, // Must be explicitly defined.
                )
	        );
	    $instance = $old_instance;
	    $instance['title'] = sanitize_text_field( $new_instance['title'] );
	    $instance['map_id'] = sanitize_text_field( $new_instance['map_id'] );
	    if ( current_user_can( 'unfiltered_html' ) ) {
	        $instance['text'] = $new_instance['text'];
	    } else {
	        $instance['text'] = wp_kses_post( $new_instance['text'] );
	    }

	    $instance['filter'] = ! empty( $new_instance['filter'] );

	    // Upgrade 4.8.0 format.
	    if ( isset( $old_instance['filter'] ) && 'content' === $old_instance['filter'] ) {
	            $instance['visual'] = true;
	    }
	    if ( 'content' === $new_instance['filter'] ) {
	            $instance['visual'] = true;
	    }

	    if ( isset( $new_instance['visual'] ) ) {
	            $instance['visual'] = ! empty( $new_instance['visual'] );
	    }

	    // Filter is always true in visual mode.
	    if ( ! empty( $instance['visual'] ) ) {
	            $instance['filter'] = true;
	    }
	    return $instance;
	}
}
?>
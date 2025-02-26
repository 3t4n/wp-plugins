<?php
defined( 'ABSPATH' ) or exit;

class CVMH_Slideshow_Widget extends WP_Widget {

    //register our widget
    public static function register() {
        register_widget( __CLASS__ );
    }
    
    public function __construct() {
        $widget_ops = array(
            'classname' => 'cvmh-simple-slideshow', 
            'description' => __( 'A slideshow, simply', 'cvmh-simple-slideshow' ),
        );
        parent::__construct( 'cvmh_slideshow_widget', __( 'Simple Slideshow', 'cvmh-simple-slideshow' ), $widget_ops );
    }

    public function flush_widget_cache() {
        wp_cache_delete('cvmh_slideshow_widget', 'widget');
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['categories'] = json_encode( $new_instance['categories'] );
        $this->flush_widget_cache();

        return $instance;
    }
    
    public function form( $instance ) {
        $options = json_decode( get_option( CVMH_SLIDESHOW_SLUG ), true );
        if ( $options['categories'] ) :
            $categories = json_decode( $instance['categories'], true );
            ?>
            <p>
                <strong><?php _e( 'Categories', 'cvmh-simple-slideshow' ); ?></strong> <?php _e( '(leave empty to take all categories)', 'cvmh-simple-slideshow' ); ?><br />
                <?php $terms = get_terms( CVMH_SLIDESHOW_SLUG . '_category', array( 'hide_empty' => false ) ); ?>
                <?php foreach( $terms as $term ) : ?>
                    <label for="<?php echo $term->slug; ?>">
                        <input id="<?php echo $this->get_field_id( $term->slug ); ?>" name="<?php echo $this->get_field_name( 'categories' ); ?>[]" type="checkbox" value="<?php echo $term->slug; ?>" <?php echo ( in_array( $term->slug, $categories ) ) ? ' checked="checked"' : ''; ?> /><?php echo $term->name; ?>
                    </label><br />
                <?php endforeach; ?>

            </p>
            <?php
        endif;
    }

    function widget( $args, $instance ) {
        extract( $args );
        
        $categories = json_decode( $instance['categories'] );

        echo $before_widget;
        echo cvmh_slideshow_front_render( array( 'categories' => implode( ',', $categories ) ) );
        echo $after_widget;
    }
    
}

add_action( 'widgets_init', array( 'CVMH_Slideshow_Widget', 'register' ) );
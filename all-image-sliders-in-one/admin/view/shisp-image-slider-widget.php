<?php 

class SHISP_Slider_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'shisp_img_slider_widget',
            __('Slider','shisp-images-slider'),
            array(
                'classname'     => 'shisp-img-slider-widget',
                'description'   => __('Show Slider From Sliders','shisp-images-slider'),
            )
        );
    }

    public function form( $instance ) {

        $title = (!isset($instance['title']) || $instance['title'] == '') ? __('Slider','shisp-images-slider') : esc_attr($instance['title']);
        $slider_id = (!isset($instance['slider_id']) || $instance['slider_id'] == 0) ? 'no-slider' : intval($instance['slider_id']);
    ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title','shisp-images-slider'); ?></label><br>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('slider_id'); ?>"><?php _e('Select Slider Title','shisp-images-slider'); ?></label><br>
            <select name="<?php echo $this->get_field_name('slider_id'); ?>" id="<?php echo $this->get_field_id('slider_id'); ?>">
                <option value="0" <?php selected( $slider_id,'no-slider' ); ?>><?php _e('Select','shisp-images-slider'); ?></option>

                <?php
                    $slider_args = array(
                        'post_type'         => 'shisp-image-slider',
                        'posts_per_page'    => -1
                    );
                    $the_query = new WP_Query($slider_args);

                    if ( $the_query->have_posts() ){
                        while ( $the_query->have_posts() ){
                            $the_query->the_post(); ?>

                                <option value="<?php the_ID(); ?>" <?php selected($slider_id, get_the_ID());?>><?php the_title(); ?></option>

                <?php }
                    }
                wp_reset_query();
                ?>
            </select>
        </p>

    <?php
    }

    public function update( $new_instance, $old_instanse ) {

        $instance = $old_instanse;
        $instance['title']      = esc_attr( $new_instance['title'] );
        $instance['slider_id']  = intval( $new_instance['slider_id'] );
        return $instance;

    }

    public function widget( $args,$instance ) {

        extract($args);

        $title = (!isset($instance['title']) || $instance['title'] == '') ? __('Slider','shisp-images-slider') : esc_attr($instance['title']);
        $slider_id = (!isset($instance['slider_id']) || $instance['slider_id'] == 0) ? 'no-slider' : intval($instance['slider_id']);
        $shisp_uid = 'shisp-slider-'.uniqid() ;
        $widget_slider_setting = get_post_meta( $slider_id, 'shisp-slider-postmeta', true );
        $widget_suffix = build_query( $widget_slider_setting );

        wp_enqueue_script( 'shisp-slider-billboard-'.$shisp_uid, SHISP_JS.'shisp-slider-billboard.php?slideruid='.$shisp_uid.'&'.$widget_suffix, array('shisp-billboard-script'), '1.0.0', true );

        echo $before_widget.$before_title.esc_html( $title ).$after_title;

            $widget_slides = get_post_meta( $slider_id, 'shisp_sliders_meta', true );
            if ( is_array($widget_slides) ) { ?>
        
                <div class="d-flex justify-content-center">
                    <div class="shisp-image-slider-in-widget" id="<?php echo $shisp_uid; ?>">
                        <ul>
            
                <?php foreach ( $widget_slides as $slide ) { ?>
            
                    <li title="<?php echo esc_attr($slide['caption']); ?>"><a target="_blank" href="<?php echo esc_url($slide['url']); ?>"><img src="<?php echo esc_url($slide['image']); ?>"></a></li>
                        
                <?php } ?>
            
                        </ul>
                    </div>
                </div>
            <?php }

        echo $after_widget;

    }

}

add_action('widgets_init',function(){
    register_widget('SHISP_Slider_widget');
});
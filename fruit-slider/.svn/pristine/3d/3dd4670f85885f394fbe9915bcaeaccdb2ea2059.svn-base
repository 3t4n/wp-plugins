<?php

class fruit_slider_main_view {

    function __construct() {
        add_shortcode('fruitslider', array($this, 'fruit_slider_output'));
        add_action('wp_enqueue_scripts', array($this, 'slider_front_enqueues'));
        add_action('after_setup_theme', array($this, 'add_new_image_size'));
    }

    function slider_front_enqueues() {
        wp_enqueue_script('jquery-ui-core');

        wp_enqueue_script('fruit_slider', FRUIT_SLIDER_URL . '/view/js/jquery.cSlider.js', array('jquery'));
        wp_enqueue_script('fruit_slider_modernizr', FRUIT_SLIDER_URL . '/view/js/modernizr.js', array('jquery'));
        wp_enqueue_script('fruit_slider_touch', FRUIT_SLIDER_URL . '/view/js/jquery.touchSwipe.js', array('jquery'));
        wp_enqueue_script('fruit_slider-js', FRUIT_SLIDER_URL . '/view/js/view.js', array('jquery'));

        wp_enqueue_style('animate_css', FRUIT_SLIDER_URL . '/admin/includes/assets/css/animate.css');
        wp_enqueue_style('default_css', FRUIT_SLIDER_URL . '/view/css/style.css');
        wp_enqueue_style('change_auto_css', FRUIT_SLIDER_URL . '/view/css/color.php');
    }

    function fruit_slider_output($params, $content = null) {

        $gallery_id = !empty($params['gallery_id']) ? $params['gallery_id'] : '';
        global $wpdb;
        $table = $wpdb->prefix . "add_fruitslider_layer";
        $table1 = $wpdb->prefix . "add_fruitslider";
        $sliders = $wpdb->get_results('SELECT * FROM ' . $table1 . ' LEFT JOIN ' . $table . ' ON ' . $table1 . '.ID = ' . $table . '.image_id');
        ?>	 
        <div class="fruitslider" id="fruitslider">	
            <div id="fruit-slider" class="fruit-slider">           
                <?php
                $count = 0;
                foreach ($sliders as $slider) {
                    $gallery = unserialize($slider->gallery);
                    $count_gallery = sizeof(unserialize($slider->gallery));
                    for ($i = 0; $i < $count_gallery; $i++) {
                        $galleryid = $gallery[$i];

                        $get_id = (!empty($slider->image_id)) ? ' WHERE ID = ' . $slider->image_id : '';
                        $table = $wpdb->prefix . "add_fruitslider";
                        $slider_id = $wpdb->get_results('SELECT attachment_id FROM ' . $table . ' ' . $get_id);
                        $attachment_id = (!empty($slider->image_id)) ? $slider_id[0]->attachment_id : $slider->attachment_id;
                        $image_src = wp_get_attachment_image_src($attachment_id, 'full');
                        $thumb_images = wp_get_attachment_image_src($attachment_id);
                        $count++;

                        if ($gallery_id == $galleryid) {
                            ?>
                            <div class="fruit-slide" data-animate-in="<?php echo (!empty($slider->sliderimage_inanimation)) ? $slider->sliderimage_inanimation : 'fadeInUp'; ?>" 
                                 data-animate-out="<?php echo (!empty($slider->sliderimage_outanimation)) ? $slider->sliderimage_outanimation : 'fadeOutUp'; ?>" >
                    <?php if (!empty($slider->slider_title) || !empty($slider->slider_content) || !empty($slider->slider_link)) { ?> 				                 
                                    <div class="fruit-foreground">
                                        <div class="container fruit-content">								
                                            <div class="fruit-data" data-animate-in="<?php echo $slider->slider_animation; ?>" data-animate-out="<?php echo $slider->slider_animation_out; ?>" >
                                                    <?php if (!empty($slider->slider_title)) { ?>
                                                    <div class="heading" style="color: <?php echo $slider->slider_titlecolor; ?>; top:<?php echo $slider->slider_title_top; ?>px; left:<?php echo $slider->slider_title_left; ?>px">
                                                    <?php echo $slider->slider_title; ?>
                                                    </div>
                                                <?php } ?>
                                                    <?php if (!empty($slider->slider_content)) { ?>
                                                    <div class="subheading text-white" style="color: <?php echo $slider->slider_contentcolor; ?>; top:<?php echo $slider->slider_content_top; ?>px; left:<?php echo $slider->slider_content_left; ?>px">
                                                    <?php echo $slider->slider_content; ?>
                                                    </div>
                                                <?php } ?>
                        <?php if (!empty($slider->slider_link)) {
                            $url = unserialize($slider->slider_url); ?>
                                                    <div class="slider_link" style="top:<?php echo $slider->slider_link_top; ?>px; left:<?php echo $slider->slider_link_left; ?>px">
                                                        <a class="btn btn-primary" href="<?php echo (!empty($url['url'])) ? esc_url($url['url']) : ' '; ?>"   target="<?php echo ($url['target'] == 'on') ? '_blank' : ''; ?>"><?php echo $slider->slider_link; ?></a>
                                                    </div>
                        <?php } ?>
                                            </div>							
                                        </div>
                                    </div>
                    <?php } ?>
                                <div class="fruit-background">
                                    <img src= "<?php echo esc_url($image_src[0]); ?> " width="<?php echo $image_src[1]; ?>" height= "<?php echo $image_src[2]; ?>"  class="img-responsive" alt="<?php _e('imgid', FRUIT_SLIDER_SLUG);
                    echo (!empty($slider->image_id)) ? $slider->image_id : $attachment_id; ?>"  data-thumbnail = "<?php echo esc_url($thumb_images[0]); ?>" />
                                </div>

                            </div>
                            <?php
                        }
                    }
                }
                ?>
        <?php if ($count != '0') { ?>
                    <nav class="fruit-arrows">
                        <span class="fruit-arrows-prev"></span>
                        <span class="fruit-arrows-next"></span>
                    </nav>
        <?php } ?>
            </div>
            <div class="fruit-thumbnails text-center">
                <ul class="thumbnail-image"></ul>
            </div> 
        </div> 
        <?php
    }

}

add_action('init', 'fruit_slider_main_view');

function fruit_slider_main_view() {
    global $fruit_slider_main_view;
    $fruit_slider_main_view = new fruit_slider_main_view();
}
?>
	

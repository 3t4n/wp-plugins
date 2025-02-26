<?php 

// Admin Styles
function shisp_admin_styles($hook){

    wp_register_script( 'lightboxme', SHISP_JS.'jquery.lightbox_me.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'shisp-slides-metabox', SHISP_JS.'shisp-slides-metabox.js', array('jquery','lightboxme','media-upload','thickbox'), '1.0.0', true );
    wp_localize_script( 'shisp-slides-metabox', 'shisp_data', array(
        'tb_title'      => __('Select Image','shisp-images-slider'),
        'insert'        => __('Insert','shisp-images-slider'),
        'edit'          => __('Edit','shisp-images-slider'),
        'no_image'      => SHISP_NO_IMG,
        'no_image_alert'=> __('Image field can not be empty!','shisp-images-slider'),
    ) );
    wp_enqueue_style( 'shisp-admin-slides-styles', SHISP_CSS.'shisp-slides-metabox.css', array('thickbox'), '1.0.0' );
}

function shisp_save_sliders( $post_id ) {

    if ( !isset($_POST['shisp-slider-images']) ) {
        return;
    }

    if ( !current_user_can( 'edit_posts' ) ) {
        return;
    }

    for ( $i =0; $i < count($_POST['shisp-slider-images']); $i++ ) {
        $shisp_slide_items[$i]['image'] = esc_url_raw( $_POST['shisp-slider-images'][$i] );
        $shisp_slide_items[$i]['caption'] = esc_attr( $_POST['shisp-slider-captions'][$i] );
        $shisp_slide_items[$i]['url'] = esc_url_raw( $_POST['shisp-slider-urls'][$i] );
    }

    $shisp_default_slider_setting = array(
        'ease'              => 'easeInOutExpo',
        'speed'             => '1000',
        'duration'          => '5000',
        'autoplay'          => 'true',
        'transition'        => 'up',
        'navtype'           => 'controls',
        'includefooter'     => 'false'
    );
    $shisp_slider_easingList = array(
        'easeInBack',
        'easeInBounce',
        'easeInCirc',
        'easeInCubic',
        'easeInElastic',
        'easeInExpo',
        'easeInOutBack',
        'easeInOutBounce',
        'easeInOutCirc',
        'easeInOutCubic',
        'easeInOutElastic',
        'easeInOutExpo',
        'easeInOutQuad',
        'easeInOutQuart',
        'easeInOutQuint',
        'easeInOutSine',
        'easeInQuad',
        'easeInQuart',
        'easeInQuint',
        'easeInSine',
        'easeOutBack',
        'easeOutBounce',
        'easeOutCirc',
        'easeOutCubic',
        'easeOutElastic',
        'easeOutExpo',
        'easeOutQuad',
        'easeOutQuart',
        'easeOutQuint',
        'easeOutSine',
        'linear',
        'swing',
    );
    $shisp_slider_setting_array = array(
        'ease'              => in_array($_POST['shisp-slider-easing'],$shisp_slider_easingList) ? sanitize_text_field( $_POST['shisp-slider-easing'] ) : $shisp_default_slider_setting['ease'],
        'speed'             => intval( $_POST['shisp-slider-speed'] ) > 0 ? intval( $_POST['shisp-slider-speed'] ) : $shisp_default_slider_setting['speed'],
        'duration'          => intval( $_POST['shisp-slider-duration'] ) > 0 ? intval( $_POST['shisp-slider-duration'] ) : $shisp_default_slider_setting['duration'],
        'autoplay'          => ($_POST['shisp-slider-autoplay'] == 1) ? intval($_POST['shisp-slider-autoplay']) : 0,
        'transition'        => in_array($_POST['shisp-slider-transition'],array('up', 'down','left', 'right','fade')) ? sanitize_text_field( $_POST['shisp-slider-transition'] ) : $shisp_default_slider_setting['transition'],
        'navtype'           => in_array($_POST['shisp-slider-navtype'],array('list', 'controls','both', 'none')) ? sanitize_text_field( $_POST['shisp-slider-navtype'] ) : $shisp_default_slider_setting['navtype'],
        'includefooter'     => ($_POST['shisp-slider-includefooter'] == 1) ? intval( $_POST['shisp-slider-includefooter'] ) : 0
    );

    update_post_meta( $post_id, 'shisp_sliders_meta', $shisp_slide_items );
    update_post_meta( $post_id, 'shisp-slider-postmeta', $shisp_slider_setting_array );
}

function shisp_add_shortcode_column( $columns ) {
    $columns['shortcode_columns'] = __('Shortcode','shisp-images-slider');
    return $columns;
}

function shisp_custom_shortcode_column( $column , $post_id ) {
    if ( $column == 'shortcode_columns' ) {
        $post = get_post($post_id);
        $shisp_global_title = $post->post_title;
        echo '[shispglobal title='.$shisp_global_title.']';
    }
}

function shisp_no_image_slider() { ?>

    <div id="shisp-no-img-slider-<?php echo uniqid(); ?>">
        <ul>
            <li class="shisp-no-img">
                <a href="#"><img src="<?php echo SHISP_NO_IMG; ?>" ></a>
            </li>
        </ul>
    </div>

<?php }

function shisp_add_slider_shortcode( $attr ) {

    $shisp_atts = shortcode_atts( array(
        'cat' => ''
    ), $attr,'shispspecialslider');

    $post = get_page_by_title( $shisp_atts['cat'], OBJECT, 'shisp-image-slider' );
    $id = $post->ID;
    $shisp_slides = get_post_meta( $id, 'shisp_sliders_meta', true );
    $shisp_slider_setting = get_post_meta( $id, 'shisp-slider-postmeta', true );

    $shisp_cat_uid = 'shisp-cat-slider-'.uniqid();
    $suffix = build_query( $shisp_slider_setting );

    wp_enqueue_script( 'shisp-slider-billboard-'.$shisp_cat_uid, SHISP_JS.'shisp-slider-billboard.php?slideruid='.$shisp_cat_uid.'&'.$suffix, array('shisp-billboard-script'), '1.0.0', true );

    if (is_array($shisp_slides)) {
       wp_enqueue_style( 'shisp-slider-style', SHISP_CSS.'shisp-slider-style.css', array('shisp-billboard-style'), '1.0.0' );
    }

    if ( is_array($shisp_slides) ) { ?>

    <!-- <div class="container"> -->
        <div class="shisp-image-slider-in-cat" id="<?php echo $shisp_cat_uid; ?>">
            <ul>

    <?php foreach ( $shisp_slides as $slide ) { ?>

        <li title="<?php echo esc_attr($slide['caption']); ?>"><a target="_blank" href="<?php echo esc_url($slide['url']); ?>"><img src="<?php echo esc_url($slide['image']); ?>"></a></li>
             
    <?php } ?>

            </ul>
        </div>
    <!-- </div> -->
    <?php }
}

function shisp_add_advertising_callback( $attr ){

    $shisp_advertising_atts = shortcode_atts( array(
        'title' => ''
    ), $attr,'shispadvertising');
 
    $shisp_advertising_post = get_page_by_title( $shisp_advertising_atts['title'], OBJECT, 'shisp-image-slider' );
    $shisp_advertising_id = $shisp_advertising_post->ID;

    $shisp_advertising_slides = get_post_meta( $shisp_advertising_id, 'shisp_sliders_meta', true );
    $shisp_advertising_slider_setting = get_post_meta( $shisp_advertising_id, 'shisp-slider-postmeta', true );

    $shisp_advertising_cat_uid = 'shisp-advertising-slider-'.uniqid();
    $shisp_advertising_suffix = build_query( $shisp_advertising_slider_setting );

    wp_enqueue_script( 'shisp-slider-billboard-'.$shisp_advertising_cat_uid, SHISP_JS.'shisp-slider-billboard.php?slideruid='.$shisp_advertising_cat_uid.'&'.$shisp_advertising_suffix, array('shisp-billboard-script'), '1.0.0', true );

    if (is_array($shisp_advertising_slides)) {
        wp_enqueue_style( 'shisp-slider-style', SHISP_CSS.'shisp-slider-style.css', array('shisp-billboard-style'), '1.0.0' );
    }

    if ( is_array($shisp_advertising_slides) ) { ?>

        <div class="shisp-image-slider-in-advertising" id="<?php echo $shisp_advertising_cat_uid; ?>">
            <span id="shisp-img-slider-in-advertising" title="بستن">×</span>
            <ul>

    <?php foreach ( $shisp_advertising_slides as $slide ) { ?>

        <li title="<?php echo esc_attr($slide['caption']); ?>"><a target="_blank" href="<?php echo esc_url($slide['url']); ?>"><img src="<?php echo esc_url($slide['image']); ?>"></a></li>
             
    <?php } ?>

            </ul>
        </div>
        <script type="text/javascript">
            var shispImgSliderSpan = document.getElementById("shisp-img-slider-in-advertising");
            shispImgSliderSpan.onclick = function(event){
                this.parentElement.remove();
                event.stopPropagation();
            };
        </script>
    <?php }
}

function shisp_add_global_sliders_shortcode( $global_attr ) {

    $shisp_global_atts = shortcode_atts( array(
        'title' => ''
    ), $global_attr,'shispglobal');
 
    $shisp_global_post = get_page_by_title( $shisp_global_atts['title'], OBJECT, 'shisp-image-slider' );
    $shisp_global_id = $shisp_global_post->ID;

    $shisp_global_slides = get_post_meta( $shisp_global_id, 'shisp_sliders_meta', true );
    $shisp_global_slider_setting = get_post_meta( $shisp_global_id, 'shisp-slider-postmeta', true );

    $shisp_global_cat_uid = 'shisp-global-slider-'.uniqid();
    $shisp_global_suffix = build_query( $shisp_global_slider_setting );

    wp_enqueue_script( 'shisp-global-slider-billboard-'.$shisp_global_cat_uid, SHISP_JS.'shisp-slider-billboard.php?slideruid='.$shisp_global_cat_uid.'&'.$shisp_global_suffix, array('shisp-billboard-script'), '1.0.0', true );

    if (is_array($shisp_global_slides)) {
        wp_enqueue_style( 'shisp-global-slider-style', SHISP_CSS.'shisp-global-slider-style.css', array('shisp-billboard-style'), '1.0.0' );
    }

    if ( is_array($shisp_global_slides) ) { ?>

        <div class="shisp-image-slider-in-global" id="<?php echo $shisp_global_cat_uid; ?>">
            <ul>

    <?php foreach ( $shisp_global_slides as $slide ) { ?>

        <li title="<?php echo esc_attr($slide['caption']); ?>"><a target="_blank" href="<?php echo esc_url($slide['url']); ?>"><img src="<?php echo esc_url($slide['image']); ?>"></a></li>
             
    <?php } ?>

            </ul>
        </div>
<?php }
}

function shisp_show_slider_in_cat() {

    $shisp_term = get_queried_object();
    $shisp_cat_slug = $shisp_term->slug;
   do_shortcode( '[shispspecialslider cat='.$shisp_cat_slug.']' );
}

function shisp_add_advertising_box() {
    do_shortcode( "[shispadvertising title='newbox']" );
}
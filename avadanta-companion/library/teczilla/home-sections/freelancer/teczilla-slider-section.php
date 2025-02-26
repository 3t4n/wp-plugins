<?php
/**
 * Slider Section
 */
if ( ! function_exists( 'avata_avadanta_slider' ) ) :  


    function avata_avadanta_slider() {

        $avadanta_slider_options = get_theme_mod('avadanta_slider_content',avata_avadanta_get_slider_default());
        $home_slider_section_enabled = get_theme_mod('home_slider_section_enabled','on');
        $avadanta_slider_opacity_section = get_theme_mod('avadanta_slider_opacity_section','0.15');
        $count=1;
        if($home_slider_section_enabled !='off')
     {  
        ?>

<div class="carousel-inner">
    <div  class="home-slider">
        <div class="container">
            <div   id="teczilla_slider_section">
                 <div class="tec-carousel owl-carousel dot-style1" data-loop="false" data-items="1" data-margin="30" data-autoplay="false" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-lg-device="1" data-md-device-nav="false" data-md-device-dots="true">

                    <?php $avadanta_slider_options = json_decode($avadanta_slider_options);
                    if( $avadanta_slider_options!='' )
                    {
                    foreach($avadanta_slider_options as $slider_item){
                    $title    = ! empty( $slider_item->title ) ? apply_filters( 'avadanta_translate_single_string', $slider_item->title, 'slider section' ) : '';
                    $text    = ! empty( $slider_item->text ) ? apply_filters( 'avadanta_translate_single_string', $slider_item->text, 'slider section' ) : '';
                    $image    = ! empty( $slider_item->image_url ) ? apply_filters( 'avadanta_translate_single_string', $slider_item->image_url, 'slider section' ) : '';
                    $button     = ! empty( $slider_item->button_text ) ? apply_filters( 'avadanta_translate_single_string', $slider_item->button_text, 'slider section' ) : '';
                    $link     = ! empty( $slider_item->link ) ? apply_filters( 'avadanta_translate_single_string', $slider_item->link, 'slider section' ) : '';


                     ?>
                     <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="slider-caption d-md-block">
                                <div class="slider-description">
                                    <h3><?php echo esc_html($title); ?></h3>
                                    <h1 class="slider-title"><?php echo esc_html($text); ?></h1>
                                </div>
                                <?php if($button!=="") { ?>
                                    <div class="slider-bottom">
                                        <ul>
                                         <li>
                                            <a href="<?php echo esc_url($link); ?>" class="slider-btn banner-style"><?php echo esc_html($button); ?></a>
                                         </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="<?php echo esc_url($image); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div> 
                <?php
                        $count++;
                    } } ?>
                 
                 </div>       
            </div>
        </div>
    </div>
</div>

<?php }

        else 
{
?>


<?php
}
         } 

endif;

if ( function_exists( 'avata_avadanta_slider' ) ) {
    $section_priority = apply_filters( 'avadanta_section_priority',  'avata_avadanta_slider' );
    add_action( 'avata_avadanta_sections', 'avata_avadanta_slider', absint( $section_priority ) );
}
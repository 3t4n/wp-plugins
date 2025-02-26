<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function mega_register_slider_block() {
    // Register the block editor script.
    wp_register_script(
        'mega-slider-block-editor',
        plugins_url( 'block-mega-slider.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ), // Block editor dependencies.
        filemtime( plugin_dir_path( __FILE__ ) . 'block-mega-slider.js' )  // Cache busting based on file modification time.
    );

    // Register the block editor styles.
    wp_register_style(
        'mega-slider-block-editor-style',
        plugins_url( 'editor-style.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'editor-style.css' )
    );

    // Register front-end and editor styles.
    wp_register_style(
        'mega-slider-block-style',
        plugins_url( 'style.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
    );

    // Enqueue Slick Slider scripts and styles for the front-end.
    wp_enqueue_script( 
        'slick-slider', 
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', 
        array( 'jquery' ), 
        '1.8.1', 
        true 
    );
    wp_enqueue_style( 
        'slick-slider-style', 
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css' 
    );

    // Enqueue FontAwesome for social icons and arrows.
    wp_enqueue_style( 
        'fontawesome', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' 
    );

    // Enqueue Bootstrap 4 for layout and design.
    wp_enqueue_style( 
        'bootstrap-4', 
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' 
    );

    // Enqueue Particles.js for particle backgrounds.
    wp_enqueue_script(
        'particles-js',
        'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js',
        array(),
        null,
        true
    );

	function enqueue_animate_css() {
    wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_animate_css' );


    // Register the block type with attributes.
    register_block_type( 'mega/slider-block', array(
        'editor_script'   => 'mega-slider-block-editor',
        'editor_style'    => 'mega-slider-block-editor-style',
        'style'           => 'mega-slider-block-style',
        'attributes'      => array(
            'slides' => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'subhead'               => 'Revolution in block slider',
                        'heading'               => 'Mega Gutenberg Slider 2024',
                        'content'               => 'Lorem ipsum is simply dummy text of the printing and typesetting industry.',
                        'buttonText'            => 'Read More',
                        'buttonUrl'             => '#iwd',
                        'buttonBackgroundColor' => '#ffffff',
                        'buttonFontColor'       => '#ffffff',
                        'buttonBorderRadius'    => 4,
                        'buttonBorderColor'     => '#ffc000',
                        'buttonBorderSize'      => 2,
                        'backgroundImage'       => '',
                        'backgroundColor'       => '#000000',
                        'backgroundRepeat'      => 'no-repeat',
                        'backgroundSize'        => 'cover',
                        'backgroundPosition'    => 'center',
                        'backgroundAttachment'  => 'scroll',
                        'customVideoUrl'        => '',
                        'youtubeVideoUrl'       => '', // Added YouTube video attribute
                        'leftColumnImage'       => '',
                        'leftColumnImageWidth'  => '100%',
                        'leftColumnImageHeight' => 'auto',
                        'leftColumnImageBorderRadius' => 0,
                        'leftColumnImagePosition'     => 'center',
                        'leftColumnImageFit'          => 'cover',
                        'leftColumnImagePadding'      => array( 'top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0 ),
                        'isSwitchedLayout'            => false,
                        'subheadFontFamily'     => 'Roboto',
                        'subheadFontSize'       => 18,
                        'subheadFontColor'      => '#ffffff',
                        'subheadFontWeight'     => '400',
                        'headingFontFamily'     => 'Roboto',
                        'headingFontSize'       => 32,
                        'headingFontColor'      => '#ffffff',
                        'headingFontWeight'     => '700',
                        'contentFontFamily'     => 'Roboto',
                        'contentFontSize'       => 16,
                        'contentFontColor'      => '#ffffff',
                        'contentFontWeight'     => '400',
						'animation' => array(
    'type' => 'string',
    'default' => 'fadeIn', // Default value
),
                    )
                ),
            ),
            'padding'         => array( 'type' => 'object', 'default' => array( 'top' => 20, 'right' => 20, 'bottom' => 20, 'left' => 20 ) ),
            'margin'          => array( 'type' => 'object', 'default' => array( 'top' => 0, 'right' => 0, 'bottom' => 0, 'left' => 0 ) ),
            'borderRadius'    => array( 'type' => 'object', 'default' => array( 'topLeft' => 0, 'topRight' => 0, 'bottomRight' => 0, 'bottomLeft' => 0 ) ),
            'minHeight'       => array( 'type' => 'number', 'default' => 300 ),
            'maxHeight'       => array( 'type' => 'number', 'default' => 600 ),
            'showArrows'      => array( 'type' => 'boolean', 'default' => true ),
            'showDots'        => array( 'type' => 'boolean', 'default' => true ),
            'slidesToShow'    => array( 'type' => 'number', 'default' => 1 ),
            'dotAlignment'    => array( 'type' => 'string', 'default' => 'center' ),
            'layoutStyle'     => array( 'type' => 'string', 'default' => 'full-width' ),
            'verticalAlignment' => array( 'type' => 'string', 'default' => 'center' ),
            'socialIcons'     => array( 'type' => 'array', 'default' => array() ),
            'iconPosition'    => array( 'type' => 'string', 'default' => 'vertical-middle-right' ),
            'iconSize'        => array( 'type' => 'number', 'default' => 24 ),
            'iconColor'       => array( 'type' => 'string', 'default' => '#ffffff' ),
            'iconHoverColor'  => array( 'type' => 'string', 'default' => '#000000' ),
            // Overlay Settings
            'overlayColor'    => array( 'type' => 'string', 'default' => 'rgba(0, 0, 0, 0.5)' ),
            'overlayOpacity'  => array( 'type' => 'number', 'default' => 0.5 ),

            'buttonHoverBackgroundColor' => array( 'type' => 'string', 'default' => '#000000' ),
            'buttonHoverFontColor'       => array( 'type' => 'string', 'default' => '#ffffff' ),

            // Particle background settings
            'particlesEnabled'   => array( 'type' => 'boolean', 'default' => false ),
            'particleType'       => array( 'type' => 'string', 'default' => 'bubbles' )
        ),
        'render_callback' => 'mega_render_slider_block',
    ));
}
add_action( 'init', 'mega_register_slider_block' );

/**
 * Render the slider block with dynamic content, including image position, fit, padding, and particle background.
 */
function mega_render_slider_block($attributes) {
    ob_start();
    $showArrows = $attributes['showArrows'] ? 'true' : 'false';
    $showDots = $attributes['showDots'] ? 'true' : 'false';
    $dotAlignment = isset($attributes['dotAlignment']) ? $attributes['dotAlignment'] : 'center';
    $layoutStyle = isset($attributes['layoutStyle']) ? $attributes['layoutStyle'] : 'full-width';
    $verticalAlignment = isset($attributes['verticalAlignment']) ? $attributes['verticalAlignment'] : 'center';

    $padding = $attributes['padding'];
    $margin = $attributes['margin'];
    $borderRadius = $attributes['borderRadius'];
    $iconSize = isset($attributes['iconSize']) ? $attributes['iconSize'] : 24;
    $iconColor = isset($attributes['iconColor']) ? $attributes['iconColor'] : '#ffffff';
    $iconHoverColor = isset($attributes['iconHoverColor']) ? $attributes['iconHoverColor'] : '#000000';

    $overlayColor = isset($attributes['overlayColor']) ? $attributes['overlayColor'] : 'rgba(0, 0, 0, 0.5)';
    $overlayOpacity = isset($attributes['overlayOpacity']) ? $attributes['overlayOpacity'] : 0.5;

    $slides = isset($attributes['slides']) ? $attributes['slides'] : [];

    if (empty($slides)) {
        return '';
    }

    $wrapperClass = $layoutStyle === 'boxed' ? 'mega-slider-boxed' : 'mega-slider-full-width';
    ?>

    <div class="mega-slider-wrapper <?php echo esc_attr($wrapperClass); ?>">
        <div class="mega-slider-block slick-slider">
            <?php foreach ($slides as $index => $slide) : ?>
                <div class="slider-slide animate__animated animate__<?php echo esc_attr($slide['animation']); ?>"
     data-animation-class="animate__<?php echo esc_attr($slide['animation']); ?>"
     data-animation-delay="<?php echo esc_attr($slide['animationDelay']); ?>s"
                     style="min-height: <?php echo esc_attr($attributes['minHeight']); ?>px; 
                        background-color: <?php echo esc_attr($slide['backgroundColor']); ?>;
                        background-image: <?php echo !empty($slide['backgroundImage']) ? "url('" . esc_url($slide['backgroundImage']) . "')" : 'none'; ?>;
                        background-position: <?php echo esc_attr($slide['backgroundPosition']); ?>;
                        background-size: <?php echo esc_attr($slide['backgroundSize']); ?>;
                        background-repeat: <?php echo esc_attr($slide['backgroundRepeat']); ?>;
                        padding: <?php echo esc_attr($padding['top'] . 'px ' . $padding['right'] . 'px ' . $padding['bottom'] . 'px ' . $padding['left'] . 'px'); ?>;
                        margin: <?php echo esc_attr($margin['top'] . 'px ' . $margin['right'] . 'px ' . $margin['bottom'] . 'px ' . $margin['left'] . 'px'); ?>;
                        border-radius: <?php echo esc_attr($borderRadius['topLeft'] . 'px ' . $borderRadius['topRight'] . 'px ' . $borderRadius['bottomRight'] . 'px ' . $borderRadius['bottomLeft'] . 'px'); ?>;
                        text-align: <?php echo esc_attr($slide['contentAlignment']); ?>;
                        position: relative;
                        display: flex;
                        align-items: <?php echo esc_attr($verticalAlignment); ?>;">

                    <!-- Particle Background -->
                    <?php if ($attributes['particlesEnabled']) : ?>
                        <div id="particles-js-<?php echo esc_attr($index); ?>" class="particles-js-container" style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 2;"></div>
                    <?php endif; ?>

                    <!-- Overlay -->
                     <div class="slider-overlay" style="
                        background-color: <?php echo esc_attr($overlayColor); ?>;
                        opacity: <?php echo esc_attr($overlayOpacity); ?>;
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 1;">
                    </div>

                    <!-- Add background video or YouTube video if available -->
                    <?php if (!empty($slide['customVideoUrl'])) : ?>
                        <video autoplay muted loop class="background-video" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:0;">
                            <source src="<?php echo esc_url($slide['customVideoUrl']); ?>" type="video/mp4">
                        </video>
                    <?php elseif (!empty($slide['youtubeVideoUrl'])) : ?>
                        <iframe class="background-video" style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; z-index:0;" src="https://www.youtube.com/embed/<?php echo esc_attr($slide['youtubeVideoUrl']); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr($slide['youtubeVideoUrl']); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <?php endif; ?>

                    <div class="container" style="position: relative; z-index: 1;">
                        <div class="row" style="flex-direction: <?php echo esc_attr($slide['layoutType'] === 'two-column' && $slide['isSwitchedLayout'] ? 'row-reverse' : 'row'); ?>;">
                            <?php if ($slide['layoutType'] === 'two-column') : ?>
                                <div class="col-md-6">
                                    <?php if (!empty($slide['leftColumnImage'])) : ?>
                                        <img src="<?php echo esc_url($slide['leftColumnImage']); ?>"
                                             style="width: <?php echo esc_attr($slide['leftColumnImageWidth']); ?>;
                                                    height: <?php echo esc_attr($slide['leftColumnImageHeight']); ?>;
                                                    object-fit: <?php echo esc_attr($slide['leftColumnImageFit']); ?>;
                                                    object-position: <?php echo esc_attr($slide['leftColumnImagePosition']); ?>;
                                                    border-radius: <?php echo esc_attr($slide['leftColumnImageBorderRadius']); ?>px;
                                                    padding: <?php echo esc_attr($slide['leftColumnImagePadding']['top'] . 'px ' . $slide['leftColumnImagePadding']['right'] . 'px ' . $slide['leftColumnImagePadding']['bottom'] . 'px ' . $slide['leftColumnImagePadding']['left'] . 'px'); ?>;" />
                                    <?php elseif (!empty($slide['customVideoUrl'])) : ?>
                                        <video autoplay muted loop class="background-video" style="width: 100%;">
                                            <source src="<?php echo esc_url($slide['customVideoUrl']); ?>" type="video/mp4">
                                        </video>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-center">
                                    <div class="slider-content" style="z-index: 1; position: relative;">
                                        <!-- Conditionally render the subhead if it's not empty -->
                                        <?php if (!empty($slide['subhead'])) : ?>
										
										<h5 class="subhead heading mb-3 <?php echo !empty($slide['subheadAnimation']) && $slide['subheadAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['subheadAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['subheadFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['subheadFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['subheadFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['subheadFontWeight']); ?>;
        <?php echo !empty($slide['subheadAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['subheadAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['subheadAnimation']); ?>"
>
    <?php echo esc_html($slide['subhead']); ?>
</h5>





                                        <?php endif; ?>
                                        <h1 class="main-heading mb-3 <?php echo !empty($slide['headingAnimation']) && $slide['headingAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['headingAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['headingFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['headingFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['headingFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['headingFontWeight']); ?>;
        <?php echo !empty($slide['headingAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['headingAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['headingAnimation']); ?>"
>
    <?php echo wp_kses_post(wpautop($slide['heading'])); ?>
</h1>

                                        <h4 class="content-text <?php echo !empty($slide['contentAnimation']) && $slide['contentAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['contentAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['contentFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['contentFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['contentFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['contentFontWeight']); ?>;
        <?php echo !empty($slide['contentAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['contentAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['contentAnimation']); ?>"
>
    <?php echo wp_kses_post(wpautop($slide['content'])); ?>
</h4>

                                     <?php if (!empty($slide['buttonText'])) : ?>
    <a href="<?php echo esc_url(!empty($slide['buttonUrl']) ? $slide['buttonUrl'] : '#'); ?>" 
        class="btn btn-primary btn-<?php echo esc_attr($index); ?>" 
        style="background-color: <?php echo esc_attr($slide['buttonBackgroundColor']); ?>; 
               color: <?php echo esc_attr($slide['buttonFontColor']); ?>; 
               border-radius: <?php echo esc_attr($slide['buttonBorderRadius']); ?>px; 
               border: <?php echo esc_attr($slide['buttonBorderSize']); ?>px solid <?php echo esc_attr($slide['buttonBorderColor']); ?>;"
        data-original-bg="<?php echo esc_attr($slide['buttonBackgroundColor']); ?>"
        data-hover-bg="<?php echo esc_attr($slide['buttonHoverBackgroundColor']); ?>"
        data-original-color="<?php echo esc_attr($slide['buttonFontColor']); ?>"
        data-hover-color="<?php echo esc_attr($slide['buttonHoverFontColor']); ?>">
        <?php echo esc_html($slide['buttonText']); ?>
    </a>

    <!-- Inline CSS to apply the hover effect -->
    <style>
        .btn-<?php echo esc_attr($index); ?>:hover {
            <?php if (!empty($slide['buttonHoverBackgroundColor'])) : ?>
                background-color: <?php echo esc_attr($slide['buttonHoverBackgroundColor']); ?> !important;
            <?php endif; ?>
            <?php if (!empty($slide['buttonHoverFontColor'])) : ?>
                color: <?php echo esc_attr($slide['buttonHoverFontColor']); ?> !important;
            <?php endif; ?>
        }
    </style>
<?php endif; ?>










                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-md-12 d-flex flex-column justify-content-center">
                                    <div class="slider-content" style="z-index: 1; position: relative;">
                                        <!-- Conditionally render the subhead if it's not empty -->
                                        <?php if (!empty($slide['subhead'])) : ?>
                                           <h5 class="subhead heading mb-3 <?php echo !empty($slide['subheadAnimation']) && $slide['subheadAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['subheadAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['subheadFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['subheadFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['subheadFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['subheadFontWeight']); ?>;
        <?php echo !empty($slide['subheadAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['subheadAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['subheadAnimation']); ?>"
>
    <?php echo esc_html($slide['subhead']); ?>
</h5>



                                        <?php endif; ?>
                                        <h1 class="main-heading mb-3 <?php echo !empty($slide['headingAnimation']) && $slide['headingAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['headingAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['headingFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['headingFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['headingFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['headingFontWeight']); ?>;
        <?php echo !empty($slide['headingAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['headingAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['headingAnimation']); ?>"
>
    <?php echo wp_kses_post(wpautop($slide['heading'])); ?>
</h1>

                                        <h4 class="content-text <?php echo !empty($slide['contentAnimation']) && $slide['contentAnimation'] !== 'none' ? 'animate__animated animate__' . esc_attr($slide['contentAnimation']) : ''; ?>"
    style="
        font-family: <?php echo esc_attr($slide['contentFontFamily']); ?>; 
        font-size: <?php echo esc_attr($slide['contentFontSize']); ?>px; 
        color: <?php echo esc_attr($slide['contentFontColor']); ?>; 
        font-weight: <?php echo esc_attr($slide['contentFontWeight']); ?>;
        <?php echo !empty($slide['contentAnimationDelay']) ? 'animation-delay: ' . esc_attr($slide['contentAnimationDelay']) . 's;' : ''; ?>"
    data-animation-class="<?php echo esc_attr($slide['contentAnimation']); ?>"
>
    <?php echo wp_kses_post(wpautop($slide['content'])); ?>
</h4>
<?php if (!empty($slide['buttonText'])) : ?>
    <a href="<?php echo esc_url(!empty($slide['buttonUrl']) ? $slide['buttonUrl'] : '#'); ?>" 
        class="btn btn-primary btn-<?php echo esc_attr($index); ?>" 
        style="background-color: <?php echo esc_attr($slide['buttonBackgroundColor']); ?>; 
               color: <?php echo esc_attr($slide['buttonFontColor']); ?>; 
               border-radius: <?php echo esc_attr($slide['buttonBorderRadius']); ?>px; 
               border: <?php echo esc_attr($slide['buttonBorderSize']); ?>px solid <?php echo esc_attr($slide['buttonBorderColor']); ?>;"
        data-original-bg="<?php echo esc_attr($slide['buttonBackgroundColor']); ?>"
        data-hover-bg="<?php echo esc_attr($slide['buttonHoverBackgroundColor']); ?>"
        data-original-color="<?php echo esc_attr($slide['buttonFontColor']); ?>"
        data-hover-color="<?php echo esc_attr($slide['buttonHoverFontColor']); ?>">
        <?php echo esc_html($slide['buttonText']); ?>
    </a>

    <!-- Inline CSS to apply the hover effect -->
    <style>
        .btn-<?php echo esc_attr($index); ?>:hover {
            <?php if (!empty($slide['buttonHoverBackgroundColor'])) : ?>
                background-color: <?php echo esc_attr($slide['buttonHoverBackgroundColor']); ?> !important;
            <?php endif; ?>
            <?php if (!empty($slide['buttonHoverFontColor'])) : ?>
                color: <?php echo esc_attr($slide['buttonHoverFontColor']); ?> !important;
            <?php endif; ?>
        }
    </style>
<?php endif; ?>







                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Social Icons rendered outside of the slider -->
        <?php if (!empty($attributes['socialIcons'])) : ?>
            <ul class="social-icons <?php echo esc_attr($attributes['iconPosition']); ?>">
                <?php foreach ($attributes['socialIcons'] as $icon) : ?>
                    <li>
                        <a href="<?php echo esc_url($icon['url']); ?>" target="_blank" style="color: <?php echo esc_attr($iconColor); ?>; font-size: <?php echo esc_attr($iconSize); ?>px;" class="social-icon-link" data-original-color="<?php echo esc_attr($iconColor); ?>" data-hover-color="<?php echo esc_attr($iconHoverColor); ?>">
                            <i class="fab <?php echo esc_attr($icon['icon']); ?>"></i> <!-- Using 'fab' prefix for Font Awesome brands -->
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

  <script>
jQuery(document).ready(function($){
    // Initialize the Slick Slider
    $('.mega-slider-block').slick({
        dots: <?php echo $showDots; ?>,
        arrows: <?php echo $showArrows; ?>,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    });



    // Center the slick dots based on alignment
    $('.slick-dots').css('text-align', '<?php echo esc_js( $dotAlignment ); ?>');

    // Add hover effect for social media icons
    $('.social-icon-link').hover(function() {
        $(this).css('color', $(this).data('hover-color'));
    }, function() {
        $(this).css('color', $(this).data('original-color'));
    });

    // Add hover effect for buttons
    $('.btn-<?php echo esc_attr($index); ?>').hover(function() {
                                $(this).css('background-color', $(this).data('hover-bg'));
                                $(this).css('color', $(this).data('hover-color'));
                            }, function() {
                                $(this).css('background-color', $(this).data('original-bg'));
                                $(this).css('color', $(this).data('original-color'));
                            });



// Function to trigger animations for the active slide and subhead
function triggerAnimationForSlide(slideIndex) {
    var currentSlide = $('.slick-slide[data-slick-index="' + slideIndex + '"]');
    
    // Slide animation
    var slideAnimationClass = currentSlide.data('animation-class');  // Get slide animation class
    if (slideAnimationClass) {
        currentSlide.removeClass('animate__animated ' + slideAnimationClass);  // Remove old animation
        setTimeout(function() {
            currentSlide.addClass('animate__animated ' + slideAnimationClass);  // Add animation back with delay
        }, 50);  // Adjust delay if necessary
    }

    // Subhead animation
    var subheadElement = currentSlide.find('.subhead');  // Find subhead element
    var subheadAnimationClass = subheadElement.data('animation-class');  // Get subhead animation class
    if (subheadAnimationClass) {
        subheadElement.removeClass('animate__animated ' + subheadAnimationClass);  // Remove old animation
        setTimeout(function() {
            subheadElement.addClass('animate__animated ' + subheadAnimationClass);  // Add animation back with delay
        }, 100);  // Adjust delay if necessary
    }


// Heading animation
var headingElement = currentSlide.find('.main-heading');  // Find heading element
var headingAnimationClass = headingElement.data('animation-class');  // Get heading animation class
if (headingAnimationClass) {
    headingElement.removeClass('animate__animated ' + headingAnimationClass);  // Remove old animation
    setTimeout(function() {
        headingElement.addClass('animate__animated ' + headingAnimationClass);  // Add animation back with delay
    }, 100);  // Adjust delay if necessary
}



    // Content animation
    var contentElement = currentSlide.find('.content');  // Find content element
    var contentAnimationClass = contentElement.data('animation-class');  // Get content animation class
    if (contentAnimationClass) {
        contentElement.removeClass('animate__animated ' + contentAnimationClass);  // Remove old animation
        setTimeout(function() {
            contentElement.addClass('animate__animated ' + contentAnimationClass);  // Add animation back with delay
        }, 150);
    }

    // Button animation
    var buttonElement = currentSlide.find('.btn');  // Find button element
    var buttonAnimationClass = buttonElement.data('animation-class');  // Get button animation class
    if (buttonAnimationClass) {
        buttonElement.removeClass('animate__animated ' + buttonAnimationClass);  // Remove old animation
        setTimeout(function() {
            buttonElement.addClass('animate__animated ' + buttonAnimationClass);  // Add animation back with delay
        }, 200);
    }
}

// Apply animation to the first slide initially
triggerAnimationForSlide(0);

// Trigger animation when a slide changes
$('.mega-slider-block').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    // Trigger animation for the upcoming slide
    triggerAnimationForSlide(nextSlide);
});

// Ensure animation is triggered for manually navigated slides via next/prev or dots
$('.mega-slider-block').on('afterChange', function(event, slick, currentSlide) {
    triggerAnimationForSlide(currentSlide);
});





   // Initialize particles.js for each slide if particles are enabled
    <?php foreach ($slides as $index => $slide) : ?>
        <?php if ($attributes['particlesEnabled']) : ?>
            let particleType = "<?php echo esc_js($attributes['particleType']); ?>";

            let particleConfig;
            switch (particleType) {
                case 'snow':
                    particleConfig = {
                        particles: {
                            number: { value: 100, density: { enable: true, value_area: 800 } },
                            color: { value: "#ffffff" },
                            shape: { type: "circle" },
                            opacity: { value: 0.8, random: true },
                            size: { value: 5, random: true },
                            move: { enable: true, speed: 1, direction: "bottom", random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onclick: { enable: true, mode: "push" } } },
                        retina_detect: true
                    };
                    break;

                case 'bubbles':
                    particleConfig = {
                        particles: {
                            number: { value: 80, density: { enable: true, value_area: 800 } },
                            color: { value: "#a3e4fd" },
                            shape: { type: "circle" },
                            opacity: { value: 0.3 },
                            size: { value: 10, random: true },
                            move: { enable: true, speed: 2, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "repulse" } } },
                        retina_detect: true
                    };
                    break;

                case 'stars':
                    particleConfig = {
                        particles: {
                            number: { value: 50, density: { enable: true, value_area: 800 } },
                            color: { value: "#f9d71c" },
                            shape: { type: "star" },
                            opacity: { value: 0.6, random: true },
                            size: { value: 4, random: true },
                            move: { enable: true, speed: 1.5, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "grab" } } },
                        retina_detect: true
                    };
                    break;

                case 'triangles':
                    particleConfig = {
                        particles: {
                            number: { value: 60, density: { enable: true, value_area: 800 } },
                            color: { value: "#00ff00" },
                            shape: { type: "triangle" },
                            opacity: { value: 0.5, random: true },
                            size: { value: 8, random: true },
                            move: { enable: true, speed: 2, direction: "top", random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onclick: { enable: true, mode: "push" } } },
                        retina_detect: true
                    };
                    break;

                case 'confetti':
                    particleConfig = {
                        particles: {
                            number: { value: 120, density: { enable: true, value_area: 1000 } },
                            color: { value: ["#ff0000", "#00ff00", "#0000ff", "#ff00ff"] },
                            shape: { type: "circle" },
                            opacity: { value: 0.7 },
                            size: { value: 4, random: true },
                            move: { enable: true, speed: 2, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onclick: { enable: true, mode: "repulse" } } },
                        retina_detect: true
                    };
                    break;

                case 'fireflies':
                    particleConfig = {
                        particles: {
                            number: { value: 40, density: { enable: true, value_area: 800 } },
                            color: { value: "#ffdd00" },
                            shape: { type: "circle" },
                            opacity: { value: 0.7, random: true },
                            size: { value: 3, random: true },
                            move: { enable: true, speed: 0.5, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "bubble" } } },
                        retina_detect: true
                    };
                    break;

                case 'hearts':
                    particleConfig = {
                        particles: {
                            number: { value: 50, density: { enable: true, value_area: 800 } },
                            color: { value: "#ff4b4b" },
                            shape: { type: "polygon", polygon: { nb_sides: 5 } },
                            opacity: { value: 0.8 },
                            size: { value: 6, random: true },
                            move: { enable: true, speed: 1, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onclick: { enable: true, mode: "push" } } },
                        retina_detect: true
                    };
                    break;

                case 'spirals':
                    particleConfig = {
                        particles: {
                            number: { value: 60, density: { enable: true, value_area: 800 } },
                            color: { value: "#d8aaff" },
                            shape: { type: "edge" },
                            opacity: { value: 0.6 },
                            size: { value: 5, random: true },
                            move: { enable: true, speed: 2, direction: "bottom-left", random: false, out_mode: "out" }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "repulse" } } },
                        retina_detect: true
                    };
                    break;

                case 'diamonds':
                    particleConfig = {
                        particles: {
                            number: { value: 70, density: { enable: true, value_area: 800 } },
                            color: { value: "#00ffdd" },
                            shape: { type: "polygon", polygon: { nb_sides: 4 } },
                            opacity: { value: 0.5 },
                            size: { value: 6, random: true },
                            move: { enable: true, speed: 3, random: true, out_mode: "out" }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "bubble" } } },
                        retina_detect: true
                    };
                    break;

                case 'matrix':
                    particleConfig = {
                        particles: {
                            number: { value: 100, density: { enable: true, value_area: 800 } },
                            color: { value: "#00ff00" },
                            shape: { type: "char", character: { value: ["1", "0"], font: "Arial", weight: "bold" } },
                            opacity: { value: 0.6 },
                            size: { value: 8, random: true },
                            move: { enable: true, speed: 1, direction: "bottom", random: false, out_mode: "out" }
                        },
                        interactivity: { events: { onclick: { enable: true, mode: "push" } } },
                        retina_detect: true
                    };
                    break;

                default:
                    particleConfig = {
                        particles: {
                            number: { value: 60, density: { enable: true, value_area: 800 } },
                            color: { value: "#ffffff" },
                            shape: { type: "circle" },
                            opacity: { value: 0.5 },
                            size: { value: 3 },
                            move: { enable: true, speed: 3 }
                        },
                        interactivity: { events: { onhover: { enable: true, mode: "repulse" } } },
                        retina_detect: true
                    };
                    break;
            }

            // Initialize particles.js with the selected configuration for this slide
            particlesJS(`particles-js-<?php echo esc_js($index); ?>`, particleConfig);
        <?php endif; ?>
    <?php endforeach; ?>
});
</script>

<style>

mark{
	background-color: transparent;
    padding: 0;
}
</style>
    <?php

    return ob_get_clean();
}

/**
 * Enqueue Google Fonts for the front-end.
 */
function mega_enqueue_google_fonts() {
    wp_enqueue_style(
        'mega-google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;700&family=Lato:wght@300;400;700&family=Montserrat:wght@400;700&family=Poppins:wght@400;500;600;700&family=Raleway:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&family=Nunito:wght@400;600;700&family=Merriweather:wght@400;700&family=Playfair+Display:wght@400;600;700&family=Ubuntu:wght@400;500;700&family=Rubik:wght@400;500;600;700&family=PT+Sans:wght@400;600;700&family=Noto+Sans:wght@400;700&family=Prata:wght@400&family=Pangolin:wght@400&family=Dosis:wght@400;500;600;700&family=Grand+Hotel&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'mega_enqueue_google_fonts');

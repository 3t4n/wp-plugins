<script>

    function rStyle(property, value) {
        document.querySelector(':root').style.setProperty(property, value);
    }

    // Slider Dots Style
    <?php
        if ($plslider_dots_style === "circle") {
            $dot_width = "20";
            $dot_height = "20";
        } else if ($plslider_dots_style === "bar") {
            $dot_width = "50";
            $dot_height = "8";
        }
    ?>
    rStyle("--dotWidth", <?php echo esc_html__( $dot_width ); ?> + "px");
    rStyle("--dotHeight", <?php echo esc_html__( $dot_height ); ?> + "px");

    var slides = document.getElementsByClassName( 'slider' );
    var dots = document.getElementsByClassName( 'dot' );
    let sIndex = 0;
    let iSeconds = <?php echo esc_html__( $plslider_i_seconds ); ?>;

    slideShow(1);
    
    <?php
        global $plslider_auto;
        if ( $plslider_auto === "yes" ) :
    ?>

    var interval = setInterval( slideShow, iSeconds );

    <?php endif; ?>

    function slideShow( x = 1 ) {

        if (sIndex == slides.length) {
            if ( x == 1 ) {
            sIndex = 0;
            }
        }

        if (sIndex == 1) {
            if ( x == -1 ) {
            sIndex = slides.length + 1;
            }
        }

        sIndex += x;
        slideAction( sIndex );

    }


    function slideAction( val ) {

        <?php if ( $plslider_auto === "yes" ) : ?>
            clearInterval(interval);
        <?php endif; ?>
        
        var i;
        var activeNumber = val - 1;
        var activeSlider = slides[ activeNumber ];
        

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            slides[i].classList.remove("activeProSlider");

            <?php if ($plslider_show_dots === "yes") : ?>
            dots[i].classList.remove("activeDot");
            <?php endif; ?>

            if (i == activeNumber) {
            activeSlider.style.display = "flex";
            activeSlider.classList.add("activeProSlider");

            <?php if ($plslider_show_dots === "yes") : ?>
            dots[activeNumber].classList.add("activeDot");
            <?php endif; ?>
            }
        }

        sIndex = val;

        <?php if ( $plslider_auto === "yes" ) : ?>
            interval = setInterval(slideShow, iSeconds);
        <?php endif; ?>

    }


</script>
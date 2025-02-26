<?php if ($plslider_show_dots === "yes") : ?>
    <div class="row py-5">
        <div class="col-12">
            <div class="dots d-flex justify-content-center">
                <?php $plslider_index = 0; ?>

                <?php while ( $plslider_slider->have_posts() ) : $plslider_slider->the_post(); $plslider_index++; ?>
                    <div class="dot" onclick="slideAction(<?php echo esc_html__( $plslider_index ); ?>);" ></div>                    
                <?php
                    endwhile;
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>